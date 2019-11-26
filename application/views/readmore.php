
<section id="blog" class="container">
        <div class="blog">
        <?php foreach ($table->result() as $row) {
            ?>
            <input type="id_post" name="id_post" class="hidden" value="<?php echo $row->id ?>">
        <h1 align="center">"<?php echo $row->judul; ?>"</h1> <br>

            <div class="row">
                 <div class="col-md-8">
                 
                    <div class="blog-item">
                        <div class="row">
                            <div class="col-xs-12 col-sm-2">
                                <div class="entry-meta">
                                    <span id="publish_date"><?php echo $row->tanggal ?></span>
                                    <span><a href="#"><?php echo $row->nama_kategori ?></a></span>
                                </div>
                            </div>
                                
                            <div class="col-xs-12 col-sm-10 blog-content">
                                <a href="#"><img class="img-responsive img-blog" style=" width: 800px;" src="<?php echo base_url();?>upload/produk/<?php echo $row->gambar; ?>" alt="" /></a>
                                <p><?php echo $row->full_post; ?></p>
                            </div>
                        </div>    
                    </div><!--/.blog-item-->
                    <?php } ?>    

                    <div class="list-group">
                    <h3>Komentar</h3>
                     <?php foreach ($komen->result() as $komen) {
                        ?>
                      <a href="#" class="list-group-item disabled">
                        <?php echo $komen->nama ?> (<?php echo $komen->waktu ?>)
                      </a>
                      <a href="#" class="list-group-item">"<?php echo $komen->komen ?>"</a>
                    <div style="height:5px;">&nbsp;</div>

                      <?php }
                        ?>
                    </div>
        
                        
    
    
          
                </div><!--/.col-md-8-->

                <aside class="col-md-4">
                  
                     

            <div class="widget categories">
                    <div class="widget archieve">
                        <h3>Related Post</h3>
                        <div class="row">
                            <div class="col-sm-12">
                                <ul class="blog_archieve">
                                <?php foreach ($related->result() as $relateds) { ?>
                                    <li><a href="<?php echo base_url();?>news/readmore/<?php echo $relateds->id; ?>"><i class="fa fa-angle-double-right"></i> <?php echo $relateds->judul; ?>  </a></li>
                                <? } ?>
                                </ul>
                            </div>
                        </div>                     
                    </div><!--/.archieve-->

             </div>   
    				
    </section><!--/#blog-->
          
        </div><!--/.container-->
    
    <section id="blog">


        <div class="container">
            <div class="center">        
                <h2>Komentar anda</h2>
            </div> 

            <div class="row contact-wrap"> 


                <div class="status alert alert-success" style="display: none"></div>
                <form id="main-contact-form" class="contact-form" name="contact-form" method="post" action="<?php echo base_url();?>komentar">
                    <div class="col-sm-5 col-sm-offset-1">
                    <?php foreach ($table->result() as $row) {
            ?>
                    <input type="id_post" name="id_post" class="hidden" value="<?php echo $row->id ?>">
                       <?php }?>
                        <div class="form-group">
                            <label>Nama *</label>
                            <input type="text" name="name" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label>Email *</label>
                            <input type="email" name="email" class="form-control" required="required">
                            <label>Komentar *</label>
                            <textarea name="komen" id="message" required="required" class="form-control" rows="8"></textarea>
                        </div>                        
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-primary btn-lg" required="required">Komentar</button>
                        </div>
                    </div>
                </form> 
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#contact-page-->



