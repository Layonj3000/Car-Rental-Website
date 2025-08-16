<?php
    session_start();
    require_once "../model/contato.inc.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $contato = new Contato();
        
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $assunto = filter_input(INPUT_POST, 'assunto', FILTER_SANITIZE_SPECIAL_CHARS);
        $mensagem = filter_input(INPUT_POST, 'mensagem', FILTER_SANITIZE_SPECIAL_CHARS);

        $resultado = $contato->enviarMensagem($nome, $email, $assunto, $mensagem);

        if ($resultado) {
            header("Location: ../views/area-publica/contato-sucesso.php");
            exit;
        } else {
            $_SESSION['erro'] = 'Não foi possível enviar a mensagem. Tente novamente.';
            header("Location: ../views/area-publica/fale-conosco.php");
            exit;
        }
    }
?>