<?php
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

    if($op == 2){ 
        $dataInicial = isset($_REQUEST['dataInicial']) ? $_REQUEST['dataInicial'] : '';
        $dataFinal = isset($_REQUEST['dataFinal']) ? $_REQUEST['dataFinal'] : '';
        
        
        if(!empty($dataInicial) || !empty($dataFinal)){
            $_SESSION['locacoes'] = $dao->getLocacoesPorPeriodo(converteTimestamp($dataInicial), converteTimestamp($dataFinal));
        } else {
            $_SESSION['locacoes'] = $dao->getLocacoes();
        }

        header("Location: ../views/locacoes/visualizacaoLocacoes.php");
    }
?>