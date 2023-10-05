<?php

    if ($_SERVER['REQUEST_URI'] === '/teste/conexao.php') {
        // Impedir o acesso direto ao arquivo
        http_response_code(404);
        exit();
    }

    $host ='localhost';
    $user = 'root';
    $senha = '';
    $banco = 'saudeconnect';

    $conn = new mysqli($host, $user,$senha, $banco);

?>
