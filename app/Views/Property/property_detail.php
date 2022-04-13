<?php
// $propInfo = $pageData['propInfo'] ?? '';
// $propAddress = $pageData['propAddress'][0] ?? '';
// $propArea = (object)$pageData['propArea'] ?? '';
// $propOwnInfo = (object)$pageData['propOwnInfo'] ?? '';
// $propAmenities = json_decode($pageData['propAmenities']['pa_amenities']) ?? '';
// echo '<pre>';
// print_r($basicInfo);

?>

<style>
    th,
    tr {
        border: 1px solid #80808070;
        padding: 5px;
    }

    td {
        text-align: center;
    }
</style>

<div class="body-header border-0 rounded-0 px-xl-4 px-md-2">
    <div class="breadcrumb-sec">
        <div class="container-fluid">
            <div class="row pt-2">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center py-2">
                        <ol class="breadcrumb rounded-0 mb-0 ps-0 bg-transparent flex-grow-1">
                            <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Property Details</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="body mb-2 px-xl-4 px-md-2">
    <div class="container-fluid">
        <div class="row mx-auto">

            <div class="col-md-12 m-auto card mt-3 pt-3">
                <ul class="nav nav-tabs w-100" role="tablist">
                    <li class="nav-item ">
                        <a class="nav-link active fw-bold h6 red-text px-3 py-3  me-2" data-bs-toggle="tab" href="#property">Basic Details</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold h6 red-text px-3 py-3 me-2" data-bs-toggle="tab" href="#location">Location Details</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold h6 red-text px-3 py-3 me-2" data-bs-toggle="tab" href="#owner">Owner
                            Information</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold h6 red-text px-3 py-3 me-2" data-bs-toggle="tab" href="#property-profile">Property Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold h6 red-text px-3 py-3 me-2" data-bs-toggle="tab" href="#pricing">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold h6 red-text px-3 py-3 me-2" data-bs-toggle="tab" href="#ameneties">Amenties</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold h6 red-text px-3 py-3 me-2" data-bs-toggle="tab" href="#history">History</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div id="property" class="container tab-pane my-3 w-75 active"><br>
                        <h3 class="red-text fw-bold underline">
                            <i class="fa fa-info-circle me-2"></i></i>Basic Details
                        </h3>

                        <!-- Images -->
                        <div class="row">

                            <div class="col-12 mt-4">
                                <h5 class="red-text text-center fw-bold">Property Images</h5>
                                <div class="owl-carousel owl-theme" id="OwlBasicAutoplay">
                                    <?php if ($propImages) :
                                        $images = !empty($propImages['imges_url']) ? json_decode(json_decode($propImages['imges_url'])) : false;
                                        if ($images) : foreach ($images as $key => $value) :
                                                echo  '<div class="item"><img class="img-fluid img-thumbnail" src="' . base_url($value) . '" alt="">
                                            </div>';
                                            endforeach;
                                        endif;
                                    else :
                                    ?>
                                        <div class="item"><img class="img-fluid img-thumbnail" src="<?= base_url(); ?>/assets/img/property4.jfif" alt="">
                                        </div>

                                        <div class="itm">
                                            <video width="250" height="200" class="img-fluid" controls>
                                                <source src="<?= base_url(); ?>/assets/img/video.mp4 " type="video/mp4">
                                            </video>
                                        </div>
                                        <div class="item"><img class="img-fluid img-thumbnail" src="<?= base_url(); ?>/assets/img/property3.jpg" alt="">
                                        </div>
                                        <div class="item"><img class="img-fluid img-thumbnail" src="<?= base_url(); ?>/assets/img/property4.jfif" alt="">
                                        </div>
                                        <div class="item"><img class="img-fluid img-thumbnail" src="<?= base_url(); ?>/assets/img/property1.jpeg" alt="">
                                        </div>
                                        <div class="item"><img class="img-fluid img-thumbnail" src="<?= base_url(); ?>/assets/img/property4.jfif" alt="">
                                        </div>
                                        <div class="item"><img class="img-fluid img-thumbnail" src="<?= base_url(); ?>/assets/img/property3.jpg" alt="">
                                        </div>
                                        <div class="item"><img class="img-fluid img-thumbnail" src="<?= base_url(); ?>/assets/img/property1.jpeg" alt="">
                                        </div>
                                        <div class="item"><img class="img-fluid img-thumbnail" src="<?= base_url(); ?>/assets/img/property4.jfif" alt="">
                                        </div>
                                        <div class="item"><img class="img-fluid img-thumbnail" src="<?= base_url(); ?>/assets/img/property1.jpeg" alt="">
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <div class="mt-2">
                            <p class="red-text m-0 fw-bold fs-5 text-center">For <?= $basicInfo->lookingfor_title ?? "" ?></p>
                            <p class=" m-0 fw-bold h6 ">
                                <i class="fa fa-check-circle me-2"></i>Kind of Property
                            </p>
                        </div>

                        <?php if ($basicInfo->property_type == 1) : ?>
                            <table class="font-md my-4 w-100" cellpadding=7>
                                <tbody>
                                    <tr class="text-center">
                                        <th colspan=2 class="h6 fw-bold"><?= $basicInfo->property_type_title ?? "" ?></th>
                                    </tr>
                                    <tr>
                                        <th class="text-center"><?= $basicInfo->propertySubType ?? "" ?></th>
                                        <td class="text-center"><?= $basicInfo->property_title ?? "" ?></td>

                                    </tr>
                                </tbody>
                            </table>
                        <?php elseif ($basicInfo->property_type == 2) : ?>
                            <table class="font-md my-4 w-100" cellpadding=5>
                                <tbody>
                                    <tr class="text-center">
                                        <th colspan=3 class="h6 fw-bold">Commercial</th>

                                    </tr>

                                    <tr>
                                        <?php $commercialData = json_decode($basicInfo->question_data); ?>
                                        <th class="text-center"><?= $basicInfo->propertySubType ?></th>

                                        <td>
                                            <p class="fw-bold m-0"><?= getQuestionTitle($commercialData->questionId) ?></p>
                                            <p class=" m-0 ps-4 ml-2"><?= $commercialData->questionValue ?></p>
                                            <p class="fw-bold m-0 ps-4 "><?= getQuestionTitle($commercialData->questionlocatedId) ?></p>
                                            <p class=" m-0 ps-4 ml-5"><?= $commercialData->questionlocatedValue ?></p>



                                            <div class="ps-5 ">
                                                <!-- <p class="m-0"> <i class="fa fa-check-square-o me-2"></i>Ready to move office space</p> -->
                                                <!-- <p class="m-0"> <i class="fa fa-check-square-o me-2"></i>Ready to move office space</p> -->
                                                <!-- <span>Bare shell office space</span>  -->
                                            </div>
                                        </td>


                                    </tr>
                                    <!--  -->

                                </tbody>
                            </table>
                        <?php endif; ?>
                    </div>

                    <div id="location" class="container tab-pane my-3 w-75 "><br>
                        <h3 class="red-text fw-bold underline">
                            <i class="fa fa-location-arrow me-2"></i>Location Details
                        </h3>

                        <table class="font-md my-4 w-100" cellpadding=10>
                            <tbody>
                                <tr>
                                    <th colspan="4">
                                        <p class="red-text m-0 fw-bold fs-5 text-center">
                                            Location
                                        </p>
                                    </th>
                                </tr>

                                <tr>
                                    <th>City</th>
                                    <td><?= $locationDetails->ct_title ?? "" ?></td>
                                    <th>Apartment/Society</th>
                                    <td><?= $locationDetails->ap_title ?? "" ?></td>
                                </tr>
                                <tr>
                                    <th>Project</th>
                                    <td><?= $locationDetails->project_title ?? "" ?></td>
                                    <th>House Number</th>
                                    <td><?= $locationDetails->house_number ?? "" ?></td>
                                </tr>
                                <tr>
                                    <th>Locality</th>
                                    <td><?= $locationDetails->locality_title ?? "" ?></td>
                                    <th>Sub Locality</th>
                                    <td><?= $locationDetails->sublocality_title ?? "" ?></td>
                                </tr>
                                <tr>
                                    <th>Located Inside</th>
                                    <td><?= $locationDetails->located_inside_title ?? "" ?></td>
                                    <th>Zone Type</th>
                                    <td><?= $locationDetails->zone_title ?? "" ?></td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td colspan="3"><?= $locationDetails->address ?? "" ?></td>


                                </tr>

                            </tbody>
                        </table>
                    </div>

                    <div id="owner" class="container w-75 tab-pane fade"><br>
                        <h3 class="red-text fw-bold underline">
                            <i class="bi bi-person-circle me-2"></i>Owner Information
                        </h3>


                        <form class="row gy-2 my-4">

                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold m-0">
                                        <i class="bi  fw-bolder red-text me-1"></i>Owner
                                        Name</label>

                                    <p class="ps-4"><?= $ownerInfo['name'] ?? "" ?></p>
                                </div>

                            </div>

                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold m-0">
                                        <i class="bi  fw-bolder red-text me-1"></i>Phone
                                        Number</label>
                                    <p class="ps-4"><?= $ownerInfo['phone_number'] ?? "" ?></p>
                                </div>

                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold m-0">
                                        <i class="bi  fw-bolder red-text me-1"></i>Alternate Phone
                                        Number</label>
                                    <p class="ps-4"><?= $ownerInfo['alt_number'] ?? "" ?></p>
                                </div>

                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold m-0">
                                        <i class="bi  fw-bolder red-text me-1"></i>Email
                                        Address</label>
                                    <p class="ps-4"><?= $ownerInfo['email'] ?? "" ?></p>
                                </div>

                            </div>

                        </form>
                    </div>

                    <div id="property-profile" class="container w-75 tab-pane fade"><br>
                        <h3 class="red-text fw-bold underline">
                            <i class="bi bi-house-fill me-2 "></i>Property Details
                        </h3>

                        <div class="row gy-2 my-4">


                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label fw-bold m-0">
                                        <i class="bi bi-check-circle fw-bolder red-text me-1"></i>Apartment Type</label>
                                    <div class="pt-2">
                                        <span class="ps-4"><?= $propPropfile['appartment_is'] ?? "" ?></span>

                                    </div>
                                </div>

                            </div>


                            <div class="col-md-12 mt-3">
                                <h6 class="red-text fw-bold">Room Details</h6>
                            </div>
                            <?php if (!empty($propPropfile['no_of_bedroom'])) : ?>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold m-0">
                                            <i class="bi bi-check-circle fw-bolder red-text me-1"></i>Bedrooms: <span class="ps-4"><?= $propPropfile['no_of_bedroom'] ?? "" ?></span></label>
                                    </div>

                                </div>
                            <?php endif; ?>
                            <?php if (!empty($propPropfile['no_of_bathroom'])) : ?>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold m-0">
                                            <i class="bi bi-check-circle fw-bolder red-text me-1"></i>Bathrooms: <span class="ps-4"><?= $propPropfile['no_of_bathroom'] ?? "" ?></span></label>

                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($propPropfile['no_of_balconies'])) : ?>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold m-0">
                                            <i class="bi bi-check-circle fw-bolder red-text me-1"></i>Balconies: <span class="ps-4"><?= $propPropfile['no_of_balconies'] ?? "" ?></span></label>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php
                            if (!empty($propPropfile['no_of_diningrooms'])) : ?>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold m-0">
                                            <i class="bi bi-check-circle fw-bolder red-text me-1"></i>Balconies: <span class="ps-4"><?= $propPropfile['no_of_diningrooms'] ?? "" ?></span></label>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="col-md-12 mt-3">
                                <h6 class="red-text fw-bold">Area Details</h6>
                            </div>

                            <?php if (!empty($propPropfile['carpet_area'])) : ?>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold m-0">
                                            <i class="bi bi-check-circle fw-bolder red-text me-1"></i>Carpet Area: <span class="ps-4"><?= $propPropfile['carpet_area']  ?? "" ?> <?= getUnitTitle($propPropfile['carpet_area_unit']) ?></span></label>

                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php if (!empty($propPropfile['build_up_area'])) : ?>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold m-0">
                                            <i class="bi bi-check-circle fw-bolder red-text me-1"></i>Build-up Area: <span class="ps-4"><?= $propPropfile['build_up_area']  ?? "" ?> <?= getUnitTitle($propPropfile['build_up_area_unit']) ?></span></label>

                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php if (!empty($propPropfile['super_build_up_area'])) : ?>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold m-0">
                                            <i class="bi bi-check-circle fw-bolder red-text me-1"></i>Super build-up Area: <span class="ps-4"><?= $propPropfile['super_build_up_area']  ?? "" ?> <?= getUnitTitle($propPropfile['super_build_up_area_unit']) ?></span></label>

                                    </div>
                                </div>
                            <?php endif; ?>


                            <div class="col-md-12">
                                <h6 class="red-text fw-bold">Shop facade size</h6>
                            </div>
                            <?php if (!empty($propPropfile['shop_facade_size'])) : ?>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold m-0">
                                            <i class="bi bi-check-circle fw-bolder red-text me-1"></i>Carpet Area: <span class="ps-4"><?= $propPropfile['shop_facade_size'] ?? "" ?><?= getUnitTitle($propPropfile['shop_facade_size_unit']) ?? "" ?></span></label>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($propPropfile['other_rooms'])) : ?>
                                <div class="col-6">
                                    <h6 class="red-text fw-bold">Other Rooms</h6>
                                    <div class="mb-3">
                                        <?php $otherRooms = json_decode(json_decode($propPropfile['other_rooms'])) ?? ""; ?>
                                        <ul>
                                            <?php foreach ($otherRooms as $key => $value) : ?>
                                                <li><?= $value ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="col-6">
                                <h6 class="red-text fw-bold">Reserved Parking</h6>
                                <div class="mb-3">
                                    <ul>
                                        <li>Cover Parking <span class="fw-bold"><?= $propPropfile['cover_parking'] ?? "" ?></span> </li>
                                        <li>Open Parking <span class="fw-bold"><?= $propPropfile['open_parking'] ?? "" ?></span></li>
                                    </ul>
                                </div>
                            </div>

                            <?php if (!empty($propPropfile['furnishing'])) : ?>
                                <div class="col-md-12 mt-3">
                                    <h6 class="red-text fw-bold"> Furnishing -(<?= ucfirst($propPropfile['furnishing']) ?>)</h6>
                                    <?php
                                    if ($propPropfile['furnishing'] != "unfurnished") :
                                        $furninshItem = json_decode($propPropfile['furnishing_app']); ?>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <?= $furninshItem->furnishing_light ? '<p><span class="fw-bold pe-2">' . $furninshItem->furnishing_light . '</span>Light</p>' : '' ?>
                                            </div>
                                            <div class="col-md-3">
                                            <?= $furninshItem->furnishing_fan ? '<p><span class="fw-bold pe-2">' . $furninshItem->furnishing_fan . '</span>Fans</p>' : '' ?>
                                               
                                            </div>
                                            <div class="col-md-3">
                                                       <?= $furninshItem->furnishing_ac ? '<p><span class="fw-bold pe-2">' . $furninshItem->furnishing_ac . '</span>AC</p>' : '' ?>
                                    
                                            </div>
                                            <div class="col-md-3">
                                            <?= $furninshItem->furnishing_tv ? '<p><span class="fw-bold pe-2">' . $furninshItem->furnishing_tv . '</span>TV</p>' : '' ?>
                                                
                                            </div>
                                            <div class="col-md-3">
                                            <?= $furninshItem->furnishing_bed ? '<p><span class="fw-bold pe-2">' . $furninshItem->furnishing_bed . '</span>Beds</p>' : '' ?>
                                               
                                            </div>
                                            <div class="col-md-3">
                                            <?= $furninshItem->furnishing_wardrobe ? '<p><span class="fw-bold pe-2">' . $furninshItem->furnishing_wardrobe . '</span>Wardrobe</p>' : '' ?>
                                                
                                            </div>
                                            <div class="col-md-3">
                                            <?= $furninshItem->furnishing_geyser ? '<p><span class="fw-bold pe-2">' . $furninshItem->furnishing_geyser . '</span>Geyser</p>' : '' ?>
                                         
                                            </div>
                                            <?= $furninshItem->furnishing_w_machine ? '<div class="col-md-3"><p>Sofa</p></div>' : "" ?>
                                            <?= $furninshItem->furnishing_w_machine ? '<div class="col-md-3"><p>Washing Machine</p></div>' : "" ?>
                                            <?= $furninshItem->furnishing_stove ? '<div class="col-md-3"><p>Stove</p></div>' : "" ?>
                                            <?= $furninshItem->furnishing_microwave ? '<div class="col-md-3"><p>Fidge</p></div>' : "" ?>
                                            <?= $furninshItem->furnishing_w_machine ? '<div class="col-md-3"><p>Water Purifier</p></div>' : "" ?>
                                            <?= $furninshItem->furnishing_microwave ? '<div class="col-md-3"><p>Microwave</p></div>' : "" ?>
                                            <?= $furninshItem->furnishing_kitchen ? '<div class="col-md-3"><p>Modular Kitechen</p></div>' : "" ?>
                                            <?= $furninshItem->furnishing_chimney ? '<div class="col-md-3"><p>Chimney</p></div>' : "" ?>
                                            <?= $furninshItem->furnishing_table ? '<div class="col-md-3"><p>Dinning Table</p></div>' : "" ?>
                                            <?= $furninshItem->furnishing_curtains ? '<div class="col-md-3"><p>Curtains</p></div>' : "" ?>
                                            <?= $furninshItem->furnishing_exh_fan ? '<div class="col-md-3"><p>Exhaust Fan</p></div>' : "" ?>

                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>

                            <div class="col-md-12 mt-3">
                                <h6 class="red-text fw-bold">Availability Status</h6>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">

                                    <ul>
                                        <?= $propPropfile['availability_status'] == 'readytomove' ? '<li>Ready to move</li>' : "" ?>
                                        <?= $propPropfile['availability_status'] == 'underConstruction' ? '<li> Under construction</li>' : "" ?>
                                    </ul>
                                </div>
                            </div>

                            <?php if ($propPropfile['availability_status'] == 'readytomove') : ?>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h6 class="red-text fw-bold">Age of Property</h6>
                                            <div class="mb-3">
                                                <ul>
                                                    <li><?= $propPropfile['property_age'] ?? "" ?></li>
                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            <?php else : ?>
                                <div class="row">
                                    <div class="col-md-8">
                                        <h6 class="red-text fw-bold">Possession by</h6>
                                        <div class="mb-3">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <p> <?= getPossessionTitle($propPropfile['possession_year']) ?? "" ?> <?= '|' . getPossessionTitle($propPropfile['possession_month']) ?? "" ?></p>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div id="ameneties" class="container w-75 tab-pane fade"><br>
                        <h3 class="red-text fw-bold underline">
                            <i class="bi bi-basket3-fill me-2"></i>Ameneties
                        </h3>
                        <?php
                        $amenities = ($propOtherFeatures['amenities'] != '') ? json_decode($propOtherFeatures['amenities']) : "";
                        $propertyFeatures = ($propOtherFeatures['property_features'] != '') ? json_decode($propOtherFeatures['property_features']) : "";
                        $socBuildingFeatures = ($propOtherFeatures['soc_building_features'] != '') ? json_decode($propOtherFeatures['soc_building_features']) : "";
                        $additionalFeatures = ($propOtherFeatures['additional_features'] != '') ? json_decode($propOtherFeatures['additional_features']) : "";
                        $waterSource = ($propOtherFeatures['water_source'] != '') ? json_decode($propOtherFeatures['water_source']) : "";
                        $overlooking = ($propOtherFeatures['overlooking'] != '') ? json_decode($propOtherFeatures['overlooking']) : "";
                        $otherFeatures = ($propOtherFeatures['other_features'] != '') ? json_decode($propOtherFeatures['other_features']) : "";
                        $locationAdv = ($propOtherFeatures['location_adv'] != '') ? json_decode($propOtherFeatures['location_adv']) : "";
                        ?>
                        <table class="w-100 my-4">
                            <thead>
                                <tr class="text-center">
                                    <th>Ammeneties</th>
                                    <th>Property Features</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>

                                        <?php if ($amenities) : ?>
                                            <ul class="list-unstyled py-2 m-auto" style="width:205px">
                                                <?php foreach ($amenities as $key => $value) : ?>
                                                    <li><i class="bi bi-check-circle fw-bolder red-text me-1"></i><?= ucfirst($value) ?></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if ($propertyFeatures) : ?>
                                            <ul class="list-unstyled py-2 m-auto" style="width:205px">
                                                <?php foreach ($propertyFeatures as $key => $value) : ?>
                                                    <li><i class="bi bi-check-circle fw-bolder red-text me-1"></i><?= ucfirst($value) ?></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr class="text-center">
                                    <th>Society/ Building Features</th>
                                    <th>Additional Features</th>
                                </tr>

                                <tr>
                                    <td>
                                        <?php if ($socBuildingFeatures) : ?>
                                            <ul class="list-unstyled py-2 m-auto" style="width:205px">
                                                <?php foreach ($socBuildingFeatures as $key => $value) : ?>
                                                    <li><i class="bi bi-check-circle fw-bolder red-text me-1"></i><?= ucfirst($value) ?></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        <?php endif; ?>
                                    </td>

                                    <td>
                                        <?php if ($additionalFeatures) : ?>
                                            <ul class="list-unstyled py-2 m-auto" style="width:205px">
                                                <?php foreach ($additionalFeatures as $key => $value) : ?>
                                                    <li><i class="bi bi-check-circle fw-bolder red-text me-1"></i><?= ucfirst($value) ?></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr class="text-center">
                                    <th>Water Source</th>
                                    <th>Overlooking</th>
                                </tr>

                                <tr>
                                    <td>
                                        <?php if ($waterSource) : ?>
                                            <ul class="list-unstyled py-2 m-auto" style="width:205px">
                                                <?php foreach ($waterSource as $key => $value) : ?>
                                                    <li><i class="bi bi-check-circle fw-bolder red-text me-1"></i><?= ucfirst($value) ?></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        <?php endif; ?>
                                    </td>

                                    <td>
                                        <?php if ($overlooking) : ?>
                                            <ul class="list-unstyled py-2 m-auto" style="width:205px">
                                                <?php foreach ($overlooking as $key => $value) : ?>
                                                    <li><i class="bi bi-check-circle fw-bolder red-text me-1"></i><?= ucfirst($value) ?></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        <?php endif; ?>
                                    </td>
                                </tr>

                                <tr class="text-center">
                                    <th>Other Features</th>
                                    <th>Property Facing</th>
                                </tr>
                                <tr>
                                    <td>
                                        <?php if ($otherFeatures) : ?>
                                            <ul class="list-unstyled py-2 m-auto" style="width:205px">
                                                <?php foreach ($otherFeatures as $key => $value) : ?>
                                                    <li><i class="bi bi-check-circle fw-bolder red-text me-1"></i><?= ucfirst($value) ?></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        <?php endif; ?>
                                    </td>

                                    <td>
                                        <ul class="list-unstyled py-2 m-auto" style="width:205px">
                                            <li><i class="bi bi-check-circle fw-bolder red-text me-1"></i><?= $propOtherFeatures['property_facing'] ?? "" ?></li>

                                        </ul>
                                    </td>
                                </tr>

                                <tr class="text-center">
                                    <th>Type of Flooring</th>
                                    <th>Lacation Advantage</th>
                                </tr>
                                <tr>
                                    <td>

                                        <ul class="list-unstyled py-2 m-auto" style="width:205px">
                                            <?= $propOtherFeatures['type_of_flooring_title'] ? '<li><i class="bi bi-check-circle fw-bolder red-text me-1"></i>' . $propOtherFeatures['type_of_flooring_title'] . '</li>' : "" ?>
                                        </ul>
                                    </td>

                                    <td>
                                        <?php if ($locationAdv) : ?>
                                            <ul class="list-unstyled py-2 m-auto" style="width:205px">
                                                <?php foreach ($locationAdv as $key => $value) : ?>
                                                    <li><i class="bi bi-check-circle fw-bolder red-text me-1"></i><?= ucfirst($value) ?></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        <?php endif; ?>
                                    </td>
                                </tr>

                                <tr class="text-center">
                                    <th>Width of Facing</th>

                                    <th>USP's/ Expected Price</th>
                                </tr>

                                <tr>
                                    <td>
                                        <ul class="list-unstyled py-2 m-auto" style="width:205px">
                                            <li><i class="bi bi-check-circle fw-bolder red-text me-1"></i><?= $propOtherFeatures['w_facing_road'] ?? "" ?> <?= $propOtherFeatures['w_facing_road_unit'] ?? "" ?></li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="list-unstyled py-3 m-auto" style="width:205px">
                                            <li><i class="bi bi-check-circle fw-bolder red-text me-1"></i><?= $propOtherFeatures['ups'] ?? "" ?></li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr class="text-center">
                                    <th>Power Back-up</th>
                                </tr>
                                <tr>
                                    <td>
                                        <ul class="list-unstyled py-3 m-auto" style="width:205px">
                                            <?= $propOtherFeatures['power_back_up'] ? '<li><i class="bi bi-check-circle fw-bolder red-text me-1"></i>' . $propOtherFeatures['power_back_up'] . '</li>' : "" ?>

                                        </ul>
                                    </td>
                                </tr>

                            </tbody>
                        </table>

                    </div>

                    <div id="pricing" class="container w-75 tab-pane fade"><br>
                        <h3 class="red-text fw-bold underline">
                            <i class="fa fa-money me-2"></i>Pricing Details
                        </h3>
                        <div class="row gy-2 my-4">

                            <div class="col-12">
                                <div class="mb-3 ps-2">
                                    <label class="form-label fw-bold m-0">
                                        <i class="bi bi-check-circle fw-bolder red-text me-1"></i>Ownership</label>
                                    <p class="ps-4"><?= $priceing['ownership'] ?? "" ?></p>
                                </div>

                            </div>

                            <div class="row mt-3 ps-4">
                                <div class="col-12">
                                    <h6 class="red-text fw-bold">Expected Price</h6>
                                </div>
                                <div class="col-3">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold m-0">
                                            <i class="bi bi-check-circle fw-bolder red-text me-1"></i>Expected Price</label>
                                        <p class="ps-4"><?= number_to_amount($priceing['price']) ?? "" ?></p>
                                    </div>

                                </div>
                                <div class="col-3">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold m-0">
                                            <i class="bi bi-check-circle fw-bolder red-text me-1"></i>Price per Sq.ft.</label>
                                        <p class="ps-4"><?= number_to_amount($priceing['price_pr_sqft']) ?? "" ?></p>
                                    </div>

                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <ul>
                                            <?= $priceing['all_Inclusive_price'] ? '<li>All Inclusive Price</li>' : "" ?>
                                            <?= $priceing['govt_charges_excluded'] ? '<li>Tax the Govt. chages excluded</li>' : "" ?>
                                            <?= $priceing['price_negotiable'] ? '<li>Price Negotiable</li>' : "" ?>
                                        </ul>
                                    </div>

                                </div>
                            </div>

                            <div class="row ps-4">
                                <div class="col-12">
                                    <h6 class="red-text fw-bold">Additional Pricing Details </h6>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold m-0">
                                            <i class="bi bi-check-circle fw-bolder red-text me-1"></i>Maintenance</label>
                                        <p class="ps-4"><?= number_to_amount($priceing['maintenance']) ?? "" ?></p>
                                    </div>

                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold m-0">
                                            <i class="bi bi-check-circle fw-bolder red-text me-1"></i>Month</label>

                                        <p class="ps-4"><?= $priceing['maintenance_tenyour'] ?? "" ?></p>
                                    </div>

                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold m-0">
                                            <i class="bi bi-check-circle fw-bolder red-text me-1"></i>Expected Rental</label>

                                        <p class="ps-4"><?= number_to_amount($priceing['expected_rental']) ?? "" ?></p>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold m-0">
                                            <i class="bi bi-check-circle fw-bolder red-text me-1"></i>Booking Amount</label>

                                        <p class="ps-4"><?= number_to_amount($priceing['booking_amount']) ?? "" ?></p>
                                    </div>

                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold m-0">
                                            <i class="bi bi-check-circle fw-bolder red-text me-1"></i>Annual dues payable</label>
                                        <p class="ps-4"><?= number_to_amount($priceing['annual_dues_payable']) ?? "" ?></p>
                                    </div>

                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold m-0">
                                            <i class="bi bi-check-circle fw-bolder red-text me-1"></i>Membership Charge</label>
                                        <p class="ps-4"><?= number_to_amount($priceing['membership_charge']) ?? "" ?></p>
                                    </div>

                                </div>
                            </div>

                            <div class="row p-4">
                                <div class="col-12">
                                    <h6 class="red-text fw-bold">Pre-leased/ Pre-Rented</h6>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold m-0 me-2">
                                            <i class="bi bi-check-circle fw-bolder red-text me-1"></i><?= $priceing['is_pre_leased_or_rent'] ? 'Yes' : 'No' ?>
                                        </label>


                                    </div>
                                </div>
                                <?php if ($priceing['is_pre_leased_or_rent']) : ?>
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label class="form-label fw-bold m-0">
                                                <i class="bi bi-check-circle fw-bolder red-text me-1"></i>Current rent per month</label>
                                            <p class="ps-4"><?= number_to_amount($priceing['current_rent_pr_month']) ?? "" ?></p>
                                        </div>

                                    </div>
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label class="form-label fw-bold m-0">
                                                <i class="bi bi-check-circle fw-bolder red-text me-1"></i>Lease tenure in years</label>
                                            <p class="ps-4"><?= number_to_amount($priceing['less_tiy']) ?? "" ?></p>
                                        </div>

                                    </div>
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label class="form-label fw-bold m-0">
                                                <i class="bi bi-check-circle fw-bolder red-text me-1"></i>Annual Rent Increment in (%)</label>
                                            <p class="ps-4"><?= $priceing['a_r_i_percent'] ?? "" ?></p>
                                        </div>

                                    </div>
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label class="form-label fw-bold m-0">
                                                <i class="bi bi-check-circle fw-bolder red-text me-1"></i>Leased to business type</label>
                                            <p class="ps-4"><?= $priceing['lease_tobusiness_type'] ?? "" ?></p>
                                        </div>

                                    </div>
                                <?php endif; ?>
                            </div>


                            <div class="col-6 ps-4 m-0">
                                <h6 class="red-text fw-bold">Is your office fire NOC certified</h6>
                                <div class="mb-3">
                                    <label class="form-label fw-bold m-0 me-2">
                                        <i class="bi bi-check-circle fw-bolder red-text me-1"></i><?= $priceing['fire_noc_certified'] ? 'Yes' : 'No' ?></label>


                                </div>
                            </div>

                            <div class="col-6 ps-4 m-0">
                                <h6 class="red-text fw-bold">Occupancy Certificate</h6>
                                <div class="mb-3">
                                    <label class="form-label fw-bold m-0 me-2">
                                        <i class="bi bi-check-circle fw-bolder red-text me-1"></i><?= $priceing['occupancy_certificate'] ? 'Yes' : 'No' ?></label>
                                </div>
                            </div>

                            <?php
                            if ($priceing['office_pre_used']) :
                                $offused = json_decode(json_decode($priceing['office_pre_used']));
                                if (!empty($offused)) : ?>
                                    <div class="row mt-3">
                                        <div class="col-md-12">
                                            <h6 class="ps-3 red-text fw-bold">Your property was previously used for</h6>
                                        </div>

                                        <div class="col-md-4">

                                            <ul>
                                                <?php foreach ($offused as $key => $value) : ?>
                                                    <li><?= ucfirst($value) ?></li>
                                                <?php endforeach; ?>
                                            </ul>

                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>


                            <div class="col-12 mt-3">
                                <h6 class="ps-3 red-text fw-bold">Property Description</h6>
                                <div class="mb-3 ms-3">
                                    <p><?= !empty($priceing['desciption']) ? $priceing['desciption'] : "Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum quas amet illum, sit neque nostrum dicta ullam autem. Aliquam nostrum fuga ex vero, eligendi ipsa sequi. Nam id cupiditate possimus." ?></p>

                                </div>
                            </div>


                        </div>
                    </div>

                    <div id="history" class="container w-75 tab-pane fade"><br>
                        <h3 class="red-text fw-bold underline">
                            <i class="bi bi-hourglass-top me-2"></i>Property History
                        </h3>
                        <div class="col-md-11 m-auto bg-white py-4 px-4">


                            <!-- <div class="col-12"> -->
                            <div class="timeline-item ti-danger border-bottom ms-2">
                                <div class="d-flex">
                                    <img class="avatar sm rounded" src="<?= base_url(); ?>/assets/img/avatar1.jpg" alt="">
                                    <div class="flex-fill ms-3">
                                        <div class="mb-1"> <strong>Gerald Vaughn </strong> changed the
                                            status of Property on <strong>Date:- 02/01/2021 - Property
                                                No. 12</strong></div>
                                        <span class="d-flex text-muted mb-3">New address of Property -
                                            9:24PM by <a class="ms-2" href="#" title=""><strong>You</strong></a> </span>

                                    </div>
                                </div>
                            </div> <!-- timeline item end  -->
                            <div class="timeline-item ti-info border-bottom ms-2">
                                <div class="d-flex">
                                    <img class="avatar sm rounded" src="<?= base_url(); ?>/assets/img/avatar2.jpg" alt="">
                                    <div class="flex-fill ms-3">
                                        <div class="mb-1"><strong>Gerald Vaughn </strong>changed the
                                            status of Property on<strong> Date:- 02/01/2021 - Property
                                                No. 12</strong></div>
                                        <span class="d-flex text-muted mb-3">New address of Property -
                                            9:24PM by <a class="ms-2" href="#" title=""><strong>You</strong></a> </span>

                                    </div>
                                </div>
                            </div> <!-- timeline item end  -->
                            <div class="timeline-item ti-success border-bottom ms-2">
                                <div class="d-flex">
                                    <img class="avatar sm rounded" src="<?= base_url(); ?>/assets/img/avatar1.jpg" alt="">
                                    <div class="flex-fill ms-3">
                                        <div class="mb-1"><strong>Gerald Vaughn </strong>changed the
                                            status of Property on <strong>Date:- 02/01/2021 - Property
                                                No. 12</strong></div>
                                        <span class="d-flex text-muted mb-3">New address of Property -
                                            9:24PM by <a class="ms-2" href="#" title=""><strong>You</strong></a> </span>

                                    </div>
                                </div>
                            </div> <!-- timeline item end  -->
                            <div class="timeline-item ti-primary border-bottom ms-2">
                                <div class="d-flex">
                                    <img class="avatar sm rounded" src="<?= base_url(); ?>/assets/img/avatar2.jpg" alt="">
                                    <div class="flex-fill ms-3">
                                        <div class="mb-1"><strong>Gerald Vaughn </strong>changed the
                                            status of Property on <strong>Date:- 02/01/2021 - Property
                                                No. 12</strong></div>
                                        <span class="d-flex text-muted mb-3">New address of Property -
                                            9:24PM by <a class="ms-2" href="#" title=""><strong>Other</strong></a> </span>

                                    </div>
                                </div>
                            </div> <!-- timeline item end  -->
                            <div class="timeline-item ti-warning border-bottom ms-2">
                                <div class="d-flex">
                                    <img class="avatar sm rounded" src="<?= base_url(); ?>/assets/img/avatar1.jpg" alt="">
                                    <div class="flex-fill ms-3">
                                        <div class="mb-1">Gerald Vaughn changed the status of Property
                                            <strong>on Date:- 02/01/2021 - Property No. 12</strong>
                                        </div>
                                        <span class="d-flex text-muted mb-3">New address of Property -
                                            9:24PM by <a class="ms-2" href="#" title=""><strong>You</strong></a> </span>
                                    </div>
                                </div>
                            </div> <!-- timeline item end  -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var owl = $('#OwlBasicAutoplay');
    owl.owlCarousel({
        items: 4,
        loop: true,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 1000,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 5
            }
        }
    });
</script>


<!-- $routes->group("users", ["filter" => "authFilter"], function($routes){
    $routes->get('get-all-users', 'ClientsController::getAllUsers');
    $routes->post('change-status', 'PartnersController::changestatus');
}); -->