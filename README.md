# Controle_Academico

<!---Esses são exemplos. Veja https://shields.io para outras pessoas ou para personalizar este conjunto de escudos. Você pode querer incluir dependências, status do projeto e informações de licença aqui--->

![GitHub repo size](https://img.shields.io/github/repo-size/Giovane-F-Moreira/Controle_Academico)
![GitHub repo file count](https://img.shields.io/github/directory-file-count/Giovane-F-Moreira/Controle_Academico)
![GitHub language count](https://img.shields.io/github/languages/count/Giovane-F-Moreira/Controle_Academico)
![GitHub top language](https://img.shields.io/github/languages/top/Giovane-F-Moreira/Controle_Academico)
![GitHub last commit](https://img.shields.io/github/last-commit/Giovane-F-Moreira/Controle_Academico)
![GitHub forks](https://img.shields.io/github/forks/Giovane-F-Moreira/Controle_Academico)
![Bitbucket open issues](https://img.shields.io/bitbucket/issues/Giovane-F-Moreira/Controle_Academico)
![Bitbucket open pull requests](https://img.shields.io/bitbucket/pr-raw/Giovane-F-Moreira/Controle_Academico)
![GitHub followers](https://img.shields.io/github/followers/Giovane-F-Moreira?label=Follow)

> Este projeto consiste em um sistema academico, capaz de gerenciar dados de professores, alunos e informações institucionais.
### Ajustes e melhorias

O projeto ainda está em desenvolvimento e as próximas atualizações serão voltadas nas seguintes tarefas:

- [x] Desenvolver a base do projeto
- [ ] Capturar imagem, ou gif para por no readme
- [ ] Refatorar e reorganizar o código
- [ ] Corrigir sistema de login
- [ ] Csubir projeto para o dominio oficial e linkar no portifolio

## 💻 Pré-requisitos

Para uitlizar este projeto é necessario ter o wampp ou lamp instalado.

<!--Antes de começar, verifique se você atendeu aos seguintes requisitos:
-Estes são apenas requisitos de exemplo. Adicionar, duplicar ou remover conforme necessário--->

<!---* Você instalou a versão mais recente de `<linguagem / dependência / requeridos>`
* Você tem uma máquina `<Windows / Linux / Mac>`. Indique qual sistema operacional é compatível / não compatível.
* Você leu `<guia / link / documentação_relacionada_ao_projeto>`.--->

## ☕ Instalando Controle Academico

Para instalar o Controle Academico, siga estas etapas:

Linux e macOS:
Vá até sua Workspace e clone o projeto com seguinte comando:
```
git clone git@github.com:Giovane-F-Moreira/Controle_Academico.git
```

Windows:
Vá até sua Workspace e clone o projeto com seguinte comando:
```
git clone git@github.com:Giovane-F-Moreira/Controle_Academico.git
```

Agora você deve criar o banco de dados, para isso utilize as seguintes queries, via terminal ou pelo PHPMyAdmin:

```
DROP DATABASE IF EXISTS controleacademico;

CREATE DATABASE controleacademico;
USE controleacademico;

CREATE TABLE Aluno (
	matricula CHAR(8) PRIMARY KEY,
	dataNascimento DATE,
	sexo ENUM('m', 'f'),
	nome VARCHAR(50),
	rua VARCHAR(50),
	uf CHAR(2),
	cidade VARCHAR(20),
	numero SMALLINT,
	bairro VARCHAR(20),
	codCurso SMALLINT
);

CREATE TABLE AlunoTelefone (
	matricula CHAR(8),
	nroTelefone CHAR(10),
	PRIMARY KEY(matricula,nroTelefone),
	FOREIGN KEY(matricula) REFERENCES Aluno (matricula)
);

CREATE TABLE Curso (
	codCurso SMALLINT AUTO_INCREMENT PRIMARY KEY,
	nome VARCHAR(40),
	codDepart SMALLINT
);

CREATE TABLE Departamento (
	codDepart SMALLINT AUTO_INCREMENT PRIMARY KEY,
	nome VARCHAR(40)
);

CREATE TABLE Disciplina (
	codDisciplina SMALLINT AUTO_INCREMENT PRIMARY KEY,
	nome VARCHAR(50),
	semestre ENUM('I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X'),
	cargaHoraria TINYINT
);

CREATE TABLE Matriculado (
	matricula CHAR(8),
	codDisciplina SMALLINT,
	PRIMARY KEY(matricula,codDisciplina),
	FOREIGN KEY(matricula) REFERENCES Aluno (matricula),
	FOREIGN KEY(codDisciplina) REFERENCES Disciplina (codDisciplina)
);

CREATE TABLE Concluido (
	codDisciplina SMALLINT,
	matricula CHAR(8),
	nota DECIMAL(3,1),
	PRIMARY KEY(codDisciplina,matricula),
	FOREIGN KEY(codDisciplina) REFERENCES Disciplina (codDisciplina),
	FOREIGN KEY(matricula) REFERENCES Aluno (matricula)
);

CREATE TABLE Ministra (
	matricula CHAR(8),
	codDisciplina SMALLINT,
	ano YEAR,
	semestre ENUM('I', 'II'),
	PRIMARY KEY(matricula,codDisciplina),
	FOREIGN KEY(codDisciplina) REFERENCES Disciplina (codDisciplina)
);

CREATE TABLE Prerequisito (
	codDisciplina SMALLINT,
	codPrerequisito SMALLINT,
	PRIMARY KEY(codDisciplina,codPrerequisito),
	FOREIGN KEY(codDisciplina) REFERENCES Disciplina (codDisciplina),
	FOREIGN KEY(codPrerequisito) REFERENCES Disciplina (codDisciplina)
);

CREATE TABLE Professor (
	matricula CHAR(8) PRIMARY KEY,
	nome VARCHAR(60),
	titulacao ENUM('Graduação', 'Especialização', 'Mestrado', 'Doutorado')
);

CREATE TABLE Usuario (
	 Id Int(3) PRIMARY KEY AUTO_INCREMENT,
	 nome VARCHAR(50),
	 dataNascimento DATE,
	 cpf VARCHAR(14),
	 telefone VARCHAR(14),
	 sexo ENUM('m', 'f', 'o'),
	 email VARCHAR(50),
	 senha VARCHAR(8),
	 permissao INT(1)
);

ALTER TABLE Aluno ADD FOREIGN KEY(codCurso) REFERENCES Curso (codCurso);
ALTER TABLE Curso ADD FOREIGN KEY(codDepart) REFERENCES Departamento (codDepart);
ALTER TABLE Ministra ADD FOREIGN KEY(matricula) REFERENCES Professor (matricula);
```

Para preencher o banco de dados execute o script:

```
-- ===================
-- Tabela Departamento
-- ===================

USE controleacademico;
INSERT INTO Departamento (codDepart, nome) VALUES (1, 'Ciencias Agrarias');
INSERT INTO Departamento (codDepart, nome) VALUES (2, 'Ciencias Biologicas');
INSERT INTO Departamento (codDepart, nome) VALUES (3, 'Ciencias da Saude');
INSERT INTO Departamento (codDepart, nome) VALUES (4, 'Ciencias Exatas e da Terra');
INSERT INTO Departamento (codDepart, nome) VALUES (5, 'Ciencias Humanas');
INSERT INTO Departamento (codDepart, nome) VALUES (6, 'Engenharias');

-- ============
-- Tabela Curso
-- ============
USE controleacademico;
INSERT INTO Curso (codCurso, nome, codDepart) VALUES (1, 'Sistemas de Informacao', 4);
INSERT INTO Curso (codCurso, nome, codDepart) VALUES (2, 'Agronomia', 1);
INSERT INTO Curso (codCurso, nome, codDepart) VALUES (3, 'Engenharia Ambiental', 6);
INSERT INTO Curso (codCurso, nome, codDepart) VALUES (4, 'Engenharia da Computacao', 6);

-- ============
-- Tabela Aluno
-- ============
USE controleacademico;
-- Alunos curso de Sistemas de Informação
INSERT INTO Aluno (matricula, nome, sexo, dataNascimento, cidade, rua, bairro, uf, numero, codCurso)
	VALUES ('20120001', 'Claudio Santana Cruz', 'm', '1982-05-30', 'Vitoria da Conquista', 'Jardim', 'Centro', 'BA', 245, 1);
INSERT INTO Aluno (matricula, nome, sexo, dataNascimento, cidade, rua, bairro, uf, numero, codCurso)
	VALUES ('20120002', 'Matheus Carvalho Souza', 'm', '1984-06-30', 'Vitoria da Conquista', 'Recreio', 'Centro', 'BA', 111, 1);
INSERT INTO Aluno (matricula, nome, sexo, dataNascimento, cidade, rua, bairro, uf, numero, codCurso)
	VALUES ('20120003', 'Gustavo Pinto Brito', 'm', '1984-06-30', 'Vitoria da Conquista', 'Botafogo', 'Centro', 'BA', 123, 1);
INSERT INTO Aluno (matricula, nome, sexo, dataNascimento, cidade, rua, bairro, uf, numero, codCurso)
	VALUES ('20120004','Barbara de Souza Aguiar','f','1989-12-12','Itapetinga','Fluminense','Primavera','BA', 315, 1);
INSERT INTO Aluno (matricula, nome, sexo, dataNascimento, cidade, rua, bairro, uf, numero, codCurso)
	VALUES ('20120005','Joana Castro Barbosa','f','1991-06-12','Itapetinga','Centro','Primavera','BA', 122, 1);
INSERT INTO Aluno (matricula, nome, sexo, dataNascimento, cidade, rua, bairro, uf, numero, codCurso)
	VALUES ('20120006','Vitor Pinto Cardoso','m','1990-06-30','Itapetinga','Centro','Primavera','BA', 25, 1);
INSERT INTO Aluno (matricula, nome, sexo, dataNascimento, cidade, rua, bairro, uf, numero, codCurso)
	VALUES ('20120007','Marcelo Santana Souza','f','1993-06-30','Vitoria da Conquista','Centro','Fluminense','BA', 25, 1);
-- Alunos curso de Agronomia
INSERT INTO Aluno (matricula, nome, sexo, dataNascimento, cidade, rua, bairro, uf, numero, codCurso)
	VALUES ('20120008', 'Valeria Cruz de Jesus', 'f', '1982-04-30', 'Itororo', 'Jardim', 'Centro', 'BA', 212, 2);
INSERT INTO Aluno (matricula, nome, sexo, dataNascimento, cidade, rua, bairro, uf, numero, codCurso)
	VALUES ('20120009', 'Creuza Carvalho Rocha', 'f', '1980-05-30', 'Itororo', 'Recreio', 'Centro', 'BA', 226, 2);
INSERT INTO Aluno (matricula, nome, sexo, dataNascimento, cidade, rua, bairro, uf, numero, codCurso)
	VALUES ('20120010', 'Josue Pinto Cardoso', 'm', '1987-04-30', 'Itapetinga', 'Botafogo', 'Centro', 'BA', 142, 2);
INSERT INTO Aluno (matricula, nome, sexo, dataNascimento, cidade, rua, bairro, uf, numero, codCurso)
	VALUES ('20120011','Catia de Souza Aguiar','f','1989-12-11','Itapetinga','Fluminense','Primavera','BA', 315, 2);
INSERT INTO Aluno (matricula, nome, sexo, dataNascimento, cidade, rua, bairro, uf, numero, codCurso)
	VALUES ('20120012','Nelson Castro da Silva','m','1991-06-24','Itapetinga','Centro','Primavera','BA', 122, 2);
INSERT INTO Aluno (matricula, nome, sexo, dataNascimento, cidade, rua, bairro, uf, numero, codCurso)
	VALUES ('20120013','Vitor Pinto Cardoso','m','1990-04-09','Itapetinga','Centro','Primavera','BA', 255, 2);
-- Alunos curso de Engenharia Ambiental
INSERT INTO Aluno (matricula, nome, sexo, dataNascimento, cidade, rua, bairro, uf, numero, codCurso)
	VALUES ('20120014', 'Jorge Filho de Arruda', 'm', '1982-02-28', 'Itororo', 'Jardim', 'Centro', 'BA', 245, 3);
INSERT INTO Aluno (matricula, nome, sexo, dataNascimento, cidade, rua, bairro, uf, numero, codCurso)
	VALUES ('20120015', 'Janio Souza Brito', 'm', '1984-12-30', 'Itororo', 'Recreio', 'Centro', 'BA', 111, 3);
INSERT INTO Aluno (matricula, nome, sexo, dataNascimento, cidade, rua, bairro, uf, numero, codCurso)
	VALUES ('20120016', 'Juliano Pinto da Cruz', 'm', '1984-11-30', 'Itororo', 'Botafogo', 'Centro', 'BA', '123', 3);
INSERT INTO Aluno (matricula, nome, sexo, dataNascimento, cidade, rua, bairro, uf, numero, codCurso)
	VALUES ('20120017','Beatriz de Souza Cardoso','f','1989-01-12','Itapetinga','Fluminense','Primavera','BA', 315, 3);
INSERT INTO Aluno (matricula, nome, sexo, dataNascimento, cidade, rua, bairro, uf, numero, codCurso)
	VALUES ('20120018','Luana Castro Pinto','f','1991-02-12','Itapetinga','Centro','Primavera','BA', 122, 3);

-- ====================
-- Tabela AlunoTelefone
-- ====================
-- Telefones dos alunos do curso de Sistemas de Informação
USE controleacademico;
INSERT INTO AlunoTelefone (matricula, nroTelefone) VALUES ('20120001', '7732612279');
INSERT INTO AlunoTelefone (matricula, nroTelefone) VALUES ('20120001', '7732612167');
INSERT INTO AlunoTelefone (matricula, nroTelefone) VALUES ('20120002', '7732612279');
INSERT INTO AlunoTelefone (matricula, nroTelefone) VALUES ('20120002', '7732621100');
INSERT INTO AlunoTelefone (matricula, nroTelefone) VALUES ('20120003', '7732612279');
INSERT INTO AlunoTelefone (matricula, nroTelefone) VALUES ('20120003', '7732630001');
INSERT INTO AlunoTelefone (matricula, nroTelefone) VALUES ('20120003', '7732621595');
INSERT INTO AlunoTelefone (matricula, nroTelefone) VALUES ('20120004', '7732639899');
INSERT INTO AlunoTelefone (matricula, nroTelefone) VALUES ('20120005', '7732611887');
INSERT INTO AlunoTelefone (matricula, nroTelefone) VALUES ('20120006', '7732611887');
INSERT INTO AlunoTelefone (matricula, nroTelefone) VALUES ('20120006', '7732612186');
INSERT INTO AlunoTelefone (matricula, nroTelefone) VALUES ('20120007', '7732631201');

-- =================
-- Tabela Disciplina
-- =================
-- Disciplinas do curso de Sistemas de Informação
USE controleacademico;
INSERT INTO Disciplina (codDisciplina, nome, cargaHoraria, semestre) VALUES (1, 'Introducao a Programacao', 80, 'I');
INSERT INTO Disciplina (codDisciplina, nome, cargaHoraria, semestre) VALUES (2, 'Estrutura de Dados', 80, 'III');
INSERT INTO Disciplina (codDisciplina, nome, cargaHoraria, semestre) VALUES (3, 'Banco de Dados I', 60, 'IV');
INSERT INTO Disciplina (codDisciplina, nome, cargaHoraria, semestre) VALUES (4, 'Redes de Computadores I', 60, 'IV');
INSERT INTO Disciplina (codDisciplina, nome, cargaHoraria, semestre) VALUES (5, 'Banco de Dados II', 60, 'V');
INSERT INTO Disciplina (codDisciplina, nome, cargaHoraria, semestre) VALUES (6, 'Promogracao Web', 80, 'V');

-- Disciplinas do curso de Agronomia
USE controleacademico;
INSERT INTO Disciplina (codDisciplina, nome, cargaHoraria, semestre) VALUES (7, 'Portugues', 80, 'I');
INSERT INTO Disciplina (codDisciplina, nome, cargaHoraria, semestre) VALUES (8, 'Quimica', 60, 'I');
INSERT INTO Disciplina (codDisciplina, nome, cargaHoraria, semestre) VALUES (9, 'Zootecnica', 80, 'II');
INSERT INTO Disciplina (codDisciplina, nome, cargaHoraria, semestre) VALUES (10, 'Introducao a Agropecuaria', 80, 'II');
INSERT INTO Disciplina (codDisciplina, nome, cargaHoraria, semestre) VALUES (11, 'Nutricao Animal e Forrageiras', 80, 'VI');
INSERT INTO Disciplina (codDisciplina, nome, cargaHoraria, semestre) VALUES (12, 'Criacao de Pequenos Animais', 80, 'VII');

-- Disciplinas do curso de Engenharia Ambiental
USE controleacademico;
INSERT INTO Disciplina (codDisciplina, nome, cargaHoraria, semestre) VALUES (13, 'Introducao a Poluicao Ambiental', 60, 'II');
INSERT INTO Disciplina (codDisciplina, nome, cargaHoraria, semestre) VALUES (14, 'Fundamentos de Biologia Ambiental', 80, 'III');
INSERT INTO Disciplina (codDisciplina, nome, cargaHoraria, semestre) VALUES (15, 'Geotecnia Ambiental', 80, 'III');
INSERT INTO Disciplina (codDisciplina, nome, cargaHoraria, semestre) VALUES (16, 'Empresas de Engenharia Economica Ambiental', 60, 'IV');
INSERT INTO Disciplina (codDisciplina, nome, cargaHoraria, semestre) VALUES (17, 'Complexos Industriais e de Agribusiness', 40, 'VI');
INSERT INTO Disciplina (codDisciplina, nome, cargaHoraria, semestre) VALUES (18, 'Modelagem Matematica em Sistemas Ambientais', 80, 'VIII');

-- ================
-- Tabela Professor
-- ================
USE controleacademico;
INSERT INTO Professor (matricula, nome, titulacao) VALUES (20120001, 'Lidiana Franca martins', 'Mestrado');
INSERT INTO Professor (matricula, nome, titulacao) VALUES (20120002, 'Fernando Bulhoes', 'Mestrado');
INSERT INTO Professor (matricula, nome, titulacao) VALUES (20120003, 'Claudio Rodolfo Oliveira', 'Mestrado');
INSERT INTO Professor (matricula, nome, titulacao) VALUES (20120004, 'Pablo Freire Matos', 'Mestrado');
INSERT INTO Professor (matricula, nome, titulacao) VALUES (20120005, 'Rosana Moura de Oliveira', 'Doutorado');

-- ===============
-- Tabela Ministra
-- ===============
-- Professores do curso de Sistemas de Informação
USE controleacademico;
INSERT INTO Ministra (matricula, codDisciplina, ano, semestre) VALUES (20120004, 1, '2011', 'I');
INSERT INTO Ministra (matricula, codDisciplina, ano, semestre) VALUES (20120003, 2, '2011', 'II');
INSERT INTO Ministra (matricula, codDisciplina, ano, semestre) VALUES (20120001, 3, '2012', 'II');
INSERT INTO Ministra (matricula, codDisciplina, ano, semestre) VALUES (20120002, 4, '2012', 'I');
INSERT INTO Ministra (matricula, codDisciplina, ano, semestre) VALUES (20120004, 5, '2012', 'II');
INSERT INTO Ministra (matricula, codDisciplina, ano, semestre) VALUES (20120003, 6, '2012', 'II');

-- ===================
-- Tabela Prerequisito
-- ===================
-- Prerequisitos de Sistemas de Informação (tem como prerequisito)
USE controleacademico;
INSERT INTO Prerequisito (codDisciplina, codPrerequisito) VALUES (2, 1);
INSERT INTO Prerequisito (codDisciplina, codPrerequisito) VALUES (3, 1);
INSERT INTO Prerequisito (codDisciplina, codPrerequisito) VALUES (4, 2);
INSERT INTO Prerequisito (codDisciplina, codPrerequisito) VALUES (5, 2);
INSERT INTO Prerequisito (codDisciplina, codPrerequisito) VALUES (5, 3);
INSERT INTO Prerequisito (codDisciplina, codPrerequisito) VALUES (6, 2);
INSERT INTO Prerequisito (codDisciplina, codPrerequisito) VALUES (6, 3);
INSERT INTO Prerequisito (codDisciplina, codPrerequisito) VALUES (6, 4);

-- Prerequisitos de Agronomia (tem como prerequisito)
USE controleacademico;
INSERT INTO Prerequisito (codDisciplina, codPrerequisito) VALUES (9, 7);
INSERT INTO Prerequisito (codDisciplina, codPrerequisito) VALUES (9, 8);
INSERT INTO Prerequisito (codDisciplina, codPrerequisito) VALUES (10, 7);
INSERT INTO Prerequisito (codDisciplina, codPrerequisito) VALUES (10, 8);
INSERT INTO Prerequisito (codDisciplina, codPrerequisito) VALUES (11, 9);
INSERT INTO Prerequisito (codDisciplina, codPrerequisito) VALUES (12, 10);

-- Prerequisitos de Engenharia Ambiental (tem como prerequisito)
USE controleacademico;
INSERT INTO Prerequisito (codDisciplina, codPrerequisito) VALUES (15, 13);
INSERT INTO Prerequisito (codDisciplina, codPrerequisito) VALUES (16, 13);
INSERT INTO Prerequisito (codDisciplina, codPrerequisito) VALUES (17, 14);
INSERT INTO Prerequisito (codDisciplina, codPrerequisito) VALUES (17, 16);
INSERT INTO Prerequisito (codDisciplina, codPrerequisito) VALUES (18, 13);

-- ===================
-- Tabela Matriculado
-- ===================
-- Alunos de Sistemas de Informação
USE controleacademico;
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120001', 1);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120002', 1);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120003', 1);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120004', 1);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120005', 1);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120006', 1);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120007', 1);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120001', 2);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120002', 2);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120003', 2);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120004', 2);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120005', 2);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120006', 2);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120007', 2);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120001', 3);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120002', 3);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120003', 3);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120004', 3);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120005', 3);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120006', 3);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120007', 3);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120001', 4);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120002', 4);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120003', 4);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120004', 4);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120005', 4);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120006', 4);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120007', 4);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120001', 5);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120002', 5);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120003', 5);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120004', 5);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120005', 5);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120006', 5);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120007', 5);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120001', 6);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120002', 6);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120003', 6);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120004', 6);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120005', 6);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120006', 6);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120007', 6);
-- Alunos de Agronomia
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120008', 7);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120009', 7);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120010', 7);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120011', 7);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120012', 7);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120013', 7);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120008', 8);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120009', 8);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120010', 8);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120011', 8);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120012', 8);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120013', 8);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120008', 9);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120009', 9);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120010', 9);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120011', 9);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120012', 9);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120013', 9);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120008', 10);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120009', 10);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120010', 10);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120011', 10);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120012', 10);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120013', 10);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120008', 11);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120009', 11);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120010', 11);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120011', 11);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120012', 11);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120013', 11);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120008', 12);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120009', 12);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120010', 12);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120011', 12);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120012', 12);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120013', 12);
-- Alunos de Engenharia Ambiental
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120014', 13);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120015', 13);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120016', 13);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120017', 13);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120018', 13);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120014', 14);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120015', 14);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120016', 14);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120017', 14);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120018', 14);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120014', 15);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120015', 15);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120016', 15);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120017', 15);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120018', 15);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120014', 16);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120015', 16);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120016', 16);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120017', 16);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120018', 16);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120014', 17);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120015', 17);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120016', 17);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120017', 17);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120018', 17);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120014', 18);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120015', 18);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120016', 18);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120017', 18);
INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('20120018', 18);

-- ================
-- Tabela Concluido
-- ================
-- Alunos de Sistemas de Informação
USE controleacademico;
INSERT INTO Concluido (matricula, codDisciplina, nota) VALUES ('20120001', 1, 7.7);
INSERT INTO Concluido (matricula, codDisciplina, nota) VALUES ('20120002', 1, 7.8);
INSERT INTO Concluido (matricula, codDisciplina, nota) VALUES ('20120003', 1, 6.7);
INSERT INTO Concluido (matricula, codDisciplina, nota) VALUES ('20120004', 1, 8.4);
INSERT INTO Concluido (matricula, codDisciplina, nota) VALUES ('20120005', 1, 6.7);
INSERT INTO Concluido (matricula, codDisciplina, nota) VALUES ('20120006', 1, 7.8);
INSERT INTO Concluido (matricula, codDisciplina, nota) VALUES ('20120007', 1, 6.7);
INSERT INTO Concluido (matricula, codDisciplina, nota) VALUES ('20120001', 2, 7.4);
INSERT INTO Concluido (matricula, codDisciplina, nota) VALUES ('20120002', 2, 3.5);
INSERT INTO Concluido (matricula, codDisciplina, nota) VALUES ('20120003', 2, 3.8);
INSERT INTO Concluido (matricula, codDisciplina, nota) VALUES ('20120004', 2, 2.5);
INSERT INTO Concluido (matricula, codDisciplina, nota) VALUES ('20120005', 2, 7.8);
INSERT INTO Concluido (matricula, codDisciplina, nota) VALUES ('20120006', 2, 3.5);
INSERT INTO Concluido (matricula, codDisciplina, nota) VALUES ('20120007', 2, 3.0);
INSERT INTO Concluido (matricula, codDisciplina, nota) VALUES ('20120001', 3, 2.2);
INSERT INTO Concluido (matricula, codDisciplina, nota) VALUES ('20120002', 3, 9.7);
INSERT INTO Concluido (matricula, codDisciplina, nota) VALUES ('20120003', 3, 4.7);
INSERT INTO Concluido (matricula, codDisciplina, nota) VALUES ('20120004', 3, 8.5);
INSERT INTO Concluido (matricula, codDisciplina, nota) VALUES ('20120005', 3, 4.2);
INSERT INTO Concluido (matricula, codDisciplina, nota) VALUES ('20120006', 3, 6.9);
INSERT INTO Concluido (matricula, codDisciplina, nota) VALUES ('20120007', 3, 4.7);
INSERT INTO Concluido (matricula, codDisciplina, nota) VALUES ('20120001', 4, 5.1);
INSERT INTO Concluido (matricula, codDisciplina, nota) VALUES ('20120002', 4, 9.3);
INSERT INTO Concluido (matricula, codDisciplina, nota) VALUES ('20120003', 4, 4.0);
INSERT INTO Concluido (matricula, codDisciplina, nota) VALUES ('20120004', 4, 5.0);
INSERT INTO Concluido (matricula, codDisciplina, nota) VALUES ('20120005', 4, 6.2);
INSERT INTO Concluido (matricula, codDisciplina, nota) VALUES ('20120006', 4, 7.3);
INSERT INTO Concluido (matricula, codDisciplina, nota) VALUES ('20120007', 4, 8.9);
-- Alunos de Agronomia
INSERT INTO Concluido (matricula, codDisciplina, nota) VALUES ('20120008', 7, 6.6);
INSERT INTO Concluido (matricula, codDisciplina, nota) VALUES ('20120009', 7, 8.6);
INSERT INTO Concluido (matricula, codDisciplina, nota) VALUES ('20120010', 7, 9.7);
INSERT INTO Concluido (matricula, codDisciplina, nota) VALUES ('20120011', 7, 8.1);
INSERT INTO Concluido (matricula, codDisciplina, nota) VALUES ('20120012', 7, 9.2);
INSERT INTO Concluido (matricula, codDisciplina, nota) VALUES ('20120013', 7, 7.3);
INSERT INTO Concluido (matricula, codDisciplina, nota) VALUES ('20120008', 8, 6.6);
INSERT INTO Concluido (matricula, codDisciplina, nota) VALUES ('20120009', 8, 5.7);
INSERT INTO Concluido (matricula, codDisciplina, nota) VALUES ('20120010', 8, 7.0);
INSERT INTO Concluido (matricula, codDisciplina, nota) VALUES ('20120011', 8, 5.0);
INSERT INTO Concluido (matricula, codDisciplina, nota) VALUES ('20120012', 8, 6.0);
INSERT INTO Concluido (matricula, codDisciplina, nota) VALUES ('20120013', 8, 5.7);
INSERT INTO Concluido (matricula, codDisciplina, nota) VALUES ('20120008', 9, 6.9);
INSERT INTO Concluido (matricula, codDisciplina, nota) VALUES ('20120009', 9, 5.1);
INSERT INTO Concluido (matricula, codDisciplina, nota) VALUES ('20120010', 9, 6.8);
INSERT INTO Concluido (matricula, codDisciplina, nota) VALUES ('20120011', 9, 7.4);
INSERT INTO Concluido (matricula, codDisciplina, nota) VALUES ('20120012', 9, 7.0);
INSERT INTO Concluido (matricula, codDisciplina, nota) VALUES ('20120013', 9, 8.0);
INSERT INTO Concluido (matricula, codDisciplina, nota) VALUES ('20120008', 10, 7.1);
INSERT INTO Concluido (matricula, codDisciplina, nota) VALUES ('20120009', 10, 6.2);
INSERT INTO Concluido (matricula, codDisciplina, nota) VALUES ('20120010', 10, 8.9);
INSERT INTO Concluido (matricula, codDisciplina, nota) VALUES ('20120011', 10, 7.0);
INSERT INTO Concluido (matricula, codDisciplina, nota) VALUES ('20120012', 10, 6.0);
INSERT INTO Concluido (matricula, codDisciplina, nota) VALUES ('20120013', 10, 10.0);

-- ===================
-- Tabela Usario
-- ===================
USE controleacademico;
INSERT INTO Usuario (nome, dataNascimento, cpf, telefone, sexo, email, senha, permissao) VALUES ('Diogo Alves', '1992-05-30', '055.151.616-54','(41)52523-4364','m','Diogo@gmail.com','diogo123', 1);
INSERT INTO Usuario (nome, dataNascimento, cpf, telefone, sexo, email, senha, permissao) VALUES ('Alex Lopes', '1998-03-12', '045.132.478-85','(41)52558-4364','m','Alex@gmail.com','Alex123', 1);
```

## 🚀 Utilizando o Controle Academico

Para utilizar o Controle Academico, siga estas etapas:

1 - Para utilizar o projeto basta ter o **Visual Studio Code** instalado e o Wampp ou Lamp configurado.  <br><br>
  1.1 - Intalando VS Code: https://www.youtube.com/watch?v=49K-Zxc8A7A  \
  1.2 - Instalando Wampp - Windows: https://www.youtube.com/watch?v=7Je4jqbd_LU  \
  1.3 - Instalando Lamp - Linux: https://www.youtube.com/watch?v=saMOWPbZncs \

2 - Inicie o Wampp para que seje carregado o `Index`.

OBS: Você pode utilizar outro servidor local para utilizar o projeto.
<!---
```
<exemplo_de_uso>
```

Adicione comandos de execução e exemplos que você acha que os usuários acharão úteis. Fornece uma referência de opções para pontos de bônus!
--->

## 📫 Contribuindo para o sistema Controle Academico.
<!---Se o seu README for longo ou se você tiver algum processo ou etapas específicas que deseja que os contribuidores sigam, considere a criação de um arquivo CONTRIBUTING.md separado--->
Para contribuir com Geekflix, siga estas etapas:

1. Bifurque este repositório.
2. Crie um branch: `git checkout -b <nome_branch>`.
3. Faça suas alterações e confirme-as: `git commit -m '<mensagem_commit>'`
4. Envie para o branch original: `git push origin <nome_do_projeto> / <local>`
5. Crie a solicitação de pull.

Como alternativa, consulte a documentação do GitHub em [como criar uma solicitação pull](https://help.github.com/en/github/collaborating-with-issues-and-pull-requests/creating-a-pull-request).

## 🤝 Colaboradores

<table>
  <tr>
    <td align="center">
      <a href="#">
        <img src="https://avatars.githubusercontent.com/u/64364499?v=4" width="100px;" alt="Foto do Giovane Fernandes no GitHub"/><br>
        <sub>
          <b>Giovane Fernandes</b>
        </sub>
        </hr>
      </a>
    </td>
  </tr>
  <tr>
    <td>
      <sub>
        <b>Criador do Projeto</b>
      </sub>
    </td>
  </tr>
</table>


## 😄 Seja um dos contribuidores<br>

Quer fazer parte desse projeto? Clique [AQUI](CONTRIBUTING.md) e leia como contribuir.

## 📝 Licença

Esse projeto está sob licença. Veja o arquivo [LICENÇA](LICENSE.md) para mais detalhes.

[⬆ Voltar ao topo](#nome-do-projeto)<br>
