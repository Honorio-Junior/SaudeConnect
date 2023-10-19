<?php

    session_start();
    include('conexao.php');

    $data = json_decode(file_get_contents('php://input'), true);

    $id_paciente = $_SESSION['paciente']['id'];
    $data_agendamento = $data['data_agendamento'];
    $id_medico = $data['id_medico'];
    
    $sql = "INSERT INTO agendamento (id_paciente, id_medico, data_agendamento) 
            VALUES ('$id_paciente', '$id_medico', '$data_agendamento')";

    try{
        $result = $conn->query($sql);
    
        if ($result) {
            $response = array('message' => 'Dados do agendamento inseridos com sucesso.');
        } else {
            $response = array('message' => 'Erro ao inserir dados: ' . $conn->error);
        }
    }catch (Exception $e){
        $response = array('error' => 'Erro ao inserir dados: ' . $e->getMessage());
    }

    $conn->close();

    header('Content-Type: application/json');
    echo json_encode($response);

?>