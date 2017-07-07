<?php
require './front_connection.php';
/* * *********Above code default in all pages*********** */

if (isset($_SESSION['userDetails'])) {
    header('Location:search.php');
}

if (isset($_POST['login'])) {

    // Receive and sanitize input
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = md5(mysqli_real_escape_string($db, $_POST['password']));

    $result = $db->query("SELECT * FROM register_users WHERE email = '{$email}' AND password = '{$password}' LIMIT 1");

    if ($result->num_rows > 0) {
        $users = $result->fetch_assoc();
        if ($users['status'] == 1) {
            $_SESSION['userDetails'] = $users;
            $msg->success('Successfully Logged in!', "http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}");
        } elseif ($users['status'] == 0 && $users['act_key'] == NULL) {
            $msg->info("Your account was Deactivated. Please contact Administrator.", "http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}");
        } elseif ($users['status'] == 0 && $users['act_key'] != NULL) {
            $msg->info("Your account is not yet activated. Please check your inbox for Activation link mail.", "http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}");
        }

        $msg->success('Registration Successfull!');
        $msg->info('Please check your inbox to activate the account on Shubhiksham Matrimony.', "http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}");
    } else {
        print_r($result) . '<br>';
//        echo mysqli_error();
        exit;
    }
}

require 'header.php';
?>

<div class="container">        

    <div class="row">
        <div class="box">
            <div class="col-lg-offset-3 col-lg-6">
<?php $msg->display(); ?>
                <hr>
                <h2 class="intro-text text-center">Login
                    <strong>form</strong>
                </h2>
                <hr>
                <p>Welcome! Let's start your partner search by Logged In.</p>
                <form role="form" method="POST" action="" enctype="multipart/form-data" id="LoginForm">
                    <div class="row">
                        <div class="form-group col-lg-12">
                            <label>Email</label>
                            <input id="Email" type="text" class="form-control input-lg" name="email">
                        </div>
                        <div class="form-group col-lg-12">
                            <label>Password</label>
                            <input id="Password" type="password" class="form-control input-lg" name="password">
                        </div>
                        <div class="form-group col-lg-12">
                            <button type="submit" class="btn btn-default btn-lg btn-success" name="login">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
<!-- /.container -->
<?php require 'footer.php'; ?>