<div class="body-header border-0 rounded-0 px-xl-4 px-md-2">
    <div class="container-fluid">
        <div class="row pt-2">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center py-2">
                    <ol class="breadcrumb rounded-0 mb-0 ps-0 bg-transparent flex-grow-1">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Allot Properties</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="body mb-2 px-xl-4 px-md-2">
    <div class="container-fluid my-4">
        <div class="row">
            <!-- <div class="col-md-12"> -->
            <div class="col-md-11 mx-auto">
                <!-- <div class="red-bg text-center text-white rounded py-2 mb-3">
                    <h1 class=" fw-bolder">Allot Properties</h1>
                </div> -->


                <div class="card p-4">
                    <div class="text-end mb-3">
                        <!-- <button class="btn red-bg border text-white fw-bold" data-toggle="modal">Allot</button> -->

                        <button type="button" class="btn red-bg fw-bold text-white me-2" data-bs-toggle="modal" data-bs-target="#allotpropertyModal">
                            Allot
                        </button>


                    </div>
                    <table id="allotProperties" class="table display dataTable table-hover" style="width:100%">
                        <thead>
                            <tr class="py-3">
                                <th>#ID</th>
                                <th>Property</th>
                                <th>Allot To</th>
                                <th>Property for Sell/Buy/Rent</th>
                                <th>Date</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($assignedproperty)) :  ?>
                                <?php foreach ($assignedproperty as $key => $item) : ?>
                                    <tr>
                                        <td class="sorting_1 id-red fw-bold"><?= $item->pur_id ?></td>
                                        <td><?= $item->property_title ?></td>
                                        <td><?= $item->name ?></td>
                                        <td class="ps-5">
                                            <span class="badge bg-warning font-size"><?= $item->allot_title ?></span>
                                        </td>
                                        <td><?= date("d/m/Y", strtotime($item->pur_created_at)); ?></td>
                                        <td>
                                            <a href="#" class="edit" data-id="<?= $item->pur_id ?>">
                                                <i class="fa fa-edit edit-details text-white me-1  text-center rounded"></i>
                                            </a>
                                            <a href="#" class="delete" data-id="<?= $item->pur_id ?>">
                                                <i class="fa fa-trash-o delete-details text-white bg-danger text-center rounded"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>

                        </tbody>
                    </table>
                </div> <!-- .card end -->
                <!-- </div> -->
            </div>
        </div>
    </div>
</div>



<!-- -------------- Allot- Properties Modal----------  -->
<div class="modal fade" id="allotpropertyModal" tabindex="-1" aria-labelledby="allotpropertyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content modal-margin">
            <form id="allotPropertyForm" method="post">
                <div class="modal-header red-bg py-3">
                    <h4 class="fw-bold text-white">
                        Allot Properties
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="row mx-auto">
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <label class="col-form-label fw-bold">Property</label>
                            <select class="form-select w-100 input-border text-dark" id="property" name="property" required>
                                <option value="default">---Select---
                                </option>
                                <?php if (!empty($properties)) : ?>
                                    <?php foreach ($properties as $key => $property) : ?>
                                        <option value="<?= $property->id ?>"><?= $property->property_title ?>
                                        </option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <label class="col-form-label fw-bold">Allot To</label>
                            <select class="form-select w-100 input-border text-dark" id="user" name="user" required>
                                <option value="default">---Select---
                                </option>
                                <?php if (!empty($users)) : ?>
                                    <?php foreach ($users as $key => $user) : ?>
                                        <option value="<?= $user->id ?>"><?= $user->name ?>
                                        </option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <label class="col-form-label fw-bold">Property For</label>
                            <select class="form-select w-100 input-border text-dark" id="propertyFor" name="propertyFor" required>
                                <option value="default"> ---Select---
                                </option>
                                <?php if (!empty($PropertyFor)) : ?>
                                    <?php foreach ($PropertyFor as $key => $prop) : ?>
                                        <option value="<?= $prop->id ?>"><?= $prop->title ?>
                                        </option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="d-flex align-items-center red-text fs-6 mt-3 ">
                                <i class="fa fa-check-circle mt-2 "></i>
                                <p class="mt-4 ms-2 fw-bold ">Allot</p>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn red-bg fw-bold text-white">Allot Property
                    </button>
                    <button type="button" class="btn btn-danger danger-bg fw-bold text-white" data-bs-dismiss="modal">Close
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= view('Property/Scripts/allot_property_script') ?>