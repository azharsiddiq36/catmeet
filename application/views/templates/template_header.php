<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CatMeet</title>
    <meta name="description" content="">
    <meta name="author" content="Walking Pixels | www.walkingpixels.com">
    <meta name="robots" content="index, follow">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- FullCalendar Styles -->
    <link rel='stylesheet' type='text/css' href='<?= base_url()?>assets/css/plugins/fullcalendar/fullcalendar.css'>

    <!-- PrettyCheckable Styles -->
    <link rel='stylesheet' type='text/css' href='<?= base_url()?>assets/css/plugins/prettycheckable/prettyCheckable.css'>

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/dropify/css/dropify.min.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/css/sangoma-blue.css">

    <!-- JS Libs -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="<?= base_url()?>assets/js/libs/jquery.js"><\/script>')</script>
    <script src="<?= base_url()?>assets/js/libs/modernizr.js"></script>

    <!-- IE8 support of media queries and CSS 2/3 selectors -->
    <!--[if lt IE 9]>
    <script src="<?= base_url()?>assets/js/libs/respond.min.js"></script>
    <script src="<?= base_url()?>assets/js/libs/selectivizr.js"></script>
    <![endif]-->

    <script>
        $(document).ready(function(){

            // Tooltips
            $('[title]').tooltip();

            // Tabs
            $('.demoTabs a, .demoTabs2 a').click(function (e) {
                e.preventDefault();
                $(this).tab('show');
                $('.fullcalendar, .full-calendar-gcal').fullCalendar('render'); // Refresh jQuery FullCalendar for hidden tabs
            })

        });
    </script>

    <script type="text/javascript">
        var _gaq=_gaq||[];_gaq.push(["_setAccount","UA-22557155-10"]);_gaq.push(["_trackPageview"]);(function(){var b=document.createElement("script");b.type="text/javascript";b.async=true;b.src=("https:"==document.location.protocol?"https://ssl":"http://www")+".google-analytics.com/ga.js";var a=document.getElementsByTagName("script")[0];a.parentNode.insertBefore(b,a)})();
    </script>
</head>
<body>

<!-- Full height wrapper -->
<div id="wrapper">

    <!-- Main page header -->
    <header id="header" class="container">

        <h1>
            <!-- Main page logo -->
            <a href="login.html">Sangoma</a>

            <!-- Main page headline -->
            <span>A flat Bootstrap admin template</span>
        </h1>

        <!-- User profile -->
        <div class="user-profile">
            <figure>

                <!-- User profile avatar -->
                <img alt="Gambar Profil" src="<?= base_url()?>assets/img/upload/<?= $this->session->userdata['pengguna_foto']?>">

                <!-- User profile info -->
                <figcaption>
                    <strong><a href="<?= base_url("administrator/profile")?>"><?= $this->session->userdata['pengguna_nama']?></a></strong>
                    <ul>
                        <li><a href="<?= base_url("administrator/profile")?>" title="Account settings">settings</a></li>
                        <li><a onclick="return confirm('Anda yakin ingin logout?')" href="<?= base_url("administrator/logout")?>" title="Logout">logout</a></li>
                    </ul>
                </figcaption>
                <!-- /User profile info -->

            </figure>
        </div>
        <!-- /User profile -->

        <!-- Main navigation -->
        <nav class="main-navigation navbar navbar-default" role="navigation">

            <!-- Collapse navigation for mobile -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".main-navigation-collapse">
                    <span class="elusive icon-home"></span>  Dashboard
                </button>
            </div>
            <!-- /Collapse navigation for mobile -->

            <!-- Navigation -->
            <div class="main-navigation-collapse collapse navbar-collapse">

                <!-- Navigation items -->
                <ul class="nav navbar-nav">

                    <!-- Active navigation items -->
                    <li class="active">
                        <a href="<?= base_url('administrator/dashboard')?>"><span class="elusive icon-home"></span> Dashboard</a>
                    </li>
                    <!-- /Active navigation items -->

                    <!-- Dropdown navigation items -->
                    <li class="dropdown">
                        <a href="index.html#" class="dropdown-toggle" data-toggle="dropdown"><span class="elusive icon-asl"></span> Components <b class="caret"></b></a>
                        <span class="badge">23</span>
                        <ul class="dropdown-menu">
                            <li><a href="<?= base_url('administrator/pengguna')?>"><span class="elusive icon-th-list"></span> Pengguna</a></li>
                            <li><a href="<?= base_url('administrator/kategori')?>"><span class="elusive icon-align-left"></span> Kategori</a></li>
                            <li><a href="<?= base_url('administrator/kucing')?>"><span class="elusive icon-calendar"></span> Kucing</a></li>
                            <li><a href="<?= base_url('administrator/toko')?>"><span class="elusive icon-graph"></span> Toko(Petshop)</a></li>
                        </ul>
                    </li>
                    <!-- /Dropdown navigation items -->

                    <!-- Dropdown navigation with multi-level dropdown -->
                    <li class="dropdown">
                        <a href="index.html#" class="dropdown-toggle" data-toggle="dropdown"><span class="elusive icon-file"></span> Extra <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?= base_url("administrator/postingan")?>"><span class="elusive icon-file"></span> Postingan</a></li>
                            <li><a href="<?= base_url("administrator/kontes")?>"><span class="elusive icon-file"></span> Kontes</a></li>
                        </ul>
                    </li>
                    <!-- /Dropdown navigation with multi-level dropdown -->
                    <li>
                        <a href="<?= base_url("administrator/jadwal")?>"><span class="elusive icon-info-sign"></span> Penjadwalan</a>
                    </li>
                </ul>
                <!-- /Navigation items -->

                <!-- Navigation form -->
                <form class="navbar-form navbar-right" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Type here to search&hellip;">
                    </div>
                    <button type="submit" class="btn btn-default"><span class="elusive icon-search"></span></button>
                </form>
                <!-- /Navigation form -->

            </div>
            <!-- /Navigation -->

        </nav>
        <!-- /Main navigation -->

    </header>
    <!-- /Main page header -->

    <!-- Main page container -->

    <!-- /Main page container -->


<!-- /Full height wrapper -->
