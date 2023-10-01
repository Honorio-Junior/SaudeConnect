<?php

    session_start();

    if (!isset($_SESSION['email'])) {
        header('Location: ../');
        exit;
    }else{
        echo $_SESSION['email'];
    }

    function deslogar(){
        session_destroy();
        header('Location: ../');
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = json_decode(file_get_contents('php://input'), true);
        $funcao = $data['funcao'];
    
        if (function_exists($funcao)) {
            call_user_func($funcao);
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
    <br><button id='deslogar'>deslogar</button>
</body>

<script>
    const bt = document.querySelector('#deslogar');

    bt.addEventListener('click', async ()=>{

        const response = await fetch('./index.php', 
            {method: 'POST', 
            headers: {'Content-Type': 'application/json'}, 
            body: JSON.stringify({ funcao: 'deslogar' })}
        );

        if (response['redirected'] == true){
            const location = response['url'];
            console.log(response);
            if (location) {
                window.location.href = location;
            }
        }
    });

</script>
</html>
