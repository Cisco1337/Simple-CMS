<?php
if (!$core->loggedin()){
    include 'admin/login.php';
} else {
    if (isset($_GET['v'])) {
        if(!preg_match("~^\w+$~", $_GET['v'])){
            include 'pages/admin/home.php';
        }

        $page = 'pages/admin/' . $_GET['v'] . '.php';
        if (is_file($page)){
            include $page;
        } else {
            header("Location: " . $_SERVER['PHP_SELF'] . "?p=admin");
        }
    } else {
        include 'pages/admin/home.php';
    }
}
?>