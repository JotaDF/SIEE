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
        <?php
        include_once './banner.php';
        ?>
        <h4>Novo Usuário</h4>
        <form name="inserir_usuario" method="post" action="control/inserir_usuario.php">
            CPF:<input type="text" name="cpf" size="60" required /><br/>
            Nome:<input type="text" name="nome" size="60" required /><br/>
            E-mail:<input type="email" name="email" size="60" required /><br/>
            Senha:<input type="password" name="senha" size="60" required /><br/>
            Perfil:<select size="1" name="id_perfil" required>
                <option value="">Selecione...</option>
                <?php
                include_once "./model/PerfilDAO.php";
                // put your code here
                $pDAO = new PerfilDAO();
                $lista = array();
                $lista = $pDAO->listar();

                foreach ($lista as $p) {
                    ?>
                <option value="<?=$p->id ?>"><?=$p->nome ?></option>
                    <?php
                }
                ?>
            </select>
            <br/>
            <input type="submit" value="Salvar" />            
        </form>
    </body>
</html>
