-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 11-Set-2018 às 23:50
-- Versão do servidor: 10.1.35-MariaDB
-- versão do PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `corkexpress`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categprofissional`
--

CREATE TABLE `categprofissional` (
  `id_catprof` int(11) NOT NULL,
  `nome_catprof` varchar(30) NOT NULL,
  `id_departamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categprofissional`
--

INSERT INTO `categprofissional` (`id_catprof`, `nome_catprof`, `id_departamento`) VALUES
(1, 'Operário de linha', 2),
(2, 'Controlo de Qualidade', 2),
(3, 'Finanças', 1),
(4, 'Information Technologies', 1),
(6, 'Mecânicos De PLCs', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cores`
--

CREATE TABLE `cores` (
  `id` int(1) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `logo` varchar(7) NOT NULL,
  `header` varchar(7) NOT NULL,
  `body` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cores`
--

INSERT INTO `cores` (`id`, `Name`, `logo`, `header`, `body`) VALUES
(1, 'Dark Mode', '#23272a', '#2c2f33', '#99aab5'),
(2, 'Light Mode', '#f5f5f5', '#f5f5f5', '#ffffff');

-- --------------------------------------------------------

--
-- Estrutura da tabela `departamento`
--

CREATE TABLE `departamento` (
  `id_depart` int(11) NOT NULL,
  `nome_depart` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `departamento`
--

INSERT INTO `departamento` (`id_depart`, `nome_depart`) VALUES
(1, 'Escritório'),
(2, 'Operacional');

-- --------------------------------------------------------

--
-- Estrutura da tabela `irs`
--

CREATE TABLE `irs` (
  `id` int(11) NOT NULL,
  `min` int(11) NOT NULL,
  `max` int(11) NOT NULL,
  `mult` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `irs`
--

INSERT INTO `irs` (`id`, `min`, `max`, `mult`) VALUES
(1, 0, 550, 0.08),
(2, 550, 999, 0.09),
(3, 999, 1499, 0.1),
(4, 1499, 2147483647, 0.12);

-- --------------------------------------------------------

--
-- Estrutura da tabela `meses`
--

CREATE TABLE `meses` (
  `id` int(11) NOT NULL,
  `mes` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `meses`
--

INSERT INTO `meses` (`id`, `mes`) VALUES
(1, 'Janeiro'),
(2, 'Fevereiro'),
(3, 'Março'),
(4, 'Abril'),
(5, 'Maio'),
(6, 'Junho'),
(7, 'Julho'),
(8, 'Agosto'),
(9, 'Setembro'),
(10, 'Outubro'),
(11, 'Novembro'),
(12, 'Dezembro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `recibos`
--

CREATE TABLE `recibos` (
  `id` int(11) NOT NULL,
  `id_trabalhador` int(11) NOT NULL,
  `ss_mult` double NOT NULL,
  `ss_val` double NOT NULL,
  `irs_mult` double NOT NULL,
  `irs_val` double NOT NULL,
  `turno_nome` varchar(20) NOT NULL,
  `turno_mult` double NOT NULL,
  `isFerias` int(1) NOT NULL,
  `isSubNat` int(1) NOT NULL,
  `total` double NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `recibos`
--

INSERT INTO `recibos` (`id`, `id_trabalhador`, `ss_mult`, `ss_val`, `irs_mult`, `irs_val`, `turno_nome`, `turno_mult`, `isFerias`, `isSubNat`, `total`, `data`) VALUES
(1, 2, 0.11, 0.1111, 0.08, 0.0808, 'manhã', 0.01, 0, 0, 0.8181, '2018-09-11 17:53:56'),
(4, 5, 0.11, 113.3, 0.1, 103, 'noite', 0.03, 0, 0, 813.7, '2018-09-11 17:58:10'),
(8, 3, 0, 0, 0, 0, '', 0, 0, 0, 0, '2018-08-15 23:00:00'),
(11, 5, 0, 0, 0, 0, '', 0, 1, 0, 0, '2017-10-26 21:29:58');

-- --------------------------------------------------------

--
-- Estrutura da tabela `segurancasocial`
--

CREATE TABLE `segurancasocial` (
  `id` int(11) NOT NULL,
  `min` int(11) NOT NULL,
  `max` int(11) NOT NULL,
  `mult_func` double NOT NULL,
  `mult_emp` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `segurancasocial`
--

INSERT INTO `segurancasocial` (`id`, `min`, `max`, `mult_func`, `mult_emp`) VALUES
(1, 0, 550, 0.11, 0.11),
(2, 551, 1099, 0.11, 0.12),
(3, 1100, 2147483647, 0.11, 0.13);

-- --------------------------------------------------------

--
-- Estrutura da tabela `turno`
--

CREATE TABLE `turno` (
  `id` int(11) NOT NULL,
  `nome_turno` varchar(20) NOT NULL,
  `mult` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `turno`
--

INSERT INTO `turno` (`id`, `nome_turno`, `mult`) VALUES
(1, 'manhã', 0.01),
(2, 'tarde', 0.015),
(3, 'noite', 0.03);

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizador`
--

CREATE TABLE `utilizador` (
  `id_users` int(11) NOT NULL,
  `nome_users` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `morada` varchar(100) NOT NULL,
  `nif` varchar(11) NOT NULL,
  `niss` varchar(13) NOT NULL,
  `nib` varchar(23) NOT NULL,
  `telemovel` varchar(9) NOT NULL,
  `datanasc` date NOT NULL,
  `id_catprof` int(11) NOT NULL,
  `salario` double NOT NULL,
  `password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `utilizador`
--

INSERT INTO `utilizador` (`id_users`, `nome_users`, `email`, `morada`, `nif`, `niss`, `nib`, `telemovel`, `datanasc`, `id_catprof`, `salario`, `password`) VALUES
(2, 'ze', 'ze@ze.ze', 'ze', '123456789', 'ze', 'ze', '910000000', '1997-05-16', 1, 1, 'jose'),
(3, 'beny', 'beny@djimail.com', 'beny', 'beny', 'beny', 'beny', '9100', '1994-10-20', 1, 1, 'beny'),
(5, 'SuperMegaMachoInvencivelDoEspaço', 'boda@gaymail.com', 'YMCA', '123', '123', '123', '910000001', '0003-02-01', 4, 1000, 'boda');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categprofissional`
--
ALTER TABLE `categprofissional`
  ADD PRIMARY KEY (`id_catprof`);

--
-- Indexes for table `cores`
--
ALTER TABLE `cores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id_depart`);

--
-- Indexes for table `irs`
--
ALTER TABLE `irs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meses`
--
ALTER TABLE `meses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recibos`
--
ALTER TABLE `recibos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `segurancasocial`
--
ALTER TABLE `segurancasocial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `turno`
--
ALTER TABLE `turno`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utilizador`
--
ALTER TABLE `utilizador`
  ADD PRIMARY KEY (`id_users`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `nif` (`nif`),
  ADD UNIQUE KEY `niss` (`niss`),
  ADD UNIQUE KEY `nib` (`nib`),
  ADD UNIQUE KEY `telemovel` (`telemovel`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categprofissional`
--
ALTER TABLE `categprofissional`
  MODIFY `id_catprof` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cores`
--
ALTER TABLE `cores`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id_depart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `irs`
--
ALTER TABLE `irs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `meses`
--
ALTER TABLE `meses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `recibos`
--
ALTER TABLE `recibos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `segurancasocial`
--
ALTER TABLE `segurancasocial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `turno`
--
ALTER TABLE `turno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `utilizador`
--
ALTER TABLE `utilizador`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
