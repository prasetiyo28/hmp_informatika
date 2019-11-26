<div class="container">
		<div class="row">
			<div class="span12">
				<h1>Edit Anggota</h1><br />
				<div class="row">
				<!--sidebar menu -->
					<?php echo $this->load->view('template/admin/sidebar'); ?>
					<!--end sidebar menu -->	
					<!-- form, content, etc -->
					<div class="span9">
						<div class=""><!-- basic tabs menu -->
							<ul class="nav nav-tabs">
								<li ><a href="<?php echo base_url(); ?>administrator/anggota/">Daftar Anggota</a></li>
								<li><a href="<?php echo base_url(); ?>administrator/tambah_anggota/">Tambah Anggota</a></li>
								<li><a href="<?php echo base_url(); ?>administrator/jabatan/">Jabatan</a></li>
								<li class="active"><a href="<?php echo base_url(); ?>administrator/edit_anggota/<?php echo $edit_anggota->nim; ?>">Edit Anggota</a></li>
							</ul>
						</div><!-- basic tabs menu -->
						
						<div class="well"><!-- div well & form -->
							<form class="form-horizontal" action="<?php echo base_url(); ?>administrator/submit_edit_anggota" method="POST" enctype="multipart/form-data">
							<fieldset>
							<?php if(form_error('nim') == FALSE){ ?>
									<div class="control-group"><!-- default input text -->
							<?php }else{ ?>
									<div class="control-group warning"><!-- warning -->
							<?php } ?>
								<label class="control-label" for="input01">NIM</label>
								<div class="controls">
								<input placeholder="NIM..." name="nim" type="text" class="input" id="input01" value="<?php echo $edit_anggota->nim; ?>">
								<input name="nim2" class="hidden"  value="<?php echo $edit_anggota->nim; ?>">
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
								<input placeholder="Nama" name="nama" type="text" class="input" id="input02" value="<?php echo $edit_anggota->nama; ?>">										<span class="help-inline"><?php echo form_error('nama'); ?></span>
									</div>
								</div><!-- default input text -->
								<?php if(form_error('angkatan') == FALSE) { ?>
								<div class="control-group"><!-- default input text -->
							<?php }else{ ?>
								<div class="control-group warning"><!-- warning -->
							<?php } ?>
									<label class="control-label" for="input03">angkatan</label>
									<div class="controls">
								<input placeholder="Angkatan Tahun..." name="angkatan" type="text" class="input" id="input03" value="<?php echo $edit_anggota->angkatan; ?>">										<span class="help-inline"><?php echo form_error('angkatan'); ?></span>
									</div>
								</div><!-- default input text -->
								<div class="control-group"><!-- select option -->
									<label class="control-label" for="select01">Jabatan</label>
									<div class="controls">
									  <select name="id_jabatan" id="select01">
										<option value="<?php echo $edit_anggota->id_jabatan; ?>"><?php echo $edit_anggota->jabatan; ?>.</option>
										<?php foreach($jabatan->result() as $row){ ?>
										<option value="<?php echo $row->id_jabatan; ?>"<?php echo set_select('id_jabatan', $row->id_jabatan, (!empty($data) && $data == $row->id_jabatan ? TRUE : FALSE )) ?>><?php echo ucwords($row->jabatan); ?></option>
										<?php } ?>
									  </select>
									 <span class="help-inline"><?php echo form_error('id_jabatan'); ?></span>	
									</div>
								</div><!-- select option -->
								<div class="control-group"><!-- default input text -->
									<label class="control-label" for="foto_sebelumnya">Foto Sebelumnya</label>
									<div class="controls">
										<input type="image" style="width: 440px;" src="<?php echo base_url(); ?>upload/anggota/<?php echo $edit_anggota->foto; ?>" alt="">
									</div>
								</div>
								<div class="control-group"><!-- default input text -->
									<label class="control-label" for="input01">Foto Anggota</label>
									<div class="controls">
									<div class="alert alert-info">  
										<a class="close" data-dismiss="alert">x</a>  
										<strong>Info! </strong><br/>
										Gambar optimal pada resolusi 800x400 px<br/>
										Ukuran Maksimum file 1 MB, (disarankan ukuran dibawah 100kb)<br/>
										File yang diizinkan untuk upload .jpg, .jpeg, .png, .gif
									</div>
										<input type="file" class="input" id="input01" name="foto">
										(Kosongkan jika tidak ingin mengganti gambar.)
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