-- MySQL dump 10.13  Distrib 5.7.15, for Win32 (AMD64)
--
-- Host: localhost    Database: cemet
-- ------------------------------------------------------
-- Server version	5.7.15-log

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cargo`
--

LOCK TABLES `cargo` WRITE;
/*!40000 ALTER TABLE `cargo` DISABLE KEYS */;
/*!40000 ALTER TABLE `cargo` ENABLE KEYS */;
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
  `nomecurso` varchar(40) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idcurso`),
  KEY `fk_curso_orgao` (`idorgao`),
  CONSTRAINT `fk_curso_orgao` FOREIGN KEY (`idorgao`) REFERENCES `orgao` (`idorgao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `curso`
--

LOCK TABLES `curso` WRITE;
/*!40000 ALTER TABLE `curso` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `disciplina`
--

LOCK TABLES `disciplina` WRITE;
/*!40000 ALTER TABLE `disciplina` DISABLE KEYS */;
/*!40000 ALTER TABLE `disciplina` ENABLE KEYS */;
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
-- Table structure for table `funcionalidade`
--

DROP TABLE IF EXISTS `funcionalidade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `funcionalidade` (
  `func_id` int(11) NOT NULL AUTO_INCREMENT,
  `func_descricao` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `func_caminho` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`func_id`),
  KEY `fk_funcionalidade_menu` (`menu_id`),
  CONSTRAINT `fk_funcionalidade_menu` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`menu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funcionalidade`
--

LOCK TABLES `funcionalidade` WRITE;
/*!40000 ALTER TABLE `funcionalidade` DISABLE KEYS */;
/*!40000 ALTER TABLE `funcionalidade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grupo`
--

DROP TABLE IF EXISTS `grupo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grupo` (
  `grupo_id` int(11) NOT NULL AUTO_INCREMENT,
  `grupo_descricao` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`grupo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grupo`
--

LOCK TABLES `grupo` WRITE;
/*!40000 ALTER TABLE `grupo` DISABLE KEYS */;
/*!40000 ALTER TABLE `grupo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `instrutor`
--

DROP TABLE IF EXISTS `instrutor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `instrutor` (
  `idpessoa` int(11) NOT NULL,
  `iddisciplina` int(11) NOT NULL,
  `idinstrutor` int(11) NOT NULL AUTO_INCREMENT,
  `instrutor` varchar(12) COLLATE utf8_bin NOT NULL,
  `idturma` int(11) NOT NULL,
  `desistencia` date DEFAULT NULL,
  `datainscricao` date DEFAULT NULL,
  `matricula` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`idinstrutor`),
  KEY `fk_instrutor_pessoa` (`idpessoa`),
  KEY `fk_instrutor_disciplina` (`iddisciplina`),
  KEY `fk_instrutor_turma` (`idturma`),
  CONSTRAINT `fk_instrutor_disciplina` FOREIGN KEY (`iddisciplina`) REFERENCES `disciplina` (`iddisciplina`),
  CONSTRAINT `fk_instrutor_pessoa` FOREIGN KEY (`idpessoa`) REFERENCES `pessoa` (`idpessoa`),
  CONSTRAINT `fk_instrutor_turma` FOREIGN KEY (`idturma`) REFERENCES `turma` (`idturma`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `instrutor`
--

LOCK TABLES `instrutor` WRITE;
/*!40000 ALTER TABLE `instrutor` DISABLE KEYS */;
/*!40000 ALTER TABLE `instrutor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_descricao` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `menu_pai` int(11) DEFAULT NULL,
  PRIMARY KEY (`menu_id`),
  KEY `fk_menupai_menu` (`menu_pai`),
  CONSTRAINT `fk_menupai_menu` FOREIGN KEY (`menu_pai`) REFERENCES `menu` (`menu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orgao`
--

LOCK TABLES `orgao` WRITE;
/*!40000 ALTER TABLE `orgao` DISABLE KEYS */;
/*!40000 ALTER TABLE `orgao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perfil`
--

DROP TABLE IF EXISTS `perfil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perfil` (
  `perfil_id` int(11) NOT NULL AUTO_INCREMENT,
  `perfil_descricao` text COLLATE utf8_bin,
  PRIMARY KEY (`perfil_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfil`
--

LOCK TABLES `perfil` WRITE;
/*!40000 ALTER TABLE `perfil` DISABLE KEYS */;
/*!40000 ALTER TABLE `perfil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perfil_funcionalidade`
--

DROP TABLE IF EXISTS `perfil_funcionalidade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perfil_funcionalidade` (
  `perfil_id` int(11) DEFAULT NULL,
  `func_id` int(11) DEFAULT NULL,
  KEY `fk_funcionalidade` (`perfil_id`),
  KEY `fk_perfil` (`func_id`),
  CONSTRAINT `fk_funcionalidade` FOREIGN KEY (`perfil_id`) REFERENCES `perfil` (`perfil_id`),
  CONSTRAINT `fk_perfil` FOREIGN KEY (`func_id`) REFERENCES `funcionalidade` (`func_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfil_funcionalidade`
--

LOCK TABLES `perfil_funcionalidade` WRITE;
/*!40000 ALTER TABLE `perfil_funcionalidade` DISABLE KEYS */;
/*!40000 ALTER TABLE `perfil_funcionalidade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perfil_grupo`
--

DROP TABLE IF EXISTS `perfil_grupo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perfil_grupo` (
  `perfil_id` int(11),
  `grupo_id` int(11),
  KEY `fk_perfil_grupo_grupo` (`grupo_id`),
  KEY `fk_perfil_grupo_perfil` (`perfil_id`),
  CONSTRAINT `fk_perfil_grupo_grupo` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`grupo_id`),
  CONSTRAINT `fk_perfil_grupo_perfil` FOREIGN KEY (`perfil_id`) REFERENCES `perfil` (`perfil_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfil_grupo`
--

LOCK TABLES `perfil_grupo` WRITE;
/*!40000 ALTER TABLE `perfil_grupo` DISABLE KEYS */;
/*!40000 ALTER TABLE `perfil_grupo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pessoa`
--

DROP TABLE IF EXISTS `pessoa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pessoa` (
  `idpessoa` int(11) NOT NULL AUTO_INCREMENT,
  `cargo` int(11) DEFAULT NULL,
  `instituicao` varchar(8) COLLATE utf8_bin NOT NULL,
  `nome` varchar(50) COLLATE utf8_bin NOT NULL,
  `cpf` varchar(15) COLLATE utf8_bin NOT NULL,
  `senha` varchar(32) COLLATE utf8_bin NOT NULL,
  `confirma` int(1) DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`idpessoa`),
  KEY `fk_pessoa_cargo` (`cargo`),
  CONSTRAINT `fk_pessoa_cargo` FOREIGN KEY (`cargo`) REFERENCES `cargo` (`idcargo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pessoa`
--

LOCK TABLES `pessoa` WRITE;
/*!40000 ALTER TABLE `pessoa` DISABLE KEYS */;
/*!40000 ALTER TABLE `pessoa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pessoa_grupo`
--

DROP TABLE IF EXISTS `pessoa_grupo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pessoa_grupo` (
  `pessoa_id` int(11) DEFAULT NULL,
  `grupo_id` int(11) DEFAULT NULL,
  KEY `fk_pessoa_grupo_pessoa` (`pessoa_id`),
  KEY `fk_pessoa_grupo_grupo` (`grupo_id`),
  CONSTRAINT `fk_pessoa_grupo_grupo` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`grupo_id`),
  CONSTRAINT `fk_pessoa_grupo_pessoa` FOREIGN KEY (`pessoa_id`) REFERENCES `pessoa` (`idpessoa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pessoa_grupo`
--

LOCK TABLES `pessoa_grupo` WRITE;
/*!40000 ALTER TABLE `pessoa_grupo` DISABLE KEYS */;
/*!40000 ALTER TABLE `pessoa_grupo` ENABLE KEYS */;
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
  `instrutor_secundario` tinyint(1) NOT NULL,
  `conteudo` text COLLATE utf8_bin NOT NULL,
  `eixo` varchar(150) COLLATE utf8_bin NOT NULL,
  `relacao` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idaula`),
  KEY `fk_pladis_disciplina` (`iddisciplina`),
  CONSTRAINT `fk_pladis_disciplina` FOREIGN KEY (`iddisciplina`) REFERENCES `disciplina` (`iddisciplina`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pladis`
--

LOCK TABLES `pladis` WRITE;
/*!40000 ALTER TABLE `pladis` DISABLE KEYS */;
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
  `envio` date NOT NULL,
  `avaliacao` varchar(300) COLLATE utf8_bin DEFAULT NULL,
  `qtdaula` int(2) DEFAULT NULL,
  `idaula` int(11) DEFAULT NULL,
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
-- Table structure for table `turma`
--

DROP TABLE IF EXISTS `turma`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `turma` (
  `idturma` int(7) NOT NULL AUTO_INCREMENT,
  `idcurso` int(11) NOT NULL,
  `turma` varchar(3) COLLATE utf8_bin NOT NULL,
  `datainicio` date NOT NULL,
  `datafim` date DEFAULT NULL,
  PRIMARY KEY (`idturma`),
  KEY `fk_turma_curso` (`idcurso`),
  CONSTRAINT `fk_turma_curso` FOREIGN KEY (`idcurso`) REFERENCES `curso` (`idcurso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `turma`
--

LOCK TABLES `turma` WRITE;
/*!40000 ALTER TABLE `turma` DISABLE KEYS */;
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

-- Dump completed on 2016-12-26 13:38:54
