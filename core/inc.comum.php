<?php
define('BASEPATH', realpath(dirname(__FILE__) . '/../'));

require_once BASEPATH . '/core/config.php';
require_once BASEPATH . '/core/inc.banco.php';

db_connect($banco['servidor'], $banco['usuario'], $banco['senha'], $banco['banco']);

$configQuery = db_query('SELECT * FROM config');

while ($item = db_result($configQuery)) {
    $config[$item['chave']] = $item['valor'];
}
?>