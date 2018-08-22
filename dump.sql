-- MySQL dump 10.13  Distrib 5.7.14, for Win64 (x86_64)
--
-- Host: localhost    Database: barema
-- ------------------------------------------------------
-- Server version	5.7.14-log

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
-- Current Database: `barema`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `barema` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `barema`;

--
-- Table structure for table `avaliacao_oral`
--

DROP TABLE IF EXISTS `avaliacao_oral`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `avaliacao_oral` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `avaliador_id` int(11) NOT NULL,
  `trabalho_id` int(11) NOT NULL,
  `c1` int(11) DEFAULT NULL,
  `c2` int(11) DEFAULT NULL,
  `c3` int(11) DEFAULT NULL,
  `c4` int(11) DEFAULT NULL,
  `c5` int(11) DEFAULT NULL,
  `c6` int(11) DEFAULT NULL,
  `c7` int(11) DEFAULT NULL,
  `c8` int(11) DEFAULT NULL,
  `c9` int(11) DEFAULT NULL,
  `c10` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `avaliador_id` (`avaliador_id`),
  KEY `trabalho_id` (`trabalho_id`),
  CONSTRAINT `avaliacao_oral_ibfk_1` FOREIGN KEY (`avaliador_id`) REFERENCES `avaliador` (`id`),
  CONSTRAINT `avaliacao_oral_ibfk_2` FOREIGN KEY (`trabalho_id`) REFERENCES `trabalho` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `avaliacao_oral`
--

