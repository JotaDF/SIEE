<?php

include_once "CoordenadorDAO.php";
include_once "Coordenador.php";
include_once "CursoDAO.php";
include_once "Curso.php";
include_once "DataBase.php";

/**
 * Description of coordenadorDAO
 *
 * @author JWilson
 */

class CoordenadorDAO extends DataBase {

    public function inserir(Coordenador $coord) {
        $sql = "INSERT INTO coordenador (cpf, nome, graduacao, pos_graduacao, telefone, email, nucleo, turno, id_curso, senha) VALUES ('" . $coord->cpf . "','" . $coord->nome . "','" . $coord->graduacao . "','" . $coord->pos_graduacao . "','" . $coord->telefone . "','" . $coord->email . "','" . $coord->nucleo . "','" . $coord->turno. "','" . $coord->id_curso->id . "',MD5('" . $coord->senha . "'))";
        $this->conectar();
        $this->conn->query($sql);
        $this->desconectar();
    }

    public function listar() {
        $sql = "SELECT * FROM coordenador ";
        $this->conectar();
        $rs = $this->conn->query($sql);
        $array_coordenador = array();
        while ($row = $rs->fetch_assoc()) {
            $coord = new Coordenador();
            $coord->setId($row["id"]);
            $coord->setCpf($row["cpf"]);
            $coord->setNome($row["nome"]);
            $coord->setGraduacao($row["graduacao"]);
            $coord->setPos_graduacao($row["pos_graduacao"]);
            $coord->setTelefone($row["telefone"]);
            $coord->setEmail($row["email"]);
            $coord->setNucleo($row["nucleo"]);
            $coord->setTurno($row["turno"]);
            $coord->setSenha($row["senha"]);
            $coordDAO = new CursoDAO();
            $coord->setId_curso($coordDAO->carregarPorId($row["id_curso"]));
            $array_coordenador[] = $coord;
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

    public function alterar(Coordenador $coord) {
        $sql = "UPDATE coordenador SET cpf='" . $coord->cpf . "', "
                . " nome='" . $coord->nome . "', "
                . " graduacao='" . $coord->graduacao . "', "
                . " pos_graduacao='" . $coord->pos_graduacao . "', "
                . " telefone='" . $coord->telefone . "', "
                . " email='" . $coord->email . "', "
                . " nucleo='" . $coord->nucleo . "', "
                . " turno='" . $coord->turno . "', "
                . " senha='" . $coord->senha . "', "
                . " id_curso='" . $coord->id_curso->id . "' "
                . "WHERE id=" . $coord->id;
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
        $sql = "SELECT * FROM coordenador WHERE id=" . $id;
        $this->conectar();
        $rs = $this->conn->query($sql);
        $coord = new Coordenador();
        while ($row = $rs->fetch_assoc()) {
            $coord->setId($row["id"]);
            $coord->setCpf($row["cpf"]);
            $coord->setNome($row["nome"]);
            $coord->setGraduacao($row["graduacao"]);
            $coord->setPos_graduacao($row["pos_graduacao"]);
            $coord->setTelefone($row["telefone"]);
            $coord->setEmail($row["email"]);
            $coord->setNucleo($row["nucleo"]);
            $coord->setTurno($row["turno"]);
            $coord->setSenha($row["senha"]);
            $coordDAO = new CursoDAO();
            $coord->setId_curso($coordDAO->carregarPorId($row["id_curso"]));
        }
        $this->desconectar();
        return $coord;
    }

    /*
    public function validaLogin($coordpf, $senha) {
        $sql = "SELECT *, MD5('".$senha."') senhav FROM coordenador WHERE cpf='" . $coordpf . "'";
        ;
        $this->conectar();
        $rs = $this->conn->query($sql);
        $coord = new coordenador();
        if ($row = $rs->fetch_assoc()) {
            if ($row["senhav"] === $row["senha"]) {
                $coord->setId($row["id"]);
                $coord->setNome($row["nome"]);
                $coord->setCpf($row["cpf"]);
                $coord->setSenha($row["senha"]);
                $coord->setEmail($row["email"]);
                $pDAO = new PerfilDAO();
               // $coord->setPerfil($pDAO->carregarPorId($row["id_perfil"]));
            }
        }
        $this->desconectar();
        return $coord;
    }
    */

}
