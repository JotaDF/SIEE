<?php 
include_once "verifica_login.php"
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script lang="javascript">
            function excluir(id, titulo) {
                if (confirm("Tem certeza que desja excluir o menu: " + titulo + "?")) {
                    window.open("control/excluir_menu.php?id=" + id, "_self");
                }
            }
        </script>
    </head>
    <body>
        <?php
        include_once './banner.php';
        ?>
        <h4>Lista de menus <a href="form_inserir_menu.php"><img src="imagens/novo.svg" align="center" width="22" height="22" /></a></h4>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>TÍTULO</th>
                <th>LINK</th>
                <th>OPÇÕES</th>
            </tr>
            <?php
            include_once "./model/MenuDAO.php";
            // put your code here
            $mDAO = new MenuDAO();
            $lista = array();
            $lista = $mDAO->listar();

            foreach ($lista as $m) {
                ?>
                <tr>
                    <td><?= $m->id ?></td>
                    <td><?= $m->titulo ?></td>
                    <td><?= $m->link ?></td>
                    <td align="center">
                        <a href="form_alterar_menu.php?id=<?= $m->id ?>"><img src="imagens/alterar.svg" width="22" height="22" /></a>
                        <a href="#" onclick="excluir(<?= $m->id ?>, '<?= $m->titulo ?>')">
                            <img src="imagens/excluir.svg" width="22" height="22" />
                        </a>
                    </td>
                </tr>
                <?php
            }
            ?>

        </table>

    </body>
</html>
