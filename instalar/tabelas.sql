CREATE TABLE IF NOT EXISTS `config` (
	`cfg_nome` varchar(100) NOT NULL,
	`cfg_valor` text NOT NULL,
	UNIQUE KEY `cfg_nome` (`cfg_nome`)
) ENGINE=InnoDB ;

CREATE TABLE IF NOT EXISTS `galerias` (
	`gal_codigo` int(11) NOT NULL auto_increment,
	`gal_codigo_usu` int(11) NOT NULL,
	`gal_codigo_img` int(11) NOT NULL,
	`gal_titulo` varchar(250) NOT NULL,
	`gal_local` varchar(250) NOT NULL,
	`gal_pasta` varchar(30) NOT NULL,
	`gal_data` date NOT NULL,
	`gal_data_cadastro` datetime NOT NULL,
	PRIMARY KEY  (`gal_codigo`),
	KEY `gal_codigo_usu` (`gal_codigo_usu`,`gal_codigo_img`)
) ENGINE=InnoDB ;

CREATE TABLE IF NOT EXISTS `imagens` (
	`img_codigo` int(11) NOT NULL auto_increment,
	`img_codigo_gal` int(11) NOT NULL,
	`img_codigo_usu` int(11) NOT NULL,
	`img_mensagem` text,
	`img_nome_arquivo` varchar(150) NOT NULL,
	`img_data_cadastro` datetime NOT NULL,
	PRIMARY KEY  (`img_codigo`),
	KEY `img_codigo_gal` (`img_codigo_gal`,`img_codigo_usu`)
) ENGINE=InnoDB ;

CREATE TABLE IF NOT EXISTS `usuarios` (
	`usu_codigo` int(11) NOT NULL auto_increment,
	`usu_nome` varchar(100) NOT NULL,
	`usu_email` varchar(250) NOT NULL,
	`usu_login` varchar(30) NOT NULL,
	`usu_senha` varchar(32) NOT NULL,
	`usu_data_cadastro` datetime NOT NULL,
	PRIMARY KEY  (`usu_codigo`)
) ENGINE=InnoDB ;