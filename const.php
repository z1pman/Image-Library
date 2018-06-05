<?php

$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";

define('DIR_PATH', $_SERVER['DOCUMENT_ROOT']);
define('MAIN_URL', $protocol . $_SERVER['HTTP_HOST']);
define('DIR_VIEW', dirname(__FILE__));
define('DIR_IMAGE',  MAIN_URL . '/img/');
