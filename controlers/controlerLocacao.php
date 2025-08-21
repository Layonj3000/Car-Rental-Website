<?php
include_once "../dao/exemplarDao.inc.php";
include_once "../dao/locacaoDao.inc.php";
include_once "../dao/socioDAO.inc.php";
include_once "../model/socio.inc.php";
include_once "../utils/funcoesUteis.php";
session_start();

$locacaoDao = new LocacaoDao();
$exemplarDao = new ExemplarDao();
$op = $_REQUEST['opcao'];

if ($op == 1) {
    $locacao = new Locacao();

    $locacao->setIdLocacao($_REQUEST['id_locacao']);
    $locacao->setData($_REQUEST['data']);
    $locacao->setValorTotal($_REQUEST['valor_total']);
    $locacao->setCpfSocio($_REQUEST['cpf_socio']);
    $locacao->setIdVeiculo($_REQUEST['id_veiculo']);

    $idLocacao = $locacaoDao->incluirLocacao($locacao);
    $exemplar = new Exemplar();
    $exemplar->setExemplar($locacao->getIdVeiculo(), $idLocacao, 1, $_REQUEST['dias']);
    $exemplarDao->incluirExemplar($exemplar);

    header("Location: ../views/locacoes/visualizacaoLocacoes.php");
}

if ($op == 2) {
    $dataInicial = isset($_REQUEST['dataInicial']) ? $_REQUEST['dataInicial'] : '';
    $dataFinal = isset($_REQUEST['dataFinal']) ? $_REQUEST['dataFinal'] : '';


    if (!empty($dataInicial) || !empty($dataFinal)) {
        $_SESSION['locacoes'] = $locacaoDao->getLocacoesPorPeriodo(converteTimestamp($dataInicial), converteTimestamp($dataFinal));
    } else {
        $_SESSION['locacoes'] = $locacaoDao->getLocacoes();
    }

    header("Location: ../views/locacoes/visualizacaoLocacoes.php");
}

if ($op == 3) {
    $socio = new Socio();
    $socioDao = new SocioDao();

    $usuario = $_SESSION["usuario"];
    $usuario_id = $usuario->id;

    $socio = $socioDao->getSocioByIdUsuario($usuario_id);
    $locacoes = $locacaoDao->getLocacoesPorSocio($socio->getCpf());

    $_SESSION['locacoes'] = $locacoes;

    header("Location: ../views/locacoes/visualizacaoLocacoesPorCliente.php");
}

if ($op == 5) {
    session_start();
    $carrinho = $_SESSION['carrinho'];
    $socio = $_SESSION['socio'];
    $total = $_SESSION['total'];

    foreach ($carrinho as $item) {
        $locacao = new Locacao();
        $locacao->setData("now");
        $locacao->setValorTotal($total);
        $locacao->setCpfSocio($socio->getCpf());
        $locacao->setIdVeiculo($item->getVeiculo()->getPlaca());
        $locacao->setDias($item->getDias());

        $idLocacao = $locacaoDao->incluirLocacao($locacao);

        $exemplar = new Exemplar();
        $exemplar->setExemplar($item->getVeiculo()->getPlaca(), $idLocacao, 1, $item->getDias());
        $exemplarDao->incluirExemplar($exemplar);
    }
    if (isset($_SESSION['carrinho'])) {
        unset($_SESSION['carrinho']); 
    }
    header("Location: ../views/boleto/meuBoleto.php");
}
?>