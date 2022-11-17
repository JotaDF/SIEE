<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once "../model/CoordenadorDAO.php";

$id = $_REQUEST["id"];

$coordDAO = new CoordenadorDAO();

$coordDAO->excluir($id);

header("Location: ../listar_coordenador.php");