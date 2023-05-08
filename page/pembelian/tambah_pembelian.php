
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
            // Invoice tambah paket
    $get_last_id_pemesanan = "SELECT MAX(id_pembelian) FROM tb_pembelian";
    $query_get_last_pembelian = mysqli_query($koneksi, $get_last_id_pemesanan);

    $result_inv = array();
    while ($data_inv = mysqli_fetch_array($query_get_last_pembelian)) {
    $result_inv[] = $data_inv;
    }


    $tanggal_no_invoice = date('dmy');
    $tanggal_invoice = date('d / M / y');
    $get_new_id_pembelian = $result_inv[0][0] + 1 ;
    $no_invoice = $tanggal_no_invoice .'-'. $id . '-' . $get_new_id_pembelian ;

    $nama = $_POST['nama'];
    $jenis_id = $_POST['jenis_id'];
    $tgl_installasi = $_POST['tgl_installasi'];
    $no_id = $_POST['no_id'];
    $nominal_paket = $_POST['nominal_paket'];
    $harga_paket = $_POST['harga_paket'];
    $no_tlp = $_POST['no_tlp'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $metode_bayar_array = explode("-",$_POST['metode_bayar']);
    $bank_bayar = $metode_bayar_array[0];
    $virtual_acc = $metode_bayar_array[1];
    $status_pembelian = $_POST['status_pembelian'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $tgl_bayar = date('Y-m-d');
    $metode_bayar = null;

    if($bank_bayar == '94543'){
        $bank_bayar = 'Bayar Langsung';
        $virtual_acc = 'Bayar Lansung';
    }
    // Upload File

    $namaFile2 = $_FILES['bukti_bayar2']['name'];
    $namaSementara2 = $_FILES['bukti_bayar2']['tmp_name'];

    // Extensi FILE
    $extFileAllowed2 = array('pdf', 'png', 'jpg', 'jpeg');
    $x2        = explode('.', $namaFile2);
    $namaFileFix= $x2[0].'-'.$no_invoice.'.'.strtolower(end($x2));
    $ekstensi2    = strtolower(end($x2));

    // UKuran File
    $ukuran2 = $_FILES['bukti_bayar2']['size'];

    // Direktori tempat simpan file Upload
    $dirupload2 = "../../Bukti_Bayar/";

    if (in_array($ekstensi2,$extFileAllowed2)===true) {
        if ($ukuran2 < 1044070) {

            $query_file = $koneksi->query("
            insert into tb_pembelian (
                invoice,
                nama,
                nominal_paket,
                harga_paket,
                no_tlp,
                email,
                alamat,
                jenis_id,
                no_id,
                tgl_lahir,
                metode_bayar,
                tgl_installasi,
                status_pembelian,
                va_bayar,
                bank_bayar,
                tgl_bayar,
                bukti_bayar)
                values(
                '$no_invoice',
                '$nama',
                '$nominal_paket',
                '$harga_paket',
                '$no_tlp',
                '$email',
                '$alamat',
                '$jenis_id',
                '$no_id',
                '$tgl_lahir',
                '$metode_bayar',
                '$tgl_installasi',
                '$status_pembelian',
                '$virtual_acc',
                '$bank_bayar',
                '$tgl_bayar',
                '$namaFileFix'
                ) 
            ");

            if($query_file){
                move_uploaded_file($namaSementara2, $dirupload2.$namaFile2);                 
                echo "<script>";
                echo "swal({
                type: 'success',
                title: 'Berhasil',
                text: 'Terimakasih. File Slip Pembayaran Berhasil diKirimkan.',
                footer: 'Silahkan tunggu petugas kami menghubungi Anda.'
                }, function() {
                    window.location = 'http://localhost:70/B.Net/index.php?page=pembelian';
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
                    window.location = 'http://localhost:70/B.Net/index.php?page=pembelian';
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
                    window.location = 'http://localhost:70/B.Net/index.php?page=pembelian';
                })";
            echo "</script>";
        }   

    }else{
        echo "<script>";
        echo "swal({
                type: 'error',
                title: 'Maaf ...',
                text: 'Format File Slip Bukti Pembayaran Salah !',
                footer: 'Hanya Mendukung File Berformat (PDF, PNG, JPG, JPEG)'
                }, function() {
                    window.location = 'http://localhost:70/B.Net/index.php?page=pembelian';
                })";
        echo "</script>";
    }

    }


    
    if (isset($_POST['updet_terpasang'])) {
        $id_pembelian = $_POST['id_pembelian'];
        $nama = $_POST['nama'];
        $jenis_id = $_POST['jenis_id'];
        $tgl_installasi = $_POST['tgl_installasi'];
        $no_id = $_POST['no_id'];
        $nominal_paket = $_POST['nominal_paket'];
        $harga_paket = $_POST['harga_paket'];
        $no_tlp = $_POST['no_tlp'];
        $email = $_POST['email'];
        $alamat = $_POST['alamat'];
        $metode_bayar_array = explode("-",$_POST['metode_bayar']);
        $bank_bayar = $metode_bayar_array[0];
        $virtual_acc = $metode_bayar_array[1];
        $status_pembelian = $_POST['status_pembelian'];
        $tgl_lahir = $_POST['tgl_lahir'];
        $tgl_bayar = date('Y-m-d');
        $metode_bayar = null;

        if($bank_bayar == '94543'){
          $bank_bayar = 'Bayar Langsung';
          $virtual_acc = 'Bayar Lansung';
        }

        // Upload File
        $namaFile = $_FILES['bukti_bayar']['name'];
        $namaSementara = $_FILES['bukti_bayar']['tmp_name'];

        // Extensi FILE
        $extFileAllowed = array('pdf', 'png', 'jpg', 'jpeg');
        $x        = explode('.', $namaFile);
        $namaFileFix= $x[0].'-'.$no_invoice.'.'.strtolower(end($x));
        $ekstensi    = strtolower(end($x));

        // UKuran File
        $ukuran = $_FILES['bukti_bayar']['size'];
        echo $id_pembelian ;  

        // Direktori tempat simpan file Upload
        $dirupload = "../../Bukti_Bayar/";

        if (in_array($ekstensi,$extFileAllowed)===true) {
            if ($ukuran < 1044070) {
                move_uploaded_file($namaSementara, $dirupload.$namaFile);
                
                
              $sql = $koneksi->query("update tb_pembelian set 
                nama='$nama',
                nominal_paket='$nominal_paket',
                harga_paket='$harga_paket',
                no_tlp='$no_tlp',
                email='$email',
                alamat='$alamat',
                jenis_id='$jenis_id',
                no_id='$no_id',
                tgl_lahir='$tgl_lahir',
                metode_bayar='$metode_bayar',
                tgl_installasi='$tgl_installasi',
                status_pembelian='$status_pembelian',
                va_bayar='$virtual_acc',
                bank_bayar='$bank_bayar',
                tgl_bayar='$tgl_bayar',
                bukti_bayar='$namaFileFix'
                where id_pembelian='$id_pembelian'");

                if($sql){
                    echo "<script>";
                    echo "swal({
                    type: 'success',
                    title: 'Berhasil',
                    text: 'Terimakasih. Data Pembelian Berhasil diUbah.',
                    footer: 'Silahkan tunggu petugas kami menghubungi Anda.'
                    },function() {
                        window.location = 'http://localhost:70/B.Net/index.php?page=pembelian';
                    })";
                    echo "</script>";
                }else{
                    echo "<script>";
                    echo "swal({
                    type: 'error',
                    title: 'Maaf ...',
                    text: 'File Slip Pembayaran Gagal Dikirim !',
                    footer: 'Silahkan Coba Lagi.'
                    },function() {
                        window.location = 'http://localhost:70/B.Net/index.php?page=pembelian';
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
                  },function() {
                    window.location = 'http://localhost:70/B.Net/index.php?page=pembelian';
                })";
                echo "</script>";
            }   

        }else{
            echo "<script>";
            echo "swal({
                    type: 'error',
                    title: 'Maaf ...',
                    text: 'Format File Slip Bukti Pembayaran Salah !',
                    footer: 'Hanya Mendukung File Berformat (PDF, PNG, JPG, JPEG)'
                  },function() {
                    window.location = 'http://localhost:70/B.Net/index.php?page=pembelian';
                })";
            echo "</script>";
        }

        if ($query_file) {
          echo "

              <script>
                  setTimeout(function() {
                      swal({
                          title: 'Data Pembelian',
                          text: 'Berhasil Diubah!',
                          type: 'success'
                      }, function() {
                          window.location = '?page=pembelian';
                      }function() {
                        window.location = 'http://localhost:70/B.Net/index.php?page=pembelian';
                    });
                  }, 300);
              </script>

          ";
        }
      }


      if (isset($_POST['updet1'])) {
        $id_pembelian = $_POST['id_pembelian'];
        $nama = $_POST['nama'];
        $jenis_id = $_POST['jenis_id'];
        $tgl_installasi = $_POST['tgl_installasi'];
        $no_id = $_POST['no_id'];
        $nominal_paket = $_POST['nominal_paket'];
        $harga_paket = $_POST['harga_paket'];
        $no_tlp = $_POST['no_tlp'];
        $email = $_POST['email'];
        $alamat = $_POST['alamat'];
        $metode_bayar_array = explode("-",$_POST['metode_bayar']);
        $bank_bayar = $metode_bayar_array[0];
        $virtual_acc = $metode_bayar_array[1];
        $status_pembelian = $_POST['status_pembelian'];
        $tgl_lahir = $_POST['tgl_lahir'];
        $tgl_bayar = date('Y-m-d');
        $metode_bayar = null;

        if($bank_bayar == '94543'){
          $bank_bayar = 'Bayar Langsung';
          $virtual_acc = 'Bayar Lansung';
        }

        // Upload File
        $namaFile = $_FILES['bukti_bayar']['name'];
        $namaSementara = $_FILES['bukti_bayar']['tmp_name'];

        // Extensi FILE
        $extFileAllowed = array('pdf', 'png', 'jpg', 'jpeg');
        $x        = explode('.', $namaFile);
        $namaFileFix= $x[0].'-'.$no_invoice.'.'.strtolower(end($x));
        $ekstensi    = strtolower(end($x));

        // UKuran File
        $ukuran = $_FILES['bukti_bayar']['size'];

        // Direktori tempat simpan file Upload
        $dirupload = "../../Bukti_Bayar/";

        if (in_array($ekstensi,$extFileAllowed)===true) {
            if ($ukuran < 1044070) {
                move_uploaded_file($namaSementara, $dirupload.$namaFile);
                
                
              $sql = $koneksi->query("update tb_pembelian set 
                nama='$nama',
                nominal_paket='$nominal_paket',
                harga_paket='$harga_paket',
                no_tlp='$no_tlp',
                email='$email',
                alamat='$alamat',
                jenis_id='$jenis_id',
                no_id='$no_id',
                tgl_lahir='$tgl_lahir',
                metode_bayar='$metode_bayar',
                tgl_installasi='$tgl_installasi',
                status_pembelian='$status_pembelian',
                va_bayar='$virtual_acc',
                bank_bayar='$bank_bayar',
                tgl_bayar='$tgl_bayar',
                bukti_bayar='$namaFileFix'
                where id_pembelian='$id_pembelian'");

                if($sql){
                    echo "<script>";
                    echo "swal({
                    type: 'success',
                    title: 'Berhasil',
                    text: 'Terimakasih. Data Pembelian Berhasil diUbah.',
                    footer: 'Silahkan tunggu petugas kami menghubungi Anda.'
                    },function() {
                        window.location = 'http://localhost:70/B.Net/index.php?page=pembelian';
                    })";
                    echo "</script>";
                }else{
                    echo "<script>";
                    echo "swal({
                    type: 'error',
                    title: 'Maaf ...',
                    text: 'File Slip Pembayaran Gagal Dikirim !',
                    footer: 'Silahkan Coba Lagi.'
                    },function() {
                        window.location = 'http://localhost:70/B.Net/index.php?page=pembelian';
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
                  },function() {
                    window.location = 'http://localhost:70/B.Net/index.php?page=pembelian';
                })";
                echo "</script>";
            }   

        }else{
            echo "<script>";
            echo "swal({
                    type: 'error',
                    title: 'Maaf ...',
                    text: 'Format File Slip Bukti Pembayaran Salah !',
                    footer: 'Hanya Mendukung File Berformat (PDF, PNG, JPG, JPEG)'
                  },function() {
                    window.location = 'http://localhost:70/B.Net/index.php?page=pembelian';
                })";
            echo "</script>";
        }

        if ($query_file) {
          echo "

              <script>
                  setTimeout(function() {
                      swal({
                          title: 'Data Pembelian',
                          text: 'Berhasil Diubah!',
                          type: 'success'
                      },function() {
                        window.location = 'http://localhost:70/B.Net/index.php?page=pembelian';
                    });
                  }, 300);
              </script>

          ";
        }
      }


 
 
 ?>   