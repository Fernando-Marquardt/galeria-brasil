<?php
if (!defined('IN_SYS')) die();
?>

<?php include 'usuarios/menu.php'; ?>   

<div class="span-18 last">
    <h2>Cadastrar Usuário</h2>
    
    <form action="?p=users_cadastra_db" method="post">
        <table>
            <tr> 
                <td>
                    <label for="nome">Nome:</label>
                </td>
                <td> 
                    <input name="nome" id="nome" type="text" size="30" />
                </td>
            </tr>
            <tr> 
                <td>
                    <label for="email">E-mail:</label>
                </td>
                <td> 
                    <input name="email" id="email" type="text" size="50" />
                </td>
            </tr>
            <tr> 
                <td>
                    <label for="login">Login:</label>
                </td>
                <td> 
                    <input name="login" id="login" type="text" />
                </td>
            </tr>
            <tr> 
                <td>
                    <label for="senha">Senha:</label>
                </td>
                <td> 
                    <input name="senha" id="senha" type="password" />
                </td>
            </tr>
            <tr> 
                <td>
                    <label for="nivel">Nível:</label>
                </td>
                <td>
                    <select name="nivel">
                        <option value="1">Administrador</option>
                        <option value="2">Usuário</option>
                    </select>
                </td>
            </tr>
        </table>

        <div class="box">
            <input type="submit" value="Cadastrar" name="Submit" />
            <input type="reset" value="Limpar" />
        </div>
    </form>
</div>