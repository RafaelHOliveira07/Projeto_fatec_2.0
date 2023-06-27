-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27-Jun-2023 às 19:24
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `portal_edital`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` int(11) NOT NULL,
  `usuario` varchar(5) NOT NULL,
  `senha` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `usuario`, `senha`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cord`
--

CREATE TABLE `tb_cord` (
  `cord_id` int(11) NOT NULL,
  `usuario` varchar(4) NOT NULL,
  `senha` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_cord`
--

INSERT INTO `tb_cord` (`cord_id`, `usuario`, `senha`) VALUES
(1, 'cord', 'cord');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cursos`
--

CREATE TABLE `tb_cursos` (
  `curso_id` int(8) NOT NULL,
  `nome_curso` varchar(60) NOT NULL,
  `sigla_curso` varchar(5) NOT NULL,
  `desc_curso` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_cursos`
--

INSERT INTO `tb_cursos` (`curso_id`, `nome_curso`, `sigla_curso`, `desc_curso`) VALUES
(11, 'Desenvolvimento de Software Multiplataforma', 'DSM', 'Curso');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_disciplinas`
--

CREATE TABLE `tb_disciplinas` (
  `disci_id` int(8) NOT NULL,
  `curso_id` int(8) NOT NULL,
  `nome_disci` varchar(60) NOT NULL,
  `area_disci` varchar(60) NOT NULL,
  `data_hora` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_disciplinas`
--

INSERT INTO `tb_disciplinas` (`disci_id`, `curso_id`, `nome_disci`, `area_disci`, `data_hora`) VALUES
(3, 2, 'Estrutura de Dados', 'Tecnologia da Informação', 'Sábado das 7:40 as 11:30'),
(4, 2, 'Desenvolvimento Web 2', 'Tecnologia da Informação', 'Terça-feira das 19:00 as 22:30'),
(5, 3, 'Matemática', 'Matemática', 'Terça-feira das 19:30 as 22:30 '),
(7, 5, 'Estátisca', 'Matemática', 'Quarta-feira das 19:00 as 22:30'),
(9, 11, 'Estrutura de Dados', 'Tecnologia da Informação', 'Sábado das 7:40 as 11:30');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_edital`
--

CREATE TABLE `tb_edital` (
  `edital_id` int(8) NOT NULL,
  `curso_id` int(8) NOT NULL,
  `disci_id` int(8) NOT NULL,
  `num_edital` varchar(15) NOT NULL,
  `pdf` varchar(100) NOT NULL,
  `errata` varchar(100) NOT NULL,
  `status_edital` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_edital`
--

INSERT INTO `tb_edital` (`edital_id`, `curso_id`, `disci_id`, `num_edital`, `pdf`, `errata`, `status_edital`) VALUES
(19, 2, 4, '150/2023', 'd66e427a84432fbe53e35cdea9a9244e.pdf', '', 1),
(20, 11, 9, '150/2023', 'e16ed1bc32dd9fe8ae39bbcbbc390848.pdf', 'eec7b8c6eb2fdce3f2ac8775b4fa6d86.pdf', 2),
(21, 11, 9, '150/2023', 'c080415052658718f2c1fadd40de82cc.pdf', '', 0),
(24, 11, 9, '150/2023', '965408564e51ef5e4a5cac8dd1a98d9b.pdf', '', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_participantes`
--

CREATE TABLE `tb_participantes` (
  `part_id` int(10) NOT NULL,
  `prof_id` int(8) NOT NULL,
  `edital_id` int(8) NOT NULL,
  `deferimento` int(11) NOT NULL DEFAULT 0,
  `convocacao` int(8) NOT NULL DEFAULT 0,
  `doc` varchar(100) NOT NULL,
  `motivo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_participantes`
--

INSERT INTO `tb_participantes` (`part_id`, `prof_id`, `edital_id`, `deferimento`, `convocacao`, `doc`, `motivo`) VALUES
(61, 5, 19, 3, 0, 'Luis Felipe Salvarani19.zip', 'gkjhdasfgskhfsd'),
(62, 5, 19, 5, 0, 'Luis Felipe Salvarani19.zip', 'dfahgidghfaysd'),
(63, 10, 20, 0, 0, 'Luis Felipe Salvarani19.zip', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_prof`
--

CREATE TABLE `tb_prof` (
  `prof_id` int(8) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `sobrenome` varchar(50) NOT NULL,
  `data_nasc` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `endereco` varchar(60) NOT NULL,
  `n_casa` varchar(6) NOT NULL,
  `bairro` varchar(60) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `estado` varchar(3) NOT NULL,
  `senha` varchar(220) NOT NULL,
  `recuperar_senha` varchar(220) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_prof`
--

INSERT INTO `tb_prof` (`prof_id`, `nome`, `sobrenome`, `data_nasc`, `email`, `tel`, `cpf`, `cep`, `endereco`, `n_casa`, `bairro`, `cidade`, `estado`, `senha`, `recuperar_senha`, `img`) VALUES
(10, 'Luis Felipe', 'Salvarani', '2000-03-13', 'felipe_salvarani@fatec.com', '(19) 99909-6992', '489.128.718-70', '13972-370', 'Rua Vítor Meirelles', '107', 'Cubatão', 'Itapira', 'SP', '$2y$10$N5KmWScHnBPwWRQV.GMur.ee23flTL.GQGyd3heL6J/D0NK1sTUJO', '', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Índices para tabela `tb_cord`
--
ALTER TABLE `tb_cord`
  ADD PRIMARY KEY (`cord_id`);

--
-- Índices para tabela `tb_cursos`
--
ALTER TABLE `tb_cursos`
  ADD PRIMARY KEY (`curso_id`);

--
-- Índices para tabela `tb_disciplinas`
--
ALTER TABLE `tb_disciplinas`
  ADD PRIMARY KEY (`disci_id`);

--
-- Índices para tabela `tb_edital`
--
ALTER TABLE `tb_edital`
  ADD PRIMARY KEY (`edital_id`);

--
-- Índices para tabela `tb_participantes`
--
ALTER TABLE `tb_participantes`
  ADD PRIMARY KEY (`part_id`);

--
-- Índices para tabela `tb_prof`
--
ALTER TABLE `tb_prof`
  ADD PRIMARY KEY (`prof_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tb_cord`
--
ALTER TABLE `tb_cord`
  MODIFY `cord_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tb_cursos`
--
ALTER TABLE `tb_cursos`
  MODIFY `curso_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `tb_disciplinas`
--
ALTER TABLE `tb_disciplinas`
  MODIFY `disci_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `tb_edital`
--
ALTER TABLE `tb_edital`
  MODIFY `edital_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de tabela `tb_participantes`
--
ALTER TABLE `tb_participantes`
  MODIFY `part_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT de tabela `tb_prof`
--
ALTER TABLE `tb_prof`
  MODIFY `prof_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
