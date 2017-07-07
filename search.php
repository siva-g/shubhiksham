<?php
require './front_connection.php';
/* * *********Above code default in all pages*********** */

if (!isset($_SESSION['userDetails'])) {
    header('Location:login.php');
}

if (!isset($_GET['page'])) {
    header('Location: search.php?page=1');
}

if (isset($_POST['fromage']) && isset($_POST['toage'])) {
    $_SESSION['search'] = $_POST;
    header('Location: search.php?page=1');
} elseif (!isset($_SESSION['search'])) {
    $_SESSION['search']['fromage'] = 18;
    $_SESSION['search']['toage'] = 25;
}

require 'Paginate.php';

$sex = $_SESSION['userDetails']['gender'] == 1 ? 'F' : 'M';
$condition = "m.sex = '{$sex}'";
if (isset($_SESSION['search'])) {
    $fromDate = date('Y', strtotime($_SESSION['search']['fromage'] . ' years ago')) . '-12-31';
    $toDate = date('Y', strtotime($_SESSION['search']['toage'] . ' years ago')) . '-01-01';
    $condition .= " AND dob BETWEEN '{$toDate}' AND '{$fromDate}'";
}

$query = "SELECT m.name, m.userid, m.caste, m.subcaste, m.sex, a.raasi, a.star, m.city, m.poorvigam, m.kuladeivam, m.dob, m.qualification, m.job, m.salary, m.joblocation FROM members AS m LEFT JOIN astro AS a ON a.userid = m.userid WHERE {$condition}";

// Create our paginate object, and pass it the database, query, and page var
$paginate = new Paginate($db, $query, 'page');
// Run the query
$r = $paginate->get_results();

require 'header.php';
?>
<section id="inner-headline">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="index.php"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
                    <li class="active">Search</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<div class="container">
    <div class="row">
        <div class="box">
            <div class="col-lg-12">
                <hr>
                <h2 class="intro-text text-center">
                    <strong>Search</strong>
                </h2>
                <hr>
                <div class="box text-center">
                    <form class="form-inline" method="POST">
                        <label>வயது</label>
                        <select name="fromage" id="fromage" class="custom-select form-control">
                            <?php
                            for ($i = 18; $i < 61; $i++) {
                                $selected = $_SESSION['search']['fromage'] == $i ? 'selected="selected"' : '';
                                echo '<option ' . $selected . ' value="' . $i . '">' . $i . '</option>';
                            }
                            ?>
                        </select>
                        <label>முதல்</label>
                        <select name="toage" id="toage" class="custom-select form-control">
                            <?php
                            for ($i = 18; $i < 61; $i++) {
                                $selected = $_SESSION['search']['toage'] == $i ? 'selected="selected"' : '';
                                echo '<option ' . $selected . ' value="' . $i . '">' . $i . '</option>';
                            }
                            ?>
                        </select>
                        <label>வரை</label>
                        <button type="submit" class="btn btn-theme" name="search">Search</button>
                    </form>
                </div>
                <?php
                // Loop through our results
                while ($message = $r->fetch_object()) {
                    ?>
                    <div class="box box-custom">
                        <div class="row row-background btn-theme row-custom">
                            <div class="col-lg-4">
                                <p><?php echo $message->name; ?></p>
                            </div>
                            <div class="col-lg-4 text-center">
                                <p><?php echo 'Reg.No: ' . $message->userid; ?></p>
                            </div>
                            <div class="col-lg-4 text-right">
                                <p><?php echo $message->caste . ' - ' . $message->subcaste; ?></p>
                            </div>
                        </div>
                        <div class="row row-custom">
                            <div class="col-lg-2">
                                <img src="img/dummy-avatar-<?php echo $message->sex; ?>.png" class="avatar-box" />
                            </div>
                            <div class="col-lg-5">
                                <div style="margin-top: 30px">                                    
                                    <p>இராசி&nbsp;:&nbsp;<?php echo $message->raasi; ?></p>
                                    <p>நட்சத்திரம் &nbsp;:&nbsp;<?php echo $message->star; ?></p>
                                    <p>இருப்பிடம் &nbsp;:&nbsp;<?php echo $message->city; ?></p>
                                    <p>பூர்விகம் &nbsp;:&nbsp;<?php echo $message->poorvigam; ?></p>
                                    <p>குலதெய்வம்&nbsp;:&nbsp;<?php echo $message->kuladeivam; ?></p>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div style="margin-top: 30px">
                                    <p>பிறந்த தேதி&nbsp;:&nbsp;<?php echo date("d-m-Y", strtotime($message->dob)); ?></p>
                                    <p>கல்வி தகுதி&nbsp;:&nbsp;<?php echo $message->qualification; ?></p>
                                    <p>வேலை&nbsp;:&nbsp;<?php echo $message->job; ?></p>
                                    <p>வருமானம்(மாதம்)&nbsp;:&nbsp;<?php echo $message->salary; ?></p>
                                    <p>பணிபுரியுமிடம் &nbsp;:&nbsp;<?php echo $message->joblocation; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }

// Show the page links
                echo '<div class="text-center">' . $paginate->show_pages() . '</div>';
                ?>
            </div>
        </div>
    </div>
</div>

<?php require 'footer.php'; ?>