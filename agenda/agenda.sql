-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 02-Ago-2019 às 01:03
-- Versão do servidor: 10.1.37-MariaDB
-- versão do PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agenda`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `compromissos`
--

CREATE TABLE `compromissos` (
  `id_compromisso` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `compromissos`
--

INSERT INTO `compromissos` (`id_compromisso`, `id_usuario`, `descricao`, `data`, `hora`, `status`) VALUES
(3, 1, 'Estudar', '2019-07-30', '23:00:00', 'ok'),
(4, 1, 'Estudar', '2019-07-30', '23:00:00', 'ok'),
(5, 1, 'Estudar', '2019-07-30', '23:00:00', 'ok');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contatos`
--

CREATE TABLE `contatos` (
  `id_contato` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `email` varchar(80) NOT NULL,
  `telefone` int(10) NOT NULL,
  `celular` int(10) NOT NULL,
  `endereco` varchar(70) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `cep` int(8) NOT NULL,
  `cidade` varchar(60) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `contatos`
--

INSERT INTO `contatos` (`id_contato`, `nome`, `email`, `telefone`, `celular`, `endereco`, `bairro`, `cep`, `cidade`, `uf`, `id_usuario`) VALUES
(7, 'Bruno', 'mail@mail.com', 1565468, 15665468, 'Rua Teste', 'Teste', 0, 'Teste', 'RS', 1),
(8, 'Bruno', 'mail@mail.com', 1565468, 15665468, 'Rua Teste', 'Teste3', 0, 'Teste', 'ES', 1),
(9, 'Bruno', 'mail@mail.com', 1565468, 15665468, 'Rua Teste', 'Teste4', 0, 'Teste', 'SP', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `email` varchar(80) NOT NULL,
  `username` varchar(50) NOT NULL,
  `senha` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nome`, `email`, `username`, `senha`) VALUES
(1, 'Bruno', 'mail@mail.com', 'bm28', '123456'),
(2, 'Bruno Melo', 'mail7@mail.com', 'melo', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `compromissos`
--
ALTER TABLE `compromissos`
  ADD PRIMARY KEY (`id_compromisso`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `contatos`
--
ALTER TABLE `contatos`
  ADD PRIMARY KEY (`id_contato`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `compromissos`
--
ALTER TABLE `compromissos`
  MODIFY `id_compromisso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contatos`
--
ALTER TABLE `contatos`
  MODIFY `id_contato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `compromissos`
--
ALTER TABLE `compromissos`
  ADD CONSTRAINT `id_compromissos_fk` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Limitadores para a tabela `contatos`
--
ALTER TABLE `contatos`
  ADD CONSTRAINT `id_contato_fk` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
