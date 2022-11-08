<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once "../model/MenuDAO.php";

$id = $_REQUEST["id"];

$mDAO = new MenuDAO();

$mDAO->excluir($id);

header("Location: ../listar_menu.php");