-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 01-Jul-2016 às 11:34
-- Versão do servidor: 5.5.47-0ubuntu0.14.04.1
-- versão do PHP: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `BD`
--
CREATE DATABASE IF NOT EXISTS `BD` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `BD`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `idCliente` int(11) NOT NULL AUTO_INCREMENT,
  `nomeCliente` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `dataCadastro` datetime NOT NULL,
  PRIMARY KEY (`idCliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`idCliente`, `nomeCliente`, `email`, `dataCadastro`) VALUES
(2, 'sadad', 'asdDD', '0000-00-00 00:00:00'),
(3, 'sabrina', 'sabrina@outlook.com', '0000-00-00 00:00:00'),
(4, 'caio', 'sxdfsdf', '0000-00-00 00:00:00'),
(7, 'bo', 'bo', '2015-06-22 00:00:00'),
(8, 'dddddd', 'kh', '2016-06-14 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedores`
--

DROP TABLE IF EXISTS `fornecedores`;
CREATE TABLE IF NOT EXISTS `fornecedores` (
  `idFornecedor` int(11) NOT NULL AUTO_INCREMENT,
  `nomeFornecedor` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `dataFundacao` datetime NOT NULL,
  PRIMARY KEY (`idFornecedor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `fornecedores`
--

INSERT INTO `fornecedores` (`idFornecedor`, `nomeFornecedor`, `email`, `dataFundacao`) VALUES
(2, 'preto bunito', 'barbosa@pedro.bunit', '2016-06-24 00:00:00'),
(3, 'hello darkness', 'my@ld.friend', '2016-06-05 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
