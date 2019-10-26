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

	  <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Senarai Pembekal</h6>
	      <a href="<?php echo site_url('admin/pembekal/add') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i>Cipta Rekod</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No Fail</th>
                      <th>Nama Pembekal</th>
                      <th>Negara</th>
                      <th>Tarikh Pendaftaran</th>
                      <th>Tindakan</th>
                    </tr>
		  </thead>
		  <tbody>
		    <?php foreach ($data as $d): ?>
                    <tr>
		      <td><a href="<?php echo site_url('admin/pembekal/pembekalid/'.$d->pembekal_id); ?>"><?php echo $d->pembekal_lrmp; ?></a>
                      <td><?php echo $d->pembekal_nofail; ?></td>
                      <td><?php echo $d->pembekal_nama; ?></td>
                      <td><?php echo $d->pembekal_negara; ?></td>
                      <td><?php echo $d->pembekal_tarikhdaftar; ?></td>
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

