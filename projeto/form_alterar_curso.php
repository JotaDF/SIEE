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
        include_once "./model/CursoDAO.php";
        include_once "./model/Curso.php";
        
        $id = $_REQUEST["id"];
        
        $cDAO = new CursoDAO();
        $c = new Curso();
        $c = $cDAO->carregarPorId($id);
        ?>
        <h4>Novo Curso</h4>
        <form name="inserir_curso" method="post" action="control/alterar_curso.php">
            ID:<?=$c->getId() ?><br/>
            <input type="hidden" name="id" value="<?=$c->getId() ?>"/>
            Nome:<input type="text" name="nome" value="<?=$c->getNome() ?>" size="60" required /><br/>
            <input type="submit" value="Salvar" />            
        </form>
    </body>
</html>
