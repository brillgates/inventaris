<div class="row">
	<div class="col-md-12">
		
		<div class="panel">
			<div class="panel-heading">
				<h3><i class="fa fa-book"></i> Setting</h3>
			</div>
			<div class="panel-body">
				
			</div>
			<div class="panel-body">
				<table class="table">

	<div class="panel-body">
		<form method="POST" action="<?php echo base_url("home/update_setting") ?>">
			<div class="form-group">
				<label>Username</label> 
				<input type="text" name="in_username" class="form-control" required="">
			</div>
	<div class="panel-body">
		<!-- <form method="POST" action="<?php echo base_url("home/update_setting") ?>"> -->
			<div class="form-group">
				<label>Password</label> 
				<input type="password" name="in_password" class="form-control" required="">
				</div>
	<div class="panel-body">
		<!-- <form method="POST" action="<?php echo base_url("home/update_setting") ?>"> -->
			<div class="form-group">
					<label>Repeat Password</label> 
					<input type="password" name="in_password" class="form-control" required="">
				</div>
<div class="form-group">
					<button class="btn btn-danger" onclick="location.reload()"><i class="fa fa-refresh"></i> Kembali</button>
					<input type="submit" name="simpan" class="btn btn-primary" value="Simpan">
				</div>
			</div>
		</div>
	</form>