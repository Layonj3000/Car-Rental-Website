<?php
class Categoria{
    private $idCategoria;
    private $descricao;
    private $valor;

    public function setCategoriaComId($idCategoria, $descricao, $valor){
        $this -> idCategoria = $idCategoria;
        $this -> descricao = $descricao;
        $this -> valor = $valor;
    }

    public function setCategoria($idCategoria, $descricao, $valor){
        $this -> idCategoria = $idCategoria;
        $this -> descricao = $descricao;
        $this -> valor = $valor;
    }

    public function getIdCategoria() {
        return $this->idCategoria;
    }

    public function setIdCategoria($idCategoria) {
        $this->idCategoria = $idCategoria;
    }

    public function getValor() {
        return $this->valor;
    }

    public function setValor($valor) {
        $this->valor = $valor;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }
}
?>