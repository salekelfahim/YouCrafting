CREATE DATABASE YouCrafting;

CREATE Table personne(
    id INT PRIMARY KEY AUTO_INCREMENT,
    firstname VARCHAR(255),
    lastname VARCHAR(255),
    username VARCHAR(255),
    pwd VARCHAR(255),
    email VARCHAR(255)
);
CREATE TABLE admin(
    id INT PRIMARY KEY,
    phone VARCHAR(100),
    CIN VARCHAR(100)
);

ALTER TABLE admin ADD CONSTRAINT fk_admin_personne FOREIGN KEY (id) REFERENCES personne(id);

CREATE TABLE writer(
    id INT PRIMARY KEY
);

ALTER TABLE writer  ADD CONSTRAINT fk_writer_personne FOREIGN KEY (id) REFERENCES personne(id);

CREATE TABLE article(
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(100),
    contenu TEXT,
    date_creation DATE,
    id_writer INT

);

ALTER Table article ADD CONSTRAINT fk_article_writer FOREIGN KEY (id_writer) REFERENCES writer(id);