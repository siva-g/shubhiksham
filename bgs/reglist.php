<!DOCTYPE html>
<html>
    <head>
        <?php 

session_start();
if(!isset($_SESSION['email']))
{
$_SESSION["message"]="Please signin to continue";
header("Location:index.php");

}
include 'header.php'; ?>
        <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                List of members
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">




            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">List of members</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <?php
//                    $limit = 10;
//                    $pageper = 5;
////                    $select_path1 = "SELECT * FROM user_personal_information";
////                    $var1 = mysql_query($select_path1);
////           
////                    $numrows = mysql_num_rows($var1);
//                
////                    $noofpage = ceil($numrows / $pageper);
//                    $select_path = "SELECT * FROM  user_personal_information  LIMIT $pageper OFFSET $limit";
//                    $var = mysql_query($select_path,$conn);
//                   if(! $var ) {
//      die('Could not get data: ' . mysql_error());
//   }
                    echo "<br>";
                    
                    ?>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            
                            <tr>
                                <th>Email</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Count</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                   <?php 
                   
                   $sql = "SELECT users.email,users.name,users.phone,count(*) as ucount FROM users,members where members.created_by=users.sno GROUP BY members.created_by";
                   $retval = mysql_query( $sql, $conn );
   
   if(! $retval ) {
      die('Could not get data: ' . mysql_error());
   }
   
   while($row = mysql_fetch_assoc($retval)) {
      echo "<tr><td>".$row['email'] ." </td><td> ".
         $row['name']."</td> ".
         "<td>".$row['phone']." </td>"."<td>".$row['ucount']." </td>"."</tr> ";
   } ?>
   
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->



<!-- /.content -->
</div>
<?php include 'footer.php'; ?>
</body>
</html>
