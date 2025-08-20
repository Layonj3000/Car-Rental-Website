<?php 
    include_once "includes/cabecalho.inc.php";
?>

<div class="form-padrao">
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
    
    <!-- <div class="padrao">
        <label for="endereco">Endereço:</label>
        <input type="text" name="endereco">
    </div> -->

    <div class="padrao">
        <label for="logradouro">Logradouro:</label>
        <input type="text" name="logradouro">
    </div>

    <div class="padrao">
        <label for="cidade">Cidade:</label>
        <input type="text" name="cidade">
    </div>

    <div class="padrao">
        <label for="estado">Estado:</label>
        <input type="text" name="estado">
    </div>

    <div class="padrao">
        <label for="cep">Cep:</label>
        <input type="text" name="cep">
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

<?php require_once "includes/rodape.inc.php"; ?>
