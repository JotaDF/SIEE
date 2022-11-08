<?php

include_once "Perfil.php";

/**
 * Description of Usuario
 *
 * @author JWilson
 */
class Usuario {
    //put your code here
    var $id;
    var $nome;
    var $cpf;
    var $email;
    var $senha;
    var $situacao;
    var $perfil;
    
    public function __construct() {
        
    }
    public function getEmail() {
        return $this->email;
    }

    public function getSituacao() {
        return $this->situacao;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setSituacao($situacao) {
        $this->situacao = $situacao;
    }

        public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function getPerfil() {
        return $this->perfil;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function setPerfil(Perfil $perfil) {
        $this->perfil = $perfil;
    }
}
