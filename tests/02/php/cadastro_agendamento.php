<?php

    include('conexao.php');

    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }else{
        
        // Receber dados enviados pelo JavaScript
        $data = json_decode(file_get_contents('php://input'), true);

        $nome_paciente = $data['nome_paciente'];
        $nome_responsavel = $data['nome_responsavel'];
        $data_agendamento = $data['data_agendamento'];
        $nome_medico = $data['nome_medico'];
        
        $sql = "INSERT INTO agendamentos (nome_paciente, nome_medico, data_agendamento, nome_responsavel) 
                VALUES ('$nome_paciente', '$nome_medico', '$data_agendamento', '$nome_responsavel')";
    
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

?>
