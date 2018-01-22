<div class="row">
	<div class="col-md-12">
		
		<div class="panel">
			<div class="panel-heading">
				<h3><i class="fa fa-list"></i> Daftar Pinjaman</h3>
			</div>
			<div class="panel-body">
				<table class="table" id="table_list_pinjaman">
					<thead>
						<tr>
							<th>No Pinjam</th>
							<th>Tanggal Pinjam</th>
							<!-- <th>Kode Barang</th> -->
							<th>Nama Barang</th>
							<th>Peminjam</th>
							<th>Jumlah Pinjam</th>
							<th>Status</th>
							<th>Options</th>
						</tr>
					</thead>
					<tbody>
						<?php 
				foreach ($data as $key) {
					?>
					<tr>
						<td><?php echo $key['no_pinjam']; ?></td>
						<td><?php echo $key['tgl_pinjam']; ?></td>
						<td><?php echo $key['nama_brg']; ?></td>
						<td><?php echo $key['peminjam']; ?></td>
						<td><?php echo $key['jumlah_pinjam']; ?></td>
						<td><?php echo $key['status']; ?></td>
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

