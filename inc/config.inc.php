<?php
define("DB_HOST", "localhost"); // databázový server (MySQL)
define("DB_USER", "root");      // jméno databázového uživatele
define("DB_PASS", ""); // heslo databázového uživatele
define("DB_NAME", "CMS"); // jméno databáze

define("SITE_NAME", "Simple CMS");

$db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
?>