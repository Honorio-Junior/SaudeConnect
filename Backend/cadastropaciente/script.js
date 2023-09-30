const nome_paciente = document.querySelector('#nome_paciente');
const nome_responsavel = document.querySelector('#nome_responsavel');
const idade = document.querySelector('#idade');
const sexo = document.querySelector('#sexo');
const telefone = document.querySelector('#telefone');
const email = document.querySelector('#email');
const senha = document.querySelector('#senha');

const botao_cadastrar = document.querySelector('#botao_cadastrar');


botao_cadastrar.addEventListener('click', cadastrar_paciente);


async function cadastrar_paciente() {
    const novo_paciente = {
        nome_paciente: nome_paciente.value,
        nome_responsavel: nome_responsavel.value,
        idade: idade.value,
        sexo: sexo.value,
        telefone: telefone.value,
        email: email.value,
        senha: senha.value,
    }

    const response = await fetch('../php/cadastro_paciente.php', 
            {method: 'POST', 
            headers: {'Content-Type': 'application/json'}, 
            body: JSON.stringify(novo_paciente)}
        );
    
    const data = await response.json();
    
    console.log(data['message'])

}
