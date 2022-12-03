<?php

include_once "../model/ParecerDAO.php";
include_once "../model/Parecer.php";
include_once "../model/Estagiario.php";
include_once "../model/Coordenador.php";

$id = $_REQUEST["id"];
$parecer = $_REQUEST["parecer"];
$id_coordenador = $_REQUEST["id_coordenador"];
$id_estagiario = $_REQUEST["id_estagiario"];

$Parecer = new Parecer();
$Parecer->setId($id);
$Parecer->setParecer($parecer);
$c = new Coordenador();
$c->setId($id_coordenador);
$Parecer->setId_coordenador($c);
$e = new Estagiario();
$e->setId($id_estagiario);
$Parecer->setId_estagiario($e);

$parecerDAO = new ParecerDAO();
$parecerDAO->alterar($Parecer);

var_dump($Parecer);
//header("Location: ../listar_parecer.php");