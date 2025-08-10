<?php 
    require_once "conexao.inc.php";
    require_once "../model/categoria.inc.php";

class CategoriaDao{    
    private $con;

    function __construct(){
        $c = new Conexao();
        $this -> con = $c -> getConexao();
    }

    public function incluirCategoria(Categoria $categoria){
        $sql = $this -> con -> prepare("insert into categoria(id_categoria, descricao, valor) values (:id_categoria, descricao, valor)");

        $sql -> bindValue(":id_categoria", $categoria -> getIdCategoria());
        $sql -> bindValue(":descricao", $categoria -> getDescricao());
        $sql -> bindValue("value", $categoria -> getValor());

        $sql -> execute();
    }

    public function excluirCategoria($id_categoria){
        $sql = $this -> con -> prepare("delete from categoria where id_categoria = :id");
        $sql -> bindValue(":id_categoria", $id_categoria);

        $sql -> execute();
    }

    public function atualizarCategoria(Categoria $categoria){
        $sql = $this -> con -> prepare("update categoria set descricao = :descricao, valor = :valor where id_categoria = :id_categoria");

        $sql -> bindValue(":id_categoria", $categoria -> getIdCategoria());
        $sql -> bindValue(":descricao", $categoria -> getDescricao());
        $sql -> bindValue("value", $categoria -> getValor());

        $sql -> execute();
    }
}    
?>