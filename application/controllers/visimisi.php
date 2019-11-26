<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class visimisi extends CI_Controller {
	public function index()
	{
		$this->load->model('modelpost');
		$this->load->view('element/header');
		$this->load->view('element/navbar');
		$this->load->view('visimisi');
		$this->load->view('element/footer');
	}
}

