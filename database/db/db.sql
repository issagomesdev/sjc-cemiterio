-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 03-Out-2023 às 20:27
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cemiterio`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `audit_logs`
--

DROP TABLE IF EXISTS `audit_logs`;
CREATE TABLE IF NOT EXISTS `audit_logs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `ação` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `autor` bigint UNSIGNED DEFAULT NULL,
  `local` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `registro` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descrição` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `host` varchar(46) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=188 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `audit_logs`
--

INSERT INTO `audit_logs` (`id`, `ação`, `autor`, `local`, `registro`, `descrição`, `host`, `created_at`, `updated_at`) VALUES
(1, 'Edição', 1, 'Usuários', '#1 - Admin', 'ID: 1 | Nome: Admin | Email: admin@admin.com | Grupos: 1', '127.0.0.1', '2022-03-13 00:25:34', '2022-03-13 00:25:34'),
(2, 'Cadastro', 1, 'Usuários', '#2 - sjcsistemas', 'ID: 2 | Nome: sjcsistemas| Email: admin@sjcsistemas.com | Grupos: 1\r\n', '127.0.0.1', '2022-03-13 02:47:33', '2022-03-13 02:47:33'),
(3, 'Exclusão', 1, 'Usuários', '#2 - sjcsistemas', 'ID: 2 | Nome: sjcsistemas| Email: admin@sjcsistemas.com | Grupos: 1', '127.0.0.1', '2022-03-13 02:58:15', '2022-03-13 02:58:15'),
(14, 'Cadastro', 1, 'Grupos', '#8 - test', 'ID: 8 | Titulo: test | Permissões: 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79', '127.0.0.1', '2022-03-15 01:17:47', '2022-03-15 01:17:47'),
(10, 'Cadastro', 1, 'Usuários', '#9 - Hayssa Gomes', 'ID: 9 | Nome: Hayssa Gomes | Email: Hayssagomes@admin.com | Grupo: 1,2', '127.0.0.1', '2022-03-15 00:35:02', '2022-03-15 00:35:02'),
(11, 'Edição', 1, 'Usuários', '#9 - Hayssa Gomes da Silva', 'ID: 9 | Nome: Hayssa Gomes da Silva | Email: Hayssagomes2002@admin.com | Grupos: 1,2', '127.0.0.1', '2022-03-15 00:37:06', '2022-03-15 00:37:06'),
(12, 'Exclusão', 1, 'Usuários', '#9 - Hayssa Gomes da Silva', 'ID: 9 | Nome: Hayssa Gomes da Silva | Email: Hayssagomes2002@admin.com | Grupos: 1,2', '127.0.0.1', '2022-03-15 00:54:15', '2022-03-15 00:54:15'),
(13, 'Edição', 1, 'Usuários', '#1 - Admin', 'ID: 1 | Nome: Admin | Email: admin@admin.com | Grupos: 1', '127.0.0.1', '2022-03-15 00:59:43', '2022-03-15 00:59:43'),
(15, 'Edição', 1, 'Grupos', '#8 - test', 'ID: 8 | Titulo: test | Permissões: 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79', '127.0.0.1', '2022-03-15 01:22:32', '2022-03-15 01:22:32'),
(16, 'Exclusão', 1, 'Grupos', '#8 - test', 'ID: 8 | Titulo: test | Permissões: 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79', '127.0.0.1', '2022-03-15 01:25:41', '2022-03-15 01:25:41'),
(17, 'Edição', 1, 'Grupos', '#2 - Operadores', 'ID: 2 | Titulo: Operadores | Permissões: 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79', '127.0.0.1', '2022-03-15 20:51:08', '2022-03-15 20:51:08'),
(18, 'Edição', 1, 'Grupos', '#2 - Operador', 'ID: 2 | Titulo: Operador | Permissões: 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79', '127.0.0.1', '2022-03-15 20:51:17', '2022-03-15 20:51:17'),
(21, 'Edição', 1, 'Cemitérios', '#6 - Cemitério Morada da Paz', 'ID: 6 | Nome: Cemitério Morada da Paz | Estado: PE | Cidade: Paulista | Bairro: Vila Torres Galvão | Rua: Avenida Rodolfo Aureliano | Numero: 21 | Complemento:  | E-mail: morada_da_paz@paulista.com | Numero De Contato: (81) 3920-4219 | Numero De Contato 2: (81) 93426217 | Observações: ', '127.0.0.1', '2022-03-15 23:36:38', '2022-03-15 23:36:38'),
(20, 'Cadastro', 1, 'Cemitérios', '#6 - Cemitério Morada da Paz', 'ID: 6 | Nome: Cemitério Morada da Paz | Estado: PE | Cidade: Paulista | Bairro: Vila Torres Galvão | Rua: Avenida Rodolfo Aureliano | Numero: 21 | Complemento:  | E-mail: morada_da_paz@paulista.com | Numero De Contato: (81) 3920-4219 | Numero De Contato 2: (81) 93426217 | Observações: ', '127.0.0.1', '2022-03-15 23:31:59', '2022-03-15 23:31:59'),
(31, 'Exclusão', 1, 'Setores', '#3 - Cemitério Memorial Vale da Saudade - Lado A', 'ID: 3 | Identificação: Lado A | Cemitério: Cemitério Memorial Vale da Saudade | Descrição: ', '127.0.0.1', '2022-03-16 00:52:46', '2022-03-16 00:52:46'),
(30, 'Edição', 1, 'Setores', '#2 - Cemitério Campo Santo São José - Lado B', 'ID: 2 | Identificação: Lado B | Cemitério: Cemitério Campo Santo São José | Descrição: ', '127.0.0.1', '2022-03-16 00:50:28', '2022-03-16 00:50:28'),
(23, 'Exclusão', 1, 'Cemitérios', '#6 - Cemitério Morada da Paz', 'ID: 6 | Nome: Cemitério Morada da Paz | Estado: PE | Cidade: Paulista | Bairro: Vila Torres Galvão | Rua: Avenida Rodolfo Aureliano | Numero: 21 | Complemento:  | E-mail: morada_da_paz@paulista.com | Numero De Contato: (81) 3920-4219 | Numero De Contato 2: (81) 93426217 | Observações: ', '127.0.0.1', '2022-03-15 23:38:17', '2022-03-15 23:38:17'),
(29, 'Edição', 1, 'Setores', '#1 - Cemitério Campo Santo São José - Lado A', 'ID: 1 | Identificação: Lado A | Cemitério: Cemitério Campo Santo São José | Descrição: ', '127.0.0.1', '2022-03-16 00:49:13', '2022-03-16 00:49:13'),
(28, 'Cadastro', 1, 'Setores', '#5 - Cemitério Memorial Vale da Saudade - Lado B', 'ID: 5 | Identificação: Lado B | Cemitério: Cemitério Memorial Vale da Saudade | Descrição: ', '127.0.0.1', '2022-03-16 00:46:20', '2022-03-16 00:46:20'),
(32, 'Edição', 1, 'Setores', '#5 - Cemitério Memorial Vale da Saudade - Lado B', 'ID: 5 | Identificação: Lado B | Cemitério: Cemitério Memorial Vale da Saudade | Descrição: Lado B do Cemiterio', '127.0.0.1', '2022-03-16 01:12:37', '2022-03-16 01:12:37'),
(33, 'Cadastro', 1, 'Quadras', '#6 - Cemitério Campo Santo São José - Lado A - 01', 'ID: 6 | Cemitério: Cemitério Campo Santo São José | Setor: Lado A | Indentificação: 01 | Descrição: Quadra 01', '127.0.0.1', '2022-03-17 00:03:25', '2022-03-17 00:03:25'),
(34, 'Exclusão', 1, 'Quadras', '#2 - Cemitério Campo Santo São José - Lado A - 01', 'ID: 2 | Cemitério: Cemitério Campo Santo São José | Setor: Lado A | Indentificação: 01 | Descrição: Quadra 01', '127.0.0.1', '2022-03-17 00:03:59', '2022-03-17 00:03:59'),
(35, 'Edição', 1, 'Quadras', '#3 - Cemitério Campo Santo São José - Lado A - 02', 'ID: 3 | Cemitério: Cemitério Campo Santo São José | Setor: Lado A | Indentificação: 02 | Descrição: ', '127.0.0.1', '2022-03-17 00:04:44', '2022-03-17 00:04:44'),
(36, 'Cadastro', 1, 'Lotes', '#1 - Cemitério Memorial Vale da Saudade - Lado B - 02 - 02', 'ID: 1 | Cemitério: Cemitério Memorial Vale da Saudade | Setor: Lado B | Quadra: 02 | Tipo de Lote: Capela | Comprimento: 30 | Altura: 20 | Indentificação: 02 | Descrição: Lote 02 | Lote Vazio? Sim | Reservado? Não', '127.0.0.1', '2022-03-17 00:32:29', '2022-03-17 00:32:29'),
(37, 'Cadastro', 1, 'Lotes', '#2 - Cemitério Memorial Vale da Saudade - Lado B - 01 - 03', 'ID: 2 | Cemitério: Cemitério Memorial Vale da Saudade | Setor: Lado B | Quadra: 01 | Tipo de Lote: Estaca | Comprimento: 33 | Altura: 19 | Indentificação: 03 | Descrição: Lote 03 | Lote Vazio? Não | Reservado? Sim', '127.0.0.1', '2022-03-17 00:34:19', '2022-03-17 00:34:19'),
(38, 'Edição', 1, 'Lotes', '#1 - Cemitério Memorial Vale da Saudade - Lado B - 02 - 02', 'ID: 1 | Cemitério: Cemitério Memorial Vale da Saudade | Setor: Lado B | Quadra: 02 | Tipo de Lote: Capela | Comprimento: 30 | Altura: 20 | Indentificação: 02 | Descrição:  | Lote Vazio? 0 | Reservado? 1', '127.0.0.1', '2022-03-17 00:34:47', '2022-03-17 00:34:47'),
(39, 'Edição', 1, 'Lotes', '#1 - Cemitério Memorial Vale da Saudade - Lado B - 02 - 02', 'ID: 1 | Cemitério: Cemitério Memorial Vale da Saudade | Setor: Lado B | Quadra: 02 | Tipo de Lote: Capela | Comprimento: 30 | Altura: 20 | Indentificação: 02 | Descrição:  | Lote Vazio? 0 | Reservado? 1', '127.0.0.1', '2022-03-17 00:34:47', '2022-03-17 00:34:47'),
(40, 'Edição', 1, 'Lotes', '#2 - Cemitério Memorial Vale da Saudade - Lado B - 01 - 03', 'ID: 2 | Cemitério: Cemitério Memorial Vale da Saudade | Setor: Lado B | Quadra: 01 | Tipo de Lote: Estaca | Comprimento: 33 | Altura: 19 | Indentificação: 03 | Descrição:  | Lote Vazio? Sim | Reservado? Não', '127.0.0.1', '2022-03-17 00:36:41', '2022-03-17 00:36:41'),
(41, 'Edição', 1, 'Lotes', '#1 - Cemitério Memorial Vale da Saudade - Lado B - 02 - 02', 'ID: 1 | Cemitério: Cemitério Memorial Vale da Saudade | Setor: Lado B | Quadra: 02 | Tipo de Lote: Capela | Comprimento: 30 | Altura: 20 | Indentificação: 02 | Descrição:  | Lote Vazio? Sim | Reservado? Não', '127.0.0.1', '2022-03-17 00:38:07', '2022-03-17 00:38:07'),
(42, 'Exclusão', 1, 'Lotes', '#1 - Cemitério Memorial Vale da Saudade - Lado B - 02 - 02', 'ID: 1 | Cemitério: Cemitério Memorial Vale da Saudade | Setor: Lado B | Quadra: 02 | Tipo de Lote: Capela | Comprimento: 30 | Altura: 20 | Indentificação: 02 | Descrição:  | Lote Vazio? Sim | Reservado? Não', '127.0.0.1', '2022-03-17 00:40:02', '2022-03-17 00:40:02'),
(43, 'Cadastro', 1, 'Ossuários', '#1 - Cemitério Campo Santo São José - test', 'ID: 1 | Cemitério: Cemitério Campo Santo São José | Indentificação: test | Descrição: ossuário test', '127.0.0.1', '2022-03-17 01:06:37', '2022-03-17 01:06:37'),
(44, 'Edição', 1, 'Ossuários', '#1 - Cemitério Campo Santo São José - test', 'ID: 1 | Cemitério: Cemitério Campo Santo São José | Indentificação: test | Descrição: ', '127.0.0.1', '2022-03-17 01:07:49', '2022-03-17 01:07:49'),
(45, 'Exclusão', 1, 'Ossuários', '#1 - Cemitério Campo Santo São José - test', 'ID: 1 | Cemitério: Cemitério Campo Santo São José | Indentificação: test | Descrição: ', '127.0.0.1', '2022-03-17 01:09:42', '2022-03-17 01:09:42'),
(46, 'Cadastro', 1, 'Gavetas', '#2 - Cemitério Campo Santo São José - test - 01', 'ID: 2 | Cemitério: Cemitério Campo Santo São José | Ossuário: test | Indentificação: 01 | Descrição: Gaveta test 02 | Gaveta Vazia? Sim', '127.0.0.1', '2022-03-17 01:33:45', '2022-03-17 01:33:45'),
(47, 'Edição', 1, 'Gavetas', '#1 - Cemitério Campo Santo São José - test - 02', 'ID: 1 | Cemitério: Cemitério Campo Santo São José | Ossuário: test | Indentificação: 02 | Descrição: Gaveta test 02 | Gaveta Vazia? Sim', '127.0.0.1', '2022-03-17 01:34:42', '2022-03-17 01:34:42'),
(48, 'Edição', 1, 'Gavetas', '#1 - Cemitério Campo Santo São José - test - 02', 'ID: 1 | Cemitério: Cemitério Campo Santo São José | Ossuário: test | Indentificação: 02 | Descrição: Gaveta test 02 | Gaveta Vazia? Não', '127.0.0.1', '2022-03-17 01:34:45', '2022-03-17 01:34:45'),
(49, 'Edição', 1, 'Gavetas', '#2 - Cemitério Campo Santo São José - test - 01', 'ID: 2 | Cemitério: Cemitério Campo Santo São José | Ossuário: test | Indentificação: 01 | Descrição: Gaveta test 01 | Gaveta Vazia? Sim', '127.0.0.1', '2022-03-17 01:35:00', '2022-03-17 01:35:00'),
(50, 'Exclusão', 1, 'Gavetas', '#2 - Cemitério Campo Santo São José - test - 01', 'ID: 2 | Cemitério: Cemitério Campo Santo São José | Ossuário: test | Indentificação: 01 | Descrição: Gaveta test 01 | Gaveta Vazia? Sim', '127.0.0.1', '2022-03-17 01:35:16', '2022-03-17 01:35:16'),
(51, 'Cadastro', 1, 'Solicitantes', '#1 - Eliane Juliana Ana Silveira', 'ID: 1 | Nome: Eliane Juliana Ana Silveira | Parentesco: Irmão(a) | Estado: PE | Cidade: Petrolina | Bairro: Antônio Cassimiro | Rua: Rua Nossa Senhora das Candeias | Numero: 818 | Complemento:  | E-mail: yagooliversales@bitco.cc | Numero de Contato: 8738585146 | Numero de Contato(2): 87983657543 | Observações: vfcsa', '127.0.0.1', '2022-03-17 02:09:10', '2022-03-17 02:09:10'),
(52, 'Edição', 1, 'Solicitantes', '#1 - Eliane Juliana Ana Silveira', 'ID: 1 | Nome: Eliane Juliana Ana Silveira | Sexo: Feminino | Parentesco: Irmão(a) | Estado: PE | Cidade: Petrolina | Bairro: Antônio Cassimiro | Rua: Rua Nossa Senhora das Candeias | Numero: 818 | Complemento:  | E-mail: yagooliversales@bitco.cc | Numero de Contato: 8738585146 | Numero de Contato(2): 87983657543 | Observações: vfcsa', '127.0.0.1', '2022-03-17 02:11:52', '2022-03-17 02:11:52'),
(53, 'Exclusão', 1, 'Solicitantes', '#1 - Eliane Juliana Ana Silveira', 'ID: 1 | Nome: Eliane Juliana Ana Silveira | Sexo:  | Parentesco: Irmão(a) | Estado: PE | Cidade: Petrolina | Bairro: Antônio Cassimiro | Rua: Rua Nossa Senhora das Candeias | Numero: 818 | Complemento:  | E-mail: yagooliversales@bitco.cc | Numero de Contato: 8738585146 | Numero de Contato(2): 87983657543 | Observações: vfcsa', '127.0.0.1', '2022-03-17 02:12:12', '2022-03-17 02:12:12'),
(54, 'Cadastro', 1, 'Óbitos', '#2 - Sara Heloise Renata Caldeira', 'ID: 2 | Cemitério: Cemitério Memorial Vale da Saudade | Setor: Lado A | Quadra: 02 | Lote: 02 | Numero DAM: 4235323t45 | Ano DAM: dr45t5y532 | Nome do Falecido: Sara Heloise Renata Caldeira | Data de Nascimento: 06/01/1959 | Data de Falecimento: 07/03/2022 | Data de Sepultamento: 14/03/2022 | Nome da Mãe: Olivia Emanuelly | Nome do Pai: César Iago Caldeira | Sexo: Feminino | Cor/Raça: Negro(a) | Certidão de Obito: 32434557890754323frt567 | Causa da Morte: Infarto | Naturalidade: Brasileiro | Estado:  | Cidade: Recife | Bairro: Linha do Tiro | Rua: 1ª Travessa Alterosa | Numero: 312 | Observações: ww | Gratuito? Sim', '127.0.0.1', '2022-03-17 02:38:56', '2022-03-17 02:38:56'),
(55, 'Cadastro', 1, 'Óbitos', '#1 - Sara Heloise Renata Caldeira', 'ID: 1 | Cemitério: Cemitério Memorial Vale da Saudade | Setor: Lado A | Quadra: 02 | Lote: 02 | Numero DAM: 4235323t45 | Ano DAM: dr45t5y532 | Nome do Falecido: Sara Heloise Renata Caldeira | Data de Nascimento: 06/01/1959 | Data de Falecimento: 07/03/2022 | Data de Sepultamento: 14/03/2022 | Nome da Mãe: Olivia Emanuelly | Nome do Pai: César Iago Caldeira | Sexo: Feminino | Cor/Raça: Negro(a) | Certidão de Obito: 32434557890754323frt567 | Causa da Morte: Infarto | Naturalidade: Brasileiro | Estado: MT | Cidade: Recife | Bairro: Linha do Tiro | Rua: 1ª Travessa Alterosa | Numero: 312 | Observações: ww | Gratuito? 1', '127.0.0.1', '2022-03-17 02:39:51', '2022-03-17 02:39:51'),
(56, 'Edição', 1, 'Óbitos', '#1 - Sara Heloise Renata Caldeira', 'ID: 1 | Cemitério: Cemitério Memorial Vale da Saudade | Setor: Lado A | Quadra: 02 | Lote: 02 | Numero DAM: 4235323t45 | Ano DAM: dr45t5y532 | Nome do Falecido: Sara Heloise Renata Caldeira | Data de Nascimento: 06/01/1959 | Data de Falecimento: 07/03/2022 | Data de Sepultamento: 14/03/2022 | Nome da Mãe: Olivia Emanuelly | Nome do Pai: César Iago Caldeira | Sexo: Feminino | Cor/Raça: Negro(a) | Certidão de Obito: 32434557890754323frt567 | Causa da Morte: Infarto | Naturalidade: Brasileiro | Estado: MT | Cidade: Recife | Bairro: Linha do Tiro | Rua: 1ª Travessa Alterosa | Numero: 312 | Observações: ww | Gratuito? 0', '127.0.0.1', '2022-03-17 02:40:39', '2022-03-17 02:40:39'),
(57, 'Exclusão', 1, 'Óbitos', '#2 - Sara Heloise Renata Caldeira', 'ID: 2 | Cemitério: Cemitério Memorial Vale da Saudade | Setor: Lado A | Quadra: 02 | Lote: 02 | Numero DAM: 4235323t45 | Ano DAM: dr45t5y532 | Nome do Falecido: Sara Heloise Renata Caldeira | Data de Nascimento: 06/01/1959 | Data de Falecimento: 07/03/2022 | Data de Sepultamento: 14/03/2022 | Nome da Mãe: Olivia Emanuelly | Nome do Pai: César Iago Caldeira | Sexo: Feminino | Cor/Raça: Negro(a) | Certidão de Obito: 32434557890754323frt567 | Causa da Morte: Infarto | Naturalidade: Brasileiro | Estado:  | Cidade: Recife | Bairro: Linha do Tiro | Rua: 1ª Travessa Alterosa | Numero: 312 | Observações: ww | Gratuito? Sim', '127.0.0.1', '2022-03-17 02:41:05', '2022-03-17 02:41:05'),
(58, 'Cadastro', 1, 'Recadastramentos', '#1 - Cauã Guilherme Almeida', 'ID: 1 | Cemitério: Cemitério Campo Santo São José | Setor: Lado A | Quadra: 02 | Lote: 01 | Nome do Falecido: Cauã Guilherme Almeida | Data de Nascimento: 16/03/2022 | Data de Falecimento: 01/03/2022 | Data de Sepultamento: 03/03/2022 | Nome da Mãe: Larissa Carolina Sophie | Nome do Pai: César Daniel Almeida | Sexo: Masculino | Cor/Raça: Amarela | Certidão de Obito: 324345xs57890754323frt567 | Causa da Morte: Envenenamento | Naturalidade: Republicano | Estado:  | Cidade: Paulista | Bairro: Jaguaribe | Rua: Via Coletora Um | Numero: 120 | Observações: few', '127.0.0.1', '2022-03-17 02:56:26', '2022-03-17 02:56:26'),
(59, 'Edição', 1, 'Recadastramentos', '#1 - Cauã Guilherme Almeida', 'ID: 1 | Cemitério: Cemitério Campo Santo São José | Setor: Lado A | Quadra: 02 | Lote: 01 | Nome do Falecido: Cauã Guilherme Almeida | Data de Nascimento: 16/03/2022 | Data de Falecimento: 01/03/2022 | Data de Sepultamento: 03/03/2022 | Nome da Mãe: Larissa Carolina Sophie | Nome do Pai: César Daniel Almeida | Sexo: Masculino | Cor/Raça: Amarela | Certidão de Obito: 324345xs57890754323frt567 | Causa da Morte: Envenenamento | Naturalidade: Republicano | Estado: PE | Cidade: Paulista | Bairro: Jaguaribe | Rua: Via Coletora Um | Numero: 120 | Observações: few', '127.0.0.1', '2022-03-17 02:59:40', '2022-03-17 02:59:40'),
(60, 'Exclusão', 1, 'Recadastramentos', '#1 - Cauã Guilherme Almeida', 'ID: 1 | Cemitério: Cemitério Campo Santo São José | Setor: Lado A | Quadra: 02 | Lote: 01 | Nome do Falecido: Cauã Guilherme Almeida | Data de Nascimento: 16/03/2022 | Data de Falecimento: 01/03/2022 | Data de Sepultamento: 03/03/2022 | Nome da Mãe: Larissa Carolina Sophie | Nome do Pai: César Daniel Almeida | Sexo: Masculino | Cor/Raça: Amarela | Certidão de Obito: 324345xs57890754323frt567 | Causa da Morte: Envenenamento | Naturalidade: Republicano | Estado: PE | Cidade: Paulista | Bairro: Jaguaribe | Rua: Via Coletora Um | Numero: 120 | Observações: few', '127.0.0.1', '2022-03-17 03:00:13', '2022-03-17 03:00:13'),
(61, 'Edição', 1, 'Solicitantes', '#1 - Eliane Juliana Ana Silveira', 'ID: 1 | Nome: Eliane Juliana Ana Silveira | Sexo: Feminino | Parentesco: Filho(a) | Estado: PE | Cidade: Petrolina | Bairro: Antônio Cassimiro | Rua: Rua Nossa Senhora das Candeias | Numero: 818 | Complemento:  | E-mail: yagooliversales@bitco.cc | Numero de Contato: 8738585146 | Numero de Contato(2): 87983657543 | Observações: vfcsa', '127.0.0.1', '2022-03-19 02:16:21', '2022-03-19 02:16:21'),
(62, 'Edição', 1, 'Solicitantes', '#1 - Eliane Juliana Ana Silveira', 'ID: 1 | Nome: Eliane Juliana Ana Silveira | Sexo: Feminino | Parentesco: Mãe | Estado: PE | Cidade: Petrolina | Bairro: Antônio Cassimiro | Rua: Rua Nossa Senhora das Candeias | Numero: 818 | Complemento:  | E-mail: yagooliversales@bitco.cc | Numero de Contato: 8738585146 | Numero de Contato(2): 87983657543 | Observações: vfcsa', '127.0.0.1', '2022-03-19 02:16:47', '2022-03-19 02:16:47'),
(63, 'Edição', 1, 'Solicitantes', '#1 - Eliane Juliana Ana Silveira', 'ID: 1 | Nome: Eliane Juliana Ana Silveira | Sexo: Feminino | Parentesco: Irmão(a) | Estado: PE | Cidade: Petrolina | Bairro: Antônio Cassimiro | Rua: Rua Nossa Senhora das Candeias | Numero: 818 | Complemento:  | E-mail: yagooliversales@bitco.cc | Numero de Contato: 8738585146 | Numero de Contato(2): 87983657543 | Observações: vfcsa', '127.0.0.1', '2022-03-19 02:17:53', '2022-03-19 02:17:53'),
(64, 'Edição', 1, 'Solicitantes', '#1 - Eliane Juliana Ana Silveira', 'ID: 1 | Nome: Eliane Juliana Ana Silveira | Sexo: Feminino | Parentesco: Irmão (a) | Estado: PE | Cidade: Petrolina | Bairro: Antônio Cassimiro | Rua: Rua Nossa Senhora das Candeias | Numero: 818 | Complemento:  | E-mail: yagooliversales@bitco.cc | Numero de Contato: 8738585146 | Numero de Contato(2): 87983657543 | Observações: vfcsa', '127.0.0.1', '2022-03-19 02:22:10', '2022-03-19 02:22:10'),
(65, 'Edição', 1, 'Solicitantes', '#1 - Eliane Juliana Ana Silveira', 'ID: 1 | Nome: Eliane Juliana Ana Silveira | Sexo: Feminino | Parentesco: Filho (a) | Estado: PE | Cidade: Petrolina | Bairro: Antônio Cassimiro | Rua: Rua Nossa Senhora das Candeias | Numero: 818 | Complemento:  | E-mail: yagooliversales@bitco.cc | Numero de Contato: 8738585146 | Numero de Contato(2): 87983657543 | Observações: vfcsa', '127.0.0.1', '2022-03-19 02:22:44', '2022-03-19 02:22:44'),
(66, 'Edição', 1, 'Solicitantes', '#1 - Eliane Juliana Ana Silveira', 'ID: 1 | Nome: Eliane Juliana Ana Silveira | Sexo: Feminino | Parentesco: Irmão/a | Estado: PE | Cidade: Petrolina | Bairro: Antônio Cassimiro | Rua: Rua Nossa Senhora das Candeias | Numero: 818 | Complemento:  | E-mail: yagooliversales@bitco.cc | Numero de Contato: 8738585146 | Numero de Contato(2): 87983657543 | Observações: vfcsa', '127.0.0.1', '2022-03-19 02:24:10', '2022-03-19 02:24:10'),
(67, 'Edição', 1, 'Óbitos', '#1 - Sara Heloise Renata Caldeira', 'ID: 1 | Cemitério: Cemitério Memorial Vale da Saudade | Setor: Lado A | Quadra: 02 | Lote: 02 | Numero DAM: 4235323t45 | Ano DAM: dr45t5y532 | Nome do Falecido: Sara Heloise Renata Caldeira | Data de Nascimento: 06/01/1959 | Data de Falecimento: 07/03/2022 | Data de Sepultamento: 14/03/2022 | Nome da Mãe: Olivia Emanuelly | Nome do Pai: César Iago Caldeira | Sexo: Feminino | Cor/Raça: Negro(a) | Certidão de Obito: 32434557890754323frt567 | Causa da Morte: Infarto | Naturalidade: Brasileiro | Estado: MT | Cidade: Recife | Bairro: Linha do Tiro | Rua: 1ª Travessa Alterosa | Numero: 312 | Observações: ww | Gratuito? Sim', '127.0.0.1', '2022-03-19 02:47:14', '2022-03-19 02:47:14'),
(68, 'Edição', 1, 'Óbitos', '#1 - Sara Heloise Renata Caldeira', 'ID: 1 | Cemitério: Cemitério Memorial Vale da Saudade | Setor: Lado A | Quadra: 02 | Lote: 02 | Numero DAM: 4235323t45 | Ano DAM: dr45t5y532 | Nome do Falecido: Sara Heloise Renata Caldeira | Data de Nascimento: 06/01/1959 | Data de Falecimento: 07/03/2022 | Data de Sepultamento: 14/03/2022 | Nome da Mãe: Olivia Emanuelly | Nome do Pai: César Iago Caldeira | Sexo: Feminino | Cor/Raça: Negro/a | Certidão de Obito: 32434557890754323frt567 | Causa da Morte: Infarto | Naturalidade: Brasileiro | Estado: MT | Cidade: Recife | Bairro: Linha do Tiro | Rua: 1ª Travessa Alterosa | Numero: 312 | Observações: ww | Gratuito? Sim', '127.0.0.1', '2022-03-19 02:49:26', '2022-03-19 02:49:26'),
(143, NULL, NULL, NULL, NULL, NULL, '127.0.0.1', '2022-04-02 00:30:54', '2022-04-02 00:30:54'),
(144, 'Cadastro', 1, 'Transf. entre Gavetas', '#5 - Ryan Diego Felipe Alves', 'ID: 5 | Falecido: Ryan Diego Felipe Alves | Tipo de Destino: Interno | Destino: Cemitério Memorial Vale da Saudade - Ossuário 3 - 02 | Data de Transferencia: 01/04/2022 | Observações: fewqds', '127.0.0.1', '2022-04-02 00:32:26', '2022-04-02 00:32:26'),
(72, 'Edição', 1, 'Usuários', '#1 - ', 'ID: 1 | Nome: Admim | Email: admin@admin.com | Grupos: 1', '127.0.0.1', '2022-03-20 04:55:18', '2022-03-20 04:55:18'),
(74, 'Edição', 1, 'Lotes', '#1 - Cemitério Memorial Vale da Saudade - Lado B - 01 - 02', 'ID: 1 | Cemitério: Cemitério Memorial Vale da Saudade | Setor: Lado B | Quadra: 01 | Tipo de Lote: Capela | Comprimento: 30 | Altura: 20 | Indentificação: 02 | Descrição:  | Lote Vazio? Sim | Reservado? Sim', '127.0.0.1', '2022-03-22 21:28:44', '2022-03-22 21:28:44'),
(75, 'Edição', 1, 'Lotes', '#1 - Cemitério Campo Santo São José - Lado AC - 03 - 02', 'ID: 1 | Cemitério: Cemitério Campo Santo São José | Setor: Lado AC | Quadra: 03 | Tipo de Lote: Capela | Comprimento: 30 | Altura: 20 | Indentificação: 02 | Descrição:  | Lote Vazio? Sim | Reservado? Sim', '127.0.0.1', '2022-03-22 21:29:56', '2022-03-22 21:29:56'),
(76, 'Edição', 1, 'Quadras', '#2 - Cemitério Campo Santo São José - Lado AC - 02', 'ID: 2 | Cemitério: Cemitério Campo Santo São José | Setor: Lado AC | Indentificação: 02 | Descrição: Quadra 02', '127.0.0.1', '2022-03-22 21:32:14', '2022-03-22 21:32:14'),
(77, 'Edição', 1, 'Quadras', '#4 - Cemitério Campo Santo São José -  - 03', 'ID: 4 | Cemitério: Cemitério Campo Santo São José | Setor:  | Indentificação: 03 | Descrição: Quadra 03', '127.0.0.1', '2022-03-22 21:32:41', '2022-03-22 21:32:41'),
(78, 'Edição', 1, 'Quadras', '#4 - Cemitério Morada da Paz -  - 03', 'ID: 4 | Cemitério: Cemitério Morada da Paz | Setor:  | Indentificação: 03 | Descrição: Quadra 03', '127.0.0.1', '2022-03-22 21:33:08', '2022-03-22 21:33:08'),
(79, 'Edição', 1, 'Quadras', '#4 - Cemitério Morada da Paz - Lado AB - 03', 'ID: 4 | Cemitério: Cemitério Morada da Paz | Setor: Lado AB | Indentificação: 03 | Descrição: Quadra 03', '127.0.0.1', '2022-03-22 21:33:58', '2022-03-22 21:33:58'),
(80, 'Edição', 1, 'Lotes', '#1 - Cemitério Campo Santo São José - Lado AC - 02 - 02', 'ID: 1 | Cemitério: Cemitério Campo Santo São José | Setor: Lado AC | Quadra: 02 | Tipo de Lote: Capela | Comprimento: 30 | Altura: 20 | Indentificação: 02 | Descrição:  | Lote Vazio? Sim | Reservado? Sim', '127.0.0.1', '2022-03-22 21:35:24', '2022-03-22 21:35:24'),
(81, 'Edição', 1, 'Lotes', '#2 - Cemitério Memorial Vale da Saudade - Lado B - 01 - 03', 'ID: 2 | Cemitério: Cemitério Memorial Vale da Saudade | Setor: Lado B | Quadra: 01 | Tipo de Lote: Estaca | Comprimento: 33 | Altura: 19 | Indentificação: 03 | Descrição:  | Lote Vazio? Sim | Reservado? Sim', '127.0.0.1', '2022-03-22 21:36:09', '2022-03-22 21:36:09'),
(82, 'Edição', 1, 'Lotes', '#2 - Cemitério Memorial Vale da Saudade - Lado B - 01 - 03', 'ID: 2 | Cemitério: Cemitério Memorial Vale da Saudade | Setor: Lado B | Quadra: 01 | Tipo de Lote: Estaca | Comprimento: 33 | Altura: 19 | Indentificação: 03 | Descrição:  | Lote Vazio? Não | Reservado? Sim', '127.0.0.1', '2022-03-22 21:36:52', '2022-03-22 21:36:52'),
(83, 'Cadastro', 1, 'Ossuários', '#2 - Cemitério Campo Santo São José - Ossuário 2', 'ID: 2 | Cemitério: Cemitério Campo Santo São José | Indentificação: Ossuário 2 | Descrição: ', '127.0.0.1', '2022-03-22 21:52:41', '2022-03-22 21:52:41'),
(84, 'Edição', 1, 'Ossuários', '#1 - Cemitério Campo Santo São José - Ossuário', 'ID: 1 | Cemitério: Cemitério Campo Santo São José | Indentificação: Ossuário | Descrição: test', '127.0.0.1', '2022-03-22 21:53:04', '2022-03-22 21:53:04'),
(85, 'Cadastro', 1, 'Ossuários', '#3 - Cemitério Memorial Vale da Saudade - Ossuário 3', 'ID: 3 | Cemitério: Cemitério Memorial Vale da Saudade | Indentificação: Ossuário 3 | Descrição: ', '127.0.0.1', '2022-03-22 21:53:37', '2022-03-22 21:53:37'),
(86, 'Cadastro', 1, 'Ossuários', '#4 - Cemitério Morada da Paz - Ossuário 4', 'ID: 4 | Cemitério: Cemitério Morada da Paz | Indentificação: Ossuário 4 | Descrição: ', '127.0.0.1', '2022-03-22 21:54:10', '2022-03-22 21:54:10'),
(87, 'Cadastro', 1, 'Ossuários', '#5 - Cemitério Morada da Paz - Ossuário 5', 'ID: 5 | Cemitério: Cemitério Morada da Paz | Indentificação: Ossuário 5 | Descrição: ', '127.0.0.1', '2022-03-22 21:54:28', '2022-03-22 21:54:28'),
(88, 'Cadastro', 1, 'Ossuários', '#6 - Cemitério Morada da Paz - Ossuário 6', 'ID: 6 | Cemitério: Cemitério Morada da Paz | Indentificação: Ossuário 6 | Descrição: ', '127.0.0.1', '2022-03-22 21:55:01', '2022-03-22 21:55:01'),
(89, 'Cadastro', 1, 'Gavetas', '#3 - Cemitério Morada da Paz - Ossuário 5 - 03', 'ID: 3 | Cemitério: Cemitério Morada da Paz | Ossuário: Ossuário 5 | Indentificação: 03 | Descrição:  | Gaveta Vazia? Sim', '127.0.0.1', '2022-03-22 22:45:35', '2022-03-22 22:45:35'),
(90, 'Edição', 1, 'Gavetas', '#1 - Cemitério Memorial Vale da Saudade - Ossuário 3 - 02', 'ID: 1 | Cemitério: Cemitério Memorial Vale da Saudade | Ossuário: Ossuário 3 | Indentificação: 02 | Descrição: Gaveta test 02 | Gaveta Vazia? Sim', '127.0.0.1', '2022-03-22 22:48:38', '2022-03-22 22:48:38'),
(91, 'Edição', 1, 'Óbitos', '#1 - Sara Heloise Renata Caldeira', 'ID: 1 | Cemitério: Cemitério Memorial Vale da Saudade | Setor: Lado B | Quadra: 01 | Lote: 01 | Numero DAM: 4235323t45 | Ano DAM: dr45t5y532 | Nome do Falecido: Sara Heloise Renata Caldeira | Data de Nascimento: 06/01/1959 | Data de Falecimento: 07/03/2022 | Data de Sepultamento: 14/03/2022 | Nome da Mãe: Olivia Emanuelly | Nome do Pai: César Iago Caldeira | Sexo: Feminino | Cor/Raça: Negro/a | Certidão de Obito: 32434557890754323frt567 | Causa da Morte: Infarto | Naturalidade: Brasileiro | Estado: MT | Cidade: Recife | Bairro: Linha do Tiro | Rua: 1ª Travessa Alterosa | Numero: 312 | Observações: ww | Gratuito? Sim', '127.0.0.1', '2022-03-23 03:18:49', '2022-03-23 03:18:49'),
(92, 'Edição', 1, 'Óbitos', '#1 - Sara Heloise Renata Caldeira', 'ID: 1 | Cemitério: Cemitério Memorial Vale da Saudade | Setor: Lado B | Quadra: 01 | Lote: 02 | Numero DAM: 4235323t45 | Ano DAM: dr45t5y532 | Nome do Falecido: Sara Heloise Renata Caldeira | Data de Nascimento: 06/01/1959 | Data de Falecimento: 07/03/2022 | Data de Sepultamento: 14/03/2022 | Nome da Mãe: Olivia Emanuelly | Nome do Pai: César Iago Caldeira | Sexo: Feminino | Cor/Raça: Negro/a | Certidão de Obito: 32434557890754323frt567 | Causa da Morte: Infarto | Naturalidade: Brasileiro | Estado: MT | Cidade: Recife | Bairro: Linha do Tiro | Rua: 1ª Travessa Alterosa | Numero: 312 | Observações: ww | Gratuito? Sim', '127.0.0.1', '2022-03-23 03:32:37', '2022-03-23 03:32:37'),
(93, 'Edição', 1, 'Óbitos', '#1 - Sara Heloise Renata Caldeira', 'ID: 1 | Cemitério: Cemitério Memorial Vale da Saudade | Setor: Lado B | Quadra: 01 | Lote: 02 | Numero DAM: 4235323t45 | Ano DAM: dr45t5y532 | Nome do Falecido: Sara Heloise Renata Caldeira | Data de Nascimento: 06/01/1959 | Data de Falecimento: 07/03/2022 | Data de Sepultamento: 14/03/2022 | Nome da Mãe: Olivia Emanuelly | Nome do Pai: César Iago Caldeira | Sexo: Feminino | Cor/Raça: Negro/a | Certidão de Obito: 32434557890754323frt567 | Causa da Morte: Infarto | Naturalidade: Brasileiro | Estado: MT | Cidade: Recife | Bairro: Linha do Tiro | Rua: 1ª Travessa Alterosa | Numero: 312 | Observações: ww | Gratuito? Sim', '127.0.0.1', '2022-03-23 03:33:55', '2022-03-23 03:33:55'),
(94, 'Edição', 1, 'Óbitos', '#1 - Sara Heloise Renata Caldeira', 'ID: 1 | Cemitério: Cemitério Campo Santo São José | Setor: Lado AC | Quadra: 02 | Lote: 01 | Numero DAM: 4235323t45 | Ano DAM: dr45t5y532 | Nome do Falecido: Sara Heloise Renata Caldeira | Data de Nascimento: 06/01/1959 | Data de Falecimento: 07/03/2022 | Data de Sepultamento: 14/03/2022 | Nome da Mãe: Olivia Emanuelly | Nome do Pai: César Iago Caldeira | Sexo: Feminino | Cor/Raça: Negro/a | Certidão de Obito: 32434557890754323frt567 | Causa da Morte: Infarto | Naturalidade: Brasileiro | Estado: MT | Cidade: Recife | Bairro: Linha do Tiro | Rua: 1ª Travessa Alterosa | Numero: 312 | Observações: ww | Gratuito? Sim', '127.0.0.1', '2022-03-23 03:40:24', '2022-03-23 03:40:24'),
(95, 'Edição', 1, 'Óbitos', '#1 - Sara Heloise Renata Caldeira', 'ID: 1 | Cemitério: Cemitério Memorial Vale da Saudade | Setor: Lado B | Quadra: 01 | Lote: 02 | Numero DAM: 4235323t45 | Ano DAM: dr45t5y532 | Nome do Falecido: Sara Heloise Renata Caldeira | Data de Nascimento: 06/01/1959 | Data de Falecimento: 07/03/2022 | Data de Sepultamento: 14/03/2022 | Nome da Mãe: Olivia Emanuelly | Nome do Pai: César Iago Caldeira | Sexo: Feminino | Cor/Raça: Negro/a | Certidão de Obito: 32434557890754323frt567 | Causa da Morte: Infarto | Naturalidade: Brasileiro | Estado: MT | Cidade: Recife | Bairro: Linha do Tiro | Rua: 1ª Travessa Alterosa | Numero: 312 | Observações: ww | Gratuito? Sim', '127.0.0.1', '2022-03-23 03:44:12', '2022-03-23 03:44:12'),
(96, 'Edição', 1, 'Recadastramentos', '#1 - Cauã Guilherme Almeida', 'ID: 1 | Cemitério: Cemitério Memorial Vale da Saudade | Setor: Lado B | Quadra: 01 | Lote: 02 | Nome do Falecido: Cauã Guilherme Almeida | Data de Nascimento: 16/03/2022 | Data de Falecimento: 01/03/2022 | Data de Sepultamento: 03/03/2022 | Nome da Mãe: Larissa Carolina Sophie | Nome do Pai: César Daniel Almeida | Sexo: Masculino | Cor/Raça: Amarela | Certidão de Obito: 324345xs57890754323frt567 | Causa da Morte: Envenenamento | Naturalidade: Republicano | Estado: PE | Cidade: Paulista | Bairro: Jaguaribe | Rua: Via Coletora Um | Numero: 120 | Observações: few', '127.0.0.1', '2022-03-23 17:07:44', '2022-03-23 17:07:44'),
(97, 'Exclusão', 1, 'Solicitantes', '# - ', 'ID:  | Nome:  | Sexo:  | Parentesco:  | Estado:  | Cidade:  | Bairro:  | Rua:  | Numero:  | Complemento:  | E-mail:  | Numero de Contato:  | Numero de Contato(2):  | Observações: ', '127.0.0.1', '2022-03-25 05:00:12', '2022-03-25 05:00:12'),
(98, 'Exclusão', 1, 'Solicitantes', '# - ', 'ID:  | Nome:  | Sexo:  | Parentesco:  | Estado:  | Cidade:  | Bairro:  | Rua:  | Numero:  | Complemento:  | E-mail:  | Numero de Contato:  | Numero de Contato(2):  | Observações: ', '127.0.0.1', '2022-03-25 05:00:28', '2022-03-25 05:00:28'),
(99, 'Exclusão', 1, 'Solicitantes', '#1 - Eliane Juliana Ana Silveira', 'ID: 1 | Nome: Eliane Juliana Ana Silveira | Sexo: Feminino | Parentesco: Irmão/a | Estado: PE | Cidade: Petrolina | Bairro: Antônio Cassimiro | Rua: Rua Nossa Senhora das Candeias | Numero: 818 | Complemento:  | E-mail: yagooliversales@bitco.cc | Numero de Contato: 8738585146 | Numero de Contato(2): 87983657543 | Observações: vfcsa', '127.0.0.1', '2022-03-25 05:04:49', '2022-03-25 05:04:49'),
(100, 'Edição', 1, 'Responsáveis', '# - Eliane Juliana Ana Silveira', 'ID:  | Nome: Eliane Juliana Ana Silveira | Sexo: Feminino | Parentesco: Irmão/a | Estado: PE | Cidade: Petrolina | Bairro: Antônio Cassimiro | Rua: Rua Nossa Senhora das Candeias | Numero: 818 | Complemento:  | E-mail: yagooliversales@bitco.cc | Numero de Contato: 8738585146 | Numero de Contato(2): 87983657543 | Observações: vfcsa', '127.0.0.1', '2022-03-25 05:54:00', '2022-03-25 05:54:00'),
(101, 'Edição', 1, 'Grupos', '#1 - Admin', 'ID: 1 | Titulo: Admin | Permissões: 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79, 80, 81, 82, 83, 84', '127.0.0.1', '2022-03-25 08:23:59', '2022-03-25 08:23:59'),
(102, 'Edição', 1, 'Grupos', '#2 - Operador', 'ID: 2 | Titulo: Operador | Permissões: 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79, 80, 81, 82, 83, 84', '127.0.0.1', '2022-03-25 08:24:46', '2022-03-25 08:24:46'),
(108, 'Edição', 1, 'Óbitos', '# - Sara Heloise Renata Caldeira', 'ID:  | Cemitério:  | Setor:  | Quadra:  | Lote:  | Numero DAM: 4235323t45 | Ano DAM: dr45t5y532 | Nome do Falecido: Sara Heloise Renata Caldeira | Data de Nascimento: 06/01/1959 | Data de Falecimento: 07/03/2022 | Data de Sepultamento: 14/03/2022 | Nome da Mãe: Olivia Emanuelly | Nome do Pai: César Iago Caldeira | Sexo: Feminino | Cor/Raça:  | Certidão de Obito: 32434557890754323frt567 | Causa da Morte: Infarto | Naturalidade: Brasileiro | Estado:  | Cidade: Recife | Bairro: Linha do Tiro | Rua: 1ª Travessa Alterosa | Numero: 312 | Observações: ww | Gratuito? Sim', '127.0.0.1', '2022-03-29 09:39:03', '2022-03-29 09:39:03'),
(109, 'Cadastro', 1, 'Óbitos', '#3 - Danna Paola Maria da Silva', 'ID: 3 | Cemitério: Cemitério Campo Santo São José | Setor: Lado AC | Quadra: 02 | Lote: 01 | Numero DAM: 34222 | Ano DAM: 2009 | Nome do Falecido: Danna Paola Maria da Silva | Data de Nascimento: 29/03/2022 | Data de Falecimento: 29/03/2022 | Data de Sepultamento: 29/03/2022 | Nome da Mãe: Alessandra Letícia Bernardes | Nome do Pai: Alessandra Letícia Bernardes | Sexo: Masculino | Cor/Raça: Negro/a | Certidão de Obito:  | Causa da Morte:  | Naturalidade:  | Estado: PE | Cidade: paulista | Bairro:  | Rua:  | Numero:  | Observações:  | Gratuito? Não', '127.0.0.1', '2022-03-29 10:01:57', '2022-03-29 10:01:57'),
(110, 'Edição', 1, 'Óbitos', '#2 - Sara Heloise Renata Caldeira', 'ID: 2 | Cemitério:  | Setor:  | Quadra:  | Lote:  | Numero DAM: 4235323t45 | Ano DAM: dr45t5y532 | Nome do Falecido: Sara Heloise Renata Caldeira | Data de Nascimento: 06/01/1959 | Data de Falecimento: 07/03/2022 | Data de Sepultamento: 14/03/2022 | Nome da Mãe: Olivia Emanuelly | Nome do Pai: César Iago Caldeira | Sexo: Feminino | Cor/Raça:  | Certidão de Obito: 32434557890754323frt567 | Causa da Morte: Infarto | Naturalidade: Brasileiro | Estado:  | Cidade: Recife | Bairro: Linha do Tiro | Rua: 1ª Travessa Alterosa | Numero: 312 | Observações: ww | Gratuito? Sim', '127.0.0.1', '2022-03-29 10:04:02', '2022-03-29 10:04:02'),
(111, 'Exclusão', 1, 'Óbitos', '#2 - Sara Heloise Renata Caldeira', 'ID: 2 | Cemitério: Cemitério Memorial Vale da Saudade | Setor: Lado AB | Quadra: 02 | Lote: 02 | Numero DAM: 4235323t45 | Ano DAM: dr45t5y532 | Nome do Falecido: Sara Heloise Renata Caldeira | Data de Nascimento: 06/01/1959 | Data de Falecimento: 07/03/2022 | Data de Sepultamento: 14/03/2022 | Nome da Mãe: Olivia Emanuelly | Nome do Pai: César Iago Caldeira | Sexo: Feminino | Cor/Raça: Negro(a) | Certidão de Obito: 32434557890754323frt567 | Causa da Morte: Infarto | Naturalidade: Brasileiro | Estado:  | Cidade: Recife | Bairro: Linha do Tiro | Rua: 1ª Travessa Alterosa | Numero: 312 | Observações: ww | Gratuito? Sim', '127.0.0.1', '2022-03-29 10:05:18', '2022-03-29 10:05:18'),
(117, 'Edição', 1, 'Compra de Lote', '#5 - Eliane Juliana Ana Silveira', 'ID: 5 | Responsável: Eliane Juliana Ana Silveira | numero DAM: 4235323t45 | Ano DAM: 2009 | Data Da Aquisicao: 25/03/2022 | Observações: gfvrewxsa', '127.0.0.1', '2022-03-29 10:31:06', '2022-03-29 10:31:06'),
(118, 'Exclusão', 1, 'Compra de Lote', '#5 - Eliane Juliana Ana Silveira', 'ID: 5 | Responsável: 1 | numero DAM: 4235323t45 | Ano DAM: 2009 | Data Da Aquisicao: 25/03/2022 | Observações: gfvrewxsa', '127.0.0.1', '2022-03-29 10:34:22', '2022-03-29 10:34:22'),
(116, 'Cadastro', 1, 'Compra de Lote', '#11 - Eliane Juliana Ana Silveira', 'ID: 11 | Responsável: Eliane Juliana Ana Silveira | numero DAM: 4235323t443 | Ano DAM: 34544743 | Data Da Aquisicao: 29/03/2022 | Observações: cewdqd', '127.0.0.1', '2022-03-29 10:27:56', '2022-03-29 10:27:56'),
(122, 'Exclusão', 1, 'Óbitos em Gavetas', '#2 - Sara Heloise Renata Caldeira', 'ID: 2 | Cemitério: Cemitério Campo Santo São José | Ossuário: Ossuário | Gaveta: 01 | Numero DAM: 4235323t45 | Ano DAM: dr45t5y532 | Nome do Falecido: Sara Heloise Renata Caldeira | Data de Nascimento: 06/01/1959 | Data de Falecimento: 07/03/2022 | Data de Sepultamento: 14/03/2022 | Nome da Mãe: Olivia Emanuelly | Nome do Pai: César Iago Caldeira | Sexo: Feminino | Cor/Raça: Negro/a | Certidão de Obito: 32434557890754323frt567 | Causa da Morte: Infarto | Naturalidade: Brasileiro | Estado: MT | Cidade: Recife | Bairro: Linha do Tiro | Rua: 1ª Travessa Alterosa | Numero: 312 | Observações: ww | Gratuito? Sim', '127.0.0.1', '2022-03-29 10:50:41', '2022-03-29 10:50:41'),
(120, 'Cadastro', 1, 'Óbitos em Gavetas', '#5 - Alessandra Letícia Bernardes', 'ID: 5 | Cemitério: Cemitério Campo Santo São José | Ossuário:  | Gaveta:  | Numero DAM: 34222 | Ano DAM: 34544743 | Nome do Falecido: Alessandra Letícia Bernardes | Data de Nascimento: 29/03/2022 | Data de Falecimento: 29/03/2022 | Data de Sepultamento: 29/03/2022 | Nome da Mãe: testando | Nome do Pai: testando | Sexo: Feminino | Cor/Raça: Pardo(a) | Certidão de Obito: 32434557890754323frt567 | Causa da Morte: Envenenamento | Naturalidade: Brasileiro | Estado: MA | Cidade: paulista | Bairro:  | Rua: 1ª Travessa Alterosa | Numero: 81993852234 | Observações:  | Gratuito? Sim', '127.0.0.1', '2022-03-29 10:46:25', '2022-03-29 10:46:25'),
(121, 'Edição', 1, 'Óbitos em Gavetas', '#2 - Sara Heloise Renata Caldeira', 'ID: 2 | Cemitério:  | Ossuário:  | Gaveta:  | Numero DAM: 4235323t45 | Ano DAM: dr45t5y532 | Nome do Falecido: Sara Heloise Renata Caldeira | Data de Nascimento: 06/01/1959 | Data de Falecimento: 07/03/2022 | Data de Sepultamento: 14/03/2022 | Nome da Mãe: Olivia Emanuelly | Nome do Pai: César Iago Caldeira | Sexo: Feminino | Cor/Raça:  | Certidão de Obito: 32434557890754323frt567 | Causa da Morte: Infarto | Naturalidade: Brasileiro | Estado: MT | Cidade: Recife | Bairro: Linha do Tiro | Rua: 1ª Travessa Alterosa | Numero: 312 | Observações: ww | Gratuito? Sim', '127.0.0.1', '2022-03-29 10:48:08', '2022-03-29 10:48:08'),
(141, 'Cadastro', 1, 'Transf. entre lotes', '#8 - Danna Paola Maria da Silva', 'ID: 8 | Falecido: Danna Paola Maria da Silva | Tipo de Destino: Externo | Destino: cdsasxa | Data de Transferencia: 01/04/2022 | Observações: sza', '127.0.0.1', '2022-04-01 23:07:53', '2022-04-01 23:07:53'),
(125, 'Cadastro', 1, 'Óbitos em Gavetas', '#6 - Alessandra Letícia Bernardes', 'ID: 6 | Cemitério: Cemitério Campo Santo São José | Ossuário: Ossuário | Gaveta: 01 | Numero DAM: 34222 | Ano DAM: 34544743 | Nome do Falecido: Alessandra Letícia Bernardes | Data de Nascimento: 29/03/2022 | Data de Falecimento: 29/03/2022 | Data de Sepultamento: 29/03/2022 | Nome da Mãe: testando | Nome do Pai: testando | Sexo: Feminino | Cor/Raça: Pardo(a) | Certidão de Obito: 32434557890754323frt567 | Causa da Morte: Envenenamento | Naturalidade: Brasileiro | Estado: MA | Cidade: paulista | Bairro:  | Rua: 1ª Travessa Alterosa | Numero: 81993852234 | Observações:  | Gratuito? Sim', '127.0.0.1', '2022-03-29 10:53:09', '2022-03-29 10:53:09'),
(127, 'Cadastro', 1, 'Óbitos em Gavetas', '#7 - Alessandra Letícia Bernardes', 'ID: 7 | Cemitério: Cemitério Campo Santo São José | Ossuário: Ossuário | Gaveta: 01 | Numero DAM: 34222 | Ano DAM: 34544743 | Nome do Falecido: Alessandra Letícia Bernardes | Data de Nascimento: 29/03/2022 | Data de Falecimento: 29/03/2022 | Data de Sepultamento: 29/03/2022 | Nome da Mãe: testando | Nome do Pai: testando | Sexo: Feminino | Cor/Raça: Pardo(a) | Certidão de Obito: 32434557890754323frt567 | Causa da Morte: Envenenamento | Naturalidade: Brasileiro | Estado: MA | Cidade: paulista | Bairro:  | Rua: 1ª Travessa Alterosa | Numero: 81993852234 | Observações:  | Gratuito? Sim', '127.0.0.1', '2022-03-29 10:53:12', '2022-03-29 10:53:12'),
(128, 'Exclusão', 1, 'Grupos', '#2 - Operador', 'ID: 2 | Titulo: Operador | Permissões: 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79, 80, 81, 82, 83, 84', '127.0.0.1', '2022-03-31 08:21:02', '2022-03-31 08:21:02'),
(129, 'Edição', 1, 'Grupos', '#1 - Admin', 'ID: 1 | Titulo: Admin | Permissões: 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79, 80, 81, 82, 83, 84, 85, 86, 87, 88, 89, 90, 91, 92, 93, 94', '127.0.0.1', '2022-03-31 08:21:28', '2022-03-31 08:21:28'),
(132, 'Cadastro', 1, 'Óbitos em Gavetas', '#9 - ', 'ID: 9 | Cemitério:  | Ossuário:  | Gaveta:  | Numero DAM:  | Ano DAM:  | Nome do Falecido:  | Data de Nascimento:  | Data de Falecimento:  | Data de Sepultamento:  | Nome da Mãe:  | Nome do Pai:  | Sexo:  | Cor/Raça:  | Certidão de Obito:  | Causa da Morte:  | Naturalidade:  | Estado:  | Cidade:  | Bairro:  | Rua:  | Numero:  | Observações:  | Gratuito? Não', '127.0.0.1', '2022-03-31 11:05:19', '2022-03-31 11:05:19'),
(133, 'Edição', 1, 'Óbitos em Gavetas', '#9 - ', 'ID: 9 | Cemitério:  | Ossuário:  | Gaveta:  | Numero DAM:  | Ano DAM:  | Nome do Falecido:  | Data de Nascimento:  | Data de Falecimento:  | Data de Sepultamento:  | Nome da Mãe:  | Nome do Pai:  | Sexo:  | Cor/Raça:  | Certidão de Obito:  | Causa da Morte:  | Naturalidade:  | Estado:  | Cidade:  | Bairro:  | Rua:  | Numero:  | Observações:  | Gratuito? Não', '127.0.0.1', '2022-03-31 11:07:10', '2022-03-31 11:07:10'),
(135, 'Exclusão', 1, 'Óbitos em Gavetas', '#9 - ', 'ID: 9 | Cemitério:  | Ossuário:  | Gaveta:  | Numero DAM:  | Ano DAM:  | Nome do Falecido:  | Data de Nascimento:  | Data de Falecimento:  | Data de Sepultamento:  | Nome da Mãe:  | Nome do Pai:  | Sexo:  | Cor/Raça:  | Certidão de Obito:  | Causa da Morte:  | Naturalidade:  | Estado:  | Cidade:  | Bairro:  | Rua:  | Numero:  | Observações:  | Gratuito? Não', '127.0.0.1', '2022-03-31 11:08:47', '2022-03-31 11:08:47'),
(137, 'Exclusão', 1, 'Óbitos em Gavetas', '#8 - ', 'ID: 8 | Cemitério:  | Ossuário:  | Gaveta:  | Numero DAM:  | Ano DAM:  | Nome do Falecido:  | Data de Nascimento:  | Data de Falecimento:  | Data de Sepultamento:  | Nome da Mãe:  | Nome do Pai:  | Sexo:  | Cor/Raça:  | Certidão de Obito:  | Causa da Morte:  | Naturalidade:  | Estado:  | Cidade:  | Bairro:  | Rua:  | Numero:  | Observações:  | Gratuito? Não', '127.0.0.1', '2022-03-31 11:09:00', '2022-03-31 11:09:00'),
(140, 'Cadastro', 1, 'Transf. entre lotes', '#7 - Danna Paola Maria da Silva', 'ID: 7 | Falecido: Danna Paola Maria da Silva | Tipo de Destino: Externo | Destino: cdsasxa | Data de Transferencia: 01/04/2022 | Observações: sza', '127.0.0.1', '2022-04-01 23:06:36', '2022-04-01 23:06:36'),
(142, 'Cadastro', 1, 'Transf. entre lotes', '#9 - Danna Paola Maria da Silva', 'ID: 9 | Falecido: Danna Paola Maria da Silva | Tipo de Destino: Interno | Destino: Cemitério Campo Santo São José - Lado AC - 02 - 01 | Data de Transferencia: 06/04/2022 | Observações: szasx', '127.0.0.1', '2022-04-01 23:09:32', '2022-04-01 23:09:32'),
(145, NULL, NULL, NULL, NULL, NULL, '127.0.0.1', '2022-04-02 00:44:02', '2022-04-02 00:44:02'),
(146, NULL, NULL, NULL, NULL, NULL, '127.0.0.1', '2022-04-02 00:46:50', '2022-04-02 00:46:50'),
(147, NULL, NULL, NULL, NULL, NULL, '127.0.0.1', '2022-04-02 00:48:57', '2022-04-02 00:48:57'),
(148, 'Cadastro', 1, 'Transf. lote para gaveta', '#6 - Alessandra Letícia Bernardes', 'ID: 6 | Falecido: Alessandra Letícia Bernardes | Destino: [\"Cemit\\u00e9rio Memorial Vale da Saudade\"] - [\"Ossu\\u00e1rio 3\"] - [\"02\"] | Data de Transferencia: 01/04/2022 | Observações: saZ\\ZZ', '127.0.0.1', '2022-04-02 00:48:57', '2022-04-02 00:48:57'),
(149, 'Cadastro', 1, 'Transf. gaveta para lote', '#5 - Ryan Diego Felipe Alves', 'ID: 5 | Falecido: Ryan Diego Felipe Alves | Destino: [] - [] - [] - [] | Data de Transferencia: 13/04/2022 | Observações: sa', '127.0.0.1', '2022-04-02 00:59:30', '2022-04-02 00:59:30'),
(150, 'Cadastro', 1, 'Transf. entre lotes', '#14 - Ryan Diego Felipe Alves', 'ID: 14 | Falecido: Ryan Diego Felipe Alves | Tipo de Destino: Interno | Remetente: Cemitério Campo Santo São José - Lado AC - 02 - 01 | Destino: Cemitério Campo Santo São José - Lado AC - 02 - 01 | Data de Transferencia: 10/04/2022 | Observações: vb  b', '127.0.0.1', '2022-04-02 07:21:49', '2022-04-02 07:21:49'),
(151, 'Cadastro', 1, 'Transf. entre Gavetas', '#12 - Alessandra Letícia Bernardes', 'ID: 12 | Falecido: Alessandra Letícia Bernardes | Tipo de Destino: Interno | Remetente: Cemitério Memorial Vale da Saudade - Ossuário 3 - 02 | Destino: Cemitério Memorial Vale da Saudade - Ossuário 3 - 02 | Data de Transferencia: 02/04/2022 | Observações: njbvhc bcgd', '127.0.0.1', '2022-04-02 08:00:04', '2022-04-02 08:00:04'),
(152, 'Cadastro', 1, 'Transf. entre Gavetas', '#13 - Alessandra Letícia Bernardes', 'ID: 13 | Falecido: Alessandra Letícia Bernardes | Tipo de Destino: Externo | Remetente: Cemitério Memorial Vale da Saudade - Ossuário 3 - 02 | Destino: hn   n m | Data de Transferencia: 02/04/2022 | Observações: njbvhc bcgd', '127.0.0.1', '2022-04-02 08:00:27', '2022-04-02 08:00:27'),
(153, NULL, NULL, NULL, NULL, NULL, '127.0.0.1', '2022-04-02 08:00:27', '2022-04-02 08:00:27'),
(154, NULL, NULL, NULL, NULL, NULL, '127.0.0.1', '2022-04-02 08:37:42', '2022-04-02 08:37:42'),
(155, 'Cadastro', 1, 'Transf. lote para gaveta', '#7 - Ryan Diego Felipe Alves', 'ID: 7 | Falecido: Ryan Diego Felipe Alves | Remetente: Cemitério Campo Santo São José - Lado AC - 02 - 01 | Destino: [\"Cemit\\u00e9rio Morada da Paz\"] - [\"Ossu\\u00e1rio 5\"] - [\"03\"] | Data de Transferencia: 02/04/2022 | Observações: n vvn', '127.0.0.1', '2022-04-02 08:37:42', '2022-04-02 08:37:42'),
(156, NULL, NULL, NULL, NULL, NULL, '127.0.0.1', '2022-04-02 08:38:19', '2022-04-02 08:38:19'),
(157, 'Cadastro', 1, 'Transf. lote para gaveta', '#8 - Ryan Diego Felipe Alves', 'ID: 8 | Falecido: Ryan Diego Felipe Alves | Remetente: Cemitério Campo Santo São José - Lado AC - 02 - 01 | Destino: [\"Cemit\\u00e9rio Morada da Paz\"] - [\"Ossu\\u00e1rio 5\"] - [\"03\"] | Data de Transferencia: 02/04/2022 | Observações: n vvn', '127.0.0.1', '2022-04-02 08:38:20', '2022-04-02 08:38:20'),
(158, 'Cadastro', 1, 'Transf. gaveta para lote', '#9 - Ryan Diego Felipe Alves', 'ID: 9 | Falecido: Ryan Diego Felipe Alves | Remetente: Cemitério Morada da Paz - Ossuário 5 - 03 | Destino: {\"id\":2,\"nome\":\"Cemit\\u00e9rio Memorial Vale da Saudade\",\"estado\":\"PE\",\"cidade\":\"Igarassu\",\"bairro\":\"Bonfim\",\"rua\":\"Alameda das Orqu\\u00eddeas\",\"numero\":16,\"complemento\":null,\"email\":\"memorialvale_dasaudade@gmail.com\",\"numero_de_contato\":\"(81) 99341-7556\",\"numero_de_contato_2\":\"(81) 99471-8328\",\"observacoes\":null,\"assinatura_id\":1,\"created_at\":\"2022-03-15 20:14:28\",\"updated_at\":\"2022-03-15 20:37:03\",\"deleted_at\":null} - {\"id\":5,\"indentificacao\":\"Lado B\",\"descricao\":\"Lado B do Cemiterio\",\"created_at\":\"2022-03-15 21:46:20\",\"updated_at\":\"2022-03-15 22:12:37\",\"deleted_at\":null,\"cemiterio_id\":2,\"assinatura_id\":1} - {\"id\":1,\"indentificacao\":\"01\",\"descricao\":\"Quadra 01\",\"created_at\":\"2022-03-16 20:56:41\",\"updated_at\":\"2022-03-16 20:56:41\",\"deleted_at\":null,\"cemiterio_id\":2,\"setor_id\":5,\"assinatura_id\":1} - {\"id\":2,\"indentificacao\":\"02\",\"descricao\":\"Quadra 02\",\"created_at\":\"2022-03-16 20:57:51\",\"updated_at\":\"2022-03-22 18:32:14\",\"deleted_at\":null,\"cemiterio_id\":1,\"setor_id\":1,\"assinatura_id\":1} | Data de Transferencia: 02/04/2022 | Observações: fcsadz\\ZX', '127.0.0.1', '2022-04-02 09:07:21', '2022-04-02 09:07:21');
INSERT INTO `audit_logs` (`id`, `ação`, `autor`, `local`, `registro`, `descrição`, `host`, `created_at`, `updated_at`) VALUES
(159, 'Edição', 1, 'Grupos', '#1 - Admin', 'ID: 1 | Titulo: Admin | Permissões: 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79, 80, 81, 82, 83, 84, 85, 86, 87, 88, 89, 90, 91, 92, 93, 94, 95', '127.0.0.1', '2022-04-03 00:22:22', '2022-04-03 00:22:22'),
(160, 'Cadastro', 1, 'Transf. entre lotes', '#25 - Ryan Diego Felipe Alves', 'ID: 25 | Falecido: Ryan Diego Felipe Alves | Tipo de Destino: Interno | Remetente: Cemitério Campo Santo São José - Lado B - 01 - 02 | Destino: Cemitério Memorial Vale da Saudade - Lado B - 01 - 02 | Data de Transferencia: 06/04/2022 | Observações: ', '127.0.0.1', '2022-04-06 23:03:08', '2022-04-06 23:03:08'),
(161, 'Cadastro', 2, 'Grupos', '#9 - Sub admin', 'ID: 9 | Titulo: Sub admin | Permissões: 1, 2, 3, 5, 16, 52, 68, 79, 95', '191.6.52.200', '2022-04-11 21:24:05', '2022-04-11 21:24:05'),
(162, 'Cadastro', 2, 'Usuários', '#10 - Hayssa Maria Gomes da Silva', 'ID: 10 | Nome: Hayssa Maria Gomes da Silva | Email: hayssagomes2002@gmail.com | Grupos: 1,9', '191.6.52.200', '2022-04-11 21:25:33', '2022-04-11 21:25:33'),
(163, 'Cadastro', 1, 'Cemitérios', '#7 - test', 'ID: 7 | Nome: test | Estado:  | Cidade:  | Bairro:  | Rua:  | Numero:  | Complemento:  | E-mail:  | Numero De Contato:  | Numero De Contato 2:  | Observações: ', '127.0.0.1', '2022-08-26 22:13:13', '2022-08-26 22:13:13'),
(164, 'Cadastro', 1, 'Cemitérios', '#8 - wdsec', 'ID: 8 | Nome: wdsec | Estado:  | Cidade:  | Bairro:  | Rua:  | Numero:  | Complemento:  | E-mail:  | Numero De Contato:  | Numero De Contato 2:  | Observações: ', '127.0.0.1', '2022-08-26 22:28:59', '2022-08-26 22:28:59'),
(165, 'Cadastro', 1, 'Cemitérios', '#9 - ', 'ID: 9 | Nome:  | Estado:  | Cidade:  | Bairro:  | Rua:  | Numero:  | Complemento:  | E-mail:  | Numero De Contato:  | Numero De Contato 2:  | Observações: ', '127.0.0.1', '2022-08-26 22:34:18', '2022-08-26 22:34:18'),
(166, 'Cadastro', 1, 'Cemitérios', '#10 - test', 'ID: 10 | Nome: test | Estado:  | Cidade:  | Bairro:  | Rua:  | Numero:  | Complemento:  | E-mail:  | Numero De Contato:  | Numero De Contato 2:  | Observações: ', '127.0.0.1', '2022-08-26 22:38:49', '2022-08-26 22:38:49'),
(167, 'Cadastro', 1, 'Usuários', '#11 - test', 'ID: 11 | Nome: test | Email: euissagomes@gmail.com | Grupos: 1', '127.0.0.1', '2022-08-26 22:39:55', '2022-08-26 22:39:55'),
(168, 'Cadastro', 1, 'Usuários', '#12 - fdv  f fd', 'ID: 12 | Nome: fdv  f fd | Email: euissagdomes@gmail.com | Grupos: 1', '127.0.0.1', '2022-08-26 22:42:09', '2022-08-26 22:42:09'),
(169, 'Cadastro', 1, 'Usuários', '#13 - gvtef', 'ID: 13 | Nome: gvtef | Email: hayssagovmes2002@gmail.com | Grupos: 1', '127.0.0.1', '2022-08-26 22:42:52', '2022-08-26 22:42:52'),
(170, 'Cadastro', 1, 'Cemitérios', '#11 - test', 'ID: 11 | Nome: test | Estado:  | Cidade:  | Bairro:  | Rua:  | Numero:  | Complemento:  | E-mail:  | Numero De Contato:  | Numero De Contato 2:  | Observações: ', '127.0.0.1', '2022-08-26 22:49:20', '2022-08-26 22:49:20'),
(171, 'Edição', 1, 'Cemitérios', '#6 - Cemitério Morada da Paz', 'ID: 6 | Nome: Cemitério Morada da Paz | Estado: PE | Cidade: Paulista | Bairro: Vila Torres Galvão | Rua: Avenida Rodolfo Aureliano | Numero: 21 | Complemento:  | E-mail: morada_da_paz@paulista.com | Numero De Contato: (81) 3920-4219 | Numero De Contato 2: (81) 93426217 | Observações: ', '127.0.0.1', '2022-08-26 22:53:40', '2022-08-26 22:53:40'),
(172, 'Edição', 1, 'Cemitérios', '#2 - Cemitério Memorial Vale da Saudade', 'ID: 2 | Nome: Cemitério Memorial Vale da Saudade | Estado: PE | Cidade: Igarassu | Bairro: Bonfim | Rua: Alameda das Orquídeas | Numero: 16 | Complemento:  | E-mail: memorialvale_dasaudade@gmail.com | Numero De Contato: (81) 99341-7556 | Numero De Contato 2: (81) 99471-8328 | Observações: ', '127.0.0.1', '2022-08-26 23:07:37', '2022-08-26 23:07:37'),
(173, 'Edição', 1, 'Cemitérios', '#1 - Cemitério Campo Santo São José', 'ID: 1 | Nome: Cemitério Campo Santo São José | Estado: PE | Cidade: Paulista | Bairro: Artur Lundgren I | Rua: Rodovia PE-15 - do km 17,055 ao km 18,001 - lado ímpar | Numero: 23 | Complemento:  | E-mail: campo_santo_sao_jose@cemiterio.com | Numero De Contato: 81993852292 | Numero De Contato 2: 8193426217 | Observações: ', '127.0.0.1', '2022-08-26 23:07:53', '2022-08-26 23:07:53'),
(174, 'Exclusão', 1, 'Cemitérios', '#6 - Cemitério Morada da Paz', 'ID: 6 | Nome: Cemitério Morada da Paz | Estado: PE | Cidade: Paulista | Bairro: Vila Torres Galvão | Rua: Avenida Rodolfo Aureliano | Numero: 21 | Complemento:  | E-mail: morada_da_paz@paulista.com | Numero De Contato: (81) 3920-4219 | Numero De Contato 2: (81) 93426217 | Observações: ', '127.0.0.1', '2022-08-27 02:29:30', '2022-08-27 02:29:30'),
(175, 'Edição', 1, 'Cemitérios', '#6 - Cemitério Morada da Paz', 'ID: 6 | Nome: Cemitério Morada da Paz | Estado: PE | Cidade: Paulista | Bairro: Vila Torres Galvão | Rua: Avenida Rodolfo Aureliano | Numero: 21 | Complemento:  | E-mail: morada_da_paz@paulista.com | Numero De Contato: (81) 3920-4219 | Numero De Contato 2: (81) 93426217 | Observações: ', '127.0.0.1', '2022-08-27 02:34:35', '2022-08-27 02:34:35'),
(176, 'Edição', 1, 'Cemitérios', '#6 - Cemitério Morada da Paz', 'ID: 6 | Nome: Cemitério Morada da Paz | Estado: PE | Cidade: Paulista | Bairro: Vila Torres Galvão | Rua: Avenida Rodolfo Aureliano | Numero: 21 | Complemento:  | E-mail: morada_da_paz@paulista.com | Numero De Contato: (81) 3920-4219 | Numero De Contato 2: (81) 93426217 | Observações: ', '127.0.0.1', '2022-08-27 02:37:21', '2022-08-27 02:37:21'),
(177, 'Edição', 1, 'Cemitérios', '#1 - Cemitério Campo Santo São José', 'ID: 1 | Nome: Cemitério Campo Santo São José | Estado: PE | Cidade: Paulista | Bairro: Artur Lundgren I | Rua: Rodovia PE-15 - do km 17,055 ao km 18,001 - lado ímpar | Numero: 23 | Complemento:  | E-mail: campo_santo_sao_jose@cemiterio.com | Numero De Contato: 81993852292 | Numero De Contato 2: 8193426217 | Observações: ', '127.0.0.1', '2022-08-27 02:38:03', '2022-08-27 02:38:03'),
(178, 'Edição', 1, 'Lotes', '#2 - 03', 'ID: 2 | Cemitério: Cemitério Morada da Paz | Setor: Lado AB | Quadra: 03 | Tipo de Lote: Estaca | Comprimento: 33 | Altura: 19 | Indentificação: 03 | Descrição:  | Lote Vazio? Sim | Reservado? Sim', '127.0.0.1', '2022-08-27 06:52:32', '2022-08-27 06:52:32'),
(179, 'Edição', 1, 'Lotes', '#2 - 03', 'ID: 2 | Cemitério: Cemitério Morada da Paz | Setor: Lado AB | Quadra: 03 | Tipo de Lote: Estaca | Comprimento: 33 | Altura: 19 | Indentificação: 03 | Descrição:  | Lote Vazio? Sim | Reservado? Sim', '127.0.0.1', '2022-08-27 06:52:45', '2022-08-27 06:52:45'),
(180, 'Cadastro', 1, 'Lotes', '#3 - ', 'ID: 3 | Cemitério: Cemitério Memorial Vale da Saudade | Setor: Lado B | Quadra: 01 | Tipo de Lote: Capela | Comprimento:  | Altura:  | Indentificação:  | Descrição:  | Lote Vazio? Não | Reservado? Não', '127.0.0.1', '2022-08-27 06:58:49', '2022-08-27 06:58:49'),
(181, 'Edição', 1, 'Lotes', '#3 - 02', 'ID: 3 | Cemitério: Cemitério Memorial Vale da Saudade | Setor: Lado B | Quadra: 01 | Tipo de Lote: Capela | Comprimento:  | Altura:  | Indentificação: 02 | Descrição:  | Lote Vazio? Sim | Reservado? Sim', '127.0.0.1', '2022-08-27 06:59:05', '2022-08-27 06:59:05'),
(182, 'Edição', 1, 'Lotes', '#3 - 02', 'ID: 3 | Cemitério: Cemitério Morada da Paz | Setor: Lado AB | Quadra: 03 | Tipo de Lote: Capela | Comprimento:  | Altura:  | Indentificação: 02 | Descrição:  | Lote Vazio? Sim | Reservado? Sim', '127.0.0.1', '2022-08-27 07:03:53', '2022-08-27 07:03:53'),
(183, 'Cadastro', 1, 'Lotes', '#4 - lote 04', 'ID: 4 | Cemitério: Cemitério Memorial Vale da Saudade | Setor: Lado B | Quadra: 01 | Tipo de Lote: Capela | Comprimento: 34 | Altura: 32 | Indentificação: lote 04 | Descrição: test | Lote Vazio? Sim | Reservado? Não', '127.0.0.1', '2022-08-29 03:58:19', '2022-08-29 03:58:19'),
(184, 'Exclusão', 1, 'Lotes', '#4 - lote 04', 'ID: 4 | Cemitério: Cemitério Memorial Vale da Saudade | Setor: Lado B | Quadra: 01 | Tipo de Lote: Capela | Comprimento: 34 | Altura: 32 | Indentificação: lote 04 | Descrição: test | Lote Vazio? Sim | Reservado? Não', '127.0.0.1', '2022-08-29 04:36:25', '2022-08-29 04:36:25'),
(185, 'Cadastro', 1, 'Transf. entre lotes', '#26 - Ryan Diego Felipe Alves', 'ID: 26 | Falecido: Ryan Diego Felipe Alves | Tipo de Destino: Interno | Remetente: Cemitério Memorial Vale da Saudade - Lado B - 01 - 02 | Destino: Cemitério Morada da Paz - Lado AB - 03 - 02 | Data de Transferencia: 23/07/2023 | Observações: ', '127.0.0.1', '2023-07-24 02:53:48', '2023-07-24 02:53:48'),
(186, 'Cadastro', 1, 'Transf. entre lotes', '#35 - Sara Heloise Renata Caldeira', 'ID: 35 | Falecido: Sara Heloise Renata Caldeira | Tipo de Destino: Interno | Remetente: Cemitério Memorial Vale da Saudade - Lado AB - 02 - lote 03 | Destino: Cemitério Morada da Paz - Lado AB - 03 - lote 03 | Data de Transferencia:  | Observações: ', '127.0.0.1', '2023-07-24 03:04:54', '2023-07-24 03:04:54'),
(187, 'Cadastro', 1, 'Transf. entre lotes', '#36 - Ryan Diego Felipe Alves', 'ID: 36 | Falecido: Ryan Diego Felipe Alves | Tipo de Destino: Interno | Remetente: Cemitério Morada da Paz - Lado AB - 03 - lote 03 | Destino: Cemitério Morada da Paz - Lado AB - 03 - lote 09 | Data de Transferencia:  | Observações: ', '127.0.0.1', '2023-07-24 03:06:31', '2023-07-24 03:06:31');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cemiterios`
--

