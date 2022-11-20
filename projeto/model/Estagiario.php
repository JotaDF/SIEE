<?php
include_once "Curso.php";
class Estagiario 
{
    var $id;
    var $matricula;
    var $senha;
    var $nome;
    var $endereco;
    var $telefone;
    var $celular;
    var $email;
    var $periodo;
    var $turma;
    var $turno;
    var $composicao_carga_horaria;
    var $carga_horaria;
    var $data_inicio;
    var $data_termino;
    var $data_inicio_aditivo;
    var $data_termino_aditivo; // esta variavel foi alterada no script do DB. Pois estava como: data_termino_aditijo
    var $data_recisao;
    var $apolice;
    var $seguradora;
    var $id_curso;

    public function __construct (){

    }

    public function getId() {
        return $this->id;
    }

    public function getMatricula(){
        return $this->matricula;
    }

    public function getSenha(){
        return $this->senha;
    }

    public function getNome(){
        return $this->nome;
    }

    public function getEndereco(){
        return $this->endereco;
    }

    public function getTelefone(){
        return $this->telefone;
    }

    public function getCelular(){
        return $this->celular;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getPeriodo(){
        return $this->periodo;
    }

    public function getTurma(){
        return $this->turma;
    }

    public function getTurno(){
        return $this->turno;
    }

    public function getComposicao_carga_horaria(){
        return $this->composicao_carga_horaria;
    }

    public function getCarga_horaria(){
        return $this->carga_horaria;
    }

    public function getData_inicio(){
        return $this->data_inicio;
    }

    public function getData_termino(){
        return $this->data_termino;
    }

    public function getData_inicio_aditivo(){
        return $this->data_inicio_aditivo;
    }

    public function getData_termino_aditivo(){
        return $this->data_termino_aditivo;
    }

    public function getData_recisao(){
        return $this->data_recisao;
    }

    public function getApolice(){
        return $this->apolice;
    }

    public function getSeguradora(){
        return $this->seguradora;
    }

    public function getId_curso(){
        return $this->id_curso;
    }

    

    public function setId($id) {
       $this->id = $id;
    }

    public function setMatricula($matricula){
        $this->matricula = $matricula;
    }

    public function setSenha($senha){
        $this->senha = $senha;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function setEndereco($endereco){
        $this->endereco = $endereco;
    }

    public function setTelefone($telefone){
         $this->telefone = $telefone;
    }

    public function setCelular($celular){
        $this->celular = $celular ;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function setPeriodo($periodo){
        $this->periodo = $periodo;
    }

    public function setTurma($turma){
        $this->turma = $turma;
    }

    public function setTurno($turno){
        $this->turno = $turno;
    }

    public function setComposicao_carga_horaria($composicao_carga_horaria){
        $this->composicao_carga_horaria = $composicao_carga_horaria;
    }

    public function setCarga_horaria($carga_horaria){
        $this->carga_horaria = $carga_horaria;
    }

    public function setData_inicio($data_inicio){
        $this->data_inicio = $data_inicio;
    }

    public function setData_termino($data_termino){
        $this->data_termino = $data_termino;
    }

    public function setData_inicio_aditivo($data_inicio_aditivo){
        $this->data_inicio_aditivo = $data_inicio_aditivo;
    }

    public function setData_termino_aditivo($data_termino_aditivo){
        $this->data_termino_aditivo = $data_termino_aditivo;
    }

    public function setData_recisao($data_recisao){
        $this->data_recisao = $data_recisao;
    }

    public function setApolice($apolice){
        $this->apolice = $apolice;
    }

    public function setSeguradora($seguradora){
        $this->seguradora = $seguradora;
    }

    public function setId_curso(Curso $id_curso){
        $this->id_curso = $id_curso;
    }
}
