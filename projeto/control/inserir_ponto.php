<?php

include_once "../model/PontoDAO.php";
include_once "../model/Ponto.php";
include_once "../model/Estagiario.php";

$data = $_REQUEST["data"];
$hora_entrada = $_REQUEST["hora_entrada"];
$hora_saida = $_REQUEST["hora_saida"];
$id_estagiario = $_REQUEST["id_estagiario"];

$ponto = new Ponto();
$ponto->setData($data);
$ponto->setHora_entrada($hora_entrada);
$ponto->setHora_saida($hora_saida);
$e = new Estagiario();
$e->setId($id_estagiario);
$ponto->setId_estagiario($e);

$pontoDAO = new PontoDAO();
$pontoDAO->inserir($ponto);

//header("Location: ../listar_curso.php");