-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 27-Mar-2017 às 10:55
-- Versão do servidor: 5.7.17-0ubuntu0.16.04.1
-- PHP Version: 7.0.15-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petlivre`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `acesso`
--

CREATE TABLE `acesso` (
  `codigo` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `login` varchar(15) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `nivel` int(1) NOT NULL,
  `pag_inicial` varchar(255) NOT NULL,
  `data_criacao` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `acesso`
--

INSERT INTO `acesso` (`codigo`, `nome`, `login`, `senha`, `nivel`, `pag_inicial`, `data_criacao`) VALUES
(1, 'Marcelo', 'admin', '626c73e99b24f60bc35c7f6516877c89', 3, 'nivel3/index_menu.php', '2017-03-21'),
(2, 'Usuario', 'user1', '84e60563ae4b363e7a968062b4d04f49', 1, 'nivel0/index_menu.php', '2017-03-21');

-- --------------------------------------------------------

--
-- Estrutura da tabela `agenda`
--

CREATE TABLE `agenda` (
  `codigo` int(11) NOT NULL,
  `evento` varchar(100) NOT NULL,
  `dtevento` date NOT NULL,
  `autor` varchar(100) NOT NULL,
  `hora` varchar(10) NOT NULL,
  `local` varchar(100) NOT NULL,
  `conteudo` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `combo_bairro`
--

CREATE TABLE `combo_bairro` (
  `codigo` int(11) NOT NULL,
  `bairro` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `combo_bairro`
--

INSERT INTO `combo_bairro` (`codigo`, `bairro`) VALUES
(1, 'TaboÃ£o');

-- --------------------------------------------------------

--
-- Estrutura da tabela `combo_categoria`
--

CREATE TABLE `combo_categoria` (
  `codigo` int(11) NOT NULL,
  `categoria_mat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `combo_categoria`
--

