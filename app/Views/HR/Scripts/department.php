<script>
    const DrawTable = (obj) => {
        var table = $('#departments').DataTable();
        let data = [];
        if (obj.length) {
            obj.forEach((el, i) => {
                let TeamSize = 0;
                let action = `<a href="#" class="edit" data-id="${el.id}"> <i class="fa fa-edit edit-details text-white me-1  text-center rounded"></i></a> <a href="#" class="delete" data-id="${el.id}"> <i class="fa fa-trash-o delete-details text-white bg-danger text-center rounded"></i> </a>`;
                let rowData = [
                    ++i,
                    el.title,
                    el.superwiser_id,
                    TeamSize,
                    action
                ];
                data.push(rowData);
            });
        }
        table.destroy();
        $('#departments').DataTable({
            data: data
        });
    }

    const loadTableData = () => {
        let url = "<?= base_url('api/hr/department/list'); ?>";
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
        $(document).on('submit', '#departmentForm', function(e) {
            e.preventDefault();

            let url = "<?= base_url('api/hr/department/save'); ?>";
            let formData = $(this).serialize();
            if ($('#rowid').length) {
                url = "<?= base_url('api/hr/department/update'); ?>";
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
                        $('#department-head-error').text('');
                        $('#departmentname-error').text('');
                        loadTableData();
                    },
                    error: function(res, data) {
                        if (res.status === 400) {
                            let messageList = res.responseJSON.validation;
                            $('#department-head-error').text(messageList.department_head_error);
                            $('#departmentname-error').text(messageList.departmentname_error);
                            return false;
                        } else {
                            Swal.fire({
                                icon: 'info',
                                title: 'Oops...',
                                text: res.responseJSON.message,
                                showConfirmButton: false,
                                timer: 1500
                            })
                        }
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
            let url = '<?= base_url('api/hr/department/show') ?>' + '/' + id;
            $.ajax({
                url: url,
                type: 'get',
                success: function(res) {
                    res = res.data[0];
                    if (res) {
                        let rowId = `<input type='hidden' id='rowid' value=${res.id} name='rowid'>`;
                        $(`#departmentname`).val(res.title);
                        $(`#superwiserid option[value=${res.superwiser_id}]`).prop('selected', true);
                        $(`#btnSubmit`).text('Update');
                        $(`#departmentslable`).text('Update Department');

                        $('#departmentslable').append(rowId);
                    }

                    $('#departmentsmodal2').modal('show');
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
            let url = '<?= base_url('api/hr/department/delete') ?>';
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


        $('#btnAddDepartment').on('click', function(e) {
            e.preventDefault();
            $(`#btnSubmit`).text('Add');
            $(`#departmentslable`).text('Add Department');
            $('#departmentForm').trigger("reset");
        });
    })
</script>