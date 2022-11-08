<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include_once './banner.php';
        ?>
        <?php
        include_once "./model/PerfilDAO.php";
        include_once "./model/Perfil.php";
        
        $id = $_REQUEST["id"];
        
        $pDAO = new PerfilDAO();
        $p = new Perfil();
        $p = $pDAO->carregarPorId($id);
        ?>
        <h4>Gerenciar Menu Perfil</h4>
        <form name="alterar_perfil" method="post" action="control/gerenciar_menu_perfil.php">
            ID:<?=$p->getId() ?><br/>
            Perfil:<?=$p->getNome() ?><br/>
            Descrição:<?=$p->getDescricao() ?><br/>
            <input type="hidden" name="id_perfil" value="<?=$p->getId() ?>"/>
            <input type="hidden" name="op" value="add"/>
                Menu:<select size="1" name="id_menu" required>
                     <option value="">Selecione...</option>
                <?php
                $lista = array();
                $lista = $pDAO->listarMenuNaoPerfil($id);

                foreach ($lista as $m) {
                    ?>
                <option value="<?=$m->id ?>"><?=$m->titulo ?></option>
                    <?php
                }
                ?>  
            </select>
                <input type="submit" value="+" title="Vincular Menu"/>
        </form>
        <hr/>
        <h4>Menus vinculados</h4>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>TÍTULO</th>
                <th>REMOVER</th>
            </tr>
            <?php
            $lista_menu = array();
            $lista_menu = $pDAO->listarMenuPerfil($id);

            foreach ($lista_menu as $m) {
                ?>
                <tr>
                    <td><?= $m->id ?></td>
                    <td><?= $m->titulo ?></td>
                    <td align="center">
                        <a href="control/gerenciar_menu_perfil.php?id_menu=<?=$m->id ?>&id_perfil=<?=$id ?>&op=del">
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