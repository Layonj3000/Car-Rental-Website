<?php
class Contato {
    
    public function enviarMensagem($nome, $email, $assunto, $mensagem) {
        
        // 1. Validação dos dados (lógica de negócio)
        if (empty($nome) || !filter_var($email, FILTER_VALIDATE_EMAIL) || empty($assunto) || empty($mensagem)) {
            return false; // Retorna false se a validação falhar
        }

        // 2. Lógica para enviar o e-mail
        $to = "contato@locadoradesweb.com";
        $headers = "From: " . $email . "\r\n";
        $headers .= "Reply-To: " . $email . "\r\n";
        $headers .= "Content-type: text/html; charset=UTF-8\r\n";
        
        $email_body = "<h1>Nova Mensagem de Contato</h1>";
        $email_body .= "<p><strong>Nome:</strong> " . $nome . "</p>";
        $email_body .= "<p><strong>E-mail:</strong> " . $email . "</p>";
        $email_body .= "<p><strong>Assunto:</strong> " . $assunto . "</p>";
        $email_body .= "<p><strong>Mensagem:</strong><br>" . nl2br($mensagem) . "</p>";

        // 3. Chama a função de mock para simular o envio
        return $this->mock_mail($to, $assunto, $corpo_email, $headers);

        return $envio_sucesso; 
    }
    
    private function mock_mail($to, $subject, $message, $headers) {
        // Retorna true para simular o sucesso do envio sem precisar de um servidor de e-mail.
        return true;
    }

}
?>