CREATE SCHEMA Bancoep;
ALTER SCHEMA Bancoep CHARSET = UTF8 COLLATE = utf8_general_ci;
USE Bancoep;

CREATE TABLE Usuarios(
	nome varchar(20) NOT NULL,
	sobrenome varchar(20) NOT NULL,
	email varchar(50) NOT NULL,
	matricula bigint NOT NULL,
	senha varchar(500) NOT NULL,
	sexo int NOT NULL,
	campus int NOT NULL,
	ocupa int NOT NULL,
	nasc date NOT NULL,
	primary key(matricula,ocupa)
);
INSERT INTO Usuarios VALUES ('Psi','Psi','psiiii@mail.com',201543,md5('senha123'),1,1,1,'1999-09-07');
INSERT INTO Usuarios VALUES ('Aluno','Aluno','aluno@mail.com',2015115,md5('senha123'),2,1,2,'1999-09-07');
INSERT INTO Usuarios VALUES ('Adm','do Sistema','admim@admEP.com',12345,md5('senha123'),1,1,3,'1987-12-31');
SELECT*FROM Usuarios;

SELECT COUNT(P.matriPsi) AS tPsi FROM Psicologo P;

CREATE TABLE SolicitarConta(
	nome varchar(20) NOT NULL,
	sobrenome varchar(20) NOT NULL,
	email varchar(50) NOT NULL,
	matricula bigint NOT NULL,
	senha varchar(500) NOT NULL,
	sexo int NOT NULL,
	campus int NOT NULL,
	ocupa int NOT NULL,
	nasc date NOT NULL,
	primary key(matricula,ocupa)
);
SELECT*FROM SolicitarConta;

CREATE TABLE Psicologo(
	nome varchar(20) NOT NULL,
	sobrenome varchar(20) NOT NULL,
	email varchar(50) NOT NULL,
	matriPsi bigint NOT NULL,
	senha varchar(500) NOT NULL,
	sexo int NOT NULL,
	campus int NOT NULL,
	ocupa int NOT NULL,
	nasc date NOT NULL,
	primary key(matriPsi,ocupa)
);
INSERT INTO Psicologo VALUES ('Psi','Psi','psiiii@mail.com',201543,md5('senha123'),1,1,1,'1999-09-07');
SELECT * FROM Psicologo;

CREATE TABLE Aluno(
	nome varchar(20) NOT NULL,
	sobrenome varchar(20) NOT NULL,
	email varchar(50) NOT NULL,
	matriAlu bigint NOT NULL,
	senha varchar(500) NOT NULL,
	sexo int NOT NULL,
	campus int NOT NULL,
	ocupa int NOT NULL,
	nasc date NOT NULL,
	primary key(matriAlu,ocupa)
);
INSERT INTO Aluno VALUES ('Aluno','Aluno','aluno@mail.com',2015115,md5('senha123'),2,1,2,'1999-09-07');
SELECT*FROM Aluno;

SELECT COUNT(A.matriAlu) AS TotalAlunos FROM Aluno A;
SELECT COUNT(P.matriPsi) AS TotalPsi FROM Psicologo P;

CREATE TABLE Atribuicao(
	codA int auto_increment,
	matriPsi bigint NOT NULL,
    matriAlu bigint NOT NULL,
    primary key(codA,matriPsi, matriAlu),
    foreign key(matriPsi) references Psicologo(matriPsi),
    foreign key(matriAlu) references Aluno(matriAlu)
);
SELECT * FROM Atribuicao;
SELECT P.nome AS Nome_Psicólogo, P.sobrenome AS Sobrenome_Psicologo,AL.nome AS Nome_Aluno, AL.sobrenome AS Sobrenome_Aluno
FROM Atribuicao A,Psicologo P, Aluno AL
WHERE P.matriPsi=A.matriPsi AND AL.matriAlu=A.matriAlu;

