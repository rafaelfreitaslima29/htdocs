-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2018 at 11:38 PM
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

DELIMITER $$
--
-- Procedures
--
CREATE PROCEDURE `sp_cliente_criar` (`p_client_nome` TEXT, `p_client_obs` TEXT)  BEGIN

INSERT INTO 
`tb_client` 
(
`cli_pk_int`,
`cli_name_text`, 
`cli_obs_text`)
VALUES 
(
NULL,
p_client_nome,
p_client_obs
);

SELECT 
last_insert_id();

END$$

CREATE PROCEDURE `sp_pedido_criar` (`p_pedido_client_fk` INT(11))  BEGIN

INSERT INTO 
`tb_pedido` 
(`pedido_pk`,
 `pedido_client_fk`, 
`pedido_data`, 
`pedido_estado`, 
`pedido_saldo_total`)
VALUES 
(NULL,
 p_pedido_client_fk,
CURRENT_TIMESTAMP,
 '0',
 '0.00');
SELECT 
last_insert_id();

END$$

CREATE PROCEDURE `sp_recebimento_registrar` (`valor` DOUBLE, `idclientefk` INT, `obs` TEXT)  BEGIN

INSERT INTO `tb_recebimento` (`recebimento_pk`, `recebimento_cliente_fk`, `recebimento_valor`, `recebimento_obs`, `recebimento_data`) VALUES (NULL, idclientefk, valor, UPPER(obs), CURRENT_TIMESTAMP);


SELECT 
last_insert_id();

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_client`
--

CREATE TABLE `tb_client` (
  `cli_pk_int` int(11) NOT NULL,
  `cli_name_text` text NOT NULL,
  `cli_obs_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

-- --------------------------------------------------------

--
-- Table structure for table `tb_produto`
--

CREATE TABLE `tb_produto` (
  `produto_pk` int(11) NOT NULL,
  `produto_nome` text NOT NULL,
  `produto_valor` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_recebimento`
--

CREATE TABLE `tb_recebimento` (
  `recebimento_pk` int(11) NOT NULL,
  `recebimento_cliente_fk` int(11) NOT NULL,
  `recebimento_valor` double(10,2) NOT NULL DEFAULT '0.00',
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
  ADD PRIMARY KEY (`recebimento_pk`),
  ADD KEY `receb_cliente_fk` (`recebimento_cliente_fk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_client`
--
ALTER TABLE `tb_client`
  MODIFY `cli_pk_int` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_lista_pedido`
--
ALTER TABLE `tb_lista_pedido`
  MODIFY `lista_pedido_pk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_pedido`
--
ALTER TABLE `tb_pedido`
  MODIFY `pedido_pk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_produto`
--
ALTER TABLE `tb_produto`
  MODIFY `produto_pk` int(11) NOT NULL AUTO_INCREMENT;

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

--
-- Constraints for table `tb_recebimento`
--
ALTER TABLE `tb_recebimento`
  ADD CONSTRAINT `receb_cliente_fk` FOREIGN KEY (`recebimento_cliente_fk`) REFERENCES `tb_client` (`cli_pk_int`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
