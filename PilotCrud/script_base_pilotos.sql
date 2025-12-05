CREATE DATABASE IF NOT EXISTS corrida;
USE corrida;

CREATE TABLE IF NOT EXISTS categoria (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL
);
INSERT INTO categoria (nome) VALUES ('Fórmula 1'),('Rally'),('Drift')
ON DUPLICATE KEY UPDATE nome=nome;

CREATE TABLE IF NOT EXISTS equipe (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    categoria_id INT NOT NULL,
    CONSTRAINT fk_equipe_categoria FOREIGN KEY (categoria_id) REFERENCES categoria(id)
);

INSERT INTO equipe (nome, categoria_id) VALUES ('Ferrari', 1),('Red Bull Racing', 1),('Ralliart', 2),('Team Drift King', 3)
ON DUPLICATE KEY UPDATE nome=nome;

CREATE TABLE IF NOT EXISTS piloto (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    idade INT NOT NULL,
    nacionalidade VARCHAR(100) NOT NULL,
    titulos INT NOT NULL,
    equipe_id INT NOT NULL,
    categoria_id INT NOT NULL,
    CONSTRAINT fk_piloto_equipe FOREIGN KEY (equipe_id) REFERENCES equipe(id),
    CONSTRAINT fk_piloto_categoria FOREIGN KEY (categoria_id) REFERENCES categoria(id)
);