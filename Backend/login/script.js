const email = document.querySelector('#email');
const senha = document.querySelector('#senha');

const status_login = document.querySelector('#status_login');
const botao_entrar = document.querySelector('#botao_entrar');


botao_entrar.addEventListener('click', fazer_login);


async function fazer_login(){
    // ...

    const login = {
        email: email.value,
        senha: senha.value
    }

    const response = await fetch('../php/login.php',
        {method: 'POST', 
        headers: {'Content-Type': 'application/json'}, 
        body: JSON.stringify(login)}
    )

    if (response['redirected'] == true){
        status_login.textContent = 'Login realizado!';
        const location = response['url'];
        console.log(response);
        if (location) {
            window.location.href = location;
        }
    }else{
        const data = await response.json();
        status_login.textContent = data['message'];
    }

}