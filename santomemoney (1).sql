-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01-Maio-2023 às 15:13
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `santomemoney`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `anuncios`
--

CREATE TABLE `anuncios` (
  `id` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `titulo` varchar(250) NOT NULL,
  `preco` double NOT NULL,
  `localizacao` varchar(250) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `data_publicacao` date DEFAULT NULL,
  `hora_publicacao` time DEFAULT NULL,
  `data_aprovacao` date DEFAULT NULL,
  `hora_aprovacao` time DEFAULT NULL,
  `periodo_id` int(11) NOT NULL,
  `comprovativo` varchar(250) NOT NULL,
  `status_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `anuncios`
--

INSERT INTO `anuncios` (`id`, `categoria_id`, `titulo`, `preco`, `localizacao`, `descricao`, `data_publicacao`, `hora_publicacao`, `data_aprovacao`, `hora_aprovacao`, `periodo_id`, `comprovativo`, `status_id`, `usuario_id`) VALUES
(18, 3, 'Carro zero km', 5000000, 'Cazenga', 'A leitura também é mais fácil no novo modo de exibição de Leitura. Você pode recolher partes do documento e colocar o foco no texto desejado. Se for preciso interromper a leitura antes de chegar ao fim dela, o Word lembrará em que ponto você parou - até mesmo em outro dispositivo.', '2022-05-09', '13:15:55', NULL, NULL, 1, 'comprovativo_Carro zero km_627905fb36709.pdf', 1, 1),
(19, 3, 'Carro em bom estado com menos de 1 ano de uso', 4500000, 'Viana', 'Economize tempo no Word com novos botões que são mostrados no local em que você precisa deles. Para alterar a maneira como uma imagem se ajusta ao seu documento, clique nela e um botão de opções de layout será exibido ao lado. Ao trabalhar em uma tabela, clique no local onde deseja adicionar uma linha ou uma coluna e clique no sinal de adição.', '2022-05-09', '13:19:18', NULL, NULL, 1, 'comprovativo_Carro em bom estado com menos de 1 ano de uso_627906c605451.pdf', 1, 11),
(20, 4, 'Tenis de qualidade', 17000, 'Vila alice', 'Temas e estilos também ajudam a manter seu documento coordenado. Quando você clica em Design e escolhe um novo tema, as imagens, gráficos e elementos gráficos SmartArt são alterados para corresponder ao novo tema. Quando você aplica estilos, os títulos são alterados para coincidir com o novo tema.', '2022-05-09', '13:21:54', NULL, NULL, 4, 'comprovativo_Tenis de qualidade_627907622ad9c.pdf', 1, 2),
(21, 4, 'Sapatilhas de marca', 20000, 'Vida de viana', 'Para dar ao documento uma aparência profissional, o Word fornece designs de cabeçalho, rodapé, folha de rosto e caixa de texto que se complementam entre si. Por exemplo, você pode adicionar uma folha de rosto, um cabeçalho e uma barra lateral correspondentes. Clique em Inserir e escolha os elementos desejados nas diferentes galerias.', '2022-05-09', '13:24:54', NULL, NULL, 1, 'comprovativo_Sapatilhas de marca_627908160ed85.pdf', 1, 11),
(22, 1, 'COMPUTADOR HP I7', 300000, 'Rangel', 'O vídeo fornece uma maneira poderosa de ajudá-lo a provar seu argumento. Ao clicar em Vídeo Online, você pode colar o código de inserção do vídeo que deseja adicionar. Você também pode digitar uma palavra-chave para pesquisar online o vídeo mais adequado ao seu documento.', '2022-05-09', '13:27:54', NULL, NULL, 1, 'comprovativo_COMPUTADOR HP I7_627908ca9245b.pdf', 1, 1),
(23, 1, 'Coputador novo', 500000, 'Talatona', 'O vídeo fornece uma maneira poderosa de ajudá-lo a provar seu argumento. Ao clicar em Vídeo Online, você pode colar o código de inserção do vídeo que deseja adicionar. Você também pode digitar uma palavra-chave para pesquisar online o vídeo mais adequado ao seu documento.', '2022-05-09', '13:31:52', NULL, NULL, 1, 'comprovativo_Coputador novo_627909b8f2217.pdf', 1, 2),
(24, 2, 'Telefone em bom estado', 35000, 'Benfica', 'O vídeo fornece uma maneira poderosa de ajudá-lo a provar seu argumento. Ao clicar em Vídeo Online, você pode colar o código de inserção do vídeo que deseja adicionar. Você também pode digitar uma palavra-chave para pesquisar online o vídeo mais adequado ao seu documento.', '2022-05-09', '13:34:07', NULL, NULL, 1, 'comprovativo_Telefone em bom estado_62790a3f1fd87.pdf', 1, 1),
(25, 2, 'IPHONE NOVO', 150000, 'Mutamba', 'O vídeo fornece uma maneira poderosa de ajudá-lo a provar seu argumento. Ao clicar em Vídeo Online, você pode colar o código de inserção do vídeo que deseja adicionar. Você também pode digitar uma palavra-chave para pesquisar online o vídeo mais adequado ao seu documento.', '2022-05-09', '13:36:22', NULL, NULL, 1, 'comprovativo_IPHONE NOVO_62790ac673c44.pdf', 1, 11),
(26, 4, 'Sapato da Shein', 21000, 'Luanda sequele', 'Novo, tamanhos de 35 á 42\r\nCores Rosa bêbe, castanho nude e azul claro', '2023-04-24', '22:39:25', NULL, NULL, 1, 'comprovativo_Sapato da Shein_6446f70d4259d.pdf', 1, 12),
(27, 1, 'Sapato da Shein', 123333, 'Luanda sequele', 'novo', '2023-04-25', '10:50:38', NULL, NULL, 1, 'comprovativo_Sapato da Shein_6447a26e38609.pdf', 1, 12),
(28, 1, 'Sapato da Shein', 12000, 'Luanda sequele', 'novo', '2023-04-25', '10:56:13', NULL, NULL, 1, 'comprovativo_Sapato da Shein_6447a3bd6c293.pdf', 1, 12),
(29, 1, 'Sapato da Shein', 12900, 'Luanda sequele', 'novo', '2023-04-25', '10:57:31', NULL, NULL, 1, 'comprovativo_Sapato da Shein_6447a40b89157.pdf', 1, 12);

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`) VALUES
(1, 'Tecnologia'),
(2, 'Telemíveis e Tablets'),
(3, 'Carro'),
(4, 'Moda'),
(5, 'Animais'),
(6, 'Restaurantes'),
(7, 'Hoteis'),
(8, 'Casa'),
(9, 'Empresas/Serviços'),
(10, 'Outros');

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `anuncio_id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `comentario` text NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `comentarios`
--

INSERT INTO `comentarios` (`id`, `anuncio_id`, `usuario_id`, `comentario`, `data`, `hora`) VALUES
(1, 25, 2, 'Quero desconto', '2022-05-09', '13:37:23'),
(2, 25, 11, 'Pucha no whatsapp', '2022-05-09', '13:38:05'),
(3, 23, 11, 'Tenho interesse', '2022-05-09', '13:38:42'),
(4, 25, 2, 'Gostei do fone', '2022-05-09', '13:39:27'),
(5, 24, 2, 'Está muito puxado wy', '2022-05-09', '13:40:22'),
(6, 24, 1, 'Vamos no conversar no whatsapp', '2022-05-09', '13:41:16'),
(8, 23, 12, 'nhkj hihi', '2023-02-23', '17:06:29');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fotos`
--

