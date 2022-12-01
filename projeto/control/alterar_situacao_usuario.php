<?php

include_once "../model/UsuarioDAO.php";

$id = $_REQUEST["id"];
$situacao = $_REQUEST["situacao"];

echo 'ID: ' . $id . "<BR/> SITUACAO: ".$situacao;


if($situacao == 1){
    $situacao = 0;
} else {
    $situacao = 1;
}

echo '<BR/> ID: ' . $id . "<BR/> SITUACAO: ".$situacao;


$pDAO = new UsuarioDAO();
$pDAO->alterarSituacao($id,$situacao);

header("Location: ../listar_usuario.php");