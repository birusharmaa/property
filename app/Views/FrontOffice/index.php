<div class="body-header border-0 rounded-0 px-xl-4 px-md-2">
    <div class="container-fluid">
        <div class="row pt-2">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center py-2">
                    <ol class="breadcrumb rounded-0 mb-0 ps-0 bg-transparent flex-grow-1">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Front Office</li>
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
                    <div class="card p-4">
                        <div class="text-end mb-3">
                            <button type="button" id="btnAddfrontoffice" class="btn red-bg fw-bold text-white me-2" data-bs-toggle="modal" data-bs-target="#frontofficeModal">
                                Add
                            </button>
                        </div>
                        <div class="table-responsive">

                            <table id="frontOffice" class="table display dataTable table-hover" style="width:100%">
                                <thead>
                                    <tr class="py-3">
                                        <th class="ps-2">#ID</th>
                                        <th class="ps-2">Name</th>
                                        <th class="ps-2">Email</th>
                                        <th class="ps-2">Phone</th>
                                        <th class="ps-2">Document Title</th>
                                        <th class="ps-2">Document Number</th>
                                        <th class="ps-2">Meeting With</th>
                                        <th class="ps-2">Meeting Purpose</th>
                                        <th class="ps-2">Visit Datetime</th>
                                        <th class="ps-2">In-Time</th>
                                        <th class="ps-2">Out-Time</th>
                                        <th class="ps-2">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    // echo '<pre>';
                                    // print_r($visitorList);
                                    if (!empty($visitorList)) : ?>
                                        <?php foreach ($visitorList as $key => $visitor) : ?>
                                            <tr class="text-center">
                                                <td class="id-red fw-bold"><?= $key + 1 ?></td>
                                                <td><?= $visitor->name ?></td>
                                                <td><?= $visitor->email ?></td>
                                                <td><?= $visitor->phone ?></td>
                                                <td><?= $visitor->visitor_id_title ?></td>
                                                <td><?= $visitor->visitor_id_no ?></td>
                                                <td><?= $visitor->meeting_with_name ?></td>
                                                <td><?= $visitor->purpose ?></td>
                                                <td><?= convert_date_utc_to_local($visitor->created_at,"d/m/Y") ?></td>
                                                <td><?= $visitor->in_time ?></td>
                                                <td><?= $visitor->out_time ?></td>
                                                <td>
                                                    <a href="#">
                                                        <i class="fa fa-edit edit-details text-white me-1  text-center rounded"></i>
                                                    </a>
                                                    <a href="">
                                                        <i class="fa fa-trash-o delete-details text-white bg-danger text-center rounded"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ----------- front -office---------- -->

<div class="modal fade" id="frontofficeModal" tabindex="-1" aria-labelledby="meetingsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content modal-margin">
            <form action="" id="front-office-form">
                <div class="modal-header red-bg py-3">
                    <h5 class="fw-bold text-white" id="front-office-form-lable">
                        Add Front Office
                    </h5>
                </div>
                <div class="modal-body">
                    <div class="row mx-auto">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="col-form-label fw-bold">Name</label>
                                <input type="text" class="form-control py-1" name="visitor-name" id="visitor-name" placeholder="Enter Name">
                                <small id="visitor-name-error" for></small>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="col-form-label fw-bold">Email Address</label>
                                <input type="text" class="form-control py-1" name="visitor-email" id="visitor-email" placeholder="abc@gmail.com">
                                <small id="visitor-email-error" for></small>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="col-form-label fw-bold">Phone Number</label>
                                <input type="text" class="form-control py-1" name="visitor-phone" id="visitor-phone" placeholder="81XXXXXXXX">
                                <small id="visitor-phone-number-error" for></small>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="col-form-label fw-bold">Visitor Document Name</label>
                                <input type="text" class="form-control py-1" placeholder="Doc_No..." id="visitor-doc-name" name="visitor-doc-name">
                                <small id="visitor-doc-name-error" for></small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="col-form-label fw-bold">Visitor Document Number</label>
                                <input type="text" class="form-control py-1" placeholder="Doc_No..." id="visitor-doc-id-number" name="visitor-doc-id-number">
                                <small id="visitor-doc-id-number-error" for></small>

                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="col-form-label fw-bold">Meeting With</label>
                                <select class="form-control py-1" id="meeting-with" name="meeting-with">
                                    <option value="1" selected="" disabled>Select employee</option>
                                    <?php if (!empty($employees)) : foreach ($employees as $key => $value) : ?>
                                            <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                                    <?php endforeach;
                                    endif; ?>
                                </select>
                                <small id="meeting-with-error" for="meeting-with"></small>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="col-form-label fw-bold">Meeting Purpose</label>
                            <textarea id="visitor-meeting-purpose" cols="30" rows="5" class="form-control py-1" name="visitor-meeting-purpose" placeholder="Purpose...."></textarea>
                            <small id="visitor-meeting-purpose-error"></small>
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn red-bg fw-bold text-white me-3">Save Changes
                    </button>
                    <button type="button" class="btn btn-danger danger-bg fw-bold text-white" data-bs-dismiss="modal">Close
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= view('FrontOffice/Scripts/front-office') ?>