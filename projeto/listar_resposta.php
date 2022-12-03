<?php 
//include_once "verifica_login.php"
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script lang="javascript">
            function excluir(id, id) {
                if (confirm("Tem certeza que desja excluir o ponto: " + id + "?")) {
                    window.open("control/excluir_resposta.php?id=" + id, "_self");
                }
            }
        </script>
    </head>
    <body>
        <?php
        //include_once './banner.php';
        ?>
        <h4>Lista de Resposta <a href="form_inserir_resposta.php"><img src="imagens/novo.svg" align="center" width="22" height="22" /></a></h4>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>CURSO</th>
                <th>QUESTAO 1</th>
                <th>QUESTAO 2</th>
                <th>QUESTAO 3</th>
                <th>QUESTAO 4</th>
                <th>QUESTAO 5</th>
                <th>QUESTAO 6</th>
                <th>ESTAGIARIO</th>
            </tr>
            <?php
            include_once "./model/RespostaDAO.php";
            include_once "./model/Resposta.php";
            // put your code here
            $respostaDAO = new RespostaDAO();
            $lista = array();
            $lista = $respostaDAO->listar();

            foreach ($lista as $resposta) {
                ?>
                <tr>
                    <td><?= $resposta->id ?></td>
                    <td><?= $resposta->id_curso->nome ?></td>
                    <td><?= $resposta->questao1 ?></td>
                    <td><?= $resposta->questao2 ?></td>
                    <td><?= $resposta->questao3 ?></td>
                    <td><?= $resposta->questao4 ?></td>
                    <td><?= $resposta->questao5 ?></td>
                    <td><?= $resposta->questao6 ?></td>
                    <td><?= $resposta->id_estagiario->nome ?></td>
                    
                    <td align="center">
                        <a href="form_alterar_resposta.php?id=<?= $resposta->id ?>"><img src="imagens/alterar.svg" width="22" height="22" /></a>
                        <a href="#" onclick="excluir(<?= $resposta->id ?>, '<?= $resposta->id ?>')"><img src="imagens/excluir.svg" width="22" height="22" /></a>
                    </td>
                     
                </tr>
                <?php
            }
            ?>

        </table>

    </body>
</html>
