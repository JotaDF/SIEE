<?php 
//include_once "verifica_login.php"
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script lang="javascript">
            function excluir(id, id_ponto) {
                if (confirm("Tem certeza que desja excluir a atividade: " + id_ponto + "?")) {
                    window.open("control/excluir_atividade.php?id=" + id, "_self");
                }
            }
        </script>
    </head>
    <body>
        <?php
        //include_once './banner.php';
        ?>
        <h4>Lista de Atividades <a href="form_inserir_atividade.php"><img src="imagens/novo.svg" align="center" width="22" height="22" /></a></h4>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Atividade</th>
                <th>Data</th>
            </tr>
            <?php
            include_once "./model/AtividadeDAO.php";
            include_once "./model/Atividade.php";
            // put your code here
            $atividadeDAO = new AtividadeDAO();
            $lista = array();
            $lista = $atividadeDAO->listar();

            foreach ($lista as $atividade) {
                ?>
                <tr>
                    <td><?= $atividade->id ?></td>
                    <td><?= $atividade->atividade ?></td>
                    <td><?= $atividade->id_ponto->data_atual ?></td>
                    <td align="center">
                        <a href="form_alterar_atividade.php?id=<?= $atividade->id ?>"><img src="imagens/alterar.svg" width="22" height="22" /></a>
                        <a href="#" onclick="excluir(<?= $atividade->id ?>, '<?= $atividade->id_ponto->data_atual ?>')"><img src="imagens/excluir.svg" width="22" height="22" /></a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>

    </body>
</html>
