<?php
class Socio {
    private $cpf;
    private $nome;
    private $rg;
    private $endereco;
    private $telefone;
    private $email;
    private $id_usuario;

    public function setSocioComCpf($cpf, $nome, $rg, $endereco, $telefone, $email, $id_usuario){
        $this -> cpf = $cpf;
        $this -> nome = $nome;
        $this -> rg = $rg;
        $this -> endereco = $endereco;
        $this -> telefone = $telefone;
        $this -> email = $email;
        $this->id_usuario = $id_usuario;
    }

    public function setSocio($nome, $rg, $endereco, $telefone, $email, $id_usuario){
        $this -> nome = $nome;
        $this -> rg = $rg;
        $this -> endereco = $endereco;
        $this -> telefone = $telefone;
        $this -> email = $email;
        $this->id_usuario = $id_usuario;
    }

    public function getIdUsuario() {
        return $this->id_usuario;
    }

    public function setIdUsuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getRg() {
        return $this->rg;
    }

    public function setRg($rg) {
        $this->rg = $rg;
    }

    public function getEndereco() {
        return $this->endereco;
    }

    public function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }
}
?>
