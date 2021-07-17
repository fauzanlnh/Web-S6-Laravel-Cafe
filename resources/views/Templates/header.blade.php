<!DOCTYPE html>
<?php
$currentURL = \URL::current();
$tes = explode('/',$currentURL);
?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIPAS | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('asset/adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('asset/adminlte/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('asset/adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('asset/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  

  @stack('style')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        
      </ul>
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item d-none d-sm-inline-block">
          <a class="nav-link">Sistem Informasi Pemesanan Restoran</a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="#" class="brand-link text-center">
        <span class="brand-text font-weight-light">Nama Restorean</span>
      </a>
      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
            <?php
              if(empty($tes[8])){
            ?>
                <a href="#" class="nav-link active">
            <?php
              }else{
            ?>
                <a href="{{ url('Admin') }}" class="nav-link">
            <?php
              } 
            ?>
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
              </a>
            </li>
            
            <?php
            if(!empty($tes[8])){
              if($tes[8] == 'Menu'){
            ?>
              <li class="nav-item has-treeview menu-open">
              <a href="#" class="nav-link active">  
            <?php
              }else{
            ?>
              <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
            <?php
              }
            }else{
            ?>
              <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
            <?php
              } 
            ?>  
                <i class="nav-icon fas fa-plus-circle"></i>
                <p>
                  Menu
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ url('Admin/Menu/Tambah') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Tambah Menu</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('Admin/Menu/') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Menu</p>
                  </a>
                </li>
              </ul>
            </li>
            <?php
            if(!empty($tes[8])){
              if($tes[8] == 'Pegawai'){
            ?>
              <li class="nav-item has-treeview menu-open">
              <a href="#" class="nav-link active">  
            <?php
              }else{
            ?>
              <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
            <?php
              }
            }else{
            ?>
              <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
            <?php
              } 
            ?> 
                <i class="nav-icon fas fa-user"></i>
                <p>
                  Pegawai
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ url('Admin/Pegawai/Tambah') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Form Pegawai</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('Admin/Pegawai/') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Pegawai</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
            <?php
              if(!empty($tes[8])){
                if($tes[8] == 'Transaksi'){
            ?>
                <a href="#" class="nav-link active">
            <?php
                }else{
            ?>
                <a href="{{ url('Admin/Transaksi') }}" class="nav-link">
            <?php                  
                }
              }else{
            ?>
                <a href="{{ url('Admin/Transaksi') }}" class="nav-link">
            <?php
              } 
            ?>
                <i class="nav-icon fas fa-book"></i>
                <p>Laporan</p>
              </a>
            </li>
            <li class="nav-item has-treeview">
            <a href="{{url('/')}}"  class="nav-link" onclick="return confirm('Anda Akan Logout')">
                <i class="nav-icon fas fa-lock"></i>
                  <p>
                  Logout
                </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
    
    