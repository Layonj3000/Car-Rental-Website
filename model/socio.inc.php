<?php
class Socio {
    private $cpf;
    private $nome;
    private $rg;
    //private $endereco;
    private $logradouro;
    private $cidade;
    private $estado;
    private $cep;
    private $telefone;
    private $email;
    private $id_usuario;

    public function setSocioComCpf($cpf, $nome, $rg, $logradouro, $cidade, $estado, $cep, $telefone, $email, $id_usuario){
        $this -> cpf = $cpf;
        $this -> nome = $nome;
        $this -> rg = $rg;
        //$this -> endereco = $endereco;
        $this -> logradouro = $logradouro;
        $this -> cidade = $cidade;
        $this -> estado = $estado;
        $this -> cep = $cep;
        $this -> telefone = $telefone;
        $this -> email = $email;
        $this->id_usuario = $id_usuario;
    }

    public function setSocio($nome, $rg, $logradouro, $cidade, $estado, $cep, $telefone, $email, $id_usuario){
        $this -> nome = $nome;
        $this -> rg = $rg;
        //$this -> endereco = $endereco;
        $this -> logradouro = $logradouro;
        $this -> cidade = $cidade;
        $this -> estado = $estado;
        $this -> cep = $cep;
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

    /*public function getEndereco() {
        return $this->endereco;
    }

    public function setEndereco($endereco) {
        $this->endereco = $endereco;
    }*/

    public function getLogradouro() {
        return $this->logradouro;
    }
    
    public function setLogradouro($logradouro) {
        $this->logradouro = $logradouro;
    }
    
    public function getCidade() {
        return $this->cidade;
    }
    
    public function setCidade($cidade) {
        $this->cidade = $cidade;
    }
    
    public function getEstado() {
        return $this->estado;
    }
    
    public function setEstado($estado) {
        $this->estado = $estado;
    }
    
    public function getCep() {
        return $this->cep;
    }
    
    public function setCep($cep) {
        $this->cep = $cep;
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
