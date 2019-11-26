<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class sejarah extends CI_Controller {
	public function index()
	{
		$this->load->view('element/header');
		$this->load->view('element/navbar');
		$this->load->view('sejarah');
		$this->load->view('element/footer');
	}
}

