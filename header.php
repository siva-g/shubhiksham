<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Subhiksham Matrimony</title>

        <!-- favicon -->
        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
        <link rel="icon" href="images/favicon.ico" type="image/x-icon">

        <!-- css -->
        <link href="css/bootstrap.min.css" rel="stylesheet" />
        <link href="plugins/flexslider/flexslider.css" rel="stylesheet" media="screen" />
        <link href="css/style.css" rel="stylesheet" />

        <!-- Theme skin -->
        <link id="t-colors" href="skins/default.css" rel="stylesheet" />

        <!-- boxed bg -->
        <link id="bodybg" href="bodybg/bg10.css" rel="stylesheet" type="text/css" />

        <link rel="stylesheet" href="css/jquery-ui.css">
        <style type="text/css">
            .box-custom{
                border: 1px solid #cccccc;
                margin: 25px 0;
            }
            .avatar-box {
                width: 100%;
                border: 1px solid #ccc;
                border-radius: 50%;
                margin-top: 30px;
            }
            .row-background{
                padding: 10px 0 0;
            }
            .row-custom{
                margin: 0;
            }
            .row-background p{
                font-weight: bold;
                color: cornsilk;
            }
            .form-group .error {
                color: #c40;
                font-weight: normal;
            }
            .address-bar{
                color: #000;
            }
            #LoginForm label.error{
                position: absolute;
                left: 21.222%;
                margin: 35px 0 0;
            }
            #LoginForm #LogPassword-error{
                left: 58%;
            }
        </style>

    </head>

    <body>

        <header>
            <div class="top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="topleft-info">
                                <li><i class="fa fa-map-marker"></i> A7/1C Vasantha Malaigai | 80 Feet Road | Madurai-20</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <div class="pull-right">
                                <?php if (isset($_SESSION['userDetails'])) { ?>
                                    <a href="logout.php" class="btn btn-theme btn-large">Logout</a>
                                <?php } else { ?>
                                    <form method="POST" enctype="multipart/form-data" id="LoginForm" action="login.php" class="form-inline">
                                        <div class="form-group row">
                                            <input id="LogEmail" class="form-control" placeholder="Email" type="text" value="" name="email" />
                                            <input id="LogPassword" class="form-control" placeholder="Password" type="password" value="" name="password" />
                                        </div>
                                        <input class="btn btn-theme" type="submit" value="Login" name="login">
                                    </form>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="navbar navbar-default navbar-static-top">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="index.php">
                            <img src="images/logobig.png" alt="logo" width="199" height="52" />
                        </a>
                    </div>
                    <div class="navbar-collapse collapse ">
                        <ul class="nav navbar-nav">
                            <?php
                            if (isset($_SESSION['userDetails'])) {
                                $regProfUrl = "profile.php";
                                $regProfText = "Profile";
                                $logInOutUrl = "logout.php";
                                $logInOutText = "Logout";
                            } else {
                                $regProfUrl = "register.php";
                                $regProfText = "Register";
                                $logInOutUrl = "login.php";
                                $logInOutText = "Login";
                            }
                            ?>
                            <ul class="nav navbar-nav">
                                <li>
                                    <a href="index.php">Home</a>
                                </li>
                                <li>
                                    <a href="search.php">Search</a>
                                </li>
                                <li>
                                    <a href="<?php echo $regProfUrl; ?>"><?php echo $regProfText; ?></a>
                                </li>
                                <li>
                                    <a href="#">About</a>
                                </li>
                                <li>
                                    <a href="#">Services</a>
                                </li>
                                <li>
                                    <a href="packages.php">Packages</a>
                                </li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                    </div>
                </div>
            </div>
        </header>