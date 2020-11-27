<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('m_pengunjung');
        $this->m_pengunjung->count_visitor();
	}

	public function index(){
		$this->load->view('v_about');
	}

}
