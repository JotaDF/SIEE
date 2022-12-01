<?php
include_once "../model/AtividadeDAO.php";

$id = $_REQUEST["id"];

$atividadeDAO = new AtividadeDAO();

$atividadeDAO->excluir($id);

header("Location: ../listar_atividade.php");

?>