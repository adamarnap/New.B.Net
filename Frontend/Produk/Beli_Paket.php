<?php 
    include "../../include/koneksi.php";
    $id = $_GET['id_paket'];
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
          <li><a class="nav-link scrollto active" href="#">Produk</a></li>
          <li><a class="nav-link scrollto " href="Frontend/Tentang_Kami/Tentang_Kami.php">Tentang Kami</a></li>
          <li><a class="nav-link scrollto" href="#contact">Kontak</a></li>
          <li><a class="nav-link scrollto" href="Kirim_bukti_bayar.php">Kirim Bukti Pembayaran</a></li>
          
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
      <?php foreach($result as $paket) { ?>
        <div class="section-title">
          <h2>Beli Paket</h2>
          <p>Beli Paket <?php echo $paket['nama_paket']?></p>
          <h7><b style="color:red;">Keterangan Paket : </b><?php echo $paket['keterangan_paket']?></h7>
        </div>
        
        <div class="row mt-5">



          <div class="col-lg-8 mt-5 mt-lg-0">

            <form  method="post" action="Konfirmasi_bayar.php" role="form" >
              <div class="row">
                <div class="col-md-6 form-group">
                    <label for="">Nama Lengkap</label>
                  <input type="text" name="nama" class="form-control" id="name" placeholder="Isikan Nama Lengkap di Sini" required>
                </div>
                
                <div class="col-md-6 form-group mt-3 mt-md-0">
                <label for="">Email</label>
                  <input type="email" class="form-control" name="email" id="email" placeholder="Isikan Email Anda di Sini" required>
                </div>

                <input type="hidden" class="form-control" name="nama_paket" value="<?php echo $paket['nama_paket'];?>">
                
                <input type="hidden" class="form-control" name="id_paket" value="<?php echo $_GET['id_paket'];?>" >

                <input type="hidden" class="form-control" name="harga_paket" value="<?php echo $paket['harga'];?>" id="harga_paket" >

              </div>

              <div class="form-group mt-3">
              <label for="">No Telepon</label>
                <input type="text" class="form-control" name="no_tlp" id="tlp" placeholder="Isikan No Telepon di Sini" required>
              </div>
              <div class="form-group mt-3">
              <label for="">Alamat Lengkap</label>
                <textarea class="form-control" name="alamat" rows="3" placeholder="Isikan Alamat Lengkap Anda di Sini" required></textarea>
              </div>

              <!-- <div style='margin-top:10px;' class="text-center">
                <button name="beli" type="submit" class="btn btn-danger">Beli Paket</button>
              </div> -->
              <div style='margin-top:10px;' class="text-center">
                <input name="beli" type="submit" value="Beli Paket" class="btn btn-danger">
                <!--  -->
              </div>
            </form>
            <?php  } ?>
          </div>

        </div>

      </div>
    </section><!-- Akhir Beli Paket -->

    <?php 

        if (isset($_POST['beli'])) {

          $nama = htmlspecialchars(strip_tags($_POST['nama']));
          $nominal_paket = $_POST['nominal_paket'];
          $harga_paket = $_POST['harga_paket'];
          $no_tlp = $_POST['no_tlp'];
          $email = $_POST['email'];
          $alamat = $_POST['alamat'];
          
          

          $sql = $koneksi->query("insert into tb_pembelian (nama, nominal_paket, harga_paket,no_tlp, email, alamat)values('$nama', '$nominal_paket', '$harga_paket', '$no_tlp', '$email', '$alamat') ");



          if ($sql) {
              echo "

                  <script>
                  setTimeout(function() {
                    swal({
                        title: 'Berhasil Terkirim',
                        text: 'Data Pembelian Paket Sedang di Proses, Konfirmasi tentang pembayaran akan dikirim melalui email',
                        type: 'success'
                    }, function() {
                        window.location = '?page=paket';
                    });
                }, 300);
                  </script>

              ";
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

</body>

</html>