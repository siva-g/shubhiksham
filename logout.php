<?php

require './front_connection.php';
/* * *********Above code default in all pages*********** */

unset($_SESSION['userDetails']);
unset($_SESSION['search']);
$msg->info('Logged out successfully', "login.php");
