<?php
/**
 * Arquivo contendo as configurações de todas as URLs acessíveis da galeria.
 * 
 * TODO É necessário encontrar um meio de automatizar o carregamento dessas URLs
 */

$app->group('/admin', function() use ($app) {
	$app->get('/', '\\Modules\\Application\\Controllers\\AdminController::indexAction');
});