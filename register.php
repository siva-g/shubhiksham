<?php

require './front_connection.php';
/* * *********Above code default in all pages*********** */

if (isset($_SESSION['userDetails'])) {
    header('Location:search.php?page=1');
}

if (!isset($_GET["actkey"]) && !isset($_POST['register'])) {
    header('Location:index.php');
}

if (isset($_GET["actkey"])) {
    $actkey = mysqli_real_escape_string($db, $_GET['actkey']);
    if ($actkey != '') {
        $actKey = $db->query("SELECT act_key FROM register_users WHERE act_key = '{$actkey}' LIMIT 1");
        if ($actKey->num_rows > 0) {
            $sql = "UPDATE register_users SET status = 1,act_key = NULL WHERE act_key ='{$actkey}'";
            $update_status = $db->query($sql);
            if ($update_status) {
                $msg->success('Acctivation Successfull!');
                $msg->info('Please Login using your credentials.', "index.php");
            } else {
                $msg->error('Something went wrong! Try again later.', "index.php");
            }
        } else {
            $msg->error('Activation link expired or invalid.', "index.php");
        }
    }
}

if (isset($_POST['register'])) {

    if (isset($_FILES['photo'])) {
        $errors = array();
        $file_name = $_FILES['photo']['name'];
        $file_size = $_FILES['photo']['size'];
        $file_tmp = $_FILES['photo']['tmp_name'];
        $file_type = $_FILES['photo']['type'];
        $file_ext = strtolower(end(explode('.', $_FILES['photo']['name'])));

        $expensions = array("jpeg", "jpg", "png");

        if (in_array($file_ext, $expensions) === false) {
            $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
        }

        if ($file_size > 2097152) {
            $errors[] = 'File size must be excately 2 MB';
        }

        if (empty($errors) == true) {
            $newFileName = rand(100000, 9999999) . '.' . $file_ext;
            move_uploaded_file($file_tmp, "images/profile/" . $newFileName);
        } else {
            print_r($errors);
            exit();
        }
    } else {
        $newFileName = NULL;
    }

    // Receive and sanitize input
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $phone = mysqli_real_escape_string($db, $_POST['phone']);
    $dob = mysqli_real_escape_string($db, $_POST['dob']);
    $gender = mysqli_real_escape_string($db, $_POST['gender']);
    $profile = mysqli_real_escape_string($db, $_POST['profile_for']);
    $caste = mysqli_real_escape_string($db, $_POST['caste']);
    $address = mysqli_real_escape_string($db, $_POST['address']);
    $password = md5(mysqli_real_escape_string($db, $_POST['password']));
    $actKey = rand(10000, 99999);
    $created = date('Y-m-d H:i:s');
    $sql = "INSERT INTO register_users (photo,profile_for,caste,address,name,phone,email,dob,gender,password,act_key,created) VALUES ('$newFileName','$profile','$caste','$address','$name','$phone','$email','$dob','$gender','$password','$actKey','$created')";
    $result = $db->query($sql);
    if ($result) {

        $actLink = 'http://' . $_SERVER['HTTP_HOST'] . '' . $_SERVER['REQUEST_URI'] . '?actkey=' . $actKey;

        require 'plugins/PHPMailer/PHPMailerAutoload.php';

        $mail = new PHPMailer;

        $mail->setFrom('noreply@smmatrimony.com', 'noreply@smmatrimony.com');
        $mail->addAddress($email, $name);

        $mail->IsHTML(true);
        $mail->Subject = 'Account Activation from Shubhiksham Matrimony';

        $message = "<b>Dear {$name}</b><br/><br/>";
        $message .= "Glad to have you on Shubhiksham Matrimony. Please click the below link to activate your account.<br/>";
        $message .= "<a href='{$actLink}'>{$actLink}</a><br/><br/>";
        $message .= "Thanks";

        $mail->Body = $message;

        $mail->send();

        $msg->success('Registration Successfull!');
        $msg->info('Please check your inbox to activate the account on Shubhiksham Matrimony.', "index.php");
    } else {
        echo mysqli_error();
        exit;
    }
}
?>