<script>
    /**
     * This function is used to property images into the db.
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
            success: function(data, status) {
                let array1 = [];
                if ($('#imgPath').val()) {
                    array1 = JSON.parse($('#imgPath').val());
                }
                let array2 = data.path;
                let finalarr = array1.concat(array2);

                // loadImages(finalarr);
                
                finalarr = JSON.stringify(finalarr);
                $('#imgPath').val(finalarr);
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


    $(function() {
        localStorage.setItem('lookingforobj', JSON.stringify({
            "lookingfor": "1",
            "propertyType": "residential"

        }));


        $(document).on('click', '.propertyImg', function() {

            uploadFiles();
        });
    })
    $(document).ready(function() {
        var form = $("#add-property");
        form.children("div").steps({
            headerTag: "h3",
            bodyTag: "section",
            onStepChanging: function(event, currentIndex, newIndex) {
                form.validate().settings.ignore = ":disabled,:hidden";
                return form.valid();
            },
            onFinishing: function(event, currentIndex) {
                form.validate().settings.ignore = ":disabled";
                return form.valid();
            },
            onFinished: function(event, currentIndex) {
                event.preventDefault();
                let formData = form.serialize();
                if (localStorage.getItem('lookingforobj') !== null) {
                    let lookingObj = JSON.parse(localStorage.getItem('lookingforobj'));
                    formData += `&lookingforObj=${localStorage.getItem('lookingforobj')}`;
                }

                let propId = ($('#propInfo_id').length) ? $('#propInfo_id').val() : false;

                let url = (propId != undefined && propId != '') ? BASEURL + '/api/property/update' : BASEURL + '/api/property/save';

                $.ajax({
                    type: "POST",
                    url: url,
                    data: formData,
                    success: function(data, status) {
                        Swal.fire({
                            icon: status,
                            text: data.message,
                        })
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
    });

    $(document).ready(function() {
        $('input[name=lookingFor]').on('click', function() {
            const value = $(this).val();

            $('.property-for').each(function() {

                $(this).parent().parent().hide();
                const forType = $(this).attr('data-for').split(' ');

                if (forType.includes(value.toLowerCase())) {
                    $(this).parent().parent().show();

                }
                $('.disabled-commercial').on('click', function() {
                    $('.hide-class').attr('disabled', true);
                    $('.not-allowed').css({
                        "cursor": "not-allowed"
                    });

                }); //disabled commercial in PG

                $('.enabled-commercial').on('click', function() {
                    $('.hide-class').removeAttr('disabled', true);
                    $('.not-allowed').css({
                        "cursor": "pointer"
                    });
                }); //enabled Commercial in rent and sell
            });
        }); // step1 show hide sell||rent||pg

        $('input[name=propertyType]').on('click', function() {
            const value = $(this).val().trim();
            if (value === 'residential') {

                $('.office-type').parent().parent().addClass('d-none');
                $('.locations').addClass('d-none');
                $('.hide-office-text').parent().addClass('d-none');

                $('input[name=residential]').each(function() {

                    $('input[name=commercial]').parent().parent().addClass('d-none');
                    $('input[name=residential]').parent().parent().removeClass('d-none');
                    $('.hide-pg-section').parent().removeClass('d-none');
                });
            }
            if (value === 'commercial') {

                $('input[name=commercial]').each(function() {
                    $('input[name=residential]').parent().parent().addClass('d-none');
                    $('input[name=commercial]').parent().parent().removeClass('d-none');
                    $('.hide-pg-section').parent().addClass('d-none');
                });
            }
        }); // step1 show hide residential||commercial



        $('.add-other').on('click', function() {
            $('.add-other-field').removeClass('d-none');
            $('.add-other').addClass('d-none');
        }); // add more input button show
        $('.add-other-cls').on('click', function() {
            $('.add-other-field-cls').removeClass('d-none');
            $('.add-other-cls').addClass('d-none');
        }); // add more input second button show
        $('.furnishing').on('click', function() {
            const cls = '#' + $(this).val();
            $('.furnishing-div').addClass('d-none');
            $(cls).removeClass('d-none');
        }); // show hide furnishing
        $('.status').on('click', function() {
            const cls = '#' + $(this).val();
            $('.age-of-property').addClass('d-none');
            $(cls).removeClass('d-none');
        }); // show hide age of property

        $('.built-up-area').on('click', function() {
            $('.built-up-area-field').removeClass('d-none');
            $('.added').addClass('d-none');
        }); // add built-up area show
        $('.super-built-up-area').on('click', function() {
            $('.super-built-up-area-field').removeClass('d-none');
            $('.added1').addClass('d-none');
        }); // add super built-up area show
        $('.pricing-details').on('click', function() {
            $('.pricing-details-field').removeClass('d-none');
            $('.details-hide').addClass('d-none');
        }); // add more pricing detials show

        $(document).on('click', '.decrement', function() {
            let value = $(this).parent().find('.input-field').val();
            if (value > 0) {
                value = +value - 1;
                $(this).parent().find('.input-field').val(value);
            }
            if (value == 0) {
                $(this).attr('disabled', true);
            } else {
                return false;
            }
        }) // decrement the furnishing facilities
        $(document).on('click', '.increment', function() {
            let value = $(this).parent().find('.input-field').val();
            value = +value + 1;
            $(this).parent().find('.input-field').val(value);
            $(this).siblings('.decrement1').removeAttr('disabled');

        }) //increment the furnishing facilities


        $(document).on('click', 'input[name=commercial]', function() {
            let value = $(this).val().toLowerCase().trim();
            $('.locations').addClass('d-none');
            $('.office-type').parent().parent().addClass('d-none');
            let name = $(`input[name=${value}]`);

            $(name).each(function() {
                $(this).parent().parent().removeClass('d-none');
                $(this).removeClass('d-none');
            })
        }) //questions on commercial field



        $('.shop-location').on('click', function() {
            $('.locations').removeClass('d-none');
        }) // your shop location show


        $("#possession").change(function() {
            if ($(this).val() == 1 || $(this).val() == 2 || $(this).val() == 3) {
                $("#select-month").addClass('d-none');
            } else {
                $("#select-month").removeClass('d-none');
            } // enabled month field when choose years in possession
        });

        $('.question1').on('click', function() {
            $('.office-text1').parent().addClass('d-none');
            $('.office-text2').parent().addClass('d-none');
            $('.office-text3').parent().addClass('d-none');
            $('.office-text4').parent().addClass('d-none');
            $('.office-text5').parent().addClass('d-none');
            $('.office-text').parent().addClass('d-none');
            $('.office-text').parent().removeClass('d-none');
        });

        $('.question2').on('click', function() {
            $('.office-text').parent().addClass('d-none');
            $('.office-text2').parent().addClass('d-none');
            $('.office-text3').parent().addClass('d-none');
            $('.office-text4').parent().addClass('d-none');
            $('.office-text5').parent().addClass('d-none');
            $('.office-text1').parent().addClass('d-none');
            $('.office-text1').parent().removeClass('d-none');
        });

        $('.question3').on('click', function() {
            $('.office-text').parent().addClass('d-none');
            $('.office-text1').parent().addClass('d-none');
            $('.office-text3').parent().addClass('d-none');
            $('.office-text4').parent().addClass('d-none');
            $('.office-text5').parent().addClass('d-none');
            $('.office-text2').parent().addClass('d-none');
            $('.office-text2').parent().removeClass('d-none');
        });

        $('.question4').on('click', function() {
            $('.office-text').parent().addClass('d-none');
            $('.office-text1').parent().addClass('d-none');
            $('.office-text2').parent().addClass('d-none');
            $('.office-text4').parent().addClass('d-none');
            $('.office-text5').parent().addClass('d-none');
            $('.office-text3').parent().addClass('d-none');
            $('.office-text3').parent().removeClass('d-none');
        });

        $('.question5').on('click', function() {
            $('.office-text').parent().addClass('d-none');
            $('.office-text1').parent().addClass('d-none');
            $('.office-text2').parent().addClass('d-none');
            $('.office-text3').parent().addClass('d-none');
            $('.office-text5').parent().addClass('d-none');
            $('.office-text4').parent().addClass('d-none');
            $('.office-text4').parent().removeClass('d-none');
        });

        $('.question6').on('click', function() {
            $('.office-text').parent().addClass('d-none');
            $('.office-text1').parent().addClass('d-none');
            $('.office-text2').parent().addClass('d-none');
            $('.office-text3').parent().addClass('d-none');
            $('.office-text4').parent().addClass('d-none');
            $('.office-text5').parent().addClass('d-none');
            $('.office-text5').parent().removeClass('d-none');
        });

        $('.question7').on('click', function() {
            $('.office-text').parent().addClass('d-none');
            $('.office-text1').parent().addClass('d-none');
            $('.office-text2').parent().addClass('d-none');
            $('.office-text3').parent().addClass('d-none');
            $('.office-text4').parent().addClass('d-none');
            $('.office-text5').parent().addClass('d-none');

        });
        $('.show-other').on('click', function() {
            $('.other-field').addClass('d-none');
            $('.other-field').removeClass('d-none');

        });

        $('.hide-other').on('click', function() {
            $('.other-field').addClass('d-none');
        });

        $('.annual-rent').on('click', function() {
            $('.prerented-details').addClass('d-none');
            $('.prerented-details').removeClass('d-none');
            $('.hide-annual-rent').addClass('d-none');
        });

        $('.open-prerented-details').on('click', function() {
            $('.pre-leased').addClass('d-none');
            $('.pre-leased').removeClass('d-none');
        });

        $('.hide-prerented-details').on('click', function() {
            $('.pre-leased').addClass('d-none');

        });

        $(function() {
            $('.office-priviously').dropdownCheckboxes();
        });
        $('.save-button').on('click', function() {
            $('.hide-dropdown').addClass('d-none');

        }) //multiple select
        $('.open-dropdown').on('click', function() {
            $('.hide-dropdown').removeClass('d-none');

        }) //multiple select

        $('input[name="residential"]').on('click', function() {
            const value = $(this).val();
            $('document .show-apartment').each(function() {
                $(this).hide();
                const data = $(this).attr('data-div').split(' ');
                if (data.includes(value)) {
                    $(this).show();

                }
            });
        })
    })

    $('.dropify').dropify(); // Drop images and Photos


    $(document).on('click', '.lookingfor', function() {
        let lookingfor = $(this).val();
        let lookingforObj = {};
        switch (lookingfor) {
            case "sell":
                let lookingforObj = {
                    "lookingfor": "1"
                };
                localStorage.setItem('lookingforobj', JSON.stringify(lookingforObj));
                break;
            case "rent":
                let lookingforObjrent = {
                    "lookingfor": "2"
                };
                localStorage.setItem('lookingforobj', JSON.stringify(lookingforObjrent));
                break;
            case "pg":
                let lookingforObjPg = {
                    "lookingfor": "3"
                };
                localStorage.setItem('lookingforobj', JSON.stringify(lookingforObjPg));
                break;
            default:
                break;
        }
    });

    $(document).on('click', '.propertyType', function() {
        let value = $(this).val()
        let lookingforObj = JSON.parse(localStorage.getItem('lookingforobj'));
        lookingforObj.propertyType = value;
        localStorage.setItem('lookingforobj', JSON.stringify(lookingforObj));
        console.log(lookingforObj);

    });
    $(document).on('click', '.sub-property-type', function() {
        let lookingforObj = JSON.parse(localStorage.getItem('lookingforobj'));
        let value = $(this).val()
        lookingforObj.propertySubType = value;
        localStorage.setItem('lookingforobj', JSON.stringify(lookingforObj));
        console.log(lookingforObj);

    });
    $(document).on('click', '.sub-property-question', function() {
        let lookingforObj = JSON.parse(localStorage.getItem('lookingforobj'));
        let belongid = $(this).attr('data-question-b');
        let id = $(this).attr('data-question-id');
        let value = $(this).val();
        lookingforObj.questionbelongs = belongid;
        lookingforObj.questionId = id;
        lookingforObj.questionValue = value;
        localStorage.setItem('lookingforobj', JSON.stringify(lookingforObj));
        console.log(lookingforObj);

    });

    $(document).on('click', '.sub-property-question-located', function() {
        let lookingforObj = JSON.parse(localStorage.getItem('lookingforobj'));
        let quesid = $(this).attr('name');
        let value = $(this).val();
        lookingforObj.questionlocatedId = quesid;
        lookingforObj.questionlocatedValue = value;
        localStorage.setItem('lookingforobj', JSON.stringify(lookingforObj));
        console.log(lookingforObj);
    });
</script>