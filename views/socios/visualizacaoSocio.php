<?php 
    include_once "../../model/socio.inc.php";
    include_once "../includes/cabecalho.inc.php";
    if (!isset($_SESSION['usuario']) || $_SESSION['usuario']->tipo_usuario !== 'administrador') {
        header("Location: ../area-publica/formLogin.php?aviso=acesso_negado");
        exit;
    }
    $socios = $_SESSION['socios'];
?>

<main>
    <div class="form-padrao">
        <h1>Visualização de Sócios</h1>
    </div> 

    <div class="tabela-visualizacao">

        <table>
            <thead>
                <tr>
                    <th>Cpf</th>
                    <th>Nome</th>
                    <th>Rg</th>
                    <th>Endereco</th>
                    <th>Telefone</th>
                    <th>E-mail</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($socios as $socio){
                        echo "<tr>";
                        echo "<td>" . $socio -> getCpf() . "</td>";
                        echo "<td>" . $socio -> getNome() . "</td>";
                        echo "<td>" . $socio -> getRg() . "</td>";
                        echo "<td>" . $socio -> getEndereco() . "</td>";
                        echo "<td>" . $socio -> getTelefone() . "</td>";
                        echo "<td>" . $socio -> getEmail() . "</td>";
                        echo "</tr>";
                    }    
                ?>    
            </tbody>
        </table>
    </div>
</main>

<?php require_once "../includes/rodape.inc.php"; ?>
