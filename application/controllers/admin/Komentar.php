<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Komentar extends CI_Controller{

	public function __construct(){
		parent::__construct();
		if(!isset($_SESSION['logged_in'])){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_komentar');
	}

	public function index(){
		$x['data']=$this->m_komentar->get_komentar();
		$this->load->view('admin/v_komentar',$x);
	}

	public function reply(){
		$kode=$this->input->post('kode');
		$tulisan_id=$this->input->post('tulisan_id');
		$komentar=strip_tags(str_replace("'", "", htmlspecialchars($this->input->post('komentar',TRUE))));
		$this->m_komentar->reply_komentar($kode,$komentar,$tulisan_id);
		echo $this->session->set_flashdata('msg','success');
		redirect('admin/komentar');
	}

	public function publish(){
		$kode=$this->input->post('kode');
		$this->m_komentar->publish_komentar($kode);
		echo $this->session->set_flashdata('msg','info');
		redirect('admin/komentar');
	}

	public function hapus_komentar(){
		$kode=$this->input->post('kode');
		$this->m_komentar->hapus_komentar($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/komentar');
	}
}
