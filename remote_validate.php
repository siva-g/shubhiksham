<?php

require './front_connection.php';
/* * *********Above code default in all pages*********** */

if (isset($_POST['reg_email'])) {
    $name = $db->query("SELECT email FROM register_users WHERE email = '{$_POST['reg_email']}' LIMIT 1");

    if ($name->num_rows == 0) {
        echo "true";
    } else {
        echo "false";
    }
} elseif (isset($_POST['reg_phone'])) {
    $phone = $db->query("SELECT phone FROM register_users WHERE phone = '{$_POST['reg_phone']}' LIMIT 1");

    if ($phone->num_rows == 0) {
        echo "true";
    } else {
        echo "false";
    }
}

if (isset($_POST['log_email']) && isset($_POST['email'])) {
    $name = $db->query("SELECT email FROM register_users WHERE email = '{$_POST['log_email']}' LIMIT 1");

    if ($name->num_rows == 0) {
        echo "false";
    } else {
        echo "true";
    }
}

if (isset($_POST['log_pass']) && isset($_POST['password'])) {
    $logPass = md5($_POST['log_pass']);
    $phone = $db->query("SELECT email FROM register_users WHERE email = '{$_POST['log_email']}' AND password = '{$logPass}' LIMIT 1");

    if ($phone->num_rows == 0) {
        echo "false";
    } else {
        echo "true";
    }
}
exit;
