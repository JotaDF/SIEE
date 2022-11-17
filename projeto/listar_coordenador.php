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
                    window.open("control/excluir_coordenador.php?id=" + id, "_self");
                }
            }
        </script>
    </head>
    <body>
        <?php
        //include_once './banner.php';
        ?>
        <h4>Lista de Coordenadores <a href="form_inserir_coordenador.php"><img src="imagens/novo.svg" align="center" width="22" height="22" /></a></h4>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>CPF</th>
                <th>NOME</th>
                <th>GRADUAÇÃO</th>
                <th>POS_GRADUAÇÃO</th>
                <th>TELEFONE</th>
                <th>E-MAIL</th>
                <th>NUCLEO</th>
                <th>TURNO</th>
                <th>SENHA</th>
                <th>CURSO</th>
            </tr>
            <?php
            include_once "./model/CursoDAO.php";
            include_once "./model/CoordenadorDAO.php";
            // put your code here
            $coordDAO = new CoordenadorDAO();
            $lista = array();
            $lista = $coordDAO->listar();

            foreach ($lista as $coord) {
                ?>
                <tr>
                    <td><?= $coord->id ?></td>
                    <td><?= $coord->cpf ?></td>
                    <td><?= $coord->nome ?></td>
                    <td><?= $coord->graduacao ?></td>
                    <td><?= $coord->pos_graduacao ?></td>
                    <td><?= $coord->telefone ?></td>
                    <td><?= $coord->email ?></td>
                    <td><?= $coord->nucleo ?></td>
                    <td><?= $coord->turno ?></td>
                    <td><?= $coord->senha ?></td>
                    <td><?= $coord->id_curso->nome ?></td>
                    <td align="center">
                        <a href="form_alterar_coordenador.php?id=<?= $coord->id ?>"><img src="imagens/alterar.svg" width="22" height="22" /></a>
                        <a href="#" onclick="excluir(<?= $coord->id ?>, '<?= $coord->nome ?>')"><img src="imagens/excluir.svg" width="22" height="22" /></a>
                    </td>
                </tr>
                <?php
            }
            ?>

        </table>

    </body>
</html>
