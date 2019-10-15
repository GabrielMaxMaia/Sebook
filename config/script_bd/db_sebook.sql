-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 15-Out-2019 às 04:50
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sebook`
--

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
(31, 'William P. Young', '1', 21);

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
(5, 'M', 'Inicio', 'AL', 'public/imgPerfil/1_1_3.jpg', '231', '489458945894', '0485416941894894', '1997-01-22', '1'),
(9, 'F', NULL, NULL, NULL, NULL, '45687912587', '06589054', '1900-01-01', '1'),
(10, 'M', NULL, NULL, NULL, NULL, '12378965878', '06545687', '1900-01-01', '1'),
(13, 'M', '', '', '', '', '36574159866', '06512987', '1900-01-01', '1'),
(15, 'M', 'yrty', 'AL', 'public/imgPerfil/crash_bandicoot.jpg', 'ytrydsad', 'eyeyh', 'ytry', '2019-10-11', '1'),
(26, 'M', '', '', 'public/imgPerfil/2_2_1.png', '', '', '', '2019-10-11', '1'),
(27, 'M', '', 'FAZ', 'public/imgPerfil/1_1_1.jpg', '', '', '', '2019-10-12', '1'),
(29, 'F', '', '', '', '', '', '', '2019-10-12', '1'),
(37, 'M', '', 'AL', 'public/imgPerfil/sonic.png', '', '', '', '1992-01-01', '1');

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
  `txt_comentario` varchar(500) CHARACTER SET latin1 DEFAULT NULL,
  `data_hora_comentario` datetime DEFAULT NULL,
  `cod_status_comentario` varchar(10) CHARACTER SET latin1 DEFAULT '1',
  `id_post` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_comentario_parente` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_danish_ci;

--
-- Extraindo dados da tabela `comentario`
--

INSERT INTO `comentario` (`id_comentario`, `txt_comentario`, `data_hora_comentario`, `cod_status_comentario`, `id_post`, `id_usuario`, `id_comentario_parente`) VALUES
(95, 'esa', '2019-10-13 23:29:38', '1', 10, 15, 0),
(96, 'eae', '2019-10-13 23:29:48', '1', 11, 15, 0),
(97, 'aea', '2019-10-13 23:29:57', '1', 11, 15, 0),
(90, 'a', '2019-10-13 18:59:41', '1', 4, 5, 0),
(91, 'b', '2019-10-13 18:59:46', '1', 4, 5, 0),
(92, 'Let\'s Rock', '2019-10-13 23:25:48', '1', 1, 37, 0),
(93, 'eae', '2019-10-13 23:27:59', '1', 2, 37, 0),
(94, 'oi', '2019-10-13 23:29:30', '1', 3, 15, 0);

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
  `situacao` int(11) NOT NULL DEFAULT '1'
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
  `id_categoria` int(11) DEFAULT NULL,
  `ano_livro` varchar(20) DEFAULT NULL,
  `cod_status_livro` varchar(10) DEFAULT '1',
  `nome_livro` varchar(100) DEFAULT NULL,
  `sinopse_livro` varchar(3500) DEFAULT NULL,
  `id_editora` int(11) DEFAULT NULL,
  `url_foto_livro` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `livro`
--

