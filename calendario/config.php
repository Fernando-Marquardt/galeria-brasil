<?php
$DB = 'portalfi_fissura'; 
$link = mysql_connect('localhost','portalfi','portal10') or die('Nao foi possivel se conectar com o banco de dados'); 
$sel = mysql_select_db($DB) or die("Nao foi possivel selecionar a tabela: $DB"); 
?>