<?php

    session_start();

    if (isset($_SESSION['paciente'])){

        if ($_SERVER['REQUEST_METHOD'] === 'GET'){

            header('Content-Type: application/json');
            echo json_encode($_SESSION['paciente']);

        }

    }else{
        header('Location: ./login/');
        session_destroy();
        exit;
    }

?>
