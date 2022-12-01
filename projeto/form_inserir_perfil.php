<?php 
include_once "verifica_login.php"
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include_once './banner.php';
        ?>
        <h4>Novo Perfil</h4>
        <form name="inserir_perfil" method="post" action="control/inserir_perfil.php">
            Perfil:<input type="text" name="nome" size="60" required /><br/>
            Descrição:<input type="text" name="descricao" size="60" required /><br/>
            <input type="submit" value="Salvar" />            
        </form>
    </body>
</html>
