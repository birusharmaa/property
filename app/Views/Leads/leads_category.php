<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Admin - Leads Category</title>
    <?php //include __DIR__ . '/../Layout/cssLinks.php'; ?>
</head>

<body>

    <body>
        <div id="layout-p" class="theme-navy">
            <?php //include __DIR__ . '/../Layout/header.php'; ?>
            <?php //include __DIR__ . '/../Layout/sidebar.php'; ?>
            <div class="main"> -->
<style type="text/css">
    
</style>

<div class="body-header border-0 rounded-0 px-xl-4 px-md-2">
    <div class="container-fluid">
        <div class="row pt-2">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center py-2">
                    <ol class="breadcrumb rounded-0 mb-0 ps-0 bg-transparent flex-grow-1">
                        <li class="breadcrumb-item"><a href="<?=base_url();?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Leads Category</li>
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
                    <!-- <div class="red-bg text-center text-white py-2 mb-3">
                        <h1 class=" fw-bolder">Leads Category</h1>
                    </div> -->
                    <div class="card p-4">
                            <table id="category" class="table table-striped display dataTable table-hover" style="width:100%">
                                <div class="align1 pb-2">
                                    <button class="btn btn-primary" data-bs-toggle="modal"
                                        href="#categorymodal1" type="submit">Leads Category
                                    </button>
                                </div>
                                <thead>
                                    <tr>
                                        <th>#ID</th>
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
<div class="modal fade" id="categorymodal1" aria-hidden="true" aria-labelledby="categorymdl1"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content card">
            <div class="modal-header red-bg">
                <h5 class="modal-title text-white" id="categorymdl1">Category Form</h5>
                <button type="button" class="btn-close-white btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <!-- Name input -->
                    <div class="form-outline mb-4">
                        <label class="form-label fw-bold" for="form5Example1">Category Name</label>
                        <input type="text" id="leadCategory" name="leadCategory" class="form-control form-control1" />
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" id="addCategory">CREATE</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editCategoyModal" aria-hidden="true" aria-labelledby="editCategoyModal"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content card">
            <div class="modal-header red-bg">
                <h5 class="modal-title text-white" id="editCategoyModal">Category Form</h5>
                <button type="button" class="btn-close-white btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <input type="hidden" id="catId" name="catId" value="" />
                    <input type="hidden" id="catName" name="catName" value="" />
                    <!-- Name input -->
                    <div class="form-outline mb-4">
                        <label class="form-label fw-bold" for="form5Example1">Category Name</label>
                        <input type="text" id="editCategoyVal" name="editCategoyVal" class="form-control form-control1" />
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" id="editCategory">UPDATE</button>
            </div>
        </div>
    </div>
</div>



<script>
$(document).ready(function() {
    loadAllCategory();
    
})

function loadAllCategory() {
    let url = "<?= base_url('leadsApi/all');?>";
    $.ajax({
        type: "Get",
        
        url: url,
        success: function (data) {
            getAllCategory(data)
        },
        error: function (jqxhr, eception) {
            if (jqxhr.status == 404) {
                alert('No data found');
            }
        }
    });
}

function getAllCategory(data){
    let html = ``;
    var first = 0;
    var num = 0;
    table = $('#category').DataTable();
    let dataSet = [];
    if (data) {
        data.forEach(e => {
            if (first == 0) { first = e.id; }
            let edit =`<a href= "#" class="text-info"  onclick="editCategoy(${e.id}, '${e.title}')"><i class="fas fa-edit"></i></a>`;
            let del =`<a href= "#" class="text-danger ml-2"  onclick="deleteCategory(${e.id}, '${e.title}')"><i class="fas fa-trash"></i></a>`;
            let swith = '';
            if(e.status=='1'){
                swith = `<div class="custom-control custom-switch"><input type="checkbox" class="custom-control-input" `+
                    `onchange="changeStatus(${e.id})" checked>`+
                    `<label class="custom-control-label" for="customSwitches">&nbsp&nbspActive</label>`+
                    `</div>`;
            }else{
                swith = `<div class="custom-control custom-switch"><input type="checkbox" class="custom-control-input" `+
                    `onchange="changeStatus(${e.id})">`+
                    `<label class="custom-control-label" for="customSwitches">&nbsp&nbspDeactive</label>`+
                    `</div>`;
            }

            let row = [e.id, e.title, swith, edit+" "+del];
            dataSet.push(row);
        });
    }

    table.destroy();
    $('#category').DataTable({
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


$("#addCategory").click(function (e) {
    e.preventDefault();
    $("#leadCategory").val();
    $(".validation").remove();
    
    let url = "<?= base_url('leadsApi/saveCategory');?>";
    $.ajax({
        type: "POST",
        url: url,
        data:{
            "category":$("#leadCategory").val()
        },
        dataType:'json',
        success: function (data) {
            if(data.success){
                loadAllCategory();
                $("#categorymodal1").modal("hide");
                $("#leadCategory").val("");
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
        }
    });
});


function changeStatus(id){
    let url = "<?= base_url('leadsApi/changeStatus');?>";
    $.ajax({
        type: "POST",
        url: url,
        data:{
            "id":id
        },
        dataType:'json',
        success: function (data) {
            if(data.success){
                loadAllCategory();
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

function editCategoy(id, title){
    $("#catId").val(id);
    $("#editCategoyVal").val(title);
    $("#catName").val(title);
    $("#editCategoyModal").modal("show");
}

$("#editCategory").click(function (e) {
    e.preventDefault();

    let url = "<?= base_url('leadsApi/update-category');?>";
    var id = $("#catId").val();
    var catName = $("#editCategoyVal").val();
    $.ajax({
        type: "POST",
        url: url,
        data:{
            "id":id,
            "catName": catName
        },
        dataType:'json',
        success: function (data) {
            if(data.success){
                loadAllCategory();
                $("#editCategoyModal").modal("hide");
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
        }
    });
});

function deleteCategory(id, title){
    $("#catId").val(id);
    Swal.fire({
        title: 'Delete Category?',
        text: "Are you sure to delete "+title+" category ?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            var id = $("#catId").val();
            let url = "<?= base_url('leadsApi/delete-category');?>";
            $.ajax({
                type: "POST",
                url: url,
                data:{
                    "id":id
                },
                dataType:'json',
                success: function (data) {
                    if(data.success){
                        loadAllCategory();
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
    