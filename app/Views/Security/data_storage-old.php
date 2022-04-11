<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Properties - Data storage</title>
    <?php include __DIR__ . '/../Layout/cssLinks.php'; ?>
</head>

<body>
    <div id="layout-p" class="theme-navy">
        <?php include __DIR__ . '/../Layout/header.php'; ?>
        <?php include __DIR__ . '/../Layout/sidebar.php'; ?>
        <div class="main">
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
                            <div class="col-md-12 p-0">
                                <div class="red-bg text-center text-white rounded py-2 mb-3">
                                    <h1 class=" fw-bolder">Data Storage</h1>
                                </div>
                            </div>
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
            </div>


            <?php include __DIR__ . '/../Layout/footer.php'; ?>
        </div>
    </div>
    <?php include __DIR__ . '/../Layout/jsLinks.php'; ?>

    <script>
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
                    padding: "40px 0px",
                    "margin-top": "150px"
                });
                $("#MyForm").show(500);
                // $("#MyForm").css("padding", "10px");
                $("#request-otp").hide(500);
            },
        });
    });
    </script>

</body>

</html>