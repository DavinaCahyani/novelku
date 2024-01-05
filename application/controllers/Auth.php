<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class auth extends CI_Controller {

    function __construct()
	{
	parent::__construct();
	$this->load->model('m_model');
	$this->load->helper('my_helper');
    }

    // Metode ini digunakan untuk menampilkan halaman login. Ini adalah halaman pertama yang pengguna lihat saat mengakses halaman autentikasi
	public function index()
	{
		$this->load->view('auth/login');
	}
    // Metode ini digunakan untuk menampilkan halaman registrasi karyawan. Ini memungkinkan pengguna untuk mendaftar sebagai karyawan.
	public function register()
	{
		$this->load->view('auth/register');
	}

    // Metode ini dipanggil saat pengguna mencoba untuk login. Ini memeriksa kredensial yang dimasukkan oleh pengguna, 
    // membandingkannya dengan data pengguna yang ada dalam database, dan memberikan sesi jika login berhasil.
	public function aksi_login()
{
     // Mengambil data email dan password yang dikirimkan melalui form login.
    $email = $this->input->post('email', true);
    $password = $this->input->post('password', true);
    // Membuat array $data untuk mencari pengguna berdasarkan alamat email.
    $data = [
        'email' => $email,
    ];
    // Mencari data pengguna dengan alamat email yang sesuai dalam database.
    $query = $this->m_model->getwhere('auth', $data);
    // Mengambil hasil pencarian dalam bentuk array asosiatif.
    $result = $query->row_array();

    // Memeriksa apakah hasil pencarian tidak kosong dan kata sandi cocok.
    if (!empty($result) && md5($password) === $result['password']) {
        // Jika berhasil login:

        // Membuat array $data_sess untuk sesi pengguna.
        $data = [
            'logged_in' => TRUE, // Menandakan bahwa pengguna sudah login.
            'email' => $result['email'],
            'username' => $result['username'],
            'role' => $result['role'], // Menyimpan peran pengguna (admin/user).
            'id' => $result['id'],
        ];
        // Mengatur data sesi pengguna dengan informasi di atas.
        $this->session->set_userdata($data);
        // Mengarahkan pengguna ke halaman berdasarkan peran mereka.
        if ($this->session->userdata('role') == 'admin') {
            redirect(base_url()."admin/dashboard");
        } elseif ($this->session->userdata('role') == 'user') {
            redirect(base_url()."");
        } else {
            redirect(base_url()."auth");
        }
    } else {
         // Jika login gagal, menampilkan pesan kesalahan kepada pengguna.
        $this->session->set_flashdata('error', 'Email atau kata sandi salah.');
        redirect(base_url().'auth'); // Mengarahkan pengguna kembali ke halaman login.
    }
}

// Metode ini digunakan ketika pengguna mencoba mendaftar sebagai admin. Data yang dimasukkan oleh pengguna divalidasi, 
// dan jika valid, data pengguna baru disimpan dalam database dengan peran "admin."

public function aksi_register()
{
    $username = $this->input->post('username', true);
    $email = $this->input->post('email', true);
    $password = $this->input->post('password', true);

    // Validasi input
    if (empty($username) || empty($email) || empty($password) ) {
        // Tampilkan pesan error jika ada input yang kosong
        $this->session->set_flashdata('error', 'Semua field harus diisi.');
        redirect(base_url().'auth/register'); // sesuaikan dengan URL halaman registrasi .
    } elseif (strlen($password) < 8) {
        $this->session->set_flashdata('error_password' , 'gagal...');
        redirect(base_url('auth/register'));
    } else {
        // Memeriksa apakah alamat email sudah terdaftar
        $existing_user = $this->m_model->getwhere('auth', array('email' => $email))->row_array();
        if (!empty($existing_user)) {
            // Jika alamat email sudah terdaftar, tampilkan pesan kesalahan
            $this->session->set_flashdata('error_email', 'Alamat email sudah terdaftar.');
            redirect(base_url('auth/register'));
        } else {
        // Jika alamat email belum terdaftar, simpan data pengguna baru
        $data = array(
            'username' => $username,
            'email' => $email,
            'password' => md5($password), // Simpan kata sandi yang telah di-MD5
            'role' => 'user', // Atur peran menjadi admin
            'tingkatan' => 'non-kontributor' // Atur tingkatan
        );
    
        // memanggil model untuk menyimpan data pengguna
        $this->m_model->tambah_data('auth', $data);
    
        // Setelah data pengguna berhasil disimpan, dapat mengarahkan pengguna
        // ke halaman login atau halaman lain yang sesuai.
        redirect(base_url().'auth'); // sesuaikan dengan URL halaman login
    }
}
}

function logout() {
    $this->session->sess_destroy(); // Menggunakan sess_destroy() untuk mengakhiri sesi
    redirect(base_url('auth'));
   }  
}
?>