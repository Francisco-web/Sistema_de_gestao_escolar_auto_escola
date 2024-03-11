-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17-Out-2022 às 08:34
-- Versão do servidor: 10.4.19-MariaDB
-- versão do PHP: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `gestc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno_pag`
--

CREATE TABLE `aluno_pag` (
  `id_aluno_pag` int(11) NOT NULL,
  `id_matricula` int(11) NOT NULL,
  `id_secretaria` int(11) NOT NULL,
  `id_pag` int(11) NOT NULL,
  `num_recibo` varchar(11) DEFAULT NULL,
  `mes_pag` varchar(30) DEFAULT NULL,
  `valor_pag` varchar(30) DEFAULT NULL,
  `forma_pag` varchar(30) DEFAULT NULL,
  `multa` varchar(30) DEFAULT NULL,
  `desconto` varchar(30) DEFAULT NULL,
  `data_pag` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `aluno_pag`
--

INSERT INTO `aluno_pag` (`id_aluno_pag`, `id_matricula`, `id_secretaria`, `id_pag`, `num_recibo`, `mes_pag`, `valor_pag`, `forma_pag`, `multa`, `desconto`, `data_pag`) VALUES
(14, 22, 6, 1, '202204', 'Janeiro', '2.500.00', 'Dinheiro', '0', '0', '2022-07-18 07:07:53');

-- --------------------------------------------------------

--
-- Estrutura da tabela `classe`
--

CREATE TABLE `classe` (
  `id_classe` int(11) NOT NULL,
  `nome_classe` varchar(30) NOT NULL,
  `codigo_classe` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `classe`
--

INSERT INTO `classe` (`id_classe`, `nome_classe`, `codigo_classe`) VALUES
(12, '1ª Classe', '1ª'),
(13, '2ª Classe', '2ª'),
(14, '3ª Classe', '3ª');

-- --------------------------------------------------------

--
-- Estrutura da tabela `convocatoria`
--

CREATE TABLE `convocatoria` (
  `num_conv` int(11) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `assunto` varchar(50) NOT NULL,
  `conteudo` text NOT NULL,
  `data_conv` date NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `convocatoria`
--

INSERT INTO `convocatoria` (`num_conv`, `tipo`, `assunto`, `conteudo`, `data_conv`, `id_usuario`) VALUES
(1, 'Nota Informativa', 'Pagamento de Propinas', '<p>A Direcção do complexo Escolar Auto Escola, convoca o encarregado para uma reunião de cacter obrigatório na instituição no sábado 23/07/2022.</p>', '2022-07-18', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplina`
--

CREATE TABLE `disciplina` (
  `id_disciplina` int(11) NOT NULL,
  `codigo_disc` varchar(30) NOT NULL COMMENT 'Abreviatura do nome',
  `nome_disc` varchar(30) NOT NULL,
  `descricao` text DEFAULT NULL,
  `id_professor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `disciplina`
--

INSERT INTO `disciplina` (`id_disciplina`, `codigo_disc`, `nome_disc`, `descricao`, `id_professor`) VALUES
(17, 'L.Port', 'Lingua Portuguesa', ' ', 13),
(18, 'Mat.', 'Matemática', ' ', 14);

-- --------------------------------------------------------

--
-- Estrutura da tabela `inscricao`
--

CREATE TABLE `inscricao` (
  `id_inscricao` int(11) NOT NULL,
  `num_inscricao` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `data_inscricao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `data_nasc` date DEFAULT NULL,
  `data_validade` date DEFAULT NULL,
  `nacionalidade` varchar(20) NOT NULL,
  `naturalidade` varchar(20) NOT NULL,
  `residencia` varchar(50) NOT NULL,
  `municipio` varchar(20) NOT NULL,
  `cidade` varchar(20) NOT NULL,
  `tel2` varchar(30) DEFAULT NULL,
  `nome_pai` varchar(30) DEFAULT NULL,
  `estado_civil_p` varchar(10) DEFAULT NULL,
  `profissao_pai` varchar(30) DEFAULT NULL,
  `situacao_pai` varchar(30) DEFAULT NULL,
  `nome_mae` varchar(30) DEFAULT NULL,
  `estado_civil_m` varchar(10) DEFAULT NULL,
  `profissao_mae` varchar(30) DEFAULT NULL,
  `situacao_mae` varchar(30) DEFAULT NULL,
  `classe_anterior` varchar(20) DEFAULT NULL,
  `escola_anterior` varchar(50) DEFAULT NULL,
  `media_final` int(2) DEFAULT NULL,
  `classe_pretendida` varchar(20) NOT NULL,
  `ano_acad_concluido` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `inscricao`
--

INSERT INTO `inscricao` (`id_inscricao`, `num_inscricao`, `id_usuario`, `data_inscricao`, `data_nasc`, `data_validade`, `nacionalidade`, `naturalidade`, `residencia`, `municipio`, `cidade`, `tel2`, `nome_pai`, `estado_civil_p`, `profissao_pai`, `situacao_pai`, `nome_mae`, `estado_civil_m`, `profissao_mae`, `situacao_mae`, `classe_anterior`, `escola_anterior`, `media_final`, `classe_pretendida`, `ano_acad_concluido`) VALUES
(111125, 220713, 76, '2022-07-18 06:44:35', '1999-01-18', '2025-07-18', 'Angolana', 'Luanda', 'Cassequel', 'Luanda', 'Luanda', '926628914', 'Agostinho Sacumba', 'Casado', 'Tecnico de Construção Civil', 'Empregado', 'Juliana Sacumba', 'Casada', 'DOméstica', '', 'Pré', '', 0, '1ª Classe', 2022);

-- --------------------------------------------------------

--
-- Estrutura da tabela `matricula`
--

CREATE TABLE `matricula` (
  `id_matricula` int(11) NOT NULL,
  `num_matricula` int(11) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `id_inscricao` int(11) NOT NULL,
  `id_turma` int(11) NOT NULL,
  `ano_academico` year(4) NOT NULL,
  `data_matricula` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `matricula`
--

INSERT INTO `matricula` (`id_matricula`, `num_matricula`, `tipo`, `id_inscricao`, `id_turma`, `ano_academico`, `data_matricula`) VALUES
(22, 220713, 'Nova', 111125, 12, 2022, '2022-07-18 06:44:53');

-- --------------------------------------------------------

--
-- Estrutura da tabela `nota`
--

CREATE TABLE `nota` (
  `id_nota` int(11) NOT NULL,
  `id_disciplina` int(11) NOT NULL,
  `id_matricula` int(11) NOT NULL,
  `id_turma` int(11) NOT NULL,
  `trimestre` varchar(20) DEFAULT NULL,
  `1p` int(2) DEFAULT NULL,
  `2p` int(2) DEFAULT NULL,
  `ac` int(2) DEFAULT NULL COMMENT 'avaliação continua',
  `recurso` int(2) DEFAULT NULL,
  `exame` int(2) DEFAULT NULL,
  `data_emissisao` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `nota`
--

INSERT INTO `nota` (`id_nota`, `id_disciplina`, `id_matricula`, `id_turma`, `trimestre`, `1p`, `2p`, `ac`, `recurso`, `exame`, `data_emissisao`) VALUES
(20, 17, 22, 12, 'Iº', 10, 0, 0, 0, 0, '2022-07-18 07:56:45');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamento`
--

CREATE TABLE `pagamento` (
  `id_pag` int(11) NOT NULL,
  `id_classe` int(11) NOT NULL,
  `tipo_p` varchar(30) NOT NULL,
  `valor` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pagamento`
--

INSERT INTO `pagamento` (`id_pag`, `id_classe`, `tipo_p`, `valor`) VALUES
(1, 12, 'Matrícula', '1.000.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `plano_curricular`
--

CREATE TABLE `plano_curricular` (
  `id_plano` int(11) NOT NULL,
  `id_disciplina` int(10) NOT NULL,
  `id_turma` int(11) NOT NULL,
  `dia_sem` varchar(30) NOT NULL,
  `hora` varchar(15) NOT NULL,
  `ano_academico` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `plano_curricular`
--

INSERT INTO `plano_curricular` (`id_plano`, `id_disciplina`, `id_turma`, `dia_sem`, `hora`, `ano_academico`) VALUES
(10, 17, 12, 'Segunda-Feira', '8:00-9:00', '2022'),
(11, 18, 13, 'Segunda-Feira', '8:00-9:00', '2022');

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE `professor` (
  `id_professor` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `professor`
--

INSERT INTO `professor` (`id_professor`, `id_usuario`) VALUES
(13, 1),
(14, 75);

-- --------------------------------------------------------

--
-- Estrutura da tabela `secretaria`
--

CREATE TABLE `secretaria` (
  `id_secretaria` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `secretaria`
--

INSERT INTO `secretaria` (`id_secretaria`, `id_usuario`) VALUES
(6, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

CREATE TABLE `turma` (
  `id_turma` int(11) NOT NULL,
  `nome_turma` varchar(5) NOT NULL,
  `classe` int(11) NOT NULL,
  `periodo` enum('Manhã','Tarde','Noite') NOT NULL,
  `num_sala` int(11) NOT NULL,
  `id_professor` int(11) NOT NULL COMMENT 'responsavel da turma'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `turma`
--

INSERT INTO `turma` (`id_turma`, `nome_turma`, `classe`, `periodo`, `num_sala`, `id_professor`) VALUES
(12, 'A', 12, 'Manhã', 1, 13),
(13, 'A', 13, 'Manhã', 2, 14);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(50) NOT NULL,
  `tipo_documento` varchar(30) NOT NULL,
  `num_documento` varchar(30) DEFAULT NULL,
  `sexo` enum('Masculino','Feminino') NOT NULL,
  `tel1` varchar(30) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `tipo` varchar(30) NOT NULL,
  `ativo` tinyint(1) NOT NULL,
  `login` int(6) NOT NULL,
  `senha` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome_usuario`, `tipo_documento`, `num_documento`, `sexo`, `tel1`, `email`, `tipo`, `ativo`, `login`, `senha`) VALUES
(1, 'Enoque Dinis', 'B.I', '2002220LA045', 'Masculino', '+244-996-935-712', 'enoquedinis97@gmail.com', 'Professor(a)', 1, 225374, '1e4baf20be11defe19f0fc837ae57e8b'),
(3, 'Ernesto Sipopi ', 'B.I', '006944465HO041', 'Masculino', '99744332', 'ernestosegundasipopi@gmail.com', 'Secretaria', 1, 220524, '5e1294aa1fde390a5dd8be98e0e2dc80'),
(4, 'Francisco Kilolo', 'B.I', '006944125LA049', 'Masculino', '926473748', 'Kilolo@gmail.com', 'Director', 1, 222115, '4a389424fce5db2721f594b9ccd5fbf6'),
(75, 'Francisco André', 'B.I', '13242413LD041', 'Masculino', '996935756', 'francyandre923@gmail.com', 'Professor(a)', 1, 3216451, '715596238bbf8036627fb822cf8c718f'),
(76, 'Helena Sacumba', 'B.I', '12343221LD049', 'Feminino', '996935756', 'helenasacumba@gmail.com', 'Aluno', 1, 220713, '6f3bf52a8b8c5804570da9a84f8d694e');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `aluno_pag`
--
ALTER TABLE `aluno_pag`
  ADD PRIMARY KEY (`id_aluno_pag`),
  ADD KEY `aluno_pag_ibfk_1` (`id_matricula`),
  ADD KEY `aluno_pag_ibfk_2` (`id_pag`),
  ADD KEY `aluno_pag_ibfk_3` (`id_secretaria`);

--
-- Índices para tabela `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`id_classe`);

--
-- Índices para tabela `convocatoria`
--
ALTER TABLE `convocatoria`
  ADD PRIMARY KEY (`num_conv`),
  ADD KEY `convocatoria_ibfk_1` (`id_usuario`);

--
-- Índices para tabela `disciplina`
--
ALTER TABLE `disciplina`
  ADD PRIMARY KEY (`id_disciplina`),
  ADD KEY `disciplina_ibfk_1` (`id_professor`);

--
-- Índices para tabela `inscricao`
--
ALTER TABLE `inscricao`
  ADD PRIMARY KEY (`id_inscricao`),
  ADD UNIQUE KEY `num_inscricao` (`num_inscricao`),
  ADD KEY `inscricao_ibfk_1` (`id_usuario`);

--
-- Índices para tabela `matricula`
--
ALTER TABLE `matricula`
  ADD PRIMARY KEY (`id_matricula`),
  ADD KEY `matricula_ibfk_1` (`id_turma`),
  ADD KEY `matricula_ibfk_2` (`id_inscricao`);

--
-- Índices para tabela `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`id_nota`),
  ADD KEY `nota_ibfk_1` (`id_matricula`),
  ADD KEY `nota_ibfk_2` (`id_disciplina`),
  ADD KEY `id_turma` (`id_turma`);

--
-- Índices para tabela `pagamento`
--
ALTER TABLE `pagamento`
  ADD PRIMARY KEY (`id_pag`),
  ADD KEY `pagamento_ibfk_1` (`id_classe`);

--
-- Índices para tabela `plano_curricular`
--
ALTER TABLE `plano_curricular`
  ADD PRIMARY KEY (`id_plano`),
  ADD KEY `plano_curricular_ibfk_1` (`id_turma`),
  ADD KEY `plano_curricular_ibfk_2` (`id_disciplina`);

--
-- Índices para tabela `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`id_professor`),
  ADD KEY `professor_ibfk_1` (`id_usuario`);

--
-- Índices para tabela `secretaria`
--
ALTER TABLE `secretaria`
  ADD PRIMARY KEY (`id_secretaria`),
  ADD KEY `secretaria_ibfk_1` (`id_usuario`);

--
-- Índices para tabela `turma`
--
ALTER TABLE `turma`
  ADD PRIMARY KEY (`id_turma`),
  ADD KEY `turma_ibfk_1` (`id_professor`),
  ADD KEY `turma_ibfk_2` (`classe`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `num_documento` (`num_documento`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `aluno_pag`
--
ALTER TABLE `aluno_pag`
  MODIFY `id_aluno_pag` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `classe`
--
ALTER TABLE `classe`
  MODIFY `id_classe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `convocatoria`
--
ALTER TABLE `convocatoria`
  MODIFY `num_conv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `disciplina`
--
ALTER TABLE `disciplina`
  MODIFY `id_disciplina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `inscricao`
--
ALTER TABLE `inscricao`
  MODIFY `id_inscricao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111126;

--
-- AUTO_INCREMENT de tabela `matricula`
--
ALTER TABLE `matricula`
  MODIFY `id_matricula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `nota`
--
ALTER TABLE `nota`
  MODIFY `id_nota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `pagamento`
--
ALTER TABLE `pagamento`
  MODIFY `id_pag` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `plano_curricular`
--
ALTER TABLE `plano_curricular`
  MODIFY `id_plano` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `professor`
--
ALTER TABLE `professor`
  MODIFY `id_professor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `secretaria`
--
ALTER TABLE `secretaria`
  MODIFY `id_secretaria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `turma`
--
ALTER TABLE `turma`
  MODIFY `id_turma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `aluno_pag`
--
ALTER TABLE `aluno_pag`
  ADD CONSTRAINT `aluno_pag_ibfk_1` FOREIGN KEY (`id_matricula`) REFERENCES `matricula` (`id_matricula`),
  ADD CONSTRAINT `aluno_pag_ibfk_2` FOREIGN KEY (`id_pag`) REFERENCES `pagamento` (`id_pag`),
  ADD CONSTRAINT `aluno_pag_ibfk_3` FOREIGN KEY (`id_secretaria`) REFERENCES `secretaria` (`id_secretaria`);

--
-- Limitadores para a tabela `convocatoria`
--
ALTER TABLE `convocatoria`
  ADD CONSTRAINT `convocatoria_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `disciplina`
--
ALTER TABLE `disciplina`
  ADD CONSTRAINT `disciplina_ibfk_1` FOREIGN KEY (`id_professor`) REFERENCES `professor` (`id_professor`);

--
-- Limitadores para a tabela `inscricao`
--
ALTER TABLE `inscricao`
  ADD CONSTRAINT `inscricao_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `matricula`
--
ALTER TABLE `matricula`
  ADD CONSTRAINT `matricula_ibfk_1` FOREIGN KEY (`id_turma`) REFERENCES `turma` (`id_turma`),
  ADD CONSTRAINT `matricula_ibfk_2` FOREIGN KEY (`id_inscricao`) REFERENCES `inscricao` (`id_inscricao`);

--
-- Limitadores para a tabela `nota`
--
ALTER TABLE `nota`
  ADD CONSTRAINT `nota_ibfk_1` FOREIGN KEY (`id_matricula`) REFERENCES `matricula` (`id_matricula`),
  ADD CONSTRAINT `nota_ibfk_2` FOREIGN KEY (`id_disciplina`) REFERENCES `disciplina` (`id_disciplina`),
  ADD CONSTRAINT `nota_ibfk_3` FOREIGN KEY (`id_turma`) REFERENCES `turma` (`id_turma`);

--
-- Limitadores para a tabela `pagamento`
--
ALTER TABLE `pagamento`
  ADD CONSTRAINT `pagamento_ibfk_1` FOREIGN KEY (`id_classe`) REFERENCES `classe` (`id_classe`);

--
-- Limitadores para a tabela `plano_curricular`
--
ALTER TABLE `plano_curricular`
  ADD CONSTRAINT `plano_curricular_ibfk_1` FOREIGN KEY (`id_turma`) REFERENCES `turma` (`id_turma`),
  ADD CONSTRAINT `plano_curricular_ibfk_2` FOREIGN KEY (`id_disciplina`) REFERENCES `disciplina` (`id_disciplina`);

--
-- Limitadores para a tabela `professor`
--
ALTER TABLE `professor`
  ADD CONSTRAINT `professor_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `secretaria`
--
ALTER TABLE `secretaria`
  ADD CONSTRAINT `secretaria_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `turma`
--
ALTER TABLE `turma`
  ADD CONSTRAINT `turma_ibfk_1` FOREIGN KEY (`id_professor`) REFERENCES `professor` (`id_professor`),
  ADD CONSTRAINT `turma_ibfk_2` FOREIGN KEY (`classe`) REFERENCES `classe` (`id_classe`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
