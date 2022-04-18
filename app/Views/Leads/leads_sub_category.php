
<div class="body-header border-0 rounded-0 px-xl-4 px-md-2">
    <div class="container-fluid">
        <div class="row pt-2">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center py-2">
                    <ol class="breadcrumb rounded-0 mb-0 ps-0 bg-transparent flex-grow-1">
                        <li class="breadcrumb-item"><a href="<?=base_url();?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Leads Sub Category</li>
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
                        <h1 class=" fw-bolder">Leads Sub Category</h1>
                    </div> -->
                    <div class="card p-4">
                        <table id="subcategory" class="table table-striped display dataTable table-hover"
                            style="width:100%">
                            <div class="align1 pb-2">
                                <button class="btn btn-primary" data-bs-toggle="modal"
                                    href="#categorymodal2" type="submit">Add Sub Category</button>
                            </div>
                            <thead>
                                <tr class="py-3 table-info">
                                    <th>#ID</th>
                                    <th>Sub-Category Name</th>
                                    <th>Category Name</th>
                                    <th>Active</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div> <!-- .card end -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- First modal dialog -->
<div class="modal fade" id="categorymodal2" aria-hidden="true" aria-labelledby="categorymdl2"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content card">
            <div class="modal-header red-bg">
                <h5 class="modal-title text-white" id="categorymdl2">Lead Sub Category</h5>
                <button type="button" class=" btn-close-white btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <!-- Name input -->
                    <div class="form-outline mb-4">
                        <label class="form-label fw-bold" for="subname">Category Name</label>
                        <select id="category" name="category" class="form-select form-control1">
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
                    <div class="form-outline mb-4">
                        <label class="form-label fw-bold" for="subname">SubCategory</label>
                        <input type="text" id="subCategoryVal" class="form-select form-control1" >
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" id="subCategoryBtn">ADD SUB CATEGORY </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editSubCategoyModal" aria-hidden="true" aria-labelledby="editSubCategoyModal"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content card">
            <div class="modal-header red-bg">
                <h5 class="modal-title text-white" id="editSubCategoyModal">Category Form</h5>
                <button type="button" class="btn-close-white btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-outline mb-4">
                        <label class="form-label fw-bold" for="subname">Category Name</label>
                        <select id="editCatName" name="editCatName" class="form-select form-control1">
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
                    <input type="hidden" id="catSubId" name="catId" value="" />
                    <input type="hidden" id="catSubName" name="catName" value="" />
                    <!-- Name input -->
                    <div class="form-outline mb-4">
                        <label class="form-label fw-bold" for="form5Example1">Sub Category Name</label>
                        <input type="text" id="editSubCategoyVal" name="editCategoyVal" class="form-control form-control1" />
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" id="editSubCategory">UPDATE</button>
            </div>
        </div>
    </div>
</div>


<script>
$(document).ready(function() {
    //$('#subcategory').DataTable();
    loadAllSubCategory();
})

