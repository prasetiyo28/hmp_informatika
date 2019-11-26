                    <div class="navbar-collapse collapse">                          
                       <div class="menu">
                            <ul class="nav nav-tabs" role="tablist">
                                <?php if($this->uri->segment(1) == "home" || $this->uri->segment(1) == "" ) { ?>
                                        <li class="active"><a href="<?php echo base_url();?>" >home</a></li>
                                                                        
                                        <?php }else{ ?>
                                        <li><a href="<?php echo base_url();?>" >home</a></li>
                                        <?php } ?>

                                
                                <?php if($this->uri->segment(1) == "prestasi" || $this->uri->segment(1) == "sejarah" || $this->uri->segment(1) == "anggota" || $this->uri->segment(1) == "proker" || $this->uri->segment(1) == "visimisi" || $this->uri->segment(1) == "tentang" || $this->uri->segment(1) == "contact" ) { ?>
                                        <li class="dropdown active">                                        
                                        <?php }else{ ?>
                                        <li class="dropdown">
                                        <?php } ?>
                                
                                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Profil HMP TI <span class="caret"></span></a>
                                      <ul class="dropdown-menu">
                                      
                                        <?php if($this->uri->segment(1) == "sejarah" ) { ?>
                                        <li class="active"><a href="<?php echo base_url();?>sejarah">Sejarah</a></li>
                                        <?php }else{ ?>
                                        <li><a href="<?php echo base_url();?>sejarah">Sejarah</a></li>
                                        <?php } ?>
                                        
                                        <?php if($this->uri->segment(1) == "tentang" ) { ?>
                                        <li class="active"><a href="<?php echo base_url();?>tentang">Arti Logo</a></li>
                                        <?php }else{ ?>
                                        <li><a href="<?php echo base_url();?>tentang">Arti Logo</a></li>
                                        <?php } ?>

                                        <?php if($this->uri->segment(1) == "visimisi" ) { ?>
                                        <li class="active"><a href="<?php echo base_url();?>visimisi">Visi&Misi</a></li>
                                        <?php }else{ ?>
                                        <li><a href="<?php echo base_url();?>visimisi">Visi&Misi</a></li>
                                        <?php } ?>

                                        <?php if($this->uri->segment(1) == "anggota" ) { ?>
                                        <li class="active"><a href="<?php echo base_url();?>anggota">Struktur Organisasi</a></li>
                                        <?php }else{ ?>
                                        <li><a href="<?php echo base_url();?>anggota">Struktur Organisasi</a></li>
                                        <?php } ?>

                                        <?php if($this->uri->segment(1) == "proker" ) { ?>
                                        <li class="active"><a href="<?php echo base_url();?>proker">Program Kerja</a></li>
                                        <?php }else{ ?>
                                        <li><a href="<?php echo base_url();?>proker">Program Kerja</a></li>
                                        <?php } ?>                

                                        <?php if($this->uri->segment(1) == "prestasi" ) { ?>
                                        <li class="active"><a href="<?php echo base_url();?>prestasi">Prestasi</a></li>                                        
                                        <?php }else{ ?>
                                        <li><a href="<?php echo base_url();?>prestasi">Prestasi</a></li>
                                        <?php } ?>

                                        <?php if($this->uri->segment(1) == "contact" ) { ?>
                                        <li class="active"><a href="<?php echo base_url();?>contact">contact us</a></li>
                                        <?php }else{ ?>
                                        <li ><a href="<?php echo base_url();?>contact">contact us</a></li>
                                        <?php } ?>
                                        
                                      </ul>
                                    </li> 

                                    <li class="dropdown">
                                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Klub <span class="caret"></span></a>
                                      <ul class="dropdown-menu">
                                        <li><a href="https://www.smit.web.id">SMiT</a></li>
                                      </ul>
                                    </li>

                                        <?php if($this->uri->segment(1) == "news" ) { ?>
                                        <li class="active"><a href="<?php echo base_url();?>news">news</a></li>
                                        <?php }else{ ?>
                                        <li ><a href="<?php echo base_url();?>news">news</a></li>
                                        <?php } ?>

                                        <?php if($this->uri->segment(1) == "dokumen" ) { ?>
                                        <li class="active"><a href="<?php echo base_url();?>dokumen">Dokumen</a></li>
                                        <?php }else{ ?>
                                        <li ><a href="<?php echo base_url();?>dokumen">Dokumen</a></li>
                                        <?php } ?>

                                        <?php if($this->uri->segment(1) == "galeri" ) { ?>
                                        <li class="active"><a href="<?php echo base_url();?>galeri">Galeri</a></li>
                                        <?php }else{ ?>
                                        <li ><a href="<?php echo base_url();?>galeri">galeri</a></li>
                                        <?php } ?>
                            </ul>
                        </div>
                    </div>                      
                </div>
            </div>  
        </nav>      
    </header>