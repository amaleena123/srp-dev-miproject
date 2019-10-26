<!DOCTYPE html>
<html lang="en">

<head>
<?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
<?php $this->load->view("admin/_partials/sidebar.php") ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php $this->load->view("admin/_partials/navbar.php") ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <?php //$this->load->view("admin/_partials/breadcrumb.php") ?>
          </div>

	   <!-- Page Heading -->

		Nama Ejen: <?php echo $ejen->ejen_firstnama; ?> <?php echo $ejen->ejen_lastnama; ?>
		<br />
		Kategori: <?php echo $ejen->ejen_kategori; ?>
		<br />
		Kad Pengenalan: <?php echo $ejen->ejen_mykad; ?>
		<br />
		Jantina: <?php echo $ejen->ejen_jantina; ?>
		<br />
		Telefon: <?php echo $ejen->ejen_telefon; ?>
		<br />
		E-mel: <?php echo $ejen->ejen_emel; ?>
		<br />
		E-mel Lain: <?php echo $ejen->ejen_emel2; ?>
		<br />
		Alamat: <?php echo $ejen->ejen_alamat1; ?> <?php echo $ejen->ejen_alamat2; ?>
		<br />
		Bandar: <?php echo $ejen->ejen_bandar; ?>
		<br />
		Poskod: <?php echo $ejen->ejen_poskod; ?>
		<br />
		Negeri: <?php echo $ejen->ejen_negeri; ?>
		<br />
		Negara: <?php echo $ejen->ejen_negara; ?>
		<br />
		Tarikh Ejen didaftarkan: <?php echo $ejen->ejen_tarikhdaftar; ?>
		
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
        <?php $this->load->view("admin/_partials/footer.php") ?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <?php $this->load->view("admin/_partials/modal.php") ?>

  <!-- Bootstrap core JavaScript-->
  <?php $this->load->view("admin/_partials/js.php") ?>
</body>

</html>
