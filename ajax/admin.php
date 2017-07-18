<?php
session_start();

if (!isset($_SESSION['id']) || !isset($_SESSION['71a16ed2d4c0531acf76af5a793a0638'])){
    die();
}


if (isset($_POST['action'])){
    if ($_POST['action'] == "ban"){
        if (isset($_POST['uid'])){
            echo "xd";
        }
    } else if ($_POST['action'] == "delete"){
        if (isset($_POST['uid'])){
            
        }
    }
}
?>