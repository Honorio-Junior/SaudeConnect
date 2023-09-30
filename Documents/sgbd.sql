-- Banco de dados 'saudeconnect'

-- Tabela 'medicos':
CREATE TABLE medicos (
    nome VARCHAR(200) NOT NULL,
    cpf VARCHAR(11) NOT NULL
);

-- Tabela 'agendamentos':
CREATE TABLE agendamentos (
    nome_paciente VARCHAR(200) NOT NULL,
    nome_medico VARCHAR(200) NOT NULL,
    data_agendamento DATE NOT NULL,
    nome_responsavel VARCHAR(200) NOT NULL
);

-- Tabela 'pacientes':
CREATE TABLE pacientes (
    nome_paciente VARCHAR(200) NOT NULL,
    nome_responsavel VARCHAR(200) NOT NULL,
    idade INT(1) NOT NULL,
    sexo VARCHAR(20) NOT NULL,
    telefone VARCHAR(11) NOT NULL,
    email VARCHAR(200) NOT NULL,
    senha VARCHAR(200) NOT NULL
);
