<div class="container">
		<div class="row">
			<div class="span12">
				<h1>Chat</h1><br />
				<div class="row">
					<!--sidebar menu -->
					<?php echo $this->load->view('template/admin/sidebar'); ?>
					<!--end sidebar menu -->
					<!-- table, content, etc -->
					<div class="span9">
						<div class=""><!-- basic tabs menu -->
						<?php if($this->session->flashdata('info')) { ?>
							<div class="alert alert-info">  
									<a class="close" data-dismiss="alert">x</a>  
									<strong>Info! </strong><?php echo $this->session->flashdata('info'); ?>  
							</div>
						<?php } ?>
							<ul class="nav nav-tabs">
								<li class="active"><a href="<?php echo base_url(); ?>administrator/prestasi/">prestasi</a></li>
								<li ><a href="<?php echo base_url(); ?>administrator/tambah_prestasi/">tambah prestasi</a></li>
							</ul>
						</div><!-- basic tabs menu -->
						<h5>Daftar Chat, diurutkan berdasarkan data dimutahirkan.</h5><br />
						<h5>Chat Saat ini berjumlah sebanyak: <?php echo $count; ?> record(s).</h5><br />
							<table class="table table-striped table-bordered"><!-- table default style -->
								<thead>
                                    <th>No</th>
                                    <th>Tahun</th>
                                    <th>Nama Tim</th>
                                    <th>Perlombaan</th>
                                    <th>Penyelenggara</th>
                                    <th>Juara</th>
                                    <th>Aksi</th>
                                </thead>
                                <tr>
                                <?php $no=1; 
                                    foreach($prestasi->result() as $row){ 
                                ?>
                                    <td><?php echo $no++;?></td>
                                    <td><?php echo $row->tahun;?></td>
                                    <td><?php echo $row->namatim;?></td>
                                    <td><?php echo $row->perlombaan;?></td>
                                    <td><?php echo $row->penyelenggara;?></td>
                                    <td><?php echo $row->juara;?></td>
							
										<td border="0">
										<a title="Edit Produk Produk" href="<?php echo base_url(); ?>administrator/edit_anggota/<?php echo $row->id; ?>">
											<i class="icon-edit"></i> Edit
										</a> <br> <a href="#" onClick="if(confirm('Anda yakin HAPUS data ini? ')){document.location='<?php echo base_url()?>administrator/hapus_anggota/<?php echo $row->id; ?>'}" title="Hapus Produk" >
											<i class="icon-trash"></i> Hapus
										</a>
									</td>
								</tr>
							<?php 
								
								} 
							?>
							</table><!-- table default style -->
							<div class="pagination">
								<ul>
									<?php echo $this->pagination->create_links(); ?>
								</ul>
							</div>
					</div>
					<!-- table, content, etc -->
				</div>
				<div class="row">
				</div>
			</div>
		</div>