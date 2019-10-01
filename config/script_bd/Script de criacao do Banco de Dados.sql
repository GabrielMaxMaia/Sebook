create database bd_sebo;
use bd_sebo;

CREATE TABLE perfil (
id_perfil INTEGER PRIMARY KEY AUTO_INCREMENT,
nome_perfil VARCHAR(100),
cod_status_perfil VARCHAR(10)
);

CREATE TABLE usuario (
id_usuario INTEGER PRIMARY KEY AUTO_INCREMENT,
nome_usuario VARCHAR(50),
sobrenome_usuario VARCHAR(50),
email_usuario VARCHAR(100),
senha_usuario VARCHAR(20),
cod_status_usuario VARCHAR(10),
id_perfil INTEGER,
FOREIGN KEY(id_perfil) REFERENCES perfil (id_perfil)
);

CREATE TABLE sebo (
id_usuario INTEGER PRIMARY KEY,
razao_sebo VARCHAR(100),
nome_fantasia VARCHAR(100),
cnpj_sebo VARCHAR(30),
url_foto_sebo VARCHAR(100),
num_end_sebo VARCHAR(30),
compl_end_sebo VARCHAR(100),
logradouro_sebo VARCHAR(100),
cep_end_sebo VARCHAR(30),
num_tel_sebo VARCHAR(30),
celular_1_sebo VARCHAR(50),
celular_2_sebo VARCHAR(30),
insc_estadual_sebo VARCHAR(100),
url_site_sebo VARCHAR(100),
cod_status_sebo VARCHAR(10),
id_livro INTEGER,
FOREIGN KEY(id_livro) REFERENCES livro (id_livro), 
FOREIGN KEY(id_usuario) REFERENCES usuario (id_usuario)
);

CREATE TABLE eventos (
id_evento INTEGER PRIMARY KEY AUTO_INCREMENT,
nome_evento VARCHAR(100),
txt_evento VARCHAR(500),
data_hora_evento DATETIME,
id_usuario INTEGER,
FOREIGN KEY(id_usuario) REFERENCES sebo (id_usuario)
);

CREATE TABLE Categoria (
id_categoria INTEGER PRIMARY KEY,
nome_categoria VARCHAR(100),
cod_status_categoria VARCHAR(10)
);


CREATE TABLE editora (
id_editora INTEGER PRIMARY KEY,
nome_editora VARCHAR(100),
cod_status_editora VARCHAR(10)
);

CREATE TABLE livro (
isbn_livro INTEGER PRIMARY KEY,
ano_livro VARCHAR(10),
nome_livro VARCHAR(100),
sinopse_livro VARCHAR(3500),
cod_status_livro VARCHAR(10),
id_editora INTEGER,
id_categoria INTEGER, 
FOREIGN KEY(id_editora) REFERENCES editora (id_editora), 
FOREIGN KEY(id_categoria) REFERENCES Categoria (id_categoria)
);


CREATE TABLE nacionalidade (
id_nacionalidade INTEGER PRIMARY KEY AUTO_INCREMENT,
nome_nacionalidade VARCHAR(50)
);

CREATE TABLE autor (
id_autor INTEGER PRIMARY KEY AUTO_INCREMENT,
nome_autor VARCHAR(100),
cod_status_autor VARCHAR(10),
id_nacionalidade INTEGER,
FOREIGN KEY(id_nacionalidade) REFERENCES nacionalidade (id_nacionalidade)
);

CREATE TABLE Livro_autor (
id_autor INTEGER,
isbn_livro INTEGER,
PRIMARY KEY(id_autor,isbn_livro),
FOREIGN KEY(id_autor) REFERENCES autor (id_autor), 
FOREIGN KEY(isbn_livro) REFERENCES livro (isbn_livro)
);

CREATE TABLE cliente (
id_usuario INTEGER PRIMARY KEY,
sexo_cliente CHAR(1),
compl_end_cliente VARCHAR(100),
logradouro_cliente VARCHAR(50),
url_foto_cliente VARCHAR(100),
num_compl_cliente VARCHAR(100),
cpf_cliente VARCHAR(30),
cep_cliente VARCHAR(30),
dt_nasc_cliente date,
cod_status_cliente VARCHAR(10),
FOREIGN KEY(id_usuario) REFERENCES usuario (id_usuario)
);

CREATE TABLE cliente_sebo (
id_usuario INTEGER,
id_usuario_sebo INTEGER,
PRIMARY KEY(id_usuario,id_usuario_sebo),
FOREIGN KEY(id_usuario_sebo) REFERENCES sebo (id_usuario), 
FOREIGN KEY(id_usuario) REFERENCES cliente (id_usuario)
);

CREATE TABLE Mensagem (
id_usuario INTEGER,
id_usuario_sebo INTEGER,
data_hora_msg DATETIME,
txt_msg VARCHAR(500),
cod_status_msg VARCHAR(10),
PRIMARY KEY(id_usuario,id_usuario_sebo,data_hora_msg),
FOREIGN KEY(id_usuario, id_usuario_sebo) REFERENCES cliente_sebo (id_usuario,id_usuario_sebo)
);

CREATE TABLE Avaliacao_Sebo (
id_usuario_sebo INTEGER,
id_usuario INTEGER,
data_hora VARCHAR(10),
nota VARCHAR(10),
PRIMARY KEY(id_usuario_sebo,id_usuario),
FOREIGN KEY(id_usuario_sebo) REFERENCES sebo (id_usuario),
FOREIGN KEY(id_usuario) REFERENCES cliente (id_usuario)
);

CREATE TABLE postagem_Sebo (
id_postagem INTEGER PRIMARY KEY AUTO_INCREMENT,
data_hora_postagem DATETIME,
link_postagem VARCHAR(100),
url_foto_postagem VARCHAR(100),
txt_postagem VARCHAR(500),
titulo_postagem VARCHAR(100),
cod_status_postagem VARCHAR(10),
id_usuario INTEGER,
FOREIGN KEY(id_usuario) REFERENCES usuario (id_usuario)
);

CREATE TABLE comentario (
id_comentario INTEGER PRIMARY KEY AUTO_INCREMENT,
txt_comentario VARCHAR(500),
data_hora_comentario DATETIME,
cod_status_comentario VARCHAR(10),
id_postagem INTEGER,
id_usuario INTEGER,
FOREIGN KEY(id_postagem) REFERENCES postagem_Sebo (id_postagem),
FOREIGN KEY(id_usuario) REFERENCES usuario (id_usuario)
);

CREATE TABLE sebo_livro (
id_usuario INTEGER,
isbn_livro INTEGER,
qtd_estoque INTEGER,
PRIMARY KEY(id_usuario,isbn_livro),
FOREIGN KEY(id_usuario) REFERENCES usuario (id_usuario), 
FOREIGN KEY(isbn_livro) REFERENCES livro (isbn_livro)
);

