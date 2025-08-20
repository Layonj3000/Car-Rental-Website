<?php
    include_once "../dao/usuarioDAO.inc.php";
    include_once "../dao/socioDAO.inc.php";
    include_once "../model/usuario.inc.php";
    include_once "../model/socio.inc.php";
    $op = $_REQUEST['opcao'];

    if($op == '1')
    {
        $user = $_REQUEST["pUser"];
        $senha = $_REQUEST["pSenha"];
        var_dump($user);
        $dao = new UsuarioDAO();
        $usuario = $dao->autenticar($user, $senha);

        if($usuario != NULL)
        {
            $socioDao = new SocioDao();
            $socio = $socioDao->getSocioByIdUsuario((int)$usuario->id);

            session_start();
            $_SESSION["usuario"] = $usuario;
            $_SESSION["socio"] = $socio;
            header("Location: ../views/area-publica/index.php");
        }
        else {
            header("Location: ../views/area-publica/formLogin.php?erro=1");
        }

    }
    
    if($op == '2')
    {
        session_start();
        unset($_SESSION['usuario']);
        unset($_SESSION['socio']);
        header("Location: ../views/area-publica/formLogin.php");
    }

    if($op == '3'){
        session_start();

        $usuario = $_SESSION["usuario"];

        $usuario_id = $usuario -> id;

        $socio = new Socio();
        $socioDao = new SocioDao();

        $socio = $socioDao -> getSocioByIdUsuario($usuario_id);

        $_SESSION['socio'] = $socio;

        header("Location: ../views/usuario/visualizacaoInfoUsuario.php");
    }

    if($op == '4'){
        $usuario = new Usuario();
        $usuarioDao = new UsuarioDao();

        $socio = new Socio();
        $socioDao = new SocioDao();

        $usuario -> setUsuarioComId($_REQUEST['id_usuario'], $_REQUEST['user'], $_REQUEST['senha'], $_REQUEST['tipo_usuario']);
        $socio -> setSocioComCpf($_REQUEST['cpf'], $_REQUEST['nome'], $_REQUEST['rg'], $_REQUEST['logradouro'], $_REQUEST['cidade'], $_REQUEST['estado'], $_REQUEST['cep'], $_REQUEST['telefone'], $_REQUEST['email'], $_REQUEST['id_usuario']);


        //var_dump($usuario);

        $usuarioDao -> atualizarUsuario($usuario);
        $socioDao -> atualizarSocio($socio);

        header("Location: controlerUsuarioSocio.php?opcao=3");
    }

    if($op == '5'){
        $usuario = new Usuario();
        $usuarioDao = new UsuarioDao();

        $socio = new Socio();
        $socioDao = new SocioDao();

        $usuarioDao -> excluirUsuario($_REQUEST['id_usuario']);
        $socioDao -> excluirSocio($_REQUEST['cpf']);

        header("Location: ../views/area-publica/formLogin.php");

    }

    if($op == '6'){
        $usuario = new Usuario();
        $usuarioDao = new UsuarioDao();

        $socio = new Socio();
        $socioDao = new SocioDao();

        $usuario -> setUsuario($_REQUEST['user'], $_REQUEST['senha']);
        $usuarioDao -> inserirUsuario($usuario);


        $socio -> setSocioComCpf($_REQUEST['cpf'], $_REQUEST['nome'], $_REQUEST['rg'], $_REQUEST['logradouro'], $_REQUEST['cidade'], $_REQUEST['estado'], $_REQUEST['cep'], $_REQUEST['telefone'], $_REQUEST['email'], $usuarioDao -> ultimoUsuarioInserido());

        $socioDao -> incluirSocio($socio);


        header("Location: ../views/area-publica/formLogin.php");
    }

    if($op == '7'){//selecionar todos
        $socioDao = new SocioDao();

        $socios = $socioDao -> getSocios();

        session_start();

        $_SESSION['socios'] = $socios;

        header("Location: ../views/socios/visualizacaoSocio.php");
    }
?>