<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class komentar extends CI_Controller {

	public function index()
	{
		$this->load->model('modelpost');
		$nama=$this->input->post("name");
		$email=$this->input->post("email");
		$komen=$this->input->post("komen");
		$id_post=$this->input->post("id_post");

		$this->modelpost->komen($nama, $email, $komen, $id_post);
		redirect('news/readmore/'.$id_post);
		

	}
	
}
