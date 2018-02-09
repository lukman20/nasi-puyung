//single delete
    $(document).on('click','.single-delete', function(){
    	var url = $(this).data('url');
        swal({   
                title: "Are you sure?",   
                text: "You want to delete this data!",   
                type: "warning",   
                showCancelButton: true,   
                confirmButtonColor: "#DD6B55",   
                confirmButtonText: "Yes, delete it!",   
                closeOnConfirm: true 
            }, function(isConfirm){
                    if(isConfirm){
                        location.replace(url);   
                    }
            });
    });