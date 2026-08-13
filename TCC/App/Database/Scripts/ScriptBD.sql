CREATE DATABASE IF NOT EXISTS EscamBOO;
USE EscamBOO;

CREATE TABLE IF NOT EXISTS Usuario 
(
    IdUsuario INT AUTO_INCREMENT,
    Nome VARCHAR(255) NOT NULL,
    CPF VARCHAR(14) NOT NULL UNIQUE,
    Genero CHAR(1),
    Email VARCHAR(255) NOT NULL UNIQUE,
    Senha VARCHAR(255) NOT NULL,
    DataNascimento DATE,
    FotoPerfil VARCHAR(255),
    Endereco VARCHAR(255),
    PRIMARY KEY (IdUsuario)
);

CREATE TABLE IF NOT EXISTS ADM 
(
    IdAdm INT,
    PRIMARY KEY (IdAdm),
    CONSTRAINT fk_adm_usuario 
        FOREIGN KEY (IdAdm) REFERENCES Usuario (IdUsuario) 
        ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS Trabalhador 
(
    IdTrabalhador INT,
    Classe INT,
    Status INT,
    PRIMARY KEY (IdTrabalhador),
    CONSTRAINT fk_trabalhador_usuario 
        FOREIGN KEY (IdTrabalhador) REFERENCES Usuario (IdUsuario) 
        ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS GrandesAreas 
(
    IdGrandeArea INT AUTO_INCREMENT,
    Nome VARCHAR(255) NOT NULL,
    PRIMARY KEY (IdGrandeArea)
);

CREATE TABLE IF NOT EXISTS Profissao 
(
    IdProfissao INT AUTO_INCREMENT,
    Nome VARCHAR(255) NOT NULL,
    IdGrandeArea INT NOT NULL,
    PRIMARY KEY (IdProfissao),
    CONSTRAINT fk_profissao_grandearea 
        FOREIGN KEY (IdGrandeArea) REFERENCES GrandesAreas (IdGrandeArea)
);

CREATE TABLE IF NOT EXISTS Servico 
(
    IdServico INT AUTO_INCREMENT,
    Nome VARCHAR(255) NOT NULL,
    Nivel INT,
    IdTrabalhador INT NOT NULL,
    IdProfissao INT NOT NULL,
    PRIMARY KEY (IdServico),
    CONSTRAINT fk_servico_trabalhador 
        FOREIGN KEY (IdTrabalhador) REFERENCES Trabalhador (IdTrabalhador) 
        ON DELETE CASCADE,
    CONSTRAINT fk_servico_profissao 
        FOREIGN KEY (IdProfissao) REFERENCES Profissao (IdProfissao)
);

CREATE TABLE IF NOT EXISTS Avaliacao 
(
    IdAvaliacao INT AUTO_INCREMENT,
    Nota FLOAT NOT NULL,
    Data DATE NOT NULL,
    Comentario VARCHAR(255),
    IdServico INT UNIQUE NOT NULL,
    PRIMARY KEY (IdAvaliacao),
    CONSTRAINT fk_avaliacao_servico 
        FOREIGN KEY (IdServico) REFERENCES Servico (IdServico) 
        ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS Denuncia 
(
    IdDenuncia INT AUTO_INCREMENT,
    Motivo VARCHAR(255) NOT NULL,
    Descricao VARCHAR(255),
    Status INT,
    Data DATE,
    IdTrabalhador INT NOT NULL,
    PRIMARY KEY (IdDenuncia),
    CONSTRAINT fk_denuncia_trabalhador 
        FOREIGN KEY (IdTrabalhador) REFERENCES Trabalhador (IdTrabalhador) 
        ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS Penalidade 
(
    IdPenalidade INT AUTO_INCREMENT,
    Motivo VARCHAR(255) NOT NULL,
    Tipo INT,
    Status VARCHAR(50),
    Data DATE,
    IdAdm INT NOT NULL,
    PRIMARY KEY (IdPenalidade),
    CONSTRAINT fk_penalidade_adm 
        FOREIGN KEY (IdAdm) REFERENCES ADM (IdAdm)
);

CREATE TABLE IF NOT EXISTS Bloqueio 
(
    IdBloqueio INT AUTO_INCREMENT,
    Data DATE NOT NULL,
    IdTrabalhador INT NOT NULL,
    PRIMARY KEY (IdBloqueio),
    CONSTRAINT fk_bloqueio_trabalhador 
        FOREIGN KEY (IdTrabalhador) REFERENCES Trabalhador (IdTrabalhador) 
        ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS ExperienciaProfissional 
(
    IdExperienciaProfissional INT AUTO_INCREMENT,
    Empresa VARCHAR(255) NOT NULL,
    Cargo VARCHAR(255) NOT NULL,
    Descricao VARCHAR(255),
    IdTrabalhador INT NOT NULL,
    PRIMARY KEY (IdExperienciaProfissional),
    CONSTRAINT fk_exp_trabalhador 
        FOREIGN KEY (IdTrabalhador) REFERENCES Trabalhador (IdTrabalhador) 
        ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS FormacaoAcademica 
(
    IdFormacaoAcademica INT AUTO_INCREMENT,
    Instituicao VARCHAR(255) NOT NULL,
    Curso VARCHAR(255) NOT NULL,
    Descricao VARCHAR(255),
    IdTrabalhador INT NOT NULL,
    PRIMARY KEY (IdFormacaoAcademica),
    CONSTRAINT fk_formacao_trabalhador 
        FOREIGN KEY (IdTrabalhador) REFERENCES Trabalhador (IdTrabalhador) 
        ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS `Match` 
(
    IdMatch INT AUTO_INCREMENT,
    Data DATE NOT NULL,
    Status INT,
    IdTrabalhadorUm INT NOT NULL,
    IdTrabalhadorDois INT NOT NULL,
    PRIMARY KEY (IdMatch),
    CONSTRAINT fk_match_trabalhador_um 
        FOREIGN KEY (IdTrabalhadorUm) REFERENCES Trabalhador (IdTrabalhador),
    CONSTRAINT fk_match_trabalhador_dois 
        FOREIGN KEY (IdTrabalhadorDois) REFERENCES Trabalhador (IdTrabalhador)
);

CREATE TABLE IF NOT EXISTS Acordo 
(
    IdAcordo INT AUTO_INCREMENT,
    Status INT,
    IdMatch INT UNIQUE NOT NULL,
    PRIMARY KEY (IdAcordo),
    CONSTRAINT fk_acordo_match 
        FOREIGN KEY (IdMatch) REFERENCES `Match` (IdMatch) 
        ON DELETE CASCADE
);

ALTER TABLE Trabalhador
MODIFY Status VARCHAR(10);