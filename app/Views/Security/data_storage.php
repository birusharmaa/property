
        <div class="body-header border-0 rounded-0 px-xl-4 px-md-2">
            <div class="container-fluid">
                <div class="row pt-2">
                    <div class="col-12">
                        <div class="d-flex justify-content-between align-items-center py-2">
                            <ol class="breadcrumb rounded-0 mb-0 ps-0 bg-transparent flex-grow-1">
                                <li class="breadcrumb-item"><a href="<?=base_url();?>">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Data storage</li>
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
                        <!-- <div class="col-md-12 p-0">
                            <div class="red-bg text-center text-white rounded py-2 mb-3">
                                <h1 class=" fw-bolder">Data Storage</h1>
                            </div>
                        </div> -->
                        <div class="row mx-auto p-4 card">
                            <div class="row system-bg-color mx-auto p-4 ">
                                <div class="col-md-12">
                                    <form class="col-md-5 m-auto card bg-white py-5" action="" id="request-otp">
                                        <div class="mb-4 field-width">
                                            <label class="col-form-label fw-bold">Email Address</label>
                                            <fieldset class="form-icon-group left-icon position-relative">
                                                <input type="email" class="form-control form-control1">
                                                <div class="form-icon position-absolute">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-envelope-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z">
                                                        </path>
                                                    </svg>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="rounded text-center">
                                            <button class="btn btn-primary btn-sm text-white fw-bolder px-5 fs-5 ">
                                                <i class="fa fa-send me-2 fs-4"></i>Request OTP</button>
                                        </div>
                                    </form>
                                    <div class="col-md-5 m-auto" id="MyForm" style="display:none">
                                        <div class="form-control mb-2 ">
                                            <div class="field-width">
                                                <label for="OTP" class=" col-form-label  fw-bold">Enter OTP
                                                </label>
                                                <input type="text" class="form-control mb-3" name="OTP" id="field"
                                                    placeholder="OTP" maxlength="6">
                                                <div class="rounded text-center">
                                                    <button class="btn btn-success text-white fw-bolder px-5 fs-5 ">
                                                        <i class="fa fa-send me-2 fs-4"></i>Verify</button>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>

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
                                    <h1 class=" fw-bolder">Data Storage</h1>
                                </div> -->
                            <div class="row mx-auto p-4 card mb-5" id="aboveDiv">
                                <div class="row mx-auto p-4 ">
                                    <div class="col-md-12">
                                        <form class="col-md-5 m-auto card bg-white py-5" action="" id="request-otp">
                                            <div class="mb-4 field-width">
                                                <label class="col-form-label fw-bold">Email Address</label>
                                                <fieldset class="form-icon-group left-icon position-relative">
                                                    <input type="email" name="email"
                                                        class="form-control form-control1 text-dark">
                                                    <div class="form-icon position-absolute">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                            fill="currentColor" class="bi bi-envelope-fill"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z">
                                                            </path>
                                                        </svg>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="rounded text-center">
                                                <button class="btn btn-primary btn-sm text-white fw-bolder px-5 fs-5 ">
                                                    <i class="fa fa-send me-2 fs-4"></i>Request OTP</button>

                                            </div>
                                        </form>
                                        <div class="col-md-5 m-auto bg-white rounded" id="MyForm" style="display:none">
                                            <div class="form-control mb-2 ">
                                                <div class="field-width">
                                                    <label for="OTP" name="OTP" class=" col-form-label  fw-bold">Enter
                                                        OTP
                                                    </label>
                                                    <input type="text" class="form-control form-control1 text-dark mb-3"
                                                        name="OTP" id="field" placeholder="OTP" maxlength="6">
                                                    <div class="rounded text-center">
                                                        <button
                                                            class="btn btn-success w-100 text-white fw-bolder px-5 py-1 fs-5 "
                                                            id="OTPfilled">
                                                            Verify</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="tableData" style="display:none">
                                <div class="col-md-3 one5">
                                    <div class="card">
                                        <div class="row">
                                            <div class="col-9">
                                                <div class="card-body">
                                                    <h6 class="card-title text-uppercase">Documents</h6>
                                                    <h6 class="card-title">23.4mb</h6>
                                                    <p class="card-text">1,500 Files</p>
                                                </div>
                                            </div>
                                            <div class="col-3 pt-4">
                                                <div
                                                    class="avatar avatar1 lg rounded-circle no-thumbnail bg-primary text-light">
                                                    <i class="fa fa-file-pdf-o fs-4"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 one5">
                                    <div class="card ">
                                        <div class="row">
                                            <div class="col-9">
                                                <div class="card-body">
                                                    <h6 class="card-title text-uppercase">Design</h6>
                                                    <h6 class="card-title">23.4mb</h6>
                                                    <p class="card-text">10,500 Designs</p>
                                                </div>
                                            </div>
                                            <div class="col-3 pt-4">
                                                <div
                                                    class="avatar avatar1 lg rounded-circle no-thumbnail bg-primary text-light">
                                                    <i class="fa fa-file-code-o fs-4"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 one5">
                                    <div class="card">
                                        <div class="row">
                                            <div class="col-9">
                                                <div class="card-body">
                                                    <h6 class="card-title text-uppercase">Videos</h6>
                                                    <h6 class="card-title">2.45mb</h6>
                                                    <p class="card-text">400 Videos</p>
                                                </div>
                                            </div>
                                            <div class="col-3 pt-4">
                                                <div
                                                    class="avatar avatar1 lg rounded-circle no-thumbnail bg-primary text-light">
                                                    <i class="fa fa-file-image-o fs-4"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 one5">
                                    <div class="card">
                                        <div class="row">
                                            <div class="col-9">
                                                <div class="card-body">
                                                    <h6 class="card-title">Images</h6>
                                                    <h6 class="card-title">23.4mb</h6>
                                                    <p class="card-text">22,500 Images</p>
                                                </div>
                                            </div>
                                            <div class="col-3 pt-4">
                                                <div
                                                    class="avatar avatar1 lg rounded-circle no-thumbnail bg-primary text-light">
                                                    <i class="fa fa-file-movie-o fs-4"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card p-4 my-4 m-auto" style="width:98%">
                                    <table id="dataStorage" class="table display dataTable       table-hover"
                                        style="width:100%">
                                        <thead>
                                            <tr class="py-3 text-center">
                                                <th>#ID</th>
                                                <th>File Name</th>
                                                <th>Date And Time</th>
                                                <th>Size</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php for($i=1; $i<=15; $i++) { ?>
                                            <tr class="text-center">
                                                <td class="sorting_1 id-red fw-bold" class="ps-4"><?= $i ?></td>
                                                <td>
                                                    <i class="fa fa-file-pdf-o pdf-file me-2"></i>
                                                    Office Documents
                                                </td>
                                                <td>21/02/2022</td>
                                                <td>3.56mb</td>
                                                <td>
                                                    <a href="">
                                                        <i
                                                            class="fa fa-edit edit-details text-white me-1  text-center rounded"></i>
                                                    </a>
                                                    <a href="">
                                                        <i
                                                            class="fa fa-trash-o delete-details text-white bg-danger text-center rounded"></i>
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
            <?php include __DIR__ . '/../Layout/footer.php'; ?>
        </div>


        <?php include __DIR__ . '/../Layout/footer.php'; ?>
    </div>
</div>
<?php include __DIR__ . '/../Layout/jsLinks.php'; ?>

    <script>
    // -------------show OTP-----------
    $(document).ready(function() {
        $("#request-otp").validate({
            errorClass: "is-invalid",
            errorElement: "span",
            rules: {
                email: {
                    required: true,
                    email: true,
                },
            },
            messages: {
                email: {
                    required: "Please enter your email address",
                    email: "Please enter a valid email address",
                },
            },
            submitHandler: function(form) {
                $("#MyForm").css({
                    padding: "20px 0px",
                    "margin-top": "150px"
                });
                $("#MyForm").show(500);
                $("#request-otp").hide(500);
            },
        });
    });
    // -----------show table-----------------
    $(document).ready(function() {
        $('#OTPfilled').on('click', function() {
            const field = $('#field').val().length;
            if (field === 6) {
                $("#tableData").show(500);
                $("#aboveDiv").hide(500);
            }
        });
    });

    //-------------Data Table-------------
    $(document).ready(function() {
        $('#dataStorage').DataTable();
    })
    </script>

