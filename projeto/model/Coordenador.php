<?php
include_once "Curso.php";
class Coordenador 
{

    var $id;
    var $cpf;
    var $nome;
    var $graduacao;
    var $pos_graduacao;
    var $telefone;
    var $email;
    var $nucleo;
    var $turno;
    var $senha;
    var $id_curso;
    var $perfil;

    public function __construct(){

    }

    public function getId(){
        return $this->id;
    }

    public function getCpf(){
        return $this->cpf;
    }

    public function getNome(){
        return $this->nome;
    }

    public function getGraduacao(){
        return $this->graduacao;
    }

    public function getPos_graduacao(){
        return $this->pos_graduacao;
    }

    public function getTelefone(){
        return $this->telefone;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getNucleo(){
        return $this->nucleo;
    }

    public function getTurno(){
        return $this->turno;
    }

    public function getSenha(){
        return $this->senha;
    }

    public function getId_curso(){
        return $this->id_curso;
    }


    public function setId($id){
        $this->id = $id;
    }

    public function setCpf($cpf){
        $this->cpf = $cpf;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function setGraduacao($graduacao){
        $this->graduacao = $graduacao;
    }

    public function setPos_graduacao($pos_graduacao){
        $this->pos_graduacao = $pos_graduacao;
    }

    public function setTelefone($telefone){
        $this->telefone = $telefone;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function setNucleo($nucleo){
        $this->nucleo = $nucleo;
    }

    public function setTurno($turno){
        $this->turno = $turno;
    }

    public function setSenha($senha){
        $this->senha = $senha;
    }

    public function setId_curso(Curso $id_curso){
        $this->id_curso = $id_curso;
    }

    public function getPerfil()
    {
        return $this->perfil;
    }

    public function setPerfil($perfil)
    {
        $this->perfil = $perfil;

        return $this;
    }
}
