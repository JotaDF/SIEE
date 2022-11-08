<?php
include_once "./model/PerfilDAO.php";
include_once "./model/Usuario.php";
session_start();
$listam = array();
try {
    $u_logado = new Usuario();
    $u_logado = $_SESSION["usuario"];
    if ($u_logado->id > 0) {
        $pDAOm = new PerfilDAO();
        $listam = $pDAOm->listarMenuPerfil($u_logado->perfil->id);
    } else {
        header("Location: login.php");
    }
} catch (Exception $exc) {
    echo $exc->getTraceAsString();
}
?>
<table>
    <tr>
        <td><a href="index.php">Início</a> </td>
        <?php
        foreach ($listam as $umenu) {
            ?>
            <td><a href="<?= $umenu->link ?>"><?= $umenu->titulo ?></a> </td>
            <?php
        }
        ?>
        <td><a href="sair.php">(Sair)</a> </td>
    </tr>
</table>



