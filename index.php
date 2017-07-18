<?php
session_start();
include 'inc/config.inc.php';
include 'inc/Core.class.php';

$core = new Core($db);

if (isset($_GET['p'])) {
    if(!preg_match("~^\w+$~", $_GET['p'])){
        include 'pages/home.php';
    }

    $page = 'pages/' . $_GET['p'] . '.php';
    if (is_file($page)){
        include $page;
    } else {
        header("Location: " . $_SERVER['PHP_SELF']);
    }
} else {
    include 'pages/home.php';
}
?>