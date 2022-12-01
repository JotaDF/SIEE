<?php 
include_once "verifica_login.php";
include_once "model/Usuario.php";
   

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

        <h1>
            <?php
               echo $u_logado->nome;
            ?>
        </h1>
    </body>
</html>
