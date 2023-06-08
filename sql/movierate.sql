/* P2-MR: */

CREATE TABLE usuarios (
    id INT PRIMARY KEY AUTO_INCREMENT,
    tipo VARCHAR(255),
    nome VARCHAR(255),
    email VARCHAR(255),
    senha VARCHAR(255),
    data_de_nascimento DATE,
    imagem VARCHAR(255)
);

CREATE TABLE post (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_usuario INT,
    datac DATETIME,
    texto TEXT,
    favorito INT,
    titulo VARCHAR(255),
    imagem VARCHAR(255)
);

CREATE TABLE filmes (
    id INT PRIMARY KEY,
    titulo VARCHAR(255),
    descricao TEXT,
    imagem VARCHAR(255),
    datac DATE
);

CREATE TABLE avalia (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_filme INT,
    id_usuario INT,
    nota FLOAT,
    comentario TEXT,
    datac DATETIME
);
 
ALTER TABLE post ADD CONSTRAINT FK_id_usuario_post
    FOREIGN KEY (id_usuario)
    REFERENCES usuarios (id)
    ON DELETE SET NULL;

ALTER TABLE avalia ADD CONSTRAINT FK_id_usuario_avalia
    FOREIGN KEY (id_usuario)
    REFERENCES usuarios (id)
    ON DELETE SET NULL;
 
ALTER TABLE avalia ADD CONSTRAINT FK_id_filme_avalia
    FOREIGN KEY (id_filme)
    REFERENCES filmes (id)
    ON DELETE SET NULL;