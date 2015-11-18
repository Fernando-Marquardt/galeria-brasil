<?php
if (!defined('IN_SYS')) die();
?>

<?php include 'galerias/menu.php'; ?>

<div class="span-18 last">
    <script language="javascript">
        function validate(theForm) {
            if (theForm.nome.value == "") {
                alert("Digite o nome do Link");
                theForm.nome.focus();
                return (false);
            }

            return (true);
        }
    </script>
    
    <h2>Cadastrar Galeria</h2>
    
    <form action="?p=cadastrar_db" method="post" onsubmit="return validate(this);" enctype="multipart/form-data">
        <table>
            <tr> 
                <td width="120">
                    <label for="titulo">Título:</label>
                </td>
                <td>
                    <input name="titulo" id="titulo" type="text" size="40" /> 
                </td>
            </tr>
            <tr> 
                <td>
                    <label>Data:</label>
                </td>
                <td>
                    <label for="dia">Dia:</label>
                    <input name="dia" id="dia" type="text" value="<?php echo date("d") ?>" size="3" />
                    
                    <label for="mes">Mês:</label>
                    <input name="mes" id="mes" type="text" value="<? echo date("m") ?>" size="3" />
                    
                    <label for="ano">Ano:</label>
                    <input name="ano" id="ano" type="text" value="<? echo date("Y") ?>" size="4" />
                </td>
            </tr>
            <tr> 
                <td>
                    <label for="local">Local do Evento:</label>
                </td>
                <td>
                    <input name="local" id="local" type="text"size="30" /> 
                </td>
            </tr>
            <tr> 
                <td>
                    <label for="nomedapasta">Pasta de Destino:</label>
                </td>
                <td> 
                    <input type="text" name="nomedapasta" id="nomedapasta" />
                </td>
            </tr>
            <tr> 
                <td>
                    <label for="foto01">Foto de Destaque:</label>
                </td>
                <td>
                    <input name="foto01" id="foto01" type="file" size="25" />
                </td>
            </tr>
        </table>

        <div class="box">
            <input type="submit" value="Cadastrar" name="Submit" />
            <input type="reset" value="Limpar" />
        </div>
    </form>
</div>