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
        <?php
        include_once "./model/PerfilDAO.php";
        include_once "./model/Perfil.php";
        
        $id = $_REQUEST["id"];
        
        $pDAO = new PerfilDAO();
        $p = new Perfil();
        $p = $pDAO->carregarPorId($id);
        ?>
        <h4>Novo Perfil</h4>
        <form name="alterar_perfil" method="post" action="control/alterar_perfil.php">
            ID:<?=$p->getId() ?><br/>
            <input type="hidden" name="id" value="<?=$p->getId() ?>"/>
            Perfil:<input type="text" name="nome" value="<?=$p->getNome() ?>" size="60" required /><br/>
            Descrição:<input type="text" name="descricao" value="<?=$p->getDescricao() ?>" size="60" required /><br/>
            <input type="submit" value="Salvar" />            
        </form>
    </body>
</html>