<?php 
// memulai session
session_start(); 
$time = time();
include "../config-database.php";
// jika memiliki session login maka akan tampil halaman home.php apabila tidak maka akan kembali ke index.php
if(@$_SESSION['login']==true){ 
  ?><!DOCTYPE html>
  <!--[if IE 9]><html class="no-js lt-ie10" lang="en"><![endif]-->
  <!--[if gt IE 9]><!--><html class="no-js" lang="en"><!--<![endif]-->
  <head>
    <meta charset="utf-8">
    <title>Sistem Pakar Penyakit Leukimia Menggunakan Metode Forward Chaining & Certainty Factor</title>
    <meta name="description" content="Sistem Pakar Penyakit Leukimia Menggunakan Metode Forward Chaining & Certainty Factor" />
    <meta name="author" content="Wibu-PalComTech" />
    <meta name="robots" content="noindex, nofollow" />
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0" />

    <!-- Icons -->
    <link rel="shortcut icon" href="img/favicon.ico">
    <link rel="apple-touch-icon" href="img/icon57.png" sizes="57x57">
    <link rel="apple-touch-icon" href="img/icon72.png" sizes="72x72">
    <link rel="apple-touch-icon" href="img/icon76.png" sizes="76x76">
    <link rel="apple-touch-icon" href="img/icon114.png" sizes="114x114">
    <link rel="apple-touch-icon" href="img/icon120.png" sizes="120x120">
    <link rel="apple-touch-icon" href="img/icon144.png" sizes="144x144">
    <link rel="apple-touch-icon" href="img/icon152.png" sizes="152x152">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/plugins.css">
    <link rel="stylesheet" href="css/main.css?t=<?php echo $time ?>">
    <link rel="stylesheet" href="css/custom.css?t=<?php echo $time ?>">
    <link rel="stylesheet" href="css/themes.css">
    <link rel="stylesheet" href="css/summernote.css" />
    <!-- END Stylesheets -->
    <script src="js/vendor/modernizr-2.7.1-respond-1.4.2.min.js"></script>
  </head>
  <body><!-- Include Jquery library from Google's CDN but if something goes wrong get Jquery from local file (Remove 'http:' if you have SSL) -->
    <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>-->
    <script src="js/vendor/jquery-1.11.0.min.js"></script>

    <!-- Bootstrap.js, Jquery plugins and Custom JS code -->
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/plugins.js"></script>
    <div id="page-container" class="sidebar-partial sidebar-visible-lg sidebar-no-animations footer-fixed">
      <!-- Awal Bagian Menu Pada Sidebar -->
      <div id="sidebar">
        <div class="sidebar-scroll"> 
         <div class="sidebar-content"> 
          <a href="home.php" class="sidebar-brand"> <i class="hi hi-bookmark"></i><strong>SP LEUKIMIA</strong></a> 
          <div class="sidebar-section sidebar-user clearfix">
            <div class="sidebar-user-avatar"><img src="img/icon.png" alt="avatar"></div>
            <div class="sidebar-user-name"><?php echo ucwords(substr(@$_SESSION['UserID'], 0, 10)); // membatasi nama hanya 10 karakter dengan substr ?></div>
            <div class="sidebar-user-links">
              <!-- <a href="javascript:void(0)" data-target="#page-content" data-remote="frame.php?f=profile-saya" data-toggle="tooltip" data-placement="bottom" title="Profile Saya"><i class="hi hi-info-sign"></i></a> -->
              <a href="javascript:void(0)" data-target="#page-content" data-remote="frame.php?f=password/index" data-toggle="tooltip" data-placement="bottom" title="Pengaturan Password"><i class="gi gi-cogwheel"></i></a>
              <a href="logout.php" data-toggle="tooltip" data-placement="bottom" title="Logout"><i class="gi gi-exit"></i></a>
            </div>
          </div>
          <ul class="sidebar-nav">
            <li class="sidebar-header">
              <span class="sidebar-header-title">Menu Admin</span>
            </li>
            <li>
              <a class="active" href="javascript:void(0)" data-target="#page-content" data-remote="frame.php?f=dashboard/index">
                <i class="gi gi-stopwatch sidebar-nav-icon"></i>Dashboard
              </a>
            </li>
            <li>
              <a href="javascript:void(0)" data-target="#page-content" data-remote="frame.php?f=konsultasi/hasil&tahun=<?= date('Y') ?>"><i class="gi gi-certificate sidebar-nav-icon"></i>Hasil Konsultasi</a>
              <!--  <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator"></i><i class="gi gi-show_big_thumbnails sidebar-nav-icon"></i>Konsultasi</a> -->
              <!-- <ul>
                <li><a href="javascript:void(0)" data-target="#page-content" data-remote="frame.php?f=konsultasi/tambah">Konsulatasi</a></li>
                <li><a href="javascript:void(0)" data-target="#page-content" data-remote="frame.php?f=konsultasi/hasil">Hasil Konsultasi</a></li>
              </ul> -->
            </li>
            <!-- <li class="sidebar-header">
              <span class="sidebar-header-title">Menu Khusus Admin</span>
            </li> -->
            <li><a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator"></i><i class="gi gi-show_big_thumbnails sidebar-nav-icon"></i>Pengguna</a>
              <ul>
                <li><a href="javascript:void(0)" data-target="#page-content" data-remote="frame.php?f=pengguna/tambah">Tambah Pengguna</a></li>
                <li><a href="javascript:void(0)" data-target="#page-content" data-remote="frame.php?f=pengguna/index">Semua Pengguna</a></li>
              </ul>
            </li>
            <li><a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator"></i><i class="gi gi-show_big_thumbnails sidebar-nav-icon"></i>Penyakit</a>
              <ul>
                <li><a href="javascript:void(0)" data-target="#page-content" data-remote="frame.php?f=penyakit/tambah">Tambah Penyakit</a></li>
                <li><a href="javascript:void(0)" data-target="#page-content" data-remote="frame.php?f=penyakit/index">Data Penyakit</a></li>
              </ul>
            </li>
            <li><a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator"></i><i class="gi gi-show_big_thumbnails sidebar-nav-icon"></i>Gejala</a>
              <ul>
                <li><a href="javascript:void(0)" data-target="#page-content" data-remote="frame.php?f=gejala/tambah">Tambah Gejala</a></li>
                <li><a href="javascript:void(0)" data-target="#page-content" data-remote="frame.php?f=gejala/index">Data Gejala</a></li>
              </ul>
            </li>
            <li><a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator"></i><i class="gi gi-show_big_thumbnails sidebar-nav-icon"></i>Relasi</a>
              <ul>
                <li><a href="javascript:void(0)" data-target="#page-content" data-remote="frame.php?f=relasi/tambah">Tambah Relasi</a></li>
                <li><a href="javascript:void(0)" data-target="#page-content" data-remote="frame.php?f=relasi/index">Data Relasi</a></li>
              </ul>
            </li>
            <li><a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator"></i><i class="gi gi-show_big_thumbnails sidebar-nav-icon"></i>Pesan Masuk</a>
              <ul>
                <li><a href="javascript:void(0)" data-target="#page-content" data-remote="frame.php?f=pesan/pesan_belum_dibaca">Pesan Belum Dibaca</a></li>
                <li><a href="javascript:void(0)" data-target="#page-content" data-remote="frame.php?f=pesan/semua_pesan_masuk">Semua Pesan Masuk</a></li>
              </ul>
            </li>
            <!-- <li>
              <a href="javascript:void(0)" data-target="#page-content" data-remote="frame.php?f=laporan/hasil"><i class="gi gi-file sidebar-nav-icon"></i>Cetak Hasil Konsultasi</a>
            </li> -->
          </ul>
        </div>
      </div>
    </div>
    <!-- Akhir Bagian Menu Pada Sidebar -->
    <!-- Main Container -->
    <div id="main-container">
      <!-- Awal Bagian Menu Pada Header bar -->
      <header class="navbar navbar-default"> 
        <ul class="nav navbar-nav-custom">
          <li> <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar');"> <i class="fa fa-bars fa-fw"></i> </a> </li>
        </ul>
        <ul class="nav navbar-nav-custom pull-right">
          <li class="dropdown"> <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"> <img src="img/icon.png" alt="avatar"> <i class="fa fa-angle-down"></i> </a>
            <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
              <!-- <li><a href="javascript:void(0)" data-target="#page-content" data-remote="frame.php?f=profile-saya"> <i class="hi hi-info-sign fa-fw pull-right"></i> Profile Saya</a>  -->
                <!-- <li class="divider"></li> -->
                <li><a href="javascript:void(0)" data-target="#page-content" data-remote="frame.php?f=password/index"> <i class="gi gi-cogwheel fa-fw pull-right"></i> Pengaturan Password </a> 
                  <li class="divider"></li>
                  <li><a href="logout.php"><i class="fa fa-ban fa-fw pull-right"></i> Logout</a> </li>
                </ul>
              </li>
            </ul>
          </header>    
          <!-- Akhir Bagian Menu Pada Header bar -->
          <!-- Awal Bagian Tampilan Utama (Page Content) -->
          <div id="page-content">
           <?php 
	         // ini merupakan tempat untuk page dinamis yang di panggil dari file frame.php (halaman awalnya adalah halaman beranda.php)
           include "./inc/dashboard/index.php";
           ?>
         </div>
         <!-- Akhir Bagian Tampilan Utama (Page Content) -->
         <!-- Footer -->
         <footer class="clearfix">
          <div class="pull-right">Sistem Pakar Penyakit Leukimia Menggunakan Metode Forward Chaining & Certainty Factor@<span id="year-copy"></span></div>
        </footer>
        <!-- END Footer -->
      </div>
      <!-- END Main Container -->
      <a href="#" id="to-top"><i class="fa fa-angle-double-up"></i></a> 

      <div id="detailModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true"></div>
      <div id="prosesModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="false"></div>
      <!-- END User Settings --><!-- Remember to include excanvas for IE8 chart support --> 
      <!--[if IE 8]><script src="js/helpers/excanvas.min.js"></script><![endif]-->

      <script src="js/app.js?t=<?php echo $time; ?>"></script>
      <script src="js/pages/formsValidation.js"></script> 
      <script src="js/custom.js?t=<?php echo $time; ?>"></script>
    </body>
    </html><?php }else{ echo "<script>location.href='index.php'</script>"; } ?>