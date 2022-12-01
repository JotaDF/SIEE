<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once "../model/CoordenadorDAO.php";
include_once "../model/Coordenador.php";
include_once "../model/Curso.php";
// put your code here

$id = $_REQUEST["id"];
$cpf = $_REQUEST["cpf"];
$nome = $_REQUEST["nome"];
$graduacao =  $_REQUEST["graduacao"];
$pos_graduacao =  $_REQUEST["pos_graduacao"];
$telefone =  $_REQUEST["telefone"];
$email =  $_REQUEST["email"];
$nucleo =  $_REQUEST["nucleo"];
$turno =  $_REQUEST["turno"];
$id_curso =  $_REQUEST["id_curso"];
$senha =  $_REQUEST["senha"];

$coord = new Coordenador();
$coord->setId($id);
$coord->setCpf($cpf);
$coord->setNome($nome);
$coord->setGraduacao($graduacao);
$coord->setPos_graduacao($pos_graduacao);
$coord->setTelefone($telefone);
$coord->setEmail($email);
$coord->setNucleo($nucleo);
$coord->setTurno($turno);
$c = new Curso();
$c->setId($id_curso);
$coord->setId_curso($c);
$coord->setSenha($senha);

$coordDAO = new CoordenadorDAO();
$coordDAO->alterar($coord);

header("Location: ../listar_coordenador.php");