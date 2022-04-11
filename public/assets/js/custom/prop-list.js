$(document).ready(function () {
    $('#allProperties').DataTable();
    $(document).on('click', '.toggle', function (e) {
        e.preventDefault();
        let status = $(this).find('input').attr('data-status');
        let propId = $(this).find('input').attr('data-prop-id');
        var formData = { status, propId };
        let url = BASEURL + '/api/property/isPublished';
        $.ajax({
            type: "POST",
            url: url,
            data: formData,
            success: function (data, status) {
                Swal.fire({
                    icon: status,
                    text: data.message,
                    showConfirmButton: false,
                    timer: 1500
                })
            },
            error: function (jqxhr, status) {
                let res = JSON.parse(jqxhr.responseText);
                Swal.fire({
                    icon: status,
                    title: 'Oops...',
                    text: res.messages.message,
                    showConfirmButton: false,
                    timer: 1500
                })
            }
        });
    });

    $(document).on('click', '.delete-property', function (e) {
        e.preventDefault();
        let propId = $(this).attr('data-prop-id');
        var formData = { propId };
        let url = BASEURL + '/api/property/delete';

        Swal.fire({
            title: 'Do you want to delete the property?',
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: 'Delete',
            denyButtonText: `Don't delete`,
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: url,
                    data: formData,
                    success: function (data, status) {
                        Swal.fire({
                            icon: status,
                            text: data.message,
                            showConfirmButton: false,
                            timer: 1500
                        })
                        setTimeout(() => { window.location.reload() }, 1600);
                    },
                    error: function (jqxhr, status) {
                        let res = JSON.parse(jqxhr.responseText);
                        Swal.fire({
                            icon: status,
                            title: 'Oops...',
                            text: res.messages.message,
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }
                });
            } else if (result.isDenied) {
                Swal.fire('Property is not deleted', '', 'info')
            }
        })



    });

})