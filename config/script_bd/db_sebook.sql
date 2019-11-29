-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 28/11/2019 às 21:59
-- Versão do servidor: 5.6.41-84.1
-- Versão do PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sebook24_db_sebook`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `autor`
--

CREATE TABLE `autor` (
  `id_autor` int(11) NOT NULL,
  `nome_autor` varchar(100) DEFAULT NULL,
  `cod_status_autor` varchar(10) DEFAULT '1',
  `id_nacionalidade` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `autor`
--

INSERT INTO `autor` (`id_autor`, `nome_autor`, `cod_status_autor`, `id_nacionalidade`) VALUES
(1, 'Miguel de Cervantes', '1', 1),
(2, 'Liev Tolstoi', '1', 2),
(3, 'Thomas Mann', '1', 3),
(4, 'Gabriel Garcia Marquez', '1', 4),
(5, 'James Joyce', '1', 5),
(6, 'Marcel Proust', '1', 6),
(7, 'Dante Alighieri', '1', 7),
(8, 'Robert Musil', '1', 8),
(9, 'Franz Kafka', '1', 9),
(10, 'Luis de Camoes', '1', 10),
(11, 'William Shakespeare', '1', 11),
(12, 'Jane Austen', '1', 11),
(13, 'John Green', '1', 12),
(14, 'Machado de Assis', '1', 13),
(15, 'Clarice Lispector', '1', 13),
(16, 'Carlos Drummond de Andrade', '1', 13),
(17, 'José de Alencar', '1', 13),
(18, 'Luis Fernando Verissimo', '1', 13),
(19, 'Jorge Amado', '1', 13),
(20, 'J. K. Rowling', '1', 11),
(21, 'Stephen King', '1', 12),
(22, 'Guimarães Rosa', '1', 13),
(23, 'Paulo Coelho', '1', 13),
(24, 'Augusto Cury', '1', 13),
(25, 'Dan Brown', '1', 12),
(26, 'Graciliano Ramos', '1', 13),
(27, 'Fiódor Dostoiévski', '1', 2),
(28, 'William Faulkner', '1', 12),
(29, 'Alexandre Dumas', '1', 6),
(30, 'Antoine de Saint-Exupéry', '1', 6),
(31, 'William P. Young', '1', 21),
(32, 'Patrick Rothfuss', '1', 12),
(33, 'Gasparetto', '1', 13),
(34, 'Zibia', '1', 13),
(35, 'Suzanne Collins', '1', 12),
(36, 'C. S. Lewis', '1', 11),
(37, 'Diana Gabaldon', '1', 12),
(38, 'Jane Hawking', '1', 11),
(39, 'Eva Schloss', '1', 8),
(40, 'Scott Kelly', '1', 12),
(41, 'Svetlana Alexievitch ', '1', 49),
(42, 'Fred Reinfeld', '1', 12),
(43, 'Israel Horowitz', '1', 12),
(44, 'Clarice Lispector', '1', 49),
(45, 'João Cabral de Melo Neto', '1', 13),
(46, 'John Boyne', '1', 5),
(47, 'brian selznick', '1', 12),
(48, 'Marcos Bagno', '1', 13),
(49, 'Thomas Keneally', '1', 19),
(50, 'Alan N. Schoonmaker', '1', 12),
(51, ' Amado Cervo', '1', 13),
(52, 'Clodoaldo Bueno', '1', 13),
(53, ' Ḥayim Eliʼav', '1', 12),
(54, 'Diego Raigorodosky', '1', 12),
(55, 'Jack Schafer', '1', 12),
(56, 'Alex Michaelides', '1', 48),
(57, 'Adriano Gianturco', '1', 13),
(58, 'Flávio Tartuce', '1', 13),
(59, 'Geoffrey Chaucer', '1', 11),
(60, 'Laura Guedes', '1', 13),
(61, 'Charles Baudelaire', '1', 6),
(62, 'Troy Denning', '1', 12),
(63, 'Alice Kuipers', '1', 11),
(64, 'Neal Shusterman', '1', 12),
(65, 'Rubem Alves', '1', 13),
(66, 'William Peter Blatty', '1', 12),
(67, ' Katie Salen ', '1', 12),
(68, 'Eric Zimmerman', '1', 12),
(69, ' Ricardo Negrão', '1', 13),
(70, 'Perlingeiro Filho', '1', 13),
(71, 'Marco Aurélio IoMonaco', '1', 13),
(72, 'H. G. Wells', '1', 11),
(73, ' Morena Cardoso', '1', 13),
(74, 'Tonia L. Wind', '1', 13),
(75, 'Mário Prata', '1', 13),
(76, 'Rosemar Coenga', '1', 13),
(77, 'Ary Toledo', '1', 13),
(78, 'Rick Riordan', '1', 12),
(79, 'J.R.R. Tolkien', '1', 11);

-- --------------------------------------------------------

--
-- Estrutura para tabela `avaliacao_sebo`
--

CREATE TABLE `avaliacao_sebo` (
  `id_usuario_sebo` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `data_hora` datetime DEFAULT NULL,
  `nota` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nome_categoria` varchar(100) DEFAULT NULL,
  `cod_status_categoria` varchar(10) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nome_categoria`, `cod_status_categoria`) VALUES
(1, 'Literatura Juvenil', '1'),
(2, 'Romance', '1'),
(3, 'Poesia', '1'),
(4, 'Teatro', '1'),
(5, 'Humor', '1'),
(6, 'Biografias', '1'),
(7, 'Contos', '1'),
(8, 'Ficção Científica', '1'),
(9, 'Folclore', '1'),
(10, 'Coleções', '1'),
(11, 'Aventura', '1'),
(12, 'Terror', '1'),
(13, 'Ação', '1'),
(14, 'Drama', '1'),
(15, 'Infantis', '1'),
(16, 'Manuais', '1'),
(17, 'Jogos', '1'),
(18, 'Política', '1'),
(19, 'InfantoJuvenis', '1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

CREATE TABLE `cliente` (
  `id_usuario` int(11) NOT NULL,
  `sexo_cliente` char(1) DEFAULT NULL,
  `compl_end_cliente` varchar(100) DEFAULT NULL,
  `logradouro_cliente` varchar(50) DEFAULT NULL,
  `num_compl_cliente` varchar(100) DEFAULT NULL,
  `cpf_cliente` varchar(30) DEFAULT NULL,
  `cep_cliente` varchar(30) DEFAULT NULL,
  `dt_nasc_cliente` date DEFAULT NULL,
  `cod_status_cliente` varchar(10) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `cliente`
--

INSERT INTO `cliente` (`id_usuario`, `sexo_cliente`, `compl_end_cliente`, `logradouro_cliente`, `num_compl_cliente`, `cpf_cliente`, `cep_cliente`, `dt_nasc_cliente`, `cod_status_cliente`) VALUES
(1, 'M', '', 'AL', '0', '425.390.558-77', '06515-095', '0001-11-30', '1'),
(5, 'M', 'Inicio', 'VL', '231', '489.458.945-89', '04854-169', '1997-01-22', '1'),
(9, 'M', '', '', '', '45687912587', '06589054', '1900-01-01', '1'),
(10, 'M', '', '', '', '12378965878', '06545687', '1900-01-01', '1'),
(13, 'M', '', '', '', '36574159866', '06512987', '1900-01-01', '1'),
(15, 'M', 'A', 'R', '367', '487.795.687-10', '06874-510', '2019-10-11', '1'),
(26, 'M', '', '', '', '', '', '2019-10-11', '1'),
(27, 'M', '', 'FAZ', '', '', '', '2019-10-12', '1'),
(29, 'F', '', '', '', '', '', '2019-10-12', '1'),
(37, 'M', '', 'AV', '', '', '06407-500', '1992-01-22', '1'),
(41, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1'),
(42, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1'),
(43, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1'),
(44, 'M', '', 'PRQ', '', '', '', '2019-10-27', '1'),
(58, 'M', '', 'AL', '', '', '', '0001-11-30', '1'),
(60, 'M', '', 'AL', '', '', '', '2019-11-16', '1'),
(61, 'M', '', 'AL', '', '126.501.928-28', '', '2019-11-16', '1'),
(63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1'),
(64, 'M', '', 'AL', '', '818.837.637-01', '06311-000', '2019-11-21', '1'),
(65, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1'),
(66, 'M', '', 'AV', '1', '290.648.818-30', '06311-000', '1992-01-20', '1'),
(67, 'M', '', 'AL', '', '', '', '2019-11-24', '1'),
(68, 'M', '', 'AL', '', '', '', '2019-11-26', '1'),
(69, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1'),
(70, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1'),
(71, 'M', '', 'AL', '', '121.658.457-23', '03154-001', '1985-01-20', '1'),
(72, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1'),
(73, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1'),
(74, 'M', '', 'AL', '', '', '', '2019-11-26', '1'),
(75, 'M', '', 'AL', '', '', '', '2019-11-25', '1'),
(76, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1'),
(77, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1'),
(78, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1'),
(79, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1'),
(80, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1'),
(81, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1'),
(89, 'M', '', 'AL', '', '', '', '2019-11-27', '1'),
(90, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1'),
(91, 'M', '', 'AL', '10', '293.478.818-20', '06311-000', '2019-11-27', '1'),
(92, 'M', '', 'AL', '', '', '', '2019-11-27', '1'),
(93, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1'),
(94, 'M', '', 'AL', '', '', '', '2019-11-27', '1'),
(95, 'F', '', 'AL', '10', '', '', '2019-11-27', '1'),
(97, 'M', '', 'AL', '', '', '', '1990-01-01', '1'),
(98, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente_sebo`
--

