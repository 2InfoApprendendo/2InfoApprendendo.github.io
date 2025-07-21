<?php
// Módulo de Log
class Logger {
    public static function log($mensagem) {
        file_put_contents('log.txt', $mensagem . PHP_EOL, FILE_APPEND);
    }
}

// Módulo de Email
class EmailSender {
    public static function enviar($destinatario, $mensagem) {
        // Simulação de envio
        return "Email para $destinatario: $mensagem";
    }
}

// Uso integrado
Logger::log("Enviando email...");
echo EmailSender::enviar("user@exemplo.com", "Olá!");
?>