<?php 
    include_once "includes/cabecalho.inc.php";
?>

<div class="form-padrao">
<h1>Inclusão de Veículo</h1>

<form action="../controlers/controlerVeiculo.php">
    <div class="padrao">
        <label for="placa">Placa:</label>
        <input type="text" name="placa">
    </div>
    
    <div class="padrao">
        <label for="nomeVeiculo">Nome:</label>
        <input type="text" name="nomeVeiculo">
    </div>
    
    <div class="padrao">
        <label for="anoFabricacao">Ano de Fabricacao:</label>
        <input type="number" min="1900" max="2100" name="anoFabricacao">
    </div>
    
    <div class="padrao">
        <label for="fabricante">Fabricante:</label>
        <input type="text" name="fabricante">
    </div>

    <div class="padrao">
        <label for="motorizacao">Motorização:</label>
        <input type="text" name="motorizacao">
    </div>
    
    <div class="padrao">
        <label for="valorBase">Valor Base:</label>
        <input type="text" name="valorBase">
    </div>
    
    <div class="padrao">
        <label for="opcionais">Opcionais:</label>
        <input type="text" name="opcionais">
    </div>

    <div class="padrao">
        <label for="idCategoria">Id Categoria:</label>
        <input type="text" name="idCategoria">
    </div>

    <input type="hidden" name="opcao" value="1">

    <div class="botoes">
        <input type="submit" value="Incluir">
        <input type="button" value="Cancelar">
    </div>
</form>
    <div>
        
    </div>
</div>

<?php require_once "includes/rodape.inc.php"; ?>
