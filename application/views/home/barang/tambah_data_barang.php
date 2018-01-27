<div class="row">
	<div class="col-md-12">
		<div class="panel">
			<div class="panel-heading">
				<h4><i class="fa fa-plus"></i> Tambah Data Barang</h4>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="panel">
			<div class="panel-body">
				<div class="form-group">
					<label>Kode Barang : </label>
					<input type="text" id="kode" class="form-control">
				</div>
				<div class="form-group">
					<label>Nama Barang : </label>
					<input type="text" id="nama" class="form-control">
				</div>
				<div class="form-group">
					<label>Spesifikasi Barang : </label>
					<input type="text" id="spek" class="form-control">
				</div>
				<div class="form-group">
					<label>Lokasi Barang : </label>
					<input type="text" id="lokasi" class="form-control">
				</div>
				<div class="form-group">
					<label>Sumber Dana : </label>
					<input type="text" id="sumber_dana" class="form-control">
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="panel">
			<div class="panel-body">
				<div class="form-group">
					<label>Kategori Barang : </label>
					<!-- <input type="text" id="jumlah" class="form-control"> -->
					<select id="kategori" class="form-control">
						<?php foreach ($data as $key) {
							echo "<option value='".$key['kategori_brg']."'>".$key['kategori_brg']."</option>";
						} ?>
					</select>
				</div>
				<div class="form-group">
					<label>Jumlah Barang : </label>
					<input type="text" id="jumlah" class="form-control">
				</div>
				<div class="form-group">
					<label>Kondisi Barang : </label>
					<select id="kondisi" class="form-control">
						<option value="Baik">Baik</option>
						<option value="Buruk">Buruk</option>
					</select>
				</div>
				<div class="form-group">
					<label>Jenis Barang : </label>
					<input type="text" id="jenis" class="form-control">
				</div>
				
				<div class="form-group">
					<button id="save" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	$('#save').on('click', function(event){
		event.preventDefault();

		var nama = $('#nama').val();
		var kode = $('#kode').val();
		var spek = $('#spek').val();
		var lokasi = $('#lokasi').val();
		var kategori = $('#kategori').val();
		var jumlah = $('#jumlah').val();
		var kondisi = $('#kondisi').val();
		var jenis = $('#jenis').val();
		var sumber_dana = $('#sumber_dana').val();

		if (kode == '') {
			swal('Error !', 'Kode Barang Tidak Boleh Kosong', 'error');
		}else if(nama == ''){
			swal('Error !', 'Nama Barang Tidak Boleh Kosong', 'error');
		}
		else if(sumber_dana == ''){
			swal('Error !', 'Sumber Dana Tidak Boleh Kosong', 'error');
		}
		else if(spek == ''){
			swal('Error !', 'Spesifikasi Barang Tidak Boleh Kosong', 'error');
		}
		else if(lokasi == ''){
			swal('Error !', 'Lokasi Barang Tidak Boleh Kosong', 'error');
		}
		else if(kategori == ''){
			swal('Error !', 'Kategori Barang Tidak Boleh Kosong', 'error');
		}
		else if(jumlah == ''){
			swal('Error !', 'Jumlah Barang Tidak Boleh Kosong', 'error');
		}
		else if(kondisi == ''){
			swal('Error !', 'Kondisi Barang Tidak Boleh Kosong', 'error');
		}
		else if(jenis == ''){
			swal('Error !', 'Jenis Barang Tidak Boleh Kosong', 'error');
		}
		else{
			
			$.ajax({
				url : '<?php echo base_url("home/insert_data_barang") ?>',
				method : 'POST',
				data : {
					nama : nama, kode : kode, spek : spek, lokasi : lokasi, kategori : kategori, jumlah : jumlah, kondisi : kondisi, jenis : jenis, sumber_dana : sumber_dana

				},
				success : function(data){
					alert(data);
				}
			})
		}
	})
</script>