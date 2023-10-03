<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){

        include('conexao.php');
        
        if ($conn->connect_error) {
            die("Conexão falhou: " . $conn->connect_error);
        }else{
            
            // Receber dados enviados pelo JavaScript
            $data = json_decode(file_get_contents('php://input'), true);

            $cpf = $data['cpf'];
            $nome = $data['nome'];
            $profissao = $data['profissao'];
            $nascimento = $data['nascimento'];
            $email = $data['email'];
            
            $sql = "INSERT INTO Funcionario (cpf, nome, profissao, nascimento, email) VALUES ('$cpf', '$nome', '$profissao', '$nascimento', '$email')";
            $result = $conn->query($sql);

            if ($result) {
                $response = array('message' => 'Dados do funcionário inseridos com sucesso.');
            } else {
                $response = array('message' => 'Erro ao inserir dados: ' . $conn->error);
            }

            $conn->close();

            header('Content-Type: application/json');
            echo json_encode($response);

        }
    }
?>
