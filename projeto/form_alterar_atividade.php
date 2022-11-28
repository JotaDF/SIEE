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
    include_once "./model/AtividadeDAO.php";
    include_once "./model/Atividade.php";
    include_once "./model/PontoDAO.php";
    include_once "./model/Ponto.php";

    $id = $_REQUEST["id"];

    $atividadeDAO = new AtividadeDAO();
    $atividade = new Atividade();
    $atividade = $atividadeDAO->carregarPorId($id);       
     ?>
        <h4>Editar Estagiario</h4>
        <form method="get" action="control/alterar_atividade.php">
            ID: <?=$atividade->id ?><br/><input type="hidden" value="<?=$atividade->id ?>" name="id" />
            Atividade Realizada:</br><textarea value="<?=$atividade->atividade ?>" rows="5" cols="33" name="atividade" required ><?=$atividade->atividade ?></textarea></br>
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
                    if ($p->id === $atividade->id_ponto->id) {
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
