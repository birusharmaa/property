<?php
$option = '';
$j = 5;
for ($i = 0; $i <= 10; $i++) {
    $option .= "<option value=" . $i . ">" . (($i == 0) ? $i : $j - 5) . '-' . ($j) . "</option>";
    $j = $j + 5;
}
$session = session(); 
$session->create_action_type=="No"?$create_action="disabled":$create_action="";
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

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <lable>First Name</lable>
                                        <input type="text" name="firstName" class="first-name form-control form-control1" value="" placeholder="First Name">
                                        <span class="text-danger" id="firstName_error"></span>
                                    </div>                                    
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <lable>Last Name</lable>
                                        <input type="text" name="lastName" class="last-name form-control form-control1" value="" placeholder="Last Name">
                                        <span class="text-danger" id="lastName_error"></span>
                                    </div>   
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <lable>Email</lable>
                                        <input type="email" name="email" class="email form-control form-control1" value="" placeholder="Email">
                                        <span class="text-danger" id="email_error"></span>
                                    </div>     
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <lable>Phone Number</lable>
                                        <input type="number" name="number" class="number form-control form-control1" value="" placeholder="Mobile Number">
                                        <span class="text-danger" id="number_error"></span>
                                    </div>    
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <lable>Looking for</lable>
                                        <select class="looking-for form-select form-control1" aria-label="Default select example" name="lookingFor">
                                            <option selected value="">Select</option>
                                            <?php if (!empty($category)) : ?>
                                                <?php foreach ($category as $item) : ?>
                                                    <option value="<?= $item['id']; ?>"><?= $item['title']; ?></option>
                                            <?php endforeach;
                                            endif; ?>
                                        </select>
                                        <span class="text-danger" id="lookingFor_error"></span>
                                    </div>                                    
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <lable>Type Of Property</lable>
                                        <select class="property-type form-select form-control1 property_type" data-subproperty-list-id="subproperty-list<?= $i ?>" aria-label="Default select example" name="propertyType">
                                            <option selected value="">Select</option>
                                            <?php if (!empty($propertyType)) : foreach ($propertyType as $item) : ?>
                                                    <option value="<?= $item['cat_id']; ?>"><?= $item['cat_title']; ?></option>
                                            <?php endforeach;
                                            endif; ?>
                                        </select>
                                        <span class="text-danger" id="propertyType_error"></span>
                                    </div>   
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <lable>Type Of Sub Property</lable>
                                        <input type="text" id="city_<?= $i ?>" list="subproperty-list<?= $i ?>" name="propertySubType" class="form-control form-control1">
                                        <datalist id="subproperty-list<?= $i ?>"></datalist>
                                        <span class="text-danger" id="propertySubType_error"></span>
                                    </div>     
                                </div>                              
                            </div>
                             
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <lable>State</lable>
                                        <select class="state form-select form-control1" aria-label="Default select example" name="state" data-city-list-id="city<?= $i ?>">
                                            <option selected value="">Select</option>
                                            <?php foreach ($states as $state) : ?>
                                                <option value="<?= $state['id']; ?>"><?= $state['name']; ?></option>
                                            <?php endforeach; ?>
                                        </select>   
                                        <span class="text-danger" id="state_error"></span>
                                    </div>                                    
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <lable>City</lable>
                                        <input type="text" id="city_<?= $i ?>" list="city<?= $i ?>" name="city" class="form-control form-control1">
                                        <datalist id="city<?= $i ?>" class="city">
                                        </datalist>
                                        <span class="text-danger" id="city_error"></span>
                                    </div>   
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <lable>Properties in Localities</lable>
                                        <input type="text" id="location_<?= $i ?>" list="location<?= $i ?>" name="location" class="form-control form-control1">
                                        <datalist id="location<?= $i ?>">
                                        <?php if (!empty($localitieslist)) : foreach ($localitieslist as $key => $item) : ?>
                                                    <option value="<?= $item['locality_title'] ?>">
                                            <?php endforeach;
                                            endif; ?>
                                        </datalist>
                                        <span class="text-danger" id="location_error"></span>
                                    </div>     
                                </div>                              
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <lable>Price Range</lable>
                                        <input type="text" class="price form-control form-control1 price-buyers-range-input1" min="0" max="5" step="0.5" id="" name="priceRange">
                                        <div id="" class="price-range1 price-buyers-range1"></div> 
                                        <span class="text-danger" id="priceRange_error"></span>
                                    </div>                                    
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <lable>No. Of Bedrooms</lable>
                                        <select class="no-of-beds form-select form-control1" aria-label="Default select example" name="noOfBed">
                                            <option selected value="">Select</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                        <span class="text-danger" id="noOfBed_error"></span>
                                    </div>   
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <lable>No. Of Bathroom</lable>
                                        <select class="no-of-bathrooms form-select form-control1" aria-label="Default select example" name="noOfBathroom">
                                            <option selected value="">Select</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                        <span class="text-danger" id="noOfBathroom_error"></span>
                                    </div>     
                                </div>                              
                            </div>

                            <div class="row mt-4">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <lable>Square Feet</lable>
                                        <input type="text" class="price form-control form-control1 square-feet-range-input1" min="0" max="5" step="0.5" id="" name="square_feet">
                                        <div id="" class="price-range1 square-feet-range1"></div> 
                                        <span class="text-danger" id="square_feet_error"></span>
                                    </div>                                    
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <lable>Facing</lable>
                                        <select class="facing form-select form-control1 form-control2" aria-label="Default select example" name="facing">
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
                                        <span class="text-danger" id="facing_error"></span>
                                    </div>   
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <lable>Floor</lable>
                                        <select class="floor form-select form-control1 form-control2" aria-label="Default select example" name="floor">
                                            <option selected value="">Select</option>
                                            <option value="Lower Ground">Lower Ground</option>
                                            <option value="Ground">Ground</option>
                                            <option value="Basement">Basement</option>
                                            <?= $option ?>
                                        </select>
                                        <span class="text-danger" id="floor_error"></span>
                                    </div>     
                                </div>  
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <lable>Posted By</lable>
                                        <select class="posted-by form-select form-control1 form-control2" aria-label="Default select example" name="postedBy">
                                            <option selected>Select</option>
                                            <?php
                                            foreach ($user_lists as $user_list) {
                                            ?>
                                                <option value="<?= $user_list['id']; ?>"><?= $user_list['name']; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <span class="text-danger" id="postedBy_error"></span>
                                    </div>     
                                </div>                            
                            </div>
                             <div class="text-end mt-3">
                                 <Button class="btn btn-primary <?= $create_action;?>" id="addLeadCont">Save & Continue</Button>
                                 <Button class="btn btn-primary <?= $create_action;?>" id="addLeadSave">Save</Button>
                                 <a href="<?php echo base_url('all-leads')?>" class="btn btn-secondary">Close</a>
                             </div>               
                            
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
            min: 5000,
            max: 50000000,
            values: [75, 300],
            slide: function(event, ui) {
                $(".price-buyers-range-input1").val(`Rs ${ui.values[0]} - Rs ${ui.values[1]}`);
            }
        });

        $(".price-buyers-range-input1").val("Rs" + $(".price-buyers-range1").slider("values", 0) +
            " - Rs" + $(".price-buyers-range1").slider("values", 1));
    });

    $(function() {
        $(".square-feet-range1").slider({
            range: true,
            min: 0,
            max: 5000,
            values: [75, 300],
            slide: function(event, ui) {
                $(".square-feet-range-input1").val(`sq.ft. ${ui.values[0]} - sq.ft. ${ui.values[1]}`);
                // "$" + ui.values[ 0 ] + " - $" + ui.values[ 2 ]
            }
        });

        $(".square-feet-range-input1").val("sq.ft." + $(".square-feet-range1").slider("values", 0) +
            " - sq.ft." + $(".square-feet-range1").slider("values", 1));
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
     
    //new addLeadSave
    $("#addLeadSave").click(function(e) {
        e.preventDefault();

        $(".validation").remove();
        let firstName = "";
        let email = "";
        let number = "";
        let flag = false;
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
                       // $('#addLeadForm').trigger("reset");
                     
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: data.message,
                            showConfirmButton: false,
                            timer: 1500
                        })
                        window.location.replace(data.path);

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
                    }else if(jqxhr.status == 400){                                             
                        var errors = jqxhr.responseJSON.messages;
                        validation_errors(errors);  
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
    })

      //new addLeadCont
      $("#addLeadCont").click(function(e) {
        e.preventDefault();
        $(".validation").remove();

        let firstName = "";
        let email = "";
        let number = "";
        let flag = false;
       
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
                    console.log(jqxhr.status);
                    if (jqxhr.status == 404) {
                        alert('No data found');
                    }else if(jqxhr.status == 400){                      
                        var errors = jqxhr.responseJSON.messages;
                        validation_errors(errors); 
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


    function validation_errors(errors){
       
        if(errors.firstName){
            $('#firstName_error').text(errors.firstName);
        } else{
            $('#firstName_error').text('');
        }
        if(errors.email){
            $('#email_error').text(errors.email);            
        } else{
            $('#email_error').text('');
        }
        if(errors.city){
            $('#city_error').text(errors.city);           
        } else{
            $('#city_error').text('');
        }
        if(errors.facing_error){
            $('#facing_error').text(errors.facing_error);    
        } else{
            $('#facing_error').text('');
        }
        if(errors.floor){
            $('#floor_error').text(errors.floor);              
        } else{
            $('#floor_error').text('');
        }
        if(errors.location_error){
            $('#location_error').text(errors.location);              
        } else{
            $('#location_error').text('');
        }
        if(errors.lookingFor){
            $('#lookingFor_error').text(errors.lookingFor);                        
        } else{
            $('#lookingFor_error').text('');
        }
        if(errors.noOfBathroom){
            $('#noOfBathroom_error').text(errors.noOfBathroom);                        
        } else{
            $('#noOfBathroom_error').text('');
        }
        if(errors.noOfBed){
            $('#noOfBed_error').text(errors.noOfBed);                        
        } else{
            $('#noOfBed_error').text('');
        }
        if(errors.number){
            $('#number_error').text(errors.number);                        
        } else{
            $('#number_error').text('');
        }
        if(errors.propertySubType){
            $('#propertySubType_error').text(errors.propertySubType); 
        } else{
            $('#propertySubType_error').text('');
        }
        if(errors.propertyType){
            $('#propertyType_error').text(errors.propertyType); 
        } else{
            $('#propertyType_error').text('');
        }
        if(errors.state){
            $('#state_error').text(errors.state); 
        } else{
            $('#state_error').text('');
        }
    }
</script>