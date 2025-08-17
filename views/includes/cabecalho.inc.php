<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Locadora de veículos</title>

    <link rel="stylesheet" href="../../estilos/estilo-showroom.css">
    <link rel="stylesheet" href="../../estilos/estilo-cabecalho.css">
    <link rel="stylesheet" href="../../estilos/estilo-form-login.css">
    <link rel="stylesheet" href="../../estilos/estilo-form-geral.css">
    <link rel="stylesheet" href="../../estilos/estilo-visualizacao-geral.css">
    <link rel="stylesheet" href="../../estilos/estilo-home.css">
    <link rel="stylesheet" href="../../estilos/estilo-fale-conosco.css">
    <link rel="stylesheet" href="../../estilos/estilo-contato-sucesso.css">

</head>
<body>
    <?php
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $tipoUsuario = 'publico';

        if (isset($_SESSION['usuario'])) {
            $tipoUsuario = $_SESSION['usuario']->tipo_usuario;
        }

        if ($tipoUsuario === 'comum') {
            include 'menus/menuCliente.inc.php';
        } else if ($tipoUsuario === 'administrador') {
            include 'menus/menuADM.inc.php';
        } else {
            include 'menus/menuPublico.inc.php';
        }
    ?>    

</body>
</html>