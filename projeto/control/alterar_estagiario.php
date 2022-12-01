<?php

include_once "../model/EstagiarioDAO.php";
include_once "../model/Estagiario.php";
include_once "../model/Curso.php";

$id = $_REQUEST["id"];
$matricula = $_REQUEST["matricula"];
$senha = $_REQUEST["senha"];
$nome = $_REQUEST["nome"];
$endereco = $_REQUEST["endereco"];
$telefone = $_REQUEST["telefone"];
$celular = $_REQUEST["celular"];
$email = $_REQUEST["email"];
$periodo = $_REQUEST["periodo"];
$turma = $_REQUEST["turma"];
$turno = $_REQUEST["turno"];
$composicao_carga_horaria = $_REQUEST["composicao_carga_horaria"];
$carga_horaria = $_REQUEST["carga_horaria"];
$data_inicio = $_REQUEST["data_inicio"];
$data_termino = $_REQUEST["data_termino"];
$data_inicio_aditivo = $_REQUEST["data_inicio_aditivo"];
$data_termino_aditivo = $_REQUEST["data_termino_aditivo"];
$data_recisao = $_REQUEST["data_recisao"];
$apolice = $_REQUEST["apolice"];
$seguradora = $_REQUEST["seguradora"];
$id_curso = $_REQUEST["id_curso"];

$estagiario = new Estagiario();
$estagiario->setId($id);
$estagiario->setMatricula($matricula);
$estagiario->setSenha($senha);
$estagiario->setNome($nome);
$estagiario->setEndereco($endereco);
$estagiario->setTelefone($telefone);
$estagiario->setCelular($celular);
$estagiario->setEmail($email);
$estagiario->setPeriodo($periodo);
$estagiario->setTurma($turma);
$estagiario->setTurno($turno);
$estagiario->setComposicao_carga_horaria($composicao_carga_horaria);
$estagiario->setCarga_horaria($carga_horaria);
$estagiario->setData_inicio($data_inicio);
$estagiario->setData_termino($data_termino);
$estagiario->setData_inicio_aditivo($data_inicio_aditivo);
$estagiario->setData_termino_aditivo($data_termino_aditivo);
$estagiario->setData_recisao($data_recisao);
$estagiario->setApolice($apolice);
$estagiario->setSeguradora($seguradora);
$curso = new Curso();
$curso->setId($id_curso);
$estagiario->setId_curso($curso);

$estagiarioDAO = new EstagiarioDAO();
$estagiarioDAO->alterar($estagiario);

header("Location: ../listar_estagiario.php");