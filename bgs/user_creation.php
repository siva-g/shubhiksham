<!DOCTYPE html>
<html>
<head>
  <?php 
  session_start();
  echo $_SESSION['suc'];
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
      Add Member Information
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Basic Details</li>
      </ol>
    </section>

    <!-- Main content -->
  <section class="content">

 <?php 
      if(isset($_SESSION['suc']))
      {
        echo "<div class='row alert alert-success alert-dismissible'>";

         echo $_SESSION['suc'];
         unset($_SESSION['suc']);
         echo "</div>";
      } ?>
    <section class="col-lg-12 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
              <form role="form" action="signup.php" method="post">
              <div class="box-body">
              <div class="form-group">
                  <label for="exampleInputName">Name</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Name" name="name">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword">Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword" placeholder="Password" name="password">
                  <p class="help-block">Give Complex passwords</p>
                </div>
                <div class="form-group">
                  <label for="exampleInputphone">Phone Number</label>
                   <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Phone Number" name="phone">
                </div>
                 <div class="form-group">
                  <label for="exampleInputother">Other</label><br>
                 <textarea id="exampleInputother" name="other"></textarea>
                </div>
              </div>
              <!-- /.box-body -->

                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
              
            </form>
      
      
      
  </section>
    <!-- /.content -->
  </div>
<?php include 'footer.php'; ?>
</body>
</html>
