<?php

/**
 * Description of PerfilDAO
 *
 * @author JWilson
 */

include_once "DataBase.php";
include_once "Perfil.php";
include_once "Menu.php";

class PerfilDAO extends DataBase {
    //put your code here
    public function inserir(Perfil $perfil) {
        $sql = "INSERT INTO perfil (nome, descricao) VALUES('".$perfil->nome."','".$perfil->descricao."')";
        $this->conectar();
        $this->conn->query($sql);
        $this->desconectar();
    }
    public function listar() {
        $sql = "SELECT * FROM perfil ";
        $this->conectar();
        $rs = $this->conn->query($sql);
        $array_perfil = array();
        while ($row = $rs->fetch_assoc()) {
            $p = new Perfil();
            $p->setId($row["id"]);
            $p->setNome($row["nome"]);
            $p->setDescricao($row["descricao"]);
            $array_perfil[] = $p;
        }
        $this->desconectar();
        return $array_perfil;
    }
    public function excluir($id) {
        $sql = "DELETE FROM perfil WHERE id=".$id;
        $this->conectar();
        $this->conn->query($sql);
        $this->desconectar();
    }
    public function alterar(Perfil $perfil) {
        $sql = "UPDATE perfil SET nome='".$perfil->nome."', "
                . "descricao='".$perfil->descricao."' "
                . "WHERE id=".$perfil->id;
        $this->conectar();
        $this->conn->query($sql);
        $this->desconectar();
    }
    public function carregarPorId($id) {
        $sql = "SELECT * FROM perfil WHERE id=".$id;
        $this->conectar();
        $rs = $this->conn->query($sql);
        $p = new Perfil();
        while ($row = $rs->fetch_assoc()) {
            $p->setId($row["id"]);
            $p->setNome($row["nome"]);
            $p->setDescricao($row["descricao"]);
        }
        $this->desconectar();
        return $p;
    }    
    public function vincularMenu($id_perfil, $id_menu) {
        $sql = "INSERT INTO perfil_menu (id_perfil, id_menu) VALUES(".$id_perfil.",".$id_menu.")";
        $this->conectar();
        $this->conn->query($sql);
        $this->desconectar();
    }
    public function desvincularMenu($id_perfil, $id_menu) {
        $sql = "DELETE FROM perfil_menu WHERE id_perfil=".$id_perfil . " AND id_menu=".$id_menu;
        $this->conectar();
        $this->conn->query($sql);
        $this->desconectar();
    }
    public function listarMenuPerfil($id_perfil) {
        $sql = "SELECT m.* FROM menu m, perfil_menu pm"
             . " WHERE m.id=pm.id_menu AND pm.id_perfil=".$id_perfil;
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
    public function listarMenuNaoPerfil($id_perfil) {
        $sql = "SELECT id_menu FROM perfil_menu "
             . " WHERE id_perfil=".$id_perfil;  
        $sql_v = "SELECT m.* FROM menu m WHERE m.id NOT IN(".$sql.")";
        $this->conectar();
        $rs = $this->conn->query($sql_v);
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
}
