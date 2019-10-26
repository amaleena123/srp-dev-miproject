
// view Emp details
jQuery(document).on('click', 'a.display-emp', function(){
    var emp_id = jQuery(this).data('geteid');
    jQuery.ajax({
        type:'POST',
        url:baseurl+'curd/display',
        data:{emp_id: emp_id},
        dataType:'html',    
        beforeSend: function () {
            jQuery('#render-display-data').html('<div class="text-center"><i class="fa fa-spinner fa-pulse fa-5x fa-fw"></i></div>');
        },                      
        success: function (html) {
            jQuery('#render-display-data').html(html);
                                 
        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }        
    });
});
// Edit Emp Details
jQuery(document).on('click', 'a.update-emp-details', function(){
    var emp_id = jQuery(this).data('getueid');
    jQuery.ajax({
        type:'POST',
        url:baseurl+'curd/edit',
        data:{emp_id: emp_id},
        dataType:'html',    
        beforeSend: function () {
            jQuery('#render-update-data').html('<div class="text-center"><i class="fa fa-spinner fa-pulse fa-5x fa-fw"></i></div>');
        },                      
        success: function (html) {
            jQuery('#render-update-data').html(html);
                                 
        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }        
    });
});
// set emp id for delete 
jQuery(document).on('click', 'a.delete-em-details', function(){
    var emp_id = jQuery(this).data('getdeid');
    jQuery('button#delete-emp').data('deleteempid', emp_id);

});
// Edit Delete Details
jQuery(document).on('click', 'button#delete-emp', function(){
    var emp_id = jQuery(this).data('deleteempid');
    jQuery.ajax({
        type:'POST',
        url:baseurl+'curd/delete',
        data:{emp_id: emp_id},
        dataType:'html',         
        complete: function () {           
            setTimeout(function () {
                jQuery('tr.empcls-'+emp_id).html('');
            }, 3000);
            jQuery('#delete-employee').modal('hide');
        }, 
        success: function (html) {
            jQuery('tr.empcls-'+emp_id).html('<td colspan="5"><span style="color:red;">Deleted Employee details successfully.</span></td>');
                                 
        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }        
    });
});

// Emp Details Add
jQuery(document).on('click', 'button#add-emp', function(){
    jQuery.ajax({
        type:'POST',
        url:baseurl+'curd/save',
        data:jQuery("form#add-employee-form").serialize(),
        dataType:'json',    
        beforeSend: function () {
            jQuery('button#add-emp').button('loading');
        },
        complete: function () {
            jQuery('button#add-emp').button('reset');
            setTimeout(function () {
                jQuery('span#success-msg').html('');
            }, 5000);
            
        },                
        success: function (json) {
            //console.log(json);
           $('.text-danger').remove();
            if (json['error']) {             
                for (i in json['error']) {
                    var element = $('.input-emp-' + i.replace('_', '-'));
                    if ($(element).parent().hasClass('input-group')) {                       
                        $(element).parent().after('<div class="text-danger" style="font-size: 14px;">' + json['error'][i] + '</div>');
                    } else {
                        $(element).after('<div class="text-danger" style="font-size: 14px;">' + json['error'][i] + '</div>');
                    }
                }
            } else {
                jQuery('span#success-msg').html('<div class="alert alert-success">Employee data has been successfully added.</div>');
                var bindHtml = '';
                bindHtml += '<tr class="empcls-'+json['emp_id']+'">';
                bindHtml += '<td>'+json['first_name']+'</td>';
                bindHtml += '<td>'+json['last_name']+'</td>';
                bindHtml += '<td>'+json['email']+'</td>';
                bindHtml += '<td>'+json['contact_no']+'</td>';
                bindHtml += '<td>'+json['salary']+'</td>';
                bindHtml += '<td>';
                    bindHtml += '<a title="Display" href="javascript:void(0);" data-geteid="'+json['emp_id']+'" data-toggle="modal" data-target="#dispaly-employee" class="display-emp btn btn-info btn-xs"><i class="fa fa-eye"></i> </a>&nbsp;';
                    bindHtml += '<a title="Edit" href="javascript:void(0);" data-getueid="'+json['emp_id']+'" data-toggle="modal" data-target="#update-employee" class="update-emp-details btn btn-primary btn-xs"><i class="fa fa-edit"></i> </a>&nbsp;';
                    bindHtml += '<a title="Delete" href="javascript:void(0);" data-getdeid="'+json['emp_id']+'" data-toggle="modal" data-target="#delete-employee" class="delete-em-details btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>'; 
                bindHtml += '</td>';                                     
                bindHtml += '</tr>';                    
                jQuery('#render-emp-details').prepend(bindHtml);
                jQuery('form#add-employee-form').find('textarea, input').each(function () {
                    jQuery(this).val('');
                });
                jQuery('#add-employee').modal('hide');
                
            }

        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }        
    });
});

// Emp details update
jQuery(document).on('click', 'button#update-emp', function(){
    jQuery.ajax({
        type:'POST',
        url:baseurl+'curd/update',
        data:jQuery("form#update-employee-form").serialize(),
        dataType:'json',    
        beforeSend: function () {
            jQuery('button#update-emp').button('loading');
        },
        complete: function () {
            jQuery('button#update-emp').button('reset');
            setTimeout(function () {
                jQuery('span#success-msg').html('');
            }, 5000);
            
        },                
        success: function (json) {
            //console.log(json);
           $('.text-danger').remove();
            if (json['error']) {             
                for (i in json['error']) {
	                var element = $('.input-emp-' + i.replace('_', '-'));
	                if ($(element).parent().hasClass('input-group')) {                       
		                $(element).parent().after('<div class="text-danger" style="font-size: 14px;">' + json['error'][i] + '</div>');
	                } else {
		                $(element).after('<div class="text-danger" style="font-size: 14px;">' + json['error'][i] + '</div>');
	                }
                }
            } else {
                jQuery('span#success-msg').html('<div class="alert alert-success">Employee data has been successfully updated.</div>');
                var bindHtml = '';
                bindHtml += '<td>'+json['first_name']+'</td>';
                bindHtml += '<td>'+json['last_name']+'</td>';
                bindHtml += '<td>'+json['email']+'</td>';
                bindHtml += '<td>'+json['contact_no']+'</td>';
                bindHtml += '<td>'+json['salary']+'</td>';
                bindHtml += '<td>';
                    bindHtml += '<a title="Display" href="javascript:void(0);" data-geteid="'+json['emp_id']+'" data-toggle="modal" data-target="#dispaly-employee" class="display-emp btn btn-info btn-xs"><i class="fa fa-eye"></i> </a>&nbsp;';
                    bindHtml += '<a title="Edit" href="javascript:void(0);" data-getueid="'+json['emp_id']+'" data-toggle="modal" data-target="#update-employee" class="update-emp-details btn btn-primary btn-xs"><i class="fa fa-edit"></i> </a>&nbsp;';
                    bindHtml += '<a title="Delete" href="javascript:void(0);" data-getdeid="'+json['emp_id']+'" data-toggle="modal" data-target="#delete-employee" class="delete-em-details btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>'; 
                bindHtml += '</td>';                                     
                jQuery('tr.empcls-'+json['emp_id']).html(bindHtml);
                jQuery('form#update-employee-form').find('textarea, input').each(function () {
                    jQuery(this).val('');
                });
                jQuery('#update-employee').modal('hide');
            }                       
        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }        
    });
});