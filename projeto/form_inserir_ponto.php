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
        <h4>Novo Perfil</h4>
        <form  method="get" action="control/inserir_ponto.php">
            Data: <input type="date" name="data_atual"  /><br/>
            Hora de Entrada: <input type="time" name="hora_entrada"  /><br/>
            Hora de Saida: <input type="time" name="hora_saida" /><br/>
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
