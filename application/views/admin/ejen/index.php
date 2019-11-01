<!DOCTYPE html>
<html lang="en">
<head>
   <title>Sistem Rekod Pendaftaran</title>
   <?php $this->load->view("admin/_partials/head.php") ?>
   
   <style type="text/css">
      .error{
         color: red;
      }
   </style>

   <script>
      var SITEURL = '<?php echo base_url(); ?>';
      $(document).ready(function () {
         $("#ejen_list").DataTable();

         <?php /*  When user click add ejen button */ ?>
         $('#create-new-ejen').click(function () {
            $('#btn-save').val("create-ejen");
            $('#ejen_id').val('');
            $('#ejenForm').trigger("reset");
            $('#ejenCrudModal').html("Tambah Ejen Baru");
            $('#ajax-ejen-modal').modal('show');
            $("#ejen_is_kemaskini").hide();
         });

         <?php /* When user click kemaskini user */ ?>
         $('body').on('click', '.edit-ejen-row', function () {
            ajax_edit_form($(this));
         });

         <?php /* When user click butiran user */ ?>
         $('body').on('click', '.show-ejen-row', function () {
            ajax_show_detail($(this));
         });

         $('body').on('click', '#delete-ejen', function () {

            var ejen_id = $(this).data("id");
            var ejen_fullname = $(this).data("fullname");
         
            if (confirm("Hapus Rekod '"+ejen_fullname+"'?")) {
               $.ajax( {
                  type: "POST",
                  url: SITEURL + "admin/ejen/delete",
                  data: {
                     ejen_id: ejen_id,
                     ejen_status: 3
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
                        var ejenprofile_status = '';
                        
                        if(res.data.status == 1 )
                           ejenprofile_status='Aktif';
                        if(res.data.status == 2 )
                           ejenprofile_status='Tidak Aktif';

                        var ejen = '<td>' + res.data.id + '</td><td>' + res.data.firstnama+' '+res.data.lastnama+ '</td><td>' + res.data.syarikat + '</td><td>' + ejenprofile_status + '</td><td>' + res.data.negeri + '</td>';
                        ejen += '<td><a href="javascript:void(0)" id="show-ejen" data-id="' + res.data.id + '" class="btn btn-info show-ejen-row">Butiran</a> ';
                        ejen += '<a href="javascript:void(0)" id="edit-ejen" data-id="' + res.data.id + '" class="btn btn-info edit-ejen-row">Kemaskini</a> ';
                        ejen += '<a href="javascript:void(0)" id="delete-ejen" data-id="' + res.data.id + '" data-id="' + res.data.status + '"  data-fullname="' + res.data.firstnama +" "+ res.data.lastnama  +'"class="btn btn-danger delete-user">Hapus</a></td>';

                        if (actionType == "create-ejen") {
                           $('#ejen_list').prepend(ejen);
                        } else {
                           $("#ejen_id_" + res.data.id).html(ejen);
                        }

                        $("#ejen_is_kemaskini").show();
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
   function ajax_show_detail(elem){
      var ejen_id = elem.data("id");
            
      <?php /* Make sure #clone-modal-form is empty each time click this */?>
      $("#clone-modal-form").empty(); 
      
      <?php /* Process cloning the form into #clone-modal-form  */?>
      $("#ajax-ejen-modal").clone().appendTo("#clone-modal-form");
      $("#clone-modal-form > #ajax-ejen-modal").attr({"id":"ajax-ejen-modal-2"});
      $("#ajax-ejen-modal-2").find("form").remove();
      $("#ajax-ejen-modal").find("form").children().clone().appendTo("#ajax-ejen-modal-2 > .modal-dialog > .modal-content > .modal-body");
      
      $.ajax({
         type: "POST",
         url: SITEURL + "admin/ejen/get_ejen_by_id",
         data: {
            id: ejen_id
         },
         dataType: "json",
         success: function (res) {
            if (res.success == true) {
                  var ejenprofile_status = '';
                  var ejenprofile_gender = '';
                  
                  var this_modal_elems  = '#ajax-ejen-modal-2 > .modal-dialog > .modal-content > .modal-body'; 
                  $('#ajax-ejen-modal-2 #ejenCrudModal').html("Butiran Ejen");
                  $(this_modal_elems+' #btn-save').hide();
                  $('#ajax-ejen-modal-2').modal('show');
                  $('#ejen_id').val(res.data.id);
 
                  var fieldform = [ "mypestid", "kategori", "firstnama", "lastnama", "mykad", "jantina", "telefon", "emel", "emel2", "alamat1", "alamat2", "bandar", "poskod", "negeri", "negara", "syarikat", "noroc","status"];
                  $.each( fieldform, function( i, val ){
                     if(val=='status')
                     {
                        if(res.data[val] == 1 )
                           ejenprofile_status='Aktif';
                        if(res.data[val] == 2 )
                           ejenprofile_status='Tidak Aktif';
      
                        $(this_modal_elems+" select[name='"+val+"'").replaceWith("<div style='border-top:1px solid #CCC'>"+ejenprofile_status+"</div>");
                     
                     }
                     else if(val=='jantina')
                     {
                        if(res.data[val] == 'M' )
                           ejenprofile_gender='Lelaki';
                        if(res.data[val] == 'F' )
                           ejenprofile_gender='Perempuan';

                        /* $("select[name='"+val+"'")
                        .attr({'disabled':'true'})
                        .val(res.data[val]); */

                        $(this_modal_elems+" select[name='"+val+"'").replaceWith("<div style='border-top:1px solid #CCC'>"+ejenprofile_gender+"</div>");
                     }
                     else{

                        /* $("input[name='"+val+"'")
                        .attr({'readonly':'true'})
                        .val(res.data[val]); */
                     
                        $(this_modal_elems+" input[name='"+val+"'").replaceWith("<div style='border-top:1px solid #CCC'>"+res.data[val]+"</div>");
                     }


                  });
            }
         } 
      });
   }
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
               if (res.success == true) {
                  $('#title-error').hide();
                  $('#ejen_code-error').hide();
                  $('#description-error').hide();
                  $('#ejenCrudModal').html("Kemaskini Ejen");
                  $('#btn-save').val("edit-ejen");
                  $('#ajax-ejen-modal').modal('show');
                  $('#ejen_id').val(res.data.id);

                  //To add new field form instead write one by one line   
                  var fieldform = [ "mypestid", "kategori", "firstnama", "lastnama", "mykad", "jantina", "telefon", "emel", "emel2", "alamat1", "alamat2", "bandar", "poskod", "negeri", "negara", "syarikat", "noroc", "status"];
                  $.each( fieldform, function( i, val ){
                     $("#"+val).val(res.data[val]);
                  });
               }
               
               $("#ejen_is_kemaskini").show();
            },
            error: function (data) {
               console.log('Error:', data);
            }
         });
   }

});
</script>

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
            <!-- End Page Heading -->

            <div class="container">
               <br>
               <a href="javascript:void(0)" class="btn btn-info ml-3" id="create-new-ejen">Daftar Ejen</a>
               <br><br>
               <table class="table table-bordered table-striped" id="ejen_list">
                  <thead>
                     <tr>
                        <th>ID</th>
                        <th>Nama Ejen</th>
                        <th>Syarikat</th>
                        <th>Status</th>
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
                              <td>
                                 <?php 
                                 if ($ejen->ejen_status == 1) {
                                    echo "Aktif"; 
                                 } 
                                 if ($ejen->ejen_status == 2) {
                                    echo "Tidak Aktif";
                                 }
                                 ?>
                              </td>
                              <td><?php echo $ejen->ejen_negeri;?></td>
                              <td>
                                 <a href="javascript:void(0)" id="show-ejen" data-id="<?php echo $ejen->ejen_id;?>" class="btn btn-info show-ejen-row">Butiran</a>
                                 <a href="javascript:void(0)" id="edit-ejen" data-id="<?php echo $ejen->ejen_id;?>" class="btn btn-info edit-ejen-row">Kemaskini</a>
                                 <a href="javascript:void(0)" id="delete-ejen" data-id="<?php echo $ejen->ejen_id;?>" data-fullname="<?php echo $ejen->ejen_firstnama.' '.$ejen->ejen_lastnama;?>" class="btn btn-danger delete-user">Hapus</a>
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
                              <div class="row">
                                 <div class="col-md-6">
                                       <label for="name" class="col-sm-2 control-label">MyPestID</label>
                                       <div class="col-sm-12">
                                          <input type="text" class="form-control" id="mypestid" name="mypestid" placeholder="Masukkan MyPestID" value="" maxlength="50" required="">
                                       </div>
                                 </div>
                                 <div class="col-md-6" id="ejen_is_kemaskini">
                                    <label for="name" class="col-sm-2 control-label">Status</label>
                                    <div class="col-sm-12">
                                       <select class="browser-default custom-select required" id="status" name="status">
                                          <option selected value="">--Pilih Status--</option>
                                          <option value="1">Aktif</option>
                                          <option value="2">Tidak Aktif</option>
                                       </select>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="name" class="col-sm-2 control-label">Firstname</label>
                              <div class="col-sm-12">
                                 <input type="text" class="form-control" id="firstnama" name="firstnama" placeholder="Masukkan Nama Ejen" value="" maxlength="50" required="">
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
                              <label for="name" class="col-sm-12 control-label">Emel 2</label>
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
            
            <div id="clone-modal-form"></div>


              <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <?php $this->load->view("admin/_partials/modal.php") ?>

  <!-- Bootstrap core JavaScript-->
  <?php //$this->load->view("admin/_partials/js.php") <--- include file ni hanya letak dalam page Dashboard. Jangan letak sini nanti conflict dengan current jquery lib dalam Ejen ?> 
         </body>
         </html>
