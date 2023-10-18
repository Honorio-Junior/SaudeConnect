-- Banco de dados 'saudeconnect'

-- Tabela 'medico':
CREATE TABLE medico (
    id INT PRIMARY KEY,
    nome VARCHAR(200) NOT NULL,
    nascimento DATE NOT NULL,
    email VARCHAR(200) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL
);

-- Tabela 'agendamento':
CREATE TABLE agendamento (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_paciente INT NOT NULL,
    id_medico INT NOT NULL,
    data_agendamento DATE NOT NULL,
    nome_paciente VARCHAR(200) NOT NULL,
    nome_medico VARCHAR(200) NOT NULL,
    FOREIGN KEY (id_paciente) REFERENCES paciente(id),
    FOREIGN KEY (id_medico) REFERENCES medico(id),
    CONSTRAINT unique_agendamento UNIQUE (data_agendamento, id_paciente)
);

-- Tabela 'paciente':
CREATE TABLE paciente (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(200) NOT NULL,
    responsavel VARCHAR(200) NOT NULL,
    sexo VARCHAR(20) NOT NULL,
    idade INT NOT NULL,
    telefone VARCHAR(11),
    email VARCHAR(200) NOT NULL UNIQUE,
    senha VARCHAR(200) NOT NULL
);
