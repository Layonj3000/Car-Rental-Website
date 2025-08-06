<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Locadora de veículos</title>

    <link rel="stylesheet" href="../estilos/estilo-cabecalho.css">

    <?php if ($estilo === "estiloLogin"): ?>
        <link rel="stylesheet" href="../estilos/estilo-form-login.css">
    <?php elseif ($estilo === "estiloFormGeral"): ?>
        <link rel="stylesheet" href="../estilos/estilo-form-geral.css">
    <?php elseif ($estilo === "visualizacaoVeiculos"): ?>
        <link rel="stylesheet" href="../estilos/estilo-form-geral.css">
        <link rel="stylesheet" href="../estilos/estilo-visualizacao-veiculos.css">    
    <?php endif; ?>
    
</head>
<body>    
    <nav>
        <a href="#" class="logo"><img src="../imagens/car.png" alt="logo-carro"></a>

        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Produtos da Loja</a></li>
            <li class="clientes">
                <a href="#">Clientes</a>
                <ul>
                    <li><a href="#">Cadastrar</a></li>
                    <li><a href="#">Seus Dados</a></li>
                </ul>
                <img src="../imagens/seta-para-baixo.png" alt="seta-para-baixo">
            </li>
            <li><a href="#">Contato</a></li>
            <li class="carrinho-de-compras"><img src="../imagens/carrinho-de-compras.png" alt="carrinho-de-compras"></li>
        </ul>

        <a href="#"><button>Login</button></a>
    </nav>
</body>
</html>