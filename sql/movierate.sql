-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15-Maio-2023 às 21:02
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.0.15

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

-- --------------------------------------------------------

--
-- Estrutura da tabela `filmes`
--

CREATE TABLE `filmes` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `descricao` varchar(1000) DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `datac` date DEFAULT NULL,
  `duracao` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `filmes`
--

INSERT INTO `filmes` (`id`, `titulo`, `descricao`, `imagem`, `datac`, `duracao`) VALUES
(238, 'O Poderoso Chefão', 'Em 1945, Don Corleone é o chefe de uma mafiosa família italiana de Nova York. Ele costuma apadrinhar várias pessoas, realizando importantes favores para elas, em troca de favores futuros. Com a chegada das drogas, as famílias começam uma disputa pelo promissor mercado. Quando Corleone se recusa a facilitar a entrada dos narcóticos na cidade, não oferecendo ajuda política e policial, sua família começa a sofrer atentados para que mudem de posição. É nessa complicada época que Michael, um herói de guerra nunca envolvido nos negócios da família, vê a necessidade de proteger o seu pai e tudo o que ele construiu ao longo dos anos.', '/oJagOzBu9Rdd9BrciseCm3U3MCU.jpg', '2000-10-01', NULL);

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

--
-- Extraindo dados da tabela `post`
--

INSERT INTO `post` (`id`, `id_filme`, `id_usuario`, `datac`, `texto`, `favorito`, `titulo`, `imagem`) VALUES
(1, 238, 1, '2023-05-15', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet id modi optio mollitia odit, voluptas dignissimos possimus labore praesentium quisquam sit quam. At consequuntur nam assumenda, aspernatur nihil est illo?Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet id modi optio mollitia odit, voluptas dignissimos possimus labore praesentium quisquam sit quam. \r\nAt consequuntur nam assumenda, aspernatur nihil est illo?Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet id modi optio mollitia odit, voluptas dignissimos possimus labore praesentium quisquam sit quam. At consequuntur nam assumenda, aspernatur nihil est illo?Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet id modi optio mollitia odit, voluptas dignissimos possimus labore praesentium quisquam sit quam. At consequuntur nam assumenda, aspernatur nihil est illo?Lorem ipsum dolor sit amet consectetur adipisicing elit.\r\nEveniet id modi optio mollitia odit, voluptas dignissimos possimus labore praesentium quisquam sit quam. At consequuntur nam assumenda, aspernatur nihil est illo?', NULL, 'Lorem ipsum', 'lorem.png');

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
(1, '0', 'admin', 'admin@admin.com', 'admin', '2001-03-19');

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
