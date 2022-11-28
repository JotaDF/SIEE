<?php

include_once "../model/RespostaDAO.php";
include_once "../model/Resposta.php";
include_once "../model/Curso.php";
include_once "../model/Estagiario.php";

$id_curso = $_REQUEST["id_curso"];
$questao1 = $_REQUEST["questao1"];
$questao2 = $_REQUEST["questao2"];
$questao3 = $_REQUEST["questao3"];
$questao4 = $_REQUEST["questao4"];
$questao5 = $_REQUEST["questao5"];
$questao6 = $_REQUEST["questao6"];
$id_estagiario = $_REQUEST["id_estagiario"];

$resposta = new Resposta();
$c = new Curso();
$c->setId($id_curso);
$resposta->setId_Curso($c);
$resposta->setQuestao1($questao1);
$resposta->setQuestao2($questao2);
$resposta->setQuestao3($questao3);
$resposta->setQuestao4($questao4);
$resposta->setQuestao5($questao5);
$resposta->setQuestao6($questao6);
$e = new Estagiario();
$e->setId($id_estagiario);
$resposta->setId_estagiario($e);

$respostaDAO = new RespostaDAO();
$respostaDAO->inserir($resposta);

//header("Location: ../listar_resposta.php");