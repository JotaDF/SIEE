<?php
include_once "../model/PontoDAO.php";

$id = $_REQUEST["id"];

$pontoDAO = new pontoDAO();

$pontoDAO->excluir($id);

header("Location: ../listar_ponto.php");

?>