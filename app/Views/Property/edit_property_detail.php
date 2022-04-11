<?php
$propInfo = $pageData['propInfo'][0] ?? '';
$propAddress = $pageData['propAddress'][0] ?? '';
$propArea = (object)$pageData['propArea'] ?? '';
$propOwnInfo = (object)$pageData['propOwnInfo'] ?? '';
$propAmenities = json_decode($pageData['propAmenities']['pa_amenities']) ?? '';
?>

<style>
    .wizard>.content {
        min-height: 2em !important;
    }

    section {
        min-height: 0 !important;
        height: auto !important;
    }

    .image-area {
        position: relative;
        width: 150px;
        background: #dbdbdb;
    }

    .image-area img {
        max-width: 150px;
        height: auto;
    }

    .remove-image {
        display: none;
        position: absolute;
        top: -10px;
        right: -10px;
        border-radius: 10em;
        padding: 2px 6px 3px;
        text-decoration: none;
        font: 700 21px/20px sans-serif;
        background: #555;
        border: 3px solid #fff;
        color: #FFF;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.5), inset 0 2px 4px rgba(0, 0, 0, 0.3);
        text-shadow: 0 1px 2px rgba(0, 0, 0, 0.5);
        -webkit-transition: background 0.5s;
        transition: background 0.5s;
    }

    .remove-image:hover {
        background: #E54E4E;
        padding: 3px 7px 5px;
        top: -11px;
        right: -11px;
    }

    .remove-image:active {
        background: #E54E4E;
        top: -10px;
        right: -11px;
    }
</style>

