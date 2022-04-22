<script>
    // $(document).ready(function() { 
    //     $(".custommenu").select2();
    // });


    const DrawTable = (obj) => {
        var table = $('#designation').DataTable();
        let data = [];
        if (obj.length) {
            obj.forEach((el, i) => {
                let action = `<a href="#" class="edit" data-id="${el.id}"> <i class="fa fa-edit edit-details text-white me-1  text-center rounded"></i></a> <a href="#" class="delete" data-id="${el.id}"> <i class="fa fa-trash-o delete-details text-white bg-danger text-center rounded"></i> </a>`;
                let rowData = [
                    ++i,
                    el.title,
                    action
                ];
                data.push(rowData);
            });
        }
        table.destroy();
        $('#designation').DataTable({
            data: data
        });
    }

    const loadTableData = () => {
        let url = "<?= base_url('api/hr/designation/list'); ?>";
        $.ajax({
            url: url,
            type: 'get',
            beforeSend: function() {},
            success: function(res) {
                DrawTable(res.data);
            },
            error: function(res, data) {
                DrawTable(res.responseJSON.data);
            }
        });
    };

    $(document).ready(function() {
        loadTableData();
        /**
         * Event is used to assign the property to user
         */
        $(document).on('submit', '#designationForm', function(e) {

            //     e.preventDefault();

            //     let url = "<?= base_url('api/hr/designation/save'); ?>";
            //     let formData = $(this).serialize();
            //     if ($('#rowid').length) {
            //         url = "<?= base_url('api/hr/designation/update'); ?>";
            //     }

            //     if (formData) {
            //         $.ajax({
            //             url: url,
            //             type: 'POST',
            //             data: formData,
            //             beforeSend: function() {},
            //             success: function(res) {

            //                 Swal.fire({
            //                     icon: 'success',
            //                     text: res.message,
            //                     showConfirmButton: false,
            //                     timer: 1500
            //                 })
            //                 loadTableData();
            //             },
            //             error: function(res, data) {

            //                 Swal.fire({
            //                     icon: 'info',
            //                     title: 'Oops...',
            //                     text: res.responseJSON.message,
            //                     showConfirmButton: false,
            //                     timer: 1500
            //                 })
            //                 loadTableData();
            //             }
            //         });

            //     }

        });

        
        
         $(document).on('submit', '#designationFormRoles', function(e) {
            e.preventDefault();

            let url = "<?= base_url('api/hr/designation/save'); ?>";
            let formData = $(this).serialize();
            if ($('#rowid').length) {
                url = "<?= base_url('api/hr/designation/update'); ?>";
            }

            if (formData) {
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: formData,
                    beforeSend: function() {},
                    success: function(res) {
                        Swal.fire({
                            icon: 'success',
                            text: res.message,
                            showConfirmButton: false,
                            timer: 1500
                        })
                        loadTableData();
                    },
                    error: function(res, data) {
                        console.log(res);
                        // Swal.fire({
                        //     icon: 'info',
                        //     title: 'Oops...',
                        //     text: res.responseJSON.message,
                        //     showConfirmButton: false,
                        //     timer: 1500
                        // })
                        loadTableData();
                    }
                });

            }
        });

        /**
         * Event is used to update assiged data
         */
        $(document).on('click', '.edit', function(e) {
            e.preventDefault();
            let id = $(this).attr('data-id');
            let url = '<?= base_url('api/hr/designation/show') ?>' + '/' + id;
            $.ajax({
                url: url,
                type: 'get',
                success: function(res) {
                    res = res.data[0];
                    if (res) {
                        let rowId = `<input type='hidden' id='rowid' value=${res.id} name='rowid'>`;
                        $(`#designationname`).val(res.title);
                        $(`#btnSubmit`).text('Update');
                        $(`#designationmdl2`).text('Update Designation');

                        $('#designationForm').append(rowId);
                    }

                    $('#designationmodal2').modal('show');
                },
                error: function(res, data) {
                    Swal.fire({
                        icon: 'info',
                        title: 'Oops...',
                        text: res.responseJSON.messages.data.message,
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            });


        });


        /**
         * Event is used to update assiged data
         */
        $(document).on('click', '.delete', function(e) {
            e.preventDefault();
            let id = $(this).attr('data-id');
            let url = '<?= base_url('api/hr/designation/delete') ?>';
            Swal.fire({
                title: 'Do you want to delete?',
                showCancelButton: true,
                confirmButtonText: 'Delete',
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.ajax({
                        url: url,
                        type: 'Post',
                        data: {
                            id
                        },
                        success: function(res) {
                            Swal.fire({
                                icon: 'success',
                                text: res.message,
                                showConfirmButton: false,
                                timer: 1500
                            })
                            loadTableData();
                        },
                        error: function(res, data) {

                            Swal.fire({
                                icon: 'info',
                                title: 'Oops...',
                                text: res.responseJSON.messages,
                                showConfirmButton: false,
                                timer: 1500
                            })
                        }
                    });
                } else if (result.isDenied) {
                    Swal.fire('Changes are not saved', '', 'info')
                }
            })
        });


        $('#btnAddDesignation').on('click', function(e) {
            e.preventDefault();
            $(`#btnSubmit`).text('Add');
            $(`#designationmdl2`).text('Add Designation');
            $('#designationForm').trigger("reset");
        });
    })

    $(document).ready(function(){
       
        $('#modulescheckbox').click(function(){
            if($(this).prop("checked") == true){                         
                $('#modulemenu').removeClass('d-none');
            }
            else if($(this).prop("checked") == false){                
                $('#modulemenu').addClass('d-none');
            }
        });
    });

    function getCheckValue(value){
        
        if(document.getElementById("checkboxMainMenu"+value).checked == true){
          
            let submenu_display = 'submenu'+value;
            $('.'+submenu_display).removeClass('d-none');
            $('.subsubmenu'+value).removeClass('d-none');
            $(".custommenu").select2();
        }else{
            var count = $('#SubMenuCount'+value).val();
            // for (let i=1; i<=count; i++){
            //     document.getElementById("sub_menu"+value+i).checked = false;                
            // }
            let submenu_display = 'submenu'+value;
            $('.'+submenu_display).addClass('d-none');
            $('.subsubmenu'+value).addClass('d-none');
        }

      
    }
    

</script>