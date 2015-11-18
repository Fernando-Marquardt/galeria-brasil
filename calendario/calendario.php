<?
/* _______________________________________________________________________________
  | Autor: Guilherme Buozzi Pachella ICQ: 127049217 e-mail: gui_pachela@uol.com.br|
  | Este script foi totalmente reestruturado por mim, só peguei pronta a parte de |
  | montar o calendário, implementei as consultas no banco para ver os dias de    |
  | festa, converti o idioma e coloquei em destaque o dia atual.                  |
  |                       FAVOR MANTER ESTES CRÉDITOS                             |
  |_______________________________________________________________________________|
*/
include "config.php";
$SQL="select * from calendario order by id desc"; 
$result = mysql_db_query($DB,$SQL,$link);
$linha=mysql_num_rows($result);
if (isset($show_month)) {
if ($show_month==">") {
  if($month==12) {
     $month=1;
     $year++;
     } else {
     $month++;
     }
     }
if ($show_month=="<") {
  if($month==1) {
     $month=12;
     $year--;
     } else {
     $month--;
     }
     }
}
if (isset($day)) {
if ($day<="9"&ereg("(^[1-9]{1})",$day)) {
  $day="0".$day;
  }
}
if (isset($month)) {
if ($month<="9"&ereg("(^[1-9]{1})",$month)) {
  $month="0".$month;
  }
}
if (!isset($year)) {
  $year=date("Y",mktime());
  }
if (!isset($month)) {
  $month=date("m",mktime());
  }
if (!isset($day)) {
  $day=date("d",mktime());
  }
$thisday="$year-$month-$day";
$day_name=array("Seg","Ter","Qua","Qui","Sex","Sáb"	,"<font color=\"#FF0000\">Dom</font>");

$month_abbr=array("","Janeiro","Fevereiro","Março","Abril","Maio","Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro");

$y=date("Y");
   switch ($month) {
    case 1:  $month_name = "Janeiro";	break;
    case 2:  $month_name = "Fevereiro";	break;
    case 3:  $month_name = "Março";	break;
    case 4:  $month_name = "Abril";	break;
    case 5:  $month_name = "Maio";	break;
    case 6:  $month_name = "Junho";	break;
    case 7:  $month_name = "Julho";	break;
    case 8:  $month_name = "Agosto";	break;
    case 9:  $month_name = "Setembro";	break;
    case 10: $month_name = "Outubro";	break;
    case 11: $month_name = "Novembro";	break;
    case 12: $month_name = "Dezembro";	break;
   }
?>
<META name="Author" CONTENT="Guilherme Buozzi Pachella - contato: gui_pachela@uol.com.br">
<style type="text/css">

.ano { font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 18px; font-style: normal; line-height: normal; font-weight: bold; color: #000000; text-decoration: none }

.dia { font-family: Arial, Helvetica, sans-serif; font-size: 11px; font-style: normal; font-weight: normal; color: #000000; text-decoration: none }

</style>
<body bgcolor="#003366" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<div align="center"> 
  <table width="500" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td><table width="220" border="0" cellspacing="2" cellpadding="1">
        <tr align="center" bgcolor="#FF9900">
          <td colspan="7" align="center" class="ano"><?echo "$month_name $year";?></td>
        </tr>
        <tr class="dia" align="center">
          <?
  for ($i=0;$i<7;$i++) { ?>
          <td width="39" align="center" bgcolor="#FFFFFF"><? echo "$day_name[$i]"; ?></td>
          <? } ?>
        </tr>
        <tr class="dia" align="center">
          <?
  if (date("w",mktime(0,0,0,$month,1,$year))==0) {
    $start=7;
  } else {
    $start=date ("w",mktime(0,0,0,$month,1,$year));
    }
  for($a=($start-2);$a>=0;$a--)
     {
      $d=date("t",mktime(0,0,0,$month,0,$year))-$a;
  ?>
          <td bgcolor="#EEEEEE" align="center">
            <?=$d?>
          </td>
          <? }
  for($d=1;$d<=date("t",mktime(0,0,0,($month+1),0,$year));$d++)
        {
		global $linha;
	 if($month==date("m") && $year==date("Y") && $d==date("d")) {
      $bg="bgcolor=\"#cccc66\"";
	} else {
      $bg="bgcolor=\"#CDCDCD\"";
	  }
	for ($i=0;$i<$linha;$i++){
	global $month,$year,$d;
	$dia_sql=mysql_result($result,$i,'dia');
	$mes_sql=mysql_result($result,$i,'mes');
	$ano_sql=mysql_result($result,$i,'ano');
	$ano = ltrim(rtrim($ano_sql));
	$mes = ltrim(rtrim($mes_sql));
	$dia = ltrim(rtrim($dia_sql));
	if($d==$dia&$year==$ano&$month==$mes) {
      $bg="bgcolor=\"#999999\"";
	  } }
  ?>
          <td width="287" align="center" <?php echo $bg; ?>><?php echo $d;?></td>
          <?
  if(date("w",mktime(0,0,0,$month,$d,$year))==0&date("t",mktime(0,0,0,($month+1),0,$year))>$d)
  {
  ?>
        </tr>
        <tr class="dia" align="center">
          <?   }}
  $da=$d+1;
  if(date("w",mktime(0,0,0,$month+1,1,$year))<>1)
         {
          $d=1;
          while(date("w",mktime(0,0,0,($month+1),$d,$year))<>1)
                  {
  ?>
          <td bgcolor="#EEEEEE" align="center">
            <?=$d?>
          </td>
          <?
            $d++;
                  }
        }
  ?>
        </tr>
      </table>
        <font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">&nbsp; </font>
        <table width="222" border="0" cellspacing="2" cellpadding="1">
          <tr class="dia" align="center">
            <td width="212" align="center" bgcolor="#CDCDCD" style="border-left: 1px solid rgb(0,0,0); border-right: 1px solid rgb(0,0,0); border-bottom: 1px solid rgb(0,0,0); border-top: 1px solid rgb(0,0,0);">
              <? $date = date("d / m / Y"); echo "Hoje é dia $date"; ?>
            </td>
          </tr>
        </table></td> 
      <td><div align="center"> 
          </div>
        <div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">
          <?php 
	for ($i=0;$i<$linha;$i++){
	$dia_sql=mysql_result($result,$i,'dia');
	$mes_sql=mysql_result($result,$i,'mes');
	$ano_sql=mysql_result($result,$i,'ano');
	if($mes_sql==date("m") && $ano_sql==date("Y")) {
	$dados_sql=mysql_result($result,$i,'dados');	
	echo "<b>:: $dia_sql"."/"."$mes_sql"."/"."$ano_sql"." :"."</b> $dados_sql<br>";
	}
	}
	?>
        </font></div>
        <div align="center"></div></td>
    </tr>
  </table>
  
</div>
