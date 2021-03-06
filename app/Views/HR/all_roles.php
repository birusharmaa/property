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
                                <button class="btn btn-primary" id="btnAddRole" data-bs-toggle="modal" href="#rolesmodal2" type="submit">Add Roles</button>
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
                                <?php if (!empty($roles)) : foreach ($roles as $key => $role) : ?>
                                        <tr>
                                            <td class="sorting_1 id-red fw-bold"><?= ++$key ?></td>
                                            <td><?= $role['name'] ?></td>
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
                                <?php endforeach;
                                endif ?>

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
            <form id="roleForm">
                <div class="modal-header red-bg">
                    <h5 class="modal-title text-white" id="rolesmdl2">Add Roles</h5>
                    <button type="button" class="btn-close-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <!-- Name input -->
                    <div class="form-outline mb-4">
                        <label class="form-label fw-bold" for="role">Roles Name</label>
                        <input type="text" id="role" name="role" class="form-control form-control1" />
                        <small id="role-error-list"></small>
                        
                        <div class="mt-3"><label class="form-label fw-bold" for="role">Permisson
                                Roles</label></div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <label class="form-check-label" for="checkboxforRead">
                                            Views
                                        </label>
                                        <input class="form-check-input" type="checkbox" name="read" value="r" id="checkboxforRead">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <label class="form-check-label" for="checkboxForCreate">
                                            Create
                                        </label>
                                        <input class="form-check-input" type="checkbox" name="create" value="c" id="checkboxForCreate">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <label class="form-check-label" for="checkboxForUpdate">
                                            Update
                                        </label>
                                        <input class="form-check-input" type="checkbox" name="update" value="u" id="checkboxForUpdate">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <label class="form-check-label" for="checkboxForDelete">
                                            Delete
                                        </label>
                                        <input class="form-check-input" name="delete" type="checkbox" value="d" id="checkboxForDelete">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= view('HR/Scripts/roles') ?>