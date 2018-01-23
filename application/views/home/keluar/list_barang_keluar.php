<div class="row">
	<div class="col-md-12">
		
		<div class="panel">
			<div class="panel-heading">
				<h3><i class="fa fa-list"></i> Daftar Barang Keluar</h3>
			</div>
			<div class="panel-body">
				<button onclick="location = '<?php echo base_url("home/barang_keluar") ?>'" style="margin-bottom: 10px;" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Barang Keluar</button>
				<table class="table" id="table_list_barang_keluar">
					<thead>
						<tr>
							<th>id barang Keluar</th>
							<th>Tanggal Keluar</th>
							<!-- <th>Kode Barang</th> -->
							<th>Nama Barang</th>
							<th>Penerima</th>
							<th>Jumlah barang</th>
							<th>Options</th>
						</tr>
					</thead>
					<tbody>
						<?php 
				foreach ($data as $key) {
					?>
					<tr>
						<td><?php echo $key['id_keluarbarang']; ?></td>
						<td><?php echo $key['tgl_keluar']; ?></td>
						<td><?php echo $key['nama_brg']; ?></td>
						<td><?php echo $key['penerima']; ?></td>
						<td><?php echo $key['jml_keluarbarang']; ?></td>
						<td>Option</td>
						
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

