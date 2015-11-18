<? include("../admin/menu.php")?>
<form action="envia_fotos_script.php?nivel=<? echo $nivel?>&usuario=<? echo $usuario?>" method="post" enctype="multipart/form-data">
<input name="nomedapasta" type="hidden" value="<? echo $nomedapasta?>">
 <table width="400" align="center" cellpadding="0" cellspacing="0">
   <TR>
   <TD align="center" height="30"><font color="<? echo $cortexto?>" size="<? echo $ttitulo?>" face="<? echo $fonte?>"><strong>Enviar 
     Fotos</strong></font></td>
   </tr>
</table>
  <table align="center" cellpadding="0" cellspacing="0" style="border:1px solid <? echo $cortexto?>">
    <tr> 
      <td bgColor="<? echo $corcelula1?>"> <table border="0" align="left" cellpadding="2" cellspacing="0">
          <tr> 
            <TD width="50" align="right"> <font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>">Foto 
              01:</font> </tD>
            <td><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"> 
              <input name="foto01" type="file" size="14" style="border:1px solid <? echo $cortexto?>" tabindex="1">
              </font></td>
            <TD width="70" align="right"> <font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>">Foto 
              11:</font> </tD>
            <td><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"> 
              <input name="foto11" type="file" size="14" style="border:1px solid <? echo $cortexto?>" tabindex="11">
              </font></td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td bgColor="<? echo $corcelula2?>"> <table border="0" align="left" cellpadding="2" cellspacing="0">
          <tr> 
            <TD width="50" align="right"> <font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>">Foto 
              02:</font> </tD>
            <td><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"> 
              <input name="foto02" type="file" size="14" style="border:1px solid <? echo $cortexto?>" tabindex="2">
              </font></td>
            <TD width="70" align="right"> <font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>">Foto 
              12:</font> </tD>
            <td><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"> 
              <input name="foto12" type="file" size="14" style="border:1px solid <? echo $cortexto?>" tabindex="12">
              </font></td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td bgColor="<? echo $corcelula1?>"> <table border="0" align="left" cellpadding="2" cellspacing="0">
          <tr> 
            <TD width="50" align="right"> <font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>">Foto 
              03:</font> </tD>
            <td><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"> 
              <input name="foto03" type="file" size="14" style="border:1px solid <? echo $cortexto?>" tabindex="3">
              </font></td>
            <TD width="70" align="right"> <font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>">Foto 
              13:</font> </tD>
            <td><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"> 
              <input name="foto13" type="file" size="14" style="border:1px solid <? echo $cortexto?>" tabindex="13">
              </font></td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td bgColor="<? echo $corcelula2?>"> <table border="0" align="left" cellpadding="2" cellspacing="0">
          <tr> 
            <TD width="50" align="right"> <font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>">Foto 
              04:</font> </tD>
            <td><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"> 
              <input name="foto04" type="file" size="14" style="border:1px solid <? echo $cortexto?>" tabindex="4">
              </font></td>
            <TD width="70" align="right"> <font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>">Foto 
              14:</font> </tD>
            <td><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"> 
              <input name="foto14" type="file" size="14" style="border:1px solid <? echo $cortexto?>" tabindex="14">
              </font></td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td bgColor="<? echo $corcelula1?>"> <table border="0" align="left" cellpadding="2" cellspacing="0">
          <tr> 
            <TD width="50" align="right"> <font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>">Foto 
              05:</font> </tD>
            <td><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"> 
              <input name="foto05" type="file" size="14" style="border:1px solid <? echo $cortexto?>" tabindex="5">
              </font></td>
            <TD width="70" align="right"> <font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>">Foto 
              15:</font> </tD>
            <td><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"> 
              <input name="foto15" type="file" size="14" style="border:1px solid <? echo $cortexto?>" tabindex="15">
              </font></td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td bgColor="<? echo $corcelula2?>"> <table border="0" align="left" cellpadding="2" cellspacing="0">
          <tr> 
            <TD width="50" align="right"> <font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>">Foto 
              06:</font> </tD>
            <td><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"> 
              <input name="foto06" type="file" size="14" style="border:1px solid <? echo $cortexto?>" tabindex="6">
              </font></td>
            <TD width="70" align="right"> <font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>">Foto 
              16:</font> </tD>
            <td><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"> 
              <input name="foto16" type="file" size="14" style="border:1px solid <? echo $cortexto?>" tabindex="16">
              </font></td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td bgColor="<? echo $corcelula1?>"> <table border="0" align="left" cellpadding="2" cellspacing="0">
          <tr> 
            <TD width="50" align="right"> <font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>">Foto 
              07:</font> </tD>
            <td><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"> 
              <input name="foto07" type="file" size="14" style="border:1px solid <? echo $cortexto?>" tabindex="7">
              </font></td>
            <TD width="70" align="right"> <font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>">Foto 
              17:</font> </tD>
            <td><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"> 
              <input name="foto17" type="file" size="14" style="border:1px solid <? echo $cortexto?>" tabindex="17">
              </font></td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td bgColor="<? echo $corcelula2?>"> <table border="0" align="left" cellpadding="2" cellspacing="0">
          <tr> 
            <TD width="50" align="right"> <font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>">Foto 
              08:</font> </tD>
            <td><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"> 
              <input name="foto08" type="file" size="14" style="border:1px solid <? echo $cortexto?>" tabindex="8">
              </font></td>
            <TD width="70" align="right"> <font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>">Foto 
              18:</font> </tD>
            <td><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"> 
              <input name="foto18" type="file" size="14" style="border:1px solid <? echo $cortexto?>" tabindex="18">
              </font></td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td bgColor="<? echo $corcelula1?>"> <table border="0" align="left" cellpadding="2" cellspacing="0">
          <tr> 
            <TD width="50" align="right"> <font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>">Foto 
              09:</font> </tD>
            <td><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"> 
              <input name="foto09" type="file" size="14" style="border:1px solid <? echo $cortexto?>" tabindex="9">
              </font></td>
            <TD width="70" align="right"> <font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>">Foto 
              19:</font> </tD>
            <td><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"> 
              <input name="foto19" type="file" size="14" style="border:1px solid <? echo $cortexto?>" tabindex="19">
              </font></td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td bgColor="<? echo $corcelula2?>"> <table border="0" align="left" cellpadding="2" cellspacing="0">
          <tr> 
            <TD width="50" align="right"> <font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>">Foto 
              10:</font> </tD>
            <td><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"> 
              <input name="foto10" type="file" size="14" style="border:1px solid <? echo $cortexto?>" tabindex="10">
              </font></td>
            <TD width="70" align="right"> <font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>">Foto 
              20:</font> </tD>
            <td><font color="<? echo $cortexto?>" size="<? echo $tfonte?>" face="<? echo $fonte?>"> 
              <input name="foto20" type="file" size="14" style="border:1px solid <? echo $cortexto?>" tabindex="20">
              </font></td>
          </tr>
        </table></td>
    </tr>
  </table>

  <table width="400" align="center" cellpadding="0" cellspacing="0">
   <tr> 
     <td height="35" colspan="4" align="center"> 
       <INPUT Type="submit" Value="Enviar Fotos" name="Submit" style="width:100;border:1px solid <? echo $cortexto?>">
   </td>
   </tr>
</table>

</form>