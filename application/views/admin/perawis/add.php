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
	  <?php $this->load->view("admin/_partials/breadcrumb.php") ?>
          </div>

	   <!-- Page Heading -->
	  <h1 class="h3 mb-2 text-gray-800">Maklumat Am</h1>

	  <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tambah Rekod Dagang</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>LRMP</th>
                      <th>No Fail</th>
                      <th>Nama Dagang</th>
                      <th>Tarikh Pendaftaran</th>
                      <th></th>
                    </tr>
		  </thead>
		  <tbody>
		    <?php foreach ($perawiss as $perawis): ?>
                    <tr>
		      <td><?php echo $perawisaktif->perawis_lrmp ?></a>
                      <td><?php echo $perawisaktif->perawis_nofail ?></td>
                      <td><?php echo $perawisaktif->perawis_nama ?></td>
                      <td><?php echo $perawisaktif->name ?></td>
		    </tr>
		    <?php endforeach; ?>

		  </tbody>
                </table>
              </div>
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

