<?php

    session_start();
    include('conexao.php');

    if (isset($_SESSION['paciente'])){

        function agendamento_paciente($conn){
            $id_paciente = $_SESSION['paciente']['id'];
            $sql = " SELECT * FROM agendamento WHERE id_paciente = '$id_paciente' ";
            $result = $conn->query($sql);
            $data = array();
            if ($result->num_rows > 0) { 
                while ($row = $result->fetch_assoc()) {
                    $data[] = $row;
                } 
            }
            return $data;
        }

        function agendamento_medico($conn){
            
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST'){

            $data = json_decode(file_get_contents('php://input'), true);
            $funcao = $data['funcao'];
        
            if (function_exists($funcao)) {
                $result = call_user_func($funcao, $conn);
            }

            header('Content-Type: application/json');
            echo json_encode($result);

        }

    }else{
        header('Location: ./login/');
        session_destroy();
        exit;
    }

?>
