-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09-Out-2019 às 20:52
-- Versão do servidor: 10.3.16-MariaDB
-- versão do PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_ij`
--
CREATE DATABASE IF NOT EXISTS `db_ij` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `db_ij`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `author`
--

CREATE TABLE `author` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `author`
--

INSERT INTO `author` (`id`, `name`, `email`, `password`) VALUES
(1, 'Kevin Yank', 'thatguy@kevinyank.com', NULL),
(2, 'Tom Butler', 'tom@r.je', NULL),
(3, 'Marcos dos Santos Carvalho', 'skyp33@outlook.com', NULL),
(4, 'Monokuma', 'monokuma@dangaronpa.com', '123'),
(5, 'Vincent', 'vincent@straysheep.com', '$2y$10$Uo7ADHuXt13IzwkveewTv.y4s3XiVGIejzytTGgniPwWK89YCi7Bi'),
(6, 'Marcos dos Santos Carvalho', 'marcos_sco@outlook.com', '$2y$10$qtFt0Goyxy1jF7w2PYrkDOqURhmem4xiiMRwrUF9WuAXnW0aXBCWG');

-- --------------------------------------------------------

--
-- Estrutura da tabela `joke`
--

CREATE TABLE `joke` (
  `id` int(11) NOT NULL,
  `joketext` text DEFAULT NULL,
  `jokedate` date NOT NULL,
  `authorid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `joke`
--

INSERT INTO `joke` (`id`, `joketext`, `jokedate`, `authorid`) VALUES
(1, 'How many programmers does it take to screw in a lightbulb? None, it\'s a hardware problem. XD', '2017-04-01', 1),
(2, '!false - It\'s funny because it\'s true', '2017-04-01', 1),
(7, 'Why was the empty array stuck outside? It didn\'t have any keys', '2019-09-02', 1),
(9, 'An SQL query goes into a bar, walks up to two tables and asks \"Can I join you?\"', '2019-09-02', 2),
(12, 'Um certo profissional foi a uma entrevista de emprego para concorrer ao cargo de programação em inteligencia artificial. \r\nO recrutador perguntou: \r\nQuanto é 1+1?;\r\nO entrevistado respondeu: 3;\r\nO recrutador voltou a perguntar: \r\nQuanto é 1+1?;\r\nO entrevistado respondeu: 5;\r\nO recrutador perguntou mais uma vez: 1+1?;\r\nEntrevistado: 1+1 = 2;\r\n\r\nRecrutador: CONTRATADO! \r\n', '2019-09-02', 3),
(14, 'Hey, you still a ugly fella. How\'s it been, huh?   ', '2019-09-02', 3),
(15, 'Oh, this is a bad time? I hope i\'m not interrupting anithing or AM I!?', '2019-09-02', 3),
(16, 'Don\'t make me say it again, i\'m a CLEANER!', '2019-09-02', 3),
(17, 'I\'m a programmer, i have no life.', '2019-09-02', 3),
(43, '!false - engraçado porque é verdade', '2019-09-02', 3),
(56, 'testing', '2019-09-11', 3),
(57, '123... get sucked in my sheets...', '2019-09-12', 5),
(59, 'hello there!...', '2019-09-13', 6);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `joke`
--
ALTER TABLE `joke`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `author`
--
ALTER TABLE `author`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `joke`
--
ALTER TABLE `joke`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- Banco de dados: `db_laraveluprunning`
--
CREATE DATABASE IF NOT EXISTS `db_laraveluprunning` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `db_laraveluprunning`;
--
-- Banco de dados: `db_sebook`
--
CREATE DATABASE IF NOT EXISTS `db_sebook` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_sebook`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `autor`
--

CREATE TABLE `autor` (
  `id_autor` int(11) NOT NULL,
  `nome_autor` varchar(100) DEFAULT NULL,
  `cod_status_autor` varchar(10) DEFAULT '1',
  `id_nacionalidade` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `autor`
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
(32, 'teste', '1', 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacao_sebo`
--

CREATE TABLE `avaliacao_sebo` (
  `id_usuario_sebo` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `data_hora` datetime DEFAULT NULL,
  `nota` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nome_categoria` varchar(100) DEFAULT NULL,
  `cod_status_categoria` varchar(10) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categoria`
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
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id_usuario` int(11) NOT NULL,
  `sexo_cliente` char(1) DEFAULT NULL,
  `compl_end_cliente` varchar(100) DEFAULT NULL,
  `logradouro_cliente` varchar(50) DEFAULT NULL,
  `url_foto_cliente` varchar(100) DEFAULT NULL,
  `num_compl_cliente` varchar(100) DEFAULT NULL,
  `cpf_cliente` varchar(30) DEFAULT NULL,
  `cep_cliente` varchar(30) DEFAULT NULL,
  `dt_nasc_cliente` date DEFAULT NULL,
  `cod_status_cliente` varchar(10) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id_usuario`, `sexo_cliente`, `compl_end_cliente`, `logradouro_cliente`, `url_foto_cliente`, `num_compl_cliente`, `cpf_cliente`, `cep_cliente`, `dt_nasc_cliente`, `cod_status_cliente`) VALUES
