<?php

include_once "../model/MenuDAO.php";
include_once "../model/Menu.php";

$id = $_REQUEST["id"];
$titulo = $_REQUEST["titulo"];
$link = $_REQUEST["link"];

$m = new Menu();
$m->setId($id);
$m->setTitulo($titulo);
$m->setLink($link);

$mDAO = new MenuDAO();
$mDAO->alterar($m);

header("Location: ../listar_menu.php");
