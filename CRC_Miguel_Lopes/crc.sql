-- --------------------------------------------------------
-- Anfitrião:                    127.0.0.1
-- Versão do servidor:           5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Versão:              11.1.0.6116
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for crc
CREATE DATABASE IF NOT EXISTS `crc` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `crc`;

-- Dumping structure for table crc.comments
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_post` int(11) NOT NULL,
  `nome` varchar(150) COLLATE utf8_bin NOT NULL,
  `texto` text COLLATE utf8_bin NOT NULL,
  `data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table crc.comments: 7 rows
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` (`id`, `id_post`, `nome`, `texto`, `data`) VALUES
	(1, 1, 'Miguel Lopes', 'Excelente notícia! Parabéns a todos os envolvidos!', '2021-02-28 02:56:04'),
	(33, 3, 'Joana Meireles', 'que horror', '2021-02-28 03:28:32'),
	(3, 1, 'Miguel João', 'Parabéns ao mister, que grande feito!', '2021-02-28 02:56:54'),
	(38, 2, 'João Daniel', 'Não acredito...Que mundo este...', '2021-02-28 12:23:37'),
	(35, 1, 'João Meireles', 'Hoje é toda a noite', '2021-02-28 03:39:55'),
	(44, 3, 'Manel', 'Muito boa sorte a todas as famílias', '2021-03-04 13:04:35');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;

-- Dumping structure for table crc.contactos
CREATE TABLE IF NOT EXISTS `contactos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) COLLATE utf8_bin NOT NULL,
  `horas` varchar(100) COLLATE utf8_bin NOT NULL DEFAULT '',
  `tlm` varchar(20) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL DEFAULT '',
  `map` varchar(100) COLLATE utf8_bin NOT NULL DEFAULT '',
  `info` varchar(256) COLLATE utf8_bin NOT NULL DEFAULT '',
  `website` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `texto` longtext COLLATE utf8_bin NOT NULL,
  `img` varchar(50) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table crc.contactos: 5 rows
/*!40000 ALTER TABLE `contactos` DISABLE KEYS */;
INSERT INTO `contactos` (`id`, `nome`, `horas`, `tlm`, `email`, `map`, `info`, `website`, `texto`, `img`) VALUES
	(1, 'A Nossa Associação', '10-15:30 / 17:30-23:00 (Segunda a Sexta) Sábado: 17:00-02:00', '351 919 999 999', ' crcasconho@gmail.com', '  Rua do Marquês, 1, 9999-9991', 'Capacidade: 200 pessoas -> Reserve já!: Se é sócio, poderá reservar para a sua próxima festa, entre em contacto connosco através do nosso número ou se pretender, através do nosso endereço eletrónico! Qualquer dúvida, não hesite!', '', 'O Centro Recreativo do Casconho foi fundado em 1980 por José Ribeiro e Fernando Lucas, duas das grandes caras do Casconho. Desde então, a nossa associação, já dinamizou várias atividades com o intuito de aproximar todos, entre elas, vários torneios de diferentes desportos, "karaoke nights" e é a principal diversão dos casconhenses pela noite fora em praticamente todos os fins-de-semana. É fácil chegar, o problema é sair!', 'contacto1.jpg'),
	(2, 'Câmara Muncipal de Soure', '9h-17h', '239 506 550', 'geral@cm-soure.pt', 'Praça República 1, 3130-218 Soure', 'Poderá consultar mais informação em:\r\n', ' https://www.cm-soure.pt', 'A Câmara Municipal de Soure tem vindo a consolidar uma política integrada e diversificada de apoios, sempre com dimensão concelhia, opção assumidamente descentralizadora que se tem revelado como um dos vectores mais relevantes na realização efectiva de um investimento público intenso, espacial e funcionalmente equilibrado, estratégia considerada como única e mesmo imperativa, quando o que está em causa é que se continue a fazer de Soure um Concelho cada vez mais atractivo, onde todos se possam sentir cada vez melhor.\r\n\r\n', 'contacto2.jpg'),
	(3, 'Centro de Saúde de Soure\r\n', '9h-17h', '239506630/ 632/ 633', ' usf.vitasaurium@min-saude.pt', ' Cruz Nova 12, 3130-200 Soure', 'Poderá consultar mais informação em:', 'https://sites.google.com/view/usfvitasaurium', 'O Centro de Saúde de Soure tem como visão ser uma unidade prestadora de cuidados de saúde de excelência, próxima do utente em todo o ciclo de vida, baseando a sua ação no trabalho em equipa, integrado e em articulação, dinâmico e em evolução, solidária na prossecução dos objetivos, procurando a satisfação e saúde de todos os intervenientes.', 'contacto3.jpg'),
	(4, 'GNR de Soure', 'Todo o dia', '239506020', ' ct.cbr.dmtv.psor@gnr.pt', 'Avenida Doutor João Esteves Simões, 3130-241 Soure', 'Poderá consultar mais informação em:', 'https://www.gnr.pt/', 'A Guarda Nacional Republicana (GNR) de Soure é uma força de segurança constituída por militares organizados num corpo especial de tropas, encarregado da segurança pública, da manutenção da ordem e da proteção da propriedade pública e privada em todo o território português, designadamente nas áreas do concelho de Soure.', 'contacto4.jpg'),
	(5, 'Bombeiros Voluntários de Soure', 'Todo o dia', ' 239506300', 'secretaria@bvsoure.pt\r\n', 'Praça da República, Apartado 21 3130-218 Soure', 'Poderá consultar mais informação em: ', 'https://www.bombeiros.pt/cbs/cb.php?cb=607', 'O Corpo de Bombeiros de Soure (Posto 0607) é uma unidade operacional tecnicamente organizada, preparada e equipada para o cabal do exercício de várias missões, assim como: o combate aos incêndios, o socorro à população especialmente em caso de catástrofes naturais, o transporte de doentes não urgentes e colaboração em outras variadas atividades de proteção civil.', 'contacto5.jpg');
