<?php
include_once "RespostaDAO.php";
include_once "Resposta.php";
include_once "EstagiarioDAO.php";
include_once "Estagiario.php";
include_once "CursoDAO.php";
include_once "Curso.php";
include_once "DataBase.php";

class RespostaDAO extends DataBase {

    public function inserir(Resposta $resposta) {
        $sql = "INSERT INTO resposta (id_curso, questao1, questao2, questao3, questao4, questao5, questao6, id_estagiario) VALUES 
        (" . $resposta->id_curso->id . ",'" . $resposta->questao1 . "','" . $resposta->questao2 . "','". $resposta->questao3 ."','". $resposta->questao4 ."','". $resposta->questao5 ."','". $resposta->questao6."',". $resposta->id_estagiario->id .");";
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
            $resposta = new Estagiario();
            $resposta->setId($row["id"]);
            $resposta->setMatricula($row["matricula"]);
            $resposta->setSenha($row["senha"]);
            $resposta->setNome($row["nome"]);
            $resposta->setEndereco($row["endereco"]);
            $resposta->setTelefone($row["telefone"]);
            $resposta->setCelular($row["celular"]);
            $resposta->setEmail($row["email"]);
            $resposta->setPeriodo($row["periodo"]);
            $resposta->setTurma($row["turma"]);
            $resposta->setTurno($row["turno"]);
            $resposta->setComposicao_carga_horaria($row["composicao_carga_horaria"]);
            $resposta->setCarga_horaria($row["carga_horaria"]);
            $resposta->setData_inicio($row["data_inicio"]);
            $resposta->setData_termino($row["data_termino"]);
            $resposta->setData_inicio_aditivo($row["data_inicio_aditivo"]);
            $resposta->setData_termino_aditivo($row["data_termino_aditivo"]);
            $resposta->setData_recisao($row["data_recisao"]);
            $resposta->setApolice($row["apolice"]);
            $resposta->setSeguradora($row["seguradora"]);
            $respostaDAO = new CursoDAO();
            $resposta->setId_curso($respostaDAO->carregarPorId($row["id_curso"]));
            $array_estagiario[] = $resposta;
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
    public function alterar(Estagiario $resposta) {
        $sql = "UPDATE estagiario SET matricula='" . $resposta->matricula . "', "
                . " nome='" . $resposta->nome . "', "
                . " endereco='" . $resposta->endereco . "', "
                . " telefone='" . $resposta->telefone . "', "
                . " celular='" . $resposta->celular . "', "
                . " email='" . $resposta->email . "', "
                . " periodo='" . $resposta->periodo . "', "
                . " turma='" . $resposta->turma . "', "
                . " turno='" . $resposta->turno . "', "
                . " composicao_carga_horaria='" . $resposta->composicao_carga_horaria . "', "
                . " carga_horaria='" . $resposta->carga_horaria . "', "
                . " data_inicio=" . $resposta->data_inicio . ", "
                . " data_termino=" . $resposta->data_termino . ", "
                . " data_inicio_aditivo=" . $resposta->data_inicio_aditivo . ", "
                . " data_termino_aditivo=" . $resposta->data_termino_aditivo . ", "
                . " data_recisao=" . $resposta->data_recisao . ", "
                . " apolice='" . $resposta->apolice . "', "
                . " seguradora='" . $resposta->seguradora . "', "
                . " id_curso=" . $resposta->id_curso->id . ", "
                . " senha='" . $resposta->senha . "', "
                . "WHERE id='". $resposta->id. "";
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
        $resposta = new Estagiario();
        while ($row = $rs->fetch_assoc()) {
            $resposta->setId($row["id"]);
            $resposta->setMatricula($row["matricula"]);
            $resposta->setSenha($row["senha"]);
            $resposta->setNome($row["nome"]);
            $resposta->setEndereco($row["endereco"]);
            $resposta->setTelefone($row["telefone"]);
            $resposta->setCelular($row["celular"]);
            $resposta->setEmail($row["email"]);
            $resposta->setPeriodo($row["periodo"]);
            $resposta->setTurma($row["turma"]);
            $resposta->setTurno($row["turno"]);
            $resposta->setComposicao_carga_horaria($row["composicao_carga_horaria"]);
            $resposta->setCarga_horaria($row["carga_horaria"]);
            $resposta->setData_inicio($row["data_inicio"]);
            $resposta->setData_termino($row["data_termino"]);
            $resposta->setData_inicio_aditivo($row["data_inicio_aditivo"]);
            $resposta->setData_termino_aditivo($row["data_termino_aditivo"]);
            $resposta->setData_recisao($row["data_recisao"]);
            $resposta->setApolice($row["apolice"]);
            $resposta->setSeguradora($row["seguradora"]);
            $respostaDAO = new CursoDAO();
            $resposta->setId_curso($respostaDAO->carregarPorId($row["id_curso"]));
        }
        $this->desconectar();
        return $resposta;
    }
    

    /*
    public function validaLogin($respostapf, $senha) {
        $sql = "SELECT *, MD5('".$senha."') senhav FROM coordenador WHERE cpf='" . $respostapf . "'";
        ;
        $this->conectar();
        $rs = $this->conn->query($sql);
        $resposta = new coordenador();
        if ($row = $rs->fetch_assoc()) {
            if ($row["senhav"] === $row["senha"]) {
                $resposta->setId($row["id"]);
                $resposta->setNome($row["nome"]);
                $resposta->setCpf($row["cpf"]);
                $resposta->setSenha($row["senha"]);
                $resposta->setEmail($row["email"]);
                $pDAO = new PerfilDAO();
               // $resposta->setPerfil($pDAO->carregarPorId($row["id_perfil"]));
            }
        }
        $this->desconectar();
        return $resposta;
    }
    */

}
