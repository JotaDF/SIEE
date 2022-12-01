<?php

class Resposta{

    var $id;
    var $id_curso;
    var $questao1;
    var $questao2;
    var $questao3;
    var $questao4;
    var $questao5;
    var $questao6;
    var $id_estagiario;

    public function __construct(){

    }

    public function getId(){
        return $this->id;
    }

    public function getId_Curso(){
        return $this->id_curso;
    }

    public function getQuestao1(){
        return $this->questao1;
    }

    public function getQuestao2(){
        return $this->questao2;
    }

    public function getQuestao3(){
        return $this->questao3;
    }

    public function getQuestao4(){
        return $this->questao4;
    }

    public function getQuestao5(){
        return $this->questao5;
    }

    public function getQuestao6(){
        return $this->questao6;
    }

    public function getId_estagiario(){
        return $this->id_estagiario;
    }


    public function setId($id){
        $this->id = $id;
    }

    public function setId_Curso(Curso $id_curso){
        $this->id = $id_curso;
    }

    public function setQuestao1($questao1){
        $this->questao1= $questao1;
    }

    public function setQuestao2($questao2){
        $this->questao2 = $questao2;
    }

    public function setQuestao3($questao3){
        $this->questao3= $questao3;
    }

    public function setQuestao4($questao4){
        $this->questao4 = $questao4;
    }

    public function setQuestao5($questao5){
        $this->$questao5 = $questao5;
    }

    public function setQuestao6($questao6){
        $this->$questao6 = $questao6;
    }

    public function SetId_estagiario(Estagiario $id_estagiario){
        $this->id_estagiario = $id_estagiario;
    }

   
}
?>