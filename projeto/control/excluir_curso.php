<?php

include_once "../model/CursoDAO.php";

$id = $_REQUEST["id"];

$cDAO = new CursoDAO();

$cDAO->excluir($id);

header("Location: ../listar_curso.php");