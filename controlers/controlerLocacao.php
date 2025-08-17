<?php
    include_once "../model/locacao.inc.php";
    include_once "../dao/locacaoDao.inc.php";
    include_once "../utils/funcoesUteis.php";
    session_start();

    $dao = new LocacaoDao();
    $op = $_REQUEST['opcao'];

    if($op == 1){ 
        $locacao = new Locacao();
        
        $locacao -> setIdLocacao($_REQUEST['id_locacao']);
        $locacao -> setData($_REQUEST['data']);
        $locacao -> setValorTotal($_REQUEST['valor_total']);
        $locacao -> setCpfSocio($_REQUEST['cpf_socio']);
        $locacao -> setIdVeiculo($_REQUEST['id_veiculo']);

        $dao -> incluirLocacao($locacao);

        header("Location: ../views/locacoes/visualizacaoLocacoes.php");
    }

    if($op == 2){//selecionar todos
        $locacaoDao = new locacaoDao();

        $data1 = (string)(isset($_REQUEST['dataInicial'])? $_REQUEST['dataInicial']:'');
        $data2 = (string)(isset($_REQUEST['dataFinal'])? $_REQUEST['dataFinal']:'');

        $locacoes = $locacaoDao -> getLocacoesPorPeriodo($data1, $data2);

        $_SESSION['locacoes'] = $locacoes;

        header("Location: ../views/locacoes/visualizacaoLocacoes.php");
    }