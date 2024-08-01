-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2024 at 07:00 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `leitura`
--

-- --------------------------------------------------------

--
-- Table structure for table `identidade`
--

CREATE TABLE `identidade` (
  `id` int(11) NOT NULL,
  `identidade_cliente` int(11) NOT NULL,
  `identidade_leiturista` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leitura`
--

CREATE TABLE `leitura` (
  `id` int(11) NOT NULL,
  `data_leitura` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `leitura` int(11) NOT NULL,
  `consumo` int(11) NOT NULL,
  `valor` double NOT NULL,
  `id_leiturista` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `leitura`
--

INSERT INTO `leitura` (`id`, `data_leitura`, `leitura`, `consumo`, `valor`, `id_leiturista`, `id_cliente`) VALUES
(4, '2024-01-02 00:00:00', 8, 8, 490.632, 0, 2),
(5, '2024-02-05 00:00:00', 18, 10, 613.29, 0, 2),
(6, '2024-03-02 00:00:00', 25, 7, 429.303, 0, 2),
(7, '2024-04-09 23:00:00', 40, 15, 919.935, 0, 2),
(8, '2024-05-07 23:00:00', 100, 60, 6132.9, 0, 2),
(9, '2024-06-04 23:00:00', 130, 30, 1839.87, 0, 2),
(10, '2024-07-01 23:00:00', 140, 10, 613.29, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `notificacao`
--

CREATE TABLE `notificacao` (
  `id` int(11) NOT NULL,
  `mensagem` text NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `notificacao`
--

INSERT INTO `notificacao` (`id`, `mensagem`, `id_usuario`, `estado`) VALUES
(6, 'eita', 2, 1),
(7, 'Saudações administrador, estou passando por um problema, desde ontem aqui na minha residência não está a sair água, não sei o que está acontendo, peço ajuda.', 2, 1),
(8, 'Olá adm', 3, 1),
(9, 'Estou a precisar da sua ajuda ', 3, 1),
(10, 'Estou passando por um problema administrador... estou numa crise financeira, gostaria que não curtassem água, estou, premeto ao encontrar dinheiro pago, senhor voce deve me entender porque eu tambem vos entendo quando a agua nao sai aqui, entao entenda phaaa, eu tambem estou cansado de pagar  a agua todos meses...', 9, 1),
(11, 'Olá adminstrador, vai uma geladinha aí? eu que papo a conta, relaxa vai gramar.', 8, 1),
(12, 'estou a enfrentar problemas', 9, 1),
(13, 'saudacoes,ADM', 2, 1),
(14, 'Bom fim de semana Administrador...', 8, 1),
(15, 'Saudacoes estimado administrador, como vai ?', 8, 1),
(16, 'Nao está a responder as minhas mensagens por qê?', 8, 0);

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `provincia` varchar(50) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `quarteirao` int(11) NOT NULL,
  `nrcasa` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `categoria` varchar(15) NOT NULL,
  `limite` int(11) NOT NULL,
  `data_counte` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `estado` tinyint(1) NOT NULL,
  `estate` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `sexo`, `provincia`, `bairro`, `quarteirao`, `nrcasa`, `email`, `senha`, `categoria`, `limite`, `data_counte`, `estado`, `estate`) VALUES
(1, 'Paulo Joaquim Massingue', 'Masculino', 'Maputo', 'FPLM', 1, 79, 'paulomassingue@gmail.com', '1234', 'Administrador', 0, '2024-07-30 14:20:15', 0, 0),
(2, 'David Massingue', 'masculino', 'Maputo', 'FPLM', 1, 76, 'david@gmail.com', '1234', 'Cliente', 0, '2024-08-01 16:46:59', 0, 0),
(3, 'invictus', 'masculino', 'Maputo', 'Mavalane', 30, 109, 'invitus@gmail.com', '1234', 'Leiturista', 0, '2024-07-30 16:37:28', 0, 0),
(5, 'Eita Rapaz', 'masculino', 'Nampula', 'Namutekeliwa', 100, 1234, 'eitarapaz@gmail.com', '12345', 'Administrador', 0, '2024-07-07 08:45:11', 0, 0),
(8, 'Ana Massingue', 'feminino', 'Maputo', 'FPLM', 10, 45, 'anamassingue@gmail.com', '12345', 'Cliente', 0, '2024-07-30 16:07:23', 0, 0),
(9, 'Anaclénia Fernando', 'feminino', 'Nampula', 'CBD', 4, 8, 'anaclenia@gmail.com', '1234', 'Cliente', 0, '2024-07-28 19:22:39', 0, 0),
(10, 'Mr Cury', 'masculino', 'Cabo Delgado', 'Navio', 4, 5, 'cury@gmail.com', '12345', 'Leiturista', 0, '2024-07-30 16:37:39', 0, 0),
(11, 'Mestre IP', 'masculino', 'Maputo', 'Gueto', 1, 76, 'mestreip@gmail.com', '12345', 'Leiturista', 0, '2024-07-30 17:12:52', 0, 1),
(12, 'Nélia ', 'feminino', 'Maputo', 'FPLM', 1, 35, 'nelia@gmail.com', '12345', 'Cliente', 0, '2024-07-30 14:42:29', 0, 0),
(13, 'Galadao de Deus', 'masculino', 'Jerusalem', 'Espírito Santo', 10, 12, 'galardao@gmail.com', '12345', 'Cliente', 0, '2024-07-30 17:15:25', 0, 1),
(14, 'Man of God', 'masculino', 'Israel', 'Rocha', 2, 13, 'manofgod@gmail.com', '12345', 'Cliente', 0, '2024-07-30 17:17:11', 0, 0),
(15, 'Egnalda da Gaista Polo', 'feminino', 'Beirra', 'Mpondo', 54, 26, 'ednalda@gmail.com', '12345', 'Cliente', 0, '2024-07-30 16:37:55', 0, 1),
(16, 'Rapazao', 'masculino', 'Maputo', 'FPLM', 1, 12, 'rapazao@gmail.com', '12345', 'Cliente', 0, '2024-07-30 16:58:53', 0, 0),
(17, 'Marco Polo', 'masculino', 'Tanganyica', 'Zebedeu', 12, 12, 'marcopolo@gmail.com', '1234', 'Leiturista', 0, '2024-07-30 17:13:56', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `identidade`
--
ALTER TABLE `identidade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leitura`
--
ALTER TABLE `leitura`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notificacao`
--
ALTER TABLE `notificacao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `identidade`
--
ALTER TABLE `identidade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `leitura`
--
ALTER TABLE `leitura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `notificacao`
--
ALTER TABLE `notificacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
