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
                    window.open("control/excluir_parecer.php?id=" + id, "_self");
                }
            }
        </script>
    </head>
    <body>
        <?php
        //include_once './banner.php';
        ?>
        <h4>Lista de Estagiarios <a href="form_inserir_parecer.php"><img src="imagens/novo.svg" align="center" width="22" height="22" /></a></h4>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>PARECER</th>
                <th>ESTAGIARIO</th>
                <th>COORDENADOR</th>
            </tr>
            <?php
            include_once "./model/ParecerDAO.php";
            include_once "./model/Parecer.php";
            // put your code here
            $parecerDAO = new ParecerDAO();
            $lista = array();
            $lista = $parecerDAO->listar();

            foreach ($lista as $parecer) {
                ?>
                <tr>
                    <td><?= $parecer->id ?></td>
                    <td><?= $parecer->parecer ?></td>
                    <td><?= $parecer->id_estagiario->nome ?></td>
                    <td><?= $parecer->id_coordenador->nome ?></td>
                    <td align="center">
                        <a href="form_alterar_parecer.php?id=<?= $parecer->id ?>"><img src="imagens/alterar.svg" width="22" height="22" /></a>
                        <a href="#" onclick="excluir(<?= $parecer->id ?>, '<?= $parecer->nome ?>')"><img src="imagens/excluir.svg" width="22" height="22" /></a>
                    </td>
                </tr>
                <?php
            }
            ?>

        </table>

    </body>
</html>
