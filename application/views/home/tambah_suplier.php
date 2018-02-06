<div class="row">
	<div class="col-md-12">
		
		<div class="panel">
			<div class="panel-heading">
				<h3><i class="fa fa-list"></i> TAMBAH SUPPLIER </h3>
			</div>
			<div class="panel-body">
				<table class="table">
					<thead>
				<form method="post" action="<?php echo base_url('home/add_suplier') ?>">
					<div class="form-group">
					<label> kode :</label> 
					<input type="text" name="in_kode_supplier" class="form-control" required="">
					<label> nama :</label> 
					<input type="text" name="in_nama_supplier" class="form-control" required="">
					<label> alamat :</label> 
					<input type="text" name="in_alamat_supplier" class="form-control" required="">
					<label> telp :</label> 
					<input type="text" name="in_telp_supplier" class="form-control" required="">
					<label> kota :</label> 
					<input type="text" name="in_kota_supplier" class="form-control" required="">

					<div>
						<div>

						<input type="submit" class="btn btn-info" value="Simpan">
					<div class="form-group">
					
				</div>
						</div>
					</div>
			</form>
				</div>
				</thead>
			</table>
		</div>
	</div>
</div>