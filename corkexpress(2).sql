-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 10-Set-2018 às 18:53
-- Versão do servidor: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(4, 'Information Technologies', 1);

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
(2, 'ze', 'ze@ze.ze', 'ze', '123456789', 'ze', 'ze', '910000000', '1997-05-16', 1, 1, '123456789'),
(3, 'beny', 'beny@djimail.com', 'beny', 'beny', 'beny', 'beny', '9100', '1994-10-20', 1, 1, 'beny'),
(5, 'SuperMegaMachoInvencivelDoEspaço', 'boda@gaymail.com', 'YMCA', '123', '123', '123', '911775845', '0003-02-01', 4, 1000, '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categprofissional`
--
ALTER TABLE `categprofissional`
  ADD PRIMARY KEY (`id_catprof`);

--
-- Indexes for table `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id_depart`);

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
  MODIFY `id_catprof` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id_depart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `utilizador`
--
ALTER TABLE `utilizador`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
