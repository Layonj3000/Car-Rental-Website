<?php 
    include_once "../../model/exemplar.inc.php";
    include_once "../includes/cabecalho.inc.php";

    $exemplar = $_SESSION['exemplar'];
?>

<div class="form-padrao">
<h1>Atualização de Exemplar</h1>

<form action="../../controlers/controlerExemplar.php">
    <div class="padrao">
        <label for="placaVeiculo">Placa Veiculo:</label>
        <input type="text" name="placaVeiculo" value=<?=$exemplar -> getPlacaVeiculo()?> required>
    </div>
    
    <div class="padrao">
        <label for="idLocacao">ID Locacao:</label>
        <input type="text" name="idLocacao" value=<?=$exemplar -> getIdLocacao()?> required>
    </div>
    
    <div class="locado">
        <label for="Locado">Locado:</label>
        <select name="Locado">
            <option value="1" <?=$exemplar -> getLocado() == 1? "selected":"" ?>>Sim</option>
            <option value="0" <?=$exemplar -> getLocado() == 0? "selected": "" ?>>Não</option>
        </select>
    </div>


    <input type="hidden" name="idExemplar" value=<?=$exemplar -> getIdExemplar()?>>

    <input type="hidden" name="opcao" value="4">

    <div class="botoes">
        <input type="submit" value="Atualizar">
        <input type="button" value="Cancelar">
    </div>
</form>
    <div>
        
    </div>
</div>

<?php require_once "../includes/rodape.inc.php"; ?>
