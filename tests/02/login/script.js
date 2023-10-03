const email = document.querySelector('#email');
const senha = document.querySelector('#senha');
const botao_entrar = document.querySelector('#botao_entrar');
const botao_cadastrar = document.querySelector('#botao_cadastrar');


botao_entrar.addEventListener('click', fazer_login);

botao_cadastrar.addEventListener('click', ()=>{
    window.location.href = '../cadastropaciente/';
});

""
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
        const location = response['url'];
        console.log(response);
        if (location) {
            window.location.href = location;
        }
    }

}
