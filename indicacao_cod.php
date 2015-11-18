<? include("path.php");
$data_envio = DATE('d/m/Y');
$hora_envio = DATE('H:i:s');
$var1 = "$usite";
$var2 = "janela.php?dir=$dir&evento=$evento&data=$data&local=$local";
$url = "$var1$var2";
$festa = "<strong><a href=\"$url\" target=\"_blank\">$evento</a><BR></strong>$data - $local<br>";
$arquivo = "
<html>
<script>function AbreJanelaGaleria(URL) {
  var width = 625;
  var height = 395;
  var left = 50;
  var top = 10
  window.open(URL, 'ema3', 'width='+width+', height='+height+', top='+top+', left='+left+', scrollbars=no, status=yes, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no');
}
</script>

<table width=280 border=0 align=center cellpadding=0 cellspacing=0>
  <tr>
    <TD><font color=$cortexto size=$tfonte face=$fonte>Olá <strong>$nomepara</strong>,<BR>
      <BR>
      Seu amigo(a) <strong><a href=\"mailto:$email\">$nome</a></strong> lhe envio 
      uma foto.<br>
      <br>
      <br>
	  $festa
</tr>
  <tr> 
    <td align=center valign=middle><img src=\"$var1$dir$imagem\" height=265 border=1></td>
        </tr>
  <tr>
    <td align=center><font color=$cortexto size=$tfonte face=$fonte>E-mail enviado em <strong>$data_envio</strong> às <strong>$hora_envio</strong></font></td>
  </tr>
</table>
</body>
</html>
";

// emails para quem será enviado o formulário (se for mais de um separar com virgula)
$destino = "$emailpara";
$assunto = "Indicação de Um Amigo Seu!";

// É necessário indicar que o formato do e-mail é html
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
$headers .= "From: $nome <$email>\r\n";

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
<? } else { ?>
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
<?
// fecha tag else
}
?>
