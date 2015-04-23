# Host: localhost  (Version: 5.6.15-log)
# Date: 2015-03-30 15:48:51
# Generator: MySQL-Front 5.3  (Build 4.198)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "equipe"
#

DROP TABLE IF EXISTS `equipe`;
CREATE TABLE `equipe` (
  `id_membro` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `cargo` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_membro`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

#
# Data for table "equipe"
#

/*!40000 ALTER TABLE `equipe` DISABLE KEYS */;
INSERT INTO `equipe` VALUES (1,'Andre Treib','CEO, Web Developer and Web Designer','andre.jpg','http://www.andretreib.com/'),(2,'Gabriel Lopes','CEO and Web Developer','bill.jpg','http://gabriellopes.esy.es/');
/*!40000 ALTER TABLE `equipe` ENABLE KEYS */;

#
# Structure for table "projeto"
#

DROP TABLE IF EXISTS `projeto`;
CREATE TABLE `projeto` (
  `id_projeto` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_projeto`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

#
# Data for table "projeto"
#

/*!40000 ALTER TABLE `projeto` DISABLE KEYS */;
INSERT INTO `projeto` VALUES (1,'AnonyMatch 2.0','http://anonymatch.esy.es/','anony.png'),(2,'Lehana Tombesi','http://lehanatombesi.esy.es/','lehana.png');
/*!40000 ALTER TABLE `projeto` ENABLE KEYS */;

#
# Structure for table "usuario"
#

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

#
# Data for table "usuario"
#

/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'atreib','e83f164f97cb9af392aa7d32df04cc4effbb2eed','teste'),(2,'glopes','boss0123456789','Gabriel Lopes');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
