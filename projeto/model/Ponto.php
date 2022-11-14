<?php

class Ponto {
    var $id;
    var $data;
    var $hora_entrada;
    var $hora_saida;
    var $id_estagiario;

    public function __construct(){

    }
    
    public function getId(){
        return $this->id;
    }

    public function getData(){
        return $this->data;
    }

    public function getHora_entrada(){
        return $this->hora_entrada;
    }

    public function getHora_saida(){
        return $this->hora_saida;
    }

    public function getId_estagiario(){
        return $this->id_estagiario;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function setData($data){
        $this->data = $data;
    }

    public function setHora_entrada($hora_entrada){
        $this->hora_entrada = $hora_entrada;
    }

    public function setHora_saida($hora_saida){
        $this->hora_saida = $hora_saida;
    }

    public function setId_estagiario(Estagiario $id_estagiario){
        $this->id_estagiario = $id_estagiario;
    }
}
?>