<script>
    $(document).ready(function(){
        if($("#addButtonHide").val()=="No"){
            setTimeout(function(){
                let afsdf = $(document).find("a[href='#next']").parent('li').addClass('disabled');
            },2000)
        }
    });
    const DrawTable = (obj) => {
        var table = $('#employees').DataTable();
        let data = [];
        if (obj.length) {
            obj.forEach((el, i) => {
                let action = `<a href="<?= base_url('api/hr/employee/edit'); ?>/${el.id}" class="edit edit-allow-b" data-id="${el.id}"> <i class="fa fa-edit edit-details text-white me-1  text-center rounded"></i></a> <a href="#" class="delete delete-allow-b" data-id="${el.id}"> <i class="fa fa-trash-o delete-details text-white bg-danger text-center rounded"></i> </a>`;
                let rowData = [
                    ++i,
                    el.name,
                    el.emp_email,
                    el.emp_phone,
                    el.designations,
                    el.departments,
                    el.emp_date_of_joining,
                    action
                ];
                data.push(rowData);
            });
        }
        table.destroy();
        $('#employees').DataTable({
            data: data
        });
        //hideActionbtn();
    }

    const loadTableData = () => {
        let url = "<?= base_url('api/hr/employee/list'); ?>";
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

    const uploadFiles = (fileName) => {
        let form_data = new FormData();
        var ins = document.getElementById(`${fileName}`).files.length;
        for (var x = 0; x < ins; x++) {
            form_data.append("files[]", document.getElementById(`${fileName}`).files[x]);
        }
        let url = BASEURL + '/api/hr/employee/uploadfile';
        $.ajax({
            url: url,
            type: 'POST',
            data: form_data,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data, status) {

                let array1 = [],
                    array2 = [];

                if ($('#paths').val()) {
                    array1 = JSON.parse($('#paths').val());
                }
                let obj = {
                    'title': fileName,
                    'path': data.data[0]
                }
                array2.push(obj);

                let finalarr = array1.concat(array2);

                loadImages(finalarr);

                finalarr = JSON.stringify(finalarr);

                $('#paths').val(finalarr);

                Swal.fire({
                    icon: status,
                    text: data.message,
                });
            },
            error: function(jqxhr, status) {
                let res = JSON.parse(jqxhr.responseText);
                Swal.fire({
                    icon: status,
                    title: 'Oops...',
                    text: res.messages.message,
                });
            }
        });
    };



    /**
     * This function is used to show images on show images views
     * 
     * @param array imgeArr 
     */
    const loadImages = (imgeArr) => {
        let images = '';
        if (imgeArr) {
            imgeArr.forEach(e => {
                images += `<div class="col-md-2 image-area m-2">
             <img src="${BASEURL + e}" alt="employee docs" width="150" height="150">
              <a class="remove-image delete-propimges" href="#" data-path='${e}' style="display: inline;">&#215;</a>
            </div>`;
            });
        }
        $('#imgContainer').html(images);
    }



    $(function() {
        loadTableData();
        $('#employees').DataTable();
        $(document).on('click', '.upload', function() {
            targetedFiles = $(this).attr('data-target');
            uploadFiles(targetedFiles);
        });


        var form = $("#employee-form");
        form.validate({
            // errorPlacement: function errorPlacement(error, element) { element.before(error); },
            errorClass: 'is-invalid',
            rules: {
                firstname: "required"
            }
        });

        form.children("div").steps({
            headerTag: "h3",
            bodyTag: "section",
            // transitionEffect: "slideLeft",
            // enablePagination: true,
            onStepChanging: function(event, currentIndex, newIndex) {
                form.validate().settings.ignore = ":disabled,:hidden";
                return form.valid();
            },
            onFinishing: function(event, currentIndex) {
                form.validate().settings.ignore = ":disabled";
                return form.valid();
            },
            onFinished: function(event, currentIndex) {
                let formData = form.serialize();
                let empId = $('#emp_id').val();
                let url = (empId != '') ? BASEURL + '/api/hr/employee/update' : BASEURL + '/api/hr/employee/save';
                let method = 'POST';
                $.ajax({
                    type: method,
                    url: url,
                    data: formData,
                    success: function(data, status) {
                        Swal.fire({
                            icon: status,
                            text: data.message,
                        })
                        setTimeout(()=>{
                            window.location.href="<?= base_url('all-employees')?>";
                        },1000)
                    },
                    error: function(jqxhr, status) {
                        let res = JSON.parse(jqxhr.responseText);
                        Swal.fire({
                            icon: status,
                            title: 'Oops...',
                            text: res.messages.message,
                        })
                    }
                });
            }
        });

        /**
         * Event is used to delete employee data
         */
        $(document).on('click', '.delete', function(e) {
            e.preventDefault();
            let id = $(this).attr('data-id');
            let url = '<?= base_url('api/hr/employee/delete') ?>';
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

    });
</script>