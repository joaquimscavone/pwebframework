-- Active: 1667224428444@@127.0.0.1@3306@framework
DROP DATABASE framework;

CREATE DATABASE framework
    DEFAULT CHARACTER SET = 'utf8mb4';

CREATE TABLE framework.usuarios(  
    cod_usuario int NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'Primary Key',
    nome VARCHAR(150) NOT NULL,
    email VARCHAR(150) NOT NULL,
    senha VARCHAR(150) NOT NULL,
    admin TINYINT(1) NOT NULL DEFAULT 0 COMMENT '0 - Usuário comum 1- Administrador',
    excluido TINYINT(1) NOT NULL DEFAULT 0 COMMENT '0 - Usuário ativo 1- Usuário Excluido',
    email_verificado TINYINT NOT NULL DEFAULT 0 COMMENT '0 - Para e-mail não verificado e 1 - para e-mail verificado',
    criacao_data TIMESTAMP COMMENT 'data e hora de criação do usuário' DEFAULT CURRENT_TIMESTAMP
    
) COMMENT 'Armazena os usuários do sistema';


CREATE TABLE framework.recuperar_senhas(
    cod_recuperar_senha int NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'Primary Key',
    cod_usuario int NOT NULL,
    hash1 VARCHAR(35) NOT NULL,
    hash2 VARCHAR(35) NOT NULL,
    criacao_data_hora TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
    expiracao_data_hora DATETIME NOT NULL,
    utilizacao_data_hora DATETIME NULL,
    index fk_recuperar_senhas_usuarios_idx (cod_usuario ASC),
    CONSTRAINT  fk_recuperar_senhas_usuarios Foreign Key (cod_usuario) REFERENCES framework.usuarios(cod_usuario)

) COMMENT 'Grava as solicitações de recuperação de senhas';