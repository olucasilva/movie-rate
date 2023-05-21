-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 21-Maio-2023 às 03:09
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `movierate`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `avalia`
--

CREATE TABLE `avalia` (
  `id` int(11) NOT NULL,
  `id_filme` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `nota` float DEFAULT NULL,
  `comentario` varchar(500) DEFAULT NULL,
  `datac` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `avalia`
--

INSERT INTO `avalia` (`id`, `id_filme`, `id_usuario`, `nota`, `comentario`, `datac`) VALUES
(2, 245913, 2, 4, 'Descreve bem a história do jogador!', '2023-05-21');

-- --------------------------------------------------------

--
-- Estrutura da tabela `filmes`
--

CREATE TABLE `filmes` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `descricao` varchar(1000) DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `datac` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `filmes`
--

INSERT INTO `filmes` (`id`, `titulo`, `descricao`, `imagem`, `datac`) VALUES
(245913, 'Pelé: O Nascimento de uma Lenda', 'Com apenas 17 anos, Pelé, o maior jogador de futebol de todos os tempos, conduz o Brasil na campanha do título da Copa do Mundo de 1958.', '/2MPFN2TjGo7Q6ThSTmvOXF18Vbh.jpg', '2016-05-06'),
(640146, 'Homem-Formiga e a Vespa: Quantumania', 'Scott Lang e Hope van Dyne em suas jornadas como super-heróis. Scott e sua família são puxados para o Reino Quântico, onde eles precisarão enfrentar um novo e terrível vilão: Kang, o Conquistador e M.O.D.O.K..', '/pDNT1gXhZEV1V70eCVmJAQNEqBl.jpg', '2023-02-15');

-- --------------------------------------------------------

--
-- Estrutura da tabela `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `id_filme` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `datac` date DEFAULT NULL,
  `texto` varchar(5000) DEFAULT NULL,
  `favorito` int(11) DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `tipo` varchar(255) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `data_de_nascimento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `tipo`, `nome`, `email`, `senha`, `data_de_nascimento`) VALUES
(1, '0', 'admin', 'admin@admin.com', 'admin', '2001-03-19'),
(2, '1', 'user1', 'user1@bol.com', 'user1', '1998-07-24'),
(3, '1', 'user2', 'user2@bol.com', 'user2', '2003-06-11');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `avalia`
--
ALTER TABLE `avalia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_id_usuario_avalia` (`id_usuario`),
  ADD KEY `FK_id_filme_avalia` (`id_filme`);

--
-- Índices para tabela `filmes`
--
ALTER TABLE `filmes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_id_usuario_post` (`id_usuario`),
  ADD KEY `FK_id_filme_post` (`id_filme`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `avalia`
--
ALTER TABLE `avalia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `avalia`
--
ALTER TABLE `avalia`
  ADD CONSTRAINT `FK_id_filme_avalia` FOREIGN KEY (`id_filme`) REFERENCES `filmes` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `FK_id_usuario_avalia` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE SET NULL;

--
-- Limitadores para a tabela `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `FK_id_filme_post` FOREIGN KEY (`id_filme`) REFERENCES `filmes` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `FK_id_usuario_post` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
