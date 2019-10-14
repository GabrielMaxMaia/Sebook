-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14-Out-2019 às 18:02
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
-- Banco de dados: `db_sebook`
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
(9, 'F', NULL, NULL, NULL, NULL, '45687912587', '06589054', '1900-01-01', '1'),
(10, 'M', NULL, NULL, NULL, NULL, '12378965878', '06545687', '1900-01-01', '1'),
(13, 'M', 'd', 'g', NULL, '', '36574159866', '06512987', '1900-01-01', '1'),
(15, 'M', 'dsaasd', 'AL', 'public/imgPerfil/FDE.jpg', 'dsaasss', 'dsa', 'das', '1997-01-22', '1'),
(20, 'F', 'dfg', 'AL', '', 'fdsg', 'gdfgfd', 'gdfg', '2019-11-10', '1'),
(52, 'M', 'rewr', 'LGO', '', '5435435', '4342345452d', '45435345', '2019-10-11', '1'),
(55, NULL, NULL, NULL, 'public/imgPerfil/imgPadrao/padrao.png', NULL, NULL, NULL, NULL, '1');

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
(1, 'Olá mundo', '2019-10-10 17:04:25', '1', 1, 5, NULL),
(2, 'dasd', '2019-10-10 15:52:31', '1', 0, 0, NULL),
(3, 'olp', '2019-10-10 15:54:35', '1', 0, 0, NULL),
(5, 'olÃ¡', '2019-10-14 10:01:34', '1', 2, 15, 0),
(6, '                        eaess                    ', '2019-10-14 10:10:11', '1', 1, 15, 0),
(7, 'as', '2019-10-14 10:10:34', '0', 1, 15, 0),
(8, '                        as                                  ', '2019-10-14 10:10:43', '0', 1, 15, 7);

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
  `id_autor` int(11) DEFAULT NULL,
  `ano_livro` varchar(20) DEFAULT NULL,
  `url_foto_livro` varchar(45) DEFAULT NULL,
  `nome_livro` varchar(100) DEFAULT NULL,
  `sinopse_livro` varchar(3500) DEFAULT NULL,
  `cod_status_livro` varchar(10) DEFAULT '1',
  `id_editora` int(11) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `livro`
--

