<?php 
    require_once "../model/exemplar.inc.php";
    require_once "../dao/exemplarDao.inc.php";

    $opcao = $_REQUEST['opcao'];

    if($opcao == 1){//incluir
        $exemplar = new Exemplar();
        $exemplar -> setExemplar($_REQUEST['placaVeiculo'], $_REQUEST['idLocacao'], $_REQUEST['Locado'], $_REQUEST['dias']);

        $exemplarDao = new ExemplarDao();

        if($exemplarDao -> veiculoExists($_REQUEST['placaVeiculo']) == 1 && $exemplarDao -> locacaoExists($_REQUEST['idLocacao']) ==1){
            $exemplarDao -> incluirExemplar($exemplar);
        }else{
            session_start();
            $_SESSION['erro'] = "Você está tentando inserir um registro de Exemplar com um Veículo ou Locação que não existe!";
        }

        header("Location: controlerExemplar.php?opcao=2");
    }

    if($opcao == 2){//selecionar todos
        $exemplarDao = new ExemplarDao();

        $exemplares = $exemplarDao -> getExemplares();

        session_start();

        $_SESSION['exemplares'] = $exemplares;

        header("Location: ../views/exemplares/visualizacaoExemplar.php");
    }

    if($opcao == 3){//selecionar para atualizar
        $exemplarDao = new ExemplarDao();

        $exemplar = $exemplarDao -> getExemplarById($_REQUEST['idExemplar']);

        session_start();

        $_SESSION['exemplar'] = $exemplar;

        header("Location: ../views/exemplares/formAtualizarExemplar.php");
    }

    if($opcao == 4){//atualizar exemplar
        $exemplarDao = new ExemplarDao();

        $exemplar = new Exemplar();

        $exemplar -> setExemplarComId($_REQUEST['idExemplar'], $_REQUEST['placaVeiculo'], $_REQUEST['idLocacao'], $_REQUEST['Locado'], $_REQUEST['dias']);

        if($exemplarDao -> veiculoExists($_REQUEST['placaVeiculo']) == 1 && $exemplarDao -> locacaoExists($_REQUEST['idLocacao']) ==1){
            $exemplarDao -> atualizarExemplar($exemplar);
        }else{
            session_start();
            $_SESSION['erro'] = "Você está tentando atualizar um registro de Exemplar com um Veículo ou Locação que não existe!";
        }

        header("Location: controlerExemplar.php?opcao=2");
    }

    if($opcao == 5){//excluir exemplar
        $exemplarDao = new ExemplarDao();
        
        $exemplarDao -> excluirExemplar($_REQUEST['idExemplar']);

        header("Location: controlerExemplar.php?opcao=2");
    }

?>