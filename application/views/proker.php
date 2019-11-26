	<div class="services">
		<div class="container">
			<h3>Program Kerja Himaprodi Teknik Informatika Tahun <?php $tanggal=getdate(); echo $tanggal['year'];  ?></h3>
			<hr>
			<div class="col-md-6">
				<img src="<?php echo base_url();?>/assets/images/slider/proker.jpg" class="img-responsive">
				<p style="font-size: 18px;">Berikut Adalah Program Kerja Himpunan Mahasiswa Prodi Informatika Pada tahun <?php echo $tanggal['year']; ?></p>
			</div>
			   
			<div class="col-md-6">
				<div class="media">
					<ul>
					<?php foreach ($proker->result() as $row) {
            ?>	
						<li>
							<div class="media-left">
								<i class="glyphicon glyphicon-play" style="font-size:20px;" aria-hidden="true"></i>						
							</div>
							<div class="media-body">
								
								<h4 class="media-heading"><?php echo $row->nama_proker;?></h4>
							</div>
						</li>
					<?php } ?>	
					</ul>
				</div>
			</div>
		</div>
	</div>	
	
	