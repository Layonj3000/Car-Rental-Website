<nav class="cabecalho">

    <?php include 'botoes/botaoHamburguer.inc.php'; ?>

    <a href="../../views/area-publica/index.php" class="logo"><img src="../../imagens/logocar.png" alt="logo-carro"></a>

    <ul class="menu-principal">
        <li><a href="../../views/area-publica/index.php">Home</a></li>
        <li><a href="../../controlers/controlerVeiculo.php?opcao=6">Veículos</a></li>
        <li class="area-administrativa tem-submenu">
            <a href="#">Área Administrativa</a>
            <ul class="submenu-lista">
                <li><a href="../../views/veiculos/formIncluirVeiculo.php">Cadastrar Veículo</a></li>
                <li><a href="../../controlers/controlerVeiculo.php?opcao=2">Consultar Veículo</a></li>
                <li><a href="../../views/exemplares/formIncluirExemplar.php">Cadastrar Exemplar</a></li>
                <li><a href="../../controlers/controlerExemplar.php?opcao=2">Consultar Exemplar</a></li>
                <li><a href="../../views/categorias/formIncluirCategoria.php">Cadastrar Categoria</a></li>
                <li><a href="../../controlers/controlerCategoria.php?opcao=2">Consultar Categoria</a></li>
                <li><a href="../../controlers/controlerLocacao.php?opcao=2">Consultar Locações</a></li>
                <li><a href="../../controlers/controlerUsuarioSocio.php?opcao=7">Consultar Sócio</a></li>
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

<?php 
    include_once '../includes/modal.inc.php'; 
?>

