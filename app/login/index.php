<?php
    session_set_cookie_params(['lifetime' => 900]);
    session_start();
    include('../src/php/conexao.php');

    if (isset($_SESSION['paciente'])){
        header('Location: ../');
        exit;
    }else{
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    
            if ($conn->connect_error) {
                die("Conexão falhou: " . $conn->connect_error);
            }else{
    
                $email = $_POST['email'];
                $senha = $_POST['senha'];
                
                if($email == '' || $senha == ''){
                    header('Location: ./');
                    exit;
                }
    
                $sql = "SELECT * FROM paciente WHERE email = '$email' LIMIT 1";
    
                $result = $conn->query($sql);
            
                $row = $result->fetch_assoc();
            
                if ($row == NULL){
                    echo 'Email ou senha incorreto';
                }else{
                    if($senha == $row['senha']){
                        $_SESSION['paciente'] = $row;
                        header('Location: ../');
                        exit;
                    }else{
                        echo 'Email ou senha incorreto';
                    }
                }
            }
        }
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
    <form action="./" method="POST">
        <label for="email">Email: 
            <input type="email" id="email" name="email">
        </label>
        <br>
        <label for="senha">Senha: 
            <input type="password" id="senha" name="senha">
        </label>
        <br>
        <input type="submit" value="Entrar">
    </form>
    <button onclick='cadastrar()' id='botao_cadastrar'>Cadastrar</button>
</body>
<script>
    const botao_cadastrar = document.querySelector('#botao_cadastrar');
    
    function cadastrar(){
        window.location.href = '../cadastro/';
    }
</script>
</html>
