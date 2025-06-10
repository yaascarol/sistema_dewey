-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Jun-2025 às 15:30
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_dewey`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `administradores`
--

CREATE TABLE `administradores` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `administradores`
--

INSERT INTO `administradores` (`id`, `nome`, `email`, `senha`) VALUES
(1, 'lais lívia marinho', 'laisli@gmail.com', '12345'),
(2, 'wanessa gonçalves', 'wanessag@gmail.com', 'admin123'),
(3, 'yasmin caroline', 'yascarol@gmail.com', '123carol'),
(5, 'eu', 'eu@gmail.com', '123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `logradouro` varchar(255) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `complemento` varchar(100) DEFAULT NULL,
  `municipio` varchar(100) DEFAULT NULL,
  `uf` char(2) DEFAULT NULL,
  `cep` varchar(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `email`, `telefone`, `logradouro`, `numero`, `complemento`, `municipio`, `uf`, `cep`) VALUES
(1, 'bruna torres', 'bruna.torres@email.com', '(11) 91234-5678', 'rua das flores', '123', NULL, 'são paulo', 'sp', '01234-567'),
(2, 'eduardo silva', 'eduardo.silva@email.com', '(21) 99876-5432', 'avenida central', '456', 'apto 101', 'rio de janeiro', 'rj', '23456-789');

-- --------------------------------------------------------

--
-- Estrutura da tabela `generos`
--

CREATE TABLE `generos` (
  `id` int(11) NOT NULL,
  `categoria` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `generos`
--

INSERT INTO `generos` (`id`, `categoria`) VALUES
(1, 'ficção'),
(2, 'romance'),
(3, 'terror');

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagens`
--

CREATE TABLE `imagens` (
  `id` int(11) NOT NULL,
  `livro_id` int(11) NOT NULL,
  `caminho` varchar(255) NOT NULL,
  `descricao` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `imagens`
--

INSERT INTO `imagens` (`id`, `livro_id`, `caminho`, `descricao`) VALUES
(1, 1, 'imagens/a-cidade-invisivel.jpg', 'Capa oficial do livro A Cidade Invisível.'),
(2, 2, 'imagens/amor-em-paris.jpg', 'Imagem da capa do livro Amor em Paris.'),
(3, 3, 'imagens/noite-sombria.jpg', 'Capa do livro Noite Sombria com atmosfera sombria.'),
(4, 7, 'https://m.media-amazon.com/images/I/91jjTBqfcNL.jpg', 'Capa do livro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `livros`
--

CREATE TABLE `livros` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `genero_id` int(11) NOT NULL,
  `estoque` int(11) NOT NULL DEFAULT 0,
  `resumo` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `livros`
--

INSERT INTO `livros` (`id`, `titulo`, `genero_id`, `estoque`, `resumo`) VALUES
(1, 'a cidade invisível', 1, 10, 'uma narrativa intrigante sobre uma cidade secreta escondida nos subterrâneos de uma metrópole moderna. À medida que um jovem curioso descobre pistas sobre sua existência, ele é levado a uma jornada que desafia os limites da realidade, da política e da história.'),
(2, 'amor em paris', 2, 5, 'em meio às luzes e encantos da capital francesa, dois estranhos se encontram por acaso e vivem uma intensa história de amor. Entre cafés charmosos, cartas perdidas e promessas sussurradas à margem do sena, este romance revela que o verdadeiro amor pode surgir nos momentos mais inesperados.'),
(3, 'noite sombria', 3, 8, 'um grupo de amigos decide passar um fim de semana em uma cabana isolada na floresta, mas o que era para ser uma viagem tranquila rapidamente se transforma em um pesadelo. Sons estranhos, sombras inexplicáveis e uma lenda local esquecida dão vida a um horror que os obriga a enfrentar seus maiores medos.'),
(7, 'mulherzinhas', 2, 8, '');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices para tabela `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categoria` (`categoria`);

--
-- Índices para tabela `imagens`
--
ALTER TABLE `imagens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `livro_id` (`livro_id`);

--
-- Índices para tabela `livros`
--
ALTER TABLE `livros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `genero_id` (`genero_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `generos`
--
ALTER TABLE `generos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `imagens`
--
ALTER TABLE `imagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `livros`
--
ALTER TABLE `livros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `imagens`
--
ALTER TABLE `imagens`
  ADD CONSTRAINT `imagens_ibfk_1` FOREIGN KEY (`livro_id`) REFERENCES `livros` (`id`);

--
-- Limitadores para a tabela `livros`
--
ALTER TABLE `livros`
  ADD CONSTRAINT `livros_ibfk_1` FOREIGN KEY (`genero_id`) REFERENCES `generos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
