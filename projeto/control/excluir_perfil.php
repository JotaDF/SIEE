<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once "../model/PerfilDAO.php";

$id = $_REQUEST["id"];

$pDAO = new PerfilDAO();

$pDAO->excluir($id);

header("Location: ../listar_perfil.php");