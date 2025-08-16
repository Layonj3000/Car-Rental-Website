<?php 
    include_once "../includes/cabecalho.inc.php";
?>

<div class="form-padrao">
<h1>Inclusão de Exemplar</h1>

<form action="../../controlers/controlerExemplar.php">
    <div class="padrao">
        <label for="placaVeiculo">Placa Veiculo:</label>
        <input type="text" name="placaVeiculo" required>
    </div>
    
    <div class="padrao">
        <label for="idLocacao">ID Locacao:</label>
        <input type="text" name="idLocacao" required>
    </div>
    
    <div class="locado">
        <label for="Locado">Locado:</label>
        <select name="Locado">
            <option value="1">Sim</option>
            <option value="0">Não</option>
        </select>
    </div>

    <input type="hidden" name="opcao" value="1">

    <div class="botoes">
        <input type="submit" value="Incluir">
        <input type="button" value="Cancelar">
    </div>
</form>
</div>

<?php require_once "../includes/rodape.inc.php"; ?>
