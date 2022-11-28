<?php 
//include_once "verifica_login.php"
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        //include_once './banner.php';
        ?>
        <h4>Inserir Atividade</h4>
        <form name="inserir_resposta" method="get" action="control/inserir_resposta.php">
            Curso:<select size="1" name="id_curso" required>
                <option value="">Selecione...</option>
                <?php
                include_once "./model/CursoDAO.php";
                include_once "./model/Curso.php";
                // put your code here
                $cDAO = new CursoDAO();
                $lista = array();
                $lista = $cDAO->listar();
                foreach ($lista as $c) {
                    $selected = "";
                    if ($c->id === $curso->id_curso->id) {
                        $selected = "selected";
                    }
                    ?>
                <option value="<?=$c->id ?>" <?=$selected ?>><?=$c->nome ?></option>
                    <?php
                }
                ?>
            </select>
            <br/>
            Questao 1:</br><textarea name="questao1" rows="5" cols="33" required ></textarea></br>
            Questao 2:</br><textarea name="questao2" rows="5" cols="33" required ></textarea></br>
            Questao 3:</br><textarea name="questao3" rows="5" cols="33" required ></textarea></br>
            Questao 4:</br><textarea name="questao4" rows="5" cols="33" required ></textarea></br>
            Questao 5:</br><textarea name="questao5" rows="5" cols="33" required ></textarea></br>
            Questao 6:</br><textarea name="questao6" rows="5" cols="33" required ></textarea></br>
            Estagiario:<select size="1" name="id_estagiario" required>
                <option value="">Selecione...</option>
                <?php
                include_once "./model/EstagiarioDAO.php";
                include_once "./model/Estagiario.php";
                // put your code here
                $eDAO = new EstagiarioDAO();
                $lista = array();
                $lista = $eDAO->listar();
                foreach ($lista as $e) {
                    $selected = "";
                    if ($e->id === $estagiario->id_estagiario->id) {
                        $selected = "selected";
                    }
                    ?>
                <option value="<?=$e->id ?>" <?=$selected ?>><?=$e->nome ?></option>
                    <?php
                }
                ?>
            </select>
            <br/>
            <input type="submit" value="Salvar" />            
        </form>
    </body>
</html>
