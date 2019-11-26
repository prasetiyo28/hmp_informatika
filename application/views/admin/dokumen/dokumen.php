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
								<li class="active"><a href="<?php echo base_url(); ?>administrator/dokumen/">Dokumen</a></li>
								<li ><a href="<?php echo base_url(); ?>administrator/tambah_dokumen/">tambah Dokumen</a></li>
							</ul>
						</div><!-- basic tabs menu -->
						<h5>Daftar Dokumen, diurutkan berdasarkan data dimutahirkan.</h5><br />
						<h5>Dokumen Saat ini berjumlah sebanyak: <?php echo $count; ?> record(s).</h5><br />
							<table class="table table-striped table-bordered"><!-- table default style -->
								<thead>
                                    <th>No</th>
                                    <th>Nama Dokumen</th>
                                    <th>Nomor Dokumen</th>
                                    <th>Link</th>
                                </thead>
                                <tr>
                                <?php $no=1; 
                                    foreach($dokumen->result() as $row){ 
                                ?>
                                    <td><?php echo $no++;?></td>
                                    <td><?php echo $row->nama_dokumen;?></td>
                                    <td><?php echo $row->nomor_dokumen;?></td>
                               		<td><a href="<?php echo $row->link;?>">Lihat</a></td>
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