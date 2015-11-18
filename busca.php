<? include("path.php");?>
<html>
<head>
<title>Procura de Baladas</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<script src="css/janelas_popup.js" language="JavaScript"></script>

<body bgCOLOR="#FE9800">

<STYLE type=text/css>BODY {
MARGIN: 0px
}
</STYLE>
<form name="form1" method="post" action="busca.php?busca=ok">

<table width="450"  border="0" align="center" bgCOLOR="#FE9800" style="font-family:verdana;font-size:8pt;color:000000;background-color:FE9800">
<tr>
<td colspan="2">
<div align="center">
<b>Como Procurar?</b>
<br>
Ex.: Se você deseja alguma foto do Vocejaviu.com.br, pode digitar "voce" ou "vocejaviu" ou "voceja" ou então o nome completo, esse critério serve
para os campos <b>Nome do Evento</b>, <b>Local</b> e <b>Fotografo</b>, apenas a <b>Data e ano</b> deverão ser digitados o número Ex.: "01" corresponde a janeiro assim por diante.
</div>
</td>
</tr>
 <tr>
 <td colspan="2"><div align="center">Buscar :
 <input name="busca_que" type="text" class="style1">
 </div>
 </td>
 </tr>
 <tr>
 <td colspan="2"><div align="center">Buscar Por :
 <select name="busca_quem" class="style1" id="select">
 <option value="nome" selected>Nome Evento</option>
 <option value="local">Local</option>
 <option value="fotografo">Fotografo</option>
 <option value="mes">Mês</option>
 <option value="ano">Ano</option>
 </select>
 </div>
 </td>
 </tr>
 <tr>
 <td colspan="2"><div align="center">
 <input name="Submit" type="submit" class="style1" value="Buscar">
 </div>
 </td>
 </tr>
 <tr>
 <td width="70%">
 <div align="left">

<?php

if($_GET['busca'] == "ok"){
 $op = $_POST['busca_quem'];
 $oque = $_POST['busca_que'];
 $banco = mysql_query("SELECT count(*) as total FROM galeria WHERE $op LIKE '%$oque%'"); ## CONTA QUANTOS REGISTROS TEM ##
 $numero = mysql_fetch_array($banco); ## CRIA UM ARRAY COM TODAS AS TABELAS #
 $quantos = $numero['total'];
 $totalpag = ceil(($quantos)/50);

if(!isset($_GET['start']))$_GET['start']=0;
 $start=$_GET['start'];
 $query_ult = mysql_query("SELECT * FROM galeria WHERE $op LIKE '%$oque%' ORDER BY id DESC LIMIT $start,50") or die(print(mysql_error()));
 while($data_ult = mysql_fetch_array($query_ult)){
?>

<a href="javascript:AbreJanelaGaleria('janela.php?dir=images/galeria/<? echo "$data_ult[pasta]/&id=$data_ult[id]&evento=$data_ult[nome]&data=$data_ult[dia]/$data_ult[mes]/$data_ult[ano]&local=$data_ult[local]&id=$data_ult[id]&fotografo=$data_ult[fotografo]";?>')"><img src="imagemdimindex.php?imagem=images/<? echo $data_ult['pasta']?>/<? echo $data_ult['foto01']?>" border="1" align="left"></a>

                 

<?php
 echo "<b>Nome Evento :</b>".$data_ult['nome']."<br>";
 echo "<b>Local :</b>".$data_ult['local']."<br>";
 echo "<b>Data :</b>".$data_ult['dia']."/".$data_ult['mes']."/".$data_ult['ano']."<br><br>";
 $passou = "ok";

}
?>

</div></td>
               </tr>
               <tr>
                 <td height="79" colspan="2"><div align="center">

<?php
 if($totalpag>1)
    { ## PAGINAÇÃO, SE TIVER MAIS QUE UMA PAGINA ##
    for($i=1; $i<=$totalpag; $i++) ## UM LACO QUE PEGA ATEH QUANTAS PÁGINAS TERÁ ##
    {
    if(50*($i-1)==$start) ## SE ESTIVER NA PÁGINA OU SEJA FOR IGUAL A VARIAVEL STAR, A PÁGINA FICA EM NEGRITO ##
    { 
    echo " | <b>$i</b>";
    }
    else
    {
    $aevi = 50*($i-1); 
    echo " | <a href=\"busca.php?busca=ok&start=$aevi\"><b>$i</b></a> ";
    } ## CASO CONTRARIO MOSTRA AS OUTRAS PÁGINAS PARA SE NAVEGAR ##
    }
    }
    $agora = ($start/50)+1; ## PEGA A PÁGINA ATUAL ##
    $todas = $totalpag; ## PEGA O TOTAL DE PÁGINA ##
    if($passou != "ok"){
      echo "Desculpe mas não foram encontrados resultados para sua busca !!!<br>";
    }
    else{
    echo "<br><br><br>Exibindo página $agora de $todas páginas<br>"; ## MOSTRA AS VARIAVEIS ##
    }  
    }
     
?>

</div>
</td>
</tr>
</table>
<br>
<br>
</form>
</body>
</html>

