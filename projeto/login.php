<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h4>Acesso restrito</h4>
        <?php
        if (isset($_REQUEST["m"])) {
            echo "<span style='color:red;'>Usuário ou senha inválidos!</span>";
        }
        ?>
        <form name="login" method="post" action="valida_login.php" enctype="on">
            CPF: <input name="cpf" type="text" size="15" required/><br/>
            Senha: <input name="senha" type="password" size="15" required/><br/>
            <input type="submit" value="Entrar"/>
        </form>
    </body>
</html>
