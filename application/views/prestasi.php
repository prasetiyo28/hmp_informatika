
                    

    
    
    <div class="services">
        <div class="container">
            <h3>Prestasi</h3>
            <hr>
            <div class="panel panel-default">
              <!-- Default panel contents -->
              <div class="panel-heading">Prestasi Informatika</div>
              <!-- Table -->
              <table class="table table-striped table-bordered"><!-- table default style -->
                                <thead>
                                    <th>No</th>
                                    <th>Tahun</th>
                                    <th>Nama Tim</th>
                                    <th>Perlombaan</th>
                                    <th>Penyelenggara</th>
                                    <th>Juara</th>
                                </thead>
                                <?php $no=1; 
                                    foreach($table->result() as $row){ 
                                ?>
                                <tr>
                                
                                    <td><?php echo $no++;?></td>
                                    <td><?php echo $row->tahun;?></td>
                                    <td><?php echo $row->namatim;?></td>
                                    <td><?php echo $row->perlombaan;?></td>
                                    <td><?php echo $row->penyelenggara;?></td>
                                    <td><?php echo $row->juara;?></td>
                                </tr>
                                <?php } ?>
                            
                            </table><!-- table default style -->
            </div>
        </div>
        <div style="height:160px;">&nbsp;</div>
    </div>  
    
    