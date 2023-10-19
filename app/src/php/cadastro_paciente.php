<?php

    include('conexao.php');

    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }else{
        
        // Receber dados enviados pelo JavaScript
        $data = json_decode(file_get_contents('php://input'), true);

        $nome = $data['nome'];
        $responsavel = $data['responsavel'];
        $idade = $data['idade'];
        $sexo = $data['sexo'];
        $telefone = $data['telefone'];
        $email = $data['email'];
        $senha = $data['senha'];
        
        $sql = "INSERT INTO paciente (nome, telefone, senha, responsavel, email, idade, sexo) 
                VALUES ('$nome', '$telefone', '$senha', '$responsavel', '$email', '$idade', '$sexo')";

        try{
            $result = $conn->query($sql);

            if ($result) {
                $response = array("message" => "Dados do paciente inseridos com sucesso.");
            } else {
                $response = array("message" => "Erro ao inserir dados: " . $conn->error);
            }

        }catch (Exception $e){
            $response = array("error" => "Erro ao inserir dados: " . $e->getMessage());
        }

        $conn->close();

        header('Content-Type: application/json');
        echo json_encode($response);

    }
?>