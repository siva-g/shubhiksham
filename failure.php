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
$salt = "eCwWELxi"; // Your salt

If (isset($_POST["additionalCharges"])) {

    $additionalCharges = $_POST["additionalCharges"];
    $retHashSeq = $additionalCharges . '|' . $salt . '|' . $status . '||||||||||' . $udf2 . '|' . $udf1 . '' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
} else {
    $retHashSeq = $salt . '|' . $status . '|||||||||' . $udf2 . '|' . $udf1 . '|' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
}

$hash = hash("sha512", $retHashSeq);

if ($hash != $posted_hash) {
    $msg->info($_POST['error_Message'] . "<br/>Invalid Transaction. Please try again", "index.php");
} else {
    $failMsg = "Your order status is " . $status . ".<br/>";
    $failMsg .= "Your transaction id for this transaction is " . $txnid . ".";
    $msg->info($failMsg, "index.php");
}
?>