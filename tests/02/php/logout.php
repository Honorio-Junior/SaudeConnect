<?php

    session_start();

    if (!isset($_SESSION['email'])) {
        session_destroy();
        header('Location: ../login/');
        exit;
    }else{

        function deslogar(){
            session_destroy();
            header('Location: ../login/');
            exit;
        }
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents('php://input'), true);
            $funcao = $data['funcao'];
        
            if (function_exists($funcao)) {
                call_user_func($funcao);
            }
        }
    }
?>
