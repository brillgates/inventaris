	</div>	<!--/.main-->
	

	<script src="<?php echo base_url("assets/template/") ?>js/jquery-1.11.1.min.js"></script>
	<script src="<?php echo base_url("assets/template/") ?>js/bootstrap.min.js"></script>
	<script src="<?php echo base_url("assets/template/") ?>js/chart.min.js"></script>
	<script src="<?php echo base_url("assets/template/") ?>js/chart-data.js"></script>
	<script src="<?php echo base_url("assets/template/") ?>js/easypiechart.js"></script>
	<script src="<?php echo base_url("assets/template/") ?>js/easypiechart-data.js"></script>
	<script src="<?php echo base_url("assets/template/") ?>js/bootstrap-datepicker.js"></script>
	<script src="<?php echo base_url("assets/template/") ?>js/custom.js"></script>
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
	</script>
		
</body>
</html>