<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Admin</title>
    <?php include __DIR__ . '/../Layout/cssLinks.php'; ?>
</head>
    <body>
        <div id="layout-p" class="theme-navy">
            <?php include __DIR__ . '/../Layout/header.php'; ?>
            <?php include __DIR__ . '/../Layout/sidebar.php'; ?>
            <div class="main">
                <div class="body-header border-0 rounded-0 px-xl-4 px-md-2">
                    <div class="container-fluid">
                        <div class="row py-2">
                            <div class="col-12">
                                <div class="d-flex justify-content-between align-items-center py-2">
                                    <ol class="breadcrumb rounded-0 mb-0 ps-0 bg-transparent flex-grow-1">
                                        <li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">My Profile</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="body px-xl-4 px-md-2">
                    <div class="container-fluid">
                        <div class="row mx-auto">
                            <div class="col-md-12  ">
                                <div class="red-bg text-center text-white rounded py-2 my-4">
                                    <h1 class=" fw-bolder">My Profile</h1>
                                </div>
                                <div class="row mx-auto mb-5">
                                    <div class="col-md-5">
                                        <div class="card w-100 bg-white" >
                                            <img class="card-img-top profile m-auto px-4 pt-4 w-100" src="<?= base_url();?>/assets/public/img/profile.jpg" alt="Card image cap"  >
                                                <div class="card-body">
                                                    <div class="row mx-auto">
                                                        <div class="col-md-5 bg-white  mb-2">
                                                        <h5 class="card-title ">My Profile</h5>
                                                        </div>
                                                        <div class="col-md-7 mb-2">
                                                            <p class="m-0 "><strong>Created:- </strong> <span class="font-size"> 12 August,2021</span> </p>
                                                        </div>
                                                        <hr>
                                                        <div class="col-md-6 shadow mb-3 ">
                                                            <h5 class="pt-2 fs-6">Semi Rehmaan</h5>
                                                        </div>
                                                        <div class="col-md-6 shadow mb-3">
                                                            <h5 class="pt-2 fs-6">+716 133 5768</h5>
                                                        </div>
                                                        <hr>
                                                        <div class="col-md-12 shadow mb-3">
                                                        <h5 class="pt-2 fs-6">semirehmaan@gmail.com</h5>
                                                        </div>
                                                        <hr>
                                                        <!-- <div class="col-md-12">
                                                        <div class="social-menu m-auto text-center">
                                                            <ul class="list-unstyled d-flex list">
                                                                <li class="mx-1">
                                                                <a class="text-dark bg-light p-1 d-block rounded-circle" href="#!" role="button">
                                                                    <i class="fa fa-twitter">
                                                                    </i>
                                                                </a>
                                                                </li>
                                                                <li class="mx-1">
                                                                <a class="text-dark bg-light p-1 d-block rounded-circle" href="#!" role="button">
                                                                    <i class="fa fa-linkedin">
                                                                    </i>
                                                                </a>
                                                                </li>
                                                                <li class="mx-1">
                                                                <a class="text-dark bg-light p-1 d-block rounded-circle" href="#!" role="button">
                                                                    <i class="fa fa-instagram">
                                                                    </i>
                                                                </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        </div> -->
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="col-md-7 bg-white p-0 rounded">
                                                
                                            <ul class="nav nav-tabs" role="tablist">
                                                <li class="nav-item">
                                                <a class="nav-link active fw-bold red-text" data-bs-toggle="tab" href="#property">Personal Informations</a>
                                                </li>
                                                <li class="nav-item">
                                                <a class="nav-link fw-bold red-text" data-bs-toggle="tab" href="#owner">My Property</a>
                                                </li>
                                                <li class="nav-item">
                                                <a class="nav-link fw-bold red-text" data-bs-toggle="tab" href="#ameneties">Change Password</a>
                                                </li>
                                            
                                            </ul>

                                            <div class="tab-content">
                                                <div id="property" class="container tab-pane my-4 px-4 active"><br>
                                                    <h3 class="red-text fw-bold underline">
                                                    <i class="fa fa-user me-2"></i>Personal Informations</h3>
                                                    <div class="row mx-auto pt-3">
                                                
                                                        <div class="col-md-6 ">
                                                            <div class="mb-3">
                                                                <label class="col-form-label fw-bold">First Name</label>
                                                                <fieldset class="form-icon-group left-icon    position-relative">
                                                                    <input type="text" class="form-control" value="Semi">
                                                                        <div class="form-icon position-absolute">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                                                                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"></path>
                                                                            </svg>
                                                                        </div>
                                                                </fieldset>
                                                            </div>        
                                                        </div>

                                                        <div class="col-md-6 ">
                                                            <div class="mb-3">
                                                                <label class="col-form-label fw-bold">Last Name</label>
                                                                <fieldset class="form-icon-group left-icon position-relative">
                                                                    <input type="text" class="form-control"  value="Rehmaan">
                                                                    <div class="form-icon position-absolute">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                                                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"></path>
                                                                        </svg>
                                                                    </div>
                                                                </fieldset>
                                                            </div>        
                                                        </div>

                                                        <div class="col-md-6 ">
                                                            <div class="mb-3">
                                                                <label class="col-form-label fw-bold">Email Address</label>
                                                                <fieldset class="form-icon-group left-icon position-relative">
                                                                    <input type="email" class="form-control" value="semirehmaan@gmail.com">
                                                                    <div class="form-icon position-absolute">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                                                                            <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"></path>
                                                                        </svg>
                                                                    </div>
                                                                </fieldset>
                                                            </div>        
                                                        </div>

                                                        <div class="col-md-6 ">
                                                            <div class="mb-3">
                                                                <label class="col-form-label fw-bold">Phone</label>
                                                                <fieldset class="form-icon-group left-icon position-relative">
                                                                    <input type="text" class="form-control phone-number" placeholder="Ex: (000) 000-00-00" value="+716 133 5768">
                                                                    <div class="form-icon position-absolute">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-phone" viewBox="0 0 16 16">
                                                                            <path d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h6zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z"></path>
                                                                            <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"></path>
                                                                        </svg>
                                                                    </div>
                                                                </fieldset>
                                                            </div>        
                                                        </div>

                                                        <div class="col-md-6 ">
                                                            <div class="mb-3">
                                                                <label class="col-form-label fw-bold">Current Address</label>
                                                                    <fieldset class="form-icon-group  ">
                                                                        <input type="text" class="form-control" placeholder="Enter Address" value="Noida, Block B">
                                                                </fieldset>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 ">
                                                            <div class="mb-3">
                                                                <label class="col-form-label fw-bold">Permanent Address</label>
                                                                    <fieldset class="form-icon-group  ">
                                                                        <input type="text" class="form-control" placeholder="Enter Address" value="Noida, Block B">
                                                                    </fieldset>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                            <label class="col-form-label fw-bold">State</label>
                                                                <select class="form-select array-select form-control" aria-label="example">
                                                                    <option selected="">Select Type</option>
                                                                    <option>Asam</option>
                                                                    <option selected>Haryana</option>
                                                                    <option>Bihar</option>
                                                                    <option>Chhattisgarh</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                            <label class="col-form-label fw-bold">City</label>

                                                                <select class="form-select array-select form-control" aria-label="example">
                                                                    <option selected="">Select Type</option>
                                                                    <option>Mumbai</option>
                                                                    <option selected>Noida</option>
                                                                    <option>Kolkata</option>
                                                                    <option>Chennai</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4 ">
                                                            <div class="mb-3">
                                                            <label class="col-form-label fw-bold">Postal Code</label>
                                                                <fieldset class="form-icon-group  ">
                                                                    <input type="text" class="form-control" placeholder="Enter Code" value="211343">
                                                                </fieldset>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12 mt-3 text-center">
                                                            <button class="btn red-bg text-white fs-6 fw-bold">Save</button>
                                                        </div>
                                                
                                                    
                                                    </div>


                                                </div>


                                                <div id="owner" class="container tab-pane fade"><br>
                                                <h3 class="red-text fw-bold underline">
                                                <i class="fa fa-building me-2"></i>Property Information </h3>
                                                
                                                    <table class="w-100 border mt-4" cellpadding="6">
                                                            <thead class="text-center">
                                                                <tr class="border">
                                                                    <th class="border">Property Image</th>
                                                                    <th class="border">Property ID</th>
                                                                    <th class="border">Property Location</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="border text-center">
                                                                <tr>
                                                                    <td class="border ">  <img src="http://localhost:8080/assets/public/img/house1.png"   height="100px" alt=""></td>
                                                                    <td class="border ">Property_001</td>
                                                                    <td class="border">Noida</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="border">  <img src="http://localhost:8080/assets/public/img/house1.png"   height="100px" alt=""></td>
                                                                    <td class="border">Property_002</td>
                                                                    <td class="border">Noida</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="border">  <img src="http://localhost:8080/assets/public/img/house1.png"   height="100px" alt=""></td>
                                                                    <td class="border">Property_003</td>
                                                                    <td class="border">Noida</td>
                                                                </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <div id="ameneties" class="container px-4 tab-pane fade"><br>
                                                    <h3 class="red-text fw-bold underline">
                                                    <i class="fa fa-eye me-2"></i>Password</h3>
                                                
                                                    <div class="row w-75 m-auto pt-3">
                                                        <div class="col-md-12">
                                                        <div class="mb-3">
                                                        <label class="col-form-label fw-bold">Old Password</label>
                                                            <fieldset class="form-icon-group left-icon position-relative">
                                                                <input type="password" class="form-control">
                                                                    <div class="form-icon position-absolute">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"></path>
                                                                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"></path>
                                                                        </svg>
                                                                    </div>
                                                            </fieldset>
                                                        </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="mb-3">
                                                                <label class="col-form-label fw-bold">New Password</label>
                                                                    <fieldset class="form-icon-group left-icon position-relative">
                                                                        <input type="password" class="form-control">
                                                                            <div class="form-icon position-absolute">
                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                                                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"></path>
                                                                                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"></path>
                                                                                </svg>
                                                                            </div>
                                                                    </fieldset>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="mb-3">
                                                            <label class="col-form-label fw-bold">Confirm Password</label>
                                                                <fieldset class="form-icon-group left-icon position-relative">
                                                                <input type="password" class="form-control">
                                                                    <div class="form-icon position-absolute">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"></path>
                                                                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"></path>
                                                                        </svg>
                                                                    </div>
                                                                </fieldset>
                                                            </div>
                                                        </div>                                  
                                                        <div class="col-md-12 mt-3 text-center">
                                                                <button class="btn red-bg text-white fs-6 fw-bold">Change Password</button>
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
    </body>

</html>