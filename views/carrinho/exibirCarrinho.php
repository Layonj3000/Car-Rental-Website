<?php
require_once '../../model/veiculo.inc.php';
require_once '../../model/exemplar.inc.php';
require_once '../includes/cabecalho.inc.php';
?>

<div class="carrinho-container">
    <h1 class="titulo-carrinho">Carrinho de compra</h1>

    <?php
    if (isset($_REQUEST['status'])) {
        require_once "../includes/carrinhoVazio.inc.php";
    } else {
        $carrinho = $_SESSION['carrinho'];
        ?>
        <div class="tabela-responsiva">
            <table class="tabela-carrinho">
                <thead class="cabecalho-tabela">
                <tr class="linha-cabecalho">
                    <th class="coluna-item">Item No</th>
                    <th class="coluna-ref">Ref.</th>
                    <th class="coluna-nome">Nome</th>
                    <th class="coluna-fabricante">Fabricante</th>
                    <th class="coluna-preco">Preço (R$)</th>
                    <th class="coluna-dias">Dias</th>
                    <th class="coluna-total">Total (R$)</th>
                    <th class="coluna-remover">Remover</th>
                </tr>
                </thead>
                <tbody class="corpo-tabela">
                <?php
                $cont = 1;
                $soma = 0;
                foreach ($carrinho as $item) {
                    ?>
                    <tr class="linha-item">
                        <td class="celula-contador"><?= $cont ?></td>
                        <td class="celula-placa"><?= $item->getVeiculo()->getPlaca() ?></td>
                        <td class="celula-nome-veiculo"><?= $item->getVeiculo()->getNome() ?></td>
                        <td class="celula-fabricante"><?= $item->getVeiculo()->getFabricante() ?></td>
                        <td class="celula-valor"><?= number_format($item->getVeiculo()->getValor(), '2', ',', '.') ?></td>
                        <td class="celula-dias"><?= $item->getDias() ?></td>
                        <td class="celula-total-item">
                            <?= number_format($item->getValorExemplar(), '2', ',', '.') ?></td>
                        <td class="celula-botao-remover"><a
                                    href="../../controlers/controlerCarrinho.php?opcao=2&index=<?= $cont - 1 ?>"
                                    class="botao-remover">X</a></td>
                    </tr>
                    <?php
                    $soma += $item->getValorExemplar();
                    $cont++;
                }
                ?>
                <tr class="linha-total">
                    <td colspan="8" class="celula-valor-total"><span
                                class="texto-valor-total">Valor Total = R$ <?= number_format($soma, '2', ',', '.') ?></span>
                    </td>
                </tr>
            </table>

            <div class="container-acoes">
                <div class="linha-botoes">
                    <div class="coluna-botao">
                        <a class="botao-continuar" role="button"
                           href="../../controlers/controlerVeiculo.php?opcao=6"><b>Continuar comprando</b></a>
                    </div>
                    <div class="coluna-botao">
                        <a class="botao-esvaziar" role="button"
                           href="../../controlers/controlerCarrinho.php?opcao=3"><b>Esvaziar carrinho</b></a>
                    </div>
                    <div class="coluna-botao">
                        <a class="botao-finalizar" role="button"
                           href="../../controlers/controlerCarrinho.php?opcao=5&total=<?= $soma ?>"><b>Concluir locação</b></a>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</div>
<?php 
    include_once '../includes/modal.inc.php'; 
?>
<?php
    require_once '../includes/rodape.inc.php';
?>
