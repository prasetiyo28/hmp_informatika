<div class="container">
		<div class="row">
			<div class="span12">
				<h1>Tambah Anggota</h1><br />
				<div class="row">
				<!--sidebar menu -->
					<?php echo $this->load->view('template/admin/sidebar'); ?>
					<!--end sidebar menu -->	
					<!-- form, content, etc -->
					<div class="span9">
						<div class=""><!-- basic tabs menu -->
							<ul class="nav nav-tabs">
								<li ><a href="<?php echo base_url(); ?>administrator/dokumen/">Dokumen</a></li>
								<li class="active"><a href="<?php echo base_url(); ?>administrator/tambah_dokumen">Tambah Dokumen</a></li>
							</ul>
						</div><!-- basic tabs menu -->
						
						<div class="well"><!-- div well & form -->
							<form class="form-horizontal" action="<?php echo base_url(); ?>administrator/submit_tambah_dokumen" method="POST" enctype="multipart/form-data">
							<fieldset>
							
							<?php if(form_error('nama') == FALSE){ ?>
									<div class="control-group"><!-- default input text -->
							<?php }else{ ?>
									<div class="control-group warning"><!-- warning -->
							<?php } ?>
								<label class="control-label" for="input01">Nama Dokumen</label>
								<div class="controls">
								<input placeholder="Inputkan Nama Dokumen..." name="nama" type="text" class="input" id="input01" value="<?php echo set_value('nama'); ?>">
								<span class="help-inline"><?php echo form_error('nama'); ?></span>
								</div>
								</div><!-- default input text -->

							<?php if(form_error('nomor') == FALSE) { ?>
								<div class="control-group"><!-- default input text -->
							<?php }else{ ?>
								<div class="control-group warning"><!-- warning -->
							<?php } ?>
									<label class="control-label" for="input02">Nomor Dokumen</label>
									<div class="controls">
										<input placeholder="Inputkan Nomor Dokumen..." name="nomor" type="text" class="input" id="input02" value="<?php echo set_value('nomor'); ?>">
										<span class="help-inline"><?php echo form_error('nomor'); ?></span>
									</div>

									<?php if(form_error('link') == FALSE) { ?>
										<div class="control-group"><!-- default input text -->
									<?php }else{ ?>
										<div class="control-group warning"><!-- warning -->
									<?php } ?>
									</div><!-- default input text -->
										<label class="control-label" for="input05">Link Dokumen</label>
										<div class="controls">
											<input placeholder="Inputkan Link Dokumen..." name="link" type="text" class="input" id="input05" value="<?php echo set_value('link'); ?>">
											<span class="help-inline"><?php echo form_error('link'); ?></span>
									</div>




							</fieldset>
								<div class="form-actions"><!-- button action -->
									<button type="submit" class="btn btn-primary">Simpan</button>
									<button class="btn">Batal</button>
								</div>
							</form>
						</div><!-- div without well class & form -->
						
					</div>
					<!-- form, content, etc -->
				</div>
			</div>
		</div>