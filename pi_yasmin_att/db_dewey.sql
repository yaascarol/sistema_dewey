-- TABLE
CREATE TABLE administradores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(100) NOT NULL
);
CREATE TABLE clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    telefone VARCHAR(20),
    logradouro VARCHAR(255),
    numero VARCHAR(10),
    complemento VARCHAR(100),
    municipio VARCHAR(100),
    uf CHAR(2),
    cep VARCHAR(9)
);
CREATE TABLE generos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    categoria VARCHAR(100) NOT NULL UNIQUE
);
CREATE TABLE imagens (
    id INT AUTO_INCREMENT PRIMARY KEY,
    livro_id INT NOT NULL,
    caminho VARCHAR(255) NOT NULL,
    descricao TEXT,
    FOREIGN KEY (livro_id) REFERENCES livros(id)
);
CREATE TABLE livros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    genero_id INT NOT NULL,
    estoque INT NOT NULL DEFAULT 0,
    resumo TEXT,
    FOREIGN KEY (genero_id) REFERENCES generos(id)
);
 
-- INDEX
 
-- TRIGGER
 
-- VIEW
 
