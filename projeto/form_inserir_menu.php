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
        <h4>Novo Menu</h4>
        <form name="inserir_menu" method="post" action="control/inserir_menu.php">
            Título:<input type="text" name="titulo" size="60" required /><br/>
            Link:<input type="text" name="link" size="60" required /><br/>
            <input type="submit" value="Salvar" />            
        </form>
    </body>
</html>
