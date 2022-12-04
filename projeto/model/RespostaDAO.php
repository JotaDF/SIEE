<?php
include_once "Resposta.php";
include_once "EstagiarioDAO.php";
include_once "Estagiario.php";
include_once "CursoDAO.php";
include_once "Curso.php";
include_once "DataBase.php";

class RespostaDAO extends DataBase {

    public function inserir(Resposta $resposta) {
        $sql = "INSERT INTO resposta (id_curso, questao1, questao2, questao3, questao4, questao5, questao6, id_estagiario) 
        VALUES (".$resposta->id_curso->id.",'".$resposta->questao1."','".$resposta->questao2."','".$resposta->questao3."','".$resposta->questao4."','".$resposta->questao5."','".$resposta->questao6."',".$resposta->id_estagiario->id.")";
        $this->conectar();
        $this->conn->query($sql);
        $this->desconectar();
        
    }

    
    public function listar() {
        $sql = "SELECT * FROM resposta ";
        $this->conectar();
        $rs = $this->conn->query($sql);
        $array_resposta = array();
        while ($row = $rs->fetch_assoc()) {
            $resposta = new Resposta();
            $resposta->setId($row["id"]);
            $respostaDAO = new CursoDAO();
            $resposta->setId_curso($respostaDAO->carregarPorId($row["id_curso"]));
            $resposta->setQuestao1($row["questao1"]);
            $resposta->setQuestao2($row["questao2"]);
            $resposta->setQuestao3($row["questao3"]);
            $resposta->setQuestao4($row["questao4"]);
            $resposta->setQuestao5($row["questao5"]);
            $resposta->setQuestao6($row["questao6"]);
            $respostaDAO = new EstagiarioDAO();
            $resposta->SetId_estagiario($respostaDAO->carregarPorId($row["id_estagiario"]));
            $array_resposta[] = $resposta;
        }
        $this->desconectar();
        return $array_resposta;
    }
    

    
    public function excluir($id) {
        $sql = "DELETE FROM resposta WHERE id=" . $id;
        $this->conectar();
        $this->conn->query($sql);
        $this->desconectar();
    }
    

    // bug
    public function alterar(Resposta $resposta) {
        $sql = "UPDATE resposta SET id_curso=" . $resposta->id_curso->id . ", "
                . " questao1='" . $resposta->questao1 . "', "
                . " questao2='" . $resposta->questao2 . "', "
                . " questao3='" . $resposta->questao3 . "', "
                . " questao4='" . $resposta->questao4 . "', "
                . " questao5='" . $resposta->questao5 . "', "
                . " questao6='" . $resposta->questao6 . "', "
                . " id_estagiario=" . $resposta->id_estagiario->id . " "
                . "WHERE id=". $resposta->id;
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
        $sql = "SELECT * FROM resposta WHERE id=" . $id;
        $this->conectar();
        $rs = $this->conn->query($sql);
        $resposta = new Resposta();
        while ($row = $rs->fetch_assoc()) {
            $resposta->setId($row["id"]);
            $respostaDAO = new CursoDAO();
            $resposta->setId_curso($respostaDAO->carregarPorId($row["id_curso"]));
            $resposta->setQuestao1($row["questao1"]);
            $resposta->setQuestao2($row["questao2"]);
            $resposta->setQuestao3($row["questao3"]);
            $resposta->setQuestao4($row["questao4"]);
            $resposta->setQuestao5($row["questao5"]);
            $resposta->setQuestao6($row["questao6"]);
            $respostaDAO = new EstagiarioDAO();
            $resposta->SetId_estagiario($respostaDAO->carregarPorId($row["id_estagiario"]));
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
