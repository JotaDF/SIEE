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
    include_once "./model/ParecerDAO.php";
    include_once "./model/Parecer.php";
    include_once "./model/CoordenadorDAO.php";
    include_once "./model/Coordenador.php";
    include_once "./model/EstagiarioDAO.php";
    include_once "./model/Estagiario.php";

    $id = $_REQUEST["id"];

    $parecerDAO = new ParecerDAO();
    $parecer = new Parecer();
    $parecer = $parecerDAO->carregarPorId($id);       
     ?>
        <h4>Editar ponto</h4>
        <form method="get" action="control/alterar_parecer.php">
            ID: <?=$parecer->id ?><br/><input type="hidden" value="<?=$parecer->id ?>" name="id" />
            Parecer:</br><textarea value="<?=$parecer->parecer ?>" name="parecer" rows="5" cols="33" required> <?=$parecer->parecer ?> </textarea></br>
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
                    if ($e->id === $parecer->id_estagiario->id) {
                        $selected = "selected";
                    }
                    ?>
                <option value="<?=$e->id ?>" <?=$selected ?>><?=$e->nome ?></option>
                    <?php
                }
                ?>
            </select>
            <br/>
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
                    if ($c->id === $parecer->id_coordenador->id) {
                        $selected = "selected";
                    }
                    ?>
                <option value="<?=$c->id ?>" <?=$selected ?>><?=$c->nome ?></option>
                    <?php
                }
                ?>
            </select>
            <br/>
            <input type="submit" value="Salvar" />            
        </form>
    </body>
</html>
