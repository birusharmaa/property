<script>

    const DrawTable = (obj) => {
        var table = $('#allotProperties').DataTable();
        let data = [];
        if (obj.length) {
            obj.forEach(el => {
                let action = `<a href="#" class="edit" data-id="${el.pur_id}"> <i class="fa fa-edit edit-details text-white me-1  text-center rounded"></i></a> <a href="#" class="delete" data-id="${el.pur_id}"> <i class="fa fa-trash-o delete-details text-white bg-danger text-center rounded"></i> </a>`;
                let rowData = [
                    el.pur_id,
                    el.property_title,
                    el.name,
                    el.allot_title,
                    el.pur_created_at,
                    action
                ];
                data.push(rowData);
            });
        }
        table.destroy();
        $('#allotProperties').DataTable({
            data: data
        });
    }

    const loadTableData = () => {
        let url = "<?= base_url('api/property/assign-property-list'); ?>";
        $.ajax({
            url: url,
            type: 'get',
            beforeSend: function() {},
            success: function(res) {
                DrawTable(res.data);
            },
            error: function(res, data) {
            
                DrawTable(res.responseJSON.messages.data);
            }
        });
    };

    $(document).ready(function() {
        loadTableData();
        /**
         * Event is used to assign the property to user
         */
        $(document).on('submit', '#allotPropertyForm', function(e) {
            e.preventDefault();
            let url = "<?= base_url('api/property/assign-property'); ?>";
            let formData = $(this).serialize();
            if ($('#rowid').length) {
                url = "<?= base_url('api/property/edit-assign'); ?>";
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

                        Swal.fire({
                            icon: 'info',
                            title: 'Oops...',
                            text: res.responseJSON.message,
                            showConfirmButton: false,
                            timer: 1500
                        })
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
            let url = '<?= base_url('api/property/show-assign') ?>' + '/' + id;
            $.ajax({
                url: url,
                type: 'get',
                success: function(res) {
                    res = res.data;
                    if (res) {
                        let rowId = `<input type='hidden' id='rowid' value=${res.pur_id} name='rowid'>`;
                        $(`#property option[value=${res.pur_prop_id}]`).prop('selected', true);
                        $(`#user option[value=${res.pur_user_id}]`).prop('selected', true);
                        $(`#propertyFor option[value=${res.pur_allot_status_id}]`).prop('selected', true);
                        $('#allotPropertyForm').append(rowId);
                    }
                   
                    $('#allotpropertyModal').modal('show');
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
            let url = '<?= base_url('api/property/delete-assign') ?>';
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
    })
</script>