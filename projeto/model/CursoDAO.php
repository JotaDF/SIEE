<?php

/**
 * Description of CursoDAO
 *
 * @author JWilson
 */
include_once "DataBase.php";
include_once "Curso.php";

class CursoDAO extends DataBase{
    public function inserir(Curso $curso) {
        $sql = "INSERT INTO curso (nome) VALUES('".$curso->nome."')";
        $this->conectar();
        $this->conn->query($sql);
        $this->desconectar();
    }
    public function listar() {
        $sql = "SELECT * FROM curso ";
        $this->conectar();
        $rs = $this->conn->query($sql);
        $array_curso = array();
        while ($row = $rs->fetch_assoc()) {
            $m = new Curso();
            $m->setId($row["id"]);
            $m->setNome($row["nome"]);
            $array_curso[] = $m;
        }
        $this->desconectar();
        return $array_curso;
    }
    public function excluir($id) {
        $sql = "DELETE FROM curso WHERE id=".$id;
        $this->conectar();
        $this->conn->query($sql);
        $this->desconectar();
    }
    public function alterar(Curso $curso) {
        $sql = "UPDATE curso SET nome='".$curso->nome."' " . "WHERE id=".$curso->id;
        $this->conectar();
        $this->conn->query($sql);
        $this->desconectar();
    }
    public function carregarPorId($id) {
        $sql = "SELECT * FROM curso WHERE id=".$id;
        $this->conectar();
        $rs = $this->conn->query($sql);
        $m = new Curso();
        while ($row = $rs->fetch_assoc()) {
            $m->setId($row["id"]);
            $m->setNome($row["nome"]);
        }
        $this->desconectar();
        return $m;
    }    
}
