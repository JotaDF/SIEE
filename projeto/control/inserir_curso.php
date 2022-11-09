<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once "../model/CursoDAO.php";
include_once "../model/Curso.php";
// put your code here

$nome = $_REQUEST["nome"];

$curso = new Curso();
$curso->setNome($nome);

$cDAO = new CursoDAO();
$cDAO->inserir($curso);

header("Location: ../listar_curso.php");