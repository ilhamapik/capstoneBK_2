

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Starter</title>

  <!-- Google Font: Source Sans Pro -->
      <!-- Google Font: Source Sans Pro -->
	  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/AdminLTE/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="assets/AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/AdminLTE/dist/css/adminlte.min.css">
</head>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../index3.html" class="brand-link">
      <img src="assets/AdminLTE/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
        <!-- You can replace the src attribute with the path to the user's profile image -->
        <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
        <a href="#" class="d-block">
            Selamat Datang, <b><?php echo $_SESSION['Nama']; ?>&nbsp;(<?php echo $_SESSION['Level']; ?>)</b>
        </a>
        <!-- Add the logout link with confirmation -->
        <font color="black">
            <a id="logout" href="logout.php" onclick="return confirm('Apakah anda yakin untuk logout, <?php echo $_SESSION['Nama']; ?>?')">Logout</a>
        </font>
    </div>
</div>

	  <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
	<?php if ($_SESSION['Level'] == "Superadmin") { ?>
		<li class="nav-item">
	<a href="halaman_utama.php?home=$home" class="nav-link">
		<i class="nav-icon far fa-image"></i>
		<p>Home</p>
	</a>
	</li>
		<li class="nav-item">
		<a href="halaman_utama.php?tabel_dokter=$tabel_dokter" class="nav-link">
		<i class="nav-icon far fa-image"></i>
		<p>Dokter</p>
		</a>
	</li>
	<?php } ?>

	<li class="nav-item">
	<a href="halaman_utama.php?tabel_poli=$tabel_poli" class="nav-link">
		<i class="nav-icon far fa-image"></i>
		<p>Poli</p>
	</a>
	</li>

	<?php if ($_SESSION['Level'] == "Superadmin") { ?>
	<li class="nav-item">
		<a href="halaman_utama.php?tabel_login=$tabel_login" class="nav-link">
		<i class="nav-icon far fa-image"></i>
		<p>Account</p>
		</a>
	</li>
	<?php } else { ?>
	<li class="nav-item">
		<a href="halaman_utama.php?informasi_akun=$informasi_akun" class="nav-link">
		<i class="nav-icon far fa-image"></i>
		<p>Account</p>
		</a>
	</li>
	<?php } ?>


	 <?php if ($_SESSION['Level'] != "Pasien") { ?>
    <li class="nav-item">
    <a href="halaman_utama.php?tabel_resep=$tabel_resep" class="nav-link">
      <i class="nav-icon far fa-image"></i>
      <p>Resep</p>
    </a>
  </li>
<?php } else { ?>
  <li class="nav-item">
    <a href="halaman_utama.php?informasi_resep=$informasi_resep" class="nav-link">
      <i class="nav-icon far fa-image"></i>
      <p>Resep</p>
    </a>
  </li>
<?php } ?>

<li class="nav-item">
  <a href="halaman_utama.php?tabel_obat=$tabel_obat" class="nav-link">
    <i class="nav-icon far fa-image"></i>
    <p>Obat</p>
  </a>
</li>

<?php if ($_SESSION['Level'] != "Pasien") { ?>
  <li class="nav-item">
    <a href="halaman_utama.php?tabel_pasien=$tabel_pasien" class="nav-link">
      <i class="nav-icon far fa-image"></i>
      <p>Pasien</p>
    </a>
  </li>
<?php } ?>

		<li class="nav-item">
			<?php if ($_SESSION['Level'] == "Superadmin" || $_SESSION['Level'] == "Admin") { ?>
				<a href="halaman_utama.php?tabel_pendaftaran=<?= $tabel_pendaftaran ?>" class="nav-link">
					<i class="nav-icon far fa-image"></i>
					<p>
						Pendaftaran
					</p>
				</a>
			<?php } ?>
		</li>

		<li class="nav-item">
			<?php if ($_SESSION['Level'] != "Pasien") { ?>
			<a href="halaman_utama.php?tabel_detail=$tabel_detail" class="nav-link">
				<i class="nav-icon far fa-image"></i>
				<p>
					Detail
				</p>
        </a>
    	<?php } ?>
		</li>		


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<!-- jQuery -->
<script src="assets/AdminLTE/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/AdminLTE/dist/js/adminlte.min.js"></script>

</body>
</html>
<?php
session_start();
if (empty($_SESSION['Username']) and empty($_SESSION['Password'])) {
	echo "<script type='text/javascript'>
	alert('SILAKAN LOGIN TERLEBIH DAHULU!')
	window.location='index.php';
	</script>";
} else {
?>

	

			<?php

			$aksi_detail = "code/proses/update-delete/aksi_detail.php";
			$aksi_dokter = "code/proses/update-delete/aksi_dokter.php";
			$aksi_login = "code/proses/update-delete/aksi_login.php";
			$aksi_obat = "code/proses/update-delete/aksi_obat.php";
			$aksi_pasien = "code/proses/update-delete/aksi_pasien.php";
			$aksi_poli = "code/proses/update-delete/aksi_poli.php";
			$aksi_resep = "code/proses/update-delete/aksi_resep.php";
			$home = "home.php";
		

			?>

			<div id="konten">
				<?php
				if (isset($_GET['home'])) {
					require_once $home;
				} else if (isset($_GET['aksi_detail'])) {
					require_once $aksi_detail;
				} else if (isset($_GET['aksi_dokter'])) {
					require_once $aksi_dokter;
				} else if (isset($_GET['aksi_login'])) {
					require_once $aksi_login;
				} else if (isset($_GET['aksi_obat'])) {
					require_once $aksi_obat;
				} else if (isset($_GET['aksi_pasien'])) {
					require_once $aksi_pasien;
				} else if (isset($_GET['aksi_poli'])) {
					require_once $aksi_poli;
				}
				?>
	

<?php } ?>
 