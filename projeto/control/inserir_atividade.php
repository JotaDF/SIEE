<?php

include_once "../model/AtividadeDAO.php";
include_once "../model/Atividade.php";
include_once "../model/Ponto.php";

$atv = $_REQUEST["atividade"];
$id_ponto = $_REQUEST["id_ponto"];

$atividade = new Atividade();
$atividade->setAtividade($atv);
$ponto= new Ponto();
$ponto->setId($id_ponto);
$atividade->setId_ponto($ponto);

$atividadeDAO = new AtividadeDAO();
$atividadeDAO->inserir($atividade);

header("Location: ../listar_atividade.php");