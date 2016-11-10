-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 10-Nov-2016 às 10:37
-- Versão do servidor: 5.5.47-0ubuntu0.14.04.1
-- versão do PHP: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `loja`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `ip_address` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=944 ;

--
-- Extraindo dados da tabela `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `data`, `ip_address`, `timestamp`) VALUES
(943, '0000-00-00', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(145) NOT NULL,
  `sobrenome` varchar(245) NOT NULL,
  `rg` varchar(45) NOT NULL,
  `cpf` varchar(45) NOT NULL,
  `data_nascimento` datetime NOT NULL,
  `sexo` char(1) NOT NULL,
  `rua` varchar(145) NOT NULL,
  `numero` varchar(15) NOT NULL,
  `bairro` varchar(145) NOT NULL,
  `cidade` varchar(145) NOT NULL,
  `estado` varchar(45) NOT NULL,
  `cep` varchar(15) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `celular` varchar(15) NOT NULL,
  `email` varchar(145) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `cadastrado_em` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `CPF_Unico` (`cpf`),
  UNIQUE KEY `Email_Unico` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE IF NOT EXISTS `produtos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `codigo` varchar(45) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `largura_caixa_mm` int(10) unsigned NOT NULL,
  `altura_caixa_mm` int(10) unsigned NOT NULL,
  `comprimento_caixa_mm` int(10) unsigned NOT NULL,
  `peso_gramas` int(10) unsigned NOT NULL,
  `data_adicionado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `codigo_unico` (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos_categoria`
--

CREATE TABLE IF NOT EXISTS `produtos_categoria` (
  `produto` int(10) unsigned NOT NULL,
  `categoria` int(10) unsigned NOT NULL,
  UNIQUE KEY `unique_produto_categoria` (`produto`,`categoria`),
  KEY `FK_produtos_categorias_categoria` (`categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_transporte_preco`
--

CREATE TABLE IF NOT EXISTS `tb_transporte_preco` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `peso_de` decimal(6,2) NOT NULL,
  `peso_ate` decimal(6,2) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `adicional_kg` decimal(10,2) NOT NULL,
  `uf` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `tb_transporte_preco`
--

INSERT INTO `tb_transporte_preco` (`id`, `peso_de`, `peso_ate`, `preco`, `adicional_kg`, `uf`) VALUES
(1, 0.00, 10.00, 23.21, 0.71, 'SC'),
(2, 0.00, 10.00, 44.90, 0.71, 'SP'),
(3, 0.00, 10.00, 2.00, 0.71, 'SC'),
(4, 0.00, 10.00, 44.90, 0.71, 'SP'),
(5, 0.00, 10.00, 27.21, 0.71, 'MG'),
(6, 0.00, 10.00, 32.30, 0.71, 'AC');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `produtos_categoria`
--
ALTER TABLE `produtos_categoria`
  ADD CONSTRAINT `FK_produtos_categorias_produto` FOREIGN KEY (`produto`) REFERENCES `produtos` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_produtos_categorias_categoria` FOREIGN KEY (`categoria`) REFERENCES `categorias` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
