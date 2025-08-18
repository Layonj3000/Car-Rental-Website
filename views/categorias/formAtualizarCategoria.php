<?php
    include_once "../../model/categoria.inc.php";
    include_once "../includes/cabecalho.inc.php";
    if (!isset($_SESSION['usuario']) || $_SESSION['usuario']->tipo_usuario !== 'administrador') {
        header("Location: ../area-publica/formLogin.php?aviso=acesso_negado");
        exit;
    }
    $categoria = new Categoria();
    $categoria = $_SESSION['categoria'];
?>

<div class="form-padrao">
    <h1>Atualizacao de Categoria</h1>

    <form action="../../controlers/controlerCategoria.php">
        <div class="padrao">
            <label for="descricao">Descrição:</label>
            <input type="text" name="descricao" id="descricao" value=<?= $categoria->getDescricao() ?> required>
        </div>

        <div class="padrao">
            <label for="valor">Valor:</label>
            <input type="number" name="valor" id="valor" value=<?= $categoria->getValor() ?> required>
        </div>

        <div class="botoes">
            <input type="submit" value="Atualizar">
            <input type="button" value="Cancelar" onclick="cancelar()">
        </div>

        <input type="hidden" name="id_categoria" value="<?= $categoria->getIdCategoria() ?>">
        <input type="hidden" name="opcao" value="4">
    </form>
</div>

<?php require_once "../includes/rodape.inc.php"; ?>

<script>
    function cancelar(){
        window.location.href = "visualizacaoCategorias.php";
    }
</script>