<?php 


		$id = $_GET['id'];

		$sql=$koneksi->query("delete from tb_metode_bayar where id='$id'");

		if ($sql) {
			?>

				<script>
				    setTimeout(function() {
				        sweetAlert({
				            title: 'OKE!',
				            text: 'Data Berhasil Dihapus!',
				            type: 'warning'
				        }, function() {
				            window.location = '?page=metode_bayar';
				        });
				    }, 300);
				</script>

			<?php
		}

 ?>


