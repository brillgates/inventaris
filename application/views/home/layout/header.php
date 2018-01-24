<?php 

  if (empty($_SESSION['username']) && empty($_SESSION['password'])) {

    redirect('home/index');

  }

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboard Inventaris</title>
	<link href="<?php echo base_url("assets/template/") ?>css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url("assets/template/") ?>css/font-awesome.min.css" rel="stylesheet">
	<link href="<?php echo base_url("assets/template/") ?>css/datepicker3.css" rel="stylesheet">
	<link href="<?php echo base_url("assets/template/") ?>css/styles.css" rel="stylesheet">
	<link href="<?php echo base_url("assets/plugin/datatables/media/css/") ?>jquery.dataTables.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugin/sweetalert/') ?>sweetalert.css">
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	<script src="<?php echo base_url("assets/template/") ?>js/jquery-1.11.1.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="#"><span>Inventaris</span> SMKN 1 LUMAJANG</a>
				<ul class="nav navbar-top-links navbar-right"></ul>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name"><?php echo $_SESSION['nama'] ?></div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li class="active"><a href="<?php echo base_url("home/home") ?>"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<li><a href="<?php echo base_url("home/suplier") ?>"><em class="fa fa-users">&nbsp;</em> Suplier</a></li>

			<li class="parent "><a data-toggle="collapse" href="#sub-item-1">
				<em class="fa fa-book">&nbsp;</em> List Barang <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li><a href="<?php echo base_url("home/list_barang") ?>"><em class="fa fa-list">&nbsp;</em> List Barang</a></li>
					<li><a href="<?php echo base_url("home/list_barang_pinjam") ?>"><em class="fa fa-list">&nbsp;</em> List Pinjaman</a></li>
					<li><a href="<?php echo base_url("home/list_barang_in") ?>"><em class="fa fa-list">&nbsp;</em> List Barang In</a></li>
					<li><a href="<?php echo base_url("home/list_barang") ?>"><em class="fa fa-list">&nbsp;</em> List Barang Out</a></li>
					<li><a href="<?php echo base_url("home/list_barang") ?>"><em class="fa fa-list">&nbsp;</em> List Barang In</a></li>
					<li><a href="<?php echo base_url("home/list_barang_keluar") ?>"><em class="fa fa-list">&nbsp;</em> List Barang Out</a></li>
				</ul>
			</li>

			
			<li><a href="<?php echo base_url("home/barang_masuk") ?>"><em class="fa fa-sign-in">&nbsp;</em> Barang Masuk</a></li>
			<li><a href="<?php echo base_url("home/barang_keluar") ?>"><em class="fa fa-sign-out">&nbsp;</em> Barang Keluar</a></li>
			<li><a href="<?php echo base_url("home/pinjam_barang") ?>"><em class="fa fa-file">&nbsp;</em> Pinjam Barang</a></li>
			<li><a href="<?php echo base_url("home/data_barang") ?>"><em class="fa fa-search">&nbsp;</em> Data Barang</a></li>

			<li><a href="<?php echo base_url("home/setting") ?>"><em class="fa fa-gear">&nbsp;</em> Setting</a></li>

			
			<li class="bg-red"><a style="color:white " href="<?php echo base_url("home/logout") ?>"><em class="fa fa-dashboard">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->
		

	<!-- ini  -->
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li class="active">Perhitungan Grafik Per Bulan</li>
			</ol>
		</div><!--/.row-->
		
	
		<div class="panel panel-container">
			<div class="row">
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-teal panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-sign-in color-blue"></em>
							<div class="large" id="header_barang_masuk"></div>
							<div class="text-muted">Barang Masuk</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-blue panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-sign-out color-orange"></em>
							<div class="large" id="header_barang_keluar"></div>
							<div class="text-muted">Barang Keluar</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-orange panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-book color-teal"></em>
							<div class="large" id="header_barang_pinjam"></div>
							<div class="text-muted">Barang Pinjam</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-red panel-widget ">
						<div class="row no-padding"><em class="fa fa-xl fa-trash color-red"></em>
							<div class="large" id="header_barang_rusak"></div>
							<div class="text-muted">Barang Rusak</div>
						</div>
					</div>
				</div>
			</div><!--/.row-->
		</div>