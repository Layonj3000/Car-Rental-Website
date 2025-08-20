<?php if(isset($_SESSION['usuario'])): ?>
    <div id="meuModal" class="modal-custom">
      <div class="modal-dialogo">
        <div class="modal-cabecalho">
          <h5 class="modal-titulo">Sair do sistema</h5>
          <button type="button" class="btn-fechar" id="fecharModalX">&times;</button>
        </div>
        <div class="modal-corpo">
          <p>Você deseja realmente sair do sistema?</p>
        </div>
        <div class="modal-rodape">
          <button type="button" class="btn-cancelar" id="fecharModalBtn">Não</button>
          <a href="../../controlers/controlerUsuarioSocio.php?opcao=2" role="button" class="btn-confirmar">Sim, Sair</a>
        </div>
      </div>
    </div>
<?php endif; ?>