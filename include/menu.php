 <?php 

    $sql2 = $koneksi->query("select * from tb_profile ");

    $data1 = $sql2->fetch_assoc();

 ?>

 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
<div class="user-panel">
  <div>
  <img style="margin-left:30px" src="images/<?php echo $data1['foto'] ?>" width="140" height="120" >
      
      
  </div>
  <div class="pull-left info">


  </div>
</div>
<!-- search form -->
<!-- /.search form -->
<!-- sidebar menu: : style can be found in sidebar.less -->



<ul class="sidebar-menu" data-widget="tree">
  <li class="header">MAIN NAVIGATION</li>
          <?php  if ($_SESSION['admin']){ ?>
            
            <li class="<?php echo $aktifHome; ?>"><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
           

             <li class="<?php echo $aktifprofile; ?>"><a href="?page=profile"><i class="fa fa-gear"></i> Setting </a></li>
            
        

            <li class="<?php echo $aktifAdmin; ?>"><a href="?page=pengguna"><i class="fa fa-users"></i> Pengguna</a></li>

              
            
           

            <li class="treeview <?php echo $aktifA; ?>">
              <a href="#">
                <i class="fa fa-list-alt"></i> <span>Data Master</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="<?php echo $aktifA2; ?>"><a href="?page=paket"><i class="fa fa-circle-o"></i> Data Paket</a></li>
                <li class="<?php echo $aktifPembelian;?>"><a href="?page=pembelian"><i class="fa fa-circle-o"></i> Data Pembelian</a></li>
                <li class="<?php echo $aktifA4; ?>"><a href="?page=pelanggan"><i class="fa fa-circle-o"></i> Data Pelanggan</a></li>
                <li class="<?php echo $aktifA5; ?>"><a href="?page=metode_bayar"><i class="fa fa-circle-o"></i> Data Metode Pembayaran</a></li>
                <li class="<?php echo $aktifA6; ?>"><a href="?page=info"><i class="fa fa-circle-o"></i> Data Master Info</a></li>
              </ul>
            </li>


            <li class="<?php echo $aktifB2; ?>"><a href="?page=kas"><i class="fa fa-exchange"></i>  Kas Masuk dan Keluar</a></li>

            
            
           
           
            <li><a href="?page=transaksi"><i class="fa fa-money"></i> Transaksi Pembayaran</a></li>
            




             <li><a href="?page=laporan"><i class="fa fa-print"></i> Laporan Kas Masuk dan  Keluar </a></li>

             <?php } ?>

              <?php  if ($_SESSION['user']){ ?>


              <li><a href="index.php"><i class="fa fa-money"></i> Data Tagihan</a></li>

               <?php } ?>



            

 

       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
 
