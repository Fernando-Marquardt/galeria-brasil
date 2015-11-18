<?php
if (!defined('IN_SYS')) die();
?>

<?php include 'galerias/menu.php'; ?>

<div class="span-18 last">
    <h2>Enviar fotos</h2>
    
    <form action="?p=enviar_fotos_script&id=<?php echo $_GET['id']; ?>" method="post" enctype="multipart/form-data">
        <table>
            <tr> 
                <td>
                    <label for="foto01">Foto 01:</label>
                </td>
                <td>
                    <input name="foto[1]" id="foto01" type="file" size="14" />
                </td>
                <td>
                    <label for="foto11">Foto 11:</label>
                </td>
                <td>
                    <input name="foto[11]" id="foto11" type="file" size="14" />
                </td>
            </tr>
            <tr>
                <td>
                    <label for="foto02">Foto 02:</label>
                </td>
                <td>
                    <input name="foto[2]" id="foto02" type="file" size="14" />
                </td>
                <td>
                    <label for="foto12">Foto 12:</label>
                </td>
                <td>
                    <input name="foto[12]" id="foto12" type="file" size="14" />
                </td>
            </tr>
            <tr>
                <td>
                    <label for="foto03">Foto 03:</label>
                </td>
                <td>
                    <input name="foto[3]" id="foto03" type="file" size="14" />
                </td>
                <td>
                    <label for="foto13">Foto 13:</label>
                </td>
                <td>
                    <input name="foto[13]" id="foto13" type="file" size="14" />
                </td>
            </tr>
            <tr>
                <td>
                    <label for="foto04">Foto 04:</label>
                </td>
                <td>
                    <input name="foto[4]" id="foto04" type="file" size="14" />
                </td>
                <td>
                    <label for="foto14">Foto 14:</label>
                </td>
                <td>
                    <input name="foto[14]" id="foto14" type="file" size="14" />
                </td>
            </tr>
            <tr>
                <td>
                    <label for="foto05">Foto 05:</label>
                </td>
                <td>
                    <input name="foto[5]" id="foto05" type="file" size="14" />
                </td>
                <td>
                    <label for="foto15">Foto 15:</label>
                </td>
                <td>
                    <input name="foto[15]" id="foto15" type="file" size="14" />
                </td>
            </tr>
            <tr>
                <td>
                    <label for="foto06">Foto 06:</label>
                </td>
                <td>
                    <input name="foto[6]" id="foto06" type="file" size="14" />
                </td>
                <td>
                    <label for="foto16">Foto 16:</label>
                </td>
                <td>
                    <input name="foto[16]" id="foto16" type="file" size="14" />
                </td>
            </tr>
            <tr>
                <td>
                    <label for="foto07">Foto 07:</label>
                </td>
                <td>
                    <input name="foto[7]" id="foto07" type="file" size="14" />
                </td>
                <td>
                    <label for="foto17">Foto 17:</label>
                </td>
                <td>
                    <input name="foto[17]" id="foto17" type="file" size="14" />
                </td>
            </tr>
            <tr>
                <td>
                    <label for="foto08">Foto 08:</label>
                </td>
                <td>
                    <input name="foto[8]" id="foto08" type="file" size="14" />
                </td>
                <td>
                    <label for="foto18">Foto 18:</label>
                </td>
                <td>
                    <input name="foto[18]" id="foto18" type="file" size="14" />
                </td>
            </tr>
            <tr>
                <td>
                    <label for="foto09">Foto 09:</label>
                </td>
                <td>
                    <input name="foto[9]" id="foto09" type="file" size="14" />
                </td>
                <td>
                    <label for="foto19">Foto 19:</label>
                </td>
                <td>
                    <input name="foto[19]" id="foto19" type="file" size="14" />
                </td>
            </tr>
            <tr>
                <td>
                    <label for="foto10">Foto 10:</label>
                </td>
                <td>
                    <input name="foto[10]" id="foto10" type="file" size="14" />
                </td>
                <td>
                    <label for="foto20">Foto 20:</label>
                </td>
                <td>
                    <input name="foto[20]" id="foto20" type="file" size="14" />
                </td>
            </tr>
        </table>

        <div class="box">
            <input type="submit" value="Enviar Fotos" />
        </div>
    </form>
</div>