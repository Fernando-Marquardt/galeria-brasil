<?php
include("path.php");

$id = $_GET['id'];

$sql = "SELECT *, nome AS evento, CONCAT_WS('/', dia, mes, ano) AS data FROM galeria WHERE id = ". $_GET['id'];
$query = mysql_query($sql);

$rs = mysql_fetch_array($query);
?>

<script language="javascript"><!--
var i=0;
function resize() {
  if (navigator.appName == 'Netscape') i=40;
  if (document.images[0]) window.resizeTo(document.images[0].width +32, document.images[0].height+100-i);
}
//--></script>
</head>
<body onload="resize();javascritp:print();">
<table border="0" align="center" cellpadding="1" cellspacing="0">
  <tr>
    <td align="left" colspan="2"><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"><strong><span style="text-transform: uppercase"><font size="<? echo $ttitulo?>"><? echo $rs['evento'];?></font></span></strong><br>
     <? echo $rs['data'];?>  -  <? echo $rs['local'];?></font><br> 
     <HR width="100%" size="1" noshade color="<? echo $cortexto?>"></td>
 </tr>
  <tr>
    <td align="left" colspan="2"><img src='<? echo $_GET['imagem'];?>' border="1"></td>
  </tr>
</table>
