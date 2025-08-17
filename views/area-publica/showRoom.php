<?php
include_once '../../model/veiculo.inc.php';
include_once '../includes/cabecalho.inc.php';
$veiculos = $_SESSION['veiculos'];
?>

<div class="showroom-container">
    <h1 class="showroom-title">Show Room de veículos</h1>

    <div class="veiculos-grid-wrapper">
        <div class="veiculos-grid">
            <?php
            foreach ($veiculos as $veiculo) {
                ?>
                <div class="veiculo-card">
                    <div class="veiculo-image">
                        <img src="../../uploads/<?= $veiculo->getFotoReferencia() ?>" alt="<?= $veiculo->getNome() ?>">
                    </div>
                    <div class="veiculo-info">
                        <h5 class="veiculo-name"><?= $veiculo->getNome() ?></h5>
                        <p class="veiculo-year"><?= $veiculo->getAnoFabricacao() ?></p>
                        <h6 class="veiculo-brand">Marca: <?= $veiculo->getFabricante() ?></h6>
                        <h4 class="veiculo-price">R$ <?= number_format($veiculo->getValor(), '2', ',', '.') ?>/dia</h4>
                        <div class="veiculo-action">
                            <a href="../../controlers/controlerCarrinho.php?opcao=1&placa=<?= $veiculo->getPlaca() ?>" class="btn-comprar">Reservar</a>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>

<?php require_once "../includes/rodape.inc.php" ?>
