<?php

include_once "AtividadeDAO.php";
include_once "Atividade.php";
include_once "PontoDAO.php";
include_once "Ponto.php";
include_once "DataBase.php";

class AtividadeDAO extends DataBase {

    public function inserir(Atividade $atividade) {
        $sql = "INSERT INTO atividade (atividade, id_ponto) VALUES ('" . $atividade->atividade . "'," . $atividade->id_ponto->id . ");";
        $this->conectar();
        $this->conn->query($sql);
        $this->desconectar();
    }

    public function listar() {
        $sql = "SELECT * FROM atividade ";
        $this->conectar();
        $rs = $this->conn->query($sql);
        $array_atividade = array();
        while ($row = $rs->fetch_assoc()) {
            $atividade = new Atividade();
            $atividade->setId($row["id"]);
            $atividade->setAtividade($row["atividade"]);
            $atividadeDAO = new PontoDAO();
            $atividade->setId_ponto($atividadeDAO->carregarPorId($row["id_ponto"]));
            $array_atividade[] = $atividade;
        }
        $this->desconectar();
        return $array_atividade;
    }
        
    public function excluir($id) {
        $sql = "DELETE FROM atividade WHERE id=" . $id;
        $this->conectar();
        $this->conn->query($sql);
        $this->desconectar();
    }
    

    // bug
    public function alterar(Atividade $atividade) {
        $sql = " UPDATE atividade SET atividade='" . $atividade->atividade . "', ". " id_ponto=" . $atividade->id_ponto->id . ", ". "WHERE id='". $atividade->id. " ";
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
        $sql = "SELECT * FROM atividade WHERE id=" . $id;
        $this->conectar();
        $rs = $this->conn->query($sql);
        $atividade = new Atividade();
        while ($row = $rs->fetch_assoc()) {
            $atividade->setId($row["id"]);
            $atividade->setAtividade($row["atividade"]);
            $atividadeDAO = new PontoDAO();
            $atividade->setId_ponto($atividadeDAO->carregarPorId($row["id_ponto"]));
        }
        $this->desconectar();
        return $atividade;
    }

    /*
    public function validaLogin($atividadepf, $senha) {
        $sql = "SELECT *, MD5('".$senha."') senhav FROM coordenador WHERE cpf='" . $atividadepf . "'";
        ;
        $this->conectar();
        $rs = $this->conn->query($sql);
        $atividade = new coordenador();
        if ($row = $rs->fetch_assoc()) {
            if ($row["senhav"] === $row["senha"]) {
                $atividade->setId($row["id"]);
                $atividade->setNome($row["nome"]);
                $atividade->setCpf($row["cpf"]);
                $atividade->setSenha($row["senha"]);
                $atividade->setEmail($row["email"]);
                $pDAO = new PerfilDAO();
               // $atividade->setPerfil($pDAO->carregarPorId($row["id_perfil"]));
            }
        }
        $this->desconectar();
        return $atividade;
    }
    */

}
