<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function index()
	{
		$this->load->view('index');
	}

	// request ajax di view index.php
	// login
	public function login()
	{	
		// $_POST['username'] => di ambil dari data AJAX yg dikiramkan ok
		$username = $_POST['username'];
		// $_POST['password'] => di ambil dari data AJAX yg dikiramkan ok
		$pass = $_POST['password'];
		// lalu kita hast $pass ke SHA1
		$password = sha1($pass);

		// kita lakukan query di database, akun itu ada atau tidak gan :V
		$cek = $this->db->get_where('user', array('username' => $username, 'password' => $password));

		// kita validasi lagi, akun username dan password ada atau didak ada di database
		if ($cek->num_rows() > 0) {
			// Ketika akun telah di temukan, maksud nya berhasil login
			// kita set session nya ok

			// $array = array('nama' => $cek['nama'], 'username' => $cek['username'], 'password' => $cek['password'], 'level' => $cek['level']);
			// $this->session->set_userdata($array);

			echo "true";
		}else{
			echo "false";
		}

	}


	// home
	public function home()
	{
		echo "asd";
	}
}
