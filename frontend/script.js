const nomePaciente = document.getElementById('nome_paciente');
const nomeMedico = document.getElementById('nome_medico');
const dataAgendamento = document.getElementById('data_agendamento');
const getData = document.getElementById('getData');

const btCadastrar = document.getElementById('btCadastrar');

btCadastrar.addEventListener('click', async ()=>{


    try {
        //Cria um objeto contendo os valores inseridos
        const novoAgendamento = {
            nome_paciente: nomePaciente.value, 
            nome_medico: nomeMedico.value, 
            data_agendamento: dataAgendamento.value
        }

        const pesquisarAgendamento = {
            nome_medico: nomeMedico.value
        }

        const response = await fetch('../pesquisarAgendamento.php', {method: 'POST', headers: {'Content-Type': 'application/json'}, body: JSON.stringify(pesquisarAgendamento)});
        
        const data = await response.json();

        console.log('Agendamentos:', data);

        const cadastrar = await fetch('../cadastrarAgendamento.php', {method: 'POST', headers: {'Content-Type': 'application/json'}, body: JSON.stringify(novoAgendamento)});

        //Limpa os campos de input
        nomePaciente.value = '';
        nomeMedico.value = '';
        dataAgendamento.value = '';

    } catch (error) {
        console.error('Erro ao enviar os dados:', error);
    }

});


// getData.addEventListener('click', async ()=>{

//     const pesquisarAgendamento = {
//         nome_medico: nomeMedico.value
//     }

//     const response = await fetch('../pesquisarAgendamento.php', {method: 'POST', headers: {'Content-Type': 'application/json'}, body: JSON.stringify(pesquisarAgendamento)});
    
//     const data = await response.json();

//     console.log('Agendamentos:', data);
    
// });


async function buscarMedicos(){
    try {

        const response = await fetch('../buscarMedicos.php', {method: 'POST'});
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
