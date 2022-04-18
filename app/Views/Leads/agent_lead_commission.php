<div class="body-header border-0 rounded-0 px-xl-4 px-md-2">
    <div class="container-fluid">
        <div class="row pt-2">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center py-2">
                    <ol class="breadcrumb rounded-0 mb-0 ps-0 bg-transparent flex-grow-1">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Agent Lead Commission
                        </li>
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
                        <h1 class=" fw-bolder">Agent Lead Commission</h1>
                    </div> -->
                    <div class="card p-4">
                        <table id="agentleadcommission" class="table table-striped display dataTable table-hover" style="width:100%">
                            <div class="align1 pb-2">
                                <button class="btn btn-primary" data-bs-toggle="modal" href="#agentleadmodal2" type="submit">Add User</button>
                            </div>
                            <thead>
                                <tr class="py-3 table-info">
                                    <th>#ID</th>
                                    <th>Name</th>
                                    <th>Phone Number</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Commission</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php for ($b = 1; $b <= 6; $b++) { ?>
                                    <tr>
                                        <td class="sorting_1 id-red fw-bold"><?= $b ?></td>
                                        <td>Name 1</td>
                                        <td>9845104214</td>
                                        <td>info@gmail.com</td>
                                        <td>H-75 Badarpur Road, 110054</td>
                                        <td>88,555</td>
                                        <td>
                                            <a href="">
                                                <i class="fa fa-edit edit-details text-white me-1  text-center rounded"></i>
                                            </a>
                                            <a href="">
                                                <i class="fa fa-trash-o delete-details text-white bg-danger text-center rounded"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- First modal dialog -->
<div class="modal fade" id="agentleadmodal2" aria-hidden="true" aria-labelledby="agentleadmdl2" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content card">
            <div class="modal-header red-bg">
                <h5 class="modal-title text-white" id="agentleadmdl2">Add Commission</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-outline mb-4">
                                    <label class="form-label fw-bold" for="subname">Name</label>
                                    <input type="text" id="subname" class="form-control form-control1" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-outline mb-4">
                                    <label class="form-label fw-bold" for="subname">Phone Number</label>
                                    <input type="number" id="subname" class="form-control form-control1" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-outline mb-4">
                                    <label class="form-label fw-bold" for="subname">Email</label>
                                    <input type="email" id="subname" class="form-control form-control1" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-outline mb-4">
                                    <label class="form-label fw-bold" for="subname">Address</label>
                                    <input type="text" id="subname" class="form-control form-control1" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-outline mb-4">
                                    <label class="form-label fw-bold" for="subname">Choose Percentage or Amount</label>
                                    <select class="form-select form-control1" aria-label="Default select example">
                                        <option selected>-</option>
                                        <option value="2">Percentage</option>
                                        <option value="3">Amount</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-outline mb-4">
                                    <label class="form-label fw-bold" for="subname">value</label>
                                    <input type="text" id="subname" class="form-control form-control1" />
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-bs-target="#categroymodl2" data-bs-toggle="modal" data-bs-dismiss="modal">
                    ADD USER
                </button>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('#agentleadcommission').DataTable();
    })
</script>