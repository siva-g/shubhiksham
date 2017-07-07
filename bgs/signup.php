<?php

include ("../connection.php");
session_start();
if(isset($_POST['submit']))
{
  $name=trim($_POST["name"]);
  $email = trim($_POST['email']);
  /* $sql1="SELECT user_id FROM users WHERE user_id=$username";
   $query = mysql_query($sql1,$conn);
if(mysql_num_rows($query)==0)
{
$usernameerr="Username already exist";
header("Location:http://localhost/Php_practices/Tour/index.php#img2?$usernameer");
} */
   $password=trim(md5($_POST['password']));
   $other=$_POST['other'];
	$phone=$_POST['phone'];


$sql = "INSERT INTO users (name, email, password,phone,other) ".
       "VALUES('$name','$email','$password','$phone','$other' )";
$retval = mysql_query( $sql, $conn );


if(! $retval )
{
  die('Could not enter data: ' . mysql_error());
}else{
	$_SESSION['suc']="User Created Successfully";
	header("Location:user_creation.php");
}

mysql_close($conn);
}
?>