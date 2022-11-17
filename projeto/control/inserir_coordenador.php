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

$coordenador = new Coordenador();
$coordenador->setCpf($cpf);
$coordenador->setNome($nome);
$coordenador->setGraduacao($graduacao);
$coordenador->setPos_graduacao($pos_graduacao);
$coordenador->setTelefone($telefone);
$coordenador->setEmail($email);
$coordenador->setNucleo($nucleo);
$coordenador->setTurno($turno);
$c = new Curso();
$c->setId($id_curso);
$coordenador->setId_curso($c);
$coordenador->setSenha($senha);

$coordDAO = new CoordenadorDAO();
$coordDAO->inserir($coordenador);

header("Location: ../listar_coordenador.php");