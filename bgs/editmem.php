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

  include 'header1.php';
  include '../connection.php' ?>
    <?php 
$userid = $_GET['userid'];
$select_path = "SELECT * FROM members,astro,family where members.userid=astro.userid and members.userid=family.userid and members.userid='" . $userid . "'";
$var = mysql_query($select_path);
$row = mysql_fetch_assoc($var);  
    ?>
    
    
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
        <li class="active">Edit MEMBER</li>
      </ol>
    </section>

    <!-- Main content -->
  <section class="content">


    <section connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
              <form role="form" action="memberedit.php" method="post">
                <div class="box-body"><?php
                  if(isset($_SESSION['suc']))
      {
        echo "<div class='row alert alert-success alert-dismissible'>";

         echo $_SESSION['suc'];
         unset($_SESSION['suc']);
         echo "</div>";
      } ?>
          <div class="row">

            <div class="col-md-6">
                  <div class="form-group">
                  <label for="caste">Caste / ஜாதி </label>
                  <input type="text" class="form-control" id="exampleInputcaste" name="caste" required="required" value="<?php echo $row['caste'] ?>">
                </div>

               <div class="form-group">
                  <label for="exampleInputName">Name/பெயர் </label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Name" name="name" required="required" value="<?php echo $row['name'] ?>">
                </div>
                 <div class="form-group">
                  <label for="dob">Date of birth /பிறந்த தேதி </label>
                  <input type="date" class="form-control" id="dob" placeholder="Date of birth" name="dob" required="required" value="<?php echo $row['dob'] ?>">
                </div>
                 <div class="form-group">
                  <label for="qualification">Qualification / படிப்பு </label>
                  <input type="text" class="form-control" id="exampleInputqualification" placeholder="Enter qualification" name="qualification" value="<?php echo $row['qualification'] ?>">
                </div>
                 <div class="form-group">
                  <label for="job">Job / வேலை </label>
                  <input type="text" class="form-control" id="exampleInputjob" placeholder="Enter Job" name="job" value="<?php echo $row['job'] ?>">
                </div>
                  <div class="form-group">
                  <label for="height">Height / உயரம் </label>
                  <input type="text" class="form-control" id="height" placeholder="height" name="height" value="<?php echo $row['height'] ?>">
                </div>
                   <div class="form-group">
                  <label for="kuladeivam">Kula deivam / குல தெய்வம்   </label>
                  <input type="text" class="form-control" id="exampleInputdeivam" placeholder="Enter Star" name="kuladeivam" value="<?php echo $row['kuladeivam'] ?>" >
                </div> 
                <div class="form-group">
                  <label for="malecount">Number of brothers / சகோதரர் எண்ணிக்கை </label>
                  <input type="number" class="form-control" id="exampleInputmalecount" placeholder="Enter Male count" name="malecount" value="<?php echo $row['malecount'] ?>">
                </div>
                 <div class="form-group">
                  <label for="male">Number of sisters / சகோதரிகள் எண்ணிக்கை </label>
                  <input type="number" class="form-control" id="exampleInputfemalecount" placeholder="Enter FeMale count" name="femalecount" value="<?php echo $row['femalecount'] ?>">
                </div>
                 <div class="form-group">
                  <label for="father">Father name / தந்தை பெயர் </label>
                  <input type="text" class="form-control" id="exampleInputfather" placeholder="Enter father name" name="father" value="<?php echo $row['fathername'] ?>">
                </div>
                 <div class="form-group">
                  <label for="jobloc">Poorvigam/ பூர்விகம் </label>
                  <input type="text" class="form-control" id="exampleInputjobloc" placeholder="Enter Poorvigam" name="poorvigam" value="<?php echo $row['poorvigam'] ?>">
                </div>
                
                <div class="form-group">
                  <label for="raasi">Raasi / ராசி </label>
                  <input type="text" class="form-control" id="exampleInputraasi" placeholder="Enter raasi" name="raasi" value="<?php echo $row['raasi'] ?>">
                </div>
                  <div class="form-group">
                  <label for="laknam">Laknam / லக்னம் </label>
                  <input type="text" class="form-control" id="exampleInputlaknam" placeholder="Enter laknam" name="laknam" value="<?php echo $row['laknam'] ?>">
                </div>
		<div class="form-group">
                  <label for="Address">Address</label>
                  <textarea name="address" required="required" ><?php echo $row['address'] ?></textarea>
                </div>
                 <div class="form-group">
                  <label for="city" >City / மாவட்டம் </label>
                  <input type="text" class="form-control" id="exampleInputexpectation" placeholder="Enter City" name="city" required="required" value="<?php echo $row['city'] ?>"> 
                </div>
                <div class="form-group">
                  <label for="state">State / மாநிலம் </label>
                  <input type="text" class="form-control" id="exampleInputexpectation" placeholder="Enter State" name="state" required="required" value="<?php echo $row['state'] ?>">
                </div>
                <div class="form-group">
                  <label for="state">Porutham /பொருத்தம்  </label>
                  <input type="text" class="form-control" id="exampleInputexpectation" placeholder="Enter porutham" name="porutham" required="required" value="<?php echo $row['porutham'] ?>">
                </div>
                
                
                
                </div>
                   
              
              
              
              
              
              
              <div class="col-md-6">
                  
                      
                <div class="form-group">
                  <label for="caste">Sub Caste / உட்பிரிவு </label>
                  <input type="text" class="form-control" id="exampleInputsubcaste" placeholder="Enter Sub Caste" name="subcaste" required="required" value="<?php echo $row['subcaste'] ?>">
                </div>
                  <div class="form-group">
                  <label for="gender">Gender/பால் இனம் </label>
                  <select name="sex" required="required"><option value ='M' <?php if($row['sex']=='M'){echo 'selected="selected"'; } ?>>ஆண்</option><option value="F" <?php if($row['sex']=='F'){echo 'selected="selected"'; } ?>>பெண்</option></select>
                </div>
                 <div class="form-group">
                  <label for="time">Birth time / பிறந்த நேரம் </label>
                  <input type="text" class="form-control" id="dob" placeholder="Birth time" name="btime" required="required" value="<?php echo $row['btime'] ?>">
                </div>
               <div class="form-group">
                  <label for="salary">Salary / வருமானம் </label>
                  <input type="number" class="form-control" id="exampleInputsalary" placeholder="Enter salary" name="salary" value="<?php echo $row['salary'] ?>">
                </div>
                <div class="form-group">
                  <label for="jobloc">Job Location / வேலை </label>
                  <input type="text" class="form-control" id="exampleInputjobloc" placeholder="Enter Job" name="joblocation" value="<?php echo $row['joblocation'] ?>">
                </div>
               
                 <div class="form-group">
                  <label for="color">Color / நிறம் </label>
                 <input type="text" class="form-control" id="exampleInputcolor" placeholder="Enter your Color" name="color" value="<?php echo $row['color'] ?>">
                </div>
                 <div class="form-group">
                  <label for="properties">Properties / சொத்துகள் </label>
                  <select name="properties" required="required"><option value="உண்டு" <?php if($row['properties']=='உண்டு'){echo 'selected="selected"'; } ?>   >உண்டு</option><option value="இல்லை" <?php if($row['properties']=='இல்லை'){echo 'selected="selected"'; } ?>>இல்லை</option></select>
                </div> 
                   	
                <div class="form-group">
                  <label for="malemarried">Number of brothers married / திருமணமான சகோதரர்கள் </label>
                  <input type="number" class="form-control" id="exampleInputmalemarried" placeholder="Enter Male married" name="malemarried" value="<?php echo $row['malemarried'] ?>">
                </div>
            
                <div class="form-group">
                  <label for="femalemarried">Number of sisters married / திருமணமான சகோதரிகள் எண்ணிக்கை</label>
                  <input type="number" class="form-control" id="exampleInputmalemarried" placeholder="Enter Female married" name="femalemarried" value="<?php echo $row['femalemarried'] ?>">
                </div>  
                  
                <div class="form-group">
                  <label for="father">Mother name / தாய் பெயர் </label>
                  <input type="text" class="form-control" id="exampleInputfather" placeholder="Enter Mother name" name="mother" value="<?php echo $row['mothername'] ?>">
                </div> 

                 <div class="form-group">
                  <label for="star">Naksathram / நட்சத்திரம் </label>
                  <input type="text" class="form-control" id="exampleInputstar" placeholder="Enter Star" name="star" value="<?php echo $row['star'] ?>" >
                </div>
                <div class="form-group">
                  <label for="thisai">Thisai iruppu / திசை இருப்பு  </label>
                  <input type="text" class="form-control" id="exampleInputthisai" placeholder="Enter Star" name="thisai" value="<?php echo $row['thisai'] ?>" >
                </div> 
                 <div class="form-group">
                  <label for="email">Email / ஈமெயில் </label>
                  <input type="email" class="form-control" id="exampleInputemail" placeholder="Enter email" name="email" value="<?php echo $row['email'] ?>"> 
                </div> 
                <div class="form-group">
                  <label for="exampleInputphone">Phone Number /போன் நம்பர் </label>
                   <input type="text" class="form-control" id="exampleInputPhone" placeholder="Phone Number" name="phone" required="required" value="<?php echo $row['phone'] ?>">
                </div>
                 
                  <div class="form-group">
                  <label for="expectation">Expectation / எதிர்பார்ப்பு </label>
                  <input type="text" class="form-control" id="exampleInputexpectation" placeholder="Enter expectation" name="expectation" value="<?php echo $row['expectation'] ?>">
                </div>
                
              </div>
              </div>
              </div>
              <dir class="row">
                <div class="col-md-3">
                <div class="form-group">
                  <label for="r1">R1</label>
                  <input type="text" class="form-control" id="exampleInputr1"  name="r1" value="<?php echo $row['r1'] ?>">
                </div>
                <div class="form-group">
                <label for="r2">R2</label>
                <input type="text" class="form-control" id="exampleInputr2"  name="r2"  value="<?php echo $row['r2'] ?>">
                </div>
                  <div class="form-group">
                <label for="r3">R3</label>
                <input type="text" class="form-control" id="exampleInputr3"  name="r3" value="<?php echo $row['r3'] ?>" >
                </div>
                  <div class="form-group">
                <label for="r4">R4</label>
                <input type="text" class="form-control" id="exampleInputr4" p name="r4" value="<?php echo $row['r4'] ?>" >
                </div>
                  <div class="form-group">
                <label for="r5">R5</label>
                <input type="text" class="form-control" id="exampleInputr5"  name="r5" value="<?php echo $row['r5'] ?>" >
                </div>
                  <div class="form-group">
                <label for="r6">R6</label>
                <input type="text" class="form-control" id="exampleInputr6"  name="r6" value="<?php echo $row['r6'] ?>">
                </div>
                <div class="form-group">
                <label for="r7">R7</label>
                <input type="text" class="form-control" id="exampleInputr7"  name="r7" value="<?php echo $row['r7'] ?>">
                </div>
                 <div class="form-group">
                <label for="r8">R8</label>
                <input type="text" class="form-control" id="exampleInputr8"  name="r8" value="<?php echo $row['r8'] ?>">
                </div>
                <div class="form-group">
                <label for="r9">R9</label>
                <input type="text" class="form-control" id="exampleInputr9"  name="r9" value="<?php echo $row['r9'] ?>">
                </div>
                 <div class="form-group">
                <label for="r10">R10</label>
                <input type="text" class="form-control" id="exampleInputr10"  name="r10" value="<?php echo $row['r10'] ?>">
                </div>
               <div class="form-group">
                <label for="r11">R11</label>
                <input type="text" class="form-control" id="exampleInputr11"  name="r11" value="<?php echo $row['r11'] ?>">
                </div>
                <div class="form-group">
                <label for="r12">R12</label>
                <input type="text" class="form-control" id="exampleInputr12"  name="r12" value="<?php echo $row['r12'] ?>">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="l1">L1</label>
                <input type="text" class="form-control" id="exampleInputr2"  name="l1" value="<?php echo $row['l1'] ?>" >
                </div>
                <div class="form-group">
                <label for="l2">L2</label>
                <input type="text" class="form-control" id="exampleInputr2"  name="l2" value="<?php echo $row['l2'] ?>" >
                </div>
                  <div class="form-group">
                <label for="l3">L3</label>
                <input type="text" class="form-control" id="exampleInputr3"  name="l3" value="<?php echo $row['l3'] ?>">
                </div>
                  <div class="form-group">
                <label for="l4">L4</label>
                <input type="text" class="form-control" id="exampleInputr4"  name="l4" value="<?php echo $row['l4'] ?>">
                </div>
                  <div class="form-group">
                <label for="l5">L5</label>
                <input type="text" class="form-control" id="exampleInputr5"  name="l5" value="<?php echo $row['l5'] ?>">
                </div>
                  <div class="form-group">
                <label for="l6">L6</label>
                <input type="text" class="form-control" id="exampleInputl6"  name="l6" value="<?php echo $row['l6'] ?>">
                </div>
                <div class="form-group">
                <label for="l7">L7</label>
                <input type="text" class="form-control" id="exampleInputr7"  name="l7" value="<?php echo $row['l7'] ?>">
                </div>
                 <div class="form-group">
                <label for="l8">L8</label>
                <input type="text" class="form-control" id="exampleInputr8"  name="l8" value="<?php echo $row['l8'] ?>" >
                </div>
                <div class="form-group">
                <label for="l9">L9</label>
                <input type="text" class="form-control" id="exampleInputr9"  name="l9" value="<?php echo $row['l9'] ?>">
                </div>
                 <div class="form-group">
                <label for="l10">L10</label>
                <input type="text" class="form-control" id="exampleInputl10"  name="l10" value="<?php echo $row['l10'] ?>">
                </div>
                <div class="form-group">
                <label for="l11">L11</label>
                <input type="text" class="form-control" id="exampleInputl11"  name="l11" value="<?php echo $row['l11'] ?>">
                </div>
                <div class="form-group">
                <label for="l12">L12</label>
                <input type="text" class="form-control" id="exampleInputl12"  name="l12" value="<?php echo $row['l12'] ?>">
                </div>
             </div>
          <input type="hidden" class="form-control" id="exampleInputl10"  name="userid" value="<?php echo $row['userid'] ?>">
          <div class="col-md-6">
              <div>
              <img src="raasi.png" width="500px">
              </div>
              <div>
                <img src="lak.png" width="500px">
              </div>  
             
          </div>
          </dir>

               <button type="submit" class="btn-lg btn-primary" name="save">Submit</button>
          </div> 
              <!-- /.box-body -->
            </form>   
        </section>
    <!-- /.content -->
         </div>
<?php include 'footer.php'; ?>
</body>
</html>
