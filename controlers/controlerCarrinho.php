<?php
include_once "../model/veiculo.inc.php";
include_once '../model/exemplar.inc.php';
include_once "../dao/veiculoDao.inc.php";
include_once "../dao/categoriaDao.inc.php";

$opcao = (int)$_REQUEST['opcao'];

if($opcao == 1){ //incluir no carrinho
    $placa = $_REQUEST['placa'];

    $veiculoDao = new VeiculoDao();
    $veiculo = $veiculoDao->getVeiculoByPlaca($placa);

    if($veiculo === null) {
        header("Location: ../views/area-publica/showRoom.php?erro=veiculo_nao_encontrado");
    }

    $categoriaDao = new CategoriaDao();
    $valorCategoria = $categoriaDao -> getValorCategoria($veiculo -> getIdCategoria());

    $exemplar = new Exemplar($veiculo, $veiculo->getValorBase() + $valorCategoria);

    session_start();

    if(isset($_SESSION['carrinho'])){
        $carrinho = $_SESSION['carrinho'];
    }else{
        $carrinho = array();
    }

    $key = array_search2($exemplar->getVeiculo()->getPlaca(), $carrinho);

    if($key != -1){
        $carrinho[$key]->setDias();
        $carrinho[$key]->setValorExemplar();
    } else{
        $carrinho[] = $exemplar;
    }

    $_SESSION['carrinho'] = $carrinho;

    header("Location: ../views/carrinho/exibirCarrinho.php");
}

if($opcao == 2) { /*remover exemplar do carrinho*/
    $index = (int) $_REQUEST['index'];

    session_start();
    $carrinho = $_SESSION['carrinho'];

    unset($carrinho[$index]);

    sort($carrinho);

    $_SESSION['carrinho'] = $carrinho;

    header('Location:controlerCarrinho.php?opcao=4');
}

if($opcao == 3) {
    session_start();

    unset($_SESSION['carrinho']);

    header('Location:controlerVeiculo.php?opcao=6');
}

if($opcao == 4) {
    session_start();

    if(!isset($_SESSION["carrinho"]) || sizeof($_SESSION["carrinho"])==0){
        header('Location: ../views/carrinho/exibirCarrinho.php?status=1');
    }else{
        header('Location: ../views/carrinho/exibirCarrinho.php');
    }
}

if($opcao == 5){ //finalizar compra
    session_start();
    if(isset($_SESSION["usuario"])){
        $total = (float) $_REQUEST['total'];

        $_SESSION['total'] = $total;

        header("Location: ../views/carrinho/dadosCompra.php");
    }else{
        header("Location: ../views/area-publica/formLogin.php");
    }
}


function array_search2($chave, $vetor){
    $index = -1;

    for($i=0; $i < count($vetor); $i++){
        if($chave == $vetor[$i] -> getVeiculo()->getPlaca()){
            $index = $i;
            break;
        }
    }
    return $index;
}
