<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--=== Favicon ===-->
    <link rel="shortcut icon" href="<?php echo base_url()?>assets/img/foto-1.png" alt="JSOFT"" type="image/x-icon" />

    <title>Rumah Kos Dewi Lasmi</title>
    <style> 
        
    </style> 
    <!--=== Bootstrap CSS ===-->
    <link href="<?php echo base_url()?>assets/assets_depan/css/bootstrap.min.css" rel="stylesheet">
    <!--=== Vegas Min CSS ===-->
    <link href="<?php echo base_url()?>assets/assets_depan/css/plugins/vegas.min.css" rel="stylesheet">
    <!--=== Slicknav CSS ===-->
    <link href="<?php echo base_url()?>assets/assets_depan/css/plugins/slicknav.min.css" rel="stylesheet">
    <!--=== FontAwesome CSS ===-->
    <link href="<?php echo base_url()?>assets/assets_depan/css/font-awesome.css" rel="stylesheet">
    <!--=== Theme Reset CSS ===-->
    <link href="<?php echo base_url()?>assets/assets_depan/css/reset.css" rel="stylesheet">
    <!--=== Main Style CSS ===-->
    <link href="<?php echo base_url()?>assets/assets_depan/css/style.css" rel="stylesheet">
    <!--=== Responsive CSS ===-->
    <link href="<?php echo base_url()?>assets/assets_depan/css/responsive.css" rel="stylesheet">


    <!--[if lt IE 9]>
        <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="loader-active">
    <!--== Header Area Start ==-->
    <header id="header-area" class="fixed-top">
       

        <!--== Header Bottom Start ==-->
        <div id="header-bottom">
            <div class="container">
                <div class="row">
                    <!--== Logo Start ==-->
                    <div class="col-lg-4">
                        <a href="<?php echo base_url('dashboard')?>" class="logo"><img src="<?php echo base_url()?>assets/img/foto-2.png" alt="JSOFT" width="130px">
                        </a>
                    </div>
                    <!--== Logo End ==-->

                    <!--== Main Menu Start ==-->
                    <div class="col-lg-8 d-none d-xl-block">
                        <nav class="mainmenu alignright">
                            <ul>
                                <li class=""><a href="<?php echo base_url('dashboard')?>">Beranda</a>
                                <li class=""><a href="<?php echo base_url('customer/data_kamar')?>">Kamar</a>
                                <li class=""><a href="<?php echo base_url('customer/transaksi')?>">Transaksi</a>
                                <li class=""><a href="<?php echo base_url('customer/bantuan')?>">Bantuan</a>
                                <?php 
                                    if ($this->session->userdata('nama_users')) { ?> 
                                    <li><a class="nav-link" href=""><?php echo $this->session->userdata('nama_users')?></a>
                                        <ul>
                                        <li><a class="nav-link" href="<?php echo base_url('auth/ganti_password')?>">Ganti Password</a></li>
                                        <li><a class="nav-link" href="<?php echo base_url('auth/logout')?>">Logout</a></li>
                                        </ul>
                                    </li>
                                    <?php }else { ?>
                                        <li class=""><a href="<?php echo base_url('register')?>">Register</a>
                                        <li><a class="nav-link" href="<?php echo base_url('auth/login')?>">Login</a></li>
                                <?php } ?>    
                            </ul>
                        </nav>
                    </div>
                    <!--== Main Menu End ==-->
                </div>
            </div>
        </div>
        <!--== Header Bottom End ==-->
    </header>
    <!--== Header Area End ==-->
