<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home extends CI_Controller {
	public function index()
	{
		$this->load->model('modelpost');
		$data['table'] = $this->modelpost->getAllPost();
		$this->load->view('element/header');
		$this->load->view('element/navbar');
		$this->load->view('home',$data);
		$this->load->view('element/footer');
	}
}

