<?php

include_once "../model/PerfilDAO.php";

$id_perfil = $_REQUEST["id_perfil"];
$id_menu = $_REQUEST["id_menu"];
$op = $_REQUEST["op"];

$pDAO = new PerfilDAO();
if ($op === "add") {
    $pDAO->vincularMenu($id_perfil, $id_menu);
} else if ($op === "del") {
    $pDAO->desvincularMenu($id_perfil, $id_menu);
}

header("Location: ../form_gerenciar_menu_perfil.php?id=".$id_perfil);
