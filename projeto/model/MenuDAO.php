<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MenuDAO
 *
 * @author JWilson
 */
include_once "DataBase.php";
include_once "Menu.php";

class MenuDAO extends DataBase{
    public function inserir(Menu $menu) {
        $sql = "INSERT INTO menu (titulo, link) VALUES('".$menu->titulo."','".$menu->link."')";
        $this->conectar();
        $this->conn->query($sql);
        $this->desconectar();
    }
    public function listar() {
        $sql = "SELECT * FROM menu ";
        $this->conectar();
        $rs = $this->conn->query($sql);
        $array_menu = array();
        while ($row = $rs->fetch_assoc()) {
            $m = new Menu();
            $m->setId($row["id"]);
            $m->setTitulo($row["titulo"]);
            $m->setLink($row["link"]);
            $array_menu[] = $m;
        }
        $this->desconectar();
        return $array_menu;
    }
    public function excluir($id) {
        $sql = "DELETE FROM menu WHERE id=".$id;
        $this->conectar();
        $this->conn->query($sql);
        $this->desconectar();
    }
    public function alterar(Menu $menu) {
        $sql = "UPDATE menu SET titulo='".$menu->titulo."', "
                . "link='".$menu->link."' "
                . "WHERE id=".$menu->id;
        $this->conectar();
        $this->conn->query($sql);
        $this->desconectar();
    }
    public function carregarPorId($id) {
        $sql = "SELECT * FROM menu WHERE id=".$id;
        $this->conectar();
        $rs = $this->conn->query($sql);
        $m = new Menu();
        while ($row = $rs->fetch_assoc()) {
            $m->setId($row["id"]);
            $m->setTitulo($row["titulo"]);
            $m->setLink($row["link"]);
        }
        $this->desconectar();
        return $m;
    }    
}
