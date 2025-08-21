<?php
require_once '../includes/cabecalho.inc.php';
?>

<div class="container-dados-compra">
    <h1 class="titulo-secao">Opção de Pagamento</h1>
    <div class="dados-cliente">
        <p class="info-cliente">
            <span class="rotulo-cliente">Escolha a sua opção de pagamento:</span>
        </p>
        <form action="../../controlers/controlerLocacao.php" method="get" class="formulario-pagamento">
            <div class="opcao-pagamento">
                <input type="radio" name="pag" value="boleto" id="pag" class="radio-pagamento" required/>
                <label for="pag" class="label-pagamento">Boleto Bancário</label>
            </div>
            <div class="container-botao-pagamento">
                <input type="hidden" value="5" name="opcao">
                <input type="submit" value="Efetuar Pagamento" class="botao-efetuar-pagamento">
            </div>
        </form>
    </div>
</div>

<?php
require_once('../includes/rodape.inc.php');
?>