(5, 'M', 'Inicio', 'Rua', NULL, '145', '48945658710', '06487120', '1997-01-22', '1'),
(9, 'F', 'testeaa', 'testearfe', NULL, 'tddd', '45687912587', '06589054454', '1900-01-01', '1'),
(10, 'M', NULL, NULL, NULL, NULL, '12378965878', '06545687', '1900-01-01', '1'),
(13, 'M', 'aass', 'af', 'aa', 'aaddd', '36574159866', '2342234', '1900-01-01', '1'),
(14, 'F', 'tese', 'VL', 'dad', 'ad', '4879445564', 'das', '0000-00-00', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente_sebo`
--

CREATE TABLE `cliente_sebo` (
  `id_usuario` int(11) NOT NULL,
  `id_usuario_sebo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentario`
--

CREATE TABLE `comentario` (
  `id_comentario` int(11) NOT NULL,
  `txt_comentario` varchar(500) DEFAULT NULL,
  `data_hora_comentario` datetime DEFAULT NULL,
  `cod_status_comentario` varchar(10) DEFAULT '1',
  `id_post` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `editora`
--

CREATE TABLE `editora` (
  `id_editora` int(11) NOT NULL,
  `nome_editora` varchar(100) DEFAULT NULL,
  `cod_status_editora` varchar(10) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `editora`
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
-- Estrutura da tabela `emails_lidos`
--

CREATE TABLE `emails_lidos` (
  `id_emails_lidos` int(11) NOT NULL,
  `email` varchar(520) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `emails_lidos`
--

INSERT INTO `emails_lidos` (`id_emails_lidos`, `email`) VALUES
(29, 'ruanc_oliveira@hotmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `eventos`
--

CREATE TABLE `eventos` (
  `id_evento` int(11) NOT NULL,
  `nome_evento` varchar(100) DEFAULT NULL,
  `txt_evento` varchar(500) DEFAULT NULL,
  `data_hora_evento` datetime DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `links_emails`
--

CREATE TABLE `links_emails` (
  `id_link` int(11) NOT NULL,
  `link` varchar(520) NOT NULL,
  `id_emails_lidos` int(11) NOT NULL,
  `situacao` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `links_emails`
--

INSERT INTO `links_emails` (`id_link`, `link`, `id_emails_lidos`, `situacao`) VALUES
(28, 'd44df9a87f8948e34ea520ef35d8218b', 29, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `livro`
--

CREATE TABLE `livro` (
  `isbn_livro` varchar(100) NOT NULL,
  `ano_livro` varchar(20) DEFAULT NULL,
  `nome_livro` varchar(100) DEFAULT NULL,
  `sinopse_livro` varchar(3500) DEFAULT NULL,
  `cod_status_livro` varchar(10) DEFAULT '1',
  `id_editora` int(11) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `livro`
--

INSERT INTO `livro` (`isbn_livro`, `ano_livro`, `nome_livro`, `sinopse_livro`, `cod_status_livro`, `id_editora`, `id_categoria`) VALUES
('	9788595084292', '2018', 'Prisioneiros da Mente', '\"Um magnata poderoso. Um império tecnológico. E uma família dilacerada. Theo Fester conseguiu vencer uma infância de pobreza e bullying para se tornar um empreendedor mundialmente conhecido. Sua vida pessoal, entretanto, não seguiu o mesmo caminho: ele e seus filhos vivem uma farsa, se digladiando por poder e atenção. Ao se dar conta de que sua família está aprisionada por cárceres mentais, Theo precisará se reinventar mais uma vez e mudar radicalmente seus relacionamentos, antes que seja tarde demais.\"', '1', 23, 2),
('5765765', NULL, 'teste', 'sdfds', '1', NULL, NULL),
('8532511015', '2000', 'Harry Potter e A Pedra Filosofal', 'Em Harry Potter e a Pedra Filosofal, o leitor é apresentado a Harry, filho de Tiago e Lílian Potter, feiticeiros que foram assassinados por um poderosíssimo bruxo, quando ele ainda era um bebê. Com isso, o menino acaba sendo levado para a casa dos tios que nada tinham a ver com o sobrenatural pelo contrário. Até os 10 anos, Harry foi uma espécie de gata borralheira: maltratado pelos tios, herdava roupas velhas do primo gorducho, tinha óculos remendados e era tratado como um estorvo. No dia de seu aniversário de 11 anos, entretanto, ele parece deslizar por um buraco sem fundo, como o de Alice no país das maravilhas, que o conduz a um mundo mágico. Descobre sua verdadeira história e seu destino: ser um aprendiz de feiticeiro até o dia em que terá que enfrentar a pior força do mal, o homem que assassinou seus pais, o terrível Lorde das Trevas. ', '1', 21, 1),
('8575421131', '2004', 'O Código da Vinci', 'Um assassinato dentro do Museu do Louvre, em Paris, traz à tona uma sinistra conspiração para revelar um segredo que foi protegido por uma sociedade secreta desde os tempos de Jesus Cristo. A vítima é o respeitado curador do museu, Jacques Saunière, um dos líderes dessa antiga fraternidade, o Priorado de Sião, que já teve como membros Leonardo da Vinci, Victor Hugo e Isaac Newton. Momentos antes de morrer, Saunière consegue deixar uma mensagem cifrada na cena do crime que apenas sua neta, a criptógrafa francesa Sophie Neveu, e Robert Langdon, um famoso simbologista de Harvard, podem desvendar. Os dois transformam-se em suspeitos e em detetives enquanto percorrem as ruas de Paris e de Londres tentando decifrar um intricado quebra-cabeças que pode lhes revelar um segredo milenar que envolve a Igreja Católica.', '1', 24, 2),
('9780486421230', '2002', 'Swann\'s Way', 'A psychological self-portrait, a clear-eyed social study, and a profound meditation upon the artistic process, Marcel Proust\'s monumental, encyclopedic masterpiece A la recherche du temps perdu (In Search of Lost Time) changed the course of 20th-century literature. Swann\'s Way, the first volume, introduces the novel\'s major themes and its unnamed narrator, an introspective man drawn, in his youth, to fashionable society, like the author himself. Through his narrator\'s consciousness, Proust offers readers a comprehensive portrait of the high society of Paris from the 1870s through the First World War.Swann\'s Way begins with the narrator\'s reminiscences of early childhood -- including, famously, his evocative memory of eating a pastry called a madeleine -- and his fascination with what seemed the separate worlds of his family\'s various neighbors and acquaintances. He then turns his focus to the wealthy connoisseur Charles Swann and his obsessive relationship with the vulgar but radiant courtesan Odette, chronicling in detail the milieu in which it is enacted and its unfortunate effects on him.Du cote de chez Swann first appeared in 1913. It is a bitingly satiric, often comic evocation of French society that addresses a range of philosophical questions about perception, memory, desire, art, family, and politics. On its own or as part of a larger work, it is a rich search for a reality that transcends the passage of time.', '1', 4, 2),
('9788501110367', '2017', 'Cem Anos De Solidão - Edição Especial', 'Edição comemorativa em capa dura dos 50 anos de publicação da obra-prima de Gabriel García Márquez Neste que é um dos maiores clássicos da literatura, o prestigiado autor narra a incrível e triste história dos Buendía – a estirpe de solitários para a qual não será dada “uma segunda oportunidade sobre a terra” e apresenta o maravilhoso universo da fictícia Macondo, onde se passa o romance. É lá que acompanhamos diversas gerações dessa família, assim como a ascensão e a queda do vilarejo. Para além dos artifícios técnicos e das influências literárias que transbordam do livro, ainda vemos em suas páginas o que por muitos é considerado uma autêntica enciclopédia do imaginário, num estilo que consagrou o colombiano como um dos maiores autores do século XX.', '1', 3, 2),
('9788516079444', '2012', 'Dom Quixote', 'Apaixonado por histórias de cavalaria, Alonso Quijano passa a acreditar que é um cavaleiro andante. Em seu delírio, muda o nome para Dom Quixote de la Mancha, veste-se com uma armadura improvisada, faz de Dulcineia sua amada, a quem quer dedicar suas glórias e seus feitos. O vizinho Sancho Pança torna-se seu fiel escudeiro. Nenhum cavaleiro andante teve a ousadia de Dom Quixote. Tampouco viveu suas aventuras e desventuras, que aqui são contadas de forma divertida e emocionante. Adaptação de Walcyr Carrasco.', '1', 1, 1),
('9788527311229', '2018', 'Uniões - A Perfeição do Amor e A Tentação da Quieta Verônica', 'Vagando e divagando pelo corpo, sensações e pensamentos de duas mulheres, Robert Musil, célebre autor de O Homem Sem Qualidades, constrói em Uniões uma narrativa intensamente dramática e fragmentada, de absoluta radicalidade. Traduzido e comentado pela primeira vez em português por Kathrin Rosenfield e Lawrence Flores Pereira, Uniões revive agora em novo contexto, no qual os conflitos de gênero se tornam tão acirrados quanto inevitáveis. Uniões reúne dois contos: A Perfeição do Amor e A Tentação da Quieta Verônica, protagonizados, respectivamente, por Claudine e Verônica. Os traumas psicológicos vividos pelas personagens, ainda na infância, se fazem notar já na idade adulta pelo problema da entrega de corpo, alma e mente ao homem amado. No esforço de lidar com as consequências impostas por pulsões sexuais descontroladas, a primeira procura proteger seu casamento, enquanto a segunda se refugia em idealizações fantasiosas que a impedem do contato humano real. Comparável às tramas psicológicas de Clarice Lispector, Musil recorre a ferramentas narrativas muito a frente de seu tempo para encontrar dimensões afetivas onde os desafios são os mesmos, tanto para homens quanto para mulheres.', '1', 6, 2),
('9788535928204', '2016', 'A Montanha Mágica', 'Ansiosamente aguardado pelos leitores brasileiros, volta às livrarias o célebre romance A montanha mágica, a grande obra-prima de Thomas Mann. A nova edição tem tradução de Herbert Caro e posfácio inédito de Paulo Astor Soethe, renomado especialista na obra do autor. Neste clássico da literatura alemã, Mann renova a tradição do Bildungsroman — o romance de formação — a partir da trajetória do jovem engenheiro Hans Castorp. Durante uma inesperada estadia de sete anos em um sanatório para tuberculosos nos Alpes suíços, Hans relaciona-se com uma miríade de personagens enfermos que encarnam os conflitos espirituais e ideológicos que antecedem a Primeira Guerra Mundial. Lidando com uma variedade de temas — estados doentios e corpóreos, a arte, o amor, a natureza do tempo e da morte —, este livro, publicado originalmente em 1924, é um dos grandes testamentos literários do século XX e uma das obras inesgotáveis da ficção ocidental.', '1', 2, 2),
('9788535929225', '2017', 'Anna Karienina', '“Toda a diversidade, todo o encanto, toda a beleza da vida é feita de sombra e de luz”, escreve Liev Tolstói no romance que Fiódor Dostoiévski definiu como “impecável”. Publicado originalmente em forma de fascículos entre 1875 e 1877, antes de finalmente ganhar corpo de livro em 1877, Anna Kariênina continua a causar espanto. Como pode uma obra de arte se parecer tanto com a vida? Com absoluta maestria, Tolstói conduz o leitor por um salão repleto de música, perfumes, vestidos de renda, num ambiente de imagens vívidas e quase palpáveis que têm como pano de fundo a Rússia czarista. Nessa galeria de personagens excessivamente humanos, ninguém está inteiramente a salvo de julgamento: não há heróis, tampouco fracassados, e sim pessoas complexas, ambíguas, que não se restringem a fórmulas prontas. Religião, família, política e classe social são postas à prova no trágico percurso traçado por uma aristocrata casada que, ao se envolver em um caso extraconjugal, experimenta as virtudes e as agruras de um amor profundamente conflituoso, “feito de sombra e de luz”.', '1', 2, 2),
('9788543104355', '2016', 'O Homem Mais Inteligente da História', 'Considerado o autor brasileiro mais lido da década, Augusto Cury já vendeu 28 milhões de livros. “O homem mais inteligente da história” é fruto de 15 anos de estudos e pesquisas. Considerado por Augusto Cury a obra mais importante de sua carreira, este é o primeiro volume de uma coleção que vai abalar nossas convicções e transformar nossa visão do personagem que julgávamos conhecer tão bem. Psicólogo e pesquisador, Dr. Marco Polo desenvolveu uma teoria inédita sobre o funcionamento da mente e a gestão da emoção. Após sofrer uma terrível perda pessoal, ele vai a Jerusalém participar de um ciclo de conferências na ONU e é confrontado com uma pergunta surpreendente: Jesus sabia gerenciar a própria mente? Ateu convicto, Marco Polo responde que ciência e religião não se misturam. No entanto, instigado pelo tema, decide analisar a inteligência de Cristo à luz das ciências humanas. Ele esperava encontrar um homem simplório, com poucos recursos emocionais. Mas ao mergulhar na inquietante biografia de Jesus presente no Livro de Lucas, suas crenças vão sendo pouco a pouco colocadas em xeque. Para empreender essa incrível jornada, Marco Polo vai contar com uma mesa-redonda composta por dois brilhantes teólogos, um renomado neurocirurgião e sua assistente, a psiquiatra Sofia. Juntos, eles irão decifrar os sentidos ocultos em um dos textos mais famosos do Novo Testamento. Os debates são transmitidos via internet e cativam espectadores em todo o mundo – mas nem todos estão preparados para ver Jesus sob uma ótica tão revolucionária. Agora os intelectuais terão que lidar com seus próprios fantasmas emocionais e encarar perigos que jamais imaginaram enfrentar.', '1', 15, 2),
('9788544001400', '2017', 'Os Lusíadas', 'Os Lusíadas têm uma importância central na literatura de língua portuguesa: trata-se da obra que consolidou o português moderno e elevou o idioma ao patamar de língua respeitada culturalmente. Mais do que sintetizar os anseios de uma nação e de todo um período histórico – glória reservada a poucos –, com Os Lusíadas, Camões imortalizou-se como um tesouro português legado à humanidade.', '1', 8, 3),
('9788544001868', '2018', 'Persuasão', '\"Persuasão” foi o último trabalho completo de Jane Austen. O livro conta a história de Anne Elliot, uma das heroínas mais tranquilas e reservadas de Austen, mas, ao mesmo tempo, uma das mais fortes e abertas às mudanças. O livro enaltece a constância do amor numa época turbulenta na história da Inglaterra: as guerras napoleônicas. Escrito nesse período, o romance descreve como uma mulher pode permanecer fiel ao seu passado e, ainda assim, pensar em um futuro feliz. Austen expõe de maneira sutil como uma mulher pode passar por cima das convenções sociais e das restrições femininas em busca da felicidade.', '1', 8, 2),
('9788560280940', '2014', 'It - A Coisa', 'Durante as férias escolares de 1958, em Derry, pacata cidadezinha do Maine, Bill, Richie, Stan, Mike, Eddie, Ben e Beverly aprenderam o real sentido da amizade, do amor, da confiança e... do medo. O mais profundo e tenebroso medo. Naquele verão, eles enfrentaram pela primeira vez a Coisa, um ser sobrenatural e maligno que deixou terríveis marcas de sangue em Derry. Quase trinta anos depois, os amigos voltam a se encontrar. Uma nova onda de terror tomou a pequena cidade. Mike Hanlon, o único que permanece em Derry, dá o sinal. Precisam unir forças novamente. A Coisa volta a atacar e eles devem cumprir a promessa selada com sangue que fizeram quando crianças. Só eles têm a chave do enigma. Só eles sabem o que se esconde nas entranhas de Derry. O tempo é curto, mas somente eles podem vencer a Coisa. Em \"It - A Coisa\", clássico de Stephen King em nova edição, os amigos irão até o fim, mesmo que isso signifique ultrapassar os próprios limites.', '1', 22, 12),
('9788563560421', '2012', 'Ulysses', 'Um homem sai de casa pela manhã, cumpre com as tarefas do dia e, pela noite, retorna ao lar. Foi em torno desse esqueleto enganosamente simples, quase banal, que James Joyce elaborou o que veio a ser o grande romance do século XX. Inspirado na Odisseia de Homero, Ulysses é ambientado em Dublin, e narra as aventuras de Leopold Bloom e seu amigo Stephen Dedalus ao longo do dia 16 de junho de 1904. Tal como o Ulisses homérico, Bloom precisa superar numerosos obstáculos e tentações até retornar ao apartamento na rua Eccles, onde sua mulher, Molly, o espera. Para criar esse personagem rico e vibrante, Joyce misturou numerosos estilos e referências culturais, num caleidoscópio de vozes que tem desafiado gerações de leitores e estudiosos ao redor do mundo. O culto em torno de Ulysses teve início antes mesmo de sua publicação em livro, quando trechos do romance começaram a aparecer num jornal literário dos EUA. Por conta dessas passagens, Ulysses foi banido nos Estados Unidos, numa acusação de obscenidade, dando início a uma longa pendenga legal, que seria resolvida apenas onze anos depois, com a liberação do romance em solo americano. Mas, para além das disputas e polêmicas, Ulysses segue como um divisor de águas por conta do êxito do autor no principal ponto do romance: esticar e moldar a língua inglesa ao limite, a fim de retirar disso um retrato fiel, divertido e comovente do que se convencionou chamar de o “homem moderno”. Em seu clássico estudo sobre a obra de James Joyce, Homem comum enfim, o crítico e escritor britânico Anthony Burgess afirma que, “se alguma vez houve um grande escritor popular, Joyce foi este escritor”. Guiado por esse espírito eminentemente democrático da escrita joyceana, Caetano Galindo realizou esta nova tradução de Ulysses, a fim de captar “a imensa gama de cores, registros, estilos, recursos e efeitos” de sua prosa revolucionária.', '1', 9, 2),
('9788573264241', '2016', 'A Divina Comédia', 'Texto fundador da língua italiana, súmula da cosmovisão de toda uma época, monumento poético de rigor e beleza, obra magna da literatura universal. É fato que a \"Comédia\" merece esses e muitos outros adjetivos de louvor, incluindo o \"divina\" que Boccaccio lhe deu já no século XIV. Mas também é certo que, como bom clássico, este livro reserva a cada novo leitor a prazerosa surpresa de renascer revigorado, como vem fazendo de geração em geração há quase setecentos anos. A longa jornada dantesca através do Inferno, Purgatório e Paraíso é aqui oferecida na íntegra — com seus mais de 14 mil decassílabos divididos em cem cantos e três partes — na rigorosa tradução de Italo Eugenio Mauro, vencedora do Prêmio Jabuti e celebrada por sua fidelidade à métrica e à rima originais. A edição traz ainda, como prefácio, um inspirado ensaio de Otto Maria Carpeaux.', '1', 5, 3),
('9788580573749', '2013', 'Cidades de Papel', 'Quentin Jacobsen tem uma paixão platônica pela magnífica vizinha e colega de escola Margo Roth Spiegelman. Até que em um cinco de maio que poderia ter sido outro dia qualquer, ela invade sua vida pela janela de seu quarto, com a cara pintada e vestida de ninja, convocando-o a fazer parte de um engenhoso plano de vingança. E ele, é claro, aceita. ', '1', 10, 2),
('9788581863351', '2019', 'A Metamorfose', 'Franz Kafka é um dos autores mais lidos, analisados e discutidos da literatura mundial após a Primeira Guerra, segundo o professor, ensaísta e tradutor Modesto Carone, não só por ser um autor original e inteligente, mas porque em sua obra encontramos a \"imagem mais poderosa e penetrante de nosso mundo vincado pela falsa consciência\". Conhecida por ter seu herói Gregor Samsa metamorfoseado em inseto, esta novela enfoca a existência humana em um mundo que leva os indivíduos à solidão. Com uma narrativa ágil, seduz o leitor por seu rigoroso apuro técnico.', '1', 7, 2),
('9788582850404', '2016', 'Romeu E Julieta', 'Há muito tempo duas famílias banham em sangue as ruas de Verona. Enquanto isso, na penumbra das madrugadas, ardem as brasas de um amor secreto. Romeu, filho dos Montéquio, e Julieta, herdeira dos Capuleto, desafiam a rixa familiar e sonham com um impossível futuro, longe da violência e da loucura. “Romeu e Julieta” é a primeira das grandes tragédias de William Shakespeare, e esta nova tradução de José Francisco Botelho recria com maestria o ritmo ao mesmo tempo frenético e melancólico do texto shakespeariano. Contando também com um excelente ensaio introdutório do especialista Adrian Poole, esta edição traz nova vida a uma das mais emocionantes histórias de amor já contadas.', '1', 9, 4),
('9788584390670', '2017', 'O Alquimista', 'Paulo Coelho já inspirou mais de 200 milhões de leitores por todo o mundo com este romance encantador. Esta história, brilhante em sua simplicidade e com uma sabedoria que nos estimula, é sobre um jovem pastor da Andaluzia chamado Santiago que viaja de sua cidade natal na Espanha para o deserto do Egito em busca de um tesouro escondido perto das Pirâmides. Ao longo do caminho, ele encontra uma cigana, um homem que se diz rei e um alquimista, que lhe indicam a direção para a sua busca. Ninguém sabe que tesouro é esse, ou se Santiago será capaz de ultrapassar os obstáculos de seu trajeto. Mas o que começa como uma jornada para encontrar bens mundanos se transforma na descoberta do tesouro que se encontra dentro dele mesmo. Emocionante e profundamente humano, este clássico contemporâneo é um testamento eterno do poder transformador dos nossos sonhos e da importância de ouvirmos nossos corações.', '1', 25, 2),
('9788599296363', '2008', 'A Cabana', 'A filha mais nova de Mackenzie Allen Philip foi raptada durante as férias em família e há evidências de que ela foi brutalmente assassinada e abandonada numa cabana. Quatro anos mais tarde, Mack recebe uma nota suspeita, aparentemente vinda de Deus, convidando-o para voltar áquele cabana para passar o fim de semana. Ignorando alertas de que poderia ser uma cilada, ele segue numa tarde de inverno e volta a cenário de seu pior pesadelo. O que encontra lá muda sua vida para sempre. Num mundo em que religião parece tornar-se irrelevante, \"A Cabana\" invoca a pergunta: \"Se Deus é tão poderoso e tão cheio de amor, por que não faz nada para amenizar a dor e o sofrimento do mundo?\" As respostas encontradas por Mack surpreenderão você e, provavelmente, o transformarão tanto quanto ele.', '1', 15, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `livro_autor`
--

CREATE TABLE `livro_autor` (
  `id_autor` int(11) NOT NULL,
  `isbn_livro` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `livro_autor`
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
(13, '9788580573749'),
(20, '8532511015'),
(21, '9788560280940'),
(23, '9788584390670'),
(24, '	9788595084292'),
(24, '9788543104355'),
(25, '8575421131'),
(31, '9788599296363');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagem`
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
-- Estrutura da tabela `nacionalidade`
--

CREATE TABLE `nacionalidade` (
  `id_nacionalidade` int(11) NOT NULL,
  `nome_nacionalidade` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `nacionalidade`
--

INSERT INTO `nacionalidade` (`id_nacionalidade`, `nome_nacionalidade`) VALUES
(1, 'Espanhol'),
(2, 'Russo'),
(3, 'Suiço'),
(4, 'Colombiano'),
(5, 'Irlandês'),
(6, 'Francês'),
(7, 'Italiano'),
(8, 'Austriaco'),
(9, 'Checoslovaco'),
(10, 'Português'),
(11, 'Britânico'),
(12, 'Americano'),
(13, 'Brasileiro'),
(14, 'Afegão'),
(15, 'Africano'),
(16, 'Alemão'),
(17, 'Argentino'),
(18, 'Asiático'),
(19, 'Australiano'),
(20, 'Belga'),
(21, 'Canadense'),
(22, 'Chileno'),
(23, 'Chinês'),
(24, 'Coreano'),
(25, 'Croata'),
(26, 'Dinamarquês'),
(27, 'Egípcio'),
(28, 'Escocês'),
(29, 'Eslovaco'),
(30, 'Europeu'),
(31, 'Filipino'),
(32, 'Finlandês'),
(33, 'Grego'),
(34, 'Holandês'),
(35, 'Indiano'),
(36, 'Inglês'),
(37, 'Iraniano'),
(38, 'Iraquiano'),
(39, 'Japonês'),
(40, 'Mexicano'),
(41, 'Norueguês'),
(42, 'Paquistanês'),
(43, 'Polonês'),
(44, 'Sueco'),
(45, 'Sul-Africano'),
(46, 'Sul-Coreano'),
(47, 'Turco'),
(48, 'Árabe');

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil`
--

CREATE TABLE `perfil` (
  `id_perfil` int(11) NOT NULL,
  `nome_perfil` varchar(100) DEFAULT NULL,
  `cod_status_perfil` varchar(10) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `perfil`
--

INSERT INTO `perfil` (`id_perfil`, `nome_perfil`, `cod_status_perfil`) VALUES
(1, 'Admin_Master', '1'),
(2, 'Admin_Nivel_1', '1'),
(3, 'Admin_Nivel_2', '1'),
(4, 'Cliente', '1'),
(5, 'Sebo', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `postagem`
--

CREATE TABLE `postagem` (
  `id_post` int(11) NOT NULL,
  `data_hora_post` datetime DEFAULT NULL,
  `link_post` varchar(100) DEFAULT NULL,
  `url_foto_post` varchar(100) DEFAULT NULL,
  `txt_postagem` varchar(500) DEFAULT NULL,
  `titulo_post` text DEFAULT NULL,
  `cod_status_post` varchar(10) DEFAULT '1',
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `postagem`
--

INSERT INTO `postagem` (`id_post`, `data_hora_post`, `link_post`, `url_foto_post`, `txt_postagem`, `titulo_post`, `cod_status_post`, `id_usuario`) VALUES
(1, '2019-10-09 10:48:42', NULL, NULL, 'PHP Ã© uma linguagem interpretada livre, usada originalmente apenas para o desenvolvimento de aplicaÃ§Ãµes presentes e atuantes no lado do servidor, capazes de gerar conteÃºdo dinÃ¢mico na World Wide Web.', 'PHP', '1', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sebo`
--

CREATE TABLE `sebo` (
  `id_usuario` int(11) NOT NULL,
  `razao_sebo` varchar(100) DEFAULT NULL,
  `nome_fantasia` varchar(100) DEFAULT NULL,
  `cnpj_sebo` varchar(30) DEFAULT NULL,
  `url_foto_sebo` varchar(100) DEFAULT NULL,
  `num_end_sebo` varchar(30) DEFAULT NULL,
  `compl_end_sebo` varchar(100) DEFAULT NULL,
  `logradouro_sebo` varchar(100) DEFAULT NULL,
  `cep_end_sebo` varchar(30) DEFAULT NULL,
  `num_tel_sebo` varchar(30) DEFAULT NULL,
  `celular_1_sebo` varchar(50) DEFAULT NULL,
  `celular_2_sebo` varchar(30) DEFAULT NULL,
  `insc_estadual_sebo` varchar(100) DEFAULT NULL,
  `url_site_sebo` varchar(100) DEFAULT NULL,
  `cod_status_sebo` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `sebo`
--

INSERT INTO `sebo` (`id_usuario`, `razao_sebo`, `nome_fantasia`, `cnpj_sebo`, `url_foto_sebo`, `num_end_sebo`, `compl_end_sebo`, `logradouro_sebo`, `cep_end_sebo`, `num_tel_sebo`, `celular_1_sebo`, `celular_2_sebo`, `insc_estadual_sebo`, `url_site_sebo`, `cod_status_sebo`) VALUES
(11, 'Abigail de Queiroz Moreira Pereira', 'Sebo do Marcao', '20.035.914/0001-03', NULL, '111', NULL, NULL, '06410-080', '1141986832', NULL, NULL, NULL, NULL, '1'),
(12, 'Mirian Marinho da Silva Lima', 'Sebo Marinho', '12.672.074/0001-53', NULL, '115', NULL, NULL, '06320-290', '1143867762', NULL, NULL, NULL, NULL, '1'),
(14, 'Priscilla Nobre Lobo', 'Sebo e Livraria Corujinha', '21.100.930/0001-97', NULL, '179', NULL, NULL, '06448-020', '1128614286', NULL, NULL, NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sebo_livro`
--

CREATE TABLE `sebo_livro` (
  `id_usuario` int(11) NOT NULL,
  `isbn_livro` varchar(100) NOT NULL,
  `qtd_estoque` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `sebo_livro`
--

INSERT INTO `sebo_livro` (`id_usuario`, `isbn_livro`, `qtd_estoque`) VALUES
(11, '9788599296363', 5),
(12, '9788516079444', 4),
(14, '9788544001400', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(50) DEFAULT NULL,
  `sobrenome_usuario` varchar(50) DEFAULT NULL,
  `email_usuario` varchar(100) DEFAULT NULL,
  `senha_usuario` varchar(100) DEFAULT NULL,
  `cod_status_usuario` varchar(10) DEFAULT '1',
  `id_perfil` int(11) DEFAULT NULL,
  `data_criacao` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome_usuario`, `sobrenome_usuario`, `email_usuario`, `senha_usuario`, `cod_status_usuario`, `id_perfil`, `data_criacao`) VALUES
(1, 'Ruan', 'Costa de Oliveira', 'ruanc_oliveira@hotmail.com', '$2y$08$k8qUGqtogGQKg9Uw0IG/LuEsNjBDaNmwGxdswKXS1OuihNl6Yi9hW', '1', 1, '2019-09-18 00:00:00'),
(2, 'Divanilda', 'Cristina da Cruz', 'rm35615@estudante.fieb.edu.br', '$2y$08$k8qUGqtogGQKg9Uw0IG/LuEsNjBDaNmwGxdswKXS1OuihNl6Yi9hW', '1', 1, '2019-09-18 00:00:00'),
(3, 'Gabriel Max', 'Maia do Carmo', 'rm35880@estudante.fieb.edu.br', '$2y$08$k8qUGqtogGQKg9Uw0IG/LuEsNjBDaNmwGxdswKXS1OuihNl6Yi9hW', '1', 1, '2019-09-18 00:00:00'),
(5, 'Marcos', 'Santos Carvalho', 'marcos_sco@outlook.com', '$2y$08$k8qUGqtogGQKg9Uw0IG/LuEsNjBDaNmwGxdswKXS1OuihNl6Yi9hW', '1', 1, '2019-09-18 00:00:00'),
(6, 'Joyce Victoria', 'Leite Oquendo', 'rm35881@estudante.fieb.edu.br', '12345678', '1', 2, '2019-09-18 00:00:00'),
(7, 'Daniele Maria', 'França', 'rm36113@estudante.fieb.edu.br', '12345678', '1', 3, '2019-09-18 00:00:00'),
(8, 'Jennifer', 'Keity Guimarães', 'rm36139@estudante.fieb.edu.br', '12345678', '1', 3, '2019-09-18 00:00:00'),
(9, 'Suelane', 'Garcia Fontes', 'suelane.fontes@docente.fieb.edu.br', '12345678', '1', 4, '2019-09-18 00:00:00'),
(10, 'Giovani', 'Barbosa Wingter', 'giovani.wingter@docente.fieb.edu.br', '12345678', '1', 4, '2019-09-18 00:00:00'),
(11, 'Abigail', 'Queiroz Moreira Pereira', 'sebodomarcao@uol.com.br', '12345678', '1', 5, '2019-09-18 00:00:00'),
(12, 'Mirian', 'Marinho da Silva Lima', 'sebosantafe@hotmail.com', '12345678', '1', 5, '2019-09-18 00:00:00'),
(13, 'Denis', 'Monteiro Guimaraes', 'denis.guimaraes@docente.fieb.edu.br', '12345678', '1', 4, '2019-09-18 00:00:00'),
(14, 'Priscilla', 'Nobre Lobo', 'comum@outlook.com', '$2y$08$k8qUGqtogGQKg9Uw0IG/LuEsNjBDaNmwGxdswKXS1OuihNl6Yi9hW', '1', 5, '2019-09-18 00:00:00'),
(17, 'Dio', 'Brando', 'dio@outlook.com', '$2y$08$k8qUGqtogGQKg9Uw0IG/LuEsNjBDaNmwGxdswKXS1OuihNl6Yi9hW', '1', 4, '0000-00-00 00:00:00'),
(18, 'Joca', 'jocao', 'joca@outlook.com', '123', '1', 5, '0000-00-00 00:00:00');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`id_autor`),
  ADD KEY `id_nacionalidade` (`id_nacionalidade`);

--
-- Índices para tabela `avaliacao_sebo`
--
ALTER TABLE `avaliacao_sebo`
  ADD PRIMARY KEY (`id_usuario_sebo`,`id_usuario`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices para tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Índices para tabela `cliente_sebo`
--
ALTER TABLE `cliente_sebo`
  ADD PRIMARY KEY (`id_usuario`,`id_usuario_sebo`),
  ADD KEY `id_usuario_sebo` (`id_usuario_sebo`);

--
-- Índices para tabela `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `id_post` (`id_post`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices para tabela `editora`
--
ALTER TABLE `editora`
  ADD PRIMARY KEY (`id_editora`);

--
-- Índices para tabela `emails_lidos`
--
ALTER TABLE `emails_lidos`
  ADD PRIMARY KEY (`id_emails_lidos`);

--
-- Índices para tabela `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id_evento`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices para tabela `links_emails`
--
ALTER TABLE `links_emails`
  ADD PRIMARY KEY (`id_link`),
  ADD KEY `id_emails_lidos` (`id_emails_lidos`);

--
-- Índices para tabela `livro`
--
ALTER TABLE `livro`
  ADD PRIMARY KEY (`isbn_livro`),
  ADD KEY `id_editora` (`id_editora`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Índices para tabela `livro_autor`
--
ALTER TABLE `livro_autor`
  ADD PRIMARY KEY (`id_autor`,`isbn_livro`),
  ADD KEY `id_autor` (`id_autor`),
  ADD KEY `fk_livro_autor_livro1_idx` (`isbn_livro`);

--
-- Índices para tabela `mensagem`
--
ALTER TABLE `mensagem`
  ADD PRIMARY KEY (`id_usuario`,`id_usuario_sebo`,`data_hora_msg`);

--
-- Índices para tabela `nacionalidade`
--
ALTER TABLE `nacionalidade`
  ADD PRIMARY KEY (`id_nacionalidade`);

--
-- Índices para tabela `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Índices para tabela `postagem`
--
ALTER TABLE `postagem`
  ADD PRIMARY KEY (`id_post`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices para tabela `sebo`
--
ALTER TABLE `sebo`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Índices para tabela `sebo_livro`
--
ALTER TABLE `sebo_livro`
  ADD PRIMARY KEY (`id_usuario`,`isbn_livro`),
  ADD KEY `fk_sebo_has_livro_livro1_idx` (`isbn_livro`),
  ADD KEY `fk_sebo_has_livro_sebo1_idx` (`id_usuario`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_perfil` (`id_perfil`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `autor`
--
ALTER TABLE `autor`
  MODIFY `id_autor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `editora`
--
ALTER TABLE `editora`
  MODIFY `id_editora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `emails_lidos`
--
ALTER TABLE `emails_lidos`
  MODIFY `id_emails_lidos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de tabela `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id_evento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `links_emails`
--
ALTER TABLE `links_emails`
  MODIFY `id_link` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `nacionalidade`
--
ALTER TABLE `nacionalidade`
  MODIFY `id_nacionalidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de tabela `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `postagem`
--
ALTER TABLE `postagem`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `autor`
--
ALTER TABLE `autor`
  ADD CONSTRAINT `autor_ibfk_1` FOREIGN KEY (`id_nacionalidade`) REFERENCES `nacionalidade` (`id_nacionalidade`);

--
-- Limitadores para a tabela `avaliacao_sebo`
--
ALTER TABLE `avaliacao_sebo`
  ADD CONSTRAINT `avaliacao_sebo_ibfk_1` FOREIGN KEY (`id_usuario_sebo`) REFERENCES `sebo` (`id_usuario`),
  ADD CONSTRAINT `avaliacao_sebo_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `cliente` (`id_usuario`);

--
-- Limitadores para a tabela `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `cliente_sebo`
--
ALTER TABLE `cliente_sebo`
  ADD CONSTRAINT `cliente_sebo_ibfk_1` FOREIGN KEY (`id_usuario_sebo`) REFERENCES `sebo` (`id_usuario`),
  ADD CONSTRAINT `cliente_sebo_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `cliente` (`id_usuario`);

--
-- Limitadores para a tabela `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `eventos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `sebo` (`id_usuario`);

--
-- Limitadores para a tabela `links_emails`
--
ALTER TABLE `links_emails`
  ADD CONSTRAINT `links_emails_ibfk_1` FOREIGN KEY (`id_emails_lidos`) REFERENCES `emails_lidos` (`id_emails_lidos`);

--
-- Limitadores para a tabela `livro`
--
ALTER TABLE `livro`
  ADD CONSTRAINT `livro_ibfk_1` FOREIGN KEY (`id_editora`) REFERENCES `editora` (`id_editora`),
  ADD CONSTRAINT `livro_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`);

--
-- Limitadores para a tabela `livro_autor`
--
ALTER TABLE `livro_autor`
  ADD CONSTRAINT `fk_livro_autor_livro1` FOREIGN KEY (`isbn_livro`) REFERENCES `livro` (`isbn_livro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `livro_autor_ibfk_2` FOREIGN KEY (`id_autor`) REFERENCES `autor` (`id_autor`);

--
-- Limitadores para a tabela `mensagem`
--
ALTER TABLE `mensagem`
  ADD CONSTRAINT `mensagem_ibfk_1` FOREIGN KEY (`id_usuario`,`id_usuario_sebo`) REFERENCES `cliente_sebo` (`id_usuario`, `id_usuario_sebo`);

--
-- Limitadores para a tabela `sebo_livro`
--
ALTER TABLE `sebo_livro`
  ADD CONSTRAINT `fk_sebo_has_livro_livro1` FOREIGN KEY (`isbn_livro`) REFERENCES `livro` (`isbn_livro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sebo_has_livro_sebo1` FOREIGN KEY (`id_usuario`) REFERENCES `sebo` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_perfil`) REFERENCES `perfil` (`id_perfil`);
--
-- Banco de dados: `db_sitepoint_phroute`
--
CREATE DATABASE IF NOT EXISTS `db_sitepoint_phroute` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `db_sitepoint_phroute`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `authors`
--

CREATE TABLE `authors` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `authors`
--

INSERT INTO `authors` (`id`, `name`) VALUES
(1, 'Dan Brown'),
(2, 'Paulo Coelho');

-- --------------------------------------------------------

--
-- Estrutura da tabela `books`
--

CREATE TABLE `books` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(250) NOT NULL,
  `isbn` varchar(50) NOT NULL,
  `year` int(11) NOT NULL,
  `pages` int(11) NOT NULL,
  `author_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `books`
--

INSERT INTO `books` (`id`, `title`, `isbn`, `year`, `pages`, `author_id`, `category_id`) VALUES
(1, 'The Zahir', '0-06-083281-9', 2005, 336, 2, 2),
(2, 'The Devil and Miss Prym', '0-00-711605-5', 2000, 205, 2, 2),
(3, 'The Alchemist', '0-06-250217-4', 1988, 163, 2, 2),
(4, 'Inferno', '978-0-385-53785-8', 2013, 480, 1, 1),
(5, 'The Da Vinci Code', '0-385-50420-9', 2003, 454, 1, 1),
(6, 'Angels & Demons', '0-671-02735-2', 2000, 616, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Thriller'),
(2, 'Novel');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`author_id`,`category_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Índices para tabela `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `books`
--
ALTER TABLE `books`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Banco de dados: `db_tjg_microframework`
--
CREATE DATABASE IF NOT EXISTS `db_tjg_microframework` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_tjg_microframework`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`) VALUES
(1, 'Conteúdo inicial', 'Criando um micro framework no php'),
(2, 'MVC', 'MVC é nada mais que um padrão de arquitetura de \nsoftware, separando sua aplicação em 3 camadas. A camada de \ninteração do usuário(view), a camada de manipulação dos dados(model) \ne a camada de controle(controller).'),
(3, 'PHP', 'PHP é uma linguagem interpretada livre, usada originalmente apenas para o desenvolvimento de aplicações presentes e atuantes no lado do servidor, capazes de gerar conteúdo dinâmico na World Wide Web. Wikipédia\r\n'),
(4, 'JavaScript', 'JavaScript, frequentemente abreviado como JS, é uma linguagem de programação interpretada de alto nível, caracterizada também, como dinâmica, fracamente tipificada, prototype-based e multi-paradigma. Juntamente com HTML e CSS, o JavaScript é uma das três principais tecnologias da World Wide Web. Wikipédia\r\n'),
(5, 'rotas', 'teste de inserção'),
(6, 'PSP', 'PlayStation Portable, também conhecido pela sigla PSP, é um console portátil de videojogos da família PlayStation desenvolvido pela Sony Computer Entertainment. Foi anunciado na E3 de 2004 e lançado em 12 de dezembro de 2004 no Japão, e nos Estados Unidos em 24 de março de 2005. Seu principal concorrente era o Nintendo DS, console portátil da Nintendo.'),
(9, 'Playstation', 'O PlayStation (????????? Pureisut?shon?, oficialmente abreviado PS), frequentemente chamado de PlayStation 1 ou ainda PSOne, foi o primeiro console de vídeo game fabricado pela Sony, lançado em 3 de dezembro de 1994 no Japão, 9 de setembro de 1995 nos Estados Unidos e em 29 de setembro de 1995 na Europa. Desde o seu lançamento até 2006, quando sua produção foi cancelada, o PlayStation vendeu mais de 100 milhões de unidades. Ocupa a posição de segundo console de mesa mais vendido no mundo, com mais de cem milhões de unidades vendidas, superado apenas pelo seu sucessor, o PlayStation 2, que teve mais de 150 milhões de unidades comercializadas');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Banco de dados: `db_ultimetephp_mvc`
--
CREATE DATABASE IF NOT EXISTS `db_ultimetephp_mvc` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `db_ultimetephp_mvc`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `gender` enum('m','f') COLLATE utf8_unicode_ci NOT NULL,
  `birthdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Banco de dados: `db_weblesson_comment`
--
CREATE DATABASE IF NOT EXISTS `db_weblesson_comment` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `db_weblesson_comment`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `comment_id` int(11) NOT NULL,
  `parent_comment_id` int(11) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `comment_sender_name` varchar(40) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbl_comment`
--

INSERT INTO `tbl_comment` (`comment_id`, `parent_comment_id`, `comment`, `comment_sender_name`, `date`) VALUES
(1, 0, 'OlÃ¡ mundo', 'Marcos', '2019-10-07 14:14:49'),
(2, 1, 'Hello warudo', 'Usuario ', '2019-10-07 14:15:33'),
(3, 2, 'Tokio no tomare, ZA WARUDO!', 'Dio', '2019-10-07 14:16:14'),
(4, 3, 'I can\'t be the shit of you withou aproching', 'Jotaro', '2019-10-07 14:17:10'),
(5, 1, 'eae', 'Visior', '2019-10-07 14:26:10'),
(6, 0, 'asd', 'fd', '2019-10-07 14:26:38'),
(7, 6, 'aa', 'ee', '2019-10-07 14:26:46'),
(8, 0, 'Hammm, you\'e aproching me?', 'DIO', '2019-10-07 15:29:48'),
(9, 8, 'I can\'t beat the shit of you without aproching', 'Jotaro', '2019-10-07 15:30:21'),
(10, 9, 'So come as close as you like', 'Dio', '2019-10-07 15:30:38'),
(11, 10, 'OraOraOraOraOraOraOraOraOraOraOraOra', 'Jotaro', '2019-10-07 15:31:01'),
(12, 11, 'MudaMudaMudaMudaMudaMudaMudaMudaMudaMuda', 'Dio', '2019-10-07 15:31:14');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Banco de dados: `laraveltips`
--
CREATE DATABASE IF NOT EXISTS `laraveltips` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `laraveltips`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Marcos', 'marcos_sco@outlook.com', NULL, '$2y$10$QvmaMENtaT2GOlk6bbzI3ulidjmoi9Iz/4dx3erpInof5Js7/9gGC', NULL, '2019-10-02 19:03:29', '2019-10-02 20:23:29'),
(2, 'Viewtiful Joe', 'sixMacine@outlook.com', NULL, '$2y$10$iXIqTuApDUsAlzLiQ5q1DePWFmm9qX8VlP2AozARQK9tzWAqGr0nK', NULL, '2019-10-02 19:05:51', '2019-10-02 20:24:44'),
(3, 'Giorno Giovanna', 'gansta@hotmail.com', NULL, '$2y$10$V7kOwR2owHzBHyQYo/V4VuGfKT1bfjsGy/DCQD7/o4CPJpsThHB0u', NULL, '2019-10-02 20:26:15', '2019-10-02 20:26:36');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Banco de dados: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin DEFAULT NULL,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Extraindo dados da tabela `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"db_sebook\",\"table\":\"usuario\"},{\"db\":\"laraveltips\",\"table\":\"users\"}]');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin DEFAULT NULL,
  `data_sql` longtext COLLATE utf8_bin DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Extraindo dados da tabela `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2019-10-09 18:52:03', '{\"Console\\/Mode\":\"collapse\",\"lang\":\"pt\",\"NavigationWidth\":253}');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Índices para tabela `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Índices para tabela `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Índices para tabela `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Índices para tabela `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Índices para tabela `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Índices para tabela `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Índices para tabela `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Índices para tabela `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Índices para tabela `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Índices para tabela `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Índices para tabela `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Índices para tabela `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Índices para tabela `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Índices para tabela `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Índices para tabela `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Índices para tabela `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Índices para tabela `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Banco de dados: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
