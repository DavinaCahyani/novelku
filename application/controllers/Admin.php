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
        $data['total'] = $this->m_model->countTotalUser();
        $data['cerita'] = $this->m_model->countTotalCerita();


		$this->load->view('admin/dashboard', $data);
	}

	public function hapus_user($id)
{
   $this->m_model->delete('auth', 'id', $id);
    redirect(base_url('admin/dashboard'));
}

}
?>