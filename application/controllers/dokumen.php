<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dokumen extends CI_Controller {
	public function index()
	{
		$this->load->model('modelpost');
		$data['dokumen']=$this->modelpost->getAlldokumen();
		$this->load->view('element/header');
		$this->load->view('element/navbar');
		$this->load->view('dokumen',$data);
		$this->load->view('element/footer');
	}
}

