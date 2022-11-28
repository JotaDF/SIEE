<?php

include_once "Curso.php";
include_once "CursoDAO.php";
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
        $sql = "SELECT * FROM ponto ";
        $this->conectar();
        $rs = $this->conn->query($sql);
        $array_ponto = array();
        while ($row = $rs->fetch_assoc()) {
            $ponto = new ponto();
            $ponto->setId($row["id"]);
            $ponto->setData_atual($row["data_atual"]);
            $ponto->setHora_entrada($row["hora_entrada"]);
            $ponto->setHora_saida($row["hora_saida"]);
            $pontoDAO = new EstagiarioDAO();
            $ponto->setId_estagiario($pontoDAO->carregarPorId($row["id_estagiario"]));
            $array_ponto[] = $ponto;
        }
        $this->desconectar();
        return $array_ponto;
    }
    
    public function excluir($id) {
        $sql = "DELETE FROM ponto WHERE id=" . $id;
        $this->conectar();
        $this->conn->query($sql);
        $this->desconectar();
    }

    // bug
    public function alterar(ponto $ponto) {
        $sql = "UPDATE ponto SET data_atual='" . $ponto->data_atual . "', ". " hora_entrada='" . $ponto->hora_entrada . "', ". " hora_saida ='" . $ponto->hora_saida . "', ". " id_estagiario='" . $ponto->id_estagiario->nome. "', ". "WHERE id='". $ponto->id;
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
        $sql = "SELECT * FROM ponto WHERE id=" . $id;
        $this->conectar();
        $rs = $this->conn->query($sql);
        $ponto = new ponto();
        while ($row = $rs->fetch_assoc()) {
            $ponto->setId($row["id"]);
            $ponto->setData_atual($row["data_atual"]);
            $ponto->setHora_entrada($row["hora_entrada"]);
            $ponto->setHora_saida($row["hora_saida"]);
            $pontoDAO = new EstagiarioDAO();
            $ponto->setId_estagiario($pontoDAO->carregarPorId($row["id_estagiario"]));
        }
        $this->desconectar();
        return $ponto;
    }


    /*
    public function validaLogin($pontopf, $senha) {
        $sql = "SELECT *, MD5('".$senha."') senhav FROM coordenador WHERE cpf='" . $pontopf . "'";
        ;
        $this->conectar();
        $rs = $this->conn->query($sql);
        $ponto = new coordenador();
        if ($row = $rs->fetch_assoc()) {
            if ($row["senhav"] === $row["senha"]) {
                $ponto->setId($row["id"]);
                $ponto->setNome($row["nome"]);
                $ponto->setCpf($row["cpf"]);
                $ponto->setSenha($row["senha"]);
                $ponto->setEmail($row["email"]);
                $pDAO = new PerfilDAO();
               // $ponto->setPerfil($pDAO->carregarPorId($row["id_perfil"]));
            }
        }
        $this->desconectar();
        return $ponto;
    }
    */

}
