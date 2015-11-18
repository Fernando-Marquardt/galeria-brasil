<?php
$criar = ($_GET['act'] == 'criar') ? true : false;

if ($criar) {
	$link = mysql_connect(DATABASE_HOSTNAME, DATABASE_USERNAME, DATABASE_PASSWORD);
	mysql_select_db(DATABASE_NAME);
	
	$usu_nome = trim(addslashes($_POST['usu_nome']));
	$usu_email = trim(addslashes($_POST['usu_email']));
	$usu_login = trim(addslashes($_POST['usu_login']));
	$usu_senha = trim(addslashes($_POST['usu_senha']));
	
	$sql = "
		INSERT INTO usuarios
			(usu_nome, usu_email, usu_login". (($usu_senha) ? ', usu_senha' : '') .", usu_data_cadastro)
		VALUES
			('". $usu_nome ."', '". $usu_email ."', '". $usu_login ."', MD5('". $usu_senha ."'), NOW())";
	
	$insert = mysql_query($sql);
	
	if ($insert) {
		$criado = true;
	} else {
		$criado = false;
	}
}

$template->assign('criado', $criado);
$template->assign('criar', $criar);
$template->display('src/etapa_4.html');
?>