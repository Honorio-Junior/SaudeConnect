<?php

    include('conexao.php');

    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }else{
        
        // Receber dados enviados pelo JavaScript
        $data = json_decode(file_get_contents('php://input'), true);

        $nome_paciente = $data['nome_paciente'];
        $nome_responsavel = $data['nome_responsavel'];
        $idade = $data['idade'];
        $sexo = $data['sexo'];
        $telefone = $data['telefone'];
        $email = $data['email'];
        $senha = $data['senha'];
        
        $sql = "INSERT INTO pacientes (nome_paciente, telefone, senha, nome_responsavel, email, idade, sexo) 
                VALUES ('$nome_paciente', '$telefone', '$senha', '$nome_responsavel', '$email', '$idade', '$sexo')";

        $result = $conn->query($sql);

        if ($result) {
            $response = array('message' => 'Dados do paciente inseridos com sucesso.');
        } else {
            $response = array('message' => 'Erro ao inserir dados: ' . $conn->error);
        }

        $conn->close();

        header('Content-Type: application/json');
        echo json_encode($response);

    }
?>
