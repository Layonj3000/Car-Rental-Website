<?php 
    include_once "../includes/cabecalho.inc.php";
?>

<div class="form-padrao">
<h1>Inclusão de Veículo</h1>

<form action="../../controlers/controlerVeiculo.php">
    <div class="padrao">
        <label for="placa">Placa:</label>
        <input type="text" name="placa" required>
    </div>
    
    <div class="padrao">
        <label for="nomeVeiculo">Nome:</label>
        <input type="text" name="nomeVeiculo" required>
    </div>
    
    <div class="padrao">
        <label for="anoFabricacao">Ano de Fabricacao:</label>
        <input type="number" min="1900" max="2100" name="anoFabricacao" required>
    </div>
    
    <div class="padrao">
        <label for="fabricante">Fabricante:</label>
        <input type="text" name="fabricante" required>
    </div>

    <div class="padrao">
        <label for="motorizacao">Motorização:</label>
        <input type="text" name="motorizacao" required>
    </div>
    
    <div class="padrao">
        <label for="valorBase">Valor Base:</label>
        <input type="text" name="valorBase" required>
    </div>
    
    <div class="padrao">
        <label for="opcionais">Opcionais:</label>
        <input type="text" name="opcionais" required>
    </div>

    <div class="padrao">
        <label for="idCategoria">Id Categoria:</label>
        <input type="text" name="idCategoria" required>
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

<?php require_once "../includes/rodape.inc.php"; ?>
