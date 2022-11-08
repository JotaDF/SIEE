<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DataBase
 *
 * @author JWilson
 */
class DataBase {
    //put your code here
    var $host = "localhost";
    var $user = "root";
    var $password = "root";
    var $database = "siee";
    var $conn;

    public function conectar() {
        $this->conn = mysqli_connect($this->host, $this->user, $this->password, $this->database);
        if (!$this->conn) {
            die("Conexão falhou! " . mysqli_error());
        }
    }

    public function desconectar() {
        if ($this->conn) {
            mysqli_close($this->conn);
        }
    }

}
