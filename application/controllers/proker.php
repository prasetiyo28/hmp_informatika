<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class proker extends CI_Controller {
	public function index()
	{
		$this->load->model('modelpost');
		$data['proker']=$this->modelpost->getAllProker();
		$this->load->view('element/header');
		$this->load->view('element/navbar');
		$this->load->view('proker',$data);
		$this->load->view('element/footer');
	}
}

