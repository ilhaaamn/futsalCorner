<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//print_r($result);
?>
<!doctype html>
<html lang="en">
<head>
    <title>FUTSALCORNER | <?php echo $nav?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
    <link href="<?php echo base_url('assets/css/nucleo-icons.css'); ?>" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
<img src="<?php echo base_url()?>assets/img/bg.jpg" id="bg" alt="">
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-primary p-3">
    <div class="container">
        <img src="<?php echo base_url('assets/img/logo.png'); ?>" alt="" style="width: 5em">
        <a class="navbar-brand mb-0" style="font-size: 30px; padding-left: 20px" href="#">FutsalCorner</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item <?php if ($active == 1) echo 'active'?>">
                    <a class="nav-link" href="<?php echo base_url()?>">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item <?php if ($active == 2) echo 'active'?>">
                    <a class="nav-link" href="<?php echo base_url()?>booking">Booking</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact_us">Contact Us</a>
                </li>
                <li class="nav-item dropdown row" <?php if ($active == 3) echo 'active'?>>
                    <a class="nav-link nc-icon nc-single-02 " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?php echo base_url('user/list_booking')?>">List Booking</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?php echo base_url('user/user_logout')?>">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
