<?php
include_once './model/Usuario.php';
include_once './model/Perfil.php';
include_once './model/Menu.php';
session_start();
include('./model/PerfilDAO.php');



$listam = array();


try {
    $u_logado = new Usuario();
    $u_logado = $_SESSION["usuario"];
    if ($u_logado->id > 0) {
        $pDAOm = new PerfilDAO();
        $listam = $pDAOm->listarMenuPerfil($u_logado->getPerfil()->id);
    } else {
        header("Location: login.php");
       
    }
} catch (Exception $exc) {
    header("Location: login.php");
}
?>