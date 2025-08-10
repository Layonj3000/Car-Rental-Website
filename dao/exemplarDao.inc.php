<?php
require_once "conexao.inc.php";
require_once "../model/exemplar.inc.php";

class ExemplarDao{
    private $con;

    function __construct(){
        $c = new Conexao();
        $this -> con = $c -> getConexao();
    }

    public function incluirExemplar(Exemplar $exemplar){
        $sql = $this -> con -> prepare("insert into exemplares (id_exemplar, placa_veiculo, id_locacao, locado)
                                                         values(:id_exemplar, :placa_veiculo, :id_locacao, :locado)");
        $sql -> bindValue(":id_exemplar", $exemplar -> getIdExemplar());
        $sql -> bindValue(":placa_veiculo", $exemplar -> getPlacaVeiculo());
        $sql -> bindValue(":id_locacao", $exemplar -> getIdLocacao());
        $sql -> bindValue(":locado", $exemplar -> getLocado());
        
        $sql -> execute();
    }

    public function atualizarExemplar(Exemplar $exemplar){
        $sql = $this -> con -> prepare("update exemplares set placa_veiculo = :placa_veiculo, 
                                                              id_locacao = :id_locacal, 
                                                              locado = :locado
                                                              where id_exemplar = :id_exemplar");
        $sql -> bindValue(":id_exemplar", $exemplar -> getIdExemplar());
        $sql -> bindValue(":placa_veiculo", $exemplar -> getPlacaVeiculo());
        $sql -> bindValue(":id_locacao", $exemplar -> getIdLocacao());
        $sql -> bindValue(":locado", $exemplar -> getLocado());

        $sql -> execute();
    }

    public function excluirExemplar($id_exemplar){
        $sql = $this -> con ->prepare("delete from exemplares where id_exemplar = :id_exemplar");
    
        $sql -> bindValue(":id_exemplar", $id_exemplar);

        $sql -> execute();
    }
}
?>