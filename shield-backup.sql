-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           11.5.2-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.6.0.6765
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para ci-saas
CREATE DATABASE IF NOT EXISTS `ci-saas` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;
USE `ci-saas`;

-- Copiando estrutura para tabela ci-saas.auth_groups_users
CREATE TABLE IF NOT EXISTS `auth_groups_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `auth_groups_users_user_id_foreign` (`user_id`),
  CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela ci-saas.auth_identities
CREATE TABLE IF NOT EXISTS `auth_identities` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `type` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `secret` varchar(255) NOT NULL,
  `secret2` varchar(255) DEFAULT NULL,
  `expires` datetime DEFAULT NULL,
  `extra` text DEFAULT NULL,
  `force_reset` tinyint(1) NOT NULL DEFAULT 0,
  `last_used_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `type_secret` (`type`,`secret`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `auth_identities_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela ci-saas.auth_logins
CREATE TABLE IF NOT EXISTS `auth_logins` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `id_type` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_type_identifier` (`id_type`,`identifier`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=205 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela ci-saas.auth_permissions_users
CREATE TABLE IF NOT EXISTS `auth_permissions_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `permission` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `auth_permissions_users_user_id_foreign` (`user_id`),
  CONSTRAINT `auth_permissions_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela ci-saas.auth_remember_tokens
CREATE TABLE IF NOT EXISTS `auth_remember_tokens` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `expires` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `selector` (`selector`),
  KEY `auth_remember_tokens_user_id_foreign` (`user_id`),
  CONSTRAINT `auth_remember_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela ci-saas.auth_token_logins
CREATE TABLE IF NOT EXISTS `auth_token_logins` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `id_type` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_type_identifier` (`id_type`,`identifier`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela ci-saas.canal_vendas
CREATE TABLE IF NOT EXISTS `canal_vendas` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `descricao` text DEFAULT NULL,
  `empresa_id` int(11) unsigned NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `canal_vendas_empresa_id_foreign` (`empresa_id`),
  CONSTRAINT `canal_vendas_empresa_id_foreign` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela ci-saas.clientes
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `whatsapp` varchar(20) NOT NULL,
  `tipo_cliente` enum('pessoa_fisica','pessoa_juridica') NOT NULL DEFAULT 'pessoa_fisica',
  `cpf_cnpj` varchar(20) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `rua` varchar(255) NOT NULL,
  `numero` varchar(20) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `complemento` varchar(255) DEFAULT NULL,
  `cidade` varchar(100) NOT NULL,
  `estado` char(2) NOT NULL,
  `limite_credito` decimal(10,2) DEFAULT NULL,
  `pagar_retirada` tinyint(1) NOT NULL DEFAULT 0,
  `observacoes` text DEFAULT NULL,
  `empresa_id` int(11) unsigned NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `clientes_empresa_id_foreign` (`empresa_id`),
  CONSTRAINT `clientes_empresa_id_foreign` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela ci-saas.comissoes
CREATE TABLE IF NOT EXISTS `comissoes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `pedido_id` int(11) unsigned NOT NULL,
  `valor_comissao` decimal(10,2) NOT NULL,
  `data_comissao` date NOT NULL,
  `status` enum('pendente','pago','cancelado') NOT NULL DEFAULT 'pendente',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comissoes_user_id_foreign` (`user_id`),
  KEY `comissoes_pedido_id_foreign` (`pedido_id`),
  CONSTRAINT `comissoes_pedido_id_foreign` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `comissoes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela ci-saas.empresas
CREATE TABLE IF NOT EXISTS `empresas` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `tipo_empresa` enum('PF','PJ') DEFAULT 'PJ',
  `razao_social` varchar(255) NOT NULL,
  `cpf_cnpj` varchar(20) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `rua` varchar(255) NOT NULL,
  `numero` varchar(20) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `complemento` varchar(255) DEFAULT NULL,
  `cidade` varchar(100) NOT NULL,
  `estado` char(2) NOT NULL,
  `whatsapp` varchar(20) NOT NULL,
  `instagram` varchar(100) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `logo_sistema` varchar(255) DEFAULT NULL,
  `logo_sistema_pequeno` varchar(255) DEFAULT NULL,
  `logo_pedidos` varchar(255) DEFAULT NULL,
  `plano_id` int(11) unsigned NOT NULL,
  `dominio` varchar(255) DEFAULT NULL,
  `subdominio` varchar(255) NOT NULL,
  `numero_inicial_pedidos` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cpf_cnpj` (`cpf_cnpj`),
  UNIQUE KEY `subdominio` (`subdominio`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela ci-saas.empresas_planos
CREATE TABLE IF NOT EXISTS `empresas_planos` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `empresa_id` int(11) unsigned NOT NULL,
  `plano_id` int(11) unsigned NOT NULL,
  `data_inicio` date NOT NULL,
  `data_fim` date DEFAULT NULL,
  `status` enum('ativo','inativo','cancelado') NOT NULL DEFAULT 'ativo',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `empresas_planos_empresa_id_foreign` (`empresa_id`),
  KEY `empresas_planos_plano_id_foreign` (`plano_id`),
  CONSTRAINT `empresas_planos_empresa_id_foreign` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `empresas_planos_plano_id_foreign` FOREIGN KEY (`plano_id`) REFERENCES `planos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela ci-saas.financeiro
CREATE TABLE IF NOT EXISTS `financeiro` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pedido_id` int(11) unsigned NOT NULL,
  `tipo` enum('entrada','saida') NOT NULL DEFAULT 'entrada',
  `valor` decimal(10,2) NOT NULL,
  `data_vencimento` date NOT NULL,
  `data_pagamento` date DEFAULT NULL,
  `status` enum('pendente','pago','atrasado','cancelado') NOT NULL DEFAULT 'pendente',
  `forma_pagamento_id` int(11) unsigned NOT NULL,
  `observacoes` text DEFAULT NULL,
  `empresa_id` int(11) unsigned NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `financeiro_pedido_id_foreign` (`pedido_id`),
  KEY `financeiro_forma_pagamento_id_foreign` (`forma_pagamento_id`),
  KEY `financeiro_empresa_id_foreign` (`empresa_id`),
  CONSTRAINT `financeiro_empresa_id_foreign` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `financeiro_forma_pagamento_id_foreign` FOREIGN KEY (`forma_pagamento_id`) REFERENCES `formas_pagamentos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `financeiro_pedido_id_foreign` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela ci-saas.formas_entrega
CREATE TABLE IF NOT EXISTS `formas_entrega` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `prazo` int(11) DEFAULT NULL,
  `valor` decimal(10,2) DEFAULT NULL,
  `empresa_id` int(11) unsigned NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `formas_entrega_empresa_id_foreign` (`empresa_id`),
  CONSTRAINT `formas_entrega_empresa_id_foreign` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela ci-saas.formas_pagamentos
CREATE TABLE IF NOT EXISTS `formas_pagamentos` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `forma_pagamento` varchar(255) NOT NULL,
  `prazo_pagamento` int(11) DEFAULT NULL,
  `desconto` decimal(5,2) DEFAULT NULL,
  `acrescimo` decimal(5,2) DEFAULT NULL,
  `empresa_id` int(11) unsigned NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `formas_pagamentos_empresa_id_foreign` (`empresa_id`),
  CONSTRAINT `formas_pagamentos_empresa_id_foreign` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela ci-saas.fornecedores
CREATE TABLE IF NOT EXISTS `fornecedores` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `tipo_fornecedor` varchar(100) NOT NULL,
  `cpf_cnpj` varchar(20) NOT NULL,
  `site` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(20) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `cep` varchar(9) NOT NULL,
  `rua` varchar(255) NOT NULL,
  `numero` varchar(20) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `complemento` varchar(255) DEFAULT NULL,
  `cidade` varchar(100) NOT NULL,
  `estado` char(2) NOT NULL,
  `observacoes` text DEFAULT NULL,
  `prazo_pagamento` int(11) DEFAULT NULL,
  `empresa_id` int(11) unsigned NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fornecedores_empresa_id_foreign` (`empresa_id`),
  CONSTRAINT `fornecedores_empresa_id_foreign` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela ci-saas.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela ci-saas.pedidos
CREATE TABLE IF NOT EXISTS `pedidos` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `numero_pedido` int(11) NOT NULL,
  `cliente_id` int(11) unsigned NOT NULL,
  `status_pedido_id` int(11) unsigned NOT NULL,
  `forma_pagamento_id` int(11) unsigned NOT NULL,
  `forma_entrega_id` int(11) unsigned NOT NULL,
  `canal_venda_id` int(11) unsigned NOT NULL,
  `quantidade_produtos` int(11) DEFAULT NULL,
  `custo_estimado` decimal(10,2) DEFAULT NULL,
  `lucro_estimado` decimal(10,2) DEFAULT NULL,
  `valor_total` decimal(10,2) NOT NULL,
  `desconto` decimal(10,2) NOT NULL DEFAULT 0.00,
  `acrescimo` decimal(10,2) NOT NULL DEFAULT 0.00,
  `valor_final` decimal(10,2) NOT NULL,
  `prazo_total` int(11) DEFAULT NULL,
  `observacoes` text DEFAULT NULL,
  `observacoes_internas` text DEFAULT NULL,
  `data_pedido` date NOT NULL,
  `data_entrega` date DEFAULT NULL,
  `empresa_id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pedidos_cliente_id_foreign` (`cliente_id`),
  KEY `pedidos_status_pedido_id_foreign` (`status_pedido_id`),
  KEY `pedidos_forma_pagamento_id_foreign` (`forma_pagamento_id`),
  KEY `pedidos_forma_entrega_id_foreign` (`forma_entrega_id`),
  KEY `pedidos_canal_venda_id_foreign` (`canal_venda_id`),
  KEY `pedidos_empresa_id_foreign` (`empresa_id`),
  CONSTRAINT `pedidos_canal_venda_id_foreign` FOREIGN KEY (`canal_venda_id`) REFERENCES `canal_vendas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pedidos_cliente_id_foreign` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pedidos_empresa_id_foreign` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pedidos_forma_entrega_id_foreign` FOREIGN KEY (`forma_entrega_id`) REFERENCES `formas_entrega` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pedidos_forma_pagamento_id_foreign` FOREIGN KEY (`forma_pagamento_id`) REFERENCES `formas_pagamentos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pedidos_status_pedido_id_foreign` FOREIGN KEY (`status_pedido_id`) REFERENCES `status_pedidos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela ci-saas.planos
CREATE TABLE IF NOT EXISTS `planos` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `dias` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela ci-saas.planos_recursos
CREATE TABLE IF NOT EXISTS `planos_recursos` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `plano_id` int(11) unsigned NOT NULL,
  `recurso_id` int(11) unsigned NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `planos_recursos_plano_id_foreign` (`plano_id`),
  KEY `planos_recursos_recurso_id_foreign` (`recurso_id`),
  CONSTRAINT `planos_recursos_plano_id_foreign` FOREIGN KEY (`plano_id`) REFERENCES `planos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `planos_recursos_recurso_id_foreign` FOREIGN KEY (`recurso_id`) REFERENCES `recursos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela ci-saas.produtos
CREATE TABLE IF NOT EXISTS `produtos` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `codigo` varchar(50) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `producao` enum('propria','terceirizado','revenda','servico') NOT NULL DEFAULT 'propria',
  `tipo_venda` enum('quantidade','metro_quadrado') NOT NULL DEFAULT 'quantidade',
  `valor_custo` decimal(10,2) NOT NULL,
  `valor_venda` decimal(10,2) NOT NULL,
  `lucro_estimado` decimal(10,2) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `impressao` enum('4x4','4x1','4x0','1x1','1x0') DEFAULT NULL,
  `material` varchar(255) DEFAULT NULL,
  `valor_minimo` decimal(10,2) DEFAULT NULL,
  `largura_maxima` decimal(10,2) DEFAULT NULL,
  `prazo_producao` int(11) DEFAULT NULL,
  `estoque_atual` int(11) NOT NULL,
  `estoque_minimo` int(11) NOT NULL,
  `fornecedor_id` int(11) unsigned DEFAULT NULL,
  `link_produto_fornecedor` varchar(255) DEFAULT NULL,
  `observacoes` text DEFAULT NULL,
  `empresa_id` int(11) unsigned NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `produtos_fornecedor_id_foreign` (`fornecedor_id`),
  KEY `produtos_empresa_id_foreign` (`empresa_id`),
  CONSTRAINT `produtos_empresa_id_foreign` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `produtos_fornecedor_id_foreign` FOREIGN KEY (`fornecedor_id`) REFERENCES `fornecedores` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela ci-saas.produtos_pedido
CREATE TABLE IF NOT EXISTS `produtos_pedido` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pedido_id` int(11) unsigned NOT NULL,
  `produto_id` int(11) unsigned NOT NULL,
  `quantidade` decimal(10,2) NOT NULL,
  `valor_unitario` decimal(10,2) NOT NULL,
  `desconto` decimal(10,2) NOT NULL DEFAULT 0.00,
  `valor_total` decimal(10,2) NOT NULL,
  `observacoes` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `produtos_pedido_pedido_id_foreign` (`pedido_id`),
  KEY `produtos_pedido_produto_id_foreign` (`produto_id`),
  CONSTRAINT `produtos_pedido_pedido_id_foreign` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `produtos_pedido_produto_id_foreign` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela ci-saas.recursos
CREATE TABLE IF NOT EXISTS `recursos` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `recurso` varchar(255) NOT NULL,
  `descricao` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela ci-saas.settings
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `class` varchar(255) NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `type` varchar(31) NOT NULL DEFAULT 'string',
  `context` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela ci-saas.status_pedidos
CREATE TABLE IF NOT EXISTS `status_pedidos` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `descricao` text DEFAULT NULL,
  `mensagem` text DEFAULT NULL,
  `empresa_id` int(11) unsigned NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `status_pedidos_empresa_id_foreign` (`empresa_id`),
  CONSTRAINT `status_pedidos_empresa_id_foreign` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela ci-saas.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `empresa_id` int(11) unsigned DEFAULT NULL,
  `whatsapp` varchar(20) DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `sobrenome` varchar(100) DEFAULT NULL,
  `cpf_cnpj` varchar(20) DEFAULT NULL,
  `cargo` varchar(100) DEFAULT NULL,
  `comissionado` tinyint(1) DEFAULT 0,
  `comissao` decimal(5,2) DEFAULT 0.00,
  `username` varchar(30) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `last_active` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Exportação de dados foi desmarcado.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
