<?php

include_once "Coordenador.php";
include_once "DataBase.php";

/**
 * Description of coordenadorDAO
 *
 * @author JWilson
 */

class CoordenadorDAO extends DataBase {

    public function inserir(Coordenador $coordenador) {
        $sql = "INSERT INTO coordenador (cpf, nome, graduacao, pos_graduacao, telefone, email, nucleo, turno, id_curso, senha) VALUES ('" . $coordenador->cpf . "','" . $coordenador->nome . "','" . $coordenador->graduacao . "','" . $coordenador->pos_graduacao . "','" . $coordenador->telefone . "','" . $coordenador->email . "','" . $coordenador->nucleo . "','" . $coordenador->turno. "','" . $coordenador->id_curso->id . "',MD5('" . $coordenador->senha . "'))";
        $this->conectar();
        $this->conn->query($sql);
        $this->desconectar();
    }

    /*
    public function listar() {
        $sql = "SELECT * FROM coordenador ";
        $this->conectar();
        $rs = $this->conn->query($sql);
        $array_coordenador = array();
        while ($row = $rs->fetch_assoc()) {
            $u = new coordenador();
            $u->setId($row["id"]);
            $u->setNome($row["nome"]);
            $u->setCpf($row["cpf"]);
            $u->setSenha($row["senha"]);
            $u->setEmail($row["email"]);
          //  $u->setSituacao($row["situacao"]);
            $pDAO = new PerfilDAO();
           // $u->setPerfil($pDAO->carregarPorId($row["id_perfil"]));

            $array_coordenador[] = $u;
        }
        $this->desconectar();
        return $array_coordenador;
    }

    public function excluir($id) {
        $sql = "DELETE FROM coordenador WHERE id=" . $id;
        $this->conectar();
        $this->conn->query($sql);
        $this->desconectar();
    }

    public function alterar(coordenador $coordenador) {
        $sql = "UPDATE coordenador SET cpf='" . $coordenador->cpf . "', "
                . " nome='" . $coordenador->nome . "', "
                . " email='" . $coordenador->email . "', "
                . " id_perfil='" . $coordenador->perfil->id . "' "
                . "WHERE id=" . $coordenador->id;
        $this->conectar();
        $this->conn->query($sql);
        $this->desconectar();
    }

    public function alterarSituacao($id, $situacao) {
        $sql = "UPDATE coordenador SET situacao='" . $situacao . "' "
                . "WHERE id=" . $id;
        $this->conectar();
        $this->conn->query($sql);
        $this->desconectar();
    }

    public function carregarPorId($id) {
        $sql = "SELECT * FROM coordenador WHERE id=" . $id;
        $this->conectar();
        $rs = $this->conn->query($sql);
        $u = new coordenador();
        while ($row = $rs->fetch_assoc()) {
            $u->setId($row["id"]);
            $u->setNome($row["nome"]);
            $u->setCpf($row["cpf"]);
            $u->setSenha($row["senha"]);
            $u->setEmail($row["email"]);
            $pDAO = new PerfilDAO();
           // $u->setPerfil($pDAO->carregarPorId($row["id_perfil"]));
        }
        $this->desconectar();
        return $u;
    }

    public function validaLogin($cpf, $senha) {
        $sql = "SELECT *, MD5('".$senha."') senhav FROM coordenador WHERE cpf='" . $cpf . "'";
        ;
        $this->conectar();
        $rs = $this->conn->query($sql);
        $u = new coordenador();
        if ($row = $rs->fetch_assoc()) {
            if ($row["senhav"] === $row["senha"]) {
                $u->setId($row["id"]);
                $u->setNome($row["nome"]);
                $u->setCpf($row["cpf"]);
                $u->setSenha($row["senha"]);
                $u->setEmail($row["email"]);
                $pDAO = new PerfilDAO();
               // $u->setPerfil($pDAO->carregarPorId($row["id_perfil"]));
            }
        }
        $this->desconectar();
        return $u;
    }

    */

}