INSERT INTO `livro` (`isbn_livro`, `id_autor`, `ano_livro`, `url_foto_livro`, `nome_livro`, `sinopse_livro`, `cod_status_livro`, `id_editora`, `id_categoria`) VALUES
('	9788595084292', NULL, '2018', NULL, 'Prisioneiros da Mente', '\"Um magnata poderoso. Um império tecnológico. E uma família dilacerada. Theo Fester conseguiu vencer uma infância de pobreza e bullying para se tornar um empreendedor mundialmente conhecido. Sua vida pessoal, entretanto, não seguiu o mesmo caminho: ele e seus filhos vivem uma farsa, se digladiando por poder e atenção. Ao se dar conta de que sua família está aprisionada por cárceres mentais, Theo precisará se reinventar mais uma vez e mudar radicalmente seus relacionamentos, antes que seja tarde demais.\"', '1', 23, 2),
('8532511015', NULL, '2000', NULL, 'Harry Potter e A Pedra Filosofal', 'Em Harry Potter e a Pedra Filosofal, o leitor é apresentado a Harry, filho de Tiago e Lílian Potter, feiticeiros que foram assassinados por um poderosíssimo bruxo, quando ele ainda era um bebê. Com isso, o menino acaba sendo levado para a casa dos tios que nada tinham a ver com o sobrenatural pelo contrário. Até os 10 anos, Harry foi uma espécie de gata borralheira: maltratado pelos tios, herdava roupas velhas do primo gorducho, tinha óculos remendados e era tratado como um estorvo. No dia de seu aniversário de 11 anos, entretanto, ele parece deslizar por um buraco sem fundo, como o de Alice no país das maravilhas, que o conduz a um mundo mágico. Descobre sua verdadeira história e seu destino: ser um aprendiz de feiticeiro até o dia em que terá que enfrentar a pior força do mal, o homem que assassinou seus pais, o terrível Lorde das Trevas. ', '1', 21, 1),
('8575421131', NULL, '2004', NULL, 'O Código da Vinci', 'Um assassinato dentro do Museu do Louvre, em Paris, traz à tona uma sinistra conspiração para revelar um segredo que foi protegido por uma sociedade secreta desde os tempos de Jesus Cristo. A vítima é o respeitado curador do museu, Jacques Saunière, um dos líderes dessa antiga fraternidade, o Priorado de Sião, que já teve como membros Leonardo da Vinci, Victor Hugo e Isaac Newton. Momentos antes de morrer, Saunière consegue deixar uma mensagem cifrada na cena do crime que apenas sua neta, a criptógrafa francesa Sophie Neveu, e Robert Langdon, um famoso simbologista de Harvard, podem desvendar. Os dois transformam-se em suspeitos e em detetives enquanto percorrem as ruas de Paris e de Londres tentando decifrar um intricado quebra-cabeças que pode lhes revelar um segredo milenar que envolve a Igreja Católica.', '1', 24, 2),
('9780486421230', NULL, '2002', NULL, 'Swann\'s Way', 'A psychological self-portrait, a clear-eyed social study, and a profound meditation upon the artistic process, Marcel Proust\'s monumental, encyclopedic masterpiece A la recherche du temps perdu (In Search of Lost Time) changed the course of 20th-century literature. Swann\'s Way, the first volume, introduces the novel\'s major themes and its unnamed narrator, an introspective man drawn, in his youth, to fashionable society, like the author himself. Through his narrator\'s consciousness, Proust offers readers a comprehensive portrait of the high society of Paris from the 1870s through the First World War.Swann\'s Way begins with the narrator\'s reminiscences of early childhood -- including, famously, his evocative memory of eating a pastry called a madeleine -- and his fascination with what seemed the separate worlds of his family\'s various neighbors and acquaintances. He then turns his focus to the wealthy connoisseur Charles Swann and his obsessive relationship with the vulgar but radiant courtesan Odette, chronicling in detail the milieu in which it is enacted and its unfortunate effects on him.Du cote de chez Swann first appeared in 1913. It is a bitingly satiric, often comic evocation of French society that addresses a range of philosophical questions about perception, memory, desire, art, family, and politics. On its own or as part of a larger work, it is a rich search for a reality that transcends the passage of time.', '1', 4, 2),
('9788501110367', NULL, '2017', NULL, 'Cem Anos De Solidão - Edição Especial', 'Edição comemorativa em capa dura dos 50 anos de publicação da obra-prima de Gabriel García Márquez Neste que é um dos maiores clássicos da literatura, o prestigiado autor narra a incrível e triste história dos Buendía – a estirpe de solitários para a qual não será dada “uma segunda oportunidade sobre a terra” e apresenta o maravilhoso universo da fictícia Macondo, onde se passa o romance. É lá que acompanhamos diversas gerações dessa família, assim como a ascensão e a queda do vilarejo. Para além dos artifícios técnicos e das influências literárias que transbordam do livro, ainda vemos em suas páginas o que por muitos é considerado uma autêntica enciclopédia do imaginário, num estilo que consagrou o colombiano como um dos maiores autores do século XX.', '1', 3, 2),
('9788516079444', 0, '2012', '0', 'Dom Quixote', 'Apaixonado por histï¿½rias de cavalaria, Alonso Quijano passa a acreditar que ï¿½ um cavaleiro andante. Em seu delï¿½rio, muda o nome para Dom Quixote de la Mancha, veste-se com uma armadura improvisada, faz de Dulcineia sua amada, a quem quer dedicar suas glï¿½rias e seus feitos. O vizinho Sancho Panï¿½a torna-se seu fiel escudeiro. Nenhum cavaleiro andante teve a ousadia de Dom Quixote. Tampouco viveu suas aventuras e desventuras, que aqui sï¿½o contadas de forma divertida e emocionante. Adaptaï¿½ï¿½o de Walcyr Carrasco.', '1', 1, 1),
('9788527311229', NULL, '2018', NULL, 'Uniões - A Perfeição do Amor e A Tentação da Quieta Verônica', 'Vagando e divagando pelo corpo, sensações e pensamentos de duas mulheres, Robert Musil, célebre autor de O Homem Sem Qualidades, constrói em Uniões uma narrativa intensamente dramática e fragmentada, de absoluta radicalidade. Traduzido e comentado pela primeira vez em português por Kathrin Rosenfield e Lawrence Flores Pereira, Uniões revive agora em novo contexto, no qual os conflitos de gênero se tornam tão acirrados quanto inevitáveis. Uniões reúne dois contos: A Perfeição do Amor e A Tentação da Quieta Verônica, protagonizados, respectivamente, por Claudine e Verônica. Os traumas psicológicos vividos pelas personagens, ainda na infância, se fazem notar já na idade adulta pelo problema da entrega de corpo, alma e mente ao homem amado. No esforço de lidar com as consequências impostas por pulsões sexuais descontroladas, a primeira procura proteger seu casamento, enquanto a segunda se refugia em idealizações fantasiosas que a impedem do contato humano real. Comparável às tramas psicológicas de Clarice Lispector, Musil recorre a ferramentas narrativas muito a frente de seu tempo para encontrar dimensões afetivas onde os desafios são os mesmos, tanto para homens quanto para mulheres.', '1', 6, 2),
('9788535928204', 0, '2016', '0', 'A Montanha Mï¿½gica', 'Ansiosamente aguardado pelos leitores brasileiros, volta ï¿½s livrarias o cï¿½lebre romance A montanha mï¿½gica, a grande obra-prima de Thomas Mann. A nova ediï¿½ï¿½o tem traduï¿½ï¿½o de Herbert Caro e posfï¿½cio inï¿½dito de Paulo Astor Soethe, renomado especialista na obra do autor. Neste clï¿½ssico da literatura alemï¿½, Mann renova a tradiï¿½ï¿½o do Bildungsroman ï¿½ o romance de formaï¿½ï¿½o ï¿½ a partir da trajetï¿½ria do jovem engenheiro Hans Castorp. Durante uma inesperada estadia de sete anos em um sanatï¿½rio para tuberculosos nos Alpes suï¿½ï¿½os, Hans relaciona-se com uma mirï¿½ade de personagens enfermos que encarnam os conflitos espirituais e ideolï¿½gicos que antecedem a Primeira Guerra Mundial. Lidando com uma variedade de temas ï¿½ estados doentios e corpï¿½reos, a arte, o amor, a natureza do tempo e da morte ï¿½, este livro, publicado originalmente em 1924, ï¿½ um dos grandes testamentos literï¿½rios do sï¿½culo XX e uma das obras inesgotï¿½veis da ficï¿½ï¿½o ocidental.', '1', 2, 2),
('9788535929225', NULL, '2017', NULL, 'Anna Karienina', '“Toda a diversidade, todo o encanto, toda a beleza da vida é feita de sombra e de luz”, escreve Liev Tolstói no romance que Fiódor Dostoiévski definiu como “impecável”. Publicado originalmente em forma de fascículos entre 1875 e 1877, antes de finalmente ganhar corpo de livro em 1877, Anna Kariênina continua a causar espanto. Como pode uma obra de arte se parecer tanto com a vida? Com absoluta maestria, Tolstói conduz o leitor por um salão repleto de música, perfumes, vestidos de renda, num ambiente de imagens vívidas e quase palpáveis que têm como pano de fundo a Rússia czarista. Nessa galeria de personagens excessivamente humanos, ninguém está inteiramente a salvo de julgamento: não há heróis, tampouco fracassados, e sim pessoas complexas, ambíguas, que não se restringem a fórmulas prontas. Religião, família, política e classe social são postas à prova no trágico percurso traçado por uma aristocrata casada que, ao se envolver em um caso extraconjugal, experimenta as virtudes e as agruras de um amor profundamente conflituoso, “feito de sombra e de luz”.', '1', 2, 2),
('9788543104355', NULL, '2016', NULL, 'O Homem Mais Inteligente da História', 'Considerado o autor brasileiro mais lido da década, Augusto Cury já vendeu 28 milhões de livros. “O homem mais inteligente da história” é fruto de 15 anos de estudos e pesquisas. Considerado por Augusto Cury a obra mais importante de sua carreira, este é o primeiro volume de uma coleção que vai abalar nossas convicções e transformar nossa visão do personagem que julgávamos conhecer tão bem. Psicólogo e pesquisador, Dr. Marco Polo desenvolveu uma teoria inédita sobre o funcionamento da mente e a gestão da emoção. Após sofrer uma terrível perda pessoal, ele vai a Jerusalém participar de um ciclo de conferências na ONU e é confrontado com uma pergunta surpreendente: Jesus sabia gerenciar a própria mente? Ateu convicto, Marco Polo responde que ciência e religião não se misturam. No entanto, instigado pelo tema, decide analisar a inteligência de Cristo à luz das ciências humanas. Ele esperava encontrar um homem simplório, com poucos recursos emocionais. Mas ao mergulhar na inquietante biografia de Jesus presente no Livro de Lucas, suas crenças vão sendo pouco a pouco colocadas em xeque. Para empreender essa incrível jornada, Marco Polo vai contar com uma mesa-redonda composta por dois brilhantes teólogos, um renomado neurocirurgião e sua assistente, a psiquiatra Sofia. Juntos, eles irão decifrar os sentidos ocultos em um dos textos mais famosos do Novo Testamento. Os debates são transmitidos via internet e cativam espectadores em todo o mundo – mas nem todos estão preparados para ver Jesus sob uma ótica tão revolucionária. Agora os intelectuais terão que lidar com seus próprios fantasmas emocionais e encarar perigos que jamais imaginaram enfrentar.', '1', 15, 2),
('9788544001400', NULL, '2017', NULL, 'Os Lusíadas', 'Os Lusíadas têm uma importância central na literatura de língua portuguesa: trata-se da obra que consolidou o português moderno e elevou o idioma ao patamar de língua respeitada culturalmente. Mais do que sintetizar os anseios de uma nação e de todo um período histórico – glória reservada a poucos –, com Os Lusíadas, Camões imortalizou-se como um tesouro português legado à humanidade.', '1', 8, 3),
('9788544001868', NULL, '2018', NULL, 'Persuasão', '\"Persuasão” foi o último trabalho completo de Jane Austen. O livro conta a história de Anne Elliot, uma das heroínas mais tranquilas e reservadas de Austen, mas, ao mesmo tempo, uma das mais fortes e abertas às mudanças. O livro enaltece a constância do amor numa época turbulenta na história da Inglaterra: as guerras napoleônicas. Escrito nesse período, o romance descreve como uma mulher pode permanecer fiel ao seu passado e, ainda assim, pensar em um futuro feliz. Austen expõe de maneira sutil como uma mulher pode passar por cima das convenções sociais e das restrições femininas em busca da felicidade.', '1', 8, 2),
('9788560280940', NULL, '2014', NULL, 'It - A Coisa', 'Durante as férias escolares de 1958, em Derry, pacata cidadezinha do Maine, Bill, Richie, Stan, Mike, Eddie, Ben e Beverly aprenderam o real sentido da amizade, do amor, da confiança e... do medo. O mais profundo e tenebroso medo. Naquele verão, eles enfrentaram pela primeira vez a Coisa, um ser sobrenatural e maligno que deixou terríveis marcas de sangue em Derry. Quase trinta anos depois, os amigos voltam a se encontrar. Uma nova onda de terror tomou a pequena cidade. Mike Hanlon, o único que permanece em Derry, dá o sinal. Precisam unir forças novamente. A Coisa volta a atacar e eles devem cumprir a promessa selada com sangue que fizeram quando crianças. Só eles têm a chave do enigma. Só eles sabem o que se esconde nas entranhas de Derry. O tempo é curto, mas somente eles podem vencer a Coisa. Em \"It - A Coisa\", clássico de Stephen King em nova edição, os amigos irão até o fim, mesmo que isso signifique ultrapassar os próprios limites.', '1', 22, 12),
('9788563560421', NULL, '2012', NULL, 'Ulysses', 'Um homem sai de casa pela manhã, cumpre com as tarefas do dia e, pela noite, retorna ao lar. Foi em torno desse esqueleto enganosamente simples, quase banal, que James Joyce elaborou o que veio a ser o grande romance do século XX. Inspirado na Odisseia de Homero, Ulysses é ambientado em Dublin, e narra as aventuras de Leopold Bloom e seu amigo Stephen Dedalus ao longo do dia 16 de junho de 1904. Tal como o Ulisses homérico, Bloom precisa superar numerosos obstáculos e tentações até retornar ao apartamento na rua Eccles, onde sua mulher, Molly, o espera. Para criar esse personagem rico e vibrante, Joyce misturou numerosos estilos e referências culturais, num caleidoscópio de vozes que tem desafiado gerações de leitores e estudiosos ao redor do mundo. O culto em torno de Ulysses teve início antes mesmo de sua publicação em livro, quando trechos do romance começaram a aparecer num jornal literário dos EUA. Por conta dessas passagens, Ulysses foi banido nos Estados Unidos, numa acusação de obscenidade, dando início a uma longa pendenga legal, que seria resolvida apenas onze anos depois, com a liberação do romance em solo americano. Mas, para além das disputas e polêmicas, Ulysses segue como um divisor de águas por conta do êxito do autor no principal ponto do romance: esticar e moldar a língua inglesa ao limite, a fim de retirar disso um retrato fiel, divertido e comovente do que se convencionou chamar de o “homem moderno”. Em seu clássico estudo sobre a obra de James Joyce, Homem comum enfim, o crítico e escritor britânico Anthony Burgess afirma que, “se alguma vez houve um grande escritor popular, Joyce foi este escritor”. Guiado por esse espírito eminentemente democrático da escrita joyceana, Caetano Galindo realizou esta nova tradução de Ulysses, a fim de captar “a imensa gama de cores, registros, estilos, recursos e efeitos” de sua prosa revolucionária.', '1', 9, 2),
('9788573264241', NULL, '2016', NULL, 'A Divina Comédia', 'Texto fundador da língua italiana, súmula da cosmovisão de toda uma época, monumento poético de rigor e beleza, obra magna da literatura universal. É fato que a \"Comédia\" merece esses e muitos outros adjetivos de louvor, incluindo o \"divina\" que Boccaccio lhe deu já no século XIV. Mas também é certo que, como bom clássico, este livro reserva a cada novo leitor a prazerosa surpresa de renascer revigorado, como vem fazendo de geração em geração há quase setecentos anos. A longa jornada dantesca através do Inferno, Purgatório e Paraíso é aqui oferecida na íntegra — com seus mais de 14 mil decassílabos divididos em cem cantos e três partes — na rigorosa tradução de Italo Eugenio Mauro, vencedora do Prêmio Jabuti e celebrada por sua fidelidade à métrica e à rima originais. A edição traz ainda, como prefácio, um inspirado ensaio de Otto Maria Carpeaux.', '1', 5, 3),
('9788580573749', NULL, '2013', NULL, 'Cidades de Papel', 'Quentin Jacobsen tem uma paixão platônica pela magnífica vizinha e colega de escola Margo Roth Spiegelman. Até que em um cinco de maio que poderia ter sido outro dia qualquer, ela invade sua vida pela janela de seu quarto, com a cara pintada e vestida de ninja, convocando-o a fazer parte de um engenhoso plano de vingança. E ele, é claro, aceita. ', '1', 10, 2),
('9788581863351', NULL, '2019', NULL, 'A Metamorfose', 'Franz Kafka é um dos autores mais lidos, analisados e discutidos da literatura mundial após a Primeira Guerra, segundo o professor, ensaísta e tradutor Modesto Carone, não só por ser um autor original e inteligente, mas porque em sua obra encontramos a \"imagem mais poderosa e penetrante de nosso mundo vincado pela falsa consciência\". Conhecida por ter seu herói Gregor Samsa metamorfoseado em inseto, esta novela enfoca a existência humana em um mundo que leva os indivíduos à solidão. Com uma narrativa ágil, seduz o leitor por seu rigoroso apuro técnico.', '1', 7, 2),
('9788582850404', NULL, '2016', NULL, 'Romeu E Julieta', 'Há muito tempo duas famílias banham em sangue as ruas de Verona. Enquanto isso, na penumbra das madrugadas, ardem as brasas de um amor secreto. Romeu, filho dos Montéquio, e Julieta, herdeira dos Capuleto, desafiam a rixa familiar e sonham com um impossível futuro, longe da violência e da loucura. “Romeu e Julieta” é a primeira das grandes tragédias de William Shakespeare, e esta nova tradução de José Francisco Botelho recria com maestria o ritmo ao mesmo tempo frenético e melancólico do texto shakespeariano. Contando também com um excelente ensaio introdutório do especialista Adrian Poole, esta edição traz nova vida a uma das mais emocionantes histórias de amor já contadas.', '1', 9, 4),
('9788584390670', NULL, '2017', NULL, 'O Alquimista', 'Paulo Coelho já inspirou mais de 200 milhões de leitores por todo o mundo com este romance encantador. Esta história, brilhante em sua simplicidade e com uma sabedoria que nos estimula, é sobre um jovem pastor da Andaluzia chamado Santiago que viaja de sua cidade natal na Espanha para o deserto do Egito em busca de um tesouro escondido perto das Pirâmides. Ao longo do caminho, ele encontra uma cigana, um homem que se diz rei e um alquimista, que lhe indicam a direção para a sua busca. Ninguém sabe que tesouro é esse, ou se Santiago será capaz de ultrapassar os obstáculos de seu trajeto. Mas o que começa como uma jornada para encontrar bens mundanos se transforma na descoberta do tesouro que se encontra dentro dele mesmo. Emocionante e profundamente humano, este clássico contemporâneo é um testamento eterno do poder transformador dos nossos sonhos e da importância de ouvirmos nossos corações.', '1', 25, 2),
('9788599296363', NULL, '2008', NULL, 'A Cabana', 'A filha mais nova de Mackenzie Allen Philip foi raptada durante as férias em família e há evidências de que ela foi brutalmente assassinada e abandonada numa cabana. Quatro anos mais tarde, Mack recebe uma nota suspeita, aparentemente vinda de Deus, convidando-o para voltar áquele cabana para passar o fim de semana. Ignorando alertas de que poderia ser uma cilada, ele segue numa tarde de inverno e volta a cenário de seu pior pesadelo. O que encontra lá muda sua vida para sempre. Num mundo em que religião parece tornar-se irrelevante, \"A Cabana\" invoca a pergunta: \"Se Deus é tão poderoso e tão cheio de amor, por que não faz nada para amenizar a dor e o sofrimento do mundo?\" As respostas encontradas por Mack surpreenderão você e, provavelmente, o transformarão tanto quanto ele.', '1', 15, 2),
('teste', 2, '2019', '0', 'afd', 'adsf', '1', 1, 5),
('testehyuj', 2, '2019', '0', 'afd', 'adsfdasf', '1', 4, 3);

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
  `txt_postagem` text DEFAULT NULL,
  `titulo_post` text DEFAULT NULL,
  `cod_status_post` varchar(10) DEFAULT '1',
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `postagem`
--

