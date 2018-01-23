<div class="row">
	<div class="col-md-12">
		
		<div class="panel">
			<div class="panel-heading">
				<h3><i class="fa fa-list"></i> Daftar Pinjaman</h3>
			</div>
			<div class="panel-body">
				<button onclick="print()" class="btn btn-success" style="margin-bottom: 10px"><i class="fa fa-print"></i> Print</button>
				<table class="table" id="table_list_pinjaman">
					<thead>
						<tr>
							<th style="text-align: center;">No Pinjam</th>
							<th style="text-align: center;">Tanggal Pinjam</th>
							<!-- <th>Kode Barang</th> -->
							<th style="text-align: center;">Nama Barang</th>
							<th style="text-align: center;">Peminjam</th>
							<th style="text-align: center;">Jumlah Pinjam</th>
							<th style="text-align: center;">Status</th>
							<th style="text-align: center;">Options</th>
						</tr>
					</thead>
					<tbody>
						<?php 
				foreach ($data as $key) {
					?>
					<tr>
						<td style="text-align: center;"><?php echo $key['no_pinjam']; ?></td>
						<td style="text-align: center;"><?php echo $key['tgl_pinjam']; ?></td>
						<td><?php echo $key['nama_brg']; ?></td>
						<td><?php echo $key['peminjam']; ?></td>
						<td style="text-align: center;"><?php echo $key['jumlah_pinjam']; ?></td>
						<td><?php if ($key['status'] == '0') {
							echo "<b style='text-algin:center;color:red;'>Belum Di Kembalikan</b>";
						}else{echo "<b style='text-algin:center;color:#8ad919;'>Telah Di Kembalikan</b>";} ?></td>
						<td>
							<?php if ($key['status'] == '0') {
								?>
							<button class="btn btn-danger" onclick="hapus('<?php echo $key['no_pinjam'] ?>')"><i class="fa fa-trash"></i></button>
							<button class="btn btn-danger" onclick="hapus('<?php echo $key['no_pinjam'] ?>')"><i class="fa fa-trash"></i></button>
							<?php
							}else{
								?>
							<button class="btn btn-primary" title="Di Kembalikan !"><i class="fa fa-check"></i></button>
							<?php
							} ?>
							
							
						</td>
						
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
		window.location = '<?php echo base_url("home/print_list_pinjam_barang") ?>';
	}

	function hapus(kode){
		
		$.ajax({
			url : '<?php echo base_url("home/hapus_peminjaman") ?>',
			data : {kode : kode},
			method : 'POST',
			success : function(data){
				swal('Berhasil', data, 'success');
				setTimeout(function() {location.reload()}, 3000);
			}
		})
	}
</script>