CREATE TABLE `cliente_sebo` (
  `id_usuario` int(11) NOT NULL,
  `id_usuario_sebo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `comentario`
--

CREATE TABLE `comentario` (
  `id_comentario` int(11) NOT NULL,
  `txt_comentario` varchar(500) CHARACTER SET latin1 DEFAULT NULL,
  `data_hora_comentario` datetime DEFAULT NULL,
  `cod_status_comentario` varchar(10) CHARACTER SET latin1 DEFAULT '1',
  `id_post` varchar(255) COLLATE latin1_danish_ci DEFAULT NULL,
  `id_evento` varchar(225) COLLATE latin1_danish_ci DEFAULT NULL,
  `id_usuario` varchar(255) COLLATE latin1_danish_ci DEFAULT NULL,
  `id_comentario_parente` int(11) DEFAULT NULL,
  `id_pagina` varchar(255) COLLATE latin1_danish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_danish_ci;

--
-- Fazendo dump de dados para tabela `comentario`
--

INSERT INTO `comentario` (`id_comentario`, `txt_comentario`, `data_hora_comentario`, `cod_status_comentario`, `id_post`, `id_evento`, `id_usuario`, `id_comentario_parente`, `id_pagina`) VALUES
(1, 'Ola! Esse livro é excelente, recomendo muito a leitura', '2019-11-25 13:45:31', '0', '9788527311229', '0', '66', 0, '0'),
(2, 'Conteúdo riquíssimo, ajudou muito em meu projeto de mestrado, recomendo a leitura.', '2019-11-27 09:58:42', '1', '8530979524', '0', '35', 0, '0'),
(3, 'Ótimo livro.', '2019-11-27 12:04:45', '1', '8532530796', '0', '89', 0, '0'),
(4, 'Essa obra superou minhas expectativas, exclente!', '2019-11-27 12:07:19', '1', '10', '0', '66', 0, '0'),
(5, 'Muito útil a informação.', '2019-11-27 12:11:55', '1', '0', '10', '89', 0, '0'),
(6, 'É um clássico, leiam!!', '2019-11-27 14:23:46', '1', '8530979524', '0', '91', 0, '0'),
(7, 'Excelente leitura!', '2019-11-27 16:16:52', '1', '8530979524', '0', '93', 0, '0'),
(8, 'Concordo plenamente, mercado permane super aquecido', '2019-11-27 16:18:19', '1', '8', '0', '93', 0, '0'),
(9, 'Maravilhoso evento!', '2019-11-27 19:40:07', '1', '0', '10', '94', 0, '0'),
(10, 'Gostei\' recomendo', '2019-11-27 19:41:07', '0', '8534800669', '0', '95', 0, '0'),
(11, 'Tehdbshhdhd', '2019-11-27 19:41:58', '1', '8', '0', '95', 0, '0'),
(12, 'teste', '2019-11-27 19:44:51', '1', '8534800669', '0', '95', 0, '0'),
(13, 'Blábláblá', '2019-11-27 19:45:37', '1', '0', '10', '94', 0, '0'),
(14, 'Blábláblá', '2019-11-27 19:48:05', '1', '8534800669', '0', '94', 0, '0'),
(15, 'Teste 1 2 3', '2019-11-27 19:50:42', '1', '8534800669', '0', '94', 0, '0'),
(16, 'Testes', '2019-11-27 19:59:34', '1', '0', '10', '95', 0, '0'),
(17, 'Tenho interesse. Flw vlw', '2019-11-27 20:36:43', '1', '0', '3', '97', 0, '0');

-- --------------------------------------------------------

--
-- Estrutura para tabela `editora`
--

CREATE TABLE `editora` (
  `id_editora` int(11) NOT NULL,
  `nome_editora` varchar(100) DEFAULT NULL,
  `cod_status_editora` varchar(10) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `editora`
--

INSERT INTO `editora` (`id_editora`, `nome_editora`, `cod_status_editora`) VALUES
(1, 'Moderna', '1'),
(2, 'Companhia Das Letras', '1'),
(3, 'Record', '1'),
(4, 'Dover Publications Usa', '1'),
(5, 'Editora 34', '1'),
(6, 'Perspectiva', '1'),
(7, 'Lafonte', '1'),
(8, 'Martin Claret', '1'),
(9, 'Penguin E Companhia Das Letras', '1'),
(10, 'Intrinseca', '1'),
(11, 'Saraiva', '1'),
(12, 'Editora FTD', '1'),
(13, 'Abril Educação', '1'),
(14, 'Globo', '1'),
(15, 'Sextante ', '1'),
(16, 'Ediouro ', '1'),
(17, 'Novo Conceito', '1'),
(18, 'Santillana ', '1'),
(19, 'Planeta ', '1'),
(20, 'Leya ', '1'),
(21, 'Rocco', '1'),
(22, 'Suma', '1'),
(23, 'HarperCollins', '1'),
(24, 'Arqueiro', '1'),
(25, 'Paralela', '1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `evento`
--

CREATE TABLE `evento` (
  `id_evento` int(11) NOT NULL,
  `nome_evento` varchar(255) DEFAULT NULL,
  `txt_evento` text,
  `data_evento` date DEFAULT NULL,
  `hora_evento` time DEFAULT NULL,
  `local_evento` varchar(255) DEFAULT NULL,
  `cidade_evento` varchar(255) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `url_foto_evento` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `evento`
--

INSERT INTO `evento` (`id_evento`, `nome_evento`, `txt_evento`, `data_evento`, `hora_evento`, `local_evento`, `cidade_evento`, `id_usuario`, `url_foto_evento`) VALUES
(1, '21 festa do livro da Usp', 'A 21ª Festa do Livro acontecerá nos dias 27, 28 e 29 de novembro, das 9 às 21 horas, e 30 de novembro, das 9 às 20 horas.', '2019-11-27', '09:00:00', 'Av. Prof. Mello Moraes, travessa C, na Cidade Universitária', 'São Paulo', 15, 'public/img/imgEvento/21 festa do livro da Usp.png'),
(2, '26ª Bienal Internacional do Livro de São Paulo', '26ª Bienal Internacional do Livro de São Paulo\r\n\r\n• O maior evento do setor na América Latina, com de mais de 600 mil visitantes.\r\n• 96% dos expositores da última edição ficaram satisfeitos com os resultados obtidos no evento.\r\n• 87% dos visitantes tem co', '2019-10-30', '08:05:00', 'Av. Prof. Mello Moraes, travessa C, na Cidade Universitária', 'São Pedro', 15, 'public/img/imgEvento/26ª Bienal Internacional do Livro de São Paulo.jpg'),
(3, 'Biblioteca Parque Villa-Lobos', 'Sabe quando bate aquela canseira depois de horas andando no parque? Seria bom um lugar para descanso, né? A Biblioteca Parque Villa-Lobos, que fica no parque de mesmo nome, dá as boas-vindas a quem', '2019-11-27', '09:01:00', '1200 Biblioteca Parque Villa-Lobos', 'Adamantina', 15, 'public/img/imgEvento/bibliotecaVilaLobos.jpg'),
(4, 'Bienal Internacional do Livro', 'Presente em São Paulo a cada dois anos (quando não, acontece no Rio de Janeiro) a Bienal Internacional do Livro é um evento cultural voltado para profissionais e amantes da literatura.', '2019-10-15', '08:01:00', 'Av. Prof. Mello Moraes, travessa C, na Cidade Universitária', 'São Paulo', 15, 'public/img/imgEvento/bienalLivro.jpg'),
(5, 'Ccxp', 'Seus livros e HQs têm superpoderes na CCXP: eles podem garantir o benefício de comprar as credenciais do festival com um valor promocional.\r\n\r\nO que fazer para garantir o seu benefício? Assim que a venda começar, basta comprar um ingresso no site www.ccxp', '2019-12-09', '10:00:00', 'Av. Prof. Mello Moraes, travessa C, na Cidade Universitária', 'São Paulo', 15, 'public/img/imgEvento/Ccxp.jpg'),
(6, 'Feira do livro', 'A Praça de Eventos do Shopping São José se transformou em uma grande biblioteca para receber a Feira Top Livros. São mais de 20 mil obras, desde as infantis até os clássicos da literatura mundial, todas vendidas ao preço de R$ 10,00 cada livro.', '2019-06-23', '10:03:00', 'Shopping São José', 'São Paulo', 15, 'public/img/imgEvento/Feira do livro.png'),
(7, 'Festa no Sebo', 'A mudança do Espaço deu um bocado de trabalho, mas agora chegou hora de celebrar.\r\nConvidamos vocês para um dia de festa. A partir de 12h, serviremos a feijoada da Tia Maria, ao som da vitrola, pandeiros, tambores, chocalhos, violas e tamborins.', '2019-11-30', '08:04:00', 'Sebo Praia dos Livros', 'São Paulo', 15, 'public/img/imgEvento/Festa no Sebo.jpg'),
(8, 'Leitura ao pé do ouvido', 'Frequentadores da biblioteca são convidados a ouvir a leitura de trechos de livros, podendo conhecer assim novos autores, títulos e assuntos.\r\n\r\nQuartas-feiras, das 16h30 às 17 horas (no dia 20 não haverá atividade).\r\n6 – Aquecimento Segundas Intenções: Te pego lá fora, de Rodrigo Ciríaco, e Poesia pra encher laje, de Renan Inquérito.\r\n13 – Quero colo!, de Fernando Vilela e Stela Barbieri.\r\n\r\n27- Olhos d’água, de Conceição Evaristo.\r\nCom equipe BVL.\r\n\r\nNão é necessário inscrição.', '2019-11-06', '09:02:00', 'Sebo Praia dos Livros', 'São Paulo', 15, 'public/img/imgEvento/LEITURA AO PÉ DO OUVIDO.jpg'),
(9, 'MidiAto e Faculdade Cásper Líbero promovem lançamento de livro e debate sobre produtos midiáticos.', 'No dia 26 de novembro, às 14h, na sala 224 do Departamento de Cinema, Rádio e Televisão (CTR), o MidiAto e o grupo de pesquisa Comunicação \r\ne Sociedade do Espetáculo, da Faculdade Cásper Líbero, promovem o lançamento do livro Produtos midiáticos, práticas culturais e \r\nresistências, organizado pelas duas entidades. No evento, Cláudio Coelho – docente da Cásper Líbero e um dos \r\norganizadores do livro junto com Rosana de Lima Soares, professora do Departamento de Jornalismo e Editoração (CJE) e uma das \r\ncoordenadoras do MidiAto – dará a palestra Cultura e Resistência no Brasil: do moderno ao pós-moderno e do pós-moderno.\r\n \r\nO livro Produtos midiáticos, práticas culturais e resistências, já disponível on-line, promove o diálogo entre as linhas de pesquisa e os \r\nprojetos desenvolvidos no MidiAto e na Faculdade Cásper Líbero. Os artigos que compõem a obra falam de espaços \r\ne práticas culturais; produtos midiáticos e consumos; narrativas, identidades e resistências; e crítica \r\ncultural e crítica da mídia. No evento, os autores também falarão brevemente sobre seus trabalhos.\r\n \r\nPara participar, não é necessário fazer inscrição. 	\r\n\r\nServiço:\r\nDebate e lançamento do livro “Produtos midiáticos, práticas culturais e resistências”', '2019-11-26', '14:02:00', 'sala 224 do Departamento de Cinema, Rádio e Televisão (CTR) - Prédio 4', 'São Paulo', 15, 'public/img/imgEvento/MidiAto e Faculdade Cásper Líbero promovem lançamento de livro e debate sobre produtos midiáticos..png'),
(10, 'Produção e comercialização de audiolivros para autores e editores', 'Objetivos\r\nDar aos participantes conhecimento específico para que possam contratar a produção de audiolivros de qualidade e fazer as melhores escolhas\r\nem termos de contratação de plataformas para distribuição dos seus produtos em áudio.\r\n\r\nPúblico-alvo\r\nEditores, assistentes editoriais, escritores, poetas, empreendedores e futuros empreendedores, \r\nestudantes de Comunicação e Editoração e demais interessados.', '2019-11-28', '10:00:00', 'Livraria Unesp Praça da Sé, 108 - Sé', 'Adamantina', 15, 'public/img/imgEvento/Produção e comercialização de audiolivros para autores e editores.png');

-- --------------------------------------------------------

--
-- Estrutura para tabela `livro`
--

CREATE TABLE `livro` (
  `isbn_livro` varchar(100) NOT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `ano_livro` varchar(20) DEFAULT NULL,
  `cod_status_livro` varchar(10) DEFAULT '1',
  `nome_livro` varchar(100) DEFAULT NULL,
  `sinopse_livro` varchar(3500) DEFAULT NULL,
  `id_editora` int(11) DEFAULT NULL,
  `url_foto_livro` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `livro`
--

INSERT INTO `livro` (`isbn_livro`, `id_categoria`, `ano_livro`, `cod_status_livro`, `nome_livro`, `sinopse_livro`, `id_editora`, `url_foto_livro`) VALUES
('8501116432', 12, '2018', '1', 'A paciente silenciosa', 'Um dos thrillers mais aguardados do ano. Alicia Berenson escreve um diário para colocar suas ideias em ordem. Ele é tanto uma válvula de escape quanto uma forma de provar ao seu adorado marido que está bem. Ela não consegue suportar conviver com a ideia de que está deixando Gabriel preocupado, de que está lhe causando algum mal. Alicia Berenson tinha 33 anos quando matou seu marido com cinco tiros. E nunca mais disse uma palavra. O psicoterapeuta forense Theo Faber está convencido de que é capaz de tratar Alicia, depois de tantos outros falharem. E, se ela falar, ele será capaz de ouvir a verdade?', 1, 'public/img/imgLivro/pacienteSilenciosa.jpg'),
('8530979524', 18, '2018', '1', 'A Ciência da Política', 'Todos têm suas opiniões sobre como a política deveria ser. Mas quase ninguém se preocupa em estudar como a política realmente funciona. É como prescrever um medicamento sem antes fazer o diagnóstico! Focar em como a política deveria ser é o papel da Filosofia Política. A Ciência Política, ao contrário, foca em como a política é de fato, para só depois, eventualmente, fazer prescrições. É essa a intenção deste manual.\r\nAqui você irá aprender Ciência Política, a fazer o diagnóstico; irá aprender que o Estado surge como Bandido Estacionário; que os impostos não existem para dar serviços, mas porque são um tributo imposto pelo vencedor à vítima; que existe um nível ótimo de tributos (Curva de Laffer), mas que estamos além dele por motivos políticos; que lobismo e corrupção ocorrem por causa de Rentseeking e Renda Política; que a regulamentação surge por causa de Captura, Bootleggers and Baptists e Money for Nothing; que o orçamento tende sempre a estourar pelos Custos Difusos & Benefícios Concentrados e pelo Dilema do Jantar; que todos os sistemas eleitorais são imperfeitos, que as campanhas eleitorais são muito bem planejadas por meio da Definição da Agenda e do Political Business Cycle; que seu voto tem pouquíssimas chances de mudar o resultado; que as eleições são decididas pelo Teorema do Eleitor Mediano, pelo Win-Set e pela Vantagem do Incumbente; que as minorias organizadas tendem a ganhar perante a maioria desorganizada; que movimentos sociais e revoluções tendem a frear seus ímpetos, a se hierarquizar pela Lei de Ferro da Oligarquia, e que as elites tendem a se manter no poder; que troca de favores para passar um projeto de lei não é uma anomalia, mas uma necessidade chamada Logrolling; que existe até uma \"fórmula matemática\" para formar governos de coalizão; que estudar política não é \"achismo\", mas uma ciência.\r\n', 1, 'public/img/imgLivro/cienciaPolitica.jpg'),
('8530983874', 16, '2017', '1', 'Manual de Direito Civil', 'Este Manual de Direito Civil pretende, desde a sua primeira edição, suprir as necessidades dos operadores do Direito Privado em geral. É direcionado a todos os seus aplicadores: juízes, promotores, procuradores, advogados, professores, alunos de graduação e de pós-graduação, bem como àqueles que se preparam para provas oficiais e concursos para a carreira jurídica. De fato, nos últimos anos, a obra tem atendido a esse fim, sendo adotada por alunos dos mais diversos níveis de ensino jurídico no Brasil; utilizada por procuradores, defensores e advogados para fundamentar suas peças; e instrumento de julgadores, inclusive de Tribunais Superiores, com o intuito de motivar suas decisões.\r\nO trabalho condensa os principais posicionamentos do autor a respeito das categorias jurídicas, expondo as doutrinas clássica e contemporânea. Traz também comentários sobre todos os enunciados doutrinários aprovados nas Jornadas de Direito Civil, eventos históricos promovidos pelo Conselho da Justiça Federal e pelo Superior Tribunal de Justiça entre os anos de 2002 e 2018, dos quais o autor participou. Tais exposições vêm acompanhadas dos entendimentos sumulados e ementados pelos tribunais brasileiros, notadamente da mais recente jurisprudência superior. Há um destaque especial para os julgados constantes dos Informativos de Jurisprudência e da ferramenta Jurisprudência em Teses, ambos do Superior Tribunal de Justiça.\r\nO livro apresenta enfoque interdisciplinar e multicultural, com interações com outros ramos jurídicos, como o Direito Constitucional e o Direito do Consumidor. Também está atualizado de acordo com as principais modificações promovidas pelo Novo Código de Processo Civil e pelo Estatuto da Pessoa com Deficiência, sem prejuízo de outras leis de notável impacto para o Direito Privado.\r\nEstão expostas as grandes teses do Direito Civil Contemporâneo, tais como a teoria do diálogo das fontes, o Direito Civil Constitucional, os princípios do Código Civil de 2002, a eficácia horizontal dos direitos fundamentais, a técnica de ponderação, as eficácias interna e externa da função social do contrato, os conceitos parcelares da boa-fé objetiva (supressio, surrectio, tu quoque, exceptio doli, venire contra factum proprium, duty to mitigate the loss e Nachfrist), a visão contemporânea da responsabilidade civil e do inadimplemento obrigacional, a função social da posse, a função social e socioambiental da propriedade, as novas entidades familiares, a parentalidade socioafetiva, a multiparentalidade, as principais controvérsias da sucessão legítima, entre outras. Nota-se, assim, uma interação contínua entre teoria e prática, entre as categorias da civilística contemporânea e sua efetividade.\r\n', 1, 'public/img/imgLivro/manualDireitoCivil.jpg'),
('8532511015', 1, '2000', '1', 'Harry Potter e A Pedra Filosofal', 'Em Harry Potter e a Pedra Filosofal, o leitor é apresentado a Harry, filho de Tiago e Lílian Potter, feiticeiros que foram assassinados por um poderosíssimo bruxo, quando ele ainda era um bebê. Com isso, o menino acaba sendo levado para a casa dos tios que nada tinham a ver com o sobrenatural pelo contrário. Até os 10 anos, Harry foi uma espécie de gata borralheira: maltratado pelos tios, herdava roupas velhas do primo gorducho, tinha óculos remendados e era tratado como um estorvo. No dia de seu aniversário de 11 anos, entretanto, ele parece deslizar por um buraco sem fundo, como o de Alice no país das maravilhas, que o conduz a um mundo mágico. Descobre sua verdadeira história e seu destino: ser um aprendiz de feiticeiro até o dia em que terá que enfrentar a pior força do mal, o homem que assassinou seus pais, o terrível Lorde das Trevas. O menino de olhos verdes, magricela e desengonçado, tão habituado à rejeição, descobre, também, que é um herói no universo dos magos. Potter fica sabendo que é a única pessoa a ter sobrevivido a um ataque do tal bruxo do mal e essa é a causa da marca em forma de raio que ele carrega na testa. Ele não é um garoto qualquer, ele sequer é um feiticeiro qualquer; ele é Harry Potter, símbolo de poder, resistência e um líder natural entre os sobrenaturais. A fábula, recheada de fantasmas, paredes que falam, caldeirões, sapos, unicórnios, dragões e gigantes, não é, entretanto, apenas um passatempo. Harry Potter conduz a discussões metafísicas, aborda o eterno confronto entre o bem e o mal, evidencia algumas mazelas da sociedade, como o preconceito, a divisão de classes através do dinheiro e do berço, a inveja, o egoísmo, a competitividade exacerbada, a busca pelo ideal a necessidade de aprender, nem que seja à força, que a vida é feita de derrotas e vitórias e que isso é importante para a formação básica de um adulto.', 21, 'public/img/imgLivro/harryPotter_8532511015.png'),
('8532530796', 1, '2017', '1', 'Harry Potter e a Câmara Secreta ', 'Depois de férias aborrecidas na casa dos tios trouxas, está na hora de Harry Potter voltar a estudar. Coisas acontecem, no entanto, para dificultar o regresso de Harry. Persistente e astuto, o herói não se deixa intimidar pelos obstáculos e, com a ajuda dos fiéis amigos Weasley, começa o ano letivo na Escola de Magia e Bruxaria de Hogwarts. As novidades não são poucas. Novos colegas, novos professores, muitas e boas descobertas e um grande e perigosos desafio. Alguém ou alguma coisa ameaça a segurança e a tranquilidade dos membros de Hogwarts.', 1, 'public/img/imgLivro/camaraSecreta.jpg'),
('853253080', 1, '2017', '1', 'Harry Potter e o prisioneiro de Azkaban', 'As aulas estão de volta à Hogwarts e Harry Potter não vê a hora de embarcar no expresso a vapor que o levará de volta à escola de bruxaria. Mais uma vez suas férias na rua dos Alfeneiros foi triste e solitária. Com muita ação, humor e magia, \'Harry Potter e o prisioneiro de Azkaban\' traz de volta o gigante atrapalhado Rúbeo Hagrid, o sábio diretor Alvo Dumbledore, a exigente professora de transformação Minerva MacGonagall e o novo mestre Lupin, que guarda grandes surpresas para Harry.', 1, 'public/img/imgLivro/prisioneiroAskabam.jpg'),
('8532531318', 11, '2018', '1', 'Animais fantásticos - Os crimes de Grindelwald', 'No final de Animais Fantásticos e Onde Habitam, o poderoso bruxo das trevas Gerardo Grindelwald foi capturado em Nova York com a ajuda de Newt Scamander. Mas Grindelwald, cumprindo sua ameaça, foge da prisão e passa a reunir seguidores, cuja maioria não suspeita de suas verdadeiras intenções: criar bruxos puro-sangue para governar todos os seres não mágicos. Tentando frustrar os planos de Grindelwald, Alvo Dumbledore arregimenta Newt, ex-aluno de Hogwarts, que concorda em ajudar mais uma vez, sem saber dos perigos que tem pela frente. Limites serão traçados e o amor e a lealdade serão testados, até entre os amigos e familiares mais fiéis e confiáveis, em um mundo bruxo cada vez mais dividido. Segundo roteiro original assinado por J.K. Rowling, com design de capa do estúdio MinaLima, Animais Fantásticos: os crimes de Grindelwald complementa os acontecimentos que ajudaram a dar forma ao Mundo Bruxo, com algumas referências surpreendentes às histórias de Harry Potter que deliciarão os fãs dos livros e filmes da série.', 1, 'public/img/imgLivro/crimesGrindelwald.jpg'),
('8534800669', 17, '1999', '1', 'Primeiro Livro De Xadrez', 'Nenhuma outra obra é tão simples como essa, e tão didática, na apresentação dos elementos do jogo de xadrez. Ela descreve, para quem nada entende ainda do assunto, o propósito do jogo e a função das peças, assim como a maneira de jogar. É uma apresentação que, por assim dizer, entra pelos olhos, tão ricamente ilustrado é o volume e tão singelo o texto.', 1, 'public/img/imgLivro/primeiroLivroXadres.png'),
('8535920692', 3, '2012', '1', 'Sentimento do mundo', 'Publicado em 1940, Sentimento do mundo permanece, tantos anos depois, ainda um dos livros mais celebrados da carreira de Drummond. Não é para menos: o livro enfileira poemas clássicos como “Sentimento do mundo”, “Confidência do Itabirano”, “Poema da necessidade” - é possível que versos do livro inteiro tenham sido impressos no inconsciente literário brasileiro, tamanha é sua repercussão até hoje. Já estabelecido no Rio e observando o mundo (e a si mesmo) de uma perspectiva urbana, o Drummond de Sentimento do mundo oscila entre diversos polos: cidade x interior, atualidade x memórias, eu x mundo. Perfeita depuração dos livros anteriores, este é um verdadeiro marco - e como se isso não bastasse, é o livro que prepara o terreno para nada menos do que A rosa do povo (1945). Por isso a ênfase, ao longo de todo o livro, na vida presente.', 1, 'public/img/imgLivro/sentimentosMundo.jpg'),
('8560281320', 3, '1966', '1', 'Morte e vida Severina', 'Os poemas escolhidos para integrar esta coletânea desnudam os elementos fundamentais da obra de João Cabral de Melo Neto. Morte e Vida Severina (1954-55), poema que dá nome ao livro, é a obra mais popular de João Cabral e aborda o tema da seca nordestina, dando voz aos retirantes que fazem o duro percurso entre o rio Capibaribe e Recife. O poema O rio também retrata o universo árido às margens do rio Capibaribe, mas dá voz a ele próprio como condutor da narrativa. Engenhos de cana-de-açúcar, usinas, retirantes e trabalhadores são retratados na velocidade do correr das águas. Em Paisagens com figuras (1955), João Cabral sintetiza em palavras uma de suas principais características, que é o hibridismo de linguagens. Mesclando descrições de imagens de Pernambuco, com paisagens da Espanha, o poeta desfila toda sua expressividade onírica. Por fim, Uma faca sem lâmina (1955), trata do desafio da composição poética, que ele ilustra numa faca sem bainha, que corta o poeta por dentro.', 1, 'public/img/imgLivro/morteVidaSeverina.jpg'),
('8563560808', 9, '2013', '1', 'Contos da Cantuária', 'Publicado a primeira vez em 1475, Contos da Cantuária é uma das pedras fundamentais da literatura do Ocidente, uma coleção magistral de histórias de cavalaria, alegorias morais e farsa desbragada. Escritas pelo britânico Geoffrey Chaucer, as histórias ajudaram - assim como Dante e Cervantes fizeram em suas respectivas culturas literárias - a sedimentar a literatura de todo um país. Tudo começa a partir de um certame entre peregrinos acerca das melhores histórias de cavalaria e romances. Rico e diverso, o livro descortina - com crueza e lirismo, graça e deboche - o universo social e cultural da Inglaterra em plena Idade Média. Anedotas, ciclos cavalheirescos, escatologia, ensinamentos edificantes e muita caricatura surgem nas histórias desses peregrinos que rumam em direção à Cantuária, onde pretendem visitar o túmulo de São Thomas Becket. Vertido para o português com maestria, mas sem deixar de lado o humor e a diversão, o livro tem tudo para cativar leitores de todas as idades.', 1, 'public/img/imgLivro/contosCantuaria.jpg'),
('8565432947', 19, '2018', '1', 'Pô, justo agora? ', 'Pessoas novas, professores novos, atividades novas, amores novos... Nos primeiros dias de aula, eu observava um garoto que ficava sempre no fundão, não era muito famoso e talvez quieto demais. Com a ansiedade de escola nova, me apaixonei à primeira vista, embora estava na cara que ele nem sabia o meu nome! Aquilo era só uma ilusão, uma ?paixão? passageira... Será?', 1, 'public/img/imgLivro/poJustoAgora.jpg'),
('8572328424', 3, '2011', '1', 'As flores do mal', 'O poeta e crítico francês Charles Baudelaire marcou as últimas décadas do século XIX, influenciando a poesia internacional de tendência simbolista. De sua maneira de ser, originaram-se na França os poetas “malditos”. Baudelaire inventou uma nova estratégia de linguagem, incorporando a matéria da realidade grotesca à linguagem sublimada do Romantismo, dando base para a criação da poesia moderna. As flores do mal é sua obra-prima, cujos poemas datam de 1841. Julgado imoral em sua época, o livro levantou polêmica e despertou hostilidades na imprensa. Baudelaire e seu editor foram processados e, além de pagar multa, tiveram de reimprimir a obra excluindo poemas da primeira edição. Nesta edição, disponibilizamos para o leitor brasileiro a versão completa de As flores do mal, com os poemas censurados e os incluídos posteriormente. A primorosa tradução é de Mário Laranjeira, professor de literatura da Universidade de São Paulo (USP).', 1, 'public/img/imgLivro/asFloresMal.jpg'),
('8575421131', 2, '2004', '1', 'O Código Da Vinci', 'The Da Vinci Code é um romance policial de 2003, escrito por Dan Brown. É o segundo romance de Brown a incluir o personagem Robert Langdon: o primeiro foi seu romance de 2000, Angels & Demons.', 24, 'public/img/imgLivro/oCodigoDaVinci_8575421131.jpg'),
('8576572095', 8, '2018', '1', 'Star Wars : Provação', 'UMA ÚLTIMA AVENTURA PARA HAN, LUKE E LEIA. STAR WARS: Provação se passa 40 anos após o acontecimentos do filme STAR WARS – Episódio VI. A trama se inicia quando Lando Calrissian pede ajuda para enfrentar um grupo de piratas em uma de suas minas. Dois grandes vilões, movidos por vingança e ambição e talvez ainda mais perigosos que o próprio Império, farão o ex-contrabandista e a esposa, agora cavaleira Jedi, se unirem novamente a Luke nessa aventura que explora dinâmicas da Força de uma forma nunca antes feita. Repleto de ação do começo ao fim, Provação traz de volta os principais personagens da saga STAR WARS em uma trama que combina perfeitamente chantagens, sequestros e batalhas tão épicas quanto as da trilogia original.', 1, 'public/img/imgLivro/provacao.jpg'),
('8578271548', 7, '2009', '1', 'A Vida na Porta da Geladeira', 'Claire, de 15 anos, e sua mãe têm uma rotina muito atribulada. Nos raros momentos em que a mãe está em casa (ela é obstetra), a filha está na escola, com amigos ou com o namorado. Resultado: as duas quase não se veem e se comunicam deixando recados na porta da geladeira. Esses recados vão desde cobranças banais [Oi, MÃE! (Que eu NUNCA MAIS vi!] até revelações tocantes e contundentes por parte de mãe e filha durante o penoso tratamento do câncer de mama da mãe, num ano que se revelará decisivo para as duas. Em seu romance de estreia, Kuipers capta a ansiedade por trás da tragédia e revela a importância de viver a vida intensamente, lembrando ao leitor a necessidade de encontrarmos tempo para as pessoas que amamos mesmo em momentos de dificuldade e desafios.', 1, 'public/img/imgLivro/aVidaNaPortaGeladeira.jpg'),
('8579800242', 13, '2008', '1', 'Jogos Vorazes', 'Na abertura dos Jogos Vorazes, a organização não recolhe os corpos dos combatentes caídos e dá tiros de canhão até o final. Cada tiro, um morto. Onze tiros no primeiro dia. Treze jovens restaram, entre eles, Katniss. Para quem os tiros de canhão serão no dia seguinte?... Após o fim da América do Norte, uma nova nação chamada Panem surge. Formada por doze distritos, é comandada com mão de ferro pela Capital. Uma das formas com que demonstra seu poder sobre o resto do carente país é com Jogos Vorazes, uma competição anual transmitida ao vivo pela televisão, em que um garoto e uma garota de doze a dezoito anos de cada distrito são selecionados e obrigados a lutar até a morte! Para evitar que sua irmã seja a mais nova vítima do programa, Katniss se oferece para participar em seu lugar. Vinda do empobrecido Distrito 12, ela sabe como sobreviver em um ambiente hostil. Peeta, um garoto que ajudou sua família no passado, também foi selecionado. Caso vença, terá fama e fortuna. Se perder, morre. Mas para ganhar a competição, será preciso muito mais do que habilidade. Até onde Katniss estará disposta a ir para ser vitoriosa nos Jogos Vorazes? Best-seller da Veja, a trilogia Jogos Vorazes foi adaptada para o cinema e estrelada por Jennifer Lawrence.', 1, 'public/img/imgLivro/jogosVorazes.jpg'),
('8580413532', 13, '2018', '1', 'A música do silêncio', 'Talvez você não queira comprar este livro. Eu sei, não se espera que um autor diga esse tipo de coisa. Mas prefiro ser honesto com você logo de saída. Acho justo avisar que esta é uma história um pouquinho estranha. Não gosto muito de dar spoilers, mas basta dizer que esta aqui é... diferente. Não tem um monte de coisas que se espera de uma história clássica. Por outro lado, se você gosta de palavras e mistérios e segredos, este livro tem muito a lhe oferecer. Se sente curiosidade sobre os Subterrâneos e a alquimia. Se deseja conhecer melhor os meandros ocultos do meu mundo… Bem, nesse caso, talvez este livro seja para você.” – Patrick Rothfuss Debaixo da Universidade, bem lá no fundo, há um lugar escuro. Poucas pessoas sabem de sua existência, uma rede descontínua de antigas passagens e cômodos abandonados. Ali, bem no meio desse local esquecido, situado no coração dos Subterrâneos, vive uma jovem. Seu nome é Auri, e ela é cheia de mistérios. A música do silêncio é um recorte breve e agridoce de sua vida, uma pequena aventura só dela. Ao mesmo tempo alegre e inquietante, esta história nos oferece a oportunidade de enxergar o mundo pelos olhos de Auri. E nos dá a chance de conhecer algumas coisas que só ela sabe... Neste livro, Patrick Rothfuss nos leva ao mundo de uma das personagens mais enigmáticas da série A Crônica do Matador do Rei. Repleto de segredos e mistérios, A música do silêncio é uma narrativa sobre uma jovem ferida em um mundo devastado. **** \"Lírica como uma canção, esta é uma história épica e fascinante, que conta com uma intimidade comovente e uma essência primorosa.” – Publishers Weekly “Rothfuss me fez lembrar de Ursula K. Le Guin, George R. R. Martin e J. R. R. Tolkien, mas nunca tive a impressão de que ele estivesse imitando alguém. Assim como os autores que ele claramente admira, Pat também é um contador de histórias à moda antiga, que usa elementos tradicionais, mas com voz própria.” – The London Times “É um prazer raro e maravilhoso encontrar um livro de fantasia com música de verdade nas palavras. Para onde quer que Pat Rothfuss vá, ele nos levará junto, da mesma forma que um bom cantor também nos leva através de sua música.” – Ursula K. Le Guin, escritora “Passei a noite em claro lendo O temor do sábio. Devorei o livro em um dia e já estou louco pelo próximo. Ele é muito bom, esse tal de Rothfuss.” – George R. R. Martin “Rothfuss é o grande novo autor de fantasia que estávamos esperando.” – Orson Scott Card, escritor', 1, 'public/img/imgLivro/musicaSilencio.jpg'),
('8580418216', 11, '2018', '1', 'Outlander: a viajante do tempo: Livro 1', 'Primeiro livro da série Outlander, que se tornou um fenômeno mundial e foi transformada na bem-sucedida série de TV. “Um sucesso arrasador.” – The Wall Street Journal “Diana Gabaldon tem poucos concorrentes no que diz respeito a escrever romances históricos.” – Publishers Weekly Em 1945, no final da Segunda Guerra Mundial, a enfermeira Claire Randall volta para os braços do marido, com quem desfruta uma segunda lua de mel em Inverness, nas Ilhas Britânicas. Durante a viagem, ela é atraída para um antigo círculo de pedras, no qual testemunha rituais misteriosos. Dias depois, quando resolve retornar ao local, algo inexplicável acontece: de repente se vê no ano de 1743, numa Escócia violenta e dominada por clãs guerreiros. Tão logo percebe que foi arrastada para o passado por forças que não compreende, Claire precisa enfrentar intrigas e perigos que podem ameaçar a sua vida e partir o seu coração. Ao conhecer Jamie, um jovem guerreiro das Terras Altas, sente-se cada vez mais dividida entre a fidelidade ao marido e o desejo pelo escocês. Será ela capaz de resistir a uma paixão arrebatadora e regressar ao presente?', 1, 'public/img/imgLivro/outlander.jpg'),
('8581635199', 8, '2015', '1', 'neal shusterman', 'Em uma sociedade em que os jovens rejeitados são destinados a terem seus corpos reduzidos a pedaços, três fugitivos lutam contra o sistema que os fragmentaria .Unidos pelo acaso e pelo desespero, esses improváveis companheiros fazem uma alucinant e viagem pelo país, conscientes de que suas vidas estão em jogo. Se conseguirem sobreviver até completarem 18 anos, estarão salvos. No entanto, quando cada parte de seus corpos desde as mãos até o coração é caçada por um mundo ensandecido, 18 an o s parece muito, muito longe.O vencedor do Boston GLobe-Horn Book Award Neal Shusterman desafia as ideias dos leitores sobre a vida: não apenas sobre onde ela começa e termina, mas sobre o que realmente significa estar vivo.\"\" ', 1, 'public/img/imgLivro/fragmentados.jpg'),
('8587795597', 7, '2004', '1', 'Se Eu Pudesse Viver Minha Vida Novamente', 'Em Se eu pudesse viver minha vida novamente..., Rubem Alves viaja no tempo e no espaço e lança o olhar sobre os sonhos, sobre as perdas e ganhos, detendo-se nos pequenos detalhes que fazem toda a diferença, recorrendo a memórias ora felizes ora dolorosas, quase sempre com um toque de nostalgia que não é arrependimento, mas sim uma saudade gostosa de algo vivido em plenitude.', 1, 'public/img/imgLivro/vidaNovamente.jpg'),
('8595081549', 12, '2018', '1', 'O Exorcista', 'Um clássico do terror com mais de 13 milhões de exemplares vendidos “Impossível parar de ler. Poe e Mary Shelley reconheceriam [William Peter Blatty] como mais um companheiro do limbo ambíguo entre o natural e o sobrenatural... De arrepiar.” – Life Uma obra que mudou a cultura pop para sempre, O exorcista é o livro que deu origem ao maior filme de terror do século XX. Quatro décadas após chocar o mundo inteiro, a obra-prima de William Peter Blatty permanece uma metáfora moderna do combate entre o sagrado e o profano, em um dos romances mais macabros já escritos.. O mal assume várias formas. Seja com monstros, fantasmas ou demônios, tanto a literatura quanto o cinema sempre foram bem-sucedidos em representar a essência do nosso lado mais reprovável. O exorcista, no entanto, conseguiu superar qualquer outra obra do gênero. Inspirado no caso real do exorcismo de um adolescente, o escritor William Peter Blatty publicou em 1971 a perturbadora história de Chris MacNeil, uma atriz que sofre com inesperadas mudanças no comportamento da filha de 11 anos, Regan. Quando todos os esforços da ciência para descobrir o que há de errado com a menina falham e uma personalidade demoníaca parece vir à tona, Chris busca a ajuda da Igreja para tentar livrar a filha do que parece ser um raro caso de possessão. Cabe a Damien Karras, um padre da universidade de Georgetown, salvar a alma de Regan e ao mesmo tempo tentar restabelecer a própria fé, abalada desde a morte da mãe. Neste livro, Blatty conseguiu dar ao demônio a sua face mais revoltante: a corrupção de uma alma inocente. A menina Regan é, ao mesmo tempo, o mal e sua vítima. Ela recebe a pena e a revolta de leitores e espectadores em doses equivalentes e, mesmo quarenta anos depois, seu sofrimento e o abismo entre o que ela era e o que se torna continuam nos atormentando a cada página, a cada cena. Um clássico do terror que se mantém atual como somente os grandes nomes do gênero poderiam criar, O exorcista não se trata apenas de uma simples história sobre o bem contra o mal, ou sobre Deus contra o Demônio, mas também sobre a renovação da fé.. WILLIAM PETER BLATTY é um escritor e roteirista norte-americano. Sua obra prima, O exorcista, é um dos romances mais polêmicos já escritos e tornou-se um fenômeno literário, best seller absoluto e um clássico do terror. O autor também foi o responsável pelo roteiro da adaptação para o cinema de 1973, pelo qual ganhou um Oscar. O filme também conquistou dez indicações ao prêmio, inclusive de melhor filme, algo inédito para uma obra do gênero.', 1, 'public/img/imgLivro/oExorcista.jpg'),
('8595086354', 10, '2018', '1', 'Senhor dos Anéis - Trilogia', 'Apesar de ter sido publicado em três volumes – A Sociedade do Anel, As Duas Torres e O Retorno do Rei – desde os anos 1950, O Senhor dos Anéis não é exatamente uma trilogia, mas um único grande romance que só pode ser compreendido em seu conjunto, segundo a concepção de seu autor, J.R.R. Tolkien. Com design cuidadosamente pensado para refletir a unidade da obra e os desenhos originais feitos por Tolkien para as capas de cada volume, este box reúne os três livros da Saga do Anel e oferece aos leitores uma nova oportunidade de mergulhar no notável mundo da Terra-média.', 1, 'public/img/imgLivro/ringsBoxxx.png'),
('8595302847', 1, '2019', '1', 'A Menina Que Virou Lua', 'O que você diria à sua menina quando ela recebe a primeira menstruação? A Menarca é tida por muitas tradições originárias como um Rito de Passagem: o momento em que a menina se torna mulher. Este livro, \"A Menina que virou Lua\" vem nos contar sobre sabedorias ancestrais - memórias antigas, há tanto esquecidas e caladas-, de um tempo em que sentíamos a honra, poder e orgulho de habitar um corpo feminino.', 1, 'public/img/imgLivro/minaLua.png'),
('9780486421230', 2, '2002', '1', 'Swann\'s Way', 'A psychological self-portrait, a clear-eyed social study, and a profound meditation upon the artistic process, Marcel Proust\'s monumental, encyclopedic masterpiece A la recherche du temps perdu (In Search of Lost Time) changed the course of 20th-century literature. Swann\'s Way, the first volume, introduces the novel\'s major themes and its unnamed narrator, an introspective man drawn, in his youth, to fashionable society, like the author himself. Through his narrator\'s consciousness, Proust offers readers a comprehensive portrait of the high society of Paris from the 1870s through the First World War.Swann\'s Way begins with the narrator\'s reminiscences of early childhood -- including, famously, his evocative memory of eating a pastry called a madeleine -- and his fascination with what seemed the separate worlds of his family\'s various neighbors and acquaintances. He then turns his focus to the wealthy connoisseur Charles Swann and his obsessive relationship with the vulgar but radiant courtesan Odette, chronicling in detail the milieu in which it is enacted and its unfortunate effects on him.Du cote de chez Swann first appeared in 1913. It is a bitingly satiric, often comic evocation of French society that addresses a range of philosophical questions about perception, memory, desire, art, family, and politics. On its own or as part of a larger work, it is a rich search for a reality that transcends the passage of time.', 4, 'public/img/imgLivro/swannsWay_9780486421230.jpg'),
('9788501110367', 2, '2017', '1', 'Cem Anos De Solidão - Edição especial', 'Cem Anos de Solidão é uma obra do escritor colombiano Gabriel García Márquez, Prêmio Nobel da Literatura em 1982, e é atualmente considerada uma das obras mais importantes da literatura latino-americana. Essa obra tem a peculiaridade de ser umas das mais lidas e traduzidas de todo o mundo.', 3, 'public/img/imgLivro/cemAnosDeSolidao_9788501110367.jpg'),
('9788516079444', 1, '2012', '1', 'Dom Quixote', 'Apaixonado por histórias de cavalaria, Alonso Quijano passa a acreditar que é um cavaleiro andante. Em seu delírio, muda o nome para Dom Quixote de la Mancha, veste-se com uma armadura improvisada, faz de Dulcineia sua amada, a quem quer dedicar suas glórias e seus feitos. O vizinho Sancho Pança torna-se seu fiel escudeiro. Nenhum cavaleiro andante teve a ousadia de Dom Quixote. Tampouco viveu suas aventuras e desventuras, que aqui são contadas de forma divertida e emocionante. Adaptação de Walcyr Carrasco.', 1, 'public/img/imgLivro/domQuixote_9788516079444.jpg'),
('9788521206262', 17, '1969', '1', 'Fundamentos do Design de Jogos - Vol. 1', 'Uma coleção sobre os aspectos teóricos básicos do design de games, respeitando a singularidade desta área do conhecimento, que ultrapassa o processo de desenvolvimento de interações criativas. Regras do Jogo propõem uma discussão crítica das potencialidades dos jogos, dos simples aos mais sofisticados. É mais do que uma análise conceitual a respeito do que os jogos fazem; é um estudo sério acerca do que eles podem fazer e, por decorrência, do que deveriam fazer. A coleção é um estímulo à decodificação dos jogos, permitindo a compreensão do desenvolvimento de games não apenas por meio de sua estética, mas também, essencialmente, levando em consideração suas causas e efeitos. A metodologia empregada por Eric Zimmerman e Katie Salen, nessa tradução de Rules of play, permite que o leitor navegue por foco de interesse. A divisão do livro em quatro fases torna o estudo mais leve e prazeroso, sem que se perca a importância da discussão. Regras do Jogo levanta o debate sobre o passado, presente e futuro do universo do design de games, preenchendo a carência de bibliografia específica sobre o tema.', 1, 'public/img/imgLivro/regrasDoJogo.jpg'),
('9788523012878', 10, '2011', '1', 'História da Política Exterior do Brasil', 'A política exterior do Brasil à época da Independência lançou raízes de dependência estrutural. Com o tempo, os dirigentes reagiram, propondo um projeto de nação a construir que somente viria a incoporar-se como vetor da política exterior a partir de 1930. Em 1989, encerrou-se o ciclo desenvolvimentista, por força de mudanças externas e opções nacionais.\r\n\"A Política Exterior contribuiu para a perda de poder na década dos noventa, mas preparou a fase de maturidade da inserção no século XXI\".\r\nUtilizando avançados métodos de análise das relações internacionais, em História da Política Exterior do Brasil, os autores reconhecem o papel exercido pelo setor externo para a formação nacional: a consolidação do território, a segurança, a convivência global, o experimento de ideias e valores -mas sobretudo, o atraso e os rumos do desenvolvimento econômico brasileiro.\r\nO volume destina-se especialmente às áreas de Relações Internacionais, História, Economia e Política.\r\n', 1, 'public/img/imgLivro/historiaPolitica.jpg'),
('9788527311229', 2, '2018', '1', 'Uniões: A perfeição do amor. A tentação da quieta Verônica', 'Vagando e divagando pelo corpo, sensações e pensamentos de duas mulheres, Robert Musil, constrói em \"Uniões\" uma narrativa intensamente dramática e fragmentada, de absoluta radicalidade. ...', 6, 'public/img/imgLivro/unioesMusil_9788527311229.jpg'),
('9788532508133', 7, '2009', '1', 'Laços de Família', 'Nesta coletânea de contos, as personagens - sejam adultos ou adolescentes - debatem-se nas cadeias de violência latente que podem emanar do círculo doméstico. Homens ou mulheres, os laços que os unem são, em sua maioria, elos familiares ao mesmo tempo de afeto e de aprisionamento. Clarice Lispector trata a solidão, a morte, a incomunicabilidade e os abismos da existência através da rotina de dona-de-casa (Devaneio e embriaguez duma rapariga, Amor, A imitação da rosa), do mergulho trágico em uma festa familiar nos 89 anos da matriarca (Feliz aniversário), da domesticação da natureza mais selvagem das mulheres (Preciosidade, O búfalo), ou dos pequenos crimes cometidos contra a consciência, como o drama do professor de Matemática diante do abandono e da morte de um animal. São lições de vida na prosa definitiva e transcendente de uma sacerdotisa da nossa literatura.\r\n', 1, 'public/img/imgLivro/lacosFamilia.jpg'),
('9788532512949', 10, '2018', '1', 'Livro - Harry Potter Box  ', 'Maior fenômeno editorial de todos os tempos, com mais de 450 milhões de exemplares vendidos em 70 idiomas, a série Harry Potter chega às prateleiras em mais essa edição de colecionador. Os sete livros da saga criada por J. K. Rowling - que acompanha a jornada do adorado aprendiz de bruxo contra o maléfico Voldemort, - ganham novas capas e novas ilustrações e vêm num box exclusivo. Uma novidade capaz de conquistar os mais exigentes fãs, ávidos por novidades ligadas ao universo da saga, e também os novos leitores.', 1, 'public/img/imgLivro/harryBoxxx.png'),
('9788534802277', 9, '2009', '1', 'Mitos e Lendas do Folclore Brasileiro', 'O Folclore Brasileiro é um dos mais ricos do mundo. Nele, colaboraram além do elemento nativo (o índio), o português e o africano. Podemos dizer que esses três povos constituíram as raízes de nossa cultura. O Folclore nada mais é do que o conjunto de manifestações de uma cultura popular tradicional que retrata a alma de um povo, exprimindo sentimentos e valores estéticos que muitas vezes influenciam níveis mais elaborados dessa mesma cultura. Ligado às mais profundas raízes do ser humano, o Folclore mantém de forma quase divinizada as lendas e os mitos que o compõe, isso em todas as suas incursões pelo mais longínquos lugares do país, florescendo de forma variada suas estórias, que agradam ao consciente coletivo deste imenso país.Nesta obra, o autor resgata um pouco de nossa cultura, valores e raízes.', 1, 'public/img/imgLivro/mitosLendas.jpg'),
('9788535911121', 14, '2006', '1', 'O Menino do Pijama Listrado', 'Bruno tem nove anos e não sabe nada sobre o Holocausto e a Solução Final contra os judeus.Também não faz idéia de que seu país está em guerra com boa parte da Europa, e muito menos de que sua família está envolvida no conflito. Na verdade, Bruno sabe apenas que foi obrigado a abandonar a espaçosa casa em que vivia em Berlim e mudar-se para uma região desolada, onde ele não tem ninguém para brincar nem nada para fazer. Da janela do quarto, Bruno pode ver uma cerca, e, para além dela, centenas de pessoas de pijama, que sempre o deixam com um frio na barriga. Em uma de suas andanças Bruno conhece Shmuel,um garoto do outro lado da cerca que curiosamente nasceu no mesmo dia que ele. Conforme a amizade dos dois se intensifica, Bruno vai aos poucos tentando elucidar o mistério que ronda as atividades de seu pai. \"O Menino do Pijama Listrado\" é uma fábula sobre amizade em tempos de guerra, e sobre o que acontece quando a inocência é colocada diante de um monstro terrível e inimaginável.', 1, 'public/img/imgLivro/pijamaListrado.jpg'),
('9788535927085', 6, '2016', '1', 'Vozes De Tchernóbil - A História Oral Do Desastre Nuclear', 'Em abril de 1986, uma explosão na usina nuclear de Chernobil, na Ucrânia — então parte da finada União Soviética —, provocou uma catástrofe sem precedentes: uma quantidade imensa de partículas radioativas foi lançada na atmosfera e a cidade de Pripyat teve que ser imediatamente evacuada. Tão grave quanto o acidente foi a postura dos governantes soviéticos, que expunham trabalhadores, cientistas e soldados à morte durante os reparos na usina. Pessoas comuns, que mantinham a fé no grande império comunista, pereciam após poucos dias de serviço. Por meio das vozes dos envolvidos na tragédia, Svetlana constrói este livro arrebatador, que tem a força das melhores reportagens jornalísticas e a potência dos maiores romances literários. Uma obra-prima do nosso tempo.', 1, 'public/img/imgLivro/vozesDeCher.jpg'),
('9788535928204', 2, '2016', '1', 'A Montanha Mágica', 'A Montanha Mágica é um livro escrito por Thomas Mann em 1924. Um dos romances mais influentes da literatura mundial do século XX, foi importante para a conquista do Prêmio Nobel de Literatura em 1929 por Mann. É um exemplo clássico da literatura que os alemães classificam como Bildungsroman.', 2, 'public/img/imgLivro/aMontanhaMagica_9788535928204.jpg'),
('9788535929225', 2, '2017', '1', 'Anna Karienina', 'Anna Karenina, ou Ana Karênina, em algumas traduções, ou Anna Kariênina, conforme a edição mais recente em língua portuguesa, é um romance do escritor russo Liev Tolstói.', 2, 'public/img/imgLivro/annaKarienina_9788535929225.jpg'),
('9788543104355', 2, '2016', '1', 'O homem mais inteligente da história', 'Psicólogo e pesquisador, Dr. Marco Polo desenvolveu uma teoria inédita sobre o funcionamento da mente e a gestão da emoção. Após sofrer uma terrível perda pessoal, ele vai a Jerusalém participar de um ciclo de conferências na ONU e é confrontado com uma pergunta surpreendente: Jesus sabia gerenciar a própria mente? Ateu convicto, Marco Polo responde que ciência e religião não se misturam. No entanto, instigado pelo tema, decide analisar a inteligência de Cristo à luz das ciências humanas. Ele esperava encontrar um homem simplório, com poucos recursos emocionais. Mas ao mergulhar na inquietante biografia de Jesus presente no Livro de Lucas, suas crenças vão sendo pouco a pouco colocadas em xeque. Para empreender essa incrível jornada, Marco Polo vai contar com uma mesa-redonda composta por dois brilhantes teólogos, um renomado neurocirurgião e sua assistente, a psiquiatra Sofia. Juntos, eles irão decifrar os sentidos ocultos em um dos textos mais famosos do Novo Testamento. Os debates são transmitidos via internet e cativam espectadores em todo o mundo   mas nem todos estão preparados para ver Jesus sob uma ótica tão revolucionária. Agora os intelectuais terão que lidar com seus próprios fantasmas emocionais e encarar perigos que jamais imaginaram enfrentar.', 15, 'public/img/imgLivro/oHoememMaisInteligenteDaHistoria_9788543104355.jpg'),
('9788544001400', 3, '2017', '1', 'Os Lusiadas', 'De um lado, os homens; de outro, os deuses do Olimpo. Prepare-se para viver uma turbulenta e surpreendente aventura em alto-mar, a bordo da armada de Vasco da Gama rumo às Índias. ', 8, 'public/img/imgLivro/osLusiadas_9788544001868.jpg'),
('9788544001868', 2, '2018', '1', 'Persuasão', 'Persuasão é um romance da escritora britânica Jane Austen, escrito por volta de 1816. Seu título original é Persuasion, e é o último romance completo escrito por Jane Austen, que o escreveu após terminar Emma. A história se passa em Bath, e é relacionada a outro romance de Austen, Northanger Abbey.', 8, 'public/img/imgLivro/persuasao_9788544001868.jpg'),
('9788547213817', 16, '2018', '1', 'Manual De Direito Empresarial', 'Neste volume único, Ricardo Negrão reúne todo o conteúdo de Direito Comercial e Empresarial elaborado com base na sua ampla experiência como professor universitário. Apresentada em seis capítulos, toda a matéria abrange aos ciclos curriculares dos cinco anos da graduação em Direito. Os assuntos seguem, nos três primeiros capítulos, a estrutura legal do Livro Ii do Código Civil brasileiro: a empresa e as pessoas que a exercem o empresário individual e a sociedade empresária o estabelecimento empresarial e os institutos complementares. Os capítulos 4, 5 e 6 abordam, respectivamente, os contratos empresariais, os títulos de crédito e os institutos da recuperação judicial e da falência, completando a matéria de interesse empresarial.', 1, 'public/img/imgLivro/direitoEmpresarial.jpg'),
('9788551002636', 6, '2017', '1', 'Endurance - Um Ano No Espaço', 'Impressionante relato do astronauta que realizou a façanha de passar um ano no espaço, Endurance traz as considerações francas da extraordinária viagem, a jornada que a precedeu e os empolgantes anos da formação de Scott Kelly.Veterano de quatro viagens espaciais e detentor do recorde americano de dias consecutivos no espaço, Scott Kelly viveu experiências pelas quais pouquíssimos humanos tiveram a oportunidade de passar. Agora ele compartilha com o leitor o desafio extremo representado pela longa permanência em uma espaçonave — tanto os aspectos mundanos quanto os potencialmente mortais. Dos efeitos arrasadores no corpo ao isolamento dos entes queridos e das comodidades da Terra, passando pelo perigo de colisão com lixo espacial, até a ameaça mais aterrorizante, a impossibilidade de ajudar no caso de uma tragédia familiar, Kelly divide tudo, expondo seu dia a dia na estação e seus sentimentos. A humanidade, a compaixão, o bom humor e a determinação de Kelly ficam visíveis à medida que ele conta sobre a infância em Nova Jersey e a inspiração durante a juventude que culminou em sua surpreendente carreira, além da certeza de que Marte é o próximo grande desafio dos Estados Unidos no que se refere ao espaço.Contador de histórias nato e herói moderno, Kelly traz uma mensagem de esperança que inspirará as próximas gerações. Na história de sua vida, é possível ver o triunfo da imaginação humana, o poder da determinação e a maravilha infinita do universo.', 1, 'public/img/imgLivro/umAnoEspaco.jpg'),
('9788553250257', 5, '2018', '1', 'A Peruca do Defunto - e Outras Situações Improváveis', 'Este livro é uma sátira do comportamento humano. Reúne crônicas que comentam aspectos humorísticos da reação das pessoas em diferentes situações. Os assuntos abordados incluem ciência, política, cultura, tecnologia, religião e economia, além de outros que se interligam para formar um mosaico de condições improváveis, relatadas de forma sarcástica. Com um texto leve e cômico, A peruca do defunto situa o leitor nos cenários descritos e, por vezes, faz que se sinta personagem involuntário.', 1, 'public/img/imgLivro/perucaDefunto.jpg'),
('9788556510686', 8, '2018', '1', ' A Máquina do Tempo (Edição especial)', 'O primeiro e mais famoso livro sobre viagem no tempo chega em edição especial, com ilustrações inéditas, tradução primorosa e extras. Ao contar a história de um cientista inglês que embarca em uma fabulosa jornada a um mundo futuro, desconhecido e cheio de mistérios, H. G. Wells inaugura um dos principais temas da ficção científica.\r\nA bordo de sua Máquina do Tempo, o cientista que narra esta história parte do século XIX para o ano de 802701. Nesse futuro distante, ele descobre que o sofrimento da humanidade foi transformado em beleza, felicidade e paz. A Terra é habitada pelos dóceis Eloi, uma espécie que descende dos seres humanos e já formou uma antiga e enorme civilização. Mas os Eloi parecem ter medo do escuro, e têm todos os motivos para isso: em túneis subterrâneos vivem os Morlocks, seus maiores inimigos. Quando a Máquina do Tempo que levou o Viajante some, ele é obrigado a descer às profundezas para recuperá-la e voltar ao presente.\r\nMisturando uma imaginação singular, um tema inovador e muitas reviravoltas, A Máquina do Tempo foi o primeiro romance publicado por H. G. Wells, em 1895. Chamado de gênio e considerado um pioneiro, Wells abriu caminho não só para seus livros e sua visão de mundo, mas para novas possibilidades na literatura.\r\n', 1, 'public/img/imgLivro/maquinaTempo.jpg'),
('9788560280940', 12, '2014', '1', 'It - A Coisa', 'O clássico de Stephen King em nova edição. O livro que inspirou os filmes. Durante as férias escolares de 1958, em Derry, pacata cidadezinha do Maine, Bill, Richie, Stan, Mike, Eddie, Ben e Beverly aprenderam o real sentido da amizade, do amor, da confiança e... do medo. O mais profundo e tenebroso medo.', 22, 'public/img/imgLivro/itCoisa_9788560280940.jpg'),
('9788561255039', 17, '2009', '1', 'Psicologia do Poker', 'O poker requer diversas habilidades e estratégias. Para obter sucesso, você deve ser capaz de dominar todas elas e aplicá-las na hora certa. Isso inclui seleção correta de mãos, agressividade seletiva, blefes, semiblefes, entendimento de tells e mensagens, escolha de jogos e leitura de mãos. Não há como vencer fazendo apenas \"o que parece natural\".\r\nEste livro não traz conselhos estratégicos: você terá acesso a esse conhecimento a partir de outras obras, como as que a Two Plus Two Publishing e própria série \"Obras-Primas do Poker\" oferecem. Aqui, o Dr. Schoonmaker dá ênfase aos fatores psicológicos que afetam a sua habilidade - e a de seu oponente - de jogar de forma correta.\r\nPor exemplo, você já parou para pensar por que alguns jogadores parecem extremamente agressivos enquanto outros são passivos? Por que alguns são tight e outros são loose? Já imaginou por que você consegue aprender algumas táticas com facilidade enquanto sente dificuldades em relação a outras?\r\nEste livro responderá muitas dessas perguntas. Ele explicará a razão pela qual você e seu oponente jogam deste ou daquele modo. Muitas pessoas sabem jogar, mas não fazem isso da maneira adequada. Simplesmente aprender estratégias não quer dizer que você irá aplicá-las de forma apropriada.\r\nO autor também sugere ajustes estratégicos que devem ser feitos para você melhorar seus resultados contra diferentes tipos de oponentes, além de ajustes pessoais que lhe ajudarão a jogar melhor e a aproveitar mais o jogo.\r\n', 1, 'public/img/imgLivro/psicologiaPoker.jpg'),
('9788563560421', 2, '2012', '1', 'Ulysses', 'Foi em torno desse esqueleto enganosamente simples, quase banal, que James Joyce elaborou o que veio a ser o grande romance do século XX. Inspirado na Odisseia de Homero, Ulysses é ambientado em Dublin, e narra as aventuras de Leopold Bloom e seu amigo Stephen Dedalus ao longo do dia 16 de junho de 1904.', 9, 'public/img/imgLivro/ulysses_9788563560421.jpg'),
('9788567028514', 6, '2014', '1', 'A Teoria de Tudo', 'A história de Stephen Hawking é contada pela luz da genialidade e do amor que não vê obstáculos. Quando Jane conhece Stephen, percebe que está entrando para uma família que é pelo menos diferente. Com grande sede de conhecimento, os Hawking possuíam o hábito de levar material de leitura para o jantar, ir a óperas e concertos e estimular o brilhantismo em seus filhos – entre eles aquele que seria conhecido como um dos maiores gênios da humanidade, Stephen. Descubra a história por trás de Stephen Hawking, cientista e autor de sucessos como Uma breve história do tempo, que já vendeu mais de 25 milhões de exemplares. Diagnosticado com esclerose lateral amiotrófica aos 21 anos, enquanto conhecia a jovem tímida Jane, Hawking superou todas as expectativas dos médicos sobre suas chances de sobrevivência a partir da perseverança de sua mulher. Mesmo ao descobrir que a condição de Stephen apenas pioraria, Jane seguiu firme na decisão de compartilhar a vida com aquele que havia lhe encantado. Ao contar uma trajetória de 25 anos de casamento e três filhos, ela mostra uma história universal e tocante, narrada sob um ponto de vista único. Stephen Hawking chega o mais próximo que alguém já conseguiu de explicar o sentido da vida, enquanto Jane nos mostra que já o conhecia desde sempre: ele está na nossa capacidade de amar e de superar limites em nome daqueles que escolhemos para compartilhar a vida.', 1, 'public/img/imgLivro/aTeoriaDeTudo.jpg'),
('9788573264241', 3, '2016', '1', 'A Divina Comédia', 'A Divina Comédia é um poema de viés épico e teológico da literatura italiana e mundial, escrito por Dante Alighieri no século XIV e dividido em três partes: o Inferno, o Purgatório e o Paraíso.', 5, 'public/img/imgLivro/aDivinaComedia_9788573264241.jpg'),
('9788576655763', 5, '1997', '1', 'Diário de Um Magro - 2ª Ed', 'Neste livro, Mario Prata passou a vida dele a limpo e descobriu que perdeu alguns vícios, entre eles o do cigarro. Porém ganhou um outro impossível de superar - o vício em spa. Diário de um magro traz o dia a dia bem-humorado de um spa, tudo acompanhado de ilustrações de Paulo Caruso.', 1, 'public/img/imgLivro/diarioMagro.jpg');
INSERT INTO `livro` (`isbn_livro`, `id_categoria`, `ano_livro`, `cod_status_livro`, `nome_livro`, `sinopse_livro`, `id_editora`, `url_foto_livro`) VALUES
('9788576752035', 1, '2007', '1', 'A Invenção de Hugo Cabret', 'Prepare-se para entrar em um mundo onde o mistério e o suspense ditam as regras. Hugo Cabret é um menino órfão que vive escondido na central de trem de Paris dos anos 1930.\r\nesgueirando-se por passagens secretas, Hugo cuida dos gigantescos relógios do lugar: escuta seus compassos, observa os enormes ponteiros e responsabiliza-se pelo funcionamento das máquinas.\r\nA sobrevivência de Hugo depende do anonimato: ele tenta se manter invisível porque guarda um incrível segredo, que é posto em risco quando o severo dono da loja de brinquedos da estação e sua afilhada cruzam o caminho do garoto.\r\nUm desenho enigmático, um caderno valioso, uma chave roubada e um homem mecânico estão no centro desta intrincada e imprevisível história, que, narrada por texto e imagens, mistura elementos dos quadrinhos e do cinema, oferecendo uma diferente e emocionante experiência de leitura.\r\n', 1, 'public/img/imgLivro/invencaoHugo.jpg'),
('9788576793687', 5, '2018', '1', 'Os Textículos de Ary Toleto', 'O seu humor inteligente é um bálsamo que nos liberta das agruras da vida. E é como o mais perfeito orgasmo: morre-se de prazer... Ressuscita-se não mais querendo sair de dentro... Do bem-estar!... O humor do Ary sobe aos níveis mais altos e alcança a compreensão da filosofia anárquica... posto que só um grande humorista, estuda o público a que se vai dirigir. E ele sabe alinhavar um roteiro que vai de Chaplin a Mazaropi... ou vice-versa. Há um velho adágio que diz: “O homem é o único animal que ri”. Ary foge a regra: faz sucesso até no auditório feminino do Silvio Santos. Sinto-me honrado por estar ajudando a compor a orelha comunista (esquerda) deste livro. Aliás, acho que orelha de livro só serve para isso: dar oportunidade aos amigos – livro não escuta! Para que orelha?... Como nunca perdi um show do Ary vou comprar o livro, é uma forma de levar bom humor para casa. José Messias – criador do “Para quem você tira o chapéu”. Jornalista, escritor e compositor musical', 1, 'public/img/imgLivro/ariToledo.jpg'),
('9788577225446', 13, '2015', '1', 'Entre O Amor E A Guerra ', 'Marcada por fortes emoções e permeada por uma constante atmosfera de tensão, a história de Entre o amor e a guerra se passa na Alemanha, em meio aos horrores da Segunda Guerra Mundial. Ditada pelo espírito Lucius, a obra traz o drama de Denizarth Lefreve, combatente francês que, gravemente ferido no front e prestes a ser capturado, assume a identidade de um oficial nazista que ele matara. Fingindo perda de memória, o protagonista é acolhido pela família do soldado alemão Ludwig e passa a residir em pátria inimiga. Com o desenrolar do enredo, porém, ele percebe que a guerra nada mais é do que um jogo de interesses, que coloca em lados opostos seres humanos com os mesmos anseios e valores.', 1, 'public/img/imgLivro/entreAmorGuerra.jpg'),
('9788577990252', 14, '2007', '1', 'A Lista de Schindler', 'Durante a Segunda Guerra Mundial, enquanto o regime nazista enviava milhares de prisioneiros aos fornos de Auschwitz, o industrial alemão Oskar Schindler abrigava centenas de judeus em sua fábrica, de onde ele finalmente os transferia em segurança para a Tchecoslováquia. Um lugar na lista de Schindler significava a única chance de sobrevivência para um prisioneiro judeu. Oskar Schindler, o herói do Holocausto, é retratado de modo inédito e comovente pelo romancista Thomas Keneally, que passou dois anos entrevistando sobreviventes beneficiados por Schindler em sete países: Austrália, Israel, Alemanha Ocidental, Áustria, Estados Unidos, Argentina e Brasil. Escrito com paixão, mas também com absoluta fidelidade aos fatos, o autor realizou uma espantosa recriação de um episódio histórico, narrado com toda a ênfase de uma ficção.\r\nConsiderado um dos mais importantes escritores australianos, Thomas Keneally publicou seu primeiro livro em 1960, aos 25 anos. Como revelam os seus romances e artigos publicados em jornais, as questões raciais, os conflitos armados e a imigração sempre foram temas de interesse do autor. Em 1981, publicou a sua obra mais conhecida, A lista de Schindler, pela qual recebeu o Booker Prize no ano seguinte. Em 1993, adaptado por Steven Spielberg para o cinema, o filme foi vencedor de sete Oscar.\r\n', 1, 'public/img/imgLivro/listaDeScroll.jpg'),
('9788578270698', 11, '2009', '1', 'As crônicas de Nárnia', 'Viagens ao fim do mundo, criaturas fantásticas e batalhas épicas entre o bem e o mal - o que mais um leitor poderia querer de um livro? O livro que tem tudo isso é \'O leão, a feiticeira e o guarda-roupa\', escrito em 1949 por Clive Staples Lewis. MasLewis não parou por aí. Seis outros livros vieram depois e, juntos, ficaram conhecidos como \'As crônicas de Nárnia\'. Nos últimos cinqüenta anos, \'As crônicas de Nárnia\' transcenderam o gênero da fantasia para se tornar parte do cânone da literaturaclássica. Cada um dos sete livros é uma obra-prima, atraindo o leitor para um mundo em que a magia encontra a realidade, e o resultado é um mundo ficcional que tem fascinado gerações. Esta edição apresenta todas as sete crônicas integralmente, num único volume. Os livros são apresentados de acordo com a ordem de preferência de Lewis, cada capítulo com uma ilustração do artista original, Pauline Baynes. Enganosamente simples e direta, \'As crônicas de Nárnia\' continuam cativando os leitores com aventuras, personagens e fatos que falam a pessoas de todas as idades.', 1, 'public/img/imgLivro/cronicasNarnia.jpg'),
('9788579030406', 12, '2012', '1', 'Entre as Teias da Aranha: Uma História de Suspense Baseada em Fatos Históricos', 'Esse romance de mistério e suspense de grande sucesso internacional mistura ficção, suspense e fatos históricos da Segunda Guerra Mundial de tirar o fôlego, ambientados em São Paulo e Israel.', 1, 'public/img/imgLivro/entreTeiasAranha.jpg'),
('9788579305399', 6, '2013', '1', ' Depois de Auschwitz - o Emocionante Relato de Uma Jovem Que Sobreviveu ao Holocausto', 'Em seu aniversário de quinze anos, Eva é enviada para Auschwitz. Sua sobrevivência depende da sorte, da sua própria determinação e do amor de sua mãe, Fritzi. Quando Auschwitz é extinto, mãe e filha iniciam a longa jornada de volta para casa. Elas procuram desesperadamente pelo pai e pelo irmão de Eva, de quem haviam se separado. A notícia veio alguns meses depois: tragicamente, os dois foram mortos. Este é um depoimento honesto e doloroso de uma pessoa que sobreviveu ao Holocausto. As lembranças e descrições de Eva são sensíveis e vívidas, e seu relato traz o horror para tão perto quanto poderia estar. Mas também traz a luta de Eva para viver carregando o peso de seu terrível passado, ao mesmo tempo em que inspira e motiva pessoas com sua mensagem de perseverança e de respeito ao próximo – e ainda dá continuidade ao trabalho de seu padrasto Otto, pai de Anne Frank, garantindo que o legado de Anne nunca seja esquecido.', 1, 'public/img/imgLivro/depoisDeAwchivits.jpg'),
('9788579308512', 16, '2015', '1', 'Manual de Persuasão do FBI', 'Ex-agente do FBI ensina como influenciar, atrair e conquistar pessoas!\r\nComo um agente especial para o Programa de Análise Comportamental da Divisão de Segurança Nacional do FBI, Dr. Jack Schafer desenvolveu estratégias dinâmicas e inovadoras para entrevistar terroristas e detectar mentiras. Agora, Dr. Schafer evoluiu suas táticas e nos ensina como aplicá-las no cotidiano para obter sucesso nas relações interpessoais.\r\nVocê quer pensar e reagir como os investigadores de TV do Criminal Minds, CSI ou Lie to Me? Quer influenciar pessoas recém-conhecidas e planejar a imagem pessoal que transmitirá no dia a dia? Quer entender através da linguagem corporal o que passa pela cabeça das pessoas ao seu redor? Quer descobrir se alguém está mentindo?\r\nCaso tenha respondido sim para alguma dessas perguntas, este é o livro perfeito para você.\r\n', 1, 'public/img/imgLivro/manualFBI.jpg'),
('9788580572261', 14, '2012', '1', 'A Culpa É Das Estrelas', 'Hazel é uma paciente terminal. Ainda que, por um milagre da medicina, seu tumor tenha encolhido bastante — o que lhe dá a promessa de viver mais alguns anos —, o último capítulo de sua história foi escrito no momento do diagnóstico. Mas em todo bom enredo há uma reviravolta, e a de Hazel se chama Augustus Waters, um garoto bonito que certo dia aparece no Grupo de Apoio a Crianças com Câncer. Juntos, os dois vão preencher o pequeno infinito das páginas em branco de suas vidas.', 1, 'public/img/imgLivro/culpaEstrela.jpg'),
('9788580573749', 2, '2013', '1', 'Cidades de Papel', 'Cidades de Papel é o terceiro romance escrito por John Green, publicado em 16 de outubro de 2008 pela Dutton Books. No Brasil, a obra foi publicada pela Editora Intrínseca em 2013. O romance explora a vinda de idade e de busca do protagonista.', 10, 'public/img/imgLivro/cidadeDePapel_9788580573749.jpg'),
('9788580574623', 10, '2018', '1', 'Livro - Box Percy Jackson e os Olimpianos (5 Volumes)', 'Percy Jackson & the Olympians é uma série literária composta por cinco livros de aventura e fantasia, escritos pelo estadunidense Rick Riordan, que retrata a mitologia grega no século XXI. O personagem principal da série é Percy J', 1, 'public/img/imgLivro/persyBoxxx.png'),
('9788581488257', 19, '2015', '1', 'Mosaicos de culturas de leitura e desafios da tradução na literatura infanto-juvenil', ' O livro analisa o segmento denominado literatura infanto-juvenil sob a perspectiva das tradições culturais decorrentes da prática de leitura no Brasil e nos EUA; da in uência deste gênero no processo de formação do indivíduo, e dos percalços linguísticos enfrentados na tradução de livros estrangeiros para o mercado nacional. Apresenta o contexto histórico--cultural do gênero, de suas raízes nos contos orais indo-europeus até chegar ao que se considera a “nascença” da literatura infantil brasileira no Século XX.', 1, 'public/img/imgLivro/mosaicoCulturas.jpg'),
('9788581863351', 2, '2019', '1', 'A Metamorfose', 'A Metamorfose é uma novela escrita por Franz Kafka, publicada pela primeira vez em 1915. Veio a ser o texto mais conhecido, estudado e citado da obra de Kafka. Apesar de ter sido publicada em 1915, foi escrita em novembro de 1912 e concluída em vinte dias.', 7, 'public/img/imgLivro/metamorfose_9788581863351.jpg'),
('9788582850404', 4, '2016', '1', 'Romeu E Julieta', 'Romeu e Julieta é uma tragédia escrita entre 1591 e 1595, nos primórdios da carreira literária de William Shakespeare, sobre dois adolescentes cuja morte acaba unindo suas famílias, outrora em pé de guerra.', 9, 'public/img/imgLivro/romeuJulieta_9788582850404.jpg'),
('9788584390670', 2, '2017', '1', 'O Alquimista', 'Paulo Coelho jï¿½ inspirou mais de 200 milhï¿½es de leitores por todo o mundo com este romance encantador. Esta histï¿½ria, brilhante em sua simplicidade e com uma sabedoria que nos estimula, ï¿½ sobre um jovem pastor da Andaluzia chamado Santiago que viaja de sua cidade natal na Espanha para o deserto do Egito em busca de um tesouro escondido perto das Pirï¿½mides. Ao longo do caminho, ele encontra uma cigana, um homem que se diz rei e um alquimista, que lhe indicam a direï¿½ï¿½o para a sua busca. Ninguï¿½m sabe que tesouro ï¿½ esse, ou se Santiago serï¿½ capaz de ultrapassar os obstï¿½culos de seu trajeto. Mas o que comeï¿½a como uma jornada para encontrar bens mundanos se transforma na descoberta do tesouro que se encontra dentro dele mesmo. Emocionante e profundamente humano, este clï¿½ssico contemporï¿½neo ï¿½ um testamento eterno do poder transformador dos nossos sonhos e da importï¿½ncia de ouvirmos nossos coraï¿½ï¿½es.', 25, 'public/img/imgLivro/oAlquimista_9788584390670.jpg'),
('9788599146873', 19, '2018', '1', 'Leitura e literatura infanto-juvenil : redes de sentido.', 'Segundo Davi Arrigucci Jr., a leitura nos leva para o espaço e o tempo sensíveis ao coração, o que é, para não dizer mais, uma forma de felicidade. Cada vez mais consciente de que ser leitor é possibilidade de construção de um ser humano melhor, mais crítico, mais sensível, alguém capaz de se colocar no lugar do outro, alguém mais imaginativo e sonhador. Por isso, reuni nesta coletânea artigos de pesquisadores de diversas instituições, preocupados com a questão da pesquisa em leitura, formação do leitor e a literatura infantil e juvenil na perspectiva da teoria, da história e da crítica. A obra Leitura e Literatura Infanto-Juvenil: redes de sentido é o resultado desse entusiasmo acadêmico permeado de um quadro rico de reflexões teóricas, alargando esse universo instigante que é a leitura e a literatura infantil e juvenil. Assim, este livro conduz o leitor, pelos caminhos da crítica, a conhecer obras de alta qualidade estética e autores expressivos da literatura infantil brasileira e, ainda, discussões em torno das práticas de leitura e a formação do leitor.', 1, 'public/img/imgLivro/leituraLiteratura.jpg'),
('9788599296363', 2, '2008', '1', 'A Cabana', 'A Cabana é um livro do escritor canadense William P. Young, lançado em 2007 nos Estados Unidos. Chegou ao Brasil pela Editora Sextante em 2008. No ano de 2009 ganhou o Diamond Awards por ter vendido 10 milhões de cópias nos EUA. Até então já vendeu mais de 20 milhões de livros.', 15, 'public/img/imgLivro/aCabana_9788599296363.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `livro_autor`
--

CREATE TABLE `livro_autor` (
  `id_autor` int(11) NOT NULL,
  `isbn_livro` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `livro_autor`
--

INSERT INTO `livro_autor` (`id_autor`, `isbn_livro`) VALUES
(1, '9788516079444'),
(2, '9788535929225'),
(3, '9788535928204'),
(4, '9788501110367'),
(5, '9788563560421'),
(6, '9780486421230'),
(7, '9788573264241'),
(8, '9788527311229'),
(9, '9788581863351'),
(10, '9788544001400'),
(11, '9788582850404'),
(12, '9788544001868'),
(13, '9788580572261'),
(13, '9788580573749'),
(16, '8535920692'),
(20, '8532511015'),
(20, '8532530796'),
(20, '853253080'),
(20, '8532531318'),
(20, '9788532512949'),
(21, '9788560280940'),
(23, '9788584390670'),
(24, '9788543104355'),
(25, '8575421131'),
(31, '9788599296363'),
(32, '8580413532'),
(33, '9788577225446'),
(34, '9788577225446'),
(35, '8579800242'),
(36, '9788578270698'),
(37, '8580418216'),
(38, '9788567028514'),
(39, '9788579305399'),
(40, '9788551002636'),
(41, '9788535927085'),
(42, '8534800669'),
(43, '8534800669'),
(44, '9788532508133'),
(45, '8560281320'),
(46, '9788535911121'),
(47, '9788576752035'),
(48, '9788576752035'),
(49, '9788577990252'),
(50, '9788561255039'),
(51, '9788523012878'),
(52, '9788523012878'),
(53, '9788579030406'),
(54, '9788579030406'),
(55, '9788579308512'),
(56, '8501116432'),
(57, '8530979524'),
(58, '8530983874'),
(59, '8563560808'),
(60, '8565432947'),
(61, '8572328424'),
(62, '8576572095'),
(63, '8578271548'),
(64, '8581635199'),
(65, '8587795597'),
(66, '8595081549'),
(67, '9788521206262'),
(68, '9788521206262'),
(69, '9788547213817'),
(70, '9788553250257'),
(71, '9788534802277'),
(72, '9788556510686'),
(73, '8595302847'),
(74, '9788581488257'),
(75, '9788576655763'),
(76, '9788599146873'),
(77, '9788576793687'),
(78, '9788580574623'),
(79, '8595086354');

-- --------------------------------------------------------

--
-- Estrutura para tabela `mensagem`
--

CREATE TABLE `mensagem` (
  `id_usuario` int(11) NOT NULL,
  `id_usuario_sebo` int(11) NOT NULL,
  `data_hora_msg` datetime NOT NULL,
  `txt_msg` varchar(500) DEFAULT NULL,
  `cod_status_msg` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `nacionalidade`
--

CREATE TABLE `nacionalidade` (
  `id_nacionalidade` int(11) NOT NULL,
  `nome_nacionalidade` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `nacionalidade`
--

INSERT INTO `nacionalidade` (`id_nacionalidade`, `nome_nacionalidade`) VALUES
(1, 'Espanhola'),
(2, 'Russa'),
(3, 'Suiça'),
(4, 'Colombiana'),
(5, 'Irlandesa'),
(6, 'Francesa'),
(7, 'Italiana'),
(8, 'Austriaca'),
(9, 'Checoslováquia'),
(10, 'Portuguesa'),
(11, 'Britânica'),
(12, 'Americana'),
(13, 'Brasileira'),
(14, 'Afegã'),
(15, 'Africana'),
(16, 'Alemã'),
(17, 'Argentina'),
(18, 'Asiática'),
(19, 'Australiana'),
(20, 'Belga'),
(21, 'Canadensa'),
(22, 'Chilena'),
(23, 'Chinesa'),
(24, 'Coreana'),
(25, 'Croata'),
(26, 'Dinamarquêsa'),
(27, 'Egípcia'),
(28, 'Escocesa'),
(29, 'Eslovaquia'),
(30, 'Europeia'),
(31, 'Filipina'),
(32, 'Finlandesa'),
(33, 'Grega'),
(34, 'Holandesa'),
(35, 'Indiana'),
(36, 'Inglesa'),
(37, 'Iraniana'),
(38, 'Iraquiana'),
(39, 'Japonesa'),
(40, 'Mexicana'),
(41, 'Norueguesa'),
(42, 'Paquistanesa'),
(43, 'Polonesa'),
(44, 'Sueca'),
(45, 'Sul-Africana'),
(46, 'Sul-Coreana'),
(47, 'Turca'),
(48, 'Árabe'),
(49, 'Ucraniana'),
(50, 'Ucraniana');

-- --------------------------------------------------------

--
-- Estrutura para tabela `perfil`
--

CREATE TABLE `perfil` (
  `id_perfil` int(11) NOT NULL,
  `nome_perfil` varchar(100) DEFAULT NULL,
  `cod_status_perfil` varchar(10) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `perfil`
--

INSERT INTO `perfil` (`id_perfil`, `nome_perfil`, `cod_status_perfil`) VALUES
(1, 'Admin_Master', '1'),
(2, 'Admin_Nivel_2', '1'),
(3, 'Admin_Nivel_3', '1'),
(4, 'Cliente', '1'),
(5, 'Sebo', '1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `postagem`
--

CREATE TABLE `postagem` (
  `id_post` int(11) NOT NULL,
  `data_hora_post` datetime DEFAULT NULL,
  `link_post` varchar(100) DEFAULT NULL,
  `url_foto_post` varchar(100) DEFAULT 'public/imgPost/imgPadrao/padrao.jpg',
  `txt_postagem` text,
  `titulo_post` text,
  `cod_status_post` varchar(10) DEFAULT '1',
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `postagem`
--

INSERT INTO `postagem` (`id_post`, `data_hora_post`, `link_post`, `url_foto_post`, `txt_postagem`, `titulo_post`, `cod_status_post`, `id_usuario`) VALUES
(1, '2019-11-24 23:17:45', NULL, 'public/img/imgPost/15 curiosidades que você não sabia sobre o mundo dos livros!.png', 'Você sabia que até hoje mais de 400 longas já foram feitos inspirados nas obras de Shakespeare? E que o livro “Ulisses”, de James Joyce, junto com a Bíblia, são os dois únicos livros no mundo que ganharam feriados devido ao quanto são importantes?\r\n\r\nVocê provavelmente não imaginava que escritores como Virginia Wolf, Goethe e Hemingway tinham o costume de escrever seus livros em pé.\r\n\r\nPara incentivarmos cada vez mais o ato de ler, decidimos montar uma lista com 15 fatos curiosos sobre o mundo da literatura e da produção de livros. Veja só:\r\n\r\n1. A Índia é o país que mais lê no mundo, registrando uma média de 10 horas semanais para cada leitor.\r\n\r\n2. O primeiro livro feito em uma máquina de escrever é do autor Mark Twain, o “Adventures of Tom Sawyer”.\r\n\r\n3. Já o primeiro livro registrado como “best-seller” foi o “Fools of Nature”, da escritora Alice Brown.\r\n\r\n4. O recorde de pessoas que conseguiram equilibrar um maior número de livros na própria cabeça, ao mesmo tempo e em um mesmo lugar, foi 998 indivíduos, em Sydney, na Austrália, em 2012.\r\n\r\n5. O livro mais caro do mundo, hoje, custa 153 milhões de euros, com apenas 13 páginas de conteúdo.\r\n\r\n6. “Bibliosmia” é o nome dado ao prazer em que as pessoas sentem ao cheirar livros antigos.\r\n\r\n7. A frase mais longa impressa em um livro vem da obra “Os Miseráveis”, de Victor Hugo, com 823 palavras.\r\n\r\n8. Os três livros mais lidos no mundo são: a Bíblia, “O Livro Vermelho”, de Mao Tsé-Tung, e “Harry Potter”.\r\n\r\n9. Ler pode ajudar a prevenir doenças como o Alzheimer.\r\n\r\n10. Um estudo mostra que crianças e adolescente entre 10 e 16 anos que leem por prazer vão melhor na escola.\r\n\r\n11. Segundo a UNESCO, Agatha Christie é considerada a escritora mais traduzida mundialmente.\r\n\r\n12. Paulo Coelho é o autor brasileiro que mais vendeu livros no mundo. Cerca de 70 milhões de exemplares.\r\n\r\n13. J.K. Rowling, autora de “Harry Potter”, escreveu todos os livros da saga à mão.\r\n\r\n14. “Alice no País das Maravilhas” chegou a ser proibido de ser vendido na China por ter como personagens “animais que falavam”.\r\n\r\n15. Franz Kafka não queria que seus livros “O Castelo”, “O Processo” e “Amerika” fossem lançados. Antes de morrer, ele havia pedido que seu amigo queimasse os manuscritos. (Ainda bem que isso não aconteceu!)', '15 curiosidades que você não sabia sobre o mundo dos livros!', '1', 15),
(2, '2019-11-24 23:20:01', NULL, 'public/img/imgPost/20 curiosidades sobre livros que você ainda não sabe – Parte 2.png', 'Tudo o que você não sabia sobre o mundo da literatura.\r\n\r\n“Um leitor vive 100 vidas antes de morrer. Um homem que nunca lê vive apenas uma”. Essa é uma das frases mais famosas do livro de George R.R. Martin, “A Dança dos Dragões”, obra que faz bastante sucesso não só nos Estados Unidos mas também no Brasil.\r\n\r\nE, realmente, quem lê com frequência descobre uma série de benefícios importantíssimos e super valiosos: uma maior inteligência emocional e sensitiva, um maior poder cognitivo e de compreensão.  Sem contar que ler estimula a nossa memória, a nossa imaginação, une as pessoas e faz com que nós possamos viver em mundos diversos e conhecer histórias incríveis. Quem lê nunca se sente sozinho.\r\n\r\nSe você assim como a gente, é apaixonado pela leitura, com certeza vai ficar de boca aberta com a continuação das 20 curiosidades sobre o universo da literatura, veja só!\r\n\r\n11- Segundo a UNESCO, Agatha Christie é considerada a escritora mais traduzida mundialmente.\r\n\r\n12- Paulo Coelho é o autor brasileiro que mais vendeu livros no mundo. Cerca de 70 milhões de exemplares.\r\n\r\n13- J.K. Rowling, autora de “Harry Potter”, escreveu todos os livros da saga à mão.\r\n\r\n14- “Alice no País das Maravilhas” chegou a ser proibido de ser vendido na China por ter como personagens “animais que falavam”.\r\n\r\n15- Franz Kafka não queria que seus livros “O Castelo”, “O Processo” e “Amerika” fossem lançados. Antes de morrer, ele havia pedido que seu amigo queimasse os manuscritos. (Ainda bem que isso não aconteceu!)\r\n\r\n16- O cheiro dos livros agrada a tanta gente porque…   o papel dos livros é feito com polpa de madeira e possui uma grande quantidade de substâncias orgânicas. Quando estas reagem à luz, ao calor e à humildade, libertam compostos orgânicos voláteis, que se traduzem num aroma a baunilha, a amêndoa ou flores, evocando memórias positivas.\r\n\r\n17- Nos livros de Sherlock Holmes, o protagonista nunca chega a dizer a célebre frase “Elementar, meu caro Watson”.\r\n\r\n18- Todo o lucro de vendas do livro Peter Pan, de J. M. Barrie, reverteu a favor do Great Ormond Street Hospital for the Sick Children, em Londres.\r\n\r\n19- Se a Wikipedia fosse um livro, teria 1133500 páginas, o equivalente a 2267 volumes. Infelizmente, a edição tornar-se-ia desatualizada mal fosse impressa.\r\n\r\n20- A biblioterapia, desenvolvida com base numa investigação do psiquiatra Neil Frude, em 2003, concluiu que os livros têm potencial para se assumir como substitutos dos anti-depressivos.  Esta conclusão vai a par e passo com uma das citações de Nilza Rezende que adoramos: “Talvez a missão da literatura seja a mesma da psicanálise: salvar-nos dos nossos monstros”.\r\n\r\nFonte: Viseu', '20 curiosidades sobre livros que você ainda não sabe – Parte 2', '1', 15),
(3, '2019-11-24 23:21:32', NULL, 'public/img/imgPost/A importância dos sebos para a sociedade.png', 'O comércio de livros usados e o seu papel na disseminação da cultura.\r\nTodos nós sabemos – ou ao menos devíamos saber – que livros mudam vidas. Na última sexta-feira, 06 de outubro, o Estante Blog teve a oportunidade de acompanhar a Primavera de Literatura, que ocorreu no Centro Cultural da Light, no Rio de Janeiro. No evento aconteceram palestras sobre diversos temas de interesse de fãs de literatura, como o cenário atual dos quadrinhos no Brasil, os desafios de quem deseja se tornar um escritor e a vida dos donos de sebos.\r\n\r\nA origem dos sebos\r\nMuito antes das grandes livrarias invadirem o comércio brasileiro em meados da década de 1990, os sebos já eram parte importante da cultura nacional. A palavra sebo tem algumas origens – é provável que pelo menos um pouco de cada uma delas seja verdade. A primeira versão diz respeito ao uso da luz das velas para leitura, que antigamente eram feitas de gordura e de sebo. Conforme iam derretendo, acabam sujando os livros, deixando-os engordurados. A outra versão diz que os estudantes carregavam tanto os livros debaixo do braço que acabavam sujando-o, deixando ensebado. Origens à parte, Pernambuco foi o estado onde o primeiro livreiro utilizou o nome sebo, colocando-o escrito na porta de entrada de sua livraria, nos anos 50. No entanto, o comércio de livros usados apenas se tornou popular nos anos 60, em Recife, com o chamado Sebo Brandão. Estrangeiros que procuravam pela livraria acabavam chamando o local de Mr. Sebo, por pensarem que se tratava de um nome próprio – um fato que ajudou bastante a popularização da expressão.\r\n\r\nApesar de terem adquirido grande parte de sua popularidade na região Nordeste, os sebos chegaram a então capital, Rio de Janeiro, no século XIX. Mas a tendência de comercializar livros usados já era dominante na Europa, na qual a maior parte dos livreiros colocava à venda o seu próprio acervo, e o costume da troca de exemplares por outros também começou a crescer – principalmente quando alguém conseguia adquirir os títulos raros, polêmicos e censurados da época.\r\n\r\nDores e delícias de ser um livreiro no Brasil\r\nNa primeira palestra oferecida pelo Centro Cultural da Light, no Rio de Janeiro, o público ouviu os depoimentos de três livreiros cariocas: Maurício Gouveia, (Baratos da Ribeiro Livraria Ltda), Ivan Costa (Livreiro Errante) e Ronaldo Dias (Sábias Palavras Livros e Discos). Eles contaram um pouco de suas histórias de vida, do amor pelos livros e da trajetória pelo comércio de títulos usados.\r\n\r\nQuestionados sobre as dificuldades do livreiro dentro de um mercado tão competitivo e amplo, Maurício Gouveia apontou o comércio virtual como um desafio: “Para cidades pequenas é bom, nas cidades grandes é preciso encontrar o ponto de equilíbrio entre a margem de lucro e o capital de giro, além de ter que mudar o estoque com frequência e sempre oferecer novidades”, explicou. Neste contexto, o livreiro Ivan Costa, que apesar de manter uma parte de seu acervo na Estante Virtual, vende a maioria dos títulos andando pela cidade com sua bicicleta lotada de livros, mas aponta que existe preconceito: “Tem um pessoal que prefere o livro novo. E o livro que está na bicicleta e é usado acaba sendo sinônimo de sujo, de livro mal tratado”, refletiu Ivan.\r\n\r\nSegundo Maurício, dono da livraria Baratos da Ribeiro, atualmente a compra de livros nos sebos é uma questão cultural: “Antigamente existiam mais sebos do que livrarias tradicionais. Em Tokyo, um dos maiores centros urbanos do mundo, existe um bairro conhecido como O paraíso dos sebos, por ter 90 sebos em dois quarteirões”, contou. De acordo com ele, a febre do consumo – característica da contemporaneidade – é um dos grandes vilões dos livreiros. Em contrapartida, este mesmo consumo de massa trouxe uma nova tendência mundial que tem sido bastante vantajosa para os sebos: a valorização do Vintage, ou seja, objetos de outras épocas que ganharam um apelo comercial muito grande, no qual os comparadores consumem motivados pela nostalgia: “Aconteceu uma vingança do analógico, tem até um livro com esse nome. Objetos que iriam morrer, acabaram não morrendo”, ressaltou Maurício.\r\n\r\nA principal diferença entre o público que frequenta sebos e livrarias tradicionais é o comportamento, de acordo com o dono da livraria carioca Baratos da Ribeiro: “As grandes livrarias se tornaram ambientes voltados exclusivamente para consumo – viraram cafés, ambientes de socialização, os livros são um cenário. Nos sebos, até os próprios donos se permitem se comportar de uma forma mais excêntrica, o contato é maior”, apontou Maurício Gouveia.  Este contato próximo entre o leitor e o livreiro é a parte favorita da rotina de Ivan Dias, dono do sebo Livreiro Errante: “A diversidade das pessoas nas ruas é muita. É preciso bastante para chamar atenção com livros na bicicleta, mas eu prefiro vender pessoalmente e ter contato. Para mim, livraria é um clima, um ambiente e não venda”, refletiu.\r\n\r\nAinda sobre as dificuldades, Ronaldo Dias, dono do sebo Sábias Palavras, ressaltou uma característica muito presente nos dias de hoje – a facilidade. Segundo ele, a disseminação quase infinita de informações por meio da internet tornou muito mais difícil precificar os livros: “O mais difícil, para mim, é dar valor ao livro que você vende. A facilidade que a internet trouxe atrapalha muito”, explicou. O livreiro Maurício compartilha da mesma opinião: “Com a internet, a consulta e a competitividade entre preços aumentou. Hoje, um livreiro pode pesquisar sobre um livro e encontrar diversos preços para o mesmo exemplar. Isso dificulta as vendas”, completou.\r\n\r\nA leitura como fonte de radiação cultural\r\nNo entanto, apesar das dores de ser um dono de sebo no Brasil e atualmente, o prazer de trabalhar com o universo da literatura transcende qualquer dificuldade: “Trabalhar com sebos gera emprego, dá outras opções de compra ao público, educa sobre o reuso, além de ser produzir uma enorme radiação cultural“, afirmou Ivan. O livreiro do sebo Sábias Palavras, Ronaldo Dias, afirma que apesar das diferenças entre as grandes livrarias comerciais e os sebos, para os leitores apaixonados de verdade não existe distinção: “Leitor que é leitor de verdade vai aonde tem livro. Não importa onde”, contou. E, apesar do constante avanço da tecnologia, quem manterá acesa a luz dos livros físicos são exatamente os leitores vorazes: “O mal da tecnologia é que nada pode coexistir com ela, mas a relação, o sentimento das pessoas com os livros é que irá ditar o futuro“, assegurou o Livreiro Errante, Ivan Costa. Segundo ele e todos os livreiros presentes na Primavera de Literatura, o maior prazer existente no ofício é simples: levar o livro a quem está buscando. E, no final do dia, para os donos dos sebos isto é uma enorme alegria.\r\n\r\n\r\nThayane Maria\r\nRedatora em Estante Virtual\r\nThayane Maria, jornalista e cinéfila. Além de escrever para o Estante Blog, também mantém os seus blogs pessoais no Medium e no Wordpress: @Msmidnightlover e Missmidnightlover. Vive em eterna busca pelo excêntrico.', 'A importância dos sebos para a sociedade', '1', 15),
(4, '2019-11-24 23:22:50', NULL, 'public/img/imgPost/A novidade é antiga a volta das pequenas livrarias e editoras.jpg', 'As pequenas livrarias de bairro estão se fortalecendo, em especial, as que apostam em um acervo segmentado. Há por traz desse modo de gerir o negócio, a inteligência da curadoria\r\n\r\n\r\nLu Magalhães\r\n\r\n28/02/19 - 08h25\r\nO tempo não para e traz de volta alguns movimentos. A novidade, muitas vezes, é o antigo em uma nova roupagem para responder a desafios contemporâneos. Tenho pensado nisso a cada tendência que surge no mercado livreiro. Vejo que o volume de venda de livros tem caído, desde 2015, cerca de 3% ao ano no Brasil. Grandes redes enfrentam sérios desafios para honrar pagamentos às editoras; a Fnac, por exemplo, desistiu e saiu do Brasil ao vender a operação para a Livraria Cultura. Com a concorrência trazida pela Amazon, que atraiu mais e mais leitores para as compras online, a crise se agravou. Em verdadeiro efeito dominó, o impacto atingiu as editoras. Eis que, nesse cenário adverso, uma tendência se mostra promissora para o fomento de uma nova geração de leitores. É, ao mesmo tempo, uma forma retrô de encarar o negócio do livro.\r\n\r\nParece um contrassenso? Nada disso! Em conversa com Bruno Mendes, fundador do Coisa de Livreiro, falamos sobre a tendência de lidar com o livro como um produto individualizado. Explicando melhor… As pequenas livrarias de bairro estão se fortalecendo, em especial, as que apostam em um acervo segmentado – arte e literatura latino-americana, por exemplo. Há, por traz desse modo de gerir o negócio, a inteligência da curadoria. Além de empreendedor, esse livreiro é um curador de olhar apurado. Enquanto as grandes redes investem na ciência de dados para conhecer o cliente, tornando o ato da compra uma batalha de algoritmos, a pequena livraria tem um olhar mais humano para esse consumidor. Não estamos falando de nicho, mas de algo que vai além; é uma velha forma de imprimir um atendimento personalizado e profundamente pessoal.\r\n\r\nNos Estados Unidos essa tendência está se consolidando; lá, as pequenas livrarias crescem 15% em volume ao ano. Essa é uma boa notícia, embora não seja um crescimento de faturamento. Há um investimento em inteligência do negócio ao investir na experiência da compra a partir do profundo entendimento de quem é o público-alvo.O mesmo tem ocorrido com as editoras.\r\n\r\nDa força emotiva e do gosto pessoal do editor – que moveu a criação das primeiras editoras no país – temos, hoje, o leitor como centro da decisão. Antes de pensar nos títulos, procura-se saber quem é o leitor dessa determinada editora; o que esse leitor espera dela. Essa é uma bela mudança! Há alguns anos, os gestores de editoras associavam o cliente à grandes livrarias; hoje, o cliente é o leitor. Isso muda tudo! Abraça-se a ideia da criação de uma comunidade de leitores.\r\n\r\nA Primavera Editorial tem seguido nessa direção. Não por opção mercadológica, mas por vocação. Acredito fortemente no poder da informação para empoderar as mulheres; na disseminação de conhecimento inspirador. É nesse contexto que se insere a nossa missão de fortalecimento da emancipação social da mulher por meio da leitura. Acredito que a leitura gera conhecimento, provoca reflexões e modifica a posição intelectual, profissional e social. E fazer esse movimento apostando no ser local, pensando global é um sonho realizado! Brindo ao sucesso das pequenas editoras e livrarias. Ao ressurgimento de uma velha cultura livreira.', 'A novidade é antiga a volta das pequenas livrarias e editoras', '1', 15),
(5, '2019-11-24 23:23:53', NULL, 'public/img/imgPost/Conheça as livrarias mais incríveis do mundo.png', 'Conheça as livrarias mais incríveis do mundo\r\nSe você é um amante de livro não pode deixar de ler esse artigo, nele mostrarei as livrarias mas magníficas do mundo. Esses espaços que foram anteriormente construídas para serem igrejas e cinemas, foram transformadas em gigantescas livrarias e bibliotecas, com milhões de livros no acervo.\r\n\r\n1. Livraria Lello & Irmão, Portugal\r\nÉ sem dúvida uma das mais belas livrarias na Europa, possui um estilo neo-gótico e cada canto da livraria possui o mesmo aspecto desde que inaugurou em 1906. Foi o arquiteto Xavier Esteves quem a projetou, marcando-a como uma das obras mais representativas do Porto em Portugal. Na fachada existem tem três janelas originais onde duas figuras representam a Arte e a Ciência. No interior, uma enorme escada atinge o teto envidraçado, no estilo das escadarias dos filmes de Harry Potter.\r\n\r\nOutro detalhe singular e espetacular são os arcos apoiados em pilares onde tem escrito os nomes de famosos escritores portugueses, como, Antero de Quental, Eça de Queirós, Camilo Castelo Branco e Guerra Junqueiro.\r\n\r\n2. Livraria El Ateneo, Buenos Aires\r\nFundada em 1919 essa linda área de leitura foi anteriormente projetada para ser uma enorme sala de cinema. Vale a pena uma visita quando forem a Buenos Aires, pois ela fica localizada nas ruas mais movimentadas da cidade e apreciar este espaço vasto e silencioso não é sempre que se pode. Pintada pelo italiano Nazareno Orlandi, foi decorada com muitos ouros vermelhos. Nosso olhar se perde em sua imensidão e nos milhões de livros que a livraria comporta.\r\n\r\n3. Selexyz Dominicanen, Maastricht\r\nAtualmente é uma famosa livraria com cafetaria, sendo anteriormente construída para ser uma igreja. Para os amantes do café e da leitura, essa livraria ainda comporta, conferências, exposições, dentre outros. Os amantes da leitura consideram essa a melhor livraria do mundo. Suas paisagens são deslumbrantes e essa arquitetura tem nada mais nada menos do que 700 anos de idade, completamente conservadas.\r\n\r\nSomente em 20o6 que a Selexyz Dominicanen foi transformada em uma gigantesca livraria, quando os arquitetos Merkx e Girod ofereceram para os frequentadores uma arquitetura moderna de estruturas espaciais, não tirando suas características originais de quando era uma igreja. Um deleite para os amantes de livros.\r\n\r\n\r\n\r\nhttps://webtudo.net/conheca-as-livrarias-mais-incriveis-do-mundo/', 'Conheça as livrarias mais incríveis do mundo', '1', 15),
(6, '2019-11-24 23:24:50', NULL, 'public/img/imgPost/Crise de grandes redes abre espaço para pequenas livrarias.png', 'Venda de títulos cresce, e negócios que oferecem atendimento personalizado vivem bom momento.\r\n\r\nhttps://www1.folha.uol.com.br/mpme/2019/01/crise-de-grandes-redes-abre-espaco-para-pequenas-livrarias.shtml', 'Crise de grandes redes abre espaço para pequenas livrarias', '1', 15),
(7, '2019-11-24 23:25:51', NULL, 'public/img/imgPost/Na contramão de Saraiva e Cultura, essas livrarias não se abalaram.png', 'A Broadway Books, em Portland, estava prestes a fechar as portas, vítima da crise econômica americana. Até que o Twitter e a blogosfera surgiram em seu socorro, provando que as novas tecnologias podem, sim, resgatar velhos modelos de negócio\r\nPor John Brant, da INC.\r\nEm busca de histórias com clima de Natal, a mídia de Portland decidiu apostar na história emocionante que envolvia livros, blogs e burritos. Um artigo sobre a batalha quixotesca de Aaron para salvar a livraria da mãe foi publicado na edição on-line de um jornal semanal. Uma afiliada de uma rede de TV produziu uma matéria para o noticiário noturno. Enquanto isso, a neve cada vez mais alta impedia que os caminhões entregassem as encomendas da Amazon e de outras livrarias on-line. Dirigir era impossível, mas o Natal se aproximava e as pessoas precisavam comprar. Foi aí que caiu a ficha dos habitantes de Portland: por que não fazer a coisa certa e ir até a livraria do bairro?SAIBA MAIS\r\nEnquanto tudo isso acontecia, Aaron Durand, o autor da mágica, acompanhava o movimento de longe. \"Fiquei surpreso com a reação das pessoas\", diz. \"Achei que meus amigos leriam meu blog, e talvez uns poucos comprassem alguns livros. Jamais imaginei que minha mensagem atingiria tantas pessoas.\" Ao fechar as contas de dezembro, Roberta percebeu que o impossível havia acontecido: ela havia vendido 7% a mais do que no ano anterior. Mais do que isso: dezembro de 2008 ficaria para a história como o melhor mês de vendas da Broadway Books de todos os tempos. \"Ganhei o ano\", diz Roberta. \"Paguei todas as contas e ainda entrei no ano novo com folga para respirar.\"\r\n\r\nAgora, só faltava Aaron cumprir o acordo que havia feito com a blogosfera e pagar um número desconhecido de burritos para todo mundo que aparecesse no Cha Cha Cha, em Portland. No dia 16 de janeiro, uma equipe de televisão compareceu ao local para registrar o grande evento. Aaron e sua mãe pagaram 80 burritos e o restaurante preparou mais 40. O comparecimento foi pequeno, mas entusiástico: eram principalmente amigos de Aaron e de seus pais. A maioria dos convidados não fez questão de comer de graça, apenas participou da festa. E a equipe de TV conseguiu sua matéria comovente para o jornal da noite.\r\n\r\nTerminadas as férias, o filho de Roberta Dyer voltou para São Francisco, na Califórnia, e retomou seu trabalho na Birkenstock USA, em Novato. Em sua primeira manhã de volta, Aaron foi chamado ao escritório do presidente da empresa. \"Pensei que ele fosse me despedir, porque eu havia gasto tempo demais no projeto da Broadway Books quando deveria estar trabalhando\", diz Aaron. \"Em vez disso, ele me deu parabéns e disse que tinha ficado impressionado com a maneira criativa como usei as redes sociais. Depois, me deu um aumento e me promoveu para o departamento de marketing da companhia.\"\r\n\r\nUm mês depois da minha primeira visita, em fevereiro de 2009, retornei à Broadway Books. A livraria estava silenciosa. Um casal de meia-idade parou para fofocar e examinar os lançamentos, mas saiu sem comprar nada. \"É assim que são as manhãs\", disse-me Roberta. \"Os negócios melhoram à tarde e durante o fim de semana. Domingo é nosso dia mais movimentado.\" Depois de uma breve pausa, ela continuou: \"É claro que o que aconteceu em dezembro não salvou a livraria a longo prazo. A reação do público ao blog de Aaron foi uma coisa isolada, e só funcionou porque não foi forçada ou premeditada. Mas serviu para lembrar às pessoas a importância das lojas de bairro. Serviu para lembrar que o lugar onde você compra seus livros é importante. Por falar nisso, o que você está lendo?\". Infelizmente, tudo o que havia lido nos últimos meses era a seção de esportes do jornal, respondi. \"Venha comigo\", ela disse, com um brilho nos olhos. \"Acho que tenho uma coisinha aqui que você vai gostar.\"', 'Na contramão de Saraiva e Cultura, essas livrarias não se abalaram', '1', 15),
(8, '2019-11-24 23:26:52', NULL, 'public/img/imgPost/Sebos tradição que resiste ao mundo digital.png', 'RIO - Os livros são objetos transcendentes, mas podemos amá-los do amor táctil, escreveu um dia Caetano Veloso. É esse prazer de correr os dedos pelas prateleiras empoeiradas, driblando as traças, que talvez explique a sobrevivência de uma instituição secular na cidade: os sebos. Lugares como a Livraria São José, inaugurada há 73 anos, e que hoje funciona na Rua Primeiro de Março, no Centro, agonizam mas não morrem, oferecendo ao público o derradeiro contato físico com o livro num mundo que insiste em transformar as velhas livrarias em estantes digitais.\r\n\r\nNa região da Praça Tiradentes, o corredor dos sebos, livreiros tradicionais do Centro contam que, só no ano passado, nove entregaram os pontos. Nenhum novo abriu as portas por lá. Alguns migraram para o portal Estante Virtual, que reúne na web acervos de todo o Brasil. Os livros digitais e o comércio eletrônico são apontados como os vilões por quem vê as vendas minguando. Nessa batalha inglória, quem menos reclama são os comerciantes que apostam num novo tipo de loja, os “sebos limpinhos”, que tentam atrair e prender a clientela oferecendo um ambiente agradável, com outros atrativos, como já fazem as megastores. Sem perder a personalidade.\r\n\r\nA alternativa dos ‘sebos limpinhos’\r\n\r\nO Letra Viva, na Rua Luís de Camões, atrás da Praça Tiradentes, é atualmente uma ampla e charmosa livraria de usados — e também de vinis — decorada com peças e móveis antigos e que tem um bistrô na entrada. A loja tem quatro anos, e é filial de uma outra, com dez anos, na mesma rua e com aspecto tradicional, voltada para as publicações técnicas:\r\n\r\n— Há quatro anos, quando percebi a ameaça do livro digital e da Estante Virtual, concluí que tinha que fazer algo diferente. Resolvi apostar na mudança para atrair o público fiel e também o novo e não deixar que o Centro ficasse sem sebo, que é uma tradição — afirma o livreiro Luiz Barreto, dono da Letra Viva, que encontrou sua vocação, aos 17 anos, quando foi trabalhar como faxineiro na Editora Record.\r\n\r\nEle diz que o seu negócio, “a grife dos livros usados”, vai bem, mesmo praticando preços amigos e promoções permanentes com até 85% de desconto:\r\n\r\n— Mudei um pouco a visão do sebo mal iluminado, empoeirado e quente. Não é porque é usado que o livro tem que ser tratado de qualquer maneira. Eles merecem todo o carinho, como se estivessem na Livraria da Travessa.\r\n\r\nHá quem acredite em outros modelos. Sem café ou poltronas para relaxar, a Academia do Saber, que tem três lojas no Centro, sendo duas na Avenida Passos e uma na Rua da Constituição, abriga um mundo, com direito a livros empilhados, poeira e até uma gatinha, a Fifi. O acervo é o de uma biblioteca considerável — são 400 mil livros. Embora, assim como a maioria, tenha aderido ao Estante Virtual.\r\n\r\n— Para conseguir manter uma estrutura física tem que ter rotatividade grande. A média de preço do livro é de R$ 15. Aprendi que o segredo é você ter volume de material — afirma Ricardo Correia, sócio dos dois irmãos na Academia do Saber, e cujo pai era do mesmo ramo.\r\n\r\nEle dá a dimensão do baque sofrido:\r\n\r\n— Aqui é próximo do Instituto de Filosofia da UFRJ, e quando um professor passava “O Banquete”, de Platão, saía todo mundo correndo atrás dos sebos. Hoje eles saem correndo para a internet e baixam o texto. Mas não tem como lutar contra o progresso, tem que se adaptar. Três sebos em Belo Horizonte viraram uma loja de motopeças. Os sebos não vão acabar, mas vão diminuir.\r\n\r\nPara quem precisa encontrar alguma edição antiga, livros esgotados e preços camaradas, eles são uma mão na roda. Estudante de cinema, Gabriel Medeiros, de 22 anos, percorria na terça-feira o entorno da Praça Tiradentes atrás de dois títulos: “Viver para Contar”, de Gabriel García Márquez, e “A imagem-movimento”, de Gilles Deleuze. Achou o primeiro, por R$ 20:\r\n\r\n— Certos livros não têm edições novas. Por isso, vou aos sebos.\r\n\r\nApesar dos percalços, sebos antigos, como o São José, resistem e guardam em suas estantes preciosidades de encher os olhos. Nesses, os vendedores sabem o que você procura, não há computadores para consulta e o maior prazer está em garimpar. Reza a lenda que quanto mais ao fundo da loja você for, mais coisas interessantes você descobrirá.\r\n\r\nSão essas sensações que, aos 90 anos, o livreiro Alberto Abreu tenta preservar na Livraria Padrão, na Rua Miguel Couto. O ambiente é agradável, mas lá não se encontra além de livros e periódicos. Nas prateleiras, edições importadas e livros de filologia, filosofia e crítica literária, especialidades da loja de seu Alberto.\r\n\r\n— Gosto de vender o livro para a pessoa indicada — conta o livreiro, o mais antigo do Rio em atividade, que acha graça dos clientes que gostam de fuçar lotes recém-chegados.\r\n\r\nEm tratando-se delas, as mais valiosas e disputadas pelos livreiros e clientes, afirma seu Alberto, são as primeiras edições de autores como Machado de Assis, Carlos Drummond de Andrade e Manuel Bandeira, ou publicações com dedicatórias desses escritores. E uma tendência atual são as obras sobre a história do Rio. Alberto tem 75 anos de experiência com livros.\r\n\r\n— Me dá saudade, o Rio era outro. Sou anterior a essa coisa pavorosa que é a indústria automobilística, à Avenida Presidente Vargas e ao monstro chamado computador — diz o livreiro, que já desembarcou na Estante Virtual.\r\n\r\nNa Avenida Rio Branco, no subsolo do Edifício Marquês de Herval, a Livraria Berinjela faz um estilo antenado. O movimento parece constante, e aumenta na hora do almoço. Sobre o público, tem de tudo: da jovem com roupas moderninhas ao senhor aposentado que bate ponto em dias certos para conversar e, quem sabe, levar um livro. Há quem calcule dez, sebos e outros cerca de 25, a maioria no Centro. O Guia dos Sebos, de Antonio Carlos Secchin e editado pela Lexikon, listou há cinco anos 57 estabelecimentos do tipo na cidade.\r\n\r\n\r\n\r\nLudmilla de Lima\r\n10/11/2012 - 19:15 / Atualizado em 10/11/2012 - 19:17\r\nO GLOBO\r\nhttps://oglobo.globo.com/rio/sebos-tradicao-que-resiste-ao-mundo-digital-6694811', 'Sebos tradição que resiste ao mundo digital', '1', 15),
(9, '2019-11-24 23:27:22', NULL, 'public/img/imgPost/imgPadrao/padrao.jpg', 'A Broadway Books, em Portland, estava prestes a fechar as portas, vítima da crise econômica americana. Até que o Twitter e a blogosfera surgiram em seu socorro, provando que as novas tecnologias podem, sim, resgatar velhos modelos de negócio\r\nPor John Brant, da INC.\r\nEm busca de histórias com clima de Natal, a mídia de Portland decidiu apostar na história emocionante que envolvia livros, blogs e burritos. Um artigo sobre a batalha quixotesca de Aaron para salvar a livraria da mãe foi publicado na edição on-line de um jornal semanal. Uma afiliada de uma rede de TV produziu uma matéria para o noticiário noturno. Enquanto isso, a neve cada vez mais alta impedia que os caminhões entregassem as encomendas da Amazon e de outras livrarias on-line. Dirigir era impossível, mas o Natal se aproximava e as pessoas precisavam comprar. Foi aí que caiu a ficha dos habitantes de Portland: por que não fazer a coisa certa e ir até a livraria do bairro?SAIBA MAIS\r\nEnquanto tudo isso acontecia, Aaron Durand, o autor da mágica, acompanhava o movimento de longe. \"Fiquei surpreso com a reação das pessoas\", diz. \"Achei que meus amigos leriam meu blog, e talvez uns poucos comprassem alguns livros. Jamais imaginei que minha mensagem atingiria tantas pessoas.\" Ao fechar as contas de dezembro, Roberta percebeu que o impossível havia acontecido: ela havia vendido 7% a mais do que no ano anterior. Mais do que isso: dezembro de 2008 ficaria para a história como o melhor mês de vendas da Broadway Books de todos os tempos. \"Ganhei o ano\", diz Roberta. \"Paguei todas as contas e ainda entrei no ano novo com folga para respirar.\"\r\n\r\nAgora, só faltava Aaron cumprir o acordo que havia feito com a blogosfera e pagar um número desconhecido de burritos para todo mundo que aparecesse no Cha Cha Cha, em Portland. No dia 16 de janeiro, uma equipe de televisão compareceu ao local para registrar o grande evento. Aaron e sua mãe pagaram 80 burritos e o restaurante preparou mais 40. O comparecimento foi pequeno, mas entusiástico: eram principalmente amigos de Aaron e de seus pais. A maioria dos convidados não fez questão de comer de graça, apenas participou da festa. E a equipe de TV conseguiu sua matéria comovente para o jornal da noite.\r\n\r\nTerminadas as férias, o filho de Roberta Dyer voltou para São Francisco, na Califórnia, e retomou seu trabalho na Birkenstock USA, em Novato. Em sua primeira manhã de volta, Aaron foi chamado ao escritório do presidente da empresa. \"Pensei que ele fosse me despedir, porque eu havia gasto tempo demais no projeto da Broadway Books quando deveria estar trabalhando\", diz Aaron. \"Em vez disso, ele me deu parabéns e disse que tinha ficado impressionado com a maneira criativa como usei as redes sociais. Depois, me deu um aumento e me promoveu para o departamento de marketing da companhia.\"\r\n\r\nUm mês depois da minha primeira visita, em fevereiro de 2009, retornei à Broadway Books. A livraria estava silenciosa. Um casal de meia-idade parou para fofocar e examinar os lançamentos, mas saiu sem comprar nada. \"É assim que são as manhãs\", disse-me Roberta. \"Os negócios melhoram à tarde e durante o fim de semana. Domingo é nosso dia mais movimentado.\" Depois de uma breve pausa, ela continuou: \"É claro que o que aconteceu em dezembro não salvou a livraria a longo prazo. A reação do público ao blog de Aaron foi uma coisa isolada, e só funcionou porque não foi forçada ou premeditada. Mas serviu para lembrar às pessoas a importância das lojas de bairro. Serviu para lembrar que o lugar onde você compra seus livros é importante. Por falar nisso, o que você está lendo?\". Infelizmente, tudo o que havia lido nos últimos meses era a seção de esportes do jornal, respondi. \"Venha comigo\", ela disse, com um brilho nos olhos. \"Acho que tenho uma coisinha aqui que você vai gostar.\"', 'Pequena livraria sai da crise com ajuda da internet', '1', 15),
(10, '2019-11-25 00:39:37', NULL, 'public/img/imgPost/239143-saga-harry-potter-ganhara-mais-dois-li-diapo-1.jpg', 'O ano de 2017 é bastante especial para os fãs da saga \"Harry Potter\" pelo fato da série de livros estar completando 20 anos. Tenso, né? Parece até que foi ontem. Além dos vários eventos comemorativos que estão acontecendo pelo mundo, a editora Bloomsbury resolveu publicar mais duas obras inspiradas nas histórias de J. K. Rowling. Mas calma! Não será nada como \"Harry Potter e a Criança Amaldiçoada\".\r\n\r\nUm dos livros se chamará \"Harry Potter: A History of Magic\", que em tradução livre fica algo como a \"Uma História de Magia\", que terá rascunhos originais de J.K., dissertações e estudos de peças da exposição escritos pelos autores Anna Pavord, Lucy Mangan, Major Tim Peake e Steve Backshall. Ao que tudo indica, o outro volume receberá o título de \"Harry Potter – A Journey Through A History of Magic\", algo como \"Uma Jornada Através da História de Magia\" e será uma espécie de guia da história magia ensinada na escola de Hogwarts. Vale ressaltar que nenhum dos dois será assinado por Rowling.\r\n\r\nE aí, o que vocês acharam da novidade? Na época do \"Criança Amaldiçoada\", apesar de muitos fãs terem curtido a proposta, uma galera não gostou. De qualquer forma, quando é sobre \"Harry Potter\" a gente sempre acaba gostando.', 'Saga \"Harry Potter\" ganhará mais dois livros em comemoração aos 20 anos da franquia!', '1', 35),
(11, '2019-11-27 19:50:39', NULL, 'public/img/imgPost/imgPadrao/padrao.jpg', 'Olá mundo', 'Hello world', '1', 96);

-- --------------------------------------------------------

--
-- Estrutura para tabela `sebo`
--

CREATE TABLE `sebo` (
  `id_usuario` int(11) NOT NULL,
  `razao_sebo` varchar(100) DEFAULT NULL,
  `nome_fantasia` varchar(100) DEFAULT NULL,
  `cnpj_sebo` varchar(30) DEFAULT NULL,
  `cidade_sebo` varchar(45) DEFAULT NULL,
  `num_end_sebo` varchar(30) DEFAULT NULL,
  `compl_end_sebo` varchar(100) DEFAULT NULL,
  `logradouro_sebo` varchar(100) DEFAULT NULL,
  `cep_end_sebo` varchar(30) DEFAULT NULL,
  `num_tel_sebo` varchar(30) DEFAULT NULL,
  `celular_1_sebo` varchar(50) DEFAULT NULL,
  `celular_2_sebo` varchar(30) DEFAULT NULL,
  `insc_estadual_sebo` varchar(100) DEFAULT NULL,
  `url_site_sebo` varchar(100) DEFAULT NULL,
  `cod_status_sebo` varchar(10) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `sebo`
--

INSERT INTO `sebo` (`id_usuario`, `razao_sebo`, `nome_fantasia`, `cnpj_sebo`, `cidade_sebo`, `num_end_sebo`, `compl_end_sebo`, `logradouro_sebo`, `cep_end_sebo`, `num_tel_sebo`, `celular_1_sebo`, `celular_2_sebo`, `insc_estadual_sebo`, `url_site_sebo`, `cod_status_sebo`) VALUES
(11, '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(35, '', 'Rei dos Piratas', '22.436.753/0001-87', 'Adamantina', '231', 'Inicio da Rua', 'AL', '17800-000', '(11) 4005-6844', '(55) 09874-5615', '(55) 46587-7983', '', 'https://www.google.com/?gws_rd=ssl', '1'),
(82, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '', '1'),
(83, '', 'Sebo do Marcão', '76.085.753/0001-09', 'Barueri', '111 ', 'R. Min. Rafael de Barros Monteiro, 111 - Vila Boa Vista', 'R', '06410-080', '(11) 4198-6832', '', '', '', '', '1'),
(84, '', 'Livraria e Sebo Marinho', '68.486.641/0001-31', 'Carapicuíba', '115 ', '', 'AL', '06343-410', '(11) 4386-7762', '', '', '', '', '1'),
(85, '', 'Sebo 1977', '64.244.807/0001-52', 'Carapicuíba', '501', '', 'AL', '06365-600', '', '(11) 97622-1142', '', '', '', '1'),
(86, '', 'Sebo do Ferreira', '81.988.868/0001-43', 'Barueri', '225 ', '', 'AL', '06415-000', '(11) 2506-4384', '', '', '', '', '1'),
(87, '', 'Sebo Nascimento', '68.422.219/0001-12', 'Barueri', '100', '', 'AL', '06149-110', '(11) 2569-7955', '', '', '', '', '1'),
(88, '', 'Livraria Sebo Renovo', '25.247.804/0001-10', 'Carapicuíba', '246 ', '', 'AL', '06331-110', '', '(11) 95338-3604', '', '', '', '1'),
(96, '', 'Smith', '36.937.738/0001-27', 'Adolfo', '468', 'Inicio', 'EST', '15230-000', '', '', '', '', 'www.google.com', '1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `sebo_livro`
--

CREATE TABLE `sebo_livro` (
  `id_usuario` int(11) NOT NULL,
  `isbn_livro` varchar(100) NOT NULL,
  `qtd_estoque` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `sebo_livro`
--

INSERT INTO `sebo_livro` (`id_usuario`, `isbn_livro`, `qtd_estoque`) VALUES
(35, '8532531318', 2),
(35, '8575421131', 1),
(35, '9788535928204', 5),
(35, '9788581863351', 1),
(83, '8579800242', 2),
(83, '8580413532', 1),
(83, '9788535927085', 1),
(83, '9788544001400', 2),
(83, '9788599296363', 1),
(84, '8575421131', 1),
(84, '8580418216', 1),
(84, '9788560280940', 2),
(84, '9788581863351', 1),
(85, '853253080', 1),
(85, '9788516079444', 3),
(85, '9788563560421', 2),
(86, '9780486421230', 1),
(86, '9788544001868', 1),
(86, '9788573264241', 2),
(86, '9788580573749', 2),
(87, '9788543104355', 1),
(87, '9788579305399', 2),
(87, '9788582850404', 2),
(87, '9788584390670', 1),
(88, '8530979524', 2),
(88, '8532511015', 3),
(88, '8534800669', 1),
(88, '9788521206262', 2),
(96, '8532530796', 6);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(50) DEFAULT NULL,
  `sobrenome_usuario` varchar(50) DEFAULT NULL,
  `email_usuario` varchar(100) DEFAULT NULL,
  `senha_usuario` varchar(255) DEFAULT NULL,
  `cod_status_usuario` varchar(10) DEFAULT '1',
  `id_perfil` int(11) DEFAULT NULL,
  `data_criacao` datetime NOT NULL,
  `url_foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome_usuario`, `sobrenome_usuario`, `email_usuario`, `senha_usuario`, `cod_status_usuario`, `id_perfil`, `data_criacao`, `url_foto`) VALUES
(1, 'Ruan', 'Costa de Oliveira', 'ruanc_oliveira@hotmail.com', '$2y$08$4chmBEvSw1/8MvLRtmi4teQimTgZvFWHdbN/FCsYNjRYZBt8Rvbwy', '1', 1, '2019-09-18 00:00:00', 'public/img/imgPerfil/download.jpg'),
(2, 'Diva', 'da Cruz', 'rm35615@estudante.fieb.edu.br', '$2y$08$4chmBEvSw1/8MvLRtmi4teQimTgZvFWHdbN/FCsYNjRYZBt8Rvbwy', '1', 1, '2019-09-18 00:00:00', ''),
(3, 'Gabriel Max', 'Maia do Carmo', 'rm35880@estudante.fieb.edu.br', '$2y$08$4chmBEvSw1/8MvLRtmi4teQimTgZvFWHdbN/FCsYNjRYZBt8Rvbwy', '1', 1, '2019-09-18 00:00:00', NULL),
(5, 'Marcos', 'Santos Carvalho', 'marcos_sco@outlook.com', '$2a$08$MTI3NjAzOTE5NWRjZWFmMuOSKwqe.ee5LzTYjjfDNhV2d4Z1gJOsu', '1', 1, '2019-09-18 00:00:00', 'public/img/imgPerfil/travis.png'),
(6, 'Joyce Victoria', 'Leite Oquendo', 'rm35881@estudante.fieb.edu.br', '$2y$08$4chmBEvSw1/8MvLRtmi4teQimTgZvFWHdbN/FCsYNjRYZBt8Rvbwy', '1', 2, '2019-09-18 00:00:00', NULL),
(7, 'Daniele Maria', 'França', 'rm36113@estudante.fieb.edu.br', '$2y$08$4chmBEvSw1/8MvLRtmi4teQimTgZvFWHdbN/FCsYNjRYZBt8Rvbwy', '1', 3, '2019-09-18 00:00:00', NULL),
(8, 'Jennifer', 'Keity Guimarães', 'rm36139@estudante.fieb.edu.br', '$2y$08$4chmBEvSw1/8MvLRtmi4teQimTgZvFWHdbN/FCsYNjRYZBt8Rvbwy', '1', 3, '2019-09-18 00:00:00', NULL),
(9, 'Suelane', 'Garcia Fontes', 'suelane.fontes@docente.fieb.edu.br', '$2y$08$4chmBEvSw1/8MvLRtmi4teQimTgZvFWHdbN/FCsYNjRYZBt8Rvbwy', '1', 4, '2019-09-18 00:00:00', 'public/img/imgPerfil/ZeroEscape_3.jpg'),
(10, 'Giovani', 'Barbosa Wingter', 'giovani.wingter@docente.fieb.edu.br', '$2y$08$4chmBEvSw1/8MvLRtmi4teQimTgZvFWHdbN/FCsYNjRYZBt8Rvbwy', '1', 4, '2019-09-18 00:00:00', 'public/img/imgPerfil/Zero_(999).png'),
(11, 'Abigail', 'Queiroz Moreira Pereira', 'sebodomarcao@uol.com.br', '$2y$08$4chmBEvSw1/8MvLRtmi4teQimTgZvFWHdbN/FCsYNjRYZBt8Rvbwy', '1', 5, '2019-09-18 00:00:00', 'public/img/imgPerfilSebo/BadGirl.jpg'),
(12, 'Mirian', 'Marinho da Silva Lima', 'sebosantafe@hotmail.com', '$2y$08$4chmBEvSw1/8MvLRtmi4teQimTgZvFWHdbN/FCsYNjRYZBt8Rvbwy', '1', 5, '2019-09-18 00:00:00', NULL),
(13, 'Denis', 'Monteiro Guimaraes', 'denis.guimaraes@docente.fieb.edu.br', '$2y$08$4chmBEvSw1/8MvLRtmi4teQimTgZvFWHdbN/FCsYNjRYZBt8Rvbwy', '1', 4, '2019-09-18 00:00:00', NULL),
(14, 'Priscilla', 'Nobre Lobo', 'globalnetconsultoria@globo.com', '$2y$08$4chmBEvSw1/8MvLRtmi4teQimTgZvFWHdbN/FCsYNjRYZBt8Rvbwy', '1', 5, '2019-09-18 00:00:00', NULL),
(15, 'Master', 'of wizards', 'master@outlook.com', '$2a$08$MTQzMDQ3OTk3NWRkMDZiMOZl.h.mItUEpka8Po6tUsQ/K813wWItK', '1', 1, '2019-10-09 21:02:53', 'public/img/imgPerfil/Np9TNuLP_400x400.jpg'),
(16, 'Admin 1', 'adm', 'adm1@outlook.com', '$2y$08$4chmBEvSw1/8MvLRtmi4teQimTgZvFWHdbN/FCsYNjRYZBt8Rvbwy', '1', 2, '2019-10-09 21:03:42', NULL),
(17, 'Admin 2', 'adm ', 'adm2@outlook.com', '$2y$08$4chmBEvSw1/8MvLRtmi4teQimTgZvFWHdbN/FCsYNjRYZBt8Rvbwy', '1', 3, '2019-10-09 21:04:14', NULL),
(18, 'Usuario', 'Cliente', 'cliente@outlook.com', '$2y$08$4chmBEvSw1/8MvLRtmi4teQimTgZvFWHdbN/FCsYNjRYZBt8Rvbwy', '1', 4, '2019-10-09 21:07:01', NULL),
(19, 'Sebo', 'usuario', 'sebo@outlook.com', '$2y$08$4chmBEvSw1/8MvLRtmi4teQimTgZvFWHdbN/FCsYNjRYZBt8Rvbwy', '1', 5, '2019-10-09 21:07:27', NULL),
(26, 'Giorno', 'Giovana', 'stand@outlook.com', '$2y$08$5nGdB4I7yBlWv2.8n9MrWOPCVorkFQ4iMrN.2J.VfVL1sagCMhlnu', '1', 4, '2019-10-11 00:44:10', NULL),
(27, 'Viewtiful ', 'Joe', 'sixMachine@outlook.com', '$2a$08$NjMzNjExMjAyNWRhMjI4NOM8NjRbDElnWbDL0akjvLVnRCjQ.rr8K', '1', 5, '2019-10-12 16:24:05', NULL),
(29, 'teste', 'dsad', 'tes@outlook.com', '$2a$08$NDQ1MDQxMDk0NWRhMjQyM.TKV/JqfDZ2kebp4i5v1lOIPQl3jwb8C', '1', 4, '2019-10-12 18:13:40', NULL),
(34, 'Giorno', 'adm', 'gansd@outlook.com', '$2a$08$ODM1OTQwMzA2NWRhMjY2ZOwzpYYg.3K8eA9jZ1Fs8ZyQtICEg9/xG', '1', 5, '2019-10-12 20:51:08', NULL),
(35, 'Luffy', 'Mokey D.', 'luffy@outlook.com', '$2a$08$MTUxODIzNzQxNjVkYTI4YuU9atiqVfNVpSJd/jOjOHVSKPep7VaCO', '1', 5, '2019-10-12 23:13:39', 'public/img/imgPerfilSebo/luffy.jpg'),
(36, 'Giorno', 'adm', 'gansd@outlook.com', '$2a$08$MzQ4OTMyMTA2NWRhMjkzM.ZGzBU38O/OEUz4PfisxN.wnt2YPt8Yi', '1', 5, '2019-10-12 23:59:18', NULL),
(37, 'Sonic', 'the headhog', 'sonic@outlook.com', '$2a$08$MTU2NjEwNDA5MjVkYTNkYuUazvVaSHQMYS.oLcepyoVE2Xq9HO2..', '1', 4, '2019-10-13 23:23:40', 'public/img/imgPerfil/sonic.png'),
(40, 'htfh', 'hgfh', 'luffyss@outlook.com', '$2a$08$Njg4NTczMTE1NWRiM2QxNOq/YkSoWfJRG87mdstZYr/FqeD0.BJay', '1', 5, '2019-10-26 01:53:44', NULL),
(41, 'Giorno', 'Giovana', 'standos@outlook.com', '$2a$08$ODI0NjI5MjM3NWRiNGYxO.xJmWDsqxGXJk1ueFvVYLhLvYKOY6NPK', '1', 4, '2019-10-26 22:23:23', NULL),
(42, 'Giorno', 'Giovana', 'standosd@outlook.com', '$2a$08$MTc0OTQyNDY5NDVkYjRmMOYHwkM80haZE8DltQg3b4Yc5NecosoPC', '1', 4, '2019-10-26 22:24:36', NULL),
(43, 'teste', 'sdad', 'gan@outlook.com', '$2a$08$OTQ0NjgxMjQyNWRiNTBhZOPhQMjBPC8hbwLrS4riZKpGZtZgWO1qi', '1', 4, '2019-10-27 00:11:36', NULL),
(44, 'Edward ', 'Elric', 'alquimista@outlook.com', '$2a$08$MTc4NjcwMTcyODVkYjYwYuHxj4Jud4SZqYftf86JacQj0wbk268FO', '1', 4, '2019-10-27 18:31:40', NULL),
(51, 'JZ', 'Cantor', 'jz.cantor@outlook.com', '$2a$08$MTI1Mzk3MTg2ODVkY2NhYOXkN2/LEYfHjnvMKtVSOg8Hf6mryHjhu', '1', 4, '2019-11-13 22:15:21', 'public/icon/user.svg'),
(52, 'Jay', 'Z', 'jz@outlook.com', '$2a$08$NDMyOTA1NjI4NWRjY2IxZ.T4svDgyk65TrCsJlwpEHmZV47qVL6Ge', '1', 4, '2019-11-13 22:44:10', ''),
(53, 'asfsa', 'sadsa', 'fernando@email.com', '$2a$08$MTg5OTU5MDg5ODVkY2NiMe7OK73REYgh2v4uxiKBl5kEssnGRL.1u', '0', 4, '2019-11-13 22:47:57', 'public/icon/user.svg'),
(54, 'Giovani', 'Carmo', 'gc@outlook.com', '$2a$08$ODMzNDUxMTM1NWRjZGUzNONGyPvlMjQCiZbMbjdGfiRyfnn0FSFGK', '1', 4, '2019-11-14 20:29:20', 'public/icon/user.svg'),
(55, 'Gabriel', 'Adriano', 'gabriel.work2@gmail.com', '$2a$08$MzQ2OTIwODI4NWRjZTAxYOtlcvuvdQHGTsGVUzQ2EA3QTwmHVs3zG', '1', 4, '2019-11-14 22:38:44', 'public/img/imgPerfil/404_morte.jpg'),
(56, 'Mara', 'Maravilha', 'marinha@gmail.com', '$2a$08$MTU1OTU5OTc3OTVkY2ViZ.QtaSj6Hrp8QfcYmKZI1oNnaxo54oK5O', '1', 4, '2019-11-15 11:58:22', 'public/icon/user.svg'),
(57, 'Marcos', 'Alessandro', 'ma@email.com', '$2a$08$MTM4NzQ1MTQ1ZGNmNThlOOJ/8jJu/askCiFtemg9RcMVGbs1y/7ly', '1', 4, '2019-11-15 23:03:21', 'public/icon/user.svg'),
(58, 'Yusuke', 'Urameshi', 'yusuke@outlook.com', '$2a$08$MTY3MzQxMzYwMTVkY2Y3MerJYKQIMXRveb0ZFDYM1pO8Uc4B6w.gK', '1', 4, '2019-11-16 00:15:03', 'public/img/imgPerfil/images.jpg'),
(60, 'Jotaro', 'Kujo', 'jotaro@outlook.com', '$2a$08$MTMyMTM2NzYxNTVkY2Y3Z.nwQ4xT1ytnF7YU1QQc1GpizbPzJ.rp2', '1', 4, '2019-11-16 01:39:19', 'public/img/imgPerfil/images (1).jpg'),
(61, 'Zoro', 'Roronoa', 'zoro@outlook.com', '$2a$08$MjA2NzQ1NDEzMjVkZDAxMOKJuviPzsa9ZAhIFzTT0l8jaYX7ENvM6', '1', 4, '2019-11-16 12:11:06', 'public/img/imgPerfil/IMG_0186.JPG'),
(62, 'Zero', '999', 'zero@outlook.com', '$2a$08$MTAzMTI0MjU4ODVkZDA1Z.b7.ooUh6/tStlDQs4/cCpK97DrgOtke', '1', 5, '2019-11-16 17:36:48', 'public/img/imgPerfilSebo/Zero_(999).png'),
(63, 'Phi', 'zero', 'phi@outlook.com', '$2a$08$ODE5MzY1NjExNWRkNWVmZeWcQY6.H6lZ5xvhU6RMXcoxLAUzzEKna', '1', 4, '2019-11-20 22:59:30', 'public/icon/user.svg'),
(64, 'Diva', 'Cruz', 'mail.diva.cruz@gmail.com', '$2a$08$Njc1NjU1NTI0NWRkNmY4MexjV925XD22pF2S6RqWckUXes3.9Cs8u', '1', 4, '2019-11-21 17:48:44', 'public/icon/user.svg'),
(65, 'Abcd', 'Fgh', 'abcd@gmail.com', '$2a$08$MTI4NDcwNTUwOTVkZDcwMO8dsE/bdX/m5WBy/sr6yYO9OuekOuxc6', '1', 4, '2019-11-21 18:27:00', 'public/icon/user.svg'),
(66, 'Teste', '1', 'teste1@gmail.com', '$2a$08$OTU5MDc5NTY1NWRkNzM0M.4G1qqVo7ZXAtyK/7iz1Sglld/XS6SYy', '1', 4, '2019-11-21 22:04:11', 'public/icon/user.svg'),
(67, 'Master II', 'nivel 2', 'master2@outlook.com', '$2a$08$MTM2NDczMDE3ODVkZDk4MOAKtClF1yv6OS37yfDkDb2g.4lAxeP.i', '1', 2, '2019-11-22 21:13:58', 'public/img/imgPerfil/skullKid.png'),
(68, 'Master III', 'nivel 3', 'master3@outlook.com', '$2a$08$MTQxMTQ1MTI3MTVkZDg4MutdMBvhoLLQ3iPSwsuqpZdI576GMnnOG', '1', 3, '2019-11-22 21:14:50', 'public/img/imgPerfil/tenor.gif'),
(69, 'Suelane', 'Garcia ', 'suelane@uol.com.br', '$2a$08$NzM1NjgzNTEzNWRkOTQ0NeMGJFk.fsRPdcTI0TE9enxvzV/od8Cq6', '1', 4, '2019-11-23 11:38:29', 'public/icon/user.svg'),
(70, 'Suely ', 'Garcia', 'suelanegarcia@Gmail.com', '$2a$08$MzMzMzQ1MTAxNWRkOTQ2MOjHaFgpq/1Tuoltl0IaeCrS0jUBsdS8.', '1', 4, '2019-11-23 11:45:39', 'public/icon/user.svg'),
(71, 'Fulano', 'de Tal', 'fulano@gmail.com', '$2a$08$NjQ4ODM5MDE5NWRkOWE0MerJ3Sh0Z8IJPdVKx7Q/k6Y0e5/3Zmyle', '1', 4, '2019-11-23 18:27:11', 'public/icon/user.svg'),
(72, 'guiguibas', 'neto', 'teste@gmail.com', '$2a$08$NTc3ODg0NjcyNWRkYzEwNOkAdUbdWIhzF8mNP5zbi/1l.59DXtBBK', '1', 4, '2019-11-25 14:33:08', 'public/icon/user.svg'),
(73, 'lucas', 'santana', 'luccaempreendedor01@gmail.com', '$2a$08$MTg5OTYwMjIwODVkZGM3NO0fdMbXskXFcPfy5F2XSDyO1V3mTSOVi', '0', 4, '2019-11-25 21:45:07', 'public/icon/user.svg'),
(74, 'Samara', 'Regina', 'samaralima74320517@gmail.com', '$2a$08$MjA1NzY2OTcwNzVkZGM4Yu/dXI7aqwY1w0AGAVsx9zjpXG4She5d6', '0', 4, '2019-11-25 23:24:13', 'public/img/imgPerfil/IMG-20191126-WA0000.jpg'),
(75, 'Samara', 'Regina', 'Samara-siqueira@gmail.com', '$2a$08$Mjk3MjAyMzg5NWRkYzhjZOOl73TRBgtZSzkpvWzlgpW81imfgiLTC', '0', 4, '2019-11-25 23:24:46', 'public/img/imgPerfil/IMG-20191125-WA0092.jpg'),
(76, 'elton', 'silva', 'elton170689@gmail.com', '$2a$08$NzgxMjc0MzI2NWRkZDI0Nu3a73QoGaFJrDyBLgrT3NywDdlcIuGTi', '0', 4, '2019-11-26 10:11:25', 'public/icon/user.svg'),
(77, 'Sebo do', 'Messias', 'sebodomessias@email.com', '$2a$08$NjM3NDQ1MTU0NWRkZGJiZOqvOhPkx862b5DtE5fr8LADp.Qoj7s3C', '0', 4, '2019-11-26 20:57:27', 'public/icon/user.svg'),
(78, 'Messias', 'Sebo', 'messias@email.com', '$2a$08$MzMxODg3NjE1ZGRkYmQyYePkOf/Kdj.Z4/Y0pAVeml60Aznrdijm.', '0', 4, '2019-11-26 21:02:51', 'public/icon/user.svg'),
(79, 'Sebo', 'Sebo', 'sebo@email.com', '$2a$08$OTUyOTAzNDgwNWRkZGJkYuGHBNd3wnIoEWF4d55ISVNiwG3OVQXQC', '0', 4, '2019-11-26 21:05:27', 'public/icon/user.svg'),
(80, 'Matias', 'Sebo', 'matias@email.com', '$2a$08$MTg1Njg1NjkyMTVkZGRiZO2SU8Qdxb47wHNwgaUQB0NUU160mygHC', '0', 4, '2019-11-26 21:08:13', 'public/icon/user.svg'),
(81, 'Marcos', 'Antonio Da Silva ', 'marcos@gmail.com', '$2a$08$MjAyNzc4MTY4ODVkZGRiZOrAMGoLHvYbSXqYWDjiDvIgI9z292ZbW', '0', 4, '2019-11-26 21:09:45', 'public/icon/user.svg'),
(82, 'Messias', 'Sebo', 'messiasebo@email.com', '$2a$08$MTEwODk0NDgxMjVkZGRjM.VhjIZOG4ksHu5lr/8LD.Fxc1Ckxez5K', '0', 5, '2019-11-26 21:15:49', 'public/icon/user.svg'),
(83, 'Marcos', 'Pinheiro da Silva', 'Marcospinheiro@gmail.com', '$2a$08$MTc2NTU3NzIyOTVkZGRjYOrtLVe/rKa5iVb2Bwp0ujCEKMeBpwHYG', '1', 5, '2019-11-26 21:58:37', 'public/img/imgPerfilSebo/Sebo.jpg'),
(84, 'Marinho', 'Silva Mendes', 'marinhosilva@gmail.com', '$2a$08$NjIxNDQ5NjM1NWRkZGNjYunI6JTqKiOb5ExL.Lbgt9SnEPNP/t2ZW', '1', 5, '2019-11-26 22:09:27', 'public/img/imgPerfilSebo/download.jpg'),
(85, 'Paulo', 'Antonio de Oliveira', 'pauloantonio@gmail.com', '$2a$08$MTg4NTY5NDM5MDVkZGRjZOH3DQg1tqIo.fP6033XigQt9ax8NWhC6', '1', 5, '2019-11-26 22:15:54', 'public/img/imgPerfilSebo/2.png'),
(86, 'Alexandre', 'Ferreira Gonçalves', 'alexandre@gmail.com', '$2a$08$Mzk4ODYzOTU0NWRkZGQwOOR77u5oVKEK.7DOjb6XXru4pwsVvmbBq', '1', 5, '2019-11-26 22:25:51', 'public/img/imgPerfilSebo/1.png'),
(87, 'Benedito', 'Antonio Nascimento', 'beneditonascimento@gmail.com', '$2a$08$NDMxMzk1NjY4NWRkZGQyNeOxjVaXrSfJzIClcczBgXvosP9X8c1tC', '1', 5, '2019-11-26 22:33:27', 'public/img/imgPerfilSebo/1.jpg'),
(88, 'Patricia ', 'Pereira Pontes', 'patriciapereira@gmail.com', '$2a$08$MTQ2MDMwMTAzMzVkZGU2MuIyYa1J1ejjqSi8tLToHG1q09fM9u2R.', '1', 5, '2019-11-27 08:52:18', 'public/img/imgPerfilSebo/images.jpg'),
(89, 'Leonardo', 'de Sousa', 'leonardodesousa@gmail.com', '$2a$08$MTg3OTkzMzg0ODVkZGU5M.Z9r6.7jTVymoYp4gSCI7eMYo5a3KX1G', '1', 4, '2019-11-27 12:03:48', 'public/img/imgPerfil/eu.jpg'),
(90, 'Diva10', 'Souza', 'diva10@gmail.con', '$2a$08$Nzk1MDcyNDM1ZGRlOTA1ZON6jJ3M2KcgB//IQLVPqNRzuXqg1X9qq', '1', 4, '2019-11-27 12:03:58', 'public/icon/user.svg'),
(91, 'Maria', ' Pereira', 'mariap@gmail.com', '$2a$08$MTUzMDQ0ODEyMzVkZGVhZO4b0.GAvbpgTbDa7061UzYusC60jjhiu', '1', 4, '2019-11-27 14:11:17', 'public/icon/user.svg'),
(92, 'Lucas', 'Gonçalves', 'lucasgoncalves@gmail.com', '$2a$08$OTE3NzI5MjQ1ZGRlYzM2NeHURf6WrcgrHrAJD0shKdO0SIBoIET2u', '1', 4, '2019-11-27 15:41:42', 'public/img/imgPerfil/Desert.jpg'),
(93, 'Silvia', 'Silva', 'silvia@gmail.com', '$2a$08$MTQ4NzUzODA4MzVkZGVjYeSSQrmKrk7srF1ABiRDhsYobyr81PuMW', '1', 4, '2019-11-27 16:15:48', 'public/icon/user.svg'),
(94, 'Paulo', 'Barcellos', 'paulobarcellos@yahoo.com.br', '$2a$08$MTA4NjM2NTIyODVkZGVmYOOZQK6pnuJ4txhlOPmirPo/cOzh32LGG', '1', 4, '2019-11-27 19:38:13', 'public/img/imgPerfil/20191123_111600.jpg'),
(95, 'Suelane', 'Silva', 'suelane@gmail.com', '$2a$08$MzIzNzg3NzAzNWRkZWZhZOM2COHYvw4rLZ0iX/0ZFgx64SnCclbyi', '1', 4, '2019-11-27 19:38:29', 'public/img/imgPerfil/1574899298741-2016685178.jpg'),
(96, 'Garcia', 'Smith', 'Smith@outlook.com', '$2a$08$MjA3NDM0ODc1OTVkZGVmYurZiUfOtXhxkVk2MKzHVto9KrfWRuSIS', '1', 5, '2019-11-27 19:44:32', 'public/img/imgPerfilSebo/15748947835156543864991785327032.jpg'),
(97, 'Tiago', 'Luiz', 'tyagoluizz@gmail.com', '$2a$08$MjkxMjI2ODU5NWRkZjAzN.nbfLb3hN6gntBOlBvLzmMu3xLsiiWy6', '1', 4, '2019-11-27 20:14:10', 'public/img/imgPerfil/15748975805634765845826657813287.jpg'),
(98, 'Rogério', 'Caetano', 'rogercaetanos@gmail.com', '$2a$08$MTU2OTE3MTAwMzVkZGYyMOzbMd3rjX8SV8LwoA53Lf3kvjCyVoSZ.', '1', 4, '2019-11-27 22:22:03', 'public/icon/user.svg');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`id_autor`),
  ADD KEY `id_nacionalidade` (`id_nacionalidade`);

--
-- Índices de tabela `avaliacao_sebo`
--
ALTER TABLE `avaliacao_sebo`
  ADD PRIMARY KEY (`id_usuario_sebo`,`id_usuario`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices de tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Índices de tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Índices de tabela `cliente_sebo`
--
ALTER TABLE `cliente_sebo`
  ADD PRIMARY KEY (`id_usuario`,`id_usuario_sebo`),
  ADD KEY `id_usuario_sebo` (`id_usuario_sebo`);

--
-- Índices de tabela `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `id_post` (`id_post`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices de tabela `editora`
--
ALTER TABLE `editora`
  ADD PRIMARY KEY (`id_editora`);

--
-- Índices de tabela `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`id_evento`);

--
-- Índices de tabela `livro`
--
ALTER TABLE `livro`
  ADD PRIMARY KEY (`isbn_livro`),
  ADD KEY `id_editora` (`id_editora`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Índices de tabela `livro_autor`
--
ALTER TABLE `livro_autor`
  ADD PRIMARY KEY (`id_autor`,`isbn_livro`),
  ADD KEY `id_autor` (`id_autor`),
  ADD KEY `fk_livro_autor_livro1_idx` (`isbn_livro`);

--
-- Índices de tabela `mensagem`
--
ALTER TABLE `mensagem`
  ADD PRIMARY KEY (`id_usuario`,`id_usuario_sebo`,`data_hora_msg`);

--
-- Índices de tabela `nacionalidade`
--
ALTER TABLE `nacionalidade`
  ADD PRIMARY KEY (`id_nacionalidade`);

--
-- Índices de tabela `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Índices de tabela `postagem`
--
ALTER TABLE `postagem`
  ADD PRIMARY KEY (`id_post`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices de tabela `sebo`
--
ALTER TABLE `sebo`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Índices de tabela `sebo_livro`
--
ALTER TABLE `sebo_livro`
  ADD PRIMARY KEY (`id_usuario`,`isbn_livro`),
  ADD KEY `fk_sebo_has_livro_livro1_idx` (`isbn_livro`),
  ADD KEY `fk_sebo_has_livro_sebo1_idx` (`id_usuario`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_perfil` (`id_perfil`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `autor`
--
ALTER TABLE `autor`
  MODIFY `id_autor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `editora`
--
ALTER TABLE `editora`
  MODIFY `id_editora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `evento`
--
ALTER TABLE `evento`
  MODIFY `id_evento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `nacionalidade`
--
ALTER TABLE `nacionalidade`
  MODIFY `id_nacionalidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de tabela `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `postagem`
--
ALTER TABLE `postagem`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `autor`
--
ALTER TABLE `autor`
  ADD CONSTRAINT `autor_ibfk_1` FOREIGN KEY (`id_nacionalidade`) REFERENCES `nacionalidade` (`id_nacionalidade`);

--
-- Restrições para tabelas `avaliacao_sebo`
--
ALTER TABLE `avaliacao_sebo`
  ADD CONSTRAINT `avaliacao_sebo_ibfk_1` FOREIGN KEY (`id_usuario_sebo`) REFERENCES `sebo` (`id_usuario`),
  ADD CONSTRAINT `avaliacao_sebo_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `cliente` (`id_usuario`);

--
-- Restrições para tabelas `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Restrições para tabelas `cliente_sebo`
--
ALTER TABLE `cliente_sebo`
  ADD CONSTRAINT `cliente_sebo_ibfk_1` FOREIGN KEY (`id_usuario_sebo`) REFERENCES `sebo` (`id_usuario`),
  ADD CONSTRAINT `cliente_sebo_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `cliente` (`id_usuario`);

--
-- Restrições para tabelas `livro`
--
ALTER TABLE `livro`
  ADD CONSTRAINT `livro_ibfk_1` FOREIGN KEY (`id_editora`) REFERENCES `editora` (`id_editora`),
  ADD CONSTRAINT `livro_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`);

--
-- Restrições para tabelas `livro_autor`
--
ALTER TABLE `livro_autor`
  ADD CONSTRAINT `fk_livro_autor_livro1` FOREIGN KEY (`isbn_livro`) REFERENCES `livro` (`isbn_livro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `livro_autor_ibfk_2` FOREIGN KEY (`id_autor`) REFERENCES `autor` (`id_autor`);

--
-- Restrições para tabelas `mensagem`
--
ALTER TABLE `mensagem`
  ADD CONSTRAINT `mensagem_ibfk_1` FOREIGN KEY (`id_usuario`,`id_usuario_sebo`) REFERENCES `cliente_sebo` (`id_usuario`, `id_usuario_sebo`);

--
-- Restrições para tabelas `sebo_livro`
--
ALTER TABLE `sebo_livro`
  ADD CONSTRAINT `fk_sebo_has_livro_livro1` FOREIGN KEY (`isbn_livro`) REFERENCES `livro` (`isbn_livro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sebo_has_livro_sebo1` FOREIGN KEY (`id_usuario`) REFERENCES `sebo` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_perfil`) REFERENCES `perfil` (`id_perfil`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
