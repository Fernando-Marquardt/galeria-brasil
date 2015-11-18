<?php

/*
 // Adicione essa linha na pagina que voce quer incluir o banner:
 //             <?php include('banner.php');?>
 



*/

$banner[] = "<a href=\"http://www.phpdemos.com.br\"><img src=\"http://phpdemos.com.br/images/banners/Logomini.gif\" border=0 alt=\"Clique Aqui!\"></a> ";


srand ((double) microtime() * 1000000);
$randombanner = rand(0,count($banner)-1);

echo "" . $banner[$randombanner] . "";

?> 
