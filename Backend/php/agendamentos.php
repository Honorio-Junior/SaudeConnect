<?php

    include("conexao.php");

    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }else{

        $sql = "SELECT * FROM agendamentos";
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