<?php
include_once "../model/EstagiarioDAO.php";

$id = $_REQUEST["id"];

$estagiarioDAO = new EstagiarioDAO();

$estagiarioDAO->excluir($id);

header("Location: ../listar_estagiario.php");

?>