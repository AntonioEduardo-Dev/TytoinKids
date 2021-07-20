-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21-Jul-2021 às 00:55
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `tytoin_kids`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nome_categoria` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nome_categoria`) VALUES
(1, 'Feminino'),
(2, 'Masculino'),
(3, 'Infantil'),
(4, 'Adulto 15 anos kk'),
(5, 'Aaa'),
(6, 'Ada '),
(7, 'Sasa'),
(8, 'Sasa'),
(9, 'S'),
(10, 'Ss'),
(11, 'Sa'),
(12, 'Salvar teste');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cor_produto`
--

CREATE TABLE `cor_produto` (
  `id_cor_produto` int(11) NOT NULL,
  `id_produto_fk` int(11) NOT NULL,
  `cor` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cor_produto`
--

INSERT INTO `cor_produto` (`id_cor_produto`, `id_produto_fk`, `cor`) VALUES
(1, 9, 'Azul'),
(2, 9, 'Amarelo'),
(3, 10, 'Vermelho'),
(4, 10, 'Amarelo'),
(5, 11, 'Azul'),
(6, 12, 'Vermelho');

-- --------------------------------------------------------

--
-- Estrutura da tabela `encomendas`
--

CREATE TABLE `encomendas` (
  `id_encomenda` int(11) NOT NULL,
  `id_produto_fk` int(11) NOT NULL,
  `id_cor_produto_fk` int(11) NOT NULL,
  `id_tamanho_produto_fk` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `data_hora` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `manutencao`
--

CREATE TABLE `manutencao` (
  `id_manutencao` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `manutencao`
--

INSERT INTO `manutencao` (`id_manutencao`, `status`) VALUES
(1, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id_produto` int(11) NOT NULL,
  `id_categoria_fk` int(11) NOT NULL,
  `nome_produto` varchar(30) DEFAULT NULL,
  `preco_produto` decimal(6,2) NOT NULL,
  `quatidade_disponivel` int(11) DEFAULT NULL,
  `imagem_produto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id_produto`, `id_categoria_fk`, `nome_produto`, `preco_produto`, `quatidade_disponivel`, `imagem_produto`) VALUES
(1, 1, 'Moranguinho', '17.00', 1, 'productind.jpg'),
(2, 2, 'Max Still', '39.00', 13, '1c8fd3222d8adb4db296603a0491fbb6.jpg'),
(3, 1, 'Dora', '25.00', 3, 'productind.jpg'),
(4, 3, 'Amarelinho', '27.00', 25, 'productind.jpg'),
(5, 1, 'Rottwells', '14.00', 33, 'productind.jpg'),
(7, 1, 'A', '2.00', 2, 'productind.jpg'),
(8, 2, 'Se 2', '2.00', 1, 'productind.jpg'),
(9, 2, 'Dragon zall b', '100.00', 5, 'productind.jpg'),
(10, 1, 'Baarbee', '180.00', 5, 'productind.jpg'),
(11, 3, 'Jackie chun', '20.00', 1, 'productind.jpg'),
(12, 2, 'Jacke', '22.00', 2, 'productind.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tamanho_produto`
--

CREATE TABLE `tamanho_produto` (
  `id_tamanho_produto` int(11) NOT NULL,
  `id_produto_fk` int(11) NOT NULL,
  `tamanho` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tamanho_produto`
--

INSERT INTO `tamanho_produto` (`id_tamanho_produto`, `id_produto_fk`, `tamanho`) VALUES
(1, 9, 'M'),
(2, 10, 'P'),
(3, 10, 'M'),
(4, 10, '1'),
(5, 12, 'P');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `senha` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `tipo_usuario` enum('admin','user') NOT NULL,
  `primeiro_acesso` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Índices para tabela `cor_produto`
--
ALTER TABLE `cor_produto`
  ADD PRIMARY KEY (`id_cor_produto`),
  ADD KEY `id_produto_fk` (`id_produto_fk`);

--
-- Índices para tabela `encomendas`
--
ALTER TABLE `encomendas`
  ADD PRIMARY KEY (`id_encomenda`),
  ADD KEY `id_produto_fk` (`id_produto_fk`),
  ADD KEY `id_cor_produto_fk` (`id_cor_produto_fk`),
  ADD KEY `id_tamanho_produto_fk` (`id_tamanho_produto_fk`);

--
-- Índices para tabela `manutencao`
--
ALTER TABLE `manutencao`
  ADD PRIMARY KEY (`id_manutencao`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id_produto`),
  ADD KEY `id_produto_fk` (`id_categoria_fk`) USING BTREE;

--
-- Índices para tabela `tamanho_produto`
--
ALTER TABLE `tamanho_produto`
  ADD PRIMARY KEY (`id_tamanho_produto`),
  ADD KEY `id_produto_fk` (`id_produto_fk`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `cor_produto`
--
ALTER TABLE `cor_produto`
  MODIFY `id_cor_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `encomendas`
--
ALTER TABLE `encomendas`
  MODIFY `id_encomenda` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `manutencao`
--
ALTER TABLE `manutencao`
  MODIFY `id_manutencao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `tamanho_produto`
--
ALTER TABLE `tamanho_produto`
  MODIFY `id_tamanho_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `cor_produto`
--
ALTER TABLE `cor_produto`
  ADD CONSTRAINT `cor_produto_ibfk_1` FOREIGN KEY (`id_produto_fk`) REFERENCES `produtos` (`id_produto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `encomendas`
--
ALTER TABLE `encomendas`
  ADD CONSTRAINT `encomendas_ibfk_1` FOREIGN KEY (`id_cor_produto_fk`) REFERENCES `cor_produto` (`id_cor_produto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `encomendas_ibfk_2` FOREIGN KEY (`id_tamanho_produto_fk`) REFERENCES `tamanho_produto` (`id_tamanho_produto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `encomendas_ibfk_3` FOREIGN KEY (`id_produto_fk`) REFERENCES `produtos` (`id_produto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `id_categoria_fk` FOREIGN KEY (`id_categoria_fk`) REFERENCES `categorias` (`id_categoria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `tamanho_produto`
--
ALTER TABLE `tamanho_produto`
  ADD CONSTRAINT `tamanho_produto_ibfk_1` FOREIGN KEY (`id_produto_fk`) REFERENCES `produtos` (`id_produto`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
