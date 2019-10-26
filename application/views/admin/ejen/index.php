<!DOCTYPE html>
<html lang="en">
   <head> 
   <title>Sustem Rekod Pendaftaran - Ejen </title>
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
         $('#ejenCrudModal').html("Tambah Ejen Baru");
         $('#ajax-ejen-modal').modal('show');
      });
 
      /* When click edit user */
 
      $('body').on('click', '.edit-ejen-row', function () {
         ajax_edit_form($(this));
      });
 
      $('body').on('click', '#delete-ejen', function () {
 
         var ejen_id = $(this).data("id");
 
         if (confirm("Are You sure want to delete ID "+ejen_id+"?")) {
            $.ajax({
               type: "POST",
               url: SITEURL + "admin/ejen/delete",
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
 
      if ($("#ejenForm").length > 0) {
         $("#ejenForm").validate({
   
            submitHandler: function (form) {
   
               var actionType = $('#btn-save').val();
   
               $('#btn-save').html('Sending..');
   
               $.ajax({
                  data: $('#ejenForm').serialize(),
                  url: SITEURL + "admin/ejen/store",
                  type: "POST",
                  dataType: 'json',
                  success: function (res) {
                     
                     var ejen = '<td>' + res.data.id + '</td><td>' + res.data.firstnama+' '+res.data.lastnama+ '</td><td>' + res.data.syarikat + '</td><td>' + res.data.negeri + '</td>';
                     ejen += '<td><a href="javascript:void(0)" id="edit-ejen" data-id="' + res.data.id + '" class="btn btn-info edit-ejen-row">Kemaskini</a> ';
                     ejen += '<a href="javascript:void(0)" id="delete-ejen" data-id="' + res.data.id + '" class="btn btn-danger delete-user">Hapus</a></td>';
                  
                     if (actionType == "create-ejen") {
                           $('#ejen_list').prepend(ejen);
                     } else {
                           $("#ejen_id_" + res.data.id).html(ejen);
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


   //functions
   function ajax_edit_form(elem){
      var ejen_id = elem.data("id"); 
      
         $.ajax({
            type: "POST",
            url: SITEURL + "admin/ejen/get_ejen_by_id",
            data: {
               id: ejen_id // ejen_id
            },
            dataType: "json",
            success: function (res) {
               
               console.log(res);
               if (res.success == true) {
                  $('#title-error').hide();
                  $('#ejen_code-error').hide();
                  $('#description-error').hide();
                  $('#ejenCrudModal').html("Edit ejen");
                  $('#btn-save').val("edit-ejen");
                  $('#ajax-ejen-modal').modal('show');
                  $('#ejen_id').val(res.data.id);

                  //New ways : Easy to add new field form instead write one by one line   
                  var fieldform = [ "mypestid", "kategori", "firstnama", "lastnama", "mykad", "jantina", "telefon", "emel", "emel2", "alamat1", "alamat2", "bandar", "poskod", "negeri", "negara", "syarikat", "noroc"];
                  $.each( fieldform, function( i, val ){
                     $("#"+val).val(res.data[val]);
                  });

                  //Old ways one by one add
                  /*
                  $('#firstnama').val(res.data.firstnama);
                  $('#lastnama').val(res.data.lastnama);
                  $('#mykad').val(res.data.mykad);
                  $('#mypestid').val(res.data.mypestid);
                  $('#jantina').val(res.data.jantina);
                  $('#telefon').val(res.data.telefon);
                  $('#emel').val(res.data.emel);
                  $('#emel2').val(res.data.emel2);
                  $('#alamat').val(res.data.alamat);
                  $('#alamat2').val(res.data.alamat2);
                  $('#bandar').val(res.data.bandar);
                  $('#poskod').val(res.data.poskod);
                  $('#negeri').val(res.data.negeri);
                  $('#negara').val(res.data.negara);
                  $('#syarikat').val(res.data.syarikat);
                  $('#noroc').val(res.data.noroc);*/
               }
            },
            error: function (data) {
               console.log('Error:', data);
            }
         });
   }

   });
</script>

   
   </head>
   <body>
   <div class="container">
      <h2>Sistem Rekod Pendaftaran - Ejen</h2>
      <br>
      <a href="<?php echo base_url()?>" class="btn btn-secondary">Back to Post</a>
      <a href="javascript:void(0)" class="btn btn-info ml-3" id="create-new-ejen" >Ejen Baru</a>
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
                  <a href="javascript:void(0)" id="edit-ejen" data-id="<?php echo $ejen->ejen_id;?>" class="btn btn-info edit-ejen-row">Kemaskini</a>
                  <a href="javascript:void(0)" id="delete-ejen" data-id="<?php echo $ejen->ejen_id;?>" class="btn btn-danger delete-user">Hapus</a>
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
                     <label for="name" class="col-sm-6 control-label">MYPestID</label>
                     <div class="col-sm-12">
                        <input type="text" class="form-control" id="mypestid" name="mypestid" placeholder="Masukkan MYPestID" value="" maxlength="50" required="">
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="name" class="col-sm-12 control-label">Firstname</label>
                     <div class="col-sm-12">
                        <input type="text" class="form-control" id="firstnama" name="firstnama" placeholder="Masukkan 'Firstname" value="" maxlength="50" required="">
                     </div>
                  </div>
                  <div class="form-group">      
                     <label for="name" class="col-sm-12 control-label">Lastname</label>
                     <div class="col-sm-12">
                        <input type="text" class="form-control" id="lastnama" name="lastnama" placeholder="Masukkan 'Lastname'" value="" maxlength="50" required="">
                     </div>                 
                  </div>
                  <div class="form-group">
                     <div class="row">
                        <div class="col-md-6">
                           <label for="name" class="col-sm-6 control-label">MyKad</label>
                           <div class="col-sm-12">
                           <input type="text" class="form-control" id="mykad" name="mykad" placeholder="Masukkan MyKad" value="" maxlength="50" required="">
                           </div>
                        </div>
                        <div class="col-sm-6">
                           <label for="name" class="col-sm-6 control-label">Jantina</label>
                           <div class="col-sm-12">
                           <select class="browser-default custom-select required" id="jantina" name="jantina">
                           <option selected value="">--Pilih Jantina--</option>
                           <option value="M">Lelaki</option>
                           <option value="F">Perempuan</option>
                           </select>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="name" class="col-sm-6 control-label">Telefon</label>
                     <div class="col-sm-12">
                        <input type="text" class="form-control" id="telefon" name="telefon" placeholder="Masukkan No. Telefon" value="" maxlength="50" required="">
                     </div>
                  </div>
                  <div class="form-group">
                        <label for="name" class="col-sm-12 control-label">Emel</label>
                        <div class="col-sm-12">
                           <input type="text" class="form-control" id="emel" name="emel" placeholder="Masukkan Emel" value="" maxlength="50" required="">
                        </div>
                  </div>
                  <div class="form-group">
                           <label for="name" class="col-sm-12 control-label">Email 2</label>
                           <div class="col-sm-12">
                              <input type="text" class="form-control" id="emel2" name="emel2" placeholder="Masukkan Emel 2" value="" maxlength="50" required="">
                          </div>
                  </div>
                  <div class="form-group">
                           <label for="name" class="col-sm-12 control-label">Nama Syarikat</label>
                           <div class="col-sm-12">
                              <input type="text" class="form-control" id="syarikat" name="syarikat" placeholder="Masukkan Nama Syarikat" value="" maxlength="50" required="">
                          </div>
                  </div>
                  <div class="form-group">
                           <label for="name" class="col-sm-12 control-label">No. ROC</label>
                           <div class="col-sm-12">
                              <input type="text" class="form-control" id="noroc" name="noroc" placeholder="Masukkan No ROC" value="" maxlength="15" required="">
                          </div>
                  </div>
                  <div class="form-group">
                           <label for="name" class="col-sm-12 control-label">Alamat 1</label>
                           <div class="col-sm-12">
                              <input type="text" class="form-control" id="alamat1" name="alamat1" placeholder="Masukkan Alamat 1" value="" maxlength="50" required="">
                          </div>
                  </div>
                  <div class="form-group">
                           <label for="name" class="col-sm-12 control-label">Alamat 2</label>
                           <div class="col-sm-12">
                              <input type="text" class="form-control" id="alamat2" name="alamat2" placeholder="Masukkan Alamat 2" value="" maxlength="50" required="">
                          </div>
                  </div>
                  <div class="form-group">
                     <div class="row">
                        <div class="col-md-6">
                           <label for="name" class="col-sm-6 control-label">Bandar</label>
                           <div class="col-sm-12">
                           <input type="text" class="form-control" id="bandar" name="bandar" placeholder="Masukkan Bandar" value="" maxlength="50" required="">
                           </div>
                        </div>
                        <div class="col-sm-6">
                           <label for="name" class="col-sm-6 control-label">Poskod</label>
                           <div class="col-sm-12">
                           <input type="text" class="form-control" id="poskod" name="poskod" placeholder="Masukkan Poskod" value="" maxlength="5" required="">
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="row">
                        <div class="col-md-6">
                           <label for="name" class="col-sm-6 control-label">Negeri</label>
                           <div class="col-sm-12">
                           <input type="text" class="form-control" id="negeri" name="negeri" placeholder="Masukkan Negeri" value="" maxlength="50" required="">
                           </div>
                        </div>
                        <div class="col-sm-6">
                           <label for="name" class="col-sm-6 control-label">Negara</label>
                           <div class="col-sm-12">
                           <input type="text" class="form-control" id="negara" name="negara" placeholder="Masukkan Negara" value="" maxlength="50" required="">
                           </div>
                        </div>
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