DROP DATABASE IF EXISTS barema;
CREATE DATABASE barema CHARACTER SET UTF8;

USE barema;

CREATE TABLE avaliador (
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	nome VARCHAR(200)
);

CREATE TABLE trabalho (
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	titulo VARCHAR(500),
	campus VARCHAR(500),
	area VARCHAR(200),
	categoria CHAR(1) -- O - Oral, P - Poster
);

CREATE TABLE avaliacao_oral (
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	avaliador_id INT NOT NULL,
	trabalho_id INT NOT NULL,
    finalizou_avaliacao CHAR(1) DEFAULT 'F',
	c1 INT,
	c2 INT,
	c3 INT,
	c4 INT,
	c5 INT,
	c6 INT,
	c7 INT,
	c8 INT,
	c9 INT,
	c10 INT,
	FOREIGN KEY (avaliador_id) REFERENCES avaliador(id),
	FOREIGN KEY (trabalho_id) REFERENCES trabalho (id)
);

CREATE TABLE avaliacao_poster (
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	avaliador_id INT NOT NULL,
	trabalho_id INT NOT NULL,
    finalizou_avaliacao CHAR(1) DEFAULT 'F',
	c1 INT,
	c2 INT,
	c3 INT,
	c4 INT,
	c5 INT,
	c6 INT,
	c7 INT,
	c8 INT,
	c9 INT,
	c10 INT,
	FOREIGN KEY (avaliador_id) REFERENCES avaliador(id),
	FOREIGN KEY (trabalho_id) REFERENCES trabalho (id)
);

CREATE USER IF NOT EXISTS 'barema'@'localhost' IDENTIFIED BY 'amerab';
GRANT ALL PRIVILEGES ON barema.* TO 'barema'@'localhost';