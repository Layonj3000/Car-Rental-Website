<?php
    include_once "../includes/cabecalho.inc.php";
    if (!isset($_SESSION['usuario']) || $_SESSION['usuario']->tipo_usuario !== 'administrador') {
        header("Location: ../area-publica/formLogin.php?aviso=acesso_negado");
        exit;
    }
?>

<div class="form-padrao">
    <h1>Inclusão de Categoria</h1>

    <form action="../../controlers/controlerCategoria.php">
        <div class="padrao">
            <label for="descricao">Descricao:</label>
            <input type="text" id="descricao" name="descricao" required/>
        </div>

        <div class="padrao">
            <label for="valor">Valor:</label>
            <input type="number" step="0.01" id="valor" name="valor" required>
        </div>

        <div class="botoes">
            <input type="submit" value="Incluir">
            <input type="button" value="Cancelar" onclick="cancelar()">
        </div>

        <input type="hidden" name="opcao" value="1">
    </form>
</div>

<?php require_once "../includes/rodape.inc.php"; ?>

<script>
    function cancelar(){
        window.location.href = "visualizacaoCategorias.php";
    }
</script>