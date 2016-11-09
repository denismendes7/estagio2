-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 07-Out-2016 às 21:00
-- Versão do servidor: 5.5.52-0ubuntu0.14.04.1
-- versão do PHP: 5.6.23-1+deprecated+dontuse+deb.sury.org~trusty+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `htools`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastro_facebook`
--

CREATE TABLE IF NOT EXISTS `cadastro_facebook` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `telefone` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastro_usuario`
--

CREATE TABLE IF NOT EXISTS `cadastro_usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cpf` varchar(45) DEFAULT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `sexo` enum('F','M') DEFAULT NULL,
  `dt_nascimento` date DEFAULT NULL,
  `telefone` varchar(45) DEFAULT NULL,
  `senha` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Extraindo dados da tabela `cadastro_usuario`
--

INSERT INTO `cadastro_usuario` (`id`, `cpf`, `nome`, `email`, `sexo`, `dt_nascimento`, `telefone`, `senha`) VALUES
(1, '404.575.843-78', 'Vinicius Levi Iago Araújo', 'vinicius_levi@alphacandies.com.br', 'F', NULL, '(85) 99106-7614', 'KAhpC7PuhE'),
(2, '141.767.133-56', 'Vitor Henrique Bryan Martins', 'vitor.henrique.martins@mourafiorito.com', 'F', NULL, '(85) 98834-6672', 'xQXh6JsSYT'),
(3, '826.800.813-07', 'Giovanna Laura Costa', 'giovanna_laura@outllok.com', 'F', NULL, '(85) 99807-8189', '7EixKjnUOp'),
(4, '643.110.573-77', 'Diogo Murilo de Paula', 'diogo_murilo@bfgadvogados.com', 'F', NULL, '(85) 98963-6030', 'wmHYCciNhG'),
(5, '014.406.203-85', 'Pietra Lorena Gomes', 'pietra.lorena.gomes@ig.com.br', 'F', NULL, '(85) 98191-9823', 'npto0JD10T'),
(6, '650.051.533-14', 'Catarina Juliana Lima', 'catarina_lima@igi.com.br', 'F', NULL, '(85) 99786-4497', 'PM92rD6QLd'),
(7, '906.285.493-18', 'Enrico Antonio Heitor Gomes', 'eagomes@isometro.com.br', 'F', NULL, '(85) 98446-8504', 'BoS9p5Mhfp'),
(8, '616.043.623-67', 'Levi Thales Ian Nascimento', 'levi_thales@performa.com.br', 'F', NULL, '(85) 99323-3672', 'ryXY9AbcTC'),
(9, '530.428.703-75', 'Julio Igor Danilo Cardoso', 'jicardoso@gdsambiental.com.br', 'F', NULL, '(85) 98461-2140', '0J9YeCyw3i'),
(10, '981.283.093-66', 'Luiz Azevedo Martins', 'LuizAzevedoMartins@s@gmail.com', 'F', NULL, '85989646102', 'sTTeew21'),
(11, '046.088.303-84', 'Jeferson Araujo de Sousa', 'jefersonaraujo95@gmail.com', 'F', NULL, '99999999999', '210192#1311'),
(12, '616.043.623-67', 'Jeferson Araujo de Sousa', 'jefersonaraujo95@gmail.com', 'F', NULL, '(85) 9886-60429', 'xQXh6JsSYT'),
(13, '616.043.623-67', 'Jackson Araujo de Sousa', 'jefersonaraujo95@gmail.com', 'F', NULL, '99999999999', 'ryXY9AbcTC'),
(17, '04608830384', 'Jeferson Araujo de Sousa', 'jefersonaraujo95@gmail.com', 'F', NULL, '85989646102', 'xQXh6JsSYT'),
(18, '04608830384', 'Jeferson Araujo de Sousa', 'jefersonaraujo95@gmail.com', 'F', NULL, '85989646102', 'xQXh6JsSYT'),
(20, '616.043.623-67', 'Jeferson Araujo de Sousa', 'jefersonaraujo95@gmail.com', 'F', NULL, '(85) 9886-60429', 'xQXh6JsSYT'),
(21, '616.043.623-67', 'Jeferson Araujo Jeferson Araujo', 'jefersonaraujo95@gmail.com', 'M', '1995-02-27', '(85) 9886-60429', 'xQXh6JsSYT'),
(22, '616.043.623-67', 'Jeferson Araujo de Sousa', 'jefersonaraujo95@gmail.com', 'M', '2016-10-02', '(85) 9886-60429', 'xQXh6JsSYT'),
(23, '04608830384', 'Jeferson Araujo de Sousa', '%', NULL, NULL, 'ee', 'zabbix'),
(24, '04608830384', 'Jeferson Araujo de Sousa', 'jefersonaraujo95@gmail.com', NULL, NULL, '85989646102', '12345'),
(25, '616.043.623-67', 'Francisco', 'admin@change.me', NULL, NULL, '99999999999', 'aasdsad'),
(26, '616.043.623-67', 'Francisco', 'admin@change.me', NULL, NULL, '(85) 9886-60429', 'SSSS'),
(27, '04608830384', 'Jeferson Araujo de Sousa', 'admin@change.me', NULL, NULL, '(85) 9886-60429', 'wewrewerwer'),
(28, '04608830384', 'Jeferson Araujo de Sousa', 'admin@change.me', NULL, NULL, '85989646102', 'passfsddf'),
(29, '046.088.303-84', 'Maria Geraldina', 'admin@change.me', NULL, NULL, '(85) 9886-60429', 'passasdasdsad'),
(30, '046.088.303-84', 'Francisco AraÃºjo de Sousa ', 'jefersonaraujo95@gmail.com', '', '1984-09-27', '8588915813', 'hdjdhdhdhxjxjf'),
(31, '141.767.133-56', 'Maria Geraldina', 'admin@change.me', '', '2016-07-08', '85989646102', 'passdfsdfdsf'),
(32, '04608830384', 'Jeferson Araujo de Sousa', 'jefersonaraujo95@gmail.com', '', '2016-10-27', '(85) 9886-60429', 'fsdfsdfsfd'),
(33, '616.043.623-67', 'Jeferson Araujo de Sousa', 'admin@change.me', '', '2016-10-27', '(85) 9886-60429', '2312312'),
(34, '480.586.4321-84', 'JOAO DA SILVA', 'joao@gmail.com', 'M', '1995-02-21', '8589646102', '123123123123'),
(35, '616.043.623-67', 'Jeferson Araujo de Sousa', 'jefersonaraujo95@gmail.com', 'M', '2016-10-05', '(85) 9886-60429', 'xQXh6JsSYT'),
(36, '046.088.303-84', 'Jeferson Araujo de Sousa', 'jefersonaraujo95@gmail.com', 'M', '2016-09-27', '85989646102', 'xQXh6JsSYT'),
(37, '04608830384', 'Denis', 'denis@gofo.com', 'F', '2016-09-06', '(85) 9886-60429', 'xQXh6JsSYT'),
(38, '046.088.303-84', 'Denis Pimental ', 'denis@innedsolutions.com.br', '', '2016-05-22', '(85) 9886-60429', 'uqueuriuwe'),
(39, '7234287423847', 'Rafael Foncesca', 'admin', '', '2016-10-03', '8989898998', 'pass'),
(40, '05787453512', 'Dennis', 'denis@gmail.com', '', '2016-10-14', '86868374', '123456');