/*!40000 ALTER TABLE `contactos` ENABLE KEYS */;

-- Dumping structure for table crc.dept
CREATE TABLE IF NOT EXISTS `dept` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table crc.dept: 3 rows
/*!40000 ALTER TABLE `dept` DISABLE KEYS */;
INSERT INTO `dept` (`id`, `nome`) VALUES
	(1, 'Presidência'),
	(2, 'Tesouraria'),
	(3, 'Conselho Fiscal');
/*!40000 ALTER TABLE `dept` ENABLE KEYS */;

-- Dumping structure for table crc.evento
CREATE TABLE IF NOT EXISTS `evento` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) COLLATE utf8_bin NOT NULL,
  `data` varchar(50) COLLATE utf8_bin NOT NULL DEFAULT '',
  `local` varchar(50) COLLATE utf8_bin NOT NULL,
  `img` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table crc.evento: 2 rows
/*!40000 ALTER TABLE `evento` DISABLE KEYS */;
INSERT INTO `evento` (`id`, `nome`, `data`, `local`, `img`) VALUES
	(1, 'Festa das Luzes', '3 de Janeiro, 19:00 horas', 'Centro Recreativo do Casconho', 'evento1.jpg'),
	(2, 'Festa de Carnaval', '24 de Fevereiro, 14:00 horas', 'Parque das Nações', 'evento2.jpg');
/*!40000 ALTER TABLE `evento` ENABLE KEYS */;

-- Dumping structure for table crc.funcao
CREATE TABLE IF NOT EXISTS `funcao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_dept` int(11) NOT NULL,
  `nome_func` varchar(200) COLLATE utf8_bin NOT NULL,
  `nome_pessoa` varchar(200) COLLATE utf8_bin NOT NULL,
  `dataN` date NOT NULL,
  `socio` int(11) NOT NULL,
  `contact` varchar(200) COLLATE utf8_bin NOT NULL,
  `img` varchar(100) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table crc.funcao: 9 rows
/*!40000 ALTER TABLE `funcao` DISABLE KEYS */;
INSERT INTO `funcao` (`id`, `id_dept`, `nome_func`, `nome_pessoa`, `dataN`, `socio`, `contact`, `img`) VALUES
	(1, 1, 'presidente', 'Luís Vieira', '1961-03-03', 2006, 'luisvieira@crc.pt', 'presid.jfif'),
	(5, 2, 'vice-presidente', 'Fernando Vagandas', '1984-02-02', 18, 'vagandas@crc.pt', 'fev.jfif'),
	(2, 1, 'vice-presidente', 'Rui Costa', '1974-12-13', 1904, 'ruicosta@crc.pt', 'ruicos.jpg'),
	(3, 1, 'suplente', 'Anderson Luís da Silva', '1980-08-11', 1906, 'luisao@crc.pt', 'luiss.jpg'),
	(4, 2, 'presidente', 'Fábio Rodrigues', '1998-01-02', 22, 'frodrigues@crc.pt', 'fri.jfif'),
	(6, 2, 'suplente', 'Lucinda Ramos', '1982-12-21', 77, 'lucy_ramos@crc.pt', 'lucyy.jfif'),
	(7, 3, 'presidente', 'José Ribeiro', '1954-12-26', 1, 'oribeiro@crc.pt', 'jri.jfif'),
	(8, 3, 'vice-presidente', 'Júlia Arminda', '1980-10-10', 7, 'julita@crc.pt', 'julia.jfif'),
	(9, 3, 'suplente', 'David Gomes', '1992-05-15', 29, 'dgomes@crc.pt', 'davide.jfif');
