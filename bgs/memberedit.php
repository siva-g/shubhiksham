<?php
include ("../connection.php");

session_start();
if(!isset($_SESSION['email']))
{
$_SESSION["message"]="Please signin to continue";
header("Location:index.php");

}
if(isset($_POST['save']))
{

  $userid=$_POST['userid'];
  $name=trim($_POST["name"]);
  $gender=trim($_POST["sex"]);
  $dob =  date('Y-m-d H:i:s', strtotime(str_replace('-', '/', $_POST['dob'])));
  $btime = date('H:i:s', strtotime($_POST['btime']));
  $height = trim($_POST['height']);
  $color = trim($_POST['color']);
  $phone = trim($_POST['phone']);
  $caste = trim($_POST['caste']);
  $subcaste = trim($_POST['subcaste']);
  $email = trim($_POST['email']);
  $father = trim($_POST['father']);
  $mother = trim($_POST['mother']);
  $malecount = trim($_POST['malecount']);
  $femalecount = trim($_POST['femalecount']);
  $malemarried = trim($_POST['malemarried']);
  $femalemarried = trim($_POST['femalemarried']);
  $job = trim($_POST['job']);
  $salary = trim($_POST['salary']);
  $qualification = trim($_POST['qualification']);
  $expectation = trim($_POST['expectation']);
  $address = trim($_POST['address']);
  $city = trim($_POST['city']);
  $state = trim($_POST['state']);
  $raasi = trim($_POST['raasi']);
  $laknam = trim($_POST['laknam']);
  $star = trim($_POST['star']);
  $properties = trim($_POST['properties']);
  $poorvigam = trim($_POST['poorvigam']);
  $kuladeivam = trim($_POST['kuladeivam']);
  $joblocation = trim($_POST['joblocation']);
  $porutham = trim($_POST['porutham']);
  $thisai=trim($_POST['thisai']);
  $r1 = trim($_POST['r1']);
  $r2 = trim($_POST['r2']);
  $r3 = trim($_POST['r3']);
  $r4 = trim($_POST['r4']);
  $r5 = trim($_POST['r5']);
  $r6 = trim($_POST['r6']);
  $r7 = trim($_POST['r7']);
  $r8 = trim($_POST['r8']);
  $r9 = trim($_POST['r9']);
  $r10 = trim($_POST['r10']);
  $r11 = trim($_POST['r11']);
  $r12 = trim($_POST['r12']);
  $l1 = trim($_POST['l1']);
  $l2 = trim($_POST['l2']);
  $l3 = trim($_POST['l3']);
  $l4 = trim($_POST['l4']);
  $l5 = trim($_POST['l5']);
  $l6 = trim($_POST['l6']);
  $l7 = trim($_POST['l7']);
  $l8 = trim($_POST['l8']);
  $l9 = trim($_POST['l9']);
  $l10 = trim($_POST['l10']);
  $l11 = trim($_POST['l11']);
  $l12 = trim($_POST['l12']);
  $createdby=$_SESSION['sno'];

  /* $sql1="SELECT user_id FROM users WHERE user_id=$username";
   $query = mysql_query($sql1,$conn);
if(mysql_num_rows($query)==0)
{
$usernameerr="Username already exist";
header("Location:http://localhost/Php_practices/Tour/index.php#img2?$usernameer");
} */
  
    $sql = "INSERT INTO members(userid,name,sex,dob,btime,height,color,phone,caste,subcaste,email,job,salary,qualification,expectation,address,city,state,pin,properties,created_by,poorvigam,kuladeivam,joblocation)"."VALUES('$ucode','$name','$gender','$dob','$btime','$height','$color','$phone','$caste','$subcaste','$email','$job','$salary','$qualification','$expectation','$address','$city','$state', '$pin','$properties','$createdby','$poorvigam','$kuladeivam','$joblocation' )";
    $sql1="INSERT INTO jobs(name)"."VALUES('$job')";
   
    $sql2="INSERT INTO family (fathername,mothername,malecount,femalecount,malemarried,femalemarried,userid)"."VALUES('$father','$mother','$malecount','$femalecount','$malemarried','$femalemarried','$ucode')";


     $sql3="INSERT INTO astro (userid,raasi,laknam,star,porutham,thisai,r1,r2,r3,r4,r5,r6,r7,r8,r9,r10,r11,r12,l1,l2,l3,l4,l5,l6,l7,l8,l9,l10,l11,l12)"."VALUES('$ucode','$raasi','$laknam','$star','$porutham','$thisai','$r1','$r2','$r3','$r4','$r5','$r6','$r7','$r8','$r9','$r10','$r11','$r12','$l1','$l2','$l3','$l4','$l5','$l6','$l7','$l8','$l9','$l10','$l11','$l12')";

 $sql = "update members set name='$name',sex='$sex',dob='$dob',btime='$btime',height='$height',color='$color',phone='$phone',caste='$caste',subcaste='$subcaste',email='$email',job='$job',salary='$salary',qualification='$qualification',expectation='$expectation',address='$address',city='$city',state='$state',properties='$properties',poorvigam='$poorvigam',kuladeivam='$kuladeivam',joblocation='$joblocation' where userid='$userid'";
 $sql1="update family set fathername='$father',mothername='$mother',malecount='$malecount',femalecount='$femalecount',malemarried='$malemarried',femalemarried='$femalemarried' where userid='$userid' ";
 $sql2="update astro set raasi='$raasi',laknam='$laknam',star='$star',porutham='$porutham',thisai='$thisai',r1='$r1',r2='$r2',r3='$r3',r4='$r4',r5='$r5',r6='$r6',r7='$r7',r8='$r8',r9='$r9',r10='$r10',r11='$r11',r12='$r12',l1='$l1',l2='$l2',l3='$l3',l4='$l4',l5='$l5',l6='$l6',l7='$l7',l8='$l8',l9='$l9',l10='$l10',l11='$l11',l12='$l12' where userid='$userid'";
 
//= mysql_query( $sql, $conn );
$retval = mysql_query( $sql, $conn );
$retval1 = mysql_query( $sql1, $conn );
$retval2 = mysql_query( $sql2, $conn );
}

if($retval && $retval1 && $retval2 )
{
    $_SESSION['suc']="User Cedited Successfully";
  header("Location:viewmem.php?userid=$userid");
 
}else{
 die('Could not enter data: ' . mysql_error());
}
mysql_close($conn);
?>