INSERT INTO `livro` (`isbn_livro`, `id_categoria`, `ano_livro`, `cod_status_livro`, `nome_livro`, `sinopse_livro`, `id_editora`, `url_foto_livro`) VALUES
('	9788595084292', 2, '2018', '1', 'Prisioneiros da Mente', '\"Um magnata poderoso. Um império tecnológico. E uma família dilacerada. Theo Fester conseguiu vencer uma infância de pobreza e bullying para se tornar um empreendedor mundialmente conhecido. Sua vida pessoal, entretanto, não seguiu o mesmo caminho: ele e seus filhos vivem uma farsa, se digladiando por poder e atenção. Ao se dar conta de que sua família está aprisionada por cárceres mentais, Theo precisará se reinventar mais uma vez e mudar radicalmente seus relacionamentos, antes que seja tarde demais.\"', 23, NULL),
('12345678/94', 1, '2123', '1', 'asdas', 'dsfgsdgsdg', 1, '0'),
('3242342', 1, '2123', '1', 'asdas', 'fggdgf', 1, '0'),
('8532511015', 1, '2000', '1', 'Harry Potter e A Pedra Filosofal', 'Em Harry Potter e a Pedra Filosofal, o leitor é apresentado a Harry, filho de Tiago e Lílian Potter, feiticeiros que foram assassinados por um poderosíssimo bruxo, quando ele ainda era um bebê. Com isso, o menino acaba sendo levado para a casa dos tios que nada tinham a ver com o sobrenatural pelo contrário. Até os 10 anos, Harry foi uma espécie de gata borralheira: maltratado pelos tios, herdava roupas velhas do primo gorducho, tinha óculos remendados e era tratado como um estorvo. No dia de seu aniversário de 11 anos, entretanto, ele parece deslizar por um buraco sem fundo, como o de Alice no país das maravilhas, que o conduz a um mundo mágico. Descobre sua verdadeira história e seu destino: ser um aprendiz de feiticeiro até o dia em que terá que enfrentar a pior força do mal, o homem que assassinou seus pais, o terrível Lorde das Trevas. ', 21, NULL),
('8575421131', 2, '2004', '1', 'O Código da Vinci', 'Um assassinato dentro do Museu do Louvre, em Paris, traz à tona uma sinistra conspiração para revelar um segredo que foi protegido por uma sociedade secreta desde os tempos de Jesus Cristo. A vítima é o respeitado curador do museu, Jacques Saunière, um dos líderes dessa antiga fraternidade, o Priorado de Sião, que já teve como membros Leonardo da Vinci, Victor Hugo e Isaac Newton. Momentos antes de morrer, Saunière consegue deixar uma mensagem cifrada na cena do crime que apenas sua neta, a criptógrafa francesa Sophie Neveu, e Robert Langdon, um famoso simbologista de Harvard, podem desvendar. Os dois transformam-se em suspeitos e em detetives enquanto percorrem as ruas de Paris e de Londres tentando decifrar um intricado quebra-cabeças que pode lhes revelar um segredo milenar que envolve a Igreja Católica.', 24, NULL),
('9780486421230', 2, '2002', '1', 'Swann\'s Way', 'A psychological self-portrait, a clear-eyed social study, and a profound meditation upon the artistic process, Marcel Proust\'s monumental, encyclopedic masterpiece A la recherche du temps perdu (In Search of Lost Time) changed the course of 20th-century literature. Swann\'s Way, the first volume, introduces the novel\'s major themes and its unnamed narrator, an introspective man drawn, in his youth, to fashionable society, like the author himself. Through his narrator\'s consciousness, Proust offers readers a comprehensive portrait of the high society of Paris from the 1870s through the First World War.Swann\'s Way begins with the narrator\'s reminiscences of early childhood -- including, famously, his evocative memory of eating a pastry called a madeleine -- and his fascination with what seemed the separate worlds of his family\'s various neighbors and acquaintances. He then turns his focus to the wealthy connoisseur Charles Swann and his obsessive relationship with the vulgar but radiant courtesan Odette, chronicling in detail the milieu in which it is enacted and its unfortunate effects on him.Du cote de chez Swann first appeared in 1913. It is a bitingly satiric, often comic evocation of French society that addresses a range of philosophical questions about perception, memory, desire, art, family, and politics. On its own or as part of a larger work, it is a rich search for a reality that transcends the passage of time.', 4, NULL),
('9788501110367', 2, '2017', '1', 'Cem Anos De Solidão - Edição Especial', 'Edição comemorativa em capa dura dos 50 anos de publicação da obra-prima de Gabriel García Márquez Neste que é um dos maiores clássicos da literatura, o prestigiado autor narra a incrível e triste história dos Buendía – a estirpe de solitários para a qual não será dada “uma segunda oportunidade sobre a terra” e apresenta o maravilhoso universo da fictícia Macondo, onde se passa o romance. É lá que acompanhamos diversas gerações dessa família, assim como a ascensão e a queda do vilarejo. Para além dos artifícios técnicos e das influências literárias que transbordam do livro, ainda vemos em suas páginas o que por muitos é considerado uma autêntica enciclopédia do imaginário, num estilo que consagrou o colombiano como um dos maiores autores do século XX.', 3, NULL),
('9788516079444', 1, '2012', '1', 'Dom Quixote', 'Apaixonado por histórias de cavalaria, Alonso Quijano passa a acreditar que é um cavaleiro andante. Em seu delírio, muda o nome para Dom Quixote de la Mancha, veste-se com uma armadura improvisada, faz de Dulcineia sua amada, a quem quer dedicar suas glórias e seus feitos. O vizinho Sancho Pança torna-se seu fiel escudeiro. Nenhum cavaleiro andante teve a ousadia de Dom Quixote. Tampouco viveu suas aventuras e desventuras, que aqui são contadas de forma divertida e emocionante. Adaptação de Walcyr Carrasco.', 1, NULL),
('9788527311229', 2, '2018', '1', 'Uniões - A Perfeição do Amor e A Tentação da Quieta Verônica', 'Vagando e divagando pelo corpo, sensações e pensamentos de duas mulheres, Robert Musil, célebre autor de O Homem Sem Qualidades, constrói em Uniões uma narrativa intensamente dramática e fragmentada, de absoluta radicalidade. Traduzido e comentado pela primeira vez em português por Kathrin Rosenfield e Lawrence Flores Pereira, Uniões revive agora em novo contexto, no qual os conflitos de gênero se tornam tão acirrados quanto inevitáveis. Uniões reúne dois contos: A Perfeição do Amor e A Tentação da Quieta Verônica, protagonizados, respectivamente, por Claudine e Verônica. Os traumas psicológicos vividos pelas personagens, ainda na infância, se fazem notar já na idade adulta pelo problema da entrega de corpo, alma e mente ao homem amado. No esforço de lidar com as consequências impostas por pulsões sexuais descontroladas, a primeira procura proteger seu casamento, enquanto a segunda se refugia em idealizações fantasiosas que a impedem do contato humano real. Comparável às tramas psicológicas de Clarice Lispector, Musil recorre a ferramentas narrativas muito a frente de seu tempo para encontrar dimensões afetivas onde os desafios são os mesmos, tanto para homens quanto para mulheres.', 6, NULL),
('9788535928204', 2, '2016', '1', 'A Montanha Mágica', 'Ansiosamente aguardado pelos leitores brasileiros, volta às livrarias o célebre romance A montanha mágica, a grande obra-prima de Thomas Mann. A nova edição tem tradução de Herbert Caro e posfácio inédito de Paulo Astor Soethe, renomado especialista na obra do autor. Neste clássico da literatura alemã, Mann renova a tradição do Bildungsroman — o romance de formação — a partir da trajetória do jovem engenheiro Hans Castorp. Durante uma inesperada estadia de sete anos em um sanatório para tuberculosos nos Alpes suíços, Hans relaciona-se com uma miríade de personagens enfermos que encarnam os conflitos espirituais e ideológicos que antecedem a Primeira Guerra Mundial. Lidando com uma variedade de temas — estados doentios e corpóreos, a arte, o amor, a natureza do tempo e da morte —, este livro, publicado originalmente em 1924, é um dos grandes testamentos literários do século XX e uma das obras inesgotáveis da ficção ocidental.', 2, NULL),
('9788535929225', 2, '2017', '1', 'Anna Karienina', '“Toda a diversidade, todo o encanto, toda a beleza da vida é feita de sombra e de luz”, escreve Liev Tolstói no romance que Fiódor Dostoiévski definiu como “impecável”. Publicado originalmente em forma de fascículos entre 1875 e 1877, antes de finalmente ganhar corpo de livro em 1877, Anna Kariênina continua a causar espanto. Como pode uma obra de arte se parecer tanto com a vida? Com absoluta maestria, Tolstói conduz o leitor por um salão repleto de música, perfumes, vestidos de renda, num ambiente de imagens vívidas e quase palpáveis que têm como pano de fundo a Rússia czarista. Nessa galeria de personagens excessivamente humanos, ninguém está inteiramente a salvo de julgamento: não há heróis, tampouco fracassados, e sim pessoas complexas, ambíguas, que não se restringem a fórmulas prontas. Religião, família, política e classe social são postas à prova no trágico percurso traçado por uma aristocrata casada que, ao se envolver em um caso extraconjugal, experimenta as virtudes e as agruras de um amor profundamente conflituoso, “feito de sombra e de luz”.', 2, NULL),
('9788543104355', 2, '2016', '1', 'O Homem Mais Inteligente da História', 'Considerado o autor brasileiro mais lido da década, Augusto Cury já vendeu 28 milhões de livros. “O homem mais inteligente da história” é fruto de 15 anos de estudos e pesquisas. Considerado por Augusto Cury a obra mais importante de sua carreira, este é o primeiro volume de uma coleção que vai abalar nossas convicções e transformar nossa visão do personagem que julgávamos conhecer tão bem. Psicólogo e pesquisador, Dr. Marco Polo desenvolveu uma teoria inédita sobre o funcionamento da mente e a gestão da emoção. Após sofrer uma terrível perda pessoal, ele vai a Jerusalém participar de um ciclo de conferências na ONU e é confrontado com uma pergunta surpreendente: Jesus sabia gerenciar a própria mente? Ateu convicto, Marco Polo responde que ciência e religião não se misturam. No entanto, instigado pelo tema, decide analisar a inteligência de Cristo à luz das ciências humanas. Ele esperava encontrar um homem simplório, com poucos recursos emocionais. Mas ao mergulhar na inquietante biografia de Jesus presente no Livro de Lucas, suas crenças vão sendo pouco a pouco colocadas em xeque. Para empreender essa incrível jornada, Marco Polo vai contar com uma mesa-redonda composta por dois brilhantes teólogos, um renomado neurocirurgião e sua assistente, a psiquiatra Sofia. Juntos, eles irão decifrar os sentidos ocultos em um dos textos mais famosos do Novo Testamento. Os debates são transmitidos via internet e cativam espectadores em todo o mundo – mas nem todos estão preparados para ver Jesus sob uma ótica tão revolucionária. Agora os intelectuais terão que lidar com seus próprios fantasmas emocionais e encarar perigos que jamais imaginaram enfrentar.', 15, NULL),
('9788544001400', 3, '2017', '1', 'Os Lusíadas', 'Os Lusíadas têm uma importância central na literatura de língua portuguesa: trata-se da obra que consolidou o português moderno e elevou o idioma ao patamar de língua respeitada culturalmente. Mais do que sintetizar os anseios de uma nação e de todo um período histórico – glória reservada a poucos –, com Os Lusíadas, Camões imortalizou-se como um tesouro português legado à humanidade.', 8, NULL),
('9788544001868', 2, '2018', '1', 'Persuasão', '\"Persuasão” foi o último trabalho completo de Jane Austen. O livro conta a história de Anne Elliot, uma das heroínas mais tranquilas e reservadas de Austen, mas, ao mesmo tempo, uma das mais fortes e abertas às mudanças. O livro enaltece a constância do amor numa época turbulenta na história da Inglaterra: as guerras napoleônicas. Escrito nesse período, o romance descreve como uma mulher pode permanecer fiel ao seu passado e, ainda assim, pensar em um futuro feliz. Austen expõe de maneira sutil como uma mulher pode passar por cima das convenções sociais e das restrições femininas em busca da felicidade.', 8, NULL),
('9788560280940', 12, '2014', '1', 'It - A Coisa', 'Durante as férias escolares de 1958, em Derry, pacata cidadezinha do Maine, Bill, Richie, Stan, Mike, Eddie, Ben e Beverly aprenderam o real sentido da amizade, do amor, da confiança e... do medo. O mais profundo e tenebroso medo. Naquele verão, eles enfrentaram pela primeira vez a Coisa, um ser sobrenatural e maligno que deixou terríveis marcas de sangue em Derry. Quase trinta anos depois, os amigos voltam a se encontrar. Uma nova onda de terror tomou a pequena cidade. Mike Hanlon, o único que permanece em Derry, dá o sinal. Precisam unir forças novamente. A Coisa volta a atacar e eles devem cumprir a promessa selada com sangue que fizeram quando crianças. Só eles têm a chave do enigma. Só eles sabem o que se esconde nas entranhas de Derry. O tempo é curto, mas somente eles podem vencer a Coisa. Em \"It - A Coisa\", clássico de Stephen King em nova edição, os amigos irão até o fim, mesmo que isso signifique ultrapassar os próprios limites.', 22, NULL),
('9788563560421', 2, '2012', '1', 'Ulysses', 'Um homem sai de casa pela manhã, cumpre com as tarefas do dia e, pela noite, retorna ao lar. Foi em torno desse esqueleto enganosamente simples, quase banal, que James Joyce elaborou o que veio a ser o grande romance do século XX. Inspirado na Odisseia de Homero, Ulysses é ambientado em Dublin, e narra as aventuras de Leopold Bloom e seu amigo Stephen Dedalus ao longo do dia 16 de junho de 1904. Tal como o Ulisses homérico, Bloom precisa superar numerosos obstáculos e tentações até retornar ao apartamento na rua Eccles, onde sua mulher, Molly, o espera. Para criar esse personagem rico e vibrante, Joyce misturou numerosos estilos e referências culturais, num caleidoscópio de vozes que tem desafiado gerações de leitores e estudiosos ao redor do mundo. O culto em torno de Ulysses teve início antes mesmo de sua publicação em livro, quando trechos do romance começaram a aparecer num jornal literário dos EUA. Por conta dessas passagens, Ulysses foi banido nos Estados Unidos, numa acusação de obscenidade, dando início a uma longa pendenga legal, que seria resolvida apenas onze anos depois, com a liberação do romance em solo americano. Mas, para além das disputas e polêmicas, Ulysses segue como um divisor de águas por conta do êxito do autor no principal ponto do romance: esticar e moldar a língua inglesa ao limite, a fim de retirar disso um retrato fiel, divertido e comovente do que se convencionou chamar de o “homem moderno”. Em seu clássico estudo sobre a obra de James Joyce, Homem comum enfim, o crítico e escritor britânico Anthony Burgess afirma que, “se alguma vez houve um grande escritor popular, Joyce foi este escritor”. Guiado por esse espírito eminentemente democrático da escrita joyceana, Caetano Galindo realizou esta nova tradução de Ulysses, a fim de captar “a imensa gama de cores, registros, estilos, recursos e efeitos” de sua prosa revolucionária.', 9, NULL),
('9788573264241', 3, '2016', '1', 'A Divina Comédia', 'Texto fundador da língua italiana, súmula da cosmovisão de toda uma época, monumento poético de rigor e beleza, obra magna da literatura universal. É fato que a \"Comédia\" merece esses e muitos outros adjetivos de louvor, incluindo o \"divina\" que Boccaccio lhe deu já no século XIV. Mas também é certo que, como bom clássico, este livro reserva a cada novo leitor a prazerosa surpresa de renascer revigorado, como vem fazendo de geração em geração há quase setecentos anos. A longa jornada dantesca através do Inferno, Purgatório e Paraíso é aqui oferecida na íntegra — com seus mais de 14 mil decassílabos divididos em cem cantos e três partes — na rigorosa tradução de Italo Eugenio Mauro, vencedora do Prêmio Jabuti e celebrada por sua fidelidade à métrica e à rima originais. A edição traz ainda, como prefácio, um inspirado ensaio de Otto Maria Carpeaux.', 5, NULL),
('9788580573749', 2, '2013', '1', 'Cidades de Papel', 'Quentin Jacobsen tem uma paixão platônica pela magnífica vizinha e colega de escola Margo Roth Spiegelman. Até que em um cinco de maio que poderia ter sido outro dia qualquer, ela invade sua vida pela janela de seu quarto, com a cara pintada e vestida de ninja, convocando-o a fazer parte de um engenhoso plano de vingança. E ele, é claro, aceita. ', 10, NULL),
('9788581863351', 2, '2019', '1', 'A Metamorfose', 'Franz Kafka é um dos autores mais lidos, analisados e discutidos da literatura mundial após a Primeira Guerra, segundo o professor, ensaísta e tradutor Modesto Carone, não só por ser um autor original e inteligente, mas porque em sua obra encontramos a \"imagem mais poderosa e penetrante de nosso mundo vincado pela falsa consciência\". Conhecida por ter seu herói Gregor Samsa metamorfoseado em inseto, esta novela enfoca a existência humana em um mundo que leva os indivíduos à solidão. Com uma narrativa ágil, seduz o leitor por seu rigoroso apuro técnico.', 7, NULL),
('9788582850404', 4, '2016', '1', 'Romeu E Julieta', 'Há muito tempo duas famílias banham em sangue as ruas de Verona. Enquanto isso, na penumbra das madrugadas, ardem as brasas de um amor secreto. Romeu, filho dos Montéquio, e Julieta, herdeira dos Capuleto, desafiam a rixa familiar e sonham com um impossível futuro, longe da violência e da loucura. “Romeu e Julieta” é a primeira das grandes tragédias de William Shakespeare, e esta nova tradução de José Francisco Botelho recria com maestria o ritmo ao mesmo tempo frenético e melancólico do texto shakespeariano. Contando também com um excelente ensaio introdutório do especialista Adrian Poole, esta edição traz nova vida a uma das mais emocionantes histórias de amor já contadas.', 9, NULL),
('9788584390670', 2, '2017', '1', 'O Alquimista', 'Paulo Coelho já inspirou mais de 200 milhões de leitores por todo o mundo com este romance encantador. Esta história, brilhante em sua simplicidade e com uma sabedoria que nos estimula, é sobre um jovem pastor da Andaluzia chamado Santiago que viaja de sua cidade natal na Espanha para o deserto do Egito em busca de um tesouro escondido perto das Pirâmides. Ao longo do caminho, ele encontra uma cigana, um homem que se diz rei e um alquimista, que lhe indicam a direção para a sua busca. Ninguém sabe que tesouro é esse, ou se Santiago será capaz de ultrapassar os obstáculos de seu trajeto. Mas o que começa como uma jornada para encontrar bens mundanos se transforma na descoberta do tesouro que se encontra dentro dele mesmo. Emocionante e profundamente humano, este clássico contemporâneo é um testamento eterno do poder transformador dos nossos sonhos e da importância de ouvirmos nossos corações.', 25, NULL),
('9788599296363', 2, '2008', '1', 'A Cabana', 'A filha mais nova de Mackenzie Allen Philip foi raptada durante as férias em família e há evidências de que ela foi brutalmente assassinada e abandonada numa cabana. Quatro anos mais tarde, Mack recebe uma nota suspeita, aparentemente vinda de Deus, convidando-o para voltar áquele cabana para passar o fim de semana. Ignorando alertas de que poderia ser uma cilada, ele segue numa tarde de inverno e volta a cenário de seu pior pesadelo. O que encontra lá muda sua vida para sempre. Num mundo em que religião parece tornar-se irrelevante, \"A Cabana\" invoca a pergunta: \"Se Deus é tão poderoso e tão cheio de amor, por que não faz nada para amenizar a dor e o sofrimento do mundo?\" As respostas encontradas por Mack surpreenderão você e, provavelmente, o transformarão tanto quanto ele.', 15, NULL);

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
(31, '9788516079444');

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
  `url_foto_post` varchar(100) DEFAULT 'public/imgPost/imgPadrao/padrao.jpg',
  `txt_postagem` text,
  `titulo_post` text,
  `cod_status_post` varchar(10) DEFAULT '1',
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `postagem`
--

