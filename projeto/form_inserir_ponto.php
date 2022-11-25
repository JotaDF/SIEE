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
            ID do Estágiario: <input type="number" name="id_estagiario"  /><br/>
            <input type="submit" value="Salvar" />            
        </form>
    </body>
</html>
