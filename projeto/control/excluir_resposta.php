<?php
include_once "../model/RespostaDAO.php";

$id = $_REQUEST["id"];

$respostaDAO = new RespostaDAO();

$respostaDAO->excluir($id);

header("Location: ../listar_resposta.php");

?>