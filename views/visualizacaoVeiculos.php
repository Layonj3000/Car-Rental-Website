<?php 
    include_once "includes/formBuscaVeiculos.inc.php";
?>

<div>

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
                echo "<tr>";
                echo "<td>Teste1</td>";
                echo "<td>Teste2</td>";
                echo "<td>Teste3</td>";
                echo "<td>Teste1</td>";
                echo "<td>Teste2</td>";
                echo "<td>Teste3</td>";
                echo "<td>Teste1</td>";
                echo "<td>Teste2</td>";
                echo "<td class='operacoes'><a class='btn-alterar' href='#'>A</a><a class='btn-excluir' href='#'>X</a></td>";
                echo "</tr>";
            ?>    
        </tbody>
    </table>
</div>