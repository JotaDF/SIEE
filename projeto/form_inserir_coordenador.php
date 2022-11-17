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
        <h4>Cadastro de Coordenador</h4>
        <form method="post" action="control/inserir_coordenador.php">
            CPF:<input type="text" name="cpf" size="11" required /><br/>
            Nome:<input type="text" name="nome" size="60" required /><br/>
            Graduação:<input type="text" name="graduacao" size="60" required /><br/>
            Pos_Graduação:<input type="text" name="pos_graduacao" size="60" required /><br/>
            Telefone:<input type="tel" name="telefone" size="10" required /><br/>
            E-mail:<input type="email" name="email" size="60" required /><br/>
            Nucleo:<input type="text" name="nucleo" size="60" required /><br/>
            Turno:<input type="text" name="turno" size="60" required /><br/>
            Id_Curso:<input type="number" name="id_curso" size="60" required /><br/>
            Senha:<input type="password" name="senha" size="60" required /><br/>
            <input type="submit" value="Salvar" />            
        </form>
    </body>
</html>