/*!40000 ALTER TABLE `funcao` ENABLE KEYS */;

-- Dumping structure for table crc.interesse
CREATE TABLE IF NOT EXISTS `interesse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) COLLATE utf8_bin NOT NULL,
  `alt` varchar(50) COLLATE utf8_bin NOT NULL DEFAULT '',
  `img` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `texto` longtext COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table crc.interesse: 2 rows
/*!40000 ALTER TABLE `interesse` DISABLE KEYS */;
INSERT INTO `interesse` (`id`, `nome`, `alt`, `img`, `texto`) VALUES
	(2, 'A Capela de Santo António', 'Capela de Santo António', 'interesse2.jpg', 'A capela de Santo António foi construída em 1952, por ordem do antigo presidente da Câmara, José Ribeiro, um dos grandes nomes do Casconho. Esta capela é um local religioso, dos mais antigos do concelho, esta serve não para apenas local religioso, mas também para o convívio entre os casconhenses, no fim da tradicional missa ao domingo de manhã.'),
	(1, '   A Praia da Nora', 'A Praia da Nora, também conhecida por \'A ILHA\'', 'interesse1.jpeg', '   A praia da Nora, é um local muito requisitado do concelho, se não, o mais requisitado no Verão. Por aqui passam não só muitos jovens e não só do nosso concelho, mas também pessoas dos arredores. Ultimamente, esta atração tem atraído muitos turistas, não só, portugueses de outros sítios do país, mas também estrangeiros! Venha visitar e delicie-se com as belas águas do Casconho!');
/*!40000 ALTER TABLE `interesse` ENABLE KEYS */;

-- Dumping structure for table crc.noticias
CREATE TABLE IF NOT EXISTS `noticias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(256) COLLATE utf8_bin NOT NULL,
  `subtitulo` varchar(256) COLLATE utf8_bin NOT NULL DEFAULT '',
  `intro` varchar(230) COLLATE utf8_bin NOT NULL DEFAULT '',
  `data` date NOT NULL,
  `autor` varchar(100) COLLATE utf8_bin NOT NULL DEFAULT '',
  `para1` longtext COLLATE utf8_bin NOT NULL,
  `para2` longtext COLLATE utf8_bin,
  `para3` longtext COLLATE utf8_bin,
  `para4` longtext COLLATE utf8_bin,
  `para5` longtext COLLATE utf8_bin,
  `img` varchar(100) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table crc.noticias: 4 rows
