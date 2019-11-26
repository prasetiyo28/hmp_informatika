<div class="container">
		<div class="row">
			<div class="span12">
				<h1>Balas Chat</h1><br />
				<div class="row">
				<!--sidebar menu -->
					<?php echo $this->load->view('template/admin/sidebar'); ?>
					<!--end sidebar menu -->	
					<!-- form, content, etc -->
					<div class="span9">
						<div class=""><!-- basic tabs menu -->
							<ul class="nav nav-tabs">
								<li ><a href="<?php echo base_url(); ?>administrator/chat/">Chat</a></li>
								<li class="active"><a href="<?php echo base_url(); ?>administrator/balas_chat/<?php echo $balas_chat->id_chat; ?>">Balas Chat</a></li>
							</ul>
						</div><!-- basic tabs menu -->
						
						<div class="well"><!-- div well & form -->
							<form class="form-horizontal" action="<?php echo base_url(); ?>administrator/kirim_chat" method="POST" enctype="multipart/form-data">
							<fieldset>
								<label class="control-label" for="input01">CHAT</label>
								<div class="controls">
								<input name="pesan" readonly="readonly"  value="<?php echo $balas_chat->pesan; ?>">
								<input name="nama" class="hidden"  value="<?php echo $balas_chat->user; ?>">
								</div>
								</div><!-- default input text -->
							
									<label class="control-label" for="input02">Balasan Chat</label>
									<div class="controls">
								<input placeholder="Balasan Chat" name="balasan_chat" type="text" class="input" id="input02">
									</div>
								
							</fieldset>
								<div class="form-actions"><!-- button action -->
									<button type="submit" class="btn btn-primary">Kirim</button>
									<button class="btn">Batal</button>
								</div>
							</form>
						</div><!-- div without well class & form -->
						
					</div>
					<!-- form, content, etc -->
				</div>
			</div>
		</div>