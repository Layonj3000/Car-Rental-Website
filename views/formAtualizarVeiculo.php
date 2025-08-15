<?php 
    include_once "../model/veiculo.inc.php";
    include_once "includes/cabecalho.inc.php";

    $veiculo = new Veiculo();
    $veiculo = $_SESSION['veiculo'];
?>

<div class="form-padrao">
<h1>Atualizacao de Veículo</h1>

<form action="../controlers/controlerVeiculo.php">
    <div class="padrao">
        <label for="placa">Placa:</label>
        <input type="text" name="placa" value=<?= $veiculo -> getPlaca()?> readonly>
    </div>
    
    <div class="padrao">
        <label for="nomeVeiculo">Nome:</label>
        <input type="text" name="nomeVeiculo" value=<?= $veiculo -> getNome()?>>
    </div>
    
    <div class="padrao">
        <label for="anoFabricacao">Ano de Fabricacao:</label>
        <input type="number" min="1900" max="2100" name="anoFabricacao" value=<?= $veiculo -> getAnoFabricacao()?>>
    </div>
    
    <div class="padrao">
        <label for="fabricante">Fabricante:</label>
        <input type="text" name="fabricante" value=<?= $veiculo -> getFabricante()?>>
    </div>

    <div class="padrao">
        <label for="motorizacao">Motorização:</label>
        <input type="text" name="motorizacao" value=<?= $veiculo -> getMotorizacao()?>>
    </div>
    
    <div class="padrao">
        <label for="valorBase">Valor Base:</label>
        <input type="text" name="valorBase" value=<?= $veiculo -> getValorBase()?>>
    </div>
    
    <div class="padrao">
        <label for="opcionais">Opcionais:</label>
        <input type="text" name="opcionais" value=<?= $veiculo -> getOpcionais()?>>
    </div>

    <div class="padrao">
        <label for="idCategoria">Id Categoria:</label>
        <input type="text" name="idCategoria" readonly value=<?= $veiculo -> getIdCategoria()?>>
    </div>

    <input type="hidden" name="opcao" value="4">

    <div class="botoes">
        <input type="submit" value="Atualizar">
        <input type="button" value="Cancelar">
    </div>
</form>
    <div>
        
    </div>
</div>

<?php require_once "includes/rodape.inc.php"; ?>
