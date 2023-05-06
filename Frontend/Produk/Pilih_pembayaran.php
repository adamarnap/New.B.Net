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
  <link href="../../assets/css/nota.css" rel="stylesheet">
  <link href="../../assets/css/nota_final.css" rel="stylesheet">

  <!-- Modals -->
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
  <link href="../../assets/css/modalss.css" rel="stylesheet">
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
          <h2>Data Diri Pemesan</h2>
          <p>Lengkapi Data Diri Anda</p>
          <!-- <h7><b style="color:red;">Keterangan Paket : </b><?php echo $paket['keterangan_paket']?></h7> -->
        </div>
        
        <div class="row mt-3">



          <div class="col-lg-8 mt-5 mt-lg-0">
            <!-- Pengambilan data dari form beli paket -->
            <?php 

            if(isset($_POST['metode_bayar'])){
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
            
            <form  method="post" action="Cetak_invoice.php" role="form" >
              <?php
                $metode_pembayaran = $_POST['metode_pembayaran'];
                $array_metode_bayar = explode("-",$metode_pembayaran);
              ?>
            
            <input type="hidden" class="form-control" name="bank_bayar" id="bank_bayar" value="<?php echo $array_metode_bayar[0];?>"  >
            <input type="hidden" class="form-control" name="va_bayar" id="va_bayar" value="<?php echo $array_metode_bayar[1];?>"  >
            <input type="hidden" class="form-control" name="id_paket" id="id_paket" value="<?php echo $_POST['id_paket'];?>"  >
            <input type="hidden" class="form-control" name="nama_paket" value="<?php echo $paket?>" id="nama_paket" >
            <input type="hidden" class="form-control" name="harga_paket" value="<?php echo $harga?>" id="harga_paket" >

                <div class=" form-group mt-3">
                    <label for="">Nama Lengkap</label>
                  <input type="text" name="nama" class="form-control" id="name" value="<?php echo($nama_lengkap);?>" placeholder="Isikan Nama Lengkap di Sini" required>
                </div>

              <div class="row">
                <div class="col-md-6 form-group">
                    <label for="">Tipe Identitas</label>
                    <select class="form-select" name="jenis_identitas" id="jenis_identitas">
                        <option value="KTP">KTP</option>
                        <option value="KK">Kartu Keluarga</option>
                        <option value="PASPORT">PASPOR</option>
                        <option value="SIM">SIM</option>
                    </select>
                </div>
                
                <div class="col-md-6 form-group mt-3 mt-md-0">
                <label for="">Nomor Identitas</label>
                  <input type="text" class="form-control" name="no_identitas" id="no_identitas"  placeholder="Isikan Nomor ID Sesuai Jenis ID yang Dipilih" required>
                </div>
              </div>


            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="">Tanggal Lahir</label>
                <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" placeholder="Isikan Tanggal Lahir Disini" required>
                </div>
                <div class="col-md-6 form-group">
                    <label for="">No Telepon</label>
                <input type="text" class="form-control" name="no_tlp" id="tlp" value="<?php echo($tlp);?>" placeholder="Isikan No Telepon di Sini" required>
                </div>
            </div>
            <div class=" form-group mt-3">
            <label for="">Email</label>
                <input type="email" class="form-control" name="email" id="email" value="<?php echo($email);?>" placeholder="Isikan Email Anda di Sini" required>
            </div>

            <div class=" form-group mt-3">
            <label for="">Konfirmasi Alamat Email</label>
                <input type="email" class="form-control" name="konfirmasi_email" id="konfirmasi_email" placeholder="Konfirmasi Email Anda di Sini" required>
            </div>
            <div class="form-group mt-3">
            <label for="">Alamat Lengkap</label>
            <textarea class="form-control" name="alamat" rows="3" value="<?php echo($alamat);?>" placeholder="Isikan Alamat Lengkap Anda di Sini" required><?php echo($alamat);?>"</textarea>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="">Tanggal Installasi</label>
                    <input type="date" class="form-control" name="tgl_installasi" id="tgl_installasi" placeholder="Isikan Tanggal Installasi Disini" required>
                </div>
            </div>

            <div style='margin-top:10px;' class="text-center">
                <a href="<?php echo ('Beli_Paket.php?id_paket='.$id);?>" class="btn btn-warning">< Kembali</a>
                <input name="metode_bayar_pembayaran" type="submit" data-toggle="modal" data-target="#myModal" value="Lanjut Pembayaran" class="btn btn-danger">
                <!-- <button name="metode_bayar_pembayaran" type="button" data-toggle="modal" data-target="#exampleModal" value="Lanjut Pembayaran" class="btn btn-danger">Lanjut Pembayaran</button> -->
              </div>
            </form>
            <?php } ?>
            <?php  } ?>
          </div>

        </div>

      </div>
    </section><!-- Akhir Beli Paket -->


  <!-- Modal -->
  
  <div class="modal fade bd-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Pembayaran yang harus diselesaikan !</h5>
          
        </div>

        <div class="modal-body">

          <main id="main">
            <!-- ======= Beli Paket ======= -->
            <section id="belipaket" class="belipaket">
              <div class="container" data-aos="fade-up">

              
                <div class="row mt-3">

                  <div class="col-lg-8 mt-5 mt-lg-0">
                    <!-- Pengambilan data dari form beli paket -->
                    <?php 

                      $nama_lengkap = $_POST['nama'];
                      $email = $_POST['email'];
                      $paket = $_POST['nama_paket'];
                      $harga = $_POST['harga_paket'];
                      $tlp = $_POST['no_tlp'];
                      $alamat = $_POST['alamat'];
                      
                      // Invoice
                      $jenis_id = $_POST['jenis_identitas'];
                      $no_identitas = $_POST['no_identitas'];
                      $tgl_lahir = $_POST['tgl_lahir'];
                      $metode_bayar = $_POST['metode_bayar'];
                      $tgl_installasi = $_POST['tgl_installasi'];

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
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6 col-md-offset-0 body-main">
                                    <div class="col-md-12">
                                    <div class="row">
                                            
                                            <div class="col-md-8 text-left">
                                                <h4 style="color: #F81D2D;"><strong style="color:black;">Banjar <b style="color:red;">NET</b></strong></h4>
                                                <p>Lingkungan Karangtohpati, Amlapura, Kab. Karangasem, Bali, Kode Pos 80811, Indonesia </p>
                                                <p> +0365 41863</p>
                                                <p>Banjarnet@gmail.com</p>
                                            </div>
                                        </div>
                                        <br />
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <h2><b>Pembayaran Yang Harus Diselesaikan</b></h2>
                                            </div>
                                        </div>
                                        <br />
                                        <div>
                                            <table class="table" style="font-family:monospace">
                                                <thead>
                                                    <tr>
                                                        <th><h5>Detail</h5></th>
                                                        <th><h5>Keterangan</h5></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                  <!-- Form Untuk Menampuung Data dari JS -->
                                                  <!-- <form method="POST" name="form_tampung" id="form_tampung">
                                                    <input type="text" name="id_paket" id="js_id_paket">
                                                    <input type="text" name="js_jenis_identitas" id="js_jenis_identitas">
                                                    <input type="text" name="js_no_identitas" id="js_no_identitas">
                                                    <input type="text" name="js_tgl_lahir" id="js_tgl_lahir">
                                                    <input type="text" name="js_tgl_installasi" id="js_tgl_installasi">
                                                  </form> -->
                                                    <tr>
                                                        <td class="col-md-9">Nomor Invoice</td>
                                                        <td class="col-md-3"><i class="fas fa-rupee-sign" area-hidden="true"></i>: <?php echo($no_invoice);?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="col-md-9">Nama Lengkap</td>
                                                        <td class="col-md-3"><i class="fas fa-rupee-sign" area-hidden="true"></i>: <?php echo($nama_lengkap);?></td>
                                                    </tr>
                                                    <!-- <tr>
                                                        <td class="col-md-9">Tipe Identitas</td>
                                                        <td class="col-md-3"><i class="fas fa-rupee-sign" area-hidden="true"></i>: <?php echo($_POST['js_jenis_identitas']);?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="col-md-9">Nomor Identitas</td>
                                                        <td class="col-md-3"><i class="fas fa-rupee-sign" area-hidden="true"></i>: <?php echo($_POST['js_no_identitas']);?></td>
                                                    </tr> -->
                                                    <tr>
                                                        <td class="col-md-9">Email</td>
                                                        <td class="col-md-3"><i class="fas fa-rupee-sign" area-hidden="true"></i>: <?php echo($email);?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="col-md-9">Nomor Telephone</td>
                                                        <td class="col-md-3"><i class="fas fa-rupee-sign" area-hidden="true"></i>: <?php echo($tlp);?></td>
                                                    </tr>
                                                    <!-- <tr>
                                                        <td class="col-md-9">Tanggal Lahir</td>
                                                        <td class="col-md-3"><i class="fas fa-rupee-sign" area-hidden="true"></i>: <?php echo($_POST['js_tgl_lahir']);?></td>
                                                    </tr> -->
                                                    <tr>
                                                        <td class="col-md-9">Alamat</td>
                                                        <td class="col-md-3"><i class="fas fa-rupee-sign" area-hidden="true"></i>: <?php echo($alamat);?></td>
                                                    </tr>
                                                    <!-- <tr>
                                                        <td class="col-md-9">Tanggal Installasi</td>
                                                        <td class="col-md-3"><i class="fas fa-rupee-sign" area-hidden="true"></i>: <?php echo($_POST['js_tgl_installasi']);?>/td>
                                                    </tr> -->
                                                    <tr>
                                                        <td class="text-right">
                                                        <p>
                                                            <strong>Harga Paket </strong>
                                                        </p>
                                                        <p>
                                                            <strong>Biaya Pajak</strong>
                                                        </p>
                                                        <p>
                                                            <strong>Potongan Harga </strong>
                                                        </p>
                                                        <p>
                                                            <strong>Biaya Pemasangan</strong>
                                                        </p>
                                                        </td>
                                                        <td>
                                                        <p>
                                                            <strong><i class="fas fa-rupee-sign" area-hidden="true"></i>: Rp. <?php echo(number_format((float)$harga,2,',','.'));?> </strong>
                                                        </p>
                                                        <p>
                                                            <strong><i class="fas fa-rupee-sign" area-hidden="true"></i>: -</strong>
                                                        </p>
                                                        <p>
                                                            <strong><i class="fas fa-rupee-sign" area-hidden="true"></i>: -</strong>
                                                        </p>
                                                        <p>
                                                            <strong><i class="fas fa-rupee-sign" area-hidden="true"></i>: -</strong>
                                                        </p>
                                                        </td>
                                                    </tr>
                                                    <tr style="color: #bd3535;">
                                                        <td class="text-right"><h6><strong style="font-family:monospace">Total</strong></h4></td>
                                                        <td class="text-left"><h6><strong style="font-family:monospace"><i class="fas fa-rupee-sign" area-hidden="true"></i>: Rp. <?php echo(number_format($harga,2,',','.'));?></strong></h4></td>
                                                    </tr>
                                                    <tr style="color: #214e96;">
                                                        <td class="text-center" colspan="2">
                                                            <h6><strong style="font-family:monospace">Virtual Account</strong></h6>
                                                            <h6><b><strong style="font-family:monospace"><?php echo($array_metode_bayar[0]);?></strong></b></h6>
                                                            <h6 style="color:black;"><strong style="font-family:monospace"><?php echo($array_metode_bayar[1]);?></strong></h6>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div>
                                            <div class="col-md-12">
                                                <p><b>Tanggal :</b> <?php echo($tanggal_invoice);?></p>
                                                <br />
                                                <p><b>Tanda Tangan</b></p>
                                                <h5>Banjar<b style="color:#a35050;"> Net</b></h5>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                  </div>

                </div>

              </div>
            </section><!-- Akhir Beli Paket -->
          </main><!-- End #main -->

        </div>
        <div class="modal-footer">
          <table>
            <tr>
              <td style="padding-right:25px;" width="60%">          
                <p style="color:red; font-size:13px;"><i><b>NB: Jika sudah melakukan pembayaran, silahkan kirimkan bukti Pembayaran dengan Klik Tombol <div style="text-align:center;font-size:15px;background-color:red; color:yellow; padding:3px;">Kirim Bukti Pembayaran !</div></b></i></p>
              </td>
              <td>
                <button type="button" data-toggle="modal" data-target="#myModal2" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <a href="Kirim_bukti_bayar.php" class="btn btn-danger">Kirim Bukti Pembayaran</a>
              </td>
            </tr>
          </table>
          
        </div>
      </div>
    </div>
  </div>

 <!-- MODAL KE 2 -->
 <!-- Modal -->
    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle"><b style="color:red;">Perhatian Penting!</b></h5>
          </div>
          <div class="modal-body">
            <div class="alert-warning" role="alert">
              Jika anda sudah melakukan pembayaran, silahkan kirimkan bukti pembayaran di Menu <b><i>Kirim Bukti Pembayaran</i></b>, atau dengan klik tombol <b><i>Kirim Bukti Pembayaran</i></b> di bawah ini ! Terimakasih :)
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <a href="Kirim_bukti_bayar.php" class="btn btn-danger">Kirim Bukti Pembayaran</a>
          </div>
        </div>
      </div>
    </div>
  </main><!-- End #main -->
  <?php 
      include "../../Template/Footer.php";
  ?>
  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


  <!-- Modal auto show -->
  

  <!-- Data Invoice Final Tampil di WEb -->
  <!-- <script>
    // mengambil data dari php by ID
    var id_paket = document.getElementById('id_paket').value;
    var jenis_identitas = document.getElementById('jenis_identitas').value;
    var no_identitas = document.getElementById('no_identitas').value;
    var tgl_lahir = document.getElementById('tgl_lahir').value;
    var tgl_installasi = document.getElementById('tgl_installasi').value;

    // passing data ke form penampungan data js di php
    document.form_tampung.js_id_paket.value = id_paket;
    document.form_tampung.js_jenis_identitas.value = jenis_identitas;
    document.form_tampung.js_no_identitas.value = no_identitas;
    document.form_tampung.js_tgl_lahir.value = tgl_lahir;
    document.form_tampung.js_tgl_installasi.value = tgl_installasi;

    // Auto submit form tampung
    document.getElementById('form_tampung').submit();
  </script> -->

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

  <!-- KONFIRMASI EMAIL -->
  <script>
      window.onload = function(){
        document.getElementById("email").onchange = validateEmail;
        document.getElementById("konfirmasi_email").onchange = validateEmail;
      }

      function alert(){
        Swal.fire({
          icon: 'error',
          title: 'Maaf...',
          text: 'Konfirmasi Email Tidak Sama !'
        })
      }

      function validateEmail(){
        var konf_email = document.getElementById("konfirmasi_email").value;
        var email = document.getElementById("email").value;

        if(email!=konf_email)
          document.getElementById("konfirmasi_email").setCustomValidity(alert());
        else
          document.getElementById("konfirmasi_email").setCustomValidity('');
      }
  </script>


</body>

</html>