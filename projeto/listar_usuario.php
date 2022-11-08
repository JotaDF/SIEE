<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script lang="javascript">
            function excluir(id, nome) {
                if (confirm("Tem certeza que desja excluir o usuario: " + nome + "?")) {
                    window.open("control/excluir_usuario.php?id=" + id, "_self");
                }
            }
        </script>
    </head>
    <body>
        <?php
        include_once './banner.php';
        ?>
        <h4>Lista de usuários <a href="form_inserir_usuario.php"><img src="imagens/novo.svg" align="center" width="22" height="22" /></a></h4>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>CPF</th>
                <th>NOME</th>
                <th>PEFIL</th>
                <th>OPÇÕES</th>
            </tr>
            <?php
            include_once "./model/UsuarioDAO.php";
            // put your code here
            $uDAO = new UsuarioDAO();
            $lista = array();
            $lista = $uDAO->listar();

            foreach ($lista as $u) {
                $img_situacao = "ativo.svg";
                $title_situacao = "Desativar";
                if($u->situacao == 0){
                    $img_situacao = "inativo.svg";
                    $title_situacao = "Ativar";
                }
                ?>
                <tr>
                    <td><?= $u->id ?></td>
                    <td><?= $u->cpf ?></td>
                    <td><?= $u->nome ?></td>
                    <td><?= $u->perfil->nome ?></td>
                    <td align="center">
                        <a href="control/alterar_situacao_usuario.php?id=<?= $u->id ?>&situacao=<?= $u->situacao ?>"><img src="imagens/<?=$img_situacao ?>" title="<?=$title_situacao ?>" width="22" height="22" /></a>
                        <a href="form_alterar_usuario.php?id=<?= $u->id ?>"><img src="imagens/alterar.svg" width="22" height="22" /></a>
                        <a href="#" onclick="excluir(<?= $u->id ?>, '<?= $u->nome ?>')">
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
