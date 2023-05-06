<?php
ob_start(); 
    include "../../include/koneksi.php";
    $id = $_POST['id_paket'];
    $sql = "SELECT * FROM tb_paket where id_paket='$id'";
    $query = mysqli_query($koneksi, $sql);
    $result = array();
    while ($data = mysqli_fetch_array($query)) {
        $result[] = $data;
    }

    //  insert data to sql 
    if(isset($_POST['metode_bayar_pembayaran'])){
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
        $va_bayar = $_POST['va_bayar'];
        $bank_bayar = $_POST['bank_bayar'];

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
    }
    
        $sql = $koneksi->query("
                    insert into tb_pembelian (
                        nama,
                        invoice,
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
                            '$nama_lengkap',
                            '$no_invoice',
                            '$paket',
                            '$harga',
                            '$tlp',
                            '$email',
                            '$alamat',
                            '$jenis_id',
                            '$no_identitas',
                            '$tgl_lahir',
                            '$metode_bayar',
                            '$tgl_installasi',
                            '0',
                            '$va_bayar',
                            '$bank_bayar',
                            null,
                            '-'
                            ) ");
    
    if($sql){

    // Cetak INvoice PDF
    require_once "../../vendor/autoload.php";
    $mpdf = new mPDF();
    $mpdf->AddPage("P","","","","","15","15","15","15","","","","","","","","","","","","A4");
    
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

  <!-- =======================================================
  * Template Name: Gp - v4.9.1
  * Template URL: https://bootstrapmade.com/gp-free-multipurpose-html-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <main id="main">
    <!-- ======= Beli Paket ======= -->
    <section id="belipaket" class="belipaket">
      <div class="container" data-aos="fade-up">
      <?php foreach($result as $paket) { ?>
      
        <div class="row mt-3">

          <div class="col-lg-8 mt-5 mt-lg-0">
            <!-- Pengambilan data dari form beli paket -->
            <?php 

            if(isset($_POST['metode_bayar_pembayaran'])){
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
                        <div class="col-md-6 col-md-offset-3 body-main">
                            <div class="col-md-12">
                            <div class="row">
                                    
                                    <div class="col-md-8 text-right">
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
                                            <tr>
                                                <td class="col-md-9">Nomor Invoice</td>
                                                <td class="col-md-3"><i class="fas fa-rupee-sign" area-hidden="true"></i>: <?php echo($no_invoice);?></td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-9">Nama Lengkap</td>
                                                <td class="col-md-3"><i class="fas fa-rupee-sign" area-hidden="true"></i>: <?php echo($nama_lengkap);?></td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-9">Tipe Identitas</td>
                                                <td class="col-md-3"><i class="fas fa-rupee-sign" area-hidden="true"></i>: <?php echo($jenis_id);?></td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-9">Nomor Identitas</td>
                                                <td class="col-md-3"><i class="fas fa-rupee-sign" area-hidden="true"></i>: <?php echo($no_identitas);?></td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-9">Email</td>
                                                <td class="col-md-3"><i class="fas fa-rupee-sign" area-hidden="true"></i>: <?php echo($email);?></td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-9">Nomor Telephone</td>
                                                <td class="col-md-3"><i class="fas fa-rupee-sign" area-hidden="true"></i>: <?php echo($tlp);?></td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-9">Tanggal Lahir</td>
                                                <td class="col-md-3"><i class="fas fa-rupee-sign" area-hidden="true"></i>: <?php echo($tgl_lahir);?></td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-9">Alamat</td>
                                                <td class="col-md-3"><i class="fas fa-rupee-sign" area-hidden="true"></i>: <?php echo($alamat);?></td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-9">Tanggal Installasi</td>
                                                <td class="col-md-3"><i class="fas fa-rupee-sign" area-hidden="true"></i>: <?php echo($tgl_installasi);?></td>
                                            </tr>
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
                                                    <h6><b><strong style="font-family:monospace"><?php echo($bank_bayar);?></strong></b></h6>
                                                    <h6 style="color:black;"><strong style="font-family:monospace"><?php echo($va_bayar);?></strong></h6>
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
            
     
              

            <?php } ?>
            <?php  } ?>
          </div>

        </div>

      </div>
    </section><!-- Akhir Beli Paket -->

   


  </main><!-- End #main -->
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
<?php
$html = ob_get_contents(); 
 ob_end_clean();
 $mpdf->WriteHTML(utf8_encode($html));
 $mpdf->Output("Virtual Account-Pemesanan-BNET.pdf",'D');
//  $mpdf->Output();
?>

<?php } ?>