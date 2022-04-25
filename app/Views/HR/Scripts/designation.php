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
            $(".validation").remove();

            var menu = [];
            var submenu = [];
            // var k =1;
            // var l = 1;
            // $(".custom-menu-class").each(function(i, v) {
            //     // console.log(i);
            //     const check = $(this).find('input:checked');
            //     k++;
            //     // console.log(check);
            //     // if(check.checked)
            //     // if(check){
            //     //     var modId = $(this).val();
            //     //     $(".sub-menu-class-custom").each(function(j) {
            //     //         const check2 = $(this).find('input:checked');
            //     //         if(check2){
            //     //             // console.log(this.checked);
            //     //             submenu.push({'id':$(this).val(), 'role_id':3});
            //     //         }
            //     //         l++;
            //     //     })
            //     //     menu.push({'module_id':modId, 'full_access':false, 'submodule':submenu});
            //     // }
            // });
            // console.log(menu);
            // console.log(k);
            // console.log(l);
            // console.log(submenu);
            
            
            // $(".custom-menu-class").each(function(i) {
            //     const check = $(this).find('input:checked');
            //     console.log(check);
            //     if(check){
            //         menu.push($(this).val());
            //     }
            // });
            // $(".sub-menu-class-custom input[type=checkbox]").each(function(j) {
            //     if((this.checked)){
            //         submenu.push($(this).val());
            //     }
            // })
            // console.log(menu);
            // console.log(submenu);

            // var menu = [];
            // $('.custom-menu-class input[type=checkbox]').each(function () {
            //     if(this.checked){
            //         menu.push({'moduleId':$(this).val(), 'moduleName':$(this).data('name') });
            //     }
            // });

            // var subMenu = [];
            // $('.sub-menu-class-custom input[type=checkbox]').each(function () {
            //     if(this.checked){
            //         subMenu.push({'subMenuId':$(this).val(), 'subMenuName':$(this).data('name') });
            //     }
            // });
            
            // var designationName = $("#designationname").val();
            // let formData = {
            //     designationName: designationName,
            //     subMenu        : subMenu,
            //     menu           : menu
            // };

            var menu = [];
            
            $('.custom-menu-class input[type=checkbox]').each(function () {
                if(this.checked){
                    var subMenu = [];
                    var id = $(this).val();
                    $('.sub-menu-class-custom input[type=checkbox]').each(function () {
                        if(this.checked){
                            var subMenuId = $(this).val();
                            if($(this).data('menuid')==id){
                                var radioName = "checkedroles"+subMenuId;
                                var radio = $('input[name='+radioName+']:checked').val();
                                if(!radio){
                                    radio = '1';
                                }
                                var check = {'id':subMenuId, 'role_id':radio };
                                subMenu.push(check);
                            }
                        }
                    });
                    menu.push({'moduleId':id, 'full_access':false, 'role_id':4, 'submodule':subMenu });
                }
            });
            console.log(menu);
            return false;
            
            var designationName = $("#designationname").val();
            let formData = {
                designationName: designationName,
                menu           : menu
            };


            let url = "<?= base_url('api/hr/designation/save'); ?>";
            //let formData = $(this).serialize();
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
                        if(res.responseJSON.messages.main_menu){
                            $("#designationname").parent().append('<p class="mb-0"><span class="text-danger validation">'+res.responseJSON.messages.main_menu+'</p></span>')
                        }
                        if(res.responseJSON.messages.sub_menu){
                            $("#designationname").parent().append('<p class="mb-0"><span class="text-danger validation">'+res.responseJSON.messages.sub_menu+'</p></span>')
                        }
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

    var myModalEl = document.getElementById('designationmodal2')
    myModalEl.addEventListener('hidden.bs.modal', function (event) {
        location.reload();
        //$('#designationFormRoles').find(':input').val('').prop('checked', false).prop('selected', false);
    })
    
    

</script>