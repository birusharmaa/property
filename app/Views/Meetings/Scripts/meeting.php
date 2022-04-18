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
        var table = $('#allMeetings').DataTable();

        let data = [];
        if (obj && obj.length) {
            obj.forEach((el, i) => {

                let time = tConvert(el.meeting_time);
                let date = dateFormatMMYYDD(el.meeting_date);
                let action = ` <a href="#" class="edit" data-id="${el.id}"> <i class="fa fa-edit edit-details text-white me-1  text-center rounded"></i></a>  <a href="#" class="delete" data-id="${el.id}"> <i class="fa fa-trash-o delete-details text-white bg-danger text-center rounded"></i> </a>`;
                // if (el.meeting_status != 1)
                // action += `<a href="#" class="update-remark btn btn-info" data-id="${el.id}" title="Add remark after meeting">Update</i></a>`;
                var str = el.purpose;
                if (str.length > 10) {
                    str = str.substring(0, 40)
                    str = `<a href="#" data-string="${el.purpose}" class="readMore-purpose">${str}...</a>`;
                }
                let leadTitle = `<a href="#" data-meeting-id="${el.id}" class="show-property-list">${el.lead_name}...</a>`;
                let rowData = [
                    ++i,
                    el.emp_name,
                    leadTitle,
                    str,
                    date,
                    time,
                    el.meeting_status_title,
                    action
                ];
                data.push(rowData);
            });
        }
        table.destroy();
        $('#allMeetings').DataTable({
            data: data
        });
    }

    const loadTableData = () => {
        let url = "<?= base_url('api/meeting/get-list'); ?>";
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

        var form = $("#meetingForm");
        form.validate({
            // errorPlacement: function errorPlacement(error, element) { element.before(error); },
            errorClass: 'is-invalid',
            rules: {
                "employee": {
                    required: true,
                },
                "leadName": {
                    required: true,
                },
                "meetingDate": {
                    required: true,
                },
                "meetingTime": {
                    required: true,
                },
                "purpose": {
                    required: true,
                    maxlength: 255,
                    minlength: 30,
                },

            },
            messages: {
                "purpose": {
                    maxlength: "This field must accept max 100 characters only",
                    minlength: "This field must accept min 30 characters only"
                }
            }
        });

        /**
         * Event is used to save/update visitor details into the database
         */
        $(document).on('submit', '#meetingForm', function(e) {
            e.preventDefault();
            let url = "<?= base_url('api/meeting/save'); ?>";
            let formData = $(this).serialize();
            if ($('#rowid').length) {
                url = "<?= base_url('api/meeting/update'); ?>";
            }
            if ($('#updated_remark_id').length) {
                let id = $('#updated_remark_id').val();
                url = "<?= base_url('api/meeting/update-remark'); ?>" + "/" + id;
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
                        setTimeout(() => {
                            $('#meetingsModal').modal('hide');
                            loadTableData();
                        }, 1000);

                    },
                    error: function(res, data) {

                        if (res.status === 400) {

                            let messageList = res.responseJSON.validation;
                            $('#meeting-employee-error').text((messageList['employee']) ? messageList['employee'] : "").addClass('text-danger');
                            $('#meeting-leadName-error').text((messageList['leadName']) ? messageList['leadName'] : "").addClass('text-danger');
                            $('#meeting-meetingDate-error').text((messageList['meetingDate']) ? messageList['meetingDate'] : "").addClass('text-danger');
                            $('#meeting-meetingTime-error').text((messageList['meetingTime']) ? messageList['meetingTime'] : "").addClass('text-danger');

                            $('#meeting-with-error').text((messageList['meeting-with']) ? messageList['meeting-with'] : "").addClass('text-danger');
                            $('#meeting-purpose-error').text((messageList['purpose']) ? messageList['purpose'] : "").addClass('text-danger');

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
            let url = '<?= base_url('api/meeting/show') ?>' + '/' + id;
            $.ajax({
                url: url,
                type: 'get',
                success: function(res) {
                    let meetinglocations = res.meetinglocations;
                    let selectedLocation = res.selectedLocation;
                    res = res.data;
                    if (res) {

                        let rowId = `<input type='hidden' id='rowid' value=${res.id} name='rowid'>`;

                        $(`#employee option[value=${res.emp_id}]`).prop('selected', true);

                        $(`#leadName`).val(res.lead_name);

                        $(`#meetingDate`).val(res.meeting_date);
                        $(`#meetingTime`).val(res.meeting_time);

                        $(`#purpose`).val(res.purpose);

                        $(`#visitor-meeting-purpose`).val(res.purpose);
                        $(`#meeting-status option[value=${res.meeting_status}]`).prop('selected', true);

                        $(`#meeting-form-lable`).text('Update meeting record');
                        $('#meetingForm').append(rowId);
                    }
                    if (meetinglocations) {
                        let html = "";
                        meetinglocations.forEach((el, i) => {
                            let checked = (el.selected) ? 'checked' : "";
                            html += `<li class="list-group-item m-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" ${checked} name="recommended-property[]" value="${el.property_id}" id="recommended-property${i}">
                                        <label class="form-check-label" for="recommended-property${i}">
                                        ${ (el.property_title!=null?el.property_title:"Untitled")}
                                        </label>
                                         <div class="card-body">
                                            <strong class="card-title">For: ${el.lookingfor_title}</strong>
                                            <strong class="card-subtitle mb-2 text-muted">Property Type:</strong><span> ${el.property_type_title}</span>
                                            <strong class="card-subtitle mb-2 text-muted">Sub Property Type:</strong><span> ${el.property_type_title}</span>
                                            <strong class="card-text">location:</strong> City: ${el.city_title} locality: ${el.locality_title}</strong>
                                         </div>
                                    </div>
                                </li>`;
                        });
                        $('#recommended-property').html(html);
                    }
                    $('#meetingsModal').modal('show');
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
            let url = '<?= base_url('api/meeting/delete') ?>' + '/' + id;
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
        $('#btnAddMeeting').on('click', function(e) {
            e.preventDefault();
            $(`#meeting-form-lable`).text('Schedule New Meeting');
            $('#meetingForm').trigger("reset");
            $('#meeting-section').removeClass('d-none');
            $('#meeting-remark-section').addClass('d-none');
            $('#recommended-property').html("");

        });


        /**
         * This event used to updated visitor out time
         */

        $(document).on('click', '.update-remark', function(e) {
            e.preventDefault();
            let id = $(this).attr('data-id');
            let leadId = $(`<input type="hidden" id="updated_remark_id" name="updated_remark_id" value="${id}"/>`);
            $('#meetingForm').append(leadId);
            let url = '<?= base_url('api/meeting/update-remark') ?>' + '/' + id;
            Swal.fire({
                title: 'Do you want to update remark?',
                showCancelButton: true,
                confirmButtonText: 'Yes',
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $('#meeting-section').addClass('d-none');
                    $('#meeting-remark-section').removeClass('d-none');
                    $(`#meeting-form-lable`).text('Update Remark');
                    $('#meetingsModal').modal('show');
                } else if (result.isDenied) {
                    Swal.fire('Changes are not saved', '', 'info')
                }
            })

        });

        /**
         * Events for get property location from database.
         */

        $(document).on('change', '#leadName', function() {
            let leadValue = $(this).val();
            $.ajax({
                url: "<?= base_url('api/meeting/get-location') ?>",
                type: 'Post',
                data: {
                    leadValue
                },
                success: function(res) {
                    let html = "";
                    if (res.data.length > 0) {
                        let obj = res.data;
                        obj.forEach((el, i) => {
                            html += `<li class="list-group-item m-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="recommended-property[]" value="${el.property_id}" id="recommended-property${i}">
                                        <label class="form-check-label" for="recommended-property${i}">
                                        ${ (el.property_title!=null?el.property_title:"Untitled")}
                                        </label>
                                         <div class="card-body">
                                            <strong class="card-title">For: ${el.lookingfor_title}</strong>
                                            <strong class="card-subtitle mb-2 text-muted">Property Type:</strong><span> ${el.property_type_title}</span>
                                            <strong class="card-subtitle mb-2 text-muted">Sub Property Type:</strong><span> ${el.property_type_title}</span>
                                            <strong class="card-text">location:</strong> City: ${el.city_title} locality: ${el.locality_title}</strong>
                                         </div>
                                    </div>
                                </li>`;
                        });
                    }
                    $('#recommended-property').html(html);
                },
                error: function(res, data, status) {
                    let html = "Not available";

                    if (res.status == 404)
                        $('#recommended-property').html(html);
                    else
                        console.log(res);
                }
            });
        })


    })

    /**
     * This event is used to show meeting purpose in full views
     */
    $(document).on('click', '.readMore-purpose', function(e) {
        e.preventDefault();
        let purpose = $(this).attr('data-string');
        Swal.fire({
            icon: 'info',
            title: "Info",
            text: purpose,
            showConfirmButton: true,
        })
    })

    /**
     * This event is used to show list of property and meeting location
     */
    $(document).on('click', '.show-property-list', function(e) {
        e.preventDefault();
        let meetingId = $(this).attr('data-meeting-id');

        if (meetingId) {
            $.ajax({
                url: "<?= base_url('api/meeting/get-meeting-locations'); ?>",
                type: 'post',
                data: {
                    meetingId
                },
                beforeSend: function() {},
                success: function(res) {

                    let htmlData = "";
                    if (res.data) {
                        let data = res.data;
                        data.forEach((el, i) => {
                            let visited = (el.is_visited == 0) ? false : 'checked';
                            let Visitlable = (el.is_visited == 0) ? "Mark as visited" : 'Visited';
                            let isDisabled = (el.is_visited == 0) ? "" : 'Disabled';
                            htmlData += `<li class="list-group-item">
                                    <div class="form-check">
                                        <input class="form-check-input mark-as-visited" ${visited} ${isDisabled} type="checkbox" data-meeting-id="${el.id}" name="recommended-property[]" value="${el.property_id}" id="recommended-property${i}">
                                        <label class="form-check-label" for="recommended-property${i}">${Visitlable}</label>
                                         <div class="card-body">
                                             <strong class="card-title">Title:   ${ (el.property_title!=null?el.property_title:"Untitled")}</strong>
                                            <strong class="card-title">For: ${el.lookingfor_title}</strong>
                                            <strong class="card-subtitle mb-2 text-muted">Property Type:</strong><span> ${el.property_type_title}</span>
                                            <strong class="card-subtitle mb-2 text-muted">Sub Property Type:</strong><span> ${el.property_type_title}</span>
                                            <strong class="card-text">location:</strong> City: ${el.city_title} locality: ${el.locality_title}</strong>
                                         </div>
                                    </div>
                                </li>`;

                        });

                        // mark-as-visited
                        $('#meeting-property-list').html(htmlData);

                    }
                    $('#propertyMeetingLocationModal').modal('show');
                },
                error: function(res, data) {
                    DrawTable(res.responseJSON.data);
                }
            });

        } else {
            Swal.fire({
                icon: 'Info',
                text: "Property not found",
                showConfirmButton: false,
                timer: 1500
            })
        }
    });

    /** */

    $(document).on('click', '.mark-as-visited', function(e) {
        e.preventDefault()
        let checkbox = this;
        Swal.fire({
            title: 'Are you sure want to mark as visited?',
            showCancelButton: true,
            confirmButtonText: 'Yes',
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                $(checkbox).prop("checked", true);
                if ($(checkbox).prop("checked")) {
                    let id = $(checkbox).attr('data-meeting-id');
                    let url = '<?= base_url('api/meeting/update-visited-location') ?>';
                    $.ajax({
                        url: url,
                        type: "Post",
                        data: {
                            id
                        },
                        success: (data, res) => {
                            console.log(data);
                            console.log(res);

                            Swal.fire({
                                icon: 'success',
                                title:"Success",
                                text: data.message,
                                showConfirmButton: false,
                                timer: 1500
                            })

                        },
                        error: (jqxhr, status) => {

                        }
                    })

                }
            } else if (result.isDenied) {
                Swal.fire('Changes are not saved', '', 'info')
            }
        })

    });
</script>