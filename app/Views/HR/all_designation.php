<div class="body-header border-0 rounded-0 px-xl-4 px-md-2">
    <div class="container-fluid">
        <div class="row pt-2">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center py-2">
                    <ol class="breadcrumb rounded-0 mb-0 ps-0 bg-transparent flex-grow-1">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">All Designation</li>
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
                        <h1 class=" fw-bolder">All Designation</h1>
                    </div> -->
                    <div class="card p-4">
                        <table id="designation" class="table display dataTable table-hover" style="width:100%">
                            <div class="align1 pb-2">
                                <button class="btn btn-primary" id="btnAddDesignation" data-bs-toggle="modal" href="#designationmodal2" >Add Designation</button>
                            </div>
                            <thead>
                                <tr class="py-3">
                                    <th>#ID</th>
                                    <th>Designation Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="sorting_1 id-red fw-bold">01</td>
                                    <td>Name 1</td>
                                    <td>
                                        <a href="">
                                            <i class="fa fa-edit edit-details text-white me-1  text-center rounded"></i>
                                        </a>
                                        <a href="">
                                            <i class="fa fa-trash-o delete-details text-white bg-danger text-center rounded"></i>
                                        </a>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div> <!-- .card end -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- First modal dialog -->
<div class="modal fade" id="designationmodal2" aria-hidden="true" aria-labelledby="designationmdl2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content card">
            <form id="designationForm">
                <div class="modal-header red-bg">
                    <h5 class="modal-title text-white" id="designationmdl2">Add Designation</h5>
                    <button type="button" class="btn-close-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <!-- Name input -->
                    <div class="form-outline mb-4">
                        <label class="form-label fw-bold" for="designationname">Designation Name</label>
                        <input type="text" name="designationname" id="designationname" class="form-control form-control1" required />
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" id="btnSubmit" class="btn red-bg fw-bold text-white">Add
                    </button>
                    <button type="button" class="btn btn-danger danger-bg fw-bold text-white" data-bs-dismiss="modal">Close
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= view('HR/Scripts/designation') ?>