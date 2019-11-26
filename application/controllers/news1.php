<?php

class news1 extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('modelpost');
	}
	
	public function index(){
		redirect('news1/news');
	}
	
	//MODUL PRODUK
	public function news(){
		if($this->uri->segment(3)==""){
			$offset=0;
		}else{
			$offset=$this->uri->segment(3);
		}
		$limit = 3;
		$data['table'] = $this->modelpost->getAllPost($limit,$offset);
		$data['count'] = $this->modelpost->getCountPost();
		$config = array();
		$config['base_url'] = base_url(). 'news1/news';
		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		$config['num_links'] = 5;
		
		$config['first_tag_open'] = '<li>';
		$config['first_link'] = 'First';
		$config['first_tag_close'] = '</li>';
		$config['prev_link'] = 'Prev';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href>';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_link'] = 'Last';
		$config['last_tag_close'] = '</li>';
		$config['total_rows'] = $data['count'];
		$this->pagination->initialize($config);
		$this->session->set_userdata('row', $this->uri->segment(3));

		$data['kategori'] = $this->modelpost->getKategoriProduk();
		$this->load->view('element/header');
		$this->load->view('news',$data);
		$this->load->view('element/footer');
	
	}
}