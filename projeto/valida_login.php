<?php

session_start();

include_once "./model/UsuarioDAO.php";


$login = $_REQUEST["login"];
$senha = $_REQUEST["senha"];

$uDAO = new UsuarioDAO();
$u = new Usuario();
try {
    $u = $uDAO->loginUsuario($login, $senha);
   
    if(!is_null($u)){
        if ($u->getId() > 0) {
            $_SESSION["usuario"] = $u;
            header("Location: index.php");
        } else {
            header("Location: login.php?m=1");
        }
    }
} catch (Exception $exc) {
    header("Location: login.php?m=1");
}

