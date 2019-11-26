<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class news extends CI_Controller {
	public function index()
	{
		
		$this->load->model('modelpost');
		$data['table'] = $this->modelpost->getPost();
		$data['kategori'] = $this->modelpost->getKategoriProduk();
		$this->load->view('element/header');
		$this->load->view('element/navbar');
		$this->load->view('news2',$data);
		$this->load->view('element/footer');
	}

	public function kategori($id_kategori){
		$this->load->model('modelpost');
		$data['table'] = $this->modelpost->getAllKategori($id_kategori);
		$data['kategori'] = $this->modelpost->getKategoriProduk();
		$this->load->view('element/header');
		$this->load->view('element/navbar');
		$this->load->view('news',$data);
		$this->load->view('element/footer');

	}

	public function readmore($id_post)
	{

		
		$this->load->model('modelpost');
		$data['komen'] = $this->modelpost->getKomen($id_post);
		$data['table'] = $this->modelpost->getReadmore($id_post);
		$data['kategori'] = $this->modelpost->getKategoriProduk();
		$data['related'] = $this->modelpost->getRelatedPost($id_post);
		$data['galeri'] = $this->modelpost->getGaleri();
		$this->load->view('element/header');
		$this->load->view('element/navbar');
		$this->load->view('readmore',$data);
		$this->load->view('element/footer');
	}
}

