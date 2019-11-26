<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_chat extends CI_Controller {

	public function index()
	{
		$this->load->view('chat');
		$this->load->view('element/footer');
	}
	
	public function kirim_chat()
	{
		$user=("ASK-".$this->input->post("user"));
		$pesan=$this->input->post("pesan");
		mysql_query("insert into chat (user,pesan) VALUES ('$user','$pesan')");
		redirect ("C_chat/ambil_pesan");
	}
	
	public function ambil_pesan()
	{
		$tampil=mysql_query("select * from chat where status='1' order by waktu desc");
		while($r=mysql_fetch_array($tampil)){
		echo "<li><b>$r[user]</b> : $r[pesan] (<i>$r[waktu]</i>)</li>";
		}
	}
}
