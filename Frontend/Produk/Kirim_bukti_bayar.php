<?php 
    include "../../include/koneksi.php";
    $id = $_POST['id_paket'];
    $sql = "SELECT * FROM tb_paket where id_paket='$id'";
    $query = mysqli_query($koneksi, $sql);
    $result = array();
    while ($data = mysqli_fetch_array($query)) {
        $result[] = $data;
    }
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>B Net</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
  <!-- Favicons -->
  <link href="../../assets/img/favicon.png" rel="icon">
  <link href="../../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../../assets/css/style.css" rel="stylesheet">

  <!-- NOTA CSS -->
  <!-- <link href="../../assets/css/nota.css" rel="stylesheet">
  <link href="../../assets/css/nota_final.css" rel="stylesheet"> -->

  <!-- Modals -->
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
  <!-- <link href="../../assets/css/modalss.css" rel="stylesheet"> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <!-- =======================================================
  * Template Name: Gp - v4.9.1
  * Template URL: https://bootstrapmade.com/gp-free-multipurpose-html-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center justify-content-lg-between">

      <h1 class="logo me-auto me-lg-0"><a href="index.html">Banjar<span>Net</span></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link" href="../../dashboard.php">Beranda</a></li>
          <li><a class="nav-link scrollto " href="Paket.php">Produk</a></li>
          <li><a class="nav-link scrollto " href="Tentang_Kami.php">Tentang Kami</a></li>
          <li><a class="nav-link scrollto" href="#contact">Kontak</a></li>
          <li><a class="nav-link scrollto active" href="#">Kirim Bukti Pembayaran</a></li>
          
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->


    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center justify-content-center">
    <div class="container" data-aos="fade-up">

      <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
        <div class="col-xl-6 col-lg-8">
          <h2>Mohon Untuk Mengisi Formulir Dibawah Ini</h2>
        </div>
      </div>

    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Beli Paket ======= -->
    <section id="belipaket" class="belipaket">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Pembayaran Pesanan</h2>
          <p>Kirim Bukti Pembayaran Pesanan</p>
          <div class="alert alert-warning" role="alert">
            <div><b>Langkah-langkah pembayaran :</b></div>
            <div style="margin-left:10px;">
                1. Lakukan pemesanan Produk pada menu <b><a href="Paket.php"><u>Produk</u></a></b>
            </div>
            <div style="margin-left:10px;">
                2. Lengkapi formulir yang tersedia
            </div>
            <div style="margin-left:10px;">
                3. Pilih metode pembayaran
            </div>
            <div style="margin-left:10px;">
                4. Lengkapi data diri
            </div>
            <div style="margin-left:10px;">
                5. Setelah mendapatkan Invoice berupa file <b style="color:red;">Virtual Account-Pemesanan-BNET.pdf</b>, Silahkan melakukan pembayaran dengan Nomor Virtual Account yang telah tertera.
            </div>
            <div style="margin-left:10px;">
                6. Setelah melakukan pembayaran, harap kirim <b>Slip Pembayaran</b> pada form di bawah ini.
            </div>
            <div style="margin-left:17px;">
                - Isikan form <b>No Invoice</b>, dengan Nomor Invoice yang didapatkan pada <b style="color:red;">Virtual Account-Pemesanan-BNET.pdf</b>
            </div>
            <div style="margin-left:17px;">
                - Isikan form <b>Slip Bukti Pembayaran</b> dengan Slip Pembayaran Pemesanan  yang telah selesai dibayarkan pada pesanan produk anda.
            </div>
            <div style="margin-left:10px;">
                7. Pemesanan sedang diproses, silahkan tunggu petugas mengirimkan informasi melalui nomor telepon pemesan.
            </div>
          </div>
        </div>
        
        <div class="row mt-3">

          <div class="col-lg-8 mt-5 mt-lg-0">
            <!-- Pengambilan data dari form beli paket -->
            <form  method="post" role="form" enctype="multipart/form-data">
            
              <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="">Nomor Invoice</label>
                        <input type="text" class="form-control" name="no_invoice" id="no_invoice"  placeholder="Isikan No Invoice Pemesanan" >
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="">Konfirmasi Nomor Invoice</label>
                        <input type="text" class="form-control" name="konf_no_invoice" id="konf_no_invoice"  placeholder="Isikan No Invoice Pemesanan" >
                    </div>
                    
                    <div class="col-md-6 form-group mt-3 mt-md-0">
                        <label for="">Slip Bukti Pembayaran</label>
                        <input type="file" class="form-control" name="bukti_bayar" id="bukti_bayar" >
                    </div>
              </div>
              <input type="submit" class="btn btn-danger mt-3" style="width:200px; margin: auto;" name="btn_kirim" value="Kirim Bukti Pembayaran">
            </form>
          </div>

        </div>

      </div>
    </section><!-- Akhir Beli Paket -->
    
    <!-- SIMPAN DATA BUKTI PEMBAYARAN -->
    <?php 
    if(isset($_POST['btn_kirim'])){
        $no_invoice = $_POST['no_invoice'];
        $konf_no_invoice = $_POST['konf_no_invoice'];

        // Cek konfirmasi No Invoice
        if ($no_invoice == $konf_no_invoice) {
            
          // Cek Ketersediaan No Invoice
          $sql_ketersediaan = "SELECT COUNT(invoice) FROM tb_pembelian where invoice='$no_invoice'";
          $query_ketersediaan = mysqli_query($koneksi, $sql_ketersediaan);
          $result_ketersediaan = array();
          while ($data_ketersediaan = mysqli_fetch_array($query_ketersediaan)) {
              $result_ketersediaan[] = $data_ketersediaan;
          }
          if($result_ketersediaan[0][0] == 1){
            $no_invoice = $_POST['no_invoice'];
            $bukti_bayar = $_POST['bukti_bayar'];
            $tgl_bayar = date("Y-m-d");
    
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
                    move_uploaded_file($namaSementara, $dirupload.$namaFileFix);
    
                    $query_file = $koneksi->query("
                    UPDATE tb_pembelian SET
                        status_pembelian = '2',
                        tgl_bayar = '$tgl_bayar',
                        bukti_bayar = '$namaFileFix'
                    WHERE invoice = '$no_invoice'
                    ");
    
                    if($query_file){
                        echo "<script>";
                        echo "Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: 'Terimakasih. File Slip Pembayaran Berhasil diKirimkan.',
                        footer: 'Silahkan tunggu petugas kami menghubungi Anda.'
                        })";
                        echo "</script>";
                    }else{
                        echo "<script>";
                        echo "Swal.fire({
                        icon: 'error',
                        title: 'Maaf ...',
                        text: 'File Slip Pembayaran Gagal Dikirim !',
                        footer: 'Silahkan Coba Lagi.'
                        })";
                        echo "</script>";
                    }
    
                }else{
                    echo "<script>";
                    echo "Swal.fire({
                        icon: 'error',
                        title: 'Maaf ...',
                        text: 'File Slip Pembayaran Terlalu Besar !',
                        footer: 'Maksimal Ukuran File 1 MB.'
                      })";
                    echo "</script>";
                }   
    
            }else{
                echo "<script>";
                echo "Swal.fire({
                        icon: 'error',
                        title: 'Maaf ...',
                        text: 'Format File Slip Bukti Pembayaran Salah !',
                        footer: 'Hanya Mendukung File Berformat (PDF, PNG, JPG, JPEG)'
                      })";
                echo "</script>";
            }
          }else{
            echo "<script>";
            echo "Swal.fire({
                        icon: 'error',
                        title: 'Maaf ...',
                        text: 'Nomor Invoice Tidak Tersedia di Database',
                        footer: 'Pastikan Format No Invoice sesuai seperti pada Virtual Account-Pemesanan-BNET.pdf | CONTOH(No Invoice : xxxx-x-x) simbol '-' diikut sertakan dalam pengisian form'
                      })";
            echo "</script>";
          }
        }else{
            echo "<script>";
            echo "Swal.fire({
                        icon: 'error',
                        title: 'Maaf ...',
                        text: 'Konfirmasi Nomor Invoice dengan Benar !',
                        footer: 'Pastikan Format No Invoice sesuai seperti pada Virtual Account-Pemesanan-BNET.pdf | CONTOH(No Invoice : xxxx-x-x) simbol '-' diikut sertakan dalam pengisian form'
                      })";
            echo "</script>";
        }
      }
    ?>
        


  </main><!-- End #main -->
  
  <?php 
      include "../../Template/Footer.php";
  ?>
  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


  <!-- Vendor JS Files -->
  <script src="../../assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="../../assets/vendor/aos/aos.js"></script>
  <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../../assets/js/main.js"></script>

  <!-- Sweet Alert -->


</body>

</html>