<!DOCTYPE html>
<html lang="en">
   <head> 
   <title>Codeigniter Ajax Crud Tutorial Without Reload Page- Tuts Make</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
   <link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
   <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
   <style type="text/css">
      .error{
      color: red;
      }
   </style>


<script>
   var SITEURL = '<?php echo base_url(); ?>';
 
   $(document).ready(function () {
 
      $("#ejen_list").DataTable();
 
      /*  When user click add user button */
 
      $('#create-new-ejen').click(function () {
         $('#btn-save').val("create-ejen");
         $('#ejen_id').val('');
         $('#ejenForm').trigger("reset");
         $('#ejenCrudModal').html("Add New ejen");
         $('#ajax-ejen-modal').modal('show');
      });
 
      /* When click edit user */
 
      $('body').on('click', '#edit-ejen', function () {
 
         var ejen_id = $(this).data("id"); //data = 
 
         $.ajax({
            type: "Post",
            url: SITEURL + "ejen/get_ejen_by_id", //controller
            data: {
               id: ejen_id // ejen_id
            },
            dataType: "json",
            success: function (res) {
               if (res.success == true) {
                  $('#title-error').hide();
                  $('#ejen_code-error').hide();
                  $('#description-error').hide();
                  $('#ejenCrudModal').html("Edit ejen");
                  $('#btn-save').val("edit-ejen");
                  $('#ajax-ejen-modal').modal('show');
                  $('#ejen_id').val(res.data.id);
                  $('#title').val(res.data.title);
                  $('#ejen_code').val(res.data.ejen_code);
                  $('#description').val(res.data.description);
               }
            },
            error: function (data) {
               console.log('Error:', data);
            }
         });
      });
 
      $('body').on('click', '#delete-ejen', function () {
 
         var ejen_id = $(this).data("id");
 
         if (confirm("Are You sure want to delete !")) {
            $.ajax({
               type: "Post",
               url: SITEURL + "ejen/delete",
               data: {
                  ejen_id: ejen_id
               },
               dataType: "json",
               success: function (data) {
                  $("#ejen_id_" + ejen_id).remove();
               },
               error: function (data) {
                  console.log('Error:', data);
               }
            });
         }
      });
 
   });
 
   if ($("#ejenForm").length > 0) {
      $("#ejenForm").validate({
 
         submitHandler: function (form) {
 
            var actionType = $('#btn-save').val();
 
            $('#btn-save').html('Sending..');
 
            $.ajax({
               data: $('#ejenForm').serialize(),
               url: SITEURL + "ejen/store",
               type: "POST",
               dataType: 'json',
               success: function (res) {
                  
                 var ejen = '<tr id="ejen_id_' + res.data.id + '"><td>' + res.data.id + '</td><td>' + res.data.title + '</td><td>' + res.data.ejen_code + '</td><td>' + res.data.description + '</td>';
                 ejen += '<td><a href="javascript:void(0)" id="edit-ejen" res.data-id="' + res.data.id + '" class="btn btn-info">Edit</a><a href="javascript:void(0)" id="delete-ejen" res.data-id="' + res.data.id + '" class="btn btn-danger delete-user">Delete</a></td></tr>';
                 
                 if (actionType == "create-ejen") {
                   
                     $('#ejen_list').prepend(ejen);
                 } else {
                     $("#ejen_id_" + res.data.id).replaceWith(ejen);
                 }
 
                  $('#ejenForm').trigger("reset");
                  $('#ajax-ejen-modal').modal('hide');
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

   
   </head>
   <body>
   <div class="container">
      <h2>Sistem Rekod Pendaftaran - <a href="https://www.tutsmake.com" target="_blank">TutsMake</a></h2>
      <br>
      <a href="https://www.tutsmake.com/codeigniter-3-create-first-ajax-crud-application" class="btn btn-secondary">Back to Post</a>
      <a href="javascript:void(0)" class="btn btn-info ml-3" id="create-new-ejen">Add New</a>
      <br><br>
      <table class="table table-bordered table-striped" id="ejen_list">
         <thead>
            <tr>
               <th>ID</th>
               <th>Nama Ejen</th>
               <th>Syarikat</th>
               <th>Negeri</th>
               <th>Action</th>
            </tr>
         </thead>
         <tbody>
            <?php if($ejens): ?>   
            <?php foreach($ejens as $ejen):?>
            <tr id="ejen_id_<?php echo $ejen->ejen_id;?>">
               <td><?php echo $ejen->ejen_id;?></td>
               <td><?php echo $ejen->ejen_firstnama.' '.$ejen->ejen_lastnama ;?></td>
               <td><?php echo $ejen->ejen_syarikat;?></td>
               <td><?php echo $ejen->ejen_negeri;?></td>
               <td>
                  <a href="javascript:void(0)" id="edit-ejen" data-id="<?php echo $ejen->ejen_id;?>" class="btn btn-info">Edit</a>
                  <a href="javascript:void(0)" id="delete-ejen" data-id="<?php echo $ejen->ejen_id;?>" class="btn btn-danger delete-user">Delete</a>
               </td>
            </tr>
            <?php endforeach;?>
            <?php endif; ?> 
         </tbody>
      </table>
   </div>
 
   <!-- Model for add edit ejen -->
   <div class="modal fade" id="ajax-ejen-modal" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <h4 class="modal-title" id="ejenCrudModal"></h4>
            </div>
            <div class="modal-body">
               <form id="ejenForm" name="ejenForm" class="form-horizontal">
                  <input type="hidden" name="ejen_id" id="ejen_id">
                  <div class="form-group">
                     <label for="name" class="col-sm-2 control-label">Title</label>
                     <div class="col-sm-12">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter Tilte" value="" maxlength="50" required="">
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="name" class="col-sm-2 control-label">ejen Code</label>
                     <div class="col-sm-12">
                        <input type="text" class="form-control" id="ejen_code" name="ejen_code" placeholder="Enter ejen Code" value="" maxlength="50" required="">
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
   </body>
 
 
</html>