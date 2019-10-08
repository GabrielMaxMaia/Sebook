-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Out-2019 às 20:51
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
  `cod_status_autor` varchar(10) DEFAULT NULL,
  `id_nacionalidade` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
(31, 'William P. Young', '0', 21);

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacao_sebo`
--

CREATE TABLE `avaliacao_sebo` (
  `id_usuario_sebo` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `data_hora` varchar(10) DEFAULT NULL,
  `nota` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nome_categoria` varchar(100) DEFAULT NULL,
  `cod_status_categoria` varchar(10) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nome_categoria`, `cod_status_categoria`) VALUES
(1, 'Literatura Juvenil', '0'),
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
(19, 'InfantoJuvenis', '1'),
(20, 'Jocao', '1'),
(21, 'Stop Intensifies', '1');

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
  `cod_status_cliente` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id_usuario`, `sexo_cliente`, `compl_end_cliente`, `logradouro_cliente`, `url_foto_cliente`, `num_compl_cliente`, `cpf_cliente`, `cep_cliente`, `dt_nasc_cliente`, `cod_status_cliente`) VALUES
(9, 'F', NULL, NULL, NULL, NULL, '45687912587', '06589054', '1900-01-01', '1'),
(10, 'M', NULL, NULL, NULL, NULL, '12378965878', '06545687', '1900-01-01', '1'),
(13, 'M', NULL, NULL, NULL, NULL, '36574159866', '06512987', '1900-01-01', '1'),
(0, 'M', '', '', NULL, '', '234', '', '0000-00-00', NULL),
(5, 'M', '', '', NULL, '', '56610710', '', '0000-00-00', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente_sebo`
--

CREATE TABLE `cliente_sebo` (
  `id_usuario` int(11) NOT NULL,
  `id_usuario_sebo` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentario`
--

CREATE TABLE `comentario` (
  `id_comentario` int(11) NOT NULL,
  `txt_comentario` varchar(500) DEFAULT NULL,
  `data_hora_comentario` datetime DEFAULT NULL,
  `cod_status_comentario` varchar(10) DEFAULT NULL,
  `id_postagem` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `editora`
--

CREATE TABLE `editora` (
  `id_editora` int(11) NOT NULL,
  `nome_editora` varchar(100) DEFAULT NULL,
  `cod_status_editora` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
(25, 'Paralela', '0');

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `livro`
--

CREATE TABLE `livro` (
  `isbn_livro` varchar(100) DEFAULT NULL,
  `id_livro` int(11) NOT NULL,
  `ano_livro` varchar(20) DEFAULT NULL,
  `nome_livro` varchar(100) DEFAULT NULL,
  `sinopse_livro` varchar(3500) DEFAULT NULL,
  `cod_status_livro` varchar(10) DEFAULT '1',
  `id_editora` int(11) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `livro`
--

INSERT INTO `livro` (`isbn_livro`, `id_livro`, `ano_livro`, `nome_livro`, `sinopse_livro`, `cod_status_livro`, `id_editora`, `id_categoria`) VALUES
('9788516079444', 1, '2012', 'Dom Quixote', 'Apaixonado por histï¿½rias de cavalaria, Alonso Quijano passa a acreditar que ï¿½ um cavaleiro andante. Em seu delï¿½rio, muda o nome para Dom Quixote de la Mancha, veste-se com uma armadura improvisada, faz de Dulcineia sua amada, a quem quer dedicar suas glï¿½rias e seus feitos. O vizinho Sancho Panï¿½a torna-se seu fiel escudeiro. Nenhum cavaleiro andante teve a ousadia de Dom Quixote. Tampouco viveu suas aventuras e desventuras, que aqui sï¿½o contadas de forma divertida e emocionante. Adaptaï¿½ï¿½o de Walcyr Carrasco.', '0', 1, 1),
('9788535929225', 2, '2017', 'Anna Karienina', '“Toda a diversidade, todo o encanto, toda a beleza da vida é feita de sombra e de luz”, escreve Liev Tolstói no romance que Fiódor Dostoiévski definiu como “impecável”. Publicado originalmente em forma de fascículos entre 1875 e 1877, antes de finalmente ganhar corpo de livro em 1877, Anna Kariênina continua a causar espanto. Como pode uma obra de arte se parecer tanto com a vida? Com absoluta maestria, Tolstói conduz o leitor por um salão repleto de música, perfumes, vestidos de renda, num ambiente de imagens vívidas e quase palpáveis que têm como pano de fundo a Rússia czarista. Nessa galeria de personagens excessivamente humanos, ninguém está inteiramente a salvo de julgamento: não há heróis, tampouco fracassados, e sim pessoas complexas, ambíguas, que não se restringem a fórmulas prontas. Religião, família, política e classe social são postas à prova no trágico percurso traçado por uma aristocrata casada que, ao se envolver em um caso extraconjugal, experimenta as virtudes e as agruras de um amor profundamente conflituoso, “feito de sombra e de luz”.', '0', 2, 2),
('9788535928204', 3, '2016', 'A Montanha Mágica', 'Ansiosamente aguardado pelos leitores brasileiros, volta às livrarias o célebre romance A montanha mágica, a grande obra-prima de Thomas Mann. A nova edição tem tradução de Herbert Caro e posfácio inédito de Paulo Astor Soethe, renomado especialista na obra do autor. Neste clássico da literatura alemã, Mann renova a tradição do Bildungsroman — o romance de formação — a partir da trajetória do jovem engenheiro Hans Castorp. Durante uma inesperada estadia de sete anos em um sanatório para tuberculosos nos Alpes suíços, Hans relaciona-se com uma miríade de personagens enfermos que encarnam os conflitos espirituais e ideológicos que antecedem a Primeira Guerra Mundial. Lidando com uma variedade de temas — estados doentios e corpóreos, a arte, o amor, a natureza do tempo e da morte —, este livro, publicado originalmente em 1924, é um dos grandes testamentos literários do século XX e uma das obras inesgotáveis da ficção ocidental.', '1', 2, 2),
('9788501110367', 4, '2017', 'Cem Anos De Solidão - Edição Especial', 'Edição comemorativa em capa dura dos 50 anos de publicação da obra-prima de Gabriel García Márquez Neste que é um dos maiores clássicos da literatura, o prestigiado autor narra a incrível e triste história dos Buendía – a estirpe de solitários para a qual não será dada “uma segunda oportunidade sobre a terra” e apresenta o maravilhoso universo da fictícia Macondo, onde se passa o romance. É lá que acompanhamos diversas gerações dessa família, assim como a ascensão e a queda do vilarejo. Para além dos artifícios técnicos e das influências literárias que transbordam do livro, ainda vemos em suas páginas o que por muitos é considerado uma autêntica enciclopédia do imaginário, num estilo que consagrou o colombiano como um dos maiores autores do século XX.', '1', 3, 2),
('9788563560421', 5, '2012', 'Ulysses', 'Um homem sai de casa pela manhã, cumpre com as tarefas do dia e, pela noite, retorna ao lar. Foi em torno desse esqueleto enganosamente simples, quase banal, que James Joyce elaborou o que veio a ser o grande romance do século XX. Inspirado na Odisseia de Homero, Ulysses é ambientado em Dublin, e narra as aventuras de Leopold Bloom e seu amigo Stephen Dedalus ao longo do dia 16 de junho de 1904. Tal como o Ulisses homérico, Bloom precisa superar numerosos obstáculos e tentações até retornar ao apartamento na rua Eccles, onde sua mulher, Molly, o espera. Para criar esse personagem rico e vibrante, Joyce misturou numerosos estilos e referências culturais, num caleidoscópio de vozes que tem desafiado gerações de leitores e estudiosos ao redor do mundo. O culto em torno de Ulysses teve início antes mesmo de sua publicação em livro, quando trechos do romance começaram a aparecer num jornal literário dos EUA. Por conta dessas passagens, Ulysses foi banido nos Estados Unidos, numa acusação de obscenidade, dando início a uma longa pendenga legal, que seria resolvida apenas onze anos depois, com a liberação do romance em solo americano. Mas, para além das disputas e polêmicas, Ulysses segue como um divisor de águas por conta do êxito do autor no principal ponto do romance: esticar e moldar a língua inglesa ao limite, a fim de retirar disso um retrato fiel, divertido e comovente do que se convencionou chamar de o “homem moderno”. Em seu clássico estudo sobre a obra de James Joyce, Homem comum enfim, o crítico e escritor britânico Anthony Burgess afirma que, “se alguma vez houve um grande escritor popular, Joyce foi este escritor”. Guiado por esse espírito eminentemente democrático da escrita joyceana, Caetano Galindo realizou esta nova tradução de Ulysses, a fim de captar “a imensa gama de cores, registros, estilos, recursos e efeitos” de sua prosa revolucionária.', '1', 9, 2),
('9780486421230', 6, '2002', 'Swann\'s Way', 'A psychological self-portrait, a clear-eyed social study, and a profound meditation upon the artistic process, Marcel Proust\'s monumental, encyclopedic masterpiece A la recherche du temps perdu (In Search of Lost Time) changed the course of 20th-century literature. Swann\'s Way, the first volume, introduces the novel\'s major themes and its unnamed narrator, an introspective man drawn, in his youth, to fashionable society, like the author himself. Through his narrator\'s consciousness, Proust offers readers a comprehensive portrait of the high society of Paris from the 1870s through the First World War.Swann\'s Way begins with the narrator\'s reminiscences of early childhood -- including, famously, his evocative memory of eating a pastry called a madeleine -- and his fascination with what seemed the separate worlds of his family\'s various neighbors and acquaintances. He then turns his focus to the wealthy connoisseur Charles Swann and his obsessive relationship with the vulgar but radiant courtesan Odette, chronicling in detail the milieu in which it is enacted and its unfortunate effects on him.Du cote de chez Swann first appeared in 1913. It is a bitingly satiric, often comic evocation of French society that addresses a range of philosophical questions about perception, memory, desire, art, family, and politics. On its own or as part of a larger work, it is a rich search for a reality that transcends the passage of time.', '1', 4, 2),
('9788573264241', 7, '2016', 'A Divina Comédia', 'Texto fundador da língua italiana, súmula da cosmovisão de toda uma época, monumento poético de rigor e beleza, obra magna da literatura universal. É fato que a \"Comédia\" merece esses e muitos outros adjetivos de louvor, incluindo o \"divina\" que Boccaccio lhe deu já no século XIV. Mas também é certo que, como bom clássico, este livro reserva a cada novo leitor a prazerosa surpresa de renascer revigorado, como vem fazendo de geração em geração há quase setecentos anos. A longa jornada dantesca através do Inferno, Purgatório e Paraíso é aqui oferecida na íntegra — com seus mais de 14 mil decassílabos divididos em cem cantos e três partes — na rigorosa tradução de Italo Eugenio Mauro, vencedora do Prêmio Jabuti e celebrada por sua fidelidade à métrica e à rima originais. A edição traz ainda, como prefácio, um inspirado ensaio de Otto Maria Carpeaux.', '1', 5, 3),
('9788527311229', 8, '2018', 'Uniões - A Perfeição do Amor e A Tentação da Quieta Verônica', 'Vagando e divagando pelo corpo, sensações e pensamentos de duas mulheres, Robert Musil, célebre autor de O Homem Sem Qualidades, constrói em Uniões uma narrativa intensamente dramática e fragmentada, de absoluta radicalidade. Traduzido e comentado pela primeira vez em português por Kathrin Rosenfield e Lawrence Flores Pereira, Uniões revive agora em novo contexto, no qual os conflitos de gênero se tornam tão acirrados quanto inevitáveis. Uniões reúne dois contos: A Perfeição do Amor e A Tentação da Quieta Verônica, protagonizados, respectivamente, por Claudine e Verônica. Os traumas psicológicos vividos pelas personagens, ainda na infância, se fazem notar já na idade adulta pelo problema da entrega de corpo, alma e mente ao homem amado. No esforço de lidar com as consequências impostas por pulsões sexuais descontroladas, a primeira procura proteger seu casamento, enquanto a segunda se refugia em idealizações fantasiosas que a impedem do contato humano real. Comparável às tramas psicológicas de Clarice Lispector, Musil recorre a ferramentas narrativas muito a frente de seu tempo para encontrar dimensões afetivas onde os desafios são os mesmos, tanto para homens quanto para mulheres.', '1', 6, 2),
('9788581863351', 9, '2019', 'A Metamorfose', 'Franz Kafka é um dos autores mais lidos, analisados e discutidos da literatura mundial após a Primeira Guerra, segundo o professor, ensaísta e tradutor Modesto Carone, não só por ser um autor original e inteligente, mas porque em sua obra encontramos a \"imagem mais poderosa e penetrante de nosso mundo vincado pela falsa consciência\". Conhecida por ter seu herói Gregor Samsa metamorfoseado em inseto, esta novela enfoca a existência humana em um mundo que leva os indivíduos à solidão. Com uma narrativa ágil, seduz o leitor por seu rigoroso apuro técnico.', '1', 7, 2),
('9788544001400', 10, '2017', 'Os Lusíadas', 'Os Lusíadas têm uma importância central na literatura de língua portuguesa: trata-se da obra que consolidou o português moderno e elevou o idioma ao patamar de língua respeitada culturalmente. Mais do que sintetizar os anseios de uma nação e de todo um período histórico – glória reservada a poucos –, com Os Lusíadas, Camões imortalizou-se como um tesouro português legado à humanidade.', '1', 8, 3),
('9788582850404', 11, '2016', 'Romeu E Julieta', 'Há muito tempo duas famílias banham em sangue as ruas de Verona. Enquanto isso, na penumbra das madrugadas, ardem as brasas de um amor secreto. Romeu, filho dos Montéquio, e Julieta, herdeira dos Capuleto, desafiam a rixa familiar e sonham com um impossível futuro, longe da violência e da loucura. “Romeu e Julieta” é a primeira das grandes tragédias de William Shakespeare, e esta nova tradução de José Francisco Botelho recria com maestria o ritmo ao mesmo tempo frenético e melancólico do texto shakespeariano. Contando também com um excelente ensaio introdutório do especialista Adrian Poole, esta edição traz nova vida a uma das mais emocionantes histórias de amor já contadas.', '1', 9, 4),
('9788544001868', 12, '2018', 'Persuasão', '\"Persuasão” foi o último trabalho completo de Jane Austen. O livro conta a história de Anne Elliot, uma das heroínas mais tranquilas e reservadas de Austen, mas, ao mesmo tempo, uma das mais fortes e abertas às mudanças. O livro enaltece a constância do amor numa época turbulenta na história da Inglaterra: as guerras napoleônicas. Escrito nesse período, o romance descreve como uma mulher pode permanecer fiel ao seu passado e, ainda assim, pensar em um futuro feliz. Austen expõe de maneira sutil como uma mulher pode passar por cima das convenções sociais e das restrições femininas em busca da felicidade.', '1', 8, 2),
('9788580573749', 13, '2013', 'Cidades de Papel', 'Quentin Jacobsen tem uma paixão platônica pela magnífica vizinha e colega de escola Margo Roth Spiegelman. Até que em um cinco de maio que poderia ter sido outro dia qualquer, ela invade sua vida pela janela de seu quarto, com a cara pintada e vestida de ninja, convocando-o a fazer parte de um engenhoso plano de vingança. E ele, é claro, aceita. ', '1', 10, 2),
('9788543104355', 14, '2016', 'O Homem Mais Inteligente da História', 'Considerado o autor brasileiro mais lido da década, Augusto Cury já vendeu 28 milhões de livros. “O homem mais inteligente da história” é fruto de 15 anos de estudos e pesquisas. Considerado por Augusto Cury a obra mais importante de sua carreira, este é o primeiro volume de uma coleção que vai abalar nossas convicções e transformar nossa visão do personagem que julgávamos conhecer tão bem. Psicólogo e pesquisador, Dr. Marco Polo desenvolveu uma teoria inédita sobre o funcionamento da mente e a gestão da emoção. Após sofrer uma terrível perda pessoal, ele vai a Jerusalém participar de um ciclo de conferências na ONU e é confrontado com uma pergunta surpreendente: Jesus sabia gerenciar a própria mente? Ateu convicto, Marco Polo responde que ciência e religião não se misturam. No entanto, instigado pelo tema, decide analisar a inteligência de Cristo à luz das ciências humanas. Ele esperava encontrar um homem simplório, com poucos recursos emocionais. Mas ao mergulhar na inquietante biografia de Jesus presente no Livro de Lucas, suas crenças vão sendo pouco a pouco colocadas em xeque. Para empreender essa incrível jornada, Marco Polo vai contar com uma mesa-redonda composta por dois brilhantes teólogos, um renomado neurocirurgião e sua assistente, a psiquiatra Sofia. Juntos, eles irão decifrar os sentidos ocultos em um dos textos mais famosos do Novo Testamento. Os debates são transmitidos via internet e cativam espectadores em todo o mundo – mas nem todos estão preparados para ver Jesus sob uma ótica tão revolucionária. Agora os intelectuais terão que lidar com seus próprios fantasmas emocionais e encarar perigos que jamais imaginaram enfrentar.', '1', 15, 2),
('8532511015', 15, '2000', 'Harry Potter e A Pedra Filosofal', 'Em Harry Potter e a Pedra Filosofal, o leitor é apresentado a Harry, filho de Tiago e Lílian Potter, feiticeiros que foram assassinados por um poderosíssimo bruxo, quando ele ainda era um bebê. Com isso, o menino acaba sendo levado para a casa dos tios que nada tinham a ver com o sobrenatural pelo contrário. Até os 10 anos, Harry foi uma espécie de gata borralheira: maltratado pelos tios, herdava roupas velhas do primo gorducho, tinha óculos remendados e era tratado como um estorvo. No dia de seu aniversário de 11 anos, entretanto, ele parece deslizar por um buraco sem fundo, como o de Alice no país das maravilhas, que o conduz a um mundo mágico. Descobre sua verdadeira história e seu destino: ser um aprendiz de feiticeiro até o dia em que terá que enfrentar a pior força do mal, o homem que assassinou seus pais, o terrível Lorde das Trevas. ', '1', 21, 1),
('9788599296363', 16, '2008', 'A Cabana', 'A filha mais nova de Mackenzie Allen Philip foi raptada durante as férias em família e há evidências de que ela foi brutalmente assassinada e abandonada numa cabana. Quatro anos mais tarde, Mack recebe uma nota suspeita, aparentemente vinda de Deus, convidando-o para voltar áquele cabana para passar o fim de semana. Ignorando alertas de que poderia ser uma cilada, ele segue numa tarde de inverno e volta a cenário de seu pior pesadelo. O que encontra lá muda sua vida para sempre. Num mundo em que religião parece tornar-se irrelevante, \"A Cabana\" invoca a pergunta: \"Se Deus é tão poderoso e tão cheio de amor, por que não faz nada para amenizar a dor e o sofrimento do mundo?\" As respostas encontradas por Mack surpreenderão você e, provavelmente, o transformarão tanto quanto ele.', '1', 15, 2),
('9788560280940', 17, '2014', 'It - A Coisa', 'Durante as férias escolares de 1958, em Derry, pacata cidadezinha do Maine, Bill, Richie, Stan, Mike, Eddie, Ben e Beverly aprenderam o real sentido da amizade, do amor, da confiança e... do medo. O mais profundo e tenebroso medo. Naquele verão, eles enfrentaram pela primeira vez a Coisa, um ser sobrenatural e maligno que deixou terríveis marcas de sangue em Derry. Quase trinta anos depois, os amigos voltam a se encontrar. Uma nova onda de terror tomou a pequena cidade. Mike Hanlon, o único que permanece em Derry, dá o sinal. Precisam unir forças novamente. A Coisa volta a atacar e eles devem cumprir a promessa selada com sangue que fizeram quando crianças. Só eles têm a chave do enigma. Só eles sabem o que se esconde nas entranhas de Derry. O tempo é curto, mas somente eles podem vencer a Coisa. Em \"It - A Coisa\", clássico de Stephen King em nova edição, os amigos irão até o fim, mesmo que isso signifique ultrapassar os próprios limites.', '1', 22, 12),
('	9788595084292', 18, '2018', 'Prisioneiros da Mente', '\"Um magnata poderoso. Um império tecnológico. E uma família dilacerada. Theo Fester conseguiu vencer uma infância de pobreza e bullying para se tornar um empreendedor mundialmente conhecido. Sua vida pessoal, entretanto, não seguiu o mesmo caminho: ele e seus filhos vivem uma farsa, se digladiando por poder e atenção. Ao se dar conta de que sua família está aprisionada por cárceres mentais, Theo precisará se reinventar mais uma vez e mudar radicalmente seus relacionamentos, antes que seja tarde demais.\"', '1', 23, 2),
('8575421131', 19, '2004', 'O Código da Vinci', 'Um assassinato dentro do Museu do Louvre, em Paris, traz à tona uma sinistra conspiração para revelar um segredo que foi protegido por uma sociedade secreta desde os tempos de Jesus Cristo. A vítima é o respeitado curador do museu, Jacques Saunière, um dos líderes dessa antiga fraternidade, o Priorado de Sião, que já teve como membros Leonardo da Vinci, Victor Hugo e Isaac Newton. Momentos antes de morrer, Saunière consegue deixar uma mensagem cifrada na cena do crime que apenas sua neta, a criptógrafa francesa Sophie Neveu, e Robert Langdon, um famoso simbologista de Harvard, podem desvendar. Os dois transformam-se em suspeitos e em detetives enquanto percorrem as ruas de Paris e de Londres tentando decifrar um intricado quebra-cabeças que pode lhes revelar um segredo milenar que envolve a Igreja Católica.', '1', 24, 2),
('9788584390670', 20, '2017', 'O Alquimista', 'Paulo Coelho já inspirou mais de 200 milhões de leitores por todo o mundo com este romance encantador. Esta história, brilhante em sua simplicidade e com uma sabedoria que nos estimula, é sobre um jovem pastor da Andaluzia chamado Santiago que viaja de sua cidade natal na Espanha para o deserto do Egito em busca de um tesouro escondido perto das Pirâmides. Ao longo do caminho, ele encontra uma cigana, um homem que se diz rei e um alquimista, que lhe indicam a direção para a sua busca. Ninguém sabe que tesouro é esse, ou se Santiago será capaz de ultrapassar os obstáculos de seu trajeto. Mas o que começa como uma jornada para encontrar bens mundanos se transforma na descoberta do tesouro que se encontra dentro dele mesmo. Emocionante e profundamente humano, este clássico contemporâneo é um testamento eterno do poder transformador dos nossos sonhos e da importância de ouvirmos nossos corações.', '1', 25, 2),
('40028922', 21, NULL, 'teste', 'bbbbbbbbbbbbbbbbbb', '1', NULL, NULL),
('222222', 22, NULL, 'qaaa', 'aaa', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `livro_autor`
--

CREATE TABLE `livro_autor` (
  `id_livro` int(11) NOT NULL,
  `id_autor` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `livro_autor`
--

INSERT INTO `livro_autor` (`id_livro`, `id_autor`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12),
(13, 13),
(14, 24),
(15, 20),
(16, 31),
(17, 21),
(18, 24),
(19, 25),
(20, 23);

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `nacionalidade`
--

CREATE TABLE `nacionalidade` (
  `id_nacionalidade` int(11) NOT NULL,
  `nome_nacionalidade` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `perfil`
--

INSERT INTO `perfil` (`id_perfil`, `nome_perfil`, `cod_status_perfil`) VALUES
(1, 'Admin_Master', '1'),
(2, 'Admin_Nivel_1', '1'),
(3, 'Admin_Nivel_2', '1'),
(4, 'Cliente', '1'),
(5, 'Sebo', '1'),
(6, 'ss', '0'),
(7, 'aaaa', '0'),
(8, 'qqq', '0'),
(9, 'teste', '0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `postagem`
--

CREATE TABLE `postagem` (
  `id_post` int(11) NOT NULL,
  `titulo_post` varchar(100) DEFAULT NULL,
  `txt_post` text DEFAULT NULL,
  `data_hora_post` datetime DEFAULT NULL,
  `link_post` varchar(100) DEFAULT NULL,
  `url_foto_post` varchar(100) DEFAULT NULL,
  `cod_status_post` varchar(10) DEFAULT '1',
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `postagem`
--

INSERT INTO `postagem` (`id_post`, `titulo_post`, `txt_post`, `data_hora_post`, `link_post`, `url_foto_post`, `cod_status_post`, `id_usuario`) VALUES
(1, 'OlÃ¡ mundos', 'phps', '2019-10-05 23:27:29', NULL, NULL, '1', 5),
(2, 'dssa', 'sdsad', NULL, NULL, NULL, '1', NULL),
(3, 'dsad', 'Hello there...s', NULL, NULL, NULL, '0', NULL),
(4, 'OlÃ¡ mundos', 'Hello there...s', NULL, NULL, NULL, '0', NULL),
(7, 'hellloouu', 'oiiiiss', '2019-10-06 02:59:14', NULL, NULL, '0', 1),
(9, 'fff', 'oiiii', '2019-10-06 03:02:58', NULL, NULL, '0', 1),
(15, 'PHP', '              PHP Ã© uma linguagem interpretada livre, usada originalmente apenas para o desenvolvimento de aplicaÃ§Ãµes presentes e atuantes no lado do servidor, capazes de gerar conteÃºdo dinÃ¢mico na World Wide Web       ', NULL, NULL, NULL, '1', 5),
(16, 'Javascript', 'JavaScript, frequentemente abreviado como JS, Ã© uma linguagem de programaÃ§Ã£o interpretada de alto nÃ­vel, caracterizada tambÃ©m, como dinÃ¢mica, fracamente tipificada, prototype-based e multi-paradigma. Juntamente com HTML e CSS, o JavaScript Ã© uma das trÃªs principais tecnologias da World Wide Web', NULL, NULL, NULL, '1', 5),
(17, 'Cachulus', '       Cthulhu Ã© uma entidade cÃ³smica criada pelo escritor de terror H. P. Lovecraft em 1926. A primeira apariÃ§Ã£o da entidade foi no conto \"The Call of Cthulhu\", publicado na revista Weird Tales em 1928. Cthulhu Ã© um dos Grandes Antigos principais dos Mitos de Lovecraft.    ', NULL, NULL, NULL, '1', 5),
(18, 'teste', 'aaa', NULL, NULL, NULL, '0', 5),
(19, 'teste de postagems', '              OlÃ¡ mundos...        ', NULL, NULL, NULL, '0', 14),
(20, 'bcrypt', 'bcrypt Ã© um mÃ©todo de criptografia do tipo hash para senhas baseado no Blowfish. Foi criado por Niels Provos e David MaziÃ¨res e apresentado na conferÃªncia da USENIX em 1999', NULL, NULL, NULL, '1', 14),
(21, 'teste', 'Abstract:\r\nMany authentication schemes depend on secret passwords. Unfortunately, the length and randomness of user-chosen passwords remain fixed over time. In contrast, hardware improvements constantly give attackers increasing computational power. As a result, password schemes such as the traditional UNIX user-authentication system are failing with time.\r\n\r\nThis paper discusses ways of building systems in which password security keeps up with hardware speeds. We formalize the properties desirable in a good password system, and show that the computational cost of any secure password scheme must increase as hardware improves. We present two algorithms with adaptable cost--eksblowfish, a block cipher with a purposefully expensive key schedule, and bcrypt, a related hash function. Failing a major breakthrough in complexity theory, these algorithms should allow password-based systems to adapt to hardware improvements and remain secure well into the future.\r\n\r\n\r\n\r\n \r\nIntroduction\r\nRelated Work\r\nDesign criteria for password schemes\r\nEksblowfish Algorithm\r\nBcrypt Algorithm\r\nImplementation\r\nBcrypt Evaluation\r\nComparison\r\nTraditional crypt\r\nMD5 crypt\r\nAttacks and Vulnerabilities\r\nSalt Collisions\r\nPrecomputing Dictionaries\r\nAlgorithm Optimization\r\nHardware Improvements\r\nConclusion\r\nAcknowledgments\r\nReferences\r\nAbout this document ...\r\n\r\nNiels Provos and David Mazieres\r\n4/28/1999\r\nThis paper was originally published in the Proceedings of the 1999 USENIX Annual Technical Conference, June 6-11, 1999, Monterey, California, USA\r\nLast changed: 1 Mar 2002 ml', NULL, NULL, NULL, '0', 14);

-- --------------------------------------------------------

--
-- Estrutura da tabela `postagem_sebo`
--

CREATE TABLE `postagem_sebo` (
  `id_postagem` int(11) NOT NULL,
  `data_hora_postagem` datetime DEFAULT NULL,
  `link_postagem` varchar(100) DEFAULT NULL,
  `url_foto_postagem` varchar(100) DEFAULT NULL,
  `txt_postagem` varchar(500) DEFAULT NULL,
  `titulo_postagem` varchar(100) DEFAULT NULL,
  `cod_status_postagem` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  `logradouro_sebo` varchar(50) DEFAULT NULL,
  `cep_end_sebo` varchar(30) DEFAULT NULL,
  `num_tel_sebo` varchar(30) DEFAULT NULL,
  `celular_1_sebo` varchar(50) DEFAULT NULL,
  `celular_2_sebo` varchar(50) DEFAULT NULL,
  `insc_estadual_sebo` varchar(100) DEFAULT NULL,
  `url_site_sebo` varchar(100) DEFAULT NULL,
  `cod_status_sebo` varchar(10) DEFAULT NULL,
  `id_livro` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sebo`
--

INSERT INTO `sebo` (`id_usuario`, `razao_sebo`, `nome_fantasia`, `cnpj_sebo`, `url_foto_sebo`, `num_end_sebo`, `compl_end_sebo`, `logradouro_sebo`, `cep_end_sebo`, `num_tel_sebo`, `celular_1_sebo`, `celular_2_sebo`, `insc_estadual_sebo`, `url_site_sebo`, `cod_status_sebo`, `id_livro`) VALUES
(11, 'Abigail de Queiroz Moreira Pereira', 'Sebo do Marcao', '20.035.914/0001-03', NULL, '111', '', NULL, '06410-080', '1141986832', NULL, NULL, NULL, NULL, '1', 1),
(12, 'Mirian Marinho da Silva Lima', 'Sebo Marinho', '12.672.074/0001-53', NULL, '115', NULL, NULL, '06320-290', '1143867762', NULL, NULL, NULL, NULL, '1', 2),
(14, 'Priscilla Nobre Lobo', 'Sebo e Livraria Corujinha', '21.100.930/0001-97', NULL, '179', NULL, NULL, '06448-020', '1128614286', NULL, NULL, NULL, NULL, '0', 3);

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
  `id_perfil` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome_usuario`, `sobrenome_usuario`, `email_usuario`, `senha_usuario`, `cod_status_usuario`, `id_perfil`) VALUES
(1, 'Mestre ', 'dos Magos', 'master@outlook.com', '1234', '1', 1),
(2, 'Mestre1', 'nivel 1', 'nivel1@outlook.com', '1234', '1', 1),
(3, 'Mestre2', 'nivel 2', 'mestre2@outlook.com', '1234', '1', 3),
(5, 'Marcos', 'Santos Carvalho', 'marcos_sco@outlook.com', '$2y$08$yefSkudereUCzJ1OnepDb.SSufPEeBnluzOM5L79po/AilMqsNCeK', '1', 1),
(6, 'Joyce Victoria', 'Leite Oquendo', 'rm35881@estudante.fieb.edu.br', '12345678', '1', 2),
(7, 'Daniele Maria', 'França', 'rm36113@estudante.fieb.edu.br', '12345678', '1', 3),
(8, 'Jennifer', 'Keity Guimarães', 'rm36139@estudante.fieb.edu.br', '12345678', '1', 3),
(9, 'Suelane', 'Garcia Fontes', 'suelane.fontes@docente.fieb.edu.br', '12345678', '1', 4),
(10, 'Giovani', 'Barbosa Wingter', 'giovani.wingter@docente.fieb.edu.br', '12345678', '1', 4),
(11, 'Abigail', 'Queiroz Moreira Pereira', 'sebodomarcao@uol.com.br', '12345678', '1', 5),
(12, 'Mirian', 'Marinho da Silva Lima', 'sebosantafe@hotmail.com', '12345678', '1', 5),
(13, 'Denis', 'Monteiro Guimaraes', 'denis.guimaraes@docente.fieb.edu.br', '12345678', '1', 4),
(14, 'Priscilla', 'Nobre Lobo', 'comum@outlook.com', '$2y$08$yefSkudereUCzJ1OnepDb.SSufPEeBnluzOM5L79po/AilMqsNCeK', '1', 5),
(15, 'Dio Brando', 'theWorld', 'world@outlook.com', '1234', '1', 4),
(16, 'Jonathan', 'Joestar', 'jojo@outlook.com', '1234', '1', 4);

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
  ADD KEY `id_postagem` (`id_postagem`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices para tabela `editora`
--
ALTER TABLE `editora`
  ADD PRIMARY KEY (`id_editora`);

--
-- Índices para tabela `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id_evento`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices para tabela `livro`
--
ALTER TABLE `livro`
  ADD PRIMARY KEY (`id_livro`),
  ADD KEY `id_editora` (`id_editora`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Índices para tabela `livro_autor`
--
ALTER TABLE `livro_autor`
  ADD PRIMARY KEY (`id_livro`,`id_autor`),
  ADD KEY `id_autor` (`id_autor`);

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
-- Índices para tabela `postagem_sebo`
--
ALTER TABLE `postagem_sebo`
  ADD PRIMARY KEY (`id_postagem`);

--
-- Índices para tabela `sebo`
--
ALTER TABLE `sebo`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_livro` (`id_livro`);

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
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `livro`
--
ALTER TABLE `livro`
  MODIFY `id_livro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `postagem`
--
ALTER TABLE `postagem`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
