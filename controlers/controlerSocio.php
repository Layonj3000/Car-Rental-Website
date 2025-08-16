<?php 
    require_once "../model/socio.inc.php";
    require_once "../dao/socioDao.inc.php";

    $opcao = $_REQUEST['opcao'];

    if($opcao == 2){//selecionar todos
        $socioDao = new SocioDao();

        $socios = $socioDao -> getSocios();

        session_start();

        $_SESSION['socios'] = $socios;

        header("Location: ../views/socios/visualizacaoSocio.php");
    }


?>