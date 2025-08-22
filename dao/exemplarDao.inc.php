<?php
require_once "conexao.inc.php";
require_once "../model/exemplar.inc.php";
require_once "../model/locacao.inc.php";
require_once "../model/veiculo.inc.php";

class ExemplarDao{
    private $con;

    function __construct(){
        $c = new Conexao();
        $this -> con = $c -> getConexao();
    }

    public function incluirExemplar(Exemplar $exemplar){
        $sql = $this -> con -> prepare("insert into exemplares (id_exemplar, placa_veiculo, id_locacao, locado, dias)
                                                         values(:id_exemplar, :placa_veiculo, :id_locacao, :locado, :dias)");
        $sql -> bindValue(":id_exemplar", $exemplar -> getIdExemplar());
        $sql -> bindValue(":placa_veiculo", $exemplar -> getPlacaVeiculo());
        $sql -> bindValue(":id_locacao", $exemplar -> getIdLocacao());
        $sql -> bindValue(":locado", $exemplar -> getLocado());
        $sql -> bindValue(":dias", $exemplar -> getDias());

        $sql -> execute();
    }

    public function atualizarExemplar(Exemplar $exemplar){
        $sql = $this -> con -> prepare("update exemplares set placa_veiculo = :placa_veiculo, 
                                                              id_locacao = :id_locacao, 
                                                              locado = :locado,
                                                              dias = :dias
                                                              where id_exemplar = :id_exemplar");
                                                              
        $sql -> bindValue(":id_exemplar", $exemplar -> getIdExemplar());
        $sql -> bindValue(":placa_veiculo", $exemplar -> getPlacaVeiculo());
        $sql -> bindValue(":id_locacao", $exemplar -> getIdLocacao());
        $sql -> bindValue(":locado", $exemplar -> getLocado());
        $sql -> bindValue(":dias", $exemplar -> getDias());

        $sql -> execute();
    }

    public function excluirExemplar($id_exemplar){
        $sql = $this -> con ->prepare("delete from exemplares where id_exemplar = :id_exemplar");
    
        $sql -> bindValue(":id_exemplar", $id_exemplar);

        $sql -> execute();
    }

    public function getExemplares(){
        $sql = $this -> con -> query("select * from exemplares");

        $exemplares = array();

        while($rs = $sql -> fetch(PDO::FETCH_OBJ)){
            $exemplar = new Exemplar();

            $exemplar -> setIdExemplar($rs -> id_exemplar);
            $exemplar -> setPlacaVeiculo($rs -> placa_veiculo);
            $exemplar -> setIdLocacao($rs -> id_locacao);
            $exemplar -> setLocado($rs -> locado);

            $exemplares[] = $exemplar;
        }

        return $exemplares;
    }

        public function getExemplarById($id){
        $sql = $this -> con -> prepare("select * from exemplares where id_exemplar = :id");

        $sql -> bindValue(":id", $id);

        $sql -> execute();

        $exemplar = new Exemplar();

        if($rs = $sql -> fetch(PDO::FETCH_OBJ)){
            
            $exemplar -> setIdExemplar($rs -> id_exemplar);
            $exemplar -> setPlacaVeiculo($rs -> placa_veiculo);
            $exemplar -> setIdLocacao($rs -> id_locacao);
            $exemplar -> setLocado($rs -> locado);
        }

        return $exemplar;
    }

        public function veiculoExists($placa){
            $sql = $this -> con -> prepare("select * from veiculos where placa = :placa");

            $sql -> bindValue(":placa", $placa);

            $sql -> execute();

            if($sql -> fetch(PDO::FETCH_OBJ)){
                return 1;
            }

            return 0;
        }

        public function locacaoExists($id_locacao){
            $sql = $this -> con -> prepare("select * from locacao where id_locacao = :id_locacao");

            $sql -> bindValue(":id_locacao", $id_locacao);

            $sql -> execute();

            if($sql -> fetch(PDO::FETCH_OBJ)){
                return 1;
            }

            return 0;
        }

}
?>