<?php
require_once "../../model/exemplar.inc.php";
require_once "../../model/socio.inc.php";
require_once "../includes/cabecalho.inc.php";
$socio = $_SESSION['socio'];
$total = $_SESSION['total'];
$carrinho = $_SESSION['carrinho'];
?>

<div class="container-dados-compra">
    <h1 class="titulo-secao">Dados do cliente</h1>

    <div class="dados-cliente">
        <p class="info-cliente"><span class="rotulo-cliente">Nome:</span> <?=$socio -> getNome()?></p>
        <p class="info-cliente"><span class="rotulo-cliente">CPF:</span> <?=$socio -> getCpf()?></p>
        <p class="info-cliente"><span class="rotulo-cliente">Logradouro:</span> <?=$socio -> getLogradouro()?></p>
        <p class="info-cliente"><span class="rotulo-cliente">Cidade:</span> <?=$socio -> getCidade()?></p>
        <p class="info-cliente"><span class="rotulo-cliente">Estado:</span> <?=$socio -> getEstado()?></p>
        <p class="info-cliente"><span class="rotulo-cliente">CEP:</span> <?=$socio -> getCEP()?></p>
        <p class="info-cliente"><span class="rotulo-cliente">Telefone:</span> <?=$socio -> getTelefone()?></p>
        <p class="info-cliente"><span class="rotulo-cliente">Email:</span> <?=$socio -> getEmail()?></p>
        <hr class="divisor-secoes">
    </div>

    <h1 class="titulo-secao">Dados da locação</h1>

    <div class="container-tabela-locacao">
        <table class="tabela-locacao">
            <thead class="cabecalho-locacao">
            <tr class="linha-cabecalho-locacao">
                <th class="coluna-item">Item</th>
                <th class="coluna-placa">Placa</th>
                <th class="coluna-nome-veiculo">Nome</th>
                <th class="coluna-fabricante-veiculo">Fabricante</th>
                <th class="coluna-preco-veiculo">Preço</th>
                <th class="coluna-dias-locacao">Dias</th>
                <th class="coluna-valor-total">Valor</th>
            </tr>
            </thead>
            <tbody class="corpo-tabela-locacao">
            <?php foreach($carrinho as $item){ ?>
                <tr class="linha-item-locacao">
                    <td class="celula-imagem">
                        <img src="../../uploads/<?= $item -> getVeiculo() -> getFotoReferencia() ?>"
                             class="imagem-veiculo" alt="Foto do veículo">
                    </td>
                    <td class="celula-placa-veiculo"><?= $item -> getVeiculo() -> getPlaca() ?></td>
                    <td class="celula-nome-item"><?= $item -> getVeiculo() -> getNome()?></td>
                    <td class="celula-fabricante-item"><?= $item -> getVeiculo() -> getFabricante()?></td>
                    <td class="celula-preco-item">R$ <?= number_format($item -> getVeiculo() ->  getValor(),'2', ',', '.')?></td>
                    <td class="celula-dias-item"><?= $item -> getDias()?></td>
                    <td class="celula-valor-item">R$ <?= number_format($item -> getValorExemplar(),'2', ',', '.')?></td>
                </tr>
            <?php } ?>
            <tr class="linha-total-locacao">
                <td colspan="7" class="celula-total-geral">
                    <span class="texto-total-geral">Valor Total = R$ <?= number_format($total, '2', ',', '.') ?></span>
                </td>
            </tr>
            </tbody>
        </table>

        <div class="container-botao-pagamento">
            <div class="linha-botao-pagamento">
                <div class="coluna-botao-pagamento">
                    <a class="botao-efetuar-pagamento" role="button" href="dadosPagamento.php">
                        <b>Efetuar o pagamento</b>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if(isset($_REQUEST['erro']) && $_REQUEST['erro'] == 'veiculo_nao_disponivel'): ?>
    <div id="meuModal" class="modal-custom mostrar">
        <div class="modal-dialogo">
            <div class="modal-cabecalho">
                <h5 class="modal-titulo">Atenção</h5>
                <button type="button" class="btn-fechar" id="fecharModalX">&times;</button>
            </div>
            <div class="modal-corpo">
                <p>Um dos veículos selecionados para locação, se encontra indisponível no momento. Você ainda pode selecionar outros modelos em nosso Show Room!</p>
            </div>
            <div class="modal-rodape">
                <a href="../../controlers/controlerVeiculo.php?opcao=7" role="button" class="btn-confirmar">Ir para Show Room</a>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php require_once "../includes/rodape.inc.php" ?>