INSERT INTO `postagem` (`id_post`, `data_hora_post`, `link_post`, `url_foto_post`, `txt_postagem`, `titulo_post`, `cod_status_post`, `id_usuario`) VALUES
(1, '2019-10-09 21:08:03', NULL, 'public/imgPost/imgPadrao/padrao.jpg', 'PHP (um acrÃ´nimo recursivo para \"PHP: Hypertext Preprocessor\", originalmente Personal Home Page) Ã© uma linguagem interpretada livre, usada originalmente apenas para o desenvolvimento de aplicaÃ§Ãµes presentes e atuantes no lado do servidor, capazes de gerar conteÃºdo dinÃ¢mico na World Wide Web.[3] Figura entre as primeiras linguagens passÃ­veis de inserÃ§Ã£o em documentos HTML, dispensando em muitos casos o uso de arquivos externos para eventuais processamentos de dados. O cÃ³digo Ã© interpre', 'PHP', '1', 5),
(2, '2019-10-09 21:08:23', NULL, 'public/imgPost/imgPadrao/padrao.jpg', '              JavaScript, frequentemente abreviado como JS, Ã© uma linguagem de programaÃ§Ã£o interpretada de alto nÃ­vel, caracterizada tambÃ©m, como dinÃ¢mica, fracamente tipificada, prototype-based e multi-paradigma.[2] Juntamente com HTML e CSS, o JavaScript Ã© uma das trÃªs principais tecnologias da World Wide Web. JavaScript permite pÃ¡ginas da Web interativas e, portanto, Ã© uma parte essencial dos aplicativos da web. A grande maioria dos sites usa, e todos os principais navegadores tÃªm um mecanismo JavaScript dedicado para executÃ¡-lo.  Ã‰ atualmente a principal linguagem para programaÃ§Ã£o client-side em navegadores web. Ã‰ tambÃ©m bastante utilizada do lado do servidor atravÃ©s de ambientes como o node.js.  Como uma linguagem multi-paradigma, o JavaScript suporta estilos de programaÃ§Ã£o orientados a eventos, funcionais e imperativos (incluindo orientado a objetos e prototype-based), apresentando recursos como fechamentos (closures) e funÃ§Ãµes de alta ordem comumente indisponÃ­veis em linguagens populares como Java e C++. PossuÃ­ APIs para trabalhar com texto, matrizes, datas, expressÃµes regulares e o DOM, mas a linguagem em si nÃ£o inclui nenhuma E/S, como instalaÃ§Ãµes de rede, armazenamento ou grÃ¡ficos, contando com isso no ambiente host em que estÃ¡ embutido.  Foi originalmente implementada como parte dos navegadores web para que scripts pudessem ser executados do lado do cliente e interagissem com o usuÃ¡rio sem a necessidade deste script passar pelo servidor, controlando o navegador, realizando comunicaÃ§Ã£o assÃ­ncrona e alterando o conteÃºdo do documento exibido, porÃ©m os mecanismos JavaScript agora estÃ£o incorporados em muitos outros tipos de software host, incluindo servidores em servidores e bancos de dados da Web e em programas que nÃ£o sÃ£o da Web, como processadores de texto e PDF, e em tempo de execuÃ§Ã£o ambientes que disponibilizam JavaScript para escrever aplicativos mÃ³veis e de desktop, incluindo widgets de Ã¡rea de trabalho.  Os termos Vanilla JavaScript e Vanilla JS se referem ao JavaScript nÃ£o estendido por qualquer estrutura ou biblioteca adicional. Scripts escritos em Vanilla JS sÃ£o cÃ³digos JavaScript simples.[3][4]  Embora existam semelhanÃ§as entre JavaScript e Java, incluindo o nome da linguagem, a sintaxe e as respectivas bibliotecas padrÃ£o, as duas linguagens sÃ£o distintas e diferem muito no design; JavaScript foi influenciado por linguagens de programaÃ§Ã£o como Self e Scheme.        ', 'Javascript', '1', 5),
(3, '2019-10-13 00:52:42', NULL, 'public/imgPost/imgPadrao/padrao.jpg', 'Eu programo\r\n', 'OlÃ¡ mundosss', '1', 15),
(4, '2019-10-13 17:16:01', NULL, 'public/imgPost/imgPadrao/padrao.jpg', '       eae    ', 'asss', '1', 5),
(5, '2019-10-13 17:49:23', NULL, 'public/imgPost/coding-825x500.jpg', '                                eae                        ', 'PHP', '1', 5),
(6, '2019-10-13 19:43:28', NULL, 'public/imgPost/imgPadrao/padrao.jpg', '           dsfs', 'segfs', '1', 5),
(7, '2019-10-13 19:45:35', NULL, 'public/imgPost/imgPadrao/padrao.jpg', 'fsdafsdfsdf', 'teste', '1', 5),
(8, '2019-10-13 19:45:42', NULL, 'public/imgPost/2_1_13.png', '                fsdafsdfsdf            ', 'teste', '1', 5),
(9, '2019-10-13 19:56:28', NULL, 'public/imgPost/mario.jpg', '                                fsdafsdfsdf                        ', 'teste', '1', 5),
(10, '2019-10-13 19:56:34', NULL, 'public/imgPost/gon.png', '                                                       dasd                                        ', 'OlÃ¡ mundosss', '1', 5),
(11, '2019-10-13 21:57:35', NULL, 'public/imgPost/imgPadrao/padrao.jpg', '                                dsadas                        ', 'usuario comum', '1', 5),
(12, '2019-10-13 23:44:59', NULL, 'public/imgPost/imgPadrao/padrao.jpg', '                                safdsad                        ', 'teste', '1', 37),
(13, '2019-10-13 23:54:41', NULL, 'public/imgPost/bait.jpg', '                                                                sdfsd                                                ', 'bait', '1', 37);

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
  `cod_status_sebo` varchar(10) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `sebo`
