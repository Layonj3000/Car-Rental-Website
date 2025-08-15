<?php
    include_once "../dao/usuarioDAO.inc.php";
    $op = $_REQUEST['pOpcao'];

    if($op == '1')
    {
        $user = $_REQUEST["pUser"];
        $senha = $_REQUEST["pSenha"];
        var_dump($user);
        $dao = new UsuarioDAO();
        $usuario = $dao->autenticar($user, $senha);

        if($usuario != NULL)
        {
            session_start();
            $_SESSION["usuario"] = $usuario;
            header("Location: ../views/visualizacaoVeiculos.php");
        }
        else {
            header("Location: ../views/formLogin.php?erro=1");
        }

    }
    
    if($op == '2')
    {
        session_start();
        unset($_SESSION['usuario']);
        header("Location: ../views/formLogin.php");
    }
?>