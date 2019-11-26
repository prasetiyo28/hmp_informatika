<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class contact extends CI_Controller {
	public function index()
	{

		$this->load->view('element/header');
		$this->load->view('element/navbar');
		$this->load->view('lokasi');
		$this->load->view('element/footer');
	}
}

