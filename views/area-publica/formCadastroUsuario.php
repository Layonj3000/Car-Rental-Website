<?php 
    include_once "../../model/socio.inc.php";
    include_once "../includes/cabecalho.inc.php";
?>

<div class="form-padrao">
        <h1>Cadastro do Usuário</h1>
        
        <form action="../../controlers/controlerUsuario.php">
            <div class="padrao">
                <label for="user">User:</label>
                <input type="text" name="user" required>
            </div>

            <div class="padrao">
                <label for="senha">Senha:</label>
                <input type="text" name="senha" required>
            </div>

            <div class="padrao">
                <label for="cpf">CPF:</label>
                <input type="text" name="cpf" required>
            </div>
        
            <div class="padrao">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" required>
            </div>

            <div class="padrao">
                <label for="rg">RG:</label>
                <input type="text" name="rg" required>
            </div>
        
            <div class="padrao">
                <label for="endereco">Endereco:</label>
                <input type="text" name="endereco" required>
            </div>

            <div class="padrao">
                <label for="telefone">Telefone:</label>
                <input type="tel" name="telefone" required>
            </div>

            <div class="padrao">
                <label for="email">Email:</label>
                <input type="email" name="email" required>
            </div>

            <div class="botoes">
                <input type="submit" value="Confirmar Cadastro">
                <input type="button" value="Cancelar" onclick="cancelar()">
            </div>

            <input type="hidden" name="opcao" value="6">
        </form> 
</div> 

<script>
    function cancelar(){
        window.location.href = "formLogin.php";
    }
</script>