$("#subCategoryBtn").click(function (e) {
    e.preventDefault();
    $("#leadCategory").val();
    $(".validation").remove();
    
    let url = "<?= base_url('leadsApi/saveSubCategory');?>";
    $.ajax({
        type: "POST",
        url: url,
        data:{
            "category":$("#category").val(),
            "subCategory":$("#subCategoryVal").val()
        },
        dataType:'json',
        success: function (data) {
            console.log(data);
            if(data.success){
                loadAllSubCategory();
                $("#categorymodal2").modal("hide");
                $.toast({
                    heading: 'Success',
                    text: data.message,
                    showHideTransition: 'fade',
                    position: 'top-right',
                    icon: 'success'
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
            if(jqxhr.responseJSON.messages.subCategory){
                $.toast({
                    heading: 'Error',
                    text: jqxhr.responseJSON.messages.subCategory,
                    showHideTransition: 'fade',
                    position: 'top-right',
                    icon: 'error'
                });
            }
        }
    });
});

function loadAllSubCategory() {
    let url = "<?= base_url('leadsApi/allSubCategory');?>";
    $.ajax({
        type: "Get",
        url: url,
        success: function (data) {
            getAllSubCategory(data)
        },
        error: function (jqxhr, eception) {
            if (jqxhr.status == 404) {
                alert('No data found');
            }
        }
    });
}

function getAllSubCategory(data){
    let html = ``;
    var first = 0;
    var num = 0;
    table = $('#subcategory').DataTable();
    let dataSet = [];
    if (data) {
        data.forEach(e => {
            if (first == 0) { first = e.id; }
            let edit =`<a href= "#" class="text-info"  onclick="editSubCategoy(${e.id}, '${e.title}', ${e.category_id})"><i class="fas fa-edit"></i></a>`;
            let del =`<a href= "#" class="text-danger ml-2"  onclick="deleteSubCategory(${e.id}, '${e.title}')"><i class="fas fa-trash"></i></a>`;
            let swith = '';
            if(e.status=='1'){
                swith = `<div class="custom-control custom-switch"><input type="checkbox" class="custom-control-input" `+
                    `onchange="changeSubStatus(${e.id})" checked>`+
                    `<label class="custom-control-label" for="customSwitches">&nbsp&nbspActive</label>`+
                    `</div>`;
            }else{
                swith = `<div class="custom-control custom-switch"><input type="checkbox" class="custom-control-input" `+
                    `onchange="changeSubStatus(${e.id})">`+
                    `<label class="custom-control-label" for="customSwitches">&nbsp&nbspDeactive</label>`+
                    `</div>`;
            }

            let row = [e.id, e.title, e.cat_name, swith, edit+" "+del];
            dataSet.push(row);
        });
    }

    table.destroy();
    $('#subcategory').DataTable({
        data: dataSet,
        "responsive": true,
        "bFilter": false,
        "columnDefs": [
            {
                "targets": [],
                "visible": false,
                "searchable": false
            },
            {
                "targets": [],
                "visible": false
            }
        ],
    });
}

function changeSubStatus(id){
    let url = "<?= base_url('leadsApi/changeSubStatus');?>";
    $.ajax({
        type: "POST",
        url: url,
        data:{
            "id":id
        },
        dataType:'json',
        success: function (data) {
            if(data.success){
                loadAllSubCategory();
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
}

function editSubCategoy(id, title, catId){
    $("#catSubId").val(id);
    $("#editSubCategoyVal").val(title);
    $("#catSubName").val(title);
    $("#editCatName").val(catId);
    $("#editSubCategoyModal").modal("show");
}

$("#editSubCategory").click(function (e) {
    e.preventDefault();

    let url = "<?= base_url('leadsApi/update-subcategory');?>";
    var id = $("#catSubId").val();
    var catName = $("#editCatName").val();
    var subName = $("#editSubCategoyVal").val();
    $.ajax({
        type: "POST",
        url: url,
        data:{
            "id":id,
            "catName": catName,
            "subName": subName
        },
        dataType:'json',
        success: function (data) {
            if(data.success){
                loadAllSubCategory();
                $("#editSubCategoyModal").modal("hide");
                $.toast({
                    heading: 'Success',
                    text: data.message,
                    showHideTransition: 'fade',
                    position: 'top-right',
                    icon: 'success'
                });
            }
        },
        error: function (jqxhr, eception) {
            if (jqxhr.status == 404) {
                alert('No data found');
            }
            if(jqxhr.responseJSON.messages.catName){
                $.toast({
                    heading: 'Error',
                    text: jqxhr.responseJSON.messages.catName,
                    showHideTransition: 'fade',
                    position: 'top-right',
                    icon: 'error'
                });
            }
            if(jqxhr.responseJSON.messages.subName){
                $.toast({
                    heading: 'Error',
                    text: jqxhr.responseJSON.messages.subName,
                    showHideTransition: 'fade',
                    position: 'top-right',
                    icon: 'error'
                });
            }
        }
    });
});

function deleteSubCategory (id, title){
    $("#catSubId").val(id);
    Swal.fire({
        title: 'Delete Sub Category?',
        text: "Are you sure to delete "+title+" sub category ?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            var id = $("#catSubId").val();
            let url = "<?= base_url('leadsApi/delete-subcategory');?>";
            $.ajax({
                type: "POST",
                url: url,
                data:{
                    "id":id
                },
                dataType:'json',
                success: function (data) {
                    if(data.success){
                        loadAllSubCategory();
                        $.toast({
                            heading: 'Success',
                            text: data.message,
                            showHideTransition: 'fade',
                            position: 'top-right',
                            icon: 'success'
                        });
                    }
                    
                },
                error: function (jqxhr, eception) {
                    if (jqxhr.status == 404) {
                        alert('No data found');
                    }
                    if(jqxhr.responseJSON.messages.id){
                        $.toast({
                            heading: 'Error',
                            text: jqxhr.responseJSON.messages.id,
                            showHideTransition: 'fade',
                            position: 'top-right',
                            icon: 'error'
                        });
                    }
                }
            });
        }
    })
}
</script>
    