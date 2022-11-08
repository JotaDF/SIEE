<?php

session_start();

include_once "./model/UsuarioDAO.php";


$cpf = $_REQUEST["cpf"];
$senha = $_REQUEST["senha"];

$uDAO = new UsuarioDAO();
$u = new Usuario();
try {
    $u = $uDAO->validaLogin($cpf, $senha);

    if ($u->getId() > 0) {
        $_SESSION["usuario"] = $u;
        header("Location: index.php");
    } else {
        header("Location: login.php?m=1");
    }
} catch (Exception $exc) {
    header("Location: login.php?m=1");
}

