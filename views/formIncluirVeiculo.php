<?php 
    $estilo = "estiloFormGeral";
    include_once "includes/cabecalho.inc.php";
?>

<div>
<h1>Inclusão de Veículo</h1>

<form action="">
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
    
    <div class="opcionais">
        <label for="opcionais">Opcionais:</label>
        <input type="text" name="opcionais">
    </div>

    <div class="botoes">
        <input type="submit" value="Incluir">
        <input type="button" value="Cancelar">
    </div>
</form>
    <div>
        
    </div>
</div>