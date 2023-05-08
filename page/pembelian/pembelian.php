
<?php
include '../../include/koneksi.php';

// QUERY YANG DIBUUTUHKAN
$sql_metode_bayar = "SELECT * FROM tb_metode_bayar ";
$query_metode_bayar = mysqli_query($koneksi, $sql_metode_bayar);
$result_metode_bayar = array();
while ($data_metode_bayar = mysqli_fetch_array($query_metode_bayar)) {
    $result_metode_bayar[] = $data_metode_bayar;
}
$sql_paket = "SELECT * FROM tb_paket ";
$query_paket = mysqli_query($koneksi, $sql_paket);
$result_paket = array();
while ($data_paket = mysqli_fetch_array($query_paket)) {
    $result_paket[] = $data_paket;
}



if ($_SESSION['admin']) { ?>

<!-- TABEL PAKET BELUM DIPASANG -->
<div class="row">
  <div class="col-md-12">
        <!-- Advanced Tables -->
   <div class="box box-primary box-solid">
    <div class="box-header with-border">
              Data Pembelian Baru | Paket Belum Terpasang
    </div>
     <div class="panel-body">
      <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover" id="example1">
            
               <button type="button" class="btn btn-info" style="margin-bottom: 10px;" data-toggle="modal" data-target="#modal-default">
               Tambah
              </button>
             
                <thead>
                <tr>
                  <th>No</th>
                  <th>No Invoice</th>
                  <th>Nama Pembeli</th>
                  <th>Nama Paket</th>
                  <th>Harga Paket</th>
                  <th>Email</th>
                  <th>Alamat</th>
                  <th>Status</th>
                  <th>Ubah</th>
                  <th>Detail</th>
                  <th>Hapus</th>
                </tr>
                </thead>
                <tbody>

                	<?php 

                			$no = 1;

                			$sql = $koneksi->query("select * from tb_pembelian where status_pembelian <> '1' order by status_pembelian desc ");

                			while ($data = $sql->fetch_assoc()) {

                     
                				
                			
                	 ?>

                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $data['invoice'] ?></td>
                  <td><?php echo $data['nama'] ?></td>
                  <td><?php echo $data['nominal_paket'] ?></td>
                  <td><?php echo 'Rp. '.number_format($data['harga_paket'],0,",",".") ?></td>
                  <td><?php echo $data['email'] ?></td>
                  <td><?php echo $data['alamat'] ?></td>
                  <td>
                    <?php if($data['status_pembelian']==1) { ?>
                      <p class="btn btn-success">Paket Sudah Terpasang</p>
                    <?php }elseif($data['status_pembelian']==2) { ?>
                      <p class="btn btn-warning">Pembayaran Sudah Dikirimkan</p>
                    <?php }else { ?>
                      <p class="btn btn-danger">Pembayaran Belum Dikirimkan</p>
                    <?php } ?>
                    
                  </td>
                 
                 

                  <td>
                    <a href="#" type="button" class="btn btn-info" data-toggle="modal" data-target="#mymodal1<?php echo $data['id_pembelian']; ?>"><i class="fa fa-edit"></i></a>
                  </td>
                  <td>
                  <a href="#" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-detail-belum-terpasang<?php echo $data['id_pembelian']; ?>"><i class="fa fa-info"></i></a>
                  </td>
                  <td>
                  <a onclick="return confirm('Apakah Anda Yakin Mengahpus Data Ini')" href="?page=pembelian&aksi=hapus&id=<?php echo $data['id_pembelian'] ;?>" class="btn btn-danger" title=""><i class="fa fa-trash"></i></a>
                  </td>
                  
                </tr>

              <!-- Modal Detail data -->
<div class="modal fade" id="modal-detail-belum-terpasang<?php echo $data['id_pembelian']; ?>">
      <div class="modal-dialog">
        <div class="modal-content">
        <div class="box box-primary box-solid">
          <div class="box-header with-border">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              Detail Data Pembelian
          </div>
          <div class="modal-body">

            <form role="form"  method="POST" enctype="multipart/form-data"> 
            <?php 

              $id_pembelian = $data['id_pembelian'];

              $sql1 = $koneksi->query("select * from tb_pembelian where id_pembelian='$id_pembelian'");

            while ($data1 = $sql1->fetch_assoc()) {

            ?>
            <input type="hidden" name="id_pembelian" value="<?php echo $data1['id_pembelian']; ?>">
            <div class="form-group">
              <label>Nama Pembeli </label>
              <input required="" disabled type="text" name="nama" class="form-control" value="<?php echo $data1['nama']; ?>">      
            </div>

            <div class="form-group">
              <label>Jenis Identitas</label>
              <input name="jenis_id" type="text" disabled class="form-control" value="<?php echo $data1['jenis_id']; ?>" required>
            </div>

          <div class="form-group">
              <label>Nomor Identitas</label>
              <input required="" disabled type="text" name="no_id" value="<?php echo $data1['no_id']; ?>" class="form-control" >      
            </div>

          <div class="form-group">
              <label>Tanggal Lahir</label>
              <input required="" disabled type="text" name="tgl_lahir" value="<?php echo $data1['tgl_lahir']; ?>" class="form-control" >      
          </div>

          <div class="form-group">
              <label>Nama Paket</label>
              <input type="text" disabled value="<?php echo $data1['nominal_paket'];?>" name="nominal_paket" class="form-control" required>   
            </div>

            <div class="form-group">
              <label>Harga Paket</label>
              <input name="harga_paket" type="text" disabled value="<?php echo ($data1['nominal_paket'].' = Rp. '.$data1['harga_paket']) ?>" class="form-control" required>
                                       
            </div>


            <div class="form-group">
              <label>Nomor Telepon</label>
              <input required="" type="text" disabled name="no_tlp" class="form-control" value="<?php echo $data1['no_tlp']; ?>">      
            </div>

            <div class="form-group">
              <label>Email</label>
              <input required="" type="text" disabled name="email" class="form-control" value="<?php echo $data1['email']; ?>">      
            </div>
            <div class="form-group">
              <label>Alamat Lengkap</label>
              <input required="" type="text" disabled name="alamat" class="form-control" value="<?php echo $data1['alamat']; ?>">      
            </div>
            <div class="form-group">
              <label>Tanggal Installasi</label>
              <input required="" type="text" disabled name="tgl_installasi" class="form-control" value="<?php echo $data1['tgl_installasi']; ?>">      
            </div>
            <div class="form-group">
              <label>Metode Pembayaran</label>
              <input type="text" disabled value="<?php echo $data1['bank_bayar'];?>" name="metode_bayar" class="form-control" required>                      
            </div>
            <div class="form-group">
              <label>Bukti Pembayaran</label>
              <input required="" type="text" disabled name="bukti_bayar" value="<?php echo $data1['bukti_bayar'];?>" class="form-control" >      
              <a href="page/pembelian/Download_bukti_bayar.php?filename=<?php echo $data1['bukti_bayar'];?>" name="download2" class="btn btn-warning" style="margin-top:5px;margin-left:10px;">Download Bukti Pembayaran</a>
            </div>

            <div class="form-group">
              <label>Status Pembayaran</label>
              <input name="status_pembelian" disabled type="text" value="<?php if($data1['status_pembelian']==0){echo 'Belum Melakukan Pembayaran';}elseif($data1['status_pembelian']==2){echo 'Sudah Melakukan Pembayaran';}elseif($data1['status_pembelian']==1){echo 'Paket Sudah Terpasang';} ?>" class="form-control" required>
                                       
            </div>

          </div>
          <div class="modal-footer">
            <button data-dismiss="modal" class="btn btn-primary">Tutup</button>
          
          </div>

          <?php } ?>

          </form>

        </div>
        <!-- /.modal-content -->
      </div>
    <!-- /.modal-dialog -->
    </div>
  </div>
</div>

              <div class="modal fade" id="mymodal1<?php echo $data['id_pembelian']; ?>">
                    <div class="modal-dialog">
                      <div class="modal-content">
                      <div class="box box-primary box-solid">
                        <div class="box-header with-border">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>
                            Ubah Data Pembelian
                        </div>
                        <div class="modal-body">

                          <form role="form" action="page/pembelian/tambah_pembelian.php"  method="POST" enctype="multipart/form-data"> 
                          <?php 

                            $id_pembelian = $data['id_pembelian'];

                            $sql1 = $koneksi->query("select * from tb_pembelian where id_pembelian='$id_pembelian'");

                          while ($data1 = $sql1->fetch_assoc()) {

                          ?>

                          <input type="hidden" name="id_pembelian" value="<?php echo $data1['id_pembelian']; ?>">
                          <div class="form-group">
                            <label>Nama Pembeli</label>
                            <input required="" type="text" name="nama" class="form-control" value="<?php echo $data1['nama']; ?>">      
                          </div>

                          <div class="form-group">
                            <label>Jenis Identitas</label>
                            <select name="jenis_id" class="form-control" required>
                              <option value="<?php echo $data1['jenis_id']; ?>"><?php echo $data1['jenis_id']; ?></option>
                              <option value="KTP">KTP</option>
                              <option value="KK">Kartu Keluarga</option>
                              <option value="PASPORT">PASPOR</option>
                              <option value="SIM">SIM</option>
                            </select>      
                          </div>

                        <div class="form-group">
                            <label>Nomor Identitas</label>
                            <input required="" type="text" name="no_id" value="<?php echo $data1['no_id']; ?>" class="form-control" >      
                          </div>

                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input required="" type="date" name="tgl_lahir" value="<?php echo $data1['tgl_lahir']; ?>" class="form-control" >      
                        </div>

                        <div class="form-group">
                            <label>Nama Paket</label>
                            <select name="nominal_paket" class="form-control" required>
                              <option value="<?php echo $data1['nominal_paket']; ?>"><?php echo $data1['nominal_paket'];?></option>
                              <?php foreach($result_paket as $paket) { ?>
                                <option value="<?php echo($paket['nama_paket']) ?>"><?php echo($paket['nama_paket']) ?></option>
                              <?php } ?>
                            </select>      
                          </div>
              
                          <div class="form-group">
                            <label>Harga Paket</label>
                            <select name="harga_paket" class="form-control" required>
                              <option value="<?php echo $data1['harga_paket']; ?>"><?php echo ($data1['nominal_paket'].' = Rp. '.$data1['harga_paket']) ?></option>
                              <?php foreach($result_paket as $paket) { ?>
                                <option value="<?php echo($paket['harga']) ?>"><?php echo($paket['nama_paket'].' = Rp. '.$paket['harga']) ?></option>
                              <?php } ?>
                            </select>                           
                          </div>


                          <div class="form-group">
                            <label>Nomor Telepon</label>
                            <input required="" type="text" name="no_tlp" class="form-control" value="<?php echo $data1['no_tlp']; ?>">      
                          </div>

                          <div class="form-group">
                            <label>Email</label>
                            <input required="" type="email" name="email" class="form-control" value="<?php echo $data1['email']; ?>">      
                          </div>
                          <div class="form-group">
                            <label>Alamat Lengkap</label>
                            <input required="" type="text" name="alamat" class="form-control" value="<?php echo $data1['alamat']; ?>">      
                          </div>
                          <div class="form-group">
                            <label>Tanggal Installasi</label>
                            <input required="" type="date" name="tgl_installasi" class="form-control" value="<?php echo $data1['tgl_installasi']; ?>">      
                          </div>
                          <div class="form-group">
                            <label>Metode Pembayaran</label>
                            <select name="metode_bayar" class="form-control" required>
                              <option value="<?php echo ($data1['bank_bayar'].'-'.$data1['va_bayar']) ?>"><?php echo $data1['bank_bayar'];?></option>
                              <option value="94543-Bayar Langsung">Bayar Langsung</option>
                              <?php foreach($result_metode_bayar as $metode) { ?>
                                <option value="<?php echo($metode['nama_bank'].'-'.$metode['virtual_acc']) ?>"><?php echo($metode['nama_bank']) ?></option>
                              <?php } ?>
                            </select>                           
                          </div>
                          <div class="form-group">
                            <label>Bukti Pembayaran</label>
                            <input required="" type="file" name="bukti_bayar" class="form-control" >      
                          </div>

                          <div class="form-group">
                            <label>Status Pembayaran</label>
                            <select name="status_pembelian" class="form-control" required>
                              <option value="<?php echo $data1['status_pembelian']; ?>"><?php if($data1['status_pembelian']==0){echo 'Belum Melakukan Pembayaran';}elseif($data1['status_pembelian']==2){echo 'Sudah Melakukan Pembayaran';}elseif($data1['status_pembelian']==1){echo 'Paket Sudah Terpasang';} ?></option>
                              <option value="0">Belum Melakukan Pembayaran</option>
                              <option value="1">Paket Sudah Terpasang</option>
                              <option value="2">Sudah Melakukan Pembayaran</option>
                            </select>                           
                          </div>

                        </div>
                        <div class="modal-footer">
                          <button type="submit" name="updet1" class="btn btn-primary">Simpan</button>
                        
                        </div>

                        <?php } ?>

                        </form>

                      </div>
                      <!-- /.modal-content -->
                    </div>
                  <!-- /.modal-dialog -->
                  </div>
                </div>
              </div>
                
                <?php } ?>


            </tbody>

        </table>
      </div>
     </div>
    </div> 
  </div>
</div>

<!-- TABEL PAKET SUDAH DIPASANG -->
<div class="row">
  <div class="col-md-12">
        <!-- Advanced Tables -->
   <div class="box box-primary box-solid">
    <div class="box-header with-border">
              Data Pembelian | Paket Sudah Terpasang
    </div>
     <div class="panel-body">
      <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover" id="example1">
            
             
                <thead>
                <tr>
                  <th>No</th>
                  <th>No Invoice</th>
                  <th>Nama Pembeli</th>
                  <th>Nama Paket</th>
                  <th>Harga Paket</th>
                  <th>Email</th>
                  <th>Alamat</th>
                  <th>Status</th>
                  <th>Ubah</th>
                  <th>Detail</th>
                  <th>Hapus</th>
                </tr>
                </thead>
                <tbody>

                	<?php 

                			$no = 1;

                			$sql = $koneksi->query("select * from tb_pembelian where status_pembelian = '1' order by status_pembelian desc ");

                			while ($data = $sql->fetch_assoc()) {

                     
                				
                			
                	 ?>

                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $data['invoice'] ?></td>
                  <td><?php echo $data['nama'] ?></td>
                  <td><?php echo $data['nominal_paket'] ?></td>
                  <td><?php echo 'Rp. '.number_format($data['harga_paket'],0,",",".") ?></td>
                  <td><?php echo $data['email'] ?></td>
                  <td><?php echo $data['alamat'] ?></td>
                  <td>
                    <?php if($data['status_pembelian']==1) { ?>
                      <p class="btn btn-success">Paket Sudah Terpasang</p>
                    <?php }elseif($data['status_pembelian']==2) { ?>
                      <p class="btn btn-warning">Pembayaran Sudah Dikirimkan</p>
                    <?php }else { ?>
                      <p class="btn btn-danger">Pembayaran Belum Dikirimkan</p>
                    <?php } ?>
                    
                  </td>
                 
                 

                  <td>
                    <a href="#" type="button" class="btn btn-info" data-toggle="modal" data-target="#mymodal<?php echo $data['id_pembelian']; ?>"><i class="fa fa-edit"></i></a>
                  </td>
                  <td>
                    <a href="#" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-detail-terpasang<?php echo $data['id_pembelian']; ?>"><i class="fa fa-info"></i></a>
                  </td>
                  <td>
                  <a onclick="return confirm('Apakah Anda Yakin Mengahpus Data Ini')" href="?page=pembelian&aksi=hapus&id=<?php echo $data['id_pembelian'] ;?>" class="btn btn-danger" title=""><i class="fa fa-trash"></i></a>
                  </td>
                
                </tr>



<!-- Modal Detail data sudah terpasang-->
<div class="modal fade" id="modal-detail-terpasang<?php echo $data['id_pembelian']; ?>">
      <div class="modal-dialog">
        <div class="modal-content">
        <div class="box box-primary box-solid">
          <div class="box-header with-border">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              Detail Data Pembelian Paket Sudah Terpasang
          </div>
          <div class="modal-body">

            <form role="form" action="page/pembelian/tambah_pembelian.php" method="POST" enctype="multipart/form-data"> 
            <?php 

              $id_pembelian = $data['id_pembelian'];

              $sql1 = $koneksi->query("select * from tb_pembelian where id_pembelian='$id_pembelian'");

            while ($data1 = $sql1->fetch_assoc()) {

            ?>
            <input type="hidden" name="id_pembelian" value="<?php echo $data1['id_pembelian']; ?>">
            <div class="form-group">
              <label>Nama Pembeli </label>
              <input required="" disabled type="text" name="nama" class="form-control" value="<?php echo $data1['nama']; ?>">      
            </div>

            <div class="form-group">
              <label>Jenis Identitas</label>
              <input name="jenis_id" type="text" disabled class="form-control" value="<?php echo $data1['jenis_id']; ?>" required>
            </div>

          <div class="form-group">
              <label>Nomor Identitas</label>
              <input required="" disabled type="text" name="no_id" value="<?php echo $data1['no_id']; ?>" class="form-control" >      
            </div>

          <div class="form-group">
              <label>Tanggal Lahir</label>
              <input required="" disabled type="text" name="tgl_lahir" value="<?php echo $data1['tgl_lahir']; ?>" class="form-control" >      
          </div>

          <div class="form-group">
              <label>Nama Paket</label>
              <input type="text" disabled value="<?php echo $data1['nominal_paket'];?>" name="nominal_paket" class="form-control" required>   
            </div>

            <div class="form-group">
              <label>Harga Paket</label>
              <input name="harga_paket" type="text" disabled value="<?php echo ($data1['nominal_paket'].' = Rp. '.$data1['harga_paket']) ?>" class="form-control" required>
                                       
            </div>


            <div class="form-group">
              <label>Nomor Telepon</label>
              <input required="" type="text" disabled name="no_tlp" class="form-control" value="<?php echo $data1['no_tlp']; ?>">      
            </div>

            <div class="form-group">
              <label>Email</label>
              <input required="" type="text" disabled name="email" class="form-control" value="<?php echo $data1['email']; ?>">      
            </div>
            <div class="form-group">
              <label>Alamat Lengkap</label>
              <input required="" type="text" disabled name="alamat" class="form-control" value="<?php echo $data1['alamat']; ?>">      
            </div>
            <div class="form-group">
              <label>Tanggal Installasi</label>
              <input required="" type="text" disabled name="tgl_installasi" class="form-control" value="<?php echo $data1['tgl_installasi']; ?>">      
            </div>
            <div class="form-group">
              <label>Metode Pembayaran</label>
              <input type="text" disabled value="<?php echo $data1['bank_bayar'];?>" name="metode_bayar" class="form-control" required>                      
            </div>
            <div class="form-group">
              <label>Bukti Pembayaran</label>
              <input required="" type="text" disabled name="bukti_bayar" value="<?php echo $data1['bukti_bayar'];?>" class="form-control" >      
              <a href="page/pembelian/Download_bukti_bayar.php?filename=<?php echo $data1['bukti_bayar'];?>" name="download2" class="btn btn-warning" style="margin-top:5px;margin-left:10px;">Download Bukti Pembayaran</a>
            </div>

            <div class="form-group">
              <label>Status Pembayaran</label>
              <input name="status_pembelian" disabled type="text" value="<?php if($data1['status_pembelian']==0){echo 'Belum Melakukan Pembayaran';}elseif($data1['status_pembelian']==2){echo 'Sudah Melakukan Pembayaran';}elseif($data1['status_pembelian']==1){echo 'Paket Sudah Terpasang';} ?>" class="form-control" required>
                                       
            </div>

          </div>
          <div class="modal-footer">
            <button data-dismiss="modal" class="btn btn-primary">Tutup</button>
          
          </div>

          <?php } ?>

          </form>

        </div>
        <!-- /.modal-content -->
      </div>
    <!-- /.modal-dialog -->
    </div>
  </div>
</div>

<div class="modal fade" id="mymodal<?php echo $data['id_pembelian']; ?>">
    <div class="modal-dialog">
      <div class="modal-content">
      <div class="box box-primary box-solid">
        <div class="box-header with-border">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            Ubah Data Pembelian
        </div>
        <div class="modal-body">

          <form role="form" action="page/pembelian/tambah_pembelian.php" method="POST" enctype="multipart/form-data"> 
          <?php 

            $id_pembelian = $data['id_pembelian'];

            $sql1 = $koneksi->query("select * from tb_pembelian where id_pembelian='$id_pembelian'");

          while ($data1 = $sql1->fetch_assoc()) {

          ?>

          <input type="hidden" name="id_pembelian" value="<?php echo $data1['id_pembelian']; ?>">
          <div class="form-group">
            <label>Nama Pembeli</label>
            <input required="" type="text" name="nama" class="form-control" value="<?php echo $data1['nama']; ?>">      
          </div>

          <div class="form-group">
            <label>Jenis Identitas</label>
            <select name="jenis_id" class="form-control" required>
              <option value="<?php echo $data1['jenis_id']; ?>"><?php echo $data1['jenis_id']; ?></option>
              <option value="KTP">KTP</option>
              <option value="KK">Kartu Keluarga</option>
              <option value="PASPORT">PASPOR</option>
              <option value="SIM">SIM</option>
            </select>      
          </div>

        <div class="form-group">
            <label>Nomor Identitas</label>
            <input required="" type="text" name="no_id" value="<?php echo $data1['no_id']; ?>" class="form-control" >      
          </div>

        <div class="form-group">
            <label>Tanggal Lahir</label>
            <input required="" type="date" name="tgl_lahir" value="<?php echo $data1['tgl_lahir']; ?>" class="form-control" >      
        </div>

        <div class="form-group">
            <label>Nama Paket</label>
            <select name="nominal_paket" class="form-control" required>
              <option value="<?php echo $data1['nominal_paket']; ?>"><?php echo $data1['nominal_paket'];?></option>
              <?php foreach($result_paket as $paket) { ?>
                <option value="<?php echo($paket['nama_paket']) ?>"><?php echo($paket['nama_paket']) ?></option>
              <?php } ?>
            </select>      
          </div>

          <div class="form-group">
            <label>Harga Paket</label>
            <select name="harga_paket" class="form-control" required>
              <option value="<?php echo $data1['harga_paket']; ?>"><?php echo $data1['harga_paket']; ?></option>
              <?php foreach($result_paket as $paket) { ?>
                <option value="<?php echo($paket['harga']) ?>"><?php echo($paket['nama_paket'].' = Rp. '.$paket['harga']) ?></option>
              <?php } ?>
            </select>                           
          </div>


          <div class="form-group">
            <label>Nomor Telepon</label>
            <input required="" type="text" name="no_tlp" class="form-control" value="<?php echo $data1['no_tlp']; ?>">      
          </div>

          <div class="form-group">
            <label>Email</label>
            <input required="" type="email" name="email" class="form-control" value="<?php echo $data1['email']; ?>">      
          </div>
          <div class="form-group">
            <label>Alamat Lengkap</label>
            <input required="" type="text" name="alamat" class="form-control" value="<?php echo $data1['alamat']; ?>">      
          </div>
          <div class="form-group">
            <label>Tanggal Installasi</label>
            <input required="" type="date" name="tgl_installasi" class="form-control" value="<?php echo $data1['tgl_installasi']; ?>">      
          </div>
          <div class="form-group">
            <label>Metode Pembayaran</label>
            <select name="metode_bayar" class="form-control" required>
              <option value="<?php echo ($data1['bank_bayar'].'-'.$data1['va_bayar']) ?>"><?php echo $data1['bank_bayar'];?></option>
              <option value="94543-Bayar Langsung">Bayar Langsung</option>
              <?php foreach($result_metode_bayar as $metode) { ?>
                <option value="<?php echo($metode['nama_bank'].'-'.$metode['virtual_acc']) ?>"><?php echo($metode['nama_bank']) ?></option>
              <?php } ?>
            </select>                           
          </div>
          <div class="form-group">
            <label>Bukti Pembayaran</label>
            <input required="" type="file" name="bukti_bayar" class="form-control" >      
          </div>

          <div class="form-group">
            <label>Status Pembayaran</label>
            <select name="status_pembelian" class="form-control" required>
              <option value="<?php echo $data1['status_pembelian']; ?>"><?php if($data1['status_pembelian']==0){echo 'Belum Melakukan Pembayaran';}elseif($data1['status_pembelian']==2){echo 'Sudah Melakukan Pembayaran';}elseif($data1['status_pembelian']==1){echo 'Paket Sudah Terpasang';} ?></option>
              <option value="0">Belum Melakukan Pembayaran</option>
              <option value="1">Paket Sudah Terpasang</option>
              <option value="2">Sudah Melakukan Pembayaran</option>
            </select>                           
          </div>

        </div>
        <div class="modal-footer">
          <button type="submit" name="updet_terpasang" class="btn btn-primary">Simpan</button>
        
        </div>

        <?php } ?>

        </form>

      </div>
      <!-- /.modal-content -->
    </div>
  <!-- /.modal-dialog -->
  </div>
</div>
                

                <?php } ?>

            </tbody>

        </table>
      </div>
     </div>
</div>



<!-- AWAL TAMBAH DATA PAKET -->

<div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="box box-primary box-solid">
                <div class="box-header with-border">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                    Tambah Data Pembelian
                </div>
                
               
              
              <div class="modal-body">
                <form role="form" action="page/pembelian/tambah_pembelian.php" method="POST" enctype="multipart/form-data">      

                        <div class="form-group">
                          <label>Nama Pembeli</label>
                          <input required="" type="text" name="nama" class="form-control" >      
                        </div>

                        <div class="form-group">
                          <label>Jenis Identitas</label>
                          <select name="jenis_id" class="form-control" required>
                            <option value="">Pilih Jenis Identitas</option>
                            <option value="KTP">KTP</option>
                            <option value="KK">Kartu Keluarga</option>
                            <option value="PASPORT">PASPOR</option>
                            <option value="SIM">SIM</option>
                          </select>      
                        </div>

                       <div class="form-group">
                          <label>Nomor Identitas</label>
                          <input required="" type="text" name="no_id" class="form-control" >      
                        </div>

                       <div class="form-group">
                          <label>Tanggal Lahir</label>
                          <input required="" type="date" name="tgl_lahir" class="form-control" >      
                       </div>

                        <div class="form-group">
                          <label>Nama Paket</label>
                          <select name="nominal_paket" class="form-control" required>
                            <option value="">Pilih paket</option>
                            <?php foreach($result_paket as $paket) { ?>
                              <option value="<?php echo($paket['nama_paket']) ?>"><?php echo($paket['nama_paket']) ?></option>
                            <?php } ?>
                          </select>      
                        </div>
             
                        <div class="form-group">
                          <label>Harga Paket</label>
                          <select name="harga_paket" class="form-control" required>
                            <option value="">Pilih harga paket</option>
                            <?php foreach($result_paket as $paket) { ?>
                              <option value="<?php echo($paket['harga']) ?>"><?php echo($paket['nama_paket'].' = Rp. '.$paket['harga']) ?></option>
                            <?php } ?>
                          </select>                           
                        </div>

                        <div class="form-group">
                          <label>No Telepon</label>
                          <input required="" type="text" name="no_tlp" class="form-control" >      
                        </div>
                        <div class="form-group">
                          <label>Email</label>
                          <input required="" type="email" name="email" class="form-control" >      
                        </div>
                        <div class="form-group">
                          <label>Alamat</label>
                          <input required="" type="text" name="alamat" class="form-control" >      
                        </div>
                        <div class="form-group">
                          <label>Tanggal Installasi</label>
                          <input required="" type="date" name="tgl_installasi" class="form-control" >      
                        </div>
                        <div class="form-group">
                          <label>Metode Pembayaran</label>
                          <select name="metode_bayar" class="form-control" required>
                            <option value="">Pilih Metode Bayar</option>
                            <option value="94543-Bayar Langsung">Bayar Langsung</option>
                            <?php foreach($result_metode_bayar as $metode) { ?>
                              <option value="<?php echo($metode['nama_bank'].'-'.$metode['virtual_acc']) ?>"><?php echo($metode['nama_bank']) ?></option>
                            <?php } ?>
                          </select>                           
                        </div>

                        <div class="form-group">
                          <label>Bukti Pembayaran</label>
                          <input required type="file" name="bukti_bayar2" class="form-control" >      
                        </div>

                        <div class="form-group">
                          <label>Status Pembayaran</label>
                          <select name="status_pembelian" class="form-control" required>
                            <option value="">Pilih Status Pembayaran</option>
                            <option value="0">Belum Melakukan Pembayaran</option>
                            <option value="2">Sudah Melakukan Pembayaran</option>
                          </select>                           
                        </div>

                      <div class="modal-footer">
                        <input type="submit" name="tambah" class="btn btn-primary" value="Tambah Data Baru">
                       
                      </div>
                </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
      </div>
</div>
 
<?php } else{
    echo "Anda Tidak Berhak Mengakses Halaman Ini";
  } ?>

 <!-- AKHIR TAMBAH DATA PAKET -->   
