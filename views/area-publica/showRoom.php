<?php
    include_once '../../model/veiculo.inc.php';
    include_once '../includes/cabecalho.inc.php';
    $veiculos = $_SESSION['veiculos'];
?>

    <div class="form-padrao">

        <form action="../../controlers/controlerVeiculo.php">
            <div class="padrao">
                <label for="placa">Placa:</label>
                <input type="text" name="placa">
            </div>
        
            <div class="padrao">
                <label for="nomeVeiculo">Nome:</label>
                <input type="text" name="nomeVeiculo">
            </div>

            <div class="padrao">
                <label for="fabricante">Fabricante:</label>
                <input type="text" name="fabricante">
            </div>
        
            <div class="padrao">
                <label for="motorizacao">Motorizacao:</label>
                <input type="text" name="motorizacao">
            </div>

            <input type="hidden" name="opcao" value="7">

            <div class="botoes">
                <input type="submit" value="Buscar">
            </div>
        </form>
    </div>
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
                            <?php if ($veiculo->isDisponivel()): ?>
                                <a href="../../controlers/controlerCarrinho.php?opcao=1&placa=<?= $veiculo->getPlaca() ?>" class="btn-comprar">Reservar</a>
                            <?php else: ?>
                                <span class="btn-comprar disabled">Indisponível</span>
                            <?php endif; ?>
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
