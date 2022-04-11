<script>
    /**
     * This function is used to convert time 24 hrs to 12 hrs
     */
    function tConvert(time) {
        if (time) {
            // Check correct time format and split into components
            time = time.toString().match(/^([01]\d|2[0-3])(:)([0-5]\d)(:[0-5]\d)?$/) || [time];
            if (time.length > 1) { // If time format correct
                time = time.slice(1); // Remove full string match value
                time[5] = +time[0] < 12 ? 'AM' : 'PM'; // Set AM/PM
                time[0] = +time[0] % 12 || 12; // Adjust hours
            }
            return time.join(''); // return adjusted time or original string
        }
    }
    /**
     * This function is used to date format YYMMDD to DDMMYY
     */
    function dateFormatMMYYDD($date = null) {
        const d = new Date($date)
        const ye = new Intl.DateTimeFormat('en', {
            year: 'numeric'
        }).format(d)
        const mo = new Intl.DateTimeFormat('en', {
            month: 'short'
        }).format(d)
        const da = new Intl.DateTimeFormat('en', {
            day: '2-digit'
        }).format(d)

        return `${da}-${mo}-${ye}`;
    }

    const DrawTable = (obj) => {
        var table = $('#frontOffice').DataTable();
        let data = [];
        if (obj && obj.length) {
            obj.forEach((el, i) => {

                let intime = tConvert(el.in_time);
                let outtime = el.out_time != null ? tConvert(el.out_time) : "-";
                let date = dateFormatMMYYDD(el.created_at);

                let action = ` <a href="#" class="edit" data-id="${el.id}"> <i class="fa fa-edit edit-details text-white me-1  text-center rounded"></i></a>  <a href="#" class="delete" data-id="${el.id}"> <i class="fa fa-trash-o delete-details text-white bg-danger text-center rounded"></i> </a>`;
                if (!el.out_time)
                    action += `<a href="#" class="mark-as-out" data-id="${el.id}" title="Mark as out"> <i class="fa fa-sign-out text-white bg-danger text-center delete-details rounded"></i></a>`;

                let rowData = [
                    ++i,
                    el.name,
                    el.email,
                    el.phone,
                    el.visitor_id_title,
                    el.visitor_id_no,
                    el.meeting_with_name,
                    el.purpose,
                    date,
                    intime,
                    outtime,
                    action
                ];
                data.push(rowData);
            });
        }
        table.destroy();
        $('#frontOffice').DataTable({
            data: data
        });
    }

    const loadTableData = () => {
        let url = "<?= base_url('api/front-office/get-list'); ?>";
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

        var form = $("#front-office-form");
        form.validate({
            // errorPlacement: function errorPlacement(error, element) { element.before(error); },
            errorClass: 'is-invalid',
            rules: {
                "visitor-name": {
                    required: true,
                },
                "visitor-email": {
                    required: true,
                },
                "visitor-phone": {
                    required: true,
                    minlength: 10,
                    maxlength: 10,
                },
                "visitor-doc-name": {
                    required: true,
                    maxlength: 100,
                },
                "visitor-doc-id-number": {
                    required: true,
                    maxlength: 20,
                },
                "meeting-with": {
                    required: true,
                },
                "visitor-meeting-purpose": {
                    required: true,
                    maxlength: 255,
                },

            },
            messages: {
                "visitor-phone": {
                    required: "This field must be filled",
                    maxlength: "This field must accept max 10 disit only"
                },
                "visitor-doc-id-number": {
                    required: "This field must be filled",
                    maxlength: "This field must accept max characters disit only"
                },
                "visitor-meeting-purpose": {
                    required: "This field must be filled",
                    maxlength: "This field must accept max 255 characters only"
                },
                "visitor-doc-name": {
                    maxlength: "This field must accept max 100 characters only"
                }
            }
        });

        /**
         * Event is used to save/update visitor details into the database
         */
        $(document).on('submit', '#front-office-form', function(e) {
            e.preventDefault();
            let url = "<?= base_url('api/front-office/save'); ?>";
            let formData = $(this).serialize();
            if ($('#rowid').length) {
                url = "<?= base_url('api/front-office/update'); ?>";
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

                        if (res.status === 400) {

                            let messageList = res.responseJSON.validation;
                            $('#visitor-name-error').text((messageList['visitor-name']) ? messageList['visitor-name'] : "").addClass('text-danger');
                            $('#visitor-email-error').text((messageList['visitor-email']) ? messageList['visitor-email'] : "").addClass('text-danger');
                            $('#visitor-phone-number-error').text((messageList['visitor-phone']) ? messageList['visitor-phone'] : "").addClass('text-danger');
                            // $('#visitor-doc-name-error').text((messageList['meeting-with']) ? messageList['meeting-with'] : "");
                            // $('#visitor-doc-id-number-error').text((messageList['meeting-with']) ? messageList['meeting-with'] : "");
                            $('#meeting-with-error').text((messageList['meeting-with']) ? messageList['meeting-with'] : "").addClass('text-danger');
                            $('#visitor-meeting-purpose-error').text((messageList['visitor-meeting-purpose']) ? messageList['visitor-meeting-purpose'] : "").addClass('text-danger');

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
         * Event is used to show form in edit mode
         */
        $(document).on('click', '.edit', function(e) {
            e.preventDefault();
            let id = $(this).attr('data-id');

            let url = '<?= base_url('api/front-office/show') ?>' + '/' + id;
            $.ajax({
                url: url,
                type: 'get',
                success: function(res) {

                    res = res.data;
                    if (res) {
                        console.log(res)
                        let rowId = `<input type='hidden' id='rowid' value=${res.id} name='rowid'>`;
                        $(`#visitor-name`).val(res.name);
                        $(`#visitor-email`).val(res.email);
                        $(`#visitor-phone`).val(res.phone);


                        $(`#visitor-doc-id-number`).val(res.visitor_id_no);
                        $(`#visitor-doc-name`).val(res.visitor_id_title);
                        $(`#visitor-meeting-purpose`).val(res.purpose);



                        $(`#meeting-with option[value=${res.meeting_with}]`).prop('selected', true);


                        $(`#front-office-form-lable`).text('Update visitor record');
                        $('#front-office-form').append(rowId);
                    }
                    $('#frontofficeModal').modal('show');
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
         * Event is used to delete data from DB.
         */
        $(document).on('click', '.delete', function(e) {
            e.preventDefault();
            let id = $(this).attr('data-id');
            let url = '<?= base_url('api/front-office/delete') ?>' + '/' + id;
            Swal.fire({
                title: 'Do you want to delete?',
                showCancelButton: true,
                confirmButtonText: 'Delete',
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.ajax({
                        url: url,
                        type: 'get',
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


        /**
         * This event is used to reset form
         */
        $('#btnAddfrontoffice').on('click', function(e) {
            e.preventDefault();
            $(`#front-office-form-lable`).text('Add Front Office');
            $('#front-office-form').trigger("reset");
        });


        /**
         * This event used to updated visitor out time
         */

        $(document).on('click', '.mark-as-out', function(e) {
            e.preventDefault();
            let id = $(this).attr('data-id');
            let url = '<?= base_url('api/front-office/out-time') ?>' + '/' + id;
            Swal.fire({
                title: 'Do you want to mark out-time?',
                showCancelButton: true,
                confirmButtonText: 'OutTime',
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.ajax({
                        url: url,
                        type: 'get',
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