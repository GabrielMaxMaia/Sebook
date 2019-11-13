-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: localhost    Database: db_sebook
-- ------------------------------------------------------
-- Server version	5.7.16-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `autor`
--

DROP TABLE IF EXISTS `autor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `autor` (
  `id_autor` int(11) NOT NULL AUTO_INCREMENT,
  `nome_autor` varchar(100) DEFAULT NULL,
  `cod_status_autor` varchar(10) DEFAULT '1',
  `id_nacionalidade` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_autor`),
  KEY `id_nacionalidade` (`id_nacionalidade`),
  CONSTRAINT `autor_ibfk_1` FOREIGN KEY (`id_nacionalidade`) REFERENCES `nacionalidade` (`id_nacionalidade`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `autor`
--

LOCK TABLES `autor` WRITE;
/*!40000 ALTER TABLE `autor` DISABLE KEYS */;
INSERT INTO `autor` VALUES (1,'Miguel de Cervantes','1',1),(2,'Liev Tolstoi','1',2),(3,'Thomas Mann','1',3),(4,'Gabriel Garcia Marquez','1',4),(5,'James Joyce','1',5),(6,'Marcel Proust','1',6),(7,'Dante Alighieri','1',7),(8,'Robert Musil','1',8),(9,'Franz Kafka','1',9),(10,'Luis de Camoes','1',10),(11,'William Shakespeare','1',11),(12,'Jane Austen','1',11),(13,'John Green','1',12),(14,'Machado de Assis','1',13),(15,'Clarice Lispector','1',13),(16,'Carlos Drummond de Andrade','1',13),(17,'José de Alencar','1',13),(18,'Luis Fernando Verissimo','1',13),(19,'Jorge Amado','1',13),(20,'J. K. Rowling','1',11),(21,'Stephen King','1',12),(22,'Guimarães Rosa','1',13),(23,'Paulo Coelho','1',13),(24,'Augusto Cury','1',13),(25,'Dan Brown','1',12),(26,'Graciliano Ramos','1',13),(27,'Fiódor Dostoiévski','1',2),(28,'William Faulkner','1',12),(29,'Alexandre Dumas','1',6),(30,'Antoine de Saint-Exupéry','1',6),(31,'William P. Young','1',21);
/*!40000 ALTER TABLE `autor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `avaliacao_sebo`
--

DROP TABLE IF EXISTS `avaliacao_sebo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `avaliacao_sebo` (
  `id_usuario_sebo` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `data_hora` datetime DEFAULT NULL,
  `nota` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_usuario_sebo`,`id_usuario`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `avaliacao_sebo_ibfk_1` FOREIGN KEY (`id_usuario_sebo`) REFERENCES `sebo` (`id_usuario`),
  CONSTRAINT `avaliacao_sebo_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `cliente` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `avaliacao_sebo`
--

LOCK TABLES `avaliacao_sebo` WRITE;
/*!40000 ALTER TABLE `avaliacao_sebo` DISABLE KEYS */;
/*!40000 ALTER TABLE `avaliacao_sebo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `nome_categoria` varchar(100) DEFAULT NULL,
  `cod_status_categoria` varchar(10) DEFAULT '1',
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,'Literatura Juvenil','1'),(2,'Romance','1'),(3,'Poesia','1'),(4,'Teatro','1'),(5,'Humor','1'),(6,'Biografias','1'),(7,'Contos','1'),(8,'Ficção Científica','1'),(9,'Folclore','1'),(10,'Coleções','1'),(11,'Aventura','1'),(12,'Terror','1'),(13,'Ação','1'),(14,'Drama','1'),(15,'Infantis','1'),(16,'Manuais','1'),(17,'Jogos','1'),(18,'Política','1'),(19,'InfantoJuvenis','1');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `id_usuario` int(11) NOT NULL,
  `sexo_cliente` char(1) DEFAULT NULL,
  `compl_end_cliente` varchar(100) DEFAULT NULL,
  `logradouro_cliente` varchar(50) DEFAULT NULL,
  `num_compl_cliente` varchar(100) DEFAULT NULL,
  `cpf_cliente` varchar(30) DEFAULT NULL,
  `cep_cliente` varchar(30) DEFAULT NULL,
  `dt_nasc_cliente` date DEFAULT NULL,
  `cod_status_cliente` varchar(10) DEFAULT '1',
  PRIMARY KEY (`id_usuario`),
  CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (5,'M','Inicio','AL','231','489.458.945-89','04854-169','1997-01-22','1'),(9,'F',NULL,NULL,NULL,'45687912587','06589054','1900-01-01','1'),(10,'M',NULL,NULL,NULL,'12378965878','06545687','1900-01-01','1'),(13,'M','','','','36574159866','06512987','1900-01-01','1'),(15,'M','yrty','AL','ytrydsad','487.795.687-10','06874-510','2019-10-11','1'),(26,'M','','','','','','2019-10-11','1'),(27,'M','','FAZ','','','','2019-10-12','1'),(29,'F','','','','','','2019-10-12','1'),(37,'M','','AL','','','','1992-01-01','1'),(41,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1'),(42,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1'),(43,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1'),(44,'M','','PRQ','','','','2019-10-27','1');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente_sebo`
--

DROP TABLE IF EXISTS `cliente_sebo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente_sebo` (
  `id_usuario` int(11) NOT NULL,
  `id_usuario_sebo` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`,`id_usuario_sebo`),
  KEY `id_usuario_sebo` (`id_usuario_sebo`),
  CONSTRAINT `cliente_sebo_ibfk_1` FOREIGN KEY (`id_usuario_sebo`) REFERENCES `sebo` (`id_usuario`),
  CONSTRAINT `cliente_sebo_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `cliente` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente_sebo`
--

LOCK TABLES `cliente_sebo` WRITE;
/*!40000 ALTER TABLE `cliente_sebo` DISABLE KEYS */;
/*!40000 ALTER TABLE `cliente_sebo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comentario`
--

DROP TABLE IF EXISTS `comentario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comentario` (
  `id_comentario` int(11) NOT NULL AUTO_INCREMENT,
  `txt_comentario` varchar(500) CHARACTER SET latin1 DEFAULT NULL,
  `data_hora_comentario` datetime DEFAULT NULL,
  `cod_status_comentario` varchar(10) CHARACTER SET latin1 DEFAULT '1',
  `id_post` varchar(255) COLLATE latin1_danish_ci DEFAULT NULL,
  `id_evento` varchar(225) COLLATE latin1_danish_ci DEFAULT NULL,
  `id_usuario` varchar(255) COLLATE latin1_danish_ci DEFAULT NULL,
  `id_comentario_parente` int(11) DEFAULT NULL,
  `id_pagina` varchar(255) COLLATE latin1_danish_ci DEFAULT NULL,
  PRIMARY KEY (`id_comentario`),
  KEY `id_post` (`id_post`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=82 DEFAULT CHARSET=latin1 COLLATE=latin1_danish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comentario`
--

LOCK TABLES `comentario` WRITE;
/*!40000 ALTER TABLE `comentario` DISABLE KEYS */;
INSERT INTO `comentario` VALUES (46,'dsad','2019-10-29 01:16:31','1','9788535929225',NULL,'35',0,''),(45,'muito bom','2019-10-29 01:10:36','1','9788573264241',NULL,'37',0,''),(44,'Livro show','2019-10-29 01:09:46','1','9788516079444',NULL,'37',0,''),(43,'eae','2019-10-29 01:09:35','1','0',NULL,'37',0,'11'),(41,'let\'s rock','2019-10-29 01:08:41','1','9788535928204',NULL,'37',0,''),(42,'Oi ','2019-10-29 01:09:07','1','0',NULL,'37',0,'35'),(39,'show de boloa','2019-10-29 01:06:55','0','11',NULL,'35',0,'11'),(40,'eae','2019-10-29 01:07:47','1','0',NULL,'35',0,'11'),(38,'eae','2019-10-29 01:06:20','1','9788535928204',NULL,'35',0,''),(50,'dsadsa','2019-10-29 01:17:47','0','0',NULL,'35',0,'11'),(49,'adsad','2019-10-29 01:17:31','1','9788516079444',NULL,'35',0,''),(48,'teste','2019-10-29 01:17:24','1','5',NULL,'35',0,''),(47,'dsad','2019-10-29 01:16:37','1','5',NULL,'35',0,''),(51,'rrr','2019-10-31 10:16:36','1','0',NULL,'15',0,'35'),(52,'sad','2019-10-31 10:22:26','1','0',NULL,'35',0,'35'),(53,'rrr','2019-10-31 10:52:57','1','0',NULL,'35',0,'35'),(54,'rrr','2019-10-31 11:02:53','1','9788501110367',NULL,'35',0,''),(55,'teste','2019-10-31 11:25:34','1','0',NULL,'15',0,'11'),(56,'eae','2019-10-31 11:25:52','1','0',NULL,'37',0,'11'),(57,'','2019-10-31 11:30:07','1','0',NULL,'0',0,''),(58,'OlÃ¡ mundo','2019-11-03 01:09:34','1','4',NULL,'15',0,''),(59,'eae','2019-11-03 02:28:46','1','4',NULL,'35',0,''),(60,'fsdkmgnoismdigoviomfsdiogbmiofdmiombgiomdfiobmiomdfibbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb','2019-11-03 03:06:53','1','4',NULL,'35',0,''),(61,'fsggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggg','2019-11-03 03:07:46','1','4',NULL,'35',0,''),(62,'sdfdfg','2019-11-03 03:07:50','1','4',NULL,NULL,0,''),(63,'eae','2019-11-03 03:12:32','1','9788535928204',NULL,NULL,0,''),(64,'teste','2019-11-03 18:40:04','0','4',NULL,'35',0,''),(65,'Talvez vocÃª possa encontrar o caminho para casa lendo esse livro...','2019-11-03 19:11:08','1','9788535928204',NULL,'15',0,''),(66,'teste','2019-11-07 01:23:30','1','0','3','15',0,''),(67,'ad','2019-11-12 20:53:23','1','19','0','37',0,''),(68,'dasd','2019-11-12 20:53:26','1','19','0','37',0,''),(69,'kkk','2019-11-12 20:53:36','1','19','0','37',0,''),(70,'kkk','2019-11-12 20:55:43','1','19','0','37',0,''),(71,'kkk','2019-11-12 20:59:25','1','19','','37',0,''),(72,'fdsgsdg','2019-11-12 20:59:27','1','19','','37',0,''),(73,'dtreygdfgdfg','2019-11-12 20:59:34','1','19','','37',0,''),(74,'','2019-11-12 20:59:37','0','19','','37',0,''),(75,'dtrey','2019-11-12 20:59:45','0','19','','37',0,''),(76,'fsdfds','2019-11-12 20:59:47','0','19','','37',0,''),(77,'gdfgfdg','2019-11-12 21:02:21','1','','15','37',0,''),(78,'gdgfd','2019-11-12 21:22:44','1','9788584390670','','5',0,''),(79,'eee','2019-11-12 21:25:36','1','','','5',0,'35'),(80,'eee','2019-11-12 21:25:51','1','9788516079444','','5',0,''),(81,'eee','2019-11-12 21:25:58','1','18','','5',0,'');
/*!40000 ALTER TABLE `comentario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `editora`
--

DROP TABLE IF EXISTS `editora`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `editora` (
  `id_editora` int(11) NOT NULL AUTO_INCREMENT,
  `nome_editora` varchar(100) DEFAULT NULL,
  `cod_status_editora` varchar(10) DEFAULT '1',
  PRIMARY KEY (`id_editora`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `editora`
--

LOCK TABLES `editora` WRITE;
/*!40000 ALTER TABLE `editora` DISABLE KEYS */;
INSERT INTO `editora` VALUES (1,'Moderna','1'),(2,'Companhia Das Letras','1'),(3,'Record','1'),(4,'Dover Publications Usa','1'),(5,'Editora 34','1'),(6,'Perspectiva','1'),(7,'Lafonte','1'),(8,'Martin Claret','1'),(9,'Penguin E Companhia Das Letras','1'),(10,'Intrinseca','1'),(11,'Saraiva','1'),(12,'Editora FTD','1'),(13,'Abril Educação','1'),(14,'Globo','1'),(15,'Sextante ','1'),(16,'Ediouro ','1'),(17,'Novo Conceito','1'),(18,'Santillana ','1'),(19,'Planeta ','1'),(20,'Leya ','1'),(21,'Rocco','1'),(22,'Suma','1'),(23,'HarperCollins','1'),(24,'Arqueiro','1'),(25,'Paralela','1');
/*!40000 ALTER TABLE `editora` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `emails_lidos`
--

DROP TABLE IF EXISTS `emails_lidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `emails_lidos` (
  `id_emails_lidos` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(520) NOT NULL,
  PRIMARY KEY (`id_emails_lidos`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emails_lidos`
--

LOCK TABLES `emails_lidos` WRITE;
/*!40000 ALTER TABLE `emails_lidos` DISABLE KEYS */;
INSERT INTO `emails_lidos` VALUES (29,'ruanc_oliveira@hotmail.com');
/*!40000 ALTER TABLE `emails_lidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evento`
--

DROP TABLE IF EXISTS `evento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `evento` (
  `id_evento` int(11) NOT NULL AUTO_INCREMENT,
  `nome_evento` varchar(255) DEFAULT NULL,
  `txt_evento` varchar(255) DEFAULT NULL,
  `data_evento` date DEFAULT NULL,
  `hora_evento` time DEFAULT NULL,
  `local_evento` varchar(255) DEFAULT NULL,
  `cidade_evento` varchar(255) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `url_foto_evento` varchar(255) DEFAULT NULL,
  `eventocol` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_evento`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evento`
--

LOCK TABLES `evento` WRITE;
/*!40000 ALTER TABLE `evento` DISABLE KEYS */;
INSERT INTO `evento` VALUES (1,'Estudando Programaï¿½ï¿½o atï¿½ nï¿½o aguentar mais','Olï¿½ mundo            ','2019-11-04','04:05:00',NULL,NULL,35,'public/img/imgEvento/Big_Dan.jpg',NULL),(2,'Estudando','OlÃ¡                      ','2019-11-04','02:06:00',NULL,NULL,11,'public/img/imgEvento/Big_Harman.jpg',NULL),(3,'Estudando Programaï¿½ï¿½o atï¿½ nï¿½o aguentar mais','                                Olï¿½ mundo                        ','2019-11-04','07:00:00',NULL,NULL,1,'public/img/imgEvento/Big_MASK.jpg',NULL),(4,'teste','eae','2019-11-19','23:59:00',NULL,NULL,15,'public/img/imgEvento/imgPadrao/imgEventopadrao.jpg',NULL),(5,'testeCriando','sda','2019-11-12','01:01:00',NULL,NULL,15,'public/img/imgEvento/imgPadrao/imgEventopadrao.jpg',NULL),(6,'teste','olÃ¡ \r\nmundo \r\neee','2019-11-16','02:02:00',NULL,NULL,15,'public/img/imgEvento/Big_KAEDE.jpg',NULL),(10,'teste','ddsaioÃ§','2019-11-04','02:06:00','Rua das Pedras NÂº 231','Barueri',15,'public/img/imgEvento/Big_Con.jpg',NULL),(14,'Estudandosss','eae','2019-11-20','22:05:00','Rua  da pontes 231','AlvinlÃ¢ndia',35,'public/img/imgEvento/imgPadrao/imgEventopadrao.jpg',NULL),(15,'Estudandos','reaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa','2019-11-22','02:04:00','Rua das pontes 23','Adolfo',35,'public/img/imgEvento/Big_Garcian.jpg',NULL);
/*!40000 ALTER TABLE `evento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `links_emails`
--

DROP TABLE IF EXISTS `links_emails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `links_emails` (
  `id_link` int(11) NOT NULL AUTO_INCREMENT,
  `link` varchar(520) NOT NULL,
  `id_emails_lidos` int(11) NOT NULL,
  `situacao` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_link`),
  KEY `id_emails_lidos` (`id_emails_lidos`),
  CONSTRAINT `links_emails_ibfk_1` FOREIGN KEY (`id_emails_lidos`) REFERENCES `emails_lidos` (`id_emails_lidos`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `links_emails`
--

LOCK TABLES `links_emails` WRITE;
/*!40000 ALTER TABLE `links_emails` DISABLE KEYS */;
INSERT INTO `links_emails` VALUES (28,'d44df9a87f8948e34ea520ef35d8218b',29,2);
/*!40000 ALTER TABLE `links_emails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `livro`
--

DROP TABLE IF EXISTS `livro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `livro` (
  `isbn_livro` varchar(100) NOT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `ano_livro` varchar(20) DEFAULT NULL,
  `cod_status_livro` varchar(10) DEFAULT '1',
  `nome_livro` varchar(100) DEFAULT NULL,
  `sinopse_livro` varchar(3500) DEFAULT NULL,
  `id_editora` int(11) DEFAULT NULL,
  `url_foto_livro` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`isbn_livro`),
  KEY `id_editora` (`id_editora`),
  KEY `id_categoria` (`id_categoria`),
  CONSTRAINT `livro_ibfk_1` FOREIGN KEY (`id_editora`) REFERENCES `editora` (`id_editora`),
  CONSTRAINT `livro_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `livro`
--

LOCK TABLES `livro` WRITE;
/*!40000 ALTER TABLE `livro` DISABLE KEYS */;
INSERT INTO `livro` VALUES ('8532511015',1,'2000','1','Harry Potter e A Pedra Filosofal','Em Harry Potter e a Pedra Filosofal, o leitor ï¿½ apresentado a Harry, filho de Tiago e Lï¿½lian Potter, feiticeiros que foram assassinados por um poderosï¿½ssimo bruxo, quando ele ainda era um bebï¿½. Com isso, o menino acaba sendo levado para a casa dos tios que nada tinham a ver com o sobrenatural pelo contrï¿½rio. Atï¿½ os 10 anos, Harry foi uma espï¿½cie de gata borralheira: maltratado pelos tios, herdava roupas velhas do primo gorducho, tinha ï¿½culos remendados e era tratado como um estorvo. No dia de seu aniversï¿½rio de 11 anos, entretanto, ele parece deslizar por um buraco sem fundo, como o de Alice no paï¿½s das maravilhas, que o conduz a um mundo mï¿½gico. Descobre sua verdadeira histï¿½ria e seu destino: ser um aprendiz de feiticeiro atï¿½ o dia em que terï¿½ que enfrentar a pior forï¿½a do mal, o homem que assassinou seus pais, o terrï¿½vel Lorde das Trevas. ',21,'public/img/imgLivro/harryPotter_8532511015.png'),('8575421131',2,'2004','1','O Cï¿½digo da Vinci','Um assassinato dentro do Museu do Louvre, em Paris, traz ï¿½ tona uma sinistra conspiraï¿½ï¿½o para revelar um segredo que foi protegido por uma sociedade secreta desde os tempos de Jesus Cristo. A vï¿½tima ï¿½ o respeitado curador do museu, Jacques Sauniï¿½re, um dos lï¿½deres dessa antiga fraternidade, o Priorado de Siï¿½o, que jï¿½ teve como membros Leonardo da Vinci, Victor Hugo e Isaac Newton. Momentos antes de morrer, Sauniï¿½re consegue deixar uma mensagem cifrada na cena do crime que apenas sua neta, a criptï¿½grafa francesa Sophie Neveu, e Robert Langdon, um famoso simbologista de Harvard, podem desvendar. Os dois transformam-se em suspeitos e em detetives enquanto percorrem as ruas de Paris e de Londres tentando decifrar um intricado quebra-cabeï¿½as que pode lhes revelar um segredo milenar que envolve a Igreja Catï¿½lica.',24,'public/img/imgLivro/oCodigoDaVinci_8575421131.jpg'),('9780486421230',2,'2002','1','Swann\'s Way','A psychological self-portrait, a clear-eyed social study, and a profound meditation upon the artistic process, Marcel Proust\'s monumental, encyclopedic masterpiece A la recherche du temps perdu (In Search of Lost Time) changed the course of 20th-century literature. Swann\'s Way, the first volume, introduces the novel\'s major themes and its unnamed narrator, an introspective man drawn, in his youth, to fashionable society, like the author himself. Through his narrator\'s consciousness, Proust offers readers a comprehensive portrait of the high society of Paris from the 1870s through the First World War.Swann\'s Way begins with the narrator\'s reminiscences of early childhood -- including, famously, his evocative memory of eating a pastry called a madeleine -- and his fascination with what seemed the separate worlds of his family\'s various neighbors and acquaintances. He then turns his focus to the wealthy connoisseur Charles Swann and his obsessive relationship with the vulgar but radiant courtesan Odette, chronicling in detail the milieu in which it is enacted and its unfortunate effects on him.Du cote de chez Swann first appeared in 1913. It is a bitingly satiric, often comic evocation of French society that addresses a range of philosophical questions about perception, memory, desire, art, family, and politics. On its own or as part of a larger work, it is a rich search for a reality that transcends the passage of time.',4,'public/img/imgLivro/swannsWay_9780486421230.jpg'),('9788501110367',2,'2017','1','Cem Anos De Solidï¿½o - Ediï¿½ï¿½o Especial','Ediï¿½ï¿½o comemorativa em capa dura dos 50 anos de publicaï¿½ï¿½o da obra-prima de Gabriel Garcï¿½a Mï¿½rquez Neste que ï¿½ um dos maiores clï¿½ssicos da literatura, o prestigiado autor narra a incrï¿½vel e triste histï¿½ria dos Buendï¿½a ï¿½ a estirpe de solitï¿½rios para a qual nï¿½o serï¿½ dada ï¿½uma segunda oportunidade sobre a terraï¿½ e apresenta o maravilhoso universo da fictï¿½cia Macondo, onde se passa o romance. ï¿½ lï¿½ que acompanhamos diversas geraï¿½ï¿½es dessa famï¿½lia, assim como a ascensï¿½o e a queda do vilarejo. Para alï¿½m dos artifï¿½cios tï¿½cnicos e das influï¿½ncias literï¿½rias que transbordam do livro, ainda vemos em suas pï¿½ginas o que por muitos ï¿½ considerado uma autï¿½ntica enciclopï¿½dia do imaginï¿½rio, num estilo que consagrou o colombiano como um dos maiores autores do sï¿½culo XX.',3,'public/img/imgLivro/cemAnosDeSolidao_9788501110367.jpg'),('9788516079444',1,'2012','1','Dom Quixote','Apaixonado por histï¿½rias de cavalaria, Alonso Quijano passa a acreditar que ï¿½ um cavaleiro andante. Em seu delï¿½rio, muda o nome para Dom Quixote de la Mancha, veste-se com uma armadura improvisada, faz de Dulcineia sua amada, a quem quer dedicar suas glï¿½rias e seus feitos. O vizinho Sancho Panï¿½a torna-se seu fiel escudeiro. Nenhum cavaleiro andante teve a ousadia de Dom Quixote. Tampouco viveu suas aventuras e desventuras, que aqui sï¿½o contadas de forma divertida e emocionante. Adaptaï¿½ï¿½o de Walcyr Carrasco.',1,'public/img/imgLivro/domQuixote_9788516079444.jpg'),('9788516079444444',1,'2123','0','4dsfsf','1',1,'public/img/imgLivro/prisioneirosDaMente.jpg'),('9788527311229',2,'2018','1','Uniï¿½es - A Perfeiï¿½ï¿½o do Amor e A Tentaï¿½ï¿½o da Quieta Verï¿½nica','Vagando e divagando pelo corpo, sensaï¿½ï¿½es e pensamentos de duas mulheres, Robert Musil, cï¿½lebre autor de O Homem Sem Qualidades, constrï¿½i em Uniï¿½es uma narrativa intensamente dramï¿½tica e fragmentada, de absoluta radicalidade. Traduzido e comentado pela primeira vez em portuguï¿½s por Kathrin Rosenfield e Lawrence Flores Pereira, Uniï¿½es revive agora em novo contexto, no qual os conflitos de gï¿½nero se tornam tï¿½o acirrados quanto inevitï¿½veis. Uniï¿½es reï¿½ne dois contos: A Perfeiï¿½ï¿½o do Amor e A Tentaï¿½ï¿½o da Quieta Verï¿½nica, protagonizados, respectivamente, por Claudine e Verï¿½nica. Os traumas psicolï¿½gicos vividos pelas personagens, ainda na infï¿½ncia, se fazem notar jï¿½ na idade adulta pelo problema da entrega de corpo, alma e mente ao homem amado. No esforï¿½o de lidar com as consequï¿½ncias impostas por pulsï¿½es sexuais descontroladas, a primeira procura proteger seu casamento, enquanto a segunda se refugia em idealizaï¿½ï¿½es fantasiosas que a impedem do contato humano real. Comparï¿½vel ï¿½s tramas psicolï¿½gicas de Clarice Lispector, Musil recorre a ferramentas narrativas muito a frente de seu tempo para encontrar dimensï¿½es afetivas onde os desafios sï¿½o os mesmos, tanto para homens quanto para mulheres.',6,'public/img/imgLivro/unioesMusil_9788527311229.jpg'),('9788535928204',2,'2016','1','A Montanha Mï¿½gica','Ansiosamente aguardado pelos leitores brasileiros, volta ï¿½s livrarias o cï¿½lebre romance A montanha mï¿½gica, a grande obra-prima de Thomas Mann. A nova ediï¿½ï¿½o tem traduï¿½ï¿½o de Herbert Caro e posfï¿½cio inï¿½dito de Paulo Astor Soethe, renomado especialista na obra do autor. Neste clï¿½ssico da literatura alemï¿½, Mann renova a tradiï¿½ï¿½o do Bildungsroman ï¿½ o romance de formaï¿½ï¿½o ï¿½ a partir da trajetï¿½ria do jovem engenheiro Hans Castorp. Durante uma inesperada estadia de sete anos em um sanatï¿½rio para tuberculosos nos Alpes suï¿½ï¿½os, Hans relaciona-se com uma mirï¿½ade de personagens enfermos que encarnam os conflitos espirituais e ideolï¿½gicos que antecedem a Primeira Guerra Mundial. Lidando com uma variedade de temas ï¿½ estados doentios e corpï¿½reos, a arte, o amor, a natureza do tempo e da morte ï¿½, este livro, publicado originalmente em 1924, ï¿½ um dos grandes testamentos literï¿½rios do sï¿½culo XX e uma das obras inesgotï¿½veis da ficï¿½ï¿½o ocidental.',2,'public/img/imgLivro/aMontanhaMagica_9788535928204.jpg'),('9788535929225',2,'2017','1','Anna Karienina','ï¿½Toda a diversidade, todo o encanto, toda a beleza da vida ï¿½ feita de sombra e de luzï¿½, escreve Liev Tolstï¿½i no romance que Fiï¿½dor Dostoiï¿½vski definiu como ï¿½impecï¿½velï¿½. Publicado originalmente em forma de fascï¿½culos entre 1875 e 1877, antes de finalmente ganhar corpo de livro em 1877, Anna Kariï¿½nina continua a causar espanto. Como pode uma obra de arte se parecer tanto com a vida? Com absoluta maestria, Tolstï¿½i conduz o leitor por um salï¿½o repleto de mï¿½sica, perfumes, vestidos de renda, num ambiente de imagens vï¿½vidas e quase palpï¿½veis que tï¿½m como pano de fundo a Rï¿½ssia czarista. Nessa galeria de personagens excessivamente humanos, ninguï¿½m estï¿½ inteiramente a salvo de julgamento: nï¿½o hï¿½ herï¿½is, tampouco fracassados, e sim pessoas complexas, ambï¿½guas, que nï¿½o se restringem a fï¿½rmulas prontas. Religiï¿½o, famï¿½lia, polï¿½tica e classe social sï¿½o postas ï¿½ prova no trï¿½gico percurso traï¿½ado por uma aristocrata casada que, ao se envolver em um caso extraconjugal, experimenta as virtudes e as agruras de um amor profundamente conflituoso, ï¿½feito de sombra e de luzï¿½.',2,'public/img/imgLivro/annaKarienina_9788535929225.jpg'),('9788543104355',2,'2016','1','O Homem Mais Inteligente da Histï¿½ria','Considerado o autor brasileiro mais lido da dï¿½cada, Augusto Cury jï¿½ vendeu 28 milhï¿½es de livros. ï¿½O homem mais inteligente da histï¿½riaï¿½ ï¿½ fruto de 15 anos de estudos e pesquisas. Considerado por Augusto Cury a obra mais importante de sua carreira, este ï¿½ o primeiro volume de uma coleï¿½ï¿½o que vai abalar nossas convicï¿½ï¿½es e transformar nossa visï¿½o do personagem que julgï¿½vamos conhecer tï¿½o bem. Psicï¿½logo e pesquisador, Dr. Marco Polo desenvolveu uma teoria inï¿½dita sobre o funcionamento da mente e a gestï¿½o da emoï¿½ï¿½o. Apï¿½s sofrer uma terrï¿½vel perda pessoal, ele vai a Jerusalï¿½m participar de um ciclo de conferï¿½ncias na ONU e ï¿½ confrontado com uma pergunta surpreendente: Jesus sabia gerenciar a prï¿½pria mente? Ateu convicto, Marco Polo responde que ciï¿½ncia e religiï¿½o nï¿½o se misturam. No entanto, instigado pelo tema, decide analisar a inteligï¿½ncia de Cristo ï¿½ luz das ciï¿½ncias humanas. Ele esperava encontrar um homem simplï¿½rio, com poucos recursos emocionais. Mas ao mergulhar na inquietante biografia de Jesus presente no Livro de Lucas, suas crenï¿½as vï¿½o sendo pouco a pouco colocadas em xeque. Para empreender essa incrï¿½vel jornada, Marco Polo vai contar com uma mesa-redonda composta por dois brilhantes teï¿½logos, um renomado neurocirurgiï¿½o e sua assistente, a psiquiatra Sofia. Juntos, eles irï¿½o decifrar os sentidos ocultos em um dos textos mais famosos do Novo Testamento. Os debates sï¿½o transmitidos via internet e cativam espectadores em todo o mundo ï¿½ mas nem todos estï¿½o preparados para ver Jesus sob uma ï¿½tica tï¿½o revolucionï¿½ria. Agora os intelectuais terï¿½o que lidar com seus prï¿½prios fantasmas emocionais e encarar perigos que jamais imaginaram enfrentar.',15,'public/img/imgLivro/oHoememMaisInteligenteDaHistoria_9788543104355.jpg'),('9788544001400',3,'2017','1','Os Lusï¿½adas','Os Lusï¿½adas tï¿½m uma importï¿½ncia central na literatura de lï¿½ngua portuguesa: trata-se da obra que consolidou o portuguï¿½s moderno e elevou o idioma ao patamar de lï¿½ngua respeitada culturalmente. Mais do que sintetizar os anseios de uma naï¿½ï¿½o e de todo um perï¿½odo histï¿½rico ï¿½ glï¿½ria reservada a poucos ï¿½, com Os Lusï¿½adas, Camï¿½es imortalizou-se como um tesouro portuguï¿½s legado ï¿½ humanidade.',8,'public/img/imgLivro/osLusiadas_9788544001868.jpg'),('9788544001868',2,'2018','1','Persuasï¿½o','\"Persuasï¿½oï¿½ foi o ï¿½ltimo trabalho completo de Jane Austen. O livro conta a histï¿½ria de Anne Elliot, uma das heroï¿½nas mais tranquilas e reservadas de Austen, mas, ao mesmo tempo, uma das mais fortes e abertas ï¿½s mudanï¿½as. O livro enaltece a constï¿½ncia do amor numa ï¿½poca turbulenta na histï¿½ria da Inglaterra: as guerras napoleï¿½nicas. Escrito nesse perï¿½odo, o romance descreve como uma mulher pode permanecer fiel ao seu passado e, ainda assim, pensar em um futuro feliz. Austen expï¿½e de maneira sutil como uma mulher pode passar por cima das convenï¿½ï¿½es sociais e das restriï¿½ï¿½es femininas em busca da felicidade.',8,'public/img/imgLivro/persuasao_9788544001868.jpg'),('9788560280940',12,'2014','1','It - A Coisa','Durante as fï¿½rias escolares de 1958, em Derry, pacata cidadezinha do Maine, Bill, Richie, Stan, Mike, Eddie, Ben e Beverly aprenderam o real sentido da amizade, do amor, da confianï¿½a e... do medo. O mais profundo e tenebroso medo. Naquele verï¿½o, eles enfrentaram pela primeira vez a Coisa, um ser sobrenatural e maligno que deixou terrï¿½veis marcas de sangue em Derry. Quase trinta anos depois, os amigos voltam a se encontrar. Uma nova onda de terror tomou a pequena cidade. Mike Hanlon, o ï¿½nico que permanece em Derry, dï¿½ o sinal. Precisam unir forï¿½as novamente. A Coisa volta a atacar e eles devem cumprir a promessa selada com sangue que fizeram quando crianï¿½as. Sï¿½ eles tï¿½m a chave do enigma. Sï¿½ eles sabem o que se esconde nas entranhas de Derry. O tempo ï¿½ curto, mas somente eles podem vencer a Coisa. Em \"It - A Coisa\", clï¿½ssico de Stephen King em nova ediï¿½ï¿½o, os amigos irï¿½o atï¿½ o fim, mesmo que isso signifique ultrapassar os prï¿½prios limites.',22,'public/img/imgLivro/itCoisa_9788560280940.jpg'),('9788563560421',2,'2012','1','Ulysses','Um homem sai de casa pela manhï¿½, cumpre com as tarefas do dia e, pela noite, retorna ao lar. Foi em torno desse esqueleto enganosamente simples, quase banal, que James Joyce elaborou o que veio a ser o grande romance do sï¿½culo XX. Inspirado na Odisseia de Homero, Ulysses ï¿½ ambientado em Dublin, e narra as aventuras de Leopold Bloom e seu amigo Stephen Dedalus ao longo do dia 16 de junho de 1904. Tal como o Ulisses homï¿½rico, Bloom precisa superar numerosos obstï¿½culos e tentaï¿½ï¿½es atï¿½ retornar ao apartamento na rua Eccles, onde sua mulher, Molly, o espera. Para criar esse personagem rico e vibrante, Joyce misturou numerosos estilos e referï¿½ncias culturais, num caleidoscï¿½pio de vozes que tem desafiado geraï¿½ï¿½es de leitores e estudiosos ao redor do mundo. O culto em torno de Ulysses teve inï¿½cio antes mesmo de sua publicaï¿½ï¿½o em livro, quando trechos do romance comeï¿½aram a aparecer num jornal literï¿½rio dos EUA. Por conta dessas passagens, Ulysses foi banido nos Estados Unidos, numa acusaï¿½ï¿½o de obscenidade, dando inï¿½cio a uma longa pendenga legal, que seria resolvida apenas onze anos depois, com a liberaï¿½ï¿½o do romance em solo americano. Mas, para alï¿½m das disputas e polï¿½micas, Ulysses segue como um divisor de ï¿½guas por conta do ï¿½xito do autor no principal ponto do romance: esticar e moldar a lï¿½ngua inglesa ao limite, a fim de retirar disso um retrato fiel, divertido e comovente do que se convencionou chamar de o ï¿½homem modernoï¿½. Em seu clï¿½ssico estudo sobre a obra de James Joyce, Homem comum enfim, o crï¿½tico e escritor britï¿½nico Anthony Burgess afirma que, ï¿½se alguma vez houve um grande escritor popular, Joyce foi este escritorï¿½. Guiado por esse espï¿½rito eminentemente democrï¿½tico da escrita joyceana, Caetano Galindo realizou esta nova traduï¿½ï¿½o de Ulysses, a fim de captar ï¿½a imensa gama de cores, registros, estilos, recursos e efeitosï¿½ de sua prosa revolucionï¿½ria.',9,'public/img/imgLivro/ulysses_9788563560421.jpg'),('9788573264241',3,'2016','1','A Divina Comï¿½dia','Texto fundador da lï¿½ngua italiana, sï¿½mula da cosmovisï¿½o de toda uma ï¿½poca, monumento poï¿½tico de rigor e beleza, obra magna da literatura universal. ï¿½ fato que a \"Comï¿½dia\" merece esses e muitos outros adjetivos de louvor, incluindo o \"divina\" que Boccaccio lhe deu jï¿½ no sï¿½culo XIV. Mas tambï¿½m ï¿½ certo que, como bom clï¿½ssico, este livro reserva a cada novo leitor a prazerosa surpresa de renascer revigorado, como vem fazendo de geraï¿½ï¿½o em geraï¿½ï¿½o hï¿½ quase setecentos anos. A longa jornada dantesca atravï¿½s do Inferno, Purgatï¿½rio e Paraï¿½so ï¿½ aqui oferecida na ï¿½ntegra ï¿½ com seus mais de 14 mil decassï¿½labos divididos em cem cantos e trï¿½s partes ï¿½ na rigorosa traduï¿½ï¿½o de Italo Eugenio Mauro, vencedora do Prï¿½mio Jabuti e celebrada por sua fidelidade ï¿½ mï¿½trica e ï¿½ rima originais. A ediï¿½ï¿½o traz ainda, como prefï¿½cio, um inspirado ensaio de Otto Maria Carpeaux.',5,'public/img/imgLivro/aDivinaComedia_9788573264241.jpg'),('9788580573749',2,'2013','1','Cidades de Papel','Quentin Jacobsen tem uma paixï¿½o platï¿½nica pela magnï¿½fica vizinha e colega de escola Margo Roth Spiegelman. Atï¿½ que em um cinco de maio que poderia ter sido outro dia qualquer, ela invade sua vida pela janela de seu quarto, com a cara pintada e vestida de ninja, convocando-o a fazer parte de um engenhoso plano de vinganï¿½a. E ele, ï¿½ claro, aceita. ',10,'public/img/imgLivro/cidadeDePapel_9788580573749.jpg'),('9788581863351',2,'2019','1','A Metamorfose','Franz Kafka ï¿½ um dos autores mais lidos, analisados e discutidos da literatura mundial apï¿½s a Primeira Guerra, segundo o professor, ensaï¿½sta e tradutor Modesto Carone, nï¿½o sï¿½ por ser um autor original e inteligente, mas porque em sua obra encontramos a \"imagem mais poderosa e penetrante de nosso mundo vincado pela falsa consciï¿½ncia\". Conhecida por ter seu herï¿½i Gregor Samsa metamorfoseado em inseto, esta novela enfoca a existï¿½ncia humana em um mundo que leva os indivï¿½duos ï¿½ solidï¿½o. Com uma narrativa ï¿½gil, seduz o leitor por seu rigoroso apuro tï¿½cnico.',7,'public/img/imgLivro/metamorfose_9788581863351.jpg'),('9788582850404',4,'2016','1','Romeu E Julieta','Hï¿½ muito tempo duas famï¿½lias banham em sangue as ruas de Verona. Enquanto isso, na penumbra das madrugadas, ardem as brasas de um amor secreto. Romeu, filho dos Montï¿½quio, e Julieta, herdeira dos Capuleto, desafiam a rixa familiar e sonham com um impossï¿½vel futuro, longe da violï¿½ncia e da loucura. ï¿½Romeu e Julietaï¿½ ï¿½ a primeira das grandes tragï¿½dias de William Shakespeare, e esta nova traduï¿½ï¿½o de Josï¿½ Francisco Botelho recria com maestria o ritmo ao mesmo tempo frenï¿½tico e melancï¿½lico do texto shakespeariano. Contando tambï¿½m com um excelente ensaio introdutï¿½rio do especialista Adrian Poole, esta ediï¿½ï¿½o traz nova vida a uma das mais emocionantes histï¿½rias de amor jï¿½ contadas.',9,'public/img/imgLivro/romeuJulieta_9788582850404.jpg'),('9788584390670',2,'2017','1','O Alquimista','Paulo Coelho jï¿½ inspirou mais de 200 milhï¿½es de leitores por todo o mundo com este romance encantador. Esta histï¿½ria, brilhante em sua simplicidade e com uma sabedoria que nos estimula, ï¿½ sobre um jovem pastor da Andaluzia chamado Santiago que viaja de sua cidade natal na Espanha para o deserto do Egito em busca de um tesouro escondido perto das Pirï¿½mides. Ao longo do caminho, ele encontra uma cigana, um homem que se diz rei e um alquimista, que lhe indicam a direï¿½ï¿½o para a sua busca. Ninguï¿½m sabe que tesouro ï¿½ esse, ou se Santiago serï¿½ capaz de ultrapassar os obstï¿½culos de seu trajeto. Mas o que comeï¿½a como uma jornada para encontrar bens mundanos se transforma na descoberta do tesouro que se encontra dentro dele mesmo. Emocionante e profundamente humano, este clï¿½ssico contemporï¿½neo ï¿½ um testamento eterno do poder transformador dos nossos sonhos e da importï¿½ncia de ouvirmos nossos coraï¿½ï¿½es.',25,'public/img/imgLivro/oAlquimista_9788584390670.jpg'),('9788595084292',2,'2018','1','Prisioneiros da Mente - Os CÃ¡rceres Mentais','Um magnata poderoso. Um impÃ©rio tecnolÃ³gico. E uma famÃ­lia dilacerada. Theo Fester conseguiu vencer uma infÃ¢ncia de pobreza e bullying para se tornar um empreendedor mundialmente conhecido. Sua vida pessoal, entretanto, nÃ£o seguiu o mesmo caminho: ele e seus filhos vivem uma farsa, se digladiando por poder e atenÃ§Ã£o. Ao se dar conta de que sua famÃ­lia estÃ¡ aprisionada por cÃ¡rceres mentais, Theo precisarÃ¡ se reinventar mais uma vez e mudar radicalmente seus relacionamentos, antes que seja tarde demais.',23,'public/img/imgLivro/prisioneirosDaMente_9788595084292.jpg'),('9788599296363',2,'2008','1','A Cabana','A filha mais nova de Mackenzie Allen Philip foi raptada durante as fï¿½rias em famï¿½lia e hï¿½ evidï¿½ncias de que ela foi brutalmente assassinada e abandonada numa cabana. Quatro anos mais tarde, Mack recebe uma nota suspeita, aparentemente vinda de Deus, convidando-o para voltar ï¿½quele cabana para passar o fim de semana. Ignorando alertas de que poderia ser uma cilada, ele segue numa tarde de inverno e volta a cenï¿½rio de seu pior pesadelo. O que encontra lï¿½ muda sua vida para sempre. Num mundo em que religiï¿½o parece tornar-se irrelevante, \"A Cabana\" invoca a pergunta: \"Se Deus ï¿½ tï¿½o poderoso e tï¿½o cheio de amor, por que nï¿½o faz nada para amenizar a dor e o sofrimento do mundo?\" As respostas encontradas por Mack surpreenderï¿½o vocï¿½ e, provavelmente, o transformarï¿½o tanto quanto ele.',15,'public/img/imgLivro/aCabana_9788599296363.jpg');
/*!40000 ALTER TABLE `livro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `livro_autor`
--

DROP TABLE IF EXISTS `livro_autor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `livro_autor` (
  `id_autor` int(11) NOT NULL,
  `isbn_livro` varchar(100) NOT NULL,
  PRIMARY KEY (`id_autor`,`isbn_livro`),
  KEY `id_autor` (`id_autor`),
  KEY `fk_livro_autor_livro1_idx` (`isbn_livro`),
  CONSTRAINT `fk_livro_autor_livro1` FOREIGN KEY (`isbn_livro`) REFERENCES `livro` (`isbn_livro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `livro_autor_ibfk_2` FOREIGN KEY (`id_autor`) REFERENCES `autor` (`id_autor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `livro_autor`
--

LOCK TABLES `livro_autor` WRITE;
/*!40000 ALTER TABLE `livro_autor` DISABLE KEYS */;
INSERT INTO `livro_autor` VALUES (1,'9788516079444'),(2,'9788535929225'),(3,'9788535928204'),(4,'9788501110367'),(5,'9788563560421'),(6,'9780486421230'),(7,'9788573264241'),(8,'9788527311229'),(9,'9788581863351'),(10,'9788544001400'),(11,'9788582850404'),(12,'9788544001868'),(13,'9788580573749'),(20,'8532511015'),(21,'9788560280940'),(23,'9788584390670'),(24,'9788543104355'),(25,'8575421131'),(31,'9788516079444'),(31,'9788599296363');
/*!40000 ALTER TABLE `livro_autor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mensagem`
--

DROP TABLE IF EXISTS `mensagem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mensagem` (
  `id_usuario` int(11) NOT NULL,
  `id_usuario_sebo` int(11) NOT NULL,
  `data_hora_msg` datetime NOT NULL,
  `txt_msg` varchar(500) DEFAULT NULL,
  `cod_status_msg` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`,`id_usuario_sebo`,`data_hora_msg`),
  CONSTRAINT `mensagem_ibfk_1` FOREIGN KEY (`id_usuario`, `id_usuario_sebo`) REFERENCES `cliente_sebo` (`id_usuario`, `id_usuario_sebo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mensagem`
--

LOCK TABLES `mensagem` WRITE;
/*!40000 ALTER TABLE `mensagem` DISABLE KEYS */;
/*!40000 ALTER TABLE `mensagem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nacionalidade`
--

DROP TABLE IF EXISTS `nacionalidade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nacionalidade` (
  `id_nacionalidade` int(11) NOT NULL AUTO_INCREMENT,
  `nome_nacionalidade` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_nacionalidade`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nacionalidade`
--

LOCK TABLES `nacionalidade` WRITE;
/*!40000 ALTER TABLE `nacionalidade` DISABLE KEYS */;
INSERT INTO `nacionalidade` VALUES (1,'Espanhol'),(2,'Russo'),(3,'Suiço'),(4,'Colombiano'),(5,'Irlandês'),(6,'Francês'),(7,'Italiano'),(8,'Austriaco'),(9,'Checoslovaco'),(10,'Português'),(11,'Britânico'),(12,'Americano'),(13,'Brasileiro'),(14,'Afegão'),(15,'Africano'),(16,'Alemão'),(17,'Argentino'),(18,'Asiático'),(19,'Australiano'),(20,'Belga'),(21,'Canadense'),(22,'Chileno'),(23,'Chinês'),(24,'Coreano'),(25,'Croata'),(26,'Dinamarquês'),(27,'Egípcio'),(28,'Escocês'),(29,'Eslovaco'),(30,'Europeu'),(31,'Filipino'),(32,'Finlandês'),(33,'Grego'),(34,'Holandês'),(35,'Indiano'),(36,'Inglês'),(37,'Iraniano'),(38,'Iraquiano'),(39,'Japonês'),(40,'Mexicano'),(41,'Norueguês'),(42,'Paquistanês'),(43,'Polonês'),(44,'Sueco'),(45,'Sul-Africano'),(46,'Sul-Coreano'),(47,'Turco'),(48,'Árabe');
/*!40000 ALTER TABLE `nacionalidade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perfil`
--

DROP TABLE IF EXISTS `perfil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perfil` (
  `id_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `nome_perfil` varchar(100) DEFAULT NULL,
  `cod_status_perfil` varchar(10) DEFAULT '1',
  PRIMARY KEY (`id_perfil`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfil`
--

LOCK TABLES `perfil` WRITE;
/*!40000 ALTER TABLE `perfil` DISABLE KEYS */;
INSERT INTO `perfil` VALUES (1,'Admin_Master','1'),(2,'Admin_Nivel_1','1'),(3,'Admin_Nivel_2','1'),(4,'Cliente','1'),(5,'Sebo','1');
/*!40000 ALTER TABLE `perfil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `postagem`
--

DROP TABLE IF EXISTS `postagem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `postagem` (
  `id_post` int(11) NOT NULL AUTO_INCREMENT,
  `data_hora_post` datetime DEFAULT NULL,
  `link_post` varchar(100) DEFAULT NULL,
  `url_foto_post` varchar(100) DEFAULT 'public/imgPost/imgPadrao/padrao.jpg',
  `txt_postagem` text,
  `titulo_post` text,
  `cod_status_post` varchar(10) DEFAULT '1',
  `id_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_post`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `postagem`
--

LOCK TABLES `postagem` WRITE;
/*!40000 ALTER TABLE `postagem` DISABLE KEYS */;
INSERT INTO `postagem` VALUES (1,'2019-10-09 21:08:03',NULL,'public/img/imgPost/imgPadrao/padrao.jpg','PHP (um acrÃ´nimo recursivo para \"PHP: Hypertext Preprocessor\", originalmente Personal Home Page) Ã© uma linguagem interpretada livre, usada originalmente apenas para o desenvolvimento de aplicaÃ§Ãµes presentes e atuantes no lado do servidor, capazes de gerar conteÃºdo dinÃ¢mico na World Wide Web.[3] Figura entre as primeiras linguagens passÃ­veis de inserÃ§Ã£o em documentos HTML, dispensando em muitos casos o uso de arquivos externos para eventuais processamentos de dados. O cÃ³digo Ã© interpre','PHP','0',5),(2,'2019-10-09 21:08:23',NULL,'public/img/imgPost/imgPadrao/padrao.jpg','              JavaScript, frequentemente abreviado como JS, Ã© uma linguagem de programaÃ§Ã£o interpretada de alto nÃ­vel, caracterizada tambÃ©m, como dinÃ¢mica, fracamente tipificada, prototype-based e multi-paradigma.[2] Juntamente com HTML e CSS, o JavaScript Ã© uma das trÃªs principais tecnologias da World Wide Web. JavaScript permite pÃ¡ginas da Web interativas e, portanto, Ã© uma parte essencial dos aplicativos da web. A grande maioria dos sites usa, e todos os principais navegadores tÃªm um mecanismo JavaScript dedicado para executÃ¡-lo.  Ã‰ atualmente a principal linguagem para programaÃ§Ã£o client-side em navegadores web. Ã‰ tambÃ©m bastante utilizada do lado do servidor atravÃ©s de ambientes como o node.js.  Como uma linguagem multi-paradigma, o JavaScript suporta estilos de programaÃ§Ã£o orientados a eventos, funcionais e imperativos (incluindo orientado a objetos e prototype-based), apresentando recursos como fechamentos (closures) e funÃ§Ãµes de alta ordem comumente indisponÃ­veis em linguagens populares como Java e C++. PossuÃ­ APIs para trabalhar com texto, matrizes, datas, expressÃµes regulares e o DOM, mas a linguagem em si nÃ£o inclui nenhuma E/S, como instalaÃ§Ãµes de rede, armazenamento ou grÃ¡ficos, contando com isso no ambiente host em que estÃ¡ embutido.  Foi originalmente implementada como parte dos navegadores web para que scripts pudessem ser executados do lado do cliente e interagissem com o usuÃ¡rio sem a necessidade deste script passar pelo servidor, controlando o navegador, realizando comunicaÃ§Ã£o assÃ­ncrona e alterando o conteÃºdo do documento exibido, porÃ©m os mecanismos JavaScript agora estÃ£o incorporados em muitos outros tipos de software host, incluindo servidores em servidores e bancos de dados da Web e em programas que nÃ£o sÃ£o da Web, como processadores de texto e PDF, e em tempo de execuÃ§Ã£o ambientes que disponibilizam JavaScript para escrever aplicativos mÃ³veis e de desktop, incluindo widgets de Ã¡rea de trabalho.  Os termos Vanilla JavaScript e Vanilla JS se referem ao JavaScript nÃ£o estendido por qualquer estrutura ou biblioteca adicional. Scripts escritos em Vanilla JS sÃ£o cÃ³digos JavaScript simples.[3][4]  Embora existam semelhanÃ§as entre JavaScript e Java, incluindo o nome da linguagem, a sintaxe e as respectivas bibliotecas padrÃ£o, as duas linguagens sÃ£o distintas e diferem muito no design; JavaScript foi influenciado por linguagens de programaÃ§Ã£o como Self e Scheme.        ','Javascript','0',5),(3,'2019-10-13 00:52:42',NULL,'public/img/imgPost/imgPadrao/padrao.jpg','Eu programo\r\n','OlÃ¡ mundosss','0',15),(4,'2019-10-13 17:16:01',NULL,'public/img/imgPost/master.jpg','What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n\r\nWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.\r\n\r\nWhere can I get some?                                    ','Mestre dos Magos','1',5),(5,'2019-10-13 17:49:23',NULL,'public/img/imgPost/imgPadrao/padrao.jpg','OlÃ¡ mundo essa Ã© uma postagem de teste configurada simplemeste para teste.\r\nEsse texto Ã© um teste, obrigado por ler...                                                             ','PHP','1',5),(6,'2019-10-13 19:43:28',NULL,'public/img/imgPost/imgPadrao/padrao.jpg','           dsfs','segfs','1',5),(7,'2019-10-13 19:45:35',NULL,'public/img/imgPost/imgPadrao/padrao.jpg','fsdafsdfsdf','teste','1',5),(8,'2019-10-13 19:45:42',NULL,'public/img/imgPost/meetup-php-joinville.jpg','                Os programadores ficam em roda e um deles fala: \r\nâ€“ Elefante colorido! Os outros perguntam: â€“ De que cor ele Ã©? O desenvolvedor deverÃ¡ escolher uma cor e as outros deverÃ£o saber que linguagem tem essa sintaxe. Se nÃ£o achar esta o elefantinho irÃ¡ pegÃ¡-lo (ATERRORIZA-LO) com o TCC.                        ','Elefante colorido','1',5),(9,'2019-10-13 19:56:28',NULL,'public/img/imgPost/mario.jpg','                                fsdafsdfsdf                        ','teste','1',5),(10,'2019-10-13 19:56:34',NULL,'public/img/imgPost/gon.png','                                                       dasd                                        ','OlÃ¡ mundosss','1',5),(11,'2019-10-13 21:57:35',NULL,'public/img/imgPost/imgPadrao/padrao.jpg','                                dsadas                        ','usuario comum','1',5),(12,'2019-10-13 23:44:59',NULL,'public/img/imgPost/imgPadrao/padrao.jpg','                                safdsad                        ','teste','1',37),(13,'2019-10-13 23:54:41',NULL,'public/img/imgPost/bait.jpg','                                                                sdfsd                                                ','bait','1',37),(14,'2019-10-27 01:03:50',NULL,'','tewtf','PHP','1',15),(15,'2019-10-27 01:04:01',NULL,'','dsad','dasd','1',15),(16,'2019-10-29 01:02:08',NULL,'public/img/imgPost/imgPadrao/padrao.jpg','                dsad            ','eaeeeeeeeea','1',35),(17,'2019-10-29 01:02:57',NULL,'public/img/imgPost/imgPadrao/padrao.jpg','sadasas            ','PHPdsadsa','1',35),(18,'2019-10-31 12:02:01',NULL,'public/img/imgPost/Divulgac  a  o Face Panorama Especial Arte _Cultura.jpg','aaa','teste','1',15),(19,'2019-11-07 01:35:24',NULL,'public/img/imgPost/Russianroulette.jpg','aaa','teste','1',15),(20,'2019-11-12 21:26:15',NULL,'public/img/imgPost/imgPadrao/padrao.jpg','dasd','asdsa','1',5);
/*!40000 ALTER TABLE `postagem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sebo`
--

DROP TABLE IF EXISTS `sebo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sebo` (
  `id_usuario` int(11) NOT NULL,
  `razao_sebo` varchar(100) DEFAULT NULL,
  `nome_fantasia` varchar(100) DEFAULT NULL,
  `cnpj_sebo` varchar(30) DEFAULT NULL,
  `latitude_sebo` double(10,7) DEFAULT NULL,
  `longitude_sebo` double(10,7) DEFAULT NULL,
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
  `cod_status_sebo` varchar(10) DEFAULT '1',
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sebo`
--

LOCK TABLES `sebo` WRITE;
/*!40000 ALTER TABLE `sebo` DISABLE KEYS */;
INSERT INTO `sebo` VALUES (11,'Abigail de Queiroz Moreira Pereira','Abigail de Queiroz Moreira Pereira','20.035.914/0001-03',NULL,NULL,'Barueri','111','','','06410-080','1141986832','','','','','1'),(12,'Mirian Marinho da Silva Lima','Mirian Marinho da Silva Lima','12.672.074/0001-53',NULL,NULL,'Osasco','115','','','06320-290','1143867762','','','','','1'),(14,'Priscilla Nobre Lobo','Sebo e Livraria Corujinha','21.100.930/0001-97',NULL,NULL,NULL,'179',NULL,NULL,'06448-020','1128614286',NULL,NULL,NULL,NULL,'1'),(34,'Pirate king','dasdgdfg','dfgdgdfg',NULL,NULL,NULL,'dasdad','dsada','dsadsa','dasdsad','asdsad','dsadad','trhtrh','sadd','dsad','1'),(35,'Monkey D. Luffy','Rei dos piratas','03.561.475/4516-97',NULL,NULL,'Santana de Parnaíba','dsa','dasdsa','AV','','(11) 4005-8799','(11) 54879-9524','','','dsa','1');
/*!40000 ALTER TABLE `sebo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sebo_livro`
--

DROP TABLE IF EXISTS `sebo_livro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sebo_livro` (
  `id_usuario` int(11) NOT NULL,
  `isbn_livro` varchar(100) NOT NULL,
  `qtd_estoque` int(11) DEFAULT NULL,
  `estado_livro` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`,`isbn_livro`),
  KEY `fk_sebo_has_livro_livro1_idx` (`isbn_livro`),
  KEY `fk_sebo_has_livro_sebo1_idx` (`id_usuario`),
  CONSTRAINT `fk_sebo_has_livro_livro1` FOREIGN KEY (`isbn_livro`) REFERENCES `livro` (`isbn_livro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_sebo_has_livro_sebo1` FOREIGN KEY (`id_usuario`) REFERENCES `sebo` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sebo_livro`
--

LOCK TABLES `sebo_livro` WRITE;
/*!40000 ALTER TABLE `sebo_livro` DISABLE KEYS */;
INSERT INTO `sebo_livro` VALUES (11,'9788516079444',5,''),(11,'9788599296363',7,NULL),(12,'9788516079444',5,NULL),(14,'9788516079444',4,NULL),(14,'9788599296363',5,NULL),(35,'8532511015',9,'B'),(35,'9780486421230',5,'B'),(35,'9788501110367',8,'O'),(35,'9788516079444',8,'O'),(35,'9788527311229',8,'B'),(35,'9788535929225',23,'B'),(35,'9788544001868',7,'B'),(35,'9788563560421',5,'B'),(35,'9788581863351',7,'B'),(35,'9788584390670',4,'B');
/*!40000 ALTER TABLE `sebo_livro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome_usuario` varchar(50) DEFAULT NULL,
  `sobrenome_usuario` varchar(50) DEFAULT NULL,
  `email_usuario` varchar(100) DEFAULT NULL,
  `senha_usuario` varchar(255) DEFAULT NULL,
  `cod_status_usuario` varchar(10) DEFAULT '1',
  `id_perfil` int(11) DEFAULT NULL,
  `data_criacao` datetime NOT NULL,
  `url_foto` varchar(100) DEFAULT NULL,
  `usuariocol` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `id_perfil` (`id_perfil`),
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_perfil`) REFERENCES `perfil` (`id_perfil`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'Ruan','Costa de Oliveira','ruanc_oliveira@hotmail.com','$2y$08$4chmBEvSw1/8MvLRtmi4teQimTgZvFWHdbN/FCsYNjRYZBt8Rvbwy','1',1,'2019-09-18 00:00:00',NULL,NULL),(2,'Divanilda','Cristina da Cruz','rm35615@estudante.fieb.edu.br','$2y$08$4chmBEvSw1/8MvLRtmi4teQimTgZvFWHdbN/FCsYNjRYZBt8Rvbwy','1',1,'2019-09-18 00:00:00',NULL,NULL),(3,'Gabriel Max','Maia do Carmo','rm35880@estudante.fieb.edu.br','$2y$08$4chmBEvSw1/8MvLRtmi4teQimTgZvFWHdbN/FCsYNjRYZBt8Rvbwy','1',1,'2019-09-18 00:00:00',NULL,NULL),(5,'Marcos','Santos Carvalho','marcos_sco@outlook.com','$2a$08$MzkxNDQxMjQ4NWRjYjQzMOma834r.NiTe8mrkhJvaizO8pAEDX5g2','1',1,'2019-09-18 00:00:00','public/img/imgPerfil/travis.png',NULL),(6,'Joyce Victoria','Leite Oquendo','rm35881@estudante.fieb.edu.br','$2y$08$4chmBEvSw1/8MvLRtmi4teQimTgZvFWHdbN/FCsYNjRYZBt8Rvbwy','1',2,'2019-09-18 00:00:00',NULL,NULL),(7,'Daniele Maria','França','rm36113@estudante.fieb.edu.br','$2y$08$4chmBEvSw1/8MvLRtmi4teQimTgZvFWHdbN/FCsYNjRYZBt8Rvbwy','1',3,'2019-09-18 00:00:00',NULL,NULL),(8,'Jennifer','Keity Guimarães','rm36139@estudante.fieb.edu.br','$2y$08$4chmBEvSw1/8MvLRtmi4teQimTgZvFWHdbN/FCsYNjRYZBt8Rvbwy','1',3,'2019-09-18 00:00:00',NULL,NULL),(9,'Suelane','Garcia Fontes','suelane.fontes@docente.fieb.edu.br','$2y$08$4chmBEvSw1/8MvLRtmi4teQimTgZvFWHdbN/FCsYNjRYZBt8Rvbwy','1',4,'2019-09-18 00:00:00',NULL,NULL),(10,'Giovani','Barbosa Wingter','giovani.wingter@docente.fieb.edu.br','$2y$08$4chmBEvSw1/8MvLRtmi4teQimTgZvFWHdbN/FCsYNjRYZBt8Rvbwy','1',4,'2019-09-18 00:00:00',NULL,NULL),(11,'Abigail','Queiroz Moreira Pereira','sebodomarcao@uol.com.br','$2y$08$4chmBEvSw1/8MvLRtmi4teQimTgZvFWHdbN/FCsYNjRYZBt8Rvbwy','1',5,'2019-09-18 00:00:00','public/img/imgPerfilSebo/BadGirl.jpg',NULL),(12,'Mirian','Marinho da Silva Lima','sebosantafe@hotmail.com','$2y$08$4chmBEvSw1/8MvLRtmi4teQimTgZvFWHdbN/FCsYNjRYZBt8Rvbwy','1',5,'2019-09-18 00:00:00',NULL,NULL),(13,'Denis','Monteiro Guimaraes','denis.guimaraes@docente.fieb.edu.br','$2y$08$4chmBEvSw1/8MvLRtmi4teQimTgZvFWHdbN/FCsYNjRYZBt8Rvbwy','1',4,'2019-09-18 00:00:00',NULL,NULL),(14,'Priscilla','Nobre Lobo','globalnetconsultoria@globo.com','$2y$08$4chmBEvSw1/8MvLRtmi4teQimTgZvFWHdbN/FCsYNjRYZBt8Rvbwy','1',5,'2019-09-18 00:00:00',NULL,NULL),(15,'Master','of wizards','master@outlook.com','$2a$08$NDExNDEyMzUyNWRiZjM1Ze8Pq9ttlUyQKp8IaSnNvVIx6mNa.0sT2','1',1,'2019-10-09 21:02:53','public/img/imgPerfil/Np9TNuLP_400x400.jpg',NULL),(16,'Admin 1','adm','adm1@outlook.com','$2y$08$4chmBEvSw1/8MvLRtmi4teQimTgZvFWHdbN/FCsYNjRYZBt8Rvbwy','1',2,'2019-10-09 21:03:42',NULL,NULL),(17,'Admin 2','adm ','adm2@outlook.com','$2y$08$4chmBEvSw1/8MvLRtmi4teQimTgZvFWHdbN/FCsYNjRYZBt8Rvbwy','1',3,'2019-10-09 21:04:14',NULL,NULL),(18,'Usuario','Cliente','cliente@outlook.com','$2y$08$4chmBEvSw1/8MvLRtmi4teQimTgZvFWHdbN/FCsYNjRYZBt8Rvbwy','1',4,'2019-10-09 21:07:01',NULL,NULL),(19,'Sebo','usuario','sebo@outlook.com','$2y$08$4chmBEvSw1/8MvLRtmi4teQimTgZvFWHdbN/FCsYNjRYZBt8Rvbwy','1',5,'2019-10-09 21:07:27',NULL,NULL),(26,'Giorno','Giovana','stand@outlook.com','$2y$08$5nGdB4I7yBlWv2.8n9MrWOPCVorkFQ4iMrN.2J.VfVL1sagCMhlnu','1',4,'2019-10-11 00:44:10',NULL,NULL),(27,'Viewtiful ','Joe','sixMachine@outlook.com','$2a$08$NjMzNjExMjAyNWRhMjI4NOM8NjRbDElnWbDL0akjvLVnRCjQ.rr8K','1',5,'2019-10-12 16:24:05',NULL,NULL),(29,'teste','dsad','tes@outlook.com','$2a$08$NDQ1MDQxMDk0NWRhMjQyM.TKV/JqfDZ2kebp4i5v1lOIPQl3jwb8C','1',4,'2019-10-12 18:13:40',NULL,NULL),(34,'Giorno','adm','gansd@outlook.com','$2a$08$ODM1OTQwMzA2NWRhMjY2ZOwzpYYg.3K8eA9jZ1Fs8ZyQtICEg9/xG','1',5,'2019-10-12 20:51:08',NULL,NULL),(35,'Luffy','Mokey D.','luffy@outlook.com','$2a$08$MTUxODIzNzQxNjVkYTI4YuU9atiqVfNVpSJd/jOjOHVSKPep7VaCO','1',5,'2019-10-12 23:13:39','public/img/imgPerfilSebo/luffy.jpg',NULL),(36,'Giorno','adm','gansd@outlook.com','$2a$08$MzQ4OTMyMTA2NWRhMjkzM.ZGzBU38O/OEUz4PfisxN.wnt2YPt8Yi','1',5,'2019-10-12 23:59:18',NULL,NULL),(37,'Sonic','the headhog','sonic@outlook.com','$2a$08$MTU2NjEwNDA5MjVkYTNkYuUazvVaSHQMYS.oLcepyoVE2Xq9HO2..','1',4,'2019-10-13 23:23:40','public/img/imgPerfil/sonic.png',NULL),(40,'htfh','hgfh','luffyss@outlook.com','$2a$08$Njg4NTczMTE1NWRiM2QxNOq/YkSoWfJRG87mdstZYr/FqeD0.BJay','1',5,'2019-10-26 01:53:44',NULL,NULL),(41,'Giorno','Giovana','standos@outlook.com','$2a$08$ODI0NjI5MjM3NWRiNGYxO.xJmWDsqxGXJk1ueFvVYLhLvYKOY6NPK','1',4,'2019-10-26 22:23:23',NULL,NULL),(42,'Giorno','Giovana','standosd@outlook.com','$2a$08$MTc0OTQyNDY5NDVkYjRmMOYHwkM80haZE8DltQg3b4Yc5NecosoPC','1',4,'2019-10-26 22:24:36',NULL,NULL),(43,'teste','sdad','gan@outlook.com','$2a$08$OTQ0NjgxMjQyNWRiNTBhZOPhQMjBPC8hbwLrS4riZKpGZtZgWO1qi','1',4,'2019-10-27 00:11:36',NULL,NULL),(44,'Edward ','Elric','alquimista@outlook.com','$2a$08$MTc4NjcwMTcyODVkYjYwYuHxj4Jud4SZqYftf86JacQj0wbk268FO','1',4,'2019-10-27 18:31:40',NULL,NULL);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-11-12 20:56:02
