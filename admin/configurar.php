<? if($_GET['acao'] == "form"){
include("verifica.php");
include("menu.php");

$sql = mysql_query("SELECT * FROM config where id='". $_GET['id'] ."'");
while ($dados=mysql_fetch_array($sql)) {
?>
<script src="../js/janelas_popup.js" language="JavaScript"></script>
<script type="text/javascript">
this.name = 'pai';

function muda_indicacao(checked) {
	div = document.getElementById('tipo_email')

	if (checked == true) {
		div.style.display = 'block';
	} else {
		div.style.display = 'none';
	}
}
</script>
<form method='POST' action='configurar.php?acao=alterar&id=<?= $_GET['id']?>&nivel=<? echo $nivel?>'>
  <table width="400" border='0' align="center" cellpadding='0' cellspacing='0'>
    <tr> 
                  
      <td height='30' align='center'><font color="<? echo $cortexto?>" size='<? echo $ttitulo?>' face='<? echo $fonte?>'><strong> 
        Configurara&ccedil;&otilde;es do site.</strong></font></td>
  </tr>
</table>
              
  <table border='0' align="center" cellpadding='3' cellspacing='0' style="border: 1px solid <? echo $cortexto?>">
    <tr bgcolor="<? echo $corcelula1?>"> 
      <td width="120" align='right' bgcolor="<? echo $corcelula1?>"><font color="<? echo $cortexto?>" size='<? echo $tfonte?>' face='<? echo $fonte?>'>Titulo 
        do site:</font></td>
      <td> <font size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
        <input name='tsite2' type='text' value="<? echo $dados[tsite]?>" size='32' style="width:290;border:1px solid <? echo $cortexto?>">
        </font></td>
    </tr>
    <tr bgcolor="<? echo $corcelula2?>"> 
      <td align='right'><font color="<? echo $cortexto?>" size='<? echo $tfonte?>' face='<? echo $fonte?>'>URL 
        do site:</font></td>
      <td> <font size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
        <input name='usite2' type='text' value="<? echo $dados[usite]?>" size='32' style="width:290;border:1px solid <? echo $cortexto?>">
        </font></td>
    </tr>
    <tr bgcolor="<? echo $corcelula1?>"> 
      <td align='right'><font color="<? echo $cortexto?>" size='<? echo $tfonte?>' face='<? echo $fonte?>'>Fonte:</font></td>
      <td> <font size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
        <input name='fonte2' type='text' value="<? echo $dados[fonte]?>" size='32' style="width:290;border:1px solid <? echo $cortexto?>">
        </font></td>
    </tr>
    <tr bgcolor="<? echo $corcelula2?>"> 
      <td align='right'><font color="<? echo $cortexto?>" size='<? echo $tfonte?>' face='<? echo $fonte?>'>Tamanho 
        Fonte:</font></td>
      <td> <font size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
        <input name='tfonte2' type='text' value="<? echo $dados[tfonte]?>" size='32' style="width:290;border:1px solid <? echo $cortexto?>">
        </font></td>
    </tr>
    <tr bgcolor="<? echo $corcelula1?>"> 
      <td align='right'><font color="<? echo $cortexto?>" size='<? echo $tfonte?>' face='<? echo $fonte?>'>Tamanho 
        T&iacute;tulo:</font></td>
      <td> <font size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
        <input name='ttitulo2' type='text' value="<? echo $dados[ttitulo]?>" size='32' style="width:290;border:1px solid <? echo $cortexto?>">
        </font></td>
    </tr>
    <tr bgcolor="<? echo $corcelula2?>"> 
      <td align='right'><font color="<? echo $cortexto?>" size='<? echo $tfonte?>' face='<? echo $fonte?>'>Cor 
        Texto:</font></td>
      <td> <font size="1" face="Verdana, Arial, Helvetica, sans-serif">
	  <input type="hidden" name="cortexto_antiga" value="<? echo $dados[cortexto]?>">
	  <input disabled type='text' value="<? echo $dados[cortexto]?> (Cor antiga)" size='32' maxlength="7" style="width:135;border:1px solid <? echo $cortexto?>">
	  &nbsp;&nbsp;&nbsp;&nbsp;<input name='cortexto_nova' type='text' value="<? echo $novacortexto?>" size='32' maxlength="7" style="width:70;border:1px solid <? echo $cortexto?>">
        <a href="javascript:cores('cores.php?id=<? echo $id?>&nivel=<? echo $nivel?>&campo=cortexto');">Nova Cor</a></font></td>
    </tr>
    <tr bgcolor="<? echo $corcelula1?>"> 
      <td align='right'><font color="<? echo $cortexto?>" size='<? echo $tfonte?>' face='<? echo $fonte?>'>Cor 
        OnMouseOver:</font></td>
      <td> <font size="1" face="Verdana, Arial, Helvetica, sans-serif">
	  <input type="hidden" name="coronmouse_antiga" value="<? echo $dados[coronmouse]?>">
	  <input disabled type='text' value="<? echo $dados[coronmouse]?> (Cor antiga)" size='32' maxlength="7" style="width:135;border:1px solid <? echo $cortexto?>">
	  &nbsp;&nbsp;&nbsp;&nbsp;<input name='coronmouse_nova' type='text' value="<? echo $novacoronmouse?>" size='32' maxlength="7" style="width:70;border:1px solid <? echo $cortexto?>">
        <a href="javascript:cores('cores.php?id=<? echo $id?>&nivel=<? echo $nivel?>&campo=coronmouse');">Nova Cor</a></font></td>
    </tr>
    <tr bgcolor="<? echo $corcelula2?>"> 
      <td align='right'><font color="<? echo $cortexto?>" size='<? echo $tfonte?>' face='<? echo $fonte?>'>Cor 
        do Layout 1:</font></td>
      <td> <font size="1" face="Verdana, Arial, Helvetica, sans-serif">
	  <input type="hidden" name="corcelula1_antiga" value="<? echo $dados[corcelula1]?>">
	  <input disabled type='text' value="<? echo $dados[corcelula1]?> (Cor antiga)" size='32' maxlength="7" style="width:135;border:1px solid <? echo $cortexto?>">
	  &nbsp;&nbsp;&nbsp;&nbsp;<input name='corcelula1_nova' type='text' value="<? echo $novacorcelula1?>" size='32' maxlength="7" style="width:70;border:1px solid <? echo $cortexto?>">
        <a href="javascript:cores('cores.php?id=<? echo $id?>&nivel=<? echo $nivel?>&campo=corcelula1');">Nova Cor</a></font></td>
    </tr>
    <tr bgcolor="<? echo $corcelula1?>"> 
      <td align='right'><font color="<? echo $cortexto?>" size='<? echo $tfonte?>' face='<? echo $fonte?>'>Cor 
        do Layout 2:</font></td>
      <td> <font size="1" face="Verdana, Arial, Helvetica, sans-serif">
	  <input type="hidden" name="corcelula2_antiga" value="<? echo $dados[corcelula2]?>">
	  <input disabled type='text' value="<? echo $dados[corcelula2]?> (Cor antiga)" size='32' maxlength="7" style="width:135;border:1px solid <? echo $cortexto?>">
	  &nbsp;&nbsp;&nbsp;&nbsp;<input name='corcelula2_nova' type='text' value="<? echo $novacorcelula2?>" size='32' maxlength="7" style="width:70;border:1px solid <? echo $cortexto?>">
        <a href="javascript:cores('cores.php?id=<? echo $id?>&nivel=<? echo $nivel?>&campo=corcelula2');">Nova Cor</a></font></td>
    </tr>
    <tr bgcolor="<? echo $corcelula2?>"> 
      <td align='right'><font color="<? echo $cortexto?>" size='<? echo $tfonte?>' face='<? echo $fonte?>'>Cor 
        de Fundo:</font></td>
      <td> <font size="1" face="Verdana, Arial, Helvetica, sans-serif">
	  <input type="hidden" name="corfundosite_antiga" value="<? echo $dados[corfundosite]?>">
	  <input disabled type='text' value="<? echo $dados[corfundosite]?> (Cor antiga)" size='32' maxlength="7" style="width:135;border:1px solid <? echo $cortexto?>">
	  &nbsp;&nbsp;&nbsp;&nbsp;<input name='corfundosite_nova' type='text' value="<? echo $novacorfundosite?>" size='32' maxlength="7" style="width:70;border:1px solid <? echo $cortexto?>">
        <a href="javascript:cores('cores.php?id=<? echo $id?>&nivel=<? echo $nivel?>&campo=corfundosite');">Nova Cor</a></font></td>
    </tr>
	<tr bgcolor="<? echo $corcelula1?>"> 
		<td width="120" align='right' bgcolor="<?= $corcelula1?>">
			<font color="<?= $cortexto?>" size='<?= $tfonte?>' face='<?= $fonte?>'>Permitir Impressão?:</font>
		</td>
		<td>
			<font size="1" face="Verdana, Arial, Helvetica, sans-serif">
			<?php
			$checked = ($dados['permitir_impressao'] == 1) ? " checked=\"checked\"" : "";
			?>
			<input name='permitir_impressao' type='checkbox'<?= $checked; ?>>
			</font>
		</td>
	</tr>
	<tr bgcolor="<? echo $corcelula2?>"> 
		<td width="120" align='right' bgcolor="<?= $corcelula2?>">
			<font color="<?= $cortexto?>" size='<?= $tfonte?>' face='<?= $fonte?>'>Permitir Indicação?:</font>
		</td>
		<td>
			<font size="1" face="Verdana, Arial, Helvetica, sans-serif">
			<?php
			$checked = ($dados['permitir_indicacao'] == 1) ? " checked=\"checked\"" : "";
			?>
			<input name='permitir_indicacao' type='checkbox'<?= $checked; ?> onclick="muda_indicacao(this.checked);">
			</font>
		</td>
	</tr>
	<tr bgcolor="<?= $corcelula1?>">
		<td bgcolor="<?= $corcelula1 ?>" colspan="2">
			<div id="tipo_email" style="display: <?= ($dados['permitir_indicacao'] == 1) ? "block" : "none"; ?>">
				<table width="100%">
					<tr bgcolor="<?= $corcelula2?>">
						<td width="120" align='right' bgcolor="<?= $corcelula1?>">
							<font color="<?= $cortexto?>" size='<?= $tfonte?>' face='<?= $fonte?>'>Tipo de Envio dos E-Mails:</font>
						</td>
						<td>
							<font size="1" face="Verdana, Arial, Helvetica, sans-serif">
							<input type="radio" name="tipo_email" id="tipo_email_mail" value="mail"<?= ($dados['tipo_email'] == "mail") ? " checked=\"checked\"" : ""; ?> />
							<label for="tipo_email_mail">PHP mail();</label>
							<input type="radio" name="tipo_email" id="tipo_email_mailto" value="mailto"<?= ($dados['tipo_email'] == "mailto") ? " checked=\"checked\"" : ""; ?> />
							<label for="tipo_email_mailto">Link mailto:</label>
							</font>
						</td>
					</tr>
				</table>
			</div>
		</td>
	</tr>
  </table>
              
  <table width="400" border='0' align="center" cellpadding='0' cellspacing='0'>
    <tr> 
                  
      <td height="35" colspan='2' align="center"> 
        <center>
                      
          <input type='submit' value='Alterar' style="width:100;border:1px solid <? echo $cortexto?>">
                      
          <input type='reset' value='Limpar' style="width:100;border:1px solid <? echo $cortexto?>">
        </center></td>
  </tr>
  </table>
  </form>
<? }
} if($_GET['acao'] == "alterar"){
include("verifica.php");
include("menu.php");

if($_POST['cortexto_nova'] != ""){$nova_cortexto = "#". $_POST['cortexto_nova'];} else {$nova_cortexto = $_POST['cortexto_antiga'];}
if($_POST['coronmouse_nova'] != ""){$nova_coronmouse = "#". $_POST['coronmouse_nova'];} else {$nova_coronmouse = $_POST['coronmouse_antiga'];}
if($_POST['corcelula1_nova'] != ""){$nova_corcelula1 = "#". $_POST['corcelula1_nova'];} else {$nova_corcelula1 = $_POST['corcelula1_antiga'];}
if($_POST['corcelula2_nova'] != ""){$nova_corcelula2 = "#". $_POST['corcelula2_nova'];} else {$nova_corcelula2 = $_POST['corcelula2_antiga'];}
if($_POST['corfundosite_nova'] != ""){$nova_corfundosite = "#". $_POST['corfundosite_nova'];} else {$nova_corfundosite = $_POST['corfundosite_antiga'];}
$tipo_email = ($_POST['permitir_indicacao'] == "on") ? ", tipo_email='". $_POST['tipo_email'] ."'" : "";
$permitir_impressao = ($_POST['permitir_impressao'] == "on") ? ", permitir_impressao=1" : ", permitir_impressao=0";
$permitir_indicacao = ($_POST['permitir_indicacao'] == "on") ? ", permitir_indicacao=1" : ", permitir_indicacao=0";

$sql = mysql_query("UPDATE config SET tsite='". $_POST['tsite2'] ."', usite='". $_POST['usite2'] ."', fonte='". $_POST['fonte2'] ."', tfonte='". $_POST['tfonte2'] ."', ttitulo='". $_POST['ttitulo2'] ."', coronmouse='". $nova_coronmouse ."', cortexto='". $nova_cortexto ."', corcelula1='". $nova_corcelula1 ."', corcelula2='". $nova_corcelula2 ."', corfundosite='". $nova_corfundosite ."'". $permitir_impressao . $permitir_indicacao . $tipo_email ." WHERE id='". $_GET['id'] ."'");
?>
<meta http-equiv="refresh" content="3;URL=?acao=form&amp;id=<? echo $_GET['id']?>&amp;nivel=<? echo $nivel?>">
<center><font color="<? echo $cortexto?>" size='<? echo $ttitulo?>' face='<? echo $fonte?>'><b>Configurações alteradas com sucesso!</b></font><font color="<? echo $cortexto?>"><BR><br><font face='<? echo $fonte?>' size='<? echo $tfonte?>'><a href='?acao=form&id=<? echo $_GET['id']?>&nivel=<? echo $nivel?>'>Clique aqui para Voltar</a></font></font></center>
<? }?>
