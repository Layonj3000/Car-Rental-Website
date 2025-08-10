<?php 
class Locacao {
    private $id_locacao;
    private $data;
    private $valor_total;
    private $cpf_socio;
    private $id_veiculo;

    public function setLocacaoComId($id_locacao, $data, $valor_total, $cpf_socio, $id_veiculo){
        $this->id_locacao = $id_locacao;
        $this->data = strtotime($data);
        $this->valor_total = $valor_total;
        $this->cpf_socio = $cpf_socio;
        $this->id_veiculo = $id_veiculo;
    }

    public function setLocacao($data, $valor_total, $cpf_socio, $id_veiculo){
        $this->data = strtotime($data);
        $this->valor_total = $valor_total;
        $this->cpf_socio = $cpf_socio;
        $this->id_veiculo = $id_veiculo;
    }

    public function getIdLocacao() {
        return $this->id_locacao;
    }

    public function setIdLocacao($id_locacao) {
        $this->id_locacao = $id_locacao;
    }

    public function getData() {
        return $this->data;
    }

    public function setData($data) {
        $this->data = strtotime($data);
    }

    public function getValorTotal() {
        return $this->valor_total;
    }

    public function setValorTotal($valor_total) {
        $this->valor_total = $valor_total;
    }

    public function getCpfSocio() {
        return $this->cpf_socio;
    }

    public function setCpfSocio($cpf_socio) {
        $this->cpf_socio = $cpf_socio;
    }

    public function getIdVeiculo() {
        return $this->id_veiculo;
    }

    public function setIdVeiculo($id_veiculo) {
        $this->id_veiculo = $id_veiculo;
    }
}
?>
