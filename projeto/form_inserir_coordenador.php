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
        include_once './banner.php';
        ?>
        <h4>Novo Menu</h4>
        <form name="inserir_menu" method="post" action="control/inserir_coordenador.php">
            CPF:<input type="text" name="titulo" size="60" required /><br/>
            Nome:<input type="text" name="link" size="60" required /><br/>
            Graduação:<input type="text" name="titulo" size="60" required /><br/>
            Pos_Graduação:<input type="text" name="link" size="60" required /><br/>
            Telefone:<input type="text" name="titulo" size="60" required /><br/>
            E-mail:<input type="text" name="link" size="60" required /><br/>
            Nucleo:<input type="text" name="titulo" size="60" required /><br/>
            Turno:<input type="text" name="link" size="60" required /><br/>
            Id_Curso:<input type="text" name="titulo" size="60" required /><br/>
            Senha:<input type="text" name="link" size="60" required /><br/>
            <input type="submit" value="Salvar" />            
        </form>
    </body>
</html>
