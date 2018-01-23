<div class="row">
	<div class="col-md-12">
		
		<div class="panel">
			<div class="panel-heading">
				<h3><i class="fa fa-list"></i> Data Barang</h3>
			</div>
			<div class="panel-body">
				<button onclick="location = '<?php echo base_url("home/data_barang") ?>'" style="margin-bottom: 10px;" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Barang</button>
				<table class="table" id="table_list_barang">
					<thead>
						<tr>
							<!-- <th>Kode Barang</th> -->
							<th style="text-align: center;">Nama Barang</th>
							<th style="text-align: center;">Spesifikasi</th>
							<th style="text-align: center;">Lokasi Barang</th>
							<th style="text-align: center;">Kategori</th>
							<th style="text-align: center;">Jumlah Barang</th>
							<th style="text-align: center;">Kondisi</th>
							<th style="text-align: center;">Jenis Barang</th>
							<th style="text-align: center;">Sumber Dana</th>
							<th style="text-align: center;">Options</th>
						</tr>
					</thead>
					<tbody>
						<?php 
				foreach ($data as $key) {
					?>
					<tr>
						<td style="text-align: center;"><?php echo $key['nama_brg']; ?></td>
						<td style="text-align: center;"><?php echo $key['spesifikasi']; ?></td>
						<td style="text-align: center;"><?php echo $key['lokasi_brg']; ?></td>
						<td style="text-align: center;"><?php echo $key['kategori']; ?></td>
						<td style="text-align: center;"><?php echo $key['jml_brg']; ?></td>
						<td style="text-align: center;"><?php echo $key['kondisi']; ?></td>
						<td style="text-align: center;"><?php echo $key['jenis_brg']; ?></td>
						<td style="text-align: center;"><?php echo $key['sumber_dana']; ?></td>
						
					</tr>
					<?php
				}
					?>
					</tbody>
				</table>
			</div>
		</div>

	</div>
</div>

<!--<script>
	function print() {
		window.location = '<?php echo base_url("home/print_list_barang_in") ?>';
	}

	function hapus(kode){
		
		$.ajax({
			url : '<?php echo base_url("home/hapus_barang_masuk") ?>',
			data : {kode : kode},
			method : 'POST',
			success : function(data){
				swal('Berhasil', data, 'success');
				setTimeout(function() {location.reload()}, 3000);
			}
		})
	}
</script>-->
