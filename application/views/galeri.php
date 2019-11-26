    
    
    <section id="portfolio">
    <h1>Galeri HMP TI</h1>    
        <div class="container">
            <div class="center">
               <p>Galeri HMP TI</p>
            </div>

            <ul class="portfolio-filter text-center">
             <li><a class="btn btn-default active" href="#" data-filter="*">Semua Kategori</a></li>
            <?php foreach ($kategori->result() as $Kategori) {
            ?>
                              
                <li><a class="btn btn-default" href="<?php echo $Kategori->id;?>" data-filter=".<?php echo $Kategori->id;?>"><?php echo $Kategori->nama_kategori;?></a></li>
            <?php } ?>
            </ul><!--/#portfolio-filter-->
        </div>
        <div class="container">
            <div class="">

                <div class="portfolio-items">

            <?php foreach ($table->result() as $row) {
            ?>
                    <div class="portfolio-item <?php echo $row->id_kategori;?> apps col-xs-12 col-sm-3 col-md-2 " >
                        <div class="recent-work-wrap">
                            <img class="img-responsive" style="height:150px;" src="<?php echo base_url();?>upload/produk/<?php echo $row->gambar; ?>" alt="">
                            <div class="overlay">
                                <div class="recent-work-inner">
                                    <p><<?php echo $row->judul;?></p>
                                    <a class="preview" href="<?php echo base_url();?>upload/produk/<?php echo $row->gambar; ?>" rel="prettyPhoto"><i class="fa fa-eye"></i> View</a>
                                </div> 
                            </div>
                        </div>
                    </div><!--/.portfolio-item-->
            
            <?php }
            ?>
                </div>
   
            </div>
        </div>
    </section><!--/#portfolio-item-->

    <div style="height:30px;"></div>