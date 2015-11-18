<?php
session_start();

$_SESSION['gb'] = null;
unset($_SESSION['gb']);

session_destroy();

header('Location: index.php');
?>