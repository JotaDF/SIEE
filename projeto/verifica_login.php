<?php
session_start();
include_once "./model/PerfilDAO.php";
include_once "./model/Usuario.php";

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
    header("Location: login.php");
}
?>