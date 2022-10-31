-- Active: 1667224428444@@127.0.0.1@3306
CREATE DATABASE framework
    DEFAULT CHARACTER SET = 'utf8mb4';

CREATE TABLE usuarios(  
    cod_usuario int NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'Primary Key',
    nome VARCHAR(150) NOT NULL,
    email VARCHAR(150) NOT NULL,
    senha VARCHAR(150) NOT NULL,
    email_verificado TINYINT NOT NULL DEFAULT 0 COMMENT '0 - Para e-mail não verificado e 1 - para e-mail verificado',
    criacao_data TIMESTAMP COMMENT 'data e hora de criação do usuário' DEFAULT CURRENT_TIMESTAMP
    
) COMMENT 'Armazena os usuários do sistema';