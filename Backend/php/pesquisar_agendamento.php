<?php

    include("conexao.php");

    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }else{


        $data = json_decode(file_get_contents('php://input'), true);

        $nome_medico = $data['nome_medico'];

        $sql = "SELECT * FROM agendamentos WHERE nome_medico = '$nome_medico'";
        $result = $conn->query($sql);
        $data = array();
        
        
        if ($result->num_rows > 0) {
            
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }

        header('Content-Type: application/json');
        echo json_encode($data);

        $conn->close();

    }

?>