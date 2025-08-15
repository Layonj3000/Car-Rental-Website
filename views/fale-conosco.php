<?php
    require_once "includes/cabecalho.inc.php"; 
?>

<main class="fale-conosco-container">
    <h1 class="text-center">Fale Conosco</h1>
    <p class="text-center">Entre em contato conosco preenchendo o formulário abaixo ou utilizando nossas informações de contato.</p>

    <?php
        if (isset($_SESSION['erro'])) {
            echo '<div class="alerta-erro text-center">' . $_SESSION['erro'] . '</div>';
            unset($_SESSION['erro']);
        }
    ?>
    <div class="contato-info">
        <h3>Informações de Contato</h3>
        <p><strong>Endereço:</strong> Rua da Locadora, 123 - Centro, Cidade - UF</p>
        <p><strong>Telefone:</strong> (11) 98765-4321</p>
        <p><strong>E-mail:</strong> contato@locadoradesweb.com</p>
    </div>

    <form class="formulario-contato" action="../controlers/controlerFaleconosco.php" method="POST">
        <div class="form-group">
            <label for="nome">Nome Completo</label>
            <input type="text" id="nome" name="nome" required>
        </div>
        
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" required>
        </div>
        
        <div class="form-group">
            <label for="assunto">Assunto</label>
            <input type="text" id="assunto" name="assunto" required>
        </div>
        
        <div class="form-group">
            <label for="mensagem">Mensagem</label>
            <textarea id="mensagem" name="mensagem" rows="6" required></textarea>
        </div>
        
        <div class="form-group">
            <button type="submit">Enviar Mensagem</button>
        </div>
    </form>
</main>

<?php require_once "includes/rodape.inc.php"; ?>