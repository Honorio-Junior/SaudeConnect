<?php
    session_start();
    include('./src/php/conexao.php');

    if (isset($_SESSION['paciente'])){

    }else{
        header('Location: ./login/');
        session_destroy();
        exit;
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1><?php echo $_SESSION['paciente']['nome']; ?></h1>

    <button id='botao_dados'>Dados pessoal</button>
    <button id='botao_agendamentos'>Agendamentos</button>
    <button id='botao_logout'>Sair</button>

    <h2>Realizar Agendamento:</h2>

    <label for="data_agendamento">Data: 
        <input type="date" id="data_agendamento">
    </label>

    <select id="medicos"></select>
    <button id='botao_agendar'>Agendar</button>


</body>
<script src="./script.js"></script>
</html>
