-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 15-Mar-2021 às 23:27
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tkdikarograciano`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `academias`
--

CREATE TABLE `academias` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `academias`
--

INSERT INTO `academias` (`id`, `nome`, `created_at`, `updated_at`) VALUES
(1, 'Ikaro Graciano Taekwondo Team', '2019-03-11 21:06:57', '2019-03-13 20:22:06'),
(2, 'EMATKD', '2019-03-15 20:15:42', '2019-03-15 20:15:42'),
(3, 'ASTF - Associação de Taekwondo do Sul Fluminense', '2019-03-21 01:01:48', '2019-03-21 01:01:48'),
(4, 'TEAM ESPINOSA TKD', '2019-03-21 20:03:43', '2019-03-21 20:03:43'),
(5, 'Silva Fighter Team', '2019-03-25 20:02:54', '2019-03-25 20:02:54'),
(6, 'Tiago Marques Team', '2019-03-25 20:06:32', '2019-03-25 20:06:32'),
(7, 'Associação de Taekwondo Cidade do Aço', '2019-03-29 19:57:37', '2019-03-30 03:39:42');

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos`
--

CREATE TABLE `alunos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nascimento` date NOT NULL,
  `sexo` enum('masculino','feminino') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagem` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rg` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cpf` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cep` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rua` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complemento` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bairro` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cidade` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uf` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ibge` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `celular` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `alunos`
--

