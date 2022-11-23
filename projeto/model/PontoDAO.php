<?php

include_once "Ponto.php";
include_once "EstagiarioDAO.php";
include_once "Estagiario.php";
include_once "DataBase.php";

class pontoDAO extends DataBase {

    public function inserir(Ponto $ponto) {
        $sql = "INSERT INTO ponto (data, hora_entrada, hora_saida, id_estagiario) VALUES 
        (" . $ponto->data . ",'" . $ponto->hora_entrada . "','" . $ponto->hora_saida . "','". $ponto->id_estagiario->id ."'));";
        $this->conectar();
        $this->conn->query($sql);
        $this->desconectar();
    }

    /*
    public function listar() {
        $sql = "SELECT * FROM ponto ";
        $this->conectar();
        $rs = $this->conn->query($sql);
        $array_ponto = array();
        while ($row = $rs->fetch_assoc()) {
            $ponto = new ponto();
            $ponto->setId($row["id"]);
            $ponto->setMatricula($row["matricula"]);
            $ponto->setSenha($row["senha"]);
            $ponto->setNome($row["nome"]);
            $ponto->setEndereco($row["endereco"]);
            $ponto->setTelefone($row["telefone"]);
            $ponto->setCelular($row["celular"]);
            $ponto->setEmail($row["email"]);
            $ponto->setPeriodo($row["periodo"]);
            $ponto->setTurma($row["turma"]);
            $ponto->setTurno($row["turno"]);
            $ponto->setComposicao_carga_horaria($row["composicao_carga_horaria"]);
            $ponto->setCarga_horaria($row["carga_horaria"]);
            $ponto->setData_inicio($row["data_inicio"]);
            $ponto->setData_termino($row["data_termino"]);
            $ponto->setData_inicio_aditivo($row["data_inicio_aditivo"]);
            $ponto->setData_termino_aditivo($row["data_termino_aditivo"]);
            $ponto->setData_recisao($row["data_recisao"]);
            $ponto->setApolice($row["apolice"]);
            $ponto->setSeguradora($row["seguradora"]);
            $pontoDAO = new CursoDAO();
            $ponto->setId_curso($pontoDAO->carregarPorId($row["id_curso"]));
            $array_ponto[] = $ponto;
        }
        $this->desconectar();
        return $array_ponto;
    }
    */


/*
    
    public function excluir($id) {
        $sql = "DELETE FROM ponto WHERE id=" . $id;
        $this->conectar();
        $this->conn->query($sql);
        $this->desconectar();
    }

*/

/*
    // bug
    public function alterar(ponto $ponto) {
        $sql = "UPDATE ponto SET matricula='" . $ponto->matricula . "', "
                . " nome='" . $ponto->nome . "', "
                . " endereco='" . $ponto->endereco . "', "
                . " telefone='" . $ponto->telefone . "', "
                . " celular='" . $ponto->celular . "', "
                . " email='" . $ponto->email . "', "
                . " periodo='" . $ponto->periodo . "', "
                . " turma='" . $ponto->turma . "', "
                . " turno='" . $ponto->turno . "', "
                . " composicao_carga_horaria='" . $ponto->composicao_carga_horaria . "', "
                . " carga_horaria='" . $ponto->carga_horaria . "', "
                . " data_inicio=" . $ponto->data_inicio . ", "
                . " data_termino=" . $ponto->data_termino . ", "
                . " data_inicio_aditivo=" . $ponto->data_inicio_aditivo . ", "
                . " data_termino_aditivo=" . $ponto->data_termino_aditivo . ", "
                . " data_recisao=" . $ponto->data_recisao . ", "
                . " apolice='" . $ponto->apolice . "', "
                . " seguradora='" . $ponto->seguradora . "', "
                . " id_curso=" . $ponto->id_curso->id . ", "
                . " senha='" . $ponto->senha . "', "
                . "WHERE id='". $ponto->id. "";
        $this->conectar();
        $this->conn->query($sql);
        $this->desconectar();
    }
    */

    /*
    public function alterarSituacao($id, $situacao) {
        $sql = "UPDATE coordenador SET situacao='" . $situacao . "' "
                . "WHERE id=" . $id;
        $this->conectar();
        $this->conn->query($sql);
        $this->desconectar();
    }
    */

    /*
    public function carregarPorId($id) {
        $sql = "SELECT * FROM ponto WHERE id=" . $id;
        $this->conectar();
        $rs = $this->conn->query($sql);
        $ponto = new ponto();
        while ($row = $rs->fetch_assoc()) {
            $ponto->setId($row["id"]);
            $ponto->setMatricula($row["matricula"]);
            $ponto->setSenha($row["senha"]);
            $ponto->setNome($row["nome"]);
            $ponto->setEndereco($row["endereco"]);
            $ponto->setTelefone($row["telefone"]);
            $ponto->setCelular($row["celular"]);
            $ponto->setEmail($row["email"]);
            $ponto->setPeriodo($row["periodo"]);
            $ponto->setTurma($row["turma"]);
            $ponto->setTurno($row["turno"]);
            $ponto->setComposicao_carga_horaria($row["composicao_carga_horaria"]);
            $ponto->setCarga_horaria($row["carga_horaria"]);
            $ponto->setData_inicio($row["data_inicio"]);
            $ponto->setData_termino($row["data_termino"]);
            $ponto->setData_inicio_aditivo($row["data_inicio_aditivo"]);
            $ponto->setData_termino_aditivo($row["data_termino_aditivo"]);
            $ponto->setData_recisao($row["data_recisao"]);
            $ponto->setApolice($row["apolice"]);
            $ponto->setSeguradora($row["seguradora"]);
            $pontoDAO = new CursoDAO();
            $ponto->setId_curso($pontoDAO->carregarPorId($row["id_curso"]));
        }
        $this->desconectar();
        return $ponto;
    }
    */

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
