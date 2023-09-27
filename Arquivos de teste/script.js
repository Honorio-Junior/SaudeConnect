const cpf = document.querySelector('#cpf');
const nome = document.querySelector('#nome');
const profissao = document.querySelector('#profissao');
const nascimento = document.querySelector('#nascimento');
const email = document.querySelector('#email');
const dataDisplay = document.getElementById('dataDisplay');

const Receber = async () => {
    try {
        //Limpa o conteúdo da div que mostra os dados
        dataDisplay.innerHTML = '';

        //Faz uma solicitação ao arquivo php e guarda a resposta json na varaivel data
        const response = await fetch('ArquivosPHP/receber.php', {method: 'POST'});
        const data = await response.json();
        
        //Percorre os items do json (data) e cria uma elemento div com cpf, nome, profissao e diciona no div: dataDisplay
        data.forEach(item => {
            const newItem = document.createElement('div');
            newItem.innerHTML = `
                <hr>
                <p>CPF: ${item.cpf}</p>
                <p>Nome: ${item.nome}</p>
                <p>Profissão: ${item.profissao}</p>
                <p>Nascimento: ${item.nascimento}</p>
                <p>Email: ${item.email}</p>
                <input type="checkbox" class="checkbox" data-cpf="${item.cpf}">
                <hr>`;
            dataDisplay.appendChild(newItem);
        });
    }
    catch (error) {
        console.error('Erro ao buscar dados:', error);
    }
}

const Enviar = async () => {

    try {
        //Cria um objeto contendo os valores inseridos
        const novoFuncionario = {
            cpf: cpf.value, 
            nome: nome.value, 
            profissao: profissao.value,
            nascimento: nascimento.value,
            email: email.value
        }

        //Faz a solicitação ao php para enviar os dados informados pela const acima
        const response = await fetch('ArquivosPHP/cadastrar.php', {method: 'POST', headers: {'Content-Type': 'application/json'}, body: JSON.stringify(novoFuncionario)});
        
        //Aguarda a resposta do php
        const data = await response.json();

        //Imprime no console resposta
        console.log(data);

        //Limpa os campos de input
        cpf.value = '';
        nome.value = '';
        profissao.value = '';
        nascimento.value = '';
        email.value = '';

    } catch (error) {
        console.error('Erro ao enviar os dados:', error);
    }
}

const Apagar = async () => {


    console.log('Fazer a função apagar...');


}
