<section id="blog" class="container">
        <div class="blog">
            <div class="row">
                 <div class="col-md-8">

                 <?php foreach ($table->result() as $row) {
            ?>
                    <div class="blog-item">
                        <div class="row">
                            <div class="col-xs-12 col-sm-2">
                                <div class="entry-meta">
                                    <span id="publish_date"><?php echo $row->tanggal ?></span>
                                    <span><a href="#"><?php echo $row->nama_kategori ?></a></span>
                                </div>
                            </div>
                                
                            <div class="col-xs-12 col-sm-10 blog-content">
                                <a href="#"><img class="img-responsive img-blog" style="height: 300px; width: 800px;" src="<?php echo base_url();?>upload/produk/<?php echo $row->gambar; ?>" alt="" /></a>
                                <h4><?php echo $row->judul; ?></h4>
                                <p><?php echo $row->readmore; ?></p>
                                <a class="btn btn-primary readmore" href="<?php echo base_url();?>news/readmore/<?php echo $row->id; ?>">Read More <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>    
                    </div><!--/.blog-item-->
                    <?php } ?>    
        
                        
                    <ul class="pagination pagination-lg">
                        <?php echo $this->pagination->create_links(); ?>
                    </ul><!--/.pagination-->
                </div><!--/.col-md-8-->

                <aside class="col-md-4">
                   
                     

                    <div class="widget categories">
                        <h3>Categories</h3>
                         
                        <div class="row">
                            <div class="col-sm-6">
                                <ul class="blog_category">
                                
                                <?php foreach ($kategori->result() as $Kategori) {
            ?>
                                    <li><a href="<?php echo base_url();?>news/kategori/<?php echo $Kategori->id;  ?>"><?php echo $Kategori->nama_kategori; ?></a></li>
                    <?php } ?>
            
                                </ul>
                            </div>
                        </div>                     
    				
                    
    			</aside>  
            </div><!--/.row-->
        </div>
    <div style="height: 152px;">&nbsp;</div>

    </section><!--/#blog-->

    