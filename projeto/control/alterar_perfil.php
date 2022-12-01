<?php

include_once "../model/PerfilDAO.php";
include_once "../model/Perfil.php";

$id = $_REQUEST["id"];
$nome = $_REQUEST["nome"];
$descricao = $_REQUEST["descricao"];

$p = new Perfil();
$p->setId($id);
$p->setNome($nome);
$p->setDescricao($descricao);

$pDAO = new PerfilDAO();
$pDAO->alterar($p);

header("Location: ../listar_perfil.php");
