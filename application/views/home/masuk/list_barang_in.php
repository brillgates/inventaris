<div class="row">
	<div class="col-md-12">
		
		<div class="panel">
			<div class="panel-heading">
				<h3><i class="fa fa-list"></i> Daftar Barang Masuk</h3>
			</div>
			<div class="panel-body">
				<button onclick="print()" class="btn btn-success" style="margin-bottom: 10px"><i class="fa fa-print"></i> Print</button>
				<table class="table" id="table_list_in">
					<thead>
						<tr>
							<th style="text-align: center;">Nama Barang</th>
							<th style="text-align: center;">Tanggal Masuk</th>
							<!-- <th>Kode Barang</th> -->
							<th style="text-align: center;">Jumlah Masuk</th>
							<th style="text-align: center;">Supplier</th>
						</tr>
					</thead>
					<tbody>
						<?php 
				foreach ($data as $key) {
					?>
					<tr>
						<td><?php echo $key['nama_brg']; ?></td>
						<td style="text-align: center;"><?php echo $key['tgl_masukbarang']; ?></td>
						<td style="text-align: center;"><?php echo $key['jumlah_masuk']; ?></td>
						<td><?php echo $key['supplier']; ?></td>
						
						
						
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

<script>
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
</script>
