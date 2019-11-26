<!-- sidebar menu -->
					<div class="span2">
						<ul class="nav nav-list"><!-- menu with icon -->
							<li class="nav-header">
								Menu Admin Himaprodi Informatika
							</li>
							<?php if($this->uri->segment(2) == "produk" || $this->uri->segment(2) == "tambah_produk" || $this->uri->segment(2) == "submit_tambah_produk" || $this->uri->segment(2) == "edit_produk" || $this->uri->segment(2) == "kategori_produk" || $this->uri->segment(2) == "submit_edit_produk" || $this->uri->segment(2) == "edit_kategori_produk" || $this->uri->segment(2) == "submit_edit_kategori_produk" || $this->uri->segment(2) == "submit_tambah_kategori" ) { ?>
							<li class="active">
							<?php }else{ ?>
							<li >
							<?php } ?>
								<a href="<?php echo base_url(); ?>administrator/produk">
									<i class="icon-list-alt"></i> Post
								</a>
							</li
							<?php if($this->uri->segment(2) == "anggota" || $this->uri->segment(2) == "tambah_anggota" || $this->uri->segment(2) == "submit_tambah_anggota" || $this->uri->segment(2) == "edit_anggota" || $this->uri->segment(2) == "jabatan" || $this->uri->segment(2) == "submit_edit_anggota" || $this->uri->segment(2) == "edit_jabatan" || $this->uri->segment(2) == "submit_edit_jabatan" || $this->uri->segment(2) == "submit_tambah_jabatan" ) { ?>
							<li class="active">
							<?php }else{ ?>
							<li >
							<?php } ?>
								
								<a href="<?php echo base_url(); ?>administrator/anggota/">
									<i class="icon-user"></i> Anggota
								</a>
							</li>
						
							</li>
							</li>

							<?php if($this->uri->segment(2) == "prestasi" || $this->uri->segment(2) == "tambah_prestasi") {?>
								<li class="active">
							<?php }else{ ?>
								<li >
							<?php } ?>
								<a href="<?php echo base_url(); ?>administrator/prestasi/">
									<i class="icon-star"></i> Prestasi
								</a>
							</li>

							<?php if($this->uri->segment(2) == "dokumen") {?>
								<li class="active">
							<?php }else{ ?>
								<li >
							<?php } ?>
								<a href="<?php echo base_url(); ?>administrator/dokumen/">
									<i class="icon-envelope"></i> Dokumen
								</a>
							</li>

							<?php if($this->uri->segment(2) == "comment") {?>
								<li class="active">
							<?php }else{ ?>
								<li >
							<?php } ?>
								<a href="<?php echo base_url(); ?>administrator/comment/">
									<i class="icon-tag"></i> Comment
								</a>
							</li>

							<?php if($this->uri->segment(2) == "chat") {?>
								<li class="active">
							<?php }else{ ?>
								<li >
							<?php } ?>
								<a href="<?php echo base_url(); ?>administrator/chat/">
									<i class="icon-comment"></i> Chat
								</a>
							</li>
							
						</ul><!-- end menu with icon -->
						<hr />
					</div>
					<!-- sidebar menu -->