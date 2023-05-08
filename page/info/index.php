<?php if ($_SESSION['admin']) { ?>
<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                 Data Master Informasi Banjar NET
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
                  <th>Poster</th>
                  <th>Judul</th>
                  <th>Isi Informasi</th>
                  <th>Ubah</th>
                  <th>Hapus</th>
                </tr>
                </thead>
                <tbody>

                	<?php 

                			$no = 1;

                			$sql = $koneksi->query("select * from tb_info order by id desc");

                			while ($data = $sql->fetch_assoc()) {
                	 ?>

                <tr>
                  <td><?php echo $no++; ?></td>
                  <td align="center">
                  <img style="width:100px; height:110px;" src="Informasi/<?php echo $data['gambar'] ?>" alt="Photo 1" class="img-fluid">
                  </td>
                  <td><?php echo $data['judul'] ?></td>
                  <td><?php echo $data['isi'] ?></td>
                  <td>
                    <a href="#" type="button" class="btn btn-info" data-toggle="modal" data-target="#mymodal<?php echo $data['id']; ?>"><i class="fa fa-edit"></i> Ubah</a>
                  </td>
                  <td>
                  <a onclick="return confirm('Apakah Anda Yakin Mengahpus Metode Pembayaran Ini?')" href="?page=info&aksi=hapus&id=<?php echo $data['id'] ;?>" class="btn btn-danger" title=""><i class="fa fa-trash"></i>Hapus</a>
                  </td>
                </tr>

                  <div class="modal fade" id="mymodal<?php echo $data['id']; ?>">
                  <div class="modal-dialog">
                    <div class="modal-content">
                     <div class="box box-primary box-solid">
                      <div class="box-header with-border">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                           Ubah Data Informasi
                      </div>
                      <div class="modal-body">

                        <form role="form" action="page/info/tambah.php  " enctype="multipart/form-data" method="POST"> 
                        <?php 
                          $id = $data['id'];
                          $sql1 = $koneksi->query("select * from tb_info where id='$id'");
                         while ($data1 = $sql1->fetch_assoc()) {
                        ?>

                        <input type="hidden" name="id" value="<?php echo $data1['id']; ?>">
                        <div class="form-group">
                          <label>Poster Informasi</label>
                          <input required="" type="file" name="gambar" class="form-control" value="<?php echo $data1['gambar']; ?>">      
                        </div>

                        <div class="form-group">
                          <label>Judul Informasi</label>
                          <input required="" type="text" name="judul" class="form-control " value="<?php echo $data1['judul']; ?>">      
                        </div>

                        <div class="form-group">
                          <label>Isi Informasi</label>
                          <input required="" type="text" name="isi" class="form-control " value="<?php echo $data1['isi']; ?>">      
                        </div>
                       

                      </div>
                      <div class="modal-footer">
                        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                       
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



              if (isset($_POST['simpan'])) {
                $id_ubah = $_POST['id'];
                $nama_bank = htmlspecialchars(strip_tags($_POST['nama_bank']));
                $virtual_acc = $_POST['virtual_acc'];
                
                

                $sql = $koneksi->query("update  tb_metode_bayar set nama_bank='$nama_bank', virtual_acc='$virtual_acc' where id='$id_ubah'");

              

                if ($sql) {
                    echo "

                        <script>
                            setTimeout(function() {
                                swal({
                                    title: 'Data Metode Pembayaran',
                                    text: 'Berhasil Diubah!',
                                    type: 'success'
                                }, function() {
                                    window.location = '?page=metode_bayar';
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
                 Tambah Data Informasi
            </div>
                
               
              
              <div class="modal-body">
                <form role="form" action="page/info/tambah.php" method="POST" enctype="multipart/form-data"> 
                        <div class="form-group">
                          <label>Poster Informasi</label>
                          <input required="" type="file" name="gambar" class="form-control" >      
                        </div>

                        <div class="form-group">
                          <label>Judul Informasi</label>
                          <input required="" type="text" name="judul" class="form-control " >      
                        </div>

                        <div class="form-group">
                          <label>Isi Informasi</label>
                          <input required="" type="text" name="isi" class="form-control " >      
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
 
  
<?php } else{
    echo "Anda Tidak Berhak Mengakses Halaman Ini";
  } ?>

 <!-- AKHIR TAMBAH DATA PAKET -->   