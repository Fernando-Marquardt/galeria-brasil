<?php
/**
 * Arquivo contendo as configura��es de todas as URLs acess�veis da galeria.
 * 
 * TODO � necess�rio encontrar um meio de automatizar o carregamento dessas URLs
 */

$app->group('/admin', function() use ($app) {
	$app->get('/', '\\Modules\\Application\\Controllers\\AdminController::indexAction');
});