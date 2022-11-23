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
        <form name="inserir_ponto" method="post" action="control/inserir_ponto.php">
            Data: <input type="date" name="data" required /><br/>
            Hora de Entrada: <input type="time" name="hora_entrada" required /><br/>
            Hora de Saida: <input type="time" name="hora_saida" required /><br/>
            ID do Estágiario: <input type="time" name="id_estagiario" required /><br/>

            ID do Estágiario:<select size="1" name="id_estagiario" required>
                <option value="">Selecione...</option>
                <?php
                include_once "./model/EstagiarioDAO.php";
                include_once "./model/Estagiaro.php";
                // put your code here
                $estagiarioDAO = new EstagiarioDAO();
                $lista = array();
                $lista = $estagiarioDAO->listar();
                
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
