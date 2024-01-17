<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model('m_model');
        $this->load->helper('my_helper');
        $this->load->helper('html');
        $this->load->library('upload');
    }
	
	public function index()
	{
		$data['cerita'] = $this->m_model->cerita_disetujui();

		$data['title'] = 'Novelku';
		$this->load->view('home', $data);
	}
}