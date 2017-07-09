<?php

require './front_connection.php';
/* * *********Above code default in all pages*********** */

if (isset($_SESSION['userDetails'])) {
    header('Location:search.php?page=1');
}

if (isset($_POST['login'])) {

    // Receive and sanitize input
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = md5(mysqli_real_escape_string($db, $_POST['password']));

    $result = $db->query("SELECT * FROM register_users WHERE email = '{$email}' AND password = '{$password}' LIMIT 1");

    if ($result->num_rows > 0) {
        $users = $result->fetch_assoc();
        if ($users['status'] == 1) {
            $_SESSION['userDetails'] = $users;
            $msg->success('Successfully Logged in!', "search.php?page=1");
        } elseif ($users['status'] == 0 && $users['act_key'] == NULL) {
            $msg->info("Your account was Deactivated. Please contact Administrator.", "index.php");
        } elseif ($users['status'] == 0 && $users['act_key'] != NULL) {
            $msg->info("Your account is not yet activated. Please check your inbox for Activation link mail.", "index.php");
        }
    } else {
        print_r($result) . '<br>';
//        echo mysqli_error();
        exit;
    }
} else {
    header('Location:index.php');
}
?>