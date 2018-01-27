<div class="row">
	<div class="col-md-12">
		
		<div class="panel">
			<div class="panel-heading">
				<h3><i class="fa fa-list"></i> SUPPLIER</h3>
			</div>
			<div class="panel-body">
				<table class="table">
					<thead>
						<tr>
							<th>KODE </th>
							<th>NAMA </th>
							<th>ALAMAT </th>
							<th>TELP </th>
							<th>KOTA </th>
						</tr>
					</thead>
					<tbody>
						<?php 
					foreach ($data as $key) {
						echo 
						'<tr>
							<td>'.$key['kode_supplier'].'</td>
							<td>'.$key['nama_supplier'].'</td>
							<td>'.$key['alamat_supplier'].'</td>
							<td>'.$key['telp_supplier'].'</td>
							<td>'.$key['kota_supplier'].'</td>
						</tr>';
					
					}
						 ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>


