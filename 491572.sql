-- phpMyAdmin SQL Dump
-- version 3.5.8
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 11-Jan-2017 às 12:57
-- Versão do servidor: 5.5.32
-- versão do PHP: 5.4.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `491572`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacoes`
--

CREATE TABLE IF NOT EXISTS `avaliacoes` (
  `cod` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `respostas` text NOT NULL,
  `data` date NOT NULL,
  `avaliador` varchar(30) NOT NULL,
  UNIQUE KEY `cod` (`cod`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=43 ;

--
-- Extraindo dados da tabela `avaliacoes`
--

INSERT INTO `avaliacoes` (`cod`, `nome`, `respostas`, `data`, `avaliador`) VALUES
(22, 'Augusto', 'Como ficou sabendo/foi encaminhado para o setor de informática?,Idade,Grau de escolaridade,Já utilizou computador alguma vez?,Qual o nível de conhecimento?,Domínio do teclado? (BV - digita sem olhar para as teclas?),Programas que conhece,Atividades comuns,Possui computador em casa?,Noção de utilidade do computador (pra que serve),Perspectivas (O que imagina que irá aprender)?,O que gostaria de aprender?,Dúvidas ou medos a respeito da informática}{Indicaçaão,Lorem,asdmasdim,asdpmaspdm,asdpmasdomi,asdiopmaosidm,oaisdmaoismd,aosdimaosdm,aosdimaosidm,aoismdoaisdm,aosidmaoisdm,asoidmaoisdm,aosidmaoisdm', '2016-12-07', ''),
(24, 'Teste Marcio', 'Como ficou sabendo/foi encaminhado para o setor de informática?,Idade,Grau de escolaridade,Já utilizou computador alguma vez?,Qual o nível de conhecimento?,Domínio do teclado? (BV - digita sem olhar para as teclas?),Programas que conhece,Atividades comuns,Possui computador em casa?,Noção de utilidade do computador (pra que serve),Perspectivas (O que imagina que irá aprender)?,O que gostaria de aprender?,Dúvidas ou medos a respeito da informática}{Lorem impsum,Lorem impsum,Lorem impsum,Lorem impsum,Lorem impsum,Lorem impsum,Lorem impsum,Lorem impsum,Lorem impsum,Lorem impsum,Lorem impsum,Lorem impsum,Lorem impsum', '2016-12-07', 'Márcio Lopes Fão'),
(25, 'Teste inicial', 'Como ficou sabendo/foi encaminhado para o setor de informática?,Idade,Grau de escolaridade,Já utilizou computador alguma vez?,Qual o nível de conhecimento?,Domínio do teclado? (BV - digita sem olhar para as teclas?),Programas que conhece,Atividades comuns,Possui computador em casa?,Noção de utilidade do computador (pra que serve),Perspectivas (O que imagina que irá aprender)?,O que gostaria de aprender?,Dúvidas ou medos a respeito da informática}{,,,,,,,,,,,,', '2016-12-07', 'Gilséia Sias Schulz'),
(26, 'Dilmar', 'Como ficou sabendo/foi encaminhado para o setor de informática?,Idade,Grau de escolaridade,Já utilizou computador alguma vez?,Qual o nível de conhecimento?,Domínio do teclado? (BV - digita sem olhar para as teclas?),Programas que conhece,Atividades comuns,Possui computador em casa?,Noção de utilidade do computador (pra que serve),Perspectivas (O que imagina que irá aprender)?,O que gostaria de aprender?,Dúvidas ou medos a respeito da informática}{,200,,,, ,,,,,,,', '2016-12-07', 'Rhaniel Farias'),
(42, 'Nathali Vieira da Costa', 'Como ficou sabendo/foi encaminhado para o setor de informática?,Idade,Grau de escolaridade,Já utilizou computador alguma vez?,Qual o nível de conhecimento?,Domínio do teclado? (BV - digita sem olhar para as teclas?),Programas que conhece,Atividades comuns,Possui computador em casa?,Noção de utilidade do computador (pra que serve),Perspectivas (O que imagina que irá aprender)?,O que gostaria de aprender?,Dúvidas ou medos a respeito da informática}{Dr. Alexandre, termino de tratamento, interesse.,13 anos,terceiro ano fundamental,não,nenhum,,,,não, somente smartphone,apertar teclas, falar,muitas coisas, não tem idéia.,desenvolvimento fala, coordenação,', '2017-01-03', 'Márcio Lopes Fão'),
(41, 'Valentina De Borba De Souza', 'Como ficou sabendo/foi encaminhado para o setor de informática?,Idade,Grau de escolaridade,Já utilizou computador alguma vez?,Qual o nível de conhecimento?,Domínio do teclado? (BV - digita sem olhar para as teclas?),Programas que conhece,Atividades comuns,Possui computador em casa?,Noção de utilidade do computador (pra que serve),Perspectivas (O que imagina que irá aprender)?,O que gostaria de aprender?,Dúvidas ou medos a respeito da informática}{Via Psicóloga,8 Anos,Terceira Série,Usa em casa,iniciante,digita olhando,Chrome, jogos na internet e youtube,musicas e desenho no youtube,sim, tinha tablet mas estragou,tirar foto, ouvir musica, desenho, jogar, google, pesquisar, comunicar,não sabe,tirar foto, restaurar o facebook,', '2017-01-03', 'Márcio Lopes Fão'),
(40, 'Adilmar Dos Santos Bittencourt', 'Como ficou sabendo/foi encaminhado para o setor de informática?,Idade,Grau de escolaridade,Já utilizou computador alguma vez?,Qual o nível de conhecimento?,Domínio do teclado? (BV - digita sem olhar para as teclas?),Programas que conhece,Atividades comuns,Possui computador em casa?,Noção de utilidade do computador (pra que serve),Perspectivas (O que imagina que irá aprender)?,O que gostaria de aprender?,Dúvidas ou medos a respeito da informática}{Recomendação do setor de AVD,60,Superior incompleto - filosofia\r\nTecnico em telecomunicações,nunca,nenhum,nao,não,não,sim,pra quase tudo, pagar contas, comunicação.,não sabe,pequisar numeros de telefone, compras, pagamentos de contas, redes sociais.,nenhum', '2016-12-21', 'Márcio Lopes Fão'),
(39, 'czczxc', 'Como ficou sabendo/foi encaminhado para o setor de informática?,Idade,Grau de escolaridade,Já utilizou computador alguma vez?,Qual o nível de conhecimento?,Domínio do teclado? (BV - digita sem olhar para as teclas?),Programas que conhece,Atividades comuns,Possui computador em casa?,Noção de utilidade do computador (pra que serve),Perspectivas (O que imagina que irá aprender)?,O que gostaria de aprender?,Dúvidas ou medos a respeito da informática}{,,,,,,,,,,,,', '2016-12-15', 'Márcio Lopes Fão'),
(38, 'Teste', 'Como ficou sabendo/foi encaminhado para o setor de informática?,Idade,Grau de escolaridade,Já utilizou computador alguma vez?,Qual o nível de conhecimento?,Domínio do teclado? (BV - digita sem olhar para as teclas?),Programas que conhece,Atividades comuns,Possui computador em casa?,Noção de utilidade do computador (pra que serve),Perspectivas (O que imagina que irá aprender)?,O que gostaria de aprender?,Dúvidas ou medos a respeito da informática}{,,,,,,,,,,,,', '2016-12-15', 'Márcio Lopes Fão'),
(36, 'asdasd', 'Como ficou sabendo/foi encaminhado para o setor de informática?,Idade,Grau de escolaridade,Já utilizou computador alguma vez?,Qual o nível de conhecimento?,Domínio do teclado? (BV - digita sem olhar para as teclas?),Programas que conhece,Atividades comuns,Possui computador em casa?,Noção de utilidade do computador (pra que serve),Perspectivas (O que imagina que irá aprender)?,O que gostaria de aprender?,Dúvidas ou medos a respeito da informática}{,,,,,,,,,,,,', '2016-12-07', 'Márcio Lopes Fão'),
(37, 'sad', 'Como ficou sabendo/foi encaminhado para o setor de informática?,Idade,Grau de escolaridade,Já utilizou computador alguma vez?,Qual o nível de conhecimento?,Domínio do teclado? (BV - digita sem olhar para as teclas?),Programas que conhece,Atividades comuns,Possui computador em casa?,Noção de utilidade do computador (pra que serve),Perspectivas (O que imagina que irá aprender)?,O que gostaria de aprender?,Dúvidas ou medos a respeito da informática}{,,,,,,,,,,,,', '2016-12-07', 'Márcio Lopes Fão');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contatos`
--

