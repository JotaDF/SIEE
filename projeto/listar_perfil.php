<?php 
include_once "verifica_login.php"
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script lang="javascript">
            function excluir(id, nome) {
                if (confirm("Tem certeza que desja excluir o perfil: " + nome + "?")) {
                    window.open("control/excluir_perfil.php?id=" + id, "_self");
                }
            }
        </script>
    </head>
    <body>
        <?php
        include_once './banner.php';
        ?>
        <h4>Lista de perfis <a href="form_inserir_perfil.php"><img src="imagens/novo.svg" align="center" width="22" height="22" /></a></h4>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>DESCRIÇÃO</th>
                <th>OPÇÕES</th>
            </tr>
            <?php
            include_once "./model/PerfilDAO.php";
            // put your code here
            $pDAO = new PerfilDAO();
            $lista = array();
            $lista = $pDAO->listar();

            foreach ($lista as $p) {
                ?>
                <tr>
                    <td><?= $p->id ?></td>
                    <td><?= $p->nome ?></td>
                    <td><?= $p->descricao ?></td>
                    <td align="center">
                        <a href="form_gerenciar_menu_perfil.php?id=<?= $p->id ?>"><img src="imagens/menu.svg" width="22" height="22" /></a>
                        <a href="form_alterar_perfil.php?id=<?= $p->id ?>"><img src="imagens/alterar.svg" width="22" height="22" /></a>
                        <a href="#" onclick="excluir(<?= $p->id ?>, '<?= $p->nome ?>')"><img src="imagens/excluir.svg" width="22" height="22" /></a>
                    </td>
                </tr>
                <?php
            }
            ?>

        </table>

    </body>
</html>
