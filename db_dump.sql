-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 01/03/2022 às 11:55
-- Versão do servidor: 10.3.32-MariaDB-cll-lve
-- Versão do PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ucergs_sistema_informatica`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `atendimentos_pacientes`
--

CREATE TABLE IF NOT EXISTS `atendimentos_pacientes` (
  `cod_atendimento` bigint(20) UNSIGNED NOT NULL,
  `cod_paciente` int(11) NOT NULL,
  `cod_reabilitador` int(11) NOT NULL,
  `data` date NOT NULL,
  `descricao` text NOT NULL,
  `setor` varchar(30) NOT NULL,
  `parecer` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pacientes_info`
--

CREATE TABLE IF NOT EXISTS `pacientes_info` (
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
  `ativo` int(1) DEFAULT 1,
  `ultimo_atendimento` timestamp DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

ALTER TABLE `pacientes_info` ADD `afv` TEXT NULL AFTER `questionario`;
-- --------------------------------------------------------

--
-- Estrutura para tabela `pacientes_reabilitador`
--

CREATE TABLE IF NOT EXISTS `pacientes_reabilitador` (
  `cod_atendimento` int(11) NOT NULL,
  `cod_paciente` int(11) NOT NULL,
  `cod_reabilitador` int(11) NOT NULL,
  `dia` varchar(3) NOT NULL COMMENT 'seg, ter, qua, qui, sex, sab, dom',
  `hora` time NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `perguntas`
--

CREATE TABLE IF NOT EXISTS `perguntas` (
  `cod` bigint(20) UNSIGNED NOT NULL,
  `pergunta` text NOT NULL,
  `tipo` varchar(60) DEFAULT NULL,
  `ordem` int(11) NOT NULL,
  `cod_usuario` int(11),
  `updated_at` timestamp DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

ALTER TABLE `perguntas` ADD `cod_questionario` INT NOT NULL DEFAULT '1' AFTER `ordem`, ADD `opcoes` TEXT NULL AFTER `cod_questionario`;

--
-- Despejando dados para a tabela `perguntas`
--

INSERT INTO `perguntas` (`cod`, `pergunta`, `ordem`) VALUES
(20, 'Registro Geral - RG', 12),
(18, 'Profissão:', 10),
(17, 'Encaminhado por:', 9),
(16, 'Fone', 8),
(15, 'Escolaridade/Escola', 8),
(30, 'Cadastro de Pessoa Física -  CPF:', 13),
(14, 'Cep', 7),
(13, 'Cidade', 7),
(12, 'Bairro', 6),
(10, 'E-mail', 4),
(11, 'Endereço', 5),
(9, 'Gênero', 2),
(23, 'Idade', 3),
(29, 'Nome Social', 1),
(31, 'Número de Identificação Social - NIS', 14),
(32, 'Reside com quem:', 16),
(33, 'Nome dos responsáveis (Se menor de idade):', 17),
(34, 'Contato para emergências e informações:', 18),
(35, 'Situação visual Atual - Com CID: ', 19),
(36, 'Recebe algum benefício social: Sim ou não,  Qual? ', 20);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios_info`
--

CREATE TABLE IF NOT EXISTS `usuarios_info` (
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
  `obs` text DEFAULT NULL,
  `email` text NOT NULL,
  `senha` varchar(30) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `email_destino` text NOT NULL,
  `envia_copia` tinyint(1) NOT NULL,
  `ultimo_acesso` date DEFAULT NULL,
  `user_level` int(11) DEFAULT 2 COMMENT '1-admin, 2-rebailitador, 3-n...'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `usuarios_info`
--

INSERT INTO `usuarios_info` (`cod`, `nome`, `sobrenome`, `codigo`, `cbo`, `setor`, `endereco`, `cidade`, `telefone1`, `telefone2`, `procedimento`, `obs`, `email`, `senha`, `usuario`, `email_destino`, `envia_copia`, `ultimo_acesso`, `user_level`) VALUES
(5, 'Administrador Admin', NULL, NULL, '', 'info', NULL, NULL, NULL, NULL, NULL, NULL, 'admin@admin.com', '123', 'admin', 'admin@admin.com', 1, NULL, 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `atendimentos_pacientes`
--
ALTER TABLE `atendimentos_pacientes`
  ADD PRIMARY KEY (`cod_atendimento`),
  ADD UNIQUE KEY `cod_atendimento` (`cod_atendimento`);

--
-- Índices de tabela `pacientes_info`
--
ALTER TABLE `pacientes_info`
  ADD UNIQUE KEY `cod` (`cod`);

--
-- Índices de tabela `perguntas`
--
ALTER TABLE `perguntas`
  ADD UNIQUE KEY `cod` (`cod`);

--
-- Índices de tabela `usuarios_info`
--
ALTER TABLE `usuarios_info`
  ADD PRIMARY KEY (`cod`),
  ADD UNIQUE KEY `cod` (`cod`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `atendimentos_pacientes`
--
ALTER TABLE `atendimentos_pacientes`
  MODIFY `cod_atendimento` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pacientes_info`
--
ALTER TABLE `pacientes_info`
  MODIFY `cod` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `perguntas`
--
ALTER TABLE `perguntas`
  MODIFY `cod` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de tabela `usuarios_info`
--
ALTER TABLE `usuarios_info`
  MODIFY `cod` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
