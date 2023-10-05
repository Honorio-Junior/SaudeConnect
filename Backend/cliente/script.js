
const botao_dados = document.querySelector('#botao_dados');
const medicos = document.querySelector('#medicos');
const botao_agendamentos = document.querySelector('#botao_agendamentos');
const data_agendamento = document.querySelector('#data_agendamento');
const botao_agendar = document.querySelector('#botao_agendar');
const botao_logout = document.querySelector('#botao_logout');

botao_dados.addEventListener('click', async ()=>{

    const response = await fetch('./php/dados_pessoal.php',
        {  
            method: 'GET', 
            headers: {'Content-Type': 'application/json'}
        }
    );

    const data = await response.json();

    console.log('Dados Pessoal:', data);

});

botao_agendamentos.addEventListener('click', async ()=>{

    const response = await fetch('./php/agendamentos.php',
        {  
            method: 'POST', 
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify({ funcao: 'agendamento_paciente' })
        }
    );

    const data = await response.json();

    console.log('Agendamentos:', data);

});

botao_agendar.addEventListener('click', async ()=>{

    const dados_agendamento = {
        id_medico: medicos.value,
        data_agendamento: data_agendamento.value
    }

    const response = await fetch('./php/cadastro_agendamento.php',
        {  
            method: 'POST', 
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify(dados_agendamento)
        }
    );

    const data = await response.json();
    if(data['error']){
        console.log(data['error']);
    }else{
        console.log(data['message']);
    }

});

botao_logout.addEventListener('click', async ()=>{

    const response = await fetch('./logout/',{method: 'GET'});
    
    if (response['redirected'] == true){
        const location = response['url'];
        console.log(response);
        if (location) {
            window.location.href = location;
        }
    }

});


async function buscarMedicos(){


    const response = await fetch('./php/medicos.php');
    const data = await response.json();
    
    console.log('medicos:', data)

    
    data.forEach(item => {
        const option = document.createElement('option')
        option.value = item['id'];
        option.text = item['nome'];
        medicos.appendChild(option)
    });

}
buscarMedicos();