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
  `idpessoa` int(11) NOT NULL DEFAULT '0',
  `idturma` int(11) NOT NULL DEFAULT '0',
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
  `observacao` mediumtext NOT NULL,
  `idaluno` int(11) NOT NULL,
  PRIMARY KEY (`idavaliacao`),
  KEY `fk_avaliacao_instrutor` (`idinstrutor`),
  KEY `fk_avaliacao_aluno` (`idaluno`),
  CONSTRAINT `fk_avaliacao_aluno` FOREIGN KEY (`idaluno`) REFERENCES `aluno` (`idaluno`),
  CONSTRAINT `fk_avaliacao_instrutor` FOREIGN KEY (`idinstrutor`) REFERENCES `instrutor` (`idinstrutor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
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
  `cargo` varchar(50) DEFAULT NULL,
  `abreviatura` varchar(8) DEFAULT NULL,
  `idorgao` int(11) DEFAULT NULL,
  PRIMARY KEY (`idcargo`),
  KEY `FK_orgao_cargo` (`idorgao`),
  CONSTRAINT `FK_orgao_cargo` FOREIGN KEY (`idorgao`) REFERENCES `orgao` (`idorgao`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cargo`
--

LOCK TABLES `cargo` WRITE;
/*!40000 ALTER TABLE `cargo` DISABLE KEYS */;
INSERT INTO `cargo` VALUES (1,'Coronel','Cel',1),(2,'Tenente Coronel','Ten Cel',1),(3,'Major','Maj',1),(4,'Capitão','Cap',1),(5,'1º Tenente','1º Ten',1),(6,'2º Tenente','2º Ten',1),(7,'2º Tenente','2º Ten',3),(8,'1º Tenente','1º Ten',3),(9,'Capitão','Cap',3),(10,'Major','Maj',3),(11,'Tenente Coronel','Ten Cel',3),(12,'Coronel','Cel',3),(13,'Delegado','Del',2),(14,'Comissário','Com',2),(15,'Agente','Ag',2);
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
  `siglacurso` varchar(9) NOT NULL,
  `nomecurso` varchar(40) NOT NULL,
  PRIMARY KEY (`idcurso`),
  KEY `FK_orgao_curso` (`idorgao`),
  CONSTRAINT `FK_orgao_curso` FOREIGN KEY (`idorgao`) REFERENCES `orgao` (`idorgao`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `curso`
--

LOCK TABLES `curso` WRITE;
/*!40000 ALTER TABLE `curso` DISABLE KEYS */;
INSERT INTO `curso` VALUES (1,1,'CFP','Curso de Formação de Praças'),(2,2,'CFA','Curso de Formação de Agentes'),(3,3,'CFS','Curso de Formação de Sargentos');
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
  `disciplina` varchar(100) NOT NULL,
  `sigla` varchar(7) NOT NULL,
  `cargahoraria` int(11) NOT NULL,
  `ementa` text NOT NULL,
  `conhecimento` text NOT NULL,
  `habilidade` text NOT NULL,
  `atitude` text NOT NULL,
  `bibliografia` text NOT NULL,
  PRIMARY KEY (`iddisciplina`),
  KEY `fk_disciplina_curso` (`idcurso`),
  CONSTRAINT `fk_disciplina_curso` FOREIGN KEY (`idcurso`) REFERENCES `curso` (`idcurso`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `disciplina`
--

LOCK TABLES `disciplina` WRITE;
/*!40000 ALTER TABLE `disciplina` DISABLE KEYS */;
INSERT INTO `disciplina` VALUES (1,1,'Abordagem a Pessoas','ABP',30,'Conhecer as técnicas de abordagem a pessoas','Conhecer os principios de abordagem','Realizar uma abordagem a pessoas','Adotar uma postura em defesa dos direitos humanos','Apostila de Abordagem'),(2,1,'Abordagem a Veiculos','ABV',30,'Oferecer ao policial meios técnicos para durante a realização do serviço fazer com as cautelas necessárias uma busca veícular','Saber o que é um carro','Fazer a abordagem a um veículo com segurança','Manter-se atento durante a abordagem.','Apostila e Código de Trânsito');
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
  KEY `fk_falta_disciplina` (`iddisciplina`),
  KEY `fk_falta_aluno` (`idaluno`),
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
-- Table structure for table `instrutor`
--

DROP TABLE IF EXISTS `instrutor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `instrutor` (
  `idpessoa` int(11) NOT NULL,
  `iddisciplina` int(11) NOT NULL,
  `idinstrutor` int(11) NOT NULL AUTO_INCREMENT,
  `instrutor` varchar(12) NOT NULL,
  `idturma` int(11) NOT NULL,
  `desistencia` date DEFAULT NULL,
  `datainscricao` date DEFAULT NULL,
  `matricula` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`idinstrutor`),
  KEY `fk_instrutor_pessoa` (`idpessoa`),
  KEY `fk_instrutor_disciplina` (`iddisciplina`),
  KEY `fk_instrutor_turma` (`idturma`),
  CONSTRAINT `fk_instrutor_disciplina` FOREIGN KEY (`iddisciplina`) REFERENCES `disciplina` (`iddisciplina`),
  CONSTRAINT `fk_instrutor_pessoa` FOREIGN KEY (`idpessoa`) REFERENCES `pessoa` (`idpessoa`),
  CONSTRAINT `fk_instrutor_turma` FOREIGN KEY (`idturma`) REFERENCES `turma` (`idturma`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `instrutor`
--

LOCK TABLES `instrutor` WRITE;
/*!40000 ALTER TABLE `instrutor` DISABLE KEYS */;
/*!40000 ALTER TABLE `instrutor` ENABLE KEYS */;
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
  `nota` varchar(6) DEFAULT NULL,
  `avaliacao` varchar(3) DEFAULT NULL,
  `idnota` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idnota`),
  KEY `fk_nota_aluno` (`idaluno`),
  KEY `fk_nota_disciplina` (`iddisciplina`),
  CONSTRAINT `fk_nota_aluno` FOREIGN KEY (`idaluno`) REFERENCES `aluno` (`idaluno`),
  CONSTRAINT `fk_nota_disciplina` FOREIGN KEY (`iddisciplina`) REFERENCES `disciplina` (`iddisciplina`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
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
  `orgao` varchar(50) DEFAULT NULL,
  `sigla` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`idorgao`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orgao`
--

LOCK TABLES `orgao` WRITE;
/*!40000 ALTER TABLE `orgao` DISABLE KEYS */;
INSERT INTO `orgao` VALUES (1,'Polícia Militar de Pernambuco','PMPE'),(2,'Polícia Civil de Pernambuco','PCPE'),(3,'Corpo de Bombeiros Militar de Pernambuco','CBMPE');
/*!40000 ALTER TABLE `orgao` ENABLE KEYS */;
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
  `instituicao` varchar(8) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `confirma` int(1) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idpessoa`),
  KEY `fk_pessoa_cargo` (`cargo`),
  CONSTRAINT `fk_pessoa_cargo` FOREIGN KEY (`cargo`) REFERENCES `cargo` (`idcargo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='\r\n\r\n ';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pessoa`
--

LOCK TABLES `pessoa` WRITE;
/*!40000 ALTER TABLE `pessoa` DISABLE KEYS */;
INSERT INTO `pessoa` VALUES (1,1,'PMPE','José','123456789-12','',0,NULL);
/*!40000 ALTER TABLE `pessoa` ENABLE KEYS */;
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
  `objetivo` text NOT NULL,
  `qtd_aulas` int(11) NOT NULL,
  `instrutor_secundario` tinyint(1) NOT NULL,
  `conteudo` text NOT NULL,
  `eixo` varchar(150) NOT NULL,
  `relacao` text NOT NULL,
  PRIMARY KEY (`idaula`),
  KEY `fk_pladis_disciplina` (`iddisciplina`),
  CONSTRAINT `fk_pladis_disciplina` FOREIGN KEY (`iddisciplina`) REFERENCES `disciplina` (`iddisciplina`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pladis`
--

LOCK TABLES `pladis` WRITE;
/*!40000 ALTER TABLE `pladis` DISABLE KEYS */;
INSERT INTO `pladis` VALUES (1,1,'Conhecer a dinâmica',2,1,'Estudo avançado da dinâmica','Direitos Humanos','Serviço Operacional'),(2,1,'Analisar o fluxo',2,1,'O fluxo do vapor','Segurança Pública','Profissional'),(3,2,'Conhecer os locais onde pode-se esconder materiais no veículos',2,0,'As peças de um veículo','Conhecimento Geral','Técnico profissional');
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
  `turno` varchar(5) NOT NULL,
  `metodologia` varchar(300) NOT NULL,
  `meios` varchar(300) NOT NULL,
  `envio` date NOT NULL,
  `avaliacao` varchar(300) DEFAULT NULL,
  `qtdaula` int(2) DEFAULT NULL,
  `idaula` int(11) DEFAULT NULL,
  PRIMARY KEY (`idplano`),
  KEY `fk_planoaula_instrutor` (`idinstrutor`),
  KEY `fk_planoaula_aula` (`idaula`),
  CONSTRAINT `fk_planoaula_aula` FOREIGN KEY (`idaula`) REFERENCES `pladis` (`idaula`),
  CONSTRAINT `fk_planoaula_instrutor` FOREIGN KEY (`idinstrutor`) REFERENCES `instrutor` (`idinstrutor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
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
  `turma` varchar(3) NOT NULL,
  `datainicio` date NOT NULL,
  `datafim` date DEFAULT NULL,
  PRIMARY KEY (`idturma`),
  KEY `fk_turma_curso` (`idcurso`),
  CONSTRAINT `fk_turma_curso` FOREIGN KEY (`idcurso`) REFERENCES `curso` (`idcurso`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `turma`
--

LOCK TABLES `turma` WRITE;
/*!40000 ALTER TABLE `turma` DISABLE KEYS */;
INSERT INTO `turma` VALUES (1,1,'A1','2016-12-26','2016-12-30'),(2,1,'A2','2016-12-26','2016-12-30'),(3,2,'A1','2016-12-26','2017-01-06');
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

-- Dump completed on 2016-12-26  9:33:40
