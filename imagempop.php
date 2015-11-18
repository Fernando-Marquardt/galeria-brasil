<?php
require_once 'core/inc.comum.php';
?>
<script language="javascript"><!--
var i=0;

function resize() {
  if (navigator.appName == 'Netscape') i=40;
  if (document.images[0]) window.resizeTo(document.images[0].width +32, document.images[0].height+50-i);
}
//--></script>
<body onload="resize();">
<img src="<?php echo $_GET['imagem']; ?>" border="1" /> 