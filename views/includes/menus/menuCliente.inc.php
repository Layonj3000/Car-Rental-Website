<nav class="cabecalho">

    <?php include 'botoes/botaoHamburguer.inc.php'; ?>

    <a href="../../views/area-publica/index.php" class="logo"><img src="../../imagens/logocar.png" alt="logo-carro"></a>

    <ul class="menu-principal">
        <li><a href="../../views/area-publica/index.php">Home</a></li>
        <li><a href="../../controlers/controlerVeiculo.php?opcao=6">Veículos</a></li>
        <li class="clientes tem-submenu">
            <a href="#">Clientes</a>
            <ul class="submenu-lista">
                <li><a href="../../controlers/controlerUsuarioSocio.php?opcao=3">Seus Dados</a></li>
                <li><a href="../../controlers/controlerLocacao.php?opcao=3">Histórico De Locações</a></li>
            </ul>
        </li>
        <li><a href="../../views/area-publica/fale-conosco.php">Contato</a></li>
        <li class="carrinho-de-compras">
            <a href="../../controlers/controlerCarrinho.php?opcao=4">
                <img src="../../imagens/carrinho-de-compra.png" alt="carrinho-de-compras">
            </a>
        </li>
        <?php include 'botoes/botaoLogin.inc.php'; ?>
    </ul>
</nav>

<script src="../../scripts/menu-mobile.js"></script>