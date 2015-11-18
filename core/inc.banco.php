<?php
$db_link = null;

function db_connect($servidor, $usuario, $senha, $banco) {
    global $db_link;
    
    $db_link = mysql_connect($servidor, $usuario, $senha) or die("Não foi possível conectar ao servidor de banco de dados");
    mysql_select_db($banco) or die("Não foi possível selecionar o banco.");
}

function db_query($sql) {
    global $db_link;
    
    $result = mysql_query($sql, $db_link);
    
    if (!$result && DEBUG === true){
        echo '<div class="error">' . mysql_error($db_link) . '</div>';
    }
    
    return $result;
}

function db_result($result) {
    return mysql_fetch_assoc($result);
}

function db_row_count($result) {
    return mysql_num_rows($result);
}

/**
 * Função para evitar SQL injection, algoritmo tirado do link: http://forum.imasters.com.br/topic/125349-anti-sql-injection/
 * 
 * @param mixed $valor Valor que será tratado.
 */
function anti_injection($valor) {
    $valor = preg_replace('/(from|select|insert|delete|where|drop table|show tables|#|\*|--|\\\\)/i', '', $valor);
    $valor = trim($valor);
    $valor = strip_tags($valor);
    
    if (!get_magic_quotes_gpc()){
        $valor = mysql_real_escape_string($valor);
    }
    
    return $valor;
}
?>