-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01-Dez-2019 às 21:49
-- Versão do servidor: 10.4.8-MariaDB
-- versão do PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `geomutatio`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `curtidas`
--

CREATE TABLE `curtidas` (
  `id_curtida` int(12) NOT NULL,
  `usuario_cpf` varchar(14) NOT NULL,
  `ocorrencia_id` varchar(10) NOT NULL,
  `avaliacao` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `curtidas`
--

INSERT INTO `curtidas` (`id_curtida`, `usuario_cpf`, `ocorrencia_id`, `avaliacao`) VALUES
(191, '00000000000', '105', 'like'),
(192, '00000000000', '108', 'like'),
(193, '00000000000', '106', 'like'),
(194, '22222222222', '105', 'like'),
(195, '22222222222', '108', 'like'),
(196, '22222222222', '106', 'like'),
(197, '11111111111', '105', 'like'),
(198, '11111111111', '108', 'like'),
(199, '11111111111', '106', 'like'),
(200, '12093712371', '105', 'like'),
(201, '12093712371', '108', 'like'),
(202, '12093712371', '106', 'like'),
(203, '10380128301', '105', 'like'),
(204, '10380128301', '108', 'like'),
(205, '10380128301', '107', 'deslike'),
(207, '12093712371', '107', 'deslike'),
(208, '22222222222', '107', 'deslike'),
(209, '11111111111', '107', 'deslike');

-- --------------------------------------------------------

--
-- Estrutura da tabela `familia`
--

CREATE TABLE `familia` (
  `nome_fam` varchar(30) DEFAULT NULL,
  `id_familia` int(10) NOT NULL,
  `pessoas_fam` varchar(255) DEFAULT NULL,
  `recursos_nec` varchar(255) NOT NULL,
  `telefone_fam` varchar(30) NOT NULL,
  `endereco_fam` varchar(255) NOT NULL,
  `foto_familia` longblob NOT NULL,
  `cpf` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `familia`
--

INSERT INTO `familia` (`nome_fam`, `id_familia`, `pessoas_fam`, `recursos_nec`, `telefone_fam`, `endereco_fam`, `foto_familia`, `cpf`) VALUES
('Silveira', 29, 'Jair, Valdemir, João, Rogério, Lucas, Mayara', 'Sofá, Mesa, 2 Camas, Geladeira, Alimentos não perecíveis', '(47)30229-8990', 'Rua Campo Largo 298', '', '10380128301'),
('Oliveira', 30, 'Ruanir, Jairo, Gabriel, Luisa', 'Cama, Cômoda, Guarda-Roupas, Porta, Cortinas, Alimentos', '(47)32445-6778', 'Rua Marcos de Freitas 134', 0x4f6c697665697261, '10380128301'),
('Santos', 31, 'Marcos, Jonas, Lucélia, Marcela, Luana', 'Alimentos, Cômoda, Sofá, Cama, Geladeira', '(47)38030-2930', 'Rua Jaritubá 983', '', '22222222222'),
('Rocha', 32, 'Erik, Josué, Marcos, Emili, Andréia, Kerolaine, Maria', 'Alimentos, fogão, geladeira', '(47)34442-2209', 'Rua Eucides de Freitas 201', 0x526f636861, '22222222222');

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticia`
--

CREATE TABLE `noticia` (
  `codnoticia` int(5) NOT NULL,
  `titulo_noticia` varchar(500) DEFAULT 'NULL',
  `subtitulo_noticia` varchar(1350) NOT NULL,
  `desc_noticia` mediumtext DEFAULT NULL,
  `data_noticia` date DEFAULT NULL,
  `foto_noticia` text DEFAULT NULL,
  `cpf` varchar(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `noticia`
--

INSERT INTO `noticia` (`codnoticia`, `titulo_noticia`, `subtitulo_noticia`, `desc_noticia`, `data_noticia`, `foto_noticia`, `cpf`) VALUES
(59, 'Buraco no meio da rua preocupa moradores no bairro Glória', 'Pavimento na superfície pode se soltar e formar uma abertura ainda maior', 'Um buraco de aproximadamente 1,5 metros, que se abriu há mais de duas semanas no meio da rua Nazareno, no bairro Glória, tem preocupado os moradores da região em Joinville. Como há pouca terra no interior do buraco, existe o risco de que o pavimento na superfície se solte e forme uma abertura ainda maior.\r\n\r\nMoradores da rua colocaram uma tábua com um pano vermelho dentro do buraco para alertar pedestres e motoristas. Neuzi Bergmann, coordenador da Secretaria Regional do Costa e Silva, que também é responsável pelo bairro Glória, diz que a secretaria já tomou conhecimento do problema. \r\n\r\nSegundo o coordenador, uma equipe deve ser enviada para fazer os reparos ainda nesta quarta-feira. \r\n\r\n- Os trabalhos deveriam ter começado pela manhã, mas o tempo não colaborou. Se a chuva parar, vamos providenciar o conserto no começo da tarde - garante Bergmann.', '2019-09-25', NULL, '22222222222'),
(60, 'Chuva causa alagamento e atinge pelo menos 11 bairros de Joinville', 'Terminais de ônibus do Centro e do bairro Itaum estão temporariamente fechados por causa das ruas inundadas', 'As fortes chuvas que atingiram a cidade durante a noite de quinta-feira (14) e a madrugada desta sexta resultaram em diversos pontos de alagamento. Entre as 21h de quinta e as 3h desta sexta, choveu cerca de 117 milímetros em Joinville.\r\n\r\nOs bairros Paranaguamirim, João Costa, Floresta, Itaum, Adhemar Garcia e Petrópolis, na zona Sul, os bairro Nova Brasília, Morro do Meio e Vila Nova, na zona Oeste, e Anita Garibaldi e Glória foram os que mais registaram ocorrências conforme a Defesa Civil de Joinville. \r\n\r\nO próximo pico de maré está previsto para 10h30min desta sexta. Houve picos também durante a noite, às 22h, e na madrugada, por volta das 2h.\r\n\r\nPelo menos nove pontos de deslizamentos com desmoronamento de muros foram registrados conforme o órgão. Entretanto, não houve registro de feridos. Ainda não há informações sobre quantas pessoas estão desalojadas na cidade. ', '2019-10-15', NULL, '22222222222'),
(61, 'Árvore cai sobre as pistas e interdita a BR-280 em Araquari', 'Queda da árvore foi causada pelo temporal que caiu sobre a região no início da tarde', 'Uma árvore caiu sobre as pistas da BR-280 e deixou a rodovia interditada por volta das 14h30 deste sábado próximo a entrada do Canal do Linguado, na BR-280, em Araquari.\r\n\r\nO temporal que caiu sobre a região no início da tarde foi a causa da queda da árvore. Ela acabou obstruindo as duas pistas da rodovia e os bombeiros tiveram que ser chamados para fazer a retirada.\r\n\r\nOs bombeiros retiraram a árvore do local e desobstruíram a rodovia. As pistas ficaram interditadas 2 horas até serem liberadas por volta das 16h30', '2019-11-20', NULL, '10380128301'),
(63, 'Deslizamento de barranco põe casa em risco em Joinville', 'Cinco pessoas que moravam de aluguel no local tiveram de ir para a casa de parentes', 'O deslizamento de um barranco na rua Lauro Carneiro de Loyola, no bairro Iririú, zona Leste de Joinville, destruiu a garagem de uma casa na manhã desta quarta-feira e ameaça a residência.\r\n\r\nUm carro, uma motoneta e Suzi, a cachorra de estimação da família, ficaram soterrados. O animal sofreu fratura no quarto traseiro e não consegue andar.\r\n\r\nA casa, de madeira e deslocada com a força do barro, foi interditada pela Defesa Civil e Bombeiros. Um casal e três filhos moram de aluguel no local.\r\n\r\nO inquilino Sérgio Luís Grabowski, 39 anos, que tem uma pintura de carros, irá provisoriamente para a casa da sogra Gisselda Machado, 47, no Comasa do Boa Vista. Móveis e eletrodomésticos de valor já foram levados.\r\n\r\n— Já pensamos em alugar outra casa. Aqui não vai dar para ficar. O maior problema é a oficina. Sem ela, não consigo trabalhar. E sem trabalho, não temos dinheiro para poder alugar outro imóvel e tocar a vida — lamenta.\r\n\r\nA motoneta era recém-comprada e, pela manhã, continuava soterrada debaixo da garagem, bastante danificada. O carro conseguiu ser recuperado e levado para outra casa.\r\n\r\nA queda do barranco aconteceu depois que uma obra de terraplanagem foi feita na parte de cima, no morro que há no local, há cerca de um mês. Os familiares ouviram o barulho do deslizamento por volta das 5h desta quarta-feira.\r\n\r\n— A cachorra começou a latir alto. Saimos da casa rápido, debaixo de chuva, e começamos a pegar roupas, preocupados. Chamamos os bombeiros. Eles vieram rapidamente e que conseguiram resgatar a cachorra — diz Sílvio, 20, um dos filhos de Sérgio.\r\n\r\nOs telefones de contato da família, para auxílios, são 8818-2499 (com Sérgio) ou 3434-1513 (com Gisselda).\r\n\r\nOs telefones de emergência, em casos de alagamento ou deslizamentos, são o 199 (Defesa Civil) e 193 (Bombeiros).', '2019-07-21', NULL, '11111111111');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ocorrencia`
--

CREATE TABLE `ocorrencia` (
  `id_ocorrencia` int(10) NOT NULL,
  `nome_ocorrencia` varchar(70) NOT NULL,
  `qtd_curtidas` int(4) DEFAULT 10,
  `tipo_ocorrencia` varchar(50) DEFAULT NULL,
  `data_ocorrencia` date DEFAULT NULL,
  `local` varchar(255) NOT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `imagem_ocorrencia` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `ocorrencia`
--

INSERT INTO `ocorrencia` (`id_ocorrencia`, `nome_ocorrencia`, `qtd_curtidas`, `tipo_ocorrencia`, `data_ocorrencia`, `local`, `cpf`, `imagem_ocorrencia`) VALUES
(101, 'Alagamento', 10, 'alagamento', '2019-11-28', '-26.279748, -48.905463', '11111111111', 'p_alagamento.png'),
(102, 'Deslizamento de Terra', 10, 'deslizamento', '2019-11-28', '-26.295998, -48.826611', '11111111111', 'p_deslizamento.png'),
(104, 'Buraco', 10, 'buraco', '2019-11-28', '-26.339571, -48.847446', '22222222222', 'p_buraco.png'),
(105, 'Árvore Caída', 15, 'arvore', '2019-11-28', '-26.300603, -48.831723', '00000000000', 'arvore.png'),
(106, 'Buraco', 14, 'buraco', '2019-11-28', '-26.252369, -48.869044', '00000000000', 'p_buraco.png'),
(107, 'Buraco', 6, 'buraco', '2019-11-28', '-26.364846, -48.829583', '00000000000', 'p_buraco.png'),
(108, 'Deslizamento de Terra', 15, 'deslizamento', '2019-11-28', '-26.288346, -48.862875', '00000000000', 'deslizamento.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `nome` varchar(80) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `cpf` varchar(14) NOT NULL,
  `tipuser` tinyint(1) DEFAULT 0,
  `datanasc` date DEFAULT NULL,
  `senha` varchar(14) DEFAULT NULL,
  `foto_perfil` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`nome`, `email`, `cpf`, `tipuser`, `datanasc`, `senha`, `foto_perfil`) VALUES
('Usuario Comum', 'usuario@usuario.com', '00000000000', 0, '2001-05-26', 'usuario', 'default.jpg'),
('Gustavo Baierski', 'gustavo@gustavo.com', '10380128301', 2, '2001-10-06', '123', '10380128301'),
('Administrador', 'admin@admin.com', '11111111111', 1, '2001-10-06', 'admin', 'default.jpg'),
('Ruan da Cunha ', 'ruan@ruan.com', '12093712371', 0, '2002-02-12', '123', '12093712371'),
('Autor', 'autor@autor.com', '22222222222', 2, '1988-05-02', 'autor', 'default.jpg'),
('Hiliana Toni', 'hiliana@hiliana.com', '41209412095', 0, '2000-02-21', '123', '41209412095');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `curtidas`
--
ALTER TABLE `curtidas`
  ADD PRIMARY KEY (`id_curtida`);

--
-- Índices para tabela `familia`
--
ALTER TABLE `familia`
  ADD PRIMARY KEY (`id_familia`);

--
-- Índices para tabela `noticia`
--
ALTER TABLE `noticia`
  ADD PRIMARY KEY (`codnoticia`) USING BTREE,
  ADD UNIQUE KEY `codnoticia` (`codnoticia`),
  ADD KEY `cpf` (`cpf`);

--
-- Índices para tabela `ocorrencia`
--
ALTER TABLE `ocorrencia`
  ADD PRIMARY KEY (`id_ocorrencia`),
  ADD KEY `cpf` (`cpf`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`cpf`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `curtidas`
--
ALTER TABLE `curtidas`
  MODIFY `id_curtida` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;

--
-- AUTO_INCREMENT de tabela `familia`
--
ALTER TABLE `familia`
  MODIFY `id_familia` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de tabela `noticia`
--
ALTER TABLE `noticia`
  MODIFY `codnoticia` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT de tabela `ocorrencia`
--
ALTER TABLE `ocorrencia`
  MODIFY `id_ocorrencia` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `noticia`
--
ALTER TABLE `noticia`
  ADD CONSTRAINT `noticia_ibfk_1` FOREIGN KEY (`cpf`) REFERENCES `usuario` (`cpf`);

--
-- Limitadores para a tabela `ocorrencia`
--
ALTER TABLE `ocorrencia`
  ADD CONSTRAINT `ocorrencia_ibfk_1` FOREIGN KEY (`cpf`) REFERENCES `usuario` (`cpf`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
