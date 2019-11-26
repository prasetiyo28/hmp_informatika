<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class anggota extends CI_Controller {
	public function index()
	{
		$this->load->model('modelpost');
		$data['pembina'] = $this->modelpost->getpembina();
		$data['ben'] = $this->modelpost->getben();
		$data['table'] = $this->modelpost->getwakilketua();
		$data['table2'] = $this->modelpost->getanggota();
		$this->load->view('element/header');
		$this->load->view('element/navbar');
		$this->load->view('anggota',$data);
		$this->load->view('element/footer');
	}
}

