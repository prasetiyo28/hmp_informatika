<?php 

class Modeladmin extends CI_Model{
	
	public function __construct(){
		parent::__construct();
	}
	
	//QUERY PRODUK
	public function getKategoriProduk(){
		$query = $this->db->query("SELECT * FROM kategori_produk ORDER BY nama_kategori ASC");
		return $query;
	}
	
	public function getAllPost($offset, $limit){
		$query = $this->db->query("
			SELECT p.id as id_post, p.judul, p.gambar, p.full_post, p.id_kategori, p.created_at,
			kp.id, kp.nama_kategori
			FROM post as p, kategori_produk as kp
			WHERE p.id_kategori = kp.id
			ORDER BY created_at DESC 
			LIMIT $offset, $limit
		");
		return $query;
	}

	public function getAllAnggota($offset, $limit){
		$query = $this->db->query("
			
			SELECT a.nim , a.nama , a.angkatan , a.id_jabatan , b.jabatan , a.foto from anggota as a , jabatan as b where a.id_jabatan = b.id_jabatan order by id_jabatan asc 
			LIMIT $offset, $limit
		"); //SELECT * from anggota
		return $query;
	}

	public function getAllComment($offset, $limit){
		$query = $this->db->query("
			
			SELECT * from komen order by id_post asc 
			LIMIT $offset, $limit
		");
		return $query;
	}

	public function getAllDokumen($offset, $limit){
		$query = $this->db->query("
			
			SELECT * from dokumen order by id asc 
			LIMIT $offset, $limit
		");
		return $query;
	}

	public function getAllChat($offset, $limit){
		$query = $this->db->query("
			
			SELECT * from chat order by waktu desc 
			LIMIT $offset, $limit
		");
		return $query;
	}

	public function getAllPrestasi($offset, $limit){
		$query = $this->db->query("
			
			SELECT * from prestasi 
			LIMIT $offset, $limit
		");
		return $query;
	}

	public function getAllProduk($offset, $limit){
		$query = $this->db->query("
			SELECT p.id as id_produk, p.nama_produk, p.url_title, p.deskripsi, p.file_name, p.id_kategori_produk, p.created_at,
			kp.id, kp.nama_kategori
			FROM post as p, kategori_produk as kp
			WHERE p.id_kategori_produk = kp.id
			ORDER BY created_at DESC 
			LIMIT $offset, $limit
		");
		return $query;
	}
	
	public function getAllProduk_count(){
		$query = $this->db->query("
			SELECT * FROM produk
		");
		return $query->num_rows();
	}

	public function getAllComment_count(){
		$query = $this->db->query("
			SELECT * FROM komen
		");
		return $query->num_rows();
	}

	public function getAllDokumen_count(){
		$query = $this->db->query("
			SELECT * FROM dokumen
		");
		return $query->num_rows();
	}

	public function getAllPost_count(){
		$query = $this->db->query("
			SELECT * FROM post
		");
		return $query->num_rows();
	}

	public function getAllAnggota_count(){
		$query = $this->db->query("
			SELECT * FROM anggota
		");
		return $query->num_rows();
	}

	public function getAllChat_count(){
		$query = $this->db->query("
			SELECT * FROM chat
		");
		return $query->num_rows();
	}

	public function getAllPrestasi_count(){
		$query = $this->db->query("
			SELECT * FROM prestasi
		");
		return $query->num_rows();
	}
	
	public function inputProduk($nama_produk, $url_title, $deskripsi, $foto, $kategori){
		$query = $this->db->query("INSERT INTO produk VALUES('', '$nama_produk', '$url_title', '$deskripsi', '$foto', '$kategori', NOW())");
	}

	public function inputAnggota($nim, $jabatan, $foto, $nama,$angkatan){
		$query = $this->db->query("INSERT INTO anggota VALUES('$nim', '$nama', '$angkatan', '$jabatan', '$foto' )");
	}

	public function inputPrestasi($tahun, $nama, $perlombaan, $penyelenggara,$juara){
		$query = $this->db->query("INSERT INTO prestasi VALUES('','$tahun', '$nama', '$perlombaan', '$penyelenggara','$juara')");
	}

	public function inputDokumen($nama, $nomor, $link){
		$query = $this->db->query("INSERT INTO dokumen VALUES('','$nama', '$nomor', '$link')");
	}

	public function inputPost($judul, $post, $foto, $kategori,$readmore){
		$query = $this->db->query("INSERT INTO post VALUES('', '$judul', '$readmore', '$post', '$foto', '$kategori', NOW())");
	}
	
	public function getEditProduk($id){
		$query = $this->db->query("
					SELECT p.id as id_produk, p.nama_produk, p.url_title, p.deskripsi, p.file_name, p.id_kategori_produk, p.created_at,
					kp.id, kp.nama_kategori
					FROM produk as p, kategori_produk as kp
					WHERE p.id_kategori_produk = kp.id
					AND p.id = '$id'
					LIMIT 1
					");
		return $query;
	}

		public function getEditPost($id){
		$query = $this->db->query("
					SELECT p.id as id_post, p.judul, p.gambar, p.full_post,p.id_kategori, p.created_at,
					kp.id, kp.nama_kategori
					FROM post as p, kategori_produk as kp
					WHERE p.id_kategori = kp.id
					AND p.id = '$id'
					LIMIT 1
					");
		return $query;
	}

	public function getEditAnggota($nim){
		$query = $this->db->query("
					SELECT * from v_anggota where nim =  $nim
					LIMIT 1
					");
		return $query;
	}
	
	public function getEditChat($id_chat){
		$query = $this->db->query("
					SELECT * from chat where id_chat =  $id_chat
					");
		return $query;
	}
	
	public function updateProdukTanpaFoto($kode, $nama_produk, $deskripsi,$readmore, $kategori){
		$query = $this->db->query("UPDATE post
									SET judul = '$nama_produk', 
									full_post = '$deskripsi', 
									readmore = '$readmore',
									id_kategori = '$kategori', 
									created_at = NOW()
									WHERE id = '$kode'
								");
	}//	

	public function updateAnggotaTanpaFoto($kode, $nama, $angkatan,$jabatan,$nim){
		$query = $this->db->query("UPDATE anggota
									SET nim = '$kode', 
									nama = '$nama', 
									angkatan = '$angkatan',
									id_jabatan = '$jabatan' 
									WHERE nim = '$nim'
								");
	}//							
		
	
	public function updateProdukFoto($kode, $nama_produk, $deskripsi,$readmore, $foto, $kategori){
		$query = $this->db->query("UPDATE post 
									SET judul = '$nama_produk', 
									full_post = '$deskripsi', 
									readmore = '$readmore',
									id_kategori = '$kategori', 
									gambar = '$foto',
									created_at = NOW()
									WHERE id = '$kode'
								");
	}

	public function updateAnggotaFoto($kode, $nama, $angkatan,$jabatan,$foto,$nim){
		$query = $this->db->query("UPDATE anggota
									SET nim = '$kode', 
									nama = '$nama', 
									angkatan = '$angkatan',
									id_jabatan = '$jabatan',
									foto = '$foto' 
									WHERE nim = '$nim'
								");
	}//	
	
	public function hapus_produk($id){
		$this->db->query("DELETE FROM post WHERE id = '$id' ");
	}

	public function hapus_anggota($nim){
		$this->db->query("DELETE FROM anggota WHERE nim = '$nim' ");
	}
	//END QUERY PRODUK
	
	//QUERY KATEGORI PRODUK
	public function getAllKategoriProduk(){
		$query = $this->db->query("SELECT * FROM kategori_produk ORDER BY created_at DESC");
		return $query;
	}

	public function getAllJabatan(){
		$query = $this->db->query("SELECT * FROM jabatan ORDER BY id_jabatan ASC");
		return $query;
	}
	
	public function inputKategoriProduk($kategori_produk){
		$this->db->query("INSERT INTO kategori_produk VALUES('', '$kategori_produk', NOW())");
	}

	public function inputJabatan($jabatan){
		$this->db->query("INSERT INTO jabatan VALUES('', '$jabatan')");
	}

	public function kirim($balas){
		$this->db->query("INSERT INTO chat (user,pesan) VALUES ('Answer-Admin','$balas')");
	}

	public function block($id_chat){
		$this->db->query("UPDATE chat SET status = '0' WHERE id_chat = '$id_chat'");
	}

	public function block_comment($id){
		$this->db->query("UPDATE komen SET status = '0' WHERE id = '$id'");
	}
	public function getEditKategoriProduk($id){
		$query = $this->db->query("SELECT * FROM kategori_produk WHERE id = '$id'");
		return $query;
	}
	
	public function updateKategoriProduk($id, $nama_kategori){
		$query = $this->db->query("UPDATE kategori_produk 
									SET nama_kategori = '$nama_kategori',
									created_at = NOW()
									WHERE id = '$id'
									
								");
	}
	
	public function getProdukByIdKategori($id){
		$query = $this->db->query("SELECT * FROM post WHERE id_kategori = '$id'");
		return $query;
	}
	public function hapusKategori($id){
		$query = $this->db->query("DELETE FROM kategori_produk WHERE id = '$id'");
	}
	//END QUERY KATEGORI PRODUK
	
	//QUERY BANNER
	public function getAllBanner(){
		$query = $this->db->query("SELECT * FROM banner ORDER BY created_at DESC");
		return $query;
	}
	
	public function inputBanner($foto){
		$this->db->query("INSERT INTO banner VALUES('', '$foto', '0', NOW() )");
	}
	
	public function hapusbanner($id){
		$this->db->query("DELETE FROM banner WHERE id = '$id'");
	}
	
	public function getBannerById($id){
		$query = $this->db->query("SELECT * FROM banner WHERE id = '$id'");
		return $query;
	}
	
	public function	updateStatusBanner($id, $status){
		$query = $this->db->query("UPDATE banner 
									SET status = '$status',
									created_at = NOW()
									WHERE id = '$id'
								");
	}
	//END QUERY BANNER

	//QUERY PROFIL	
	public function getProfilByCategory($kategori){
		$query = $this->db->query("SELECT * FROM profil WHERE kategori_profil = '$kategori' ");
		return $query;
	}

	public function getAllProfilCategori(){
		$query = $this->db->query("SELECT * FROM profil ORDER BY id ASC");
		return $query;
	}
	
	public function updateProfil($id, $kategori, $deskripsi){
		$query = $this->db->query("
								UPDATE profil SET deskripsi = '$deskripsi'
								WHERE id = '$id'
								AND kategori_profil = '$kategori'
								");
	}
	//END QUERY PROFIL
	
	//QUERY CONTACT US
	public function getAllContactUs($offset, $limit){
		$query = $this->db->query("SELECT * FROM contact_us ORDER BY created_at DESC LIMIT $offset, $limit");
		return $query;
	}
	public function getAllContactUs_count(){
		$query = $this->db->query("SELECT * FROM contact_us");
		return $query;
	}
	
	public function hapus_contact($id){
		$this->db->query("DELETE FROM contact_us WHERE id = '$id' ");
	}
	
	public function hapus_contact_all($id){
		$this->db->query("DELETE FROM contact_us");
	}
	//END QUERY CONTACT US
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}