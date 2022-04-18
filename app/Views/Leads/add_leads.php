<?php
$option = '';
$j = 5;
for ($i = 0; $i <= 10; $i++) {
    $option .= "<option value=" . $i . ">" . (($i == 0) ? $i : $j - 5) . '-' . ($j) . "</option>";
    $j = $j + 5;
}
?>


<style type="text/css">
    .col-md-2.text-right {
        text-align: right;
    }
</style>
<div class="body-header border-0 rounded-0 px-xl-4 px-md-2">
    <div class="container-fluid">
        <div class="row pt-2">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center py-2">
                    <ol class="breadcrumb rounded-0 mb-0 ps-0 bg-transparent flex-grow-1">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add Leads
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="body mb-2 px-xl-4 px-md-2">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12">

                    <div class="card overflow-scroll p-4">
                        <form class="forms-sample" id="addLeadForm">
                            <table class="table display dataTable table-hover" style="width:100%">


                                <thead>
                                    <tr class="py-3 table-info">
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Looking for</th>


                                        <th>Type Of Property</th>
                                        <th>Type Of Sub Property</th>
                                        <th>State</th>
                                        <th>City</th>
                                        <th>Properties in Localities</th>

                                        <th>Price Range</th>
                                        <th>No. Of Bedrooms</th>
                                        <th>No. Of Bathroom</th>

                                        <th>Square Feet</th>

                                        <th>Facing</th>
                                        <th>Floor</th>

                                        <th>Posted By</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for ($i = 1; $i < 5; $i++) { ?>
                                        <tr>
                                            <td>
                                                <input type="text" name="firstName[]" class="first-name form-control form-control1 form-control2" value="" placeholder="First Name">
                                            </td>
                                            <td>
                                                <input type="text" name="lastName[]" class="last-name form-control form-control1 form-control2" value="" placeholder="Last Name">
                                            </td>
                                            <td>
                                                <input type="email" name="email[]" class="email form-control form-control1 form-control2" value="" placeholder="Email">
                                            </td>
                                            <td>
                                                <input type="number" name="number[]" class="number form-control form-control1 form-control2" value="" placeholder="Mobile Number">
                                            </td>
                                            <td>
                                                <select class="looking-for form-select form-control1 form-control2" aria-label="Default select example" name="lookingFor[]">
                                                    <option selected value="">Select</option>
                                                    <?php if (!empty($category)) : ?>
                                                        <?php foreach ($category as $item) : ?>
                                                            <option value="<?= $item['id']; ?>"><?= $item['title']; ?></option>
                                                    <?php endforeach;
                                                    endif; ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="property-type form-select form-control1 form-control2 property_type" data-subproperty-list-id="subproperty-list<?= $i ?>" aria-label="Default select example" name="propertyType[]">
                                                    <option selected value="">Select</option>
                                                    <?php if (!empty($propertyType)) : foreach ($propertyType as $item) : ?>
                                                            <option value="<?= $item['cat_id']; ?>"><?= $item['cat_title']; ?></option>
                                                    <?php endforeach;
                                                    endif; ?>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" id="city_<?= $i ?>" list="subproperty-list<?= $i ?>" name="propertySubType[]" class="form-control1 form-control2">
                                                <datalist id="subproperty-list<?= $i ?>"></datalist>

                                            </td>

                                            <td>
                                                <select class="state form-select form-control1 form-control2" aria-label="Default select example" name="state[]" data-city-list-id="city<?= $i ?>">
                                                    <option selected value="">Select</option>
                                                    <?php foreach ($states as $state) : ?>
                                                        <option value="<?= $state['id']; ?>"><?= $state['name']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </td>

                                            <td>
                                                <input type="text" id="city_<?= $i ?>" list="city<?= $i ?>" name="city[]" class="form-control1 form-control2">
                                                <datalist id="city<?= $i ?>" class="city">

                                                </datalist>

                                            </td>
                                            <td>
                                                <input type="text" id="location_<?= $i ?>" list="location<?= $i ?>" name="location[]" class="form-control1 form-control2">
                                                <datalist id="location<?= $i ?>">
                                                <?php if (!empty($localitieslist)) : foreach ($localitieslist as $key => $item) : ?>
                                                            <option value="<?= $item['locality_title'] ?>">
                                                    <?php endforeach;
                                                    endif; ?>
                                                </datalist>

                                           
                                            </td>
                                            <td>
                                                <input type="text" class="price form-control1 form-control2 price-buyers-range-input<?= $i; ?>" min="0" max="5" step="0.5" id="" name="priceRange[]">
                                                <div id="" class="price-range1 price-buyers-range<?= $i; ?>"></div>
                                            </td>
                                            <td>
                                                <select class="no-of-beds form-select form-control1 form-control2" aria-label="Default select example" name="noOfBed[]">
                                                    <option selected value="">Select</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="no-of-bathrooms form-select form-control1 form-control2" aria-label="Default select example" name="noOfBathroom[]">
                                                    <option selected value="">Select</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>

                                                </select>
                                            </td>


                                            <td>
                                                <input type="text" id="" class="form-control1 form-control2 square price-buyers-range-input<?= $i + 4; ?>" min="0" max="5" step="0.5" id="customRange3" name="squareFeet[]">
                                                <div id="" class="price-range1 price-buyers-range<?= $i + 4; ?>"></div>
                                            </td>

                                            <td>
                                                <select class="facing form-select form-control1 form-control2" aria-label="Default select example" name="facing[]">
                                                    <option selected value="">Select</option>
                                                    <option value="East">East</option>
                                                    <option value="North">North</option>
                                                    <option value="North - East">North - East</option>
                                                    <option value="North - West">North - West</option>
                                                    <option value="South">South</option>
                                                    <option value="South - East">South - East</option>
                                                    <option value="South - West">South - West</option>
                                                    <option value="West">West</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="floor form-select form-control1 form-control2" aria-label="Default select example" name="floor[]">
                                                    <option selected value="">Select</option>
                                                    <option value="Lower Ground">Lower Ground</option>
                                                    <option value="Ground">Ground</option>
                                                    <option value="Basement">Basement</option>
                                                    <?= $option ?>

                                                </select>
                                            </td>

                                            <td>
                                                <select class="posted-by form-select form-control1 form-control2" aria-label="Default select example" name="postedBy[]">
                                                    <option selected>Select</option>
                                                    <?php
                                                    foreach ($user_lists as $user_list) {
                                                    ?>
                                                        <option value="<?= $user_list['id']; ?>"><?= $user_list['name']; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                        </tr><?php } ?>
                                    <tr>
                                        <td><button class="btn btn-primary" id="addLead">Submit</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>

                    </div> <!-- .card end -->
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(function() {
        $(".price-buyers-range1").slider({
            range: true,
            min: 0,
            max: 500,
            values: [75, 300],
            slide: function(event, ui) {
                $(".price-buyers-range-input1").val(`Rs ${ui.values[0]} - Rs ${ui.values[1]}`);
            }
        });

        $(".price-buyers-range-input1").val("Rs" + $(".price-buyers-range1").slider("values", 0) +
            " - Rs" + $(".price-buyers-range1").slider("values", 1));
    });

    $(function() {
        $(".price-buyers-range2").slider({
            range: true,
            min: 0,
            max: 500,
            values: [75, 300],
            slide: function(event, ui) {
                $(".price-buyers-range-input2").val(`Rs ${ui.values[0]} - Rs ${ui.values[1]}`);
                // "$" + ui.values[ 0 ] + " - $" + ui.values[ 2 ]
            }
        });

        $(".price-buyers-range-input2").val("Rs" + $(".price-buyers-range2").slider("values", 0) +
            " - Rs" + $(".price-buyers-range2").slider("values", 1));
    });
    $(function() {
        $(".price-buyers-range3").slider({
            range: true,
            min: 0,
            max: 500,
            values: [75, 300],
            slide: function(event, ui) {
                $(".price-buyers-range-input3").val(`Rs ${ui.values[0]} - Rs ${ui.values[1]}`);
                // "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ]
            }
        });

        $(".price-buyers-range-input3").val("Rs" + $(".price-buyers-range3").slider("values", 0) +
            " - Rs" + $(".price-buyers-range3").slider("values", 1));
    });

    $(function() {
        $(".price-buyers-range4").slider({
            range: true,
            min: 0,
            max: 500,
            values: [75, 300],
            slide: function(event, ui) {
                $(".price-buyers-range-input4").val(`Rs ${ui.values[0]} - Rs ${ui.values[1]}`);
                // "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ]
            }
        });

        $(".price-buyers-range-input4").val("Rs" + $(".price-buyers-range4").slider("values", 0) +
            " - Rs" + $(".price-buyers-range4").slider("values", 1));
    });
    $(function() {
        $(".price-buyers-range5").slider({
            range: true,
            min: 0,
            max: 500,
            values: [75, 300],
            slide: function(event, ui) {
                $(".price-buyers-range-input5").val(`Sq ${ui.values[0]} - Sq ${ui.values[1]}`);
                // "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ]
            }
        });

        $(".price-buyers-range-input5").val("Sq" + $(".price-buyers-range5").slider("values", 0) +
            " - Sq" + $(".price-buyers-range5").slider("values", 1));
    });

    $(function() {
        $(".price-buyers-range6").slider({
            range: true,
            min: 0,
            max: 500,
            values: [56, 300],
            slide: function(event, ui) {
                $(".price-buyers-range-input6").val(`Sq ${ui.values[0]} - Sq ${ui.values[1]}`);
                // "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ]
            }
        });

        $(".price-buyers-range-input6").val("Sq" + $(".price-buyers-range6").slider("values", 0) +
            " - Sq" + $(".price-buyers-range6").slider("values", 1));
    });
    $(function() {
        $(".price-buyers-range8").slider({
            range: true,
            min: 0,
            max: 500,
            values: [75, 300],
            slide: function(event, ui) {
                $(".price-buyers-range-input8").val(`Sq ${ui.values[0]} - Sq ${ui.values[1]}`);
                // "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ]
            }
        });

        $(".price-buyers-range-input8").val("Sq" + $(".price-buyers-range8").slider("values", 0) +
            " - Sq" + $(".price-buyers-range8").slider("values", 1));
    });

    $(function() {
        $(".price-buyers-range7").slider({
            range: true,
            min: 0,
            max: 500,
            values: [75, 300],
            slide: function(event, ui) {
                $(".price-buyers-range-input7").val(`Sq ${ui.values[0]} - Sq ${ui.values[1]}`);
                // "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ]
            }
        });
        $(".price-buyers-range-input7").val("Sq" + $(".price-buyers-range7").slider("values", 0) +
            " - Sq" + $(".price-buyers-range7").slider("values", 1));
    });

    //new FormData(this)
    $("#addLead").click(function(e) {
        e.preventDefault();
        $(".validation").remove();

        let firstName = "";
        let email = "";
        let number = "";
        let flag = false;
        $('table > tbody  > tr').each(function(index, e) {
            //var firstName  = tr.find()
            firstName = $(e).find('.first-name').val();
            email = $(e).find('.email').val();
            number = $(e).find('.number').val();
            if (firstName && email && number) {
                flag = true;
            }
            if (!ValidateEmail(email) && email) {
                flag = false;
                $(e).find('.email').addClass("input-error");
                $(e).find('.email').parent().append('<span class="text-danger validation">Please enter valid email.</span>');
            }

            if (!validate_Phone_Number(number) && number) {
                flag = false;
                $(e).find('.number').addClass("input-error");
                $(e).find('.number').parent().append('<span class="text-danger validation">Please enter valid number.</span>');
            }
        });
        if (flag) {
            let form = document.getElementById('addLeadForm');
            let formData = new FormData(form);

            let url = "<?= base_url('leadsApi/addLeads'); ?>";
            $.ajax({
                type: "POST",
                url: url,
                data: formData,
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    if (data.success) {
                        $('#addLeadForm').trigger("reset");
                     
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: data.message,
                            showConfirmButton: false,
                            timer: 1500
                        })

                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: data.messages.message,
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }

                },
                error: function(jqxhr, eception) {
                    if (jqxhr.status == 404) {
                        alert('No data found');
                    }
                    if (jqxhr.responseJSON.messages.category) {
                        Swal.fire({
                            icon: 'info',
                            title: 'Oops...',
                            text: jqxhr.responseJSON.messages.category,
                            showConfirmButton: false,
                            timer: 1500
                        })
                      
                    }
                }
            });
        } else {
            $.toast({
                heading: 'Error',
                text: "Please enter atleast one proper lead details.",
                showHideTransition: 'fade',
                position: 'top-right',
                icon: 'error'
            });
        }
    })

    function getCategory(val) {
        let url = "<?= base_url('leadsApi/all-subcategory'); ?>";
        $.ajax({
            type: "Get",
            url: url,
            data: {
                catId: val
            },
            success: function(data) {
                let htmlData = "";
                if (data.length > 0) {
                    $("#subcategory1").html("");
                    console.log(data);
                    htmlData = "<option value=''>Select</option>";
                    for (let i = 0; i < data.length; i++) {
                        htmlData += `<option value="${data[i]['id']}">${data[i]['title']}</option>`;
                    }
                    $("#subcategory1").append(htmlData);
                } else {
                    $("#subcategory1").html("");
                    htmlData = '<option value="">Select</option>';
                    $("#subcategory1").append(htmlData);
                }

            },
            error: function(jqxhr, eception) {

                $("#subcategory1").html("");
                var htmlData = '<option value="">Select</option>';
                $("#subcategory1").append(htmlData);
                if (jqxhr.status == 404) {
                    alert('No data found');
                }
            }
        });
    }
    // $("#addLeadForm")
    // $("#addLeadForm").on('submit', (function (e) {
    // }

    function ValidateEmail(email) {
        if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
            return true;
        }
        return false;
    }

    function validate_Phone_Number(number) {
        var filter = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
        if (filter.test(number) && number.length == 10) {
            return true;
        } else {
            return false;
        }
    }

    $(".email").keyup(function(event) {
        $(this).parent().find(".validation").remove();
    });

    $(".number").keyup(function(event) {
        $(this).parent().find(".validation").remove();
    });


    $(".state").on('change', function() {
        let elm = this;
        let state_id = $(elm).val();
        let city_listId = $(elm).attr('data-city-list-id');
        let url = "<?= base_url('leadsApi/all-cities'); ?>";
        $.ajax({
            type: "Get",
            url: url,
            data: {
                state_id: state_id
            },
            success: function(data) {

                let htmlData = "";
                if (data.length > 0) {
                    for (let i = 0; i < data.length; i++) {
                        htmlData += `<option value="${data[i]['city']}">`;
                    }
                }
                $(`#${city_listId}`).html(htmlData);
            },
            error: function(jqxhr, eception) {
                $("#subcategory1").html("");
                var htmlData = '<option value="">Select</option>';
                $("#subcategory1").append(htmlData);
                if (jqxhr.status == 404) {
                    alert('No data found');
                }
            }
        });
    });


    /**
     * Event for load sub property type
     */

    $(document).on('change', '.property_type', function() {
        let elm = this;
        let proertyTypeId = $(this).val();
        let subproperty_listId = $(this).attr('data-subproperty-list-id');
        let url = "<?= base_url('leadsApi/all-subproperty-type'); ?>";
        $.ajax({
            type: "post",
            url: url,
            data: {
                proertyTypeId
            },
            success: function(data) {
                let htmlData = "";

                if (data.length > 0) {
                    data.forEach(el => {
                        htmlData += `<option value="${el['title']}">`;
                    });
                }
                $(`#${subproperty_listId}`).html(htmlData);
            },
            error: function(jqxhr, eception) {
                var htmlData = '<option value="No-data">';
                if (jqxhr.status == 404) {
                    alert('No data found');
                    $(`#${subproperty_listId}`).html(htmlData);
                }
            }
        });
    });
</script>