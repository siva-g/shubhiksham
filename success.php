<?php

require './front_connection.php';
/* * *********Above code default in all pages*********** */
$status = $_POST["status"];
$firstname = $_POST["firstname"];
$amount = $_POST["amount"];
$txnid = $_POST["txnid"];
$posted_hash = $_POST["hash"];
$key = $_POST["key"];
$productinfo = $_POST["productinfo"];
$email = $_POST["email"];
$udf1 = $_POST['udf1'];
$udf2 = $_POST['udf2'];
$salt = "eCwWELxi";

If (isset($_POST["additionalCharges"])) {
    $additionalCharges = $_POST["additionalCharges"];
    $retHashSeq = $additionalCharges . '|' . $salt . '|' . $status . '||||||||||' . $udf2 . '|' . $udf1 . '|' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
} else {
    $retHashSeq = $salt . '|' . $status . '||||||||||' . $udf2 . '|' . $udf1 . '|' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
}

$hash = hash("sha512", $retHashSeq);
if ($hash != $posted_hash) {
    $msg->info("Invalid Transaction. Please try again", "index.php");
} else {
    $result = $db->query("SELECT sno FROM register_users WHERE email = '{$_POST['email']}' LIMIT 1");
    $user = $result->fetch_assoc();

    // Receive and sanitize input
    $user_id = mysqli_real_escape_string($db, $udf1);
    $payu_status = mysqli_real_escape_string($db, $status);
    $amount = mysqli_real_escape_string($db, $amount);
    $txnid = mysqli_real_escape_string($db, $txnid);
    $created = date('Y-m-d H:i:s');
    $sql = "INSERT INTO user_purchases (user_id,purchased_count,payu_status,amount,txnid,purchased_date) VALUES ('$user_id',20,'$payu_status','$amount','$txnid','$created')";
    $result1 = $db->query($sql);
    $succMsg = "Thank You. Your order status is " . $status . ".<br/>";
    $succMsg .= "Your Transaction ID for this transaction is " . $txnid . ".<br/>";
    $succMsg .= "We have received a payment of Rs. " . $amount . ". Once admin approved your purchase, you can view contact details.";

    require 'plugins/PHPMailer/PHPMailerAutoload.php';

    $mail = new PHPMailer;

    $mail->setFrom('noreply@smmatrimony.com', 'noreply@smmatrimony.com');
    $mail->addAddress($email, $firstname);

    $mail->IsHTML(true);
    $mail->Subject = 'Package purchased from Shubhiksham Matrimony';

    $message = "<b>Dear {$name}</b><br/><br/>";
    $message .= $succMsg;

    $mail->Body = $message;

    $mail->send();
//        echo '<pre>';
//        print_r($mail->ErrorInfo);
//        exit;
    $msg->info($succMsg, "index.php");
}
?>	