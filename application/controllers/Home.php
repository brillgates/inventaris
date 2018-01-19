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
			$dapat = $cek->row_array();

			$array = array(
				'nama' 		=> $dapat['nama'], 
				'username' 	=> $dapat['username'], 
				'password' 	=> $dapat['password'], 
				'level'	 	=> $dapat['level']
			);

			$this->session->set_userdata($array);

			echo "true";
		}else{
			echo "false";
		}

	}


	// home
	public function home()
	{
		$this->load->view('home/layout/header');
		$this->load->view('home/home');
		$this->load->view('home/layout/footer');
	}

	// ================== SUPLIER METHOD ==================================
	// suplier
	public function suplier()
	{
		$this->load->view('home/layout/header');
		$this->load->view('home/suplier');
		$this->load->view('home/layout/footer');
	}

	// ================== barang METHOD ==================================
	// barang
	public function barang()
	{
		$this->load->view('home/layout/header');
		$this->load->view('home/barang');
		$this->load->view('home/layout/footer');
	}

	// ================== barang_masuk METHOD ==================================
	// barang_masuk
	public function barang_masuk()
	{
		$this->load->view('home/layout/header');
		$this->load->view('home/barang_masuk');
		$this->load->view('home/layout/footer');
	}

	// ================== barang_keluar METHOD ==================================
	// barang_keluar
	public function barang_keluar()
	{
		$this->load->view('home/layout/header');
		$this->load->view('home/barang_keluar');
		$this->load->view('home/layout/footer');
	}

	// ================== pinjam_barang METHOD ==================================
	// pinjam_barang
	public function pinjam_barang()
	{
		$this->load->view('home/layout/header');
		$this->load->view('home/pinjam_barang');
		$this->load->view('home/layout/footer');
	}

	// ================== data_barang METHOD ==================================
	// data_barang
	public function data_barang()
	{
		$this->load->view('home/layout/header');
		$this->load->view('home/data_barang');
		$this->load->view('home/layout/footer');
	}

	// ================== setting METHOD ==================================
	// setting
	public function setting()
	{
		$this->load->view('home/layout/header');
		$this->load->view('home/setting');
		$this->load->view('home/layout/footer');
	}

	
}
