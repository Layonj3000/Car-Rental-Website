<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Locadora de veículos</title>

    <link rel="stylesheet" href="../estilos/estilo-cabecalho.css">
    <link rel="stylesheet" href="../estilos/estilo-form-login.css">
    <link rel="stylesheet" href="../estilos/estilo-form-geral.css">
    <link rel="stylesheet" href="../estilos/estilo-visualizacao-geral.css">
    <link rel="stylesheet" href="../estilos/estilo-home.css">
    <link rel="stylesheet" href="../estilos/estilo-fale-conosco.css">
    <link rel="stylesheet" href="../estilos/estilo-contato-sucesso.css">

</head>
<body>    
    <nav class="cabecalho">
        <a href="../views/index.php" class="logo"><img src="../imagens/car.png" alt="logo-carro"></a>

        <ul>
            <li><a href="../views/index.php">Home</a></li>
            <li class="produtos">
                <a href="#">Produtos</a>
                <ul>
                    <li><a href="../views/formIncluirVeiculo.php">Cadastrar</a></li>
                    <li><a href="../controlers/controlerVeiculo.php?opcao=2">Consultar</a></li>
                    <li><a href="#">Show Room</a></li>
                </ul>
                <img src="../imagens/seta-para-baixo.png" alt="seta-para-baixo">
            </li>
            <li class="clientes">
                <a href="#">Clientes</a>
                <ul>
                    <li><a href="#">Cadastrar</a></li>
                    <li><a href="#">Seus Dados</a></li>
                </ul>
                <img src="../imagens/seta-para-baixo.png" alt="seta-para-baixo">
            </li>
            <li><a href="../views/fale-conosco.php">Contato</a></li>
            <li class="carrinho-de-compras"><img src="../imagens/carrinho-de-compras.png" alt="carrinho-de-compras"></li>
        </ul>

        <?php
            session_start();
            if(!isset($_SESSION['usuario'])){
        ?>
                <a href="../views/formLogin.php" class="btn-login"><button>Login</button></a>

        <?php
            }
            else{
        ?>
                <a href="../controlers/controlerUsuario.php?pOpcao=2" class="btn-sair"><button>Sair</button></a> 
        <?php
            }

        ?>
    </nav>
</body>
</html>