/*!40000 ALTER TABLE `noticias` DISABLE KEYS */;
INSERT INTO `noticias` (`id`, `titulo`, `subtitulo`, `intro`, `data`, `autor`, `para1`, `para2`, `para3`, `para4`, `para5`, `img`) VALUES
	(1, 'CR Casconho vence Taça Distrital', 'Pela primeira vez na história o CR Casconho conquista o Torneio Distrital de Futebol de Praia do distrito de Coimbra.', 'Dia 15 de Fevereiro realizou-se o Torneio Anual de Futebol de Praia do distrito de Coimbra. O torneio teve várias equipas de renome como Académica, Condeixa, e Sourense, mas no final, aconteceu o inédito...', '2021-02-18', 'João Silveira', '\r\nDia 15 de Fevereiro realizou-se o Torneio Anual de Futebol de Praia do distrito de Coimbra. O torneio teve várias equipas de renome como Académica, Condeixa, e Sourense, mas no final, aconteceu o inédito, O Clube Recreativo venceu pela primeira vez troféu, que está na sua 20ºedição.\r\n\r\n', 'Este torneio, foi realizado à porta fechada, claro, e com total ausência de público, com os ganhos televisivos a serem retribuídos para o Centro de Saúde de Soure, que se encontra com 92% de lotação.\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'Pela frente o CR Casconho encontrou o Condeixa, Ansião e Sourense, tendo enfrentando na grande final a equipa da Académica, onde venceu por 4-3. O CR começou mal onde no fim da primeira parte já tinha estava em desvantagem por 2-0, mas que teve uma saída do intervalo muito forte, onde rapidamente chegou ao 4-2, todos apontados por Emanuel, o goleador da equipa. Nos minutos finais a Académica ainda reduziu para 4-3 mas nada adiantou.\r\n\r\n', '"É uma sensação inesplicável e os meus jogadores estão de parabéns!" - disse o treinador da turma do Casconho, em declarações exclusivas à CasconhoTV.\r\n\r\n', NULL, 'futebol-p.jfif'),
	(2, 'Médico infetado apesar da vacina contra a Covid-19', 'Médico é residente no Casconho e tem 45 anos, e pelas suas funções já tomou a vacina, fazendo parte da lista prioritária.', 'Um enfermeiro residente no Casconho terá testado positivo ao coronavírus mais de uma semana depois de ter tomado a primeira dose da vacina da Pfizer contra a Covid-19. O caso foi avançado pela CMTV...', '2021-02-22', 'João Lopes', 'Um enfermeiro residente no Casconho terá testado positivo ao coronavírus mais de uma semana depois de ter tomado a primeira dose da vacina da Pfizer contra a Covid-19. O caso foi avançado pela CMTV mas ainda não foram dadas nenhumas declarações oficiais.\r\n', 'De acordo com a informação avançada, o enfermeiro de 45 anos, que trabalha nas urgências de dois hospitais diferentes, terá tomado a vacina contra a Covid-19 no dia 17 de fevereiro, tendo sentido apenas algumas dores de garganta, mas nenhum outro efeito secundário, estando atualmente em quarentena.\r\n\r\n', 'Com isto, a população ficou em alerta e já houveram vários boatos de  que a maioria não confia na maioria e pondera não a tomar, caso se verifiquem mais alguns casos preocupantes.', 'Em declarações para a CasconhoTV, um adulto de 54 anos referiu que: "O vírus é uma farsa do Governo para nos controlar! Ventura! Ventura!".  Importante referir que a CasconhoTV alheia-se a qualquer comentário político, mas que não concorda com a ideia deste indivíduo.\r\n\r\n', '', 'covid.jfif'),
	(3, 'Dezenas de pessoas no Casconho ficam sem eletricidade por causa do frio', 'Dezenas de pessoas no interior do Casconho ficaram sem eletricidade, depois de as redes de energia terem colapsado por sobrecarga, perante as baixas temperaturas de Inverno.', 'Dezenas de pessoas do Casconho ficaram sem eletricidade, depois de as redes de energia terem colapsado por sobrecarga, perante as baixas temperaturas de Inverno. Mais de 30 dezenas de pessoas, foram...', '2021-02-02', 'Fábio David', 'Dezenas de pessoas do Casconho ficaram sem eletricidade, depois de as redes de energia terem colapsado por sobrecarga, perante as baixas temperaturas de Inverno. Mais de 30 dezenas de pessoas, foram alertadas para o risco de temperaturas extremamente baixas, que chegaram a passar os 20 graus Celsius negativos, fazendo aumentar substancialmente o consumo de energia, o que causou perturbações graves no fornecimento de eletricidade.\r\n\r\n', 'Pelo menos 4 pessoas morreram, algumas delas lutando para encontrar aquecimento dentro das suas casas.\r\n', '\r\nAs concessionárias regionais de Soure e Coimbra, entre outras, provocaram apagões repetidos para aliviar a carga sobre as redes de energia que se esforçavam para atender à extrema procura de calor e eletricidade. Quase  100 mil pessoas ficaram sem eletricidade no distrito de Coimbra.\r\n', '\r\nOs mais graves cortes de energia aconteceram em Condeixa, onde, pelo que se apura 95% terá ficado às escuras, o pico para estas quebras de energia terá ocoriddo por volta das 22 horas.', NULL, 'tempestade.jfif'),
	(4, 'POLÉMICA: Manuel Rei é encontrado morto!', 'PSP teve que arrombar porta da habitação, que se encontrava trancada por dentro.', 'Manuel Rei, de 66 anos, um homem com muita história no Casconho,  já não era visto há alguns dias, foi este domingo encontrado morto em casa, tendo sigo encontrados indícios de crime, como a casa totalmente destruída...', '2021-03-01', 'João Silveira', 'Manuel Rei, de 66 anos, um homem com muita história no Casconho,  já não era visto há alguns dias, foi este domingo encontrado morto em casa,  tendo sido encontrado indícios de crime, como a casa totalmente destruída e várias peças valiosas roubadas, segundo a PSP, que teve de arrombar a porta do apartamento, por se encontrar trancada por dentro.', 'Foi o forte odor que chamou a atenção dos vizinhos de Manuel Rei, que vivia sozinho, onde tem uma filha já com 28 anos e estava reformado, onde o corpo estava já em avançado estado de decomposição. ', 'Uma equipa dos Bombeiros Voluntários de Soure foi chamada ao local, mas à sua chegada já lá estava uma patrulha da PSP. A remoção do corpo viria a ser feita por uma equipa dos Bombeiros de Soure.', 'Quanto aos suspeitos, estão dois jovens com cerca de 22 anos, pois, recentemente é conhecido que houve uma grande discussão entre estes e Manuel Rei sobre um valioso terreno na aldeia do Casconho, onde estes acusaram que Manuel Rei lhe roubara o terreno, que pertenceria ao avô dos jovens.', '', 'velho.jfif');
/*!40000 ALTER TABLE `noticias` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
