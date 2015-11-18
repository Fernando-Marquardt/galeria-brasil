<? 
$versao = "v2.0";

if($passo == ""){?>
<script Language="JavaScript">
function validate1(form1) {
if (form1.bd.value == "")
{
  alert("Preencha o campo Banco de dados");
  form1.bd.focus();
  return (false);
}

if (form1.user.value == "")
{
  alert("Preencha o campo Usuário");
  form1.user.focus();
  return (false);
}
}
</script>
<table border="1" cellspacing="0" cellpadding="0" align="center" width="500">
  <tr bgcolor="#C6C3C6">
    <td>
      <table width="500" border="0" cellspacing="0" cellpadding="1" align="center">
        <tr bgcolor="#400080">
          <td height="20" class="td1" bgcolor="#000084"><b><font color="#FFFFFF" size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
            &nbsp;Galeria Brasil <? echo $versao; ?> - Instalação</font></b></td>
        </tr>
        <tr>
          <td colspan="2">
		  
		  <form action='instalar.php?passo=2' method='post' name="form1" onsubmit="return validate1(this);">
              <table width="100%" border='0' cellpadding='5' cellspacing='0'>
                <tr> 
    <td height='50' align='center'><font size='1' face='Verdana, Arial, Helvetica, sans-serif'><strong> 
      Configurar o arquivo de conexão com o banco de dados.</strong></font></td>
  </tr>
</table>
              <table border='0' cellpadding='2' cellspacing='0'>
                <tr> 
                  <td width="200" align='right'><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Banco 
                    de dados:</font></td>
                  <td> <font size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
                    <input name='bd' type='text' size='32'>
                    </font></td>
                </tr>
                <tr> 
                  <td align='right'><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Usuário:</font></td>
                  <td> <font size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
                    <input name='user' type='text' size='32'>
                    </font></td>
                </tr>
                <tr> 
                  <td align='right'><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Senha:</font></td>
                  <td> <font size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
                    <input name='pass' type='text' size='32'>
                    </font></td>
                </tr>
              </table>
              <table width="100%" border='0' cellpadding='2' cellspacing='0'>
                <tr> 
                  <td height="40" colspan='2' valign="bottom"> 
                    <center>
                      <input name="reset" type='button' value='&laquo; Voltar' style="width:100" disabled>
                      <input type='submit' name='inserir' style="width:100" value='Avan&ccedil;ar &raquo;'>
                    </center></td>
  </tr>
  </table>
  </form>

</td>
       </tr>
      </table>
    </td>
  </tr>
</table>

<?  
}
if($passo == 2){
$file="include/conexao.php";
if ( is_file($file)== 0 )
{
touch($file);
}
$escrever="<? \$conexao = mysql_connect(\"localhost\", \"$user\", \"$pass\"); \$db = mysql_select_db(\"$bd\");?>";
$abre=fopen($file,w);
fputs($abre,$escrever);
?>
<script Language="JavaScript">
function validate2(form2) {
if (form2.tsite.value == "")
{
  alert("Preencha o campo Título do Site");
  form2.tsite.focus();
  return (false);
}

if (form2.usite.value == "")
{
  alert("Preencha o campo URL do Site");
  form2.usite.focus();
  return (false);
}

if (form2.fonte.value == "")
{
  alert("Selecione o campo Fonte");
  form2.fonte.focus();
  return (false);
}

if (form2.tfonte.value == "")
{
  alert("Selecione o campo Tamanho dos Textos");
  form2.tfonte.focus();
  return (false);
}

if (form2.ttitulo.value == "")
{
  alert("Selecione o campo Tamanho dos Títulos");
  form2.ttitulo.focus();
  return (false);
}

if (form2.admin.value == "")
{
  alert("Digite o nome do Administrador do Site");
  form2.admin.focus();
  return (false);
}

if (form2.admine.value == "")
{
  alert("Digite o e-mail do Administrador do Site");
  form2.admine.focus();
  return (false);
}

if (form2.adminl.value == "")
{
  alert("Digite o Login do Administrador do Site");
  form2.adminl.focus();
  return (false);
}

if (form2.admins.value == "")
{
  alert("Digite a Senha do Administrador do Site");
  form2.admins.focus();
  return (false);
}
return (true);
}
</script>

<table border="1" cellspacing="0" cellpadding="0" align="center" width="500">
  <tr bgcolor="#C6C3C6">
    <td>
      <table width="500" border="0" cellspacing="0" cellpadding="1" align="center">
        <tr bgcolor="#400080">
          <td height="20" class="td1" bgcolor="#000084"><b><font color="#FFFFFF" size="1" face="Verdana, Arial, Helvetica, sans-serif">
            &nbsp;Galeria Brasil <? echo $versao; ?> - Instalação</font></b></td>
        </tr>
        <tr>
          <td colspan="2">
		  
<form method='POST' action='instalar.php?passo=3' name="form2" onsubmit="return validate2(this);">
              <table width="100%" border='0' cellpadding='5' cellspacing='0'>
                <tr> 
                  <td height='50' align='center'><font size='1' face='Verdana, Arial, Helvetica, sans-serif'><strong> 
                    Configurara&ccedil;&otilde;es do site.</strong></font></td>
  </tr>
</table>
              <table border='0' cellpadding='2' cellspacing='0'>
                <tr> 
                  <td width="200" align='right'><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>Titulo 
                    do site:</font></td>
                  <td> <font size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
                    <input name='tsite' type='text' size='32'>
                    </font></td>
                </tr>
                <tr> 
                  <td align='right'><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>URL 
                    do site:</font></td>
                  <td> <font size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
                    <input name='usite' type='text' value="ex: http://www.seusite.com.br/galeria/" size='32'>
                    </font></td>
                </tr>
                <tr> 
                  <td align='right'><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>Fonte:</font></td>
                  <td> <font size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
                    <select name="fonte" style="width:215">
                      <option selected>Escolha o tipo de Fonte</option>
                      <option value="verdana,tahoma,arial">verdana,tahoma,arial</option>
                      <option value="tahoma,arial,verdana">tahoma,arial,verdana</option>
                      <option value="arial,verdana,tahoma">arial,verdana,tahoma</option>
                    </select>
                    </font></td>
                </tr>
                <tr> 
                  <td align='right'><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>Tamanho 
                    do textos:</font></td>
                  <td><select name="tfonte" style="width:50">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                    </select></td>
                </tr>
                <tr> 
                  <td align='right'><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>Tamanho 
                    dos T&iacute;tulos:</font></td>
                  <td><select name="ttitulo" style="width:50">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                    </select></td>
                </tr>
                <tr> 
                  <td align='right'><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>Cor 
                    Texto:</font></td>
                  <td> <font size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
                    <input name='cortexto' type='text' value="#000000" size='32' maxlength="7">
                    </font></td>
                </tr>
                <tr> 
                  <td align='right'><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>Cor 
                    OnMouseOver:</font></td>
                  <td> <font size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
                    <input name='coronmouse' type='text' value="#999999" size='32' maxlength="7">
                    </font></td>
                </tr>
                <tr> 
                  <td align='right'><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>Cor 
                    do Layout 1:</font></td>
                  <td> <font size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
                    <input name='corcelula1' type='text' value="#999999" size='32' maxlength="7">
                    </font></td>
                </tr>
                <tr> 
                  <td align='right'><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>Cor 
                    do Layout 2:</font></td>
                  <td> <font size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
                    <input name='corcelula2' type='text' value="#CCCCCC" size='32' maxlength="7">
                    </font></td>
                </tr>
                <tr> 
                  <td align='right'><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>Cor 
                    de Fundo:</font></td>
                  <td> <font size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
                    <input name='corfundosite' type='text' value="#FFCC00" size='32' maxlength="7">
                    </font></td>
                </tr>
                <tr> 
                  <td align='right'><font size='1' face='Verdana, Arial, Helvetica, sans-serif'> 
                    Nome do Administrador:</font></td>
                  <td> <font size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
                    <input name='admin' type='text' size='32'>
                    </font></td>
                </tr>
                <tr> 
                  <td align='right'><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>E-mail 
                    do Administrador:</font></td>
                  <td> <font size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
                    <input name='admine' type='text' size='32'>
                    </font></td>
                </tr>
                <tr> 
                  <td align='right'><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>Login 
                    do Administrador:</font></td>
                  <td> <font size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
                    <input name='adminl' type='text' size='32'>
                    </font></td>
                </tr>
                <tr> 
                  <td align='right'><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>Senha 
                    do Administrador:</font></td>
                  <td> <font size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
                    <input name='admins' type='password' size='32'>
                    </font></td>
                </tr>
              </table>
              <table width="100%" border='0' cellpadding='2' cellspacing='0'>
                <tr> 
                  <td height="40" colspan='2' valign="bottom"> 
                    <center>
                      <input name="reset" type='button' value='&laquo; Voltar' onClick="javascript:history.back(-1);" style="width:100">
                      <input type='submit' name='inserir' style="width:100" value='Avan&ccedil;ar &raquo;'>
                    </center></td>
  </tr>
  </table>
  </form>

</td>
       </tr>
      </table>
    </td>
  </tr>
</table>
<?
}
if($passo == 3){
include("include/conexao.php");
$sql = mysql_query("CREATE TABLE users(
id INT (3) not null AUTO_INCREMENT,
nome VARCHAR (150) not null ,
email VARCHAR (255) not null ,
login VARCHAR (15) not null ,
senha VARCHAR (15) not null ,
nivel VARCHAR (3) not null,
PRIMARY KEY (id)
);") or die (mysql_error());

$sql = mysql_query ("CREATE TABLE config(
id int(2) NOT NULL auto_increment,
tsite VARCHAR (100) not null,
usite VARCHAR (255) not null, 
fonte VARCHAR (50) not null, 
tfonte VARCHAR (2) not null,
ttitulo VARCHAR (2) not null,
coronmouse VARCHAR (10) not null,
cortexto VARCHAR (10) not null,
corcelula1 VARCHAR (10) not null,
corcelula2 VARCHAR (10) not null,
corfundosite VARCHAR (10) not null,
PRIMARY KEY (id)
);");

$sql = mysql_query ("CREATE TABLE galeria (
  id int(3) NOT NULL auto_increment,
  nome varchar(255) NOT NULL default '',
  dia char(2) NOT NULL default '',
  mes char(2) NOT NULL default '',
  ano varchar(4) NOT NULL default '',
  local varchar(255) NOT NULL default '',
  pasta varchar(255) NOT NULL default '',
  foto01 varchar(255) NOT NULL default '',
  PRIMARY KEY  (id)
);");

$sql = mysql_query("Insert into users values('1', '$admin', '$admine', '$adminl', '$admins', '1')");
$sql = mysql_query("Insert into config values('1','$tsite', '$usite', '$fonte', '$tfonte', '$ttitulo', '$coronmouse', '$cortexto', '$corcelula1', '$corcelula2', '$corfundosite')");

// inicia criação de pasta
$nomedapasta = "galeria";
@mkdir("images/$nomedapasta", 0777);
// fim da criação da pasta
?>
<table border="1" cellspacing="0" cellpadding="0" align="center" width="500">
  <tr bgcolor="#C6C3C6">
    <td>
      <table width="500" border="0" cellspacing="0" cellpadding="1" align="center">
        <tr bgcolor="#400080">
          <td height="20" class="td1" bgcolor="#000084"><b><font color="#FFFFFF" size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
            &nbsp;Galeria Brasil <? echo $versao; ?> - Instalação!</font></b></td>
        </tr>
        <tr align="center">
          <td colspan="2"><br>
            <strong><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Script 
            instalado com sucesso.<br>
            <br>
            </font></strong><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Login:<strong> 
            <? echo $adminl?><br>
            </strong>Senha:<strong> <? echo $admins?><br>
            <br>
            <a href='<? echo $usite?>admin/'>Administrar Galeria</a></strong></font><br><br>


</td>
       </tr>
      </table>
    </td>
  </tr>
</table>
<? }?>
