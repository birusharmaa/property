<style>
    .mr-1 {
        margin-top: 1.7rem !important;
    }
</style>


<div class="body-header border-0 rounded-0 px-xl-4 px-md-2">
    <div class="container-fluid">
        <div class="row pt-2">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center py-2">
                    <ol class="breadcrumb rounded-0 mb-0 ps-0 bg-transparent flex-grow-1">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add Employees</li>
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
                        <h1 class=" fw-bolder">Add Employees</h1>
                    </div>
                </div>
                <div class="col-md-12 m-auto p-0">
                    <?php
                    // echo '<pre>';
                    // print_r($employee);
                    // die('adfd');
                    ?>
                    <div class="card">
                        <div class="card-body">
                            <form class="row g-3" id="employee-form">

                                <input type="hidden" name="emp_id" id="emp_id" value="<?= $employee->id ?? '' ?>">
                                <input type="hidden" name="emp_doc_id" id="emp_doc_id" value="<?= $employee->empadd_id ?? '' ?>">
                                <input type="hidden" name="empadd_id" id="empadd_id" value="<?= $employee->empadd_id ?? '' ?>">
                                <input type="hidden" name="emps_id" id="emps_id" value="<?= $employee->emps_id ?? '' ?>">
                                <input type="hidden" name="emr_id" id="emr_id" value="<?= $employee->emr_id ?? '' ?>">

                                <div class="step-app">
                                    <h3>Employee Informations</h3>
                                    <section>
                                        <div class="row gx-4">
                                            <div class="col-md-3">
                                                <label for="firstname2" class="form-label">First Name</label>
                                                <input type="text" id="firstname" name="firstname" class="form-control form-control1" value="<?= $employee->emp_first_name ?? '' ?>">
                                            </div>
                                            <div class="col-md-3">
                                                <label for="lastname2" class="form-label">Last Name</label>
                                                <input type="text" id="lastname" name="lastname" class="form-control form-control1" value="<?= $employee->emp_last_name ?? '' ?>">
                                            </div>
                                            <div class="col-md-3">
                                                <label for="birthdate2" class="form-label">Birth Date</label>
                                                <input type="date" id="birthdate" name="birthdate" class="form-control form-control1" value="<?= $employee->emp_date_of_birth ?? '' ?>">
                                            </div>

                                            <div class="col-md-3">
                                                <label for="gender" class="form-label">Gender</label>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="gender" id="male" value="m" <?= $employee->emp_gender == 'm' ? 'checked' : '' ?>>
                                                            <label class="form-check-label" for="male">
                                                                Male
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="gender" id="female" value="f" <?= $employee->emp_gender == 'f' ? 'checked' : '' ?>>
                                                            <label class="form-check-label" for="female">
                                                                Female
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="gender" id="other" value="o" <?= $employee->emp_gender == 'o' ? 'checked' : '' ?>>
                                                            <label class="form-check-label" for="other">
                                                                Other
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <label for="maritalstatus" class="form-label">Marital
                                                    Status</label>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="marital-status" id="married" value="m" <?= $employee->married_staus == 'm' ? 'checked' : '' ?>>
                                                            <label class="form-check-label" for="married">
                                                                Married
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="marital-status" id="unmarried" value="um" <?= (isset($employee->married_staus) && $employee->married_staus == 'um') ? 'checked' : '' ?>>
                                                            <label class="form-check-label" for="unmarried">
                                                                UnMarried
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 d-none" id="marrid-status">
                                                <label for="spousename2" class="form-label">Spouse’s
                                                    Name</label>
                                                <input type="text" id="spousename" class="form-control form-control1" value="">
                                            </div>
                                            <div class="col-md-3">
                                                <label for="lastname2" class="form-label">Father's Name</label>
                                                <input type="text" id="father-name" name="father-name" class="form-control form-control1" value="<?= $employee->father_name ?? '' ?>">
                                            </div>
                                            <div class="col-md-3">
                                                <label for="lastname2" class="form-label">Mother's Name</label>
                                                <input type="text" id="mother-nmae" name="mother-name" class="form-control form-control1" value="<?= $employee->mother_name ?? '' ?>">
                                            </div>


                                            <div class="col-md-3">
                                                <label for="phone2" class="form-label">Phone Number</label>
                                                <input type="number" id="phone" name="phone" class="form-control form-control1" value="<?= $employee->emp_phone ?? '' ?>">

                                            </div>
                                            <div class="col-md-3">
                                                <label for="alternate2" class="form-label">Alternate
                                                    Number</label>
                                                <input type="number" id="alternate" name="alternate" class="form-control form-control1" value="<?= $employee->alt_number ?? '' ?>">

                                            </div>
                                            <div class="col-md-6">
                                                <label for="address2" class="form-label">Address</label>
                                                <input type="text" id="address" name="address" class="form-control form-control1" value="<?= $employee->empadd_address ?? '' ?>">
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label">Country</label>
                                                <select class="form-select form-control1" name="country" aria-label="Default select example">
                                                    <option>Select</option>
                                                    <?php if (!empty($countries)) : ?>
                                                        <?php foreach ($countries as $key => $item) :
                                                            $id =  isset($employee) ?  $employee->empadd_country ?? 101 : 101;
                                                            $selected =  $item->id == $id ? 'selected' : '';
                                                        ?>
                                                            <option value="<?= $item->id ?>" <?= $selected ?>><?= $item->name ?></option>
                                                    <?php endforeach;
                                                    endif ?>
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label">State</label>
                                                <select class="form-select form-control1" name="state" aria-label="Default select example">
                                                    <option>Select</option>
                                                    <?php if (!empty($states)) : ?>
                                                        <?php foreach ($states as $key => $item) :
                                                            $id =  isset($employee) ?  $employee->empadd_state ?? 38 : 38;
                                                            $selected =  $item->id == $id ? 'selected' : '';
                                                        ?>
                                                            <option value="<?= $item->id ?>" <?= $selected ?>><?= $item->name ?></option>
                                                    <?php endforeach;
                                                    endif ?>
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label">City</label>
                                                <select class="form-select form-control1" name="city" aria-label="Default select example">
                                                    <option>Select</option>
                                                    <?php if (!empty($cities)) : ?>
                                                        <?php foreach ($cities as $key => $item) :
                                                            $id =  isset($employee) ?  $employee->empadd_country ?? 5022 : 5022;
                                                            $selected =  $item->id == $id ? 'selected' : '';
                                                        ?>
                                                            <option value="<?= trim($item->id) ?>" <?= $selected ?>><?= $item->name ?></option>
                                                    <?php endforeach;
                                                    endif ?>
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="zipcode2" class="form-label">Pin Code</label>
                                                <input type="number" id="pincode" name="pincode" class="form-control form-control1" value="<?= $employee->empadd_zipcode ?? '' ?>">

                                            </div>
                                            <div class="col-md-3">
                                                <label for="email2" class="form-label">Email</label>
                                                <input type="email" id="email" name="email" class="form-control form-control1" value="<?= $employee->emp_email ?? '' ?>">

                                            </div>
                                        </div>
                                    </section>

                                    <h3>Documents</h3>
                                    <section>
                                        <div class="row gx-4">
                                            <div class="col-md-6">
                                                <label for="adharcard" class="form-label">Adhar Card</label>
                                                <input type="file" id="adharcard" name="adharcard" class="form-control form-control1" value="">
                                            </div>
                                            <div class="col-md-6 mr-1">
                                                <button class="btn btn-primary upload" data-target="adharcard" type="button">Upload</button>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="pancard" class="form-label">Pan Card</label>
                                                <input type="file" id="pancard" class="form-control form-control1" value="">
                                            </div>
                                            <div class="col-md-6 mr-1">
                                                <button class="btn btn-primary upload" data-target="pancard" type="button">Upload</button>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="10marksheet" class="form-label">10th
                                                    Marksheet</label>
                                                <input type="file" id="10marksheet" name="10marksheet" class="form-control form-control1" value="">

                                            </div>

                                            <div class="col-md-6 mr-1">
                                                <button class="btn btn-primary upload" data-target="10marksheet" type="button">Upload</button>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="12marksheet" class="form-label">12th
                                                    Marksheet</label>
                                                <input type="file" id="12marksheet" name="12marksheet" class="form-control form-control1" value="">

                                            </div>
                                            <div class="col-md-6 mr-1">
                                                <button class="btn btn-primary upload" data-target="12marksheet" type="button">Upload</button>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="graduation" class="form-label">Graduation</label>
                                                <input type="file" id="graduation" name="graduation" class="form-control form-control1" value="">

                                            </div>
                                            <div class="col-md-6 mr-1">
                                                <button class="btn btn-primary upload" data-target="graduation" type="button">Upload</button>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="postgraduation" class="form-label">Post
                                                    Graduation</label>
                                                <input type="file" id="postgraduation" name="postgraduation" class="form-control form-control1" value="">
                                            </div>
                                            <div class="col-md-6 mr-1">
                                                <button class="btn btn-primary upload" data-target="postgraduation" type="button">Upload</button>
                                            </div>
                                        </div>
                                        <input type="hidden" name="paths" id="paths" value="<?= json_decode($employee->emp_doc_path) ?? '' ?>">
                                    </section>
                                    <h3>Job Information</h3>
                                    <section>
                                        <div class="row gx-4">
                                            <div class="col-md-3">
                                                <label class="form-label">Designation</label>
                                                <select class="form-select form-control1" name="designation" aria-label="Default select example">
                                                    <option>Select</option>
                                                    <?php if (!empty($designations)) :
                                                    ?>
                                                        <?php foreach ($designations as $key => $item) :

                                                            $id = isset($employee) ? (int)trim($employee->emp_designation) : '';
                                                            $selected = ($id == $item['id']) ? 'selected' : '';

                                                        ?>
                                                            <option value="<?= $item['id'] ?>" <?= $selected ?>><?= $item['title'] ?></option>
                                                    <?php endforeach;
                                                    endif ?>
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label">Supervisor</label>
                                                <select class="form-select form-control1" name="supervisor" aria-label="Default select example">
                                                    <option>Select</option>
                                                    <?php if (!empty($superwisers)) : ?>
                                                        <?php foreach ($superwisers as $key => $item) :
                                                            // $id = isset($employee->emp_designation) ? $employee->emp_designation : '';
                                                            // $selected = $item->id == $id ? 'selected' : '';
                                                        ?>
                                                            <option value="<?= $item['id'] ?>"><?= $item['title'] ?></option>
                                                    <?php endforeach;
                                                    endif ?>
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label">Department</label>
                                                <select class="form-select form-control1" name="department" aria-label="Default select example">
                                                    <option>Select</option>
                                                    <?php if (!empty($departments)) : ?>
                                                        <?php foreach ($departments as $key => $item) :
                                                            $id = isset($employee) ? (int)trim($employee->emp_department) : '';
                                                            $selected = ($id == $item['id']) ? 'selected' : '';
                                                        ?>
                                                            <option value="<?= $item['id'] ?>" <?= $selected ?>><?= $item['title'] ?></option>
                                                    <?php endforeach;
                                                    endif ?>
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="worklocation" class="form-label">Work
                                                    Location</label>
                                                <input type="text" id="worklocation" name="worklocation" class="form-control form-control1" value="<?= $employee->worklocation ?? '' ?>">

                                            </div>
                                            <div class="col-md-3">
                                                <label for="Joinning" class="form-label">Joinning Date</label>
                                                <input type="date" id="joinning-date" name="Joinning" class="form-control form-control1" value="<?= $employee->emp_date_of_joining ?? '' ?>">
                                            </div>
                                            <div class="col-md-3">
                                                <label for="salary" class="form-label">Salary</label>
                                                <input type="number" id="salary" name="salary" class="form-control form-control1" value="<?= $employee->emps_salary ?? '' ?>">
                                            </div>
                                            <div class="col-md-3">
                                                <label for="uan" class="form-label">EPEO/UAN Number </label>
                                                <input type="number" id="uan" name="uan" minlength="10" maxlength="10" class="form-control form-control1" value="<?= $employee->emps_epf_number ?? '' ?>">
                                            </div>
                                        </div>
                                    </section>
                                    <h3>Bank Details</h3>
                                    <section>
                                        <div class="row gx-4">
                                            <div class="col-md-3">
                                                <label for="bank-name" class="form-label">Bank Name</label>
                                                <input type="text" id="bank-name" name="bank-name" class="form-control form-control1" value="<?= $employee->emps_bank_name ?? '' ?>" required>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="bankifsccode" class="form-label">Bank IFSC
                                                    Code</label>
                                                <input type="text" id="bankifsccode" name="bankifsccode" class="form-control form-control1" value="<?= $employee->emps_account_number ?? '' ?>" required>
                                            </div>

                                            <div class="col-md-3">
                                                <label for="bankaccountnumber" class="form-label">Bank Account
                                                    Number</label>
                                                <input type="text" id="bankaccountnumber" name="bankaccountnumber" class="form-control form-control1" value="<?= $employee->emps_ifsc_code ?? '' ?>" required>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= view('HR/Scripts/employees') ?>