INSERT INTO `postagem` (`id_post`, `data_hora_post`, `link_post`, `url_foto_post`, `txt_postagem`, `titulo_post`, `cod_status_post`, `id_usuario`) VALUES
(1, '2019-10-09 21:08:03', NULL, 'public/imgPost/CDHU.jpg', '                PHP (um acrÃ´nimo recursivo para \"PHP: Hypertext Preprocessor\", originalmente Personal Home Page) Ã© uma linguagem interpretada livre, usada originalmente apenas para o desenvolvimento de aplicaÃ§Ãµes presentes e atuantes no lado do servidor, capazes de gerar conteÃºdo dinÃ¢mico na World Wide Web.[3] Figura entre as primeiras linguagens passÃ­veis de inserÃ§Ã£o em documentos HTML, dispensando em muitos casos o uso de arquivos externos para eventuais processamentos de dados. O cÃ³digo Ã© interpre            ', 'PHP', '1', 5),
(2, '2019-10-09 21:08:23', NULL, 'public/imgPost/FDE.jpg', '                                       JavaScript, frequentemente abreviado como JS, Ã© uma linguagem de programaÃ§Ã£o interpretada de alto nÃ­vel, caracterizada tambÃ©m, como dinÃ¢mica, fracamente tipificada, prototype-based e multi-paradigma.[2] Juntamente com HTML e CSS, o JavaScript Ã© uma das trÃªs principais tecnologias da World Wide Web. JavaScript permite pÃ¡ginas da Web interativas e, portanto, Ã© uma parte essencial dos aplicativos da web. A grande maioria dos sites usa, e todos os principais navegadores tÃªm um mecanismo JavaScript dedicado para executÃ¡-lo.  Ã‰ atualmente a principal linguagem para programaÃ§Ã£o client-side em navegadores web. Ã‰ tambÃ©m bastante utilizada do lado do servidor atravÃ©s de ambientes como o node.js.  Como uma linguagem multi-paradigma, o JavaScript suporta estilos de programaÃ§Ã£o orientados a eventos, funcionais e imperativos (incluindo orientado a objetos e prototype-based), apresentando recursos como fechamentos (closures) e funÃ§Ãµes de alta ordem comumente indisponÃ­veis em linguagens populares como Java e C++. PossuÃ­ APIs para trabalhar com texto, matrizes, datas, expressÃµes regulares e o DOM, mas a linguagem em si nÃ£o inclui nenhuma E/S, como instalaÃ§Ãµes de rede, armazenamento ou grÃ¡ficos, contando com isso no ambiente host em que estÃ¡ embutido.  Foi originalmente implementada como parte dos navegadores web para que scripts pudessem ser executados do lado do cliente e interagissem com o usuÃ¡rio sem a necessidade deste script passar pelo servidor, controlando o navegador, realizando comunicaÃ§Ã£o assÃ­ncrona e alterando o conteÃºdo do documento exibido, porÃ©m os mecanismos JavaScript agora estÃ£o incorporados em muitos outros tipos de software host, incluindo servidores em servidores e bancos de dados da Web e em programas que nÃ£o sÃ£o da Web, como processadores de texto e PDF, e em tempo de execuÃ§Ã£o ambientes que disponibilizam JavaScript para escrever aplicativos mÃ³veis e de desktop, incluindo widgets de Ã¡rea de trabalho.  Os termos Vanilla JavaScript e Vanilla JS se referem ao JavaScript nÃ£o estendido por qualquer estrutura ou biblioteca adicional. Scripts escritos em Vanilla JS sÃ£o cÃ³digos JavaScript simples.[3][4]  Embora existam semelhanÃ§as entre JavaScript e Java, incluindo o nome da linguagem, a sintaxe e as respectivas bibliotecas padrÃ£o, as duas linguagens sÃ£o distintas e diferem muito no design; JavaScript foi influenciado por linguagens de programaÃ§Ã£o como Self e Scheme.                            ', 'Javascript', '1', 5),
(3, '2019-10-10 13:15:17', NULL, NULL, '              OlÃ¡ mundos\r\n        ', 'testes', '0', 15),
(4, '2019-10-14 10:06:03', NULL, 'public/imgPost/imgPadrao/padrao.jpg', 'Teste', 'OlÃ¡ mundo', '1', 15);

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
  `senha_usuario` varchar(255) DEFAULT NULL,
  `cod_status_usuario` varchar(10) DEFAULT '1',
  `id_perfil` int(11) DEFAULT NULL,
  `data_criacao` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome_usuario`, `sobrenome_usuario`, `email_usuario`, `senha_usuario`, `cod_status_usuario`, `id_perfil`, `data_criacao`) VALUES
(1, 'Ruan', 'Costa de Oliveira', 'ruanc_oliveira@hotmail.com', '$2y$08$SJHZWMQSSeFrj12HlOmnkOs6/29z1kl2tZY5UpkChAhLpkuiUXu.6', '1', 1, '2019-09-18 00:00:00'),
(2, 'Divanilda', 'Cristina da Cruz', 'rm35615@estudante.fieb.edu.br', '$2y$08$SJHZWMQSSeFrj12HlOmnkOs6/29z1kl2tZY5UpkChAhLpkuiUXu.6', '1', 1, '2019-09-18 00:00:00'),
(3, 'Gabriel Max', 'Maia do Carmo', 'rm35880@estudante.fieb.edu.br', '$2y$08$SJHZWMQSSeFrj12HlOmnkOs6/29z1kl2tZY5UpkChAhLpkuiUXu.6', '1', 1, '2019-09-18 00:00:00'),
(5, 'Marcos', 'Santos Carvalho', 'marcos_sco@outlook.com', '$2y$08$bpL1YroQQT2noWsrlgVXWuYDcu9TLSiNR7WHWPz1j8YxWj40EEKXi', '1', 1, '2019-09-18 00:00:00'),
(6, 'Joyce Victoria', 'Leite Oquendo', 'rm35881@estudante.fieb.edu.br', '$2y$08$bpL1YroQQT2noWsrlgVXWuYDcu9TLSiNR7WHWPz1j8YxWj40EEKXi', '1', 2, '2019-09-18 00:00:00'),
(7, 'Daniele Maria', 'França', 'rm36113@estudante.fieb.edu.br', '$2y$08$bpL1YroQQT2noWsrlgVXWuYDcu9TLSiNR7WHWPz1j8YxWj40EEKXi', '1', 3, '2019-09-18 00:00:00'),
(8, 'Jennifer', 'Keity Guimarães', 'rm36139@estudante.fieb.edu.br', '$2y$08$bpL1YroQQT2noWsrlgVXWuYDcu9TLSiNR7WHWPz1j8YxWj40EEKXi', '1', 3, '2019-09-18 00:00:00'),
(9, 'Suelane', 'Garcia Fontes', 'suelane.fontes@docente.fieb.edu.br', '$2y$08$bpL1YroQQT2noWsrlgVXWuYDcu9TLSiNR7WHWPz1j8YxWj40EEKXi', '1', 4, '2019-09-18 00:00:00'),
(10, 'Giovani', 'Barbosa Wingter', 'giovani.wingter@docente.fieb.edu.br', '$2y$08$bpL1YroQQT2noWsrlgVXWuYDcu9TLSiNR7WHWPz1j8YxWj40EEKXi', '1', 4, '2019-09-18 00:00:00'),
(11, 'Abigail', 'Queiroz Moreira Pereira', 'sebodomarcao@uol.com.br', '$2y$08$bpL1YroQQT2noWsrlgVXWuYDcu9TLSiNR7WHWPz1j8YxWj40EEKXi', '1', 5, '2019-09-18 00:00:00'),
(12, 'Mirian', 'Marinho da Silva Lima', 'sebosantafe@hotmail.com', '$2y$08$bpL1YroQQT2noWsrlgVXWuYDcu9TLSiNR7WHWPz1j8YxWj40EEKXi', '1', 5, '2019-09-18 00:00:00'),
(13, 'Denis', 'Monteiro Guimaraes', 'denis.guimaraes@docente.fieb.edu.br', '$2y$08$bpL1YroQQT2noWsrlgVXWuYDcu9TLSiNR7WHWPz1j8YxWj40EEKXi', '1', 4, '2019-09-18 00:00:00'),
(14, 'Priscilla', 'Nobre Lobo', 'globalnetconsultoria@globo.com', '$2y$08$bpL1YroQQT2noWsrlgVXWuYDcu9TLSiNR7WHWPz1j8YxWj40EEKXi', '1', 5, '2019-09-18 00:00:00'),
(15, 'Master', 'adm ', 'master@outlook.com', '$2a$08$OTQ0Mjc0MDk0NWRhMGIxM.ENIzTfLOH5SDZ/70kY2fHwnFtwakk4i', '1', 1, '2019-10-09 21:02:53'),
(16, 'Admin 1', 'adm', 'adm1@outlook.com', '$2y$08$bpL1YroQQT2noWsrlgVXWuYDcu9TLSiNR7WHWPz1j8YxWj40EEKXi', '1', 2, '2019-10-09 21:03:42'),
(17, 'Admin 2', 'adm ', 'adm2@outlook.com', '$2y$08$bpL1YroQQT2noWsrlgVXWuYDcu9TLSiNR7WHWPz1j8YxWj40EEKXi', '1', 3, '2019-10-09 21:04:14'),
(18, 'Usuario', 'Cliente', 'cliente@outlook.com', '$2y$08$bpL1YroQQT2noWsrlgVXWuYDcu9TLSiNR7WHWPz1j8YxWj40EEKXi', '1', 4, '2019-10-09 21:07:01'),
(19, 'Sebo', 'usuario', 'sebo@outlook.com', '$2y$08$bpL1YroQQT2noWsrlgVXWuYDcu9TLSiNR7WHWPz1j8YxWj40EEKXi', '1', 5, '2019-10-09 21:07:27'),
(20, 'teste', 'teste', 'teste@outlook.com', '$2a$08$NjA5OTMwOTI4NWRhMDdiMu6dtOk6AnU8/4Ejmh4mibk6fpbR3m8Hm', '1', 4, '2019-10-10 12:25:27'),
(49, 'ff', 'ff', 'ff', '1234', '1', 1, '2019-10-10 12:56:04'),
(50, 'ssss', 'sssa', 'fd@outlook.com', '1234', '1', 5, '2019-10-10 13:05:20'),
(51, 'ssss', 'sssa', 'fd@outlook.com', '1234', '1', 5, '2019-10-10 13:08:42'),
(52, '$2a$08$MTQ3MTcxNzczMTVkYTBjO.DJMbyrlDrUO/K8mJdyC1D', 'ddd', 'au@outlook.com', '$2a$08$MjExMTM0MDg0NDVkYTBjNur832vx0vOnRC4rA6ggKIvzjxtckUBO2', '1', 5, '2019-10-11 11:13:21'),
(53, 'sonic', 'headhog', 'sonic@outlook.com', '$2a$08$MjAzNDE5Njk3MTVkYTBiMeGBt6VZikV.oMBlhJFyZZT/Js3q5KfFO', '1', 1, '2019-10-11 13:48:16'),
(55, 'teste', 'teste', 'teste', '$2a$08$MTY3MDIzMjkyNDVkYTQ3OOU7ga1rD0n.rjI9OjEtj6MTzjyQXlbB.', '1', 4, '2019-10-14 10:35:50'),
(56, 'auss', 'hdgh', 'sebo', '$2a$08$MTUyMjM0NDEwNzVkYTQ3YOcEjHPBLIiglqOwyXH5upcTVkygzAPZy', '1', 5, '2019-10-14 10:39:17'),
(57, 'teste', 'headhog', 'a', '$2a$08$MTk5NjUzNjU1NDVkYTQ3Ye7ZV/RP94rqoHWZeZay8oKJfswpYnyFK', '1', 5, '2019-10-14 10:43:08');

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
  MODIFY `id_autor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `postagem`
--
ALTER TABLE `postagem`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
