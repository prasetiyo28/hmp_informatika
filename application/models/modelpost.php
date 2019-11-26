<?php 
class modelpost extends CI_Model {
	public function getAllPost(){
		$query = $this->db->query("SELECT * FROM tampil WHERE nama_kategori='Prestasi' ORDER BY tanggal asc LIMIT 3 ");
		return $query;
	}

		public function getAllKategori($id_kategori){
		$query = $this->db->query("SELECT * FROM tampil where id_kategori = $id_kategori ORDER BY tanggal ASC");
		return $query;
	}

	public function getPost(){
		$query = $this->db->query("SELECT * FROM tampil ORDER BY tanggal DESC ");
		return $query;
	}

	public function getPrestasi(){
		$query = $this->db->query("SELECT * FROM prestasi");
		return $query;
	}

	public function getGaleri(){
		$query = $this->db->query("SELECT * FROM tampil ORDER BY tanggal DESC LIMIT 5 ");
		return $query;
	}

	public function getRelatedPost($id_post){
		$query = $this->db->query("SELECT * FROM tampil WHERE NOT id=$id_post ORDER BY tanggal DESC LIMIT 5 ");
		return $query;
	}

	public function getAlldokumen(){
		$query = $this->db->query("SELECT * FROM dokumen");
		return $query;
	}

	public function getkomen($id_post){
		$query = $this->db->query("SELECT * FROM komen where id_post = $id_post AND status = 1 ");
		return $query;
	}
	public function komen($nama, $email, $komen, $id_post){
		$query = $this->db->query("INSERT INTO komen values('','$nama','$email','$komen',$id_post,CURRENT_TIMESTAMP)");
		return $query;
	}

	public function getAllProker(){
		$query = $this->db->query("SELECT * FROM proker where tahun = now()");
		return $query;

	}
/*
	public function getAllPost($offset, $limit){
		$query = $this->db->query("
			SELECT * FROM tampil
			ORDER BY tanggal DESC 
			LIMIT $offset, $limit
		");
		return $query;
	}
*/
	public function getwakilketua(){
		$query = $this->db->query("SELECT * FROM v_anggota where id_jabatan = '2' or id_jabatan = '3' ORDER BY id_jabatan ASC LIMIT 2");
		return $query;
	}

	public function getpembina(){
		$query = $this->db->query("SELECT * FROM v_anggota where id_jabatan = '1' LIMIT 1");
		return $query;
	}

	public function getanggota(){
		$query = $this->db->query("SELECT * FROM v_anggota WHERE NOT (id_jabatan = '1' or id_jabatan = '2' or id_jabatan = '3' or id_jabatan = '4' or id_jabatan = '5' or id_jabatan = '6' ) order by id_jabatan asc");
		return $query;
	}

		public function getben(){
		$query = $this->db->query("SELECT * FROM v_anggota WHERE id_jabatan = '4' or id_jabatan = '5' or id_jabatan = '6' ORDER BY id_jabatan ASC limit 4 ");
		return $query;
	}

	public function getReadmore($id_post){
		$query = $this->db->query("SELECT * FROM tampil where id = $id_post ");
		return $query;
	}

	public function getKategoriProduk(){
		$query = $this->db->query("SELECT * FROM kategori_produk ORDER BY nama_kategori ASC");
		return $query;
	}
	public function getCountPost(){
		$query = $this->db->query("
			SELECT * FROM tampil
		");
		return $query->num_rows();
	}

}