CREATE TABLE Solicitar(
	cod int auto_increment primary key,
	matriAlu bigint NOT NULL,
	solicitar varchar(300) NOT NULL,
    foreign key(matriAlu) references Aluno(matriAlu)
);
SELECT*FROM Solicitar;
-- DROP TABLE Solicitar;

CREATE TABLE Humor(
	numhumor int NOT NULL primary key,
	humor varchar(50) 
);
INSERT INTO Humor(numhumor,humor) VALUES (1,'Felicidade');
INSERT INTO Humor(numhumor,humor) VALUES (2,'Tristeza');
INSERT INTO Humor(numhumor,humor) VALUES (3,'Raiva');
INSERT INTO Humor(numhumor,humor) VALUES (4,'Medo');
INSERT INTO Humor(numhumor,humor) VALUES (5,'Nojo');
SELECT * FROM Humor;
-- DROP TABLE Humor;
-- DROP TABLE Relatos;
CREATE TABLE Relatos(
    cod int auto_increment,
    codAutor bigint,
	titulo varchar(50) NOT NULL,
	codhumor int NOT NULL,
	privacidade int NOT NULL,
	corpo varchar(500) NOT NULL,
	primary key(cod,codhumor,privacidade),
	foreign key(codhumor) references Humor(numhumor),
    foreign key(codAutor) references Aluno(matriAlu) 
);
SELECT * FROM Relatos;

CREATE TABLE Sala(
	sala int NOT NULL,
	salanome varchar(50),
	primary key (sala)
);
INSERT INTO Sala VALUES (1, '22 Psicologia');
INSERT INTO Sala VALUES (2, '17 Pedagogia');
SELECT*FROM Sala;

-- DROP TABLE Agendamento;
CREATE TABLE Agendamento(
	cod int auto_increment primary key,
    psicologo bigint,
	aluno bigint,
	sala int NOT NULL,
	dia date NOT NULL,
    hora time NOT NULL,
	comentario varchar(300),
    foreign key(psicologo) references Psicologo(matriPsi),
    foreign key(aluno) references Aluno(matriAlu),
    foreign key(sala) references Sala(sala)
);
SELECT * FROM Agendamento;
SELECT Al.matriAlu FROM Agendamento Ag, Aluno Al WHERE Ag.aluno = Al.nome;


CREATE TABLE Categoria(
	categoria int NOT NULL,
    catnome varchar(50),
    primary key (categoria)
);
-- DROP TABLE Categoria;
INSERT INTO Categoria VALUES (1,'Ansiedade');
INSERT INTO Categoria VALUES (2,'Bipolaridade');
INSERT INTO Categoria VALUES (3,'Depressão');
INSERT INTO Categoria VALUES (4,'Stress');
INSERT INTO Categoria VALUES (5,'Melancolia');
SELECT*FROM Categoria;

-- Drop table Exercicios;
CREATE TABLE Exercicios(
	cod int auto_increment primary key,
	titulo varchar(100) NOT NULL,
    imgexer varchar(500) NOT NULL,
	autor varchar(50),
	origem varchar(80),
	categoria int NOT NULL,
	conteudo varchar(500) NOT NULL,
    foreign key(categoria) references Categoria(categoria)
);
SELECT * FROM Exercicios;
SELECT* FROM Exercicios E, Categoria C WHERE E.categoria=C.categoria;
SELECT * FROM Relatos R, Humor H WHERE R.humor = H.numhumor;

CREATE TABLE Favoritos(
	codFav int auto_increment primary key,
    codExer int,
	matricula bigint,
    foreign key(codExer) references Relatos(cod),
    foreign key(matricula) references Usuarios(matricula)
);
SELECT*FROM Favoritos;

-- DROP TABLE Usuarios;
-- DROP TABLE Psicologo;
-- DROP TABLE Aluno; 
-- DROP TABLE Atribuicao;
-- DROP TABLE Solicitar;
-- DROP TABLE Humor;
-- DROP TABLE Relatos;
-- DROP TABLE Sala;
-- DROP TABLE Agendamento;
-- DROP TABLE Categoria;
-- DROP TABLE Exercicios;