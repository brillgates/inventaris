
<div class="row">
	<div class="col-md-12">
		
		<div class="panel">
			<div class="panel-heading">
				<h2><i class="fa fa-book"></i> Barang Masuk </h2>
			</div>
			<div class="panel-body">
				
			</div>
		</div>

	</div>

	<div class="col-md-4">
		
		<div class="panel">
			<div class="panel-heading">
				<h3> Barang Masuk </h3>
			</div>
			<div class="panel-body">
				<div class="form-group">
					<label>Kategori Barang : </label>
					<select class="form-control">
						<?php $a = $this->db->order_by('kategori_brg', 'DESC')->get('kategori_barang')->result_array();
						foreach ($a as $key) {
						 	?>
						<option id="kat_barang"><?php echo $key['kategori_brg'] ?></option>
						 <?php
						 } ?>
					</select><br>
					<button class="btn btn-primary" id="cari_barang">Cari</button>
				</div>
				<hr>
				<div id="hasil">
					
				</div>
			</div>
		</div>
		<div class="panel" id="tampil_detail">
			<div class="panel-heading">
				<h3><i class="fa fa-eye"></i> Detail Barang</h3>
			</div>
			<div class="panel-body">
				<table class="table">
					<tr>
						<td>Kode Barang : </td>
						<td id="td_kode"></td>
					</tr>
					<tr>
						<td>Nama Barang : </td>
						<td id="td_nama"></td>
					</tr>
					
				</table>
			</div>
		</div>

	</div>
	<div class="col-md-8" >
		<div class="panel"  id="tampil_pinjam">
			<div class="panel-heading">
				<h3>Keterangan Barang Masuk</h3>
			</div>
			<div class="panel-body">
		<form method="POST" action="<?php echo base_url("home/tambah_barang_masuk") ?>">
				<div class="form-group">
					<label>Supplier :</label> 
					<select class="form-control" name="supplier">
						
						<option value="Lab Persada">Lab Persada</option>

					</select><br>
				</div>
				<div class="form-group">
					<label>Jumlah :</label> 
					<input type="text" name="in_jumlah" class="form-control" required="">
					<small><b id="sisa_barang"></b> Barang Tersisa</small>
					<input type="hidden" id="jumlah_saat_ini" name="jumlah_saat_ini" value="">
				</div>
				<div class="form-group">
					<label>Tanggal Masuk :</label> 
					<!-- <input type="text" id="tanggal_pinjam" class="form-control"> -->
					<?php echo mdate('%d/%m/%Y') ?>
				</div>
				<input type="hidden" name="in_kode" id="in_kode">
				<input type="hidden" name="in_nama_brg" id="in_nama">
				<div class="form-group">
					<button class="btn btn-danger" onclick="location.reload()"><i class="fa fa-refresh"></i> Kembali</button>
					<input type="submit" name="simpan" class="btn btn-primary" value="Simpan">
				</div>
		</form>
			</div>
		</div>
	</div>

</div>

<script>
	$(document).ready(function(){
		$('#tanggal_masukbarang').datepicker();

	});

	$('#cari_barang').on('click', function(){
		var kat = $('#kat_barang').val();

		$.ajax({
			url : '<?php echo base_url("home/search_barang_kat") ?>',
			method : 'POST',
			data : {kat : kat},
			dataType : 'JSON',
			success : function(data){
				$('#hasil').fadeIn().html(data);
			}
		})
	});

	$('#tampil_pinjam').hide();
	$('#tampil_detail').hide();

	function submit() {
		var kode = $('#option_kode').val();

		$('#tampil_pinjam').fadeIn();
		$('#tampil_detail').fadeIn();

		$.ajax({
			url : '<?php echo base_url("home/search_barang_kode/") ?>'+kode,
			method : 'POST',
			dataType : 'JSON',
			success : function(data){
				$('#sisa_barang').html(data.jml_brg);

				$('#td_kode').html(data.kode_brg);
				$('#in_kode').val(data.kode_brg);
				$('#in_nama').val(data.nama_brg);
				$('#jumlah_saat_ini').val(data.jml_brg);
				
				$('#td_nama').html(data.nama_brg);
				$('#td_spek').html(data.spesifikasi);
				$('#td_lokas').html(data.lokasi_brg);
				$('#td_kat').html(data.kategori);
				$('#td_jumlah').html(data.jml_brg);
				$('#td_kondisi').html(data.kondisi);
				// $('#td_kode').html(data.kode_brg);
				$('#td_jenis').html(data.jenis_brg);
				$('#td_dana').html(data.sumber_dana);
			}
		})		
	}
</script>
