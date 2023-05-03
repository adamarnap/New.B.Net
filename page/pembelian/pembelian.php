
<?php
include '../../include/koneksi.php';
if ($_SESSION['admin']) { ?>
<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                 Data Pembelian Baru 
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
                  <th>Nama Pembeli</th>
                  <th>Nama Paket</th>
                  <th>Harga Paket</th>
                  <th>No Telepon</th>
                  <th>Email</th>
                  <th>Alamat</th>
                  <th>Ubah</th>
                  <th>Hapus</th>
                </tr>
                </thead>
                <tbody>

                	<?php 

                			$no = 1;

                			$sql = $koneksi->query("select * from tb_pembelian order by id_pembelian desc");

                			while ($data = $sql->fetch_assoc()) {

                     
                				
                			
                	 ?>

                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $data['nama'] ?></td>
                  <td><?php echo $data['nominal_paket'] ?></td>
                  <td><?php echo number_format($data['harga_paket'],0,",",".") ?></td>
                  <td><?php echo $data['no_tlp'] ?></td>
                  <td><?php echo $data['email'] ?></td>
                  <td><?php echo $data['alamat'] ?></td>
                 
                 

                  <td>
                    <a href="#" type="button" class="btn btn-info" data-toggle="modal" data-target="#mymodal<?php echo $data['id_pembelian']; ?>"><i class="fa fa-edit"></i> Ubah</a>
                  </td>
                  <td>
                  <a onclick="return confirm('Apakah Anda Yakin Mengahpus Data Ini')" href="?page=pembelian&aksi=hapus&id=<?php echo $data['id_pembelian'] ;?>" class="btn btn-danger" title=""><i class="fa fa-trash"></i>Hapus</a>
                  </td>
                  
                </tr>

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

                        <form role="form"  method="POST"> 
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
                          <label>Nama Paket</label>
                          <input required="" type="text" name="nominal_paket" class="form-control" value="<?php echo $data1['nominal_paket']; ?>">      
                        </div>
                       
                        <div class="form-group">
                          <label>Harga Paket</label>
                          <input required="" type="text" name="harga_paket" class="form-control uang" value="<?php echo $data1['harga_paket']; ?>">      
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
                       

                      </div>
                      <div class="modal-footer">
                        <button type="submit" name="updet" class="btn btn-primary">Simpan</button>
                       
                      </div>

                      <?php } ?>

                       </form>

                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>
                

                <?php } ?>

               <?php 



              if (isset($_POST['updet'])) {
                $id_pembelian = $_POST['id_pembelian'];
                $nama = $_POST['nama'];
                $nominal_paket = $_POST['nominal_paket'];
                $harga_paket = $_POST['harga_paket'];
                $no_tlp = $_POST['no_tlp'];
                $email = $_POST['email'];
                $alamat = $_POST['alamat'];
                $harga_oke = str_replace(".", "", $harga_paket);

                $sql = $koneksi->query("update tb_pembelian set 
                                        nama='$nama',
                                        nominal_paket='$nominal_paket',
                                        harga_paket='$harga_oke',
                                        no_tlp='$no_tlp',
                                        email='$email',
                                        alamat='$alamat'

                                        where id_pembelian='$id_pembelian'");


                if ($sql) {
                    echo "

                        <script>
                            setTimeout(function() {
                                swal({
                                    title: 'Data Pembelian',
                                    text: 'Berhasil Diubah!',
                                    type: 'success'
                                }, function() {
                                    window.location = '?page=pembelian';
                                });
                            }, 300);
                        </script>

                    ";
                  }



              }


           ?>

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
                <form role="form"  method="POST"> 
                        <div class="form-group">
                          <label>Nama Pembeli</label>
                          <input required="" type="text" name="nama" class="form-control" >      
                        </div>

                        <div class="form-group">
                          <label>Nama Paket</label>
                          <input required="" type="text" name="nominal_paket" class="form-control" >      
                        </div>
             
                        <div class="form-group">
                          <label>Harga Paket</label>
                          <input required="" type="text" name="harga_paket" class="form-control uang" >      
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
                      
                      <div class="modal-footer">
                        <button type="submit" name="tambah" class="btn btn-primary">Simpan</button>
                       
                      </div>
                </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
 


<?php 

      if (isset($_POST['tambah'])) {
  
        $nama = $_POST['nama'];
        $nominal_paket = $_POST['nominal_paket'];
        $harga_paket = $_POST['harga_paket'];
        $no_tlp = $_POST['no_tlp'];
        $email = $_POST['email'];
        $alamat = $_POST['alamat'];        

        $sql = $koneksi->query("insert into tb_pembelian (nama, nominal_paket, harga_paket, no_tlp, email, alamat)values('$nama', '$nominal_paket',  '$harga_paket', '$no_tlp', '$email', '$alamat') ");

      

        if ($sql) {
            echo "

                <script>
                    setTimeout(function() {
                        swal({
                            title: 'Data Pembelian',
                            text: 'Berhasil Ditambah!',
                            type: 'success'
                        }, function() {
                            window.location = '?page=pembelian';
                        });
                    }, 300);
                </script>

            ";
          }



      }

 ?>   
<?php } else{
    echo "Anda Tidak Berhak Mengakses Halaman Ini";
  } ?>

 <!-- AKHIR TAMBAH DATA PAKET -->   
