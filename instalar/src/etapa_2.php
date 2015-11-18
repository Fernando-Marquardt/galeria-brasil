<?php
$configurar = ($_GET['act'] == 'configurar') ? true : false;

if ($configurar) {
	
	if (!mysql_connect($_POST['database_hostname'], $_POST['database_username'], $_POST['database_password'])) {
		$testes['mysql'] = false;
		$prosseguir = false;
	} else {
		$testes['mysql'] = true;
		
		if(!mysql_select_db($_POST['database_name'])) {
			$testes['tabela'] = false;
			$prosseguir = false;
		} else {
			$testes['tabela'] = true;
			
			$arquivo = file_get_contents('../core/inc.config.php');
			
			$arquivo = str_replace(
				array('{database_hostname}', '{database_username}', '{database_password}', '{database_name}', '{gb_instalado}'),
				array($_POST['database_hostname'], $_POST['database_username'], $_POST['database_password'], $_POST['database_name'], 1),
				$arquivo);
				
			$alterar = file_put_contents('../core/inc.config.php', $arquivo);
				
			if ($alterar) {
				$config_alterado = true;
				
				$query_config = mysql_query("
CREATE TABLE IF NOT EXISTS `config` (
	`cfg_nome` varchar(100) NOT NULL,
	`cfg_valor` text NOT NULL,
	UNIQUE KEY `cfg_nome` (`cfg_nome`)
) ENGINE=InnoDB ;");
				
				$query_galerias = mysql_query("
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
) ENGINE=InnoDB ;");
				
				$query_imagens = mysql_query("
CREATE TABLE IF NOT EXISTS `imagens` (
	`img_codigo` int(11) NOT NULL auto_increment,
	`img_codigo_gal` int(11) NOT NULL,
	`img_codigo_usu` int(11) NOT NULL,
	`img_mensagem` text,
	`img_nome_arquivo` varchar(150) NOT NULL,
	`img_data_cadastro` datetime NOT NULL,
	PRIMARY KEY  (`img_codigo`),
	KEY `img_codigo_gal` (`img_codigo_gal`,`img_codigo_usu`)
) ENGINE=InnoDB ;");
				
				$query_usuarios = mysql_query("
CREATE TABLE IF NOT EXISTS `usuarios` (
	`usu_codigo` int(11) NOT NULL auto_increment,
	`usu_nome` varchar(100) NOT NULL,
	`usu_email` varchar(250) NOT NULL,
	`usu_login` varchar(30) NOT NULL,
	`usu_senha` varchar(32) NOT NULL,
	`usu_data_cadastro` datetime NOT NULL,
	PRIMARY KEY  (`usu_codigo`)
) ENGINE=InnoDB ;");
				
				if ($query_config && $query_galerias && $query_imagens && $query_usuarios) {
					$criar_tabelas = true;
				} else {
					$criar_tabelas = false;
					$prosseguir = false;
				}
			} else {
				$config_alterado = false;
				$prosseguir = false;
			}
		}
	}
}

$template->assign('database_hostname', $_POST['database_hostname']);
$template->assign('database_username', $_POST['database_username']);
$template->assign('database_name', $_POST['database_name']);
$template->assign('testes', $testes);
$template->assign('config_alterado', $config_alterado);
$template->assign('criar_tabelas', $criar_tabelas);
$template->assign('prosseguir', $prosseguir);
$template->assign('configurar', $configurar);
$template->display('src/etapa_2.html');
?>