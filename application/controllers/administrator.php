<?php

class Administrator extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->_is_logged_in();
		$this->load->model('modeladmin');
	}
	
	public function index(){
		redirect('administrator/produk');
	}
	
	//MODUL PRODUK
	public function produk(){
		
		if($this->uri->segment(3)==""){
			$offset=0;
		}else{
			$offset=$this->uri->segment(3);
		}
		$limit = 3;
		$data['produk'] = $this->modeladmin->getAllPost($offset, $limit);
		$data['count'] = $this->modeladmin->getAllPost_count();
	
		$config = array();
		$config['base_url'] = base_url(). 'administrator/produk/';
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
		
		$data['judul'] = "Produk | Administrator";
 		$this->load->view('template/admin/header');
		$this->load->view('template/admin/nav');
		$this->load->view('admin/produk/produk', $data);
		$this->load->view('template/admin/footer');
	}
	
	public function tambah_produk(){
		$data['error'] = "";
		$data['kategori'] = $this->modeladmin->getKategoriProduk();
		$data['judul'] = "Tambah Produk | Administrator";
		$this->load->view('template/admin/header', $data);
		$this->load->view('template/admin/nav');
		$this->load->view('admin/produk/tambah_produk', $data);
		$this->load->view('template/admin/footer');
	}
	
	public function submit_tambah_produk(){
	$this->form_validation->set_rules('judul','Judul', 'required|xss_clean|max_length[255]|trim|strip_tags');
	$this->form_validation->set_rules('full_post','Isi Post', 'required|xss_clean');
	$this->form_validation->set_rules('id_kategori','Kategori', 'required|xss_clean|trim|strip_tags');
	if($this->form_validation->run() == TRUE){ 
		   
		  $config['upload_path'] = 'upload/produk/';
          $config['allowed_types'] = 'gif|jpeg|png|jpg';
          $config['max_size'] = 2000;
          $config['max_height'] = 2000;
          $config['max_width'] = 2000;
		  $config['encrypt_name'] = TRUE;
		  $this->upload->initialize($config);
			if ($this->upload->do_upload('gambar')) {
				$dok = $this->upload->data();
				$this->_resize_produk($dok['file_name']);
				$this->_create_thumb_produk($dok['file_name']);
			$foto = $dok['file_name'];
			$kategori = $this->input->post('id_kategori');
			$input_judul= $this->input->post('judul');
			$input_post= $this->input->post('full_post');
			$ganti = array("'");
			$oleh = "&#039;";
			$readmore = substr(($input_post),0,255);
			$judul = str_replace($ganti, $oleh, $input_judul);
			$post = str_replace($ganti, $oleh, $input_post);
			
			$this->modeladmin->inputPost($judul, $post, $foto, $kategori,$readmore);
			
			$this->session->set_flashdata('info', "Produk berhasil ditambahkan.");
			redirect('administrator/produk');
			}else{
				$data['error'] = $this->upload->display_errors();
			}	
		} 
		$data['error'] = $this->upload->display_errors();
		$data['kategori'] = $this->modeladmin->getKategoriProduk();
		$data['judul'] = "Tambah Produk | Administrator";
		$this->load->view('template/admin/header', $data);
		$this->load->view('template/admin/nav');
		$this->load->view('admin/produk/tambah_produk', $data);
		$this->load->view('template/admin/footer');
	}
	
	public function edit_produk($id){
		$data['kategori'] = $this->modeladmin->getKategoriProduk();
		$data['edit_produk'] = $this->modeladmin->getEditPost($id)->row();
		$data['judul'] = "Tambah Produk | Administrator";
		$this->load->view('template/admin/header', $data);
		$this->load->view('template/admin/nav');
		$this->load->view('admin/produk/edit_produk', $data);
		$this->load->view('template/admin/footer');
	}
	
	public function submit_edit_produk(){
	$id = $this->input->post('id_post');
	
	$this->form_validation->set_rules('judul','Judul', 'required|xss_clean|max_length[255]|trim|strip_tags');
	$this->form_validation->set_rules('full_post','Full Post', 'required|xss_clean');
	$this->form_validation->set_rules('id_kategori','Kategori', 'required|xss_clean|trim|strip_tags');
	if($this->form_validation->run() == TRUE){ 
		   
		   $config['upload_path'] = 'upload/produk/';
           $config['allowed_types'] = 'gif|jpeg|png|jpg';
           $config['max_size'] = 2000;
           $config['max_height'] = 2000;
           $config['max_width'] = 2000;
		   $config['encrypt_name'] = TRUE;
		   $this->upload->initialize($config);
		   
			if ($this->upload->do_upload('gambar')) {
			//unlink gambar
			$query = $this->modeladmin->getEditPost($id)->row();						
			if ($query->file_name != "" || $query->file_name != NULL ){
				if(file_exists('./upload/produk/' . $query->file_name) || file_exists('./upload/produk/thumb/'. $query->file_name)) {
					$do = unlink('./upload/produk/'. $query->file_name); //menghapus gambar semula di folder
					$do = unlink('./upload/produk/thumb/'. $query->file_name); //menghapus gambar semula di folder
				}
			} 
				$dok = $this->upload->data();
				$this->_resize_produk($dok['file_name']);
				$this->_create_thumb_produk($dok['file_name']);
				
			$foto = $dok['file_name'];
			$kategori = $this->input->post('id_kategori');
				$input_nama_produk= $this->input->post('judul');
				$input_deskripsi= $this->input->post('full_post');
				$kode = $this->input->post('id_post');
				$ganti = array("'");
				$oleh = "&#039;";
				
				$nama_produk = str_replace($ganti, $oleh, $input_nama_produk);
				//$url_title = url_title($nama_produk);
				$deskripsi = str_replace($ganti, $oleh, $input_deskripsi);
				$readmore = substr(($input_deskripsi),0,255);
			
			$this->modeladmin->updateProdukFoto($kode, $nama_produk, $deskripsi,$readmore,$foto, $kategori);
			
			$this->session->set_flashdata('info', "Produk berhasil diubah, gambar diubah.");
			redirect('administrator/produk');
			}else{
				$kategori = $this->input->post('id_kategori');
				$input_nama_produk= $this->input->post('judul');
				$input_deskripsi= $this->input->post('full_post');
				$kode = $this->input->post('id_post');
				$ganti = array("'");
				$oleh = "&#039;";
				
				$nama_produk = str_replace($ganti, $oleh, $input_nama_produk);
				//$url_title = url_title($nama_produk);
				$deskripsi = str_replace($ganti, $oleh, $input_deskripsi);
				$readmore = substr(($input_deskripsi),0,255);
				$this->modeladmin->updateProdukTanpaFoto($kode, $nama_produk, $deskripsi,$readmore, $kategori);
				
				$this->session->set_flashdata('info', "Produk berhasil diubah, gambar tidak diubah.");
				redirect('administrator/produk');
			}	
		}  
		$data['kategori'] = $this->modeladmin->getKategoriProduk();
		$data['edit_produk'] = $this->modeladmin->getEditProduk($id)->row();
		$data['judul'] = "Tambah Produk | Administrator";
		$this->load->view('template/admin/header', $data);
		$this->load->view('template/admin/nav');
		$this->load->view('admin/produk/edit_produk', $data);
		$this->load->view('template/admin/footer');
	}
	
	public function hapus_produk($id){
		$query = $this->modeladmin->getEditPost($id)->row();						
			if ($query->gambar != "" || $query->gambar != NULL ){
				if(file_exists('./upload/produk/' . $query->gambar) || file_exists('./upload/produk/thumb/'. $query->gambar)) {
					$do = unlink('./upload/produk/'. $query->gambar); //menghapus gambar semula di folder
					$do = unlink('./upload/produk/thumb/'. $query->gambar); //menghapus gambar semula di folder
				}
			} 
		$this->modeladmin->hapus_produk($id);
		$this->session->set_flashdata('info', "Produk berhasil dihapus.");
		redirect('administrator/produk');
	}
	
	//END MODUL Produk

	//MODUL ANGGOTA

	public function anggota(){
		
		if($this->uri->segment(3)==""){
			$offset=0;
		}else{
			$offset=$this->uri->segment(3);
		}
		$limit = 3;
		$data['produk'] = $this->modeladmin->getAllAnggota($offset, $limit);
		$data['count'] = $this->modeladmin->getAllAnggota_count();
	
		$config = array();
		$config['base_url'] = base_url(). 'administrator/anggota/';
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
		
		$data['judul'] = "Produk | Administrator";
 		$this->load->view('template/admin/header');
		$this->load->view('template/admin/nav');
		$this->load->view('admin/anggota/anggota', $data);
		$this->load->view('template/admin/footer');
	}

	public function tambah_anggota(){
		$data['error'] = "";
		$data['jabatan'] = $this->modeladmin->getAllJabatan();
		$data['judul'] = "Tambah Produk | Administrator";
		$this->load->view('template/admin/header', $data);
		$this->load->view('template/admin/nav');
		$this->load->view('admin/anggota/tambah_anggota', $data);
		$this->load->view('template/admin/footer');
	}

	public function submit_tambah_anggota(){
	$this->form_validation->set_rules('nim','NIM', 'required|xss_clean|max_length[15]|trim|strip_tags');
	$this->form_validation->set_rules('nama','Nama Mahasiswa', 'required|xss_clean');
	$this->form_validation->set_rules('angkatan','Tahun Angkatan', 'required|xss_clean');
	$this->form_validation->set_rules('id_jabatan','Jabatan', 'required|xss_clean|trim|strip_tags');
	if($this->form_validation->run() == TRUE){ 
		   
		  $config['upload_path'] = 'upload/anggota/';
          $config['allowed_types'] = 'gif|jpeg|png|jpg';
          $config['max_size'] = 2000;
          $config['max_height'] = 2000;
          $config['max_width'] = 2000;
		  $config['encrypt_name'] = TRUE;
		  $this->upload->initialize($config);
			if ($this->upload->do_upload('foto')) {
				$dok = $this->upload->data();
				$this->_resize_produk($dok['file_name']);
				$this->_create_thumb_produk($dok['file_name']);
			$foto = $dok['file_name'];
			$nim = $this->input->post('nim');
			$jabatan = $this->input->post('id_jabatan');
			$nama= $this->input->post('nama');
			$angkatan= $this->input->post('angkatan');
			$ganti = array("'");
			$oleh = "&#039;";
			$this->modeladmin->inputAnggota($nim, $jabatan, $foto, $nama,$angkatan);
			
			$this->session->set_flashdata('info', "Produk berhasil ditambahkan.");
			redirect('administrator/anggota');
			}else{
				$data['error'] = $this->upload->display_errors();
			}	
		} 
		$data['error'] = $this->upload->display_errors();
		$data['jabatan'] = $this->modeladmin->getAllJabatan();
		$data['judul'] = "Tambah Produk | Administrator";
		$this->load->view('template/admin/header');
		$this->load->view('template/admin/nav');
		$this->load->view('admin/anggota/tambah_anggota', $data);
		$this->load->view('template/admin/footer');
	}

	public function edit_anggota($nim){
		$data['jabatan'] = $this->modeladmin->getAllJabatan();
		$data['edit_anggota'] = $this->modeladmin->getEditAnggota($nim)->row();
		$data['judul'] = "Tambah Produk | Administrator";
		$this->load->view('template/admin/header');
		$this->load->view('template/admin/nav');
		$this->load->view('admin/anggota/edit_anggota', $data);
		$this->load->view('template/admin/footer');
	}

	public function submit_edit_anggota(){
	$nim = $this->input->post('nim2');
	
	$this->form_validation->set_rules('nim','NIM', 'required|xss_clean|max_length[15]|trim|strip_tags');
	$this->form_validation->set_rules('nama','Nama', 'required|xss_clean');
	$this->form_validation->set_rules('angkatan','Angkatan', 'required|xss_clean');
	$this->form_validation->set_rules('id_jabatan','Jabatan', 'required|xss_clean|trim|strip_tags');
	if($this->form_validation->run() == TRUE){ 
		   
		   $config['upload_path'] = 'upload/anggota/';
           $config['allowed_types'] = 'gif|jpeg|png|jpg';
           $config['max_size'] = 2000;
           $config['max_height'] = 2000;
           $config['max_width'] = 2000;
		   $config['encrypt_name'] = TRUE;
		   $this->upload->initialize($config);
		   
			if ($this->upload->do_upload('foto')) {
			//unlink gambar
			$query = $this->modeladmin->getEditAnggota($nim)->row();						
			if ($query->file_name != "" || $query->file_name != NULL ){
				if(file_exists('./upload/anggota/' . $query->file_name) || file_exists('./upload/anggota/thumb/'. $query->file_name)) {
					$do = unlink('./upload/anggota/'. $query->file_name); //menghapus gambar semula di folder
					$do = unlink('./upload/anggota/thumb/'. $query->file_name); //menghapus gambar semula di folder
				}
			} 
				$dok = $this->upload->data();
				$this->_resize_produk($dok['file_name']);
				$this->_create_thumb_produk($dok['file_name']);
				
			$foto = $dok['file_name'];
			$jabatan = $this->input->post('id_jabatan');
				$nama= $this->input->post('nama');
				$angkatan= $this->input->post('angkatan');
				$kode = $this->input->post('nim');
				$ganti = array("'");
				$oleh = "&#039;";
			
			$this->modeladmin->updateAnggotaFoto($kode, $nama, $angkatan,$jabatan,$foto, $nim);
			
			$this->session->set_flashdata('info', "Produk berhasil diubah, gambar diubah.");
			redirect('administrator/anggota');
			}else{
				$jabatan = $this->input->post('id_jabatan');
				$nama= $this->input->post('nama');
				$angkatan= $this->input->post('angkatan');
				$kode = $this->input->post('nim');
				$ganti = array("'");
				$oleh = "&#039;";
				
				$this->modeladmin->updateAnggotaTanpaFoto($kode, $nama, $angkatan,$jabatan,$nim);
				
				$this->session->set_flashdata('info', "Produk berhasil diubah, gambar tidak diubah.");
				redirect('administrator/anggota');
			}	
		}  
		$data['jabatan'] = $this->modeladmin->getAllJabatan();
		$data['edit_anggota'] = $this->modeladmin->getEditAnggota($nim)->row();
		$data['judul'] = "Tambah Produk | Administrator";
		$this->load->view('template/admin/header');
		$this->load->view('template/admin/nav');
		$this->load->view('admin/produk/edit_produk', $data);
		$this->load->view('template/admin/footer');
	}

	public function hapus_anggota($nim){
		$query = $this->modeladmin->getEditAnggota($nim)->row();						
			if ($query->foto != "" || $query->foto != NULL ){
				if(file_exists('./upload/anggota/' . $query->foto) || file_exists('./upload/produk/thumb/'. $query->foto)) {
					$do = unlink('./upload/anggota/'. $query->foto); //menghapus gambar semula di folder
					$do = unlink('./upload/anggota/thumb/'. $query->foto); //menghapus gambar semula di folder
				}
			} 
		$this->modeladmin->hapus_anggota($nim);
		$this->session->set_flashdata('info', "Anggota berhasil dihapus.");
		redirect('administrator/anggota');
	}

	public function jabatan(){
		$data['jabatan'] = $this->modeladmin->getAllJabatan();
		$data['judul'] = "Kategori Produk | Administrator";
		$this->load->view('template/admin/header');
		$this->load->view('template/admin/nav');
		$this->load->view('admin/anggota/jabatan', $data);
		$this->load->view('template/admin/footer');
	}

	public function submit_tambah_jabatan(){
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required|xss_clean|max_length[255]|trim|strip_tags');
		if($this->form_validation->run() == TRUE){
			$this->modeladmin->inputJabatan($this->input->post('jabatan'));
		$this->session->set_flashdata('info', "Jabatan berhasil ditambahkan.");
		redirect('administrator/jabatan');
		}
		$data['jabatan'] = $this->modeladmin->getAllJabatan();
		$data['judul'] = "Kategori Produk | Administrator";
		$this->load->view('template/admin/header');
		$this->load->view('template/admin/nav');
		$this->load->view('admin/kategori/kategori', $data);
		$this->load->view('template/admin/footer');
	}
	//END OF MODUL ANGGOTA

	//MODUL CHAT
	public function chat(){
		
		if($this->uri->segment(3)==""){
			$offset=0;
		}else{
			$offset=$this->uri->segment(3);
		}
		$limit = 5;
		$data['chat'] = $this->modeladmin->getAllChat($offset, $limit);
		$data['count'] = $this->modeladmin->getAllChat_count();
	
		$config = array();
		$config['base_url'] = base_url(). 'administrator/chat/';
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
		
		$this->load->view('template/admin/header');
		$this->load->view('template/admin/nav');
		$this->load->view('admin/chat/chat', $data);
		$this->load->view('template/admin/footer');
	}

	public function balas_chat($id_chat){
		$data['balas_chat'] = $this->modeladmin->getEditChat($id_chat)->row();
		$this->load->view('template/admin/header');
		$this->load->view('template/admin/nav');
		$this->load->view('admin/chat/balas_chat', $data);
		$this->load->view('template/admin/footer');
	}

	public function block_chat($id_chat){
		$this->modeladmin->block($id_chat);
		redirect('administrator/chat');
	}

	public function kirim_chat(){
		$pesan = $this->input->post('pesan');
		$user = $this->input->post('nama');
		$balasan = $this->input->post('balasan_chat');
		$balas = ($balasan."-> Re:( ".$user." : ".$pesan.")  ");
		$this->modeladmin->kirim($balas);
		redirect('administrator/chat');
	}

	//END OF MODUL CHAT

	//MODUL COMMENT
	public function comment(){
		
		if($this->uri->segment(3)==""){
			$offset=0;
		}else{
			$offset=$this->uri->segment(3);
		}
		$limit = 5;
		$data['comment'] = $this->modeladmin->getAllComment($offset, $limit);
		$data['count'] = $this->modeladmin->getAllComment_count();
	
		$config = array();
		$config['base_url'] = base_url(). 'administrator/comment/';
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
		
		$this->load->view('template/admin/header');
		$this->load->view('template/admin/nav');
		$this->load->view('admin/comment/comment', $data);
		$this->load->view('template/admin/footer');
	}

		public function block_comment($id){
		$this->modeladmin->block_comment($id);
		redirect('administrator/comment');
	}

	//END OF MODUL COMMENT
	//MODUL PRESTASI
	public function prestasi(){
		
		if($this->uri->segment(3)==""){
			$offset=0;
		}else{
			$offset=$this->uri->segment(3);
		}
		$limit = 5;
		$data['prestasi'] = $this->modeladmin->getAllPrestasi($offset, $limit);
		$data['count'] = $this->modeladmin->getAllPrestasi_count();
	
		$config = array();
		$config['base_url'] = base_url(). 'administrator/prestasi/';
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
		
		$this->load->view('template/admin/header');
		$this->load->view('template/admin/nav');
		$this->load->view('admin/prestasi/prestasi', $data);
		$this->load->view('template/admin/footer');
	}

	public function tambah_prestasi(){
		$data['error'] = "";
		$this->load->view('template/admin/header');
		$this->load->view('template/admin/nav');
		$this->load->view('admin/prestasi/tambah_prestasi', $data);
		$this->load->view('template/admin/footer');
	}
	
	public function submit_tambah_prestasi(){
	$this->form_validation->set_rules('tahun','Tahun', 'required|xss_clean|max_length[255]|trim|strip_tags');
	$this->form_validation->set_rules('nama','Nama', 'required|xss_clean|max_length[255]|trim|strip_tags');
	$this->form_validation->set_rules('perlombaan','Perlombaan', 'required|xss_clean|max_length[255]|trim|strip_tags');
	$this->form_validation->set_rules('penyelenggara','Penyelenggara', 'required|xss_clean|max_length[255]|trim|strip_tags');
	$this->form_validation->set_rules('juara','Juara', 'required|xss_clean|max_length[255]|trim|strip_tags');
	
	if($this->form_validation->run() == TRUE){ 
		   
			$tahun = $this->input->post('tahun');
			$nama= $this->input->post('nama');
			$perlombaan= $this->input->post('perlombaan');
			$penyelenggara= $this->input->post('penyelenggara');
			$juara= $this->input->post('juara');
			
			$this->modeladmin->inputPrestasi($tahun, $nama, $perlombaan, $penyelenggara,$juara);
			
			$this->session->set_flashdata('info', "Prestasi berhasil ditambahkan.");
			redirect('administrator/prestasi');
			}	
		
		$this->load->view('template/admin/header');
		$this->load->view('template/admin/nav');
		$this->load->view('admin/prestasi/tambah_prestasi');
		$this->load->view('template/admin/footer');
	}

	//END OF PRESTASI	

	//MODUL DOKUMEN
	public function dokumen(){
		
		if($this->uri->segment(3)==""){
			$offset=0;
		}else{
			$offset=$this->uri->segment(3);
		}
		$limit = 5;
		$data['dokumen'] = $this->modeladmin->getAllDokumen($offset, $limit);
		$data['count'] = $this->modeladmin->getAllDokumen_count();
	
		$config = array();
		$config['base_url'] = base_url(). 'administrator/dokumen/';
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
		
		$this->load->view('template/admin/header');
		$this->load->view('template/admin/nav');
		$this->load->view('admin/dokumen/dokumen', $data);
		$this->load->view('template/admin/footer');
	}

	public function tambah_dokumen(){
		$data['error'] = "";
		$this->load->view('template/admin/header');
		$this->load->view('template/admin/nav');
		$this->load->view('admin/dokumen/tambah_dokumen', $data);
		$this->load->view('template/admin/footer');
	}
	
	public function submit_tambah_dokumen(){
	$this->form_validation->set_rules('nama','Nama Dokumen', 'required|xss_clean|max_length[255]|trim|strip_tags');
	$this->form_validation->set_rules('nomor','Nomor Dokumen', 'required|xss_clean|max_length[255]|trim|strip_tags');
	$this->form_validation->set_rules('link','Link', 'required|xss_clean|max_length[255]|trim|strip_tags');
	
	if($this->form_validation->run() == TRUE){ 
		   
			$nama= $this->input->post('nama');
			$nomor = $this->input->post('nomor');
			$link= $this->input->post('link');
			
			$this->modeladmin->inputDokumen($nama, $nomor, $link);
			
			$this->session->set_flashdata('info', "Dokumen berhasil ditambahkan.");
			redirect('administrator/dokumen');
			}	
		
		$this->load->view('template/admin/header');
		$this->load->view('template/admin/nav');
		$this->load->view('admin/dokumen/tambah_dokumen');
		$this->load->view('template/admin/footer');
	}

	//END OF PRESTASI	
	
	//MODUL Kategori
	public function kategori_produk(){
		$data['kategori'] = $this->modeladmin->getAllKategoriProduk();
		$data['judul'] = "Kategori Produk | Administrator";
		$this->load->view('template/admin/header', $data);
		$this->load->view('template/admin/nav');
		$this->load->view('admin/kategori/kategori', $data);
		$this->load->view('template/admin/footer');
	}
	
	public function submit_tambah_kategori(){
		$this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required|xss_clean|max_length[255]|trim|strip_tags');
		if($this->form_validation->run() == TRUE){
			$this->modeladmin->inputKategoriProduk($this->input->post('nama_kategori'));
		$this->session->set_flashdata('info', "Kategori Produk berhasil ditambahkan.");
		redirect('administrator/kategori_produk');
		}
		$data['kategori'] = $this->modeladmin->getAllKategoriProduk();
		$data['judul'] = "Kategori Produk | Administrator";
		$this->load->view('template/admin/header', $data);
		$this->load->view('template/admin/nav');
		$this->load->view('admin/kategori/kategori', $data);
		$this->load->view('template/admin/footer');
	}
	
	public function edit_kategori_produk($id){
		$data['edit_kategori'] = $this->modeladmin->getEditKategoriProduk($id)->row();
		$data['judul'] = "Edit Kategori Produk | Administrator";
		$this->load->view('template/admin/header', $data);
		$this->load->view('template/admin/nav');
		$this->load->view('admin/kategori/edit_kategori', $data);
		$this->load->view('template/admin/footer');
	}
	
	public function submit_edit_kategori_produk(){
	$id = $this->input->post('id');
		$this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required|xss_clean|max_length[255]|trim|strip_tags');
		if($this->form_validation->run() == TRUE){
			$this->modeladmin->updateKategoriProduk($this->input->post('id'), $this->input->post('nama_kategori'));
		$this->session->set_flashdata('info', "Kategori Produk berhasil diubah.");
		redirect('administrator/kategori_produk');
		}
		$data['edit_kategori'] = $this->modeladmin->getEditKategoriProduk($id)->row();
		$data['judul'] = "Edit Kategori Produk | Administrator";
		$this->load->view('template/admin/header', $data);
		$this->load->view('template/admin/nav');
		$this->load->view('admin/kategori/edit_kategori', $data);
		$this->load->view('template/admin/footer');
		
	}
	
	public function hapus_kategori($id){
		$hapus = $this->modeladmin->hapusKategori($id);
		
		$query = $this->modeladmin->getProdukByIdKategori($id)->row();						
			if ($query->file_name != "" || $query->file_name != NULL ){
				if(file_exists('./upload/produk/' . $query->file_name) || file_exists('./upload/produk/thumb/'. $query->file_name)) {
					$do = unlink('./upload/produk/'. $query->file_name); //menghapus gambar semula di folder
					$do = unlink('./upload/produk/thumb/'. $query->file_name); //menghapus gambar semula di folder
				}
			} 
		$this->modeladmin->hapus_produk($id);
		$this->session->set_flashdata('info', "Kategori berhasil dihapus.");
		redirect('administrator/kategori_produk');
		
	}
	//END MODUL Kategori
	
	//MODUL BANNER
	public function banner(){
		$data['error'] = "";
		$data['banner'] = $this->modeladmin->getAllBanner();
		$data['judul'] = "Banner | Administrator";
		$this->load->view('template/admin/header', $data);
		$this->load->view('template/admin/nav');
		$this->load->view('admin/banner/banner', $data);
		$this->load->view('template/admin/footer');
	}
	
	public function submit_tambah_banner(){
		   $config['upload_path'] = 'upload/banner/';
           $config['allowed_types'] = 'gif|jpeg|png|jpg';
           $config['max_size'] = 2000;
           $config['max_height'] = 2000;
           $config['max_width'] = 2000;
		   $config['encrypt_name'] = TRUE;
		   $this->upload->initialize($config);
		   
			if ($this->upload->do_upload('gambar_banner')) {
				$dok = $this->upload->data();
				$this->_resize_banner($dok['file_name']);
				$this->_create_thumb_banner($dok['file_name']);
				
			$foto = $dok['file_name'];
			$this->modeladmin->inputBanner($foto);
			
			$this->session->set_flashdata('info', "Banner berhasil ditambahkan.");
			redirect('administrator/banner');
			}else{
				$data['error'] = $this->upload->display_errors();
				$data['banner'] = $this->modeladmin->getAllBanner();
				$data['judul'] = "Banner | Administrator";
				$this->load->view('template/admin/header', $data);
				$this->load->view('template/admin/nav');
				$this->load->view('admin/banner/banner', $data);
				$this->load->view('template/admin/footer');
			}
	}
	
	public function hapus_banner($id){
		$query = $this->modeladmin->getBannerById($id)->row();
		if ($query->file_name != "" || $query->file_name != NULL ){
				if(file_exists('./upload/banner/' . $query->file_name) || file_exists('./upload/banner/thumb/'. $query->file_name)) {
					$do = unlink('./upload/banner/'. $query->file_name); //menghapus gambar semula di folder
					$do = unlink('./upload/banner/thumb/'. $query->file_name); //menghapus gambar semula di folder
				}
			} 
		$this->modeladmin->hapusbanner($id);
		$this->session->set_flashdata('info', "Banner berhasil dihapus.");
		redirect('administrator/banner');
	}
	
	public function edit_status_banner($id, $status){
		if($status == FALSE){
			$this->modeladmin->updateStatusBanner($id, TRUE);
			$this->session->set_flashdata('info', "Banner berhasil ditampilkan.");
			redirect('administrator/banner');
		}else{
			$this->modeladmin->updateStatusBanner($id, FALSE);
			$this->session->set_flashdata('info', "Banner berhasil disembunyikan.");
			redirect('administrator/banner');
		}
	}
	//END MODUL BANNER
	
	//MODUL PROFIL
	public function profil($kategori){
		$data['profil'] = $this->modeladmin->getProfilByCategory($kategori)->row();
		$data['menuprofil'] = $this->modeladmin->getAllProfilCategori()->result();
		$data['judul'] = "Profil | Administrator";
		$this->load->view('template/admin/header', $data);
		$this->load->view('template/admin/nav');
		$this->load->view('admin/profil/profil', $data);
		$this->load->view('template/admin/footer');
	}
	
	public function submit_edit_profil(){
		$kategori = $this->input->post('kategori_profil');
		$id = $this->input->post('id');
		$input_deskripsi= $this->input->post('deskripsi');
		$ganti = array("'");
		$oleh = "&#039;";
		$deskripsi = str_replace($ganti, $oleh, $input_deskripsi);
		
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|xss_clean|max_length[1000]');
		if($this->form_validation->run() == TRUE){
			$this->modeladmin->updateProfil($id, $kategori, $deskripsi);
			$this->session->set_flashdata('info', "Profil berhasil diubah.");
			redirect('administrator/profil/'. $kategori);
		}
		$data['profil'] = $this->modeladmin->getProfilByCategory($kategori)->row();
		$data['menuprofil'] = $this->modeladmin->getAllProfilCategori()->result();
		$data['judul'] = "Profil | Administrator";
		$this->load->view('template/admin/header', $data);
		$this->load->view('template/admin/nav');
		$this->load->view('admin/profil/profil', $data);
		$this->load->view('template/admin/footer');
		
	}
	//END MODUL PROFIL
	
	//GANTI PASSWORD
	//MODUL GANTI PASSWORD
	function ganti_password(){
		if (!$this->tank_auth->is_logged_in()) {								// not logged in or not activated
			redirect('/auth/login/');

		} else {
			$this->form_validation->set_rules('old_password', 'Old Password', 'trim|required|xss_clean');
			$this->form_validation->set_rules('new_password', 'New Password', 'trim|required|xss_clean|min_length['.$this->config->item('password_min_length', 'tank_auth').']|max_length['.$this->config->item('password_max_length', 'tank_auth').']|alpha_dash');
			$this->form_validation->set_rules('confirm_new_password', 'Confirm new Password', 'trim|required|xss_clean|matches[new_password]');

			$data['errors'] = array();

			if ($this->form_validation->run()) {								// validation ok
				if ($this->tank_auth->change_password(
						$this->form_validation->set_value('old_password'),
						$this->form_validation->set_value('new_password'))) {	// success
					$this->_show_message($this->lang->line('auth_message_password_changed'));
				} else {														// fail
					$errors = $this->tank_auth->get_error_message();
					foreach ($errors as $k => $v)	$data['errors'][$k] = $this->lang->line($v);
				}
			}
			//$this->load->view('auth/change_password_form', $data);
			$data['judul'] = "Admin | Ganti Password";
			$this->load->view('template/admin/header', $data);
			$this->load->view('template/admin/nav');
			$this->load->view('admin/setting/ganti_password', $data);
			$this->load->view('template/admin/footer');
		}
	}
	//END GANTI PASSWORD
	
	//MODUL CONTACT US
	public function contact_us(){
		
		if($this->uri->segment(3)==""){
			$offset=0;
		}else{
			$offset=$this->uri->segment(3);
		}
		$limit = 30;
		$data['contact_us'] = $this->modeladmin->getAllContactUs($offset, $limit);
		$data['count'] = $this->modeladmin->getAllContactUs_count()->num_rows;
	
		$config = array();
		$config['base_url'] = base_url(). 'administrator/contact_us/';
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
		
		$data['judul'] = "Produk | Administrator";
 		$this->load->view('template/admin/header', $data);
		$this->load->view('template/admin/nav');
		$this->load->view('admin/banner/contact_us', $data);
		$this->load->view('template/admin/footer');
	}
	
	public function hapus_contact($id){
		$this->modeladmin->hapus_contact($id);
		$this->session->set_flashdata('info', "Contact berhasil dihapus.");
		redirect('administrator/contact_us');
	}
	public function hapus_contact_all(){
		$this->modeladmin->hapus_contact_all();
		$this->session->set_flashdata('info', "Contact berhasil dikosongkan.");
		redirect('administrator/contact_us');
	}
	
	//END MODUL CONTACT US
	
	//METHOD METHOD
	
	public function _resize_produk($fulpat) {
        $config['source_image'] = './upload/produk/' . $fulpat;
        $config['new_image'] = './upload/produk/' . $fulpat;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = 900;
        $config['height'] = 600;
        $this->image_lib->initialize($config);

        if (!$this->image_lib->resize()) {
            echo $this->image_lib->display_errors();
        }
    }
	
	public function _create_thumb_produk($fulpet) {
        $config['source_image'] = './upload/produk/' . $fulpet;
        $config['new_image'] = './upload/produk/thumb/' . $fulpet;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = 200;
        //$config['height'] = 200;
        $this->image_lib->initialize($config);

        if (!$this->image_lib->resize()) {
            echo "tum" . $this->image_lib->display_errors();
        }
    }
	
	public function _resize_banner($fulpat) {
        $config['source_image'] = './upload/banner/' . $fulpat;
        $config['new_image'] = './upload/banner/' . $fulpat;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = 900;
        $config['height'] = 600;
        $this->image_lib->initialize($config);

        if (!$this->image_lib->resize()) {
            echo $this->image_lib->display_errors();
        }
    }
	
	public function _create_thumb_banner($fulpet) {
        $config['source_image'] = './upload/banner/' . $fulpet;
        $config['new_image'] = './upload/banner/thumb/' . $fulpet;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = 200;
        //$config['height'] = 200;
        $this->image_lib->initialize($config);

        if (!$this->image_lib->resize()) {
            echo "tum" . $this->image_lib->display_errors();
        }
    }
	
	//SHOW MESSAGE TANK AUTH
	function _show_message($message){
		$this->session->set_flashdata('info', "Password admin berhasil diganti.");
		redirect('administrator/ganti_password');
	}
	 
	public function _is_logged_in(){
		if(!$this->tank_auth->is_logged_in()){
			redirect('auth/login');
		}
	}
	
	public function abus(){
		for($i = 1; $i<540; $i++){
			$this->db->query("INSERT INTO contact_us VALUE('', 'Jon Jen$i ', 'jon_jen_ini_email$i@test.com','iciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperi', NOW())");
		}
	}	
}