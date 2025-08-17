<?php
require_once "conexao.inc.php";
require_once "../model/locacao.inc.php";
require_once "../utils/funcoesUteis.php";

class LocacaoDao{
    private $con;

    function __construct(){
        $c = new Conexao();
        $this -> con = $c -> getConexao();
    }    

    public function incluirLocacao(Locacao $locacao){
        $sql = $this -> con -> prepare("insert into locacao (id_locacao, data, valor_total, cpf_socio, id_veiculo)
                                                     values (:id_locacao, :data, :valor_total, :cpf_socio, :id_veiculo)");
         
        $sql -> bindValue(":id_locacao", $locacao -> getIdLocacao());
        $sql -> bindValue(":data", converteDataMySql($locacao -> getData()));
        $sql -> bindValue(":valor_total", $locacao -> getValorTotal());
        $sql -> bindValue(":cpf_socio", $locacao -> getCpfSocio());
        $sql -> bindValue("id_veiculo", $locacao -> getIdVeiculo());
        
        $sql -> execute();
    }

    public function atualizarLocacao(Locacao $locacao){
        $sql = $this -> con -> prepare ("update locacao set id_locacao = :id_locacao,
                                                            data = :data,
                                                            valor_total = :valor_total,
                                                            cpf_socio = :cpf_socio,
                                                            id_veiculo = :id_veiculo");
    
        $sql -> bindValue(":id_locacao", $locacao -> getIdLocacao());
        $sql -> bindValue(":data", converteDataMySql($locacao -> getData()));
        $sql -> bindValue(":valor_total", $locacao -> getValorTotal());
        $sql -> bindValue(":cpf_socio", $locacao -> getCpfSocio());
        $sql -> bindValue("id_veiculo", $locacao -> getIdVeiculo());
        
        $sql -> execute();    
    }

    public function excluirLocacao($id_locacao){
        $sql = $this -> con -> prepare ("delete from locacao where id_locacao = :id_locacao");

        $sql -> bindValue(":id_locacao", $id_locacao);

        $sql -> execute();
    }

    public function getLocacoes(){
        $sql = $this -> con -> query("select * from locacao");

        $locacoes = array();
        
        while($rs = $sql -> fetch(PDO::FETCH_OBJ)){
            $locacao = new Locacao();

            $locacao -> setLocacaoComId($rs -> id_locacao, $rs -> data, $rs -> valor_total, $rs -> cpf_socio, $rs -> id_veiculo);

            $locacoes[] = $locacao;
        }

        return $locacoes;
    }

    public function getLocacoesPorPeriodo($data1, $data2){
        $sql = $this -> con -> prepare("select * from locacao where (data >= :data1 or :data1 = '') and (data <= :data2 or :data2 = '')");

        $sql -> bindValue(":data1", $data1);
        $sql -> bindValue(":data2", $data2);

        $sql -> execute();

        $locacoes = array();
        
        while($rs = $sql -> fetch(PDO::FETCH_OBJ)){
            $locacao = new Locacao();

            $locacao -> setLocacaoComId($rs -> id_locacao, $rs -> data, $rs -> valor_total, $rs -> cpf_socio, $rs -> id_veiculo);

            $locacoes[] = $locacao;
        }

        return $locacoes;
    }
}
?>