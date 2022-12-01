<?php

class Atividade{
    var $id;
    var $atividade;
    var $id_ponto;

    public function __construct()
    {
        
    }

    public function getId(){
        return $this->id;
    }

    public function getAtividade(){
        return $this->atividade;
    }

    public function getId_ponto(){
        return $this->id_ponto;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function setAtividade($atividade){
        $this->atividade = $atividade;
    }

    public function setId_ponto(Ponto $id_ponto){
        $this->id_ponto = $id_ponto;
    }


}



?>