<?php 
    include_once "../model/veiculo.inc.php";
    include_once "includes/cabecalho.inc.php";

    $veiculos = $_SESSION['veiculos'];
?>

<div class="form-padrao">
    <h1>Busca E Visualização de Veículos</h1>

    <form action="">
        <div class="padrao">
            <label for="placa">Placa:</label>
            <input type="text" name="placa">
        </div>
    
        <div class="padrao">
            <label for="nomeVeiculo">Nome:</label>
            <input type="text" name="nomeVeiculo">
        </div>

        <div class="padrao">
            <label for="fabricante">Fabricante:</label>
            <input type="text" name="fabricante">
        </div>
    
        <div class="padrao">
            <label for="motorizacao">Motorizacao:</label>
            <input type="text" name="motorizacao">
        </div>

        <div class="botoes">
            <input type="submit" value="Buscar">
        </div>
    </form>
</div>

<div class="tabela-visualizacao-veiculos">

    <table>
        <thead>
            <tr>
                <th>Placa</th>
                <th>Nome</th>
                <th>Ano De Fabricação</th>
                <th>Fabricante</th>
                <th>Opcionais</th>
                <th>Motorizacao</th>
                <th>Valor Base</th>
                <th>Id Categoria</th>
                <th>Operação</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($veiculos as $veiculo){
                    echo "<tr>";
                    echo "<td>" . $veiculo -> getPlaca() . "</td>";
                    echo "<td>" . $veiculo -> getNome() . "</td>";
                    echo "<td>" . $veiculo -> getAnoFabricacao() . "</td>";
                    echo "<td>" . $veiculo -> getFabricante() . "</td>";
                    echo "<td>" . $veiculo -> getOpcionais() . "</td>";
                    echo "<td>" . $veiculo -> getMotorizacao() . "</td>";
                    echo "<td>" . $veiculo -> getValorBase() . "</td>";
                    echo "<td>" . $veiculo -> getIdCategoria() . "</td>";
                    echo "<td class='operacoes'><a class='btn-alterar' href='../controlers/controlerVeiculo.php?opcao=3&placa=". $veiculo -> getPlaca() ."'>A</a><a class='btn-excluir' href='../controlers/controlerVeiculo.php?opcao=5&placa=". $veiculo -> getPlaca() ."'>X</a></td>";
                    echo "</tr>";
                }    
            ?>    
        </tbody>
    </table>
</div>