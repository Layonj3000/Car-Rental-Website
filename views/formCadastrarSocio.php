<?php 
    $estilo = "estiloFormGeral";
    include_once "includes/cabecalho.inc.php";
?>

<div>
<h1>Cadastro de Sócio</h1>

<form action="">
    <div class="padrao">
        <label for="cpf">CPF:</label>
        <input type="text" name="cpf">
    </div>
    
    <div class="padrao">
        <label for="nomeSocio">Nome:</label>
        <input type="text" name="nomeSocio">
    </div>
    
    <div class="padrao">
        <label for="rg">RG:</label>
        <input type="text" name="rg">
    </div>
    
    <div class="padrao">
        <label for="endereco">Endereço:</label>
        <input type="text" name="endereco">
    </div>

    <div class="padrao">
        <label for="telefone">Telefone:</label>
        <input type="text" name="telefone">
    </div>
    
    <div class="padrao">
        <label for="email">Email:</label>
        <input type="email" name="email">
    </div>

    <div class="botoes">
        <input type="submit" value="Incluir">
        <input type="button" value="Cancelar">
    </div>
</form>
    <div>
        
    </div>
</div>