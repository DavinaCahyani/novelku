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
}
?>