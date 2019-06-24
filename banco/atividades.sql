-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 23-Jun-2019 às 23:38
-- Versão do servidor: 5.7.24
-- versão do PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `atividades`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

DROP TABLE IF EXISTS `aluno`;
CREATE TABLE IF NOT EXISTS `aluno` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `login` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `turma_id` int(11) NOT NULL,
  `ativo` int(11) NOT NULL,
  `foto` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk1_idx` (`turma_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`id`, `nome`, `login`, `senha`, `turma_id`, `ativo`, `foto`) VALUES
(2, 'diogo vanderlan', 'ze', '83c40978009dd8a1a89d73028be27a5b', 2, 1, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `atividade`
--

DROP TABLE IF EXISTS `atividade`;
CREATE TABLE IF NOT EXISTS `atividade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imagem` varchar(45) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `nota` varchar(45) DEFAULT NULL,
  `correcao` varchar(200) DEFAULT NULL,
  `aluno_id` int(11) NOT NULL,
  `materia_id` int(11) NOT NULL,
  `professor_id` int(11) NOT NULL,
  `ativo` varchar(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk9_idx` (`aluno_id`),
  KEY `fk10_idx` (`materia_id`),
  KEY `fk11_idx` (`professor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `atividade`
--

INSERT INTO `atividade` (`id`, `imagem`, `descricao`, `nota`, `correcao`, `aluno_id`, `materia_id`, `professor_id`, `ativo`) VALUES
(1, '1560824442', 'sasesrfgghuij', '6', 'ta mais ou meno', 2, 4, 1, 's'),
(2, '1560825135', 'teste 500', NULL, NULL, 2, 4, 1, 's');

-- --------------------------------------------------------

--
-- Estrutura da tabela `atividadesafazer`
--

DROP TABLE IF EXISTS `atividadesafazer`;
CREATE TABLE IF NOT EXISTS `atividadesafazer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(45) NOT NULL,
  `dataEntrega` date NOT NULL,
  `professor_id` int(11) NOT NULL,
  `materia_id` int(11) NOT NULL,
  `turma_id` int(11) NOT NULL,
  `ativo` varchar(1) NOT NULL,
  `feita` enum('s','n') NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk11_idx` (`professor_id`),
  KEY `fk12_idx` (`materia_id`),
  KEY `fk13_idx` (`turma_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `atividadesafazer`
--

INSERT INTO `atividadesafazer` (`id`, `descricao`, `dataEntrega`, `professor_id`, `materia_id`, `turma_id`, `ativo`, `feita`) VALUES
(1, 'teste', '2019-06-15', 1, 5, 5, 's', 'n'),
(2, 'Teste n°99999', '2019-06-17', 1, 4, 2, 's', 'n'),
(9, 'dsdsadadasdas', '2019-06-18', 1, 4, 3, 's', 'n'),
(11, 'wfrerere', '2019-06-18', 1, 2, 4, 's', 'n');

-- --------------------------------------------------------

--
-- Estrutura da tabela `experiencias`
--

DROP TABLE IF EXISTS `experiencias`;
CREATE TABLE IF NOT EXISTS `experiencias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(45) NOT NULL,
  `professor_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk10_idx` (`professor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `materia`
--

DROP TABLE IF EXISTS `materia`;
CREATE TABLE IF NOT EXISTS `materia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `ativo` varchar(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `materia`
--

INSERT INTO `materia` (`id`, `nome`, `ativo`) VALUES
(1, 'matematica', 's'),
(2, 'quimica', 's'),
(3, 'português', 's'),
(4, 'história ', 's'),
(5, 'geografia ', 's');

-- --------------------------------------------------------

--
-- Estrutura da tabela `materia_prof`
--

DROP TABLE IF EXISTS `materia_prof`;
CREATE TABLE IF NOT EXISTS `materia_prof` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `professor_id` int(11) NOT NULL,
  `materia_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk3_idx` (`professor_id`),
  KEY `fk4_idx` (`materia_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

DROP TABLE IF EXISTS `professor`;
CREATE TABLE IF NOT EXISTS `professor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomep` varchar(45) NOT NULL,
  `login` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `foto` varchar(45) DEFAULT NULL,
  `ativo` int(11) NOT NULL,
  `contato` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `professor`
--

INSERT INTO `professor` (`id`, `nomep`, `login`, `senha`, `foto`, `ativo`, `contato`) VALUES
(1, 'epaminondas', 'adm', '202cb962ac59075b964b07152d234b70', 'aa', 1, 'epaminondas@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

DROP TABLE IF EXISTS `turma`;
CREATE TABLE IF NOT EXISTS `turma` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `ativo` varchar(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `turma`
--

INSERT INTO `turma` (`id`, `nome`, `ativo`) VALUES
(2, 'turma 3', 's'),
(3, 'turma 1', 's'),
(4, 'turma 2', 's'),
(5, 'turma 4', 's'),
(6, 'turma 5', 's');

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma_prof`
--

DROP TABLE IF EXISTS `turma_prof`;
CREATE TABLE IF NOT EXISTS `turma_prof` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `professor_id` int(11) NOT NULL,
  `turma_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk 400_idx` (`professor_id`),
  KEY `fk 500_idx` (`turma_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `aluno`
--
ALTER TABLE `aluno`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`turma_id`) REFERENCES `turma` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `atividade`
--
ALTER TABLE `atividade`
  ADD CONSTRAINT `fk100` FOREIGN KEY (`aluno_id`) REFERENCES `aluno` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk200` FOREIGN KEY (`materia_id`) REFERENCES `materia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk300` FOREIGN KEY (`professor_id`) REFERENCES `professor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `atividadesafazer`
--
ALTER TABLE `atividadesafazer`
  ADD CONSTRAINT `fk11` FOREIGN KEY (`professor_id`) REFERENCES `professor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk12` FOREIGN KEY (`materia_id`) REFERENCES `materia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk13` FOREIGN KEY (`turma_id`) REFERENCES `turma` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `experiencias`
--
ALTER TABLE `experiencias`
  ADD CONSTRAINT `fk10` FOREIGN KEY (`professor_id`) REFERENCES `professor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `materia_prof`
--
ALTER TABLE `materia_prof`
  ADD CONSTRAINT `fk3` FOREIGN KEY (`professor_id`) REFERENCES `professor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk4` FOREIGN KEY (`materia_id`) REFERENCES `materia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `turma_prof`
--
ALTER TABLE `turma_prof`
  ADD CONSTRAINT `fk 400` FOREIGN KEY (`professor_id`) REFERENCES `professor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk 500` FOREIGN KEY (`turma_id`) REFERENCES `turma` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
