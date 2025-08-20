-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2025 at 08:37 PM
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
-- Database: `locadora`
--

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(2) NOT NULL,
  `descricao` varchar(20) NOT NULL,
  `valor` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `descricao`, `valor`) VALUES
(1, 'SUV', 200),
(2, 'Passeio', 100),
(3, 'Van', 270),
(6, 'Off Road', 312),
(7, 'Blindado', 231),
(8, 'Trabalho', 80);

-- --------------------------------------------------------

--
-- Table structure for table `exemplares`
--

CREATE TABLE `exemplares` (
  `id_exemplar` int(11) NOT NULL,
  `placa_veiculo` varchar(8) NOT NULL,
  `id_locacao` int(11) NOT NULL,
  `locado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `locacao`
--

CREATE TABLE `locacao` (
  `id_locacao` int(11) NOT NULL,
  `data` date NOT NULL,
  `valor_total` float NOT NULL,
  `cpf_socio` varchar(11) NOT NULL,
  `id_veiculo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `socios`
--

CREATE TABLE `socios` (
  `cpf` varchar(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `rg` varchar(12) NOT NULL,
  `logradouro` varchar(100) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `cep` varchar(100) NOT NULL,
  `telefone` varchar(12) NOT NULL,
  `email` varchar(15) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `socios`
--

INSERT INTO `socios` (`cpf`, `nome`, `rg`, `logradouro`,`cidade`,`estado`,`cep`, `telefone`, `email`, `id_usuario`) VALUES
('12345678901', 'Maria Oliveira', 'MG1234567', 'Rua das Flores', 'Alegre', 'Espírito Santo', '29500-000', '31988776655', 'maria@email.com', 1),
('98765432100', 'João Silva', 'SP9876543', 'Av. Paulista', 'São Paulo', 'São Paulo', '29561-000', '11977665544', 'joao@email.com', 2);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `tipo_usuario` enum('administrador','comum') NOT NULL DEFAULT 'comum'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `user`, `senha`, `tipo_usuario`) VALUES
(1, 'aluno@email', '123', 'comum'),
(2, 'admin@email', '123', 'administrador');

-- --------------------------------------------------------

--
-- Table structure for table `veiculos`
--

CREATE TABLE `veiculos` (
  `placa` varchar(8) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `anoFabricacao` int(10) UNSIGNED DEFAULT NULL,
  `fabricante` varchar(30) DEFAULT NULL,
  `opcionais` text DEFAULT NULL,
  `motorizacao` varchar(50) NOT NULL,
  `valorBase` float NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `fotoReferencia` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `veiculos`
--

INSERT INTO `veiculos` (`placa`, `nome`, `anoFabricacao`, `fabricante`, `opcionais`, `motorizacao`, `valorBase`, `id_categoria`, `fotoReferencia`) VALUES
('HGW4308', 'Triton', 2025, 'Mitsubish', 'Alarme, Ar quente, Banco com regulagem de altura, Computador de bordo, Controle de traçã, Desembaçador traseiro, Ar condicionado, Encosto de cabeça traseiro', '2.4', 500, 6, '1755396831_68a13adf0c704.jpg'),
('HSZ5690', 'Range Rover Evoque', 2018, 'Land Rover', 'Travas elétricas, Vidros elétricos, Volante com regulagem de altura, Bancos em couro, Tração 4x4, GPS', '2.0 Turbo', 600, 1, '1755397377_68a13d01e4037.webp'),
('JJG2918', 'Pajero Sport', 2020, 'Mitsubish', 'Banco com regulagem de altura, Computador de bordo, Controle de tração, Desembaçador traseiro, Ar condicionado, Encosto de cabeça traseiro, Freio ABS, Limpador traseiro', '2.4 Turbo', 700, 1, '1755397064_68a13bc838dde.webp'),
('JRT8733', 'Tiggo 8 Pro', 2024, 'Caoa Cherry', 'Ar, Vidro elétrico, Direção elétrica', '1.5', 370, 1, '1755396636_68a13a1c15105.webp'),
('JUP2679', 'Seal', 2024, 'BYD', 'Teto solar, Retrovisor fotocrômico, Travas elétricas, Vidros elétricos, Volante com regulagem de altura, Bancos em couro, GPS', '82,5 Kw', 359, 2, '1755397193_68a13c497b39d.jpg'),
('JYD0621', 'Porsche Cayenne E-Hybrid', 2025, 'Porsche', 'Suspensão pneumática adaptável, central multimídia Porsche PCM, bancos em couro, teto solar panorâmico, sistema de som Burmester, faróis LED Matrix, sistema de navegação, aquecimento de bancos', 'V6 turbo de 353cv com motor elétrico de 176cv', 2000, 1, '1755397815_68a13eb76a582.webp'),
('KDZ1651', 'Volvo XC40 Recharge Pure Electric (EX40)', 2025, 'Volvo', 'Google Maps integrado, assistente Google, Google Play, Apple CarPlay, câmeras 360°, sistema de som premium, bancos aquecidos, teto solar panorâmico, assistência ao condutor', '69 kW', 2000, 1, '1755397747_68a13e7333b9c.webp'),
('KIJ6735', 'Mercedes-Benz GLE 450 d 4MATIC', 2024, 'Mercedes-Benz', 'Sistema MBUX de segunda geração, faróis LED High-Performance, bancos em couro, sistema de som premium, câmeras 360°, sistema de navegação, ar condicionado automático, volante com sensor táctil', '2.9 ', 4000, 1, '1755397907_68a13f138114d.jpg'),
('MXA2479', 'Ford Bronco Sport Badlands', 2024, 'Ford', 'Central multimídia SYNC 4 de 13,2\", quadro de instrumentos digital de 12,3\", bancos de couro com aquecimento, volante aquecido, câmeras 360°, piloto automático adaptativo, teto solar, sistema G.O.A.T. de gestão de terrenos', '2.0 ', 650, 6, '1755397861_68a13ee557fdc.jpg'),
('NEN3249', 'Mercedes-Benz C250 Coupé Sport', 2025, 'Mercedes-Benz', 'Central multimídia, ar condicionado automático, bancos em couro, câmbio automático, faróis LED, sistema de som premium, controle de estabilidade, airbags múltiplos', '2.0L Turbo', 3000, 2, '1755397703_68a13e4767b88.webp');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indexes for table `exemplares`
--
ALTER TABLE `exemplares`
  ADD PRIMARY KEY (`id_exemplar`);

--
-- Indexes for table `locacao`
--
ALTER TABLE `locacao`
  ADD PRIMARY KEY (`id_locacao`);

--
-- Indexes for table `socios`
--
ALTER TABLE `socios`
  ADD PRIMARY KEY (`cpf`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `veiculos`
--
ALTER TABLE `veiculos`
  ADD PRIMARY KEY (`placa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `exemplares`
--
ALTER TABLE `exemplares`
  MODIFY `id_exemplar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `locacao`
--
ALTER TABLE `locacao`
  MODIFY `id_locacao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
