<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once "../model/PerfilDAO.php";
include_once "../model/Perfil.php";
// put your code here

$nome = $_REQUEST["nome"];
$descricao = $_REQUEST["descricao"];

$perfil = new Perfil();
$perfil->setNome($nome);
$perfil->setDescricao($descricao);

$pDAO = new PerfilDAO();
$pDAO->inserir($perfil);

header("Location: ../listar_perfil.php");