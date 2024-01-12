<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_model');
        $this->load->helper('my_helper');
        $this->load->helper('html');
        $this->load->library('upload');

        // Check user authentication
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') != 'user') {
            redirect(base_url().'auth');
        }
    }
    
    public function profile() {
        $user_id = $this->session->userdata('id');

        // Mendapatkan data user
        $data['auth'] = $this->m_model->get_by_id('auth', 'id', $user_id)->result();

        // Jika role adalah 'user', set foto profil default dari folder 'style/images'
        foreach ($data['auth'] as $user) {
            if ($user->role == 'user' && empty($user->image)) {
                $image_path = base_url('style/images/User.png');
                $this->m_model->ubah_data('auth', array('image' => $image_path), 'id', $user_id);
                $user->image = $image_path; // Update nilai di dalam loop
            }
        }

        $this->load->view('user/profile', $data);
    }

    public function upload_image_user($value)
{
    $kode = round(microtime(true) * 1000);
    $config['upload_path'] = './images/user/';
    $config['allowed_types'] = 'jpg|png|jpeg';
    $config['max_size'] = 30000;
    $config['file_name'] = $kode;
    $this->upload->initialize($config);
    if (!$this->upload->do_upload($value)) {
        return [false, ''];
    } else {
        $fn = $this->upload->data();
        $nama = $fn['file_name'];
        return [true, $nama];
    }
}
// Metode ini digunakan untuk menghandle aksi pengunggahan gambar profil admin.
public function aksi_image()
{
    $foto = $this->upload_image_user('foto');
    if($foto[0]!==false)
    {
        $data = array
        (
            'image' => $foto[1]
        );
        $masuk = $this->m_model->ubah_data('auth', $data, array('id' => $this->session->userdata('id')));
    if ($masuk)
    {
        $this->session->set_flashdata('sukses', 'berhasil');
        redirect(base_url('user/profile'));
    }
    else
    {
        $this->session->set_flashdata('error', 'gagal..');
        redirect(base_url('user/profile'));
    }
    }
}

public function aksi_ubah_profil() {
    $email = $this->input->post('email');
    $username = $this->input->post('username');
    $nama = $this->input->post('nama');
    $gender = $this->input->post('gender');

    $data = array(
        'email' => $email,
        'username' => $username,
        'nama' => $nama,
        'gender' => $gender
    );

    $this->session->set_userdata($data);
    $update_result = $this->m_model->ubah_data('auth', $data, array('id' => $this->session->userdata('id')));

    if ($update_result) {
        redirect(base_url('user/profile'));
    } else {
        echo 'error';
        // redirect(base_url('admin/profil'));
    }
}

public function aksi_ubah_password() {
    $password_baru = $this->input->post('password_baru');
    $konfirmasi_password = $this->input->post('konfirmasi_password');
    $password_lama = trim($this->input->post('password_lama')); // Trim input kata sandi lama

    // Mengambil data pengguna dari database berdasarkan ID pengguna yang disimpan dalam sesi
    $user_data = $this->m_model->getwhere('auth', array('id' => $this->session->userdata('id')))->row_array();

    // Debugging
    var_dump($password_lama, $user_data['password']);

    // Validasi kata sandi lama
    if (strcmp(md5($password_lama), $user_data['password']) !== 0) {
        $error_password_lama = '*Kata sandi lama salah' ; // Pesan kesalahan
        $this->session->set_flashdata('error_password_lama','*Kata sandi lama salah');
        redirect(base_url('user/profile'));
    }

    // Jika ada kata sandi baru
    if (!empty($password_baru)) {
        // Pastikan kata sandi baru dan konfirmasi kata sandi sama
        if ($password_baru === $konfirmasi_password) {
            // Hash kata sandi baru
            $data['password'] = md5($password_baru);
        } else {
            $this->session->set_flashdata('error_konfirmasi_password','*Kata sandi baru dan konfirmasi kata sandi harus sama');
            redirect(base_url('user/profile'));
        }
    }

    $this->session->set_userdata($data);
    $update_result = $this->m_model->ubah_data('auth', $data, array('id' => $this->session->userdata('id')));

    if ($update_result) {
        redirect(base_url('user/profile'));
    } else {
        echo 'error';
        // redirect(base_url('admin/profil'));
    }
}

}
?>