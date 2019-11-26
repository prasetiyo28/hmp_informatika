	
	
	<div class="services">
		<div class="container">
			<h3>Dokumen HMP TI</h3>
			<hr>
			   
			<div>
				<div class="media">
					<ul>
					<?php foreach ($dokumen->result() as $row) {
            ?>	
						<li>
							<div class="media-left">
								<i class="glyphicon glyphicon-play" style="font-size:20px;" aria-hidden="true"></i>						
							</div>
							<div class="media-body">
								
								<h4 class="media-heading" a href="<?php echo $row->link; ?>"><?php echo $row->nama_dokumen;?></h4>
								<h5 class="media-heading"  ><?php echo $row->nomor_dokumen;?></h5>
								<p><a href="<?php echo $row->link; ?>">Lihat</a></p>
							</div>
						</li>
					<?php } ?>	
					</ul>
				</div>
			</div>
		</div>
		<div style="height:115px;"></div>
	</div>	
	
	