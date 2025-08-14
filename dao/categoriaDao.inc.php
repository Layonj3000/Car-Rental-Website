<?php
require_once "conexao.inc.php";
require_once "../model/categoria.inc.php";

class CategoriaDao
{
    private $con;

    function __construct()
    {
        $c = new Conexao();
        $this->con = $c->getConexao();
    }

    public function incluirCategoria(Categoria $categoria)
    {
        $sql = $this->con->prepare("insert into categoria (descricao, valor) values (:descricao, :valor)");
        $sql->bindValue(":descricao", $categoria->getDescricao());
        $sql->bindValue(":valor", $categoria->getValor());
        $sql->execute();
    }

    public function excluirCategoria($id_categoria)
    {
        $sql = $this->con->prepare("delete from categoria where id_categoria = :id_categoria");
        $sql->bindValue(":id_categoria", $id_categoria);

        $sql->execute();
    }

    public function atualizarCategoria(Categoria $categoria)
    {
        print_r($categoria);
        $sql = $this->con->prepare("update categoria set descricao = :descricao, valor = :valor where id_categoria = :id_categoria");

        $sql->bindValue(":id_categoria", $categoria->getIdCategoria());
        $sql->bindValue(":descricao", $categoria->getDescricao());
        $sql->bindValue(":valor", $categoria->getValor());

        $sql->execute();
    }

    public function getCategorias($id_categoria, $descricao)
    {
        $sql = $this->con->prepare("SELECT * FROM categoria WHERE (:id_categoria = '' OR id_categoria = :id_categoria) AND (:descricao = '' OR descricao LIKE CONCAT('%', :descricao, '%'))");

        $sql->bindValue(":id_categoria", $id_categoria);
        $sql->bindValue(":descricao", $descricao);
        $sql->execute();

        $categorias = array();
        while ($rs = $sql->fetch(PDO::FETCH_OBJ)) {
            $categoria = new Categoria();
            $categoria->setIdCategoria($rs->id_categoria);
            $categoria->setDescricao($rs->descricao);
            $categoria->setValor($rs->valor);

            $categorias[] = $categoria;
        }

        return $categorias;
    }

    public function getCategoriaById($id_categoria)
    {
        $sql = $this->con->prepare("select * from categoria where id_categoria = :id_categoria");
        $sql->bindValue(":id_categoria", $id_categoria);
        $sql->execute();
        $rs = $sql->fetch(PDO::FETCH_OBJ);

        $categoria = new Categoria();
        $categoria->setIdCategoria($rs->id_categoria);
        $categoria->setDescricao($rs->descricao);
        $categoria->setValor($rs->valor);

        return $categoria;
    }
}