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
	  <h1 class="h3 mb-2 text-gray-800">Tambah Rekod Ejen</h1>

	  <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tambah Rekod Ejen</h6>
            </div>
            <div class="card-body">
	      <div class="table-responsive">
	    <?php echo form_open('admin/ejen/create'); ?>
	    <!-- <form class="user"> -->
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" name="ejen_mypestid" placeholder="ID Pengguna (myPesticide)">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" name="ejen_firstnama" placeholder="Nama">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" name="ejen_lastnama" placeholder="Nama Keluarga">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" name="ejen_mykad" placeholder="No Kad Pengenalan">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" name="ejen_telefon" placeholder="No Telefon">
                  </div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" name="ejen_emel" placeholder="Alamat E-mel">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" name="ejen_emel2" placeholder="Alamat E-mel lain">
                </div>
                <div class="form-group">
                 <input type="text" class="form-control form-control-user" name="ejen_alamat1" placeholder="Alamat 1">
                </div>
                <div class="form-group">
                 <input type="text" class="form-control form-control-user" name="ejen_alamat2" placeholder="Alamat 2">
                </div>
                <div class="form-group">
                 <input type="text" class="form-control form-control-user" name="ejen_bandar" placeholder="Bandar">
                </div>
                <div class="form-group">
                 <input type="text" class="form-control form-control-user" name="ejen_poskod" placeholder="Poskod">
                </div>
                <div class="form-group">
                 <input type="text" class="form-control form-control-user" name="ejen_negeri" placeholder="Negeri">
                </div>
                <div class="form-group">
                 <input type="text" class="form-control form-control-user" name="ejen_negara" placeholder="Negara">
                </div>
                </div>
                <hr>
                <input type="submit" name="submit" value="Tambah Rekod">
		<a href="<?php echo site_url('admin/ejen/index'); ?>"><button> Batal </button>
                </a>
              </form>
		
            </div>
          </div>

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
