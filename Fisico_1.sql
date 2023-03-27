/* Lógico_1: */

CREATE TABLE utilizadores (
    senha varchar(250),
    email varchar(50) UNIQUE,
    bairro varchar(50),
    rua varchar(50),
    municipio varchar(50),
    n_casa varchar(50),
    id int PRIMARY KEY,
    telefone varchar(9),
    bi varchar(14),
    nome varchar(100),
    created_at datetime,
    updated_at datetime,
    deleted_at datetime
);

CREATE TABLE alunos (
    id int PRIMARY KEY,
    numero varchar(100),
    dataentrada date,
    datanascimento date,
    nome_pai varchar(100),
    nome_mae varchar(100),
    telefone_encarregado varchar(9),
    created_at datetime,
    updated_at datetime,
    deleted_at datetime,
    fk_cursos_id int,
    utilizador int UNIQUE
);

CREATE TABLE funcionarios (
    numero int,
    id int PRIMARY KEY,
    created_at datetime,
    updated_at datetime,
    deleted_at datetime,
    fk_categoria_id int,
    utilizador int,
    UNIQUE (id, numero)
);

CREATE TABLE notas (
    created_at datetime,
    updated_at datetime,
    deleted_at datetime,
    valor double,
    id int PRIMARY KEY,
    fk_disciplinas_id int,
    fk_alunos_id int
);

CREATE TABLE cursos (
    created_at datetime,
    updated_at datetime,
    deleted_at datetime,
    nome varchar(100),
    cigla char(7),
    id int PRIMARY KEY,
    limite_alunos int
);

CREATE TABLE disciplinas (
    id int PRIMARY KEY,
    nome varchar(100),
    created_at datetime,
    updated_at datetime,
    deleted_at datetime,
    fk_anos_id int
);

CREATE TABLE trimestres (
    created_at datetime,
    updated_at datetime,
    deleted_at datetime,
    id int,
    nome varchar(100)
);

CREATE TABLE categoria (
    id int PRIMARY KEY,
    nome varchar(14),
    created_at datetime,
    updated_at datetime,
    deleted_at datetime
);

CREATE TABLE anos (
    id int PRIMARY KEY,
    created_at datetime,
    updated_at datetime,
    deleted_at datetime,
    nome varchar(14),
    fk_cursos_id int
);

CREATE TABLE candidatos (
    id int PRIMARY KEY,
    nome varchar(100),
    email varchar(100),
    telefone varchar(9),
    datanascimento date,
    created_at datetime,
    updated_at datetime,
    deleted_at datetime,
    atestado_medico varchar(250),
    foto_tipo_pass varchar(250),
    copia_bi varchar(250),
    declaracao_notas varchar(250),
    certificado varchar(250)
);
 
ALTER TABLE alunos ADD CONSTRAINT FK_alunos_2
    FOREIGN KEY (fk_cursos_id)
    REFERENCES cursos (id)
    ON DELETE SET NULL;
 
ALTER TABLE alunos ADD CONSTRAINT FK_alunos_4
    FOREIGN KEY (utilizador???)
    REFERENCES utilizadores (???);
 
ALTER TABLE funcionarios ADD CONSTRAINT FK_funcionarios_2
    FOREIGN KEY (fk_categoria_id)
    REFERENCES categoria (id)
    ON DELETE CASCADE;
 
ALTER TABLE funcionarios ADD CONSTRAINT FK_funcionarios_3
    FOREIGN KEY (utilizador???)
    REFERENCES utilizadores (???);
 
ALTER TABLE notas ADD CONSTRAINT FK_notas_2
    FOREIGN KEY (fk_disciplinas_id)
    REFERENCES disciplinas (id)
    ON DELETE CASCADE;
 
ALTER TABLE notas ADD CONSTRAINT FK_notas_3
    FOREIGN KEY (fk_alunos_id)
    REFERENCES alunos (id)
    ON DELETE CASCADE;
 
ALTER TABLE disciplinas ADD CONSTRAINT FK_disciplinas_2
    FOREIGN KEY (fk_anos_id)
    REFERENCES anos (id)
    ON DELETE RESTRICT;
 
ALTER TABLE anos ADD CONSTRAINT FK_anos_2
    FOREIGN KEY (fk_cursos_id)
    REFERENCES cursos (id)
    ON DELETE RESTRICT;