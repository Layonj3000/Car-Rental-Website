<?php 
    include_once "../../model/socio.inc.php";
    include_once "../includes/cabecalho.inc.php";

    $usuario = $_SESSION["usuario"];
    $socio = $_SESSION["socio"];
?>

<div class="form-padrao">
        <h1>Seus Dados</h1>
        
        <form action="../../controlers/controlerUsuario.php">
            <div class="padrao">
                <label for="user">User:</label>
                <input type="text" name="user" value=<?=$usuario -> user?>>
            </div>

            <div class="padrao">
                <label for="senha">Senha:</label>
                <input type="text" name="senha" value=<?=$usuario -> senha?>>
            </div>

            <div class="padrao">
                <label for="cpf">CPF:</label>
                <input type="text" name="cpf" value=<?=$socio -> getCpf()?> readonly>
            </div>
        
            <div class="padrao">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" value="<?=$socio -> getNome()?>">
            </div>

            <div class="padrao">
                <label for="rg">RG:</label>
                <input type="text" name="rg" value=<?=$socio -> getRg()?> readonly>
            </div>
        
            <div class="padrao">
                <label for="endereco">Endereco:</label>
                <input type="text" name="endereco" value="<?=$socio -> getEndereco()?>">
            </div>

            <div class="padrao">
                <label for="telefone">Telefone:</label>
                <input type="tel" name="telefone" value="<?=$socio -> getTelefone()?>">
            </div>

            <div class="padrao">
                <label for="email">Email:</label>
                <input type="email" name="email" value=<?=$socio -> getEmail()?>>
            </div>

            <input type="hidden" name="id_usuario" value=<?=$usuario -> id?>>
            <input type="hidden" name="tipo_usuario" value=<?=$usuario -> tipo_usuario?>>


            <div class="botoes">
                <input type="submit" value="Confirmar Alteração" onclick="setOpcao(4)">
                <input type="submit" id="exclusao" value="Excluir Dados" onclick="return confirmarExclusao()">
            </div>

            <input type="hidden" name="opcao" value="4">
        </form> 
</div> 

<script>
function setOpcao(valor) {
    document.querySelector('input[name="opcao"]').value = valor;
}

function alertaConfirmacao(){
    return confirm("Isso excluirá permanentemente sua conta! Tem certeza que deseja fazer isso?");
}

function confirmarExclusao(){
    if(alertaConfirmacao()){
        setOpcao(5);
        return true;
    } else {
        return false; 
    }
}
</script>