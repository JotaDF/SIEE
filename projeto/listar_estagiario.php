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
                    window.open("control/excluir_estagiario.php?id=" + id, "_self");
                }
            }
        </script>
    </head>
    <body>
        <?php
        //include_once './banner.php';
        ?>
        <h4>Lista de Estagiarios <a href="form_inserir_estagiario.php"><img src="imagens/novo.svg" align="center" width="22" height="22" /></a></h4>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>MATRICULA</th>
                <th>SENHA</th>
                <th>NOME</th>
                <th>ENDEREÇO</th>
                <th>TELEFONE</th>
                <th>CELULAR</th>
                <th>E-MAIL</th>
                <th>PERIODO</th>
                <th>TURMA</th>
                <th>TURNO</th>
                <th>COMPASIÇÃO DA CARGA HORARIA</th>
                <th>DATA DE INICIO</th>
                <th>DATA DE TERMINO</th>
                <th>DATA DE INICIO ADITIVO</th>
                <th>DATA DE TERMINO ADITIVO</th>
                <th>DATA DE RECISAO</th>
                <th>APOLICE</th>
                <th>SEGURADORA</th>
                <th>CURSO</th>
            </tr>
            <?php
            include_once "./model/EstagiarioDAO.php";
            include_once "./model/EstagiarioDAO.php";
            // put your code here
            $estagiarioDAO = new EstagiarioDAO();
            $lista = array();
            $lista = $estagiarioDAO->listar();

            foreach ($lista as $estagiario) {
                ?>
                <tr>
                    <td><?= $estagiario->id ?></td>
                    <td><?= $estagiario->matricula ?></td>
                    <td><?= $estagiario->senha ?></td>
                    <td><?= $estagiario->nome ?></td>
                    <td><?= $estagiario->endereco ?></td>
                    <td><?= $estagiario->telefone ?></td>
                    <td><?= $estagiario->celular ?></td>
                    <td><?= $estagiario->email ?></td>
                    <td><?= $estagiario->periodo ?></td>
                    <td><?= $estagiario->turma ?></td>
                    <td><?= $estagiario->turno ?></td>
                    <td><?= $estagiario->composicao_carga_horaria ?></td>
                    <td><?= $estagiario->carga_horaria ?></td>
                    <td><?= $estagiario->data_inicio ?></td>
                    <td><?= $estagiario->data_termino ?></td>
                    <td><?= $estagiario->data_inicio_aditivo ?></td>
                    <td><?= $estagiario->data_termino_aditivo ?></td>
                    <td><?= $estagiario->data_recisao ?></td>
                    <td><?= $estagiario->apolicE ?></td>
                    <td><?= $estagiario->seguradora ?></td>
                    <td><?= $estagiario->id_curso->nome ?></td>
                    <td align="center">
                        <a href="form_alterar_estagiario.php?id=<?= $estagiario->id ?>"><img src="imagens/alterar.svg" width="22" height="22" /></a>
                        <a href="#" onclick="excluir(<?= $estagiario->id ?>, '<?= $estagiario->nome ?>')"><img src="imagens/excluir.svg" width="22" height="22" /></a>
                    </td>
                </tr>
                <?php
            }
            ?>

        </table>

    </body>
</html>
