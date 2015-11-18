<?
$sql = mysql_query("SELECT * FROM config");
while ($linha = mysql_fetch_array($sql)) {
$tsite = $linha["tsite"]; 				// nome do site
$usite = $linha["usite"]; 				// url do site, ex: http://www.seusite.com.br/galeriav2/
$fonte = $linha["fonte"]; 				// fonte do site
$tfonte = $linha["tfonte"]; 			// tamanho da fonte usada
$ttitulo = $linha["ttitulo"];			// tamanho dos titulos do site 
$coronmouse = $linha["coronmouse"];		// cor quando passar o mouse em cima dos links #999999
$cortexto = $linha["cortexto"]; 		// cor do texto
$corcelula1 = $linha["corcelula1"];		// cor dacelula 1
$corcelula2 = $linha["corcelula2"];    	// cor da celula 2
$corfundosite = $linha["corfundosite"]; // cor de fundo do site
$versao = "v2.0";
}
?>
<html>
<head>
<title>Galeria de Fotos</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">     A    {text-decoration: none}</style>
<style fprolloverstyle>A:hover {color: <? echo $coronmouse;?>; text-decoration: underline}</style>
</head>
<body bgcolor="<? echo $corfundosite;?>" link="<? echo $cortexto;?>" vlink="<? echo $cortexto;?>" alink="<? echo $cortexto;?>" leftmargin="10" topmargin="10">
