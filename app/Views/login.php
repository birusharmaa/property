<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <?php include 'Layout/cssLinks.php'; ?>
</head>

<body>
    <div id="layout-p" class="theme-navy">
        <div class="main auth-div p-2 py-3 p-xl-5">
            <div class="body mb-2 d-flex p-0 p-xl-5">
                <div class="container-fluid">

                    <div class="row g-0">


                        <div class="col-lg-5 d-flex m-auto justify-content-center align-items-center border-0 rounded-lg auth-h100">
                            <div class="w-100 p-4 card border-0 bg-color shadow" style="max-width: 28rem; border-radius:15px;box-shadow: 0px 2px 13px 0px rgba(0, 0, 0, 0.4)!important;">
                                <form class="row g-1 p-0 px-3" id="signUp-form" action="<?=base_url();?>/signin" method="post">
                                    <div class="col-12 text-center  mb-3">
                                        <!-- 
                                        <img class="rounded-circle " src="<?= base_url(); ?>/assets/img/admin1.png"
                                            width="100px" /> -->
                                        <i class="fa fa-unlock-alt lock-icon red-text mb-3" aria-hidden="true"></i>

                                        <h2 class="fw-bold  red-text">Login to Vishal Properties</h2>
                                        <span class="fw-bold ">Please fill the below credencials</span>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-2">
                                            <label class="form-label fs-6 fw-bold">Email address</label>
                                            <input type="email" name="email" id="email" class="form-control form-control-lg border-0 border-bottom shadow-none border-2 border text-dark border-dark rounded-0 " placeholder="name@example.com">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-2">
                                            <div class="form-label fs-6  fw-bold">

                                                Password

                                            </div>
                                            <input type="password" name="password" id="password" class="form-control form-control-lg border-0 border-bottom shadow-none border-2 border text-dark border-dark rounded-0" placeholder="***************">
                                            <a class="red-text d-flex justify-content-end fw-bold text-end" href="<?= base_url(); ?>/forget-password">Forgot Password?</a>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center mt-4">
                                        <button type="submit" id="myBtn" class="btn btn-lg w-100 btn-block red-bg text-white lift text-uppercase fw-bold py-2">Login</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>



        <?php include 'Layout/jsLinks.php'; ?>
        <script>
            $(document).ready(function() {
                $("#signUp-form").validate({
                    errorClass: "is-invalid",
                    rules: {
                        email: {
                            required: true,
                            email: true,
                        },
                        password: {
                            required: true,
                            minlength: 6
                        },
                    },
                    messages: {
                        email: {
                            required: "Please enter your email",
                            email: "Please enter valid email id",
                        },
                        password: {
                            required: "Please enter the password",
                            minlength: "Password length must be atleast 6 ",
                        },
                    },
                    submitHandler: function(form) {
                        $.ajax({
                            url: "<?php echo base_url('login'); ?>",
                            type: 'POST',
                            data: $('#signUp-form').serialize(),
                            beforeSend: function(response) {},
                            success: function(data) {
                                if (data.status == "success") {
                                    location.href = "dashboard";
                                }
                            },
                            error: function(response, data) {
                                if (response.responseJSON.messages.type == "email") {
                                    $("#email").addClass('is-invalid');
                                    $("#email").parent().append('<label id="password-error" class="is-invalid" for="password">' + response.responseJSON.messages.message + '</label>');
                                } else {
                                    $("#password").addClass('is-invalid');
                                    $("#password").parent().append('<label id="password-error" class="is-invalid" for="password">' + response.responseJSON.messages.message + '</label>');
                                }
                            }
                        });
                    }
                });
            });

            $(document).on('keypress', function(e) {
                if (e.which == 13) {
                    e.preventDefault();
                    document.getElementById("myBtn").click();
                }
            });
        </script>
</body>

</html>