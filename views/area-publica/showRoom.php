<?php
include_once '../../model/veiculo.inc.php';
include_once '../includes/cabecalho.inc.php';
$veiculos = $_SESSION['veiculos'];
?>

<div class="showroom-container">
    <h1 class="showroom-title">Show Room de veículos</h1>

    <div class="vehicles-grid">
        <?php
        foreach ($veiculos as $veiculo) {
            ?>
            <div class="vehicle-card">
                <div class="vehicle-image">
                    <img src="imagens/veiculos/<?= $veiculo->getPlaca() ?>.jpg" alt="<?= $veiculo->getNome() ?>">
                </div>
                <div class="vehicle-info">
                    <h5 class="vehicle-name"><?= $veiculo->getNome() ?></h5>
                    <p class="vehicle-year"><?= $veiculo->getAno() ?></p>
                    <h6 class="vehicle-brand">Marca: <?= $veiculo->getFabricante() ?></h6>
                    <h4 class="vehicle-price">R$ <?= number_format($veiculo->getValorBase(), '2', ',', '.') ?></h4>
                    <div class="vehicle-action">
                        <a href="../controlers/controlerCarrinho.php?opcao=1&id=<?= $veiculo->getPlaca() ?>" class="btn-comprar">Comprar</a>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>

<?php require_once "../includes/rodape.inc.php" ?>
