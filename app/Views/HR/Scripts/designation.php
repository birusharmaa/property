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
            data: data,
            order: [[ 0, "desc" ]]
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
                    var check = true;
                    $('.sub-menu-class-custom input[type=checkbox]').each(function () {
                        if(this.checked){
                            var subMenuId = $(this).val();
                            if($(this).data('menuid')==id){
                                var radioName = "checkedroles"+subMenuId;
                                var radio = $('input[name='+radioName+']:checked').val();
                                if(!radio){
                                    radio = '1';
                                }
                                check = {'id':subMenuId, 'role_id':radio };
                                subMenu.push(check);
                                check = false;
                            }
                        }
                    });
                    menu.push({'module_id':id, 'full_access':check, 'role_id':1, 'submodule':subMenu });
                }
            });

            var subMenu = [];
            $('.sub-menu-class-custom input[type=checkbox]').each(function () {
                if(this.checked){
                    var subSubMenu = [];
                    var subId = $(this).val();
                    var subName = $(this).data('submadulenamej');
                    var check = "";
                    $('.sub-sub-menu-class input[type=checkbox]').each(function () {
                        if(this.checked){
                            
                            var subSubMenuId = $(this).val();
                            if($(this).data('ssmid')==subId){
                                var radioName = "checkedroles_"+subSubMenuId;
                                var radio = $('input[name='+radioName+']:checked').val();
                                if(!radio){
                                    radio = '1';
                                }
                                check = {'id':subSubMenuId, 'role_id':radio };
                                subSubMenu.push(check);
                            }
                        }
                    });
                    if(check){
                        subMenu.push({'submodule_id':subId, 'role_id':4, 'sub_mod_name':subName, 'sub_submodule':subSubMenu });
                    }
                }
            });
            
            var designationName = $("#designationname").val();
            let formData = {
                designationName: designationName,
                menu           : menu,
                subMenu        : subMenu
            };

            let url = "<?= base_url('api/hr/designation/save'); ?>";
            //let formData = $(this).serialize();
            if ($('#rowid').length) {
                formData = "";
                formData = {
                    designationName: designationName,
                    menu           : menu,
                    subMenu        : subMenu,
                    rowid          : $("#rowid").val()
                };
                url = "<?= base_url('api/hr/designation/update'); ?>";
            }
            if (formData) {
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: formData,
                    beforeSend: function() {},
                    success: function(res) {
                        $('#designationmodal2').modal('hide');
                        Swal.fire({
                            icon: 'success',
                            text: res.message,
                            showConfirmButton: false,
                            timer: 1500
                        })
                        loadTableData();
                    },
                    error: function(res, data) {
                        if(res.responseJSON.messages.designationname){
                            $("#designationname").parent().append('<p class="mb-0"><span class="text-danger validation">'+res.responseJSON.messages.main_menu+'</p></span>')
                        }
                        if(res.responseJSON.messages.menu){
                            $("#designationname").parent().append('<p class="mb-0"><span class="text-danger validation">'+res.responseJSON.messages.menu+'</p></span>')
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
                success: function(response) {
                    let res = response.data.designation[0];
                    let user_access_module = response.data.user_access;
                    if (res) {
                        let rowId = `<input type='hidden' id='rowid' value=${res.id} name='rowid'>`;
                        $(`#designationname`).val(res.title);
                        $(`#btnSubmit`).text('Update');
                        $(`#designationmdl2`).text('Update Designation');

                        $('#designationFormRoles').append(rowId);
                    }
                    let menuModule = JSON.parse(user_access_module[0].uap_permission);
                    let subSubModule  = JSON.parse(user_access_module[0].uap_sub_sub_modules);
                    // console.log(menuModule);
                    // console.log(subSubModule);

                    if(menuModule){
                        $("#modulescheckbox").prop("checked", true);
                        $("#modulemenu").removeClass("d-none");
                        //console.log(menuModule);
                        menuModule.map(( value,index )=> (
                            //console.log(value.module_id)
                            $('.custom-menu-class input[type=checkbox]').each(function () {
                                var id = $(this).val();
                                if(id==value.module_id){
                                    $(this).prop("checked", true);
                                    let ls = "submenu"+(parseInt(value.module_id)+1);
                                    $("."+ls).removeClass("d-none");
                                }
                            })
                        ))
                    }

                    menuModule.map(( value,index )=> {
                        if(value.submodule){
                            value.submodule.map(( v,index )=> (
                                $('.sub-menu-class-custom input[type=checkbox]').each(function () {
                                    var id = $(this).val();
                                    if(id==v.id){
                                        $(this).prop("checked", true);
                                        var rName = "checkedroles"+v.id;
                                        $('input:radio[name='+rName+']').each(function(){
                                            if($(this).val()==v.role_id){
                                                $(this).attr('checked', true);
                                            }
                                        });
                                    }
                                })
                            ))
                        }
                    })

                    if(subSubModule){
                        for(var i = 0; i<subSubModule.length; i++){
                            let subSub = subSubModule[i].sub_submodule;
                            if(subSub){
                                subSub.map(( value,index )=> (
                                    $('.sub-sub-menu-class input[type=checkbox]').each(function () {
                                        var id = $(this).val();
                                        if(id==value.id){
                                            $(this).prop("checked", true);
                                            var rName = "checkedroles_"+value.id;
                                            $('input:radio[name='+rName+']').each(function(){
                                                if($(this).val()==value.role_id){
                                                    $(this).attr('checked', true);
                                                }
                                            });
                                        }
                                    })
                                    
                                ))
                            }
                        }
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