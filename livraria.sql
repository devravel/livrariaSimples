-- phpMyAdmin SQL Dump
-- version 5.2.1
-- Host: 127.0.0.1
-- Tempo de geração: 30/10/2025
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `livraria` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `livraria`;

-- --------------------------------------------------------
-- Estrutura para tabela `livros`
-- --------------------------------------------------------

DROP TABLE IF EXISTS `livros`;
CREATE TABLE `livros` (
  `cod` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `autor` varchar(100) NOT NULL,
  `ano` varchar(10) NOT NULL,
  `genero` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dados iniciais (exemplo)
INSERT INTO `livros` (`cod`, `titulo`, `autor`, `ano`, `genero`) VALUES
(1, 'Dom Casmurro', 'Machado de Assis', '1899', 'Romance'),
(2, 'O Cortiço', 'Aluísio Azevedo', '1890', 'Realismo');

-- --------------------------------------------------------
-- Estrutura para tabela `usuarios`
-- --------------------------------------------------------

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `login` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `usuarios` (`id`, `nome`, `login`, `senha`) VALUES
(1, 'admin', 'admin', '1234'),
(2, 'Ravel', 'ravel', 'senha123');

-- --------------------------------------------------------
-- Estrutura para tabela `categorias`
-- --------------------------------------------------------

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `categorias` (`id`, `descricao`) VALUES
(1, 'Romance'),
(2, 'Terror'),
(3, 'Fantasia');

-- --------------------------------------------------------
-- Índices
-- --------------------------------------------------------

ALTER TABLE `livros`
  ADD PRIMARY KEY (`cod`);

ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

-- --------------------------------------------------------
-- AUTO_INCREMENT
-- --------------------------------------------------------

ALTER TABLE `livros`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

COMMIT;
