<?php if(isset($_SESSION['usuario'])): ?>
    <div id="modalSair" class="modal-custom"> 
      <div class="modal-dialogo">
        <div class="modal-cabecalho">
          <h5 class="modal-titulo">Sair do sistema</h5>
          <button type="button" class="btn-fechar" id="fecharModalSairX">&times;</button>
        </div>
        <div class="modal-corpo">
          <p>Você deseja realmente sair do sistema?</p>
        </div>
        <div class="modal-rodape">
          <button type="button" class="btn-cancelar" id="fecharModalSairBtn">Não</button>
          <a href="../../controlers/controlerUsuarioSocio.php?opcao=2" role="button" class="btn-confirmar">Sim, Sair</a>
        </div>
      </div>
    </div>
<?php endif; ?>

<?php if(isset($_REQUEST['erro']) && $_REQUEST['erro'] == 'veiculo_nao_disponivel'): ?>
    <div id="modalVeiculo" class="modal-custom mostrar">
      <div class="modal-dialogo">
        <div class="modal-cabecalho">
          <h5 class="modal-titulo">Atenção</h5>
          <button type="button" class="btn-fechar" id="fecharModalVeiculoX">&times;</button>
        </div>
        <div class="modal-corpo">
          <p>Um dos veículos selecionados para locação, se encontra indisponível no momento. Você ainda pode selecionar outros modelos em nosso Show Room!</p>
        </div>
        <div class="modal-rodape">
          <a href="../../controlers/controlerVeiculo.php?opcao=7" role="button" class="btn-confirmar">Ir para Show Room</a>
        </div>
      </div>
    </div>
<?php endif; ?>