--

INSERT INTO `sebo` (`id_usuario`, `razao_sebo`, `nome_fantasia`, `cnpj_sebo`, `url_foto_sebo`, `num_end_sebo`, `compl_end_sebo`, `logradouro_sebo`, `cep_end_sebo`, `num_tel_sebo`, `celular_1_sebo`, `celular_2_sebo`, `insc_estadual_sebo`, `url_site_sebo`, `cod_status_sebo`) VALUES
(11, 'Abigail de Queiroz Moreira Pereira', 'Sebo do Marcao', '20.035.914/0001-03', NULL, '111', NULL, NULL, '06410-080', '1141986832', NULL, NULL, NULL, NULL, '1'),
(12, 'Mirian Marinho da Silva Lima', 'Sebo Marinho', '12.672.074/0001-53', NULL, '115', NULL, NULL, '06320-290', '1143867762', NULL, NULL, NULL, NULL, '1'),
(14, 'Priscilla Nobre Lobo', 'Sebo e Livraria Corujinha', '21.100.930/0001-97', NULL, '179', NULL, NULL, '06448-020', '1128614286', NULL, NULL, NULL, NULL, '1'),
(34, 'Pirate king', 'dasdgdfg', 'dfgdgdfg', 'dsadsa', 'dasdad', 'dsada', 'dsadsa', 'dasdsad', 'asdsad', 'dsadad', 'trhtrh', 'sadd', 'dsad', '1'),
(35, 'dsa', 'dsa', 'asd', 'public/imgPerfilSebo/1_1_1.jpg', 'dsa', 'dasdsa', 'AV', 'ads', 'sad', 'dsadsa', 'dsad', 'sda', 'dsa', '1'),
(36, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');

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
(11, '9788516079444', 9),
(11, '9788599296363', 9),
(12, '9788516079444', 5),
(14, '3242342', 6),
(14, '9788516079444', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(50) DEFAULT NULL,
  `sobrenome_usuario` varchar(50) DEFAULT NULL,
  `email_usuario` varchar(100) DEFAULT NULL,
  `senha_usuario` varchar(255) DEFAULT NULL,
  `cod_status_usuario` varchar(10) DEFAULT '1',
  `id_perfil` int(11) DEFAULT NULL,
  `data_criacao` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome_usuario`, `sobrenome_usuario`, `email_usuario`, `senha_usuario`, `cod_status_usuario`, `id_perfil`, `data_criacao`) VALUES
(1, 'Ruan', 'Costa de Oliveira', 'ruanc_oliveira@hotmail.com', '$2y$08$4chmBEvSw1/8MvLRtmi4teQimTgZvFWHdbN/FCsYNjRYZBt8Rvbwy', '1', 1, '2019-09-18 00:00:00'),
(2, 'Divanilda', 'Cristina da Cruz', 'rm35615@estudante.fieb.edu.br', '$2y$08$4chmBEvSw1/8MvLRtmi4teQimTgZvFWHdbN/FCsYNjRYZBt8Rvbwy', '1', 1, '2019-09-18 00:00:00'),
(3, 'Gabriel Max', 'Maia do Carmo', 'rm35880@estudante.fieb.edu.br', '$2y$08$4chmBEvSw1/8MvLRtmi4teQimTgZvFWHdbN/FCsYNjRYZBt8Rvbwy', '1', 1, '2019-09-18 00:00:00'),
(5, 'Marcos', 'Santos Carvalho', 'marcos_sco@outlook.com', '$2y$08$5nGdB4I7yBlWv2.8n9MrWOPCVorkFQ4iMrN.2J.VfVL1sagCMhlnu', '1', 1, '2019-09-18 00:00:00'),
(6, 'Joyce Victoria', 'Leite Oquendo', 'rm35881@estudante.fieb.edu.br', '$2y$08$4chmBEvSw1/8MvLRtmi4teQimTgZvFWHdbN/FCsYNjRYZBt8Rvbwy', '1', 2, '2019-09-18 00:00:00'),
(7, 'Daniele Maria', 'França', 'rm36113@estudante.fieb.edu.br', '$2y$08$4chmBEvSw1/8MvLRtmi4teQimTgZvFWHdbN/FCsYNjRYZBt8Rvbwy', '1', 3, '2019-09-18 00:00:00'),
(8, 'Jennifer', 'Keity Guimarães', 'rm36139@estudante.fieb.edu.br', '$2y$08$4chmBEvSw1/8MvLRtmi4teQimTgZvFWHdbN/FCsYNjRYZBt8Rvbwy', '1', 3, '2019-09-18 00:00:00'),
(9, 'Suelane', 'Garcia Fontes', 'suelane.fontes@docente.fieb.edu.br', '$2y$08$4chmBEvSw1/8MvLRtmi4teQimTgZvFWHdbN/FCsYNjRYZBt8Rvbwy', '1', 4, '2019-09-18 00:00:00'),
(10, 'Giovani', 'Barbosa Wingter', 'giovani.wingter@docente.fieb.edu.br', '$2y$08$4chmBEvSw1/8MvLRtmi4teQimTgZvFWHdbN/FCsYNjRYZBt8Rvbwy', '1', 4, '2019-09-18 00:00:00'),
(11, 'Abigail', 'Queiroz Moreira Pereira', 'sebodomarcao@uol.com.br', '$2y$08$4chmBEvSw1/8MvLRtmi4teQimTgZvFWHdbN/FCsYNjRYZBt8Rvbwy', '1', 5, '2019-09-18 00:00:00'),
(12, 'Mirian', 'Marinho da Silva Lima', 'sebosantafe@hotmail.com', '$2y$08$4chmBEvSw1/8MvLRtmi4teQimTgZvFWHdbN/FCsYNjRYZBt8Rvbwy', '1', 5, '2019-09-18 00:00:00'),
(13, 'Denis', 'Monteiro Guimaraes', 'denis.guimaraes@docente.fieb.edu.br', '$2y$08$4chmBEvSw1/8MvLRtmi4teQimTgZvFWHdbN/FCsYNjRYZBt8Rvbwy', '1', 4, '2019-09-18 00:00:00'),
(14, 'Priscilla', 'Nobre Lobo', 'globalnetconsultoria@globo.com', '$2y$08$4chmBEvSw1/8MvLRtmi4teQimTgZvFWHdbN/FCsYNjRYZBt8Rvbwy', '1', 5, '2019-09-18 00:00:00'),
(15, 'Master', 'adm ', 'master@outlook.com', '$2a$08$MTEzMzU2MjExNzVkYTIzYOazK8T1EZGH1qpbfDEdWcx3a7KdfPfqW', '1', 1, '2019-10-09 21:02:53'),
(16, 'Admin 1', 'adm', 'adm1@outlook.com', '$2y$08$4chmBEvSw1/8MvLRtmi4teQimTgZvFWHdbN/FCsYNjRYZBt8Rvbwy', '1', 2, '2019-10-09 21:03:42'),
(17, 'Admin 2', 'adm ', 'adm2@outlook.com', '$2y$08$4chmBEvSw1/8MvLRtmi4teQimTgZvFWHdbN/FCsYNjRYZBt8Rvbwy', '1', 3, '2019-10-09 21:04:14'),
(18, 'Usuario', 'Cliente', 'cliente@outlook.com', '$2y$08$4chmBEvSw1/8MvLRtmi4teQimTgZvFWHdbN/FCsYNjRYZBt8Rvbwy', '1', 4, '2019-10-09 21:07:01'),
(19, 'Sebo', 'usuario', 'sebo@outlook.com', '$2y$08$4chmBEvSw1/8MvLRtmi4teQimTgZvFWHdbN/FCsYNjRYZBt8Rvbwy', '1', 5, '2019-10-09 21:07:27'),
(26, 'Giorno', 'Giovana', 'stand@outlook.com', '$2y$08$5nGdB4I7yBlWv2.8n9MrWOPCVorkFQ4iMrN.2J.VfVL1sagCMhlnu', '1', 4, '2019-10-11 00:44:10'),
(27, 'Viewtiful ', 'Joe', 'sixMachine@outlook.com', '$2a$08$NjMzNjExMjAyNWRhMjI4NOM8NjRbDElnWbDL0akjvLVnRCjQ.rr8K', '1', 5, '2019-10-12 16:24:05'),
(29, 'teste', 'dsad', 'tes@outlook.com', '$2a$08$NDQ1MDQxMDk0NWRhMjQyM.TKV/JqfDZ2kebp4i5v1lOIPQl3jwb8C', '1', 4, '2019-10-12 18:13:40'),
(34, 'Giorno', 'adm', 'gansd@outlook.com', '$2a$08$ODM1OTQwMzA2NWRhMjY2ZOwzpYYg.3K8eA9jZ1Fs8ZyQtICEg9/xG', '1', 5, '2019-10-12 20:51:08'),
(35, 'Luffy', 'Mokey D.', 'luffy@outlook.com', '$2a$08$MTUxODIzNzQxNjVkYTI4YuU9atiqVfNVpSJd/jOjOHVSKPep7VaCO', '1', 5, '2019-10-12 23:13:39'),
(36, 'Giorno', 'adm', 'gansd@outlook.com', '$2a$08$MzQ4OTMyMTA2NWRhMjkzM.ZGzBU38O/OEUz4PfisxN.wnt2YPt8Yi', '1', 5, '2019-10-12 23:59:18'),
(37, 'Sonic', 'the headhog', 'sonic@outlook.com', '$2a$08$MTU2NjEwNDA5MjVkYTNkYuUazvVaSHQMYS.oLcepyoVE2Xq9HO2..', '1', 4, '2019-10-13 23:23:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`id_autor`),
  ADD KEY `id_nacionalidade` (`id_nacionalidade`);

--
-- Indexes for table `avaliacao_sebo`
--
ALTER TABLE `avaliacao_sebo`
  ADD PRIMARY KEY (`id_usuario_sebo`,`id_usuario`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indexes for table `cliente_sebo`
--
ALTER TABLE `cliente_sebo`
  ADD PRIMARY KEY (`id_usuario`,`id_usuario_sebo`),
  ADD KEY `id_usuario_sebo` (`id_usuario_sebo`);

--
-- Indexes for table `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `id_post` (`id_post`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `editora`
--
ALTER TABLE `editora`
  ADD PRIMARY KEY (`id_editora`);

--
-- Indexes for table `emails_lidos`
--
ALTER TABLE `emails_lidos`
  ADD PRIMARY KEY (`id_emails_lidos`);

--
-- Indexes for table `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id_evento`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `links_emails`
--
ALTER TABLE `links_emails`
  ADD PRIMARY KEY (`id_link`),
  ADD KEY `id_emails_lidos` (`id_emails_lidos`);

--
-- Indexes for table `livro`
--
ALTER TABLE `livro`
  ADD PRIMARY KEY (`isbn_livro`),
  ADD KEY `id_editora` (`id_editora`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indexes for table `livro_autor`
--
ALTER TABLE `livro_autor`
  ADD PRIMARY KEY (`id_autor`,`isbn_livro`),
  ADD KEY `id_autor` (`id_autor`),
  ADD KEY `fk_livro_autor_livro1_idx` (`isbn_livro`);

--
-- Indexes for table `mensagem`
--
ALTER TABLE `mensagem`
  ADD PRIMARY KEY (`id_usuario`,`id_usuario_sebo`,`data_hora_msg`);

--
-- Indexes for table `nacionalidade`
--
ALTER TABLE `nacionalidade`
  ADD PRIMARY KEY (`id_nacionalidade`);

--
-- Indexes for table `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Indexes for table `postagem`
--
ALTER TABLE `postagem`
  ADD PRIMARY KEY (`id_post`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `sebo`
--
ALTER TABLE `sebo`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indexes for table `sebo_livro`
--
ALTER TABLE `sebo_livro`
  ADD PRIMARY KEY (`id_usuario`,`isbn_livro`),
  ADD KEY `fk_sebo_has_livro_livro1_idx` (`isbn_livro`),
  ADD KEY `fk_sebo_has_livro_sebo1_idx` (`id_usuario`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_perfil` (`id_perfil`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `autor`
--
ALTER TABLE `autor`
  MODIFY `id_autor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `editora`
--
ALTER TABLE `editora`
  MODIFY `id_editora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `emails_lidos`
--
ALTER TABLE `emails_lidos`
  MODIFY `id_emails_lidos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id_evento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `links_emails`
--
ALTER TABLE `links_emails`
  MODIFY `id_link` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `nacionalidade`
--
ALTER TABLE `nacionalidade`
  MODIFY `id_nacionalidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `postagem`
--
ALTER TABLE `postagem`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
