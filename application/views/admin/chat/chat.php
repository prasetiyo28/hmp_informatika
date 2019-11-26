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
								<li class="active"><a href="<?php echo base_url(); ?>administrator/chat/">Chat</a></li>
							</ul>
						</div><!-- basic tabs menu -->
						<h5>Daftar Chat, diurutkan berdasarkan data dimutahirkan.</h5><br />
						<h5>Chat Saat ini berjumlah sebanyak: <?php echo $count; ?> record(s).</h5><br />
							<table class="table table-striped table-bordered"><!-- table default style -->
								<thead>
									<th>No</th>
									<th>id chat</th>
									<th>Nama</th>
									<th>Isi Chat</th>
									<th>Waktu</th>
									<th colspan="2">Aksi</th>
								</thead>
								<tr>
								<?php $no=1; 
									foreach($chat->result() as $row){ 
								?>
									<td><?php echo $this->session->userdata('row')+$no; ?></td>
									<td><?php echo ucwords($row->id_chat); ?></td>
									<td>
										
										<?php echo $row->user; ?>
										
									</td>
									<td><?php echo $row->pesan; ?></td>
									<td><?php echo $row->waktu; ?></td>
							
									<td border="0">
										<a title="Edit Produk Produk" href="<?php echo base_url(); ?>administrator/balas_chat/<?php echo $row->id_chat; ?>">
											<i class="icon-edit"></i> Balas
										</a> | <a href="#" onClick="if(confirm('Anda yakin BLOCK chat ini? ')){document.location='<?php echo base_url()?>administrator/block_chat/<?php echo $row->id_chat; ?>'}" title="Block Chat" >
											<i class="icon-trash"></i> Block
										</a>
									</td>
								</tr>
							<?php 
								$no++;
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