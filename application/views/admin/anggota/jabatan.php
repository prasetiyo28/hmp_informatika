<div class="container">
		<div class="row">
			<div class="span12">
				<h1>Daftar Jabatan</h1><br />
				<div class="row">
					<!--sidebar menu -->
					<?php echo $this->load->view('template/admin/sidebar'); ?>
					<!--end sidebar menu -->
					<!-- table, content, etc -->
					<div class="span9">
						<div class=""><!-- basic tabs menu -->
							<ul class="nav nav-tabs">
								<li ><a href="<?php echo base_url(); ?>administrator/anggota/">Daftar Anggota</a></li>
								<li><a href="<?php echo base_url(); ?>administrator/tambah_anggota/">Tambah Anggota</a></li>
								<li  class="active"><a href="<?php echo base_url(); ?>administrator/jabatan/">Jabatan</a></li>
							</ul>
						</div><!-- basic tabs menu -->
						<h5>Tambahkan Lagi Jabatan</h5>
							<div class="well"><!-- div well & form -->
							<form class="form-horizontal" action="<?php echo base_url(); ?>administrator/submit_tambah_jabatan" method="POST">
							<fieldset>
							<?php if(form_error('jabatan') == FALSE){ ?>
									<div class="control-group"><!-- default input text -->
							<?php }else{ ?>
									<div class="control-group warning"><!-- warning -->
							<?php } ?>
								<label class="control-label" for="input01">Jabatan</label>
								<div class="controls">
								<input placeholder="Ketik Jabatan..." name="jabatan" type="text" class="input" id="input01" value="<?php echo set_value('jabatab'); ?>">
								<span class="help-inline"><?php echo form_error('jabatan'); ?></span>
								</div>
								</div><!-- default input text -->
							</fieldset>
								<div class="form-actions"><!-- button action -->
									<button type="submit" class="btn btn-primary">Tambah</button>
									<button class="btn">Batal</button>
								</div>
							</form>
						</div><!-- div without well class & form -->
							<?php if($this->session->flashdata('info')) { ?>
							<div class="alert alert-info">  
									<a class="close" data-dismiss="alert">x</a>  
									<strong>Info! </strong><?php echo $this->session->flashdata('info'); ?>  
							</div>
						<?php } ?>						
						<h5>Daftar Jabatan.</h5><br />
							<table class="table table-striped table-bordered"><!-- table default style -->
								<thead>
									<th>No</th>
									<th>Jabatan</th>
									
								</thead>
								<tr>
								<?php $no=1; 
									foreach($jabatan->result() as $row){ 
								?>
									<td><?php echo $no; ?></td>
									<td><?php echo ucwords($row->jabatan); ?></td>
									
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
		