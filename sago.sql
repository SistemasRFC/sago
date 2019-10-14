-- MySQL dump 10.13  Distrib 5.7.27, for Linux (x86_64)
--
-- Host: localhost    Database: sago
-- ------------------------------------------------------
-- Server version	5.7.27-0ubuntu0.18.04.1

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
-- Table structure for table `artefato`
--

DROP TABLE IF EXISTS `artefato`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `artefato` (
  `cod_artefato` int(11) NOT NULL AUTO_INCREMENT,
  `dsc_artefato` varchar(250) DEFAULT NULL,
  `ind_ativo` char(1) DEFAULT NULL,
  PRIMARY KEY (`cod_artefato`)
) ENGINE=InnoDB AUTO_INCREMENT=270 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `artefato`
--

LOCK TABLES `artefato` WRITE;
/*!40000 ALTER TABLE `artefato` DISABLE KEYS */;
INSERT INTO `artefato` VALUES (1,'Elaborar esboÃ§o de telas','S'),(2,'Elaborar wireframe das telas de uma aplicaÃ§Ã£o','S'),(3,'Elaborar Design de InteraÃ§Ã£o','S'),(4,'Elaborar Design  Aplicado de interfaces  Web/Mobile em alta definiÃ§Ã£o','S'),(5,'Produzir protÃ³tipo de software','S'),(6,'Design de Ã­cone','S'),(7,'Realizar Teste de Usabilidade','S'),(8,'Realizar AnÃ¡lise HeurÃ­stica','S'),(9,'Aplicar tÃ©cnica Card Sorting Online','S'),(10,'Aplicar tÃ©cnica Card Sorting Presencial','S'),(11,'Facilitar, Planejar, conduzir e consolidar','S'),(12,'Idear, Desenvolver  Design de InteraÃ§Ã£o e protÃ³tipo em  sessÃ£o de Design Sprint','S'),(13,'Planejar, conduzir e consolidar Testes em  sessÃ£o de Design Sprint','S'),(14,'Desenvolvimento de design aplicado a Interface Visual para os canais de atendimento e de comunicaÃ§Ã£o do BB (web, mobile, TAA, Intranet, redes sociais e etc.)','S'),(15,'Desenvolvimento de tutoriais grÃ¡ficos para  disponibilizaÃ§Ã£o via canais de comunicaÃ§Ã£o do BB (web, mobile, TAA, Intranet, redes sociais e etc.) e para apoiar a aÃ§Ãµes de transformaÃ§Ã£o digital do BB','S'),(16,'Desenvolvimento de Componentes 3D para os canais de atendimento e de comunicaÃ§Ã£o do BB (web, mobile, TAA, Intranet, redes sociais e etc.) e para apoiar as aÃ§Ãµes de transformaÃ§Ã£o digital do BB','S'),(17,'Desenvolvimento de Componentes 2D para os canais de atendimento e de comunicaÃ§Ã£o do BB (web, mobile, TAA, Intranet, redes sociais e etc.) e para apoiar as aÃ§Ãµes de transformaÃ§Ã£o digital do BB','S'),(18,'Desenvolvimento de componentes audiovisuais para os canais de atendimento e de comunicaÃ§Ã£o do BB (web, mobile, TAA, Intranet, redes sociais e etc.) e para apoiar as aÃ§Ãµes de transformaÃ§Ã£o digital do BB','S'),(19,'Criar funcionalidade    Atividade de compreender a neces, elicitar requi e criar os artefatos que compÃµem uma func com uma desc do Fluxo de Comport ou um canal no MI-Modelo de Imple., excetuando-se EsboÃ§o e ProtÃ³tipo de Telas!','S'),(20,'Alterar funcionalidade      Atividade de compreender a necessidade, elicitar e  alterar os requisitos para  atualizar/criar os artefatos que compÃµem uma funcionalidade,  excetuando-se o EsboÃ§o e o ProtÃ³tipo de Telas. ','S'),(21,'Documentar funcionalidade ','S'),(22,'EsboÃ§o de tela    Elaborar, diagramar e criar o artefato â€œEsboÃ§o de Telaâ€ para uma funcionalidade. ','S'),(23,'EsboÃ§o de Fluxo de  Comportamento de Funcionalidades    Elaborar, diagramar e criar o artefato â€œEsboÃ§o de Fluxo de  Comportamento de Telasâ€ para um conjunto de funcionalidades. ','S'),(24,'Consolidar requisitos','S'),(25,'Criar AprovaÃ§Ã£o dos  Requisitos da  IntervenÃ§Ã£o','S'),(26,'EspecificaÃ§Ã£o de requisitos relacional (ERR)','S'),(27,'EspecificaÃ§Ã£o de requisitos multidimensional (ERM)','S'),(28,'Elicitar os Requisitos â€“  Documento de Requisitos da  Descoberta de  Conhecimento ','S'),(29,'Elaborar ProtÃ³tipo de Tela','S'),(30,'Alterar ProtÃ³tipo de Tela','S'),(31,'Modelo de Processo de NegÃ³cio â€“ Descritiva','S'),(32,'Modelo de Processo de NegÃ³cio â€“ AnalÃ­tica','S'),(33,'Elaborar/alterar o  Modelo de Entidade  Relacionamento  (MER) â€“ VisÃ£o lÃ³gica e fÃ­sica','S'),(34,'Elaborar/alterar o  Modelo Dimensional de Dados (MDM) â€“ VisÃ£o lÃ³gica e fÃ­sica','S'),(35,'Verificar Conformidade de Modelo de  Entidade  Relacionamento  (MER) â€“ VisÃ£o lÃ³gica e fÃ­sica','S'),(36,'Verificar Conformidade de Modelo  Dimensional de Dados  (MDM) â€“ VisÃ£o lÃ³gica e fÃ­sica','S'),(37,'EspecificaÃ§Ã£o funcional do job de  ETL: Resultado da ExtraÃ§Ã£o e REX, Mapa de ExtraÃ§Ã£o: MEX','S'),(38,'EspecificaÃ§Ã£o funcional do job de  ETL: Mapa de TransformaÃ§Ã£o e Carga: MTC','S'),(39,'Elaborar o  Diagrama de TransaÃ§Ã£o (DGT)','S'),(40,'Alterar o  Diagrama de TransaÃ§Ã£o (DGT)','S'),(41,'Elaborar  Diagrama Geral de Procedures (DGP)','S'),(42,'Alterar  Diagrama Geral de Procedures (DGP)','S'),(43,'Elaborar o Diagrama de Processamento Batch (DPB)','S'),(44,'Alterar o Diagrama de Processamento Batch (DPB)','S'),(45,'Especificar a Interface (ESI)','S'),(46,'Alterar a EspecificaÃ§Ã£o da Interface (ESI)','S'),(47,'Especificar a Tela  (EST)  Total/Parcial  (A solicitaÃ§Ã£o de especificaÃ§Ã£o do componente poderÃ¡ ser global ou das par','S'),(48,'Alterar a EspecificaÃ§Ã£o de Tela  (EST)  Total/Parcial   (A solicitaÃ§Ã£o de especificaÃ§Ã£o do componente poderÃ¡ ser global ou das partes solicitadas pelo demandante)','S'),(49,'Especificar um componente (ESC) Total/Parcial (a solicitaÃ§Ã£o de especificaÃ§Ã£o poderÃ¡ ser de todo o componente ou das alteraÃ§Ãµes das partes solicitadas pelo demandante)','S'),(50,'Alt. especificaÃ§Ã£o de componente  (ESC)  Total/Parcial (a solicitaÃ§Ã£o de especificaÃ§Ã£o poderÃ¡ ser todo  componente ou das alteraÃ§Ãµes das partes solicitadas pelo demandante)','S'),(51,'Elaborar o Diagrama de TransiÃ§Ã£o de Estados (DTE)','S'),(52,'Alterar o Diagrama de TransiÃ§Ã£o de Estados (DTE)','S'),(53,'Elaborar o Diagrama de Classes de  Projeto (DCP)','S'),(54,'Alterar o Diagrama de Classes de  Projeto (DCP)','S'),(55,'Elaborar o Diagrama de Componentes  (DGC)','S'),(56,'Alterar o Diagrama de Componentes de  Projeto (DGC)','S'),(57,'Elaborar o Diagrama de SequÃªncia (DGS)','S'),(58,'Alterar o Diagrama de SequÃªncia (DGS)','S'),(59,'Elaborar o  Diagrama de TransaÃ§Ã£o (DGT).','S'),(60,'Alterar o  Diagrama de TransaÃ§Ã£o (DGT).','S'),(61,'Elaborar  Diagrama Geral de Procedures (DGP).','S'),(62,'Alterar  Diagrama Geral de Procedures (DGP).','S'),(63,'Elaborar o Diagrama de Processamento Batch (DPB).','S'),(64,'Alterar o Diagrama de Processamento Batch (DPB).','S'),(65,'Especificar a Interface (ESI).','S'),(66,'Alterar a EspecificaÃ§Ã£o da Interface (ESI).','S'),(67,'Especificar a Tela  (EST)  Total/Parcial  (A solicitaÃ§Ã£o de especificaÃ§Ã£o do componente poderÃ¡ ser global ou das partes solicitadas pelo demandante)','S'),(68,'Alterar a EspecificaÃ§Ã£o de Tela  (EST)  Total/Parcial   (A solicitaÃ§Ã£o de especificaÃ§Ã£o do componente poderÃ¡ ser global ou das partes solicitadas pelo demandante).','S'),(69,'Especificar um componente (ESC) Total/Parcial (a solicitaÃ§Ã£o de especificaÃ§Ã£o poderÃ¡ ser de todo o componente ou das alteraÃ§Ãµes das partes solicitadas)','S'),(70,'Alt. especificaÃ§Ã£o de componente  (ESC)  Total/Parcial (a solicitaÃ§Ã£o de especificaÃ§Ã£o poderÃ¡ ser todo  componente ou das alteraÃ§Ãµes das  partes solicitadas)','S'),(71,'Elaborar o Diagrama de TransiÃ§Ã£o de Estados (DTE).','S'),(72,'Alterar o Diagrama de TransiÃ§Ã£o de Estados (DTE).','S'),(73,'CriaÃ§Ã£o de Ã­ndice primÃ¡rio','S'),(74,'CriaÃ§Ã£o de Ã­ndice secundÃ¡rio','S'),(75,'CriaÃ§Ã£o de Termo em portuguÃªs','S'),(76,'AlteraÃ§Ã£o ou atualizaÃ§Ã£o de termo em portuguÃªs','S'),(77,'CriaÃ§Ã£o de termo em lÃ­ngua estrangeira','S'),(78,'AlteraÃ§Ã£o ou atualizaÃ§Ã£o de termo em lÃ­ngua estrangeira','S'),(79,'Realizar extraÃ§Ã£o e ingestÃ£o de dados internos','S'),(80,'Realizar extraÃ§Ã£o e ingestÃ£o de dados externos (Webscraping)','S'),(81,'Realizar anÃ¡lise descritiva','S'),(82,'Realizar anÃ¡lise para inserÃ§Ã£o de dados','S'),(83,'Construir base para treinamento','S'),(84,'Realizar modelagem','S'),(85,'CriaÃ§Ã£o de Mapa','S'),(86,'AlteraÃ§Ã£o de Mapa','S'),(87,'AlteraÃ§Ã£o (pacote de Mapas)','S'),(88,'CriaÃ§Ã£o de Ã¡rea de dados  (externas)   (Book, Local, Global, Parameter)','S'),(89,'AlteraÃ§Ã£o de Ã¡rea de dados  (externas)  (Book, Local, Global, Parameter)','S'),(90,'AlteraÃ§Ã£o  (pacote de Ã¡reas de dados externas)','S'),(91,'CriaÃ§Ã£o de Objetos Cobol (Programa, Subrotina e Copy)','S'),(92,'AlteraÃ§Ã£o de Objetos Cobol (Programa, Sub-rotina e Copy)','S'),(93,'AlteraÃ§Ã£o (pacote de Objetos Cobol)','S'),(94,'CriaÃ§Ã£o de Objetos Natural (Programa, Subprograma, Subrotina, Helprotina, Copycode)','S'),(95,'AlteraÃ§Ã£o de Objetos Natural (Programa, Subprograma, Subrotina, Helprotina, Copycode)','S'),(96,'AlteraÃ§Ã£o (pacote de Objetos Natural)','S'),(97,'CriaÃ§Ã£o de Procedures','S'),(98,'AlteraÃ§Ã£o de Procedures','S'),(99,'AlteraÃ§Ã£o (Pacote de Procedures)','S'),(100,'CriaÃ§Ã£o de Doc. de procedure (DPC)','S'),(101,'AlteraÃ§Ã£o de Doc. de procedure (DPC)','S'),(102,'AlteraÃ§Ã£o  (Pacote de Doc. de procedure â€“ DPC)','S'),(103,'CriaÃ§Ã£o de Cardlib/Sysin','S'),(104,'AlteraÃ§Ã£o de Cardlib/Sysin','S'),(105,'AlteraÃ§Ã£o  (Pacote de Cardlib/Sysin)','S'),(106,'CriaÃ§Ã£o de Job ou Job@','S'),(107,'AlteraÃ§Ã£o de Job ou Job@','S'),(108,'AlteraÃ§Ã£o (Pacote de Job ou Job@)','S'),(109,'Active Directory/LDAP CriaÃ§Ã£o de programas para manter cadastro do usuÃ¡rio','S'),(110,'Active Directory/LDAP AlteraÃ§Ã£o de programas para manter cadastro do usuÃ¡rio','S'),(111,'Active Directory/LDAP CriaÃ§Ã£o de programas para manter as autorizaÃ§Ãµes do usuÃ¡rio','S'),(112,'Active Directory/LDAP AlteraÃ§Ã£o de programas para manter as autorizaÃ§Ãµes do usuÃ¡rio','S'),(113,'Extrair e validar dados do RACF e Z/OS com o sistema corporativo de gerenciamento de acessos','S'),(114,'CriaÃ§Ã£o de Programa ou Procedures para manter  cadastro do usuÃ¡rio no  RACF','S'),(115,'Manter cadastro do usuÃ¡rio no RACF','S'),(116,'Criar as autorizaÃ§Ãµes do usuÃ¡rio no RACF','S'),(117,'Alterar as autorizaÃ§Ãµes do usuÃ¡rio no RACF','S'),(118,'Extrair dados dos usuÃ¡rios (e suas autorizaÃ§Ãµes) no RACF e validÃ¡-los na base do sistema corporativo de gerenciamento de acesso','S'),(119,'ROSCOE   Manter cadastro do usuÃ¡rio','S'),(120,'CriaÃ§Ã£o de Objeto  (Programa, Sub-rotina, Copy)','S'),(121,'AlteraÃ§Ã£o de Objeto  (Programa, Sub-rotina, Copy)','S'),(122,'ConstruÃ§Ã£o do job ETL','S'),(123,'ConstruÃ§Ã£o de job para geraÃ§Ã£o de bases de dados para treinamento, validaÃ§Ã£o e testes','S'),(124,'Realizar suporte tÃ©cnico em Analytics','S'),(125,'Instalar serviÃ§os/componentes','S'),(126,'Configurar serviÃ§os/componentes','S'),(127,'Realizar pesquisa tÃ©cnica de componentes','S'),(128,'Executar testes','S'),(129,'Elaborar manual de instruÃ§Ãµes','S'),(130,'Elaborar roteiro de instalaÃ§Ã£o/configuraÃ§Ã£o','S'),(131,'Elaborar script de automaÃ§Ã£o','S'),(132,'Solucionar incidente em Big Data','S'),(133,'Construir/alterar relatÃ³rio utilizando ferramentas de visualizaÃ§Ã£o de dados (Ex: Spotfire ou similar)','S'),(134,'Construir/alterar grÃ¡fico utilizando ferramentas de visualizaÃ§Ã£o de dados (Ex: Spotfire ou similar)','S'),(135,'Construir/alterar Indicador utilizando ferramentas de visualizaÃ§Ã£o de dados (Ex: Spotfire ou Similar)','S'),(136,'Construir/alterar Dashboard utilizando ferramentas de visualizaÃ§Ã£o de dados (Ex: Spotfire ou similar)','S'),(137,'Mapear Objeto de Dados','S'),(138,'Realizar suporte tÃ©cnico','S'),(139,'Documentar prÃ¡ticas em VisualizaÃ§Ã£o de Dados','S'),(140,'Construir/alterar funÃ§Ãµes, scripts ou mÃ©tricas calculadas utilizadas em ferramentas de visualizaÃ§Ã£o de dados (Ex: Spotfire ou similar)','S'),(141,'AnÃ¡lise de Performance','S'),(142,'Construir ou alterar script para a criaÃ§Ã£o de imagens de containers','S'),(143,'Realizar pesquisa tÃ©cnica de componentes.','S'),(144,'CriaÃ§Ã£o de  Objetos Assembler  (Sub-rotina)','S'),(145,'AlteraÃ§Ã£o de  Objetos Assembler  (Sub-rotina)','S'),(146,'AlteraÃ§Ã£o  (pacote de Objetos  Assembler)','S'),(147,'ConstruÃ§Ã£o do job Guide','S'),(148,'AlteraÃ§Ã£o de job Guide','S'),(149,'ConstruÃ§Ã£o do job DI','S'),(150,'AlteraÃ§Ã£o de job DI','S'),(151,'EspecificaÃ§Ã£o TÃ©cnica','S'),(152,'ConstruÃ§Ã£o de RelatÃ³rios VA','S'),(153,'CriaÃ§Ã£o de tela HTML ou XHTML ou JSP ou XML ou VTL ou XSL ou Swing ou  AWT ou XUI','S'),(154,'AlteraÃ§Ã£o de tela HTML ou XHTML ou JSP ou XML ou VTL ou XSL ou Swing ou  AWT ou XUI','S'),(155,'CriaÃ§Ã£o CSS ou SCSS','S'),(156,'AlteraÃ§Ã£o CSS ou SCSS','S'),(157,'CriaÃ§Ã£o JavaScript','S'),(158,'AlteraÃ§Ã£o JavaScript','S'),(159,'CriaÃ§Ã£o de arquivo chave/valor ou tipo xml','S'),(160,'AlteraÃ§Ã£o de arquivo chave/valor ou tipo xml','S'),(161,'CriaÃ§Ã£o de objetos de IntegraÃ§Ã£o e NegÃ³cio Java','S'),(162,'AlteraÃ§Ã£o de Objetos de IntegraÃ§Ã£o e NegÃ³cio Java','S'),(163,'AlteraÃ§Ã£o de pacote de Objetos de IntegraÃ§Ã£o e NegÃ³cio Java','S'),(164,'CriaÃ§Ã£o de objetos de IntegraÃ§Ã£o e NegÃ³cio C, C# e C++','S'),(165,'AlteraÃ§Ã£o de Objetos de IntegraÃ§Ã£o e NegÃ³cio C, C# e C++','S'),(166,'AlteraÃ§Ã£o de pacote de Objetos de IntegraÃ§Ã£o e NegÃ³cio C, C# e C++','S'),(167,'CriaÃ§Ã£o de objetos de IntegraÃ§Ã£o e NegÃ³cio .Net','S'),(168,'AlteraÃ§Ã£o de Objetos de IntegraÃ§Ã£o e NegÃ³cio .Net','S'),(169,'AlteraÃ§Ã£o de pacote de Objetos de IntegraÃ§Ã£o e NegÃ³cio .Net','S'),(170,'CriaÃ§Ã£o de objeto de teste automatizado (nÃ£o considerar o teste unitÃ¡rio previsto no PDSTI)','S'),(171,'FormulÃ¡rio','S'),(172,'Web Services','S'),(173,'RelatÃ³rio BIRT','S'),(174,'Flashboards','S'),(175,'NotificaÃ§Ã£o','S'),(176,'Workflow','S'),(177,'Desenvolvimento de pÃ¡gina Web com publicaÃ§Ã£o em WCM','S'),(178,'AlteraÃ§Ã£o de pÃ¡gina  Web com publicaÃ§Ã£o  em WCM','S'),(179,'Desenvolvimento de  Interface de  PublicaÃ§Ã£o com WCM','S'),(180,'AlteraÃ§Ã£o de Interface de PublicaÃ§Ã£o com  WCM','S'),(181,'Desenvolvimento de plugin de  customizaÃ§Ã£o do  WCM','S'),(182,'AlteraÃ§Ã£o de plugin de customizaÃ§Ã£o do  WCM','S'),(183,'Desenvolvimento de pÃ¡gina Web para tema de Portal','S'),(184,'AlteraÃ§Ã£o de pÃ¡gina  Web para tema de Portal','S'),(185,'Desenvolvimento de view de Portlet','S'),(186,'AlteraÃ§Ã£o de view de Portlet','S'),(187,'Framework â€“ CriaÃ§Ã£o de  Classes e Funcionalidades de TransaÃ§Ãµes','S'),(188,'Framework â€“ AlteraÃ§Ã£o de  Classes e Funcionalidades de TransaÃ§Ãµes','S'),(189,'Dispositivo (Hardware) â€“  CriaÃ§Ã£o de Funcionalidades','S'),(190,'Dispositivo (Hardware) â€“  AlteraÃ§Ã£o de Funcionalidades','S'),(191,'MÃ³dulo Auxiliar â€“ CriaÃ§Ã£o de Funcionalidades','S'),(192,'MÃ³dulo Auxiliar â€“ AlteraÃ§Ã£o de  Funcionalidades','S'),(193,'CriaÃ§Ã£o de formulÃ¡rio  (utilizando IDE grÃ¡fica, VTL ou  pÃ¡gina web com  HTML/JavaScript)','S'),(194,'AlteraÃ§Ã£o ou  Reaproveitamento de formulÃ¡rio  (utilizando IDE grÃ¡fica, VTL ou  pÃ¡gina web com  HTML/JavaScript)','S'),(195,'CriaÃ§Ã£o de imagens','S'),(196,'CriaÃ§Ã£o de formulÃ¡rio (exclusivo  para a tecnologia  iText)','S'),(197,'AlteraÃ§Ã£o de formulÃ¡rio (exclusivo para a tecnologia iText)','S'),(198,'CriaÃ§Ã£o de scripts Shell em  JavaScript, Shell, PowerShell,  PowerCli ou linguagem de construÃ§Ã£o de scripts equivalente, utilizado para automaÃ§Ã£o de construÃ§Ã£o de infraestrutura de TI','S'),(199,'AlteraÃ§Ã£o de scripts Shell em  JavaScript, Shell, PowerShell,  PowerCli ou linguagem de construÃ§Ã£o de scripts equivalente, utilizado para automaÃ§Ã£o de construÃ§Ã£o de infraestrutura de TI','S'),(200,'CriaÃ§Ã£o de mÃ³dulo em Python utilizado para automaÃ§Ã£o de construÃ§Ã£o de infraestrutura de TI','S'),(201,'AlteraÃ§Ã£o de mÃ³dulo em Python utilizado para automaÃ§Ã£o de construÃ§Ã£o de infraestrutura de TI','S'),(202,'CriaÃ§Ã£o de mÃ³dulo em Java utilizado para automaÃ§Ã£o de construÃ§Ã£o de infraestrutura de TI','S'),(203,'AlteraÃ§Ã£o de mÃ³dulo em Java utilizado para automaÃ§Ã£o de construÃ§Ã£o de infraestrutura de TI','S'),(204,'ElaboraÃ§Ã£o e criaÃ§Ã£o de arquivo de definiÃ§Ã£o &#34;Dockerfile&#34;','S'),(205,'AlteraÃ§Ã£o de arquivo de definiÃ§Ã£o &#34;Dockerfile&#34;','S'),(206,'ElaboraÃ§Ã£o e criaÃ§Ã£o de arquivo de definiÃ§Ã£o &#34;Docker Compose&#34;','S'),(207,'AlteraÃ§Ã£o de arquivo de definiÃ§Ã£o &#34;Docker Compose&#34;','S'),(208,'DefiniÃ§Ã£o e criaÃ§Ã£o de arquivo de configuraÃ§Ã£o para orquestrador de contÃªineres','S'),(209,'AlteraÃ§Ã£o de arquivo de configuraÃ§Ã£o para orquestrador de contÃªineres','S'),(210,'DefiniÃ§Ã£o e criaÃ§Ã£o de objetos de integraÃ§Ã£o e negÃ³cio Node.js/GoLang/Kotlin','S'),(211,'AlteraÃ§Ã£o de objetos de integraÃ§Ã£o e negÃ³cio Node.js/GoLang/Kotlin','S'),(212,'Desenvolvimento de Interface  (elaboraÃ§Ã£o grÃ¡fica de tela, a partir de especificaÃ§Ã£o tÃ©cnica)','S'),(213,'AlteraÃ§Ã£o de  Interface  (elaboraÃ§Ã£o grÃ¡fica de tela, a partir de especificaÃ§Ã£o tÃ©cnica incluindo-se os componentes de interface','S'),(214,'Desenvolvimento de componente de  interface reutilizÃ¡vel e customizado  (elaboraÃ§Ã£o grÃ¡fica de componente de  interface, solicitada  de forma avulsa, para adiÃ§Ã£o ou  substituiÃ§Ã£o em tela jÃ¡ existente. Ex.:  botÃµes, campo de  texto, etc.)','S'),(215,'AlteraÃ§Ã£o de componente de  interface reutilizÃ¡vel e customizado  (elaboraÃ§Ã£o grÃ¡fica de componente de  interface, solicitada  de forma avulsa, para adiÃ§Ã£o ou  substituiÃ§Ã£o em tela jÃ¡ existente. Ex.:  botÃµes, campo de  texto, etc.)','S'),(216,'Desenvolvimento de funcionalidade nÃ£o vinculada Ã   tela (nÃ£o considerar consumo de serviÃ§o interno. Ex.: serviÃ§os  disponibilizados pelo servidor web.)','S'),(217,'AlteraÃ§Ã£o de funcionalidade nÃ£o  vinculada Ã  tela  (nÃ£o considerar consumo de serviÃ§o interno. Ex.: serviÃ§os  disponibilizados pelo servidor web.)','S'),(218,'Criar consumo de serviÃ§o interno e  tratamento do retorno','S'),(219,'Alterar consumo de serviÃ§o interno e  tratamento de retorno','S'),(220,'Desenvolvimento de captura de dados de  localizaÃ§Ã£o do GPS do dispositivo','S'),(221,'Implementar Widget','S'),(222,'Implementar leitura biomÃ©trica em dispositivo','S'),(223,'Implementar persistÃªncia de dados','S'),(224,'Implementar algoritmo de criptografia','S'),(225,'Implementar Push','S'),(226,'Implementar tratamento ao  receber notificaÃ§Ã£o Push','S'),(227,'Implementar funÃ§Ã£o que acione o NFC do dispositivo','S'),(228,'Implementar animaÃ§Ã£o','S'),(229,'Implementar funÃ§Ã£o que integre a API de terceiros','S'),(230,'Implementar tratamento de imagem','S'),(231,'Implementar tratamento de  arquivos para upload','S'),(232,'Implementar abertura de  aplicativo atravÃ©s de  UrlScheme/Intent','S'),(233,'CodificaÃ§Ã£o de objetos de teste unitÃ¡rio (nÃ£o  considerar o teste  unitÃ¡rio previsto no  PDSTI)','S'),(234,'Load','S'),(235,'Unload','S'),(236,'RecompilaÃ§Ã£o (Objetos Cobol/Natural)','S'),(237,'AprovaÃ§Ã£o de operaÃ§Ã£o no CatÃ¡logo Corporativo de ServiÃ§os de TI (CTL) conforme estabelecido no Processo de Desenvolvimento de SoluÃ§Ãµes de TI (PDSTI)','S'),(238,'Gerenciar Ciclo de Vida  de AplicaÃ§Ãµes','S'),(239,'Estrutura banco de dados (dbdict/datadict)','S'),(240,'Design FormulÃ¡rio (format)','S'),(241,'Regras FormulÃ¡rio (formatcontrol)','S'),(242,'Regras Tela (displayscreen)','S'),(243,'BotÃµes de tela (displayoption)','S'),(244,'Wizards','S'),(245,'Workflow (demais objetos)','S'),(246,'AnÃ¡lise da integraÃ§Ã£o Externa (se jÃ¡ existe ou qual a melhor infraestrutura de comunicaÃ§Ã£o).','S'),(247,'RequisiÃ§Ã£o das necessidades de infraestrutura de comunicaÃ§Ã£o e seguranÃ§a (servidores, regras de firewall, DNS, VIP, VPN e criaÃ§Ã£o do tipo de Transporte - Filas MQ ou EMS).','S'),(248,'AnÃ¡lise do contrato de comunicaÃ§Ã£o â€“ copybook â€“ e operaÃ§Ã£o no catÃ¡logo (tipo, tamanho e quantidade de ocorrÃªncia e caso nÃ£o exista definir essas informaÃ§Ãµes junto ao demandante).','S'),(249,'Criar projeto BW, criar repositÃ³rio GIT, configurar conexÃµes externas','S'),(250,'Alterar projeto BW, repositÃ³rio GIT, reconfigurar conexÃµes externas, reconfigurar transportes e reconfigurar seguranÃ§a.','S'),(251,'Construir uma integraÃ§Ã£o nova para uma operaÃ§Ã£o padrÃ£o IIB.','S'),(252,'Alterar uma integraÃ§Ã£o de uma operaÃ§Ã£o padrÃ£o IIB.','S'),(253,'Validar a integraÃ§Ã£o mediante execuÃ§Ã£o de cenÃ¡rios de uso da soluÃ§Ã£o de negÃ³cio, providenciar e analisar log das execuÃ§Ãµes realizadas. Realizar eventuais ajustes na integraÃ§Ã£o.','S'),(254,'Elaborar o Plano de Testes para execuÃ§Ã£o manual de testes','S'),(255,'Especificar Casos de Testes para execuÃ§Ã£o manual de testes','S'),(256,'Alterar Casos de Testes para execuÃ§Ã£o manual de testes','S'),(257,'Preparar a massa de dados para a execuÃ§Ã£o manual de testes','S'),(258,'Executar manualmente Casos de Teste, analisar os resultados e registrar defeitos detectados (atÃ© 3 ciclos)','S'),(259,'Avaliar os testes realizados de forma manual','S'),(260,'Executar Testes de Compatibilidade','S'),(261,'Elaborar o Plano de Testes para execuÃ§Ã£o automatizada de testes','S'),(262,'Especificar Casos de Teste para execuÃ§Ã£o automatizada de testes','S'),(263,'Codificar script(s) para a realizaÃ§Ã£o automatizada de testes','S'),(264,'Codificar suÃ­te para a execuÃ§Ã£o conjunta de casos de testes  automatizados','S'),(265,'Alterar script(s) para a realizaÃ§Ã£o automatizada de testes','S'),(266,'Alterar suÃ­te para a execuÃ§Ã£o conjunta de casos de testes automatizados','S'),(267,'Preparar a massa de dados para a execuÃ§Ã£o automatizada dos testes','S'),(268,'Executar de forma automatizada Casos de Teste, analisar os resultados e registrar defeitos detectados','S'),(269,'Avaliar os testes realizados de forma automatizada','S');
/*!40000 ALTER TABLE `artefato` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `artefato_complexidade`
--

DROP TABLE IF EXISTS `artefato_complexidade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `artefato_complexidade` (
  `cod_artefato_complexidade` int(11) NOT NULL AUTO_INCREMENT,
  `cod_atividade_artefato` int(11) NOT NULL,
  `cod_complexidade` int(11) NOT NULL,
  PRIMARY KEY (`cod_artefato_complexidade`),
  KEY `artefato_complexidade_atividade_artefato_fk` (`cod_atividade_artefato`),
  KEY `artefato_complexidade_complexidade_fk` (`cod_complexidade`),
  CONSTRAINT `artefato_complexidade_atividade_artefato_fk` FOREIGN KEY (`cod_atividade_artefato`) REFERENCES `atividade_artefato` (`cod_atividade_artefato`),
  CONSTRAINT `artefato_complexidade_complexidade_fk` FOREIGN KEY (`cod_complexidade`) REFERENCES `complexidade` (`cod_complexidade`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `artefato_complexidade`
--

LOCK TABLES `artefato_complexidade` WRITE;
/*!40000 ALTER TABLE `artefato_complexidade` DISABLE KEYS */;
INSERT INTO `artefato_complexidade` VALUES (1,1,1),(2,1,2),(3,4,3),(4,4,4),(5,4,5),(6,5,3),(7,5,4),(8,5,5),(9,6,3),(10,6,4),(11,6,5),(12,7,3),(13,7,4),(14,7,5),(15,8,3),(16,8,4),(17,8,5),(18,9,3),(19,9,4),(20,9,5),(21,10,3),(22,10,4),(23,10,5),(24,11,3),(25,11,4),(26,11,5),(27,12,2),(28,12,3),(29,12,4),(30,12,5),(31,12,6),(32,13,2),(33,13,3),(34,13,4),(35,13,5),(36,13,6),(37,14,2),(38,14,3),(39,14,4),(40,14,5),(41,14,6),(42,15,2),(43,15,3),(44,15,4),(45,15,5),(46,15,6),(47,16,2),(48,16,3),(49,16,4),(50,16,5),(51,16,6),(52,17,1),(53,18,2),(54,18,3),(55,18,4),(56,18,5),(57,18,6),(58,19,2),(59,19,3),(60,19,4),(61,19,5),(62,19,6),(63,20,1),(64,21,3),(65,21,4),(66,21,5);
/*!40000 ALTER TABLE `artefato_complexidade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `atividade`
--

DROP TABLE IF EXISTS `atividade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `atividade` (
  `cod_atividade` int(11) NOT NULL AUTO_INCREMENT,
  `dsc_atividade` varchar(250) DEFAULT NULL,
  `ind_ativo` char(1) DEFAULT NULL,
  PRIMARY KEY (`cod_atividade`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `atividade`
--

LOCK TABLES `atividade` WRITE;
/*!40000 ALTER TABLE `atividade` DISABLE KEYS */;
INSERT INTO `atividade` VALUES (1,'Usabilidade','S'),(2,'Design Sprint','S'),(3,'ComunicaÃ§Ã£o','S'),(4,'Identificar, consolidar e refinar os requisitos','S'),(5,'Modelar Processos','S'),(6,'Projetar o Banco de Dados','S'),(7,'Projetar a VisÃ£o Estruturada','S'),(8,'Projetar a VisÃ£o Orientada a Objeto','S'),(9,'VisionPLUS - Projetar a VisÃ£o Estruturada','S'),(10,'ValidaÃ§Ã£o de Caminho de Acesso','S'),(11,'CriaÃ§Ã£o de Termos no GlossÃ¡rio Corporativos de Termos','S'),(12,'Modelagem estatÃ­stica','S'),(13,'Mapas','S'),(14,'Ãreas de dados (externas)','S'),(15,'Natural e Cobol','S'),(16,'Atividade: Job Control Language (JCL)','S'),(17,'SeguranÃ§a','S'),(18,'VisionPlus','S'),(19,'DW e Analytics','S'),(20,'Assembler','S'),(21,'SAS','S'),(22,'Plataforma DistribuÃ­da','S'),(23,'BMC AR SYSTEM','S'),(24,'Portal Server','S'),(25,'AutomaÃ§Ã£o BancÃ¡ria e Terminais','S'),(26,'FormulÃ¡rios de ImpressÃ£o','S'),(27,'Software de Infraestrutura','S'),(28,'Mobile','S'),(29,'Tarefas correlacionadas Ã  ImplementaÃ§Ã£o','S'),(30,'HP Service Manager','S'),(31,'ServiÃ§os de integraÃ§Ã£o externa','S'),(32,'Planejar, especificar, preparar, executar manualmente e avaliar os testes de sistema funcionais (caixa preta) e de compatibilidade ','S'),(33,'Planejar, especificar, codificar, preparar, executar e avaliar os testes funcionais Automatizados','S');
/*!40000 ALTER TABLE `atividade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `atividade_artefato`
--

DROP TABLE IF EXISTS `atividade_artefato`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `atividade_artefato` (
  `cod_atividade_artefato` int(11) NOT NULL AUTO_INCREMENT,
  `cod_disciplina_atividade` int(11) NOT NULL,
  `cod_artefato` int(11) NOT NULL,
  `cod_tarefa` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`cod_atividade_artefato`),
  KEY `atividade_artefato_disciplina_atividade_fk` (`cod_disciplina_atividade`),
  KEY `atividade_artefato_artefato_fk` (`cod_artefato`),
  CONSTRAINT `atividade_artefato_artefato_fk` FOREIGN KEY (`cod_artefato`) REFERENCES `artefato` (`cod_artefato`),
  CONSTRAINT `atividade_artefato_disciplina_atividade_fk` FOREIGN KEY (`cod_disciplina_atividade`) REFERENCES `disciplina_atividade` (`cod_disciplina_atividade`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `atividade_artefato`
--

LOCK TABLES `atividade_artefato` WRITE;
/*!40000 ALTER TABLE `atividade_artefato` DISABLE KEYS */;
INSERT INTO `atividade_artefato` VALUES (1,1,1,NULL),(2,1,2,NULL),(3,1,3,NULL),(4,5,153,''),(5,5,154,''),(6,5,155,NULL),(7,5,156,NULL),(8,5,157,NULL),(9,5,158,NULL),(10,5,159,NULL),(11,5,160,NULL),(12,5,161,NULL),(13,5,162,'5.10.10'),(14,5,163,'5.10.10'),(15,5,164,NULL),(16,5,165,NULL),(17,5,166,NULL),(18,5,167,NULL),(19,5,168,NULL),(20,5,169,NULL),(21,5,170,NULL);
/*!40000 ALTER TABLE `atividade_artefato` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `complexidade`
--

DROP TABLE IF EXISTS `complexidade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `complexidade` (
  `cod_complexidade` int(11) NOT NULL AUTO_INCREMENT,
  `dsc_complexidade` varchar(100) DEFAULT NULL,
  `ind_ativo` char(1) DEFAULT NULL,
  PRIMARY KEY (`cod_complexidade`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `complexidade`
--

LOCK TABLES `complexidade` WRITE;
/*!40000 ALTER TABLE `complexidade` DISABLE KEYS */;
INSERT INTO `complexidade` VALUES (1,'N/A','S'),(2,'Muito Baixa','S'),(3,'Baixa','S'),(4,'MÃ©dia','S'),(5,'Alta','S'),(6,'Muito Alta','S');
/*!40000 ALTER TABLE `complexidade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `complexidade_componente`
--

DROP TABLE IF EXISTS `complexidade_componente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `complexidade_componente` (
  `cod_complexidade_componente` int(11) NOT NULL AUTO_INCREMENT,
  `cod_artefato_complexidade` int(11) NOT NULL,
  `cod_componente` int(11) NOT NULL,
  `qtd_pontos` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`cod_complexidade_componente`),
  KEY `complexidade_componente_artefato_complexidade_fk` (`cod_artefato_complexidade`),
  KEY `complexidade_componente_componente_fk` (`cod_componente`),
  CONSTRAINT `complexidade_componente_artefato_complexidade_fk` FOREIGN KEY (`cod_artefato_complexidade`) REFERENCES `artefato_complexidade` (`cod_artefato_complexidade`),
  CONSTRAINT `complexidade_componente_componente_fk` FOREIGN KEY (`cod_componente`) REFERENCES `componente` (`cod_componente`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `complexidade_componente`
--

LOCK TABLES `complexidade_componente` WRITE;
/*!40000 ALTER TABLE `complexidade_componente` DISABLE KEYS */;
INSERT INTO `complexidade_componente` VALUES (1,32,1,0.50),(2,33,1,2.00),(3,34,1,6.00),(4,35,1,10.00),(5,36,1,20.00),(6,29,1,12.00);
/*!40000 ALTER TABLE `complexidade_componente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `componente`
--

DROP TABLE IF EXISTS `componente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `componente` (
  `cod_componente` int(11) NOT NULL AUTO_INCREMENT,
  `dsc_componente` varchar(100) DEFAULT NULL,
  `ind_ativo` char(1) DEFAULT NULL,
  PRIMARY KEY (`cod_componente`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `componente`
--

LOCK TABLES `componente` WRITE;
/*!40000 ALTER TABLE `componente` DISABLE KEYS */;
INSERT INTO `componente` VALUES (1,'N/A','S');
/*!40000 ALTER TABLE `componente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `disciplina`
--

DROP TABLE IF EXISTS `disciplina`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `disciplina` (
  `cod_disciplina` int(11) NOT NULL AUTO_INCREMENT,
  `dsc_disciplina` varchar(100) DEFAULT NULL,
  `ind_ativo` char(1) DEFAULT NULL,
  PRIMARY KEY (`cod_disciplina`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `disciplina`
--

LOCK TABLES `disciplina` WRITE;
/*!40000 ALTER TABLE `disciplina` DISABLE KEYS */;
INSERT INTO `disciplina` VALUES (1,'User Experience (UX)','S'),(2,'REQUISITOS DE SOFTWARE','S'),(3,'DESIGN DE PROCESSOS','S'),(4,'ANÃLISE E PROJETO DE SOFTWARE','S'),(5,'IMPLEMENTAÃ‡ÃƒO DE SOFTWARE','S'),(6,'TESTE E HOMOLOGAÃ‡ÃƒO DE SOFTWARE','S');
/*!40000 ALTER TABLE `disciplina` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `disciplina_atividade`
--

DROP TABLE IF EXISTS `disciplina_atividade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `disciplina_atividade` (
  `cod_disciplina` int(11) NOT NULL,
  `cod_atividade` int(11) NOT NULL,
  `cod_disciplina_atividade` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`cod_disciplina_atividade`),
  KEY `disciplina_atividade_disciplina_fk` (`cod_disciplina`),
  KEY `disciplina_atividade_atividade_fk` (`cod_atividade`),
  CONSTRAINT `disciplina_atividade_atividade_fk` FOREIGN KEY (`cod_atividade`) REFERENCES `atividade` (`cod_atividade`),
  CONSTRAINT `disciplina_atividade_disciplina_fk` FOREIGN KEY (`cod_disciplina`) REFERENCES `disciplina` (`cod_disciplina`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `disciplina_atividade`
--

LOCK TABLES `disciplina_atividade` WRITE;
/*!40000 ALTER TABLE `disciplina_atividade` DISABLE KEYS */;
INSERT INTO `disciplina_atividade` VALUES (1,1,1),(1,2,2),(1,3,3),(1,4,4),(5,22,5),(5,13,6),(5,14,7),(5,15,8),(5,16,9),(5,17,10),(5,18,11),(5,19,12),(5,20,13),(5,21,14),(5,23,15),(5,24,16),(5,25,17),(5,26,18),(5,27,19),(5,28,20),(5,29,21),(5,30,22),(5,31,23);
/*!40000 ALTER TABLE `disciplina_atividade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `execucao`
--

DROP TABLE IF EXISTS `execucao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `execucao` (
  `cod_execucao` int(11) NOT NULL AUTO_INCREMENT,
  `cod_of` varchar(35) DEFAULT NULL,
  `cod_usuario` int(11) DEFAULT NULL,
  `ind_status` char(1) DEFAULT NULL,
  `nro_mes_referencia` int(11) DEFAULT NULL,
  `nro_ano_referencia` int(11) DEFAULT NULL,
  PRIMARY KEY (`cod_execucao`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `execucao`
--

LOCK TABLES `execucao` WRITE;
/*!40000 ALTER TABLE `execucao` DISABLE KEYS */;
INSERT INTO `execucao` VALUES (1,'Control-M-Set',1,'F',9,2019),(2,'SandBox-Set',1,'F',9,2019),(3,'SandBox',1,'E',10,2019);
/*!40000 ALTER TABLE `execucao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `execucao_arquivos`
--

DROP TABLE IF EXISTS `execucao_arquivos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `execucao_arquivos` (
  `cod_execucao_arquivo` int(11) NOT NULL AUTO_INCREMENT,
  `nme_arquivo` varchar(250) DEFAULT NULL,
  `cod_execucao_complexidade` int(11) NOT NULL,
  PRIMARY KEY (`cod_execucao_arquivo`),
  KEY `execucao_arquivos_execucao_complexidade_fk` (`cod_execucao_complexidade`),
  CONSTRAINT `execucao_arquivos_execucao_complexidade_fk` FOREIGN KEY (`cod_execucao_complexidade`) REFERENCES `execucao_complexidade` (`cod_execucao_complexidade`)
) ENGINE=InnoDB AUTO_INCREMENT=172 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `execucao_arquivos`
--

LOCK TABLES `execucao_arquivos` WRITE;
/*!40000 ALTER TABLE `execucao_arquivos` DISABLE KEYS */;
INSERT INTO `execucao_arquivos` VALUES (1,'/big-plataforma-api/src/main/java/br/com/bb/big/rest/WsControlM.java â€“ alterarEstadoJob',1),(2,'/big-plataforma-api/src/main/java/br/com/bb/big/negocio/ControlMNegocio.java â€“ alterarEstadoJob',1),(3,'/big-plataforma-api/src/main/java/br/com/bb/big/dao/ControlMDAO.java â€“ alterarEstadoJob',1),(4,'/big-plataforma-api/src/main/java/br/com/bb/big/model/comuns/Job.java â€“ alterarEstadoJob',1),(5,'/big-plataforma-api/src/main/java/br/com/bb/big/model/comuns/Ambiente.java â€“ alterarEstadoJob',1),(6,'/big-plataforma-api/src/main/java/br/com/bb/big/model/comuns/EstadoJob.java â€“ alterarEstadoJob',1),(7,'/big-plataforma-api/src/main/java/br/com/bb/big/model/comuns/SequencialJob.java â€“ alterarEstadoJob',1),(8,'/big-plataforma-api/src/main/java/br/com/bb/big/rest/WsControlM.java â€“  montarFolders',2),(9,'/big-plataforma-api/src/main/java/br/com/bb/big/negocio/ControlMNegocio.java â€“ montarFolders',2),(10,'/big-plataforma-api/src/main/java/br/com/bb/big/dao/ControlMDAO.java â€“ montarFolders',2),(11,'/big-plataforma-api/src/main/java/br/com/bb/big/model/comuns/Job.java â€“ montarFolders',2),(12,'/big-plataforma-api/src/main/java/br/com/bb/big/model/comuns/Ambiente.java â€“ montarFolders',2),(13,'/big-plataforma-api/src/main/java/br/com/bb/big/model/comuns/EstadoJob.java â€“ montarFolders',2),(14,'/big-plataforma-api/src/main/java/br/com/bb/big/model/comuns/SequencialJob.java â€“ montarFolders',2),(15,'/big-plataforma-api/src/main/java/br/com/bb/big/rest/WsControlM.java â€“  criarJobControlM',3),(16,'/big-plataforma-api/src/main/java/br/com/bb/big/negocio/ControlMNegocio.java â€“ criarJobControlM',3),(17,'/big-plataforma-api/src/main/java/br/com/bb/big/dao/ControlMDAO.java â€“ criarJobControlM',3),(18,'/big-plataforma-api/src/main/java/br/com/bb/big/model/comuns/Job.java â€“ criarJobControlM',3),(19,'/big-plataforma-api/src/main/java/br/com/bb/big/model/comuns/Ambiente.java â€“ criarJobControlM',3),(20,'/big-plataforma-api/src/main/java/br/com/bb/big/model/comuns/EstadoJob.java â€“ criarJobControlM',3),(21,'/big-plataforma-api/src/main/java/br/com/bb/big/model/comuns/SequencialJob.java â€“ criarJobControlM',3),(22,'/big-plataforma-api/src/main/java/br/com/bb/big/rest/WsControlM.java â€“  gerarJson',4),(23,'/big-plataforma-api/src/main/java/br/com/bb/big/negocio/ControlMNegocio.java â€“ gerarJson',4),(24,'/big-plataforma-api/src/main/java/br/com/bb/big/dao/ControlMDAO.java â€“ gerarJson',4),(25,'/big-plataforma-api/src/main/java/br/com/bb/big/model/comuns/Job.java â€“ gerarJson',4),(26,'/big-plataforma-api/src/main/java/br/com/bb/big/model/comuns/Ambiente.java â€“ gerarJson',4),(27,'/big-plataforma-api/src/main/java/br/com/bb/big/model/comuns/EstadoJob.java â€“ gerarJson',4),(28,'/big-plataforma-api/src/main/java/br/com/bb/big/model/comuns/SequencialJob.java â€“ gerarJson',4),(29,'/big-plataforma-api/src/main/java/br/com/bb/big/rest/WsControlM.java â€“  connectControlM',5),(30,'/big-plataforma-api/src/main/java/br/com/bb/big/negocio/ControlMNegocio.java â€“ connectControlM',5),(31,'/big-plataforma-api/src/main/java/br/com/bb/big/dao/ControlMDAO.java â€“ connectControlM',5),(32,'/big-plataforma-api/src/main/java/br/com/bb/big/model/comuns/Job.java â€“ connectControlM',5),(33,'/big-plataforma-api/src/main/java/br/com/bb/big/model/comuns/Ambiente.java â€“ connectControlM',5),(34,'/big-plataforma-api/src/main/java/br/com/bb/big/model/comuns/EstadoJob.java â€“ connectControlM',5),(35,'/big-plataforma-api/src/main/java/br/com/bb/big/model/comuns/SequencialJob.java â€“ connectControlM',5),(36,'/big-plataforma-api/src/main/java/br/com/bb/big/rest/WsControlM.java â€“  enviaArquivoControlM',6),(37,'/big-plataforma-api/src/main/java/br/com/bb/big/negocio/ControlMNegocio.java â€“ enviaArquivoControlM',6),(38,'/big-plataforma-api/src/main/java/br/com/bb/big/dao/ControlMDAO.java â€“ enviaArquivoControlM',6),(39,'/big-plataforma-api/src/main/java/br/com/bb/big/model/comuns/Job.java â€“ enviaArquivoControlM',6),(40,'/big-plataforma-api/src/main/java/br/com/bb/big/model/comuns/Ambiente.java â€“ enviaArquivoControlM',6),(41,'/big-plataforma-api/src/main/java/br/com/bb/big/model/comuns/EstadoJob.java â€“ enviaArquivoControlM',6),(42,'/big-plataforma-api/src/main/java/br/com/bb/big/model/comuns/SequencialJob.java â€“ enviaArquivoControlM',6),(43,'/big-plataforma-api/src/main/java/br/com/bb/big/rest/WsControlM.java â€“  montarJobs',7),(44,'/big-plataforma-api/src/main/java/br/com/bb/big/negocio/ControlMNegocio.java â€“ montarJobs',7),(45,'/big-plataforma-api/src/main/java/br/com/bb/big/dao/ControlMDAO.java â€“ montarJobs',7),(46,'/big-plataforma-api/src/main/java/br/com/bb/big/model/comuns/Job.java â€“ montarJobs',7),(47,'/big-plataforma-api/src/main/java/br/com/bb/big/model/comuns/Ambiente.java â€“ montarJobs',7),(48,'/big-plataforma-api/src/main/java/br/com/bb/big/model/comuns/EstadoJob.java â€“ montarJobs',7),(49,'/big-plataforma-api/src/main/java/br/com/bb/big/model/comuns/SequencialJob.java â€“ montarJobs',7),(50,'/big-plataforma-api/src/main/java/br/com/bb/big/rest/WsControlM.java â€“  montaFlow',8),(51,'/big-plataforma-api/src/main/java/br/com/bb/big/negocio/ControlMNegocio.java â€“ montaFlow',8),(52,'/big-plataforma-api/src/main/java/br/com/bb/big/dao/ControlMDAO.java â€“ montaFlow',8),(53,'/big-plataforma-api/src/main/java/br/com/bb/big/model/comuns/Job.java â€“ montaFlow',8),(54,'/big-plataforma-api/src/main/java/br/com/bb/big/model/comuns/Ambiente.java â€“ montaFlow',8),(55,'/big-plataforma-api/src/main/java/br/com/bb/big/model/comuns/EstadoJob.java â€“ montaFlow',8),(56,'/big-plataforma-api/src/main/java/br/com/bb/big/model/comuns/SequencialJob.java â€“ montaFlow',8),(57,'/big-plataforma-api/src/main/java/br/com/bb/big/rest/WsControlM.java â€“  montaPeriodicidade',9),(58,'/big-plataforma-api/src/main/java/br/com/bb/big/negocio/ControlMNegocio.java â€“ montaPeriodicidade',9),(59,'/big-plataforma-api/src/main/java/br/com/bb/big/dao/ControlMDAO.java â€“ montaPeriodicidade',9),(60,'/big-plataforma-api/src/main/java/br/com/bb/big/model/comuns/Job.java â€“ montaPeriodicidade',9),(61,'/big-plataforma-api/src/main/java/br/com/bb/big/model/comuns/Ambiente.java â€“ montaPeriodicidade',9),(62,'/big-plataforma-api/src/main/java/br/com/bb/big/model/comuns/EstadoJob.java â€“ montaPeriodicidade',9),(63,'/big-plataforma-api/src/main/java/br/com/bb/big/model/comuns/SequencialJob.java â€“ montaPeriodicidade',9),(64,'/big-plataforma-api/src/main/java/br/com/bb/big/rest/WsControlM.java - Incluir campo cÃ­clico',10),(65,'/big-plataforma-api/src/main/java/br/com/bb/big/negocio/ControlMNegocio.java - Incluir campo cÃ­clico',10),(66,'/big-plataforma-api/src/main/java/br/com/bb/big/model/comuns/Job.java - Incluir campo cÃ­clico',10),(67,'/big-plataforma-api/src/main/java/br/com/bb/big/model/comuns/Ambiente.java - Incluir campo cÃ­clico',10),(68,'/big-plataforma-api/src/main/java/br/com/bb/big/dao/ControlMDAO.java - Incluir campo cÃ­clico',10),(69,'/big-plataforma-api/src/main/java/br/com/bb/big/rest/WsControlM.java - listarScripts',11),(70,'/big-plataforma-api/src/main/java/br/com/bb/big/negocio/ScriptExecucaoNegocio.java - listarScripts',11),(71,'/big-plataforma-api/src/main/java/br/com/bb/big/dao/ScriptExecucaoDAO.java - listarScripts',11),(72,'/big-plataforma-api/src/main/java/br/com/bb/big/model/comuns/ScriptExecucao.java - listarScripts',11),(73,'/big-plataforma-api/src/main/java/br/com/bb/big/rest/WsControlM.java â€“  adicionar estrutura if',12),(74,'/big-plataforma-api/src/main/java/br/com/bb/big/negocio/ControlMNegocio.java â€“ adicionar estrutura if',12),(75,'/big-plataforma-api/src/main/java/br/com/bb/big/dao/ControlMDAO.java â€“ adicionar estrutura if',12),(76,'/big-plataforma-api/src/main/java/br/com/bb/big/model/comuns/Job.java â€“ adicionar estrutura if',12),(77,'/big-plataforma-api/src/main/java/br/com/bb/big/model/comuns/Ambiente.java â€“ adicionar estrutura if',12),(78,'/big-plataforma-api/src/main/java/br/com/bb/big/model/comuns/EstadoJob.java â€“ adicionar estrutura if',12),(79,'/big-plataforma-api/src/main/java/br/com/bb/big/model/comuns/SequencialJob.java â€“ adicionar estrutura if',12),(80,'/big-plataforma-api/src/main/java/br/com/bb/big/rest/WsControlM.java â€“  adicionar estrutura variables',13),(81,'/big-plataforma-api/src/main/java/br/com/bb/big/negocio/ControlMNegocio.java â€“ adicionar estrutura variables',13),(82,'/big-plataforma-api/src/main/java/br/com/bb/big/dao/ControlMDAO.java â€“ adicionar estrutura variables',13),(83,'/big-plataforma-api/src/main/java/br/com/bb/big/model/comuns/Job.java â€“ adicionar estrutura variables',13),(84,'/big-plataforma-api/src/main/java/br/com/bb/big/model/comuns/Ambiente.java â€“ adicionar estrutura variables',13),(85,'/big-plataforma-api/src/main/java/br/com/bb/big/model/comuns/EstadoJob.java â€“ adicionar estrutura variables',13),(86,'/big-plataforma-api/src/main/java/br/com/bb/big/model/comuns/SequencialJob.java â€“ adicionar estrutura variables',13),(87,'/big-plataforma-api/src/main/java/br/com/bb/big/rest/WsBigPlataformada.java â€“ criarPapelSistema',14),(88,'/big-plataforma-api/src/main/java/br/com/bb/big/negocio/SistemaNegocio.java â€“ criarPapelSistema',14),(89,'/big-plataforma-api/src/main/java/br/com/bb/big/dao/SistemaDAO.java â€“ criarPapelSistema',14),(90,'/big-plataforma-api/src/main/java/br/com/bb/big/model/comuns/AreaTrabalho.java â€“ criarPapelSistema',14),(91,'/big-plataforma-api/operacoes.xml - Op4166615',15),(94,'/big-plataforma-api/src/main/java/br/com/bb/big/negocio/SistemaNegocio.java',16),(95,'/big-plataforma-api/src/main/java/br/com/bb/big/rest/WsBigPlataformada.java',16),(97,'/big-plataforma-api/src/main/java/br/com/bb/big/dao/SistemaDAO.java',16),(98,'/big-plataforma-api/src/main/java/br/com/bb/big/model/comuns/AreaTrabalho.java',16),(99,'/big-plataforma-api/src/main/java/br/com/bb/big/model/comuns/IntervencaoAreaTrabalho.java',16),(100,'/big-plataforma-api/src/main/java/br/com/bb/big/model/comuns/UsuarioNotificacao.java',16),(102,'/big-plataforma-api/src/main/java/br/com/bb/big/negocio/AmbienteNegocio.java',17),(104,'/big-plataforma-api/src/main/java/br/com/bb/big/dao/AmbienteDAO.java',17),(105,'/big-plataforma-api/src/main/java/br/com/bb/big/model/comuns/Ambiente.java',17),(106,'/big-plataforma-api/src/main/java/br/com/bb/big/rest/WsControlM.java - listarAmbiente',17),(108,'/big-plataforma-api/src/main/java/br/com/bb/big/negocio/AssuntoNegocio.java',18),(109,'/big-plataforma-api/src/main/java/br/com/bb/big/model/comuns/Assunto.java',18),(110,'/big-plataforma-api/src/main/java/br/com/bb/big/dao/AssuntoDAO.java',18),(112,'/big-plataforma-api/src/main/java/br/com/bb/big/rest/WsControlM.java - listarAssunto',18),(113,'/big-plataforma-api/src/main/java/br/com/bb/big/negocio/ControlMNegocio.java',19),(115,'/big-plataforma-api/src/main/java/br/com/bb/big/dao/ControlMDAO.java',19),(116,'/big-plataforma-api/src/main/java/br/com/bb/big/rest/WsControlM.java - listarJobs',19),(117,'/big-plataforma-api/src/main/java/br/com/bb/big/model/comuns/Job.java',19),(118,'/big-plataforma-api/src/main/java/br/com/bb/big/model/comuns/ScriptExecucao.java - listarJobs',19),(119,'/big-plataforma-api/src/main/java/br/com/bb/big/model/comuns/SequencialJob.java - listarJobs',19),(120,'/big-plataforma-api/src/main/java/br/com/bb/big/model/comuns/EstadoJob.java - salvarJob',19),(121,'/big-plataforma-api/src/main/java/br/com/bb/big/model/comuns/IntervencaoJob.java - salvarJob',19),(123,'/big-plataforma-api/src/main/java/br/com/bb/big/rest/WsControlM.java - listarGrupos',20),(124,'/big-plataforma-api/src/main/java/br/com/bb/big/negocio/GrupoNegocio.java - listarGrupos',20),(126,'/big-plataforma-api/src/main/java/br/com/bb/big/dao/GrupoDAO.java',20),(127,'/big-plataforma-api/src/main/java/br/com/bb/big/model/comuns/Grupo.java - listarGrupos',20),(129,'/big-plataforma-api/src/main/java/br/com/bb/big/negocio/IntervencaoNegocio.java - listarIntervencoes',21),(131,'/big-plataforma-api/src/main/java/br/com/bb/big/rest/WsControlM.java - listarIntervencoes',21),(132,'/big-plataforma-api/src/main/java/br/com/bb/big/model/comuns/EstadoJob.java - listarIntervencoes',21),(134,'/big-plataforma-api/src/main/java/br/com/bb/big/dao/IntervencaoDAO.java - listarIntervencoes',21),(135,'/big-plataforma-api/src/main/java/br/com/bb/big/model/comuns/PeriodoRepeticao.java - listarPeriodicidade',22),(136,'/big-plataforma-api/src/main/java/br/com/bb/big/negocio/PeriodicidadeNegocio.java - listarPeriodicidade',22),(138,'/big-plataforma-api/src/main/java/br/com/bb/big/model/comuns/Periodicidade.java - listarPeriodoRepeticao',22),(140,'/big-plataforma-api/src/main/java/br/com/bb/big/dao/PeriodicidadeDAO.java - listarPeriodicidade',22),(141,'/big-plataforma-api/src/main/java/br/com/bb/big/rest/WsControlM.java - listarPeriodicidade',22),(142,'/big-plataforma-api/src/main/java/br/com/bb/big/negocio/ScriptExecucaoNegocio.java - listarScripts',23),(145,'/big-plataforma-api/src/main/java/br/com/bb/big/dao/ScriptExecucaoDAO.java - listarScripts',23),(146,'/big-plataforma-api/src/main/java/br/com/bb/big/model/comuns/ScriptExecucao.java - listarScripts',23),(147,'/big-plataforma-api/src/main/java/br/com/bb/big/rest/WsControlM.java - listarScripts',23),(148,'/big-plataforma-api/src/main/java/br/com/bb/big/rest/WsControlM.java - listarSequencialJobs',24),(149,'/big-plataforma-api/src/main/java/br/com/bb/big/negocio/SequenciaJobsNegocio.java - listarSequencialNegocio',24),(151,'/big-plataforma-api/src/main/java/br/com/bb/big/dao/SequenciaJobsDAO.java - listarSequencialJobs',24),(153,'/big-plataforma-api/src/main/java/br/com/bb/big/model/comuns/SequencialJob.java - listarSequencialJobs',24),(154,'/big-plataforma-api/src/test/java/br/com/bb/sandBox/SandBoxTest.java',25),(155,'/big-plataforma-api/src/test/java/br/com/bb/sandBox/SistemaDaoTest.java',25),(156,'/big-plataforma-api/src/test/java/br/com/bb/ControlM/AmbienteNegocioTest.java',25),(157,'/big-plataforma-api/src/test/java/br/com/bb/ControlM/AmbienteDaoTest.java',25),(158,'/big-plataforma-api/src/test/java/br/com/bb/ControlM/AssuntoNegocioTest.java',25),(159,'/big-plataforma-api/src/test/java/br/com/bb/ControlM/AssuntoDaoTest.java',25),(160,'/big-plataforma-api/src/test/java/br/com/bb/ControlM/ControlMNegocioTest.java',25),(161,'/big-plataforma-api/src/test/java/br/com/bb/ControlM/ControlMDaoTest.java',25),(162,'/big-plataforma-api/src/test/java/br/com/bb/ControlM/GrupoNegocioTest.java',25),(163,'/big-plataforma-api/src/test/java/br/com/bb/ControlM/ControlMDaoTest.java',25),(164,'/big-plataforma-api/src/test/java/br/com/bb/ControlM/IntervencaoNegocioTest.java - listarIntervencoes',25),(165,'/big-plataforma-api/src/test/java/br/com/bb/ControlM/IntervencaoDaoTest.java',25),(166,'/big-plataforma-api/src/test/java/br/com/bb/ControlM/PeriodicidadeNegocioTest.java',25),(167,'/big-plataforma-api/src/test/java/br/com/bb/ControlM/PeriodicidadeDaoTest.java',25),(168,'/big-plataforma-api/src/test/java/br/com/bb/ControlM/ScriptExecucaoNegocioTest.java',25),(169,'/big-plataforma-api/src/test/java/br/com/bb/ControlM/ScriptExecucaoDaoTest.java',25),(170,'/big-plataforma-api/src/test/java/br/com/bb/ControlM/SequenciaJobsNegocioTest.java',25),(171,'/big-plataforma-api/src/test/java/br/com/bb/ControlM/SequenciaJobsDaoTest.java',25);
/*!40000 ALTER TABLE `execucao_arquivos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `execucao_complexidade`
--

DROP TABLE IF EXISTS `execucao_complexidade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `execucao_complexidade` (
  `cod_execucao_complexidade` int(11) NOT NULL,
  `cod_execucao` int(11) NOT NULL,
  `cod_complexidade_componente` int(11) DEFAULT NULL,
  `dta_registro` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cod_execucao_complexidade`),
  KEY `execucao_complexidade_execucao_fk` (`cod_execucao`),
  KEY `execucao_complexidade_complexidade_componente_fk` (`cod_complexidade_componente`),
  CONSTRAINT `execucao_complexidade_complexidade_componente_fk` FOREIGN KEY (`cod_complexidade_componente`) REFERENCES `complexidade_componente` (`cod_complexidade_componente`),
  CONSTRAINT `execucao_complexidade_execucao_fk` FOREIGN KEY (`cod_execucao`) REFERENCES `execucao` (`cod_execucao`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `execucao_complexidade`
--

LOCK TABLES `execucao_complexidade` WRITE;
/*!40000 ALTER TABLE `execucao_complexidade` DISABLE KEYS */;
INSERT INTO `execucao_complexidade` VALUES (1,1,3,'2019-09-23 07:59:49'),(2,1,3,'2019-09-23 08:01:12'),(3,1,3,'2019-09-23 08:02:21'),(4,1,3,'2019-09-23 08:05:08'),(5,1,3,'2019-09-23 08:06:13'),(6,1,3,'2019-09-23 08:45:31'),(7,1,3,'2019-09-23 08:59:26'),(8,1,3,'2019-09-23 09:03:56'),(9,1,3,'2019-09-23 09:05:34'),(10,1,3,'2019-09-23 09:06:48'),(11,1,6,'2019-09-23 09:09:22'),(12,1,3,'2019-09-23 09:10:04'),(13,1,3,'2019-09-23 09:12:01'),(14,2,3,'2019-09-23 09:25:23'),(15,2,3,'2019-09-26 13:11:09'),(16,3,3,'2019-10-02 08:59:57'),(17,3,3,'2019-10-03 09:26:34'),(18,3,3,'2019-10-03 09:36:35'),(19,3,3,'2019-10-03 09:55:59'),(20,3,3,'2019-10-04 07:39:51'),(21,3,3,'2019-10-04 07:51:44'),(22,3,3,'2019-10-04 08:20:29'),(23,3,3,'2019-10-04 08:32:24'),(24,3,3,'2019-10-04 09:38:01'),(25,3,6,'2019-10-04 13:00:11');
/*!40000 ALTER TABLE `execucao_complexidade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `re_permissao_perfil`
--

DROP TABLE IF EXISTS `re_permissao_perfil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `re_permissao_perfil` (
  `cod_perfil` int(11) NOT NULL,
  `cod_perfil_acesso` int(11) NOT NULL,
  PRIMARY KEY (`cod_perfil`,`cod_perfil_acesso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `re_permissao_perfil`
--

LOCK TABLES `re_permissao_perfil` WRITE;
/*!40000 ALTER TABLE `re_permissao_perfil` DISABLE KEYS */;
/*!40000 ALTER TABLE `re_permissao_perfil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `se_menu`
--

DROP TABLE IF EXISTS `se_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `se_menu` (
  `cod_menu_w` int(11) NOT NULL,
  `dsc_menu_w` varchar(100) DEFAULT NULL,
  `nme_controller` varchar(1000) DEFAULT NULL,
  `ind_menu_ativo_w` char(1) DEFAULT NULL,
  `cod_menu_pai_w` int(11) DEFAULT NULL,
  `nme_method` varchar(100) DEFAULT NULL,
  `dsc_caminho_imagem` varchar(1000) DEFAULT NULL,
  `ind_atalho` char(1) DEFAULT NULL,
  `ind_visible` char(1) DEFAULT NULL,
  PRIMARY KEY (`cod_menu_w`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `se_menu`
--

LOCK TABLES `se_menu` WRITE;
/*!40000 ALTER TABLE `se_menu` DISABLE KEYS */;
INSERT INTO `se_menu` VALUES (1,'VerificaSessao','MenuPrincipal','S',0,'VerificaSessao',NULL,'N','N'),(2,'CarregaMenuNew','MenuPrincipal','S',0,'CarregaMenuNew',NULL,'N','N'),(3,'Restrito',NULL,'S',0,NULL,NULL,'N','S'),(4,'Menus','Menu','S',3,'ChamaView',NULL,'N','S'),(5,'ListaMenus','Menu','S',3,'ListaMenus',NULL,'N','N'),(6,'ListarMenusGrid','Menu','S',3,'ListarMenusGrid',NULL,'N','N'),(7,'uploadArquivo','Menu','S',3,'uploadArquivo',NULL,'N','N'),(8,'AddMenu','Menu','S',3,'AddMenu',NULL,'N','N'),(9,'listarController','Menu','S',4,'listarController','','','N'),(10,'ListarMetodos','Menu','S',4,'ListarMetodos','','','N'),(11,'PermissÃ£o Menu','PermissaoMenu','S',3,'ChamaView','','','S'),(12,'ListarMenus','PermissaoMenu','S',11,'ListarMenus','','','N'),(13,'UpdateMenu','Menu','S',4,'UpdateMenu','','','N'),(14,'AtualizaPermissoes','PermissaoMenu','S',11,'AtualizaPermissoes','','','N'),(15,'Perfil','Perfil','S',3,'ChamaView','','','S'),(16,'ListarPerfilAtivo','Perfil','S',15,'ListarPerfilAtivo','','','N'),(17,'Montar Arquivos','MontaFile','S',3,'ChamaView','','','S'),(18,'ListarTabelas','MontaFile','S',17,'ListarTabelas','','','N'),(19,'GeraFile','MontaFile','S',17,'GeraFile','','','N'),(20,'Cadastro','','S',0,'','','','S'),(21,'1 - Disciplina','Disciplina','S',20,'ChamaView','','','S'),(22,'ListarDisciplina','Disciplina','S',21,'ListarDisciplina','','','N'),(23,'InsertDisciplina','Disciplina','S',21,'InsertDisciplina','','','N'),(24,'UpdateDisciplina','Disciplina','S',21,'UpdateDisciplina','','','N'),(25,'2 - Atividade','Atividade','S',20,'ChamaView','','','S'),(26,'ListarAtividade','Atividade','S',25,'ListarAtividade','','','N'),(27,'InsertAtividade','Atividade','S',25,'InsertAtividade','','','N'),(28,'UpdateAtividade','Atividade','S',25,'UpdateAtividade','','','N'),(29,'3 - Artefatos','Artefato','S',20,'ChamaView','','','S'),(30,'ListarArtefato','Artefato','S',29,'ListarArtefato','','','N'),(31,'InsertArtefato','Artefato','S',29,'InsertArtefato','','','N'),(32,'UpdateArtefato','Artefato','S',29,'UpdateArtefato','','','N'),(33,'4 - Complexidade','Complexidade','S',20,'ChamaView','','','S'),(34,'ListarComplexidade','Complexidade','S',33,'ListarComplexidade','','','N'),(35,'InsertComplexidade','Complexidade','S',33,'InsertComplexidade','','','N'),(36,'UpdateComplexidade','Complexidade','S',33,'UpdateComplexidade','','','N'),(37,'5 - Componente','Componente','S',20,'ChamaView','','','S'),(38,'ListarComponente','Componente','S',37,'ListarComponente','','','N'),(39,'InsertComponente','Componente','S',37,'InsertComponente','','','N'),(40,'UpdateComponente','Componente','S',37,'UpdateComponente','','','N'),(41,'1 - Disciplina Atividade','DisciplinaAtividade','S',61,'ChamaView','','','S'),(42,'ListarDisciplinaCombo','Disciplina','S',21,'ListarDisciplinaCombo','','','N'),(43,'ListarDisciplinaAtividadePorDisciplina','DisciplinaAtividade','S',41,'ListarDisciplinaAtividadePorDisciplina','','','N'),(44,'ListarAtividadeCombo','Atividade','S',25,'ListarAtividadeCombo','','','N'),(45,'InsertDisciplinaAtividade','DisciplinaAtividade','S',41,'InsertDisciplinaAtividade','','','N'),(46,'2 - Atividade Artefato','AtividadeArtefato','S',61,'ChamaView','','','S'),(47,'ListarAtividadeArtefato','AtividadeArtefato','S',46,'ListarAtividadeArtefato','','','N'),(48,'InsertAtividadeArtefato','AtividadeArtefato','S',46,'InsertAtividadeArtefato','','','N'),(49,'UpdateAtividadeArtefato','AtividadeArtefato','S',46,'UpdateAtividadeArtefato','','','N'),(50,'ListarDisciplinaAtividadeCombo','DisciplinaAtividade','S',41,'ListarDisciplinaAtividadeCombo','','','N'),(51,'ListarArtefatoCombo','Artefato','S',29,'ListarArtefatoCombo','','','N'),(52,'ListarAtividadeArtefatoPorDisciplinaAtividade','AtividadeArtefato','S',46,'ListarAtividadeArtefatoPorDisciplinaAtividade','','','N'),(53,'ListarDisciplinaAtividadeArtefatoCombo','AtividadeArtefato','S',46,'ListarDisciplinaAtividadeArtefatoCombo','','','N'),(54,'3 - Artefato Complexidade','ArtefatoComplexidade','S',61,'ChamaView','','','S'),(55,'ListarArtefatoComplexidade','ArtefatoComplexidade','S',54,'ListarArtefatoComplexidade','','','N'),(56,'InsertArtefatoComplexidade','ArtefatoComplexidade','S',54,'InsertArtefatoComplexidade','','','N'),(57,'UpdateArtefatoComplexidade','ArtefatoComplexidade','S',54,'UpdateArtefatoComplexidade','','','N'),(58,'ListarAtividadeComboPorDisciplina','Atividade','S',25,'ListarAtividadeComboPorDisciplina','','','N'),(59,'ListarArtefatoComplexidadePorAtividadeArtefato','ArtefatoComplexidade','S',54,'ListarArtefatoComplexidadePorAtividadeArtefato','','','N'),(60,'ListarComplexidadeCombo','Complexidade','S',33,'ListarComplexidadeCombo','','','N'),(61,'Relacionamentos','','S',0,'','','','S'),(62,'4 - Complexidade Componente','ComplexidadeComponente','S',61,'ChamaView','','','S'),(63,'ListarComplexidadeComponente','ComplexidadeComponente','S',62,'ListarComplexidadeComponente','','','N'),(64,'InsertComplexidadeComponente','ComplexidadeComponente','S',62,'InsertComplexidadeComponente','','','N'),(65,'UpdateComplexidadeComponente','ComplexidadeComponente','S',62,'UpdateComplexidadeComponente','','','N'),(66,'ListarArtefatoPorDisciplinaAtividadeCombo','Artefato','S',29,'ListarArtefatoPorDisciplinaAtividadeCombo','','','N'),(67,'ListarComplexidadePorAtividadeArtefatoCombo','Complexidade','S',33,'ListarComplexidadePorAtividadeArtefatoCombo','','','N'),(68,'ListarComplexidadeComponentePorArtefatoComplexidade','ComplexidadeComponente','S',62,'ListarComplexidadeComponentePorArtefatoComplexidade','','','N'),(69,'ListarComponenteCombo','Componente','S',37,'ListarComponenteCombo','','','N'),(70,'ExecuÃ§Ã£o','Execucao','S',20,'ChamaView','Resources/images/orcamento.png','','S'),(71,'ListarExecucao','Execucao','S',70,'ListarExecucao','','','N'),(72,'InsertExecucao','Execucao','S',70,'InsertExecucao','','','N'),(73,'UpdateExecucao','Execucao','S',70,'UpdateExecucao','','','N'),(74,'ListarComponentePorArtefatoComplexidadeCombo','Componente','S',37,'ListarComponentePorArtefatoComplexidadeCombo','','','N'),(75,'ListarExecucaoArquivos','ExecucaoArquivos','S',70,'ListarExecucaoArquivos','','','N'),(76,'ListarExecucaoPorOf','Execucao','S',70,'ListarExecucaoPorOf','','','N'),(77,'ListarExecucaoComplexidade','ExecucaoComplexidade','S',70,'ListarExecucaoComplexidade','','','N'),(78,'InsertExecucaoComplexidade','ExecucaoComplexidade','S',70,'InsertExecucaoComplexidade','','','N'),(79,'UpdateExecucaoComplexidade','ExecucaoComplexidade','S',70,'UpdateExecucaoComplexidade','','','N'),(80,'InsertExecucaoArquivos','ExecucaoArquivos','S',70,'InsertExecucaoArquivos','','','N'),(81,'DeleteExecucaoArquivos','ExecucaoArquivos','S',70,'DeleteExecucaoArquivos','','','N'),(82,'ClonarDados','ExecucaoComplexidade','S',70,'ClonarDados','','','N'),(83,'DeleteExecucaoComplexidade','ExecucaoComplexidade','S',70,'DeleteExecucaoComplexidade','','','N'),(84,'DeleteExecucao','Execucao','S',70,'DeleteExecucao','','','N'),(85,'ListarPerfil','Perfil','S',15,'ListarPerfil','','','N'),(86,'AddPerfil','Perfil','S',15,'AddPerfil','','','N'),(87,'UpdatePerfil','Perfil','S',15,'UpdatePerfil','','','N'),(88,'UsuÃ¡rios','Usuario','S',3,'ChamaView','','','S'),(89,'ListarUsuario','Usuario','S',88,'ListarUsuario','','','N'),(90,'AddUsuario','Usuario','S',88,'AddUsuario','','','N'),(91,'UpdateUsuario','Usuario','S',88,'UpdateUsuario','','','N'),(92,'ListarUsuarioCombo','Usuario','S',88,'ListarUsuarioCombo','','','N'),(93,'RelatÃ³rios','','S',0,'','','','S'),(94,'RelatÃ³rio Gerencial','RelatorioGerencial','S',93,'ChamaView','','','S'),(95,'ListarRelatorioGerencial','RelatorioGerencial','S',94,'ListarRelatorioGerencial','','','N'),(96,'GrÃ¡fico Anual','GraficoAnual','S',93,'ChamaView','','','S'),(97,'ListarGraficoAnual','GraficoAnual','S',96,'ListarGraficoAnual','','','N'),(98,'RelatÃ³rio de PontuaÃ§Ã£o por UsuÃ¡rio','RelatorioPontuacaoUsuario','S',93,'ChamaView','','','S'),(99,'ListarRelatorioPontuacaoUsuario','RelatorioPontuacaoUsuario','S',98,'ListarRelatorioPontuacaoUsuario','','','N');
/*!40000 ALTER TABLE `se_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `se_menu_perfil`
--

DROP TABLE IF EXISTS `se_menu_perfil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `se_menu_perfil` (
  `cod_perfil_w` int(11) DEFAULT NULL,
  `cod_menu_w` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `se_menu_perfil`
--

LOCK TABLES `se_menu_perfil` WRITE;
/*!40000 ALTER TABLE `se_menu_perfil` DISABLE KEYS */;
INSERT INTO `se_menu_perfil` VALUES (2,20),(2,2),(2,1),(2,42),(2,58),(2,66),(2,60),(2,67),(2,74),(2,70),(2,82),(2,84),(2,81),(2,83),(2,72),(2,80),(2,78),(2,71),(2,75),(2,77),(2,76),(2,73),(2,79),(3,20),(3,2),(3,61),(3,1),(3,23),(3,22),(3,42),(3,24),(3,45),(3,50),(3,43),(3,27),(3,26),(3,44),(3,58),(3,28),(3,48),(3,47),(3,52),(3,53),(3,49),(3,56),(3,55),(3,59),(3,57),(3,31),(3,30),(3,51),(3,66),(3,32),(3,35),(3,34),(3,60),(3,67),(3,36),(3,64),(3,63),(3,68),(3,65),(3,39),(3,38),(3,69),(3,74),(3,40),(3,21),(3,25),(3,29),(3,33),(3,37),(3,70),(3,82),(3,84),(3,81),(3,83),(3,72),(3,80),(3,78),(3,71),(3,75),(3,77),(3,76),(3,73),(3,79),(3,41),(3,46),(3,54),(3,62),(1,20),(1,2),(1,61),(1,93),(1,3),(1,1),(1,23),(1,22),(1,42),(1,24),(1,45),(1,50),(1,43),(1,27),(1,26),(1,44),(1,58),(1,28),(1,48),(1,47),(1,52),(1,53),(1,49),(1,56),(1,55),(1,59),(1,57),(1,31),(1,30),(1,51),(1,66),(1,32),(1,35),(1,34),(1,60),(1,67),(1,36),(1,64),(1,63),(1,68),(1,65),(1,39),(1,38),(1,69),(1,74),(1,40),(1,21),(1,25),(1,29),(1,33),(1,37),(1,70),(1,82),(1,84),(1,81),(1,83),(1,72),(1,80),(1,78),(1,71),(1,75),(1,77),(1,76),(1,73),(1,79),(1,97),(1,9),(1,10),(1,13),(1,19),(1,18),(1,86),(1,85),(1,16),(1,87),(1,14),(1,12),(1,41),(1,46),(1,54),(1,62),(1,99),(1,95),(1,96),(1,98),(1,94),(1,8),(1,5),(1,6),(1,4),(1,17),(1,15),(1,11),(1,7),(1,88),(1,90),(1,89),(1,92),(1,91);
/*!40000 ALTER TABLE `se_menu_perfil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `se_perfil`
--

DROP TABLE IF EXISTS `se_perfil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `se_perfil` (
  `cod_perfil_w` int(11) NOT NULL,
  `dsc_perfil_w` varchar(50) DEFAULT NULL,
  `ind_ativo` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `se_perfil`
--

LOCK TABLES `se_perfil` WRITE;
/*!40000 ALTER TABLE `se_perfil` DISABLE KEYS */;
INSERT INTO `se_perfil` VALUES (1,'Administrador','S'),(2,'FuncionÃ¡rio','S'),(3,'Gerente','S');
/*!40000 ALTER TABLE `se_perfil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `se_usuario`
--

DROP TABLE IF EXISTS `se_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `se_usuario` (
  `cod_usuario` int(11) NOT NULL,
  `nme_usuario` varchar(50) DEFAULT NULL,
  `nme_usuario_completo` varchar(60) DEFAULT NULL,
  `txt_senha_w` varchar(1000) DEFAULT NULL,
  `ind_logado` int(11) DEFAULT NULL,
  `data_logado` datetime DEFAULT NULL,
  `nro_tel_celular` varchar(50) DEFAULT NULL,
  `txt_email` varchar(60) DEFAULT NULL,
  `dta_inativo` datetime DEFAULT NULL,
  `cod_deposito` int(11) DEFAULT NULL,
  `cod_perfil_w` int(11) DEFAULT NULL,
  `vlr_porcentagem_servico` float DEFAULT NULL,
  `vlr_porcentagem_venda` float DEFAULT NULL,
  `vlr_porcentagem_gerencia` float DEFAULT NULL,
  `ind_ativo` char(1) DEFAULT NULL,
  `nro_cpf` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `se_usuario`
--

LOCK TABLES `se_usuario` WRITE;
/*!40000 ALTER TABLE `se_usuario` DISABLE KEYS */;
INSERT INTO `se_usuario` VALUES (1,'1','Rafael Freitas Carneiro','c4ca4238a0b923820dcc509a6f75849b',NULL,NULL,NULL,'',NULL,1,1,NULL,NULL,NULL,'S',NULL),(2,'funcionario','FuncionÃ¡rio','c4ca4238a0b923820dcc509a6f75849b',NULL,NULL,NULL,'',NULL,NULL,2,NULL,NULL,NULL,'S',''),(3,'Gerente','Gerente','c4ca4238a0b923820dcc509a6f75849b',NULL,NULL,NULL,'',NULL,NULL,3,NULL,NULL,NULL,'S','');
/*!40000 ALTER TABLE `se_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'sago'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-10-14 18:34:31
