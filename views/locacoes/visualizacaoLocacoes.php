<?php 
    include_once "../../model/locacao.inc.php";
    include_once "../../utils/funcoesUteis.php";
    include_once "../includes/cabecalho.inc.php";

    $locacoes = $_SESSION['locacoes'];
?>

<main>
    <div class="form-padrao">
        <h1>Visualização de Locações</h1>
        
        <form action="../../controlers/controlerLocacao.php">
            <div class="padrao">
                <label for="dataInicial">Data Inicial:</label>
                <input type="date" name="dataInicial">
            </div>
        
            <div class="padrao">
                <label for="dataFinal">Data Final:</label>
                <input type="date" name="dataFinal">
            </div>

            <div class="botoes">
                <input type="submit" value="Buscar">
            </div>

            <input type="hidden" name="opcao" value="2">
        </form> 
    </div> 

    <div class="tabela-visualizacao">

        <table>
            <thead>
                <tr>
                    <th>Id Locacao</th>
                    <th>Data</th>
                    <th>Valor Total</th>
                    <th>Cpf Sócio</th>
                    <th>Id Veículo</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($locacoes as $locacao){
                        echo "<tr>";
                        echo "<td>" . $locacao -> getIdLocacao() . "</td>";
                        echo "<td>" . formatarData($locacao -> getData()) . "</td>";
                        echo "<td>" . 'R$' . number_format($locacao -> getValorTotal(), '2', ',', '.') . "</td>";
                        echo "<td>" . $locacao -> getCpfSocio() . "</td>";
                        echo "<td>" . $locacao -> getIdVeiculo() . "</td>";
                        echo "</tr>";
                    }    
                ?>    
            </tbody>
        </table>
    </div>
</main>

<?php require_once "../includes/rodape.inc.php"; ?>
