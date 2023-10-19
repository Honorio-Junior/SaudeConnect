<?php
    include('../src/php/conexao.php');

    if ($_SERVER['REQUEST_METHOD'] === 'GET'){

        if(empty($_GET['ID'])){
            $sql = " SELECT * FROM agendamento ";
    
            $result = $conn->query($sql);
    
            $data = array();
            if ($result){
                while ($row = $result->fetch_assoc()) {
                    $data[] = $row;
                }
            }
            echo '<script>';
            echo 'var dados = ' . json_encode($data) . ';';
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
            echo '<script>';
            echo 'var dados = ' . json_encode($data) . ';';
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
        <label for="ID">Médico ID: <input id='ID'type="text" name="ID"></label><br>  
        <input type="submit" value="Buscar">
    </form>
</body>
<script>
    console.log(dados);
</script>
</html>
