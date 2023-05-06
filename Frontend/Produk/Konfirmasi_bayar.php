<?php 
    include "../../include/koneksi.php";
    $id = $_POST['id_paket'];
    $sql = "SELECT * FROM tb_paket where id_paket='$id'";
    $sql_metode_bayar = "SELECT * FROM tb_metode_bayar";
    $query = mysqli_query($koneksi, $sql);
    $query_metode_bayar = mysqli_query($koneksi, $sql_metode_bayar);
    $result_metode_bayar = array();
    $result = array();
    while ($data_metode_bayar = mysqli_fetch_array($query_metode_bayar)) {
        $result_metode_bayar[] = $data_metode_bayar;
    }
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
  <link href="../../assets/css/nota.css" rel="stylesheet">

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
          <h2>Pemesanan Paket Anda</h2>
          <p>Ringakasan Pemesanan Paket <?php echo $paket['nama_paket']?></p>
          <h7><b style="color:red;">Keterangan Paket : </b><?php echo $paket['keterangan_paket']?></h7>
        </div>
        
        <div class="row mt-5">



          <div class="col-lg-8 mt-5 mt-lg-0">
            <!-- Pengambilan data dari form beli paket -->
            <?php 

            if(isset($_POST['beli'])){
              $nama_lengkap = $_POST['nama'];
              $email = $_POST['email'];
              $paket = $_POST['nama_paket'];
              $harga = $_POST['harga_paket'];
              $tlp = $_POST['no_tlp'];
              $alamat = $_POST['alamat'];
              // Invoice
              
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
            ?>

            <div class="container">
                <div class="card">
                    <div class="card-body">
                        <div id="invoice">
                            <!-- <div class="toolbar hidden-print">
                                <div class="text-end">
                                    <button type="button" class="btn btn-dark"><i class="fa fa-print"></i> Print</button>
                                    <button type="button" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> Export as PDF</button>
                                </div>
                                <hr>
                            </div> -->
                            <div class="invoice overflow-auto">
                                <div style="min-width: 600px">
                                    <header>
                                        <div class="row">
                                            <div class="col">
                                                <a href="javascript:;">
                                        <img src="assets/images/logo-icon.png" width="80" alt="">
                                    </a>
                                            </div>
                                            <div class="col company-details">
                                                <h2 class="name">
                                                      BANJAR <b style="color:red;">NET</b>
                                                </h2>
                                                <div>Lingkungan Karangtohpati, Amlapura, Kab. Karangasem, Bali </div>
                                                <div><b> Kode Pos 80811, Indonesia</b> </div>
                                                <div>+0365 41863</div>
                                                <div> Banjarnet@gmail.com</div>
                                            </div>
                                        </div>
                                    </header>
                                    <main>
                                        <div class="row contacts">
                                            <div class="col invoice-to">
                                                <div class="text-gray-light">INVOICE KEPADA:</div>
                                                <h2 class="to"><?php echo $nama_lengkap; ?></h2>
                                                <div class="address"><?php echo $alamat; ?></div>
                                                <div class="email"><?php echo $email; ?>
                                                </div>
                                            </div>
                                            <div class="col invoice-details">
                                                <h1 class="invoice-id"><?php echo('INVOICE : '.$no_invoice); ?></h1>
                                                <div class="date">Tanggal Invoice: <?php echo($tanggal_invoice);?></div>
                                            </div>
                                        </div>
                                        <table >
                                            <thead>
                                                <tr>
                                                    <th class="text-left">RINCIAN</th>
                                                    <th class="text-right" >DETAIL</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-left" >
                                                        <h3>Atas Nama</h3>
                                                    <td class="unit"><?php echo($nama_lengkap);?></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left" >
                                                        <h3>Email Pendaftaran</h3>
                                                    <td class="unit"><?php echo($email);?></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left" >
                                                        <h3>Nomor Telephone</h3>
                                                    <td class="unit"><?php echo($tlp);?></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left">
                                                        <h3>Paket</h3>
                                                    </td>
                                                    <td class="unit"><?php echo($paket);?></td>

                                                </tr>
                                                <tr>
                                                    <td class="text-left">
                                                        <h3>Harga Paket</h3>
                                                    </td>
                                                    <td class="unit">Rp. <?php echo(number_format($harga,2,',','.'));?></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left" >
                                                        <h3>Alamat Pemasangan</h3>
                                                    <td class="unit"><?php echo($alamat);?></td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    
                                                    <td >SUBTOTAL</td>
                                                    <td>Rp. <?php echo(number_format($harga,2,',','.'));?></td>
                                                </tr>
                                                <tr>
                                                    
                                                    <td >Pajak</td>
                                                    <td>Rp. -</td>
                                                </tr>
                                                <tr>
                                                    
                                                    <td >TOTAL</td>
                                                    <td>Rp. <?php echo(number_format($harga,2,',','.'));?></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                        <div class="notices">
                                            <div>NOTICE:</div>
                                            <div class="notice">Silahkan cek kembali detail pemesananan anda, dan silahkan untuk melanjutkan pemesanan anda</div>
                                        </div>
                                    </main>
                                    <footer>Invoice dibuat di komputer dan sah tanpa tanda tangan dan stempel.</footer>
                                </div>
                                <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
                                <div></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <form  method="post" action="Pilih_pembayaran.php" role="form" >
              <div class="row">

                <input type="hidden" name="nama" class="form-control" value="<?php echo($nama_lengkap);?>" id="name"  required>
                <input type="hidden" class="form-control" name="email" value="<?php echo($email);?>" id="email" required>

                <input type="hidden" class="form-control" name="nama_paket" value="<?php echo($paket);?>" id="nama_paket" >
                <input type="hidden" class="form-control" name="harga_paket" value="<?php echo($harga);?>" id="harga_paket" >
                <input type="hidden" class="form-control" name="id_paket" value="<?php echo $_POST['id_paket'];?>"  >

                <input type="hidden" class="form-control" name="no_tlp" id="tlp" value="<?php echo($tlp);?>" required>
                <input type="hidden" class="form-control" name="alamat" id="alamat" value="<?php echo($alamat);?>" required>
                <div class="row">
                    <div class="col-md-6 form-group" style="margin:15px;">
                        <label for="">Metodde Pembayaran</label>
                        <select class="form-select required" name="metode_pembayaran" id="metode_pembayaran" required>
                            <option value="" selected>Pilih Metode Pembayaran</option>
                            <?php foreach($result_metode_bayar as $value){ ?>
                                <option value="<?php echo($value['nama_bank'].'-'.$value['virtual_acc']);?>"><?php echo($value['nama_bank']);?></option>
                            <?php } ?>
                           
                        </select>                
                    </div>
                </div>
              </div>

              <div style='margin-top:10px;' class="text-center">
                <a href="<?php echo ('Beli_Paket.php?id_paket='.$id);?>" class="btn btn-warning">< Kembali</a>
                <input name="metode_bayar" type="submit" value="Lanjut Pembayaran" class="btn btn-danger">
              </div>
            </form>
            <?php } ?>
            <?php  } ?>
          </div>

        </div>

      </div>
    </section><!-- Akhir Beli Paket -->

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