<?php
    include_once "../../model/categoria.inc.php";
    include_once "../includes/cabecalho.inc.php";
    if (!isset($_SESSION['usuario']) || $_SESSION['usuario']->tipo_usuario !== 'administrador') {
        header("Location: ../area-publica/formLogin.php?aviso=acesso_negado");
        exit;
    }
    $categorias = $_SESSION['categorias'];
?>

<div class="form-padrao">
    <h1>Busca E Visualização de Categorias</h1>

    <form action="../../controlers/controlerCategoria.php">
        <div class="padrao">
            <label for="id_categoria">ID da Categoria:</label>
            <input type="text" name="id_categoria" id="id_categoria">
        </div>

        <div class="padrao">
            <label for="descricao">Descrição:</label>
            <input type="text" name="descricao" id="descricao">
        </div>

        <div class="botoes">
            <input type="submit" value="Buscar">
        </div>

        <input type="hidden" value="2" name="opcao">
    </form>
</div>

<div class="tabela-visualizacao">
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Descrição</th>
            <th>Valor</th>
            <th>Operação</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($categorias as $categoria) {
            echo "<tr>";
            echo "<td>" . $categoria->getIdCategoria() . "</td>";
            echo "<td>" . $categoria->getDescricao() . "</td>";
            echo "<td>" . $categoria->getValor() . "</td>";
            echo "<td class='operacoes'><a class='btn-alterar' href='../../controlers/controlerCategoria.php?opcao=3&id_categoria=" . $categoria->getIdCategoria() . "'>A</a><a class='btn-excluir' href='../../controlers/controlerCategoria.php?opcao=5&id_categoria=" . $categoria->getIdCategoria() . "'>X</a></td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
</div>

<?php require_once "../includes/rodape.inc.php"; ?>
