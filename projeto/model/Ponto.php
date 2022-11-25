<?php
include_once "Estagiario.php";

class Ponto {
    var $id;
    var $data_atual;
    var $hora_entrada;
    var $hora_saida;
    var $id_estagiario;

    public function __construct(){

    }
    
    public function getId(){
        return $this->id;
    }

    public function getData_atual(){
        return $this->data_atual;
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

    public function setData_atual($data_atual){
        $this->data_atual = $data_atual;
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