<?php
session_start();
define('URL', 'http://localhost/php_projects/bankWeb/');
define('DIR', __DIR__.'/');
require DIR.'app/functions.php';

_d($_SESSION, 'SESIJA--->');
?>