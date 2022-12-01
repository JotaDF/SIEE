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
        <h4>Inserir Parecer</h4>
        <form name="inserir_parecer" method="get" action="control/inserir_parecer.php">
        Parecer:</br><textarea name="parecer" rows="5" cols="33" required ></textarea></br>
        Coordenador:<select size="1" name="id_coordenador" required>
                <option value="">Selecione...</option>
                <?php
                include_once "./model/CoordenadorDAO.php";
                include_once "./model/Coordenador.php";
                // put your code here
                $cDAO = new CoordenadorDAO();
                $lista = array();
                $lista = $cDAO->listar();
                foreach ($lista as $c) {
                    $selected = "";
                    if ($c->id === $curso->id_coordenador->id) {
                        $selected = "selected";
                    }
                    ?>
                <option value="<?=$c->id ?>" <?=$selected ?>><?=$c->nome ?></option>
                    <?php
                }
                ?>
            </select>
            <br/>
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
