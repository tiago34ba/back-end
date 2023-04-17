-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.2.3-MariaDB-log - mariadb.org binary distribution
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para devnology
CREATE DATABASE IF NOT EXISTS `devnology` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `devnology`;

-- Copiando estrutura para tabela devnology.carrinhos
CREATE TABLE IF NOT EXISTS `carrinhos` (
  `id_carrinho` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) DEFAULT NULL,
  `cod_produto` varchar(50) DEFAULT NULL,
  `nome_produto` varchar(50) DEFAULT NULL,
  `valor_unitario` varchar(50) DEFAULT NULL,
  `imagem` varchar(50) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `categoria_produto` varchar(50) DEFAULT NULL,
  `descricao_produto` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `uuid_cliente` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_carrinho`) USING BTREE,
  KEY `FK_carrinho_cliente` (`id_cliente`) USING BTREE,
  CONSTRAINT `FK_carrinhos_clientes` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COMMENT='carrinho da compra';

-- Copiando dados para a tabela devnology.carrinhos: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `carrinhos` DISABLE KEYS */;
INSERT INTO `carrinhos` (`id_carrinho`, `id_cliente`, `cod_produto`, `nome_produto`, `valor_unitario`, `imagem`, `quantidade`, `categoria_produto`, `descricao_produto`, `deleted_at`, `created_at`, `updated_at`, `uuid_cliente`) VALUES
	(25, NULL, NULL, 'Intelligent Plastic Soap', '376.00', 'http://placeimg.com/640/480/city', 1, 'Practical', 'The beautiful range of Apple Naturalé that has an exciting mix of natural ingredients. With the Goodness of 100% Natural Ingredients', NULL, '2023-04-16 19:40:38', '2023-04-16 19:40:38', 'b0302cf5-677c-749a-7532-0a583544adf6'),
	(26, NULL, NULL, 'Gorgeous Steel Chips', '492.00', 'http://placeimg.com/640/480/transport', 1, 'Refined', 'New range of formal shirts are designed keeping you in mind. With fits and styling that will make you stand apart', NULL, '2023-04-16 19:41:21', '2023-04-16 19:41:21', 'b0302cf5-677c-749a-7532-0a583544adf6'),
	(27, NULL, NULL, 'Fantastic Steel Salad', '716.00', 'http://placeimg.com/640/480/nature', 1, 'Refined', 'The slim & simple Maple Gaming Keyboard from Dev Byte comes with a sleek body and 7- Color RGB LED Back-lighting for smart functionality', NULL, '2023-04-16 19:58:15', '2023-04-16 19:58:15', 'b0302cf5-677c-749a-7532-0a583544adf6'),
	(34, NULL, '2', 'Fantastic Steel Salad', '716.00', 'http://placeimg.com/640/480/nature', 1, 'Refined', 'The slim & simple Maple Gaming Keyboard from Dev Byte comes with a sleek body and 7- Color RGB LED Back-lighting for smart functionality', NULL, '2023-04-16 21:12:38', '2023-04-16 21:12:38', 'b0302cf5-677c-749a-7532-0a583544adf6'),
	(35, NULL, '4', 'Intelligent Plastic Soap', '376.00', 'http://placeimg.com/640/480/city', 1, 'Practical', 'The beautiful range of Apple Naturalé that has an exciting mix of natural ingredients. With the Goodness of 100% Natural Ingredients', NULL, '2023-04-16 21:13:51', '2023-04-16 21:13:51', 'b0302cf5-677c-749a-7532-0a583544adf6'),
	(36, NULL, '2', 'Fantastic Steel Salad', '716.00', 'http://placeimg.com/640/480/nature', 1, 'Refined', 'The slim & simple Maple Gaming Keyboard from Dev Byte comes with a sleek body and 7- Color RGB LED Back-lighting for smart functionality', NULL, '2023-04-16 21:20:05', '2023-04-16 21:20:05', 'b0302cf5-677c-749a-7532-0a583544adf6'),
	(37, NULL, '2', 'Fantastic Steel Salad', '716.00', 'http://placeimg.com/640/480/nature', 1, 'Refined', 'The slim & simple Maple Gaming Keyboard from Dev Byte comes with a sleek body and 7- Color RGB LED Back-lighting for smart functionality', NULL, '2023-04-16 21:20:11', '2023-04-16 21:20:11', 'b0302cf5-677c-749a-7532-0a583544adf6'),
	(38, NULL, '2', 'Fantastic Steel Salad', '716.00', 'http://placeimg.com/640/480/nature', 1, 'Refined', 'The slim & simple Maple Gaming Keyboard from Dev Byte comes with a sleek body and 7- Color RGB LED Back-lighting for smart functionality', NULL, '2023-04-16 21:23:15', '2023-04-16 21:23:15', 'b0302cf5-677c-749a-7532-0a583544adf6');
/*!40000 ALTER TABLE `carrinhos` ENABLE KEYS */;

-- Copiando estrutura para tabela devnology.clientes
CREATE TABLE IF NOT EXISTS `clientes` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COMMENT='cliente do site';

-- Copiando dados para a tabela devnology.clientes: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` (`id_cliente`, `nome`, `deleted_at`, `created_at`) VALUES
	(1, 'Ivan Amado', NULL, NULL);
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;

-- Copiando estrutura para tabela devnology.compras
CREATE TABLE IF NOT EXISTS `compras` (
  `id_compra` int(11) NOT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `total_itens` int(11) DEFAULT NULL,
  `total_compra` float DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_compra`),
  KEY `FK__cliente` (`id_cliente`),
  CONSTRAINT `FK__cliente` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela devnology.compras: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `compras` DISABLE KEYS */;
/*!40000 ALTER TABLE `compras` ENABLE KEYS */;

-- Copiando estrutura para tabela devnology.itens_compra
CREATE TABLE IF NOT EXISTS `itens_compra` (
  `id_item` int(11) NOT NULL AUTO_INCREMENT,
  `id_compra` int(11) DEFAULT NULL,
  `descricao` varchar(50) DEFAULT NULL,
  `valor_unitário` float DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `imagem` int(11) DEFAULT NULL,
  `categoria_produto` int(11) DEFAULT NULL,
  `descricao_produto` int(11) DEFAULT NULL,
  `cod_produto` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_item`),
  KEY `FK_itens_compra_compra_cliente` (`id_compra`),
  CONSTRAINT `FK_itens_compra_compra_cliente` FOREIGN KEY (`id_compra`) REFERENCES `compras` (`id_compra`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='os intens da compra ';

-- Copiando dados para a tabela devnology.itens_compra: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `itens_compra` DISABLE KEYS */;
/*!40000 ALTER TABLE `itens_compra` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
