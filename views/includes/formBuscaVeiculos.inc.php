<?php 
    $estilo = "visualizacaoVeiculos";
    include_once "includes/cabecalho.inc.php";
?>
    <div>
        <h1>Busca E Visualização de Veículos</h1>

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
                <label for="fabricante">Fabricante:</label>
                <input type="text" name="fabricante">
            </div>
    
            <div class="padrao">
                <label for="motorizacao">Motorizacao:</label>
                <input type="text" name="motorizacao">
            </div>

            <div class="botoes">
                <input type="submit" value="Buscar">
            </div>
        </form>
    </div>