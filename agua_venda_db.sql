-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2018 at 02:05 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.0.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agua_venda_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_client`
--

CREATE TABLE `tb_client` (
  `cli_pk_int` int(11) NOT NULL,
  `cli_name_text` text NOT NULL,
  `cli_obs_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_client`
--

INSERT INTO `tb_client` (`cli_pk_int`, `cli_name_text`, `cli_obs_text`) VALUES
(1, 'daniel', 'amigo'),
(2, 'daniel', 'aamigo'),
(3, 'rafael', 'aamigo'),
(5, 'RAFAEL', 'freitas'),
(7, 'Silvio', 'Samael'),
(8, 'TIBERIO', 'vila sâo miguel'),
(9, '', ''),
(10, 'TAVARES', 'domingos'),
(11, 'MANUEL', 'da silva'),
(12, 'ROMEU', 'do som'),
(13, 'DEU', 'certo'),
(14, 'ROMOALDO', 'da silva'),
(15, 'DEU', 'certo'),
(16, 'GUSTAVO', 'francisco'),
(17, 'HOMERO', 'do banco'),
(18, 'YASMIM', 'da faus'),
(19, 'RAFAEL', 'da vila'),
(20, 'RAFAEL', ''),
(21, 'RAFAEL', 'da lagoa'),
(22, 'MANUEL SILVA', 'tavares');

-- --------------------------------------------------------

--
-- Table structure for table `tb_lista_pedido`
--

CREATE TABLE `tb_lista_pedido` (
  `lista_pedido_pk` int(11) NOT NULL,
  `lista_pedido_pedido_fk` int(11) NOT NULL,
  `lista_pedido_produto_id` int(11) NOT NULL,
  `lista_pedido_produto_nome` text NOT NULL,
  `lista_pedido_produto_valor` double(10,2) NOT NULL,
  `lista_pedido_quantidade` int(11) NOT NULL DEFAULT '0',
  `lista_pedido_subtotal` double(10,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_lista_pedido`
--

INSERT INTO `tb_lista_pedido` (`lista_pedido_pk`, `lista_pedido_pedido_fk`, `lista_pedido_produto_id`, `lista_pedido_produto_nome`, `lista_pedido_produto_valor`, `lista_pedido_quantidade`, `lista_pedido_subtotal`) VALUES
(1, 1, 1, 'ÁGUA MINERAL', 3.00, 0, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pedido`
--

CREATE TABLE `tb_pedido` (
  `pedido_pk` int(11) NOT NULL,
  `pedido_client_fk` int(11) NOT NULL,
  `pedido_data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pedido_estado` int(11) NOT NULL DEFAULT '0',
  `pedido_saldo_total` double(10,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_pedido`
--

INSERT INTO `tb_pedido` (`pedido_pk`, `pedido_client_fk`, `pedido_data`, `pedido_estado`, `pedido_saldo_total`) VALUES
(1, 12, '2018-04-25 11:31:22', 0, 0.00),
(2, 11, '2018-05-21 21:00:19', 0, 0.00),
(3, 5, '2018-05-21 21:09:41', 2, 32.55);

-- --------------------------------------------------------

--
-- Table structure for table `tb_produto`
--

CREATE TABLE `tb_produto` (
  `produto_pk` int(11) NOT NULL,
  `produto_nome` text NOT NULL,
  `produto_valor` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_produto`
--

INSERT INTO `tb_produto` (`produto_pk`, `produto_nome`, `produto_valor`) VALUES
(1, 'GÁS', 72.00),
(2, 'ÁGUA', 3.00),
(5, 'Tijolo', 15.25);

-- --------------------------------------------------------

--
-- Table structure for table `tb_recebimento`
--

CREATE TABLE `tb_recebimento` (
  `recebimento_pk` int(11) NOT NULL,
  `recebimento_cliente_fk` int(11) NOT NULL,
  `recebimento_valor` double(10,2) NOT NULL,
  `recebimento_obs` text NOT NULL,
  `recebimento_data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_client`
--
ALTER TABLE `tb_client`
  ADD PRIMARY KEY (`cli_pk_int`);

--
-- Indexes for table `tb_lista_pedido`
--
ALTER TABLE `tb_lista_pedido`
  ADD PRIMARY KEY (`lista_pedido_pk`),
  ADD KEY `fk_lista_pedido_pedido` (`lista_pedido_pedido_fk`);

--
-- Indexes for table `tb_pedido`
--
ALTER TABLE `tb_pedido`
  ADD PRIMARY KEY (`pedido_pk`),
  ADD KEY `pedido_client_fk` (`pedido_client_fk`);

--
-- Indexes for table `tb_produto`
--
ALTER TABLE `tb_produto`
  ADD PRIMARY KEY (`produto_pk`);

--
-- Indexes for table `tb_recebimento`
--
ALTER TABLE `tb_recebimento`
  ADD PRIMARY KEY (`recebimento_pk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_client`
--
ALTER TABLE `tb_client`
  MODIFY `cli_pk_int` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tb_lista_pedido`
--
ALTER TABLE `tb_lista_pedido`
  MODIFY `lista_pedido_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_pedido`
--
ALTER TABLE `tb_pedido`
  MODIFY `pedido_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_produto`
--
ALTER TABLE `tb_produto`
  MODIFY `produto_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_recebimento`
--
ALTER TABLE `tb_recebimento`
  MODIFY `recebimento_pk` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_lista_pedido`
--
ALTER TABLE `tb_lista_pedido`
  ADD CONSTRAINT `fk_lista_pedido_pedido` FOREIGN KEY (`lista_pedido_pedido_fk`) REFERENCES `tb_pedido` (`pedido_pk`);

--
-- Constraints for table `tb_pedido`
--
ALTER TABLE `tb_pedido`
  ADD CONSTRAINT `pedido_client_fk` FOREIGN KEY (`pedido_client_fk`) REFERENCES `tb_client` (`cli_pk_int`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