<div class="body-header border-0 rounded-0 px-xl-4 px-md-2">
    <div class="breadcrumb-sec">
        <div class="container-fluid">
            <div class="row pt-2">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center">
                        <ol class="breadcrumb rounded-0 mb-0 ps-0 bg-transparent flex-grow-1">
                            <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Property</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="body mb-2 px-xl-4 px-md-2">
    <div class="container-fluid my-4">
        <div class="row mx-auto">
            <div class="col-md-11 m-auto p-0">
                <!-- <div class="red-bg text-center text-white rounded">
                    <h3 class="fw-bolder">Edit Properties</h3>
                </div> -->
                <div class="col-md-12 m-auto p-0">
                    <div class="card">
                        <div class="card-body">
                            <form id="add-property" action="#">
                                <input type="hidden" name="propInfo_id" id="propInfo_id" value="<?= $propInfo->prpt_id ?>">
                                <input type="hidden" name="propAddress_id" value="<?= $propAddress->ptadd_id ?>">
                                <input type="hidden" name="propArea_id" value="<?= $propArea->ptar_id ?>">
                                <input type="hidden" name="propOwnInfo_id" value="<?= $propOwnInfo->poi_id ?>">
                                <input type="hidden" name="propAmenities_id" value="<?= $propAmenities->pa_id ?>">

                                <div class="step-app">
                                    <h3>Property Informations</h3>
                                    <section class="p-2">
                                        <div class="row gx-4">
                                            <div class="col-md-4 col-12 ">
                                                <div class="mb-3">
                                                    <label class="col-form-label fw-bold">Property
                                                        Name</label>
                                                    <input type="text" name="propertyName" id="propertyName" class="form-control border-0 border-bottom shadow-none border-1 border text-dark border-dark bg-transparent ps-0 rounded-0 line-heigth mb-3" placeholder="Enter Name" value="<?= $propInfo->prpt_title ?? "" ?>">
                                                    <div>
                                                        <label class="col-form-label fw-bold">Property
                                                            Map</label> <br>
                                                        <button class="btn mt-2 red-bg text-white fw-bold" type="button">Property
                                                            Map</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-12 text-center">
                                                <img src="<?= base_url(); ?>/assets/public/img/house1.png" width="60%" height="200px" alt="">
                                            </div>

                                            <div class="col-md-4 col-12">
                                                <div class="mb-3">
                                                    <label class="col-form-label fw-bold">Property
                                                        For</label>
                                                    <select id="property_available_for" name="property_available_for" class="form-select  ps-0 bg-transparent  border-0 shadow-none border-1 border text-dark border-dark border-bottom rounded-0 line-heigth py-1" required>
                                                        <option value="">---Select Type---
                                                        </option>
                                                        <?php
                                                        if (!empty($PropertyFor)) :
                                                            foreach ($PropertyFor as $key => $item) : ?>
                                                                <option value="<?= $item['id'] ?>" <?= ($propInfo->property_available_for == $item['id']) ? "selected" : "" ?>><?= $item['title'] ?></option>
                                                        <?php endforeach;
                                                        endif; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-12 ">
                                                <div class="mb-3">
                                                    <label class="col-form-label fw-bold">Property
                                                        category</label>
                                                    <select id="pro_category" name="pro_category" required class="form-select  ps-0 bg-transparent  border-0 shadow-none border-1 border text-dark border-dark border-bottom rounded-0 line-heigth py-1" value="<?= $propInfo->prpt_property_cate ?>" required>
                                                        <option value="">---Select Type---
                                                        </option>
                                                        <?php
                                                        if (!empty($PropertyCategories)) :
                                                            foreach ($PropertyCategories as $key => $item) : ?>
                                                                <option value="<?= $item['cat_id'] ?>" <?= ($propInfo->prpt_property_cate == $item['cat_id']) ? "selected" : "" ?>><?= $item['cat_title'] ?></option>
                                                        <?php endforeach;
                                                        endif; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-12">
                                                <div class="mb-3">
                                                    <label class="col-form-label fw-bold">Property
                                                        Type</label>
                                                    <select id="property_type" name="property_type" class="form-select  ps-0 bg-transparent  border-0 shadow-none border-1 border text-dark border-dark border-bottom rounded-0 line-heigth py-1" required>
                                                        <option value="">---Select Type---
                                                        </option>
                                                        <?php
                                                        if (!empty($PropertyTypes)) :
                                                            foreach ($PropertyTypes as $key => $item) : ?>
                                                                <option value="<?= $item['pt_id'] ?>" <?= ($propInfo->prpt_property_type == $item['pt_id']) ? "selected" : "" ?>><?= $item['pt_title'] ?></option>
                                                        <?php endforeach;
                                                        endif; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <h3>Property form</h3>
                                    <section class="p-2">
                                        <div class="row gx-4">
                                            <div class="col-md-2 col-12 residential d-none">
                                                <div class="mb-3">
                                                    <label class="col-form-label fw-bold">No. of
                                                        Bedrooms</label>
                                                    <input type="text" name="bedrooms" id="bedrooms" class="form-control border-0 border-bottom shadow-none border-1 border text-dark border-dark bg-transparent ps-0 rounded-0 line-heigth mb-3" placeholder="Enter no. of Bedrooms" value="<?= $propInfo->prpt_no_of_bedrooms ?? "" ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-12">
                                                <div class="mb-3">
                                                    <label class="col-form-label fw-bold">No. of
                                                        Bathrooms</label>
                                                    <input type="text" name="bathrooms" id="bathrooms" class="form-control border-0 border-bottom shadow-none border-1 border text-dark border-dark bg-transparent ps-0 rounded-0 line-heigth mb-3" placeholder="Enter no. of Bathrooms" value="<?= $propInfo->prpt_no_of_bathrooms ?? "" ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-12 ">
                                                <div class="mb-3">
                                                    <label class="col-form-label fw-bold">Bathroom
                                                        Style</label>
                                                    <input type="text" name="BathroomStyle" id="BathroomStyle" class="form-control border-0 border-bottom shadow-none border-1 border text-dark border-dark bg-transparent ps-0 rounded-0 line-heigth mb-3" placeholder="Enter Bathroom Style" value="<?= $propInfo->prpt_bathroom_style ?? "" ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-12">
                                                <div class="mb-3">
                                                    <label class="col-form-label fw-bold">Washroom
                                                        Size</label>
                                                    <input type="text" name="washroomSize" id="washroomSize" class="form-control border-0 border-bottom shadow-none border-1 border text-dark border-dark bg-transparent ps-0 rounded-0 line-heigth mb-3" placeholder="Enter Size" value="<?= $propInfo->prpt_washroomsize ?? "" ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-12">
                                                <div class="mb-3">
                                                    <label class="col-form-label fw-bold">No. of
                                                        Balconies</label>
                                                    <input type="text" name="balconies" id="balconies" class="form-control border-0 border-bottom shadow-none border-1 border text-dark border-dark bg-transparent ps-0 rounded-0 line-heigth mb-3" placeholder="Enter no. of Balconies" value="<?= $propInfo->prpt_no_of_balconies ?? "" ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-12 ">
                                                <div class="mb-3">
                                                    <label class="col-form-label fw-bold">Kitechen
                                                        Size</label>
                                                    <input type="text" name="kitechen" id="kitechen" class="form-control border-0 border-bottom shadow-none border-1 border text-dark border-dark bg-transparent ps-0 rounded-0 line-heigth mb-3" placeholder="Enter Size " value="<?= $propInfo->prpt_kitechen_size ?? "" ?>">
                                                </div>
                                            </div>


                                            <div class="col-md-2 col-12 residential d-none">
                                                <div class="mb-3">
                                                    <label class="col-form-label fw-bold">Drawing
                                                        Hall</label>
                                                    <input type="text" name="drawingHall" id="drawingHall" class="form-control border-0 border-bottom shadow-none border-1 border text-dark border-dark bg-transparent ps-0 rounded-0 line-heigth mb-3" placeholder="Drawing Hall" value="<?= $propInfo->prpt_drawing_hall ?? "" ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-12 residential d-none">
                                                <div class="mb-3">
                                                    <label class="col-form-label fw-bold">Dining
                                                        Hall</label>
                                                    <input type="text" name="diningHall" id="diningHall" class="form-control border-0 border-bottom shadow-none border-1 border text-dark border-dark bg-transparent ps-0 rounded-0 line-heigth mb-3" placeholder="Dining Hall Style" value="<?= $propInfo->prpt_dining_hall ?? "" ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-12 commercial">
                                                <div class="mb-3">
                                                    <label class="col-form-label fw-bold">No. of
                                                        Sittings</label>
                                                    <input type="text" name="sittings" id="sittings" class="form-control border-0 border-bottom shadow-none border-1 border text-dark border-dark bg-transparent ps-0 rounded-0 line-heigth mb-3" placeholder="Enter no. of Sittings" value="<?= $propInfo->prpt_no_of_sittings ?? "" ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-12 commercial">
                                                <div class="mb-3">
                                                    <label class="col-form-label fw-bold">No. of
                                                        Cabins</label>
                                                    <input type="text" name="cabins" id="cabins" class="form-control border-0 border-bottom shadow-none border-1 border text-dark border-dark bg-transparent ps-0 rounded-0 line-heigth mb-3" placeholder="Enter no. of Cabins" value="<?= $propInfo->prpt_dining_hall ?? "" ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-2 col-12 ">
                                                <div class="mb-3">
                                                    <label class="col-form-label fw-bold"> No. of
                                                        Lifts</label>
                                                    <input type="text" name="lifts" id="lifts" class="form-control border-0 border-bottom shadow-none border-1 border text-dark border-dark bg-transparent ps-0 rounded-0 line-heigth mb-3" placeholder="Enter no. of Lifts" value="<?= $propInfo->prpt_no_of_lifts ?? "" ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-12 ">
                                                <div class="mb-3">
                                                    <label class="col-form-label fw-bold">No. of
                                                        Entry Gates</label>
                                                    <input type="text" name="gates" id="gates" class="form-control border-0 border-bottom shadow-none border-1 border text-dark border-dark bg-transparent ps-0 rounded-0 line-heigth mb-3" placeholder="Enter no. of Gates" value="<?= $propInfo->prpt_no_of_entry_gates ?? "" ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-12 residential d-none">
                                                <div class="mb-3">
                                                    <label class="col-form-label fw-bold">Drawing
                                                        Hall Size</label>
                                                    <input type="text" name="drawingHallSize" id="drawingHallSize" class="form-control border-0 border-bottom shadow-none border-1 border text-dark border-dark bg-transparent ps-0 rounded-0 line-heigth mb-3" placeholder="Enter Size" value="<?= $propInfo->prpt_drawing_hall_size ?? "" ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-12 residential d-none">
                                                <div class="mb-3">
                                                    <label class="col-form-label fw-bold">Dining
                                                        Hall Size</label>
                                                    <input type="text" name="diningHallSize" id="diningHallSize" class="form-control border-0 border-bottom shadow-none border-1 border text-dark border-dark bg-transparent ps-0 rounded-0 line-heigth mb-3" placeholder="Enter Size" value="<?= $propInfo->prpt_dining_hall_size ?? "" ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-12 residential d-none">
                                                <div class="mb-3">
                                                    <label class="col-form-label fw-bold">Room
                                                        Size</label>
                                                    <input type="text" name="roomSize" id="roomSize" class="form-control border-0 border-bottom shadow-none border-1 border text-dark border-dark bg-transparent ps-0 rounded-0 line-heigth mb-3" placeholder="Enter Size" value="<?= $propInfo->prpt_room_size ?? "" ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-2 col-12">
                                                <div class="mb-3">
                                                    <label class="col-form-label fw-bold">Servant
                                                        Room</label>
                                                    <input type="text" name="servantRoom" id="servantRoom" class="form-control border-0 border-bottom shadow-none border-1 border text-dark border-dark bg-transparent ps-0 rounded-0 line-heigth mb-3" placeholder="Enter Size" value="<?= $propInfo->prpt_servant_room ?? "" ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <h3>
                                        Property Area
                                    </h3>

                                    <section>
                                        <div class="row g3">
                                            <div class="col-md-12 mt-3">
                                                <h5 class="fw-bolder red-text ">Property Area :-
                                                </h5>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="col-form-label fw-bold">Square
                                                        Feet</label>
                                                    <input type="text" name="squareFeet" id="squareFeet" class="form-control border-0 border-bottom shadow-none border-1 border text-dark border-dark bg-transparent ps-0 rounded-0 line-heigth" placeholder="Enter Square Feet" value="<?= $propArea->ptar_square_feet ?? "" ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="col-form-label fw-bold">Carpet
                                                        Area</label>
                                                    <input type="text" name="carpetArea" id="carpetArea" class="form-control border-0 border-bottom shadow-none border-1 border text-dark border-dark bg-transparent ps-0 rounded-0 line-heigth" placeholder="Enter Carpet Area" value="<?= $propArea->ptar_carpet_area ?? "" ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="col-form-label fw-bold">Build-Up
                                                        Area</label>
                                                    <input type="text" name="buildUpArea" id="buildUpArea" class="form-control border-0 border-bottom shadow-none border-1 border text-dark border-dark bg-transparent ps-0 rounded-0 line-heigth" placeholder="Enter Area" value="<?= $propArea->ptar_build_up_area ?? "" ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="col-form-label fw-bold">Yard</label>
                                                    <input type="text" name="inputYard" id="inputYard" class="form-control border-0 border-bottom shadow-none border-1 border text-dark border-dark bg-transparent ps-0 rounded-0 line-heigth" placeholder="Enter Yard" value="<?= $propArea->ptar_yard ?? "" ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="col-form-label fw-bold">Meter</label>
                                                    <input type="text" name="inputMeter" id="inputMeter" class="form-control border-0 border-bottom shadow-none border-1 border text-dark border-dark bg-transparent ps-0 rounded-0 line-heigth" placeholder="Enter Meter" value="<?= $propArea->ptar_meter ?? "" ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="col-form-label fw-bold">Super
                                                        Carpet Area</label>
                                                    <input type="text" name="suCarpetArea" id="suCarpetArea" class="form-control border-0 border-bottom shadow-none border-1 border text-dark border-dark bg-transparent ps-0 rounded-0 line-heigth" placeholder="Enter Area" value="<?= $propArea->ptar_super_carpet_area ?? "" ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <h3>Address</h3>
                                    <section>
                                        <div class="row g3">

                                            <div class="col-md-12 mt-3">
                                                <h5 class="fw-bolder red-text ">
                                                    Address :-
                                                </h5>
                                            </div>
                                            <div class="col-md-4 col-12">
                                                <div class="mb-3">
                                                    <label class="col-form-label fw-bold">State</label>
                                                    <select id="InputState" name="InputState" class="form-select  ps-0 bg-transparent  border-0 shadow-none border-1 border text-dark border-dark border-bottom rounded-0 line-heigth py-1 " value="<?= $propArea->ptar_super_carpet_area ?? "" ?>" required>
                                                        <option value="">---Select State---
                                                        </option>
                                                        <?php
                                                        if (!empty($states)) :
                                                            foreach ($states as $key => $item) : ?>
                                                                <option value="<?= $item['st_id'] ?>" <?= ($propAddress->ptadd_state == $item['st_id']) ? 'selected' : '' ?>><?= $item['st_title'] ?></option>
                                                        <?php endforeach;
                                                        endif; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-12">
                                                <div class="mb-3">
                                                    <label class="col-form-label fw-bold">City</label>
                                                    <select id="InputCity" name="InputCity" class="form-select border-0 border-bottom shadow-none border-1 border text-dark border-dark bg-transparent ps-0 py-1 rounded-0 line-heigth">
                                                        <option value="">---Select City---
                                                        </option>
                                                        <?php
                                                        if (!empty($cities)) :
                                                            foreach ($cities as $key => $item) : ?>
                                                                <option value="<?= $item['ct_id'] ?>" <?= ($propAddress->ct_title == $item['ct_title']) ? 'selected' : '' ?>><?= $item['ct_title'] ?></option>
                                                        <?php endforeach;
                                                        endif; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-12">
                                                <div class="mb-3">
                                                    <label class="col-form-label fw-bold">Pin
                                                        Code</label>
                                                    <input type="text" name="pin" id="pin" class="form-control border-0 border-bottom shadow-none border-1 border text-dark border-dark bg-transparent ps-0 rounded-0 line-heigth" placeholder="Enter Pin Code" value="<?= $propAddress->ptadd_zip_code ?? '' ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-12">
                                                <div class="mb-3">
                                                    <label class="col-form-label fw-bold">Near
                                                        By</label>
                                                    <input type="text" name="nearBy" id="nearBy" class="form-control border-0 border-bottom shadow-none border-1 border text-dark border-dark bg-transparent ps-0 rounded-0 line-heigth" placeholder="Near By " value="<?= $propAddress->ptadd_near_by ?? '' ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="col-form-label fw-bold">Locality</label>
                                                    <input type="text" name="locality" id="locality" class="form-control border-0 border-bottom shadow-none border-1 border text-dark border-dark bg-transparent ps-0 rounded-0 line-heigth" placeholder="Enter Lcality" value="<?= $propAddress->ptadd_locality ?? '' ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="col-form-label fw-bold">Tower
                                                        Name</label>
                                                    <input type="text" name="towerName" id="towerName" class="form-control border-0 border-bottom shadow-none border-1 border text-dark border-dark bg-transparent ps-0 rounded-0 line-heigth" placeholder="Enter Twer Name" value="<?= $propAddress->ptadd_tower_name ?? '' ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="col-form-label fw-bold">Block</label>
                                                    <input type="text" name="block" id="block" class="form-control border-0 border-bottom shadow-none border-1 border text-dark border-dark bg-transparent ps-0 rounded-0 line-heigth" placeholder="Enter Block" value="<?= $propAddress->ptadd_block ?? '' ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="col-form-label fw-bold">Pocket</label>
                                                    <input type="text" name="pocket" id="pocket" class="form-control border-0 border-bottom shadow-none border-1 border text-dark border-dark bg-transparent ps-0 rounded-0 line-heigth" placeholder="Enter Pocket" value="<?= $propAddress->ptadd_pocket ?? '' ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="col-form-label fw-bold">Township</label>
                                                    <input type="text" name="township" id="township" class="form-control border-0 border-bottom shadow-none border-1 border text-dark border-dark bg-transparent ps-0 rounded-0 line-heigth" placeholder="Enter Township" value="<?= $propAddress->ptadd_township ?? '' ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="col-form-label fw-bold">Society
                                                        Name</label>
                                                    <input type="text" name="societyName" id="societyName" class="form-control border-0 border-bottom shadow-none border-1 border text-dark border-dark bg-transparent ps-0 rounded-0 line-heigth" placeholder="Enter Society" value="<?= $propAddress->ptadd_society_name ?? '' ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="col-form-label fw-bold">Builder
                                                        Name</label>
                                                    <input type="text" name="builderName" id="builderName" class="form-control border-0 border-bottom shadow-none border-1 border text-dark border-dark bg-transparent ps-0 rounded-0 line-heigth" placeholder="Enter Builder" value="<?= $propAddress->ptadd_builder_name ?? '' ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="col-form-label fw-bold">Building</label>
                                                    <input type="text" name="building" id="building" class="form-control border-0 border-bottom shadow-none border-1 border text-dark border-dark bg-transparent ps-0 rounded-0 line-heigth" placeholder="Enter Building" value="<?= $propAddress->ptadd_building ?? '' ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="col-form-label fw-bold">Floor</label>
                                                    <input type="text" name="floor" id="floor" class="form-control border-0 border-bottom shadow-none border-1 border text-dark border-dark bg-transparent ps-0 rounded-0 line-heigth" placeholder="Enter Floor" value="<?= $propAddress->ptadd_floor ?? '' ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="col-form-label fw-bold">Facing</label>
                                                    <input type="text" name="facing" id="facing" class="form-control border-0 border-bottom shadow-none border-1 border text-dark border-dark bg-transparent ps-0 rounded-0 line-heigth" placeholder="Enter Facing" value="<?= $propAddress->ptadd_facing ?? '' ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="col-form-label fw-bold">House/Unit
                                                        No.</label>
                                                    <input type="text" name="houseUnit" id="houseUnit" class="form-control border-0 border-bottom shadow-none border-1 border text-dark border-dark bg-transparent ps-0 rounded-0 line-heigth" placeholder="Enter Unit" value="<?= $propAddress->ptadd_house_unit_no ?? '' ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <h3>Owner Informations</h3>
                                    <section>
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="col-form-label fw-bold">Property
                                                        Owner Name</label>
                                                    <input type="text" name="inputOwner" id="inputOwner" class="form-control border-0 border-bottom shadow-none border-1 border text-dark border-dark bg-transparent ps-0 rounded-0 line-heigth" placeholder="Enter Name" value="<?= $propOwnInfo->poi_prop_owner_name ?? "" ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="col-form-label fw-bold">Owner
                                                        Phone Number</label>
                                                    <input type="text" name="ownerNumber" id="ownerNumber" class="form-control border-0 border-bottom shadow-none border-1 border text-dark border-dark bg-transparent ps-0 rounded-0 line-heigth" placeholder="Enter Number" value="<?= $propOwnInfo->poi_owner_phone_umber ?? "" ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="col-form-label fw-bold">Alternate
                                                        Number</label>
                                                    <input type="text" name="ownerAlternateNumber" id="ownerAlternateNumber" class="form-control border-0 border-bottom shadow-none border-1 border text-dark border-dark bg-transparent ps-0 rounded-0 line-heigth" placeholder="Enter Number" value="<?= $propOwnInfo->poi_alt_number ?? "" ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="col-form-label fw-bold">Owner
                                                        Email Address</label>
                                                    <input type="text" name="ownerEmail" id="ownerEmail" class="form-control border-0 border-bottom shadow-none border-1 border text-dark border-dark bg-transparent ps-0 rounded-0 line-heigth" placeholder="Enter Address" value="<?= $propOwnInfo->poi_owner_email ?? "" ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <h3>Amenities</h3>
                                    <section>
                                        <div class="row g-3">
                                            <div class="col-11 mt-2 text-white">

                                                <div class="bootstrap-duallistbox-container row moveonselect moveondoubleclick m-top">
                                                    <div class="box1 col-md-12 ">
                                                        <select multiple="multiple" id="amenities-list" name="amenities_list[]" class="duallist-box" style="height: 200px;" required>
                                                            <?php
                                                            foreach ($Amenities as $key => $item) : ?>
                                                                <option value="<?= $item['ame_title'] ?>" <?= (in_array($item['ame_title'], $propAmenities)) ? 'selected' : '' ?>>
                                                                    <?= $item['ame_title'] ?></option>
                                                            <?php
                                                            endforeach;
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <h3>
                                        Images and Videos
                                    </h3>
                                    <section>
                                        <div class="row g3">
                                            <div class="col-md-12 mt-3">
                                                <h5 class="fw-bolder red-text ">
                                                    Property Images & Videos :-
                                                </h5>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label fw-bold">Image</label>
                                                <div class="input-group mb-3">
                                                    <input type="file" name="propertyImg[]" multiple accept="image/*" id="propertyImg" class="form-control border-0 border-bottom shadow-none border-1 border text-dark border-dark bg-transparent ps-0 rounded-0 line-heigth" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-outline-secondary" onclick="uploadFiles()" type="button">Upload</button>
                                                    </div>
                                                    <input type="hidden" name="imgpath" id="imgPath" value='<?= json_decode($propInfo->prpt_images_link) ?>'>
                                                </div>
                                            </div>
                                          

                                            <div class="col-md-12 row m-2" id="imgContainer">
                                                <?php $images =  json_decode(json_decode($propInfo->prpt_images_link)) ?? "";
                                                if ($images) :
                                                    foreach ($images as $key => $value) :
                                                ?>
                                                        <div class="col-md-2 image-area m-2">
                                                            <img src="<?= base_url($value) ?>" alt="Property imges" width="150" height="150">
                                                         
                                                            <a class="remove-image delete-propimges" href="#" data-path='<?= $value?>' style="display: inline;">&#215;</a>
                                                        </div>
                                                <?php endforeach;
                                                endif; ?>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label fw-bold">Video URL</label>
                                                <input type="text" placeholder="Video URL" name="propertyVdeo" id="propertyVdeo" class="form-control border-0 border-bottom shadow-none border-1 border text-dark border-dark bg-transparent ps-0 rounded-0 line-heigth" value="<?= $propInfo->prpt_video_link ?>">
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
<?php include __DIR__ . '/../Layout/footer.php'; ?>
</div>
</div>
<?php include __DIR__ . '/../Layout/jsLinks.php'; ?>
<script src="<?= base_url('assets/js/custom/prop-add.js') ?>"></script>

</body>

</html>