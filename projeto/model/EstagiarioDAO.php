<?php

include_once "EstagiarioDAO.php";
include_once "Estagiario.php";
include_once "CursoDAO.php";
include_once "Curso.php";
include_once "DataBase.php";

class EstagiarioDAO extends DataBase {

    public function inserir(Estagiario $estagiario) {
        $sql = "INSERT INTO estagiario (matricula, nome, endereco, telefone, celular, email, periodo, turma, turno, composicao_carga_horaria, carga_horaria, data_inicio, data_termino, data_inicio_aditivo, data_termino_aditivo, data_recisao, apolice, seguradora, id_curso, senha) VALUES 
        ('" . $estagiario->matricula . "','" . $estagiario->nome . "','" . $estagiario->endereco . "','". $estagiario->telefone ."','". $estagiario->celular ."','". $estagiario->email ."','". $estagiario->periodo ."','". $estagiario->turma ."','". $estagiario->turno ."','" . $estagiario->composicao_carga_horaria . "'
        ,'" . $estagiario->carga_horaria . "'," . $estagiario->data_inicio . "," . $estagiario->data_termino . "," . $estagiario->data_inicio_aditivo . "," . $estagiario->data_termino_aditivo . "," . $estagiario->data_recisao . ",'" . $estagiario->apolice . "','" . $estagiario->seguradora . "'," . $estagiario->id_curso->id . ",MD5('" . $estagiario->senha . "'));";
        $this->conectar();
        $this->conn->query($sql);
        $this->desconectar();
    }

    
    public function listar() {
        $sql = "SELECT * FROM estagiario ";
        $this->conectar();
        $rs = $this->conn->query($sql);
        $array_estagiario = array();
        while ($row = $rs->fetch_assoc()) {
            $estagiario = new Estagiario();
            $estagiario->setId($row["id"]);
            $estagiario->setMatricula($row["matricula"]);
            $estagiario->setSenha($row["senha"]);
            $estagiario->setNome($row["nome"]);
            $estagiario->setEndereco($row["endereco"]);
            $estagiario->setTelefone($row["telefone"]);
            $estagiario->setCelular($row["celular"]);
            $estagiario->setEmail($row["email"]);
            $estagiario->setPeriodo($row["periodo"]);
            $estagiario->setTurma($row["turma"]);
            $estagiario->setTurno($row["turno"]);
            $estagiario->setComposicao_carga_horaria($row["composicao_carga_horaria"]);
            $estagiario->setCarga_horaria($row["carga_horaria"]);
            $estagiario->setData_inicio($row["data_inicio"]);
            $estagiario->setData_termino($row["data_termino"]);
            $estagiario->setData_inicio_aditivo($row["data_inicio_aditivo"]);
            $estagiario->setData_termino_aditivo($row["data_termino_aditivo"]);
            $estagiario->setData_recisao($row["data_recisao"]);
            $estagiario->setApolice($row["apolice"]);
            $estagiario->setSeguradora($row["seguradora"]);
            $estagiarioDAO = new CursoDAO();
            $estagiario->setId_curso($estagiarioDAO->carregarPorId($row["id_curso"]));
            $array_estagiario[] = $estagiario;
        }
        $this->desconectar();
        return $array_estagiario;
    }
    

    
    public function excluir($id) {
        $sql = "DELETE FROM estagiario WHERE id=" . $id;
        $this->conectar();
        $this->conn->query($sql);
        $this->desconectar();
    }
    

    // bug
    public function alterar(Estagiario $estagiario) {
        $sql = "UPDATE estagiario SET matricula='" . $estagiario->matricula . "', "
                . " nome='" . $estagiario->nome . "', "
                . " endereco='" . $estagiario->endereco . "', "
                . " telefone='" . $estagiario->telefone . "', "
                . " celular='" . $estagiario->celular . "', "
                . " email='" . $estagiario->email . "', "
                . " periodo='" . $estagiario->periodo . "', "
                . " turma='" . $estagiario->turma . "', "
                . " turno='" . $estagiario->turno . "', "
                . " composicao_carga_horaria='" . $estagiario->composicao_carga_horaria . "', "
                . " carga_horaria='" . $estagiario->carga_horaria . "', "
                . " data_inicio=" . $estagiario->data_inicio . ", "
                . " data_termino=" . $estagiario->data_termino . ", "
                . " data_inicio_aditivo=" . $estagiario->data_inicio_aditivo . ", "
                . " data_termino_aditivo=" . $estagiario->data_termino_aditivo . ", "
                . " data_recisao=" . $estagiario->data_recisao . ", "
                . " apolice='" . $estagiario->apolice . "', "
                . " seguradora='" . $estagiario->seguradora . "', "
                . " id_curso=" . $estagiario->id_curso->id . ", "
                . " senha='" . $estagiario->senha . "', "
                . "WHERE id='". $estagiario->id. "";
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
        $sql = "SELECT * FROM estagiario WHERE id=" . $id;
        $this->conectar();
        $rs = $this->conn->query($sql);
        $estagiario = new Estagiario();
        while ($row = $rs->fetch_assoc()) {
            $estagiario->setId($row["id"]);
            $estagiario->setMatricula($row["matricula"]);
            $estagiario->setSenha($row["senha"]);
            $estagiario->setNome($row["nome"]);
            $estagiario->setEndereco($row["endereco"]);
            $estagiario->setTelefone($row["telefone"]);
            $estagiario->setCelular($row["celular"]);
            $estagiario->setEmail($row["email"]);
            $estagiario->setPeriodo($row["periodo"]);
            $estagiario->setTurma($row["turma"]);
            $estagiario->setTurno($row["turno"]);
            $estagiario->setComposicao_carga_horaria($row["composicao_carga_horaria"]);
            $estagiario->setCarga_horaria($row["carga_horaria"]);
            $estagiario->setData_inicio($row["data_inicio"]);
            $estagiario->setData_termino($row["data_termino"]);
            $estagiario->setData_inicio_aditivo($row["data_inicio_aditivo"]);
            $estagiario->setData_termino_aditivo($row["data_termino_aditivo"]);
            $estagiario->setData_recisao($row["data_recisao"]);
            $estagiario->setApolice($row["apolice"]);
            $estagiario->setSeguradora($row["seguradora"]);
            $estagiarioDAO = new CursoDAO();
            $estagiario->setId_curso($estagiarioDAO->carregarPorId($row["id_curso"]));
        }
        $this->desconectar();
        return $estagiario;
    }
    

    /*
    public function validaLogin($estagiariopf, $senha) {
        $sql = "SELECT *, MD5('".$senha."') senhav FROM coordenador WHERE cpf='" . $estagiariopf . "'";
        ;
        $this->conectar();
        $rs = $this->conn->query($sql);
        $estagiario = new coordenador();
        if ($row = $rs->fetch_assoc()) {
            if ($row["senhav"] === $row["senha"]) {
                $estagiario->setId($row["id"]);
                $estagiario->setNome($row["nome"]);
                $estagiario->setCpf($row["cpf"]);
                $estagiario->setSenha($row["senha"]);
                $estagiario->setEmail($row["email"]);
                $pDAO = new PerfilDAO();
               // $estagiario->setPerfil($pDAO->carregarPorId($row["id_perfil"]));
            }
        }
        $this->desconectar();
        return $estagiario;
    }
    */

}
