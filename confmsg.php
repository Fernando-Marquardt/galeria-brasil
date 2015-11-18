<? 
function conecta() { 
$conexao = mysql_connect("localhost", "usuario_db", "senha_db"); $db = mysql_select_db("Banco_dados"); 
} 
##Nome do site## 
$site = "http://www.seusite.com.br/galeria/"; 
##URL do site## 
$url_s = "http://www.seusite.com.br/galeria"; //sem "/" no final 
?> 
