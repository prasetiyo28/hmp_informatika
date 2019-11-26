		<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HMP Informatika</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url();?>/assets/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/animate.css">
	<link href="<?php echo base_url();?>/assets/css/prettyPhoto.css" rel="stylesheet">
	<link href="<?php echo base_url();?>/assets/css/style.css" rel="stylesheet" />	
	<script src="<?=base_url('assets/js/jquery.js');?>"></script> 
		<script>    
		$(document).ready(function(){
		
		function tampildata(){
		   $.ajax({
			type:"POST",
			url:"<?=site_url('C_chat/ambil_pesan');?>",    
			success: function(data){                 
					 $('#isi_chat').html(data);
			}  
		   });
        }
  
  
		 $('#kirim').click(function(){
		   var pesan = $('#pesan').val(); 
		   var user = $('#user').val(); 
		   $.ajax({
			type:"POST",
			url:"<?=site_url('C_chat/kirim_chat');?>",    
			data: 'pesan=' + pesan + '&user=' + user,        
			success: function(data){                 
			  $('#isi_chat').html(data);
			}  
		   });
		  });
		  
		  
		  setInterval(function(){
					 tampildata();},1000);
		});
	</script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
      <header>    
        <nav class="navbar  navbar-fixed-top" role="navigation">
          <div class="navigation">
            <div class="container">         
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse.collapse">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <div class="navbar-brand">
                  <a href="<?php echo base_url();?>home"><h1><span>Infor</span>matika</h1></a>
                </div>
              </div>

	<style>
	  #isi_chat{height:relative;color: #000000;}
	</style>
                    
                    <div class="navbar-collapse collapse">                          
                        <div class="menu">
              <ul class="nav nav-tabs" role="tablist">
                <li role="presentation"><a href="<?php echo base_url();?>home">home</a></li>
                <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Profil HMP TI <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a href="<?php echo base_url();?>sejarah">Sejarah</a></li>
                          <li><a href="<?php echo base_url();?>tentang">Arti Logo</a></li>
                          <li><a href="<?php echo base_url();?>visimisi">Visi&Misi</a></li>
                          <li><a href="<?php echo base_url();?>anggota">Struktur Organisasi</a></li>
                          <li role="presentation"><a href="<?php echo base_url();?>proker">Program Kerja</a></li>
                        <li role="presentation"><a href="<?php echo base_url();?>lokasi">Lokasi</a></li>
                                      </ul>
                                    </li>                               
                                    <li role="presentation"><a href="<?php echo base_url();?>news">News</a></li>
                                    <li role="presentation"><a href="<?php echo base_url();?>dokumen">Document</a></li>
                                    <li role="presentation"><a href="<?php echo base_url();?>galeri">Galery</a></li>
              </ul>
            </div>
                    </div>                      
                </div>
            </div>  
        </nav>      
    </header>
    
    
    <div class="services">
        <div class="container">
            <h1>Tanya Admin HMP Informatika</h1>
            <p>*silahkan gunakan aplikasi ini dengan bijak, Gunakan "Nama-(NIM)" di kolom nama jika chat anda ingin dibalas . ex: Admin (150900xx)</p>
          <div class="col-md-2">
			  <input placeholder="nama (NIM)" type="text" id="user" class="form-control">
		  </div>
		  
		  <div class="col-md-8">
			  <input placeholder="pesan" type="text" id="pesan" class="form-control">
		  </div>
		  <div class="col-md-2">
		  <input type="button" value="kirim" id="kirim" class="btn btn-md btn-warning">
		  </div>
		  <div>&nbsp;</div>   
	<div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Kotak Percakapan</h3>
            </div>
            <div class="panel-body">
             <ul id="isi_chat"> </ul>
             <ul  style="height:36px;">&nbsp;</ul>
            </div>
          </div>
		  
		 
	</div>
	</div>
	</div>
               
            
        
    
    