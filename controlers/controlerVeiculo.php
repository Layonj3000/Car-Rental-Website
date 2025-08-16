<?php
    require_once "../dao/veiculoDao.inc.php";

    $opcao = $_REQUEST["opcao"];

    if($opcao == 1){/*incluir*/
        $veiculoDao = new VeiculoDao();

        $veiculo = new Veiculo();

        $veiculo -> setVeiculoComPlaca($_REQUEST['placa'], $_REQUEST['nomeVeiculo'], $_REQUEST['anoFabricacao'], $_REQUEST['fabricante'], $_REQUEST['opcionais'], $_REQUEST['motorizacao'], $_REQUEST['valorBase'], $_REQUEST['idCategoria']);
    
        $veiculoDao -> incluirVeiculo($veiculo);

        header("Location: controlerVeiculo.php?opcao=2");
    }

    if($opcao == 2){/*selecionar todos*/
        $veiculoDao = new VeiculoDao();

        $veiculos = $veiculoDao -> getVeiculos();

        session_start();

        $_SESSION['veiculos'] = $veiculos;

        header("Location: ../views/veiculos/visualizacaoVeiculos.php");
    }

    if($opcao == 3){/*selecionar para atualizar*/
        $veiculoDao = new VeiculoDao();

        $veiculo = $veiculoDao -> getVeiculoByPlaca($_REQUEST['placa']);

        var_dump($veiculo);

        session_start();

        $_SESSION['veiculo'] = $veiculo;

        header("Location: ../views/veiculos/formAtualizarVeiculo.php");
    }

    if($opcao == 4){/*atualizar*/
        $veiculoDao = new VeiculoDao();

        $veiculo = new Veiculo();

        $veiculo -> setVeiculoComPlaca($_REQUEST['placa'], $_REQUEST['nomeVeiculo'], $_REQUEST['anoFabricacao'], $_REQUEST['fabricante'], $_REQUEST['opcionais'], $_REQUEST['motorizacao'], $_REQUEST['valorBase'], $_REQUEST['idCategoria']);
    
        $veiculoDao -> atualizarVeiculo($veiculo);

        header("Location: controlerVeiculo.php?opcao=2");
    }

    if($opcao == 5){/*excluir*/
        $veiculoDao = new VeiculoDao();

        $veiculos = $veiculoDao -> excluirVeiculo($_REQUEST['placa']);

        header("Location: controlerVeiculo.php?opcao=2");
    }
?>