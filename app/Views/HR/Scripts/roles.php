<script>
    const DrawTable = (obj) => {
        var table = $('#roles').DataTable();
        let data = [];
        if (obj.length) {
            obj.forEach((el, i) => {
                let permissions = "";
                let role_permission = el.role_permission;
                role_permission.forEach((p, i) => {
                    permissions += ` <span>${p}</span>`;
                })

                let action = `<a href="#" class="edit" data-id="${el.r_id}"> <i class="fa fa-edit edit-details text-white me-1  text-center rounded"></i></a> <a href="#" class="delete" data-id="${el.r_id}"> <i class="fa fa-trash-o delete-details text-white bg-danger text-center rounded"></i> </a>`;
                let rowData = [
                    ++i,
                    el.name,
                    permissions,
                    action
                ];
                data.push(rowData);
            });
        }
        table.destroy();
        $('#roles').DataTable({
            data: data
        });
    }

    const loadTableData = () => {
        let url = "<?= base_url('api/hr/role/list'); ?>";
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
        $('#roles').DataTable();

        /**
         * Event for submit form
         */
        $("#roleForm").on('submit', function(e) {
            e.preventDefault();
            let formData = $(this).serialize();
            let url = "<?= base_url('api/hr/role/save'); ?>";
            if ($("#rowid").length) {
                url = "<?= base_url('api/hr/role/update'); ?>";
            }

            $.ajax({
                url,
                type: "post",
                data: formData,
                success: (data, status) => {
                    Swal.fire({
                        icon: 'success',
                        text: data.message,
                        showConfirmButton: false,
                        timer: 1500
                    });
                    loadTableData();
                    $("#rolesmodal2").modal('hide');

                },
                error: (data, jqxhr, status) => {
                    if (data.status == 400) {
                        $("#role-error-list").text(data.responseJSON.validation.role).addClass('text-danger');
                    } else {
                        loadTableData();
                        Swal.fire({
                            icon: 'error',
                            text: data.message,
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                }
            })
        })

        /**
         * Event is used to show update role form
         */
        $(document).on('click', '.edit', function(e) {
            e.preventDefault();
            let id = $(this).attr('data-id');
            let url = '<?= base_url('api/hr/role/show') ?>' + '/' + id;
            $.ajax({
                url: url,
                type: 'get',
                success: function(res) {
                    res = res.data[0];
                    if (res) {
                        $('#roleForm').trigger("reset");

                        let rowId = `<input type='hidden' id='rowid' value=${res.r_id} name='rowid'>`;

                        if (res.role_permission) {
                            let permission = res.role_permission;
                            permission.forEach((p, i) => {
                                if (p == "r") {
                                    $("#checkboxforRead").prop("checked", true);
                                } else if (p == "c") {
                                    $("#checkboxForCreate").prop("checked", true);
                                } else if (p == "u") {
                                    $("#checkboxForUpdate").prop("checked", true);
                                } else if (p == "d") {
                                    $("#checkboxForDelete").prop("checked", true);
                                }
                            })
                        }

                        $(`#role`).val(res.name);

                        // $(`#superwiserid option[value=${res.superwiser_id}]`).prop('selected', true);


                        $(`#departmentslable`).text('Update Department');

                        $('#roleForm').append(rowId);
                    }

                    $('#rolesmodal2').modal('show');
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
         * Event is used to delete data
         */
        $(document).on('click', '.delete', function(e) {
            e.preventDefault();
            let id = $(this).attr('data-id');
            let url = '<?= base_url('api/hr/role/delete') ?>';
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
                            id: btoa(id)
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


        $('#btnAddRole').on('click', function(e) {
            e.preventDefault();
            $(`#btnSubmit`).text('Add');
            $(`#departmentslable`).text('Add Department');
            $('#departmentForm').trigger("reset");
        });

    });
</script>