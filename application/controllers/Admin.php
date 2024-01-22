<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {

	function __construct()
    {
        parent::  __construct();
        $this->load->model('m_model');
        $this->load->helper('my_helper');;
        $this->load->helper('html');
        $this->load->library('upload');


        if($this->session->userdata('logged_in')!=true || $this->session->userdata('role') != 'admin') {
            redirect(base_url().'auth');
        }
    }
    
	public function dashboard()
{
    $data['auth'] = $this->m_model->getDataUser();
    $data['total_user'] = $this->m_model->count('role', 'user', 'auth');
    $data['total_kontributor'] = $this->m_model->count('tingkatan', 'kontributor', 'auth');
    $data['total_cerita_disetujui'] = $this->m_model->count('status', 'disetujui', 'cerita_novel');
    $data['total_cerita_belum_disetujui'] = $this->m_model->count('status', 'belum disetujui', 'cerita_novel');
    $data['cerita_belum_disetujui'] = $this->m_model->status_cerita_belum_disetujui()->result();
    
    $data['grafik_perminggu'] = json_encode($this->m_model->get_stories_past_7_days());

    $this->load->view('admin/dashboard', $data);
}


	public function daftar_novel()
	{
        $data['cerita'] = $this->m_model->get_data('cerita_novel')->result();

		$this->load->view('admin/daftar_novel', $data);
	}

	public function data_user()
	{
        $data['auth'] = $this->m_model->getDataUser();

		$this->load->view('admin/data_user', $data);
	}

    public function aksi_setuju($id_novel,$id_user)
    {
        $status = [
        'status' => 'disetujui'
        ];
        $tingkatan = [
        'tingkatan' => 'kontributor'
        ];

        $update_status = $this->m_model->ubah_data('cerita_novel', $status, array('id_novel' => $id_novel));
        $update_tingkatan = $this->m_model->ubah_data('auth', $tingkatan, array('id' => $id_user));
    
        if ($update_status && $update_tingkatan) {
        redirect(base_url('admin/daftar_novel'));
        } else {
        echo 'error';
        redirect(base_url('admin/error'));
        }
    }
    
    public function aksi_tolak($id_novel)
    {
        $status = [
        'status' => 'ditolak'
        ];
        $update_status = $this->m_model->ubah_data('cerita_novel', $status, array('id_novel' => $id_novel));
        if ($update_status) {
        redirect(base_url('admin/daftar_novel'));
        } else {
        echo 'error';
        redirect(base_url('admin/error'));
        }
    }


	public function hapus_user($id)
    {
        $this->m_model->delete('auth', 'id', $id);
        redirect(base_url('admin/dashboard'));
    }

	public function hapus_cerita($id)
    {
        $this->m_model->delete('cerita_novel', 'id_novel', $id);
        redirect(base_url('admin/daftar_novel'));
    }

}
?>