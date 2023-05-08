<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Banjar Net</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="stylesheet" type="text/css" href="../../sw/dist/sweetalert.css">
  <script type="text/javascript" src="../../sw/dist/sweetalert.min.js"></script>

</head>
    <body class="hold-transition skin-blue sidebar-mini">
    </body>
</html>
<?php 
include '../../include/koneksi.php';

      if (isset($_POST['tambah'])) {
  
        $judul = $_POST['judul'];
        $isi = $_POST['isi'];
        
        // Upload File
        $namaFile = $_FILES['gambar']['name'];
        $namaSementara = $_FILES['gambar']['tmp_name'];

        // Extensi FILE
        $extFileAllowed = array('png', 'jpg', 'jpeg');
        $x        = explode('.', $namaFile);
        $ekstensi    = strtolower(end($x));
        // echo($judul.$isi.$namaSementara);
      
        
        // UKuran File
          $ukuran = $_FILES['gambar']['size'];
    
          // Direktori tempat simpan file Upload
          $dirupload = "../../Informasi/";
  
          if (in_array($ekstensi,$extFileAllowed)===true) {
              if ($ukuran < 1044070) {
                  move_uploaded_file($namaSementara, $dirupload.$namaFile);
  
                  $query_file = $koneksi->query("insert into tb_info (gambar,judul,isi)values('$namaFile','$judul','$isi')");
  
                  if($query_file){
                      echo "<script>";
                      echo "swal({
                      type: 'success',
                      title: 'Berhasil',
                      text: 'Terimakasih. File Slip Pembayaran Berhasil diKirimkan.',
                      footer: 'Silahkan tunggu petugas kami menghubungi Anda.'
                      }, function() {
                        window.location = 'http://localhost:70/B.Net/index.php?page=info';
                    })";
                      echo "</script>";
                  }else{
                      echo "<script>";
                      echo "swal({
                      type: 'error',
                      title: 'Maaf ...',
                      text: 'File Slip Pembayaran Gagal Dikirim !',
                      footer: 'Silahkan Coba Lagi.'
                      }, function() {
                        window.location = 'http://localhost:70/B.Net/index.php?page=info';
                    })";
                      echo "</script>";
                  }
  
              }else{
                  echo "<script>";
                  echo "swal({
                      type: 'error',
                      title: 'Maaf ...',
                      text: 'File Slip Pembayaran Terlalu Besar !',
                      footer: 'Maksimal Ukuran File 1 MB.'
                    }, function() {
                        window.location = 'http://localhost:70/B.Net/index.php?page=info';
                    })";
                  echo "</script>";
              }   
  
          }else{
              echo "<script>";
              echo "swal({
                      type: 'error',
                      title: 'Maaf ...',
                      text: 'Format File Slip Bukti Pembayaran Salah !',
                      footer: 'Hanya Mendukung File Berformat (PNG, JPG, JPEG)'
                    }, function() {
                        window.location = 'http://localhost:70/B.Net/index.php?page=info';
                    })";
              echo "</script>";
          }
        }

 ?> 

<?php 
include '../../include/koneksi.php';

      if (isset($_POST['simpan'])) {
        $id = $_POST['id'];
        $judul = $_POST['judul'];
        $isi = $_POST['isi'];
        
        // Upload File
        $namaFile = $_FILES['gambar']['name'];
        $namaSementara = $_FILES['gambar']['tmp_name'];

        // Extensi FILE
        $extFileAllowed = array('png', 'jpg', 'jpeg');
        $x        = explode('.', $namaFile);
        $ekstensi    = strtolower(end($x));
        // echo($judul.$isi.$namaSementara);
      
        
        // UKuran File
          $ukuran = $_FILES['gambar']['size'];
    
          // Direktori tempat simpan file Upload
          $dirupload = "../../Informasi/";
  
          if (in_array($ekstensi,$extFileAllowed)===true) {
              if ($ukuran < 1044070) {
                  move_uploaded_file($namaSementara, $dirupload.$namaFile);
  
                  $query_file = $koneksi->query("update tb_info set gambar='$namaFile',judul='$judul',isi='$isi' where id = '$id'");
                  if($query_file){
                      echo "<script>";
                      echo "swal({
                      type: 'success',
                      title: 'Berhasil',
                      text: 'Terimakasih. File Slip Pembayaran Berhasil diKirimkan.',
                      footer: 'Silahkan tunggu petugas kami menghubungi Anda.'
                      }, function() {
                        window.location = 'http://localhost:70/B.Net/index.php?page=info';
                    })";
                      echo "</script>";
                  }else{
                      echo "<script>";
                      echo "swal({
                      type: 'error',
                      title: 'Maaf ...',
                      text: 'File Slip Pembayaran Gagal Dikirim !',
                      footer: 'Silahkan Coba Lagi.'
                      }, function() {
                        window.location = 'http://localhost:70/B.Net/index.php?page=info';
                    })";
                      echo "</script>";
                  }
  
              }else{
                  echo "<script>";
                  echo "swal({
                      type: 'error',
                      title: 'Maaf ...',
                      text: 'File Slip Pembayaran Terlalu Besar !',
                      footer: 'Maksimal Ukuran File 1 MB.'
                    }, function() {
                        window.location = 'http://localhost:70/B.Net/index.php?page=info';
                    })";
                  echo "</script>";
              }   
  
          }else{
              echo "<script>";
              echo "swal({
                      type: 'error',
                      title: 'Maaf ...',
                      text: 'Format File Slip Bukti Pembayaran Salah !',
                      footer: 'Hanya Mendukung File Berformat (PNG, JPG, JPEG)'
                    }, function() {
                        window.location = 'http://localhost:70/B.Net/index.php?page=info';
                    })";
              echo "</script>";
          }
        }

 ?> 