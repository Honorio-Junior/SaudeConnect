const btBuscar = document.getElementById('btBuscar');
const nomeMedico = document.getElementById('nome_medico');


btBuscar.addEventListener('click', async (e) => {
    e.preventDefault()

    const pesquisarAgendamento = {
        nome_medico: nomeMedico.value
    }

    const response = await fetch('../pesquisarAgendamento.php', { method: 'POST', headers: { 'Content-Type': 'application/json' }, body: JSON.stringify(pesquisarAgendamento) });

    const data = await response.json();

    console.log('Agendamentos:', data);
})
