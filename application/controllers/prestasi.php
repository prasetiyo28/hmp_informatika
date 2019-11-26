<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class prestasi extends CI_Controller {
	public function index()
	{
		$this->load->model('modelpost');
		$data['table'] = $this->modelpost->getPrestasi();
		$this->load->view('element/header');
		$this->load->view('element/navbar');
		$this->load->view('prestasi',$data);
		$this->load->view('element/footer');
	}
}

