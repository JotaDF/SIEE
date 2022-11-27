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
        <form name="inserir_atividade" method="post" action="control/inserir_atividade.php">
            Atividade Realizada:</br><textarea name="atividade" rows="5" cols="33" required ></textarea></br>
            id_ponto:<select size="1" name="id_ponto" required>
                <option value="">Selecione...</option>
                <?php
                include_once "./model/PontoDAO.php";
                include_once "./model/Ponto.php";
                // put your code here
                $pDAO = new PontoDAO();
                $lista = array();
                $lista = $pDAO->listar();
                foreach ($lista as $p) {
                    $selected = "";
                    if ($p->id === $ponto->id_ponto->id) {
                        $selected = "selected";
                    }
                    ?>
                <option value="<?=$p->id ?>" <?=$selected ?>><?=$p->data_atual ?></option>
                    <?php
                }
                ?>
            </select>
            <br/>
            <input type="submit" value="Salvar" />            
        </form>
    </body>
</html>
