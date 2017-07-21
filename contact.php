<?php

require './front_connection.php';
/* * *********Above code default in all pages*********** */
require 'header.php';
?>
<section id="inner-headline">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="#"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
                    <li class="active">Contact</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section id="content">
    <div class="map">
        <div id="google-map" data-latitude="9.933283" data-longitude="78.144188"></div>
        <!--<div id="google-map" data-latitude="40.713732" data-longitude="-74.0092704"></div>-->
    </div>
</section>

<?php require 'footer.php'; ?>