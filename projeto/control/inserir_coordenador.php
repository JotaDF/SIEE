<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once "../model/CoordenadorDAO.php";
include_once "../model/Coordenador.php";
// put your code here



$cpf = $_REQUEST["cpf"];
$nome = $_REQUEST["nome"];
$graduacao =  $_REQUEST["graduacao"];
$pos_graduacao =  $_REQUEST["pos_graduacao"];
$telefone =  $_REQUEST["telefone"];
$email =  $_REQUEST["email "];
$nucleo =  $_REQUEST["nucleo "];
$turno =  $_REQUEST["turno"];
$senha =  $_REQUEST["senha"];
$id_curso =  $_REQUEST["id_curso"];


$coordenador = new Coordenador();
$coordenador->setCpf($cpf);
$coordenador->setNome($nome);
$coordenador->setGraduacao($cpf);
$coordenador->setPos_graduacao($nome);
$coordenador->setTelefone($cpf);
$coordenador->setEmail($nome);
$coordenador->setNucleo($cpf);
$coordenador->setTurno($nome);
$coordenador->setSenha($cpf);
$coordenador->setId_curso($id_curso);



$mDAO = new CoordenadorDAO();
$mDAO->inserir($coordenador);

header("Location: ../listar_coordenador.php");