INSERT INTO `combo_categoria` (`codigo`, `categoria_mat`) VALUES
(1, 'Remédios'),
(2, 'Banho & Tosa'),
(3, 'Veterinário'),
(4, 'Ração'),
(5, 'Brinquedos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `combo_cidade`
--

CREATE TABLE `combo_cidade` (
  `codigo` int(11) NOT NULL,
  `cidade` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `combo_cidade`
--

INSERT INTO `combo_cidade` (`codigo`, `cidade`) VALUES
(1, 'SÃ£o Bernardo do Campo'),
(2, 'Diadema');

-- --------------------------------------------------------

--
-- Estrutura da tabela `combo_cor`
--

CREATE TABLE `combo_cor` (
  `codigo` int(11) NOT NULL,
  `cor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `combo_cor`
--

INSERT INTO `combo_cor` (`codigo`, `cor`) VALUES
(2, 'Branco');

-- --------------------------------------------------------

--
-- Estrutura da tabela `combo_especie`
--

CREATE TABLE `combo_especie` (
  `codigo` int(11) NOT NULL,
  `especie` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `combo_especie`
--

INSERT INTO `combo_especie` (`codigo`, `especie`) VALUES
(1, 'Dinheiro'),
(2, 'Cart&atilde;o'),
(3, 'Cheque'),
(4, 'Promiss&oacute;ria'),
(5, 'Outros');

-- --------------------------------------------------------

--
-- Estrutura da tabela `combo_raca`
--

CREATE TABLE `combo_raca` (
  `codigo` int(11) NOT NULL,
  `raca` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `combo_raca`
--

INSERT INTO `combo_raca` (`codigo`, `raca`) VALUES
(1, 'Poodle');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_caixa`
--

CREATE TABLE `tab_caixa` (
  `codigo` int(11) NOT NULL,
  `cod_material` int(11) NOT NULL,
  `material` varchar(100) NOT NULL,
  `qtde` int(11) NOT NULL,
  `medida` varchar(20) NOT NULL,
  `valor` varchar(20) NOT NULL,
  `especie` varchar(20) NOT NULL,
  `obs` longtext NOT NULL,
  `cod_produto` int(11) NOT NULL,
  `produto` varchar(100) NOT NULL,
  `pet` varchar(50) NOT NULL,
  `data` date NOT NULL,
  `status` int(1) NOT NULL,
  `usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_cartao`
--

CREATE TABLE `tab_cartao` (
  `codigo` int(11) NOT NULL,
  `ref_cartao` int(11) NOT NULL,
  `cartao` varchar(100) NOT NULL,
  `data_venda` date NOT NULL,
  `valor` varchar(20) NOT NULL,
  `enviado_email` int(1) NOT NULL,
  `usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_clie`
--

CREATE TABLE `tab_clie` (
  `codigo` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `cep` varchar(10) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `ddd_tel` int(3) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `ddd_cel` int(3) NOT NULL,
  `cel` varchar(15) NOT NULL,
  `rg` varchar(20) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `obs` longtext NOT NULL,
  `data_nasc` date NOT NULL,
  `caminho_foto` longtext NOT NULL,
  `data_cadastro` date NOT NULL,
  `data_ult_atlz` date DEFAULT NULL,
  `user_cadastro` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tab_clie`
--

INSERT INTO `tab_clie` (`codigo`, `nome`, `sexo`, `endereco`, `cep`, `bairro`, `cidade`, `uf`, `ddd_tel`, `tel`, `ddd_cel`, `cel`, `rg`, `cpf`, `obs`, `data_nasc`, `caminho_foto`, `data_cadastro`, `data_ult_atlz`, `user_cadastro`) VALUES
(1, 'Marcelo de Souza', 'masculino', 'Rua Santa Cruz,991', '09611-050', 'TaboÃ£o', 'SÃ£o Bernardo do Campo', 'SP', 11, '3118-5111', 11, '9826-5123', '2099988888', '112.333.444-55', 'teste', '1973-04-09', 'uploads/1490293567_23_3_2017.jpg', '2017-03-22', '2017-03-23', 'user1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_config_user`
--

CREATE TABLE `tab_config_user` (
  `codigo` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `login_dia_semana` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_fornecedor`
--

CREATE TABLE `tab_fornecedor` (
  `codigo` int(11) NOT NULL,
  `razao_social` varchar(255) NOT NULL,
  `contato` varchar(100) NOT NULL,
  `cnpj` varchar(20) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `cep` varchar(10) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `ddd_tel` varchar(2) NOT NULL,
  `tel_com` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `ddd_cel` varchar(2) NOT NULL,
  `cel` varchar(20) NOT NULL,
  `obs_forne` longtext NOT NULL,
  `caminho_foto` longtext NOT NULL,
  `data_cadastro` date NOT NULL,
  `data_ult_atlz` date DEFAULT NULL,
  `user_cadastro` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tab_fornecedor`
--

INSERT INTO `tab_fornecedor` (`codigo`, `razao_social`, `contato`, `cnpj`, `endereco`, `bairro`, `cidade`, `cep`, `uf`, `ddd_tel`, `tel_com`, `email`, `ddd_cel`, `cel`, `obs_forne`, `caminho_foto`, `data_cadastro`, `data_ult_atlz`, `user_cadastro`) VALUES
(1, 'Curso Produtivo Ltda', 'Marcelo', '10.225.452/0001-66', 'Rua PolÃ´nia, 33', 'TaboÃ£o', 'Diadema', '09671-060', '', '11', '3322-1156', 'contato@cursoprodutivo.com.br', '11', '9988-5554', 'Teste Obs', 'uploads/1490368354_24_3_2017.jpg', '2017-03-24', '2017-03-24', 'user1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_material`
--

CREATE TABLE `tab_material` (
  `codigo` int(11) NOT NULL,
  `material` varchar(100) NOT NULL,
  `categoria` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_mensalista`
--

CREATE TABLE `tab_mensalista` (
  `id` int(11) NOT NULL,
  `cod_produto` int(11) NOT NULL,
  `produto` varchar(50) NOT NULL,
  `cod_pet` int(11) NOT NULL,
  `mensalista` varchar(50) NOT NULL,
  `cod_dono` int(11) NOT NULL,
  `qtde` varchar(10) NOT NULL,
  `medida` varchar(20) NOT NULL,
  `valor` varchar(20) NOT NULL,
  `status` int(11) NOT NULL,
  `obs` longtext NOT NULL,
  `usuario` int(11) NOT NULL,
  `data_banho` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_pet`
--

CREATE TABLE `tab_pet` (
  `codigo` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `raca` varchar(50) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `cor` varchar(50) NOT NULL,
  `dono` varchar(255) NOT NULL,
  `cod_dono` int(11) NOT NULL,
  `porte` varchar(50) NOT NULL,
  `especie` varchar(50) NOT NULL,
  `data_nasc` date NOT NULL,
  `mensalista` varchar(5) NOT NULL,
  `chip` varchar(20) NOT NULL,
  `rga` varchar(20) NOT NULL,
  `obs` longtext NOT NULL,
  `caminho_foto` longtext,
  `data_cadastro` date NOT NULL,
  `data_ult_atlz` date DEFAULT '0001-01-01',
  `user_cadastro` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tab_pet`
--

INSERT INTO `tab_pet` (`codigo`, `nome`, `raca`, `sexo`, `cor`, `dono`, `cod_dono`, `porte`, `especie`, `data_nasc`, `mensalista`, `chip`, `rga`, `obs`, `caminho_foto`, `data_cadastro`, `data_ult_atlz`, `user_cadastro`) VALUES
(1, 'HÃ©rcules', 'Poodle', 'Macho', 'Branco', 'Marcelo de Souza', 1, 'MÃ©dio', 'Canina', '2000-01-01', 'NÃ£o', '12345678', '098765432', 'Primeiro banho', 'uploads/1490362022_24_3_2017.jpg', '2017-03-24', '0001-01-01', 'user1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_produto`
--

CREATE TABLE `tab_produto` (
  `codigo` int(11) NOT NULL,
  `produto` varchar(100) NOT NULL,
  `categoria` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tab_produto`
--

INSERT INTO `tab_produto` (`codigo`, `produto`, `categoria`) VALUES
(1, 'Tosa HigiÃªnica', 'Banho & Tosa'),
(2, 'Banho', 'Banho & Tosa'),
(3, 'Pedigree', 'Raï¿½ï¿½o');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_temp_caixa`
--

CREATE TABLE `tab_temp_caixa` (
  `codigo` int(11) NOT NULL,
  `cod_material` int(11) DEFAULT NULL,
  `material` varchar(100) DEFAULT NULL,
  `qtde` varchar(11) DEFAULT NULL,
  `medida` varchar(20) NOT NULL,
  `valor` varchar(20) NOT NULL,
  `especie` varchar(20) NOT NULL,
  `obs` longtext NOT NULL,
  `cod_produto` varchar(11) NOT NULL,
  `produto` varchar(100) NOT NULL,
  `pet` varchar(50) NOT NULL,
  `data` date NOT NULL,
  `status` int(1) DEFAULT NULL,
  `usuario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tab_temp_caixa`
--

INSERT INTO `tab_temp_caixa` (`codigo`, `cod_material`, `material`, `qtde`, `medida`, `valor`, `especie`, `obs`, `cod_produto`, `produto`, `pet`, `data`, `status`, `usuario`) VALUES
(1, NULL, NULL, '', '', '', '', '', '', '', '', '2017-03-24', NULL, 'user1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_temp_clie`
--

CREATE TABLE `tab_temp_clie` (
  `codigo` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `sexo` varchar(10) DEFAULT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `uf` varchar(2) DEFAULT NULL,
  `ddd_tel` varchar(3) DEFAULT NULL,
  `tel` varchar(15) DEFAULT NULL,
  `ddd_cel` varchar(3) DEFAULT NULL,
  `cel` varchar(15) DEFAULT NULL,
  `rg` varchar(20) DEFAULT NULL,
  `cpf` varchar(15) DEFAULT NULL,
  `obs` longtext,
  `data_nasc` date DEFAULT NULL,
  `caminho_foto` longtext,
  `data_cadastro` date DEFAULT NULL,
  `data_ult_atlz` date DEFAULT '0001-01-01',
  `user_cadastro` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_temp_fornecedor`
--

CREATE TABLE `tab_temp_fornecedor` (
  `codigo` int(11) NOT NULL,
  `razao_social` varchar(255) DEFAULT NULL,
  `contato` varchar(100) DEFAULT NULL,
  `cnpj` varchar(20) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `bairro` varchar(100) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `uf` varchar(2) DEFAULT NULL,
  `ddd_tel` varchar(2) DEFAULT NULL,
  `tel_com` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `ddd_cel` varchar(2) DEFAULT NULL,
  `cel` varchar(20) DEFAULT NULL,
  `obs_forne` longtext,
  `caminho_foto` longtext,
  `data_cadastro` date DEFAULT NULL,
  `data_ult_atlz` date DEFAULT NULL,
  `user_cadastro` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_temp_mensalista`
--

CREATE TABLE `tab_temp_mensalista` (
  `id` int(11) NOT NULL,
  `cod_produto` int(11) NOT NULL,
  `produto` varchar(50) NOT NULL,
  `cod_pet` int(11) NOT NULL,
  `mensalista` varchar(50) NOT NULL,
  `cod_dono` int(11) NOT NULL,
  `qtde` varchar(10) NOT NULL,
  `medida` varchar(20) NOT NULL,
  `valor` varchar(20) NOT NULL,
  `status` int(11) NOT NULL,
  `obs` longtext NOT NULL,
  `usuario` int(11) NOT NULL,
  `data_banho` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_temp_pet`
--

CREATE TABLE `tab_temp_pet` (
  `codigo` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `raca` varchar(50) DEFAULT NULL,
  `sexo` varchar(10) DEFAULT NULL,
  `cor` varchar(50) DEFAULT NULL,
  `dono` varchar(255) DEFAULT NULL,
  `cod_dono` int(11) DEFAULT NULL,
  `porte` varchar(50) DEFAULT NULL,
  `especie` varchar(50) DEFAULT NULL,
  `data_nasc` date DEFAULT NULL,
  `mensalista` varchar(5) DEFAULT NULL,
  `chip` varchar(20) DEFAULT NULL,
  `rga` varchar(20) DEFAULT NULL,
  `obs` longtext,
  `caminho_foto` longtext,
  `data_cadastro` date DEFAULT NULL,
  `data_ult_atlz` date DEFAULT '0001-01-01',
  `user_cadastro` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acesso`
--
ALTER TABLE `acesso`
  ADD PRIMARY KEY (`codigo`),
  ADD UNIQUE KEY `codigo` (`codigo`);

--
-- Indexes for table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `combo_bairro`
--
ALTER TABLE `combo_bairro`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `combo_categoria`
--
ALTER TABLE `combo_categoria`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `combo_cidade`
--
ALTER TABLE `combo_cidade`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `combo_cor`
--
ALTER TABLE `combo_cor`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `combo_especie`
--
ALTER TABLE `combo_especie`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `combo_raca`
--
ALTER TABLE `combo_raca`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `tab_caixa`
--
ALTER TABLE `tab_caixa`
  ADD PRIMARY KEY (`codigo`),
  ADD UNIQUE KEY `codigo` (`codigo`);

--
-- Indexes for table `tab_cartao`
--
ALTER TABLE `tab_cartao`
  ADD PRIMARY KEY (`codigo`),
  ADD UNIQUE KEY `codigo` (`codigo`);

--
-- Indexes for table `tab_clie`
--
ALTER TABLE `tab_clie`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `tab_config_user`
--
ALTER TABLE `tab_config_user`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `tab_fornecedor`
--
ALTER TABLE `tab_fornecedor`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `tab_material`
--
ALTER TABLE `tab_material`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `tab_mensalista`
--
ALTER TABLE `tab_mensalista`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tab_pet`
--
ALTER TABLE `tab_pet`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `tab_produto`
--
ALTER TABLE `tab_produto`
  ADD PRIMARY KEY (`codigo`),
  ADD UNIQUE KEY `codigo` (`codigo`),
  ADD KEY `codigo_2` (`codigo`),
  ADD KEY `codigo_3` (`codigo`);

--
-- Indexes for table `tab_temp_caixa`
--
ALTER TABLE `tab_temp_caixa`
  ADD PRIMARY KEY (`codigo`),
  ADD UNIQUE KEY `codigo` (`codigo`);

--
-- Indexes for table `tab_temp_clie`
--
ALTER TABLE `tab_temp_clie`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `tab_temp_fornecedor`
--
ALTER TABLE `tab_temp_fornecedor`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `tab_temp_mensalista`
--
ALTER TABLE `tab_temp_mensalista`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tab_temp_pet`
--
ALTER TABLE `tab_temp_pet`
  ADD PRIMARY KEY (`codigo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acesso`
--
ALTER TABLE `acesso`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `agenda`
--
ALTER TABLE `agenda`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `combo_bairro`
--
ALTER TABLE `combo_bairro`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `combo_categoria`
--
ALTER TABLE `combo_categoria`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `combo_cidade`
--
ALTER TABLE `combo_cidade`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `combo_cor`
--
ALTER TABLE `combo_cor`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `combo_especie`
--
ALTER TABLE `combo_especie`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `combo_raca`
--
ALTER TABLE `combo_raca`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tab_caixa`
--
ALTER TABLE `tab_caixa`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tab_cartao`
--
ALTER TABLE `tab_cartao`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tab_clie`
--
ALTER TABLE `tab_clie`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tab_config_user`
--
ALTER TABLE `tab_config_user`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tab_fornecedor`
--
ALTER TABLE `tab_fornecedor`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tab_material`
--
ALTER TABLE `tab_material`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tab_mensalista`
--
ALTER TABLE `tab_mensalista`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tab_pet`
--
ALTER TABLE `tab_pet`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tab_produto`
--
ALTER TABLE `tab_produto`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tab_temp_caixa`
--
ALTER TABLE `tab_temp_caixa`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tab_temp_clie`
--
ALTER TABLE `tab_temp_clie`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tab_temp_fornecedor`
--
ALTER TABLE `tab_temp_fornecedor`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tab_temp_mensalista`
--
ALTER TABLE `tab_temp_mensalista`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tab_temp_pet`
--
ALTER TABLE `tab_temp_pet`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
