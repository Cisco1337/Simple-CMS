<?php
session_start();

include '../inc/config.inc.php';

if (!isset($_SESSION['id']) || !isset($_SESSION['71a16ed2d4c0531acf76af5a793a0638'])){
    die();
}


if (isset($_POST['action'])){
    if ($_POST['action'] == "ban"){
        if (isset($_POST['uid'])){
            $query = $db->prepare("UPDATE users SET banned=1 WHERE id=:id");
            $query->execute(array(
                ':id'=>$_POST['uid']
            ));

            if ($query->rowCount() > 0){
                echo "success";
            }
        }
    } else if ($_POST['action'] == "delete"){
        if (isset($_POST['uid'])){
            $query = $db->prepare("DELETE FROM users WHERE id=:id");
            $query->execute(array(
                ':id'=>$_POST['uid']
            ));

            if ($query->rowCount() > 0){
                echo "success";
            }
        }
    }
}