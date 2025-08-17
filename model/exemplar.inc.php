<?php

require_once "veiculo.inc.php";

class Exemplar {
    private $id_exemplar;
    private Veiculo $veiculo;
    private $id_locacao;
    private $locado;
    private $dias;
    private $valorExemplar;

    function __construct($veiculo, $valorExemplar) {
        $this -> veiculo = $veiculo;
        $this -> locado = 1;
        $this -> dias = 1;
        $this -> valorExemplar = $valorExemplar;
    }

    public function setExemplarComId($id_exemplar, $placa_veiculo, $id_locacao, $locado){
        $this -> id_exemplar = $id_exemplar;
        $this -> placa_veiculo = $placa_veiculo;
        $this -> id_locacao = $id_locacao;
        $this -> locado = $locado;
    }

    public function setExemplar($placa_veiculo, $id_locacao, $locado){
        $this -> placa_veiculo = $placa_veiculo;
        $this -> id_locacao = $id_locacao;
        $this -> locado = $locado;
    }    
    public function getIdExemplar() {
        return $this->id_exemplar; 
    }

    public function setIdExemplar($id_exemplar) {
        $this->id_exemplar = $id_exemplar;
    }

    public function getPlacaVeiculo() {
        return $this->placa_veiculo;
    }

    public function setPlacaVeiculo($placa_veiculo) {
        $this->placa_veiculo = $placa_veiculo;
    }

    public function getIdLocacao() {
        return $this->id_locacao;
    }

    public function setIdLocacao($id_locacao) {
        $this->id_locacao = $id_locacao;
    }

    public function getLocado() {
        return $this->locado;
    }

    public function setLocado() {
        $this->locado = 1;
    }

    public function getDias() {
        return $this->dias;
    }

    public function setDias() {
        $this->dias++;
    }

    public function getVeiculo() {
        return $this->veiculo;
    }

    public function getValorExemplar() {
        return $this->valorExemplar;
    }

    public function setValorExemplar() {
        $this->valorExemplar = $this->dias * $this->getVeiculo()->getValor();
    }
}
