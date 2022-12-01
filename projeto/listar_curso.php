<?php 
//include_once "verifica_login.php"
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script lang="javascript">
            function excluir(id, nome) {
                if (confirm("Tem certeza que desja excluir o curso: " + nome + "?")) {
                    window.open("control/excluir_curso.php?id=" + id, "_self");
                }
            }
        </script>
    </head>
    <body>
        <?php
        //include_once './banner.php';
        ?>
        <h4>Lista de cursos <a href="form_inserir_curso.php"><img src="imagens/novo.svg" align="center" width="22" height="22" /></a></h4>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>OPÇÕES</th>
            </tr>
            <?php
            include_once "./model/CursoDAO.php";
            // put your code here
            $cDAO = new CursoDAO();
            $lista = array();
            $lista = $cDAO->listar();

            foreach ($lista as $c) {
                ?>
                <tr>
                    <td><?= $c->id ?></td>
                    <td><?= $c->nome ?></td>
                    <td align="center">
                        <a href="form_alterar_curso.php?id=<?= $c->id ?>"><img src="imagens/alterar.svg" width="22" height="22" /></a>
                        <a href="#" onclick="excluir(<?= $c->id ?>, '<?= $c->nome ?>')"><img src="imagens/excluir.svg" width="22" height="22" /></a>
                    </td>
                </tr>
                <?php
            }
            ?>

        </table>

    </body>
</html>
