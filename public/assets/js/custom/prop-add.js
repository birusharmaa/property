/**
 * This function is used to property images into the db. safsafsafasfsaf
 */

 const uploadFiles = () => {
    let form_data = new FormData();
    var ins = document.getElementById('propertyImg').files.length;
    for (var x = 0; x < ins; x++) {
        form_data.append("files[]", document.getElementById('propertyImg').files[x]);
    }
    let url = BASEURL + '/api/property/uploadimages';
    $.ajax({
        url: url,
        type: 'POST',
        data: form_data,
        async: false,
        cache: false,
        contentType: false,
        processData: false,
        success: function (data, status) {
            let array1 = [];
            if ($('#imgPath').val()) {
                array1 = JSON.parse($('#imgPath').val());
            }
            let array2 = data.path;
            let finalarr = array1.concat(array2);

            loadImages(finalarr);
            finalarr = JSON.stringify(finalarr);
            $('#imgPath').val(finalarr);
            Swal.fire({
                icon: status,
                text: data.message,
            });
        },
        error: function (jqxhr, status) {
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
             <img src="${BASEURL + e}" alt="Property imges" width="150" height="150">
              <a class="remove-image delete-propimges" href="#" data-path='${e}' style="display: inline;">&#215;</a>
            </div>`;
        });
    }
    $('#imgContainer').html(images);
}

/**
 * This Function is used to show form according to property category
 * @param int id 
 */
const showPropertyForm = (id) => {
    if (id == 1) {
        $('.residential').removeClass('d-none');
        $('.commercial').addClass('d-none');
    } else if (id == 2 || id == 3) {
        $('.residential').addClass('d-none');
        $('.commercial').removeClass('d-none');
    }
}


/**
 * This method is used to delete element form array
 * 
 * @param string imgeArr 
 * @param array imagePath 
 * @returns mixed
 */
const deleteImageFromArray = (imgeArr, imagePath) => {
    let status = false;
    for (let i = 0; i < imgeArr.length; i++) {
        if (imgeArr[i] === imagePath) {
            imgeArr.splice(i, 1);
            status = true;
        }
    }
    return status ? imgeArr : false;
}

/**
 * This in main function to execute db
 */
$(document).ready(function () {
    var form = $("#add-property");
    form.validate({
        // errorPlacement: function errorPlacement(error, element) { element.before(error); },
        errorClass: 'is-invalid',
        rules: {
            propertyName: {
                required: true,
            },
            // bedrooms: {
            //     required: true,
            // },
            // bathrooms: {
            //     required: true,
            // },
            // balconies: {
            //     required: true,
            // },
            // kitechen: {
            //     required: true,
            // },
            propertyType: {
                required: true,
            },
            // BathroomStyle: {
            //     required: true,
            // },
            // drawingHall: {
            //     required: true,
            // },
            // diningHall: {
            //     required: true,
            // },
            // sittings: {
            //     required: true,
            // },
            // cabins: {
            //     required: true,
            // },

            // lifts: {
            //     required: true,
            // },
            // gates: {
            //     required: true,
            // },
            // drawingHallSize: {
            //     required: true,
            // },
            // diningHallSize: {
            //     required: true,
            // },
            // roomSize: {
            //     required: true,
            // },
            // washroomSize: {
            //     required: true,
            // },
            // servantRoom: {
            //     required: true,
            // },
            // propertyImg: {
            //     required: true,
            // },
            // propertyVdeo: {
            //     required: true,
            // },
            // state: {
            //     required: true,
            // },
            // city: {
            //     required: true,
            // },
            // pin: {
            //     required: true,
            // },
            // nearBy: {
            //     required: true,
            // },
            // locality: {
            //     required: true,
            // },
            // towerName: {
            //     required: true,
            // },
            // block: {
            //     required: true,
            // },
            // pocket: {
            //     required: true,
            // },
            // township: {
            //     required: true,
            // },
            // societyName: {
            //     required: true,
            // },
            // builderName: {
            //     required: true,
            // },
            // building: {
            //     required: true,
            // },
            // floor: {
            //     required: true,
            // },
            // facing: {
            //     required: true,
            // },
            // houseUnit: {
            //     required: true,
            // },
            // squareFeet: {
            //     required: true,
            // },
            // carpetArea: {
            //     required: true,
            // },
            // buildUpArea: {
            //     required: true,
            // },
            // inputYard: {
            //     required: true,
            // },
            // inputMeter: {
            //     required: true,
            // },
            // suCarpetArea: {
            //     required: true,
            // },
            inputOwner: {
                required: true,
            },
            ownerNumber: {
                required: true,
            },
            ownerAlternateNumber: {
                required: true,
            },
            ownerEmail: {
                required: true,
                email: true,

            },
            amenities_list: {
                required: true,
            },
        }
    });

    form.children("div").steps({
        headerTag: "h3",
        bodyTag: "section",
        // transitionEffect: "slideLeft",
        // enablePagination: true,
        onStepChanging: function (event, currentIndex, newIndex) {
            form.validate().settings.ignore = ":disabled,:hidden";
            return form.valid();
        },
        onFinishing: function (event, currentIndex) {
            form.validate().settings.ignore = ":disabled";
            return form.valid();
        },
        onFinished: function (event, currentIndex) {
            let formData = form.serialize();
            let propId = $('#propInfo_id').val();
            let url = (propId != '') ? BASEURL + '/api/property/update' : BASEURL + '/api/property/save';
            $.ajax({
                type: "POST",
                url: url,
                data: formData,
                success: function (data, status) {
                    Swal.fire({
                        icon: status,
                        text: data.message,
                    })
                },
                error: function (jqxhr, status) {
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

    form.find(".duallist-box").bootstrapDualListbox({
        infoText: false,
    });


    /**
     * Function to load cities whenever change state
     */
    const LoadCities = (cities) => {
        let option = '<option selected disabled>---select City---</option>';
        if (cities) {
            cities.forEach(e => {
                option += `<option id=${e.ct_id}>${e.ct_title}</option>`;
            });
        }
        $('#InputCity').html(option);
    }



    /**
     * Event for change state to load city by state id
     */
    $('#InputState').on('change', function () {
        let id = $(this).val();
        let url = BASEURL + '/api/city/' + id;
        $.ajax({
            type: "POST",
            url: url,
            success: function (data) {
                LoadCities(data);
            }, error: function (jqxhr, status) {
                let res = JSON.parse(jqxhr.responseText);
                Swal.fire({
                    icon: status,
                    title: 'Oops...',
                    text: res.messages.message,
                })
            }

        });
    });

    $(document).on('click', '.delete-propimges', function (e) {
        e.preventDefault();
        let element = $(this);
        let path = $(this).attr('data-path');
        let imgeArr = JSON.parse($('#imgPath').val());
        Swal.fire({
            title: 'Do you want to delete this image?',
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: 'Delete',
            denyButtonText: `Don't delete`,
        }).then((result) => {
            if (result.isConfirmed) {
                let url = BASEURL + '/api/property/delete-image';
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: { path },
                    async: false,
                    success: function (data) {
                        if (data.status) {
                            let newArr = deleteImageFromArray(imgeArr, path);
                            newArr = JSON.stringify(newArr);
                            $('#imgPath').val(newArr);
                            element.parent().remove();
                            Swal.fire(data.message, '', 'success');
                        } else {
                            Swal.fire('Internal server error contact your service provider!', '', 'info');
                        }
                    },
                    error: function (jqxhr, status) {
                        let res = JSON.parse(jqxhr.responseText);
                        console.log(jqxhr.responseJSON.messages.message);
                        Swal.fire({
                            icon: status,
                            title: 'Oops...',
                            text: res.messages.message,
                        });
                    }
                });
            } else if (result.isDenied) {
                Swal.fire('Changes are not saved', '', 'info')
            }
        })


    });

    $(document).on('change', '#pro_category', function () {
        catid = $(this).val();
        showPropertyForm(catid);
    })

    $('#pro_category').trigger('change');



});