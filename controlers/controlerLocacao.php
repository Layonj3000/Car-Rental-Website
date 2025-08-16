<?php 
    require_once "../model/locacao.inc.php";
    require_once "../dao/locacaoDao.inc.php";

    $opcao = $_REQUEST['opcao'];

    if($opcao == 2){//selecionar todos
        $locacaoDao = new locacaoDao();

        $data1 = (string)(isset($_REQUEST['dataInicial'])? $_REQUEST['dataInicial']:'');
        $data2 = (string)(isset($_REQUEST['dataFinal'])? $_REQUEST['dataFinal']:'');


        $locacoes = $locacaoDao -> getLocacoesPorPeriodo($data1, $data2);

        session_start();

        $_SESSION['locacoes'] = $locacoes;

        header("Location: ../views/locacoes/visualizacaoLocacoes.php");
    }


?>