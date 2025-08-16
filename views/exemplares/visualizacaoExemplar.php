<?php 
    include_once "../../model/exemplar.inc.php";
    include_once "../includes/cabecalho.inc.php";

    $exemplares = $_SESSION['exemplares'];
?>

<main>
    <div class="form-padrao">
        <h1>Visualização de Exemplares</h1>
    </div> 

    <div class="tabela-visualizacao">

        <table>
            <thead>
                <tr>
                    <th>Id Exemplar</th>
                    <th>Placa Veículo</th>
                    <th>Id Locacao</th>
                    <th>Locado</th>
                    <th>Operação</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($exemplares as $exemplar){
                        echo "<tr>";
                        echo "<td>" . $exemplar -> getIdExemplar() . "</td>";
                        echo "<td>" . $exemplar -> getPlacaVeiculo() . "</td>";
                        echo "<td>" . $exemplar -> getIdLocacao() . "</td>";
                        echo "<td>" . ($exemplar -> getLocado() == "1" ? "Sim" : "Não") . "</td>";
                        echo "<td class='operacoes'><a class='btn-alterar' href='../../controlers/controlerExemplar.php?opcao=3&idExemplar=". $exemplar -> getIdExemplar() ."'>A</a><a class='btn-excluir' href='../../controlers/controlerExemplar.php?opcao=5&idExemplar=". $exemplar -> getIdExemplar() ."'>X</a></td>";
                        echo "</tr>";
                    }    
                ?>    
            </tbody>
        </table>
    </div>
</main>

<?php require_once "../includes/rodape.inc.php"; ?>
