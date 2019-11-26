<section id="blog" class="container">
         <div class="lates">
        <div class="container">
            <div class="text-center">
                <h2>News</h2>
            </div>
            <?php foreach ($table->result() as $row) {
            ?>
            <div class="col-md-3 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
                <a href="<?php echo base_url();?>news/readmore/<?php echo $row->id;?>"><img src="<?php echo base_url(); ?>upload/produk/thumb/<?php echo $row->gambar; ?>" alt="" class="img-responsive" style="border:2px; height: 150px; width:250px;"/></a>
                <a href="<?php echo base_url();?>news/readmore/<?php echo $row->id;?>"><h5 align="center"><?php echo $row->judul ?></h5></a>
                
            </div>
            
            <?php } ?>
        </div>

        
        
    </div>
    <div style="height:30px"></div>
    </section><!--/#blog-->

    