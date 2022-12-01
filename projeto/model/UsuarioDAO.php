<?php

include_once "Usuario.php";
include_once "Coordenador.php";
include_once "CoordenadorDAO.php";
include_once "PerfilDAO.php";
include_once "Estagiario.php";
include_once "EstagiarioDAO.php";
include_once "DataBase.php";

class UsuarioDAO extends DataBase {

    public function loginUsuario($login, $senha){
        $usuario = new Usuario();
        if ($this->verificaCoord($login,$senha)){
            $usuario = $this->carregaCoord($login, $senha);
            return $usuario;
        } elseif ($this->verificaEstag($login, $senha)){
            $usuario = $this->carregaEstag($login, $senha);
            return $usuario;
        }
        
        return new Usuario();
    }

    public function carregaCoord($login,$senha){
        $sql = "SELECT *, MD5('".$senha."') FROM coordenador WHERE cpf='".$login."'";
        $this->conectar();
        $rs = $this->conn->query($sql);
        $usuario = new Usuario();     
        if ($row = $rs->fetch_assoc()) {
            $sql1 = "SELECT id, nome, id_perfil FROM coordenador WHERE cpf='".$login."' AND senha=md5('".$senha."')";
            $rs1 = $this->conn->query($sql1);
            if ($this->row = $rs1->fetch_assoc()) {
                $usuario->setId($row["id"]);
                $usuario->setNome($row["nome"]);
                $pDAO = new PerfilDAO();
                $usuario->setPerfil($pDAO->carregarPorId($row["id_perfil"]));
            }
        }
        $this->desconectar();
        return $usuario;
    }

    public function carregaEstag($login,$senha){
        $sql = "SELECT *, MD5('".$senha."') FROM estagiario WHERE matricula='".$login."'";
        $this->conectar();
        $rs = $this->conn->query($sql);
        $usuario = new Usuario();     
        if ($row = $rs->fetch_assoc()) {
            $sql1 = "SELECT id, nome, id_perfil FROM estagiario WHERE matricula='".$login."' AND senha=md5('".$senha."')";
            $rs1 = $this->conn->query($sql1);
            if ($this->row = $rs1->fetch_assoc()) {
                $usuario->setId($row["id"]);
                $usuario->setNome($row["nome"]);
                $pDAO = new PerfilDAO();
                $usuario->setPerfil($pDAO->carregarPorId($row["id_perfil"]));
            }
        }
        $this->desconectar();
        return $usuario;
    }

    public function verificaEstag($login, $senha){

        $sql = "SELECT MD5('".$senha."') senhav FROM estagiario WHERE matricula='". $login."'";
        $this->conectar();
        $rs = $this->conn->query($sql);
        if ($row = $rs->fetch_assoc()) {
            $sql1 = "SELECT id FROM estagiario WHERE matricula='".$login."' AND senha=md5('".$senha."')";
            $rs1 = $this->conn->query($sql1);
            if ($this->row = $rs1->fetch_assoc()) {
                return true;
            }
        }
        $this->desconectar();
        return false;

    }

    public function verificaCoord($login, $senha){

        $sql = "SELECT MD5('".$senha."') senhav FROM coordenador WHERE cpf='". $login."'";
        $this->conectar();
        $rs = $this->conn->query($sql);
        if ($row = $rs->fetch_assoc()) {
            $sql1 = "SELECT id FROM coordenador WHERE cpf='".$login."' AND senha=md5('".$senha."')";
            $rs1 = $this->conn->query($sql1);
            if ($this->row = $rs1->fetch_assoc()) {
                return true;
            }
        }
        $this->desconectar();
        return false;

    }

}