-- --------------------------------------------------------

--
-- Estrutura da tabela `concentrador`
--

CREATE TABLE IF NOT EXISTS `concentrador` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `concentrador` varchar(45) DEFAULT NULL,
  `ip_nas` varchar(45) NOT NULL,
  `secret` varchar(45) DEFAULT NULL,
  `ssh_porta` int(11) DEFAULT NULL,
  `user` varchar(45) DEFAULT NULL,
  `descricao` mediumtext,
  `cod_perfil` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_perfil` (`cod_perfil`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `concentrador`
--

INSERT INTO `concentrador` (`id`, `concentrador`, `ip_nas`, `secret`, `ssh_porta`, `user`, `descricao`, `cod_perfil`) VALUES
(1, 'Evento Fa7', '189.90.18.168', 'secret', 2222, 'admin', 'Evento no Salão, Equipamento RB 750 Com dois paineis Unifi.', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE IF NOT EXISTS `empresa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_fantasia` varchar(60) DEFAULT NULL,
  `razao_social` varchar(60) DEFAULT NULL,
  `cnpj` varchar(25) DEFAULT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `site` varchar(45) DEFAULT NULL,
  `telefone` varchar(25) DEFAULT NULL,
  `telefone2` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`id`, `nome_fantasia`, `razao_social`, `cnpj`, `endereco`, `site`, `telefone`, `telefone2`) VALUES
(1, 'INeedSolutions', 'INeedSolutions Serviços LTDA', '84.847.336/0001-84', 'RUA VINTE E SETE DE JULHO', 'ineedsolutions.com.br', '85989646102', '85989646102');

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil_acesso`
--

