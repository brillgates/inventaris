<?php
defined('BASEPATH') OR exit('No direct script access allowed');


// Controller 
class Home extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->helper('date');
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


	// Home
	public function home() 
	{
		$this->load->view('home/layout/header');
		$this->load->view('home/home');
		$this->load->view('home/layout/footer');
		// echo "aahsdgsd";
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
	public function tambah_barang_masuk()
	{
		$data = array(
			'tgl_masukbarang' => mdate('%d/%m/%Y'),
			'kode_brg' => $this->input->post('in_kode'),
			'nama_brg' => $this->input->post('in_nama_brg'),
			'jumlah_masuk' => $this->input->post('in_jumlah'),
			'supplier' => $this->input->post('supplier'),
		);

		$this->db->insert('masuk_barang', $data);

		$cek = $this->input->post('jumlah_saat_ini') + $this->input->post('in_jumlah');

		$this->db->set(array('jml_brg' => $cek));
		$this->db->where('kode_brg', $this->input->post('in_kode'));
		$a = $this->db->update('barang');

		if ($a) {
			echo "<script>alert('Berhasil Memasukkan Barang !'); location = '".base_url('home/barang_masuk')."'</script>";
		}else{
			echo "<script>alert('Gagal Memasukkan Barang !'); location = '".base_url('home/barang_masuk')."'</script>";
		}
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
	// search_barang_jenis
	public function search_barang_kat()
	{
		$kat = $_POST['kat'];
		$output = '';
		$get = $this->db->get_where('barang', array('kategori' => $kat))->result_array();

		$output .= '
				<div class="form-group">
					<label>Nama Barang : </label>
					<select class="form-control" id="option_kode">';
		foreach ($get as $key) {
			$output .= '<option value="'.$key['kode_brg'].'">'.$key['nama_brg'].'</option>';
		}
		$output .= '</select><br>
					<button class="btn btn-success" onclick="submit()">Submit</button>
				</div><br>
				';
		echo json_encode($output);
	}

	// search_barang_kode
	public function search_barang_kode($kode)
	{
		$get = $this->db->get_where('barang', array('kode_brg' => $kode))->row_array();
		echo json_encode($get);
	}
	// masuk_barang
	// public function barang_masuk_()
	// {
		

	// 	$data = array(
	// 		'tgl_masukbarang' => mdate('%d/%m/%Y'),
	// 		'kode_brg' => $this->input->post('in_kode'),
	// 		'nama_brg' => $this->input->post('in_nama_brg'),
	// 		'jumlah_masuk' => $this->input->post('in_jumlah'),
	// 		'supplier' => $this->input->post('in_nama'),

	// 		// 'nama_brg' => $this->input->post('in_nama'),
	// 	);

	// 	$this->db->insert('barang_masuk', $data);

	// 	$cek = $this->input->post('jumlah_saat_ini') + $this->input->post('in_jumlah');

	// 	$this->db->set(array('jml_brg' => $cek));
	// 	$this->db->where('kode_brg', $this->input->post('in_kode'));
	// 	$a = $this->db->update('barang');

	// 	if ($a) {
	// 		echo "<script>alert('Berhasil Memasukkan Barang !'); location = '".base_url('home/barang_masuk')."'</script>";
	// 	}else{
	// 		echo "<script>alert('Gagal Memasukkan Barang !'); location = '".base_url('home/barang_masuk')."'</script>";
	// 	}
	// }

	// tambah_pinjaman
	public function tambah_pinjaman()
	{
		

		$data = array(
			'tgl_pinjam' => mdate('%d/%m/%Y'),
			'kode_brg' => $this->input->post('in_kode'),
			'nama_brg' => $this->input->post('in_nama_brg'),
			'jumlah_pinjam' => $this->input->post('in_jumlah'),
			'peminjam' => $this->input->post('in_nama'),
			'tgl_kembali' => $this->input->post('in_tanggal_kembali'),
			'ket' => $this->input->post('in_ket'),
			'status' => '0',
			// 'nama_brg' => $this->input->post('in_nama'),
		);

		$this->db->insert('pinjam_barang', $data);

		$cek = $this->input->post('jumlah_saat_ini') - $this->input->post('in_jumlah');

		$this->db->set(array('jml_brg' => $cek));
		$this->db->where('kode_brg', $this->input->post('in_kode'));
		$a = $this->db->update('barang');

		if ($a) {
			echo "<script>alert('Berhasil Meminjam Barang !'); location = '".base_url('home/pinjam_barang')."'</script>";
		}else{
			echo "<script>alert('Gagal Meminjam Barang !'); location = '".base_url('home/pinjam_barang')."'</script>";
		}
	}
	// tambah_barangkeluar
	public function tambah_barangkeluar()
	{
		

		$data = array(
			'tgl_keluar' => mdate('%d/%m/%Y'),
			'kode_brg' => $this->input->post('in_kode'),
			'nama_brg' => $this->input->post('in_nama_brg'),
			'jml_keluarbarang' => $this->input->post('in_jumlah'),
			'penerima' => $this->input->post('in_nama'),
			'keperluan' => $this->input->post('in_kep'),
			// 'nama_brg' => $this->input->post('in_nama'),
		);

		$this->db->insert('keluar_barang', $data);

		$cek = $this->input->post('jumlah_saat_ini') - $this->input->post('in_jumlah');

		$this->db->set(array('jml_brg' => $cek));
		$this->db->where('kode_brg', $this->input->post('in_kode'));
		$a = $this->db->update('barang');

		if ($a) {
			echo "<script>alert('Berhasil mengeluarkan Barang !'); location = '".base_url('home/keluar_barang')."'</script>";
		}else{
			echo "<script>alert('Gagal Mengeluarkan Barang !'); location = '".base_url('home/keluar_barang')."'</script>";
		}
	}
	// list_barang_pinjam
	public function list_barang_pinjam()
	{	
		$data['data'] = $this->db->order_by('no_pinjam', 'DESC')->get('pinjam_barang')->result_array();
		$this->load->view('home/layout/header');
		$this->load->view('home/pinjam/list_barang_pinjam', $data);
		$this->load->view('home/layout/footer');
	}

	// list_barang_keluar
	public function list_barang_keluar()
	{	
		$data['data'] = $this->db->order_by('id_keluarbarang', 'DESC')->get('keluar_barang')->result_array();
		$this->load->view('home/layout/header');
		$this->load->view('home/keluar/list_barang_keluar', $data);
		$this->load->view('home/layout/footer');

	}
	// hapus_peminjaman
	public function hapus_peminjaman()
	{
		$kode = $_POST['kode'];
		$cek_pinjaman = $this->db->get_where('pinjam_barang', array('no_pinjam' => $kode))->row_array();

		$this->db->set(array('status' => '1'));
		$this->db->where('no_pinjam', $kode);
		$this->db->update('pinjam_barang');

		$cek_barang = $this->db->get_where('barang', array('kode_brg' => $cek_pinjaman['kode_brg']))->row_array();
		

		$hasil = $cek_barang['jml_brg'] + $cek_pinjaman['jumlah_pinjam'];

		$this->db->set(array('jml_brg' => $hasil));
		$this->db->where('kode_brg', $cek_pinjaman['kode_brg']);
		$this->db->update('barang');

		echo "Pinjaman Telah Di Kembalikan !";

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

	public function logout()

	{

		$this->session->sess_destroy();

		redirect('home/index');

	}



	// perhitungan_grafik
	public function perhitungan_grafik()
	{
		$output = [];
		$output['masuk'] = $this->db->like('tgl_masukbarang', mdate('%d/%m'))->get('masuk_barang')->num_rows();
		$output['keluar'] = $this->db->like('tgl_keluar', mdate('%d/%m'))->get('keluar_barang')->num_rows();
		$output['pinjam'] = $this->db->like('tgl_pinjam', mdate('%d/%m'))->get('pinjam_barang')->num_rows();
		// $output['rusak'] = $this->db->like('tgl_masukbarang', mdate('%d/%m'))->get('masuk_barang')->num_rows();
		echo json_encode($output);
	}
}
