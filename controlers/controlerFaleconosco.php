<?php
    session_start();
    // Inclui o Model de Contato
    require_once "../model/contato.inc.php";

    // Verifica se a requisição é POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Cria uma instância do Model
        $contato = new Contato();
        
        // Recebe e sanitiza os dados do formulário
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $assunto = filter_input(INPUT_POST, 'assunto', FILTER_SANITIZE_SPECIAL_CHARS);
        $mensagem = filter_input(INPUT_POST, 'mensagem', FILTER_SANITIZE_SPECIAL_CHARS);

        // Chama o método do Model para processar o contato
        $resultado = $contato->enviarMensagem($nome, $email, $assunto, $mensagem);

        if ($resultado) {
            // Redireciona para a View de sucesso
            header("Location: ../views/contato-sucesso.php");
            exit;
        } else {
            // Redireciona de volta com uma mensagem de erro
            // Usar $_SESSION para exibir a mensagem na View
            $_SESSION['erro'] = 'Não foi possível enviar a mensagem. Tente novamente.';
            header("Location: ../views/fale-conosco.php");
            exit;
        }
    }
?>