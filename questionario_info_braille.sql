-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 07-Dez-2016 às 13:11
-- Versão do servidor: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `questionario_info_braille`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacoes`
--

CREATE TABLE `avaliacoes` (
  `cod` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(30) NOT NULL,
  `respostas` text NOT NULL,
  `data` date NOT NULL,
  `avaliador` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `avaliacoes`
--

INSERT INTO `avaliacoes` (`cod`, `nome`, `respostas`, `data`, `avaliador`) VALUES
(6, 'sdfsdf', 'Como ficou sabendo/foi encaminhado para o setor de informática?,Idade,Grau de escolaridade,Já utilizou computador alguma vez?,Qual o nível de conhecimento?,Domínio do teclado? (BV - digita sem olhar para as teclas?),Programas que conhece,Atividades comuns,Possui computador em casa?,Noção de utilidade do computador (pra que serve),Perspectivas (O que imagina que irá aprender)?,O que gostaria de aprender?,Dúvidas ou medos a respeito da informática}{sdfsdf,,,,,,,,,,,,', '2016-11-28', ''),
(7, 'ZXZXZX', 'Como ficou sabendo/foi encaminhado para o setor de informática?,Idade,Grau de escolaridade,Já utilizou computador alguma vez?,Qual o nível de conhecimento?,Domínio do teclado? (BV - digita sem olhar para as teclas?),Programas que conhece,Atividades comuns,Possui computador em casa?,Noção de utilidade do computador (pra que serve),Perspectivas (O que imagina que irá aprender)?,O que gostaria de aprender?,Dúvidas ou medos a respeito da informática}{ZXZXZX,ZXZXZX,,,,,,,,,,,', '2016-11-28', ''),
(8, 'asdasdasd', 'Como ficou sabendo/foi encaminhado para o setor de informática?,Idade,Grau de escolaridade,Já utilizou computador alguma vez?,Qual o nível de conhecimento?,Domínio do teclado? (BV - digita sem olhar para as teclas?),Programas que conhece,Atividades comuns,Possui computador em casa?,Noção de utilidade do computador (pra que serve),Perspectivas (O que imagina que irá aprender)?,O que gostaria de aprender?,Dúvidas ou medos a respeito da informática}{asdasdads,,,,,,,,,,,,', '2016-11-28', ''),
(9, 'asdasdasd', 'Como ficou sabendo/foi encaminhado para o setor de informática?,Idade,Grau de escolaridade,Já utilizou computador alguma vez?,Qual o nível de conhecimento?,Domínio do teclado? (BV - digita sem olhar para as teclas?),Programas que conhece,Atividades comuns,Possui computador em casa?,Noção de utilidade do computador (pra que serve),Perspectivas (O que imagina que irá aprender)?,O que gostaria de aprender?,Dúvidas ou medos a respeito da informática}{asdasdads,,,,,,,,,,,,', '2016-11-28', ''),
(10, 'asdasdasd', 'Como ficou sabendo/foi encaminhado para o setor de informática?,Idade,Grau de escolaridade,Já utilizou computador alguma vez?,Qual o nível de conhecimento?,Domínio do teclado? (BV - digita sem olhar para as teclas?),Programas que conhece,Atividades comuns,Possui computador em casa?,Noção de utilidade do computador (pra que serve),Perspectivas (O que imagina que irá aprender)?,O que gostaria de aprender?,Dúvidas ou medos a respeito da informática}{asdasdads,,,,,,,,,,,,', '2016-11-28', ''),
(11, 'asdasdasd', 'Como ficou sabendo/foi encaminhado para o setor de informática?,Idade,Grau de escolaridade,Já utilizou computador alguma vez?,Qual o nível de conhecimento?,Domínio do teclado? (BV - digita sem olhar para as teclas?),Programas que conhece,Atividades comuns,Possui computador em casa?,Noção de utilidade do computador (pra que serve),Perspectivas (O que imagina que irá aprender)?,O que gostaria de aprender?,Dúvidas ou medos a respeito da informática}{asdasdads,,,,,,,,,,,,', '2016-11-28', ''),
(12, 'asdasdasd', 'Como ficou sabendo/foi encaminhado para o setor de informática?,Idade,Grau de escolaridade,Já utilizou computador alguma vez?,Qual o nível de conhecimento?,Domínio do teclado? (BV - digita sem olhar para as teclas?),Programas que conhece,Atividades comuns,Possui computador em casa?,Noção de utilidade do computador (pra que serve),Perspectivas (O que imagina que irá aprender)?,O que gostaria de aprender?,Dúvidas ou medos a respeito da informática}{asdasdads,,,,,,,,,,,,', '2016-11-28', ''),
(13, 'asdasdasd', 'Como ficou sabendo/foi encaminhado para o setor de informática?,Idade,Grau de escolaridade,Já utilizou computador alguma vez?,Qual o nível de conhecimento?,Domínio do teclado? (BV - digita sem olhar para as teclas?),Programas que conhece,Atividades comuns,Possui computador em casa?,Noção de utilidade do computador (pra que serve),Perspectivas (O que imagina que irá aprender)?,O que gostaria de aprender?,Dúvidas ou medos a respeito da informática}{asdasdads,,,,,,,,,,,,', '2016-11-28', ''),
(14, 'asdasdasd', 'Como ficou sabendo/foi encaminhado para o setor de informática?,Idade,Grau de escolaridade,Já utilizou computador alguma vez?,Qual o nível de conhecimento?,Domínio do teclado? (BV - digita sem olhar para as teclas?),Programas que conhece,Atividades comuns,Possui computador em casa?,Noção de utilidade do computador (pra que serve),Perspectivas (O que imagina que irá aprender)?,O que gostaria de aprender?,Dúvidas ou medos a respeito da informática}{asdasdads,,,,,,,,,,,,', '2016-11-28', ''),
(15, 'asdasdasd', 'Como ficou sabendo/foi encaminhado para o setor de informática?,Idade,Grau de escolaridade,Já utilizou computador alguma vez?,Qual o nível de conhecimento?,Domínio do teclado? (BV - digita sem olhar para as teclas?),Programas que conhece,Atividades comuns,Possui computador em casa?,Noção de utilidade do computador (pra que serve),Perspectivas (O que imagina que irá aprender)?,O que gostaria de aprender?,Dúvidas ou medos a respeito da informática}{asdasdads,,,,,,,,,,,,', '2016-11-28', ''),
(16, 'asdasdasd', 'Como ficou sabendo/foi encaminhado para o setor de informática?,Idade,Grau de escolaridade,Já utilizou computador alguma vez?,Qual o nível de conhecimento?,Domínio do teclado? (BV - digita sem olhar para as teclas?),Programas que conhece,Atividades comuns,Possui computador em casa?,Noção de utilidade do computador (pra que serve),Perspectivas (O que imagina que irá aprender)?,O que gostaria de aprender?,Dúvidas ou medos a respeito da informática}{asdasdads,,,,,,,,,,,,', '2016-11-28', ''),
(17, 'asdasdasd', 'Como ficou sabendo/foi encaminhado para o setor de informática?,Idade,Grau de escolaridade,Já utilizou computador alguma vez?,Qual o nível de conhecimento?,Domínio do teclado? (BV - digita sem olhar para as teclas?),Programas que conhece,Atividades comuns,Possui computador em casa?,Noção de utilidade do computador (pra que serve),Perspectivas (O que imagina que irá aprender)?,O que gostaria de aprender?,Dúvidas ou medos a respeito da informática}{asdasdads,,,,,,,,,,,,', '2016-11-28', ''),
(18, 'asdasdasd', 'Como ficou sabendo/foi encaminhado para o setor de informática?,Idade,Grau de escolaridade,Já utilizou computador alguma vez?,Qual o nível de conhecimento?,Domínio do teclado? (BV - digita sem olhar para as teclas?),Programas que conhece,Atividades comuns,Possui computador em casa?,Noção de utilidade do computador (pra que serve),Perspectivas (O que imagina que irá aprender)?,O que gostaria de aprender?,Dúvidas ou medos a respeito da informática}{asdasdads,,,,,,,,,,,,', '2016-11-28', ''),
(19, 'asdasdasd', 'Como ficou sabendo/foi encaminhado para o setor de informática?,Idade,Grau de escolaridade,Já utilizou computador alguma vez?,Qual o nível de conhecimento?,Domínio do teclado? (BV - digita sem olhar para as teclas?),Programas que conhece,Atividades comuns,Possui computador em casa?,Noção de utilidade do computador (pra que serve),Perspectivas (O que imagina que irá aprender)?,O que gostaria de aprender?,Dúvidas ou medos a respeito da informática}{asdasdads,,,,,,,,,,,,', '2016-11-28', ''),
(20, 'asdasdasd', 'Como ficou sabendo/foi encaminhado para o setor de informática?,Idade,Grau de escolaridade,Já utilizou computador alguma vez?,Qual o nível de conhecimento?,Domínio do teclado? (BV - digita sem olhar para as teclas?),Programas que conhece,Atividades comuns,Possui computador em casa?,Noção de utilidade do computador (pra que serve),Perspectivas (O que imagina que irá aprender)?,O que gostaria de aprender?,Dúvidas ou medos a respeito da informática}{asdasdads,,,,,,,,,,,,', '2016-11-28', ''),
(21, 'asdasdasd', 'Como ficou sabendo/foi encaminhado para o setor de informática?,Idade,Grau de escolaridade,Já utilizou computador alguma vez?,Qual o nível de conhecimento?,Domínio do teclado? (BV - digita sem olhar para as teclas?),Programas que conhece,Atividades comuns,Possui computador em casa?,Noção de utilidade do computador (pra que serve),Perspectivas (O que imagina que irá aprender)?,O que gostaria de aprender?,Dúvidas ou medos a respeito da informática}{asdasdads,,,,,,,,,,,,', '2016-11-28', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `perguntas`
--

CREATE TABLE `perguntas` (
  `cod` bigint(20) UNSIGNED NOT NULL,
  `pergunta` text NOT NULL,
  `ordem` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `cod` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `senha` varchar(30) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `email_destino` varchar(30) NOT NULL,
  `envia_copia` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`cod`, `nome`, `email`, `senha`, `usuario`, `email_destino`, `envia_copia`) VALUES
(5, '', 'marcio.lopes.fao@gmail.com', 'admin', 'admin', 'marcio.lopes.fao@gmail.com', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `avaliacoes`
--
ALTER TABLE `avaliacoes`
  ADD UNIQUE KEY `cod` (`cod`);

--
-- Indexes for table `perguntas`
--
ALTER TABLE `perguntas`
  ADD UNIQUE KEY `cod` (`cod`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`cod`),
  ADD UNIQUE KEY `cod` (`cod`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `avaliacoes`
--
ALTER TABLE `avaliacoes`
  MODIFY `cod` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `perguntas`
--
ALTER TABLE `perguntas`
  MODIFY `cod` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `cod` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
