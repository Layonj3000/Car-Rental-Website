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
    <nav class="cabecalho">
        <button class="btn-menu-mobile">
            <span class="linha"></span>
            <span class="linha"></span>
            <span class="linha"></span>
        </button>
        
        <a href="../../views/area-publica/index.php" class="logo"><img src="../../imagens/logocar.png" alt="logo-carro"></a>

        <ul class="menu-principal">
            <li><a href="../../views/area-publica/index.php">Home</a></li>
            <li><a href="../../controlers/controlerVeiculo.php?opcao=6">Veículos</a></li>
            <li class="area-administrativa tem-submenu">
                <a href="#">Área Admnistrativa</a>
                <ul class="submenu-lista">
                    <li><a href="../../views/veiculos/formIncluirVeiculo.php">Cadastrar Veículo</a></li>
                    <li><a href="../../controlers/controlerVeiculo.php?opcao=2">Consultar Veículo</a></li>
                    <li><a href="../../views/exemplares/formIncluirExemplar.php">Cadastrar Exemplar</a></li>
                    <li><a href="../../controlers/controlerExemplar.php?opcao=2">Consultar Exemplar</a></li>
                    <li><a href="../../views/categorias/formIncluirCategoria.php">Cadastrar Categoria</a></li>
                    <li><a href="../../controlers/controlerCategoria.php?opcao=2">Consultar Categoria</a></li>
                    <li><a href="../../controlers/controlerLocacao.php?opcao=2">Consultar Locações</a></li>
                    <li><a href="../../controlers/controlerSocio.php?opcao=2">Consultar Sócio</a></li>
                </ul>
            </li>
            <li class="clientes tem-submenu">
                <a href="#">Clientes</a>
                <ul class="submenu-lista">
                    <li><a href="../../controlers/controlerUsuario.php?opcao=3">Seus Dados</a></li>
                    <li><a href="../../controlers/controlerLocacao.php?opcao=3">Histórico De Locações</a></li>
                </ul>
            </li>
            <li><a href="../../views/area-publica/fale-conosco.php">Contato</a></li>
            <li class="carrinho-de-compras"><img src="../../imagens/carrinho-de-compra.png" alt="carrinho-de-compras"></li>
            <?php
                session_start();
                if(!isset($_SESSION['usuario'])){
            ?>
                    <li class="btn-login"><a href="../../views/area-publica/formLogin.php"><button>Login</button></a></li>
            <?php
                }
                else{
            ?>
                    <li class="btn-sair"><a href="../../controlers/controlerUsuario.php?opcao=2"><button>Sair</button></a></li>
            <?php
                }
            ?>
        </ul>
    </nav>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const btnMenuMobile = document.querySelector('.btn-menu-mobile');
            const cabecalho = document.querySelector('.cabecalho');
            const submenus = document.querySelectorAll('.tem-submenu');

            btnMenuMobile.addEventListener('click', function() {
                cabecalho.classList.toggle('menu-aberto');
            });

            submenus.forEach(function(item) {
                const link = item.querySelector('a');
                link.addEventListener('click', function(e) {
                    if (window.innerWidth < 768) {
                        e.preventDefault();
                        item.classList.toggle('aberto');
                    }
                });
            });
        });
    </script>
</body>
</html>