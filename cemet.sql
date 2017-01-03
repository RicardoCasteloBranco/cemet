-- MySQL dump 10.13  Distrib 5.7.16, for Linux (x86_64)
--
-- Host: localhost    Database: cemet
-- ------------------------------------------------------
-- Server version	5.7.16-0ubuntu0.16.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `aluno`
--

DROP TABLE IF EXISTS `aluno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aluno` (
  `idaluno` int(11) NOT NULL AUTO_INCREMENT,
  `idpessoa` int(11) NOT NULL,
  `idturma` int(11) NOT NULL,
  `datapraca` date NOT NULL,
  `datanasc` date NOT NULL,
  `nomebanco` varchar(25) COLLATE utf8_bin NOT NULL,
  `agencia` varchar(4) COLLATE utf8_bin NOT NULL,
  `contacorrente` varchar(20) COLLATE utf8_bin NOT NULL,
  `numefisco` int(5) NOT NULL,
  `rua` varchar(30) COLLATE utf8_bin NOT NULL,
  `bairro` varchar(25) COLLATE utf8_bin NOT NULL,
  `cidade` varchar(25) COLLATE utf8_bin NOT NULL,
  `estado` varchar(2) COLLATE utf8_bin NOT NULL,
  `estadocivil` varchar(25) COLLATE utf8_bin NOT NULL,
  `pai` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `mae` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `religiao` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `genero` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `identidadecivil` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `orgaoexpedidoridcivil` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `categoria` varchar(2) COLLATE utf8_bin DEFAULT NULL,
  `renach` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `validadehabilitacao` date DEFAULT NULL,
  `rgmilitar` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `camisa` varchar(1) COLLATE utf8_bin NOT NULL,
  `calca` varchar(2) COLLATE utf8_bin NOT NULL,
  `calcado` varchar(2) COLLATE utf8_bin NOT NULL,
  `cobertura` varchar(2) COLLATE utf8_bin NOT NULL,
  `graudeinstrucao` varchar(20) COLLATE utf8_bin NOT NULL,
  `qtddependentes` int(11) DEFAULT NULL,
  `celular` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `telefone` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `matricula` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `nomeguerra` varchar(50) COLLATE utf8_bin DEFAULT NULL COMMENT 'Preenchido pelo CA',
  `telefonecontato` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `pontoreferencia` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `numeroaluno` varchar(50) COLLATE utf8_bin DEFAULT NULL COMMENT 'Preenchido pelo CA',
  `situacao` varchar(50) COLLATE utf8_bin DEFAULT NULL COMMENT 'Regular ou Subjudice',
  `desligamento` date DEFAULT NULL COMMENT 'Filtrar por null',
  `motivodesligamento` text COLLATE utf8_bin,
  PRIMARY KEY (`idaluno`),
  KEY `fk_aluno_pessoa` (`idpessoa`),
  KEY `fk_aluno_turma` (`idturma`),
  CONSTRAINT `fk_aluno_pessoa` FOREIGN KEY (`idpessoa`) REFERENCES `pessoa` (`idpessoa`),
  CONSTRAINT `fk_aluno_turma` FOREIGN KEY (`idturma`) REFERENCES `turma` (`idturma`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aluno`
--

LOCK TABLES `aluno` WRITE;
/*!40000 ALTER TABLE `aluno` DISABLE KEYS */;
/*!40000 ALTER TABLE `aluno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `avaliacao`
--

DROP TABLE IF EXISTS `avaliacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `avaliacao` (
  `idavaliacao` int(11) NOT NULL AUTO_INCREMENT,
  `idinstrutor` int(11) NOT NULL,
  `relacionamento` int(11) NOT NULL,
  `dominio` int(11) NOT NULL,
  `clareza` int(11) NOT NULL,
  `recursos` int(11) NOT NULL,
  `organizacao` int(11) NOT NULL,
  `metodologia` int(11) NOT NULL,
  `responsabilidade` int(11) NOT NULL,
  `avaliacao` int(11) NOT NULL,
  `observacao` mediumtext COLLATE utf8_bin NOT NULL,
  `idaluno` int(11) NOT NULL,
  PRIMARY KEY (`idavaliacao`),
  KEY `fk_avaliacao_instrutor` (`idinstrutor`),
  KEY `fk_avaliacao_aluno` (`idaluno`),
  CONSTRAINT `fk_avaliacao_aluno` FOREIGN KEY (`idaluno`) REFERENCES `aluno` (`idaluno`),
  CONSTRAINT `fk_avaliacao_instrutor` FOREIGN KEY (`idinstrutor`) REFERENCES `instrutor` (`idinstrutor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `avaliacao`
--

LOCK TABLES `avaliacao` WRITE;
/*!40000 ALTER TABLE `avaliacao` DISABLE KEYS */;
/*!40000 ALTER TABLE `avaliacao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cargo`
--

DROP TABLE IF EXISTS `cargo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cargo` (
  `idcargo` int(11) NOT NULL AUTO_INCREMENT,
  `cargo` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `abreviatura` varchar(8) COLLATE utf8_bin DEFAULT NULL,
  `idorgao` int(11) DEFAULT NULL,
  PRIMARY KEY (`idcargo`),
  KEY `fk_cargo_orgao` (`idorgao`),
  CONSTRAINT `fk_cargo_orgao` FOREIGN KEY (`idorgao`) REFERENCES `orgao` (`idorgao`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cargo`
--

LOCK TABLES `cargo` WRITE;
/*!40000 ALTER TABLE `cargo` DISABLE KEYS */;
INSERT INTO `cargo` VALUES (1,'Capitão','Cap',1);
/*!40000 ALTER TABLE `cargo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `companhia`
--

DROP TABLE IF EXISTS `companhia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `companhia` (
  `idcompanhia` int(11) NOT NULL AUTO_INCREMENT,
  `companhia` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `local` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `idcurso` int(11) DEFAULT NULL,
  `data_inicio` date DEFAULT NULL,
  `data_termino` date DEFAULT NULL,
  PRIMARY KEY (`idcompanhia`),
  KEY `fk_companhia_curso` (`idcurso`),
  CONSTRAINT `fk_companhia_curso` FOREIGN KEY (`idcurso`) REFERENCES `curso` (`idcurso`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `companhia`
--

LOCK TABLES `companhia` WRITE;
/*!40000 ALTER TABLE `companhia` DISABLE KEYS */;
INSERT INTO `companhia` VALUES (1,'1ª Companhia','CEMET-I/Curado',1,'2016-12-31','2017-02-28'),(2,'2ª Companhia','FG/Piedade',1,'2016-12-31',NULL),(3,'1ª Companhia','CEMATA/Paudalho',4,'2016-12-31',NULL);
/*!40000 ALTER TABLE `companhia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `controle_disciplinar`
--

DROP TABLE IF EXISTS `controle_disciplinar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `controle_disciplinar` (
  `idcontrole` int(11) NOT NULL AUTO_INCREMENT,
  `cumprimento` date DEFAULT NULL,
  `tipo_punicao` int(11) DEFAULT NULL,
  `status` bit(1) DEFAULT NULL COMMENT 'cumprido ou arquivado',
  PRIMARY KEY (`idcontrole`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `controle_disciplinar`
--

LOCK TABLES `controle_disciplinar` WRITE;
/*!40000 ALTER TABLE `controle_disciplinar` DISABLE KEYS */;
/*!40000 ALTER TABLE `controle_disciplinar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coordenador`
--

DROP TABLE IF EXISTS `coordenador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coordenador` (
  `idpessoa` int(11) NOT NULL,
  `idturma` int(11) NOT NULL,
  `idcoordenador` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idcoordenador`),
  KEY `fk_coordenador_pessoa` (`idpessoa`),
  KEY `fk_coordenador_turma` (`idturma`),
  CONSTRAINT `fk_coordenador_pessoa` FOREIGN KEY (`idpessoa`) REFERENCES `pessoa` (`idpessoa`),
  CONSTRAINT `fk_coordenador_turma` FOREIGN KEY (`idturma`) REFERENCES `turma` (`idturma`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coordenador`
--

LOCK TABLES `coordenador` WRITE;
/*!40000 ALTER TABLE `coordenador` DISABLE KEYS */;
INSERT INTO `coordenador` VALUES (1,3,1);
/*!40000 ALTER TABLE `coordenador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `curso`
--

DROP TABLE IF EXISTS `curso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `curso` (
  `idcurso` int(11) NOT NULL AUTO_INCREMENT,
  `idorgao` int(11) DEFAULT NULL,
  `siglacurso` varchar(9) COLLATE utf8_bin NOT NULL,
  `nomecurso` varchar(120) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idcurso`),
  KEY `fk_curso_orgao` (`idorgao`),
  CONSTRAINT `fk_curso_orgao` FOREIGN KEY (`idorgao`) REFERENCES `orgao` (`idorgao`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `curso`
--

LOCK TABLES `curso` WRITE;
/*!40000 ALTER TABLE `curso` DISABLE KEYS */;
INSERT INTO `curso` VALUES (1,1,'CFHP','Curso de Formação e Habilitação de Praças'),(2,2,'CFS','Curso de Formação de Sargentos'),(3,3,'CFA','Curso de Formação de Agentes'),(4,1,'CFO','Curso de Formação de Oficiais'),(5,2,'CAS','Curso de Aperfeiçoamento de Sargentos');
/*!40000 ALTER TABLE `curso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `disciplina`
--

DROP TABLE IF EXISTS `disciplina`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `disciplina` (
  `iddisciplina` int(11) NOT NULL AUTO_INCREMENT,
  `idcurso` int(11) NOT NULL,
  `disciplina` varchar(100) COLLATE utf8_bin NOT NULL,
  `sigla` varchar(7) COLLATE utf8_bin NOT NULL,
  `cargahoraria` int(11) NOT NULL,
  `ementa` text COLLATE utf8_bin NOT NULL,
  `conhecimento` text COLLATE utf8_bin NOT NULL,
  `habilidade` text COLLATE utf8_bin NOT NULL,
  `atitude` text COLLATE utf8_bin NOT NULL,
  `bibliografia` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`iddisciplina`),
  KEY `fk_disciplina_curso` (`idcurso`),
  CONSTRAINT `fk_disciplina_curso` FOREIGN KEY (`idcurso`) REFERENCES `curso` (`idcurso`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `disciplina`
--

LOCK TABLES `disciplina` WRITE;
/*!40000 ALTER TABLE `disciplina` DISABLE KEYS */;
INSERT INTO `disciplina` VALUES (1,1,'Abordagem a Pessoas','ABP',30,'Abordar Pessoas','Saber','Fazer','Sentir','Apostila'),(2,1,'Abordagem a Veículos','ABV',30,'Ementa','conhecimento','Habilidade','Atitude','Bibliografia'),(3,4,'Direito Penal I','DP-1',30,'Estudo Básico do Direito Penal Brasileiro','Conhecer os princípios do Direito Penal','Manusear o código penal','Julgar as ocorrências','Código Penal Brasileiro');
/*!40000 ALTER TABLE `disciplina` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `elogio`
--

DROP TABLE IF EXISTS `elogio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `elogio` (
  `idelogio` int(11) NOT NULL AUTO_INCREMENT,
  `tipoelogio` int(11) DEFAULT NULL,
  `publicacao` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`idelogio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `elogio`
--

LOCK TABLES `elogio` WRITE;
/*!40000 ALTER TABLE `elogio` DISABLE KEYS */;
/*!40000 ALTER TABLE `elogio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `falta`
--

DROP TABLE IF EXISTS `falta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `falta` (
  `idaluno` int(11) DEFAULT NULL,
  `iddisciplina` int(11) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `qtd_faltas` int(11) DEFAULT NULL,
  `idfalta` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idfalta`),
  KEY `fk_falta_aluno` (`idaluno`),
  KEY `fk_falta_disciplina` (`iddisciplina`),
  CONSTRAINT `fk_falta_aluno` FOREIGN KEY (`idaluno`) REFERENCES `aluno` (`idaluno`),
  CONSTRAINT `fk_falta_disciplina` FOREIGN KEY (`iddisciplina`) REFERENCES `disciplina` (`iddisciplina`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `falta`
--

LOCK TABLES `falta` WRITE;
/*!40000 ALTER TABLE `falta` DISABLE KEYS */;
/*!40000 ALTER TABLE `falta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fotografia`
--

DROP TABLE IF EXISTS `fotografia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fotografia` (
  `idfotografia` int(11) NOT NULL,
  `mime` int(11) DEFAULT NULL,
  PRIMARY KEY (`idfotografia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fotografia`
--

LOCK TABLES `fotografia` WRITE;
/*!40000 ALTER TABLE `fotografia` DISABLE KEYS */;
/*!40000 ALTER TABLE `fotografia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `instrutor`
--

DROP TABLE IF EXISTS `instrutor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `instrutor` (
  `idinstrutor` int(11) NOT NULL AUTO_INCREMENT,
  `idpessoa` int(11) NOT NULL,
  `iddisciplina` int(11) NOT NULL,
  `tipo_instrutor` varchar(12) COLLATE utf8_bin NOT NULL,
  `idturma` int(11) NOT NULL,
  `desistencia` char(1) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `datadesistencia` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `datainscricao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `matricula` varchar(10) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idinstrutor`),
  KEY `fk_instrutor_pessoa` (`idpessoa`),
  KEY `fk_instrutor_disciplina` (`iddisciplina`),
  KEY `fk_instrutor_turma` (`idturma`),
  CONSTRAINT `fk_instrutor_disciplina` FOREIGN KEY (`iddisciplina`) REFERENCES `disciplina` (`iddisciplina`),
  CONSTRAINT `fk_instrutor_pessoa` FOREIGN KEY (`idpessoa`) REFERENCES `pessoa` (`idpessoa`),
  CONSTRAINT `fk_instrutor_turma` FOREIGN KEY (`idturma`) REFERENCES `turma` (`idturma`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `instrutor`
--

LOCK TABLES `instrutor` WRITE;
/*!40000 ALTER TABLE `instrutor` DISABLE KEYS */;
INSERT INTO `instrutor` VALUES (1,1,1,'Titular',3,'0',NULL,'2017-01-03 02:04:23','950692-6');
/*!40000 ALTER TABLE `instrutor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu` (
  `idmenu` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `titulo` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `menu_pai` int(11) DEFAULT NULL,
  `caminho` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`idmenu`),
  KEY `fk_menupai_menu` (`menu_pai`),
  CONSTRAINT `fk_menupai_menu` FOREIGN KEY (`menu_pai`) REFERENCES `menu` (`idmenu`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` VALUES (1,'Menu Pai de Orgão','Orgão',NULL,NULL),(2,'Exibe orgãos','Exibir',1,'bootstrap.php?module=Orgao&page=index.php'),(3,'Adiciona orgãos','Adicionar',1,'bootstrap.php?module=Orgao&page=add.php'),(4,'Menu Pai de Pessoa','Pessoa',NULL,NULL),(5,'Exibe Pessoas','Exibir',4,'bootstrap.php?module=Pessoa&page=index.php'),(6,'Adiciona Pessoa','Adicionar',4,'bootstrap.php?module=Pessoa&page=add.php'),(7,'Menu Pai de Cursos','Curso',NULL,NULL),(8,'Exibe Cursos','Exibir',7,'bootstrap.php?module=Curso&page=index.php'),(9,'Adiciona Cursos','Adiciona',7,'bootstrap.php?module=Curso&page=add.php'),(10,'Menu Pai de Disciplina','Disciplina',NULL,NULL),(11,'Adiciona Disciplinas','Adiciona',10,'bootstrap.php?module=Disciplina&page=add.php'),(12,'Exibe Disciplinas','Exibir',10,'bootstrap.php?module=Disciplina&page=index.php'),(13,'Menu pai de Companhias','Companhia',NULL,NULL),(14,'Exibe Companhias','Exibir',13,'bootstrap.php?module=Companhia&page=index.php'),(15,'Adiciona Companhia','Adicionar',13,'bootstrap.php?module=Companhia&page=add.php'),(16,'Menu Pai Instrutor','Instrutor',NULL,NULL),(17,'Exibe Instrutores','Exibir',16,'bootstrap.php?module=Instrutor&page=index.php'),(18,'Menu pai Plano de Aula','Plano de Aula',NULL,NULL),(19,'Exibir Planos de Aula','Exibir',18,'bootstrap.php?module=PlanoAula&page=index.php');
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nota`
--

DROP TABLE IF EXISTS `nota`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nota` (
  `idaluno` int(11) NOT NULL,
  `iddisciplina` int(11) NOT NULL,
  `nota` varchar(6) COLLATE utf8_bin DEFAULT NULL,
  `avaliacao` varchar(3) COLLATE utf8_bin DEFAULT NULL,
  `idnota` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idnota`),
  KEY `fk_nota_aluno` (`idaluno`),
  KEY `fk_nota_disciplina` (`iddisciplina`),
  CONSTRAINT `fk_nota_aluno` FOREIGN KEY (`idaluno`) REFERENCES `aluno` (`idaluno`),
  CONSTRAINT `fk_nota_disciplina` FOREIGN KEY (`iddisciplina`) REFERENCES `disciplina` (`iddisciplina`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nota`
--

LOCK TABLES `nota` WRITE;
/*!40000 ALTER TABLE `nota` DISABLE KEYS */;
/*!40000 ALTER TABLE `nota` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orgao`
--

DROP TABLE IF EXISTS `orgao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orgao` (
  `idorgao` int(11) NOT NULL AUTO_INCREMENT,
  `orgao` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `sigla` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`idorgao`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orgao`
--

LOCK TABLES `orgao` WRITE;
/*!40000 ALTER TABLE `orgao` DISABLE KEYS */;
INSERT INTO `orgao` VALUES (1,'Policia Militar de Pernambuco','PMPE'),(2,'Corpo de Bombeiros Militar de Pernambuco','CBMPE'),(3,'Polícia Civil de Pernambuco','PCPE');
/*!40000 ALTER TABLE `orgao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perfil`
--

DROP TABLE IF EXISTS `perfil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perfil` (
  `idperfil` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` text COLLATE utf8_bin,
  PRIMARY KEY (`idperfil`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfil`
--

LOCK TABLES `perfil` WRITE;
/*!40000 ALTER TABLE `perfil` DISABLE KEYS */;
INSERT INTO `perfil` VALUES (1,'Acides'),(2,'Divisão de Ensino'),(3,'Aluno'),(4,'Instrutor'),(5,'Corpo de Alunos'),(6,'Conteudista');
/*!40000 ALTER TABLE `perfil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perfil_menu`
--

DROP TABLE IF EXISTS `perfil_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perfil_menu` (
  `idperfil` int(11) DEFAULT NULL,
  `idmenu` int(11) DEFAULT NULL,
  KEY `fk_perfil` (`idperfil`),
  KEY `fk_menu` (`idmenu`),
  CONSTRAINT `fk_menu` FOREIGN KEY (`idmenu`) REFERENCES `menu` (`idmenu`),
  CONSTRAINT `fk_perfil` FOREIGN KEY (`idperfil`) REFERENCES `perfil` (`idperfil`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfil_menu`
--

LOCK TABLES `perfil_menu` WRITE;
/*!40000 ALTER TABLE `perfil_menu` DISABLE KEYS */;
INSERT INTO `perfil_menu` VALUES (1,2),(1,3),(1,5),(1,6),(1,8),(1,9),(1,11),(1,12),(1,14),(1,15),(1,17),(1,19);
/*!40000 ALTER TABLE `perfil_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pessoa`
--

DROP TABLE IF EXISTS `pessoa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pessoa` (
  `idpessoa` int(11) NOT NULL AUTO_INCREMENT,
  `idcargo` int(11) DEFAULT NULL,
  `nome` varchar(50) COLLATE utf8_bin NOT NULL,
  `cpf` varchar(15) COLLATE utf8_bin NOT NULL,
  `senha` varchar(32) COLLATE utf8_bin NOT NULL,
  `confirma` int(1) DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`idpessoa`),
  KEY `fk_pessoa_cargo` (`idcargo`),
  CONSTRAINT `fk_pessoa_cargo` FOREIGN KEY (`idcargo`) REFERENCES `cargo` (`idcargo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pessoa`
--

LOCK TABLES `pessoa` WRITE;
/*!40000 ALTER TABLE `pessoa` DISABLE KEYS */;
INSERT INTO `pessoa` VALUES (1,1,'Antonio Ricardo Andrade Castelo Branco','02368666486','e10adc3949ba59abbe56e057f20f883e',1,'ricardo.castelobranco@live.com'),(2,1,'Sheila de Lima Castelo Branco','04204015476','123456',0,'sheilacastelo.b@hotmail.com');
/*!40000 ALTER TABLE `pessoa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pessoa_perfil`
--

DROP TABLE IF EXISTS `pessoa_perfil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pessoa_perfil` (
  `idperfil` int(11),
  `idpessoa` int(11),
  KEY `fk_perfil_pessoa` (`idperfil`),
  KEY `fk_pessoa_perfil` (`idpessoa`),
  CONSTRAINT `fk_perfil_pessoa` FOREIGN KEY (`idperfil`) REFERENCES `perfil` (`idperfil`),
  CONSTRAINT `fk_pessoa_perfil` FOREIGN KEY (`idpessoa`) REFERENCES `pessoa` (`idpessoa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pessoa_perfil`
--

LOCK TABLES `pessoa_perfil` WRITE;
/*!40000 ALTER TABLE `pessoa_perfil` DISABLE KEYS */;
INSERT INTO `pessoa_perfil` VALUES (1,1);
/*!40000 ALTER TABLE `pessoa_perfil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pladis`
--

DROP TABLE IF EXISTS `pladis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pladis` (
  `idaula` int(11) NOT NULL AUTO_INCREMENT,
  `iddisciplina` int(11) NOT NULL,
  `objetivo` text COLLATE utf8_bin NOT NULL,
  `qtd_aulas` int(11) NOT NULL,
  `instrutor_secundario` int(11) NOT NULL,
  `conteudo` text COLLATE utf8_bin NOT NULL,
  `eixo` text COLLATE utf8_bin NOT NULL,
  `relacao` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idaula`),
  KEY `fk_pladis_disciplina` (`iddisciplina`),
  CONSTRAINT `fk_pladis_disciplina` FOREIGN KEY (`iddisciplina`) REFERENCES `disciplina` (`iddisciplina`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pladis`
--

LOCK TABLES `pladis` WRITE;
/*!40000 ALTER TABLE `pladis` DISABLE KEYS */;
INSERT INTO `pladis` VALUES (3,2,'objetivo',2,0,'Conteudo','Eixo','Relação'),(4,2,'Conhecer',2,1,'Peças','Segurança','Zelo');
/*!40000 ALTER TABLE `pladis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `planoaula`
--

DROP TABLE IF EXISTS `planoaula`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `planoaula` (
  `idplano` int(11) NOT NULL AUTO_INCREMENT,
  `idinstrutor` int(11) NOT NULL DEFAULT '0',
  `data` date NOT NULL,
  `turno` varchar(5) COLLATE utf8_bin NOT NULL,
  `metodologia` varchar(300) COLLATE utf8_bin NOT NULL,
  `meios` varchar(300) COLLATE utf8_bin NOT NULL,
  `avaliacao` varchar(300) COLLATE utf8_bin DEFAULT NULL,
  `qtdaula` int(2) DEFAULT NULL,
  `idaula` int(11) DEFAULT NULL,
  `datacriacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `atualizacao` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idplano`),
  KEY `fk_planoaula_instrutor` (`idinstrutor`),
  KEY `fk_planoaula_aula` (`idaula`),
  CONSTRAINT `fk_planoaula_aula` FOREIGN KEY (`idaula`) REFERENCES `pladis` (`idaula`),
  CONSTRAINT `fk_planoaula_instrutor` FOREIGN KEY (`idinstrutor`) REFERENCES `instrutor` (`idinstrutor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `planoaula`
--

LOCK TABLES `planoaula` WRITE;
/*!40000 ALTER TABLE `planoaula` DISABLE KEYS */;
/*!40000 ALTER TABLE `planoaula` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_punicao`
--

DROP TABLE IF EXISTS `tipo_punicao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_punicao` (
  `idtipopunicao` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idtipopunicao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_punicao`
--

LOCK TABLES `tipo_punicao` WRITE;
/*!40000 ALTER TABLE `tipo_punicao` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_punicao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `turma`
--

DROP TABLE IF EXISTS `turma`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `turma` (
  `idturma` int(7) NOT NULL AUTO_INCREMENT,
  `companhia` int(11) NOT NULL,
  `turma` varchar(50) COLLATE utf8_bin NOT NULL,
  `sala` varchar(10) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idturma`),
  KEY `fk_turma_companhia` (`companhia`),
  CONSTRAINT `fk_turma_companhia` FOREIGN KEY (`companhia`) REFERENCES `companhia` (`idcompanhia`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `turma`
--

LOCK TABLES `turma` WRITE;
/*!40000 ALTER TABLE `turma` DISABLE KEYS */;
INSERT INTO `turma` VALUES (1,2,'B1','13'),(2,2,'B2','12'),(3,1,'A1','10'),(4,3,'A1','1');
/*!40000 ALTER TABLE `turma` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-01-02 23:32:13
