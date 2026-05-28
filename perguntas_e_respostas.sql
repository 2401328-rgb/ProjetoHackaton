-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28/05/2026 às 13:38
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `hackaton_grupo7`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `perguntas_e_respostas`
--

CREATE TABLE `perguntas_e_respostas` (
  `PERGUNTA` varchar(500) NOT NULL,
  `RESP_CORR` varchar(200) NOT NULL,
  `RESPOSTA_INC1` varchar(200) NOT NULL,
  `RESPOSTA_INC2` varchar(200) NOT NULL,
  `RESPOSTA_INC3` varchar(200) NOT NULL,
  `VERD_FALS` varchar(15) NOT NULL,
  `ID_PERGUNTA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `perguntas_e_respostas`
--
ALTER TABLE `perguntas_e_respostas`
  ADD PRIMARY KEY (`ID_PERGUNTA`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `perguntas_e_respostas`
--
ALTER TABLE `perguntas_e_respostas`
  MODIFY `ID_PERGUNTA` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
