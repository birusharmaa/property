<?php 
// echo"<pre>";
// print_r($validation);
// exit;
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
                        <li class="breadcrumb-item"><a href="<?=base_url();?>">Home</a></li>
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
                    <!-- <div class="red-bg text-center text-white rounded py-2 mb-3">
                        <h1 class=" fw-bolder">Add Leads</h1>
                    </div> -->
                    <div class="card overflow-scroll p-4">
                        <form class="forms-sample" id="addLeadForm" >
                        <table class="table display dataTable table-hover"
                            style="width:100%">
                            <div class="row pb-2">
                                <div class="col-md-1 pr-0 ">
                                    <label class="form-label fw-bold mt-2" for="subname">Category</label>
                                </div>
                                <div class="col-md-2 pl-0">
                                    <select id="category" name="category" class="form-select form-control1" onChange="getCategory(this.value)">
                                        <option value="">--Select Category--</option>
                                        <?php 
                                            foreach($category as $value){
                                                ?>
                                                <option value="<?= $value['id'];?>"><?= $value['title'];?></option>
                                                <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-2 text-right">
                                        <label for="subcategory" class="fw-bold mt-2">Sub Category</label>
                                </div>
                                <div class="col-md-2">
                                    <select class="form-control form-control1" id="subcategory1" name="subcategory1">
                                        <option value="">Select</option>
                                    </select>
                                </div>
                                <div class="col-md-2 offset-3">
                                    <div class="align1 pb-2">
                                        <!-- <input class="form-control myform-control input-group" id="enqDate" data-date-format="dd-mm-yyyy" placeholder="DD-MM-YYYY" />
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span> -->
                                        <input type="date" class="btn btn-primary" id="dateValue" >
                                    </div>
                                </div>
                            </div>
                            
                            <thead>
                                <tr class="py-3 table-info">
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Looking for</th>
                                    <th>No. Of Bedrooms</th>
                                    <th>No. Of Bathroom</th>
                                    <th>Price Range</th>
                                    <th>Type Of Property</th>
                                    <th>State</th>
                                    <th>City</th>
                                    <th>Square Feet</th>
                                    <th>Properties in Localities</th>
                                    <th>Facing</th>
                                    <th>Floor</th>
                                    <th>Commercial</th>
                                    <th>Posted By</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php for($i=1; $i<5; $i++) {?>
                                    <tr>
                                        <td>
                                            <input type="text"
                                             name="firstName[]" class="first-name form-control form-control1 form-control2" value="" placeholder="First Name" >
                                        </td>
                                        <td>
                                            <input type="text"
                                              name="lastName[]" class="last-name form-control form-control1 form-control2" value="" placeholder="Last Name" >
                                        </td>
                                        <td>
                                            <input type="email"
                                              name="email[]" class="email form-control form-control1 form-control2" value="" placeholder="Email" >
                                        </td>
                                        <td>
                                            <input type="number"
                                             name="number[]" class="number form-control form-control1 form-control2" value="" placeholder="Mobile Number" >
                                        </td>
                                        <td>
                                            <select class="looking-for form-select form-control1 form-control2"
                                                aria-label="Default select example" name="lookingFor[]">
                                                <option selected value="">Select</option>
                                                <option value="Rent">Rent</option>
                                                <option value="Sale">Sale</option>
                                                <option value="Buy">Buy</option>
                                            </select>
                                        </td>
                                        <td>
                                            <select class="no-of-beds form-select form-control1 form-control2"
                                                aria-label="Default select example" name="noOfBed[]">
                                                <option selected value="">Select</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                        </td>
                                        <td>
                                        <select class="no-of-bathrooms form-select form-control1 form-control2"
                                                aria-label="Default select example" name="noOfBathroom[]">
                                                <option selected value="">Select</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text"
                                                class="price form-control1 form-control2 price-buyers-range-input<?= $i; ?>" min="0" max="5" step="0.5"
                                                id=""  name="priceRange[]">
                                            <div id="" class="price-range1 price-buyers-range<?= $i; ?>"></div>
                                        </td>
                                        <td>
                                            <select class="property-type form-select form-control1 form-control2"
                                                aria-label="Default select example" name="propertyType[]">
                                                <option selected value="">Select</option>
                                                <option value="Multi Family">Multi Family</option>
                                                <option value="TownHouse">TownHouse</option>
                                                <option value="Condo">Condo</option>
                                            </select>
                                        </td>
                                        <td>
                                            <select class="state form-select form-control1 form-control2"
                                                aria-label="Default select example" name="state[]">
                                                <option selected value="">Select</option>
                                                <?php 
                                                    foreach($states as $state){
                                                        ?>
                                                        <option value="<?= $state['id'];?>"><?= $state['name'];?></option>
                                                        <?php
                                                    }
                                                ?>
                                            </select>
                                        </td>

                                        <td>
                                            <select class="city form-select form-control1 form-control2"
                                                aria-label="Default select example" name="city[]">
                                                <option selected>Select</option>
                                            </select>
                                        </td>
                                        
                                        <td>
                                            <input type="text" id=""
                                                class="form-control1 form-control2 square price-buyers-range-input<?= $i+4; ?>" min="0" max="5" step="0.5"
                                                id="customRange3" name="squareFeet[]">
                                            <div id="" class="price-range1 price-buyers-range<?= $i+4; ?>"></div>
                                        </td>
                                        <td>
                                            <select class="location form-select form-control1 form-control2"
                                                aria-label="Default select example" name="location[]">
                                                <option selected value="">Select</option>
                                                <option value="Upcoming localities">Upcoming localities</option>
                                                <option value="Developed localities">Developed localities</option>
                                                <option value="Premium Localities">Premium Localities</option>
                                            </select>
                                        </td>
                                        <td>
                                            <select class="facing form-select form-control1 form-control2"
                                                aria-label="Default select example" name="facing[]">
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
                                            <select class="floor form-select form-control1 form-control2"
                                                aria-label="Default select example" name="floor[]">
                                                <option selected value="">Select</option>
                                                <option value="Basement">Basement</option>
                                                <option value="Ground">Ground</option>
                                                <option value="1-4">1-4</option>
                                            </select>
                                        </td>
                                        <td>
                                            <select class="commercial form-select form-control1 form-control2"
                                                aria-label="Default select example" name="commercial[]">
                                                <option selected value="">Select</option>
                                                <option value="Office Space">Office Space</option>
                                                <option value="Shop/Showroom">Shop/Showroom</option>
                                                <option value="Commercial Land">Commercial Land</option>
                                                <option value="Warehouse/ Godown">Warehouse/ Godown</option>
                                                <option value="Industrial Building">Industrial Building</option>
                                                <option value="Industrial Shed">Industrial Shed</option>
                                            </select>
                                        </td>
                                        <td>
                                            <select class="posted-by form-select form-control1 form-control2"
                                                aria-label="Default select example" name="postedBy[]">
                                                <option selected>Select</option>
                                                <?php 
                                                    foreach($user_lists as $user_list){
                                                        ?>
                                                        <option value="<?= $user_list['id'];?>"><?= $user_list['name'];?></option>
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

<?php include __DIR__ . '/../Layout/footer.php'; ?>
<?php include __DIR__ . '/../Layout/jsLinks.php'; ?>
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
    $("#addLead").click(function (e) {
        e.preventDefault();
        $(".validation").remove();

        let firstName = "";
        let email     = "";
        let number    = "";
        let flag = false;
        $('table > tbody  > tr').each(function(index, e) { 
            //var firstName  = tr.find()
            firstName = $(e).find('.first-name').val();
            email     = $(e).find('.email').val();
            number    = $(e).find('.number').val();
            if(firstName && email && number){
                flag = true;
            }
            if(!ValidateEmail(email) && email){
                flag = false;
                $(e).find('.email').addClass("input-error");
                $(e).find('.email').parent().append('<span class="text-danger validation">Please enter valid email.</span>');
            }
            
            if(!validate_Phone_Number(number) && number){
                flag = false;
                $(e).find('.number').addClass("input-error");
                $(e).find('.number').parent().append('<span class="text-danger validation">Please enter valid number.</span>');
            }
        });
        if(flag){
            let form = document.getElementById('addLeadForm');
            let formData = new FormData(form);

            let url = "<?= base_url('leadsApi/addLeads');?>";
            $.ajax({
                type: "POST",
                url: url,
                data: formData,
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    if(data.success){
                        $('#addLeadForm').trigger("reset");
                        $.toast({
                            heading: 'Success',
                            text: data.message,
                            showHideTransition: 'fade',
                            position: 'top-right',
                            icon: 'success'
                        });
                    }else{
                        $.toast({
                            heading: 'Error',
                            text: data.messages.message,
                            showHideTransition: 'fade',
                            position: 'top-right',
                            icon: 'error'
                        });
                    }
                    
                },
                error: function (jqxhr, eception) {
                    if (jqxhr.status == 404) {
                        alert('No data found');
                    }
                    if(jqxhr.responseJSON.messages.category){
                        $.toast({
                            heading: 'Error',
                            text: jqxhr.responseJSON.messages.category,
                            showHideTransition: 'fade',
                            position: 'top-right',
                            icon: 'error'
                        });
                    }
                }
            });
        }else{
            $.toast({
                heading: 'Error',
                text: "Please enter atleast one proper lead details.",
                showHideTransition: 'fade',
                position: 'top-right',
                icon: 'error'
            });
        }
    })

    function getCategory(val){
        let url = "<?= base_url('leadsApi/all-subcategory');?>";
        $.ajax({
            type: "Get",
            url: url,
            data:{
                catId: val
            },
            success: function (data) {
                let htmlData = "";
                if(data.length>0){
                    $("#subcategory1").html("");
                    console.log(data);
                    htmlData = "<option value=''>Select</option>";
                    for(let i=0; i<data.length; i++){
                        htmlData += `<option value="${data[i]['id']}">${data[i]['title']}</option>`;
                    }
                    $("#subcategory1").append(htmlData);
                }else{
                    $("#subcategory1").html("");
                    htmlData = '<option value="">Select</option>';
                    $("#subcategory1").append(htmlData);
                }

            },
            error: function (jqxhr, eception) {
                
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
        if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)){
            return true;
        }
        return false;
    }

    function validate_Phone_Number(number) {
        var filter = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
        if (filter.test(number) && number.length ==10 ) {
            return true;
        }
        else {
            return false;
        }
    }

    $(".email").keyup(function(event) {
        $(this).parent().find(".validation").remove();
    });

    $(".number").keyup(function(event) {
        $(this).parent().find(".validation").remove();
    });

    $(".state").on('change', function(){
        let elm = this;
        let state_id = $(elm).val();
        let url = "<?= base_url('leadsApi/all-cities');?>";
        $.ajax({
            type: "Get",
            url: url,
            data:{
                state_id: state_id
            },
            success: function (data) {
                let htmlData = "";
                if(data.length>0){
                    $(elm).parent().parent().find('.city').html("");
                    htmlData = "<option value=''>Select</option>";
                    for(let i=0; i<data.length; i++){
                        htmlData += `<option value="${data[i]['id']}">${data[i]['name']}</option>`;
                    }
                    $(elm).parent().parent().find('.city').append(htmlData);
                }else{
                    $(elm).parent().parent().find('.city').html("");
                    htmlData = '<option value="">Select</option>';
                    $(elm).parent().parent().find('.city').append(htmlData);
                }

            },
            error: function (jqxhr, eception) {
                
                $("#subcategory1").html("");
                var htmlData = '<option value="">Select</option>';
                $("#subcategory1").append(htmlData);
                if (jqxhr.status == 404) {
                    alert('No data found');
                }
            }
        });
    });
</script>
    