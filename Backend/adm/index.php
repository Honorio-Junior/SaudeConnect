<?php
    include('./conexao.php');

    function nomes($conn, $data){

        $nova_data = $data;
        foreach ($nova_data as &$objeto) {

            $id_medico = $objeto['id_medico'];
            $sql = " SELECT medico.nome FROM medico WHERE id = '$id_medico' ";
            $result = $conn->query($sql);
            $data_medico = $result->fetch_assoc();
            $objeto["nome_medico"] = $data_medico['nome'];


            $id_paciente = $objeto['id_paciente'];

            $sql = " SELECT paciente.nome FROM paciente WHERE id = '$id_paciente' ";
            $result = $conn->query($sql);
            $data_paciente = $result->fetch_assoc();

            $objeto["nome_paciente"] = $data_paciente['nome'];
        }
        return $nova_data;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'GET'){

        if(empty($_GET['ID']) && $_GET['ID'] != '0'){
            $sql = " SELECT * FROM agendamento ";
    
            $result = $conn->query($sql);
    
            $data = array();
            if ($result){
                while ($row = $result->fetch_assoc()) {
                    $data[] = $row;
                }
            }
            $dados = nomes($conn, $data);
            echo '<script>';
            echo 'var dados = ' . json_encode($dados) . ';';
            echo '</script>';
        }else{
            $ID = $_GET['ID'];
            $sql = " SELECT * FROM agendamento WHERE id_medico = '$ID' ";
    
            $result = $conn->query($sql);
    
            $data = array();
            if ($result){
                while ($row = $result->fetch_assoc()) {
                    $data[] = $row;
                }
            }
            $dados = nomes($conn, $data);
            echo '<script>';
            echo 'var dados = ' . json_encode($dados) . ';';
            echo '</script>';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="./" method="GET">
        <p>Buscar agendamento médico</p>
        <label for="ID">Informe o ID: <input id='ID'type="text" name="ID"></label><br>
        <input type="submit" value="Buscar">
    </form>
</body>
<script>
    console.log(dados);
</script>
</html>
