const nomePaciente = document.getElementById('nome_paciente');
const nomeResponsavel = document.getElementById('nome_responsavel');
const nomeMedico = document.getElementById('nome_medico');
const dataAgendamento = document.getElementById('data_agendamento');
const getData = document.getElementById('getData');
const deslogar = document.getElementById('deslogar');

const btCadastrar = document.getElementById('btCadastrar');

btCadastrar.addEventListener('click', async ()=>{


    try {
        //Cria um objeto contendo os valores inseridos
        const novoAgendamento = {
            nome_paciente: nomePaciente.value, 
            nome_medico: nomeMedico.value, 
            nome_responsavel: nomeResponsavel.value,
            data_agendamento: dataAgendamento.value
        }

        const pesquisarAgendamento = {
            nome_medico: nomeMedico.value
        }

        const response = await fetch('../php/pesquisar_agendamento.php', {method: 'POST', headers: {'Content-Type': 'application/json'}, body: JSON.stringify(pesquisarAgendamento)});
        const data = await response.json();
        console.log('Agendamentos:', data);

        const cadastrar = await fetch('../php/cadastro_agendamento.php', {method: 'POST', headers: {'Content-Type': 'application/json'}, body: JSON.stringify(novoAgendamento)});

        //Limpa os campos de input
        dataAgendamento.value = '';

    } catch (error) {
        console.error('Erro ao enviar os dados:', error);
    }

});


getData.addEventListener('click', async ()=>{

    const pesquisarAgendamento = {
        nome_medico: nomeMedico.value
    }

    const response = await fetch('../php/pesquisar_agendamento.php', {method: 'POST', headers: {'Content-Type': 'application/json'}, body: JSON.stringify(pesquisarAgendamento)});
    
    const data = await response.json();

    console.log('Agendamentos:', data);
    
});


deslogar.addEventListener('click', async () =>{

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



async function buscarMedicos(){
    try {

        const response = await fetch('../php/medicos.php');
        const data = await response.json();
        
        console.log('medicos:', data)

        
        data.forEach(item => {
            const option = document.createElement('option')
            option.value = item['nome'];
            option.text = item['nome'];
            nomeMedico.appendChild(option)
        });
    }
    catch (error) {
        console.error('Erro ao buscar dados:', error);
    }
}
buscarMedicos();
