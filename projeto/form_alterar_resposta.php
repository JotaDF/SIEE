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
    include_once "./model/RespostaDAO.php";
    include_once "./model/Resposta.php";
    include_once "./model/CursoDAO.php";
    include_once "./model/Curso.php";
    include_once "./model/EstagiarioDAO.php";
    include_once "./model/Estagiario.php";

    $id = $_REQUEST["id"];

    $respostaDAO = new RespostaDAO();
    $resposta = new Resposta();
    $resposta = $respostaDAO->carregarPorId($id);       
     ?>
        <h4>Editar Respostas</h4>
        <form method="post" action="control/alterar_resposta.php">
        ID: <?=$resposta->id ?><br/><input type="hidden" value="<?=$resposta->id ?>" name="id" />
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
                if ($c->id === $resposta->id_curso->id) {
                    $selected = "selected";
                }
            ?>
                <option value="<?=$c->id ?>" <?=$selected ?>><?=$c->nome ?></option>
            <?php
            }
            ?>
        </select>
        <br/>
        Questão 1:</br><textarea value="<?=$resposta->questao1 ?>" name="questao1" rows="5" cols="33" required><?=$resposta->questao1?></textarea></br>
        Questão 2:</br><textarea value="<?=$resposta->questao2 ?>" name="questao2" rows="5" cols="33" required><?=$resposta->questao2?></textarea></br>
        Questão 3:</br><textarea value="<?=$resposta->questao3 ?>" name="questao3" rows="5" cols="33" required><?=$resposta->questao3?></textarea></br>
        Questão 4:</br><textarea value="<?=$resposta->questao4 ?>" name="questao4" rows="5" cols="33" required><?=$resposta->questao4?></textarea></br>
        Questão 5:</br><textarea value="<?=$resposta->questao5 ?>" name="questao5" rows="5" cols="33" required><?=$resposta->questao5?></textarea></br>
        Questão 6:</br><textarea value="<?=$resposta->questao6 ?>" name="questao6" rows="5" cols="33" required><?=$resposta->questao6?></textarea></br>
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
                if ($e->id === $resposta->id_estagiario->id) {
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