INSERT INTO `alunos` (`id`, `nome`, `nascimento`, `sexo`, `imagem`, `rg`, `cpf`, `cep`, `rua`, `numero`, `complemento`, `bairro`, `cidade`, `uf`, `ibge`, `telefone`, `celular`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Hugo Ferreira Chiesse', '1980-12-31', NULL, 'img/aluno/_img_60067.jpeg', '3213213232132', '231.213.231-32', '27343-050', 'Rua Hipólito da Costa', '380', 'apto 101', 'Monte Cristo', 'Volta Redonda', 'RJ', '3300407', '(24) 3322-5247', '(24) 9 9902-5956', 'hugochiesse@gmail.com', '2019-03-28 18:06:24', '2019-03-28 18:06:24'),
(2, 'Yuri Gonçalves Chiesse', '2000-02-20', NULL, NULL, '22222222222', '222.222.222-22', '27343-050', 'Rua Guilherme Marcondes', '380', 'apto 101', 'Monte Cristo', 'Barra Mansa', 'RJ', '3300407', '(24) 3322-5247', '(24) 9 9843-2180', 'yuri_chiesse@hotmail.com', '2019-04-04 15:33:39', '2019-04-04 15:33:39');

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunosturmas`
--

CREATE TABLE `alunosturmas` (
  `id` int(10) UNSIGNED NOT NULL,
  `turma_id` int(10) UNSIGNED NOT NULL,
  `aluno_id` int(10) UNSIGNED NOT NULL,
  `bloqueado` enum('sim','não') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'não',
  `motivoBloqueio` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `alunosturmas`
--

INSERT INTO `alunosturmas` (`id`, `turma_id`, `aluno_id`, `bloqueado`, `motivoBloqueio`, `created_at`, `updated_at`) VALUES
(3, 1, 1, 'não', '', '2019-04-03 23:21:29', '2019-04-03 23:22:11'),
(4, 2, 1, 'não', NULL, '2019-04-10 16:47:21', '2019-04-10 16:47:21'),
(5, 1, 2, 'não', NULL, '2019-04-11 18:18:24', '2019-04-11 18:18:24'),
(8, 2, 2, 'não', NULL, '2019-04-24 17:01:38', '2019-04-24 17:01:38');

-- --------------------------------------------------------

--
-- Estrutura da tabela `artemarcials`
--

CREATE TABLE `artemarcials` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `artemarcials`
--

INSERT INTO `artemarcials` (`id`, `nome`, `created_at`, `updated_at`) VALUES
(1, 'Taekwondo', '2019-03-11 20:52:59', '2019-03-11 20:52:59');

-- --------------------------------------------------------

--
-- Estrutura da tabela `atividades`
--

CREATE TABLE `atividades` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `atividades`
--

INSERT INTO `atividades` (`id`, `nome`, `created_at`, `updated_at`) VALUES
(1, 'Taekwondo', '2019-03-27 15:39:41', '2019-03-27 15:39:41'),
(2, 'Krav Maga', '2019-03-27 15:40:23', '2019-03-27 15:40:23');

-- --------------------------------------------------------

--
-- Estrutura da tabela `atletas`
--

CREATE TABLE `atletas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nascimento` date NOT NULL,
  `sexo` enum('masculino','feminino') COLLATE utf8mb4_unicode_ci NOT NULL,
  `peso` decimal(8,2) NOT NULL,
  `imagem` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rg` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cpf` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cep` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rua` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complemento` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bairro` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cidade` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uf` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ibge` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `celular` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `artemarcial_id` int(10) UNSIGNED NOT NULL,
  `graduacao_id` int(10) UNSIGNED NOT NULL,
  `academia_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `atletas`
--

INSERT INTO `atletas` (`id`, `nome`, `nascimento`, `sexo`, `peso`, `imagem`, `rg`, `cpf`, `cep`, `rua`, `numero`, `complemento`, `bairro`, `cidade`, `uf`, `ibge`, `telefone`, `celular`, `email`, `artemarcial_id`, `graduacao_id`, `academia_id`, `created_at`, `updated_at`) VALUES
(1, 'Hugo Ferreira Chiesse', '1980-12-31', 'masculino', '92.50', 'img/atleta/_img_16539.jpeg', '111111111 DETRAN RJ', '111.111.111-11', '27343-050', 'Rua Guilherme Marcondes', '380', 'apto 101', 'Monte Cristo', 'Barra Mansa', 'RJ', NULL, '(24) 3322-5247', '(24) 9 9902-5956', 'hugochiesse@gmail.com', 1, 9, 1, '2019-03-11 21:14:39', '2020-03-09 14:11:24'),
(2, 'Yuri Gonçalves Chiesse', '2000-02-20', 'masculino', '64.00', NULL, '3213213232132', '231.213.231-32', '27343-050', 'Rua Guilherme Marcondes', '380', 'apto 101', 'Monte Cristo', 'Barra Mansa', 'RJ', NULL, '(24) 3322-5247', '(24) 9 9843-2180', 'yuri_chiesse@hotmail.com', 1, 4, 1, '2019-03-11 21:15:17', '2020-03-09 14:11:40'),
(6, 'Paula Cristina Xavier Fernandes', '2009-09-26', 'feminino', '30.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 6, 1, '2019-03-13 16:37:26', '2020-03-09 14:11:53'),
(7, 'André Luís Alcântara Filho', '2002-05-31', 'masculino', '65.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 11, 1, '2019-03-13 16:48:26', '2019-03-15 15:23:41'),
(8, 'José Paulo Koenigkam Soares', '2001-12-19', 'masculino', '66.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 11, 1, '2019-03-13 16:48:58', '2019-03-13 16:48:58'),
(9, 'Gabriel Ortega Gonçalves Silva', '2000-07-10', 'masculino', '68.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 11, 1, '2019-03-13 20:28:29', '2019-03-13 20:28:29'),
(10, 'Francisrulio Avelino Freitas', '1983-03-30', 'masculino', '79.80', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 6, 1, '2019-03-13 20:28:58', '2020-03-18 05:47:04'),
(11, 'Vicente Euzébio da Silva Neto', '2002-03-25', 'masculino', '72.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 11, 1, '2019-03-14 23:33:05', '2020-03-09 14:12:14'),
(12, 'Kaique Amorim França', '2008-08-05', 'masculino', '57.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, 1, '2019-03-14 23:33:48', '2019-03-30 03:08:24'),
(13, 'Gilcimar dos Santo Barreto', '2000-02-08', 'masculino', '70.20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, 1, '2019-03-15 15:16:18', '2019-03-15 15:16:18'),
(14, 'Manoela Rodrigues Ignácio', '2003-05-03', 'feminino', '58.60', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 7, 1, '2019-03-15 15:16:52', '2019-03-15 15:16:52'),
(15, 'Mayra dos Santos Gonçalves', '2006-11-21', 'feminino', '49.60', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 7, 1, '2019-03-15 15:17:34', '2019-03-15 15:17:34'),
(16, 'Artur Vieira', '2001-08-18', 'masculino', '58.60', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 5, 1, '2019-03-15 15:17:59', '2019-03-15 15:17:59'),
(17, 'Marcos Vinícios França dos Santos', '2004-11-09', 'masculino', '50.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 8, 1, '2019-03-15 15:19:12', '2019-03-15 15:19:12'),
(18, 'Guilherme Viana Diniz', '2007-06-12', 'masculino', '41.80', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, 1, '2019-03-15 15:23:23', '2019-03-15 15:23:23'),
(19, 'Pedro Henrique Dos Santos', '2004-05-10', 'masculino', '50.55', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 9, 1, '2019-03-15 15:26:58', '2020-03-18 04:21:17'),
(20, 'Bernardo dos Santos', '2004-01-01', 'masculino', '55.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 7, 2, '2019-03-15 20:17:31', '2019-03-15 20:17:44'),
(21, 'Julio Nayron Rocha', '2004-01-01', 'masculino', '59.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 7, 2, '2019-03-15 20:18:33', '2019-03-15 20:18:33'),
(22, 'Roger Luiz dos Santos', '2003-01-01', 'masculino', '51.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 7, 2, '2019-03-15 20:19:18', '2019-03-15 20:19:18'),
(23, 'Rodrigo Pereira da Veiga', '1985-11-01', 'masculino', '65.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 7, 1, '2019-03-16 21:37:29', '2019-03-16 21:37:29'),
(24, 'Geovanna Beatriz da Silva Ribeiro', '2003-07-16', 'feminino', '59.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 5, 1, '2019-03-16 21:42:15', '2019-03-30 03:46:24'),
(25, 'Gabriella Cristine da Silva Ribeiro', '1998-06-16', 'feminino', '53.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 11, 1, '2019-03-16 21:42:43', '2020-03-18 04:35:52'),
(26, 'Clelvis Marcelino Sant’Anna da Silva', '1991-01-01', 'masculino', '50.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 5, 1, '2019-03-18 17:15:19', '2019-03-18 17:15:19'),
(27, 'Sofia Figueiredo Santos', '2008-01-01', 'feminino', '50.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 4, 1, '2019-03-18 17:15:50', '2019-03-18 17:15:50'),
(28, 'Helena Cardoso Estrela Baptista', '2009-01-01', 'feminino', '50.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 5, 1, '2019-03-18 17:16:19', '2019-03-18 17:16:19'),
(29, 'Vinícius Ricci Pimentel Tavares', '1998-01-01', 'masculino', '120.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 5, 1, '2019-03-18 18:36:52', '2019-03-18 18:36:52'),
(30, 'Marcelo Ferreira Woczinski', '1999-01-01', 'masculino', '61.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 6, 1, '2019-03-18 18:37:37', '2019-03-18 18:37:37'),
(31, 'Eric de Freitas Tavares', '2002-01-01', 'masculino', '94.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 8, 1, '2019-03-19 01:47:12', '2019-03-19 01:47:12'),
(32, 'Breno Salgado Imbiriba', '2006-01-01', 'masculino', '45.50', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 10, 1, '2019-03-19 01:48:06', '2019-03-19 01:48:06'),
(33, 'Pedro Henrique de Morais', '2013-05-19', 'masculino', '18.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, 1, '2019-03-19 15:00:04', '2019-03-19 15:05:55'),
(34, 'Rodrigo Macedo', '1975-01-01', 'masculino', '84.50', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, 1, '2019-03-20 20:44:33', '2019-03-20 20:44:33'),
(35, 'Luana Paiva Macedo', '2005-01-01', 'feminino', '47.70', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, 1, '2019-03-20 20:45:19', '2019-03-20 20:45:19'),
(36, 'Hugo Paiva Macedo', '2010-01-01', 'masculino', '28.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 4, 1, '2019-03-20 20:46:22', '2019-03-30 03:31:54'),
(37, 'Davi Silvano de Oliveira', '2009-02-11', 'masculino', '42.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, 3, '2019-03-21 01:02:16', '2019-03-21 01:02:16'),
(38, 'Josué Souza Silva', '2007-07-24', 'masculino', '38.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 4, 3, '2019-03-21 01:02:47', '2019-03-21 01:30:40'),
(39, 'Lucas José de Campos Basílio', '2005-03-23', 'masculino', '40.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 5, 3, '2019-03-21 01:03:29', '2019-03-21 01:03:29'),
(40, 'João Miguel Ferreira Rocha', '2006-10-06', 'masculino', '31.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 6, 3, '2019-03-21 01:04:08', '2019-03-21 01:04:08'),
(41, 'Ana Clara Lopes Ferreira Soares', '2007-05-29', 'feminino', '42.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, 3, '2019-03-21 01:04:55', '2019-03-21 01:04:55'),
(42, 'Evellyn de Oliveira', '2008-09-29', 'feminino', '26.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 4, 3, '2019-03-21 01:05:19', '2019-03-21 01:42:52'),
(43, 'Luis Gustavo Izidoro', '2004-01-01', 'masculino', '110.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 5, 3, '2019-03-21 16:26:11', '2019-03-21 16:45:04'),
(44, 'Eduardo Ramon', '2004-01-01', 'masculino', '73.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 4, 3, '2019-03-21 16:27:57', '2019-03-21 16:28:13'),
(45, 'Myllena Magno', '2005-04-18', 'feminino', '55.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 11, 4, '2019-03-21 20:04:17', '2019-03-21 21:27:27'),
(46, 'Alana Caroliny Venâncio da Silva Santos', '2005-11-25', 'feminino', '55.10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, '2019-03-22 19:34:58', '2019-03-25 14:52:53'),
(47, 'Marlon Brendo Barbosa Coutinho', '2001-01-01', 'masculino', '68.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, 1, '2019-03-25 14:50:51', '2019-03-25 14:50:51'),
(48, 'Luiz Fernando Acha Filho', '2002-07-15', 'masculino', '58.90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 8, 1, '2019-03-25 14:52:14', '2019-03-25 14:52:14'),
(49, 'Luiz Alberto Pereira Neto', '2004-08-30', 'masculino', '48.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 10, 1, '2019-03-25 14:53:34', '2019-03-25 14:53:34'),
(50, 'Julio Cesar', '1988-01-01', 'masculino', '61.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 11, 5, '2019-03-25 20:03:57', '2019-03-25 20:03:57'),
(51, 'Rovany Simões', '1997-01-01', 'masculino', '86.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 10, 5, '2019-03-25 20:04:57', '2019-03-25 20:04:57'),
(52, 'Julya Carolina', '1997-01-01', 'feminino', '56.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 10, 5, '2019-03-25 20:05:29', '2019-03-25 20:05:29'),
(53, 'Lucas Moura', '2003-01-01', 'masculino', '57.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 11, 5, '2019-03-25 20:06:09', '2019-03-25 20:06:09'),
(54, 'Ana Clara Teixeira de Oliveira', '2012-05-07', 'feminino', '24.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, 6, '2019-03-25 20:07:08', '2019-03-25 20:07:08'),
(55, 'Arthur de Oliveira Evaristo', '2012-10-25', 'masculino', '21.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, 6, '2019-03-25 20:07:44', '2019-03-25 20:09:08'),
(56, 'João Carlos Dornelas Moreira da Silva', '2010-03-23', 'masculino', '39.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, 6, '2019-03-25 20:08:25', '2019-03-28 15:49:25'),
(57, 'Kelson Eduardo Araújo Neto', '2012-08-28', 'masculino', '28.40', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, 6, '2019-03-25 20:09:44', '2019-03-25 20:09:44'),
(58, 'Isaque de Souza Siqueira', '2013-03-29', 'masculino', '23.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, 6, '2019-03-25 20:10:20', '2019-03-25 20:10:20'),
(59, 'Pedro Lucas Almeida de Souza', '2009-05-15', 'masculino', '36.70', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, 6, '2019-03-25 20:10:47', '2019-03-25 20:10:47'),
(60, 'Victor Cesar Moreira Ferreira', '2009-08-03', 'masculino', '30.10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 6, '2019-03-25 20:11:24', '2019-03-25 20:11:24'),
(61, 'Marcio Henrique Lira do Nascimento', '2003-01-09', 'masculino', '52.30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 6, '2019-03-25 20:12:00', '2019-03-25 20:12:00'),
(63, 'Teste da Silva', '1980-01-01', 'masculino', '90.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 7, 1, '2019-03-26 17:20:55', '2019-03-26 17:20:55'),
(64, 'João Gabriel Santana Araújo', '2009-07-26', 'masculino', '30.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 6, '2019-03-26 21:49:16', '2019-03-26 21:49:16'),
(65, 'Braian Catheringer', '2000-01-01', 'masculino', '72.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 10, 6, '2019-03-26 21:49:46', '2019-03-26 21:49:46'),
(66, 'Davi Rodolfo Gatti', '2010-01-01', 'masculino', '35.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 6, '2019-03-26 21:51:15', '2019-03-26 21:51:15'),
(67, 'Yan Loureiro Santos', '2000-09-19', 'masculino', '73.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 11, 1, '2019-03-28 15:54:48', '2019-03-28 15:54:48'),
(68, 'Márcio Modesto Rodrigues Júnior', '2005-01-01', 'masculino', '49.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 11, 7, '2019-03-29 19:58:56', '2019-03-29 19:58:56'),
(69, 'Andre Ribeiro Nunes Pandelot', '2000-01-01', 'masculino', '62.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 11, 7, '2019-03-29 19:59:23', '2019-03-29 19:59:23'),
(70, 'João Pedro Yamaguti da Silva', '2005-01-01', 'masculino', '45.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 11, 7, '2019-03-29 19:59:55', '2019-03-29 19:59:55'),
(71, 'Eduardo de Castro Pontes', '2000-01-01', 'masculino', '68.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 6, 7, '2019-03-29 20:00:30', '2019-03-29 20:00:30'),
(72, 'Sarah Cardin Pereira', '2008-01-01', 'feminino', '34.80', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 6, 7, '2019-03-29 20:01:35', '2019-03-29 20:01:35'),
(73, 'Renato Marins de Souza Oliveira', '2010-01-01', 'masculino', '28.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, 7, '2019-03-29 20:02:34', '2019-03-29 20:07:42'),
(74, 'Matheus Freitas da Silva', '2009-01-01', 'masculino', '53.50', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, 7, '2019-03-29 20:04:00', '2019-03-29 20:04:00'),
(75, 'Robert Rocha Melo', '2008-01-01', 'masculino', '37.60', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 7, 7, '2019-03-29 20:04:27', '2019-03-29 20:04:27'),
(76, 'Wanderson Carlos de Paula Santos', '1989-01-01', 'masculino', '73.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 11, 7, '2019-03-29 20:05:20', '2019-03-29 20:05:20'),
(77, 'Luca Rodrigues Dalboni', '2011-01-01', 'masculino', '29.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 5, 7, '2019-03-29 20:06:08', '2019-03-29 20:06:08'),
(78, 'Débora Gonçalves S A Duque', '2012-01-01', 'feminino', '28.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 6, 7, '2019-03-30 03:15:08', '2019-03-30 03:15:37'),
(79, 'Mariana Oliveira da cruz', '2003-08-01', 'feminino', '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 4, 1, '2020-03-17 18:34:53', '2020-03-17 18:34:53'),
(80, 'Gabriel Diogo', '2009-06-01', 'masculino', '75.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 8, 1, '2020-03-18 04:19:25', '2020-03-18 04:19:25');

-- --------------------------------------------------------

--
-- Estrutura da tabela `campeonatos`
--

CREATE TABLE `campeonatos` (
  `id` int(10) UNSIGNED NOT NULL,
  `artemarcial_id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diaCampeonato` date NOT NULL,
  `statusCampeonato` enum('aberto','fechado') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'aberto',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `campeonatos`
--

INSERT INTO `campeonatos` (`id`, `artemarcial_id`, `nome`, `diaCampeonato`, `statusCampeonato`, `created_at`, `updated_at`) VALUES
(1, 1, 'GP VR DE TAEKWONDO 2019', '2019-03-31', 'fechado', '2019-03-11 21:18:32', '2020-03-09 14:10:25'),
(2, 1, 'GP VR DE TAEKWONDO 2020', '2020-03-29', 'aberto', '2020-03-09 14:10:01', '2020-03-09 14:10:01');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(10) UNSIGNED NOT NULL,
  `artemarcial_id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexo` enum('masculino','feminino') COLLATE utf8mb4_unicode_ci NOT NULL,
  `menorPeso` decimal(8,2) NOT NULL,
  `maiorPeso` decimal(8,2) NOT NULL,
  `graduacaoMenor` int(11) NOT NULL,
  `graduacaoMaior` int(11) NOT NULL,
  `idadeMenor` int(11) NOT NULL,
  `idadeMaior` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `artemarcial_id`, `nome`, `sexo`, `menorPeso`, `maiorPeso`, `graduacaoMenor`, `graduacaoMaior`, `idadeMenor`, `idadeMaior`, `created_at`, `updated_at`) VALUES
(1, 1, 'Especial', 'masculino', '0.00', '22.00', 10, 10, 5, 6, '2019-03-11 20:53:20', '2019-03-11 20:53:20'),
(2, 1, 'Especial', 'masculino', '22.01', '24.00', 10, 10, 5, 6, '2019-03-11 20:53:20', '2019-03-11 20:53:20'),
(3, 1, 'Especial', 'masculino', '24.01', '26.00', 10, 10, 5, 6, '2019-03-11 20:53:20', '2019-03-11 20:53:20'),
(4, 1, 'Especial', 'masculino', '26.01', '28.00', 10, 10, 5, 6, '2019-03-11 20:53:20', '2019-03-11 20:53:20'),
(5, 1, 'Especial', 'masculino', '28.01', '30.00', 10, 10, 5, 6, '2019-03-11 20:53:20', '2019-03-11 20:53:20'),
(6, 1, 'Especial', 'masculino', '30.01', '32.00', 10, 10, 5, 6, '2019-03-11 20:53:20', '2019-03-11 20:53:20'),
(7, 1, 'Especial', 'masculino', '32.01', '34.00', 10, 10, 5, 6, '2019-03-11 20:53:20', '2019-03-11 20:53:20'),
(8, 1, 'Especial', 'masculino', '34.01', '36.00', 10, 10, 5, 6, '2019-03-11 20:53:20', '2019-03-11 20:53:20'),
(9, 1, 'Especial', 'masculino', '36.01', '38.00', 10, 10, 5, 6, '2019-03-11 20:53:20', '2019-03-11 20:53:20'),
(10, 1, 'Especial', 'masculino', '38.01', '500.00', 10, 10, 5, 6, '2019-03-11 20:53:20', '2019-03-11 20:53:20'),
(11, 1, 'Especial', 'feminino', '0.00', '22.00', 10, 10, 5, 6, '2019-03-11 20:53:20', '2019-03-11 20:53:20'),
(12, 1, 'Especial', 'feminino', '22.01', '24.00', 10, 10, 5, 6, '2019-03-11 20:53:20', '2019-03-11 20:53:20'),
(13, 1, 'Especial', 'feminino', '24.01', '26.00', 10, 10, 5, 6, '2019-03-11 20:53:20', '2019-03-11 20:53:20'),
(14, 1, 'Especial', 'feminino', '26.01', '28.00', 10, 10, 5, 6, '2019-03-11 20:53:20', '2019-03-11 20:53:20'),
(15, 1, 'Especial', 'feminino', '28.01', '30.00', 10, 10, 5, 6, '2019-03-11 20:53:20', '2019-03-11 20:53:20'),
(16, 1, 'Especial', 'feminino', '30.01', '32.00', 10, 10, 5, 6, '2019-03-11 20:53:20', '2019-03-11 20:53:20'),
(17, 1, 'Especial', 'feminino', '32.01', '34.00', 10, 10, 5, 6, '2019-03-11 20:53:20', '2019-03-11 20:53:20'),
(18, 1, 'Especial', 'feminino', '34.01', '36.00', 10, 10, 5, 6, '2019-03-11 20:53:20', '2019-03-11 20:53:20'),
(19, 1, 'Especial', 'feminino', '36.01', '38.00', 10, 10, 5, 6, '2019-03-11 20:53:20', '2019-03-11 20:53:20'),
(20, 1, 'Especial', 'feminino', '38.01', '500.00', 10, 10, 5, 6, '2019-03-11 20:53:20', '2019-03-11 20:53:20'),
(21, 1, 'Especial', 'masculino', '0.00', '22.00', 8, 6, 5, 6, '2019-03-11 20:53:20', '2019-03-11 20:53:20'),
(22, 1, 'Especial', 'masculino', '22.01', '24.00', 8, 6, 5, 6, '2019-03-11 20:53:20', '2019-03-11 20:53:20'),
(23, 1, 'Especial', 'masculino', '24.01', '26.00', 8, 6, 5, 6, '2019-03-11 20:53:20', '2019-03-11 20:53:20'),
(24, 1, 'Especial', 'masculino', '26.01', '28.00', 8, 6, 5, 6, '2019-03-11 20:53:20', '2019-03-11 20:53:20'),
(25, 1, 'Especial', 'masculino', '28.01', '30.00', 8, 6, 5, 6, '2019-03-11 20:53:20', '2019-03-11 20:53:20'),
(26, 1, 'Especial', 'masculino', '30.01', '32.00', 8, 6, 5, 6, '2019-03-11 20:53:20', '2019-03-11 20:53:20'),
(27, 1, 'Especial', 'masculino', '32.01', '34.00', 8, 6, 5, 6, '2019-03-11 20:53:21', '2019-03-11 20:53:21'),
(28, 1, 'Especial', 'masculino', '34.01', '36.00', 8, 6, 5, 6, '2019-03-11 20:53:21', '2019-03-11 20:53:21'),
(29, 1, 'Especial', 'masculino', '36.01', '38.00', 8, 6, 5, 6, '2019-03-11 20:53:21', '2019-03-11 20:53:21'),
(30, 1, 'Especial', 'masculino', '38.01', '500.00', 8, 6, 5, 6, '2019-03-11 20:53:21', '2019-03-11 20:53:21'),
(31, 1, 'Especial', 'feminino', '0.00', '22.00', 8, 6, 5, 6, '2019-03-11 20:53:21', '2019-03-11 20:53:21'),
(32, 1, 'Especial', 'feminino', '22.01', '24.00', 8, 6, 5, 6, '2019-03-11 20:53:21', '2019-03-11 20:53:21'),
(33, 1, 'Especial', 'feminino', '24.01', '26.00', 8, 6, 5, 6, '2019-03-11 20:53:21', '2019-03-11 20:53:21'),
(34, 1, 'Especial', 'feminino', '26.01', '28.00', 8, 6, 5, 6, '2019-03-11 20:53:21', '2019-03-11 20:53:21'),
(35, 1, 'Especial', 'feminino', '28.01', '30.00', 8, 6, 5, 6, '2019-03-11 20:53:21', '2019-03-11 20:53:21'),
(36, 1, 'Especial', 'feminino', '30.01', '32.00', 8, 6, 5, 6, '2019-03-11 20:53:21', '2019-03-11 20:53:21'),
(37, 1, 'Especial', 'feminino', '32.01', '34.00', 8, 6, 5, 6, '2019-03-11 20:53:21', '2019-03-11 20:53:21'),
(38, 1, 'Especial', 'feminino', '34.01', '36.00', 8, 6, 5, 6, '2019-03-11 20:53:21', '2019-03-11 20:53:21'),
(39, 1, 'Especial', 'feminino', '36.01', '38.00', 8, 6, 5, 6, '2019-03-11 20:53:21', '2019-03-11 20:53:21'),
(40, 1, 'Especial', 'feminino', '38.01', '500.00', 8, 6, 5, 6, '2019-03-11 20:53:21', '2019-03-11 20:53:21'),
(41, 1, 'Especial', 'masculino', '0.00', '22.00', 5, 3, 5, 6, '2019-03-11 20:53:21', '2019-03-11 20:53:21'),
(42, 1, 'Especial', 'masculino', '22.01', '24.00', 5, 3, 5, 6, '2019-03-11 20:53:21', '2019-03-11 20:53:21'),
(43, 1, 'Especial', 'masculino', '24.01', '26.00', 5, 3, 5, 6, '2019-03-11 20:53:21', '2019-03-11 20:53:21'),
(44, 1, 'Especial', 'masculino', '26.01', '28.00', 5, 3, 5, 6, '2019-03-11 20:53:21', '2019-03-11 20:53:21'),
(45, 1, 'Especial', 'masculino', '28.01', '30.00', 5, 3, 5, 6, '2019-03-11 20:53:21', '2019-03-11 20:53:21'),
(46, 1, 'Especial', 'masculino', '30.01', '32.00', 5, 3, 5, 6, '2019-03-11 20:53:21', '2019-03-11 20:53:21'),
(47, 1, 'Especial', 'masculino', '32.01', '34.00', 5, 3, 5, 6, '2019-03-11 20:53:21', '2019-03-11 20:53:21'),
(48, 1, 'Especial', 'masculino', '34.01', '36.00', 5, 3, 5, 6, '2019-03-11 20:53:21', '2019-03-11 20:53:21'),
(49, 1, 'Especial', 'masculino', '36.01', '38.00', 5, 3, 5, 6, '2019-03-11 20:53:21', '2019-03-11 20:53:21'),
(50, 1, 'Especial', 'masculino', '38.01', '500.00', 5, 3, 5, 6, '2019-03-11 20:53:21', '2019-03-11 20:53:21'),
(51, 1, 'Especial', 'feminino', '0.00', '22.00', 5, 3, 5, 6, '2019-03-11 20:53:21', '2019-03-11 20:53:21'),
(52, 1, 'Especial', 'feminino', '22.01', '24.00', 5, 3, 5, 6, '2019-03-11 20:53:21', '2019-03-11 20:53:21'),
(53, 1, 'Especial', 'feminino', '24.01', '26.00', 5, 3, 5, 6, '2019-03-11 20:53:22', '2019-03-11 20:53:22'),
(54, 1, 'Especial', 'feminino', '26.01', '28.00', 5, 3, 5, 6, '2019-03-11 20:53:22', '2019-03-11 20:53:22'),
(55, 1, 'Especial', 'feminino', '28.01', '30.00', 5, 3, 5, 6, '2019-03-11 20:53:22', '2019-03-11 20:53:22'),
(56, 1, 'Especial', 'feminino', '30.01', '32.00', 5, 3, 5, 6, '2019-03-11 20:53:22', '2019-03-11 20:53:22'),
(57, 1, 'Especial', 'feminino', '32.01', '34.00', 5, 3, 5, 6, '2019-03-11 20:53:22', '2019-03-11 20:53:22'),
(58, 1, 'Especial', 'feminino', '34.01', '36.00', 5, 3, 5, 6, '2019-03-11 20:53:22', '2019-03-11 20:53:22'),
(59, 1, 'Especial', 'feminino', '36.01', '38.00', 5, 3, 5, 6, '2019-03-11 20:53:22', '2019-03-11 20:53:22'),
(60, 1, 'Especial', 'feminino', '38.01', '500.00', 5, 3, 5, 6, '2019-03-11 20:53:22', '2019-03-11 20:53:22'),
(61, 1, 'Especial', 'masculino', '0.00', '22.00', 2, -99, 5, 6, '2019-03-11 20:53:22', '2019-03-11 20:53:22'),
(62, 1, 'Especial', 'masculino', '22.01', '24.00', 2, -99, 5, 6, '2019-03-11 20:53:22', '2019-03-11 20:53:22'),
(63, 1, 'Especial', 'masculino', '24.01', '26.00', 2, -99, 5, 6, '2019-03-11 20:53:22', '2019-03-11 20:53:22'),
(64, 1, 'Especial', 'masculino', '26.01', '28.00', 2, -99, 5, 6, '2019-03-11 20:53:22', '2019-03-11 20:53:22'),
(65, 1, 'Especial', 'masculino', '28.01', '30.00', 2, -99, 5, 6, '2019-03-11 20:53:22', '2019-03-11 20:53:22'),
(66, 1, 'Especial', 'masculino', '30.01', '32.00', 2, -99, 5, 6, '2019-03-11 20:53:22', '2019-03-11 20:53:22'),
(67, 1, 'Especial', 'masculino', '32.01', '34.00', 2, -99, 5, 6, '2019-03-11 20:53:22', '2019-03-11 20:53:22'),
(68, 1, 'Especial', 'masculino', '34.01', '36.00', 2, -99, 5, 6, '2019-03-11 20:53:22', '2019-03-11 20:53:22'),
(69, 1, 'Especial', 'masculino', '36.01', '38.00', 2, -99, 5, 6, '2019-03-11 20:53:22', '2019-03-11 20:53:22'),
(70, 1, 'Especial', 'masculino', '38.01', '500.00', 2, -99, 5, 6, '2019-03-11 20:53:22', '2019-03-11 20:53:22'),
(71, 1, 'Especial', 'feminino', '0.00', '22.00', 2, -99, 5, 6, '2019-03-11 20:53:22', '2019-03-11 20:53:22'),
(72, 1, 'Especial', 'feminino', '22.01', '24.00', 2, -99, 5, 6, '2019-03-11 20:53:22', '2019-03-11 20:53:22'),
(73, 1, 'Especial', 'feminino', '24.01', '26.00', 2, -99, 5, 6, '2019-03-11 20:53:22', '2019-03-11 20:53:22'),
(74, 1, 'Especial', 'feminino', '26.01', '28.00', 2, -99, 5, 6, '2019-03-11 20:53:22', '2019-03-11 20:53:22'),
(75, 1, 'Especial', 'feminino', '28.01', '30.00', 2, -99, 5, 6, '2019-03-11 20:53:22', '2019-03-11 20:53:22'),
(76, 1, 'Especial', 'feminino', '30.01', '32.00', 2, -99, 5, 6, '2019-03-11 20:53:23', '2019-03-11 20:53:23'),
(77, 1, 'Especial', 'feminino', '32.01', '34.00', 2, -99, 5, 6, '2019-03-11 20:53:23', '2019-03-11 20:53:23'),
(78, 1, 'Especial', 'feminino', '34.01', '36.00', 2, -99, 5, 6, '2019-03-11 20:53:23', '2019-03-11 20:53:23'),
(79, 1, 'Especial', 'feminino', '36.01', '38.00', 2, -99, 5, 6, '2019-03-11 20:53:23', '2019-03-11 20:53:23'),
(80, 1, 'Especial', 'feminino', '38.01', '500.00', 2, -99, 5, 6, '2019-03-11 20:53:23', '2019-03-11 20:53:23'),
(81, 1, 'Mirim', 'masculino', '0.00', '22.00', 10, 10, 7, 9, '2019-03-11 20:53:23', '2019-03-11 20:53:23'),
(82, 1, 'Mirim', 'masculino', '22.01', '24.00', 10, 10, 7, 9, '2019-03-11 20:53:23', '2019-03-11 20:53:23'),
(83, 1, 'Mirim', 'masculino', '24.01', '27.00', 10, 10, 7, 9, '2019-03-11 20:53:23', '2019-03-11 20:53:23'),
(84, 1, 'Mirim', 'masculino', '27.01', '30.00', 10, 10, 7, 9, '2019-03-11 20:53:23', '2019-03-11 20:53:23'),
(85, 1, 'Mirim', 'masculino', '30.01', '33.00', 10, 10, 7, 9, '2019-03-11 20:53:23', '2019-03-11 20:53:23'),
(86, 1, 'Mirim', 'masculino', '33.01', '36.00', 10, 10, 7, 9, '2019-03-11 20:53:23', '2019-03-11 20:53:23'),
(87, 1, 'Mirim', 'masculino', '36.01', '39.00', 10, 10, 7, 9, '2019-03-11 20:53:23', '2019-03-11 20:53:23'),
(88, 1, 'Mirim', 'masculino', '39.01', '41.00', 10, 10, 7, 9, '2019-03-11 20:53:23', '2019-03-11 20:53:23'),
(89, 1, 'Mirim', 'masculino', '41.01', '43.00', 10, 10, 7, 9, '2019-03-11 20:53:23', '2019-03-11 20:53:23'),
(90, 1, 'Mirim', 'masculino', '43.01', '500.00', 10, 10, 7, 9, '2019-03-11 20:53:23', '2019-03-11 20:53:23'),
(91, 1, 'Mirim', 'feminino', '0.00', '22.00', 10, 10, 7, 9, '2019-03-11 20:53:23', '2019-03-11 20:53:23'),
(92, 1, 'Mirim', 'feminino', '22.01', '24.00', 10, 10, 7, 9, '2019-03-11 20:53:23', '2019-03-11 20:53:23'),
(93, 1, 'Mirim', 'feminino', '24.01', '27.00', 10, 10, 7, 9, '2019-03-11 20:53:23', '2019-03-11 20:53:23'),
(94, 1, 'Mirim', 'feminino', '27.01', '30.00', 10, 10, 7, 9, '2019-03-11 20:53:23', '2019-03-11 20:53:23'),
(95, 1, 'Mirim', 'feminino', '30.01', '33.00', 10, 10, 7, 9, '2019-03-11 20:53:23', '2019-03-11 20:53:23'),
(96, 1, 'Mirim', 'feminino', '33.01', '36.00', 10, 10, 7, 9, '2019-03-11 20:53:23', '2019-03-11 20:53:23'),
(97, 1, 'Mirim', 'feminino', '36.01', '39.00', 10, 10, 7, 9, '2019-03-11 20:53:23', '2019-03-11 20:53:23'),
(98, 1, 'Mirim', 'feminino', '39.01', '41.00', 10, 10, 7, 9, '2019-03-11 20:53:23', '2019-03-11 20:53:23'),
(99, 1, 'Mirim', 'feminino', '41.01', '43.00', 10, 10, 7, 9, '2019-03-11 20:53:23', '2019-03-11 20:53:23'),
(100, 1, 'Mirim', 'feminino', '43.01', '500.00', 10, 10, 7, 9, '2019-03-11 20:53:23', '2019-03-11 20:53:23'),
(101, 1, 'Mirim', 'masculino', '0.00', '22.00', 8, 6, 7, 9, '2019-03-11 20:53:23', '2019-03-11 20:53:23'),
(102, 1, 'Mirim', 'masculino', '22.01', '24.00', 8, 6, 7, 9, '2019-03-11 20:53:24', '2019-03-11 20:53:24'),
(103, 1, 'Mirim', 'masculino', '24.01', '27.00', 8, 6, 7, 9, '2019-03-11 20:53:24', '2019-03-11 20:53:24'),
(104, 1, 'Mirim', 'masculino', '27.01', '30.00', 8, 6, 7, 9, '2019-03-11 20:53:24', '2019-03-11 20:53:24'),
(105, 1, 'Mirim', 'masculino', '30.01', '33.00', 8, 6, 7, 9, '2019-03-11 20:53:24', '2019-03-11 20:53:24'),
(106, 1, 'Mirim', 'masculino', '33.01', '36.00', 8, 6, 7, 9, '2019-03-11 20:53:24', '2019-03-11 20:53:24'),
(107, 1, 'Mirim', 'masculino', '36.01', '39.00', 8, 6, 7, 9, '2019-03-11 20:53:24', '2019-03-11 20:53:24'),
(108, 1, 'Mirim', 'masculino', '39.01', '41.00', 8, 6, 7, 9, '2019-03-11 20:53:24', '2019-03-11 20:53:24'),
(109, 1, 'Mirim', 'masculino', '41.01', '43.00', 8, 6, 7, 9, '2019-03-11 20:53:24', '2019-03-11 20:53:24'),
(110, 1, 'Mirim', 'masculino', '43.01', '500.00', 8, 6, 7, 9, '2019-03-11 20:53:24', '2019-03-11 20:53:24'),
(111, 1, 'Mirim', 'feminino', '0.00', '22.00', 8, 6, 7, 9, '2019-03-11 20:53:24', '2019-03-11 20:53:24'),
(112, 1, 'Mirim', 'feminino', '22.01', '24.00', 8, 6, 7, 9, '2019-03-11 20:53:24', '2019-03-11 20:53:24'),
(113, 1, 'Mirim', 'feminino', '24.01', '27.00', 8, 6, 7, 9, '2019-03-11 20:53:24', '2019-03-11 20:53:24'),
(114, 1, 'Mirim', 'feminino', '27.01', '30.00', 8, 6, 7, 9, '2019-03-11 20:53:24', '2019-03-11 20:53:24'),
(115, 1, 'Mirim', 'feminino', '30.01', '33.00', 8, 6, 7, 9, '2019-03-11 20:53:24', '2019-03-11 20:53:24'),
(116, 1, 'Mirim', 'feminino', '33.01', '36.00', 8, 6, 7, 9, '2019-03-11 20:53:24', '2019-03-11 20:53:24'),
(117, 1, 'Mirim', 'feminino', '36.01', '39.00', 8, 6, 7, 9, '2019-03-11 20:53:24', '2019-03-11 20:53:24'),
(118, 1, 'Mirim', 'feminino', '39.01', '41.00', 8, 6, 7, 9, '2019-03-11 20:53:24', '2019-03-11 20:53:24'),
(119, 1, 'Mirim', 'feminino', '41.01', '43.00', 8, 6, 7, 9, '2019-03-11 20:53:24', '2019-03-11 20:53:24'),
(120, 1, 'Mirim', 'feminino', '43.01', '500.00', 8, 6, 7, 9, '2019-03-11 20:53:24', '2019-03-11 20:53:24'),
(121, 1, 'Mirim', 'masculino', '0.00', '22.00', 5, 3, 7, 9, '2019-03-11 20:53:24', '2019-03-11 20:53:24'),
(122, 1, 'Mirim', 'masculino', '22.01', '24.00', 5, 3, 7, 9, '2019-03-11 20:53:24', '2019-03-11 20:53:24'),
(123, 1, 'Mirim', 'masculino', '24.01', '27.00', 5, 3, 7, 9, '2019-03-11 20:53:24', '2019-03-11 20:53:24'),
(124, 1, 'Mirim', 'masculino', '27.01', '30.00', 5, 3, 7, 9, '2019-03-11 20:53:24', '2019-03-11 20:53:24'),
(125, 1, 'Mirim', 'masculino', '30.01', '33.00', 5, 3, 7, 9, '2019-03-11 20:53:24', '2019-03-11 20:53:24'),
(126, 1, 'Mirim', 'masculino', '33.01', '36.00', 5, 3, 7, 9, '2019-03-11 20:53:24', '2019-03-11 20:53:24'),
(127, 1, 'Mirim', 'masculino', '36.01', '39.00', 5, 3, 7, 9, '2019-03-11 20:53:25', '2019-03-11 20:53:25'),
(128, 1, 'Mirim', 'masculino', '39.01', '41.00', 5, 3, 7, 9, '2019-03-11 20:53:25', '2019-03-11 20:53:25'),
(129, 1, 'Mirim', 'masculino', '41.01', '43.00', 5, 3, 7, 9, '2019-03-11 20:53:25', '2019-03-11 20:53:25'),
(130, 1, 'Mirim', 'masculino', '43.01', '500.00', 5, 3, 7, 9, '2019-03-11 20:53:25', '2019-03-11 20:53:25'),
(131, 1, 'Mirim', 'feminino', '0.00', '22.00', 5, 3, 7, 9, '2019-03-11 20:53:25', '2019-03-11 20:53:25'),
(132, 1, 'Mirim', 'feminino', '22.01', '24.00', 5, 3, 7, 9, '2019-03-11 20:53:25', '2019-03-11 20:53:25'),
(133, 1, 'Mirim', 'feminino', '24.01', '27.00', 5, 3, 7, 9, '2019-03-11 20:53:25', '2019-03-11 20:53:25'),
(134, 1, 'Mirim', 'feminino', '27.01', '30.00', 5, 3, 7, 9, '2019-03-11 20:53:25', '2019-03-11 20:53:25'),
(135, 1, 'Mirim', 'feminino', '30.01', '33.00', 5, 3, 7, 9, '2019-03-11 20:53:25', '2019-03-11 20:53:25'),
(136, 1, 'Mirim', 'feminino', '33.01', '36.00', 5, 3, 7, 9, '2019-03-11 20:53:25', '2019-03-11 20:53:25'),
(137, 1, 'Mirim', 'feminino', '36.01', '39.00', 5, 3, 7, 9, '2019-03-11 20:53:25', '2019-03-11 20:53:25'),
(138, 1, 'Mirim', 'feminino', '39.01', '41.00', 5, 3, 7, 9, '2019-03-11 20:53:25', '2019-03-11 20:53:25'),
(139, 1, 'Mirim', 'feminino', '41.01', '43.00', 5, 3, 7, 9, '2019-03-11 20:53:25', '2019-03-11 20:53:25'),
(140, 1, 'Mirim', 'feminino', '43.01', '500.00', 5, 3, 7, 9, '2019-03-11 20:53:25', '2019-03-11 20:53:25'),
(141, 1, 'Mirim', 'masculino', '0.00', '22.00', 2, -99, 7, 9, '2019-03-11 20:53:25', '2019-03-11 20:53:25'),
(142, 1, 'Mirim', 'masculino', '22.01', '24.00', 2, -99, 7, 9, '2019-03-11 20:53:25', '2019-03-11 20:53:25'),
(143, 1, 'Mirim', 'masculino', '24.01', '27.00', 2, -99, 7, 9, '2019-03-11 20:53:25', '2019-03-11 20:53:25'),
(144, 1, 'Mirim', 'masculino', '27.01', '30.00', 2, -99, 7, 9, '2019-03-11 20:53:25', '2019-03-11 20:53:25'),
(145, 1, 'Mirim', 'masculino', '30.01', '33.00', 2, -99, 7, 9, '2019-03-11 20:53:25', '2019-03-11 20:53:25'),
(146, 1, 'Mirim', 'masculino', '33.01', '36.00', 2, -99, 7, 9, '2019-03-11 20:53:25', '2019-03-11 20:53:25'),
(147, 1, 'Mirim', 'masculino', '36.01', '39.00', 2, -99, 7, 9, '2019-03-11 20:53:25', '2019-03-11 20:53:25'),
(148, 1, 'Mirim', 'masculino', '39.01', '41.00', 2, -99, 7, 9, '2019-03-11 20:53:25', '2019-03-11 20:53:25'),
(149, 1, 'Mirim', 'masculino', '41.01', '43.00', 2, -99, 7, 9, '2019-03-11 20:53:26', '2019-03-11 20:53:26'),
(150, 1, 'Mirim', 'masculino', '43.01', '500.00', 2, -99, 7, 9, '2019-03-11 20:53:26', '2019-03-11 20:53:26'),
(151, 1, 'Mirim', 'feminino', '0.00', '22.00', 2, -99, 7, 9, '2019-03-11 20:53:26', '2019-03-11 20:53:26'),
(152, 1, 'Mirim', 'feminino', '22.01', '24.00', 2, -99, 7, 9, '2019-03-11 20:53:26', '2019-03-11 20:53:26'),
(153, 1, 'Mirim', 'feminino', '24.01', '27.00', 2, -99, 7, 9, '2019-03-11 20:53:26', '2019-03-11 20:53:26'),
(154, 1, 'Mirim', 'feminino', '27.01', '30.00', 2, -99, 7, 9, '2019-03-11 20:53:26', '2019-03-11 20:53:26'),
(155, 1, 'Mirim', 'feminino', '30.01', '33.00', 2, -99, 7, 9, '2019-03-11 20:53:26', '2019-03-11 20:53:26'),
(156, 1, 'Mirim', 'feminino', '33.01', '36.00', 2, -99, 7, 9, '2019-03-11 20:53:26', '2019-03-11 20:53:26'),
(157, 1, 'Mirim', 'feminino', '36.01', '39.00', 2, -99, 7, 9, '2019-03-11 20:53:26', '2019-03-11 20:53:26'),
(158, 1, 'Mirim', 'feminino', '39.01', '41.00', 2, -99, 7, 9, '2019-03-11 20:53:26', '2019-03-11 20:53:26'),
(159, 1, 'Mirim', 'feminino', '41.01', '43.00', 2, -99, 7, 9, '2019-03-11 20:53:26', '2019-03-11 20:53:26'),
(160, 1, 'Mirim', 'feminino', '43.01', '500.00', 2, -99, 7, 9, '2019-03-11 20:53:26', '2019-03-11 20:53:26'),
(161, 1, 'Infantil', 'masculino', '0.00', '30.00', 10, 10, 10, 11, '2019-03-11 20:53:26', '2019-03-11 20:53:26'),
(162, 1, 'Infantil', 'masculino', '30.01', '32.00', 10, 10, 10, 11, '2019-03-11 20:53:26', '2019-03-11 20:53:26'),
(163, 1, 'Infantil', 'masculino', '32.01', '34.00', 10, 10, 10, 11, '2019-03-11 20:53:26', '2019-03-11 20:53:26'),
(164, 1, 'Infantil', 'masculino', '34.01', '36.00', 10, 10, 10, 11, '2019-03-11 20:53:26', '2019-03-11 20:53:26'),
(165, 1, 'Infantil', 'masculino', '36.01', '39.00', 10, 10, 10, 11, '2019-03-11 20:53:26', '2019-03-11 20:53:26'),
(166, 1, 'Infantil', 'masculino', '39.01', '42.00', 10, 10, 10, 11, '2019-03-11 20:53:26', '2019-03-11 20:53:26'),
(167, 1, 'Infantil', 'masculino', '42.01', '45.00', 10, 10, 10, 11, '2019-03-11 20:53:26', '2019-03-11 20:53:26'),
(168, 1, 'Infantil', 'masculino', '45.01', '48.00', 10, 10, 10, 11, '2019-03-11 20:53:26', '2019-03-11 20:53:26'),
(169, 1, 'Infantil', 'masculino', '48.01', '52.00', 10, 10, 10, 11, '2019-03-11 20:53:26', '2019-03-11 20:53:26'),
(170, 1, 'Infantil', 'masculino', '52.01', '500.00', 10, 10, 10, 11, '2019-03-11 20:53:26', '2019-03-11 20:53:26'),
(171, 1, 'Infantil', 'feminino', '0.00', '30.00', 10, 10, 10, 11, '2019-03-11 20:53:26', '2019-03-11 20:53:26'),
(172, 1, 'Infantil', 'feminino', '30.01', '32.00', 10, 10, 10, 11, '2019-03-11 20:53:26', '2019-03-11 20:53:26'),
(173, 1, 'Infantil', 'feminino', '32.01', '34.00', 10, 10, 10, 11, '2019-03-11 20:53:26', '2019-03-11 20:53:26'),
(174, 1, 'Infantil', 'feminino', '34.01', '36.00', 10, 10, 10, 11, '2019-03-11 20:53:26', '2019-03-11 20:53:26'),
(175, 1, 'Infantil', 'feminino', '36.01', '39.00', 10, 10, 10, 11, '2019-03-11 20:53:26', '2019-03-11 20:53:26'),
(176, 1, 'Infantil', 'feminino', '39.01', '42.00', 10, 10, 10, 11, '2019-03-11 20:53:27', '2019-03-11 20:53:27'),
(177, 1, 'Infantil', 'feminino', '42.01', '45.00', 10, 10, 10, 11, '2019-03-11 20:53:27', '2019-03-11 20:53:27'),
(178, 1, 'Infantil', 'feminino', '45.01', '48.00', 10, 10, 10, 11, '2019-03-11 20:53:27', '2019-03-11 20:53:27'),
(179, 1, 'Infantil', 'feminino', '48.01', '52.00', 10, 10, 10, 11, '2019-03-11 20:53:27', '2019-03-11 20:53:27'),
(180, 1, 'Infantil', 'feminino', '52.01', '500.00', 10, 10, 10, 11, '2019-03-11 20:53:27', '2019-03-11 20:53:27'),
(181, 1, 'Infantil', 'masculino', '0.00', '30.00', 8, 6, 10, 11, '2019-03-11 20:53:27', '2019-03-11 20:53:27'),
(182, 1, 'Infantil', 'masculino', '30.01', '32.00', 8, 6, 10, 11, '2019-03-11 20:53:27', '2019-03-11 20:53:27'),
(183, 1, 'Infantil', 'masculino', '32.01', '34.00', 8, 6, 10, 11, '2019-03-11 20:53:27', '2019-03-11 20:53:27'),
(184, 1, 'Infantil', 'masculino', '34.01', '36.00', 8, 6, 10, 11, '2019-03-11 20:53:27', '2019-03-11 20:53:27'),
(185, 1, 'Infantil', 'masculino', '36.01', '39.00', 8, 6, 10, 11, '2019-03-11 20:53:27', '2019-03-11 20:53:27'),
(186, 1, 'Infantil', 'masculino', '39.01', '42.00', 8, 6, 10, 11, '2019-03-11 20:53:27', '2019-03-11 20:53:27'),
(187, 1, 'Infantil', 'masculino', '42.01', '45.00', 8, 6, 10, 11, '2019-03-11 20:53:27', '2019-03-11 20:53:27'),
(188, 1, 'Infantil', 'masculino', '45.01', '48.00', 8, 6, 10, 11, '2019-03-11 20:53:27', '2019-03-11 20:53:27'),
(189, 1, 'Infantil', 'masculino', '48.01', '52.00', 8, 6, 10, 11, '2019-03-11 20:53:27', '2019-03-11 20:53:27'),
(190, 1, 'Infantil', 'masculino', '52.01', '500.00', 8, 6, 10, 11, '2019-03-11 20:53:27', '2019-03-11 20:53:27'),
(191, 1, 'Infantil', 'feminino', '0.00', '30.00', 8, 6, 10, 11, '2019-03-11 20:53:27', '2019-03-11 20:53:27'),
(192, 1, 'Infantil', 'feminino', '30.01', '32.00', 8, 6, 10, 11, '2019-03-11 20:53:27', '2019-03-11 20:53:27'),
(193, 1, 'Infantil', 'feminino', '32.01', '34.00', 8, 6, 10, 11, '2019-03-11 20:53:27', '2019-03-11 20:53:27'),
(194, 1, 'Infantil', 'feminino', '34.01', '36.00', 8, 6, 10, 11, '2019-03-11 20:53:27', '2019-03-11 20:53:27'),
(195, 1, 'Infantil', 'feminino', '36.01', '39.00', 8, 6, 10, 11, '2019-03-11 20:53:27', '2019-03-11 20:53:27'),
(196, 1, 'Infantil', 'feminino', '39.01', '42.00', 8, 6, 10, 11, '2019-03-11 20:53:27', '2019-03-11 20:53:27'),
(197, 1, 'Infantil', 'feminino', '42.01', '45.00', 8, 6, 10, 11, '2019-03-11 20:53:27', '2019-03-11 20:53:27'),
(198, 1, 'Infantil', 'feminino', '45.01', '48.00', 8, 6, 10, 11, '2019-03-11 20:53:27', '2019-03-11 20:53:27'),
(199, 1, 'Infantil', 'feminino', '48.01', '52.00', 8, 6, 10, 11, '2019-03-11 20:53:27', '2019-03-11 20:53:27'),
(200, 1, 'Infantil', 'feminino', '52.01', '500.00', 8, 6, 10, 11, '2019-03-11 20:53:28', '2019-03-11 20:53:28'),
(201, 1, 'Infantil', 'masculino', '0.00', '30.00', 5, 3, 10, 11, '2019-03-11 20:53:28', '2019-03-11 20:53:28'),
(202, 1, 'Infantil', 'masculino', '30.01', '32.00', 5, 3, 10, 11, '2019-03-11 20:53:28', '2019-03-11 20:53:28'),
(203, 1, 'Infantil', 'masculino', '32.01', '34.00', 5, 3, 10, 11, '2019-03-11 20:53:28', '2019-03-11 20:53:28'),
(204, 1, 'Infantil', 'masculino', '34.01', '36.00', 5, 3, 10, 11, '2019-03-11 20:53:28', '2019-03-11 20:53:28'),
(205, 1, 'Infantil', 'masculino', '36.01', '39.00', 5, 3, 10, 11, '2019-03-11 20:53:28', '2019-03-11 20:53:28'),
(206, 1, 'Infantil', 'masculino', '39.01', '42.00', 5, 3, 10, 11, '2019-03-11 20:53:28', '2019-03-11 20:53:28'),
(207, 1, 'Infantil', 'masculino', '42.01', '45.00', 5, 3, 10, 11, '2019-03-11 20:53:28', '2019-03-11 20:53:28'),
(208, 1, 'Infantil', 'masculino', '45.01', '48.00', 5, 3, 10, 11, '2019-03-11 20:53:28', '2019-03-11 20:53:28'),
(209, 1, 'Infantil', 'masculino', '48.01', '52.00', 5, 3, 10, 11, '2019-03-11 20:53:28', '2019-03-11 20:53:28'),
(210, 1, 'Infantil', 'masculino', '52.01', '500.00', 5, 3, 10, 11, '2019-03-11 20:53:28', '2019-03-11 20:53:28'),
(211, 1, 'Infantil', 'feminino', '0.00', '30.00', 5, 3, 10, 11, '2019-03-11 20:53:28', '2019-03-11 20:53:28'),
(212, 1, 'Infantil', 'feminino', '30.01', '32.00', 5, 3, 10, 11, '2019-03-11 20:53:29', '2019-03-11 20:53:29'),
(213, 1, 'Infantil', 'feminino', '32.01', '34.00', 5, 3, 10, 11, '2019-03-11 20:53:29', '2019-03-11 20:53:29'),
(214, 1, 'Infantil', 'feminino', '34.01', '36.00', 5, 3, 10, 11, '2019-03-11 20:53:29', '2019-03-11 20:53:29'),
(215, 1, 'Infantil', 'feminino', '36.01', '39.00', 5, 3, 10, 11, '2019-03-11 20:53:29', '2019-03-11 20:53:29'),
(216, 1, 'Infantil', 'feminino', '39.01', '42.00', 5, 3, 10, 11, '2019-03-11 20:53:29', '2019-03-11 20:53:29'),
(217, 1, 'Infantil', 'feminino', '42.01', '45.00', 5, 3, 10, 11, '2019-03-11 20:53:29', '2019-03-11 20:53:29'),
(218, 1, 'Infantil', 'feminino', '45.01', '48.00', 5, 3, 10, 11, '2019-03-11 20:53:29', '2019-03-11 20:53:29'),
(219, 1, 'Infantil', 'feminino', '48.01', '52.00', 5, 3, 10, 11, '2019-03-11 20:53:29', '2019-03-11 20:53:29'),
(220, 1, 'Infantil', 'feminino', '52.01', '500.00', 5, 3, 10, 11, '2019-03-11 20:53:29', '2019-03-11 20:53:29'),
(221, 1, 'Infantil', 'masculino', '0.00', '30.00', 2, -99, 10, 11, '2019-03-11 20:53:29', '2019-03-11 20:53:29'),
(222, 1, 'Infantil', 'masculino', '30.01', '32.00', 2, -99, 10, 11, '2019-03-11 20:53:29', '2019-03-11 20:53:29'),
(223, 1, 'Infantil', 'masculino', '32.01', '34.00', 2, -99, 10, 11, '2019-03-11 20:53:29', '2019-03-11 20:53:29'),
(224, 1, 'Infantil', 'masculino', '34.01', '36.00', 2, -99, 10, 11, '2019-03-11 20:53:29', '2019-03-11 20:53:29'),
(225, 1, 'Infantil', 'masculino', '36.01', '39.00', 2, -99, 10, 11, '2019-03-11 20:53:29', '2019-03-11 20:53:29'),
(226, 1, 'Infantil', 'masculino', '39.01', '42.00', 2, -99, 10, 11, '2019-03-11 20:53:29', '2019-03-11 20:53:29'),
(227, 1, 'Infantil', 'masculino', '42.01', '45.00', 2, -99, 10, 11, '2019-03-11 20:53:29', '2019-03-11 20:53:29'),
(228, 1, 'Infantil', 'masculino', '45.01', '48.00', 2, -99, 10, 11, '2019-03-11 20:53:29', '2019-03-11 20:53:29'),
(229, 1, 'Infantil', 'masculino', '48.01', '52.00', 2, -99, 10, 11, '2019-03-11 20:53:29', '2019-03-11 20:53:29'),
(230, 1, 'Infantil', 'masculino', '52.01', '500.00', 2, -99, 10, 11, '2019-03-11 20:53:29', '2019-03-11 20:53:29'),
(231, 1, 'Infantil', 'feminino', '0.00', '30.00', 2, -99, 10, 11, '2019-03-11 20:53:29', '2019-03-11 20:53:29'),
(232, 1, 'Infantil', 'feminino', '30.01', '32.00', 2, -99, 10, 11, '2019-03-11 20:53:29', '2019-03-11 20:53:29'),
(233, 1, 'Infantil', 'feminino', '32.01', '34.00', 2, -99, 10, 11, '2019-03-11 20:53:29', '2019-03-11 20:53:29'),
(234, 1, 'Infantil', 'feminino', '34.01', '36.00', 2, -99, 10, 11, '2019-03-11 20:53:29', '2019-03-11 20:53:29'),
(235, 1, 'Infantil', 'feminino', '36.01', '39.00', 2, -99, 10, 11, '2019-03-11 20:53:29', '2019-03-11 20:53:29'),
(236, 1, 'Infantil', 'feminino', '39.01', '42.00', 2, -99, 10, 11, '2019-03-11 20:53:29', '2019-03-11 20:53:29'),
(237, 1, 'Infantil', 'feminino', '42.01', '45.00', 2, -99, 10, 11, '2019-03-11 20:53:29', '2019-03-11 20:53:29'),
(238, 1, 'Infantil', 'feminino', '45.01', '48.00', 2, -99, 10, 11, '2019-03-11 20:53:29', '2019-03-11 20:53:29'),
(239, 1, 'Infantil', 'feminino', '48.01', '52.00', 2, -99, 10, 11, '2019-03-11 20:53:29', '2019-03-11 20:53:29'),
(240, 1, 'Infantil', 'feminino', '52.01', '500.00', 2, -99, 10, 11, '2019-03-11 20:53:29', '2019-03-11 20:53:29'),
(241, 1, 'Cadete', 'masculino', '0.00', '33.00', 10, 10, 12, 14, '2019-03-11 20:53:29', '2019-03-11 20:53:29'),
(242, 1, 'Cadete', 'masculino', '33.01', '37.00', 10, 10, 12, 14, '2019-03-11 20:53:29', '2019-03-11 20:53:29'),
(243, 1, 'Cadete', 'masculino', '37.01', '41.00', 10, 10, 12, 14, '2019-03-11 20:53:30', '2019-03-11 20:53:30'),
(244, 1, 'Cadete', 'masculino', '41.01', '45.00', 10, 10, 12, 14, '2019-03-11 20:53:30', '2019-03-11 20:53:30'),
(245, 1, 'Cadete', 'masculino', '45.01', '49.00', 10, 10, 12, 14, '2019-03-11 20:53:30', '2019-03-11 20:53:30'),
(246, 1, 'Cadete', 'masculino', '49.01', '53.00', 10, 10, 12, 14, '2019-03-11 20:53:30', '2019-03-11 20:53:30'),
(247, 1, 'Cadete', 'masculino', '53.01', '57.00', 10, 10, 12, 14, '2019-03-11 20:53:30', '2019-03-11 20:53:30'),
(248, 1, 'Cadete', 'masculino', '57.01', '61.00', 10, 10, 12, 14, '2019-03-11 20:53:30', '2019-03-11 20:53:30'),
(249, 1, 'Cadete', 'masculino', '61.01', '65.00', 10, 10, 12, 14, '2019-03-11 20:53:30', '2019-03-11 20:53:30'),
(250, 1, 'Cadete', 'masculino', '65.01', '500.00', 10, 10, 12, 14, '2019-03-11 20:53:30', '2019-03-11 20:53:30'),
(251, 1, 'Cadete', 'feminino', '0.00', '29.00', 10, 10, 12, 14, '2019-03-11 20:53:30', '2019-03-11 20:53:30'),
(252, 1, 'Cadete', 'feminino', '29.01', '33.00', 10, 10, 12, 14, '2019-03-11 20:53:30', '2019-03-11 20:53:30'),
(253, 1, 'Cadete', 'feminino', '33.01', '37.00', 10, 10, 12, 14, '2019-03-11 20:53:30', '2019-03-11 20:53:30'),
(254, 1, 'Cadete', 'feminino', '37.01', '41.00', 10, 10, 12, 14, '2019-03-11 20:53:30', '2019-03-11 20:53:30'),
(255, 1, 'Cadete', 'feminino', '41.01', '44.00', 10, 10, 12, 14, '2019-03-11 20:53:30', '2019-03-11 20:53:30'),
(256, 1, 'Cadete', 'feminino', '44.01', '47.00', 10, 10, 12, 14, '2019-03-11 20:53:30', '2019-03-11 20:53:30'),
(257, 1, 'Cadete', 'feminino', '47.01', '51.00', 10, 10, 12, 14, '2019-03-11 20:53:31', '2019-03-11 20:53:31'),
(258, 1, 'Cadete', 'feminino', '51.01', '55.00', 10, 10, 12, 14, '2019-03-11 20:53:31', '2019-03-11 20:53:31'),
(259, 1, 'Cadete', 'feminino', '55.01', '59.00', 10, 10, 12, 14, '2019-03-11 20:53:31', '2019-03-11 20:53:31'),
(260, 1, 'Cadete', 'feminino', '59.01', '500.00', 10, 10, 12, 14, '2019-03-11 20:53:31', '2019-03-11 20:53:31'),
(261, 1, 'Cadete', 'masculino', '0.00', '33.00', 8, 6, 12, 14, '2019-03-11 20:53:31', '2019-03-11 20:53:31'),
(262, 1, 'Cadete', 'masculino', '33.01', '37.00', 8, 6, 12, 14, '2019-03-11 20:53:31', '2019-03-11 20:53:31'),
(263, 1, 'Cadete', 'masculino', '37.01', '41.00', 8, 6, 12, 14, '2019-03-11 20:53:31', '2019-03-11 20:53:31'),
(264, 1, 'Cadete', 'masculino', '41.01', '45.00', 8, 6, 12, 14, '2019-03-11 20:53:31', '2019-03-11 20:53:31'),
(265, 1, 'Cadete', 'masculino', '45.01', '49.00', 8, 6, 12, 14, '2019-03-11 20:53:31', '2019-03-11 20:53:31'),
(266, 1, 'Cadete', 'masculino', '49.01', '53.00', 8, 6, 12, 14, '2019-03-11 20:53:31', '2019-03-11 20:53:31'),
(267, 1, 'Cadete', 'masculino', '53.01', '57.00', 8, 6, 12, 14, '2019-03-11 20:53:31', '2019-03-11 20:53:31'),
(268, 1, 'Cadete', 'masculino', '57.01', '61.00', 8, 6, 12, 14, '2019-03-11 20:53:31', '2019-03-11 20:53:31'),
(269, 1, 'Cadete', 'masculino', '61.01', '65.00', 8, 6, 12, 14, '2019-03-11 20:53:31', '2019-03-11 20:53:31'),
(270, 1, 'Cadete', 'masculino', '65.01', '500.00', 8, 6, 12, 14, '2019-03-11 20:53:31', '2019-03-11 20:53:31'),
(271, 1, 'Cadete', 'feminino', '0.00', '29.00', 8, 6, 12, 14, '2019-03-11 20:53:31', '2019-03-11 20:53:31'),
(272, 1, 'Cadete', 'feminino', '29.01', '33.00', 8, 6, 12, 14, '2019-03-11 20:53:31', '2019-03-11 20:53:31'),
(273, 1, 'Cadete', 'feminino', '33.01', '37.00', 8, 6, 12, 14, '2019-03-11 20:53:31', '2019-03-11 20:53:31'),
(274, 1, 'Cadete', 'feminino', '37.01', '41.00', 8, 6, 12, 14, '2019-03-11 20:53:31', '2019-03-11 20:53:31'),
(275, 1, 'Cadete', 'feminino', '41.01', '44.00', 8, 6, 12, 14, '2019-03-11 20:53:31', '2019-03-11 20:53:31'),
(276, 1, 'Cadete', 'feminino', '44.01', '47.00', 8, 6, 12, 14, '2019-03-11 20:53:31', '2019-03-11 20:53:31'),
(277, 1, 'Cadete', 'feminino', '47.01', '51.00', 8, 6, 12, 14, '2019-03-11 20:53:31', '2019-03-11 20:53:31'),
(278, 1, 'Cadete', 'feminino', '51.01', '55.00', 8, 6, 12, 14, '2019-03-11 20:53:31', '2019-03-11 20:53:31'),
(279, 1, 'Cadete', 'feminino', '55.01', '59.00', 8, 6, 12, 14, '2019-03-11 20:53:31', '2019-03-11 20:53:31'),
(280, 1, 'Cadete', 'feminino', '59.01', '500.00', 8, 6, 12, 14, '2019-03-11 20:53:31', '2019-03-11 20:53:31'),
(281, 1, 'Cadete', 'masculino', '0.00', '33.00', 5, 3, 12, 14, '2019-03-11 20:53:31', '2019-03-11 20:53:31'),
(282, 1, 'Cadete', 'masculino', '33.01', '37.00', 5, 3, 12, 14, '2019-03-11 20:53:32', '2019-03-11 20:53:32'),
(283, 1, 'Cadete', 'masculino', '37.01', '41.00', 5, 3, 12, 14, '2019-03-11 20:53:32', '2019-03-11 20:53:32'),
(284, 1, 'Cadete', 'masculino', '41.01', '45.00', 5, 3, 12, 14, '2019-03-11 20:53:32', '2019-03-11 20:53:32'),
(285, 1, 'Cadete', 'masculino', '45.01', '49.00', 5, 3, 12, 14, '2019-03-11 20:53:32', '2019-03-11 20:53:32'),
(286, 1, 'Cadete', 'masculino', '49.01', '53.00', 5, 3, 12, 14, '2019-03-11 20:53:32', '2019-03-11 20:53:32'),
(287, 1, 'Cadete', 'masculino', '53.01', '57.00', 5, 3, 12, 14, '2019-03-11 20:53:32', '2019-03-11 20:53:32'),
(288, 1, 'Cadete', 'masculino', '57.01', '61.00', 5, 3, 12, 14, '2019-03-11 20:53:32', '2019-03-11 20:53:32'),
(289, 1, 'Cadete', 'masculino', '61.01', '65.00', 5, 3, 12, 14, '2019-03-11 20:53:32', '2019-03-11 20:53:32'),
(290, 1, 'Cadete', 'masculino', '65.01', '500.00', 5, 3, 12, 14, '2019-03-11 20:53:32', '2019-03-11 20:53:32'),
(291, 1, 'Cadete', 'feminino', '0.00', '29.00', 5, 3, 12, 14, '2019-03-11 20:53:32', '2019-03-11 20:53:32'),
(292, 1, 'Cadete', 'feminino', '29.01', '33.00', 5, 3, 12, 14, '2019-03-11 20:53:32', '2019-03-11 20:53:32'),
(293, 1, 'Cadete', 'feminino', '33.01', '37.00', 5, 3, 12, 14, '2019-03-11 20:53:32', '2019-03-11 20:53:32'),
(294, 1, 'Cadete', 'feminino', '37.01', '41.00', 5, 3, 12, 14, '2019-03-11 20:53:32', '2019-03-11 20:53:32'),
(295, 1, 'Cadete', 'feminino', '41.01', '44.00', 5, 3, 12, 14, '2019-03-11 20:53:32', '2019-03-11 20:53:32'),
(296, 1, 'Cadete', 'feminino', '44.01', '47.00', 5, 3, 12, 14, '2019-03-11 20:53:32', '2019-03-11 20:53:32'),
(297, 1, 'Cadete', 'feminino', '47.01', '51.00', 5, 3, 12, 14, '2019-03-11 20:53:32', '2019-03-11 20:53:32'),
(298, 1, 'Cadete', 'feminino', '51.01', '55.00', 5, 3, 12, 14, '2019-03-11 20:53:32', '2019-03-11 20:53:32'),
(299, 1, 'Cadete', 'feminino', '55.01', '59.00', 5, 3, 12, 14, '2019-03-11 20:53:32', '2019-03-11 20:53:32'),
(300, 1, 'Cadete', 'feminino', '59.01', '500.00', 5, 3, 12, 14, '2019-03-11 20:53:32', '2019-03-11 20:53:32'),
(301, 1, 'Cadete', 'masculino', '0.00', '33.00', 2, -99, 12, 14, '2019-03-11 20:53:32', '2019-03-11 20:53:32'),
(302, 1, 'Cadete', 'masculino', '33.01', '37.00', 2, -99, 12, 14, '2019-03-11 20:53:32', '2019-03-11 20:53:32'),
(303, 1, 'Cadete', 'masculino', '37.01', '41.00', 2, -99, 12, 14, '2019-03-11 20:53:32', '2019-03-11 20:53:32'),
(304, 1, 'Cadete', 'masculino', '41.01', '45.00', 2, -99, 12, 14, '2019-03-11 20:53:32', '2019-03-11 20:53:32'),
(305, 1, 'Cadete', 'masculino', '45.01', '49.00', 2, -99, 12, 14, '2019-03-11 20:53:32', '2019-03-11 20:53:32'),
(306, 1, 'Cadete', 'masculino', '49.01', '53.00', 2, -99, 12, 14, '2019-03-11 20:53:32', '2019-03-11 20:53:32'),
(307, 1, 'Cadete', 'masculino', '53.01', '57.00', 2, -99, 12, 14, '2019-03-11 20:53:32', '2019-03-11 20:53:32'),
(308, 1, 'Cadete', 'masculino', '57.01', '61.00', 2, -99, 12, 14, '2019-03-11 20:53:32', '2019-03-11 20:53:32'),
(309, 1, 'Cadete', 'masculino', '61.01', '65.00', 2, -99, 12, 14, '2019-03-11 20:53:32', '2019-03-11 20:53:32'),
(310, 1, 'Cadete', 'masculino', '65.01', '500.00', 2, -99, 12, 14, '2019-03-11 20:53:32', '2019-03-11 20:53:32'),
(311, 1, 'Cadete', 'feminino', '0.00', '29.00', 2, -99, 12, 14, '2019-03-11 20:53:32', '2019-03-11 20:53:32'),
(312, 1, 'Cadete', 'feminino', '29.01', '33.00', 2, -99, 12, 14, '2019-03-11 20:53:33', '2019-03-11 20:53:33'),
(313, 1, 'Cadete', 'feminino', '33.01', '37.00', 2, -99, 12, 14, '2019-03-11 20:53:33', '2019-03-11 20:53:33'),
(314, 1, 'Cadete', 'feminino', '37.01', '41.00', 2, -99, 12, 14, '2019-03-11 20:53:33', '2019-03-11 20:53:33'),
(315, 1, 'Cadete', 'feminino', '41.01', '44.00', 2, -99, 12, 14, '2019-03-11 20:53:33', '2019-03-11 20:53:33'),
(316, 1, 'Cadete', 'feminino', '44.01', '47.00', 2, -99, 12, 14, '2019-03-11 20:53:33', '2019-03-11 20:53:33'),
(317, 1, 'Cadete', 'feminino', '47.01', '51.00', 2, -99, 12, 14, '2019-03-11 20:53:33', '2019-03-11 20:53:33'),
(318, 1, 'Cadete', 'feminino', '51.01', '55.00', 2, -99, 12, 14, '2019-03-11 20:53:33', '2019-03-11 20:53:33'),
(319, 1, 'Cadete', 'feminino', '55.01', '59.00', 2, -99, 12, 14, '2019-03-11 20:53:33', '2019-03-11 20:53:33'),
(320, 1, 'Cadete', 'feminino', '59.01', '500.00', 2, -99, 12, 14, '2019-03-11 20:53:33', '2019-03-11 20:53:33'),
(321, 1, 'Juvenil', 'masculino', '0.00', '45.00', 10, 7, 15, 17, '2019-03-11 20:53:33', '2019-03-11 20:53:33'),
(322, 1, 'Juvenil', 'masculino', '45.01', '48.00', 10, 7, 15, 17, '2019-03-11 20:53:33', '2019-03-11 20:53:33'),
(323, 1, 'Juvenil', 'masculino', '48.01', '51.00', 10, 7, 15, 17, '2019-03-11 20:53:33', '2019-03-11 20:53:33'),
(324, 1, 'Juvenil', 'masculino', '51.01', '55.00', 10, 7, 15, 17, '2019-03-11 20:53:33', '2019-03-11 20:53:33'),
(325, 1, 'Juvenil', 'masculino', '55.01', '59.00', 10, 7, 15, 17, '2019-03-11 20:53:33', '2019-03-11 20:53:33'),
(326, 1, 'Juvenil', 'masculino', '59.01', '63.00', 10, 7, 15, 17, '2019-03-11 20:53:33', '2019-03-11 20:53:33'),
(327, 1, 'Juvenil', 'masculino', '63.01', '68.00', 10, 7, 15, 17, '2019-03-11 20:53:33', '2019-03-11 20:53:33'),
(328, 1, 'Juvenil', 'masculino', '68.01', '73.00', 10, 7, 15, 17, '2019-03-11 20:53:33', '2019-03-11 20:53:33'),
(329, 1, 'Juvenil', 'masculino', '73.01', '78.00', 10, 7, 15, 17, '2019-03-11 20:53:33', '2019-03-11 20:53:33'),
(330, 1, 'Juvenil', 'masculino', '78.01', '500.00', 10, 7, 15, 17, '2019-03-11 20:53:33', '2019-03-11 20:53:33'),
(331, 1, 'Juvenil', 'feminino', '0.00', '42.00', 10, 7, 15, 17, '2019-03-11 20:53:33', '2019-03-11 20:53:33'),
(332, 1, 'Juvenil', 'feminino', '42.01', '44.00', 10, 7, 15, 17, '2019-03-11 20:53:33', '2019-03-11 20:53:33'),
(333, 1, 'Juvenil', 'feminino', '44.01', '46.00', 10, 7, 15, 17, '2019-03-11 20:53:33', '2019-03-11 20:53:33'),
(334, 1, 'Juvenil', 'feminino', '46.01', '49.00', 10, 7, 15, 17, '2019-03-11 20:53:33', '2019-03-11 20:53:33'),
(335, 1, 'Juvenil', 'feminino', '49.01', '52.00', 10, 7, 15, 17, '2019-03-11 20:53:33', '2019-03-11 20:53:33'),
(336, 1, 'Juvenil', 'feminino', '52.01', '55.00', 10, 7, 15, 17, '2019-03-11 20:53:33', '2019-03-11 20:53:33'),
(337, 1, 'Juvenil', 'feminino', '55.01', '59.00', 10, 7, 15, 17, '2019-03-11 20:53:33', '2019-03-11 20:53:33'),
(338, 1, 'Juvenil', 'feminino', '59.01', '63.00', 10, 7, 15, 17, '2019-03-11 20:53:34', '2019-03-11 20:53:34'),
(339, 1, 'Juvenil', 'feminino', '63.01', '68.00', 10, 7, 15, 17, '2019-03-11 20:53:34', '2019-03-11 20:53:34'),
(340, 1, 'Juvenil', 'feminino', '68.01', '500.00', 10, 7, 15, 17, '2019-03-11 20:53:34', '2019-03-11 20:53:34'),
(341, 1, 'Juvenil', 'masculino', '0.00', '45.00', 6, 4, 15, 17, '2019-03-11 20:53:34', '2019-03-11 20:53:34'),
(342, 1, 'Juvenil', 'masculino', '45.01', '48.00', 6, 4, 15, 17, '2019-03-11 20:53:34', '2019-03-11 20:53:34'),
(343, 1, 'Juvenil', 'masculino', '48.01', '51.00', 6, 4, 15, 17, '2019-03-11 20:53:34', '2019-03-11 20:53:34'),
(344, 1, 'Juvenil', 'masculino', '51.01', '55.00', 6, 4, 15, 17, '2019-03-11 20:53:34', '2019-03-11 20:53:34'),
(345, 1, 'Juvenil', 'masculino', '55.01', '59.00', 6, 4, 15, 17, '2019-03-11 20:53:34', '2019-03-11 20:53:34'),
(346, 1, 'Juvenil', 'masculino', '59.01', '63.00', 6, 4, 15, 17, '2019-03-11 20:53:34', '2019-03-11 20:53:34'),
(347, 1, 'Juvenil', 'masculino', '63.01', '68.00', 6, 4, 15, 17, '2019-03-11 20:53:34', '2019-03-11 20:53:34'),
(348, 1, 'Juvenil', 'masculino', '68.01', '73.00', 6, 4, 15, 17, '2019-03-11 20:53:34', '2019-03-11 20:53:34'),
(349, 1, 'Juvenil', 'masculino', '73.01', '78.00', 6, 4, 15, 17, '2019-03-11 20:53:34', '2019-03-11 20:53:34'),
(350, 1, 'Juvenil', 'masculino', '78.01', '500.00', 6, 4, 15, 17, '2019-03-11 20:53:34', '2019-03-11 20:53:34'),
(351, 1, 'Juvenil', 'feminino', '0.00', '42.00', 6, 4, 15, 17, '2019-03-11 20:53:34', '2019-03-11 20:53:34'),
(352, 1, 'Juvenil', 'feminino', '42.01', '44.00', 6, 4, 15, 17, '2019-03-11 20:53:34', '2019-03-11 20:53:34'),
(353, 1, 'Juvenil', 'feminino', '44.01', '46.00', 6, 4, 15, 17, '2019-03-11 20:53:34', '2019-03-11 20:53:34'),
(354, 1, 'Juvenil', 'feminino', '46.01', '49.00', 6, 4, 15, 17, '2019-03-11 20:53:34', '2019-03-11 20:53:34'),
(355, 1, 'Juvenil', 'feminino', '49.01', '52.00', 6, 4, 15, 17, '2019-03-11 20:53:34', '2019-03-11 20:53:34'),
(356, 1, 'Juvenil', 'feminino', '52.01', '55.00', 6, 4, 15, 17, '2019-03-11 20:53:34', '2019-03-11 20:53:34'),
(357, 1, 'Juvenil', 'feminino', '55.01', '59.00', 6, 4, 15, 17, '2019-03-11 20:53:34', '2019-03-11 20:53:34'),
(358, 1, 'Juvenil', 'feminino', '59.01', '63.00', 6, 4, 15, 17, '2019-03-11 20:53:34', '2019-03-11 20:53:34'),
(359, 1, 'Juvenil', 'feminino', '63.01', '68.00', 6, 4, 15, 17, '2019-03-11 20:53:34', '2019-03-11 20:53:34'),
(360, 1, 'Juvenil', 'feminino', '68.01', '500.00', 6, 4, 15, 17, '2019-03-11 20:53:34', '2019-03-11 20:53:34'),
(361, 1, 'Juvenil', 'masculino', '0.00', '45.00', 3, 1, 15, 17, '2019-03-11 20:53:34', '2019-03-11 20:53:34'),
(362, 1, 'Juvenil', 'masculino', '45.01', '48.00', 3, 1, 15, 17, '2019-03-11 20:53:34', '2019-03-11 20:53:34'),
(363, 1, 'Juvenil', 'masculino', '48.01', '51.00', 3, 1, 15, 17, '2019-03-11 20:53:34', '2019-03-11 20:53:34'),
(364, 1, 'Juvenil', 'masculino', '51.01', '55.00', 3, 1, 15, 17, '2019-03-11 20:53:35', '2019-03-11 20:53:35'),
(365, 1, 'Juvenil', 'masculino', '55.01', '59.00', 3, 1, 15, 17, '2019-03-11 20:53:35', '2019-03-11 20:53:35'),
(366, 1, 'Juvenil', 'masculino', '59.01', '63.00', 3, 1, 15, 17, '2019-03-11 20:53:35', '2019-03-11 20:53:35'),
(367, 1, 'Juvenil', 'masculino', '63.01', '68.00', 3, 1, 15, 17, '2019-03-11 20:53:35', '2019-03-11 20:53:35'),
(368, 1, 'Juvenil', 'masculino', '68.01', '73.00', 3, 1, 15, 17, '2019-03-11 20:53:35', '2019-03-11 20:53:35'),
(369, 1, 'Juvenil', 'masculino', '73.01', '78.00', 3, 1, 15, 17, '2019-03-11 20:53:35', '2019-03-11 20:53:35'),
(370, 1, 'Juvenil', 'masculino', '78.01', '500.00', 3, 1, 15, 17, '2019-03-11 20:53:35', '2019-03-11 20:53:35'),
(371, 1, 'Juvenil', 'feminino', '0.00', '42.00', 3, 1, 15, 17, '2019-03-11 20:53:35', '2019-03-11 20:53:35'),
(372, 1, 'Juvenil', 'feminino', '42.01', '44.00', 3, 1, 15, 17, '2019-03-11 20:53:35', '2019-03-11 20:53:35'),
(373, 1, 'Juvenil', 'feminino', '44.01', '46.00', 3, 1, 15, 17, '2019-03-11 20:53:35', '2019-03-11 20:53:35'),
(374, 1, 'Juvenil', 'feminino', '46.01', '49.00', 3, 1, 15, 17, '2019-03-11 20:53:35', '2019-03-11 20:53:35'),
(375, 1, 'Juvenil', 'feminino', '49.01', '52.00', 3, 1, 15, 17, '2019-03-11 20:53:35', '2019-03-11 20:53:35'),
(376, 1, 'Juvenil', 'feminino', '52.01', '55.00', 3, 1, 15, 17, '2019-03-11 20:53:35', '2019-03-11 20:53:35'),
(377, 1, 'Juvenil', 'feminino', '55.01', '59.00', 3, 1, 15, 17, '2019-03-11 20:53:35', '2019-03-11 20:53:35'),
(378, 1, 'Juvenil', 'feminino', '59.01', '63.00', 3, 1, 15, 17, '2019-03-11 20:53:35', '2019-03-11 20:53:35'),
(379, 1, 'Juvenil', 'feminino', '63.01', '68.00', 3, 1, 15, 17, '2019-03-11 20:53:35', '2019-03-11 20:53:35'),
(380, 1, 'Juvenil', 'feminino', '68.01', '500.00', 3, 1, 15, 17, '2019-03-11 20:53:35', '2019-03-11 20:53:35'),
(381, 1, 'Juvenil', 'masculino', '0.00', '45.00', -99, -99, 15, 17, '2019-03-11 20:53:35', '2019-03-11 20:53:35'),
(382, 1, 'Juvenil', 'masculino', '45.01', '48.00', -99, -99, 15, 17, '2019-03-11 20:53:35', '2019-03-11 20:53:35'),
(383, 1, 'Juvenil', 'masculino', '48.01', '51.00', -99, -99, 15, 17, '2019-03-11 20:53:35', '2019-03-11 20:53:35'),
(384, 1, 'Juvenil', 'masculino', '51.01', '55.00', -99, -99, 15, 17, '2019-03-11 20:53:35', '2019-03-11 20:53:35'),
(385, 1, 'Juvenil', 'masculino', '55.01', '59.00', -99, -99, 15, 17, '2019-03-11 20:53:35', '2019-03-11 20:53:35'),
(386, 1, 'Juvenil', 'masculino', '59.01', '63.00', -99, -99, 15, 17, '2019-03-11 20:53:36', '2019-03-11 20:53:36'),
(387, 1, 'Juvenil', 'masculino', '63.01', '68.00', -99, -99, 15, 17, '2019-03-11 20:53:36', '2019-03-11 20:53:36'),
(388, 1, 'Juvenil', 'masculino', '68.01', '73.00', -99, -99, 15, 17, '2019-03-11 20:53:36', '2019-03-11 20:53:36'),
(389, 1, 'Juvenil', 'masculino', '73.01', '78.00', -99, -99, 15, 17, '2019-03-11 20:53:36', '2019-03-11 20:53:36'),
(390, 1, 'Juvenil', 'masculino', '78.01', '500.00', -99, -99, 15, 17, '2019-03-11 20:53:36', '2019-03-11 20:53:36'),
(391, 1, 'Juvenil', 'feminino', '0.00', '42.00', -99, -99, 15, 17, '2019-03-11 20:53:36', '2019-03-11 20:53:36'),
(392, 1, 'Juvenil', 'feminino', '42.01', '44.00', -99, -99, 15, 17, '2019-03-11 20:53:36', '2019-03-11 20:53:36'),
(393, 1, 'Juvenil', 'feminino', '44.01', '46.00', -99, -99, 15, 17, '2019-03-11 20:53:36', '2019-03-11 20:53:36'),
(394, 1, 'Juvenil', 'feminino', '46.01', '49.00', -99, -99, 15, 17, '2019-03-11 20:53:36', '2019-03-11 20:53:36'),
(395, 1, 'Juvenil', 'feminino', '49.01', '52.00', -99, -99, 15, 17, '2019-03-11 20:53:36', '2019-03-11 20:53:36'),
(396, 1, 'Juvenil', 'feminino', '52.01', '55.00', -99, -99, 15, 17, '2019-03-11 20:53:36', '2019-03-11 20:53:36'),
(397, 1, 'Juvenil', 'feminino', '55.01', '59.00', -99, -99, 15, 17, '2019-03-11 20:53:36', '2019-03-11 20:53:36'),
(398, 1, 'Juvenil', 'feminino', '59.01', '63.00', -99, -99, 15, 17, '2019-03-11 20:53:36', '2019-03-11 20:53:36'),
(399, 1, 'Juvenil', 'feminino', '63.01', '68.00', -99, -99, 15, 17, '2019-03-11 20:53:36', '2019-03-11 20:53:36'),
(400, 1, 'Juvenil', 'feminino', '68.01', '500.00', -99, -99, 15, 17, '2019-03-11 20:53:36', '2019-03-11 20:53:36'),
(401, 1, 'Adulto', 'masculino', '0.00', '54.00', 10, 7, 18, 30, '2019-03-11 20:53:36', '2019-03-11 20:53:36'),
(402, 1, 'Adulto', 'masculino', '54.01', '58.00', 10, 7, 18, 30, '2019-03-11 20:53:36', '2019-03-11 20:53:36'),
(403, 1, 'Adulto', 'masculino', '58.01', '63.00', 10, 7, 18, 30, '2019-03-11 20:53:36', '2019-03-11 20:53:36'),
(404, 1, 'Adulto', 'masculino', '63.01', '68.00', 10, 7, 18, 30, '2019-03-11 20:53:36', '2019-03-11 20:53:36'),
(405, 1, 'Adulto', 'masculino', '68.01', '74.00', 10, 7, 18, 30, '2019-03-11 20:53:36', '2019-03-11 20:53:36'),
(406, 1, 'Adulto', 'masculino', '74.01', '80.00', 10, 7, 18, 30, '2019-03-11 20:53:36', '2019-03-11 20:53:36'),
(407, 1, 'Adulto', 'masculino', '80.01', '87.00', 10, 7, 18, 30, '2019-03-11 20:53:36', '2019-03-11 20:53:36'),
(408, 1, 'Adulto', 'masculino', '87.01', '500.00', 10, 7, 18, 30, '2019-03-11 20:53:36', '2019-03-11 20:53:36'),
(409, 1, 'Adulto', 'feminino', '0.00', '46.00', 10, 7, 18, 30, '2019-03-11 20:53:36', '2019-03-11 20:53:36'),
(410, 1, 'Adulto', 'feminino', '46.01', '49.00', 10, 7, 18, 30, '2019-03-11 20:53:36', '2019-03-11 20:53:36'),
(411, 1, 'Adulto', 'feminino', '49.01', '53.00', 10, 7, 18, 30, '2019-03-11 20:53:36', '2019-03-11 20:53:36'),
(412, 1, 'Adulto', 'feminino', '53.01', '57.00', 10, 7, 18, 30, '2019-03-11 20:53:36', '2019-03-11 20:53:36'),
(413, 1, 'Adulto', 'feminino', '57.01', '63.00', 10, 7, 18, 30, '2019-03-11 20:53:36', '2019-03-11 20:53:36'),
(414, 1, 'Adulto', 'feminino', '63.01', '67.00', 10, 7, 18, 30, '2019-03-11 20:53:36', '2019-03-11 20:53:36'),
(415, 1, 'Adulto', 'feminino', '67.01', '73.00', 10, 7, 18, 30, '2019-03-11 20:53:37', '2019-03-11 20:53:37'),
(416, 1, 'Adulto', 'feminino', '73.01', '500.00', 10, 7, 18, 30, '2019-03-11 20:53:37', '2019-03-11 20:53:37'),
(417, 1, 'Adulto', 'masculino', '0.00', '54.00', 6, 4, 18, 30, '2019-03-11 20:53:37', '2019-03-11 20:53:37'),
(418, 1, 'Adulto', 'masculino', '54.01', '58.00', 6, 4, 18, 30, '2019-03-11 20:53:37', '2019-03-11 20:53:37'),
(419, 1, 'Adulto', 'masculino', '58.01', '63.00', 6, 4, 18, 30, '2019-03-11 20:53:37', '2019-03-11 20:53:37'),
(420, 1, 'Adulto', 'masculino', '63.01', '68.00', 6, 4, 18, 30, '2019-03-11 20:53:37', '2019-03-11 20:53:37'),
(421, 1, 'Adulto', 'masculino', '68.01', '74.00', 6, 4, 18, 30, '2019-03-11 20:53:37', '2019-03-11 20:53:37'),
(422, 1, 'Adulto', 'masculino', '74.01', '80.00', 6, 4, 18, 30, '2019-03-11 20:53:37', '2019-03-11 20:53:37'),
(423, 1, 'Adulto', 'masculino', '80.01', '87.00', 6, 4, 18, 30, '2019-03-11 20:53:37', '2019-03-11 20:53:37'),
(424, 1, 'Adulto', 'masculino', '87.01', '500.00', 6, 4, 18, 30, '2019-03-11 20:53:37', '2019-03-11 20:53:37'),
(425, 1, 'Adulto', 'feminino', '0.00', '46.00', 6, 4, 18, 30, '2019-03-11 20:53:37', '2019-03-11 20:53:37'),
(426, 1, 'Adulto', 'feminino', '46.01', '49.00', 6, 4, 18, 30, '2019-03-11 20:53:37', '2019-03-11 20:53:37'),
(427, 1, 'Adulto', 'feminino', '49.01', '53.00', 6, 4, 18, 30, '2019-03-11 20:53:37', '2019-03-11 20:53:37'),
(428, 1, 'Adulto', 'feminino', '53.01', '57.00', 6, 4, 18, 30, '2019-03-11 20:53:37', '2019-03-11 20:53:37'),
(429, 1, 'Adulto', 'feminino', '57.01', '63.00', 6, 4, 18, 30, '2019-03-11 20:53:37', '2019-03-11 20:53:37'),
(430, 1, 'Adulto', 'feminino', '63.01', '67.00', 6, 4, 18, 30, '2019-03-11 20:53:37', '2019-03-11 20:53:37'),
(431, 1, 'Adulto', 'feminino', '67.01', '73.00', 6, 4, 18, 30, '2019-03-11 20:53:37', '2019-03-11 20:53:37'),
(432, 1, 'Adulto', 'feminino', '73.01', '500.00', 6, 4, 18, 30, '2019-03-11 20:53:37', '2019-03-11 20:53:37'),
(433, 1, 'Adulto', 'masculino', '0.00', '54.00', 3, 1, 18, 30, '2019-03-11 20:53:37', '2019-03-11 20:53:37'),
(434, 1, 'Adulto', 'masculino', '54.01', '58.00', 3, 1, 18, 30, '2019-03-11 20:53:37', '2019-03-11 20:53:37'),
(435, 1, 'Adulto', 'masculino', '58.01', '63.00', 3, 1, 18, 30, '2019-03-11 20:53:37', '2019-03-11 20:53:37'),
(436, 1, 'Adulto', 'masculino', '63.01', '68.00', 3, 1, 18, 30, '2019-03-11 20:53:37', '2019-03-11 20:53:37'),
(437, 1, 'Adulto', 'masculino', '68.01', '74.00', 3, 1, 18, 30, '2019-03-11 20:53:37', '2019-03-11 20:53:37'),
(438, 1, 'Adulto', 'masculino', '74.01', '80.00', 3, 1, 18, 30, '2019-03-11 20:53:38', '2019-03-11 20:53:38'),
(439, 1, 'Adulto', 'masculino', '80.01', '87.00', 3, 1, 18, 30, '2019-03-11 20:53:38', '2019-03-11 20:53:38'),
(440, 1, 'Adulto', 'masculino', '87.01', '500.00', 3, 1, 18, 30, '2019-03-11 20:53:38', '2019-03-11 20:53:38'),
(441, 1, 'Adulto', 'feminino', '0.00', '46.00', 3, 1, 18, 30, '2019-03-11 20:53:38', '2019-03-11 20:53:38'),
(442, 1, 'Adulto', 'feminino', '46.01', '49.00', 3, 1, 18, 30, '2019-03-11 20:53:38', '2019-03-11 20:53:38'),
(443, 1, 'Adulto', 'feminino', '49.01', '53.00', 3, 1, 18, 30, '2019-03-11 20:53:38', '2019-03-11 20:53:38'),
(444, 1, 'Adulto', 'feminino', '53.01', '57.00', 3, 1, 18, 30, '2019-03-11 20:53:38', '2019-03-11 20:53:38'),
(445, 1, 'Adulto', 'feminino', '57.01', '63.00', 3, 1, 18, 30, '2019-03-11 20:53:38', '2019-03-11 20:53:38'),
(446, 1, 'Adulto', 'feminino', '63.01', '67.00', 3, 1, 18, 30, '2019-03-11 20:53:38', '2019-03-11 20:53:38'),
(447, 1, 'Adulto', 'feminino', '67.01', '73.00', 3, 1, 18, 30, '2019-03-11 20:53:38', '2019-03-11 20:53:38'),
(448, 1, 'Adulto', 'feminino', '73.01', '500.00', 3, 1, 18, 30, '2019-03-11 20:53:38', '2019-03-11 20:53:38'),
(449, 1, 'Adulto', 'masculino', '0.00', '54.00', -99, -99, 18, 30, '2019-03-11 20:53:38', '2019-03-11 20:53:38'),
(450, 1, 'Adulto', 'masculino', '54.01', '58.00', -99, -99, 18, 30, '2019-03-11 20:53:38', '2019-03-11 20:53:38'),
(451, 1, 'Adulto', 'masculino', '58.01', '63.00', -99, -99, 18, 30, '2019-03-11 20:53:38', '2019-03-11 20:53:38'),
(452, 1, 'Adulto', 'masculino', '63.01', '68.00', -99, -99, 18, 30, '2019-03-11 20:53:38', '2019-03-11 20:53:38'),
(453, 1, 'Adulto', 'masculino', '68.01', '74.00', -99, -99, 18, 30, '2019-03-11 20:53:39', '2019-03-11 20:53:39'),
(454, 1, 'Adulto', 'masculino', '74.01', '80.00', -99, -99, 18, 30, '2019-03-11 20:53:39', '2019-03-11 20:53:39'),
(455, 1, 'Adulto', 'masculino', '80.01', '87.00', -99, -99, 18, 30, '2019-03-11 20:53:39', '2019-03-11 20:53:39');
INSERT INTO `categorias` (`id`, `artemarcial_id`, `nome`, `sexo`, `menorPeso`, `maiorPeso`, `graduacaoMenor`, `graduacaoMaior`, `idadeMenor`, `idadeMaior`, `created_at`, `updated_at`) VALUES
(456, 1, 'Adulto', 'masculino', '87.01', '500.00', -99, -99, 18, 30, '2019-03-11 20:53:39', '2019-03-11 20:53:39'),
(457, 1, 'Adulto', 'feminino', '0.00', '46.00', -99, -99, 18, 30, '2019-03-11 20:53:39', '2019-03-11 20:53:39'),
(458, 1, 'Adulto', 'feminino', '46.01', '49.00', -99, -99, 18, 30, '2019-03-11 20:53:39', '2019-03-11 20:53:39'),
(459, 1, 'Adulto', 'feminino', '49.01', '53.00', -99, -99, 18, 30, '2019-03-11 20:53:39', '2019-03-11 20:53:39'),
(460, 1, 'Adulto', 'feminino', '53.01', '57.00', -99, -99, 18, 30, '2019-03-11 20:53:39', '2019-03-11 20:53:39'),
(461, 1, 'Adulto', 'feminino', '57.01', '63.00', -99, -99, 18, 30, '2019-03-11 20:53:39', '2019-03-11 20:53:39'),
(462, 1, 'Adulto', 'feminino', '63.01', '67.00', -99, -99, 18, 30, '2019-03-11 20:53:39', '2019-03-11 20:53:39'),
(463, 1, 'Adulto', 'feminino', '67.01', '73.00', -99, -99, 18, 30, '2019-03-11 20:53:39', '2019-03-11 20:53:39'),
(464, 1, 'Adulto', 'feminino', '73.01', '500.00', -99, -99, 18, 30, '2019-03-11 20:53:39', '2019-03-11 20:53:39'),
(465, 1, 'Master 1', 'masculino', '0.00', '54.00', 10, 7, 31, 35, '2019-03-11 20:53:39', '2019-03-11 20:53:39'),
(466, 1, 'Master 1', 'masculino', '54.01', '58.00', 10, 7, 31, 35, '2019-03-11 20:53:39', '2019-03-11 20:53:39'),
(467, 1, 'Master 1', 'masculino', '58.01', '63.00', 10, 7, 31, 35, '2019-03-11 20:53:39', '2019-03-11 20:53:39'),
(468, 1, 'Master 1', 'masculino', '63.01', '68.00', 10, 7, 31, 35, '2019-03-11 20:53:39', '2019-03-11 20:53:39'),
(469, 1, 'Master 1', 'masculino', '68.01', '74.00', 10, 7, 31, 35, '2019-03-11 20:53:39', '2019-03-11 20:53:39'),
(470, 1, 'Master 1', 'masculino', '74.01', '80.00', 10, 7, 31, 35, '2019-03-11 20:53:39', '2019-03-11 20:53:39'),
(471, 1, 'Master 1', 'masculino', '80.01', '87.00', 10, 7, 31, 35, '2019-03-11 20:53:39', '2019-03-11 20:53:39'),
(472, 1, 'Master 1', 'masculino', '87.01', '500.00', 10, 7, 31, 35, '2019-03-11 20:53:39', '2019-03-11 20:53:39'),
(473, 1, 'Master 1', 'feminino', '0.00', '46.00', 10, 7, 31, 35, '2019-03-11 20:53:39', '2019-03-11 20:53:39'),
(474, 1, 'Master 1', 'feminino', '46.01', '49.00', 10, 7, 31, 35, '2019-03-11 20:53:40', '2019-03-11 20:53:40'),
(475, 1, 'Master 1', 'feminino', '49.01', '53.00', 10, 7, 31, 35, '2019-03-11 20:53:40', '2019-03-11 20:53:40'),
(476, 1, 'Master 1', 'feminino', '53.01', '57.00', 10, 7, 31, 35, '2019-03-11 20:53:40', '2019-03-11 20:53:40'),
(477, 1, 'Master 1', 'feminino', '57.01', '63.00', 10, 7, 31, 35, '2019-03-11 20:53:40', '2019-03-11 20:53:40'),
(478, 1, 'Master 1', 'feminino', '63.01', '67.00', 10, 7, 31, 35, '2019-03-11 20:53:40', '2019-03-11 20:53:40'),
(479, 1, 'Master 1', 'feminino', '67.01', '73.00', 10, 7, 31, 35, '2019-03-11 20:53:40', '2019-03-11 20:53:40'),
(480, 1, 'Master 1', 'feminino', '73.01', '500.00', 10, 7, 31, 35, '2019-03-11 20:53:40', '2019-03-11 20:53:40'),
(481, 1, 'Master 1', 'masculino', '0.00', '54.00', 6, 4, 31, 35, '2019-03-11 20:53:40', '2019-03-11 20:53:40'),
(482, 1, 'Master 1', 'masculino', '54.01', '58.00', 6, 4, 31, 35, '2019-03-11 20:53:40', '2019-03-11 20:53:40'),
(483, 1, 'Master 1', 'masculino', '58.01', '63.00', 6, 4, 31, 35, '2019-03-11 20:53:40', '2019-03-11 20:53:40'),
(484, 1, 'Master 1', 'masculino', '63.01', '68.00', 6, 4, 31, 35, '2019-03-11 20:53:40', '2019-03-11 20:53:40'),
(485, 1, 'Master 1', 'masculino', '68.01', '74.00', 6, 4, 31, 35, '2019-03-11 20:53:40', '2019-03-11 20:53:40'),
(486, 1, 'Master 1', 'masculino', '74.01', '80.00', 6, 4, 31, 35, '2019-03-11 20:53:40', '2019-03-11 20:53:40'),
(487, 1, 'Master 1', 'masculino', '80.01', '87.00', 6, 4, 31, 35, '2019-03-11 20:53:40', '2019-03-11 20:53:40'),
(488, 1, 'Master 1', 'masculino', '87.01', '500.00', 6, 4, 31, 35, '2019-03-11 20:53:40', '2019-03-11 20:53:40'),
(489, 1, 'Master 1', 'feminino', '0.00', '46.00', 6, 4, 31, 35, '2019-03-11 20:53:40', '2019-03-11 20:53:40'),
(490, 1, 'Master 1', 'feminino', '46.01', '49.00', 6, 4, 31, 35, '2019-03-11 20:53:40', '2019-03-11 20:53:40'),
(491, 1, 'Master 1', 'feminino', '49.01', '53.00', 6, 4, 31, 35, '2019-03-11 20:53:40', '2019-03-11 20:53:40'),
(492, 1, 'Master 1', 'feminino', '53.01', '57.00', 6, 4, 31, 35, '2019-03-11 20:53:40', '2019-03-11 20:53:40'),
(493, 1, 'Master 1', 'feminino', '57.01', '63.00', 6, 4, 31, 35, '2019-03-11 20:53:40', '2019-03-11 20:53:40'),
(494, 1, 'Master 1', 'feminino', '63.01', '67.00', 6, 4, 31, 35, '2019-03-11 20:53:40', '2019-03-11 20:53:40'),
(495, 1, 'Master 1', 'feminino', '67.01', '73.00', 6, 4, 31, 35, '2019-03-11 20:53:40', '2019-03-11 20:53:40'),
(496, 1, 'Master 1', 'feminino', '73.01', '500.00', 6, 4, 31, 35, '2019-03-11 20:53:40', '2019-03-11 20:53:40'),
(497, 1, 'Master 1', 'masculino', '0.00', '54.00', 3, 1, 31, 35, '2019-03-11 20:53:40', '2019-03-11 20:53:40'),
(498, 1, 'Master 1', 'masculino', '54.01', '58.00', 3, 1, 31, 35, '2019-03-11 20:53:41', '2019-03-11 20:53:41'),
(499, 1, 'Master 1', 'masculino', '58.01', '63.00', 3, 1, 31, 35, '2019-03-11 20:53:41', '2019-03-11 20:53:41'),
(500, 1, 'Master 1', 'masculino', '63.01', '68.00', 3, 1, 31, 35, '2019-03-11 20:53:41', '2019-03-11 20:53:41'),
(501, 1, 'Master 1', 'masculino', '68.01', '74.00', 3, 1, 31, 35, '2019-03-11 20:53:41', '2019-03-11 20:53:41'),
(502, 1, 'Master 1', 'masculino', '74.01', '80.00', 3, 1, 31, 35, '2019-03-11 20:53:41', '2019-03-11 20:53:41'),
(503, 1, 'Master 1', 'masculino', '80.01', '87.00', 3, 1, 31, 35, '2019-03-11 20:53:41', '2019-03-11 20:53:41'),
(504, 1, 'Master 1', 'masculino', '87.01', '500.00', 3, 1, 31, 35, '2019-03-11 20:53:41', '2019-03-11 20:53:41'),
(505, 1, 'Master 1', 'feminino', '0.00', '46.00', 3, 1, 31, 35, '2019-03-11 20:53:41', '2019-03-11 20:53:41'),
(506, 1, 'Master 1', 'feminino', '46.01', '49.00', 3, 1, 31, 35, '2019-03-11 20:53:41', '2019-03-11 20:53:41'),
(507, 1, 'Master 1', 'feminino', '49.01', '53.00', 3, 1, 31, 35, '2019-03-11 20:53:41', '2019-03-11 20:53:41'),
(508, 1, 'Master 1', 'feminino', '53.01', '57.00', 3, 1, 31, 35, '2019-03-11 20:53:41', '2019-03-11 20:53:41'),
(509, 1, 'Master 1', 'feminino', '57.01', '63.00', 3, 1, 31, 35, '2019-03-11 20:53:41', '2019-03-11 20:53:41'),
(510, 1, 'Master 1', 'feminino', '63.01', '67.00', 3, 1, 31, 35, '2019-03-11 20:53:41', '2019-03-11 20:53:41'),
(511, 1, 'Master 1', 'feminino', '67.01', '73.00', 3, 1, 31, 35, '2019-03-11 20:53:41', '2019-03-11 20:53:41'),
(512, 1, 'Master 1', 'feminino', '73.01', '500.00', 3, 1, 31, 35, '2019-03-11 20:53:41', '2019-03-11 20:53:41'),
(513, 1, 'Master 1', 'masculino', '0.00', '54.00', -99, -99, 31, 35, '2019-03-11 20:53:41', '2019-03-11 20:53:41'),
(514, 1, 'Master 1', 'masculino', '54.01', '58.00', -99, -99, 31, 35, '2019-03-11 20:53:41', '2019-03-11 20:53:41'),
(515, 1, 'Master 1', 'masculino', '58.01', '63.00', -99, -99, 31, 35, '2019-03-11 20:53:41', '2019-03-11 20:53:41'),
(516, 1, 'Master 1', 'masculino', '63.01', '68.00', -99, -99, 31, 35, '2019-03-11 20:53:41', '2019-03-11 20:53:41'),
(517, 1, 'Master 1', 'masculino', '68.01', '74.00', -99, -99, 31, 35, '2019-03-11 20:53:41', '2019-03-11 20:53:41'),
(518, 1, 'Master 1', 'masculino', '74.01', '80.00', -99, -99, 31, 35, '2019-03-11 20:53:41', '2019-03-11 20:53:41'),
(519, 1, 'Master 1', 'masculino', '80.01', '87.00', -99, -99, 31, 35, '2019-03-11 20:53:41', '2019-03-11 20:53:41'),
(520, 1, 'Master 1', 'masculino', '87.01', '500.00', -99, -99, 31, 35, '2019-03-11 20:53:41', '2019-03-11 20:53:41'),
(521, 1, 'Master 1', 'feminino', '0.00', '46.00', -99, -99, 31, 35, '2019-03-11 20:53:41', '2019-03-11 20:53:41'),
(522, 1, 'Master 1', 'feminino', '46.01', '49.00', -99, -99, 31, 35, '2019-03-11 20:53:41', '2019-03-11 20:53:41'),
(523, 1, 'Master 1', 'feminino', '49.01', '53.00', -99, -99, 31, 35, '2019-03-11 20:53:41', '2019-03-11 20:53:41'),
(524, 1, 'Master 1', 'feminino', '53.01', '57.00', -99, -99, 31, 35, '2019-03-11 20:53:41', '2019-03-11 20:53:41'),
(525, 1, 'Master 1', 'feminino', '57.01', '63.00', -99, -99, 31, 35, '2019-03-11 20:53:41', '2019-03-11 20:53:41'),
(526, 1, 'Master 1', 'feminino', '63.01', '67.00', -99, -99, 31, 35, '2019-03-11 20:53:41', '2019-03-11 20:53:41'),
(527, 1, 'Master 1', 'feminino', '67.01', '73.00', -99, -99, 31, 35, '2019-03-11 20:53:41', '2019-03-11 20:53:41'),
(528, 1, 'Master 1', 'feminino', '73.01', '500.00', -99, -99, 31, 35, '2019-03-11 20:53:42', '2019-03-11 20:53:42'),
(529, 1, 'Master 2', 'masculino', '0.00', '54.00', 10, 7, 36, 40, '2019-03-11 20:53:42', '2019-03-11 20:53:42'),
(530, 1, 'Master 2', 'masculino', '54.01', '58.00', 10, 7, 36, 40, '2019-03-11 20:53:42', '2019-03-11 20:53:42'),
(531, 1, 'Master 2', 'masculino', '58.01', '63.00', 10, 7, 36, 40, '2019-03-11 20:53:42', '2019-03-11 20:53:42'),
(532, 1, 'Master 2', 'masculino', '63.01', '68.00', 10, 7, 36, 40, '2019-03-11 20:53:42', '2019-03-11 20:53:42'),
(533, 1, 'Master 2', 'masculino', '68.01', '74.00', 10, 7, 36, 40, '2019-03-11 20:53:42', '2019-03-11 20:53:42'),
(534, 1, 'Master 2', 'masculino', '74.01', '80.00', 10, 7, 36, 40, '2019-03-11 20:53:42', '2019-03-11 20:53:42'),
(535, 1, 'Master 2', 'masculino', '80.01', '87.00', 10, 7, 36, 40, '2019-03-11 20:53:42', '2019-03-11 20:53:42'),
(536, 1, 'Master 2', 'masculino', '87.01', '500.00', 10, 7, 36, 40, '2019-03-11 20:53:42', '2019-03-11 20:53:42'),
(537, 1, 'Master 2', 'feminino', '0.00', '46.00', 10, 7, 36, 40, '2019-03-11 20:53:42', '2019-03-11 20:53:42'),
(538, 1, 'Master 2', 'feminino', '46.01', '49.00', 10, 7, 36, 40, '2019-03-11 20:53:42', '2019-03-11 20:53:42'),
(539, 1, 'Master 2', 'feminino', '49.01', '53.00', 10, 7, 36, 40, '2019-03-11 20:53:42', '2019-03-11 20:53:42'),
(540, 1, 'Master 2', 'feminino', '53.01', '57.00', 10, 7, 36, 40, '2019-03-11 20:53:42', '2019-03-11 20:53:42'),
(541, 1, 'Master 2', 'feminino', '57.01', '63.00', 10, 7, 36, 40, '2019-03-11 20:53:42', '2019-03-11 20:53:42'),
(542, 1, 'Master 2', 'feminino', '63.01', '67.00', 10, 7, 36, 40, '2019-03-11 20:53:42', '2019-03-11 20:53:42'),
(543, 1, 'Master 2', 'feminino', '67.01', '73.00', 10, 7, 36, 40, '2019-03-11 20:53:42', '2019-03-11 20:53:42'),
(544, 1, 'Master 2', 'feminino', '73.01', '500.00', 10, 7, 36, 40, '2019-03-11 20:53:42', '2019-03-11 20:53:42'),
(545, 1, 'Master 2', 'masculino', '0.00', '54.00', 6, 4, 36, 40, '2019-03-11 20:53:42', '2019-03-11 20:53:42'),
(546, 1, 'Master 2', 'masculino', '54.01', '58.00', 6, 4, 36, 40, '2019-03-11 20:53:42', '2019-03-11 20:53:42'),
(547, 1, 'Master 2', 'masculino', '58.01', '63.00', 6, 4, 36, 40, '2019-03-11 20:53:42', '2019-03-11 20:53:42'),
(548, 1, 'Master 2', 'masculino', '63.01', '68.00', 6, 4, 36, 40, '2019-03-11 20:53:42', '2019-03-11 20:53:42'),
(549, 1, 'Master 2', 'masculino', '68.01', '74.00', 6, 4, 36, 40, '2019-03-11 20:53:42', '2019-03-11 20:53:42'),
(550, 1, 'Master 2', 'masculino', '74.01', '80.00', 6, 4, 36, 40, '2019-03-11 20:53:42', '2019-03-11 20:53:42'),
(551, 1, 'Master 2', 'masculino', '80.01', '87.00', 6, 4, 36, 40, '2019-03-11 20:53:42', '2019-03-11 20:53:42'),
(552, 1, 'Master 2', 'masculino', '87.01', '500.00', 6, 4, 36, 40, '2019-03-11 20:53:42', '2019-03-11 20:53:42'),
(553, 1, 'Master 2', 'feminino', '0.00', '46.00', 6, 4, 36, 40, '2019-03-11 20:53:42', '2019-03-11 20:53:42'),
(554, 1, 'Master 2', 'feminino', '46.01', '49.00', 6, 4, 36, 40, '2019-03-11 20:53:42', '2019-03-11 20:53:42'),
(555, 1, 'Master 2', 'feminino', '49.01', '53.00', 6, 4, 36, 40, '2019-03-11 20:53:43', '2019-03-11 20:53:43'),
(556, 1, 'Master 2', 'feminino', '53.01', '57.00', 6, 4, 36, 40, '2019-03-11 20:53:43', '2019-03-11 20:53:43'),
(557, 1, 'Master 2', 'feminino', '57.01', '63.00', 6, 4, 36, 40, '2019-03-11 20:53:43', '2019-03-11 20:53:43'),
(558, 1, 'Master 2', 'feminino', '63.01', '67.00', 6, 4, 36, 40, '2019-03-11 20:53:43', '2019-03-11 20:53:43'),
(559, 1, 'Master 2', 'feminino', '67.01', '73.00', 6, 4, 36, 40, '2019-03-11 20:53:43', '2019-03-11 20:53:43'),
(560, 1, 'Master 2', 'feminino', '73.01', '500.00', 6, 4, 36, 40, '2019-03-11 20:53:43', '2019-03-11 20:53:43'),
(561, 1, 'Master 2', 'masculino', '0.00', '54.00', 3, 1, 36, 40, '2019-03-11 20:53:43', '2019-03-11 20:53:43'),
(562, 1, 'Master 2', 'masculino', '54.01', '58.00', 3, 1, 36, 40, '2019-03-11 20:53:43', '2019-03-11 20:53:43'),
(563, 1, 'Master 2', 'masculino', '58.01', '63.00', 3, 1, 36, 40, '2019-03-11 20:53:43', '2019-03-11 20:53:43'),
(564, 1, 'Master 2', 'masculino', '63.01', '68.00', 3, 1, 36, 40, '2019-03-11 20:53:43', '2019-03-11 20:53:43'),
(565, 1, 'Master 2', 'masculino', '68.01', '74.00', 3, 1, 36, 40, '2019-03-11 20:53:43', '2019-03-11 20:53:43'),
(566, 1, 'Master 2', 'masculino', '74.01', '80.00', 3, 1, 36, 40, '2019-03-11 20:53:43', '2019-03-11 20:53:43'),
(567, 1, 'Master 2', 'masculino', '80.01', '87.00', 3, 1, 36, 40, '2019-03-11 20:53:43', '2019-03-11 20:53:43'),
(568, 1, 'Master 2', 'masculino', '87.01', '500.00', 3, 1, 36, 40, '2019-03-11 20:53:43', '2019-03-11 20:53:43'),
(569, 1, 'Master 2', 'feminino', '0.00', '46.00', 3, 1, 36, 40, '2019-03-11 20:53:43', '2019-03-11 20:53:43'),
(570, 1, 'Master 2', 'feminino', '46.01', '49.00', 3, 1, 36, 40, '2019-03-11 20:53:43', '2019-03-11 20:53:43'),
(571, 1, 'Master 2', 'feminino', '49.01', '53.00', 3, 1, 36, 40, '2019-03-11 20:53:43', '2019-03-11 20:53:43'),
(572, 1, 'Master 2', 'feminino', '53.01', '57.00', 3, 1, 36, 40, '2019-03-11 20:53:43', '2019-03-11 20:53:43'),
(573, 1, 'Master 2', 'feminino', '57.01', '63.00', 3, 1, 36, 40, '2019-03-11 20:53:43', '2019-03-11 20:53:43'),
(574, 1, 'Master 2', 'feminino', '63.01', '67.00', 3, 1, 36, 40, '2019-03-11 20:53:43', '2019-03-11 20:53:43'),
(575, 1, 'Master 2', 'feminino', '67.01', '73.00', 3, 1, 36, 40, '2019-03-11 20:53:43', '2019-03-11 20:53:43'),
(576, 1, 'Master 2', 'feminino', '73.01', '500.00', 3, 1, 36, 40, '2019-03-11 20:53:43', '2019-03-11 20:53:43'),
(577, 1, 'Master 2', 'masculino', '0.00', '54.00', -99, -99, 36, 40, '2019-03-11 20:53:43', '2019-03-11 20:53:43'),
(578, 1, 'Master 2', 'masculino', '54.01', '58.00', -99, -99, 36, 40, '2019-03-11 20:53:43', '2019-03-11 20:53:43'),
(579, 1, 'Master 2', 'masculino', '58.01', '63.00', -99, -99, 36, 40, '2019-03-11 20:53:43', '2019-03-11 20:53:43'),
(580, 1, 'Master 2', 'masculino', '63.01', '68.00', -99, -99, 36, 40, '2019-03-11 20:53:43', '2019-03-11 20:53:43'),
(581, 1, 'Master 2', 'masculino', '68.01', '74.00', -99, -99, 36, 40, '2019-03-11 20:53:43', '2019-03-11 20:53:43'),
(582, 1, 'Master 2', 'masculino', '74.01', '80.00', -99, -99, 36, 40, '2019-03-11 20:53:44', '2019-03-11 20:53:44'),
(583, 1, 'Master 2', 'masculino', '80.01', '87.00', -99, -99, 36, 40, '2019-03-11 20:53:44', '2019-03-11 20:53:44'),
(584, 1, 'Master 2', 'masculino', '87.01', '500.00', -99, -99, 36, 40, '2019-03-11 20:53:44', '2019-03-11 20:53:44'),
(585, 1, 'Master 2', 'feminino', '0.00', '46.00', -99, -99, 36, 40, '2019-03-11 20:53:44', '2019-03-11 20:53:44'),
(586, 1, 'Master 2', 'feminino', '46.01', '49.00', -99, -99, 36, 40, '2019-03-11 20:53:44', '2019-03-11 20:53:44'),
(587, 1, 'Master 2', 'feminino', '49.01', '53.00', -99, -99, 36, 40, '2019-03-11 20:53:44', '2019-03-11 20:53:44'),
(588, 1, 'Master 2', 'feminino', '53.01', '57.00', -99, -99, 36, 40, '2019-03-11 20:53:44', '2019-03-11 20:53:44'),
(589, 1, 'Master 2', 'feminino', '57.01', '63.00', -99, -99, 36, 40, '2019-03-11 20:53:44', '2019-03-11 20:53:44'),
(590, 1, 'Master 2', 'feminino', '63.01', '67.00', -99, -99, 36, 40, '2019-03-11 20:53:44', '2019-03-11 20:53:44'),
(591, 1, 'Master 2', 'feminino', '67.01', '73.00', -99, -99, 36, 40, '2019-03-11 20:53:44', '2019-03-11 20:53:44'),
(592, 1, 'Master 2', 'feminino', '73.01', '500.00', -99, -99, 36, 40, '2019-03-11 20:53:44', '2019-03-11 20:53:44'),
(593, 1, 'Master 3', 'masculino', '0.00', '54.00', 10, 7, 41, 500, '2019-03-11 20:53:44', '2019-03-11 20:53:44'),
(594, 1, 'Master 3', 'masculino', '54.01', '58.00', 10, 7, 41, 500, '2019-03-11 20:53:44', '2019-03-11 20:53:44'),
(595, 1, 'Master 3', 'masculino', '58.01', '63.00', 10, 7, 41, 500, '2019-03-11 20:53:44', '2019-03-11 20:53:44'),
(596, 1, 'Master 3', 'masculino', '63.01', '68.00', 10, 7, 41, 500, '2019-03-11 20:53:44', '2019-03-11 20:53:44'),
(597, 1, 'Master 3', 'masculino', '68.01', '74.00', 10, 7, 41, 500, '2019-03-11 20:53:44', '2019-03-11 20:53:44'),
(598, 1, 'Master 3', 'masculino', '74.01', '80.00', 10, 7, 41, 500, '2019-03-11 20:53:44', '2019-03-11 20:53:44'),
(599, 1, 'Master 3', 'masculino', '80.01', '87.00', 10, 7, 41, 500, '2019-03-11 20:53:44', '2019-03-11 20:53:44'),
(600, 1, 'Master 3', 'masculino', '87.01', '500.00', 10, 7, 41, 500, '2019-03-11 20:53:44', '2019-03-11 20:53:44'),
(601, 1, 'Master 3', 'feminino', '0.00', '46.00', 10, 7, 41, 500, '2019-03-11 20:53:44', '2019-03-11 20:53:44'),
(602, 1, 'Master 3', 'feminino', '46.01', '49.00', 10, 7, 41, 500, '2019-03-11 20:53:44', '2019-03-11 20:53:44'),
(603, 1, 'Master 3', 'feminino', '49.01', '53.00', 10, 7, 41, 500, '2019-03-11 20:53:44', '2019-03-11 20:53:44'),
(604, 1, 'Master 3', 'feminino', '53.01', '57.00', 10, 7, 41, 500, '2019-03-11 20:53:44', '2019-03-11 20:53:44'),
(605, 1, 'Master 3', 'feminino', '57.01', '63.00', 10, 7, 41, 500, '2019-03-11 20:53:44', '2019-03-11 20:53:44'),
(606, 1, 'Master 3', 'feminino', '63.01', '67.00', 10, 7, 41, 500, '2019-03-11 20:53:44', '2019-03-11 20:53:44'),
(607, 1, 'Master 3', 'feminino', '67.01', '73.00', 10, 7, 41, 500, '2019-03-11 20:53:44', '2019-03-11 20:53:44'),
(608, 1, 'Master 3', 'feminino', '73.01', '500.00', 10, 7, 41, 500, '2019-03-11 20:53:44', '2019-03-11 20:53:44'),
(609, 1, 'Master 3', 'masculino', '0.00', '54.00', 6, 4, 41, 500, '2019-03-11 20:53:44', '2019-03-11 20:53:44'),
(610, 1, 'Master 3', 'masculino', '54.01', '58.00', 6, 4, 41, 500, '2019-03-11 20:53:44', '2019-03-11 20:53:44'),
(611, 1, 'Master 3', 'masculino', '58.01', '63.00', 6, 4, 41, 500, '2019-03-11 20:53:44', '2019-03-11 20:53:44'),
(612, 1, 'Master 3', 'masculino', '63.01', '68.00', 6, 4, 41, 500, '2019-03-11 20:53:45', '2019-03-11 20:53:45'),
(613, 1, 'Master 3', 'masculino', '68.01', '74.00', 6, 4, 41, 500, '2019-03-11 20:53:45', '2019-03-11 20:53:45'),
(614, 1, 'Master 3', 'masculino', '74.01', '80.00', 6, 4, 41, 500, '2019-03-11 20:53:45', '2019-03-11 20:53:45'),
(615, 1, 'Master 3', 'masculino', '80.01', '87.00', 6, 4, 41, 500, '2019-03-11 20:53:45', '2019-03-11 20:53:45'),
(616, 1, 'Master 3', 'masculino', '87.01', '500.00', 6, 4, 41, 500, '2019-03-11 20:53:45', '2019-03-11 20:53:45'),
(617, 1, 'Master 3', 'feminino', '0.00', '46.00', 6, 4, 41, 500, '2019-03-11 20:53:45', '2019-03-11 20:53:45'),
(618, 1, 'Master 3', 'feminino', '46.01', '49.00', 6, 4, 41, 500, '2019-03-11 20:53:45', '2019-03-11 20:53:45'),
(619, 1, 'Master 3', 'feminino', '49.01', '53.00', 6, 4, 41, 500, '2019-03-11 20:53:45', '2019-03-11 20:53:45'),
(620, 1, 'Master 3', 'feminino', '53.01', '57.00', 6, 4, 41, 500, '2019-03-11 20:53:45', '2019-03-11 20:53:45'),
(621, 1, 'Master 3', 'feminino', '57.01', '63.00', 6, 4, 41, 500, '2019-03-11 20:53:45', '2019-03-11 20:53:45'),
(622, 1, 'Master 3', 'feminino', '63.01', '67.00', 6, 4, 41, 500, '2019-03-11 20:53:45', '2019-03-11 20:53:45'),
(623, 1, 'Master 3', 'feminino', '67.01', '73.00', 6, 4, 41, 500, '2019-03-11 20:53:45', '2019-03-11 20:53:45'),
(624, 1, 'Master 3', 'feminino', '73.01', '500.00', 6, 4, 41, 500, '2019-03-11 20:53:45', '2019-03-11 20:53:45'),
(625, 1, 'Master 3', 'masculino', '0.00', '54.00', 3, 1, 41, 500, '2019-03-11 20:53:45', '2019-03-11 20:53:45'),
(626, 1, 'Master 3', 'masculino', '54.01', '58.00', 3, 1, 41, 500, '2019-03-11 20:53:45', '2019-03-11 20:53:45'),
(627, 1, 'Master 3', 'masculino', '58.01', '63.00', 3, 1, 41, 500, '2019-03-11 20:53:45', '2019-03-11 20:53:45'),
(628, 1, 'Master 3', 'masculino', '63.01', '68.00', 3, 1, 41, 500, '2019-03-11 20:53:45', '2019-03-11 20:53:45'),
(629, 1, 'Master 3', 'masculino', '68.01', '74.00', 3, 1, 41, 500, '2019-03-11 20:53:45', '2019-03-11 20:53:45'),
(630, 1, 'Master 3', 'masculino', '74.01', '80.00', 3, 1, 41, 500, '2019-03-11 20:53:45', '2019-03-11 20:53:45'),
(631, 1, 'Master 3', 'masculino', '80.01', '87.00', 3, 1, 41, 500, '2019-03-11 20:53:45', '2019-03-11 20:53:45'),
(632, 1, 'Master 3', 'masculino', '87.01', '500.00', 3, 1, 41, 500, '2019-03-11 20:53:45', '2019-03-11 20:53:45'),
(633, 1, 'Master 3', 'feminino', '0.00', '46.00', 3, 1, 41, 500, '2019-03-11 20:53:45', '2019-03-11 20:53:45'),
(634, 1, 'Master 3', 'feminino', '46.01', '49.00', 3, 1, 41, 500, '2019-03-11 20:53:45', '2019-03-11 20:53:45'),
(635, 1, 'Master 3', 'feminino', '49.01', '53.00', 3, 1, 41, 500, '2019-03-11 20:53:45', '2019-03-11 20:53:45'),
(636, 1, 'Master 3', 'feminino', '53.01', '57.00', 3, 1, 41, 500, '2019-03-11 20:53:45', '2019-03-11 20:53:45'),
(637, 1, 'Master 3', 'feminino', '57.01', '63.00', 3, 1, 41, 500, '2019-03-11 20:53:45', '2019-03-11 20:53:45'),
(638, 1, 'Master 3', 'feminino', '63.01', '67.00', 3, 1, 41, 500, '2019-03-11 20:53:45', '2019-03-11 20:53:45'),
(639, 1, 'Master 3', 'feminino', '67.01', '73.00', 3, 1, 41, 500, '2019-03-11 20:53:45', '2019-03-11 20:53:45'),
(640, 1, 'Master 3', 'feminino', '73.01', '500.00', 3, 1, 41, 500, '2019-03-11 20:53:46', '2019-03-11 20:53:46'),
(641, 1, 'Master 3', 'masculino', '0.00', '54.00', -99, -99, 41, 500, '2019-03-11 20:53:46', '2019-03-11 20:53:46'),
(642, 1, 'Master 3', 'masculino', '54.01', '58.00', -99, -99, 41, 500, '2019-03-11 20:53:46', '2019-03-11 20:53:46'),
(643, 1, 'Master 3', 'masculino', '58.01', '63.00', -99, -99, 41, 500, '2019-03-11 20:53:46', '2019-03-11 20:53:46'),
(644, 1, 'Master 3', 'masculino', '63.01', '68.00', -99, -99, 41, 500, '2019-03-11 20:53:46', '2019-03-11 20:53:46'),
(645, 1, 'Master 3', 'masculino', '68.01', '74.00', -99, -99, 41, 500, '2019-03-11 20:53:46', '2019-03-11 20:53:46'),
(646, 1, 'Master 3', 'masculino', '74.01', '80.00', -99, -99, 41, 500, '2019-03-11 20:53:46', '2019-03-11 20:53:46'),
(647, 1, 'Master 3', 'masculino', '80.01', '87.00', -99, -99, 41, 500, '2019-03-11 20:53:46', '2019-03-11 20:53:46'),
(648, 1, 'Master 3', 'masculino', '87.01', '500.00', -99, -99, 41, 500, '2019-03-11 20:53:46', '2019-03-11 20:53:46'),
(649, 1, 'Master 3', 'feminino', '0.00', '46.00', -99, -99, 41, 500, '2019-03-11 20:53:46', '2019-03-11 20:53:46'),
(650, 1, 'Master 3', 'feminino', '46.01', '49.00', -99, -99, 41, 500, '2019-03-11 20:53:46', '2019-03-11 20:53:46'),
(651, 1, 'Master 3', 'feminino', '49.01', '53.00', -99, -99, 41, 500, '2019-03-11 20:53:46', '2019-03-11 20:53:46'),
(652, 1, 'Master 3', 'feminino', '53.01', '57.00', -99, -99, 41, 500, '2019-03-11 20:53:46', '2019-03-11 20:53:46'),
(653, 1, 'Master 3', 'feminino', '57.01', '63.00', -99, -99, 41, 500, '2019-03-11 20:53:46', '2019-03-11 20:53:46'),
(654, 1, 'Master 3', 'feminino', '63.01', '67.00', -99, -99, 41, 500, '2019-03-11 20:53:46', '2019-03-11 20:53:46'),
(655, 1, 'Master 3', 'feminino', '67.01', '73.00', -99, -99, 41, 500, '2019-03-11 20:53:46', '2019-03-11 20:53:46'),
(656, 1, 'Master 3', 'feminino', '73.01', '500.00', -99, -99, 41, 500, '2019-03-11 20:53:46', '2019-03-11 20:53:46');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contaspagars`
--

CREATE TABLE `contaspagars` (
  `id` int(10) UNSIGNED NOT NULL,
  `fornecedor` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parcela` decimal(8,2) NOT NULL,
  `qnd_parcela` int(11) NOT NULL,
  `vencimento` date NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `aleatorio` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `formaPagamento` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `contasrecebers`
--

CREATE TABLE `contasrecebers` (
  `id` int(10) UNSIGNED NOT NULL,
  `parcela` decimal(8,2) NOT NULL,
  `qnd_parcela` int(11) NOT NULL,
  `vencimento` date NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `aleatorio` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `formaPagamento` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aluno_id` int(10) UNSIGNED NOT NULL,
  `atividade_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `contasrecebers`
--

INSERT INTO `contasrecebers` (`id`, `parcela`, `qnd_parcela`, `vencimento`, `status`, `aleatorio`, `formaPagamento`, `aluno_id`, `atividade_id`, `created_at`, `updated_at`) VALUES
(2, '95.00', 0, '2019-04-24', '0', '#cod@727367531', 'Escolha uma opção...', 1, 1, '2019-04-24 21:11:35', '2019-04-24 21:13:15');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cors`
--

CREATE TABLE `cors` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hexadecimal` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `cors`
--

INSERT INTO `cors` (`id`, `nome`, `hexadecimal`, `created_at`, `updated_at`) VALUES
(1, 'Black', '#000000', '2019-03-11 20:53:14', '2019-03-11 20:53:14'),
(2, 'DimGray', '#696969', '2019-03-11 20:53:14', '2019-03-11 20:53:14'),
(3, 'Gray', '#808080', '2019-03-11 20:53:14', '2019-03-11 20:53:14'),
(4, 'DarkGray', '#A9A9A9', '2019-03-11 20:53:14', '2019-03-11 20:53:14'),
(5, 'Silver', '#C0C0C0', '2019-03-11 20:53:14', '2019-03-11 20:53:14'),
(6, 'LightGrey', '#D3D3D3', '2019-03-11 20:53:14', '2019-03-11 20:53:14'),
(7, 'Gainsboro', '#DCDCDC', '2019-03-11 20:53:14', '2019-03-11 20:53:14'),
(8, 'White', '#FFFFFF', '2019-03-11 20:53:14', '2019-03-11 20:53:14'),
(9, 'SlateBlue', '#6A5ACD', '2019-03-11 20:53:14', '2019-03-11 20:53:14'),
(10, 'DarkSlateBlue', '#483D8B', '2019-03-11 20:53:14', '2019-03-11 20:53:14'),
(11, 'MidnightBlue', '#191970', '2019-03-11 20:53:14', '2019-03-11 20:53:14'),
(12, 'Navy', '#000080', '2019-03-11 20:53:14', '2019-03-11 20:53:14'),
(13, 'DarkBlue', '#00008B', '2019-03-11 20:53:15', '2019-03-11 20:53:15'),
(14, 'MediumBlue', '#0000CD', '2019-03-11 20:53:15', '2019-03-11 20:53:15'),
(15, 'Blue', '#0000FF', '2019-03-11 20:53:15', '2019-03-11 20:53:15'),
(16, 'CornflowerBlue', '#6495ED', '2019-03-11 20:53:15', '2019-03-11 20:53:15'),
(17, 'RoyalBlue', '#4169E1', '2019-03-11 20:53:15', '2019-03-11 20:53:15'),
(18, 'DodgerBlue', '#1E90FF', '2019-03-11 20:53:15', '2019-03-11 20:53:15'),
(19, 'DeepSkyBlue', '#00BFFF', '2019-03-11 20:53:15', '2019-03-11 20:53:15'),
(20, 'LightSkyBlue', '#87CEFA', '2019-03-11 20:53:15', '2019-03-11 20:53:15'),
(21, 'SkyBlue', '#87CEEB', '2019-03-11 20:53:15', '2019-03-11 20:53:15'),
(22, 'LightBlue', '#ADD8E6', '2019-03-11 20:53:15', '2019-03-11 20:53:15'),
(23, 'SteelBlue', '#4682B4', '2019-03-11 20:53:15', '2019-03-11 20:53:15'),
(24, 'LightSteelBlue', '#B0C4DE', '2019-03-11 20:53:15', '2019-03-11 20:53:15'),
(25, 'SlateGray', '#708090', '2019-03-11 20:53:15', '2019-03-11 20:53:15'),
(26, 'LightSlateGray', '#778899', '2019-03-11 20:53:15', '2019-03-11 20:53:15'),
(27, 'Aqua / Cyan', '#00FFFF', '2019-03-11 20:53:15', '2019-03-11 20:53:15'),
(28, 'DarkTurquoise', '#00CED1', '2019-03-11 20:53:15', '2019-03-11 20:53:15'),
(29, 'Turquoise', '#40E0D0', '2019-03-11 20:53:15', '2019-03-11 20:53:15'),
(30, 'MediumTurquoise', '#48D1CC', '2019-03-11 20:53:15', '2019-03-11 20:53:15'),
(31, 'LightSeaGreen', '#20B2AA', '2019-03-11 20:53:15', '2019-03-11 20:53:15'),
(32, 'DarkCyan', '#008B8B', '2019-03-11 20:53:15', '2019-03-11 20:53:15'),
(33, 'Teal', '#008B8B', '2019-03-11 20:53:15', '2019-03-11 20:53:15'),
(34, 'Aquamarine', '#7FFFD4', '2019-03-11 20:53:15', '2019-03-11 20:53:15'),
(35, 'MediumAquamarine', '#66CDAA', '2019-03-11 20:53:15', '2019-03-11 20:53:15'),
(36, 'CadetBlue', '#5F9EA0', '2019-03-11 20:53:15', '2019-03-11 20:53:15'),
(37, 'DarkSlateGray', '#2F4F4F', '2019-03-11 20:53:15', '2019-03-11 20:53:15'),
(38, 'MediumSpringGreen', '#00FA9A', '2019-03-11 20:53:15', '2019-03-11 20:53:15'),
(39, 'SpringGreen', '#00FF7F', '2019-03-11 20:53:15', '2019-03-11 20:53:15'),
(40, 'PaleGreen', '#98FB98', '2019-03-11 20:53:15', '2019-03-11 20:53:15'),
(41, 'LightGreen', '#90EE90', '2019-03-11 20:53:15', '2019-03-11 20:53:15'),
(42, 'DarkSeaGreen', '#8FBC8F', '2019-03-11 20:53:15', '2019-03-11 20:53:15'),
(43, 'MediumSeaGreen', '#3CB371', '2019-03-11 20:53:15', '2019-03-11 20:53:15'),
(44, 'SeaGreen', '#2E8B57', '2019-03-11 20:53:16', '2019-03-11 20:53:16'),
(45, 'DarkGreen', '#006400', '2019-03-11 20:53:16', '2019-03-11 20:53:16'),
(46, 'Green', '#008000', '2019-03-11 20:53:16', '2019-03-11 20:53:16'),
(47, 'ForestGreen', '#228B22', '2019-03-11 20:53:16', '2019-03-11 20:53:16'),
(48, 'LimeGreen', '#32CD32', '2019-03-11 20:53:16', '2019-03-11 20:53:16'),
(49, 'Lime', '#00FF00', '2019-03-11 20:53:16', '2019-03-11 20:53:16'),
(50, 'LawnGreen', '#7CFC00', '2019-03-11 20:53:16', '2019-03-11 20:53:16'),
(51, 'Chartreuse', '#7FFF00', '2019-03-11 20:53:16', '2019-03-11 20:53:16'),
(52, 'GreenYellow', '#ADFF2F', '2019-03-11 20:53:16', '2019-03-11 20:53:16'),
(53, 'YellowGreen', '#9ACD32', '2019-03-11 20:53:16', '2019-03-11 20:53:16'),
(54, 'OliveDrab', '#6B8E23', '2019-03-11 20:53:16', '2019-03-11 20:53:16'),
(55, 'DarkOliveGreen', '#556B2F', '2019-03-11 20:53:16', '2019-03-11 20:53:16'),
(56, 'Olive', '#808000', '2019-03-11 20:53:16', '2019-03-11 20:53:16'),
(57, 'DarkKhaki', '#BDB76B', '2019-03-11 20:53:16', '2019-03-11 20:53:16'),
(58, 'Goldenrod', '#DAA520', '2019-03-11 20:53:16', '2019-03-11 20:53:16'),
(59, 'DarkGoldenrod', '#B8860B', '2019-03-11 20:53:16', '2019-03-11 20:53:16'),
(60, 'SaddleBrown', '#8B4513', '2019-03-11 20:53:16', '2019-03-11 20:53:16'),
(61, 'Sienna', '#A0522D', '2019-03-11 20:53:16', '2019-03-11 20:53:16'),
(62, 'RosyBrown', '#BC8F8F', '2019-03-11 20:53:16', '2019-03-11 20:53:16'),
(63, 'Peru', '#CD853F', '2019-03-11 20:53:16', '2019-03-11 20:53:16'),
(64, 'Chocolate', '#D2691E', '2019-03-11 20:53:16', '2019-03-11 20:53:16'),
(65, 'SandyBrown', '#F4A460', '2019-03-11 20:53:16', '2019-03-11 20:53:16'),
(66, 'NavajoWhite', '#FFDEAD', '2019-03-11 20:53:16', '2019-03-11 20:53:16'),
(67, 'Wheat', '#F5DEB3', '2019-03-11 20:53:16', '2019-03-11 20:53:16'),
(68, 'BurlyWood', '#DEB887', '2019-03-11 20:53:17', '2019-03-11 20:53:17'),
(69, 'Tan', '#D2B48C', '2019-03-11 20:53:17', '2019-03-11 20:53:17'),
(70, 'MediumSlateBlue', '#7B68EE', '2019-03-11 20:53:17', '2019-03-11 20:53:17'),
(71, 'MediumPurple', '#9370DB', '2019-03-11 20:53:17', '2019-03-11 20:53:17'),
(72, 'BlueViolet', '#8A2BE2', '2019-03-11 20:53:17', '2019-03-11 20:53:17'),
(73, 'Indigo', '#4B0082', '2019-03-11 20:53:17', '2019-03-11 20:53:17'),
(74, 'DarkViolet', '#9400D3', '2019-03-11 20:53:17', '2019-03-11 20:53:17'),
(75, 'DarkOrchid', '#9932CC', '2019-03-11 20:53:17', '2019-03-11 20:53:17'),
(76, 'MediumOrchid', '#BA55D3', '2019-03-11 20:53:17', '2019-03-11 20:53:17'),
(77, 'Purple', '#800080', '2019-03-11 20:53:17', '2019-03-11 20:53:17'),
(78, 'DarkMagenta', '#8B008B', '2019-03-11 20:53:17', '2019-03-11 20:53:17'),
(79, 'Fuchsia / Magenta', '#FF00FF', '2019-03-11 20:53:17', '2019-03-11 20:53:17'),
(80, 'Violet', '#EE82EE', '2019-03-11 20:53:17', '2019-03-11 20:53:17'),
(81, 'Orchid', '#DA70D6', '2019-03-11 20:53:17', '2019-03-11 20:53:17'),
(82, 'Plum', '#DDA0DD', '2019-03-11 20:53:17', '2019-03-11 20:53:17'),
(83, 'MediumVioletRed', '#C71585', '2019-03-11 20:53:17', '2019-03-11 20:53:17'),
(84, 'DeepPink', '#FF1493', '2019-03-11 20:53:17', '2019-03-11 20:53:17'),
(85, 'HotPink', '#FF69B4', '2019-03-11 20:53:17', '2019-03-11 20:53:17'),
(86, 'PaleVioletRed', '#DB7093', '2019-03-11 20:53:17', '2019-03-11 20:53:17'),
(87, 'LightPink', '#FFB6C1', '2019-03-11 20:53:17', '2019-03-11 20:53:17'),
(88, 'Pink', '#FFC0CB', '2019-03-11 20:53:17', '2019-03-11 20:53:17'),
(89, 'LightCoral', '#F08080', '2019-03-11 20:53:17', '2019-03-11 20:53:17'),
(90, 'IndianRed', '#CD5C5C', '2019-03-11 20:53:17', '2019-03-11 20:53:17'),
(91, 'Crimson', '#DC143C', '2019-03-11 20:53:17', '2019-03-11 20:53:17'),
(92, 'Maroon', '#800000', '2019-03-11 20:53:17', '2019-03-11 20:53:17'),
(93, 'DarkRed', '#8B0000', '2019-03-11 20:53:18', '2019-03-11 20:53:18'),
(94, 'FireBrick', '#B22222', '2019-03-11 20:53:18', '2019-03-11 20:53:18'),
(95, 'Brown', '#A52A2A', '2019-03-11 20:53:18', '2019-03-11 20:53:18'),
(96, 'Salmon', '#FA8072', '2019-03-11 20:53:18', '2019-03-11 20:53:18'),
(97, 'DarkSalmon', '#E9967A', '2019-03-11 20:53:18', '2019-03-11 20:53:18'),
(98, 'LightSalmon', '#FFA07A', '2019-03-11 20:53:18', '2019-03-11 20:53:18'),
(99, 'Coral', '#FF7F50', '2019-03-11 20:53:18', '2019-03-11 20:53:18'),
(100, 'Tomato', '#FF6347', '2019-03-11 20:53:18', '2019-03-11 20:53:18'),
(101, 'Red', '#FF0000', '2019-03-11 20:53:18', '2019-03-11 20:53:18'),
(102, 'OrangeRed', '#FF4500', '2019-03-11 20:53:18', '2019-03-11 20:53:18'),
(103, 'DarkOrange', '#FF8C00', '2019-03-11 20:53:18', '2019-03-11 20:53:18'),
(104, 'Orange', '#FFA500', '2019-03-11 20:53:18', '2019-03-11 20:53:18'),
(105, 'Gold', '#FFD700', '2019-03-11 20:53:18', '2019-03-11 20:53:18'),
(106, 'Yellow', '#FFFF00', '2019-03-11 20:53:18', '2019-03-11 20:53:18'),
(107, 'Khaki', '#F0E68C', '2019-03-11 20:53:18', '2019-03-11 20:53:18'),
(108, 'AliceBlue', '#F0F8FF', '2019-03-11 20:53:19', '2019-03-11 20:53:19'),
(109, 'GhostWhite', '#F8F8FF', '2019-03-11 20:53:19', '2019-03-11 20:53:19'),
(110, 'Snow', '#FFFAFA', '2019-03-11 20:53:19', '2019-03-11 20:53:19'),
(111, 'Seashell', '#FFF5EE', '2019-03-11 20:53:19', '2019-03-11 20:53:19'),
(112, 'FloralWhite', '#FFFAF0', '2019-03-11 20:53:19', '2019-03-11 20:53:19'),
(113, 'WhiteSmoke', '#F5F5F5', '2019-03-11 20:53:19', '2019-03-11 20:53:19'),
(114, 'Beige', '#F5F5DC', '2019-03-11 20:53:19', '2019-03-11 20:53:19'),
(115, 'OldLace', '#FDF5E6', '2019-03-11 20:53:19', '2019-03-11 20:53:19'),
(116, 'Ivory', '#FFFFF0', '2019-03-11 20:53:19', '2019-03-11 20:53:19'),
(117, 'Linen', '#FAF0E6', '2019-03-11 20:53:19', '2019-03-11 20:53:19'),
(118, 'Cornsilk', '#FFF8DC', '2019-03-11 20:53:19', '2019-03-11 20:53:19'),
(119, 'AntiqueWhite', '#FAEBD7', '2019-03-11 20:53:19', '2019-03-11 20:53:19'),
(120, 'BlanchedAlmond', '#FFEBCD', '2019-03-11 20:53:19', '2019-03-11 20:53:19'),
(121, 'Bisque', '#FFE4C4', '2019-03-11 20:53:19', '2019-03-11 20:53:19'),
(122, 'LightYellow', '#FFFFE0', '2019-03-11 20:53:19', '2019-03-11 20:53:19'),
(123, 'LemonChiffon', '#FFFACD', '2019-03-11 20:53:19', '2019-03-11 20:53:19'),
(124, 'LightGoldenrodYellow', '#FAFAD2', '2019-03-11 20:53:19', '2019-03-11 20:53:19'),
(125, 'PapayaWhip', '#FFEFD5', '2019-03-11 20:53:19', '2019-03-11 20:53:19'),
(126, 'PeachPuff', '#FFDAB9', '2019-03-11 20:53:19', '2019-03-11 20:53:19'),
(127, 'Moccasin', '#FFE4B5', '2019-03-11 20:53:19', '2019-03-11 20:53:19'),
(128, 'PaleGoldenrod', '#EEE8AA', '2019-03-11 20:53:19', '2019-03-11 20:53:19'),
(129, 'MistyRose', '#FFE4E1', '2019-03-11 20:53:19', '2019-03-11 20:53:19'),
(130, 'LavenderBlush', '#FFF0F5', '2019-03-11 20:53:19', '2019-03-11 20:53:19'),
(131, 'Lavender', '#E6E6FA', '2019-03-11 20:53:19', '2019-03-11 20:53:19'),
(132, 'Thistle', '#D8BFD8', '2019-03-11 20:53:19', '2019-03-11 20:53:19'),
(133, 'Azure', '#F0FFFF', '2019-03-11 20:53:19', '2019-03-11 20:53:19'),
(134, 'LightCyan', '#E0FFFF', '2019-03-11 20:53:19', '2019-03-11 20:53:19'),
(135, 'PowderBlue', '#B0E0E6', '2019-03-11 20:53:19', '2019-03-11 20:53:19'),
(136, 'PaleTurquoise', '#E0FFFF', '2019-03-11 20:53:20', '2019-03-11 20:53:20'),
(137, 'Honeydew', '#F0FFF0', '2019-03-11 20:53:20', '2019-03-11 20:53:20'),
(138, 'MintCream', '#F5FFFA', '2019-03-11 20:53:20', '2019-03-11 20:53:20');

-- --------------------------------------------------------

--
-- Estrutura da tabela `descontoalunos`
--

CREATE TABLE `descontoalunos` (
  `id` int(10) UNSIGNED NOT NULL,
  `aluno_id` int(10) UNSIGNED NOT NULL,
  `atividade_id` int(10) UNSIGNED NOT NULL,
  `valor` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `descontoalunos`
--

INSERT INTO `descontoalunos` (`id`, `aluno_id`, `atividade_id`, `valor`, `created_at`, `updated_at`) VALUES
(3, 1, 2, '12.00', '2019-03-28 20:49:17', '2019-04-12 15:36:56'),
(5, 1, 1, '5.00', '2019-03-28 20:58:33', '2019-04-12 15:36:50'),
(6, 2, 1, '18.00', '2019-04-12 15:43:14', '2019-04-12 15:43:14'),
(8, 2, 2, '0.00', '2019-04-24 16:50:21', '2019-04-24 16:50:21');

-- --------------------------------------------------------

--
-- Estrutura da tabela `graduacaos`
--

CREATE TABLE `graduacaos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nomeGraduacao` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `corpoFaixa` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pontaFaixa` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `graduacaos`
--

INSERT INTO `graduacaos` (`id`, `nomeGraduacao`, `corpoFaixa`, `pontaFaixa`, `created_at`, `updated_at`) VALUES
(1, '10º Gub', 'White', 'White', '2019-03-11 21:07:50', '2019-03-11 21:07:50'),
(2, '9º Gub', 'White', 'Yellow', '2019-03-11 21:08:12', '2019-03-11 21:08:12'),
(3, '8º Gub', 'Yellow', 'Yellow', '2019-03-11 21:08:45', '2019-03-11 21:08:45'),
(4, '7º Gub', 'Yellow', 'Green', '2019-03-11 21:09:10', '2019-03-11 21:09:10'),
(5, '6º Gub', 'Green', 'Green', '2019-03-11 21:09:32', '2019-03-11 21:09:32'),
(6, '5º Gub', 'Green', 'Blue', '2019-03-11 21:10:41', '2019-03-11 21:10:41'),
(7, '4º Gub', 'Blue', 'Blue', '2019-03-11 21:11:35', '2019-03-11 21:11:35'),
(8, '3º Gub', 'Blue', 'Red', '2019-03-11 21:11:48', '2019-03-11 21:11:48'),
(9, '2º Gub', 'Red', 'Red', '2019-03-11 21:12:05', '2019-03-11 21:12:05'),
(10, '1º Gub', 'Red', 'Black', '2019-03-11 21:12:20', '2019-03-11 21:12:20'),
(11, 'Dan', 'Black', 'Black', '2019-03-11 21:12:31', '2019-03-11 21:12:31');

-- --------------------------------------------------------

--
-- Estrutura da tabela `horariosturmas`
--

CREATE TABLE `horariosturmas` (
  `id` int(10) UNSIGNED NOT NULL,
  `turma_id` int(10) UNSIGNED NOT NULL,
  `diaSemana` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `horarioEntrada` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `horarioSaida` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `horariosturmas`
--

INSERT INTO `horariosturmas` (`id`, `turma_id`, `diaSemana`, `horarioEntrada`, `horarioSaida`, `created_at`, `updated_at`) VALUES
(2, 1, 'Quarta-Feira', '19:00', '20:30', '2019-04-03 18:32:52', '2019-04-03 18:32:52'),
(3, 1, 'Sexta-Feira', '19:00', '20:30', '2019-04-03 21:20:04', '2019-04-03 21:20:04'),
(4, 1, 'Segunda-Feira', '19:00', '20:30', '2019-04-03 23:20:33', '2019-04-03 23:20:33');

-- --------------------------------------------------------

--
-- Estrutura da tabela `inscricaos`
--

CREATE TABLE `inscricaos` (
  `id` int(10) UNSIGNED NOT NULL,
  `atleta_id` int(10) UNSIGNED NOT NULL,
  `modalidade_id` int(10) UNSIGNED NOT NULL,
  `categoria_id` int(10) UNSIGNED NOT NULL,
  `campeonato_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `inscricaos`
--

INSERT INTO `inscricaos` (`id`, `atleta_id`, `modalidade_id`, `categoria_id`, `campeonato_id`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 552, 1, '2019-03-11 21:25:02', '2019-03-11 21:25:02'),
(6, 8, 1, 387, 1, '2019-03-13 17:03:47', '2019-03-13 17:03:47'),
(8, 10, 1, 471, 1, '2019-03-13 20:33:07', '2019-03-13 20:33:07'),
(9, 9, 1, 452, 1, '2019-03-13 21:12:04', '2019-03-13 21:12:04'),
(10, 11, 1, 368, 1, '2019-03-14 23:34:16', '2019-03-14 23:34:16'),
(13, 13, 1, 405, 1, '2019-03-15 15:20:33', '2019-03-15 15:20:33'),
(14, 14, 1, 357, 1, '2019-03-15 15:20:55', '2019-03-15 15:20:55'),
(15, 15, 1, 297, 1, '2019-03-15 15:21:17', '2019-03-15 15:21:17'),
(16, 16, 1, 345, 1, '2019-03-15 15:21:23', '2019-03-15 15:21:23'),
(17, 17, 2, 286, 1, '2019-03-15 15:21:35', '2019-03-15 15:21:35'),
(18, 7, 1, 387, 1, '2019-03-15 15:24:23', '2019-03-15 15:24:23'),
(19, 18, 1, 186, 1, '2019-03-15 15:24:49', '2019-03-15 15:24:49'),
(20, 19, 1, 266, 1, '2019-03-15 15:27:23', '2019-03-15 15:27:23'),
(21, 20, 1, 344, 1, '2019-03-15 20:22:38', '2019-03-15 20:22:38'),
(22, 21, 1, 345, 1, '2019-03-15 20:22:48', '2019-03-15 20:22:48'),
(23, 22, 1, 343, 1, '2019-03-15 20:22:57', '2019-03-15 20:22:57'),
(24, 23, 1, 484, 1, '2019-03-16 21:38:32', '2019-03-16 21:38:32'),
(26, 25, 1, 458, 1, '2019-03-16 21:45:22', '2019-03-16 21:45:22'),
(27, 26, 2, 417, 1, '2019-03-18 17:17:01', '2019-03-18 17:17:01'),
(28, 27, 2, 199, 1, '2019-03-18 17:17:10', '2019-03-18 17:17:10'),
(29, 28, 2, 199, 1, '2019-03-18 17:17:18', '2019-03-18 17:17:18'),
(30, 29, 1, 424, 1, '2019-03-18 18:37:55', '2019-03-18 18:37:55'),
(31, 30, 1, 419, 1, '2019-03-18 18:38:01', '2019-03-18 18:38:01'),
(32, 31, 1, 370, 1, '2019-03-19 01:48:33', '2019-03-19 01:48:33'),
(33, 32, 1, 305, 1, '2019-03-19 02:05:37', '2019-03-19 02:05:37'),
(34, 32, 2, 305, 1, '2019-03-19 02:05:47', '2019-03-19 02:05:47'),
(35, 33, 1, 21, 1, '2019-03-19 15:06:28', '2019-03-19 15:06:28'),
(37, 34, 1, 599, 1, '2019-03-20 20:52:14', '2019-03-20 20:52:14'),
(38, 35, 1, 277, 1, '2019-03-20 20:52:23', '2019-03-20 20:52:23'),
(40, 37, 1, 186, 1, '2019-03-21 01:07:08', '2019-03-21 01:07:08'),
(42, 39, 1, 263, 1, '2019-03-21 01:07:25', '2019-03-21 01:07:25'),
(43, 40, 1, 281, 1, '2019-03-21 01:07:32', '2019-03-21 01:07:32'),
(44, 41, 1, 196, 1, '2019-03-21 01:07:39', '2019-03-21 01:07:39'),
(45, 42, 1, 191, 1, '2019-03-21 01:07:45', '2019-03-21 01:07:45'),
(46, 38, 1, 185, 1, '2019-03-21 01:31:27', '2019-03-21 01:31:27'),
(48, 44, 1, 328, 1, '2019-03-21 16:29:18', '2019-03-21 16:29:18'),
(49, 43, 1, 350, 1, '2019-03-21 16:42:18', '2019-03-21 16:42:18'),
(52, 45, 1, 318, 1, '2019-03-21 21:28:06', '2019-03-21 21:28:06'),
(53, 45, 2, 318, 1, '2019-03-21 21:28:11', '2019-03-21 21:28:11'),
(55, 47, 1, 404, 1, '2019-03-25 14:55:26', '2019-03-25 14:55:26'),
(56, 48, 1, 365, 1, '2019-03-25 14:55:45', '2019-03-25 14:55:45'),
(57, 46, 1, 259, 1, '2019-03-25 14:55:58', '2019-03-25 14:55:58'),
(58, 49, 1, 305, 1, '2019-03-25 14:56:18', '2019-03-25 14:56:18'),
(59, 50, 1, 515, 1, '2019-03-25 20:12:39', '2019-03-25 20:12:39'),
(60, 51, 1, 439, 1, '2019-03-25 20:12:51', '2019-03-25 20:12:51'),
(61, 52, 1, 444, 1, '2019-03-25 20:12:59', '2019-03-25 20:12:59'),
(62, 53, 1, 385, 1, '2019-03-25 20:13:07', '2019-03-25 20:13:07'),
(63, 54, 1, 32, 1, '2019-03-25 20:13:25', '2019-03-25 20:13:25'),
(64, 55, 1, 21, 1, '2019-03-25 20:13:31', '2019-03-25 20:13:31'),
(65, 56, 1, 107, 1, '2019-03-25 20:13:37', '2019-03-25 20:13:37'),
(66, 57, 1, 25, 1, '2019-03-25 20:13:42', '2019-03-25 20:13:42'),
(67, 58, 1, 22, 1, '2019-03-25 20:13:51', '2019-03-25 20:13:51'),
(68, 59, 1, 107, 1, '2019-03-25 20:13:58', '2019-03-25 20:13:58'),
(69, 60, 1, 85, 1, '2019-03-25 20:14:06', '2019-03-25 20:14:06'),
(70, 61, 1, 324, 1, '2019-03-25 20:14:10', '2019-03-25 20:14:10'),
(77, 64, 1, 84, 1, '2019-03-26 21:51:47', '2019-03-26 21:51:47'),
(78, 65, 1, 437, 1, '2019-03-26 21:51:58', '2019-03-26 21:51:58'),
(79, 66, 1, 86, 1, '2019-03-26 21:52:09', '2019-03-26 21:52:09'),
(80, 67, 1, 453, 1, '2019-03-28 15:55:05', '2019-03-28 15:55:05'),
(81, 68, 1, 305, 1, '2019-03-29 20:09:04', '2019-03-29 20:09:04'),
(82, 69, 1, 451, 1, '2019-03-29 20:09:18', '2019-03-29 20:09:18'),
(83, 70, 1, 304, 1, '2019-03-29 20:09:31', '2019-03-29 20:09:31'),
(84, 71, 1, 420, 1, '2019-03-29 20:09:38', '2019-03-29 20:09:38'),
(85, 72, 1, 214, 1, '2019-03-29 20:09:45', '2019-03-29 20:09:45'),
(86, 73, 1, 104, 1, '2019-03-29 20:09:54', '2019-03-29 20:09:54'),
(87, 74, 1, 190, 1, '2019-03-29 20:10:02', '2019-03-29 20:10:02'),
(88, 75, 1, 205, 1, '2019-03-29 20:10:11', '2019-03-29 20:10:11'),
(89, 76, 1, 453, 1, '2019-03-29 20:10:20', '2019-03-29 20:10:20'),
(90, 77, 1, 104, 1, '2019-03-29 20:10:29', '2019-03-29 20:10:29'),
(91, 12, 1, 190, 1, '2019-03-30 03:08:51', '2019-03-30 03:08:51'),
(92, 78, 1, 134, 1, '2019-03-30 03:15:54', '2019-03-30 03:15:54'),
(93, 6, 1, 114, 1, '2019-03-30 03:18:11', '2019-03-30 03:18:11'),
(94, 2, 1, 404, 1, '2019-03-30 03:29:55', '2019-03-30 03:29:55'),
(95, 36, 1, 104, 1, '2019-03-30 03:32:21', '2019-03-30 03:32:21'),
(96, 24, 1, 357, 1, '2019-03-30 03:46:45', '2019-03-30 03:46:45'),
(97, 1, 3, 568, 2, '2020-03-09 14:30:48', '2020-03-09 14:30:48'),
(101, 6, 3, 211, 2, '2020-03-17 04:34:50', '2020-03-17 04:34:50'),
(105, 79, 4, 331, 2, '2020-03-17 18:35:23', '2020-03-17 18:35:23'),
(106, 80, 3, 210, 2, '2020-03-18 04:19:41', '2020-03-18 04:19:41'),
(107, 19, 3, 363, 2, '2020-03-18 04:21:41', '2020-03-18 04:21:41'),
(108, 25, 3, 459, 2, '2020-03-18 04:37:02', '2020-03-18 04:37:02'),
(109, 10, 3, 550, 2, '2020-03-18 05:47:23', '2020-03-18 05:47:23');

-- --------------------------------------------------------

--
-- Estrutura da tabela `instrutors`
--

CREATE TABLE `instrutors` (
  `id` int(10) UNSIGNED NOT NULL,
  `studio_id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nascimento` date DEFAULT NULL,
  `sexo` enum('masculino','feminino') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagem` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rg` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cpf` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cep` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rua` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complemento` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bairro` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cidade` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uf` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ibge` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `celular` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `instrutors`
--

INSERT INTO `instrutors` (`id`, `studio_id`, `nome`, `nascimento`, `sexo`, `imagem`, `rg`, `cpf`, `cep`, `rua`, `numero`, `complemento`, `bairro`, `cidade`, `uf`, `ibge`, `telefone`, `celular`, `email`, `created_at`, `updated_at`) VALUES
(1, 1, 'Hugo Ferreira Chiesse', '1980-12-31', 'masculino', 'img/instrutor/_img_44257.jpeg', '111111111 DETRAN RJ', '111.111.111-11', '27343-050', 'Rua Guilherme Marcondes', '380', 'apto 101', 'Monte Cristo', 'Barra Mansa', 'RJ', '3300407', '(24) 3322-5247', '(24) 9 9902-5956', 'hugochiesse@gmail.com', '2019-03-28 17:50:53', '2019-03-28 17:50:53');

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_02_26_190308_create_academias_table', 1),
(4, '2019_02_26_194825_create_graduacaos_table', 1),
(5, '2019_02_26_194828_create_instrutors_table', 1),
(6, '2019_03_07_150757_create_studios_table', 1),
(7, '2019_03_07_150857_add_studio_to_instrutors_table', 1),
(8, '2019_03_07_150948_create_artemarcials_table', 1),
(9, '2019_03_07_152327_create_categorias_table', 1),
(10, '2019_03_07_182225_create_modalidades_table', 1),
(11, '2019_03_07_185039_create_atletas_table', 1),
(12, '2019_03_07_190037_create_alunos_table', 1),
(13, '2019_03_07_191547_create_campeonatos_table', 1),
(14, '2019_03_07_192227_create_inscricaos_table', 1),
(15, '2019_03_07_192651_add_campeonato_to_modalidades_table', 1),
(16, '2019_03_09_174713_create_cors_table', 1),
(17, '2019_03_13_214744_create_resultados_table', 2),
(18, '2019_03_26_192714_create_atividades_table', 3),
(19, '2019_03_26_193009_create_valoratividades_table', 3),
(20, '2019_03_28_151031_create_descontoalunos_table', 4),
(22, '2019_03_28_181804_create_turmas_table', 5),
(24, '2019_04_03_140332_create_horariosturmas_table', 6),
(25, '2019_04_03_183359_create_alunosturmas_table', 7),
(28, '2019_04_04_124739_create_contaspagars_table', 8),
(29, '2019_04_04_124800_create_contasrecebers_table', 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `modalidades`
--

CREATE TABLE `modalidades` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `campeonato_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `modalidades`
--

INSERT INTO `modalidades` (`id`, `nome`, `created_at`, `updated_at`, `campeonato_id`) VALUES
(1, 'Kyorugui', '2019-03-11 21:19:01', '2019-03-11 21:19:01', 1),
(2, 'Poomsae', '2019-03-11 21:19:08', '2019-03-15 15:34:52', 1),
(3, 'Kyorugui', '2020-03-09 14:10:41', '2020-03-09 14:10:41', 2),
(4, 'Poomsae', '2020-03-09 14:10:56', '2020-03-09 14:10:56', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `resultados`
--

CREATE TABLE `resultados` (
  `id` int(10) UNSIGNED NOT NULL,
  `campeonato_id` int(10) UNSIGNED NOT NULL,
  `inscricao_id` int(10) UNSIGNED NOT NULL,
  `classificacao` enum('1','2','3','4','5') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipoConfronto` set('luta','WO','poomsae') COLLATE utf8mb4_unicode_ci NOT NULL,
  `pontuacao` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `studios`
--

CREATE TABLE `studios` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagem` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cep` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rua` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `complemento` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bairro` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cidade` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uf` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ibge` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `celular` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `studios`
--

INSERT INTO `studios` (`id`, `nome`, `imagem`, `cep`, `rua`, `numero`, `complemento`, `bairro`, `cidade`, `uf`, `ibge`, `telefone`, `celular`, `email`, `site`, `created_at`, `updated_at`) VALUES
(1, 'Studio de Lutas Ikaro Graciano', NULL, '27253-420', 'Rua Hipólito da Costa', '19', 'apto 401', 'Centro', 'Volta Redonda', 'RJ', '3306305', NULL, '(24) 9 9251-2437', NULL, NULL, '2019-03-21 20:49:24', '2019-03-21 20:49:24');

-- --------------------------------------------------------

--
-- Estrutura da tabela `turmas`
--

CREATE TABLE `turmas` (
  `id` int(10) UNSIGNED NOT NULL,
  `instrutor_id` int(10) UNSIGNED NOT NULL,
  `atividade_id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `turmas`
--

INSERT INTO `turmas` (`id`, `instrutor_id`, `atividade_id`, `nome`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'TKD 01', '2019-04-03 16:56:22', '2019-04-03 16:56:22'),
(2, 1, 2, 'KVM_01', '2019-04-10 16:47:05', '2019-04-10 16:47:05');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access` int(10) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `access`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Hugo Ferreira Chiesse', 'hugochiesse@gmail.com', NULL, '$2y$10$/XAHoRqC2ShQYKWlPySf5e4UNHfzKXzKXkA.YfqVfPezBgFUqUQ9y', 2, 'gKNOw7oXW7ILnNDFevpskkVG23pkS2jVXBDTitxCOm9x3Z1rIxkiZba73YaA', '2019-03-12 16:18:29', '2019-03-12 16:18:29'),
(2, 'Yuri Gonçalves Chiesse', 'yuri_chiesse@hotmail.com', NULL, '$2y$10$AP73jxt6qi/gJUXA4VznZOHHAdyciLAdPi3B0xphwvzruE76M1EqW', 1, 'QGOpEAUppMvkO8MKfH307XcYeBTeQdr0UZBYhnApC2CdAKb6WwHBzKJeSt5Q', '2019-03-12 17:52:20', '2019-03-12 17:52:20'),
(3, 'Ikaro Graciano', 'ikaro_graciano@hotmail.com', NULL, '$2y$10$Wf02Fl40CocQlkAKuTbQP.ODwWEU0yepYeIn8vrKMokT3xujToD6m', 2, 'nceaxuIJF1VXe8IzaGJJnMw4m77NIosy4IRhrdcstXmY1hOnPp0jtnWblUjA', '2020-03-17 04:28:03', '2020-03-17 04:28:03');

-- --------------------------------------------------------

--
-- Estrutura da tabela `valoratividades`
--

CREATE TABLE `valoratividades` (
  `id` int(10) UNSIGNED NOT NULL,
  `atividade_id` int(10) UNSIGNED NOT NULL,
  `valor` decimal(8,2) NOT NULL,
  `ano` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `valoratividades`
--

INSERT INTO `valoratividades` (`id`, `atividade_id`, `valor`, `ano`, `created_at`, `updated_at`) VALUES
(1, 2, '90.00', 2019, '2019-03-27 15:56:11', '2019-03-28 16:11:36'),
(2, 1, '100.00', 2019, '2019-03-28 14:49:29', '2019-03-28 14:49:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academias`
--
ALTER TABLE `academias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alunosturmas`
--
ALTER TABLE `alunosturmas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alunosturmas_turma_id_foreign` (`turma_id`),
  ADD KEY `alunosturmas_aluno_id_foreign` (`aluno_id`);

--
-- Indexes for table `artemarcials`
--
ALTER TABLE `artemarcials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `atividades`
--
ALTER TABLE `atividades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `atletas`
--
ALTER TABLE `atletas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `atletas_artemarcial_id_foreign` (`artemarcial_id`),
  ADD KEY `atletas_graduacao_id_foreign` (`graduacao_id`),
  ADD KEY `atletas_academia_id_foreign` (`academia_id`);

--
-- Indexes for table `campeonatos`
--
ALTER TABLE `campeonatos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `campeonatos_artemarcial_id_foreign` (`artemarcial_id`);

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categorias_artemarcial_id_foreign` (`artemarcial_id`);

--
-- Indexes for table `contaspagars`
--
ALTER TABLE `contaspagars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contasrecebers`
--
ALTER TABLE `contasrecebers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contasrecebers_aluno_id_foreign` (`aluno_id`),
  ADD KEY `contasrecebers_atividade_id_foreign` (`atividade_id`);

--
-- Indexes for table `cors`
--
ALTER TABLE `cors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `descontoalunos`
--
ALTER TABLE `descontoalunos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `descontoalunos_aluno_id_foreign` (`aluno_id`),
  ADD KEY `descontoalunos_atividade_id_foreign` (`atividade_id`);

--
-- Indexes for table `graduacaos`
--
ALTER TABLE `graduacaos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `horariosturmas`
--
ALTER TABLE `horariosturmas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `horariosturmas_turma_id_foreign` (`turma_id`);

--
-- Indexes for table `inscricaos`
--
ALTER TABLE `inscricaos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inscricaos_atleta_id_foreign` (`atleta_id`),
  ADD KEY `inscricaos_modalidade_id_foreign` (`modalidade_id`),
  ADD KEY `inscricaos_categoria_id_foreign` (`categoria_id`),
  ADD KEY `inscricaos_campeonato_id_foreign` (`campeonato_id`);

--
-- Indexes for table `instrutors`
--
ALTER TABLE `instrutors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `instrutors_studio_id_foreign` (`studio_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modalidades`
--
ALTER TABLE `modalidades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `modalidades_campeonato_id_foreign` (`campeonato_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `resultados`
--
ALTER TABLE `resultados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `resultados_campeonato_id_foreign` (`campeonato_id`),
  ADD KEY `resultados_inscricao_id_foreign` (`inscricao_id`);

--
-- Indexes for table `studios`
--
ALTER TABLE `studios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `turmas`
--
ALTER TABLE `turmas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `turmas_instrutor_id_foreign` (`instrutor_id`),
  ADD KEY `turmas_atividade_id_foreign` (`atividade_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `valoratividades`
--
ALTER TABLE `valoratividades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `valoratividades_atividade_id_foreign` (`atividade_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academias`
--
ALTER TABLE `academias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `alunos`
--
ALTER TABLE `alunos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `alunosturmas`
--
ALTER TABLE `alunosturmas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `artemarcials`
--
ALTER TABLE `artemarcials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `atividades`
--
ALTER TABLE `atividades`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `atletas`
--
ALTER TABLE `atletas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `campeonatos`
--
ALTER TABLE `campeonatos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=657;

--
-- AUTO_INCREMENT for table `contaspagars`
--
ALTER TABLE `contaspagars`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contasrecebers`
--
ALTER TABLE `contasrecebers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cors`
--
ALTER TABLE `cors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `descontoalunos`
--
ALTER TABLE `descontoalunos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `graduacaos`
--
ALTER TABLE `graduacaos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `horariosturmas`
--
ALTER TABLE `horariosturmas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `inscricaos`
--
ALTER TABLE `inscricaos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `instrutors`
--
ALTER TABLE `instrutors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `modalidades`
--
ALTER TABLE `modalidades`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `resultados`
--
ALTER TABLE `resultados`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `studios`
--
ALTER TABLE `studios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `turmas`
--
ALTER TABLE `turmas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `valoratividades`
--
ALTER TABLE `valoratividades`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `alunosturmas`
--
ALTER TABLE `alunosturmas`
  ADD CONSTRAINT `alunosturmas_aluno_id_foreign` FOREIGN KEY (`aluno_id`) REFERENCES `alunos` (`id`),
  ADD CONSTRAINT `alunosturmas_turma_id_foreign` FOREIGN KEY (`turma_id`) REFERENCES `turmas` (`id`);

--
-- Limitadores para a tabela `atletas`
--
ALTER TABLE `atletas`
  ADD CONSTRAINT `atletas_academia_id_foreign` FOREIGN KEY (`academia_id`) REFERENCES `academias` (`id`),
  ADD CONSTRAINT `atletas_artemarcial_id_foreign` FOREIGN KEY (`artemarcial_id`) REFERENCES `artemarcials` (`id`),
  ADD CONSTRAINT `atletas_graduacao_id_foreign` FOREIGN KEY (`graduacao_id`) REFERENCES `graduacaos` (`id`);

--
-- Limitadores para a tabela `campeonatos`
--
ALTER TABLE `campeonatos`
  ADD CONSTRAINT `campeonatos_artemarcial_id_foreign` FOREIGN KEY (`artemarcial_id`) REFERENCES `artemarcials` (`id`);

--
-- Limitadores para a tabela `categorias`
--
ALTER TABLE `categorias`
  ADD CONSTRAINT `categorias_artemarcial_id_foreign` FOREIGN KEY (`artemarcial_id`) REFERENCES `artemarcials` (`id`);

--
-- Limitadores para a tabela `contasrecebers`
--
ALTER TABLE `contasrecebers`
  ADD CONSTRAINT `contasrecebers_aluno_id_foreign` FOREIGN KEY (`aluno_id`) REFERENCES `alunos` (`id`),
  ADD CONSTRAINT `contasrecebers_atividade_id_foreign` FOREIGN KEY (`atividade_id`) REFERENCES `atividades` (`id`);

--
-- Limitadores para a tabela `descontoalunos`
--
ALTER TABLE `descontoalunos`
  ADD CONSTRAINT `descontoalunos_aluno_id_foreign` FOREIGN KEY (`aluno_id`) REFERENCES `alunos` (`id`),
  ADD CONSTRAINT `descontoalunos_atividade_id_foreign` FOREIGN KEY (`atividade_id`) REFERENCES `atividades` (`id`);

--
-- Limitadores para a tabela `horariosturmas`
--
ALTER TABLE `horariosturmas`
  ADD CONSTRAINT `horariosturmas_turma_id_foreign` FOREIGN KEY (`turma_id`) REFERENCES `turmas` (`id`);

--
-- Limitadores para a tabela `inscricaos`
--
ALTER TABLE `inscricaos`
  ADD CONSTRAINT `inscricaos_atleta_id_foreign` FOREIGN KEY (`atleta_id`) REFERENCES `atletas` (`id`),
  ADD CONSTRAINT `inscricaos_campeonato_id_foreign` FOREIGN KEY (`campeonato_id`) REFERENCES `campeonatos` (`id`),
  ADD CONSTRAINT `inscricaos_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`),
  ADD CONSTRAINT `inscricaos_modalidade_id_foreign` FOREIGN KEY (`modalidade_id`) REFERENCES `modalidades` (`id`);

--
-- Limitadores para a tabela `instrutors`
--
ALTER TABLE `instrutors`
  ADD CONSTRAINT `instrutors_studio_id_foreign` FOREIGN KEY (`studio_id`) REFERENCES `studios` (`id`);

--
-- Limitadores para a tabela `modalidades`
--
ALTER TABLE `modalidades`
  ADD CONSTRAINT `modalidades_campeonato_id_foreign` FOREIGN KEY (`campeonato_id`) REFERENCES `campeonatos` (`id`);

--
-- Limitadores para a tabela `resultados`
--
ALTER TABLE `resultados`
  ADD CONSTRAINT `resultados_campeonato_id_foreign` FOREIGN KEY (`campeonato_id`) REFERENCES `campeonatos` (`id`),
  ADD CONSTRAINT `resultados_inscricao_id_foreign` FOREIGN KEY (`inscricao_id`) REFERENCES `inscricaos` (`id`);

--
-- Limitadores para a tabela `turmas`
--
ALTER TABLE `turmas`
  ADD CONSTRAINT `turmas_atividade_id_foreign` FOREIGN KEY (`atividade_id`) REFERENCES `atividades` (`id`),
  ADD CONSTRAINT `turmas_instrutor_id_foreign` FOREIGN KEY (`instrutor_id`) REFERENCES `instrutors` (`id`);

--
-- Limitadores para a tabela `valoratividades`
--
ALTER TABLE `valoratividades`
  ADD CONSTRAINT `valoratividades_atividade_id_foreign` FOREIGN KEY (`atividade_id`) REFERENCES `atividades` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
