<?php

session_start();
if (!isset($_SESSION['email'])) {
    $_SESSION["message"] = "Please signin to continue";
    header("Location:index.php");
}

include '../connection.php';
$user = $_GET['userid'];
$select_path1 = "DELETE FROM members WHERE userid=" . "'$user'";
$select_path2 = "DELETE FROM astro WHERE userid=" . "'$user'";
$var1 = mysql_query($select_path1);
$var2 = mysql_query($select_path2);
if($var1 && $var2){
     header("Location:memlist.php?limit=0");
}


