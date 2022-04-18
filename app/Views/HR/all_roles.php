<div class="body-header border-0 rounded-0 px-xl-4 px-md-2">
    <div class="container-fluid">
        <div class="row pt-2">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center py-2">
                    <ol class="breadcrumb rounded-0 mb-0 ps-0 bg-transparent flex-grow-1">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">All Roles</li>
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
                                <h1 class=" fw-bolder">All Roles</h1>
                            </div> -->
                    <div class="card p-4">
                        <table id="roles" class="table display dataTable table-hover" style="width:100%">
                            <div class="align1 pb-2">
                                <button class="btn btn-primary" data-bs-toggle="modal" href="#rolesmodal2" type="submit">Add Roles</button>
                            </div>
                            <thead>
                                <tr class="py-3">
                                    <th>#ID</th>
                                    <th>Roles Name</th>
                                    <th>Permission</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="sorting_1 id-red fw-bold">01</td>
                                    <td>Name 1</td>
                                    <td>Name <span class="badge bg-warning">dashboard</span> <span class="badge bg-danger">designation</span> <span class="badge bg-info">leads</span> <span class="badge bg-success">payrol</span></td>
                                    <td>
                                        <a href="">
                                            <i class="fa fa-edit edit-details text-white me-1  text-center rounded"></i>
                                        </a>
                                        <a href="">
                                            <i class="fa fa-trash-o delete-details text-white bg-danger text-center rounded"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="sorting_1 id-red fw-bold">02</td>
                                    <td>Name 2</td>
                                    <td>Name <span class="badge bg-warning">dashboard</span> <span class="badge bg-danger">designation</span> <span class="badge bg-info">leads</span> <span class="badge bg-success">payrol</span></td>
                                    <td>
                                        <a href="">
                                            <i class="fa fa-edit edit-details text-white me-1 text-center rounded"></i>
                                        </a>
                                        <a href="">
                                            <i class="fa fa-trash-o delete-details text-white text-center rounded bg-danger"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="sorting_1 id-red fw-bold">03</td>
                                    <td>Name 3</td>
                                    <td>Name <span class="badge bg-warning">dashboard</span> <span class="badge bg-danger">designation</span> <span class="badge bg-info">leads</span> <span class="badge bg-success">payrol</span></td>
                                    <td>
                                        <a href="">
                                            <i class="fa fa-edit edit-details text-white me-1 text-center rounded"></i>
                                        </a>
                                        <a href="">
                                            <i class="fa fa-trash-o delete-details text-white text-center rounded bg-danger"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="sorting_1 id-red fw-bold">04</td>
                                    <td>Name 4</td>
                                    <td>Name <span class="badge bg-warning">dashboard</span> <span class="badge bg-danger">designation</span> <span class="badge bg-info">leads</span> <span class="badge bg-success">payrol</span></td>
                                    <td>
                                        <a href="">
                                            <i class="fa fa-edit edit-details text-white me-1 text-center rounded"></i>
                                        </a>
                                        <a href="">
                                            <i class="fa fa-trash-o delete-details text-white text-center rounded bg-danger"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="sorting_1 id-red fw-bold">05</td>
                                    <td>Name 5</td>
                                    <td>Name <span class="badge bg-warning">dashboard</span> <span class="badge bg-danger">designation</span> <span class="badge bg-info">leads</span> <span class="badge bg-success">payrol</span></td>
                                    <td>
                                        <a href="">
                                            <i class="fa fa-edit edit-details text-white me-1 text-center rounded"></i>
                                        </a>
                                        <a href="">
                                            <i class="fa fa-trash-o delete-details text-white text-center rounded bg-danger"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="sorting_1 id-red fw-bold">06</td>
                                    <td>Name 6</td>
                                    <td>Name <span class="badge bg-warning">dashboard</span> <span class="badge bg-danger">designation</span> <span class="badge bg-info">leads</span> <span class="badge bg-success">payrol</span></td>
                                    <td>
                                        <a href="">
                                            <i class="fa fa-edit edit-details text-white me-1 text-center rounded"></i>
                                        </a>
                                        <a href="">
                                            <i class="fa fa-trash-o delete-details text-white text-center rounded bg-danger"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="sorting_1 id-red fw-bold">07</td>
                                    <td>Name 7</td>
                                    <td>Name <span class="badge bg-warning">dashboard</span> <span class="badge bg-danger">designation</span> <span class="badge bg-info">leads</span> <span class="badge bg-success">payrol</span></td>
                                    <td>
                                        <a href="">
                                            <i class="fa fa-edit edit-details text-white me-1 text-center rounded"></i>
                                        </a>
                                        <a href="">
                                            <i class="fa fa-trash-o delete-details text-white text-center rounded bg-danger"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="sorting_1 id-red fw-bold">08</td>
                                    <td>Name 8</td>
                                    <td>Name <span class="badge bg-warning">dashboard</span> <span class="badge bg-danger">designation</span> <span class="badge bg-info">leads</span> <span class="badge bg-success">payrol</span></td>
                                    <td>
                                        <a href="">
                                            <i class="fa fa-edit edit-details text-white me-1 text-center rounded"></i>
                                        </a>
                                        <a href="">
                                            <i class="fa fa-trash-o delete-details text-white text-center rounded bg-danger"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="sorting_1 id-red fw-bold">09</td>
                                    <td>Name 9</td>
                                    <td>Name <span class="badge bg-warning">dashboard</span> <span class="badge bg-danger">designation</span> <span class="badge bg-info">leads</span> <span class="badge bg-success">payrol</span></td>
                                    <td>
                                        <a href="">
                                            <i class="fa fa-edit edit-details text-white me-1 text-center rounded"></i>
                                        </a>
                                        <a href="">
                                            <i class="fa fa-trash-o delete-details text-white text-center rounded bg-danger"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="sorting_1 id-red fw-bold">10</td>
                                    <td>Name 10</td>
                                    <td>Name <span class="badge bg-warning">dashboard</span> <span class="badge bg-danger">designation</span> <span class="badge bg-info">leads</span> <span class="badge bg-success">payrol</span></td>
                                    <td>
                                        <a href="">
                                            <i class="fa fa-edit edit-details text-white me-1 text-center rounded"></i>
                                        </a>
                                        <a href="">
                                            <i class="fa fa-trash-o delete-details text-white text-center rounded bg-danger"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="sorting_1 id-red fw-bold">10</td>
                                    <td>Name 10</td>
                                    <td>Name <span class="badge bg-warning">dashboard</span> <span class="badge bg-danger">designation</span> <span class="badge bg-info">leads</span> <span class="badge bg-success">payrol</span></td>
                                    <td>
                                        <a href="">
                                            <i class="fa fa-edit edit-details text-white me-1 text-center rounded"></i>
                                        </a>
                                        <a href="">
                                            <i class="fa fa-trash-o delete-details text-white text-center rounded bg-danger"></i>
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
<div class="modal fade" id="rolesmodal2" aria-hidden="true" aria-labelledby="rolesmdl2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content card">
            <div class="modal-header red-bg">
                <h5 class="modal-title text-white" id="rolesmdl2">Add Roles</h5>
                <button type="button" class="btn-close-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <!-- Name input -->
                    <div class="form-outline mb-4">
                        <label class="form-label fw-bold" for="designationname">Roles Name</label>
                        <input type="text" id="designationname" class="form-control form-control1" />
                        <div class="mt-3"><label class="form-label fw-bold" for="designationname">Permisson
                                Roles</label></div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <label class="form-check-label" for="dashboardCheckDefault">
                                            Dashboard
                                        </label>
                                        <input class="form-check-input" type="checkbox" value="" id="dashboardCheckDefault">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <label class="form-check-label" for="designationCheckChecked">
                                            Designation
                                        </label>
                                        <input class="form-check-input" type="checkbox" value="" id="designationCheckChecked">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <label class="form-check-label" for="leadsCheckDefault">
                                            Leads
                                        </label>
                                        <input class="form-check-input" type="checkbox" value="" id="leadsCheckDefault">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <label class="form-check-label" for="payrolChecked">
                                            Payrol
                                        </label>
                                        <input class="form-check-input" type="checkbox" value="" id="payrolChecked">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-bs-target="#categroymodl2" data-bs-toggle="modal" data-bs-dismiss="modal">
                    ADD
                </button>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('#roles').DataTable();
    })
</script>