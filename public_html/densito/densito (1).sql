-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 30-Mar-2018 às 18:03
-- Versão do servidor: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `densito`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `composicaocorpo`
--

CREATE TABLE `composicaocorpo` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `sexo` varchar(11) NOT NULL,
  `dnasc` date NOT NULL,
  `dexame` date NOT NULL,
  `peso` varchar(10) DEFAULT NULL,
  `altura` varchar(10) DEFAULT NULL,
  `imc` varchar(10) NOT NULL,
  `bmc` varchar(10) DEFAULT NULL,
  `dmot` decimal(3,3) DEFAULT NULL,
  `zstotal` decimal(3,3) DEFAULT NULL,
  `mmagra` varchar(10) DEFAULT NULL,
  `mapend` varchar(10) DEFAULT NULL,
  `mtotal` varchar(10) DEFAULT NULL,
  `gorduratotal` varchar(10) DEFAULT NULL,
  `gorduraporc` varchar(10) DEFAULT NULL,
  `indgord` varchar(10) DEFAULT NULL,
  `relag` varchar(10) DEFAULT NULL,
  `selecionada` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `composicaocorpo`
--

INSERT INTO `composicaocorpo` (`id`, `nome`, `sexo`, `dnasc`, `dexame`, `peso`, `altura`, `imc`, `bmc`, `dmot`, `zstotal`, `mmagra`, `mapend`, `mtotal`, `gorduratotal`, `gorduraporc`, `indgord`, `relag`, `selecionada`) VALUES
(109, 'marcos', 'masc', '1985-05-18', '2015-02-03', '97', '1.66', '35.20', '2.747', '0.999', '0.200', '64.2', '29.1', '92.0', '27.8', '30.22', '10.09', '1.38', 1),
(122, 'talita', 'fem', '1968-12-31', '2018-12-31', '120', '1.60', '46.88', '-0.001', '-0.001', '-0.100', '30', '20', '200', '50', '25.00', '19.53', '', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `id` int(11) NOT NULL,
  `empresa` varchar(255) NOT NULL,
  `cep` varchar(255) DEFAULT NULL,
  `rua` varchar(255) DEFAULT NULL,
  `bairro` varchar(100) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `uf` varchar(100) DEFAULT NULL,
  `contato` varchar(255) DEFAULT NULL,
  `cnpj` varchar(255) DEFAULT NULL,
  `diretor` varchar(100) DEFAULT NULL,
  `cpfdiretor` varchar(100) DEFAULT NULL,
  `equipamento` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`id`, `empresa`, `cep`, `rua`, `bairro`, `cidade`, `uf`, `contato`, `cnpj`, `diretor`, `cpfdiretor`, `equipamento`) VALUES
(1, 'tecximagem', '11730-000', 'Av.: SÃ£o Paulo, nÂ° 1.380 sala 4 e 5.', 'Centro', 'MongaguÃ¡', 'SP', 'Telefones: 13 3448-4564 / 13 4109-2819', '', '', '', 'DPX LUNAR'),
(2, 'CEDU ServiÃ§os MÃ©dicos LTDA', '01227000', 'Avenida AngÃ©lica n.727 ap 51', 'Santa CecÃ­lia', 'SÃ£o Paulo', 'SP', 'Ex: Telefones: 13 3448-4564 / 13 4109-2819 - E-mail:laudodensitometria@gmail.com', '095.274.360-0001-08', 'Helio Luiz Bernardi', '156.983.768-67', 'LUNAR DPX'),
(6, 'cardiocenter', '39400-110', 'Rua IrmÃ£ Beata n. 468', 'Centro', 'Montes Claros', 'MG', 'Telefone: (38) 3221-4253', '0020.615.270-0015-1', 'Geraldo Guinomar Alcantara', '', 'LUNAR DPX IQ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pacientes`
--

CREATE TABLE `pacientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `sexo` varchar(11) NOT NULL,
  `dnasc` date NOT NULL,
  `dexame` date NOT NULL,
  `tslomb` varchar(10) DEFAULT NULL,
  `tscolo` varchar(10) DEFAULT NULL,
  `tsft` varchar(10) DEFAULT NULL,
  `dmolomb` decimal(3,3) DEFAULT NULL,
  `dmocolo` decimal(3,3) DEFAULT NULL,
  `dmoft` decimal(3,3) DEFAULT NULL,
  `zslomb` varchar(10) DEFAULT NULL,
  `zscolo` varchar(10) DEFAULT NULL,
  `zsft` varchar(10) DEFAULT NULL,
  `selecionada` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pacientes`
--

INSERT INTO `pacientes` (`id`, `nome`, `sexo`, `dnasc`, `dexame`, `tslomb`, `tscolo`, `tsft`, `dmolomb`, `dmocolo`, `dmoft`, `zslomb`, `zscolo`, `zsft`, `selecionada`) VALUES
(320, 'FABIANA CARLA SILVA', 'fem', '1981-12-31', '2018-12-31', '-1.6', '-1.4', '-1', '-0.007', '-0.010', '-0.012', '', '', '', 1),
(322, 'Rita de CAssia', 'fem', '1952-07-25', '2018-12-31', '', '', '', '-0.027', '-0.015', '-0.021', '-1.5', '-0.8', '-1.6', 1),
(334, '', 'fem', '0000-00-00', '0000-00-00', '', '', '', '0.000', '0.000', '0.000', '', '', '', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `medico` varchar(255) DEFAULT NULL,
  `nomemedico` varchar(255) DEFAULT NULL,
  `crm` varchar(255) DEFAULT NULL,
  `contato` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `senha`, `medico`, `nomemedico`, `crm`, `contato`) VALUES
(1, 'hmbradiologia@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'helio', 'HELIO LUIZ F. B. BERNARDI', 'CRM/SP: 97.253', '11977003843'),
(2, 'laudodensitometria@gmail.com', '18d37e0ad6a245c79e86258a10e25b69', 'evelyn', 'EVELYN DA SILVA MARINHO', 'CRM/SP: 128.114', '1198111111'),
(3, 'hlfbernardi@hotmail.com', '1ab5f2bcdf43dfefde7dae0c5a2e86ff', 'helio', 'HELIO LUIZ F. M. BERNARDI', 'CRM/SP: 97.253', '11 977003843');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `composicaocorpo`
--
ALTER TABLE `composicaocorpo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `composicaocorpo`
--
ALTER TABLE `composicaocorpo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=196;

--
-- AUTO_INCREMENT for table `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=335;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
