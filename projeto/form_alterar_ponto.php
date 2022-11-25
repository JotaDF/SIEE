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
    include_once "./model/PontoDAO.php";
    include_once "./model/Ponto.php";
    include_once "./model/EstagiarioDAO.php";
    include_once "./model/Estagiario.php";

    $id = $_REQUEST["id"];

    $pontoDAO = new PontoDAO();
    $ponto = new Ponto();
    $ponto = $pontoDAO->carregarPorId($id);       
     ?>
        <h4>Editar ponto</h4>
        <form method="get" action="control/alterar_ponto.php">
            ID: <?=$ponto->id ?><br/><input type="hidden" value="<?=$ponto->id ?>" name="id" />
            Data:<input type="text" name="data_atual" value="<?=$ponto->data_atual ?>"  size="20" required /><br/>
            Hora de Entrada:<input type="text" name="hora_entrada"  value="<?=$ponto->hora_entrada ?>" size="60" required /><br/>
            Hora de Saída:<input type="text" name="hora_saida" value="<?=$ponto->hora_saida ?>"  size="60" required /><br/>
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
                    if ($e->id === $ponto->id_estagiario->id) {
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
