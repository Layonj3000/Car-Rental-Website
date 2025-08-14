<?php
include_once "../includes/cabecalho.inc.php";
?>

<div class="form-padrao">
    <h1>Inclusão de Categoria</h1>

    <form action="../../controlers/controlerCategoria.php">
        <div class="padrao">
            <label for="descricao">Descricao:</label>
            <input type="text" id="descricao" name="descricao"/>
        </div>

        <div class="padrao">
            <label for="valor">Valor:</label>
            <input type="number" step="0.01" id="valor" name="valor">
        </div>

        <div class="botoes">
            <input type="submit" value="Incluir">
            <input type="button" value="Cancelar">
        </div>

        <input type="hidden" name="opcao" value="1">
    </form>
</div>