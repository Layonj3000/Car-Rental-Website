<?php

require_once "../dao/categoriaDao.inc.php";

$opcao = $_REQUEST["opcao"];

if ($opcao == 1) {/*incluir*/
    $categoriaDao = new CategoriaDao();

    $categoria = new categoria();

    $categoria->setCategoria($_REQUEST['descricao'], $_REQUEST['valor']);

    $categoriaDao->incluirCategoria($categoria);

    header("Location: controlercategoria.php?opcao=2");
}

if ($opcao == 2) {/*selecionar todos*/
    $categoriaDao = new CategoriaDao();

    $id_categoria = isset($_REQUEST['id_categoria']) ? $_REQUEST['id_categoria'] : "";
    $descricao = isset($_REQUEST['descricao']) ? $_REQUEST['descricao'] : "";

    $categorias = $categoriaDao->getCategorias($id_categoria, $descricao);

    session_start();

    var_dump($categorias);
    $_SESSION['categorias'] = $categorias;

    header("Location: ../views/categorias/visualizacaoCategorias.php");
}

if ($opcao == 3) {/*selecionar para atualizar*/
    $categoriaDao = new CategoriaDao();

    $categoria = $categoriaDao->getCategoriaById($_REQUEST['id_categoria']);

    session_start();

    $_SESSION['categoria'] = $categoria;

    header("Location: ../views/categorias/formAtualizarcategoria.php");
}

if ($opcao == 4) {/*atualizar*/
    $categoriaDao = new CategoriaDao();

    $categoria = new categoria();

    $categoria->setCategoriaComId($_REQUEST['id_categoria'], $_REQUEST['descricao'], $_REQUEST['valor']);

    $categoriaDao->atualizarCategoria($categoria);

    header("Location: controlercategoria.php?opcao=2");
}

if ($opcao == 5) {/*excluir*/
    $categoriaDao = new CategoriaDao();

    $categorias = $categoriaDao->excluirCategoria($_REQUEST['id_categoria']);

    header("Location: controlercategoria.php?opcao=2");
}
