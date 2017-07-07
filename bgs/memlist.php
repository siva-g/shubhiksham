<!DOCTYPE html>
<html>
    <head>
        <?php
        session_start();
        if (!isset($_SESSION['email'])) {
            $_SESSION["message"] = "Please signin to continue";
            header("Location:index.php");
        }
        include 'header1.php';
        ?>
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
                    <div class="row">
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
                                    <th>userid</th>
                                    <th>Name</th>
                                    <th>Gender</th>
                                    <th>Qualification</th>
                                    <th>Caste</th>
                                    <th>Date of birth</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <?php
                            $limit = $_GET["limit"];
                            $user=$_SESSION['sno'];
                            $pageper = 10;
                            $select_path1 = "SELECT * FROM members where created_by='$user'";
                            $var1 = mysql_query($select_path1);
                            $numrows = mysql_num_rows($var1);
                            $noofpage = ceil($numrows / $pageper);
                            
                            $sql = "SELECT * FROM members where created_by='$user' order by created DESC LIMIT $pageper OFFSET $limit";
                            $retval = mysql_query($sql, $conn);

                            if (!$retval) {
                                die('Could not get data: ' . mysql_error());
                            }

                            while ($row = mysql_fetch_assoc($retval)) {
                                if($row['sex']=='F') {
                                    $gender="பெண்";
                                }else{
                                    $gender="ஆண்";
                                }
                                echo "<tr><td>" . $row['sid'] . " </td><td> " .
                                $row['name'] . "</td> " .
                                "<td>" .$gender. " </td> ". "<td>" .$row['qualification'] . " </td> "  . "<td>" . $row['caste'] . " </td>" . "<td>" . $row['dob'] . " </td>" . "<td><a href=viewmem.php?userid=" . $row['userid'] . ">view</a> <a href=editmem.php?userid=" . $row['userid'] . ">Edit</a> <a id=del href=delmem.php?userid=" . $row['userid'] . ">Delete</a></td></tr>";
                            }
                            ?>

                        </table>

                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <div id="example2_info" class="dataTables_info" role="status" aria-live="polite">Showing <?php echo $limit . "to" . ($limit + 10) . " of " . $numrows; ?> entries</div>
                        </div>
                        <div class="col-sm-7">
                            <div id="example2_paginate" class="dataTables_paginate paging_simple_numbers">
                                <ul class="pagination">
                                    <li id="example2_previous" class="paginate_button previous">
                                        <a href="memlist.php?limit=0" aria-controls="example2" data-dt-idx="0" tabindex="0">First</a>
                                    </li>
                                    <?php
                                    if ($limit < 29) {
                                        $i = 0;
                                        $lastpage = 4;
                                    } else {
                                        $a = ceil($limit / $pageper);  //to find the current page
                                        $i = $a - 2;    //first page in 5 page                                        
                                        $lastpage = $a + 2; // last page in 5 
                                        if ($lastpage > $noofpage) {
                                            $lastpage = $noofpage;
                                        }
                                    }

                                    while ($i < $lastpage) {
                                        $d = $i * $pageper;
                                        $pa = $i + 1;
                                        if ($limit == $d) {
                                            echo "<li class='paginate_button active'>";
                                        } else {
                                            echo "<li class='paginate_button'>";
                                        }
                                        echo "<a href=memlist.php?limit=" . $d . ">" . $pa . "</a>";
                                        echo "</li>";
                                        $i++;
                                    }
                                    ?>

                                    <li id="example2_next" class="paginate_button next">
                                        <a href="memlist.php?limit=<?php echo ($noofpage - 1) * 10; ?>" aria-controls="example2" data-dt-idx="7" tabindex="0">Last</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
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
<script>
</script>
</html>
