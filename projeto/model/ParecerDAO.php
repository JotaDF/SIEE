<?php

include_once "Coordenador.php";
include_once "CoordenadorDAO.php";
include_once "EstagiarioDAO.php";
include_once "Estagiario.php";
include_once "DataBase.php";

class ParecerDAO extends DataBase {

    public function inserir(Parecer $Parecer) {
        $sql = "INSERT INTO parecer (parecer, id_coordenador, id_estagiario) 
        VALUES ('" . $Parecer->parecer . "'," . $Parecer->id_coordenador->id . "," . $Parecer->id_estagiario->id . ");";
        $this->conectar();
        $this->conn->query($sql);
        $this->desconectar();
    }

    
    public function listar() {
        $sql = "SELECT * FROM parecer ";
        $this->conectar();
        $rs = $this->conn->query($sql);
        $array_parecer = array();
        while ($row = $rs->fetch_assoc()) {
            $parecer = new Parecer();
            $parecer->setId($row["id"]);
            $parecer->setParecer($row["parecer"]);
            $parecerDAO = new EstagiarioDAO();
            $parecer->setId_estagiario($parecerDAO->carregarPorId($row["id_estagiario"]));
            $parecerDAO = new CoordenadorDAO();
            $parecer->setId_coordenador($parecerDAO->carregarPorId($row["id_coordenador"]));
            $array_parecer[] = $parecer;
        }
        $this->desconectar();
        return $array_parecer;
    }
    
    public function excluir($id) {
        $sql = "DELETE FROM parecer WHERE id=" . $id;
        $this->conectar();
        $this->conn->query($sql);
        $this->desconectar();
    }

    // bug
    public function alterar(Parecer $Parecer) {
        $sql = "UPDATE parecer SET parecer='" . $Parecer->parecer . "', "
        . " id_estagiario=" . $Parecer->id_estagiario->id . ", "
        . " id_coordenador=" . $Parecer->id_coordenador->id  . " "
        . "WHERE id=". $Parecer->id;
        $this->conectar();
        $this->conn->query($sql);
        $this->desconectar();
    }
    
    /*
    public function alterarSituacao($id, $situacao) {
        $sql = "UPDATE coordenador SET situacao='" . $situacao . "' "
                . "WHERE id=" . $id;
        $this->conectar();
        $this->conn->query($sql);
        $this->desconectar();
    }
    */


    public function carregarPorId($id) {
        $sql = "SELECT * FROM parecer WHERE id=" . $id;
        $this->conectar();
        $rs = $this->conn->query($sql);
        $parecer = new Parecer();
        while ($row = $rs->fetch_assoc()) {
            $parecer->setId($row["id"]);
            $parecer->setParecer($row["parecer"]);
            $parecerDAO = new EstagiarioDAO();
            $parecer->setId_estagiario($parecerDAO->carregarPorId($row["id_estagiario"]));
            $parecerDAO = new CoordenadorDAO();
            $parecer->setId_coordenador($parecerDAO->carregarPorId($row["id_coordenador"]));
        }
        $this->desconectar();
        return $parecer;
    }


    /*
    public function validaLogin($parecerpf, $senha) {
        $sql = "SELECT *, MD5('".$senha."') senhav FROM coordenador WHERE cpf='" . $parecerpf . "'";
        ;
        $this->conectar();
        $rs = $this->conn->query($sql);
        $parecer = new coordenador();
        if ($row = $rs->fetch_assoc()) {
            if ($row["senhav"] === $row["senha"]) {
                $parecer->setId($row["id"]);
                $parecer->setNome($row["nome"]);
                $parecer->setCpf($row["cpf"]);
                $parecer->setSenha($row["senha"]);
                $parecer->setEmail($row["email"]);
                $pDAO = new PerfilDAO();
               // $parecer->setPerfil($pDAO->carregarPorId($row["id_perfil"]));
            }
        }
        $this->desconectar();
        return $parecer;
    }
    */

}
