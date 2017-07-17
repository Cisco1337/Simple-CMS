<?php
define("DB_HOST", "localhost"); // databázový server (MySQL)
define("DB_USER", "root");      // jméno databázového uživatele
define("DB_PASS", ""); // heslo databázového uživatele
define("DB_NAME", "CMS"); // jméno databáze

$db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
?>