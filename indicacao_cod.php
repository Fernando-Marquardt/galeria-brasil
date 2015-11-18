<?php
include("path.php");

$sql = "SELECT *, nome AS evento, CONCAT_WS('/', dia, mes, ano) AS data FROM galeria WHERE id = ". $_POST['id'];
$query = mysql_query($sql);

$rs = mysql_fetch_array($query);

$data_envio = DATE('d/m/Y');
$hora_envio = DATE('H:i:s');
$var1 = $usite;
$var2 = "janela.php?id=". $_POST['id'] ."&foto=". $_POST['imagem'] ."&pg=". $_POST['pagina'];
$url = $var1 . $var2;
$festa = "<strong><a href=\"". $url ."\" target=\"_blank\">". $rs['evento'] ."</a><br /></strong>". $rs['data'] ." - ". $rs['local'] ."<br />";
if ($tipo_email == "mailto") {
	$arquivo = "Olá ". $_POST['nomepara'] .", ".
	"%0A%0ASeu amigo(a) ". $_POST['nome'] ." <". $_POST['email'] ."> lhe enviou uma foto.%0A%0A".
	$rs['evento'] ." ". $rs['data'] ." - ". $rs['local'] ."%0A%0A".
	"Clique no link para ver a foto: %0A ". $url;
	$arquivo = utf8_encode($arquivo);
} elseif ($tipo_email == "mail") {
	$arquivo = "
	<html>
	<body>
		<table width=\"280\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">
			<tr>
				<td>
					<font color=\"". $cortexto ."\" size=\"". $tfonte ."\" face=\"". $fonte ."\">
					Olá <strong>". $_POST['nomepara'] ."</strong>,<br /><br />
					Seu amigo(a) <strong><a href=\"mailto:". $_POST['email'] ."\">". $_POST['nome'] ."</a>
					</strong> lhe enviou uma foto.<br /><br /><br />
					$festa
				</td>
			</tr>
			<tr> 
				<td align=center valign=middle>
					<img src=\"". $var1 ."images/galeria/". $rs['pasta'] ."/". $_POST['imagem'] ."\" height=\"265\" border=\"1\">
				</td>
	        </tr>
			<tr>
				<td align=center>
					<font color=\"". $cortexto ."\" size=\"". $tfonte ."\" face=\"". $fonte ."\">
					E-mail enviado em <strong>". $data_envio ."</strong> às <strong>". $hora_envio ."</strong>
					</font>
				</td>
			</tr>
		</table>
	</body>
	</html>";
}
	  
// emails para quem será enviado o formulário (se for mais de um separar com virgula)
$destino = $_POST['emailpara'];
$assunto = "Indicação de Um Amigo Seu!";
$assunto = ($tipo_email == "mailto") ? utf8_encode($assunto) : $assunto;

// É necessário indicar que o formato do e-mail é html
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
$headers .= "From: ". $_POST['nome'] ." <". $_POST['email'] .">\r\n";

if ($tipo_email == "mailto") {
	header("Content-Type: text/html; charset=utf8;");
?>
<script type="text/javascript">
conteudo = "<?= $arquivo; ?>";
assunto = "<?= $assunto; ?>";

window.location.href = "mailto:<?= $destino; ?>?subject="+ assunto +"&body="+ conteudo;
</script>
<?php
}

if ($tipo_email == "mail") {
	$email = mail($destino, $assunto, $arquivo, $headers);
	if($email){
?>
<BR>
<BR>

<meta http-equiv="refresh" content="2;URL=javascript:self.close()">
<table align="center" width="200" cellpadding="0" cellspacing="0">
<tr>
    <TD align="center"><font size="1" face="Verdana, Tahoma, Arial"><strong>E-MAIL 
      ENVIADO COM SUCESSO!<br>
      <br>
      <a href="javascript:close()">Fechar</a></strong></font></td>
  </tr>
</table>
<BR>
<?php
	} else {
?>
<BR>
<BR>
<meta http-equiv="refresh" content="2;URL=javascript:history.go(-1)">
<table align="center" width="200" cellpadding="0" cellspacing="0">
<tr>
    <TD align="center"><font size="1" face="Verdana, Tahoma, Arial"><strong>ERRO 
      AO ENVIAR E-MAIL!<br>
      <br>
      <a href="javascript:history.go(-1)">Voltar</a></strong></font></td>
  </tr>
</table>
<?php
	// fecha tag else
	}
}
?>
