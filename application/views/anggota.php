	<div class="our-team">
		<h1 align="center">Struktur Organisasi</h1>	

		<div class="container">
			<h3 align="center">Pembina</h3>	

			<div class="text-center">
			<?php foreach ($pembina->result() as $row) {
			?>
				<div class=" wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
					<img src="<?php echo base_url(); ?>upload/anggota/<?php echo $row->foto; ?>" alt="" >
					<h4><?php echo $row->nama; ?></h4>
					<p style="font-size : 14px; font-style:bold;">NIPY/NIDN  :<?php echo $row->nim; ?>
					<br>Jabatan  :<?php echo $row->jabatan; ?>
				</div>		
			<?php }?>		
			</div>
		</div>
	</div>

	<div class="our-team">
		<div class="container">
			<h3 align="center">Ketua Dan Wakil HMP TI</h3>	

			<div class="text-center">
			<?php foreach ($table->result() as $row) {
			?>
				<div class="col-md-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
					<img src="<?php echo base_url(); ?>upload/anggota/<?php echo $row->foto; ?>" style="height:349px; width:256px" alt="" >
					<h4><?php echo $row->nama; ?></h4>
					<p>NIM  :<?php echo $row->nim; ?>
					<br>Jabatan  :<?php echo $row->jabatan; ?>
					<br>Angkatan :<?php echo $row->angkatan; ?></p>
				</div>		
			<?php }?>		
			</div>
		</div>
	</div>

	<div class="our-team">
		<div class="container">
			<h3 align="center">Bendahara , Sekertaris, Humas</h3>	
			<div class="text-center">
			<?php foreach ($ben->result() as $row2) {
			?>
				<div class="col-md-3 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
					<img src="<?php echo base_url(); ?>upload/anggota/<?php echo $row2->foto; ?>" style="height:349px; width:256px" alt=""  >
					<h4><?php echo $row2->nama; ?></h4>
					<p>NIM  :<?php echo $row2->nim; ?>
					<br>Jabatan  :<?php echo $row2->jabatan; ?>
					<br>Angkatan :<?php echo $row2->angkatan; ?></p>
				</div>
			<?php } ?>
			</div>
		</div>
	</div>
	<div class="our-team">
		<div class="container">
			<h3 align="center">Divisi,Koordinator, dan Anggota </h3>	
			<div class="text-center">
			<?php foreach ($table2->result() as $row2) {
			?>
				<div class="col-md-2 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
					<img src="<?php echo base_url(); ?>upload/anggota/<?php echo $row2->foto; ?>" style="height:250px; width:183.38px;" alt=""  >
					<h5><?php echo $row2->nama; ?></h5>
					<p>NIM  :<?php echo $row2->nim; ?>
					<br>Jabatan  :<?php echo $row2->jabatan; ?>
					<br>Angkatan :<?php echo $row2->angkatan; ?></p>
				</div>
			<?php } ?>
			</div>
		</div>
	</div>
	
	
