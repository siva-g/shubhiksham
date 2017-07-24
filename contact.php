<?php

require './front_connection.php';
/* * *********Above code default in all pages*********** */
require 'header.php';
?>
<style type="text/css">
    .map_pos {
        background: #d9232d none repeat scroll 0 0;
        padding: 2em;
        position: absolute;
        right: 0;
        top: 10%;
        width: 30%;
    }
    .map_pos1 {
        border: 3px double #fff;
        padding: 2em;
    }
    .map_pos h3 {
        color: #212121;
        font-size: 1.5em;
    }
    .map_pos p {
        color: #fff;
        font-weight: 600;
        line-height: 2em;
        margin: 0.5em 0 1.5em;
    }
    .map_pos ul {
        margin: 0;
        padding: 0;
    }
    .map_pos ul.contact_info_address li {
        color: #fff;
        font-weight: 600;
        list-style-type: none;
        margin-bottom: 1em;
    }
    .map_pos ul.contact_info_address li i {
        padding-right: 1em;
    }
    .map_pos ul.contact_info_address li a {
        color: #fff;
        text-decoration: none;
    }
</style>
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
        <iframe height="450" frameborder="0" style="border:0; width: 100%" src="https://www.google.com/maps/embed/v1/place?q=Bata+Showroom+first+floor,+80+Feet+Road,+KK+Nagar,+Madurai-20&key=AIzaSyBkJy9HFjJgAmYuXeK-nRL5rbeEUoR2iag" allowfullscreen></iframe>
    </div>
    <div class="map_pos">
        <div class="map_pos1">
            <h3>Contact Info</h3>
            <p>A7/1A Vasantha Maligai Apartment,<br/> Bata Showroom first floor,<br/> 80 Feet Road, KK Nagar,<br/> Madurai-20</p>
            <ul class="contact_info_address">
                <li><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:info@shubhiksham.com">info@shubhiksham.com</a></li>
                <li><i class="fa fa-phone" aria-hidden="true"></i>+91-9043166663</li>
            </ul>
        </div>
    </div>
</section>

<?php require 'footer.php'; ?>