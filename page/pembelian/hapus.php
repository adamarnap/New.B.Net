<?php 


		$id_pembelian = $_GET['id'];

		$sql=$koneksi->query("delete from tb_pembelian where id_pembelian='$id_pembelian'");

		if ($sql) {
			?>

				<script>
				    setTimeout(function() {
				        sweetAlert({
				            title: 'OKE!',
				            text: 'Data Berhasil Dihapus!',
				            type: 'error'
				        }, function() {
				            window.location = '?page=pembelian';
				        });
				    }, 300);
				</script>

			<?php
		}

 ?>


