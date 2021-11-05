-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 05-Nov-2021 às 23:13
-- Versão do servidor: 10.5.12-MariaDB
-- versão do PHP: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `id17666827_sustentable_enery`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `Registro`
--

CREATE TABLE `Registro` (
  `PK_id` bigint(20) NOT NULL,
  `Fk_usuario` decimal(11,0) DEFAULT NULL,
  `pontuacao_usuario` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Simulacao`
--

CREATE TABLE `Simulacao` (
  `PK_id` bigint(20) NOT NULL,
  `FK_cpf` decimal(11,0) DEFAULT NULL,
  `valor_economia_energia` float DEFAULT NULL,
  `economia_agua` float DEFAULT NULL,
  `arvores_poupadas` float DEFAULT NULL,
  `poluentes_evitados` float DEFAULT NULL,
  `pontuacao` float DEFAULT NULL,
  `quant_placas` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Usuario`
--

CREATE TABLE `Usuario` (
  `PK_cpf` decimal(11,0) NOT NULL,
  `nome` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cidade` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `senha` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pontuacao` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `Registro`
--
ALTER TABLE `Registro`
  ADD PRIMARY KEY (`PK_id`),
  ADD KEY `FK_rank_usu` (`Fk_usuario`);

--
-- Índices para tabela `Simulacao`
--
ALTER TABLE `Simulacao`
  ADD PRIMARY KEY (`PK_id`),
  ADD KEY `FK_cpf_sim_usua` (`FK_cpf`);

--
-- Índices para tabela `Usuario`
--
ALTER TABLE `Usuario`
  ADD PRIMARY KEY (`PK_cpf`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `Registro`
--
ALTER TABLE `Registro`
  MODIFY `PK_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `Simulacao`
--
ALTER TABLE `Simulacao`
  MODIFY `PK_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `Registro`
--
ALTER TABLE `Registro`
  ADD CONSTRAINT `FK_rank_usu` FOREIGN KEY (`Fk_usuario`) REFERENCES `Usuario` (`PK_cpf`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `Simulacao`
--
ALTER TABLE `Simulacao`
  ADD CONSTRAINT `FK_cpf_sim_usua` FOREIGN KEY (`FK_cpf`) REFERENCES `Usuario` (`PK_cpf`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
