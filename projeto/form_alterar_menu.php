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
        include_once "./model/MenuDAO.php";
        include_once "./model/Menu.php";
        
        $id = $_REQUEST["id"];
        
        $mDAO = new MenuDAO();
        $m = new Menu();
        $m = $mDAO->carregarPorId($id);
        ?>
        <h4>Novo Menu</h4>
        <form name="alterar_menu" method="post" action="control/alterar_menu.php">
            ID:<?=$m->getId() ?><br/>
            <input type="hidden" name="id" value="<?=$m->getId() ?>"/>
            Título:<input type="text" name="titulo" value="<?=$m->getTitulo() ?>" size="60" required /><br/>
            Link:<input type="text" name="link" value="<?=$m->getLink() ?>" size="60" required /><br/>
            <input type="submit" value="Salvar" />            
        </form>
    </body>
</html>