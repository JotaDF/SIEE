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
                if (confirm("Tem certeza que desja excluir o ponto: " + nome + "?")) {
                    window.open("control/excluir_ponto.php?id=" + id, "_self");
                }
            }
        </script>
    </head>
    <body>
        <?php
        //include_once './banner.php';
        ?>
        <h4>Folha de Ponto <a href="form_inserir_ponto.php"><img src="imagens/novo.svg" align="center" width="22" height="22" /></a></h4>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>DATA</th>
                <th>HORA DE ENTRADA</th>
                <th>HORA DE SAIDA</th>
                <th>NOME</th>
            </tr>
            <?php
            include_once "./model/PontoDAO.php";
            include_once "./model/Ponto.php";
            // put your code here
            $pontoDAO = new PontoDAO();
            $lista = array();
            $lista = $pontoDAO->listar();

            foreach ($lista as $ponto) {
                ?>
                <tr>
                    <td><?= $ponto->id ?></td>
                    <td><?= $ponto->data_atual ?></td>
                    <td><?= $ponto->hora_entrada ?></td>
                    <td><?= $ponto->hora_saida ?></td>
                    <td><?= $ponto->id_estagiario->nome ?></td>
                    <td align="center">
                        <a href="form_alterar_ponto.php?id=<?= $ponto->id ?>"><img src="imagens/alterar.svg" width="22" height="22" /></a>
                        <a href="#" onclick="excluir(<?= $ponto->id ?>, '<?= $ponto->nome ?>')"><img src="imagens/excluir.svg" width="22" height="22" /></a>
                    </td>
                </tr>
                <?php
            }
            ?>

        </table>

    </body>
</html>
