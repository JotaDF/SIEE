<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once "../model/UsuarioDAO.php";

$id = $_REQUEST["id"];

$uDAO = new UsuarioDAO();

$uDAO->excluir($id);

header("Location: ../listar_usuario.php");