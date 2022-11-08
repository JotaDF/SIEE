<?php

include_once "PerfilDAO.php";
include_once "Usuario.php";
include_once "DataBase.php";

/**
 * Description of UsuarioDAO
 *
 * @author JWilson
 */
class UsuarioDAO extends DataBase {

    public function inserir(Usuario $usuario) {
        $sql = "INSERT INTO usuario (cpf,nome,email,senha,situacao,id_perfil)"
                . " VALUES('" . $usuario->cpf . "','" . $usuario->nome . "','" . $usuario->email . "',MD5('" . $usuario->senha . "'),1,'" . $usuario->perfil->id . "')";
        $this->conectar();
        $this->conn->query($sql);
        $this->desconectar();
    }

    public function listar() {
        $sql = "SELECT * FROM usuario ";
        $this->conectar();
        $rs = $this->conn->query($sql);
        $array_usuario = array();
        while ($row = $rs->fetch_assoc()) {
            $u = new Usuario();
            $u->setId($row["id"]);
            $u->setNome($row["nome"]);
            $u->setCpf($row["cpf"]);
            $u->setSenha($row["senha"]);
            $u->setEmail($row["email"]);
            $u->setSituacao($row["situacao"]);
            $pDAO = new PerfilDAO();
            $u->setPerfil($pDAO->carregarPorId($row["id_perfil"]));

            $array_usuario[] = $u;
        }
        $this->desconectar();
        return $array_usuario;
    }

    public function excluir($id) {
        $sql = "DELETE FROM usuario WHERE id=" . $id;
        $this->conectar();
        $this->conn->query($sql);
        $this->desconectar();
    }

    public function alterar(Usuario $usuario) {
        $sql = "UPDATE usuario SET cpf='" . $usuario->cpf . "', "
                . " nome='" . $usuario->nome . "', "
                . " email='" . $usuario->email . "', "
                . " id_perfil='" . $usuario->perfil->id . "' "
                . "WHERE id=" . $usuario->id;
        $this->conectar();
        $this->conn->query($sql);
        $this->desconectar();
    }

    public function alterarSituacao($id, $situacao) {
        $sql = "UPDATE usuario SET situacao='" . $situacao . "' "
                . "WHERE id=" . $id;
        $this->conectar();
        $this->conn->query($sql);
        $this->desconectar();
    }

    public function carregarPorId($id) {
        $sql = "SELECT * FROM usuario WHERE id=" . $id;
        $this->conectar();
        $rs = $this->conn->query($sql);
        $u = new Usuario();
        while ($row = $rs->fetch_assoc()) {
            $u->setId($row["id"]);
            $u->setNome($row["nome"]);
            $u->setCpf($row["cpf"]);
            $u->setSenha($row["senha"]);
            $u->setEmail($row["email"]);
            $pDAO = new PerfilDAO();
            $u->setPerfil($pDAO->carregarPorId($row["id_perfil"]));
        }
        $this->desconectar();
        return $u;
    }

    public function validaLogin($cpf, $senha) {
        $sql = "SELECT *, MD5('".$senha."') senhav FROM usuario WHERE cpf='" . $cpf . "'";
        ;
        $this->conectar();
        $rs = $this->conn->query($sql);
        $u = new Usuario();
        if ($row = $rs->fetch_assoc()) {
            if ($row["senhav"] === $row["senha"]) {
                $u->setId($row["id"]);
                $u->setNome($row["nome"]);
                $u->setCpf($row["cpf"]);
                $u->setSenha($row["senha"]);
                $u->setEmail($row["email"]);
                $pDAO = new PerfilDAO();
                $u->setPerfil($pDAO->carregarPorId($row["id_perfil"]));
            }
        }
        $this->desconectar();
        return $u;
    }

}
