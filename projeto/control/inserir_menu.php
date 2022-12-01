<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once "../model/MenuDAO.php";
include_once "../model/Menu.php";
// put your code here

$titulo = $_REQUEST["titulo"];
$link = $_REQUEST["link"];

$menu = new Menu();
$menu->setTitulo($titulo);
$menu->setLink($link);

$mDAO = new MenuDAO();
$mDAO->inserir($menu);

header("Location: ../listar_menu.php");