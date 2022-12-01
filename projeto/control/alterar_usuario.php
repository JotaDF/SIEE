<?php

include_once "../model/Perfil.php";
include_once "../model/UsuarioDAO.php";
include_once "../model/Usuario.php";
// put your code here

$id = $_REQUEST["id"];
$cpf = $_REQUEST["cpf"];
$nome = $_REQUEST["nome"];
$email = $_REQUEST["email"];
$id_perfil = $_REQUEST["id_perfil"];

$usuario = new Usuario();
$usuario->setId($id);
$usuario->setCpf($cpf);
$usuario->setNome($nome);
$usuario->setEmail($email);
$p = new Perfil();
$p->setId($id_perfil);
$usuario->setPerfil($p);

$pDAO = new UsuarioDAO();
$pDAO->alterar($usuario);

header("Location: ../listar_usuario.php");