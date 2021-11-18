-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 05-Mar-2019 às 02:23
-- Versão do servidor: 10.1.37-MariaDB
-- versão do PHP: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Estrutura da tabela `atendimentos_pacientes`
--

CREATE TABLE `atendimentos_pacientes` (
  `cod_atendimento` bigint(20) UNSIGNED NOT NULL,
  `cod_paciente` int(11) NOT NULL,
  `cod_reabilitador` int(11) NOT NULL,
  `data` date NOT NULL,
  `descricao` text NOT NULL,
  `setor` varchar(30) NOT NULL,
  `parecer` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `atendimentos_pacientes`
--

INSERT INTO `atendimentos_pacientes` (`cod_atendimento`, `cod_paciente`, `cod_reabilitador`, `data`, `descricao`, `setor`, `parecer`) VALUES
(38, 34, 5, '2018-08-13', 'laksmdaskdm', 'info', 1),
(25, 34, 5, '2018-08-19', 'asdda', 'info', 1),
(42, 34, 5, '2018-08-13', 'alksdmskladm', 'info', 1),
(37, 34, 5, '2018-08-13', 'asdsad', 'info', 1),
(34, 37, 5, '2018-08-15', 'alskdjaklsdkj\\ppppp', 'info', 1),
(21, 34, 5, '2018-08-05', 'lnlknln', 'info', 1),
(28, 34, 5, '2018-08-14', 'asdasdasd', 'info', 2),
(18, 34, 5, '2018-08-05', 'asdad', 'info', 1),
(17, 34, 5, '2018-08-05', 'SDSDF', 'info', 1),
(16, 34, 5, '2018-08-05', 'SDSDF', 'info', 1),
(40, 34, 5, '2018-08-13', 'laskmdlaskdm', 'info', 1),
(41, 34, 5, '2018-08-13', 'alksmdalksdm', 'info', 1),
(39, 34, 5, '2018-08-13', ',ams dmas,d ', 'info', 1),
(43, 34, 5, '2018-08-13', 'asdasd', 'info', 1),
(44, 34, 5, '2018-08-13', 'asdasd', 'info', 1),
(45, 34, 5, '2018-08-13', 'kjnjn', 'info', 1),
(46, 34, 5, '2018-08-13', 'asdlasdk', 'info', 1),
(47, 34, 5, '2018-08-13', 'ldasdka', 'info', 1),
(48, 34, 5, '2018-08-13', 'laskdalskdj', 'info', 1),
(49, 34, 5, '2018-08-13', ';ksd;kf', 'info', 1),
(50, 34, 5, '2018-08-13', 'asdasd', 'info', 1),
(51, 34, 5, '2018-08-13', 'asldkad', 'info', 1),
(53, 34, 5, '2018-08-19', 'jhjg\'', 'info', 1),
(54, 34, 5, '2018-08-13', 'laksdalk', 'info', 1),
(55, 34, 5, '2018-08-13', 'askjdasj', 'info', 1),
(56, 34, 5, '2018-08-13', 'ajskdskadh', 'info', 1),
(59, 34, 9, '2018-09-19', 'edivox', 'info', 1),
(60, 35, 11, '2018-09-19', 'Digitação', 'info', 1),
(61, 34, 5, '2018-09-23', 'LK', 'info', 1),
(62, 38, 5, '2018-09-24', 'n lknkj', 'info', 1),
(63, 38, 5, '2018-09-23', ';LK;LK', 'info', 1),
(64, 49, 5, '2018-09-25', 'Leitura de textos e digitação (L16)', 'info', 1),
(65, 48, 5, '2018-09-25', 'digitação (L10) e questionário inicial. (teve que sair mais cedo devido ao transporte)', 'info', 3),
(67, 50, 5, '2018-09-25', 'Treinamento de digitação com somente mão esquerda (L1)', 'info', 2),
(68, 51, 5, '2018-09-25', 'Avaliação inicial, demonstração Dosvox', 'info', 1),
(70, 53, 5, '2018-09-25', 'Digitação (L3)', 'info', 3),
(71, 52, 5, '2018-09-25', 'Leitura de Textos', 'info', 1),
(72, 54, 5, '2018-09-26', 'Avaliação, demosntração leitura de literatura', 'info', 1),
(73, 55, 5, '2018-09-26', 'Avaliação inicial, empréstimo de livro', 'info', 1),
(74, 56, 5, '2018-09-26', 'Avaliação, leitura de literatura no dosvox e como abrir ler texto', 'info', 1),
(75, 57, 5, '2018-09-26', 'Leitura de textos no Dosvox', 'info', 1),
(78, 58, 5, '2018-09-26', 'Avaliação inicial e leitura de texto no dosvox', 'info', 1),
(79, 59, 5, '2018-09-26', 'Avaliação inicial e leitura de texto no dosvox', 'info', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pacientes_info`
--

CREATE TABLE `pacientes_info` (
  `cod` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(60) NOT NULL,
  `sobrenome` varchar(60) DEFAULT NULL,
  `cid` varchar(6) DEFAULT NULL,
  `data_nasc` date DEFAULT NULL,
  `genero` varchar(30) DEFAULT NULL,
  `obs` int(11) DEFAULT NULL,
  `questionario` text NOT NULL,
  `data` date NOT NULL,
  `avaliador` varchar(30) NOT NULL,
  `cod_avaliador` int(11) DEFAULT NULL,
  `setor` varchar(60) DEFAULT NULL,
  `codigo` int(11) DEFAULT NULL,
  `ativo` int(1) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pacientes_info`
--

INSERT INTO `pacientes_info` (`cod`, `nome`, `sobrenome`, `cid`, `data_nasc`, `genero`, `obs`, `questionario`, `data`, `avaliador`, `cod_avaliador`, `setor`, `codigo`, `ativo`) VALUES
(34, 'Fernando', ' de Abreu', 'H23.0', '1992-05-04', 'feminino', 52145, 'Como ficou sabendo/foi encaminhado para o setor de informática?%*%Idade%*%Grau de escolaridade%*%Já utilizou computador alguma vez?%*%Qual o nível de conhecimento?%*%Domínio do teclado? (BV - digita sem olhar para as teclas?)%*%Programas que conhece%*%Atividades comuns%*%Possui computador em casa?%*%Noção de utilidade do computador (pra que serve)%*%Perspectivas (O que imagina que irá aprender)?%*%O que gostaria de aprender?%*%Dúvidas ou medos a respeito da informática}{asd%*%asd%*%%*%%*%%*%%*%%*%%*%%*%%*%%*%%*%', '2018-08-05', 'Márcio Lopes Fão', 521485, 'info', 234234, 0),
(35, 'Carlos Magno', NULL, '', NULL, 'feminino', NULL, 'Como ficou sabendo / foi encaminhado para o setor de informática?%*%Idade%*%Grau de escolaridade%*%Já utilizou computador alguma vez?%*%Qual o nível de conhecimento?%*%Domínio do teclado? (BV - digita sem olhar para as teclas?)%*%Programas que conhece%*%Atividades comuns%*%Possui computador em casa?%*%Noção de utilidade do computador (pra que serve)%*%Perspectivas (O que imagina que irá aprender)?%*%O que gostaria de aprender?%*%Dúvidas ou medos a respeito da informática}{%*%%*%%*%%*%%*%%*%%*%%*%%*%%*%%*%%*%', '2018-08-06', 'Márcio Lopes Fão', NULL, 'info', 0, 0),
(36, 'Rogério Senna', NULL, NULL, NULL, NULL, NULL, 'Como ficou sabendo / foi encaminhado para o setor de informática?%*%Idade%*%Grau de escolaridade%*%Já utilizou computador alguma vez?%*%Qual o nível de conhecimento?%*%Domínio do teclado? (BV - digita sem olhar para as teclas?)%*%Programas que conhece%*%Atividades comuns%*%Possui computador em casa?%*%Noção de utilidade do computador (pra que serve)%*%Perspectivas (O que imagina que irá aprender)?%*%O que gostaria de aprender?%*%Dúvidas ou medos a respeito da informática}{%*%%*%%*%%*%%*%%*%%*%%*%%*%%*%%*%%*%', '2018-08-06', 'Márcio Lopes Fão', NULL, 'Informática', NULL, 0),
(37, 'Christian Quevedo', NULL, '', NULL, 'feminino', NULL, 'Como ficou sabendo / foi encaminhado para o setor de informática?%*%Idade%*%Grau de escolaridade%*%Já utilizou computador alguma vez?%*%Qual o nível de conhecimento?%*%Domínio do teclado? (BV - digita sem olhar para as teclas?)%*%Programas que conhece%*%Atividades comuns%*%Possui computador em casa?%*%Noção de utilidade do computador (pra que serve)%*%Perspectivas (O que imagina que irá aprender)?%*%O que gostaria de aprender?%*%Dúvidas ou medos a respeito da informática}{%*%%*%%*%%*%%*%%*%%*%%*%%*%%*%%*%%*%', '2018-08-06', 'Márcio Lopes Fão', 5, 'info', 0, 0),
(38, 'popjop', NULL, '', NULL, 'feminino', NULL, 'Como ficou sabendo / foi encaminhado para o setor de informática?%*%Idade%*%Grau de escolaridade%*%Já utilizou computador alguma vez?%*%Qual o nível de conhecimento?%*%Domínio do teclado? (BV - digita sem olhar para as teclas?)%*%Programas que conhece%*%Atividades comuns%*%Possui computador em casa?%*%Noção de utilidade do computador (pra que serve)%*%Perspectivas (O que imagina que irá aprender)?%*%O que gostaria de aprender?%*%Dúvidas ou medos a respeito da informática}{%*%%*%%*%%*%%*%%*%%*%%*%%*%%*%%*%%*%', '2018-08-13', 'Márcio Lopes Fão', 5, 'info', 0, 0),
(39, 'Rodrigo', NULL, NULL, NULL, NULL, NULL, 'Como ficou sabendo / foi encaminhado para o setor de informática?%*%Idade%*%Grau de escolaridade%*%Já utilizou computador alguma vez?%*%Qual o nível de conhecimento?%*%Domínio do teclado? (BV - digita sem olhar para as teclas?)%*%Programas que conhece%*%Atividades comuns%*%Possui computador em casa?%*%Noção de utilidade do computador (pra que serve)%*%Perspectivas (O que imagina que irá aprender)?%*%O que gostaria de aprender?%*%Dúvidas ou medos a respeito da informática}{lknk%*%lkn%*%lkn%*%lkn%*%%*%%*%%*%%*%%*%%*%%*%%*%', '2018-09-16', 'Márcio Lopes Fão', 5, 'Informática', NULL, 0),
(40, 'teste', NULL, NULL, NULL, NULL, NULL, 'Data de nascimento: %*%Como ficou sabendo / foi encaminhado para o setor de informática?%*%Idade%*%Grau de escolaridade%*%Já utilizou computador alguma vez?%*%Qual o nível de conhecimento?%*%Domínio do teclado? (BV - digita sem olhar para as teclas?)%*%Programas que conhece%*%Atividades comuns%*%Possui computador em casa?%*%Noção de utilidade do computador (pra que serve)%*%Perspectivas (O que imagina que irá aprender)?%*%O que gostaria de aprender?%*%Dúvidas ou medos a respeito da informática}{asldkamsdlkm%*%lknlk%*%lknlkn%*%lknl%*%nlkn%*%lkn%*%lk%*%nlk%*%nl%*%kn%*%lkn%*%lkn%*%lkn%*%lkn', '2018-09-16', 'Márcio Lopes Fão', 5, 'Informática', NULL, 0),
(41, 'Teste', NULL, NULL, NULL, NULL, NULL, 'Data de nascimento: %*%Como ficou sabendo / foi encaminhado para o setor de informática?%*%Idade%*%Grau de escolaridade%*%Já utilizou computador alguma vez?%*%Qual o nível de conhecimento?%*%Domínio do teclado? (BV - digita sem olhar para as teclas?)%*%Programas que conhece%*%Atividades comuns%*%Possui computador em casa?%*%Noção de utilidade do computador (pra que serve)%*%Perspectivas (O que imagina que irá aprender)?%*%O que gostaria de aprender?%*%Dúvidas ou medos a respeito da informática}{asdad%*%asdad%*%asd%*%asd%*%asd%*%asd%*%asd%*%asd%*%asd%*%asd%*%sd%*%%*%%*%', '2018-09-16', 'Márcio Lopes Fão', 5, 'Informática', NULL, 0),
(42, 'qwe', NULL, NULL, NULL, NULL, NULL, 'Data de nascimento: %*%Como ficou sabendo / foi encaminhado para o setor de informática?%*%Idade%*%Grau de escolaridade%*%Já utilizou computador alguma vez?%*%Qual o nível de conhecimento?%*%Domínio do teclado? (BV - digita sem olhar para as teclas?)%*%Programas que conhece%*%Atividades comuns%*%Possui computador em casa?%*%Noção de utilidade do computador (pra que serve)%*%Perspectivas (O que imagina que irá aprender)?%*%O que gostaria de aprender?%*%Dúvidas ou medos a respeito da informática}{sd%*%sddq%*%asd%*%asd%*%%*%%*%%*%%*%%*%%*%%*%%*%%*%', '2018-09-16', 'Márcio Lopes Fão', 5, 'Informática', NULL, 0),
(43, 'asdasd', NULL, NULL, NULL, NULL, NULL, 'Data de nascimento: %*%Como ficou sabendo / foi encaminhado para o setor de informática?%*%Idade%*%Grau de escolaridade%*%Já utilizou computador alguma vez?%*%Qual o nível de conhecimento?%*%Domínio do teclado? (BV - digita sem olhar para as teclas?)%*%Programas que conhece%*%Atividades comuns%*%Possui computador em casa?%*%Noção de utilidade do computador (pra que serve)%*%Perspectivas (O que imagina que irá aprender)?%*%O que gostaria de aprender?%*%Dúvidas ou medos a respeito da informática}{asdad%*%%*%%*%%*%%*%%*%%*%%*%%*%%*%%*%%*%%*%', '2018-09-16', 'Márcio Lopes Fão', 5, 'Informática', NULL, 0),
(44, 'teste', NULL, NULL, NULL, NULL, NULL, 'Data de nascimento:%*%Idade%*%Possui deficiência:  (  ) Sim   (  ) Não     Qual:         Há quanto tempo?%*%Se deficiente visual, é parcial ou total?%*%Grau de escolaridade%*%Qual o nível de conhecimento?%*%Já utilizou computador alguma vez?%*%Domínio do teclado? (Se baixa visão, digita sem olhar para as teclas?)?%*%Programas que conhece%*%Possui computador em casa?%*%Atividades comuns%*%Noção de utilidade do computador (pra que serve)%*%Perspectivas (O que imagina que irá aprender)?%*%O que gostaria de aprender?%*%Dúvidas ou medos a respeito da informática}{skdma%*%asda%*%alsdkn%*%ALsknd%*%laksdn%*%slkdn%*%%*%%*%%*%%*%%*%%*%%*%%*%', '2018-09-17', 'Márcio Lopes Fão', 5, 'Informática', NULL, 0),
(45, 'Adão Fernando', NULL, '', NULL, 'feminino', NULL, 'Data de nascimento:%*%Idade%*%Possui deficiência:  (  ) Sim   (  ) Não     Qual:         Há quanto tempo?%*%Se deficiente visual, é parcial ou total?%*%Grau de escolaridade%*%Qual o nível de conhecimento?%*%Já utilizou computador alguma vez?%*%Domínio do teclado? (Se baixa visão, digita sem olhar para as teclas?)?%*%Programas que conhece%*%Possui computador em casa?%*%Atividades comuns%*%Noção de utilidade do computador (pra que serve)%*%Perspectivas (O que imagina que irá aprender)?%*%O que gostaria de aprender?%*%Dúvidas ou medos a respeito da informática}{%*%%*%%*%%*%%*%%*%%*%%*%%*%%*%%*%%*%%*%%*%', '2018-09-14', 'Josiane Caseira Dias', 8, 'info', 0, 1),
(46, 'Marcio', NULL, NULL, NULL, NULL, NULL, 'Data de nascimento:%*%Idade%*%Possui deficiência:  (  ) Sim   (  ) Não     Qual:         Há quanto tempo?%*%Se deficiente visual, é parcial ou total?%*%Grau de escolaridade%*%Qual o nível de conhecimento?%*%Já utilizou computador alguma vez?%*%Domínio do teclado? (Se baixa visão, digita sem olhar para as teclas?)?%*%Programas que conhece%*%Possui computador em casa?%*%Atividades comuns%*%Noção de utilidade do computador (pra que serve)%*%Perspectivas (O que imagina que irá aprender)?%*%O que gostaria de aprender?%*%Dúvidas ou medos a respeito da informática}{%*%%*%%*%%*%%*%%*%%*%%*%%*%%*%%*%%*%%*%%*%', '2018-09-19', 'Gilséia Sias Schulz', 9, 'Informática', NULL, 0),
(47, ' etre ', NULL, NULL, '0341-03-12', NULL, NULL, 'Data de nascimento:%*%Idade%*%Possui deficiência:  (  ) Sim   (  ) Não     Qual:         Há quanto tempo?%*%Se deficiente visual, é parcial ou total?%*%Grau de escolaridade%*%Qual o nível de conhecimento?%*%Já utilizou computador alguma vez?%*%Domínio do teclado? (Se baixa visão, digita sem olhar para as teclas?)?%*%Programas que conhece%*%Possui computador em casa?%*%Atividades comuns%*%Noção de utilidade do computador (pra que serve)%*%Perspectivas (O que imagina que irá aprender)?%*%O que gostaria de aprender?%*%Dúvidas ou medos a respeito da informática}{%*%%*%%*%%*%%*%%*%%*%%*%%*%%*%%*%%*%%*%%*%', '2018-09-23', 'Márcio Lopes Fão', 5, 'Informática', NULL, 0),
(48, 'Valnei Soares de Oliveira', NULL, '', NULL, 'feminino', NULL, 'Idade%*%Qual o nível de deficiência visual?%*%Grau de escolaridade%*%Qual o nível de conhecimento?%*%Já utilizou computador alguma vez?%*%Domínio do teclado? (Se baixa visão, digita sem olhar para as teclas?)?%*%Programas que conhece%*%Possui computador em casa?%*%Atividades comuns%*%Noção de utilidade do computador (pra que serve)%*%Perspectivas (O que imagina que irá aprender)?%*%O que gostaria de aprender?%*%Dúvidas ou medos a respeito da informática}{50%*%Percebe luz somente%*%Segunda serie%*%Nada%*%Nunca%*%Nenhum%*%Nenhum%*%não%*%--%*%Trabalho, organizar coisas em empresas, comunicação.%*%Aprender a escrever%*%se adaptar melhor a informática%*%sem medos, duvida se vai conseguir se adaptar', '2018-09-25', 'Márcio Lopes Fão', 5, 'info', 0, 1),
(49, 'Carmen Liziane Fernandes Da Si', NULL, '', NULL, 'feminino', NULL, 'Idade%*%Qual o nível de deficiência visual?%*%Grau de escolaridade%*%Qual o nível de conhecimento?%*%Já utilizou computador alguma vez?%*%Domínio do teclado? (Se baixa visão, digita sem olhar para as teclas?)?%*%Programas que conhece%*%Possui computador em casa?%*%Atividades comuns%*%Noção de utilidade do computador (pra que serve)%*%Perspectivas (O que imagina que irá aprender)?%*%O que gostaria de aprender?%*%Dúvidas ou medos a respeito da informática}{35%*%Baixa visão, não enxerga longe%*%Ensino Médio incompleto%*%Já fez curso windows básico em 96%*%Já teve notebook mas estragou%*%Digita olhando.%*%windows, power point, excel, word.%*%Só Smartphone%*%Facebook, Youtube, videochamadas.%*%Se atualizar, acessar a internet, aprender.%*%Novo Windows, digitação.%*%usar o touchpad, digitação, e novidades.%*%não', '2018-09-25', 'Márcio Lopes Fão', 5, 'info', 0, 1),
(50, 'Victoria Rockenback da Porciun', NULL, '', NULL, 'feminino', NULL, 'Idade%*%Qual o nível de deficiência visual?%*%Grau de escolaridade%*%Qual o nível de conhecimento?%*%Já utilizou computador alguma vez?%*%Domínio do teclado? (Se baixa visão, digita sem olhar para as teclas?)?%*%Programas que conhece%*%Possui computador em casa?%*%Atividades comuns%*%Noção de utilidade do computador (pra que serve)%*%Perspectivas (O que imagina que irá aprender)?%*%O que gostaria de aprender?%*%Dúvidas ou medos a respeito da informática}{%*%%*%%*%%*%%*%%*%%*%%*%%*%%*%%*%%*%', '2018-09-25', 'Márcio Lopes Fão', 5, 'info', 0, 1),
(51, 'Antonio Luis Aguiar Pires', NULL, '', '1964-12-12', 'feminino', NULL, 'Idade%*%Qual o nível de deficiência visual?%*%Grau de escolaridade%*%Qual o nível de conhecimento?%*%Já utilizou computador alguma vez?%*%Domínio do teclado? (Se baixa visão, digita sem olhar para as teclas?)?%*%Programas que conhece%*%Possui computador em casa?%*%Atividades comuns%*%Noção de utilidade do computador (pra que serve)%*%Perspectivas (O que imagina que irá aprender)?%*%O que gostaria de aprender?%*%Dúvidas ou medos a respeito da informática}{53%*%Percepção de luz, identifica formas.%*%5 serie%*%básico%*%um pouco%*%--%*%navegador de internet%*%tem, um computador de mesa%*%Não tem mexido atualmente, navegar na internet, sites de pescaria, ver fotos%*%informações, pesquisar, divertir%*%aprender a usar o teclado%*%lidar com o teclado%*%não', '2018-09-25', 'Márcio Lopes Fão', 5, 'info', 0, 1),
(52, 'Silvia Regina Chula Farias', NULL, '', '1963-11-29', 'feminino', NULL, 'Idade%*%Qual o nível de deficiência visual?%*%Grau de escolaridade%*%Qual o nível de conhecimento?%*%Já utilizou computador alguma vez?%*%Domínio do teclado? (Se baixa visão, digita sem olhar para as teclas?)?%*%Programas que conhece%*%Possui computador em casa?%*%Atividades comuns%*%Noção de utilidade do computador (pra que serve)%*%Perspectivas (O que imagina que irá aprender)?%*%O que gostaria de aprender?%*%Dúvidas ou medos a respeito da informática}{\r\n%*%%*%%*%%*%%*%%*%%*%%*%%*%%*%%*%%*%', '2018-09-25', 'Márcio Lopes Fão', 5, 'info', 0, 1),
(53, 'Catia Luciana Dias Vaz', NULL, '', '2018-09-27', 'feminino', NULL, 'Idade%*%Qual o nível de deficiência visual?%*%Grau de escolaridade%*%Qual o nível de conhecimento?%*%Já utilizou computador alguma vez?%*%Domínio do teclado? (Se baixa visão, digita sem olhar para as teclas?)?%*%Programas que conhece%*%Possui computador em casa?%*%Atividades comuns%*%Noção de utilidade do computador (pra que serve)%*%Perspectivas (O que imagina que irá aprender)?%*%O que gostaria de aprender?%*%Dúvidas ou medos a respeito da informática}{%*%%*%%*%%*%%*%%*%%*%%*%%*%%*%%*%%*%', '2018-09-25', 'Márcio Lopes Fão', 5, 'info', 0, 1),
(54, 'Claudia Simone Rodrigues Dos S', NULL, '', '1968-05-07', 'feminino', NULL, 'Idade%*%Qual o nível de deficiência visual?%*%Grau de escolaridade%*%Qual o nível de conhecimento?%*%Já utilizou computador alguma vez?%*%Domínio do teclado? (Se baixa visão, digita sem olhar para as teclas?)?%*%Programas que conhece%*%Possui computador em casa?%*%Atividades comuns%*%Noção de utilidade do computador (pra que serve)%*%Perspectivas (O que imagina que irá aprender)?%*%O que gostaria de aprender?%*%Dúvidas ou medos a respeito da informática}{50%*%BV em um olho e cegueira no outro. Não identifica formas. Necessita ver muito de perto.%*%2 ano segundo grau%*%nenhum%*%Já utilizou celular%*%nenhum%*%--%*%sim, compartilhado com filhos%*%--%*%Comunicação, estudo, aprendizado, %*%---%*%Uso geral do computador%*%--', '2018-09-26', 'Márcio Lopes Fão', 5, 'info', 0, 1),
(55, 'Celi Julio da Silva', NULL, '', '1962-11-03', 'feminino', NULL, 'Idade%*%Qual o nível de deficiência visual?%*%Grau de escolaridade%*%Qual o nível de conhecimento?%*%Já utilizou computador alguma vez?%*%Domínio do teclado? (Se baixa visão, digita sem olhar para as teclas?)?%*%Programas que conhece%*%Possui computador em casa?%*%Atividades comuns%*%Noção de utilidade do computador (pra que serve)%*%Perspectivas (O que imagina que irá aprender)?%*%O que gostaria de aprender?%*%Dúvidas ou medos a respeito da informática}{\r\n%*%%*%%*%%*%%*%%*%%*%%*%%*%%*%%*%%*%', '2018-07-08', 'Márcio Lopes Fão', 5, 'info', 0, 1),
(56, 'Ondina ', NULL, '', NULL, 'feminino', NULL, 'Idade%*%Qual o nível de deficiência visual?%*%Grau de escolaridade%*%Qual o nível de conhecimento?%*%Já utilizou computador alguma vez?%*%Domínio do teclado? (Se baixa visão, digita sem olhar para as teclas?)?%*%Programas que conhece%*%Possui computador em casa?%*%Atividades comuns%*%Noção de utilidade do computador (pra que serve)%*%Perspectivas (O que imagina que irá aprender)?%*%O que gostaria de aprender?%*%Dúvidas ou medos a respeito da informática}{%*%%*%%*%%*%%*%%*%%*%%*%%*%%*%%*%%*%', '2018-09-26', 'Márcio Lopes Fão', 5, 'info', 0, 1),
(57, 'Juarez ', NULL, '', '3123-02-11', 'feminino', NULL, 'Idade%*%Qual o nível de deficiência visual?%*%Grau de escolaridade%*%Qual o nível de conhecimento?%*%Já utilizou computador alguma vez?%*%Domínio do teclado? (Se baixa visão, digita sem olhar para as teclas?)?%*%Programas que conhece%*%Possui computador em casa?%*%Atividades comuns%*%Noção de utilidade do computador (pra que serve)%*%Perspectivas (O que imagina que irá aprender)?%*%O que gostaria de aprender?%*%Dúvidas ou medos a respeito da informática}{%*%%*%%*%%*%%*%%*%%*%%*%%*%%*%%*%%*%', '2018-09-26', 'Márcio Lopes Fão', 5, 'info', 0, 1),
(58, 'Maria Felisbina da Dauzacker d', NULL, '', '1952-11-09', 'feminino', NULL, 'Idade%*%Qual o nível de deficiência visual?%*%Grau de escolaridade%*%Qual o nível de conhecimento?%*%Já utilizou computador alguma vez?%*%Domínio do teclado? (Se baixa visão, digita sem olhar para as teclas?)?%*%Programas que conhece%*%Possui computador em casa?%*%Atividades comuns%*%Noção de utilidade do computador (pra que serve)%*%Perspectivas (O que imagina que irá aprender)?%*%O que gostaria de aprender?%*%Dúvidas ou medos a respeito da informática}{66%*%BV em um olho%*%3 serie%*%Usa celular%*%nunca%*%--%*%Whatsap e ligação%*%Não, só smartphone%*%whatsapp, facebook, youtube e ligação%*%não tem ideia%*%sem ideia%*%aprender de tudo%*%--', '2018-09-26', 'Márcio Lopes Fão', 5, 'info', 0, 1),
(59, 'Elisangela Lima Da Silva', NULL, '', '1982-01-23', 'feminino', NULL, 'Idade%*%Qual o nível de deficiência visual?%*%Grau de escolaridade%*%Qual o nível de conhecimento?%*%Já utilizou computador alguma vez?%*%Domínio do teclado? (Se baixa visão, digita sem olhar para as teclas?)?%*%Programas que conhece%*%Possui computador em casa?%*%Atividades comuns%*%Noção de utilidade do computador (pra que serve)%*%Perspectivas (O que imagina que irá aprender)?%*%O que gostaria de aprender?%*%Dúvidas ou medos a respeito da informática}{37%*%BV bastante baixa, sensibilidade a luz%*%8º serie%*%--%*%não, somente smartphone, muito pouco ultimamamente%*%--%*%--%*%não%*%licações somente%*%---%*%--%*%utilidades para o dia a a dia%*%--', '2018-09-26', 'Márcio Lopes Fão', 5, 'info', 0, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pacientes_reabilitador`
--

CREATE TABLE `pacientes_reabilitador` (
  `cod_atendimento` int(11) NOT NULL,
  `cod_paciente` int(11) NOT NULL,
  `cod_reabilitador` int(11) NOT NULL,
  `dia` varchar(3) NOT NULL COMMENT 'seg, ter, qua, qui, sex, sab, dom',
  `hora` time NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
(20, 'Dúvidas ou medos a respeito da informática', 12),
(19, 'O que gostaria de aprender?', 11),
(18, 'Perspectivas (O que imagina que irá aprender)?', 10),
(17, 'Noção de utilidade do computador (pra que serve)', 9),
(16, 'Possui computador em casa?', 8),
(15, 'Atividades comuns', 8),
(14, 'Programas que conhece', 7),
(13, 'Domínio do teclado? (Se baixa visão, digita sem olhar para as teclas?)?', 6),
(12, 'Qual o nível de conhecimento?', 5),
(10, 'Grau de escolaridade', 4),
(11, 'Já utilizou computador alguma vez?', 5),
(9, 'Idade', 2),
(23, 'Qual o nível de deficiência visual?', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `turmas_info`
--

CREATE TABLE `turmas_info` (
  `cod_turma` bigint(20) UNSIGNED NOT NULL,
  `cod_reabilitador` int(11) DEFAULT NULL,
  `hora` varchar(5) DEFAULT NULL,
  `seg` int(11) DEFAULT NULL,
  `ter` int(11) DEFAULT NULL,
  `qua` int(11) DEFAULT NULL,
  `qui` int(11) DEFAULT NULL,
  `sex` int(11) DEFAULT NULL,
  `ativo` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma_aluno`
--

CREATE TABLE `turma_aluno` (
  `cod_turma_aluno` bigint(20) UNSIGNED NOT NULL,
  `cod_turma` bigint(11) NOT NULL,
  `cod_aluno` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios_info`
--

CREATE TABLE `usuarios_info` (
  `cod` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(30) NOT NULL,
  `sobrenome` varchar(30) DEFAULT NULL,
  `codigo` varchar(10) DEFAULT NULL,
  `cbo` varchar(10) NOT NULL,
  `setor` varchar(60) DEFAULT NULL,
  `endereco` varchar(60) DEFAULT NULL,
  `cidade` varchar(60) DEFAULT NULL,
  `telefone1` varchar(10) DEFAULT NULL,
  `telefone2` varchar(15) DEFAULT NULL,
  `procedimento` varchar(60) DEFAULT NULL,
  `obs` text,
  `email` text NOT NULL,
  `senha` varchar(30) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `email_destino` text NOT NULL,
  `envia_copia` tinyint(1) NOT NULL,
  `ultimo_acesso` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios_info`
--

INSERT INTO `usuarios_info` (`cod`, `nome`, `sobrenome`, `codigo`, `cbo`, `setor`, `endereco`, `cidade`, `telefone1`, `telefone2`, `procedimento`, `obs`, `email`, `senha`, `usuario`, `email_destino`, `envia_copia`, `ultimo_acesso`) VALUES
(6, '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'asd', 'asd', '', 0, NULL),
(5, 'Márcio Lopes Fão', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'marcio.lopes.fao@gmail.com', '123', 'admin', '', 1, NULL),
(7, '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 0, '2018-08-06'),
(8, 'Josiane Caseira Dias', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'josid2008@hotmail.com', 'josi', 'josi', 'centroreabilitacaovisuallb@hotmail.com', 1, NULL),
(9, 'Gilséia Sias Schulz', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'gilseia.sias@gmail.com', 'gilseia', 'gilseia', 'centroreabilitacaovisuallb@hotmail.com', 1, NULL),
(10, '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'francis', 'francis', '', 0, NULL),
(11, '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'vanice', 'vanice', '', 0, NULL),
(12, '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'thais', 'thais', '', 0, NULL),
(13, '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'helena', 'helena', '', 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `atendimentos_pacientes`
--
ALTER TABLE `atendimentos_pacientes`
  ADD PRIMARY KEY (`cod_atendimento`),
  ADD UNIQUE KEY `cod_atendimento` (`cod_atendimento`),
  ADD KEY `fk_apac` (`cod_paciente`),
  ADD KEY `fk_dpac` (`cod_reabilitador`);

--
-- Indexes for table `pacientes_info`
--
ALTER TABLE `pacientes_info`
  ADD PRIMARY KEY (`cod`),
  ADD UNIQUE KEY `cod` (`cod`),
  ADD KEY `fk_spac` (`cod_avaliador`);

--
-- Indexes for table `pacientes_reabilitador`
--
ALTER TABLE `pacientes_reabilitador`
  ADD PRIMARY KEY (`cod_atendimento`),
  ADD KEY `fk_pac` (`cod_paciente`),
  ADD KEY `fk_paec` (`cod_reabilitador`);

--
-- Indexes for table `perguntas`
--
ALTER TABLE `perguntas`
  ADD PRIMARY KEY (`cod`),
  ADD UNIQUE KEY `cod` (`cod`);

--
-- Indexes for table `turmas_info`
--
ALTER TABLE `turmas_info`
  ADD PRIMARY KEY (`cod_turma`),
  ADD UNIQUE KEY `cod_turma` (`cod_turma`);

--
-- Indexes for table `turma_aluno`
--
ALTER TABLE `turma_aluno`
  ADD PRIMARY KEY (`cod_turma_aluno`),
  ADD UNIQUE KEY `cod_turma_aluno` (`cod_turma_aluno`),
  ADD KEY `cod_turma` (`cod_turma`);

--
-- Indexes for table `usuarios_info`
--
ALTER TABLE `usuarios_info`
  ADD PRIMARY KEY (`cod`),
  ADD UNIQUE KEY `cod` (`cod`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `atendimentos_pacientes`
--
ALTER TABLE `atendimentos_pacientes`
  MODIFY `cod_atendimento` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `pacientes_info`
--
ALTER TABLE `pacientes_info`
  MODIFY `cod` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `perguntas`
--
ALTER TABLE `perguntas`
  MODIFY `cod` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `turmas_info`
--
ALTER TABLE `turmas_info`
  MODIFY `cod_turma` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `turma_aluno`
--
ALTER TABLE `turma_aluno`
  MODIFY `cod_turma_aluno` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuarios_info`
--
ALTER TABLE `usuarios_info`
  MODIFY `cod` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
