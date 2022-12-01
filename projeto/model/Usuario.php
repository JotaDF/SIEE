<?php

/**
 * Description of Usuario
 *
 * @author JWilson
 */

 require_once "Perfil.php";

class Usuario {
    //put your code here
    var $id;
    var $nome;
    var $login;
    //var $email;
    var $senha;
    //var $situacao;
    private Perfil $perfil;
    
    public function __construct() {
        
    }
    //public function getEmail() {
    //    return $this->email;
    // }

    //public function getSituacao() {
    //    return $this->situacao;
    //}

    //public function setEmail($email) {
    //    $this->email = $email;
    //}

    //public function setSituacao($situacao) {
    //    $this->situacao = $situacao;
    //}

    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getlogin() {
        return $this->login;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setCpf($login) {
        $this->login = $login;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
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
