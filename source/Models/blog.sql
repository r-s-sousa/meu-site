-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 17/10/2021 às 18:04
-- Versão do servidor: 8.0.26-0ubuntu0.20.04.3
-- Versão do PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `blog`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `acessos`
--

CREATE TABLE `acessos` (
  `id` int NOT NULL,
  `ip` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Despejando dados para a tabela `acessos`
--

INSERT INTO `acessos` (`id`, `ip`) VALUES
(1, '::1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int NOT NULL,
  `categoria` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Despejando dados para a tabela `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`) VALUES
(37, '#corte-masculino2'),
(38, '#corte-feminino'),
(39, '#corte-infantil'),
(41, '#unha'),
(42, '#unha4'),
(44, '#unha3');

-- --------------------------------------------------------

--
-- Estrutura para tabela `mensagens`
--

CREATE TABLE `mensagens` (
  `id` int NOT NULL,
  `nome` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `mensagem` text NOT NULL,
  `email_send_at` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Despejando dados para a tabela `mensagens`
--

INSERT INTO `mensagens` (`id`, `nome`, `email`, `titulo`, `mensagem`, `email_send_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'rafael da silva sousa', 'rafael_sousa2018@outlook.com', 'assunto', 'mensagem', NULL, '2021-10-17 02:38:54', '2021-10-17 02:38:54', NULL),
(2, 'rafael da silva sousa', 'rafael_sousa2018@outlook.com', 'assunto', 'mensagem', NULL, '2021-10-17 02:39:40', '2021-10-17 02:39:40', NULL),
(3, 'rafael sousa', 'rafael_sousa2018@outlook.com', 'assunto', 'mensagem', NULL, '2021-10-17 02:41:19', '2021-10-17 02:41:19', NULL),
(4, 'rafael sousa', 'rafael_sousa2018@outlook.com', 'assunto', 'mensagem', NULL, '2021-10-17 02:42:58', '2021-10-17 02:42:58', NULL),
(5, 'rafael sousa', 'rafael_sousa2018@outlook.com', 'assunto', 'mensagem', NULL, '2021-10-17 02:43:04', '2021-10-17 02:43:04', NULL),
(6, 'rafael_sousa2018@outlook.com', 'rafael_sousa2018@outlook.com', 'assunto', 'mensagem', NULL, '2021-10-17 02:43:37', '2021-10-17 02:43:37', NULL),
(7, 'rafael_sousa2018@outlook.com', 'rafael_sousa2018@outlook.com', 'assunto', 'mensagem', NULL, '2021-10-17 02:43:41', '2021-10-17 02:43:41', NULL),
(8, 'rafael_sousa2018@outlook.com', 'rafael_sousa2018@outlook.com', 'assunto', 'mensagem', NULL, '2021-10-17 02:44:25', '2021-10-17 02:44:25', NULL),
(9, 'rafael_sousa2018@outlook.com', 'rafael_sousa2018@outlook.com', 'assunto', 'mensagem', NULL, '2021-10-17 02:44:54', '2021-10-17 02:44:54', NULL),
(10, 'rafael_sousa2018@outlook.com', 'rafael_sousa2018@outlook.com', 'assunto', 'mensagem', NULL, '2021-10-17 02:45:08', '2021-10-17 02:45:08', NULL),
(11, 'rafinhasousa2111@gmail.com', 'rafinhasousa2111@gmail.com', 'assunto', 'mensagem', NULL, '2021-10-17 02:45:39', '2021-10-17 02:45:39', NULL),
(12, 'Ana Clara', 'alclanaa5404@gmail.com', 'Mensagem pro meu mozão', 'Te amo!', NULL, '2021-10-17 03:00:49', '2021-10-17 03:00:49', NULL),
(13, 'Rafael', 'rafael_sousa2018@outlook.com', 'Assunto da mensagem', 'Minha mensagem aqui', NULL, '2021-10-17 11:55:01', '2021-10-17 11:55:01', NULL),
(14, 'Rafael Teste', 'teste@gmail.com', 'assunto', 'teste', NULL, '2021-10-17 11:56:14', '2021-10-17 11:56:14', NULL),
(15, 'Rafael', 'rafael_sousa2018@outlook.com', 'Teste', 'Mensagem', NULL, '2021-10-17 13:35:25', '2021-10-17 13:35:25', NULL),
(16, 'rafael', 'rafael_sousa2018@outlook.com', 'teste', 'teste.com', NULL, '2021-10-17 13:55:32', '2021-10-17 13:55:32', NULL),
(17, 'Rafael Teste', 'rafael_sousa2018@outlook.com', 'teste', 'teste', NULL, '2021-10-17 21:00:23', '2021-10-17 21:00:23', NULL),
(18, 'teste teste', 'teste@gmail.com', 'testessssssssssss', 'tesssssssssssssssstessssssssssss', NULL, '2021-10-17 21:01:16', '2021-10-17 21:01:16', NULL),
(19, 'rafael sousa', 'teste@gmail.com', 'testando assunto', 'testando mensagem', NULL, '2021-10-17 21:02:10', '2021-10-17 21:02:10', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `postagens`
--

CREATE TABLE `postagens` (
  `id` int NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `descricao` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `subtitulo` varchar(200) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `imgPath` varchar(200) NOT NULL,
  `dataPostagem` date NOT NULL,
  `visivel` int NOT NULL,
  `categorias` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Despejando dados para a tabela `postagens`
--

INSERT INTO `postagens` (`id`, `titulo`, `descricao`, `subtitulo`, `slug`, `imgPath`, `dataPostagem`, `visivel`, `categorias`, `created_at`, `updated_at`, `deleted_at`) VALUES
(22, 'Mapa mental', '&lt;h2&gt;&lt;span style=&quot;background-color:rgb(255,255,255);color:rgb(32,33,34);&quot;&gt;Os mapas mentais&lt;/span&gt;&lt;/h2&gt;&lt;p&gt;&lt;span style=&quot;background-color:rgb(255,255,255);color:rgb(32,33,34);&quot;&gt;&nbsp;procuram representar, com o m&aacute;ximo de detalhes poss&iacute;veis, o relacionamento conceitual existente entre informa&ccedil;&otilde;es que normalmente est&atilde;o fragmentadas, difusas e pulverizadas no ambiente operacional ou corporativo. Trata-se de uma ferramenta para ilustrar ideias e conceitos, dar-lhes forma e contexto, tra&ccedil;ar os relacionamentos de causa, efeito, simetria e/ou similaridade que existem entre elas e torn&aacute;-las mais palp&aacute;veis e mensur&aacute;veis, sobre os quais se possa planejar a&ccedil;&otilde;es e estrat&eacute;gias para alcan&ccedil;ar objetivos espec&iacute;ficos.&lt;/span&gt;&lt;/p&gt;', 'Beneficios do uso de mapas mentais', 'mapa-mental-3', 'ed3c2bce9c805070e15d5e47d0144c8a.png', '2021-10-17', 1, '[\"38\"]', '2021-10-17 03:24:43', '2021-10-17 12:33:01', NULL),
(23, 'mapa mental 2', '&lt;h2&gt;&lt;span style=&quot;background-color:rgb(255,255,255);color:rgb(32,33,34);&quot;&gt;Os mapas mentais&lt;/span&gt;&lt;/h2&gt;&lt;p&gt;&lt;span style=&quot;background-color:rgb(255,255,255);color:rgb(32,33,34);&quot;&gt;&nbsp;procuram representar, com o m&aacute;ximo de detalhes poss&iacute;veis, o relacionamento conceitual existente entre informa&ccedil;&otilde;es que normalmente est&atilde;o fragmentadas, difusas e pulverizadas no ambiente operacional ou corporativo. Trata-se de uma ferramenta para ilustrar ideias e conceitos, dar-lhes forma e contexto, tra&ccedil;ar os relacionamentos de causa, efeito, simetria e/ou similaridade que existem entre elas e torn&aacute;-las mais palp&aacute;veis e mensur&aacute;veis, sobre os quais se possa planejar a&ccedil;&otilde;es e estrat&eacute;gias para alcan&ccedil;ar objetivos espec&iacute;ficos.&lt;/span&gt;&lt;/p&gt;', 'aqui vera beneficios de usar mapas mentais', 'mapa-mental-2', 'd88779a8a4bd946a73ec333e0c9856db.png', '2021-10-17', 1, '[\"44\"]', '2021-10-17 03:27:44', '2021-10-17 03:27:57', NULL),
(24, 'titulo', '&lt;p&gt;teste&lt;/p&gt;', 'teste', 'teste', '4d0c10149f728efcc0ce4bb4c8edcbbb.png', '2021-10-17', 1, '[\"37\"]', '2021-10-17 12:52:52', '2021-10-17 12:52:52', NULL),
(25, 'titulo', '&lt;p&gt;teste2&lt;/p&gt;', 'teste', 'teste2', '5d9c1488ba4084322217c5e4e0f87dc6.png', '2021-10-17', 1, '[\"37\"]', '2021-10-17 12:53:26', '2021-10-17 12:53:26', NULL),
(26, 'teste', '&lt;p&gt;teste&lt;/p&gt;', 'teste2', 'teste22', '0974cd31ed7e1ddac59a186198f12c11.png', '2021-10-17', 1, '[\"37\"]', '2021-10-17 12:53:47', '2021-10-17 12:53:47', NULL),
(27, 'teste', '&lt;p&gt;teste3&lt;/p&gt;', 'teste', 'teste3', '32390fbd93e04348d0f066b3a40e736d.png', '2021-10-17', 1, '[\"37\"]', '2021-10-17 12:54:01', '2021-10-17 12:54:01', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int NOT NULL,
  `username` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `nome` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `token` varchar(100) NOT NULL,
  `verified_at` datetime DEFAULT NULL,
  `verifyCode` varchar(200) DEFAULT NULL,
  `emailenviado` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  `recovery` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `nome`, `email`, `password`, `token`, `verified_at`, `verifyCode`, `emailenviado`, `created_at`, `updated_at`, `deleted_at`, `recovery`) VALUES
(6, NULL, 'Rafael da Silva Sousa', 'rafael_sousa2018@outlook.com', '$2y$10$xvT1QxAHvQ/D7LGGSbRU8Or/b0jG3IqvRwRzHUiqaKCsWn.qF.RV6', '$2y$10$ipBsERoJsYkmevkybtFIDe1c9dJRq/VY8zODKGn38meP.jGL/iKde', NULL, NULL, NULL, '2021-10-15 21:09:33', '2021-10-16 00:09:26', NULL, NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `acessos`
--
ALTER TABLE `acessos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `mensagens`
--
ALTER TABLE `mensagens`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `postagens`
--
ALTER TABLE `postagens`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `acessos`
--
ALTER TABLE `acessos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de tabela `mensagens`
--
ALTER TABLE `mensagens`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `postagens`
--
ALTER TABLE `postagens`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