DROP TABLE IF EXISTS `cemiterios`;
CREATE TABLE IF NOT EXISTS `cemiterios` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cidade` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bairro` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rua` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero` int DEFAULT NULL,
  `complemento` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero_de_contato` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero_de_contato_2` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `observacoes` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `assinatura_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `assinatura_fk_6191956` (`assinatura_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `cemiterios`
--

INSERT INTO `cemiterios` (`id`, `nome`, `estado`, `cidade`, `bairro`, `rua`, `numero`, `complemento`, `email`, `numero_de_contato`, `numero_de_contato_2`, `observacoes`, `assinatura_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Cemitério Campo Santo São José', 'PE', 'Paulista', 'Artur Lundgren I', 'Rodovia PE-15 - do km 17,055 ao km 18,001 - lado ímpar', 23, NULL, 'campo_santo_sao_jose@cemiterio.com', '81993852292', '8193426217', NULL, 1, '2022-03-15 21:47:33', '2022-03-15 21:47:33', NULL),
(2, 'Cemitério Memorial Vale da Saudade', 'PE', 'Igarassu', 'Bonfim', 'Alameda das Orquídeas', 16, NULL, 'memorialvale_dasaudade@gmail.com', '(81) 99341-7556', '(81) 99471-8328', NULL, 1, '2022-03-15 23:14:28', '2022-03-15 23:37:03', NULL),
(6, 'Cemitério Morada da Paz', 'PE', 'Paulista', 'Vila Torres Galvão', 'Avenida Rodolfo Aureliano', 21, NULL, 'morada_da_paz@paulista.com', '(81) 3920-4219', '(81) 93426217', NULL, 1, '2022-03-15 23:31:59', '2022-08-27 02:29:30', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `compra_de_lotes`
--

DROP TABLE IF EXISTS `compra_de_lotes`;
CREATE TABLE IF NOT EXISTS `compra_de_lotes` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `numero_dam` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ano_dam` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_da_aquisicao` date DEFAULT NULL,
  `observacoes` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `responsavel_id` bigint UNSIGNED DEFAULT NULL,
  `assinatura_id` bigint UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `falecido_fk_6192106` (`responsavel_id`),
  KEY `assinatura_fk_6192111` (`assinatura_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `compra_de_lotes`
--

INSERT INTO `compra_de_lotes` (`id`, `numero_dam`, `ano_dam`, `data_da_aquisicao`, `observacoes`, `created_at`, `updated_at`, `deleted_at`, `responsavel_id`, `assinatura_id`) VALUES
(8, '4235323t443', '34544743', '2022-05-26', 'r4fgt55yg4tfredws', '2022-03-29 10:24:27', '2022-03-29 10:24:27', NULL, 1, 1),
(9, '4235323t443', '34544743', '2022-03-29', 'cewdqd', '2022-03-29 10:26:30', '2022-03-29 10:26:30', NULL, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `entre_gavetas`
--

DROP TABLE IF EXISTS `entre_gavetas`;
CREATE TABLE IF NOT EXISTS `entre_gavetas` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `responsavel_id` bigint UNSIGNED DEFAULT NULL,
  `responsavel_nome` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `falecido_id` bigint UNSIGNED DEFAULT NULL,
  `falecido_nome` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cemiterio_id` bigint UNSIGNED DEFAULT NULL,
  `ossuario_id` bigint UNSIGNED DEFAULT NULL,
  `gaveta_id` bigint UNSIGNED DEFAULT NULL,
  `tipo_de_destino` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `destino` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cemiterio_de_destino_id` bigint UNSIGNED DEFAULT NULL,
  `ossuario_de_destino_id` bigint UNSIGNED DEFAULT NULL,
  `gaveta_de_destino_id` bigint DEFAULT NULL,
  `data_de_transferencia` date DEFAULT NULL,
  `observacoes` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `assinatura_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `responsavel_fk_6313842` (`responsavel_id`),
  KEY `falecido_fk_6313843` (`falecido_id`),
  KEY `cemiterio_fk_6313844` (`cemiterio_id`),
  KEY `ossuario_fk_6313845` (`ossuario_id`),
  KEY `gaveta_fk_6313846` (`gaveta_id`),
  KEY `cemiterio_de_destino_fk_6313849` (`cemiterio_de_destino_id`),
  KEY `ossuario_de_destino_fk_6313850` (`ossuario_de_destino_id`),
  KEY `assinatura_fk_6313877` (`assinatura_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `entre_gavetas`
--

INSERT INTO `entre_gavetas` (`id`, `responsavel_id`, `responsavel_nome`, `falecido_id`, `falecido_nome`, `cemiterio_id`, `ossuario_id`, `gaveta_id`, `tipo_de_destino`, `destino`, `cemiterio_de_destino_id`, `ossuario_de_destino_id`, `gaveta_de_destino_id`, `data_de_transferencia`, `observacoes`, `assinatura_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(12, 1, 'Eliane Juliana Ana Silveira', 12, 'Alessandra Letícia Bernardes', 2, 3, 1, 'Interno', NULL, 2, 3, 1, '2022-04-02', 'njbvhc bcgd', 1, '2022-04-02 08:00:03', '2022-04-02 08:00:03', NULL),
(13, 1, 'Eliane Juliana Ana Silveira', 12, 'Alessandra Letícia Bernardes', 2, 3, 1, 'Externo', 'hn   n m', NULL, NULL, NULL, '2022-04-02', 'njbvhc bcgd', 1, '2022-04-02 08:00:27', '2022-04-02 08:00:27', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `entre_lotes`
--

DROP TABLE IF EXISTS `entre_lotes`;
CREATE TABLE IF NOT EXISTS `entre_lotes` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `responsavel_id` bigint UNSIGNED DEFAULT NULL,
  `responsavel_nome` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `falecido_id` bigint UNSIGNED DEFAULT NULL,
  `falecido_nome` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cemiterio_id` bigint UNSIGNED DEFAULT NULL,
  `setor_id` bigint UNSIGNED DEFAULT NULL,
  `quadra_id` bigint UNSIGNED DEFAULT NULL,
  `lote_id` bigint UNSIGNED DEFAULT NULL,
  `tipo_de_destino` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `destino` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cemiterio_destino_id` bigint UNSIGNED DEFAULT NULL,
  `setor_destino_id` bigint UNSIGNED DEFAULT NULL,
  `lote_destino_id` bigint UNSIGNED DEFAULT NULL,
  `quadra_destino_id` bigint UNSIGNED DEFAULT NULL,
  `data_de_transferencia` date DEFAULT NULL,
  `observacoes` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `assinatura_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `solicitante_fk_6192168` (`responsavel_id`),
  KEY `falecido_fk_6192170` (`falecido_id`),
  KEY `cemiterio_fk_6192172` (`cemiterio_id`),
  KEY `setor_fk_6192174` (`setor_id`),
  KEY `quadra_fk_6192175` (`quadra_id`),
  KEY `lote_fk_6192176` (`lote_id`),
  KEY `cemiterio_destino_fk_6192179` (`cemiterio_destino_id`),
  KEY `setor_destino_fk_6192180` (`setor_destino_id`),
  KEY `quadra_destino_fk_6192181` (`quadra_destino_id`),
  KEY `lote_destino_fk_6192182` (`lote_destino_id`),
  KEY `assinatura_fk_6192185` (`assinatura_id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `entre_lotes`
--

INSERT INTO `entre_lotes` (`id`, `responsavel_id`, `responsavel_nome`, `falecido_id`, `falecido_nome`, `cemiterio_id`, `setor_id`, `quadra_id`, `lote_id`, `tipo_de_destino`, `destino`, `cemiterio_destino_id`, `setor_destino_id`, `lote_destino_id`, `quadra_destino_id`, `data_de_transferencia`, `observacoes`, `assinatura_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(19, 1, 'Eliane Juliana Ana Silveira', 12, 'Ryan Diego Felipe Alves', 1, 5, 1, 2, 'Externo', 'Cemiterio no exterior', NULL, NULL, NULL, NULL, '2022-04-06', NULL, 1, '2022-04-06 22:58:58', '2022-04-06 22:58:58', NULL),
(18, 1, 'Eliane Juliana Ana Silveira', 12, 'Ryan Diego Felipe Alves', 1, 5, 1, 2, 'Interno', NULL, 2, 5, 2, 1, '2022-04-06', NULL, 1, '2022-04-06 22:58:11', '2022-04-06 22:58:11', NULL),
(26, 1, 'Eliane Juliana Ana Silveira', 12, 'Ryan Diego Felipe Alves', 2, 5, 1, 2, 'Interno', NULL, 6, 3, 2, 4, '2023-07-23', NULL, 1, '2023-07-24 02:53:48', '2023-07-24 02:53:48', NULL),
(27, 1, 'Eliane Juliana Ana Silveira', 2, 'Sara Heloise Renata Caldeira', 2, 3, 2, 2, 'Interno', NULL, 6, 3, 3, 4, NULL, NULL, 1, '2023-07-24 02:54:25', '2023-07-24 02:54:25', NULL),
(28, 1, 'Eliane Juliana Ana Silveira', 2, 'Sara Heloise Renata Caldeira', 2, 3, 2, 2, 'Interno', NULL, 6, 3, 3, 4, '2023-07-23', NULL, 1, '2023-07-24 02:54:34', '2023-07-24 02:54:34', NULL),
(29, 1, 'Eliane Juliana Ana Silveira', 2, 'Sara Heloise Renata Caldeira', 2, 3, 2, 2, 'Interno', NULL, 6, 3, 3, 4, '2023-07-23', NULL, 1, '2023-07-24 02:57:08', '2023-07-24 02:57:08', NULL),
(30, 1, 'Eliane Juliana Ana Silveira', 2, 'Sara Heloise Renata Caldeira', 2, 3, 2, 2, 'Interno', NULL, 6, 3, 3, 4, '2023-07-23', NULL, 1, '2023-07-24 02:57:57', '2023-07-24 02:57:57', NULL),
(31, 1, 'Eliane Juliana Ana Silveira', 2, 'Sara Heloise Renata Caldeira', 2, 3, 2, 2, 'Interno', NULL, 6, 3, 3, 4, '2023-07-23', NULL, 1, '2023-07-24 03:00:59', '2023-07-24 03:00:59', NULL),
(32, 1, 'Eliane Juliana Ana Silveira', 2, 'Sara Heloise Renata Caldeira', 2, 3, 2, 2, 'Interno', NULL, 6, 3, 3, 4, '2023-07-23', NULL, 1, '2023-07-24 03:01:46', '2023-07-24 03:01:46', NULL),
(33, 1, 'Eliane Juliana Ana Silveira', 2, 'Sara Heloise Renata Caldeira', 2, 3, 2, 2, 'Interno', NULL, 6, 3, 3, 4, '2023-07-23', NULL, 1, '2023-07-24 03:02:03', '2023-07-24 03:02:03', NULL),
(34, 1, 'Eliane Juliana Ana Silveira', 2, 'Sara Heloise Renata Caldeira', 2, 3, 2, 2, 'Interno', NULL, 6, 3, 3, 4, '2023-07-23', NULL, 1, '2023-07-24 03:03:40', '2023-07-24 03:03:40', NULL),
(35, 1, 'Eliane Juliana Ana Silveira', 2, 'Sara Heloise Renata Caldeira', 2, 3, 2, 2, 'Interno', NULL, 6, 3, 2, 4, NULL, NULL, 1, '2023-07-24 03:04:54', '2023-07-24 03:04:54', NULL),
(36, 1, 'Eliane Juliana Ana Silveira', 12, 'Ryan Diego Felipe Alves', 6, 3, 4, 2, 'Interno', NULL, 6, 3, 3, 4, NULL, NULL, 1, '2023-07-24 03:06:31', '2023-07-24 03:06:31', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `gaveta`
--

DROP TABLE IF EXISTS `gaveta`;
CREATE TABLE IF NOT EXISTS `gaveta` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `indentificacao` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descricao` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gaveta_vazia` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'Não',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `cemiterio_id` bigint UNSIGNED DEFAULT NULL,
  `ossuario_id` bigint UNSIGNED DEFAULT NULL,
  `assinatura_id` bigint UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cemiterio_fk_6192001` (`cemiterio_id`),
  KEY `ossuario_fk_6192002` (`ossuario_id`),
  KEY `assinatura_fk_6192006` (`assinatura_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `gaveta`
--

INSERT INTO `gaveta` (`id`, `indentificacao`, `descricao`, `gaveta_vazia`, `created_at`, `updated_at`, `deleted_at`, `cemiterio_id`, `ossuario_id`, `assinatura_id`) VALUES
(1, '02', 'Gaveta test 02', 'Não', '2022-03-17 01:33:05', '2022-03-17 01:34:45', NULL, 1, 1, 1),
(2, '01', 'Gaveta test 01', 'Sim', '2022-03-17 01:33:45', '2022-03-17 01:35:16', NULL, 1, 1, 1),
(3, '03', NULL, 'Sim', '2022-03-22 22:45:34', '2022-03-22 22:45:34', NULL, 6, 5, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `lotes`
--

DROP TABLE IF EXISTS `lotes`;
CREATE TABLE IF NOT EXISTS `lotes` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tipo_de_lote` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comprimento` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `altura` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `indentificacao` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descricao` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lote_vazio` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'Não',
  `reservado` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'Não',
  `map_lat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_long` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cemiterio_id` bigint UNSIGNED DEFAULT NULL,
  `setor_id` bigint UNSIGNED DEFAULT NULL,
  `quadra_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `assinatura_id` bigint UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cemiterio_fk_6191978` (`cemiterio_id`),
  KEY `setor_fk_6191979` (`setor_id`),
  KEY `quadra_fk_6191980` (`quadra_id`),
  KEY `assinatura_fk_6191988` (`assinatura_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `lotes`
--

INSERT INTO `lotes` (`id`, `tipo_de_lote`, `comprimento`, `altura`, `indentificacao`, `descricao`, `lote_vazio`, `reservado`, `map_lat`, `map_long`, `cemiterio_id`, `setor_id`, `quadra_id`, `created_at`, `updated_at`, `deleted_at`, `assinatura_id`) VALUES
(1, 'Capela', '30', '20', 'lote 02', 'Lorem ipsum convallis lorem aliquam tempor placerat interdum dapibus donec elementum, sapien egestas lobortis tellus mattis velit commodo sem lobortis. ', 'Sim', 'Sim', '69.33', '38.12', 6, 1, 2, '2022-03-17 00:32:29', '2023-09-09 18:55:05', NULL, 1),
(2, 'Estaca', '33', '19', 'lote 03', 'Lorem ipsum sodales tellus vestibulum habitasse, ipsum cras varius ut nibh, lectus aptent mollis a. ', 'Sim', 'Sim', '69.16', '33.02', 6, 3, 4, '2022-03-17 00:34:19', '2023-09-09 18:55:05', NULL, 1),
(3, 'Capela', '34', NULL, 'lote 09', '	Lorem ipsum conubia posuere fringilla cras, magna placerat senectus tortor. ', 'Sim', 'Sim', '92.01', '40.81', 6, 3, 4, '2022-08-27 06:58:49', '2023-09-09 18:55:05', NULL, 1),
(4, 'Capela', '34', '32', 'lote 04', 'Lorem ipsum porttitor, sed', 'Sim', 'Não', '46.39', '31.54', 2, 5, 1, '2022-08-29 03:58:19', '2023-07-14 22:56:36', NULL, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `media`
--

DROP TABLE IF EXISTS `media`;
CREATE TABLE IF NOT EXISTS `media` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `model_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  `uuid` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint UNSIGNED NOT NULL,
  `manipulations` json NOT NULL,
  `custom_properties` json NOT NULL,
  `generated_conversions` json NOT NULL,
  `responsive_images` json NOT NULL,
  `order_column` int UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `media_uuid_unique` (`uuid`),
  KEY `media_model_type_model_id_index` (`model_type`,`model_id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `media`
--

INSERT INTO `media` (`id`, `model_type`, `model_id`, `uuid`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `conversions_disk`, `size`, `manipulations`, `custom_properties`, `generated_conversions`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\Recadastramento', 1, '63a5a57e-6a57-4487-b912-ca2187e7b206', 'anexos', '623277cd16949_cropped-favicon-1-180x180', '623277cd16949_cropped-favicon-1-180x180.png', 'image/png', 'public', 'public', 405789, '[]', '[]', '{\"thumb\": true, \"preview\": true}', '[]', 1, '2022-03-17 02:56:27', '2022-03-17 02:56:31'),
(8, 'App\\Models\\ObitosOssuario', 1, 'b5cbc1b7-bcde-417f-8a38-847fae3b8a46', 'anexos', '623d55bd80119_APRESENTAÇÃO_SJC (10)', '623d55bd80119_APRESENTAÇÃO_SJC-(10).pdf', 'application/pdf', 'public', 'public', 923179, '[]', '[]', '[]', '[]', 3, '2022-03-25 08:41:16', '2022-03-25 08:41:16'),
(7, 'App\\Models\\User', 1, 'd86bd2b2-1777-493a-90e8-1bec032cb3f0', 'foto_de_perfil', '623692496cc5b_system-administrator-software-developer-working-on-laptop-computer-in-vector-id1296795051', '623692496cc5b_system-administrator-software-developer-working-on-laptop-computer-in-vector-id1296795051.jpg', 'image/jpeg', 'public', 'public', 72400, '[]', '[]', '{\"thumb\": true, \"preview\": true}', '[]', 2, '2022-03-20 05:32:46', '2022-03-20 05:32:48'),
(11, 'App\\Models\\User', 2, '435678ee-5b6d-4b34-9d53-ee93d618a057', 'foto_de_perfil', '624fe24c5f348_20022554', '624fe24c5f348_20022554.jpg', 'image/jpeg', 'public', 'public', 89510, '[]', '[]', '{\"thumb\": true, \"preview\": true}', '[]', 4, '2022-04-08 10:20:48', '2022-04-08 10:20:48'),
(12, 'App\\Models\\Cemiterio', 7, 'b2ff9105-a939-41f5-a1e0-b37a54537259', 'foto_do_cemiterio', '63091b3eb54ab_moedas', '63091b3eb54ab_moedas.jpg', 'image/jpeg', 'public', 'public', 338142, '[]', '[]', '{\"thumb\": true, \"preview\": true}', '[]', 5, '2022-08-26 22:13:10', '2022-08-26 22:13:13'),
(13, 'App\\Models\\Cemiterio', 8, 'f7fb027c-3275-4b3f-99f2-c4d70afe2ab2', 'foto_do_cemiterio', '63091ef601a3e_stock-vector-halloween-icon-vector-illustration-funeral-gravestone-flat-design-trendy-style-1837321012', '63091ef601a3e_stock-vector-halloween-icon-vector-illustration-funeral-gravestone-flat-design-trendy-style-1837321012.jpg', 'image/jpeg', 'public', 'public', 258145, '[]', '[]', '{\"thumb\": true, \"preview\": true}', '[]', 6, '2022-08-26 22:28:56', '2022-08-26 22:28:58'),
(14, 'App\\Models\\Cemiterio', 10, '4cbe8387-3c66-4264-a699-33bb8068d589', 'foto_do_cemiterio', '630921429173d_stock-vector-halloween-icon-vector-illustration-funeral-gravestone-flat-design-trendy-style-1837321012', '630921429173d_stock-vector-halloween-icon-vector-illustration-funeral-gravestone-flat-design-trendy-style-1837321012.jpg', 'image/jpeg', 'public', 'public', 258145, '[]', '[]', '{\"thumb\": true, \"preview\": true}', '[]', 7, '2022-08-26 22:38:47', '2022-08-26 22:38:49'),
(15, 'App\\Models\\User', 11, '07d843c5-1787-4fc3-809e-0ad2137d9bc7', 'foto_de_perfil', '6309217a43f4a_stock-vector-halloween-icon-vector-illustration-funeral-gravestone-flat-design-trendy-style-1837321012', '6309217a43f4a_stock-vector-halloween-icon-vector-illustration-funeral-gravestone-flat-design-trendy-style-1837321012.jpg', 'image/jpeg', 'public', 'public', 258145, '[]', '[]', '{\"thumb\": true, \"preview\": true}', '[]', 8, '2022-08-26 22:39:53', '2022-08-26 22:39:55'),
(16, 'App\\Models\\User', 13, '4b8cd1b3-d284-4f09-8fc9-ab4ed78f161b', 'foto_de_perfil', '6309223376d2f_exemple', '6309223376d2f_exemple.jpg', 'image/jpeg', 'public', 'public', 138540, '[]', '[]', '{\"thumb\": true, \"preview\": true}', '[]', 9, '2022-08-26 22:42:51', '2022-08-26 22:42:52'),
(17, 'App\\Models\\Cemiterio', 11, '2dd2fba6-dc29-4a63-b051-a5a00ace3f84', 'foto_do_cemiterio', '630923ba5f547_exemple', '630923ba5f547_exemple.jpg', 'image/jpeg', 'public', 'public', 138540, '[]', '[]', '{\"thumb\": true, \"preview\": true}', '[]', 10, '2022-08-26 22:49:19', '2022-08-26 22:49:20'),
(21, 'App\\Models\\Cemiterio', 6, 'd4c45bd9-d28a-48d0-bfa5-54f641a8fcfc', 'foto_do_cemiterio', '6309590510585_exemple', '6309590510585_exemple.jpg', 'image/jpeg', 'public', 'public', 138540, '[]', '[]', '{\"thumb\": true, \"preview\": true}', '[]', 14, '2022-08-27 02:37:20', '2022-08-27 02:37:21'),
(19, 'App\\Models\\Cemiterio', 2, '2d3966ec-0a40-4c8d-aa09-0e442db9e7e9', 'foto_do_cemiterio', '6309280615ef1_cemiterio-desterro1', '6309280615ef1_cemiterio-desterro1.jpg', 'image/jpeg', 'public', 'public', 252113, '[]', '[]', '{\"thumb\": true, \"preview\": true}', '[]', 12, '2022-08-26 23:07:36', '2022-08-26 23:07:37');

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2022_03_12_000001_create_audit_logs_table', 1),
(4, '2022_03_12_000002_create_media_table', 1),
(5, '2022_03_12_000003_create_permissions_table', 1),
(6, '2022_03_12_000004_create_roles_table', 1),
(7, '2022_03_12_000005_create_users_table', 1),
(8, '2022_03_12_000006_create_cemiterios_table', 1),
(9, '2022_03_12_000007_create_setores_table', 1),
(10, '2022_03_12_000008_create_quadras_table', 1),
(11, '2022_03_12_000009_create_lotes_table', 1),
(12, '2022_03_12_000010_create_ossuarios_table', 1),
(13, '2022_03_12_000011_create_gaveta_table', 1),
(14, '2022_03_12_000012_create_solicitantes_table', 1),
(15, '2022_03_12_000013_create_obitos_table', 1),
(16, '2022_03_12_000014_create_compra_de_lotes_table', 1),
(17, '2022_03_12_000015_create_recadastramentos_table', 1),
(18, '2022_03_12_000016_create_entre_lotes_table', 1),
(19, '2022_03_12_000017_create_para_ossuarios_table', 1),
(20, '2022_03_12_000018_create_permission_role_pivot_table', 1),
(21, '2022_03_12_000019_create_role_user_pivot_table', 1),
(22, '2022_03_12_000020_add_relationship_fields_to_users_table', 1),
(23, '2022_03_12_000021_add_relationship_fields_to_cemiterios_table', 1),
(24, '2022_03_12_000022_add_relationship_fields_to_setores_table', 1),
(25, '2022_03_12_000023_add_relationship_fields_to_quadras_table', 1),
(26, '2022_03_12_000024_add_relationship_fields_to_lotes_table', 1),
(27, '2022_03_12_000025_add_relationship_fields_to_ossuarios_table', 1),
(28, '2022_03_12_000026_add_relationship_fields_to_gaveta_table', 1),
(29, '2022_03_12_000027_add_relationship_fields_to_solicitantes_table', 1),
(30, '2022_03_12_000028_add_relationship_fields_to_obitos_table', 1),
(31, '2022_03_12_000029_add_relationship_fields_to_compra_de_lotes_table', 1),
(32, '2022_03_12_000030_add_relationship_fields_to_recadastramentos_table', 1),
(33, '2022_03_12_000031_add_relationship_fields_to_entre_lotes_table', 1),
(34, '2022_03_12_000032_add_relationship_fields_to_para_ossuarios_table', 1),
(35, '2022_03_29_000019_create_entre_ossuarios_table', 2),
(36, '2022_03_29_000020_create_para_lotes_table', 2),
(37, '2022_03_29_000023_create_entre_ossuario_gavetum_pivot_table', 2),
(38, '2022_03_29_000024_create_para_lote_quadra_pivot_table', 2),
(39, '2022_03_29_000039_add_relationship_fields_to_entre_ossuarios_table', 2),
(40, '2022_03_29_000040_add_relationship_fields_to_para_lotes_table', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `obitos`
--

DROP TABLE IF EXISTS `obitos`;
CREATE TABLE IF NOT EXISTS `obitos` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `numero_dam` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ano_dam` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nome_do_falecido` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_de_nascimento` date DEFAULT NULL,
  `data_de_falecimento` date DEFAULT NULL,
  `data_de_sepultamento` date DEFAULT NULL,
  `nome_da_mae` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nome_do_pai` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sexo` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cor_raca` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `certidao_de_obito` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causa_da_morte` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `naturalidade` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cidade` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bairro` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rua` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `observacoes` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `situacao` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'Ativo',
  `gratuito` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'Não',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `responsavel_id` bigint UNSIGNED DEFAULT NULL,
  `cemiterio_id` bigint UNSIGNED DEFAULT NULL,
  `setor_id` bigint UNSIGNED DEFAULT NULL,
  `quadra_id` bigint UNSIGNED DEFAULT NULL,
  `lote_id` bigint UNSIGNED DEFAULT NULL,
  `assinatura_id` bigint UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `solicitante_fk_6192073` (`responsavel_id`),
  KEY `cemiterio_fk_6192075` (`cemiterio_id`),
  KEY `setor_fk_6192076` (`setor_id`),
  KEY `quadra_fk_6192077` (`quadra_id`),
  KEY `lote_fk_6192078` (`lote_id`),
  KEY `assinatura_fk_6192101` (`assinatura_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `obitos`
--

INSERT INTO `obitos` (`id`, `numero_dam`, `ano_dam`, `nome_do_falecido`, `data_de_nascimento`, `data_de_falecimento`, `data_de_sepultamento`, `nome_da_mae`, `nome_do_pai`, `sexo`, `cor_raca`, `certidao_de_obito`, `causa_da_morte`, `naturalidade`, `estado`, `cidade`, `bairro`, `rua`, `numero`, `observacoes`, `situacao`, `gratuito`, `created_at`, `updated_at`, `deleted_at`, `responsavel_id`, `cemiterio_id`, `setor_id`, `quadra_id`, `lote_id`, `assinatura_id`) VALUES
(2, '4235323t45', 'dr45t5y532', 'Sara Heloise Renata Caldeira', '1959-01-06', '2022-03-07', '2022-03-14', 'Olivia Emanuelly', 'César Iago Caldeira', 'Feminino', 'Negro/a', '32434557890754323frt567', 'Infarto', 'Brasileiro', 'PE', 'Recife', 'Linha do Tiro', '1ª Travessa Alterosa', '312', 'ww', 'Ativo', 'Sim', '2022-03-17 02:38:56', '2023-07-24 03:04:54', NULL, 1, 6, 3, 4, 2, 1),
(12, '7543213457', '2009', 'Ryan Diego Felipe Alves', '1956-02-20', '2018-07-13', '2019-01-09', 'Marlene Giovana', 'Benjamin Ricardo Vicente Alves', 'Masculino', 'Pardo/a', '5890338901', 'Acidente', 'Brasileiro', 'PE', 'Recife', 'Linha do Tiro', 'Alameda das Orquídeas', '21', 'test', 'Ativo', 'Sim', '2022-04-02 09:07:20', '2023-07-24 03:06:31', NULL, 1, 6, 3, 4, 3, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `obitos_gaveta`
--

DROP TABLE IF EXISTS `obitos_gaveta`;
CREATE TABLE IF NOT EXISTS `obitos_gaveta` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `numero_dam` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ano_dam` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nome_do_falecido` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_de_nascimento` date DEFAULT NULL,
  `data_de_falecimento` date DEFAULT NULL,
  `data_de_sepultamento` date DEFAULT NULL,
  `nome_da_mae` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nome_do_pai` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sexo` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cor_raca` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `certidao_de_obito` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causa_da_morte` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `naturalidade` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cidade` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bairro` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rua` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `observacoes` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `situacao` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'Ativo',
  `gratuito` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'Não',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `responsavel_id` bigint UNSIGNED DEFAULT NULL,
  `cemiterio_id` bigint UNSIGNED DEFAULT NULL,
  `ossuario_id` bigint UNSIGNED DEFAULT NULL,
  `gaveta_id` bigint UNSIGNED DEFAULT NULL,
  `assinatura_id` bigint UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `solicitante_fk_6192073` (`responsavel_id`),
  KEY `cemiterio_fk_6192075` (`cemiterio_id`),
  KEY `setor_fk_6192076` (`ossuario_id`),
  KEY `quadra_fk_6192077` (`gaveta_id`),
  KEY `assinatura_fk_6192101` (`assinatura_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `obitos_gaveta`
--

INSERT INTO `obitos_gaveta` (`id`, `numero_dam`, `ano_dam`, `nome_do_falecido`, `data_de_nascimento`, `data_de_falecimento`, `data_de_sepultamento`, `nome_da_mae`, `nome_do_pai`, `sexo`, `cor_raca`, `certidao_de_obito`, `causa_da_morte`, `naturalidade`, `estado`, `cidade`, `bairro`, `rua`, `numero`, `observacoes`, `situacao`, `gratuito`, `created_at`, `updated_at`, `deleted_at`, `responsavel_id`, `cemiterio_id`, `ossuario_id`, `gaveta_id`, `assinatura_id`) VALUES
(13, '7543213457', '2009', 'Ryan Diego Felipe Alves', '1956-02-20', '2018-07-13', '2019-01-09', 'Marlene Giovana', 'Benjamin Ricardo Vicente Alves', 'Masculino', 'Pardo(a)', '5890338901', 'Acidente', 'Brasileiro', 'PE', 'Recife', 'Linha do Tiro', 'Alameda das Orquídeas', '21', 'test', 'Ativo', 'Sim', '2022-04-02 08:37:42', '2022-04-02 08:37:42', NULL, 1, 6, 5, 3, 1),
(2, '4235323t45', 'dr45t5y532', 'Sara Heloise Renata Caldeira', '1959-01-06', '2022-03-07', '2022-03-14', 'Olivia Emanuelly', 'César Iago Caldeira', 'Feminino', 'Negro/a', '32434557890754323frt567', 'Infarto', 'Brasileiro', 'MT', 'Recife', 'Linha do Tiro', '1ª Travessa Alterosa', '312', 'ww', 'Ativo', 'Sim', '2022-03-25 11:45:26', '2022-03-29 10:50:41', '2022-03-29 10:50:41', 1, 1, 1, 2, 1),
(10, '34222', '2009', 'Danna Paola Maria da Silva', '2022-03-29', '2022-03-29', '2022-03-29', 'Alessandra Letícia Bernardes', 'Alessandra Letícia Bernardes', 'Masculino', 'Negro/a', NULL, NULL, NULL, 'PE', 'paulista', NULL, NULL, NULL, NULL, 'Transferido', 'Não', '2022-04-02 00:44:02', '2022-04-02 00:44:02', NULL, 1, 1, NULL, NULL, 1),
(12, '34222', '34544743', 'Alessandra Letícia Bernardes', '2022-03-29', '2022-03-29', '2022-03-29', 'testando', 'testando', 'Feminino', 'Pardo(a)', '32434557890754323frt567', 'Envenenamento', 'Brasileiro', 'MA', 'paulista', NULL, '1ª Travessa Alterosa', '81993852234', NULL, 'Transferido', 'Sim', '2022-04-02 00:48:57', '2022-04-02 08:00:27', NULL, 1, 2, 3, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ossuarios`
--

DROP TABLE IF EXISTS `ossuarios`;
CREATE TABLE IF NOT EXISTS `ossuarios` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `indentificacao` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descricao` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `cemiterio_id` bigint UNSIGNED DEFAULT NULL,
  `assinatura_id` bigint UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cemiterio_fk_6191993` (`cemiterio_id`),
  KEY `assinatura_fk_6191996` (`assinatura_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `ossuarios`
--

INSERT INTO `ossuarios` (`id`, `indentificacao`, `descricao`, `created_at`, `updated_at`, `deleted_at`, `cemiterio_id`, `assinatura_id`) VALUES
(1, 'Ossuário', 'test', '2022-03-17 01:06:37', '2022-03-22 21:53:04', NULL, 1, 1),
(2, 'Ossuário 2', NULL, '2022-03-22 21:52:41', '2022-03-22 21:52:41', NULL, 1, 1),
(3, 'Ossuário 3', NULL, '2022-03-22 21:53:37', '2022-03-22 21:53:37', NULL, 2, 1),
(4, 'Ossuário 4', NULL, '2022-03-22 21:54:10', '2022-03-22 21:54:10', NULL, 6, 1),
(5, 'Ossuário 5', NULL, '2022-03-22 21:54:28', '2022-03-22 21:54:28', NULL, 6, 1),
(6, 'Ossuário 6', NULL, '2022-03-22 21:55:01', '2022-03-22 21:55:01', NULL, 6, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `para_gavetas`
--

DROP TABLE IF EXISTS `para_gavetas`;
CREATE TABLE IF NOT EXISTS `para_gavetas` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `responsavel_id` bigint UNSIGNED DEFAULT NULL,
  `responsavel_nome` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `falecido_id` bigint UNSIGNED DEFAULT NULL,
  `falecido_nome` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cemiterio_id` bigint UNSIGNED DEFAULT NULL,
  `setor_id` bigint UNSIGNED DEFAULT NULL,
  `quadra_id` bigint UNSIGNED DEFAULT NULL,
  `lote_id` bigint UNSIGNED DEFAULT NULL,
  `cemiterio_destino_id` bigint UNSIGNED DEFAULT NULL,
  `ossuario_destino_id` bigint UNSIGNED DEFAULT NULL,
  `gaveta_destino_id` bigint UNSIGNED DEFAULT NULL,
  `data_de_transferencia` date DEFAULT NULL,
  `observacoes` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `assinatura_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `solicitante_fk_6192190` (`responsavel_id`),
  KEY `falecido_fk_6192191` (`falecido_id`),
  KEY `cemiterio_fk_6192192` (`cemiterio_id`),
  KEY `setor_fk_6192193` (`setor_id`),
  KEY `quadra_fk_6192194` (`quadra_id`),
  KEY `lote_fk_6192195` (`lote_id`),
  KEY `cemiterio_destino_fk_6192196` (`cemiterio_destino_id`),
  KEY `ossuario_destino_fk_6192197` (`ossuario_destino_id`),
  KEY `gaveta_destino_fk_6192198` (`gaveta_destino_id`),
  KEY `assinatura_fk_6192201` (`assinatura_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `para_gavetas`
--

INSERT INTO `para_gavetas` (`id`, `responsavel_id`, `responsavel_nome`, `falecido_id`, `falecido_nome`, `cemiterio_id`, `setor_id`, `quadra_id`, `lote_id`, `cemiterio_destino_id`, `ossuario_destino_id`, `gaveta_destino_id`, `data_de_transferencia`, `observacoes`, `assinatura_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, 1, 'Eliane Juliana Ana Silveira', 7, 'Ryan Diego Felipe Alves', 1, 1, 2, 1, 6, 5, 3, '2022-04-02', 'n vvn', 1, '2022-04-02 08:37:42', '2022-04-02 08:37:42', NULL),
(8, 1, 'Eliane Juliana Ana Silveira', 7, 'Ryan Diego Felipe Alves', 1, 1, 2, 1, 6, 5, 3, '2022-04-02', 'n vvn', 1, '2022-04-02 08:38:19', '2022-04-02 08:38:19', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `para_lotes`
--

DROP TABLE IF EXISTS `para_lotes`;
CREATE TABLE IF NOT EXISTS `para_lotes` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `responsavel_id` bigint UNSIGNED DEFAULT NULL,
  `responsavel_nome` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `falecido_id` bigint UNSIGNED DEFAULT NULL,
  `falecido_nome` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cemiterio_id` bigint UNSIGNED DEFAULT NULL,
  `ossuario_id` bigint UNSIGNED DEFAULT NULL,
  `gaveta_id` bigint UNSIGNED DEFAULT NULL,
  `cemiterio_de_destino_id` bigint UNSIGNED DEFAULT NULL,
  `setor_de_destino_id` bigint UNSIGNED DEFAULT NULL,
  `quadra_de_destino_id` bigint DEFAULT NULL,
  `lote_de_destino_id` bigint UNSIGNED DEFAULT NULL,
  `data_de_transferencia` date DEFAULT NULL,
  `assinatura_id` bigint UNSIGNED DEFAULT NULL,
  `observacoes` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `responsavel_fk_6313858` (`responsavel_id`),
  KEY `falecido_fk_6313859` (`falecido_id`),
  KEY `cemiterio_fk_6313860` (`cemiterio_id`),
  KEY `ossuario_fk_6313861` (`ossuario_id`),
  KEY `gaveta_fk_6313862` (`gaveta_id`),
  KEY `cemiterio_de_destino_fk_6313863` (`cemiterio_de_destino_id`),
  KEY `setor_de_destino_fk_6313864` (`setor_de_destino_id`),
  KEY `lote_de_destino_fk_6313866` (`lote_de_destino_id`),
  KEY `assinatura_fk_6313876` (`assinatura_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `para_lotes`
--

INSERT INTO `para_lotes` (`id`, `responsavel_id`, `responsavel_nome`, `falecido_id`, `falecido_nome`, `cemiterio_id`, `ossuario_id`, `gaveta_id`, `cemiterio_de_destino_id`, `setor_de_destino_id`, `quadra_de_destino_id`, `lote_de_destino_id`, `data_de_transferencia`, `assinatura_id`, `observacoes`, `created_at`, `updated_at`, `deleted_at`) VALUES
(9, 1, 'Eliane Juliana Ana Silveira', 14, 'Ryan Diego Felipe Alves', 6, 5, 3, 2, 5, 1, 2, '2022-04-02', 1, 'fcsadz\\ZX', '2022-04-02 09:07:20', '2022-04-02 09:07:21', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `funcao` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=96 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `permissions`
--

INSERT INTO `permissions` (`id`, `title`, `funcao`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'user_management_access', 'Acessar Gestão Administrativa', NULL, NULL, NULL),
(2, 'permission_show', 'Visualizar Permissões', NULL, NULL, NULL),
(3, 'permission_access', 'Acessar Permissões', NULL, NULL, NULL),
(4, 'role_create', 'Criar Grupo de Usuários', NULL, NULL, NULL),
(5, 'role_edit', 'Editar Grupo de Usuários', NULL, NULL, NULL),
(6, 'role_show', 'Visualizar Grupo de Usuários', NULL, NULL, NULL),
(7, 'role_delete', 'Deletar Grupo de Usuários', NULL, NULL, NULL),
(8, 'role_access', 'Acessar Grupo de Usuários', NULL, NULL, NULL),
(9, 'user_create', 'Criar Usuários', NULL, NULL, NULL),
(10, 'user_edit', 'Editar Usuários', NULL, NULL, NULL),
(11, 'user_show', 'Visualizar Usuários', NULL, NULL, NULL),
(12, 'user_delete', 'Deletar Usuários', NULL, NULL, NULL),
(13, 'user_access', 'Acessar Usuários', NULL, NULL, NULL),
(14, 'audit_log_show', 'Visualizar Auditoria', NULL, NULL, NULL),
(15, 'audit_log_access', 'Acessar Auditoria', NULL, NULL, NULL),
(16, 'cadastro_access', 'Acessar Cadastros', NULL, NULL, NULL),
(17, 'cemiterio_create', 'Criar Cemitérios', NULL, NULL, NULL),
(18, 'cemiterio_edit', 'Editar Cemitérios', NULL, NULL, NULL),
(19, 'cemiterio_show', 'Visualizar Cemitérios', NULL, NULL, NULL),
(20, 'cemiterio_delete', 'Deletar Cemitérios', NULL, NULL, NULL),
(21, 'cemiterio_access', 'Acessar Cemitérios', NULL, NULL, NULL),
(22, 'setore_create', 'Criar Setores', NULL, NULL, NULL),
(23, 'setore_edit', 'Editar Setores', NULL, NULL, NULL),
(24, 'setore_show', 'Visualizar Setores', NULL, NULL, NULL),
(25, 'setore_delete', 'Deletar Setores', NULL, NULL, NULL),
(26, 'setore_access', 'Acessar Setores', NULL, NULL, NULL),
(27, 'quadra_create', 'Criar Quadras', NULL, NULL, NULL),
(28, 'quadra_edit', 'Editar Quadras', NULL, NULL, NULL),
(29, 'quadra_show', 'Visualizar Quadras', NULL, NULL, NULL),
(30, 'quadra_delete', 'Deletar Quadras', NULL, NULL, NULL),
(31, 'quadra_access', 'Acessar Quadras', NULL, NULL, NULL),
(32, 'lote_create', 'Criar Lotes', NULL, NULL, NULL),
(33, 'lote_edit', 'Editar Lotes', NULL, NULL, NULL),
(34, 'lote_show', 'Visualizar Lotes', NULL, NULL, NULL),
(35, 'lote_delete', 'Deletar Lotes', NULL, NULL, NULL),
(36, 'lote_access', 'Acessar Lotes', NULL, NULL, NULL),
(37, 'ossuario_create', 'Criar Ossuários', NULL, NULL, NULL),
(38, 'ossuario_edit', 'Editar Ossuários', NULL, NULL, NULL),
(39, 'ossuario_show', 'Visualizar Ossuários', NULL, NULL, NULL),
(40, 'ossuario_delete', 'Deletar Ossuários', NULL, NULL, NULL),
(41, 'ossuario_access', 'Acessar Ossuários', NULL, NULL, NULL),
(42, 'gavetum_create', 'Criar Gavetas', NULL, NULL, NULL),
(43, 'gavetum_edit', 'Editar Gavetas', NULL, NULL, NULL),
(44, 'gavetum_show', 'Visualizar Gavetas', NULL, NULL, NULL),
(45, 'gavetum_delete', 'Deletar Gavetas', NULL, NULL, NULL),
(46, 'gavetum_access', 'Acessar Gavetas', NULL, NULL, NULL),
(47, 'responsavel_create', 'Criar Responsavel', NULL, NULL, NULL),
(48, 'responsavel_edit', 'Editar Responsavel', NULL, NULL, NULL),
(49, 'responsavel_show', 'Visualizar Responsavel', NULL, NULL, NULL),
(50, 'responsavel_delete', 'Deletar Responsavel', NULL, NULL, NULL),
(51, 'responsavel_access', 'Acessar Responsavel', NULL, NULL, NULL),
(52, 'lancamento_access', 'Acessar Lançamentos', NULL, NULL, NULL),
(53, 'obitos_lotes_create', 'Criar Óbitos em Lotes', NULL, NULL, NULL),
(54, 'obitos_lotes_edit', 'Editar Óbitos em Lotes', NULL, NULL, NULL),
(55, 'obitos_lotes_show', 'Visualizar Óbitos em Lotes', NULL, NULL, NULL),
(56, 'obitos_lotes_delete', 'Deletar Óbitos em Lotes', NULL, NULL, NULL),
(57, 'obitos_lotes_access', 'Acessar Óbitos em Lotes', NULL, NULL, NULL),
(68, 'transferencium_access', 'Acessar Transferências', NULL, NULL, NULL),
(69, 'entre_lote_create', 'Criar Transferências Entre Lotes', NULL, NULL, NULL),
(70, 'entre_lote_edit', 'Editar Transferências Entre Lotes', NULL, NULL, NULL),
(71, 'entre_lote_show', 'Visualizar Transferências Entre Lotes', NULL, NULL, NULL),
(72, 'entre_lote_delete', 'Deletar Transferências Entre Lotes', NULL, NULL, NULL),
(73, 'entre_lote_access', 'Acessar Transferências Entre Lotes', NULL, NULL, NULL),
(74, 'para_gaveta_create', 'Criar Transferências Para Ossuários', NULL, NULL, NULL),
(75, 'para_gaveta_edit', 'Editar Transferências Para Ossuários', NULL, NULL, NULL),
(76, 'para_gaveta_show', 'Visualizar Transferências Para Ossuários', NULL, NULL, NULL),
(77, 'para_gaveta_delete', 'Deletar Transferências Para Ossuários', NULL, NULL, NULL),
(78, 'para_gaveta_access', 'Acessar Transferências Para Ossuários', NULL, NULL, NULL),
(79, 'profile_password_edit', 'Editar o Próprio Perfil', NULL, NULL, NULL),
(80, 'obitos_gavetas_access', 'Acessar Óbitos em Gavetas', NULL, NULL, NULL),
(81, 'obitos_gavetas_create', 'Criar Óbitos em Gavetas', NULL, NULL, NULL),
(82, 'obitos_gavetas_edit', 'Editar Óbitos em Gavetas', NULL, NULL, NULL),
(83, 'obitos_gavetas_show', 'Visualizar Óbitos em Gavetas', NULL, NULL, NULL),
(84, 'obitos_gavetas_delete', 'Deletar Óbitos em Gavetas', NULL, NULL, NULL),
(85, 'para_lote_access', 'Acessar Transferências Para Lotes', NULL, NULL, NULL),
(86, 'para_lote_create', 'Criar Transferências Para Lotes', NULL, NULL, NULL),
(87, 'para_lote_edit', 'Editar Transferências Para Lotes', NULL, NULL, NULL),
(88, 'para_lote_show', 'Visualizar Transferências Para Lotes', NULL, NULL, NULL),
(89, 'para_lote_delete', 'Deletar Transferências Para Lotes', NULL, NULL, NULL),
(90, 'entre_gaveta_access', 'Acessar Transferências Entre Ossuários', NULL, NULL, NULL),
(91, 'entre_gaveta_create', 'Criar Transferências Entre Ossuários', NULL, NULL, NULL),
(92, 'entre_gaveta_edit', 'Editar Transferências Entre Ossuários', NULL, NULL, NULL),
(93, 'entre_gaveta_show', 'Visualizar Transferências Entre Ossuários', NULL, NULL, NULL),
(94, 'entre_gaveta_delete', 'Deletar Transferências Entre Ossuários', NULL, NULL, NULL),
(95, 'relatorios_access', 'Acessar Relatórios', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE IF NOT EXISTS `permission_role` (
  `id` int NOT NULL AUTO_INCREMENT,
  `role_id` bigint UNSIGNED NOT NULL,
  `permission_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `role_id_fk_6191919` (`role_id`),
  KEY `permission_id_fk_6191919` (`permission_id`)
) ENGINE=MyISAM AUTO_INCREMENT=650 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `permission_role`
--

INSERT INTO `permission_role` (`id`, `role_id`, `permission_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 1, 8),
(9, 1, 9),
(10, 1, 10),
(11, 1, 11),
(12, 1, 12),
(13, 1, 13),
(14, 1, 14),
(15, 1, 15),
(16, 1, 16),
(17, 1, 17),
(18, 1, 18),
(19, 1, 19),
(20, 1, 20),
(21, 1, 21),
(22, 1, 22),
(23, 1, 23),
(24, 1, 24),
(25, 1, 25),
(26, 1, 26),
(27, 1, 27),
(28, 1, 28),
(29, 1, 29),
(30, 1, 30),
(31, 1, 31),
(32, 1, 32),
(33, 1, 33),
(34, 1, 34),
(35, 1, 35),
(36, 1, 36),
(37, 1, 37),
(38, 1, 38),
(39, 1, 39),
(40, 1, 40),
(41, 1, 41),
(42, 1, 42),
(43, 1, 43),
(44, 1, 44),
(45, 1, 45),
(46, 1, 46),
(47, 1, 47),
(48, 1, 48),
(49, 1, 49),
(50, 1, 50),
(51, 1, 51),
(52, 1, 52),
(53, 1, 53),
(54, 1, 54),
(55, 1, 55),
(56, 1, 56),
(57, 1, 57),
(58, 1, 58),
(59, 1, 59),
(60, 1, 60),
(61, 1, 61),
(62, 1, 62),
(63, 1, 63),
(64, 1, 64),
(65, 1, 65),
(66, 1, 66),
(67, 1, 67),
(68, 1, 68),
(69, 1, 69),
(70, 1, 70),
(71, 1, 71),
(72, 1, 72),
(73, 1, 73),
(74, 1, 74),
(75, 1, 75),
(76, 1, 76),
(77, 1, 77),
(78, 1, 78),
(79, 1, 79),
(80, 2, 14),
(81, 2, 15),
(82, 2, 16),
(83, 2, 17),
(84, 2, 18),
(85, 2, 19),
(86, 2, 20),
(87, 2, 21),
(88, 2, 22),
(89, 2, 23),
(90, 2, 24),
(91, 2, 25),
(92, 2, 26),
(93, 2, 27),
(94, 2, 28),
(95, 2, 29),
(96, 2, 30),
(97, 2, 31),
(98, 2, 32),
(99, 2, 33),
(100, 2, 34),
(101, 2, 35),
(102, 2, 36),
(103, 2, 37),
(104, 2, 38),
(105, 2, 39),
(106, 2, 40),
(107, 2, 41),
(108, 2, 42),
(109, 2, 43),
(110, 2, 44),
(111, 2, 45),
(112, 2, 46),
(113, 2, 47),
(114, 2, 48),
(115, 2, 49),
(116, 2, 50),
(117, 2, 51),
(118, 2, 52),
(119, 2, 53),
(120, 2, 54),
(121, 2, 55),
(122, 2, 56),
(123, 2, 57),
(124, 2, 58),
(125, 2, 59),
(126, 2, 60),
(127, 2, 61),
(128, 2, 62),
(129, 2, 63),
(130, 2, 64),
(131, 2, 65),
(132, 2, 66),
(133, 2, 67),
(134, 2, 68),
(135, 2, 69),
(136, 2, 70),
(137, 2, 71),
(138, 2, 72),
(139, 2, 73),
(140, 2, 74),
(141, 2, 75),
(142, 2, 76),
(143, 2, 77),
(144, 2, 78),
(145, 2, 79),
(461, 6, 79),
(460, 6, 78),
(459, 6, 77),
(458, 6, 76),
(457, 6, 75),
(456, 6, 74),
(455, 6, 73),
(454, 6, 72),
(453, 6, 71),
(452, 6, 70),
(451, 6, 69),
(450, 6, 68),
(449, 6, 67),
(448, 6, 66),
(447, 6, 65),
(446, 6, 64),
(445, 6, 63),
(444, 6, 62),
(443, 6, 61),
(442, 6, 60),
(441, 6, 59),
(440, 6, 58),
(439, 6, 57),
(438, 6, 56),
(437, 6, 55),
(436, 6, 54),
(435, 6, 53),
(434, 6, 52),
(433, 6, 51),
(432, 6, 50),
(431, 6, 49),
(430, 6, 48),
(429, 6, 47),
(428, 6, 46),
(427, 6, 45),
(426, 6, 44),
(425, 6, 43),
(424, 6, 42),
(423, 6, 41),
(422, 6, 40),
(421, 6, 39),
(420, 6, 38),
(419, 6, 37),
(418, 6, 36),
(417, 6, 35),
(416, 6, 34),
(415, 6, 33),
(414, 6, 32),
(413, 6, 31),
(412, 6, 30),
(411, 6, 29),
(410, 6, 28),
(409, 6, 27),
(408, 6, 26),
(407, 6, 25),
(406, 6, 24),
(405, 6, 23),
(404, 6, 22),
(403, 6, 21),
(402, 6, 20),
(401, 6, 19),
(400, 6, 18),
(399, 6, 17),
(398, 6, 16),
(397, 6, 15),
(396, 6, 14),
(395, 6, 13),
(394, 6, 12),
(393, 6, 11),
(392, 6, 10),
(391, 6, 9),
(390, 6, 8),
(389, 6, 7),
(388, 6, 6),
(387, 6, 5),
(386, 6, 4),
(385, 6, 3),
(384, 6, 2),
(383, 6, 1),
(382, 5, 79),
(381, 5, 78),
(380, 5, 77),
(379, 5, 76),
(378, 5, 75),
(377, 5, 74),
(376, 5, 73),
(375, 5, 72),
(374, 5, 71),
(373, 5, 70),
(372, 5, 69),
(371, 5, 68),
(370, 5, 67),
(369, 5, 66),
(368, 5, 65),
(367, 5, 64),
(366, 5, 63),
(365, 5, 62),
(364, 5, 61),
(363, 5, 60),
(362, 5, 59),
(361, 5, 58),
(360, 5, 57),
(359, 5, 56),
(358, 5, 55),
(357, 5, 54),
(356, 5, 53),
(355, 5, 52),
(354, 5, 51),
(353, 5, 50),
(352, 5, 49),
(351, 5, 48),
(350, 5, 47),
(349, 5, 46),
(348, 5, 45),
(347, 5, 44),
(346, 5, 43),
(345, 5, 42),
(344, 5, 41),
(343, 5, 40),
(342, 5, 39),
(341, 5, 38),
(340, 5, 37),
(339, 5, 36),
(338, 5, 35),
(337, 5, 34),
(336, 5, 33),
(335, 5, 32),
(334, 5, 31),
(333, 5, 30),
(332, 5, 29),
(331, 5, 28),
(330, 5, 27),
(329, 5, 26),
(328, 5, 25),
(327, 5, 24),
(326, 5, 23),
(325, 5, 22),
(324, 5, 21),
(323, 5, 20),
(322, 5, 19),
(321, 5, 18),
(320, 5, 17),
(319, 5, 16),
(318, 5, 15),
(317, 5, 14),
(316, 5, 13),
(315, 5, 12),
(314, 5, 11),
(313, 5, 10),
(312, 5, 9),
(311, 5, 8),
(310, 5, 7),
(309, 5, 6),
(308, 5, 5),
(307, 5, 4),
(306, 5, 3),
(305, 5, 2),
(304, 5, 1),
(462, 7, 1),
(463, 7, 2),
(464, 7, 3),
(465, 7, 4),
(466, 7, 5),
(467, 7, 6),
(468, 7, 7),
(469, 7, 8),
(470, 7, 9),
(471, 7, 10),
(472, 7, 11),
(473, 7, 12),
(474, 7, 13),
(475, 7, 14),
(476, 7, 15),
(477, 7, 16),
(478, 7, 17),
(479, 7, 18),
(480, 7, 19),
(481, 7, 20),
(482, 7, 21),
(483, 7, 22),
(484, 7, 23),
(485, 7, 24),
(486, 7, 25),
(487, 7, 26),
(488, 7, 27),
(489, 7, 28),
(490, 7, 29),
(491, 7, 30),
(492, 7, 31),
(493, 7, 32),
(494, 7, 33),
(495, 7, 34),
(496, 7, 35),
(497, 7, 36),
(498, 7, 37),
(499, 7, 38),
(500, 7, 39),
(501, 7, 40),
(502, 7, 41),
(503, 7, 42),
(504, 7, 43),
(505, 7, 44),
(506, 7, 45),
(507, 7, 46),
(508, 7, 47),
(509, 7, 48),
(510, 7, 49),
(511, 7, 50),
(512, 7, 51),
(513, 7, 52),
(514, 7, 53),
(515, 7, 54),
(516, 7, 55),
(517, 7, 56),
(518, 7, 57),
(519, 7, 58),
(520, 7, 59),
(521, 7, 60),
(522, 7, 61),
(523, 7, 62),
(524, 7, 63),
(525, 7, 64),
(526, 7, 65),
(527, 7, 66),
(528, 7, 67),
(529, 7, 68),
(530, 7, 69),
(531, 7, 70),
(532, 7, 71),
(533, 7, 72),
(534, 7, 73),
(535, 7, 74),
(536, 7, 75),
(537, 7, 76),
(538, 7, 77),
(539, 7, 78),
(540, 7, 79),
(541, 8, 1),
(542, 8, 2),
(543, 8, 3),
(544, 8, 4),
(545, 8, 5),
(546, 8, 6),
(547, 8, 7),
(548, 8, 8),
(549, 8, 9),
(550, 8, 10),
(551, 8, 11),
(552, 8, 12),
(553, 8, 13),
(554, 8, 14),
(555, 8, 15),
(556, 8, 16),
(557, 8, 17),
(558, 8, 18),
(559, 8, 19),
(560, 8, 20),
(561, 8, 21),
(562, 8, 22),
(563, 8, 23),
(564, 8, 24),
(565, 8, 25),
(566, 8, 26),
(567, 8, 27),
(568, 8, 28),
(569, 8, 29),
(570, 8, 30),
(571, 8, 31),
(572, 8, 32),
(573, 8, 33),
(574, 8, 34),
(575, 8, 35),
(576, 8, 36),
(577, 8, 37),
(578, 8, 38),
(579, 8, 39),
(580, 8, 40),
(581, 8, 41),
(582, 8, 42),
(583, 8, 43),
(584, 8, 44),
(585, 8, 45),
(586, 8, 46),
(587, 8, 47),
(588, 8, 48),
(589, 8, 49),
(590, 8, 50),
(591, 8, 51),
(592, 8, 52),
(593, 8, 53),
(594, 8, 54),
(595, 8, 55),
(596, 8, 56),
(597, 8, 57),
(598, 8, 58),
(599, 8, 59),
(600, 8, 60),
(601, 8, 61),
(602, 8, 62),
(603, 8, 63),
(604, 8, 64),
(605, 8, 65),
(606, 8, 66),
(607, 8, 67),
(608, 8, 68),
(609, 8, 69),
(610, 8, 70),
(611, 8, 71),
(612, 8, 72),
(613, 8, 73),
(614, 8, 74),
(615, 8, 75),
(616, 8, 76),
(617, 8, 77),
(618, 8, 78),
(619, 8, 79),
(620, 1, 80),
(621, 1, 81),
(622, 1, 82),
(623, 1, 83),
(624, 1, 84),
(625, 2, 80),
(626, 2, 81),
(627, 2, 82),
(628, 2, 83),
(629, 2, 84),
(630, 1, 85),
(631, 1, 86),
(632, 1, 87),
(633, 1, 88),
(634, 1, 89),
(635, 1, 90),
(636, 1, 91),
(637, 1, 92),
(638, 1, 93),
(639, 1, 94),
(640, 1, 95),
(641, 9, 1),
(642, 9, 2),
(643, 9, 3),
(644, 9, 5),
(645, 9, 16),
(646, 9, 52),
(647, 9, 68),
(648, 9, 79),
(649, 9, 95);

-- --------------------------------------------------------

--
-- Estrutura da tabela `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `quadras`
--

DROP TABLE IF EXISTS `quadras`;
CREATE TABLE IF NOT EXISTS `quadras` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `indentificacao` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descricao` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `cemiterio_id` bigint UNSIGNED DEFAULT NULL,
  `setor_id` bigint UNSIGNED DEFAULT NULL,
  `assinatura_id` bigint UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cemiterio_fk_6191969` (`cemiterio_id`),
  KEY `setor_fk_6191970` (`setor_id`),
  KEY `assinatura_fk_6191973` (`assinatura_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `quadras`
--

INSERT INTO `quadras` (`id`, `indentificacao`, `descricao`, `created_at`, `updated_at`, `deleted_at`, `cemiterio_id`, `setor_id`, `assinatura_id`) VALUES
(1, '01', 'Quadra 01', '2022-03-16 23:56:41', '2022-03-16 23:56:41', NULL, 2, 5, 1),
(2, '02', 'Quadra 02', '2022-03-16 23:57:51', '2022-03-22 21:32:14', NULL, 1, 1, 1),
(4, '03', 'Quadra 03', '2022-03-16 23:59:54', '2022-03-22 21:33:58', NULL, 6, 3, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `recadastramentos`
--

DROP TABLE IF EXISTS `recadastramentos`;
CREATE TABLE IF NOT EXISTS `recadastramentos` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome_do_falecido` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_de_nascimento` date DEFAULT NULL,
  `data_de_falecimento` date DEFAULT NULL,
  `data_de_sepultamento` date DEFAULT NULL,
  `nome_da_mae` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nome_do_pai` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sexo` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cor_raca` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `certidao_de_obito` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causa_da_morte` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `naturalidade` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cidade` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bairro` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rua` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `observacoes` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `cemiterio_id` bigint UNSIGNED DEFAULT NULL,
  `setor_id` bigint UNSIGNED DEFAULT NULL,
  `quadra_id` bigint UNSIGNED DEFAULT NULL,
  `lote_id` bigint UNSIGNED DEFAULT NULL,
  `assinatura_id` bigint UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cemiterio_fk_6192116` (`cemiterio_id`),
  KEY `setor_fk_6192117` (`setor_id`),
  KEY `quadra_fk_6192118` (`quadra_id`),
  KEY `lote_fk_6192119` (`lote_id`),
  KEY `assinatura_fk_6192138` (`assinatura_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `recadastramentos`
--

INSERT INTO `recadastramentos` (`id`, `nome_do_falecido`, `data_de_nascimento`, `data_de_falecimento`, `data_de_sepultamento`, `nome_da_mae`, `nome_do_pai`, `sexo`, `cor_raca`, `certidao_de_obito`, `causa_da_morte`, `naturalidade`, `estado`, `cidade`, `bairro`, `rua`, `numero`, `observacoes`, `created_at`, `updated_at`, `deleted_at`, `cemiterio_id`, `setor_id`, `quadra_id`, `lote_id`, `assinatura_id`) VALUES
(1, 'Cauã Guilherme Almeida', '2022-03-16', '2022-03-01', '2022-03-03', 'Larissa Carolina Sophie', 'César Daniel Almeida', 'Masculino', 'Amarela', '324345xs57890754323frt567', 'Envenenamento', 'Republicano', 'PE', 'Paulista', 'Jaguaribe', 'Via Coletora Um', '120', 'few', '2022-03-17 02:56:26', '2022-03-23 17:07:44', NULL, 2, 5, 1, 2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `responsavel`
--

DROP TABLE IF EXISTS `responsavel`;
CREATE TABLE IF NOT EXISTS `responsavel` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parentesco` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sexo` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cpf_cnpj` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cidade` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bairro` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rua` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complemento` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero_de_contato` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero_de_contato_2` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `observacoes` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `assinatura_id` bigint UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `assinatura_fk_6192068` (`assinatura_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `responsavel`
--

INSERT INTO `responsavel` (`id`, `nome`, `parentesco`, `sexo`, `cpf_cnpj`, `estado`, `cidade`, `bairro`, `rua`, `numero`, `complemento`, `email`, `numero_de_contato`, `numero_de_contato_2`, `observacoes`, `created_at`, `updated_at`, `deleted_at`, `assinatura_id`) VALUES
(1, 'Eliane Juliana Ana Silveira', 'Irmão/a', 'Feminino', '04533953174', 'PE', 'Petrolina', 'Antônio Cassimiro', 'Rua Nossa Senhora das Candeias', '818', NULL, 'yagooliversales@bitco.cc', '8738585146', '87983657543', 'vfcsa', '2022-03-17 02:09:10', '2022-03-25 05:04:49', NULL, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `roles`
--

INSERT INTO `roles` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', '2022-03-12 22:56:38', '2022-03-12 22:56:50', NULL),
(9, 'Sub admin', '2022-04-11 21:24:05', '2022-04-11 21:24:05', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `role_user`
--

DROP TABLE IF EXISTS `role_user`;
CREATE TABLE IF NOT EXISTS `role_user` (
  `user_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  KEY `user_id_fk_6191928` (`user_id`),
  KEY `role_id_fk_6191928` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(3, 2),
(4, 1),
(4, 2),
(5, 1),
(5, 2),
(6, 1),
(6, 2),
(7, 1),
(7, 2),
(8, 1),
(8, 2),
(9, 1),
(9, 2),
(10, 1),
(10, 9),
(11, 1),
(12, 1),
(13, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `setores`
--

DROP TABLE IF EXISTS `setores`;
CREATE TABLE IF NOT EXISTS `setores` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `indentificacao` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descricao` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `cemiterio_id` bigint UNSIGNED DEFAULT NULL,
  `assinatura_id` bigint UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cemiterio_fk_6191961` (`cemiterio_id`),
  KEY `assinatura_fk_6191964` (`assinatura_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `setores`
--

INSERT INTO `setores` (`id`, `indentificacao`, `descricao`, `created_at`, `updated_at`, `deleted_at`, `cemiterio_id`, `assinatura_id`) VALUES
(1, 'Lado AC', '5445', '2022-03-16 00:31:31', '2022-03-16 00:34:46', NULL, 1, 1),
(2, 'Lado B', 'gvf', '2022-03-16 00:32:33', '2022-03-16 00:33:08', NULL, 1, 1),
(3, 'Lado AB', 'vfdv', '2022-03-16 00:39:34', '2022-03-16 00:52:46', NULL, 6, 1),
(5, 'Lado B', 'Lado B do Cemiterio', '2022-03-16 00:46:20', '2022-03-16 01:12:37', NULL, 2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `assinatura_id` bigint UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `assinatura_fk_6191943` (`assinatura_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `assinatura_id`) VALUES
(1, 'Admin', 'admin@admin.com', NULL, '$2y$10$5czWN/OqGAeImfp1U0jOguw3eM0XenpIOH0p/EotqRjFUQLAPdQKu', 'awQDfw1AJC4J7tLpxRCbN9jC31ZR98ZGV7fNQ8pIMnpwc8m0L8QvM7JdF4Zn', '2022-03-12 23:01:53', '2022-03-20 05:31:44', NULL, 1),
(2, 'sjcsistemas', 'admin@sjcsistemas.com', NULL, '$2y$10$wQG1Ggys7M/pVgRB3L3douT5ihWPsYa24CWN2h2t/BRvgRXnm.dlu', 'BMKNyn7ca6S5vq5tOIgtsEeZDIbrtpYdxOivp9SzlviodJdUJi3XWOdRfzb4', '2022-03-13 02:47:33', '2022-03-13 02:58:15', NULL, 1),
(10, 'Hayssa Maria Gomes da Silva', 'hayssagomes2002@gmail.com', NULL, '$2y$10$hkAdlM9hVxGfONdFVopx1eat17p6Xi/EvMvw288eZibX5kbkT8KGq', NULL, '2022-04-11 21:25:33', '2022-04-11 21:25:33', NULL, 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
