<?php

include("../connection.php");
session_start();
if (isset($_POST['login'])) {
    $sql = "SELECT * FROM users WHERE email='" . trim($_POST['email']) . "' and password='" . md5($_POST['password']) . "'";
    $res = mysql_query($sql);
    $row = mysql_fetch_assoc($res);
    if (mysql_num_rows($res) > 0) {
        if ($row["status"] == 1) {
            if ($row['email'] == "superadmin@gmail.com") {
                $email = $row['email'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['name'] = $row['name'];
                $sql1 = "UPDATE users SET last_visited = Now() WHERE email='" . trim($_POST['email']);
                $res1 = mysql_query($sql1);
                unset($_SESSION["error"]);
                header("Location:reglist.php");
            } else {
                $email = $row['email'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['sno'] = $row['sno'];
                $sql1 = "UPDATE users SET last_visited = Now() WHERE email='" . trim($_POST['email']);
                $res1 = mysql_query($sql1);
                unset($_SESSION["error"]);
                header("Location:memlist.php?limit=1");
            }
        } else {
            $_SESSION["error"] = "Your account was disabled.. contact adminstrator";
            header("Location:index.php");
        }
    } else {
        $_SESSION["error"] = "Your credentials are wrong";
        header("Location:index.php");
    }
}
?>
