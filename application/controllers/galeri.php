<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class galeri extends CI_Controller {
	public function index()
	{
		
		$this->load->model('modelpost');
		$data['table'] = $this->modelpost->getPost();
		$data['kategori'] = $this->modelpost->getKategoriProduk();
		$this->load->view('element/header');
		$this->load->view('element/navbar');
		$this->load->view('galeri',$data);
		$this->load->view('element/footer');
	}
}

?>