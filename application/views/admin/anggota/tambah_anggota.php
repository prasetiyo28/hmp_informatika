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
								<li ><a href="<?php echo base_url(); ?>administrator/anggota/">Daftar Anggota</a></li>
								<li class="active"><a href="<?php echo base_url(); ?>administrator/tambah_anggota/">Tambah Anggota</a></li>
								<li><a href="<?php echo base_url(); ?>administrator/jabatan/">Jabatan</a></li>
							</ul>
						</div><!-- basic tabs menu -->
						
						<div class="well"><!-- div well & form -->
							<form class="form-horizontal" action="<?php echo base_url(); ?>administrator/submit_tambah_anggota" method="POST" enctype="multipart/form-data">
							<fieldset>
							<?php if(form_error('nim') == FALSE){ ?>
									<div class="control-group"><!-- default input text -->
							<?php }else{ ?>
									<div class="control-group warning"><!-- warning -->
							<?php } ?>
								<label class="control-label" for="input01">NIM</label>
								<div class="controls">
								<input placeholder="Inputkan NIM.." name="nim" type="text" class="input" id="input01" value="<?php echo set_value('nim'); ?>">
								<span class="help-inline"><?php echo form_error('nim'); ?></span>
								</div>
								</div><!-- default input text -->
							<?php if(form_error('nama') == FALSE) { ?>
								<div class="control-group"><!-- default input text -->
							<?php }else{ ?>
								<div class="control-group warning"><!-- warning -->
							<?php } ?>
									<label class="control-label" for="input02">Nama</label>
									<div class="controls">
										<input placeholder="Inputkan Nama.." name="nama" type="text" class="input" id="input02" value="<?php echo set_value('nama'); ?>">
		

										<span class="help-inline"><?php echo form_error('nama'); ?></span>
									</div>
								</div><!-- default input text -->
								<div class="control-group"><!-- select option -->
									<label class="control-label" for="select01">Jabatan</label>
									<div class="controls">
									  <select name="id_jabatan" id="select01">
										<option value="">Pilih...</option>
										<?php foreach($jabatan->result() as $row){ ?>
										<option value="<?php echo $row->id_jabatan; ?>"<?php echo set_select('id_jabatan', $row->id_jabatan, (!empty($data) && $data == $row->id ? TRUE : FALSE )) ?>><?php echo ucwords($row->jabatan); ?></option>
										<?php } ?>
									  </select>
									 <span class="help-inline"><?php echo form_error('id_jabatan'); ?></span>	
									</div>
								</div><!-- select option -->
								<?php if(form_error('jabatan') == FALSE) { ?>
								<div class="control-group"><!-- default input text -->
							<?php }else{ ?>
								<div class="control-group warning"><!-- warning -->
							<?php } ?>
									<label class="control-label" for="input05">Tahun Angkatan</label>
									<div class="controls">
										<input placeholder="Inputkan Tahun Angkatan" name="angkatan" type="text" class="input" id="input05" value="<?php echo set_value('angkatan'); ?>">
		

										<span class="help-inline"><?php echo form_error('nama'); ?></span>
									</div>
								</div><!-- default input text -->
								<div class="control-group"><!-- default input text -->
									<label class="control-label" for="input01">Foto</label>
									<div class="controls">
									<div class="alert alert-info">  
										<a class="close" data-dismiss="alert">x</a>  
										<strong>Info! </strong><br/>
										Gambar optimal pada resolusi 800x400 px<br/>
										Ukuran Maksimum file 1 MB, (disarankan ukuran dibawah 100kb)<br/>
										File yang diizinkan untuk upload .jpg, .jpeg, .png, .gif
									</div>
										<input type="file" class="input" id="input01" name="foto">
										 <span class="help-inline"><?php echo $error; ?></span>
									</div>
								</div><!-- default input text -->
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