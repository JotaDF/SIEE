<?php

include_once "../model/Perfil.php";
include_once "../model/UsuarioDAO.php";
include_once "../model/Usuario.php";
// put your code here

$cpf = $_REQUEST["cpf"];
$nome = $_REQUEST["nome"];
$email = $_REQUEST["email"];
$senha = $_REQUEST["senha"];
$id_perfil = $_REQUEST["id_perfil"];

$usuario = new Usuario();
$usuario->setCpf($cpf);
$usuario->setNome($nome);
$usuario->setEmail($email);
$usuario->setSenha($senha);
$p = new Perfil();
$p->setId($id_perfil);
$usuario->setPerfil($p);

$pDAO = new UsuarioDAO();
$pDAO->inserir($usuario);

header("Location: ../listar_usuario.php");