CREATE TABLE IF NOT EXISTS `contatos` (
  `cod_contato` bigint(20) NOT NULL AUTO_INCREMENT,
  `nome_contato` varchar(30) NOT NULL,
  `sobrenome` varchar(60) NOT NULL,
  `endereco` varchar(60) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `bairro` varchar(30) NOT NULL,
  `cidade` varchar(30) NOT NULL,
  `cod_org_contato` bigint(20) NOT NULL,
  `data_criacao` datetime NOT NULL,
  `data_modificacao` datetime NOT NULL,
  PRIMARY KEY (`cod_contato`),
  UNIQUE KEY `cod` (`cod_contato`),
  KEY `cod_organizacao` (`cod_org_contato`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Extraindo dados da tabela `contatos`
--

INSERT INTO `contatos` (`cod_contato`, `nome_contato`, `sobrenome`, `endereco`, `cep`, `bairro`, `cidade`, `cod_org_contato`, `data_criacao`, `data_modificacao`) VALUES
(16, 'Jonatas', 'Amet', 'Rua das flores', '96015-000', 'centro', 'CanguÃ§u', 3, '2016-12-04 07:07:36', '2016-12-04 07:36:35'),
(17, 'JoÃ£o ClÃ¡udio', 'Andaime', 'Rua das flores', '96015-000', 'sdfsdfsdf', 'CanguÃ§u', 3, '2016-12-04 07:17:47', '2016-12-04 07:18:00'),
(18, 'Fernando', 'Dolor', 'Av. Palmeiras', '96015-000', 'ASDASD', 'Ijui', 3, '2016-12-04 07:38:26', '2016-12-18 06:17:17'),
(19, 'JoÃ£o ClÃ¡udio', 'Andaime', 'Rua das flores', '96015-000', 'asdasd', 'CanguÃ§u', 1, '2016-12-18 06:17:53', '2016-12-18 06:17:53');

-- --------------------------------------------------------

--
-- Estrutura da tabela `emails`
--

CREATE TABLE IF NOT EXISTS `emails` (
  `cod_email` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cod_contato` bigint(20) NOT NULL,
  `email` varchar(60) NOT NULL,
  PRIMARY KEY (`cod_email`),
  KEY `cod_contato` (`cod_contato`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Extraindo dados da tabela `emails`
--

INSERT INTO `emails` (`cod_email`, `cod_contato`, `email`) VALUES
(13, 17, 'asdasd@asdasd'),
(14, 17, 'asdasd@asdasd'),
(20, 16, 'sdfsfsdfdsf@fsddfsdf'),
(23, 18, 'asdadsa@asdsad'),
(24, 19, '324567@asfdh');

-- --------------------------------------------------------

--
-- Estrutura da tabela `organizacoes`
--

CREATE TABLE IF NOT EXISTS `organizacoes` (
  `cod_organizacao` bigint(20) NOT NULL AUTO_INCREMENT,
  `nome_organizacao` varchar(60) NOT NULL,
  `telefone` varchar(14) NOT NULL,
  PRIMARY KEY (`cod_organizacao`),
  UNIQUE KEY `cod` (`cod_organizacao`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `organizacoes`
--

INSERT INTO `organizacoes` (`cod_organizacao`, `nome_organizacao`, `telefone`) VALUES
(1, 'Tabajara', '(53)32276972'),
(3, 'Capivara', '5332276971'),
(4, 'Coca Cola', '123123123123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `perguntas`
--

CREATE TABLE IF NOT EXISTS `perguntas` (
  `cod` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `pergunta` text NOT NULL,
  `ordem` int(11) NOT NULL,
  UNIQUE KEY `cod` (`cod`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Extraindo dados da tabela `perguntas`
--

INSERT INTO `perguntas` (`cod`, `pergunta`, `ordem`) VALUES
(8, 'Como ficou sabendo/foi encaminhado para o setor de informática?', 1),
(9, 'Idade', 2),
(10, 'Grau de escolaridade', 4),
(11, 'Já utilizou computador alguma vez?', 5),
(12, 'Qual o nível de conhecimento?', 5),
(13, 'Domínio do teclado? (BV - digita sem olhar para as teclas?)', 6),
(14, 'Programas que conhece', 7),
(15, 'Atividades comuns', 8),
(16, 'Possui computador em casa?', 8),
(17, 'Noção de utilidade do computador (pra que serve)', 9),
(18, 'Perspectivas (O que imagina que irá aprender)?', 10),
(19, 'O que gostaria de aprender?', 11),
(20, 'Dúvidas ou medos a respeito da informática', 12);

-- --------------------------------------------------------

--
-- Estrutura da tabela `telefones`
--

CREATE TABLE IF NOT EXISTS `telefones` (
  `cod_telefone` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cod_contato` bigint(20) NOT NULL,
  `numero` varchar(14) DEFAULT NULL,
  `etiqueta` varchar(14) DEFAULT NULL,
  PRIMARY KEY (`cod_telefone`),
  UNIQUE KEY `cod` (`cod_telefone`),
  KEY `cod_contato` (`cod_contato`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=77 ;

--
-- Extraindo dados da tabela `telefones`
--

INSERT INTO `telefones` (`cod_telefone`, `cod_contato`, `numero`, `etiqueta`) VALUES
(43, 17, '34243234', 'Residencial'),
(44, 17, '234234', 'Celular'),
(68, 16, '24234234', 'Trabalho'),
(69, 16, '234234234', 'Residencial'),
(70, 16, '12312321', 'Residencial'),
(71, 16, '13123123', 'Celular'),
(72, 16, '1224234', 'Residencial'),
(75, 18, '234234', 'Residencial'),
(76, 19, '23567', 'Residencial');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `cod` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `senha` varchar(30) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `email_destino` varchar(30) NOT NULL,
  `envia_copia` tinyint(1) NOT NULL,
  PRIMARY KEY (`cod`),
  UNIQUE KEY `cod` (`cod`),
  UNIQUE KEY `usuario` (`usuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`cod`, `nome`, `email`, `senha`, `usuario`, `email_destino`, `envia_copia`) VALUES
(5, 'Márcio Lopes Fão', 'marcio.lopes.fao@gmail.com', 'admin', 'admin', 'marcio.lopes.fao@gmail.com', 0),
(6, '', '', 'lucas', 'lucas', '', 0),
(7, 'Rhaniel Farias', 'rhanielfarias@gmail.com', 'rhaniel', 'rhaniel', 'thaislbraille@hotmail.com', 0),
(8, 'Gilséia Sias Schulz', 'gilseia.braille@outlook.com', 'gilseia', 'gilseia', 'thaislbraille@hotmail.com', 1),
(9, '', '', 'thais', 'thais', '', 0);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `contatos`
--
ALTER TABLE `contatos`
  ADD CONSTRAINT `fk_contato_3` FOREIGN KEY (`cod_org_contato`) REFERENCES `organizacoes` (`cod_organizacao`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `emails`
--
ALTER TABLE `emails`
  ADD CONSTRAINT `fk_contato_2` FOREIGN KEY (`cod_contato`) REFERENCES `contatos` (`cod_contato`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `telefones`
--
ALTER TABLE `telefones`
  ADD CONSTRAINT `fk_contato` FOREIGN KEY (`cod_contato`) REFERENCES `contatos` (`cod_contato`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
