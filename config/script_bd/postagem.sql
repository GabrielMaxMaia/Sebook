-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 06-Out-2019 às 08:19
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
-- Database: `bd_sebo`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `postagem`
--

CREATE TABLE `postagem` (
  `id_post` int(11) NOT NULL,
  `titulo_post` varchar(100) DEFAULT NULL,
  `txt_post` text,
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
(9, 'fff', 'oiiii', '2019-10-06 03:02:58', NULL, NULL, '0', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `postagem`
--
ALTER TABLE `postagem`
  ADD PRIMARY KEY (`id_post`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `postagem`
--
ALTER TABLE `postagem`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `postagem`
--
ALTER TABLE `postagem`
  ADD CONSTRAINT `postagem_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
