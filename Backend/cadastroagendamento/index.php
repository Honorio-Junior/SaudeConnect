<?php

    session_start();

    if (!isset($_SESSION['email'])) {
        header('Location: ../login/');
        exit;
    }

    function deslogar(){
        session_destroy();
        header('Location: ../login/');
        exit;
    }


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = json_decode(file_get_contents('php://input'), true);
        $funcao = $data['funcao'];
    
        if (function_exists($funcao)) {
            call_user_func($funcao);
        }
    }


    include('../php/conexao.php');

    $email = $_SESSION['email'];

    $sql = "SELECT * FROM pacientes WHERE email = '$email' ";

    $result = $conn->query($sql);

    $data = array();

    $row = $result->fetch_assoc();

    $nome_paciente = $row['nome_paciente'];
    $nome_responsavel = $row['nome_responsavel'];

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto Web</title>
    <link rel="stylesheet" href="style.css">    
</head>
<body>

    <div class="box">        

        <p>Cadastrar agendamento:</p>

        <label for="nome_paciente">Paciente: 
            <input readonly type="text" name="nome_paciente" id="nome_paciente" value="<?php echo $nome_paciente;?>"></label>

        <label for="nome_responsavel">Responsavel: 
            <input readonly type="text" name="nome_responsavel" id="nome_responsavel" value="<?php echo $nome_responsavel;?>"></label>

        <label for="nome_medico">Médico: 
            <select id="nome_medico" name="nome_medico"></select></label> 

        <label for="data_agendamento">Data: 
            <input type="date" name="data_agendamento" id="data_agendamento"></label>
        
        <button id="btCadastrar">Cadastrar</button>

        <button id="getData">Obter Dados</button>

        <button id="deslogar">deslogar</button>

    </div>

</body>
</html>
<script src="script.js"></script>

