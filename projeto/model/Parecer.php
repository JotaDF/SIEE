<?php

class Parecer{

    var $id;
    var $parecer;
    var $id_coordenador;
    var $id_estagiario;

    public function __construct(){

    }

    public function getId(){
        return $this->id;
    }

    public function getParecer(){
        return $this->parecer;
    }

    public function getId_coordenador(){
        return $this->id_coordenador;
    }

    public function getId_estagiario(){
        return $this->id_estagiario;
    }

    
    public function setId($id){
        $this->id = $id;
    }

    public function setParecer($parecer){
        $this->parecer = $parecer;
    }

    public function setId_coordenador(Coordenador $id_coordenador){
        $this->id_coordenador = $id_coordenador;
    }

    public function setId_estagiario(Estagiario $id_estagiario){
        $this->id_estagiario = $id_estagiario;
    }
}
?>