<?php
class Veiculo {
    private $placa;
    private $nome;
    private $anoFabricacao;
    private $fabricante;
    private $opcionais;
    private $motorizacao;
    private $valorBase;
    private $valor;
    private $fotoReferencia;
    private $id_categoria;


    public function setVeiculoComPlaca($placa, $nome, $anoFabricacao, $fabricante, $opcionais, $motorizacao, $valorBase, $fotoReferencia, $id_categoria) {
        $this->placa = $placa;
        $this->nome = $nome;
        $this->anoFabricacao = $anoFabricacao;
        $this->fabricante = $fabricante;
        $this->opcionais = $opcionais;
        $this->motorizacao = $motorizacao;
        $this->valorBase = $valorBase;
        $this->fotoReferencia = $fotoReferencia;
        $this->id_categoria = $id_categoria;
    }

    public function setVeiculo($nome, $anoFabricacao, $fabricante, $opcionais, $motorizacao, $valorBase, $fotoReferencia, $id_categoria) {
        $this->nome = $nome;
        $this->anoFabricacao = $anoFabricacao;
        $this->fabricante = $fabricante;
        $this->opcionais = $opcionais;
        $this->motorizacao = $motorizacao;
        $this->valorBase = $valorBase;
        $this->fotoReferencia = $fotoReferencia;
        $this->id_categoria = $id_categoria;
    }

    public function getPlaca() {
        return $this->placa;
    }

    public function setPlaca($placa) {
        $this->placa = $placa;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getAnoFabricacao() {
        return $this->anoFabricacao;
    }

    public function setAnoFabricacao($anoFabricacao) {
        $this->anoFabricacao = $anoFabricacao;
    }

    public function getFabricante() {
        return $this->fabricante;
    }

    public function setFabricante($fabricante) {
        $this->fabricante = $fabricante;
    }

    public function getOpcionais() {
        return $this->opcionais;
    }

    public function setOpcionais($opcionais) {
        $this->opcionais = $opcionais;
    }

    public function getMotorizacao() {
        return $this->motorizacao;
    }

    public function setMotorizacao($motorizacao) {
        $this->motorizacao = $motorizacao;
    }

    public function getValorBase() {
        return $this->valorBase;
    }

    public function setValorBase($valorBase) {
        $this->valorBase = $valorBase;
    }

    public function getValor() {
        return $this->valor;
    }

    public function setValor($valor) {
        $this->valor = $valor;
    }

    public function getFotoReferencia()
    {
        return $this->fotoReferencia;
    }

    public function setFotoReferencia($fotoReferencia)
    {
        $this->fotoReferencia = $fotoReferencia;
    }

    public function getIdCategoria() {
        return $this->id_categoria;
    }

    public function setIdCategoria($id_categoria) {
        $this->id_categoria = $id_categoria;
    }
}