CREATE TABLE IF NOT EXISTS `perfil_acesso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `perfil_acesso` varchar(45) DEFAULT NULL,
  `tempo_sessao` varchar(10) DEFAULT NULL,
  `velocidade_download` varchar(25) DEFAULT NULL,
  `velocidade_upload` varchar(25) DEFAULT NULL,
  `trafego_max` varchar(45) DEFAULT NULL,
  `descricao` mediumtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `perfil_acesso`
--

INSERT INTO `perfil_acesso` (`id`, `perfil_acesso`, `tempo_sessao`, `velocidade_download`, `velocidade_upload`, `trafego_max`, `descricao`) VALUES
(1, 'Evento Fa7', '3600', '2048', '2048', '2000', 'Evento Teste\n');

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil_facebook`
--

CREATE TABLE IF NOT EXISTS `perfil_facebook` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url_link` varchar(45) NOT NULL,
  `facebook_id` int(10) unsigned NOT NULL,
  `token_chave` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `perfil_facebook`
--

INSERT INTO `perfil_facebook` (`id`, `url_link`, `facebook_id`, `token_chave`) VALUES
(1, 'ineedsecurity.com.br', 4294967295, '0b787f463363dd730709944ac6ddb9f8');

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil_sms`
--

CREATE TABLE IF NOT EXISTS `perfil_sms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `perfil` varchar(45) DEFAULT NULL,
  `mensagem` varchar(45) DEFAULT NULL,
  `link_url` varchar(45) DEFAULT NULL,
  `cod_acesso` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_sms` (`cod_acesso`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `perfil_sms`
--

INSERT INTO `perfil_sms` (`id`, `perfil`, `mensagem`, `link_url`, `cod_acesso`) VALUES
(1, 'Sms', 'Ola usuario', 'afadf', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `relacao_acesso`
--

CREATE TABLE IF NOT EXISTS `relacao_acesso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(45) DEFAULT NULL,
  `hora` varchar(45) DEFAULT NULL,
  `mac` varchar(45) DEFAULT NULL,
  `ip_nas` varchar(45) DEFAULT NULL,
  `pf_acesso` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `r_id` int(10) NOT NULL AUTO_INCREMENT,
  `r_name` varchar(45) NOT NULL,
  `r_can_admin` tinyint(4) DEFAULT '0',
  `r_can_edit` tinyint(4) DEFAULT '0',
  `r_can_write` tinyint(4) DEFAULT '0',
  `r_can_read` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`r_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `role`
--

INSERT INTO `role` (`r_id`, `r_name`, `r_can_admin`, `r_can_edit`, `r_can_write`, `r_can_read`) VALUES
(1, 'Reader', 0, 0, 0, 1),
(2, 'Author', 0, 0, 1, 1),
(3, 'Editor', 0, 1, 1, 1),
(4, 'Admin', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `a_id` int(10) NOT NULL AUTO_INCREMENT,
  `a_role_id` int(10) DEFAULT NULL,
  `a_username` varchar(150) NOT NULL,
  `a_password` varchar(150) NOT NULL,
  `a_first_name` varchar(45) NOT NULL,
  `a_last_name` varchar(45) NOT NULL,
  PRIMARY KEY (`a_id`),
  KEY `u_role_idx` (`a_role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`a_id`, `a_role_id`, `a_username`, `a_password`, `a_first_name`, `a_last_name`) VALUES
(1, 1, 'demo', '!!!$2y$10$dD8mzFLNOawieVTRVuncAOO7UINnpm7wlnBao70FZXOf4Nd9iuTfa', 'Demo', 'User'),
(2, 4, 'admin', '!!!$2y$10$MOEhiKLYZqd6qH.IPSAFwuaQAHBSmqEnN5sKqxcPZ8fpFU.t5s7eO', 'Admin', 'User');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `concentrador`
--
ALTER TABLE `concentrador`
  ADD CONSTRAINT `fk_perfil` FOREIGN KEY (`cod_perfil`) REFERENCES `perfil_acesso` (`id`);

--
-- Limitadores para a tabela `perfil_sms`
--
ALTER TABLE `perfil_sms`
  ADD CONSTRAINT `fk_sms` FOREIGN KEY (`cod_acesso`) REFERENCES `perfil_acesso` (`id`);

--
-- Limitadores para a tabela `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `u_role` FOREIGN KEY (`a_role_id`) REFERENCES `role` (`r_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
