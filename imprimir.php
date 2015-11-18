<?php
require_once 'core/inc.comum.php';

$id = $_GET['id'];

$sql = "SELECT *, DATE_FORMAT(data, '%d/%m/%Y') AS data FROM galeria WHERE id_galeria = ". $id;
$query = db_query($sql);

$rs = db_result($query);
?>

<script language="javascript"><!--
var i=0;
function resize() {
  if (navigator.appName == 'Netscape') i=40;
  if (document.images[0]) window.resizeTo(document.images[0].width +32, document.images[0].height+100-i);
}
//--></script>
</head>
<body onload="resize(); print();">
<table border="0" align="center" cellpadding="1" cellspacing="0">
    <tr>
        <td align="left" colspan="2">
            <strong><span style="text-transform: uppercase"><?php echo $rs['titulo'];?></span></strong>
            <br /><?php echo $rs['data'] . ' - ' . $rs['local'];?>
            <br /><hr width="100%" size="1" noshade="noshade" />
        </td>
    </tr>
    <tr>
        <td align="left" colspan="2">
            <img src='<?php echo $_GET['imagem'];?>' border="1" />
        </td>
    </tr>
</table>
