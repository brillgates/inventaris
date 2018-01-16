

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V15</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/') ?>vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/') ?>fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/') ?>fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/') ?>vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/') ?>vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/') ?>vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/') ?>vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/') ?>vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/') ?>css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/') ?>css/main.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugin/sweetalert/') ?>sweetalert.css">
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(<?php echo base_url('assets/login/') ?>images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Masuk Inventaris
					</span>
				</div>

				<form class="login100-form validate-form">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" id="username" placeholder="Masukan Username">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" id="password" placeholder="Masukan Password">
						<span class="focus-input100"></span>
					</div>

					<div id="loading" class="flex-sb-m w-full p-b-30">
						<div class="contact100-form-checkbox">
							<b>Loading Verifikasi ...</b>
						</div>
					</div>

					<div class="container-login100-form-btn">
						<button id="login" class="login100-form-btn">
							Login
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/login/') ?>vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/login/') ?>vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/login/') ?>vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo base_url('assets/login/') ?>vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/login/') ?>vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/login/') ?>vendor/daterangepicker/moment.min.js"></script>
	<script src="<?php echo base_url('assets/login/') ?>vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/login/') ?>vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/login/') ?>js/main.js"></script>
	<script src="<?php echo base_url('assets/plugin/sweetalert/') ?>sweetalert.min.js"></script>

	<script>
		// ID login nya kita hindari dlu, atau tidak di tampilkan
		$('#loading').hide();

		// Ketika Tombol Login di klik, maka akan melakukan validasi
		$('#login').on('click', function(event){
			event.preventDefault();
			// event.preventDefault ini gunanya untuk ketika kita klik tombol login
			// halam itu tidak merefresh atau berpindah halaman

			// kita buat definisi variabel
			var username = $('#username').val(); // ini input dengan ID username
			var password = $('#password').val(); // ini input dengan ID password

			// kita lakukan validasi

			// ketika inputan username itu kosong, maka muncul kan peringatan error,
			// dengan menggunakan plugin dari sweetalert
			if (username == '') {
				swal('Error', 'Username Tidak Boleh Kosong !', 'error')

				// ketika inputan password yg kosong, sama saja kita berikan peringatan ok
			}else if(password == ''){
				swal('Error', 'Password Tidak Boleh Kosong !', 'error')				
			}else{

				// setelah username sama password nya tidak kosong, kita lakukan resuest AJAX
				$.ajax({
					url : '<?php echo base_url("home/login") ?>',
					data : {username : username, password : password},
					method : 'POST',

					// jadi saat kita request kita munculkan kembali tanda loading nya ok
					beforeSend : function(){
						$('#loading').show();
					},
					success : function(data){
						// setelah request AJAX berhasil, data2 hasil dari controller akan 
						// di tampung di parameter "data"
						// lalu kita hilangkan lagi loading nya ok
						$('#loading').hide();

						//kita validasi lagi, hasil dari request itu berhasil login atau tidak
						if (data == 'false') {
							swal('Error', 'Tidak Di Temukan Akun !', 'error')			
						}else{
							swal('Login', 'Berhasil Membuat Session ^_^', 'success')

							// kita tunggu 3 detik, baru kita di alihkan ke halaman dashboard
							setTimeout(function() {
								location = '<?php echo base_url("home/home") ?>'
							}, 3000);
						}
					}
				})
			}

		})

	</script>
</body>
</html>