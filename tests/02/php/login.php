<?php

    session_set_cookie_params(0);
    include('conexao.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){

        if ($conn->connect_error) {
            die("Conexão falhou: " . $conn->connect_error);
        }else{


            $data = json_decode(file_get_contents('php://input'), true);

            $email = $data['email'];
            $senha = $data['senha'];

            $sql = "SELECT * FROM pacientes WHERE email = '$email' LIMIT 1";

            $result = $conn->query($sql);
        
            $row = $result->fetch_assoc();
        
            if ($row == NULL){
                $response = array('message' => 'Email ou senha incorretos');
            }else{
                if($senha == $row['senha']){
                    $response = array('message' => 'Login realizado com sucesso');
                    session_start();
                    $_SESSION['email'] = $email;
                    header('Location: ../cadastroagendamento/');
                    exit;
                }else{
                    $response = array('message' => 'Email ou senha incorretos');
                }
            }
            
            header('Content-Type: application/json');
            echo json_encode($response);
            $conn->close();
            exit;
            
        }
    }
?>
