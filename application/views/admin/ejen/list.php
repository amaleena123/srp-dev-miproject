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
              <h6 class="m-0 font-weight-bold text-primary">Senarai Ejen Pendaftar</h6>
	      <a href="<?php echo site_url('admin/ejen/add') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i>Cipta Rekod</a>

	    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Carian Nama/myKad ..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

	    </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-sm" id="ejen_list" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nama Ejen</th>
                      <th>No Kad Pengenalan</th>
                      <th>Telefon</th>
                      <th>E-mel</th>
                      <th>Negeri</th>
                      <th>Tindakan</th>
                    </tr>
		  </thead>
		  <tbody>
		    <?php foreach ($ejens as $ejen): ?>
                    <tr>
		      <td><?php echo $ejen->ejen_firstnama .' '. $ejen->ejen_lastnama; ?>
                      <td><?php echo $ejen->ejen_mykad; ?></td>
                      <td><?php echo $ejen->ejen_telefon; ?></td>
                      <td><?php echo $ejen->ejen_emel; ?></td>
                      <td><?php echo $ejen->ejen_negeri; ?></td>
                      <td>
                        <a href="JavaScript:void(0)" id="display-ejen" data-id="<?php echo $ejen->ejen_id; ?>" class="btn btn-info">Butiran
                        </a>
                        <a href="JavaScript:void(0)" id="edit-ejen" data-id="<?php echo $ejen->ejen_id; ?>" class="btn btn-warning">Kemaskini
                        </a>
                         <a href="JavaScript:void(0)" id="archive-ejen" data-id="<?php echo $ejen->ejen_id; ?>" class="btn btn-danger">Arkib
                        </a>
                      <td>
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

      <!-- Model for add edit product -->
   <div class="modal fade" id="ajax-ejen-modal" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <h4 class="modal-title" id="ejenCrudModal"></h4>
            </div>
            <div class="modal-body">
               <form id="productForm" name="productForm" class="form-horizontal">
                  <input type="hidden" name="ejen_id" id="ejen_id">
                  <div class="form-group">
                     <label for="name" class="col-sm-2 control-label">Title</label>
                     <div class="col-sm-12">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter Tilte" value="" maxlength="50" required="">
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="name" class="col-sm-2 control-label">Product Code</label>
                     <div class="col-sm-12">
                        <input type="text" class="form-control" id="product_code" name="product_code" placeholder="Enter Product Code" value="" maxlength="50" required="">
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-sm-2 control-label">Description</label>
                     <div class="col-sm-12">
                        <input type="text" class="form-control" id="description" name="description" placeholder="Enter Description" value="" required="">
                     </div>
                  </div>
                  <div class="col-sm-offset-2 col-sm-10">
                     <button type="submit" class="btn btn-primary" id="btn-save" value="create">Save changes
                     </button>
                  </div>
               </form>
            </div>
            <div class="modal-footer">
            </div>
         </div>
      </div>
   </div>

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

  <script>
   var SITEURL = '<?php echo base_url(); ?>';
 
   $(document).ready(function () {
 
      $("#ejen_list").DataTable();
 
      /*  When user click add user button */
 
      $('#create-new-ejen').click(function () {
         $('#btn-save').val("create-ejen");
         $('#ejen_id').val('');
         $('#ejenForm').trigger("reset");
         $('#ejenCrudModal').html("Tambah Ejen");
         $('#ajax-product-modal').modal('show');
      });
 
      /* When click edit ejen */
 
      $('body').on('click', '#edit-ejen', function () {
 
         var ejen_id = $(this).data("ejen_id");
 
         $.ajax({
            type: "Post",
            url: SITEURL + "ejen/get_ejen_by_id",
            data: {
               id: ejen_id
            },
            dataType: "json",
            success: function (res) {
               if (res.success == true) {
                  $('#title-error').hide();
                  $('#product_code-error').hide();
                  $('#description-error').hide();
                  $('#ejenCrudModal').html("Kemaskini Ejen");
                  $('#btn-save').val("kemaskini-ejen");
                  $('#ajax-product-modal').modal('show');
                  $('#ejen_id').val(res.data.id);
                  $('#title').val(res.data.title);
                  $('#product_code').val(res.data.product_code);
                  $('#description').val(res.data.description);
               }
            },
            error: function (data) {
               console.log('Error:', data);
            }
         });
      });
 
      $('body').on('click', '#archive-ejen', function () {
 
         var product_id = $(this).data("id");
 
         if (confirm("Are You sure want to archive !")) {
            $.ajax({
               type: "Post",
               url: SITEURL + "ejen/archive",
               data: {
                  ejen_id: ejen_id
               },
               dataType: "json",
               success: function (data) {
                  $("#product_id_" + product_id).remove();
               },
               error: function (data) {
                  console.log('Error:', data);
               }
            });
         }
      });
 
   });
 
   if ($("#productForm").length > 0) {
      $("#productForm").validate({
 
         submitHandler: function (form) {
 
            var actionType = $('#btn-save').val();
 
            $('#btn-save').html('Sending..');
 
            $.ajax({
               data: $('#ejenForm').serialize(),
               url: SITEURL + "ejen/store",
               type: "POST",
               dataType: 'json',
               success: function (res) {
                  
                 var product = '<tr id="product_id_' + res.data.id + '"><td>' + res.data.id + '</td><td>' + res.data.title + '</td><td>' + res.data.product_code + '</td><td>' + res.data.description + '</td>';
                 product += '<td><a href="javascript:void(0)" id="edit-product" res.data-id="' + res.data.id + '" class="btn btn-info">Edit</a><a href="javascript:void(0)" id="delete-product" res.data-id="' + res.data.id + '" class="btn btn-danger delete-user">Delete</a></td></tr>';
                 
                 if (actionType == "create-product") {
                   
                     $('#ejen_list').prepend(product);
                 } else {
                     $("#ejen_id_" + res.data.id).replaceWith(product);
                 }
 
                  $('#productForm').trigger("reset");
                  $('#ajax-product-modal').modal('hide');
                  $('#btn-save').html('Save Changes');
               },
               error: function (data) {
                  console.log('Error:', data);
                  $('#btn-save').html('Save Changes');
               }
            });
         }
      })
   } 
</script>
</body>

</html>

