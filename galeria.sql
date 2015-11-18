CREATE TABLE `calendario` (
  `id` tinyint(4) NOT NULL auto_increment,
  `dia` varchar(50) NOT NULL default '',
  `mes` varchar(50) NOT NULL default '',
  `ano` varchar(50) NOT NULL default '',
  `dados` varchar(200) NOT NULL default '',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=12 ;





CREATE TABLE `config` (
  `id` int(2) NOT NULL auto_increment,
  `tsite` varchar(100) NOT NULL default '',
  `usite` varchar(255) NOT NULL default '',
  `fonte` varchar(50) NOT NULL default '',
  `tfonte` char(2) NOT NULL default '',
  `ttitulo` char(2) NOT NULL default '',
  `coronmouse` varchar(10) NOT NULL default '',
  `cortexto` varchar(10) NOT NULL default '',
  `corcelula1` varchar(10) NOT NULL default '',
  `corcelula2` varchar(10) NOT NULL default '',
  `corfundosite` varchar(10) NOT NULL default '',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=2 ;


INSERT INTO `config` VALUES (1, 'Vocejaviu.com.br', 'http://www.vocejaviu.com.br/galeria/', 'verdana,tahoma,arial', '1', '1', '#999999', '#FFFFFF', '#999999', '#339900', '#000000');



CREATE TABLE `galeria` (
  `id` int(3) NOT NULL auto_increment,
  `nome` varchar(255) NOT NULL default '',
  `dia` char(2) NOT NULL default '',
  `mes` char(2) NOT NULL default '',
  `ano` varchar(4) NOT NULL default '',
  `local` varchar(255) NOT NULL default '',
  `pasta` varchar(255) NOT NULL default '',
  `foto01` varchar(255) NOT NULL default '',
  `clicks` varchar(9) NOT NULL default '',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=17 ;




CREATE TABLE `mensagemfoto` (
  `post` int(11) NOT NULL auto_increment,
  `nome` varchar(255) NOT NULL default '',
  `pagina` varchar(50) NOT NULL default '',
  `comentario` varchar(150) NOT NULL default '',
  `data` varchar(10) NOT NULL default '',
  `hora` varchar(10) NOT NULL default '',
  PRIMARY KEY  (`post`),
  KEY `post` (`post`)
) TYPE=MyISAM PACK_KEYS=0 AUTO_INCREMENT=9 ;



CREATE TABLE `users` (
  `id` tinyint(3) NOT NULL auto_increment,
  `nome` varchar(150) NOT NULL default '',
  `email` varchar(255) NOT NULL default '',
  `login` varchar(15) NOT NULL default '',
  `senha` varchar(15) NOT NULL default '',
  `nivel` char(3) NOT NULL default '',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=5 ;


INSERT INTO `users` VALUES (1, 'administrador', 'seumail@seumail.com.br', 'admin', 'admin', '1');
