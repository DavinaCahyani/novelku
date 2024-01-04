<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller {
    
    function __construct()
	{
	parent::__construct();
	$this->load->model('m_model');
	$this->load->helper('my_helper');
    }

    public function landingpage()
	{
		$this->load->view('user/landingpage');
	}
}
?>