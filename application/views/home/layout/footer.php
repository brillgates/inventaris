	</div>	<!--/.main-->
	

	
	<script src="<?php echo base_url("assets/template/") ?>js/bootstrap.min.js"></script>
	<script src="<?php echo base_url("assets/template/") ?>js/chart.min.js"></script>
	<script src="<?php echo base_url("assets/template/") ?>js/chart-data.js"></script>
	<script src="<?php echo base_url("assets/template/") ?>js/easypiechart.js"></script>
	<script src="<?php echo base_url("assets/template/") ?>js/easypiechart-data.js"></script>
	<script src="<?php echo base_url("assets/template/") ?>js/bootstrap-datepicker.js"></script>
	<script src="<?php echo base_url("assets/template/") ?>js/custom.js"></script>
	<script src="<?php echo base_url("assets/plugin/datatables/media/js/") ?>jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url('assets/plugin/sweetalert/') ?>sweetalert.min.js"></script>
	<script>
		window.onload = function () {
	var chart1 = document.getElementById("line-chart").getContext("2d");
	window.myLine = new Chart(chart1).Line(lineChartData, {
	responsive: true,
	scaleLineColor: "rgba(0,0,0,.2)",
	scaleGridLineColor: "rgba(0,0,0,.05)",
	scaleFontColor: "#c5c7cc"
	});
};	

	
	$(document).ready(function(){
	    $('#table_list_pinjaman').DataTable();
	    $('#table_suplier').DataTable();
	    // table_suplier
	    $('#table_list_in').DataTable();


	    $('#table_list_in').DataTable();
	    
	    $('#table_list_barang_keluar').DataTable();
	    // table_list_barang
	    $('#table_list_barang').DataTable();
	    // 

	    $('#table_list_in').DataTable();
	    $('#table_list_barang_keluar').DataTable();
	    
	});

	function perhitungan_grafik() {
		$.ajax({
			url : '<?php echo base_url("home/perhitungan_grafik") ?>',
			method : 'GET',
			dataType : 'JSON',
			success : function(data){
				$('#header_barang_masuk').html(data.masuk);
				$('#header_barang_pinjam').html(data.pinjam);


				$('#header_barang_keluar').html(data.keluar);

				$('#header_barang_keluar').html(data.keluar);
				// 
			}
		})
	}
	perhitungan_grafik();
	</script>
		
</body>
</html>