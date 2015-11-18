<?php
if (!defined('IN_SYS')) die();

$query = db_query("SELECT * FROM usuario WHERE id_usuario = '{$_GET['id']}'");
$usuario = db_result($query);
?>

<?php include 'usuarios/menu.php'; ?>   

<div class="span-18 last">
    <h2>Alterar Usuário</h2>
    
    <form action="?p=users_altera_db&id=<?php echo $usuario['id_usuario']?>" method="post">
        <table>
            <tr> 
                <td>
                    <label for="nome">Nome:</label>
                </td>
                <td> 
                    <input name="nome" id="nome" type="text" value="<?php echo $usuario['nome']?>" size="30" />
                </td>
            </tr>
            <tr> 
                <td>
                    <label for="email">E-mail:</label>
                </td>
                <td> 
                    <input name="email" id="email" type="text" value="<?php echo $usuario['email']?>" size="50" />
                </td>
            </tr>
            <tr>
                <td>
                    <label for="login">Login:</label>
                </td>
                <?php if ($_SESSION['usuario']['nivel'] == 1): ?>
                <td> 
                    <input name="login" id="login" type="text" value="<?php echo $usuario['login']?>" />
                </td>
                <?php else: ?>
                <td> 
                    <input disabled="disabled" type="text" value="<?php echo $usuario['login']?>" />
                </td>
                <?php endif; ?>
            </tr>
            <tr> 
                <td>
                    <label for="senha">Senha:</label>
                </td>
                <td> 
                    <input name="senha" id="senha" type="password" />
                </td>
            </tr>
            <?php if ($_SESSION['usuario']['nivel'] == 1): ?> 
            <tr> 
                <td>
                    <label for="nivel">Nível:</label>
                </td>
                <td>
                    <select name="nivel" id="nivel">
                        <?php if ($usuario['nivel'] == 1): ?>
                        <option value="1" selected="selected">Administrador</option>
                        <?php else: ?>
                        <option value="1">Administrador</option>
                        <?php endif; ?>

                        <?php if ($usuario['nivel'] == 2): ?>
                        <option value="2" selected="selected">Usuário</option>
                        <?php else: ?>
                        <option value="2">Usuário</option>
                        <?php endif; ?>
                    </select>
                </td>
            </tr>
            <?php endif; ?>
        </table>
        
        <div class="box">
            <input type="submit" value="Alterar" name="Submit" />
            <input type="reset" value="Limpar" />
        </div>
    </form>
</div>