LOCK TABLES `avaliacao_oral` WRITE;
/*!40000 ALTER TABLE `avaliacao_oral` DISABLE KEYS */;
/*!40000 ALTER TABLE `avaliacao_oral` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `avaliacao_poster`
--

DROP TABLE IF EXISTS `avaliacao_poster`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `avaliacao_poster` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `avaliador_id` int(11) NOT NULL,
  `trabalho_id` int(11) NOT NULL,
  `c1` int(11) DEFAULT NULL,
  `c2` int(11) DEFAULT NULL,
  `c3` int(11) DEFAULT NULL,
  `c4` int(11) DEFAULT NULL,
  `c5` int(11) DEFAULT NULL,
  `c6` int(11) DEFAULT NULL,
  `c7` int(11) DEFAULT NULL,
  `c8` int(11) DEFAULT NULL,
  `c9` int(11) DEFAULT NULL,
  `c10` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `avaliador_id` (`avaliador_id`),
  KEY `trabalho_id` (`trabalho_id`),
  CONSTRAINT `avaliacao_poster_ibfk_1` FOREIGN KEY (`avaliador_id`) REFERENCES `avaliador` (`id`),
  CONSTRAINT `avaliacao_poster_ibfk_2` FOREIGN KEY (`trabalho_id`) REFERENCES `trabalho` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `avaliacao_poster`
--

LOCK TABLES `avaliacao_poster` WRITE;
/*!40000 ALTER TABLE `avaliacao_poster` DISABLE KEYS */;
/*!40000 ALTER TABLE `avaliacao_poster` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `avaliador`
--

DROP TABLE IF EXISTS `avaliador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `avaliador` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `avaliador`
--

LOCK TABLES `avaliador` WRITE;
/*!40000 ALTER TABLE `avaliador` DISABLE KEYS */;
INSERT INTO `avaliador` VALUES (1,'daniel');
/*!40000 ALTER TABLE `avaliador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trabalho`
--

DROP TABLE IF EXISTS `trabalho`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trabalho` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(500) DEFAULT NULL,
  `campus` varchar(500) DEFAULT NULL,
  `area` varchar(200) DEFAULT NULL,
  `categoria` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=372 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trabalho`
--

LOCK TABLES `trabalho` WRITE;
/*!40000 ALTER TABLE `trabalho` DISABLE KEYS */;
INSERT INTO `trabalho` VALUES (119,'ANÁLISE E PLANEJAMENTO DE ARRANJO FÍSICO PARA O CAMPUS RIBEIRÃO DAS NEVES','IFMG CAMPUS RIBEIRÃO DAS NEVES','CIÊNCIAS SOCIAIS APLICADAS','P'),(120,'UM MODELO MATEMÁTICO PARA A ANGIOGÊNESE EM TUMORES SÓLIDOS','IFMG CAMPUS FORMIGA','CIÊNCIAS EXATAS E DA TERRA','P'),(122,'ANÁLISE DO RIBEIRÃO BARONESA EM SANTA LUZIA – MG','IFMG CAMPUS SANTA LUZIA','ENGENHARIAS','P'),(123,'ENGENHARIA CIVIL APLICADA AO SANEAMENTO BÁSICO: IMPLANTAÇÃO DE TÉCNICAS COMPENSATÓRIAS NA REGIÃO NORTE DE BELO HORIZONTE/MG.','IFMG CAMPUS SANTA LUZIA','ENGENHARIAS','P'),(125,'A PERCEPÇÃO DOS ESTUDANTES ACERCA DE DIVERSIDADE DE COR DA PELE EM UM CAMPUS DO IFMG','IFMG CAMPUS RIBEIRÃO DAS NEVES','CIÊNCIAS HUMANAS','P'),(130,'O MOODLE COMO FERRAMENTA PARA O ENSINO DE QUÍMICA NO CAMPUS IFMG/ BETIM','IFMG CAMPUS BETIM','CIÊNCIAS EXATAS E DA TERRA','P'),(131,'AVALIAÇÕES EXTERNAS E A PRÁTICA DOCENTE: CONCEPÇÕES DOS FUTUROS PROFESSORES DE MATEMÁTICA','IFMG CAMPUS FORMIGA','SUBMISSÕES GERAIS','P'),(132,'CALIEMT: CORPUS DE APRENDIZES DA LÍNGUA INGLESA DO ENSINO MÉDIO TÉCNICO','IFMG CAMPUS OURO PRETO','LINGUÍSTICA, LETRAS E ARTES','P'),(133,'O PAPEL DO CONHECIMENTO PRÉVIO NO ENSINO E APRENDIZAGEM DE INGLÊS','IFMG CAMPUS OURO PRETO','LINGUÍSTICA, LETRAS E ARTES','P'),(134,'NARRADORES DE BETIM: TRABALHADORES E MUNDOS DO TRABALHO DA CIDADE DE BETIM (1940-1988)','IFMG CAMPUS BETIM','CIÊNCIAS HUMANAS','P'),(139,'CONVERSATION CLUB: TEMAS TRANSVERSAIS COMO POTENCIALIZADORES DO APRENDIZADO','IFMG CAMPUS OURO PRETO','LINGUÍSTICA, LETRAS E ARTES','P'),(140,'BE THE CHANGE, TAKE THE CHALLENGE: SDGS, ENGLISH TEACHING AND TECHNOLOGY','IFMG CAMPUS OURO PRETO','LINGUÍSTICA, LETRAS E ARTES','P'),(141,'DESENVOLVIMENTO DE UM APLICATIVO ANDROID PARA CÁLCULO DA ALIMENTAÇÃO DE GADO DE LEITE','IFMG CAMPUS BAMBUÍ','CIÊNCIAS EXATAS E DA TERRA','P'),(142,'MODERNIZANDO A GESTÃO DE INFORMAÇÕES DA ASSISTÊNCIA ESTUDANTIL DO IFMG CAMPUS BAMBUÍ COM O APOIO DE UM SISTEMA DE INFORMAÇÃO: RESULTADOS PARCIAIS.','IFMG CAMPUS BAMBUÍ','CIÊNCIAS EXATAS E DA TERRA','P'),(143,'AVALIAÇÃO DA IMPLEMENTAÇÃO DO CAMPUS AVANÇADO DO IFMG NO MUNICÍPIO DE PONTE NOVA','IFMG CAMPUS AVANÇADO PONTE NOVA','CIÊNCIAS SOCIAIS APLICADAS','P'),(144,'ESTUDO DE MELHORIAS DAS HABITAÇÕES DE INTERESSE SOCIAL ATRAVÉS DA APLICAÇÃO DE CONCEITOS DE MODELAGEM DA INFORMAÇÃO DA CONSTRUÇÃO.','IFMG CAMUS AVANÇADO PIUMHI','ENGENHARIAS','O'),(145,'APLICAÇÃO DE PLATAFORMA ARDUINO PARA DESENVOLVIMENTO DE SISTEMA EMBARCADO PARA MEDIDOR DE DISTÂNCIA E CONTROLE DE ACESSO POR SISTEMA RFID','IFMG CAMPUS FORMIGA','ENGENHARIAS','P'),(146,'IMPLEMENTAÇÃO DE CONCEITOS DE MODELAGEM DE INFORMAÇÃO DA CONSTRUÇÃO (BIM) NO PROCESSO DE GESTÃO DA REDE DE ESGOTOS NO MUNICÍPIO DE PIUMHI/MG','IFMG CAMPUS AVANÇADO PIUMHI','ENGENHARIAS','P'),(147,'ERGONOMIA E SEGURANÇA NO TRABALHO DOS FUNCIONÁRIOS DO IFMG – CAMPUS BAMBUÍ','IFMG CAMPUS BAMBUÍ','ENGENHARIAS','P'),(148,'GESTÃO DE RESÍDUOS: UM ESTUDO DE CASO EM UMA EMPRESA ATACADISTA DA ZONA DA MATA MINEIRA','IFMG CAMPUS AVANÇADO PONTE NOVA','CIÊNCIAS SOCIAIS APLICADAS','P'),(149,'PROJETO RIO BETIM: AVALIAÇÃO RÁPIDA AMBIENTAL NA ALTA BACIA DO RIO BETIM','IFMG CAMPUS BETIM','CIÊNCIAS BIOLÓGICAS','P'),(151,'PERFIL DOS DOCENTES DOS INSTITUTOS FEDERAIS: ESTUDO DE CASO NO IFMG','IFMG CAMPUS OURO PRETO','CIÊNCIAS HUMANAS','P'),(152,'SISTEMAS EMBARCADOS PARA O CONTROLE DE INTENSIDADE DE ILUMINAÇÃO E PARA ALARMES DE PRESENÇA DE GASES UTILIZANDO PLATAFORMA ARDUINO','IFMG CAMPUS FORMIGA','ENGENHARIAS','P'),(153,'DESENVOLVIMENTO PROFISSIONAL DOCENTE NOS INSTITUTOS FEDERAIS: MAPEAMENTO E ANÁLISE DE PROGRAMAS DESENVOLVIDOS NA REGIÃO SUDESTE','IFMG CAMPUS OURO PRETO','CIÊNCIAS HUMANAS','P'),(154,'HEFESTUS: SELEÇÃO E DESENVOLVIMENTO DA ELETRÔNICA PARA MONTAGEM DO ROBÔ DE COMPETIÇÃO','IFMG CAMPUS CONGONHAS','ENGENHARIAS','P'),(156,'APLICAÇÃO LITERÁRIA PARA EQUAÇÕES DE DEFINIÇÃO PARA A LOCALIZAÇÃO DO VOLANTE: UM ESTUDO PRELIMINAR PARA DESENVOLVIMENTO DE DISPOSITIVO ERGONÔMICO','IFMG CAMPUS SANTA LUZIA','ENGENHARIAS','P'),(157,'ANÁLISE ERGONÔMICA EM TRÊS DIFERENTES ESCOLAS DE BELO HORIZONTE/MG E REGIÃO METROPOLITANA','IFMG CAMPUS SANTA LUZIA','ENGENHARIAS','P'),(158,'TUTORVIRTUAL - UM CHATBOT PESSOAL PARA AUXILIAR NO PROCESSO DE APRENDIZADO DO INGLÊS','IFMG CAMPUS AVANÇADO PONTE NOVA','CIÊNCIAS EXATAS E DA TERRA','P'),(159,'SÍNTESE E CARACTERIZAÇÃO DE PONTOS QUÂNTICOS COLOIDAIS HIDROFÍLICOS DE SULFETO DE COBRE E ÍNDIO','IFMG CAMPUS AVANÇADO CONSELHEIRO LAFAIETE','CIÊNCIAS EXATAS E DA TERRA','P'),(160,'ALTERNATIVAS DE INTERVENÇÃO PARA CONVIVÊNCIA SUSTENTÁVEL ENTRE PESSOAS E CURSOS D’ÁGUA NA MICROBACIA DO CÓRREGO BARONESA EM SANTA LUZIA - MG','IFMG CAMPUS SANTA LUZIA','CIÊNCIAS SOCIAIS APLICADAS','P'),(161,'CONHECENDO AS POSIÇÕES POLÍTICAS DO JOVEM ESTUDANTE LAFAIETENSE: PESQUISA DE OPINIÃO','IFMG CAMPUS AVANÇADO CONSELHEIRO LAFAIETE','CIÊNCIAS HUMANAS','P'),(162,'DESENVOLVIMENTO DE METODOLOGIAS ALTERNATIVAS PARA DETERMINAÇÃO DE METAIS EM ÓLEOS LUBRIFICANTES','IFMG CAMPUS BETIM','CIÊNCIAS EXATAS E DA TERRA','P'),(163,'VARIAÇÃO E PRECONCEITO LINGUÍSTICO EM REDES SOCIAIS: PRECONCEITO SOCIAL NA RAIZ DO PROBLEMA.','IFMG CAMPUS AVANÇADO CONSELHEIRO LAFAIETE','LINGUÍSTICA, LETRAS E ARTES','P'),(164,'O DESENVOLVIMENTO MUNICIPAL E SUA RELAÇÃO COM OS RESÍDUOS SÓLIDOS GERADOS PELOS SERVIÇOS PÚBLICOS DE SAÚDE NO CENTRO OESTE MINEIRO','IFMG - CAMPUS BAMBUÍ','CIÊNCIAS DA SAÚDE','O'),(165,'FORMAÇÃO EM GESTÃO: UMA ANÁLISE SOB A PERSPECTIVA DO MERCADO DE TRABALHO','IFMG CAMPUS RIBEIRÃO DAS NEVES','CIÊNCIAS SOCIAIS APLICADAS','P'),(171,'CONDIÇÕES DE ENTREGA HÍDRICA DA BACIA DO RIO FIGUEIRINHA: SUBSÍDIO AO PLANEJAMENTO PARA RECUPERAÇÃO HIDROAMBIENTAL DO RIO DOCE – RESULTADOS PRELIMINARES','IFMG CAMPUS GOVERNADOR VALADARES','ENGENHARIAS','P'),(172,'INFLUÊNCIA DO SISTEMA FOTOVOLTAICO NO PREÇO MÉDIO DE ENERGIA ELÉTRICA NO INSTITUTO FEDERAL DE CIÊNCIA E TECNOLOGIA DE MINAS GERAIS CAMPUS FORMIGA','IFMG CAMPUS FORMIGA','ENGENHARIAS','P'),(173,'PROPOSTA DE CURVA QV PARA BARRAMENTOS DE CARGA DE SISTEMAS DE DISTRIBUIÇÃO DE ENERGIA UTILIZANDO REGULADORES DE TENSÃO','IFMG CAMPUS FORMIGA','ENGENHARIAS','P'),(174,'DE AJUSTE DO SISTEMA DE PROTEÇÃO CONSIDERANDO A RELAÇÃO ENTRE CORRENTES DE CURTO CIRCUITO E O NÍVEL DE CARREGAMENTO EM SISTEMAS DE DISTRIBUIÇÃO DE ENERGIA ELÉTRICA.','IFMG CAMPUS FORMIGA','ENGENHARIAS','P'),(175,'MODELO DINÂMICO PARA OTIMIZAR O PROCESSO DE CALCINAÇÃO EM FORNOS VERTICAIS NA REGIÃO CENTRO-OESTE DE MINAS GERAIS.','IFMG CAMPUS FORMIGA','ENGENHARIAS','P'),(176,'ESTUDOS SOBRE A CAPACIDADE DE HOSPEDAGEM DE GERAÇÃO DISTRIBUÍDA EM SISTEMAS ELÉTRICOS DE POTÊNCIA.','IFMG CAMPUS FORMIGA','ENGENHARIAS','P'),(178,'ELETRÔNICA EMBARCADA APLICADA NA AUTOMAÇÃO DE SEMÁFORO URBANO COM SINCRONIZAÇÃO DINÂMICA DOS FARÓIS','IFMG CAMPUS FORMIGA','ENGENHARIAS','P'),(181,'MODELO PARA IMPLANTAÇÃO DA METODOLOGIA SEIS SIGMA EM MICRO E PEQUENAS EMPRESAS (MPE’S) NO SETOR DE CERVEJA ARTESANAL NO BRASIL','IFMG CAMPUS CONGONHAS','ENGENHARIAS','P'),(182,'CONSTRUÇÃO DE UMA MÁQUINA DE ENSAIO DE FADIGA POR FLEXÃO ROTATIVA DE BAIXO CUSTO','IFMG CAMPUS AVANÇADO ARCOS','ENGENHARIAS','P'),(183,'ALGORITMO DE MODIFICAÇÃO DE TRAJETÓRIAS DE VEÍCULOS AUTÔNOMOS A PARTIR DO COMPARTILHAMENTO DE TRAJETÓRIAS','IFMG CAMPUS FORMIGA','ENGENHARIAS','P'),(184,'A INVESTIGAÇÃO DA ESCOLA COMO ESPAÇO QUALIFICADO DE TRATAMENTO E FORMATIVO PARA O PORTADOR DO TRANSTORNO DO ESPECTRO AUTISTA','IFMG CAMPUS RIBEIRÃO DAS NEVES','CIÊNCIAS HUMANAS','P'),(186,'AVALIAÇÃO EXPERIMENTAL DA EFICIÊNCIA NA RETENÇÃO DE SEDIMENTOS SÓLIDOS, EM UM RESERVATÓRIO SEPARADOR DE PRIMEIRAS ÁGUAS DA CHUVA','IFMG CAMPUS SANTA LUZIA','ENGENHARIAS','P'),(187,'NANOTRANSISTOR COM TUNELAMENTO RESSONANTE APLICADO A ELETRÔNICA DE ALTA FREQUÊNCIA','IFMG CAMPUS FORMIGA','ENGENHARIAS','P'),(188,'MEMÓRIAS SOBRE A DITADURA CIVIL-MILITAR DE 1964 NA CIDADE FORMIGA - MG','IFMG CAMPUS FORMIGA','CIÊNCIAS HUMANAS','P'),(189,'PREPARAÇÃO E CARACTERIZAÇÃO DE SUPERCAPCAITORES SÓLIDOS BASEADOS EM ELETRODOS DE NANOTUBOS DE CARBONO E ELETRÓLITO POLIMÉRICO GEL','IFMG CAMPUS BETIM','CIÊNCIAS EXATAS E DA TERRA','P'),(190,'LAYOUT DE TRANSISTORES SEMICONDUTORES NANOESTRUTURADOS PARA ELETRÔNICA DE RESPOSTA EM FREQUÊNCIA ULTRARRÁPIDA','IFMG CAMPUS FORMIGA','ENGENHARIAS','P'),(191,'INTERNET DAS VACAS: MONTAGEM DE PLACA DE PROTÓTIPO DE DISPOSITIVO IOT PARA LOCALIZAÇÃO INTELIGENTE DO GADO.','IFMG CAMPUS AVANÇADO CONSELHEIRO LAFAIETE','ENGENHARIAS','P'),(192,'JARDIM SENSORIAL: UM RECURSO DIDÁTICO','IFMG CAMPUS AVANÇADO CONSELHEIRO LAFAIETE','CIÊNCIAS BIOLÓGICAS','P'),(193,'ELABORAÇÃO DO CATÁLOGO ILUSTRADO SOBRE A COLEÇÃO DE OURIVESARIA DE OURO PRETO - SÉCULOS XVIII E XIX','IFMG CAMPUS OURO PRETO','CIÊNCIAS SOCIAIS APLICADAS','P'),(194,'ANÁLISE BIBLIOMÉTRICA DA RELAÇÃO ENTRE O VIÉS DE CONFIRMAÇÃO E AS ÁREAS DE GESTÃO, FINANÇAS E ECONOMIA','IFMG CAMPUS FORMIGA','CIÊNCIAS SOCIAIS APLICADAS','P'),(195,'CRIAÇÃO DE UM REPOSITÓRIO DE VIDEOAULAS DE QUÍMICA E ESTUDO DE SUAS APLICAÇÕES EM PROCESSOS DE ESTUDOS ORIENTADOS','IFMG CAMPUS RIBEIRÃO DAS NEVES','SUBMISSÕES GERAIS','P'),(196,'DESENVOLVIMENTO E PROPOSIÇÃO DE CONCEITO PARA COMUNICAÇÃO ENTRE REDE CAN AUTOMOTIVA E PLATAFORMA MICROCONTROLADA','IFMG CAMPUS FORMIGA','ENGENHARIAS','P'),(197,'MODELO DINÂMICO PARA OTIMIZAR O PROCESSO DE CALCINAÇÃO EM FORNOS VERTICAIS NA REGIÃO CENTRO-OESTE DE MINAS GERAIS','IFMG CAMPUS FORMIGA','CIÊNCIAS EXATAS E DA TERRA','P'),(198,'AVALIAÇÃO E APLICAÇÃO DE TÉCNICAS DE INTELIGÊNCIA ARTIFICIAL NO DESENVOLVIMENTO DE UM SISTEMA IDENTIFICADOR DE OPORTUNIDADES DE INVESTIMENTO PARA O MERCADO DE AÇÕES','IFMG CAMPUS BAMBUÍ','CIÊNCIAS EXATAS E DA TERRA','P'),(199,'SUPLEMENTAÇÃO DE PIGMENTOS NATURAIS ASSOCIADOS OU NÃO A PIGMENTO SINTÉTICO EM DIETAS PARA POEDEIRAS COMERCIAIS E SEUS EFEITOS SOBRE O DESEMPENHO E QUALIDADE DOS OVOS','IFMG CAMPUS BAMBUÍ','CIÊNCIAS AGRÁRIAS','P'),(200,'ANÁLISE DE PERFORMANCE E ADAPTAÇÃO DE LEIAUTE EM UM SUPERMERCADO DA CIDADE DE FORMIGA','PONTIFÍCIA UNIVERSIDADE CATÓLICA DE MINAS GERIAS - CAMPUS CORACAO EUCARÍSTICO','ENGENHARIAS','P'),(201,'AVALIAÇÃO DA COLORAÇÃO DAS GEMAS DOS OVOS DE POEDEIRAS ALIMENTADAS COM RAÇÃO A BASE DE SORGO E ADIÇÃO DE PIGMENTANTES NATURAIS E SINTÉTICOS','IFMG CAMPUS BAMBUÍ','CIÊNCIAS AGRÁRIAS','P'),(203,'ELABORAÇÃO DE MATERIAIS DIDÁTICOS MULTISSENSORIAIS PARA O ENSINO DE FÍSICA PARA SURDOS','IFMG CAMPUS CONGONHAS','CIÊNCIAS HUMANAS','P'),(204,'SUPLEMENTAÇÃO DE MINERAIS ORGÂNICOS (CROMO E SELÊNIO) EM DIETAS DE FRANGOS CAIPIRA','IFMG CAMPUS BAMBUÍ','CIÊNCIAS AGRÁRIAS','P'),(205,'PROSPECÇÃO DE BACTÉRIAS DO CICLO DO NITROGÊNIO DO SOLO NO PARQUE NACIONAL DA SERRA DA CANASTRA EM DIFERENTES ÁREAS SOB A INFLUÊNCIA DE INCÊNDIOS FLORESTAIS','IFMG CAMPUS BAMBUÍ','CIÊNCIAS BIOLÓGICAS','P'),(210,'A IDEIA DE EDUCAÇÃO EM NIETZSCHE','IFMG CAMPUS SÃO JOÃO EVANGELISTA','CIÊNCIAS HUMANAS','P'),(212,'RESPOSTA DO FEIJOEIRO À INOCULAÇÃO COM RIZÓBIO E À SUPLEMENTAÇÃO COM NITROGÊNIO MINERAL','IFMG CAMPUS BAMBUÍ.','CIÊNCIAS AGRÁRIAS','P'),(213,'ESTATÍSTICA MULTIVARIADA APLICADA À ENGENHARIA DE AVALIAÇÕES','IFMG CAMPUS AVANÇADO PIUMHI','SUBMISSÕES GERAIS','P'),(214,'AVALIAÇÃO DO ACOPLAMENTO ELETROMAGNÉTICO ENTRE LINHAS DE TRANSMISSÃO AÉREAS EM REGIME PERMANENTE E ESTRUTURAS METÁLICAS LOCALIZADAS NA FAIXA DE SERVIDÃO.','IFMG CAMPUS FORMIGA','ENGENHARIAS','P'),(215,'IMPLANTAÇÃO DE SISTEMAS DE REUTILIZAÇÃO DA ÁGUA DESCARTADA PELOS DESTILADORES DO IFMG CAMPUS BAMBUÍ','IFMG CAMPUS BAMBUÍ','SUBMISSÕES GERAIS','P'),(217,'DESENVOLVIMENTO DE UM MEDIDOR DE POTENCIAL HIDROGENIÔNICO PARA DEFICIENTES VISUAIS','IFMG CAMPUS BAMBUÍ','SUBMISSÕES GERAIS','P'),(218,'DIÁLOGOS COM O PATRIMÔNIO- VELOSO, OURO PRETO','IFMG CAMPUS OURO PRETO','CIÊNCIAS SOCIAIS APLICADAS','P'),(219,'POPULAÇÕES VULNERÁVEIS E PATRIMÔNIO CULTURAL URBANO: INVESTIGAÇÃO SOBRE O PROCESSO DE VIVÊNCIA E APROPRIAÇÃO EM OURO PRETO','IFMG CAMPUS OURO PRETO','CIÊNCIAS SOCIAIS APLICADAS','P'),(220,'MODELAGEM E SIMULAÇÃO COMPUTACIONAL DE EVACUAÇÃO EM INSTITUIÇÕES DE ENSINO BASEADO EM  CARACTERÍSTICAS COMPORTAMENTAIS DOS INDIVÍDUOS','IFMG CAMPUS FORMIGA','CIÊNCIAS EXATAS E DA TERRA','P'),(221,'CONTRIBUIÇÕES DO ENFOQUE CTS E A NECESSIDADE DE MUDANÇAS NO PROCESSO DE FORMAÇÃO DO PROFESSOR DE CIÊNCIAS','IFMG - CAMPUS  OURO  BRANCO','CIÊNCIAS HUMANAS','O'),(222,'IMPLANTAÇÃO DE PLUVIÔMETRO CONVENCIONAL NO IFMG CAMPUS CONSELHEIRO LAFAIETE: PRECURSOR DE UMA ESTAÇÃO METEOROLÓGICA','IFMG CAMPUS AVANÇADO CONSELHEIRO LAFAIETE','CIÊNCIAS EXATAS E DA TERRA','P'),(223,'ROBÓTICA DE ASSITÊNCIA','IFMG CAMPUS AVANÇADO CONSELHEIRO LAFAIETE','ENGENHARIAS','P'),(224,'ANÁLISE DE CUSTOS LOGÍSTICOS NO SEGMENTO DE MINERAÇÃO DE PEQUENO PORTE','IFMG CAMPUS CONGONHAS','ENGENHARIAS','P'),(225,'ANÁLISE DE SENTIMENTOS NO TWITTER PARA A IDENTIFICAÇÃO DE ALUNOS DOS INSTITUTOS FEDERAIS COM TRANSTORNO DE ANSIEDADE.','IFMG CAMPUS SABARÁ','CIÊNCIAS EXATAS E DA TERRA','P'),(229,'UTILIZAÇÃO DO INDICADOR DE EFICIÊNCIA GLOBAL DE EQUIPAMENTOS – OEE PARA MELHORIA CONTÍNUA NO PLANEJAMENTO E CONTROLE DE MANUTENÇÃO INDUSTRIAL','IFMG CAMPUS CONGONHAS','ENGENHARIAS','P'),(232,'ATRIBUTOS SENSORIAIS QUE DIRECIONAM A ACEITAÇÃO DO QUEIJO MINAS ARTESANAL PRODUZIDO NA MICRORREGIÃO DE ARAXÁ','IFMG CAMPUS BAMBUÍ','CIÊNCIAS AGRÁRIAS','P'),(235,'VANT APLICADO À PREVISÃO DE INCÊNDIOS FLORESTAIS','IFMG CAMPUS SABARÁ','SUBMISSÕES GERAIS','P'),(236,'UM ESTUDO SOBRE INSTRUMENTOS MUSICAIS ELETROACÚSTICOS: CRIAÇÃO E IMPROVISAÇÃO','IFMG CAMPUS FORMIGA','SUBMISSÕES GERAIS','P'),(237,'CONSIDERAÇÕES PRELIMINARES SOBRE A LIMNOLOGIA DA LAGOA DO IFMG CAMPUS GOVERNADOR VALADARES.','IFMG CAMPUS GOVERNADOR VALADARES','ENGENHARIAS','P'),(238,'ANÁLISE DA SATISFAÇÃO DOS USUÁRIOS DA BIBLIOTECA DO IFMG CAMPUS FORMIGA','PONTIFÍCIA UNIVERSIDADE CATÓLICA DE MINAS GERAIS - CAMPUS CORAÇÃO EUCARÍSTICO - PUC MINAS','SUBMISSÕES GERAIS','P'),(240,'ANÁLISE DE DESEMPENHO DA USINA FOTOVOLTAICA IFMG CAMPUS BETIM','IFMG CAMPUS BETIM','ENGENHARIAS','P'),(241,'AVALIAÇÃO DE INTERVALOS DE APLICAÇÃO DE EXTRATO DE ALGAS MARINHAS (ASCOPHYLLUM NODOSUM) NA PRODUÇÃO DE MUDAS DE CITROS','IFMG-CAMPUS SÃO JOÃO EVANGELISTA','CIÊNCIAS AGRÁRIAS','O'),(242,'PLANTA DIDÁTICA PARA SIMULAÇÃO DE PROCESSOS INDUSTRIAIS','IFMG CAMPUS BAMBUÍ','ENGENHARIAS','P'),(244,'APRIMORAMENTO DE UM SISTEMA DE SECAGEM DE PRODUTOS AGRÍCOLAS AUTOMÁTICO PARA UTILIZAÇÃO COMO PLANTA DIDÁTICA NO CURSO DE AUTOMAÇÃO INDUSTRIAL','IFMG CAMPUS OURO PRETO','CIÊNCIAS AGRÁRIAS','P'),(249,'OS DISCURSOS DE HUMOR E AS REPRESENTAÇÕES DO FEMININO','IFMG CAMPUS BETIM','LINGUÍSTICA, LETRAS E ARTES','P'),(252,'ELABORAÇÃO DE CONSERVAS DE MINIMILHO','IFMG CAMPUS BAMBUÍ','CIÊNCIAS AGRÁRIAS','P'),(253,'UTILIZAÇÃO DA MORINGA OLEIFERA COMO COMPLEMENTO PROTEICO E AVALIAÇÃO DE SUA ATIVIDADE ANTIMICROBIANA EM ALIMENTOS.','IFMG CAMPUS BAMBUÍ','CIÊNCIAS AGRÁRIAS','P'),(254,'AUTORIA FEMININA E OS LIVROS DIDÁTICOS DO PNLD 2018: UM ESTUDO ANALÍTICO','IFMG CAMPUS BETIM','LINGUÍSTICA, LETRAS E ARTES','P'),(256,'SIMULAÇÃO DINÂMICA DE MÁQUINAS ELÉTRICAS COMO FERRAMENTA DE ENSINO NOS LABORATÓRIOS DO CURSO DE ENGENHARIA ELÉTRICA','IFMG CAMPUS FORMIGA','ENGENHARIAS','P'),(257,'A CONTRIBUIÇÃO DO ENSINO INTERDISCIPLINAR NA PREPARAÇÃO DE MODELO VIRTUAL PARA UM AMBIENTE EDUCACIONAL NO INSTITUTO FEDERAL MINAS GERAIS','IFMG CAMPUS SANTA LUZIA','CIÊNCIAS SOCIAIS APLICADAS','P'),(258,'ELABORAÇÃO DE MATERIAIS DIDÁTICOS PARA ENSINO DE INGLÊS APLICADO AO CURSO TÉCNICO DE QUÍMICA','IFMG CAMPUS BETIM','LINGUÍSTICA, LETRAS E ARTES','P'),(259,'PESQUISA, DESENVOLVIMENTO E PRODUÇÃO DE MATERIAL DIDÁTICO EM FORMATO DIGITAL/AUDIOVISUAL: UMA APLICAÇÃO NO ENSINO DE GEOGRAFIA DO IFMG','IFMG CAMPUS OURO PRETO','CIÊNCIAS HUMANAS','P'),(260,'CONDICIONAMENTO OSMÓTICO E EMPREGO DE BIOESTIMULANTE DE ALGAS VERMELHA PARA GERMINAÇÃO DE SEMENTES DE PIMENTE CUMARI.','IFMG CAMPUS BAMBUÍ','CIÊNCIAS AGRÁRIAS','P'),(262,'ANÁLISE DO RESÍDUO DE CAFÉ PARA UTILIZAÇÃO NO CONCRETO','IFMG CAMPUS AVANÇADO PIUMHI','ENGENHARIAS','P'),(263,'A MODELAGEM DA INFORMAÇÃO DA CIDADE (CIM) E A SUSTENTABILIDADE DAS CIDADES','IFMG CAMPUS AVANÇADO PIUMHI','ENGENHARIAS','P'),(264,'CRESCIMENTO INICIAL DA PITAYA (HYLOCEREUS UNDATUS) EM FUNÇÃO DA ADUBAÇÃO COM NPK.','IFMG CAMPUS BAMBUÍ','CIÊNCIAS AGRÁRIAS','P'),(265,'PADRONIZAÇÃO DO CULTIVO BACTERIANO DE UMA LINHAGEM PRODUTORA DE ENZIMA COM IMPORTÂNCIA COMERCIAL','IFMG CAMPUS BETIM','CIÊNCIAS BIOLÓGICAS','P'),(266,'ESTUDO DE CASOS DOS EMPREENDIMENTOS HABITACIONAIS DE INTERESSE SOCIAL NO MUNICÍPIO DE PIUMHI','IFMG CAMPUS AVANÇADO PIUMHI','ENGENHARIAS','P'),(267,'SÍNTESE, CARACTERIZAÇÃO E CÁLCULOS DFT DE 2-ARILIDENO INDAN-1,3-DIONAS','IFMG CAMPUS OURO BRANCO','CIÊNCIAS EXATAS E DA TERRA','P'),(268,'UMA PROPOSTA DE PATH-PLANNING PARA ROBÔS MÓVEIS USANDO INTELIGÊNCIA BASEADA EM ENXAMES','IFMG CAMPUS SABARÁ','CIÊNCIAS EXATAS E DA TERRA','P'),(269,'FRAMEWORK DE AUXÍLIO A AVALIAÇÃO ECONÔMICO-FINANCEIRA DE PROJETOS DE INOVAÇÃO','IFMG CAMPUS FORMIGA','CIÊNCIAS SOCIAIS APLICADAS','P'),(270,'ANÁLISE CONJUNTA DOS VIESES COGNITIVOS EFEITO DOTAÇÃO E EXCESSO DE CONFIANÇA: UM ESTUDO EXPERIMENTAL','IFMG CAMPUS FORMIGA','CIÊNCIAS SOCIAIS APLICADAS','P'),(271,'PROPOSTA DE DESENVOLVIMENTO DE UM SISTEMA BASEADO EM MACHINE LEARNING PARA A GESTÃO DA NEUROCIÊNCIA COGNITIVA','IFMG CAMPUS SABARÁ','CIÊNCIAS EXATAS E DA TERRA','P'),(272,'ESTUDO EXPLORATÓRIO SOBRE SISTEMAS DE INFORMAÇÃO EM MICRO E PEQUENAS EMPRESAS NA REGIÃO DE SÃO JOÃO EVANGELISTA/MG','IFMG CAMPUS SÃO JOÃO EVANGELISTA','SUBMISSÕES GERAIS','P'),(274,'SUPLEMENTAÇÃO DE MINERAIS ORGÂNICOS EM DIETAS PARA FRANGOS CAIPIRA E SEUS EFEITOS SOBRE O DESEMPENHO PRODUTIVO','IFMG CAMPUS BAMBUÍ','CIÊNCIAS AGRÁRIAS','P'),(281,' OBSERVAÇÃO DA PRÁTICA DOCENTE: ANÁLISE DO ENSINO DE ARTE NOS CAMPI DO IFMG – IFMG (BETIM, CONSELHEIRO LAFAIETE E OURO BRANCO)','IFMG CAMPUS BETIM','LINGUÍSTICA, LETRAS E ARTES','P'),(287,'EFEITO DO BIOESTIMULANTE STIMULATE® NO DESENVOLVIMENTO DE MILHO CONVENCIONAL E TRANSGÊNICO EM DIFERENTES DOSES E FORMAS DE APLICAÇÕES.','IFMG CAMPUS SÃO JOÃO EVANGELISTA','CIÊNCIAS AGRÁRIAS','P'),(288,'AUTOMATIZAÇÃO DOS PROCESSOS DE DIVISÃO DA INSTALAÇÃO ELÉTRICA EM CIRCUITOS E BALANCEAMENTO DE FASES EM PROJETOS DE INSTALAÇÕES ELÉTRICAS EM BAIXA TENSÃO','IFMG CAMPUS FORMIGA','ENGENHARIAS','P'),(295,'AVALIAÇÃO DE VARIEDADES DE PIMENTA COMO PORTA-ENXERTO PARA PRODUÇÃO DE MUDAS DE PIMENTÃO','IFMG CAMPUS BAMBUÍ','CIÊNCIAS AGRÁRIAS','P'),(296,'AVALIAÇÃO DA ATIVIDADE BIOCIDA DE EXTRATOS BRUTOS DE PLANTAS MEDICINAIS NATIVAS DO ALTO PARAOPEBA FRENTE À BIODETERIORAÇÃO DA PEDRA SABÃO.','IFMG CAMPUS CONGONHAS','CIÊNCIAS BIOLÓGICAS','P'),(298,'ANÁLISE DA UTILIZAÇÃO DE TECNOLOGIAS DE INFORMAÇÃO NO ENSINO FUNDAMENTAL DE SABARÁ','IFMG CAMPUS SABARÁ','CIÊNCIAS EXATAS E DA TERRA','P'),(299,'SUSTENTABILIDADE EM MEIO ÀS PRÁTICAS POPULARES DE CONFECÇÃO DE OBJETOS E MOBILIÁRIOS: UM CAMINHO PARA O ECODESIGN.','IFMG CAMPUS SANTA LUZIA','CIÊNCIAS SOCIAIS APLICADAS','P'),(300,'APRENDIZAGEM ATIVA POR MEIO DA PLATAFORMA ARDUINO','IFMG CAMPUS FORMIGA','ENGENHARIAS','P'),(301,'ESQUEMAS MOBILIZADOS POR CRIANÇAS SOBRE A FORMAÇÃO DE CORES E SOMBRAS : UMA CONSTRUÇÃO DE INSTRUMENTOS DE ANÁLISE','IFMG CAMPUS OURO BRANCO','CIÊNCIAS HUMANAS','P'),(302,'CÓDIGOS CORRETORES DE ERROS','IFMG - CAMPUS OURO PRETO','CIÊNCIAS EXATAS E DA TERRA','O'),(303,'GERMINAÇÃO DE SEMENTES DE TABEBUIA ROSEO-ALBA E TABEBUIA CHRYSOTRICHA SOB A INFLUÊNCIA DE LUZ','IFMG CAMPUS GOVERNADOR VALADARES','CIÊNCIAS EXATAS E DA TERRA','P'),(304,'VIABILIDADE DE APROVEITAMENTO DO FRUTO DO JOÁ (SOLANUM ACULEATISSIMUM) COMO BIOSSORVENTE NA REMOÇÃO DE CHUMBO – PB (II)','IFMG CAMPUS BETIM','CIÊNCIAS EXATAS E DA TERRA','P'),(306,'AVALIAÇÃO DAS PROPRIEDADES FÍSICO-HÍDRICO DO SOLO NAS ÁREAS DE RECARGAS DE NASCENTES, SOB DIFERENTES USOS DO SOLOS','IFMG CAMPUS SÃO JOÃO EVANGELISTA','CIÊNCIAS AGRÁRIAS','P'),(309,'EXTRAINDO CONHECIMENTO DE DADOS EDUCACIONAIS POR MEIO DE TÉCNICAS DE MINERAÇÃO DE DADOS','IFMG CAMPUS SABARÁ','CIÊNCIAS EXATAS E DA TERRA','P'),(312,'MICROPROPAGAÇÃO IN VITRO DO TOMATE (LYCOPERSICON ESCULENTUM L.) UTILIZANDO GEMA APICAL.','IFMG CAMPUS SÃO JOÃO EVANGELISTA','CIÊNCIAS AGRÁRIAS','P'),(313,'ANÁLISE ERGONÔMICA NO AMBIENTE CONSTRUÍDO DE UMA ESCOLA DA REDE ESTADUAL DO MUNICÍPIO DE SANTA LUZIA/MG','IFMG CAMPUS SANTA LUZIA','CIÊNCIAS SOCIAIS APLICADAS','P'),(315,'EFEITO DE DOSES DE BIORREGULADOR VEGETAL NO DESENVOLVIMENTO DE MUDAS DE CANA-DE-AÇÚCAR PELO SISTEMA DE MUDAS PRÉ-BROTADAS (MPB)','IFMG CAMPUS SÃO JOÃO EVANGELISTA','CIÊNCIAS AGRÁRIAS','P'),(320,'DESENVOLVIMENTO DE UM NOVO PRODUTO PARA PERMITIR QUE UM ALUNO PORTADOR DE DEFICÊNCIA VISUAL PARTICIPE DAS AULAS DE DESENHO TÉCNICO: CRIAÇÃO DE UM LABORATÓRIO 3D','IFMG CAMPUS GOVERNADOR VALADARES','ENGENHARIAS','P'),(321,'SISTEMA PARA A OBTENÇÃO DE DADOS DE ESTRESSE TÉRMICO UTILIZANDO ARDUINO','IFMG CAMPUS GOVERNADOR VALADARES','CIÊNCIAS EXATAS E DA TERRA','P'),(322,'“VIVASABARÁ”: SISTEMA PARA GESTÃO E DIVULGAÇÃO DAS INFORMAÇÕES REFERENTES ÀS AÇÕES DE PROMOÇÃO E PREVENÇÃO DA SAÚDE EM SABARÁ-MG','IFMG CAMPUS SABARÁ','CIÊNCIAS SOCIAIS APLICADAS','P'),(323,'ESTUDO DA QUEDA DE PRESSÃO EM LEITOS FLUIDIZADOS DE ALTOS-FORNOS A COQUE','IFMG CAMPUS OURO BRANCO','ENGENHARIAS','P'),(324,'ENERGIA SOLAR: EVOLUÇÃO E IMPACTOS ENERGÉTICO E AMBIENTAL DA MINI E MICRO GERAÇÃO DISTRIBUÍDA QUE UTILIZA SISTEMAS FOTOVOLTAICOS EM GOVERNADOR VALADARES - MG','IFMG CAMPUS GOVERNADOR VALADARES','CIÊNCIAS EXATAS E DA TERRA','P'),(327,'FADXS NO VALE:REESCRITA DE CONTOS DE FADAS NUMA PERSPECTIVA LGBT','IFMG CAMPUS SANTA LUZIA','LINGUÍSTICA, LETRAS E ARTES','P'),(330,'INFLUÊNCIA DE DIFERENTES DOSES DE SILICATO DE CÁLCIO E MAGNÉSIO NA NODULAÇÃO EM RAÍZES DE FEIJOEIRO (PHASEOLUS VULGARIS L.)','IFMG CAMPUS SÃO JOÃO EVANGELISTA','CIÊNCIAS AGRÁRIAS','P'),(331,'AVALIAÇÃO DO IMPACTO DO USO DE DIFERENTES TIPOS DE TRANSFERIDORES SOBRE A COMPOSIÇÃO DO LEITE UTILIZADO NA PRODUÇÃO DO QUEIJO MINAS ARTESANAL.','IFMG CAMPUS BAMBUÍ','CIÊNCIAS AGRÁRIAS','P'),(333,'A AVALIAÇÃO DAS APRENDIZAGENS SOB A ÓTICA DE DISCENTES DO PRIMEIRO ANO DA LICENCIATURA EM EDUCAÇÃO BÁSICA DO INSTITUTO POLITÉCNICO DE BRAGANÇA','IFMG CAMPUS CONGONHAS','CIÊNCIAS HUMANAS','P'),(336,'ESTUDO DA INCIDÊNCIA DE DESCARGAS ATMOSFÉRICAS NA REGIÃO DE GOVERNADOR VALADARES','IFMG CAMPUS GOVERNADOR VALADARES','CIÊNCIAS EXATAS E DA TERRA','P'),(337,'GESTÃO DA SUB-BACIA HIDROGRÁFICA DO CÓRREGO DO AMBRÓSIO, CAPITÓLIO - MG','IFMG CAMPUS AVANÇADO PIUMHI','ENGENHARIAS','P'),(338,'ESPAÇO DA MEMÓRIA: PRODUÇÃO DE IDENTIDADES, PERTENCIMENTO E EMPODERAMENTO SOCIAL','IFMG CAMPUS SANTA LUZIA','CIÊNCIAS SOCIAIS APLICADAS','P'),(340,'FLUTUAÇÃO POPULACIONAL E DIVERSIDADE DE ESPÉCIES DE MOSCA-DAS-FRUTAS (DIPTERA-TEPHRITIDAE) EM AMBIENTE SILVESTRE E CULTIVADO NO MUNICÍPIO DE SÃO JOÃO EVANGELISTA/MG','IFMG CAMPUS SÃO JOÃO EVANGELISTA','CIÊNCIAS AGRÁRIAS','P'),(341,'DESENVOLVIMENTO DE UMA MÁQUINA PARA ALÍVIO DE TENSÕES MECÂNICAS NO ARAME TREFILADO DE AÇO BAIXO CARBONO SEM TRATAMENTO TÉRMICO.','IFMG CAMPUS CONGONHAS','ENGENHARIAS','O'),(342,'HOSPEDEIROS NATIVOS E EXÓTICOS DE MOSCA-DAS-FRUTAS EM SÃO JOÃO EVANGELISTA, MINAS GERAIS','IFMG CAMPUS SÃO JOÃO EVANGELISTA','CIÊNCIAS AGRÁRIAS','P'),(344,'ISOLAMENTO DE MICRO-ORGANISMOS ORIUNDOS DO PROCESSO DE COMPOSTAGEM DO ALCATRÃO VEGETAL','IFMG CAMPUS SÃO JOÃO EVANGELISTA','CIÊNCIAS AGRÁRIAS','P'),(345,'MÉTODOS CLÁSSICOS DE OTIMIZAÇÃO','IFMG CAMPUS BETIM','ENGENHARIAS','P'),(346,'ANALISE COMPARATIVA ENTRE A LEGISLAÇÃO MUNICIPAL, ESTADUAL E FEDERAL PARA LICENCIAMENTO AMBIENTAL DE LOTEAMENTOS','IFMG CAMPUS GOVERNADOR VALADARES','CIÊNCIAS EXATAS E DA TERRA','P'),(347,'SELEÇÃO DOS MÉTODOS DE QUEBRA DE DORMÊNCIA, TIPOS DE SUBSTRATO E RECIPIENTES EFICIENTES NA GERMINAÇÃO E ESTABELECIMENTO DE PLÂNTULAS DE OLHO DE CABRA (ORMOSIA ARBOREA), GUAPURUVU (SCHIZOLOBIUM PARAHYBA) E FLAMBOYANT (DELONIX REGIA).','IFMG CAMPUS SÃO JOÃO EVANGELISTA','CIÊNCIAS EXATAS E DA TERRA','P'),(348,'ELEMENTOS CONSTRUTIVOS E ASPECTOS FÍSICO-AMBIENTAIS: CONFLITOS E POTENCIALIDADES NA PRODUÇÃO DO ESPAÇO NO ENTORNO DO CAMPUS SANTA LUZIA.','IFMG CAMPUS SANTA LUZIA','CIÊNCIAS SOCIAIS APLICADAS','P'),(350,'PLATAFORMA PARA CLASSIFICAÇÃO DA AMIGABILIDADE DE GÊNERO DAS EMPRESAS DE TECNOLOGIA DA INFORMAÇÃO DO MUNICÍPIO DE BELO HORIZONTE','IFMG CAMPUS SABARÁ','CIÊNCIAS EXATAS E DA TERRA','P'),(352,'ESTUDO PARA A OPERACIONALIZAÇÃO DA RECICLAGEM E REUTILIZAÇÃO DO VIDRO COMO DESCARTE DA POPULAÇÃO DA REGIÃO METROPOLITANA DE BELO HORIZONTE','IFMG CAMPUS RIBEIRÃO DAS NEVES','ENGENHARIAS','P'),(353,'ELABORAÇÃO DE PROJETO CONCEITUAL DE IMPRESSORA 3D MULTIMATERIAL','IFMG CAMPUS CONGONHAS','CIÊNCIAS SOCIAIS APLICADAS','P'),(354,'PRODUÇÃO DE ÁGUA COM A APLICAÇÃO DE PRÁTICAS MECÂNICAS DE CONSERVAÇÃO DO SOLO E DA ÁGUA EM ÁREA DE PASTAGEM DEGRADADA DENTRO DO IFMG – CAMPUS GOVERNADOR VALADARES','IFMG CAMPUS GOVERNADOR VALADARES','CIÊNCIAS AGRÁRIAS','P'),(355,'ALONGAMENTO E ENRAIZAMENTO DE MUDAS MICROPROPAGADAS DE BANANEIRA CV. NANICÃO SOB INFLUÊNCIA DE DIFERENTES CONCENTRAÇÕES DE ÁCIDO INDOLACÉTICO – AIA','IFMG CAMPUS SÃO JOÃO EVANGELISTA','CIÊNCIAS AGRÁRIAS','P'),(356,'IMPLEMENTAÇÃO DE UMA APLICAÇÃO WEB PARA AUXILIAR O PROCESSO DE DESENVOLVIMENTO DE SOFTWARE','IFMG CAMPUS SÃO JOÃO EVANGELISTA','SUBMISSÕES GERAIS','P'),(357,'A APRENDIZAGEM ESCOLAR A PARTIR DE EXPERIMENTOS: CONSTRUINDO DIFERENTES PERSPECTIVAS SOBRE O ENSINO DE FÍSICA.','IFMG CAMPUS CONGONHAS','CIÊNCIAS HUMANAS','P'),(359,'DESENVOLVIMENTO DE UM WEBSITE PARA O INCENTIVO DE DOAÇÕES A ENTIDADES FILANTRÓPICAS','IFMG CAMPUS SÃO JOÃO EVANGELISTA','SUBMISSÕES GERAIS','P'),(361,'NÓS E OS OUTROS: MEMÓRIA E IDENTIDADE NA CONSTRUÇÃO DOS BAIRROS INDUSTRIAIS EM OURO BRANCO-MG (1977-1993)','IFMG CAMPUS OURO BRANCO','CIÊNCIAS HUMANAS','P'),(362,'DESENVOLVIMENTO DE UMA PLATAFORMA WEB DE TUTORIAS PARA OS DISCENTES DO IFMG - CAMPUS SÃO JOÃO EVANGELISTA','IFMG CAMPUS SÃO JOÃO EVANGELISTA','SUBMISSÕES GERAIS','P'),(363,'COMPARATIVO DE DESEMPENHO DE MÁQUINAS DE VETOR DE SUPORTE E DE REDES NEURAIS ARTIFICIAIS EM ANÁLISE DE ASSINATURA ELÉTRICA','IFMG CAMPUS FORMIGA','ENGENHARIAS','P'),(364,'ANÁLISE DE DESEMPENHO DA USINA FOTOVOLTAICA IFMG CAMPUS BETIM','IFMG CAMPUS BETIM','ENGENHARIAS','P'),(365,'APLICAÇÃO E AVALIAÇÃO DO MATERIAL DIDÁTICO PARA ENSINO DE INGLÊS APLICADO AO CURSO TÉCNICO DE QUÍMICA DESENVOLVIDO NO IFMG CAMPUS BETIM','IFMG CAMPUS BETIM','LINGUÍSTICA, LETRAS E ARTES','P'),(366,'LABVERDE: ETAPA DE PESQUISA DE VIABILIDADE TÉCNICA, ECONÔMICA E AÇÕES PARA A IMPLANTAÇÃO E MANUTENÇÃO DE VIVEIRO EDUCATIVO NO CAMPUS IFMG SANTA LUZIA','IFMG CAMPUS SANTA LUZIA','CIÊNCIAS SOCIAIS APLICADAS','P'),(367,'É POSSÍVEL QUE O CINECLUBE ATUE NO SENTIDO DE CONSTITUIR UMA COMUNIDADE DE CINEMA?','IFMG CAMPUS BETIM','CIÊNCIAS HUMANAS','P'),(368,'AVALIAÇÃO DO IMPACTO DA TEMPERATURA NA DINÂMICA DO AEDES NAS CAPITAIS BRASILEIRAS','IFMG CAMPUS SABARÁ','CIÊNCIAS EXATAS E DA TERRA','P'),(369,'EQUAÇÕES DIFERENCIAIS NA ENGENHARIA CIVIL: EQUAÇÃO DA CURVA ELÁSTICA','IFMG CAMPUS AVANÇADO PIUMHI','ENGENHARIAS','P'),(370,'FLORES EM CANTEIROS: A INSERÇÃO DE MULHERES NA CONSTRUÇÃO CIVIL - ESTUDO EXPLORATÓRIO A PARTIR DE ESPAÇOS FORMATIVOS DO IFMG','IFMG CAMPUS AVANÇADO PIUMHI','CIÊNCIAS HUMANAS','P'),(371,'IMPLEMENTAÇÃO DE BIG DATA PARA PROCESSAMENTO DE DADOS DE ALUNOS EGRESSOS EM REDES SOCIAIS POR MEIO DE RECURSOS DE COMPUTAÇÃO EM NUVEM','IFMG CAMPUS RIBEIRÃO DAS NEVES','CIÊNCIAS EXATAS E DA TERRA','P');
/*!40000 ALTER TABLE `trabalho` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-08-22 19:10:17
