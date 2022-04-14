<div class="body-header border-0 rounded-0 px-xl-4 px-md-2">
    <div class="container-fluid">
        <div class="row pt-2">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center py-2">
                    <ol class="breadcrumb rounded-0 mb-0 ps-0 bg-transparent flex-grow-1">
                        <li class="breadcrumb-item"><a href="<?=base_url();?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">All Leads</li>
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
                <div class="card p-4">
                    <table id="buyerslead" class="table table-striped display dataTable table-hover"
                        style="width:100%">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row mb-2">
                                    
                                    <div class="col-md-6 offset-6">
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                            <button class="btn btn-primary me-md-2"
                                                type="button" id="importLeadModaL">Import Lead</button>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <thead>
                            <tr class="table-info py-3">
                                <th>#ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Source</th>
                                <th>Added By</th>
                                <th>Date</th>
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

<input type="hidden" id="leadId" value="" />
<?php //include('check_duplicity_modal.php') ?>

<!-- Import Modal -->
<div class="modal fade" id="leadModelImport" tabindex="-1" role="dialog" aria-labelledby="leadModelImportLabel" 
  aria-hidden="true ">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="leadModelImportLabel">Import Lead</h5>
                
                <div id="alertMessage"></div>
            </div>

            <div class="modal-body">
                <form class="forms-sample" id="import_form">
                    <div class="row">
                        <div class="col-sm-12">
                            <span class="text-danger"><strong>Only CSV file is allowed. Please check demo file before upload.</strong></span><br>
                            <!-- <div class="custom-file">
                                <input type="file" class="custom-file-input" name="file_csv">
                                <label class="custom-file-label"></label>
                            </div> -->
                            <input name="file_csv" class="form-control" type="file" id="file_csv" accept=".csv" />
                        </div>
                    </div>
                    
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="categoryImport">Category </label>
                                <select class="form-control form-control1" id="categoryImport" name="categoryImport" onChange="getCategory(this.value)">
                                    <option value="">Select</option>
                                    <?php 
                                        if (!empty($categories)) : ?>
                                            <?php foreach ($categories as $category) : ?>
                                        ?>
                                        <option value="<?= $category['id'] ?>"><?= $category['title'] ?></option>
                                        <?php endforeach;
                                        else : ?>
                                            <option value="">Not Found</option>
                                    <?php endif; ?>
                                    </select>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="subcategory">Sub Category</label>
                                <select class="form-control form-control1" id="subcategory1" name="subcategory1">
                                    <option value="">Select</option>
                                </select>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <div class="row" style="margin-right: auto;">
                    Click Here :
                    <a href="<?php echo base_url('file/Lead_demo_file.csv') ?>" download="<?php echo 'lead_demo_' . rand() . '_file.csv'; ?>"> Download Sample File</a>
                </div>
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeModal()">Close</button>
                <button type="submit" class="btn btn-primary">Upload</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    loadLeads();
})

function loadLeads() {
    let url = "<?= base_url('leadsApi/all-leads');?>";
    $.ajax({
        type: "Get",
        url: url,
        success: function (data) {
            getAllLeads(data)
        },
        error: function (jqxhr, eception) {
            if (jqxhr.status == 404) {
                alert('No data found');
            }
        }
    });
}

function getAllLeads(data){
    let html = ``;
    var first = 0;
    var num = 0;
    table = $('#buyerslead').DataTable();
    let dataSet = [];
    if (data) {
        data.forEach(e => {
            var today = new Date(e.created_at);
            var year = today.getFullYear();
            var month = today.getMonth()+1;
            if(month<10){
                month = "0"+month;
            }
            var day = today.getDate();
            var finalDate =day+"-"+month+"-"+year;

            if (first == 0) { first = e.id; }
            let action = `<a href="<?=base_url();?>/show-lead/${e.id}">`+
                        `<i class="fa fa-eye view-details text-white me-1 text-center rounded"></i>`+
                                    `</a>`+
                        ` &nbsp&nbsp<a href="javascript:void(0)" onclick="deleteLead(${e.id},  '${e.first_name+" "+e.last_name}')" >`+
                            `<i class="fas fa-trash delete-details text-white bg-danger text-center rounded"></i>`+
                        `</a>`;
            let row = [e.id, e.first_name+" "+e.last_name, e.email, e.phone, 'Source', e.user_name, finalDate, action];
            dataSet.push(row);
        });
    }

    table.destroy();
    $('#buyerslead').DataTable({
        data: dataSet,
        "responsive": true,
        "bFilter": false,
        "order": [[ 0, "desc" ]],
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

function deleteLead(id, name){
    $("#leadId").val(id);
    Swal.fire({
        title: 'Delete Lead?',
        text: "Are you sure to delete "+name+" lead ?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            var id = $("#leadId").val();
            let url = "<?= base_url('leadsApi/delete-lead');?>";
            $.ajax({
                type: "get",
                url: url,
                data:{
                    "id":id
                },
                dataType:'json',
                success: function (data) {
                    if(data.success){
                        loadLeads();
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

$("#importLeadModaL").click(function(e){
    //alert("importLeadModaL");
    e.preventDefault();
    $("#leadModelImport").modal("show");
});

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

$('#import_form').on('submit', function (e) {
    e.preventDefault();
    $(".validation").remove();
    let url = "<?= base_url('leadsApi/import');?>";
    var formData = new FormData(this);
    if (formData) {
        $.ajax({
            type: "post",
            url: url,
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                if (data.status == 200) {
                    document.getElementById("import_form").reset();
                    $('#leadModelImport').modal('hide');
                    loadLeads();
                    $.toast({
                        heading: 'success',
                        text:  data.messages.success,
                        showHideTransition: 'fade',
                        position: 'top-right',
                        icon: 'success'
                    });
                }
            }, error: function (jqxhr, eception) {
                if (jqxhr.status == 404) {
                    // Notiflix.Notify.warning(data.messages.success);
                    // setTimeout(() => { window.location.reload() }, 600);
                    $.toast({
                        heading: 'Error',
                        text: jqxhr.responseJSON.messages.id,
                        showHideTransition: 'fade',
                        position: 'top-right',
                        icon: 'error'
                    });
                }
                if(jqxhr.status == 400){
                    if(jqxhr.responseJSON.messages.file_csv){
                        $("#file_csv").addClass("input-error");
                        $("#file_csv").parent().append('<span class="text-danger validation">'+jqxhr.responseJSON.messages.file_csv+'</span>');
                        $.toast({
                            heading: 'Error',
                            text: jqxhr.responseJSON.messages.file_csv,
                            showHideTransition: 'fade',
                            position: 'top-right',
                            icon: 'error'
                        });
                    }
                    if(jqxhr.responseJSON.messages.categoryImport){
                        $.toast({
                            heading: 'Error',
                            text: jqxhr.responseJSON.messages.categoryImport,
                            showHideTransition: 'fade',
                            position: 'top-right',
                            icon: 'error'
                        });
                    }else{
                        // $.toast({
                        //     heading: 'Error',
                        //     text: jqxhr.responseJSON.messages.error,
                        //     showHideTransition: 'fade',
                        //     position: 'top-right',
                        //     icon: 'error'
                        // });
                    }
                }
            }
        });
    }
});

function closeModal(){
    $('#leadModelImport').modal('hide');
}
</script>
    