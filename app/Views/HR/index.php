<div class="body-header border-0 rounded-0 px-xl-4 px-md-2">
    <div class="container-fluid">
        <div class="row pt-2">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center py-2">
                    <ol class="breadcrumb rounded-0 mb-0 ps-0 bg-transparent flex-grow-1">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Employees</li>
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
                <!-- <div class="red-bg text-center text-white rounded py-2 mb-3">
                    <h1 class=" fw-bolder">Employees</h1>
                </div> -->

                <div class="card p-4">
                    <table id="employees" class="table table-striped display dataTable table-hover" style="width:100%">
                        <thead>
                            <tr class="table-info py-3">
                                <th style="padding-right: 0 !important;">#ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Department</th>
                                <th>Designation</th>
                                <th>Date of Joining</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php for ($i = 1; $i <= 50; $i++) { ?>
                                <tr>
                                    <td class="sorting_1 id-red fw-bold"><?= $i ?></td>
                                    <td>Name <?= $i ?></td>
                                    <td>infoDummy<?= $i ?>@gmail.com</td>
                                    <td>8575658863</td>
                                    <td>localhost</td>
                                    <td>Vikrant Massey</td>
                                    <td>2/19/2022</td>
                                    <td>
                                        <a href="">
                                            <i class="fa fa-edit edit-details text-white me-1  text-center rounded"></i>
                                        </a>
                                        <a href="">
                                            <i class="fa fa-eye view-details text-white me-1 text-center rounded"></i>
                                        </a>
                                        <a href="">
                                            <i class="fa fa-trash-o delete-details text-white bg-danger text-center rounded"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div> <!-- .card end -->
            </div>
        </div>
    </div>
</div>

<?= view('HR/Scripts/employees') ?>