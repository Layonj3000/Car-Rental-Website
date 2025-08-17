<?php
      require_once "../../model/exemplar.inc.php";
      require_once "../includes/cabecalho.inc.php";

      $socio = $_SESSION['socio'];
      $total = $_SESSION['total'];
      $carrinho = $_SESSION['carrinho'];
 ?>

<h1 class="text-center">Dados do cliente</h1>

<p>&nbsp;
<div style="font-size: 1.25rem;">
    <p><b>Nome:</b> <?=$socio -> nome?></p>
    <p><b>CPF:</b> <?=$socio -> cpf?></p>
      <p><b>Endereço Completo:</b> <?=$socio -> logrodouro?>, <?=$socio -> cidade?> - <?=$socio -> estado?> . CEP: <?=$socio -> cep?></p>
      <p><b>Telefone:</b> <?=$socio -> telefone?></p>
      <p><b>Email:</b> <?=$socio -> email?></p>
      <p><hr><p>&nbsp;
</div>

<h1 class="text-center">Dados da compra</h1>
<div class="table-responsive">
<table class="table">
      <thead class="table-success">
            <tr class="align-middle" style="text-align: center">
                <th witdh="10%">Item</th>
                <th>Referencia</th>
                <th>Nome</th>
                <th>Fabricante</th>
                <th>Preço</th>
                <th>Qde.</th>
                <th>Valor</th>
            </tr>
      </thead>
      <tbody class="table-group-divider">
<?php
          // percurso do carrinho aqui!
      foreach($carrinho as $item){
?>
            <tr class="align-middle" style="text-align: center">
                  <td><img src="imagens/produtos/produto.jpg" width="100" height="100" border="0"></td>
                  <td><?= $item -> getVeiculo() -> getID() ?></td>
                  <td><?= $item -> getVeiculo() -> getNome()?></td>
                  <td><?= $item -> getVeiculo() -> getCodFabricante()?></td>
                  <td>R$ <?= number_format($item -> getVeiculo() ->  getPreco(),'2', ',', '.')?></td>
                  <td><?= $item -> getQuantidade()?></td>
                  <td>R$ <?= number_format($item -> getValorItem(),'2', ',', '.')?></td>
            </tr>
          <!-- percurso termina aqui -->
<?php
      }
?>
          <tr align="right"><td colspan="7"><font face="Verdana" size="4" color="red"><b>Valor Total = R$ total</b></font></td></tr>
          </table>
          <div class="container text-center">
            <div class="row">
                  <div class="col">
                        <a class="btn btn-success" role="button" href="dadosPagamento.php"><b>Efetuar o pagamento</b></a>
                  </div>
            </div>
         </div>

<!-- Rodape -->

<?php require_once "../includes/rodape.inc.php" ?>
