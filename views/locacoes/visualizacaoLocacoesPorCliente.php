<?php 
    include_once "../../model/locacao.inc.php";
    include_once "../../utils/funcoesUteis.php";
    include_once "../includes/cabecalho.inc.php";
    $locacoes = $_SESSION['locacoes'];
?>

<main>
    <div class="form-padrao">
        <h1>Suas Locações</h1>
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
