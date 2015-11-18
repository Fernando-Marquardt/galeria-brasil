<?
foreach($_GET as $var=>$valor){
eval ("\$$var=\"$valor\";");
}
foreach ($_POST as $var=>$valor){
eval ("\$$var=\"$valor\";");
}
foreach ($_FILES as $var=>$valor){
eval ("\$$var=\"$valor\";");
foreach ($_FILES[$var] as $sub => $subvalor){
eval ("\$".$var."_".$sub."=\"$subvalor\";");
}
}
?>
