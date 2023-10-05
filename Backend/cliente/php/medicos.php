<?php

    include("../conexao.php");

    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }else{

        $sql = "SELECT * FROM medico";
        $result = $conn->query($sql);
        $data = array();
        
        
        if ($result->num_rows > 0) {
            
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }

        $medicos = array();

        foreach ($data as $objeto) {    
            $medico = array(
                'id' => $objeto['id'],
                'nome' => $objeto['nome']
            );
            $medicos[] = $medico;
        }

        header('Content-Type: application/json');
        echo json_encode($medicos);

        $conn->close();

    }

?>
