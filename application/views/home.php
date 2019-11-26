
 
					
	
	<section id="main-slider" class="no-margin">
        <div class="carousel slide">      
            <div class="carousel-inner">
                <div class="item active" style="background-image: url(<?php echo base_url();?>assets/images/slider/bg3.jpg)">
                    <div class="container">
                        <div class="row slide-margin">
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <h2 class="animation animated-item-1">Himaprodi <span>Informatika</span></h2>
                                    <p class="animation animated-item-2">Profil Hmp TI</p>
                                    <a class="btn-slide animation animated-item-3" href="<?php echo base_url();?>sejarah">Read More</a>
                                </div>
                            </div>

                            <div class="col-sm-6 hidden-xs animation animated-item-4">
                                
                            </div>

                        </div>
                    </div>
                </div><!--/.item-->             
            </div><!--/.carousel-inner-->
        </div><!--/.carousel-->
    </section><!--/#main-slider-->
    
    <div class="lates">
		<div class="container">
			<div class="text-center">
				<h2>Prestasi Mahasiswa</h2>
			</div>
			<?php foreach ($table->result() as $row) {
			?>
			<div  class="col-md-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
				<a href="<?php echo base_url();?>news/readmore/<?php echo $row->id;?>"><img src="<?php echo base_url(); ?>upload/produk/thumb/<?php echo $row->gambar; ?>" alt="" class="img-responsive" style="height: 250px; width:350px;" /></a>
				<h3 align="center"><a href="<?php echo base_url();?>news/readmore/<?php echo $row->id;?>"><?php echo $row->judul ?></a></h3>
				<p><?php echo $row->readmore ?></p>
				 
			</div>
			
			<?php } ?>
		</div>

		<a href="<?php echo base_url(); ?>news"><h3 align="center">Berita Lainnya</h3></a>
		
	</div>