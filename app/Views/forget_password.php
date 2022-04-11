<!DOCTYPE html >
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forget Password</title>
  <?php include 'Layout/cssLinks.php'; ?>
</head>
<body>
<div id="layout-p" class="theme-navy">
  <div class="main auth-div p-2 py-3 p-xl-5">
      <div class="body mb-2 d-flex p-0 p-xl-5">
          <div class="container">
          <div class="row g-0">
                

                <div class="col-lg-5 d-flex justify-content-center align-items-center border-0 rounded-lg auth-h100">
                    <div class="w-100 p-4 card border-0 bg-color shadow" style="max-width: 28rem;">
                        <form class="row g-1 p-0 px-3" id="password-form" action="#" method="post">
                            <div class="col-12 text-center  mb-5">
                               
                                    <img class="rounded-circle" src="<?=base_url();?>/public/assets/img/password.png" width="180px"/>
                      
                                <h2 class="fw-bold red-text pt-3">Forgot Password ?</h2>
                                <span class="fw-bold">Enter your registered email address below and we will send you an OTP.</span>
                            </div>
                            <div class="col-12">
                                <div class="mb-2">
                                    <label class="form-label fs-6 fw-bold">Email address</label>
                                    <input type="email" name="email" id="email" class="form-control form-control-lg border-0 border-bottom shadow-none border-2 border text-dark border-dark rounded-0 " placeholder="name@example.com">
                                </div>
                            </div>
                      
                            <div class="col-12 text-center mt-4">
                                <button type="submit" class="btn btn-lg w-100 btn-block btn-danger lift text-uppercase fw-bold py-2">Generate OTP</button>
                            </div>
                        </form>

                        <div class="Password-form  p-0">
                    <div id="MyForm" style="display:none">
                      <div class="mb-2 mt-1"  >
                      <label class="form-label fs-6 fw-bold" for="OTP">Enter OTP
                        </label>
                        <input type="text" class="form-control form-control-lg border-0 border-bottom shadow-none border-2 border text-dark border-dark rounded-0 " name="OTP"  id="field" maxlength="6" placeholder="Enter OTP">
                      
                      </div>
                      <div class="form-group ">
                        <!-- <button type="submit" id="verifybtn" class="btn btn-primary w-100">Verify</button> -->
                     
                        <button type="submit" id="OTPfilled" class="btn btn-lg w-100 btn-block btn-danger lift text-uppercase fw-bold py-2"> Verify</button>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content" style="margin-top:75px">
                              <div class="modal-header red-bg">
                                <h5 class="modal-title text-white" id="exampleModalLabel">Reset Password
                                </h5>
                                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="btn-close">
                                </button>
                              </div>
                              <div class="modal-body">
                                <form action="#" method="POST" class="px-5 py-2" id="Reset-Password">
                                  <div class="mb-4">
                                  <label class="form-label fs-6 fw-bold" for="password">New Password
                                    </label>
                                    <input type="password" class="form-control form-control-lg border-0 border-bottom shadow-none border-2 border text-dark border-dark rounded-0 " id="matchPassword" name="password" placeholder="password" maxlength="6">
                                  
                                  </div>
                                  <div class="mb-3">
                                  <label class="form-label fs-6 fw-bold" for="confirmPassword" >Confirm Password</label>
                                      <input type="password" name="confirmPassword"class="form-control form-control-lg border-0 border-bottom shadow-none border-2 border text-dark border-dark rounded-0 " placeholder="Confirm password" id="matchConfirmPassword" maxlength="6">
                                    
                                    </div>
                                    <div class="text-end">     
                                      <button type="submit" class="btn btn-lg w-100 btn-block btn-danger lift text-uppercase fw-bold py-2">Save Password</button>
                                    </div>
                                </button>
                                </form>
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
    </div>
    <?php include 'Layout/jsLinks.php'; ?>

    <script>
 $("#password-form").validate({
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
    submitHandler: function (form) {
      $("#MyForm").css({ padding: "10px" });
      $("#MyForm").show(500);
      // $("#MyForm").css("padding", "10px");
      $("#password-form").hide(500);
    },
    //
  });


  $(document).ready(function(){
        $('#OTPfilled').on('click', function() {
          const field = $('#field').val().length;
          if(field === 6){
            $("#exampleModal").modal('show');
          }
          else{
              alert("Please enter the valid OTP")
          }
         });
      });

      $(document).ready(function(){
            $("#Reset-Password").validate({
              errorClass: "is-invalid",
               errorElement: "span",
        rules: {
              password: {
              required: true,
              minlength: 6,
          },
          confirmPassword: {
            required: true,
            minlength: 6,
            equalTo: "#matchPassword",
          },
        },
        messages: {
                password: {
                required: "Please enter your password",
                minlength: "Your password must be at least 6 characters long",
              },
              confirmPassword: {
                required: "Please enter your password",
                minlength: "Your password must be at least 6 characters long",
                equalTo: "Password does not match",
              },
         }
     });
  });
    </script>
    
</body>
</html>