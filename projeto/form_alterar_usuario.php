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
        <?php
        include_once "./model/UsuarioDAO.php";
        include_once "./model/Usuario.php";
        include_once "./model/PerfilDAO.php";
        
        $id = $_REQUEST["id"];
        
        $uDAO = new UsuarioDAO();
        $u = new Usuario();
        $u = $uDAO->carregarPorId($id);
        ?>
        <h4>Editar Usuário</h4>
        <form name="alterar_usuario" method="post" action="control/alterar_usuario.php">
            ID: <?=$u->id ?><br/>
            <input type="hidden" value="<?=$u->id ?>" name="id" />
            CPF:<input type="text" name="cpf" value="<?=$u->cpf ?>" size="60" required /><br/>
            Nome:<input type="text" name="nome" value="<?=$u->nome ?>" size="60" required /><br/>
            E-mail:<input type="email" name="email" value="<?=$u->email ?>" size="60" required /><br/>
            Perfil:<select size="1" name="id_perfil" required>
                <option value="">Selecione...</option>
                <?php
                include_once "./model/PerfilDAO.php";
                // put your code here
                $pDAO = new PerfilDAO();
                $lista = array();
                $lista = $pDAO->listar();
                
                foreach ($lista as $p) {
                    $selected = "";
                    if ($p->id === $u->perfil->id) {
                        $selected = "selected";
                    }
                    ?>
                <option value="<?=$p->id ?>" <?=$selected ?>><?=$p->nome ?></option>
                    <?php
                }
                ?>
            </select>
            <br/>
            <input type="submit" value="Salvar" />            
        </form>
    </body>
</html>