CREATE TABLE `fotos` (
  `id` int(11) NOT NULL,
  `anuncio_id` int(11) NOT NULL,
  `foto` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `fotos`
--

INSERT INTO `fotos` (`id`, `anuncio_id`, `foto`) VALUES
(1, 18, 'IMG_18_627905fb53fb8.jpg'),
(2, 18, 'IMG_18_627905fb5c0a2.jpg'),
(3, 18, 'IMG_18_627905fb658fc.jpg'),
(4, 19, 'IMG_19_627906c65692c.jpg'),
(5, 19, 'IMG_19_627906c666b00.jpg'),
(6, 19, 'IMG_19_627906c67edbd.jpg'),
(7, 20, 'IMG_20_627907624efc5.jpg'),
(8, 20, 'IMG_20_627907627224d.jpg'),
(9, 20, 'IMG_20_6279076287242.jpg'),
(10, 20, 'IMG_20_62790762b77bd.jpg'),
(11, 21, 'IMG_21_6279081661db9.jpg'),
(12, 21, 'IMG_21_627908166c99b.jpg'),
(13, 21, 'IMG_21_62790816811c0.jpg'),
(14, 21, 'IMG_21_6279081687b39.jpg'),
(15, 22, 'IMG_22_627908cae6817.jpg'),
(16, 22, 'IMG_22_627908caef4b9.jpg'),
(17, 23, 'IMG_23_627909b913b84.png'),
(18, 23, 'IMG_23_627909b9221ff.png'),
(19, 23, 'IMG_23_627909b93c3fd.png'),
(20, 23, 'IMG_23_627909b9801fd.png'),
(21, 23, 'IMG_23_627909b98c938.png'),
(22, 24, 'IMG_24_62790a3f4c481.jpg'),
(23, 24, 'IMG_24_62790a3f535cb.jpg'),
(24, 24, 'IMG_24_62790a3f5c26d.jpg'),
(25, 24, 'IMG_24_62790a3f62fcf.jpg'),
(26, 25, 'IMG_25_62790ac6995dd.jpg'),
(27, 25, 'IMG_25_62790ac6a41bf.png'),
(28, 25, 'IMG_25_62790ac6af18a.png'),
(29, 26, 'IMG_26_6446f70e161e8.jpg'),
(30, 27, 'IMG_27_6447a26e64857.jpg'),
(31, 28, 'IMG_28_6447a3bd7cb0f.jpg'),
(32, 28, 'IMG_28_6447a3bd7cb0f.jpg'),
(33, 28, 'IMG_28_6447a3bd7cb0f.jpg'),
(34, 29, 'IMG_29_6447a40ba817f.jpg'),
(35, 29, 'IMG_29_6447a40bc3354.jpg'),
(36, 29, 'IMG_29_6447a40c92e22.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `periodos`
--

CREATE TABLE `periodos` (
  `id` int(11) NOT NULL,
  `periodo` varchar(250) NOT NULL,
  `preco` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `periodos`
--

INSERT INTO `periodos` (`id`, `periodo`, `preco`) VALUES
(1, '3 dias', 1000),
(2, '1 semana', 3000),
(3, '2 semanas', 5500),
(4, '1 mês', 10000);

-- --------------------------------------------------------

--
-- Estrutura da tabela `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `status`
--

INSERT INTO `status` (`id`, `status`) VALUES
(1, 'PENDENTE'),
(2, 'APROVADO'),
(3, 'EXPIRADO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(250) NOT NULL,
  `bi_numero` varchar(250) NOT NULL,
  `bi_arquivo` varchar(250) NOT NULL,
  `endereco` varchar(250) NOT NULL,
  `telefone` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `senha` varchar(250) NOT NULL,
  `foto` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `bi_numero`, `bi_arquivo`, `endereco`, `telefone`, `email`, `senha`, `foto`) VALUES
(1, 'Domingas Ester', '00394943', 'Almeida_00394943.pdf', 'Cacuaco', '941975340', 'almeida@gmail.com', '1', 'almeida@gmail.com.jpg'),
(2, 'Samuel Avelino', '009948484757584', 'Samuel dos santos_009948484757584.pdf', 'Viana', '95283849', 'samuel@gmail.com', 'sam', 'samuel@gmail.com.png'),
(3, 'Laisa Isabel', '737328782', 'Laisa Isabel_737328782.pdf', 'Cazenga', '9384938474', 'laisa@gmail.com', 'laisa', 'laisa@gmail.com.jpg'),
(10, 'correia', '055645644', 'correia_055645644.pdf', 'cazenga', '922708896', 'inocenio@gmail.com', '1', 'inocenio@gmail.com.jpg'),
(11, 'Kaisa Manuel de Almeida', '00000000', 'Kaisa Manuel de Almeida_00000000.pdf', 'Talatona', '952116266', 'kaisa@gmail.com', 'kaisa123', 'kaisa@gmail.com.jpg'),
(12, 'Domingas ester', '', '', 'cacuaco-sequele', '941975340', 'niumacassanguir12@gmail.com', '12345678', 'niumacassanguir12@gmail.com.jpg');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `anuncios`
--
ALTER TABLE `anuncios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `anuncio_periodo_id` (`periodo_id`),
  ADD KEY `anuncio_status_id` (`status_id`),
  ADD KEY `anuncio_usuario_id` (`usuario_id`),
  ADD KEY `anuncio_categoria_id` (`categoria_id`);

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comentarios_anuncio_id` (`anuncio_id`),
  ADD KEY `comentarios_usuario_id` (`usuario_id`);

--
-- Índices para tabela `fotos`
--
ALTER TABLE `fotos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fotos_anuncios_id` (`anuncio_id`);

--
-- Índices para tabela `periodos`
--
ALTER TABLE `periodos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `anuncios`
--
ALTER TABLE `anuncios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `fotos`
--
ALTER TABLE `fotos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de tabela `periodos`
--
ALTER TABLE `periodos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `anuncios`
--
ALTER TABLE `anuncios`
  ADD CONSTRAINT `anuncio_categoria_id` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`),
  ADD CONSTRAINT `anuncio_periodo_id` FOREIGN KEY (`periodo_id`) REFERENCES `periodos` (`id`),
  ADD CONSTRAINT `anuncio_status_id` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `anuncio_usuario_id` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

--
-- Limitadores para a tabela `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_anuncio_id` FOREIGN KEY (`anuncio_id`) REFERENCES `anuncios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comentarios_usuario_id` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

--
-- Limitadores para a tabela `fotos`
--
ALTER TABLE `fotos`
  ADD CONSTRAINT `fotos_anuncios_id` FOREIGN KEY (`anuncio_id`) REFERENCES `anuncios` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
