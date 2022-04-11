<style>
    .wizard>.content {
        min-height: 2em !important;
    }

    section {
        min-height: 0 !important;
        height: auto !important;
    }
</style>


<div class="body-header rounded-0 px-xl-4 px-md-2">
    <div class="breadcrumb-sec">
        <div class="container-fluid">
            <div class="row pt-2">
                <div class="col-12 m-auto">
                    <div class="d-flex justify-content-between align-items-center py-2">
                        <ol class="breadcrumb rounded-0 mb-0 ps-0 bg-transparent flex-grow-1">
                            <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Properties</li>
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
            <div class="col-md-12 m-auto p-0">
                <div class="card">
                    <div class="card-body">
                        <form id="add-property" action="#">
                            <div class="step-app">
                                <h3>Basic Details</h3>
                                <section>
                                    <div class="row gx-4">
                                        <div class="col-md-12">
                                            <h3 class="fw-bolder red-text h3">
                                                Fill out Basic Details
                                            </h3>
                                        </div>
                                        <div class="col-md-12 col-12 ">
                                            <label class="col-form-label fw-bold">I'm looking to</label>
                                            <div class="col-md-7">
                                                <ul class="pb-4 d-flex li-space pt-2">
                                                    <?php if (!empty($lookingfor)) : ?>
                                                        <?php foreach ($lookingfor as $key => $value) :
                                                            $cssClass = (strtolower($value['title']) == 'pg') ? 'hide-pg-section disabled-commercial' : 'enabled-commercial';
                                                            $jsValue = (strtolower($value['title']) == 'rent/lease') ? 'rent' : strtolower($value['title']);
                                                        ?>
                                                            <li> <label class="radio">
                                                                    <input type="radio" name="lookingFor" value="<?= $jsValue  ?>" checked id="lookingFor<?= $value['id'] ?>" class="<?= $cssClass ?> lookingfor" required>
                                                                    <span><?= ucfirst($value['title']) ?></span> </label>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </ul>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-md-7 mt-4">
                                            <h6 class="fw-bold">What Kind of property do you have?</h6>
                                            <div class="row">
                                                <?php if (!empty($propertyType)) : ?>
                                                    <?php foreach ($propertyType as $key => $value) :

                                                        // print_r($propertyType);
                                                        $cssClass = (strtolower($value['cat_title']) == 'residential') ? 'form-check-input cursor hide-question1 hide-question2' : 'form-check-input cursor not-allowed hide-class';
                                                        $checked = (strtolower($value['cat_title']) == 'residential') ? 'checked' : '';
                                                    ?>
                                                        <div class="col-md-3">
                                                            <div class="form-check ">
                                                                <input type="radio" class="<?= $cssClass ?> propertyType" name="propertyType" value="<?= strtolower($value['cat_title']) ?>" id="<?= strtolower($value['cat_title']) ?>" <?= $checked ?>>
                                                                <label class="form-check-label cursor" for="<?= strtolower($value['cat_title']) ?>" required><?= ucfirst($value['cat_title']) ?></label>
                                                            </div>
                                                        </div>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-7">
                                            <ul class="mt-4 d-flex li-space">
                                                <?php if (!empty($SubPropertyType)) : ?>
                                                    <?php foreach ($SubPropertyType as $key => $value) :

                                                        $class = (strtolower($value->cat_title) == 'commercial') ? 'd-none' : "";
                                                    ?>
                                                        <li class="<?= $class ?>">
                                                            <label class="radio">
                                                                <input type="radio" class="<?= strtolower($value->class)  ?> sub-property-type" name="<?= strtolower($value->cat_title) ?>" value="<?= strtolower($value->value) ?>" data-for="<?= $value->data_for ?>">
                                                                <span><?= ucfirst($value->title) ?></span>
                                                            </label>
                                                        </li>
                                                <?php endforeach;
                                                endif; ?>

                                            </ul>
                                        </div>
                                        <div class="row mt-4 ">
                                            <div class="col-md-7">
                                                <?php

                                                if (!empty($question)) : ?>
                                                    <?php foreach ($question as $key => $value) :
                                                    ?>
                                                        <div class="row">
                                                            <div class="d-none">
                                                                <p class="<?= $value['que_class'] ?>"><?= $value['qes_title'] ?></p>
                                                            </div>
                                                            <?php if (!empty($value['options'])) : ?>
                                                                <ul class="li-space">
                                                                    <?php foreach ($value['options'] as $option_key => $option) : ?>
                                                                        <li class="d-none">
                                                                            <label class="radio"><input type="radio" class="<?= $option['class'] ?> sub-property-question" data-question-b="<?= $value['blng_id'] ?>" data-question-id="<?= $value['ques_id'] ?>" name="<?= $option['name'] ?>" value="<?= $option['value'] ?>"> <span><?= $option['title'] ?></span>
                                                                            </label>
                                                                        </li>
                                                                    <?php endforeach; ?>
                                                                </ul>
                                                            <?php endif; ?>
                                                        </div>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <div class="col-md-7 mt-4 locations d-none">
                                            <h6 class="fw-bold pb-1">Your shop is located inside?</h6>
                                            <ul class="li-space">
                                                <?php if (!empty($question7)) : ?>
                                                    <?php foreach ($question7 as $key => $option) : ?>
                                                        <li>
                                                            <label class="radio"><input type="radio" class="<?= $option['class'] ?> sub-property-question-located" name="<?= $option['name'] ?>" value="<?= $option['title'] ?>"> <span><?= $option['title'] ?></span> </label>
                                                        </li>
                                                <?php endforeach;
                                                endif; ?>

                                            </ul>
                                            <div class="row ">
                                                <div class="col-md-7 other-field d-none">
                                                    <label class="radio fw-bold ">Please enter the value</label>
                                                    <input type="text" class="form-control py-2 text-dark" name="location" placeholder="Let us know what you mean by other">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <h3>Location Details</h3>
                                <section>
                                    <div class="row g3">
                                        <div class="col-md-12 mt-3">
                                            <h3 class="fw-bolder red-text ">
                                                Where is your property Located ?
                                            </h3>
                                            <p>An accurate location help you connect with the right buyers</p>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label fw-bold">Please Enter City</label>
                                                <input type="text" name="city" id="city" class="form-control form-control2 w-100 text-dark" placeholder="Enter city" list="cities" required>
                                                <datalist id="cities">
                                                    <?php if (!empty($citieslist)) : ?>
                                                        <?php foreach ($citieslist as $key => $city) : ?>
                                                            <option value="<?= ucfirst($city['ct_title']) ?>">
                                                            <?php endforeach; ?>
                                                        <?php endif; ?>
                                                </datalist>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label fw-bold">Aprtment/Society</label>
                                                <input type="text" name="apartment_society" list="aprtmentsList" id="apartment_society" class="form-control form-control2 w-100 text-dark" placeholder="Enter apartment" required>
                                                <datalist id="aprtmentsList">
                                                    <?php if (!empty($appartmentslist)) : ?>
                                                        <?php foreach ($appartmentslist as $key => $apt) : ?>
                                                            <option value="<?= ucfirst($apt['ap_title']) ?>">
                                                            <?php endforeach; ?>
                                                        <?php endif; ?>
                                                </datalist>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label fw-bold">Project (Optional)</label>
                                                <input type="text" list="projects" name="project_optinal" id="project_optinal" class="form-control form-control2 w-100 text-dark" placeholder="Enter project">
                                                <datalist id="projects">
                                                    <?php if (!empty($projectslist)) : ?>
                                                        <?php foreach ($projectslist as $key => $project) : ?>
                                                            <option value="<?= ucfirst($project['project_title']) ?>">
                                                            <?php endforeach; ?>
                                                        <?php endif; ?>
                                                </datalist>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label fw-bold">House Number</label>
                                                <input type="text" name="inputhouse_number" id="inputhouse_number" class="form-control form-control2 w-100" placeholder="Enter house number" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label fw-bold">Locality</label>
                                                <input type="text" list="localities" name="locality" id="locality" class="form-control form-control2 w-100 text-dark" placeholder="Enter locality" required>
                                                <datalist id="localities">
                                                    <?php if (!empty($localitieslist)) : ?>
                                                        <?php foreach ($localitieslist as $key => $locality) : ?>
                                                            <option value="<?= ucfirst($locality['locality_title']) ?>">
                                                            <?php endforeach; ?>
                                                        <?php endif; ?>
                                                </datalist>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label fw-bold">Sub Locality (Optional)</label>
                                                <input type="text" name="sublocality" list="sublocal" id="sublocality" class="form-control form-control2 w-100 text-dark" placeholder="Enter sub locality">

                                                <datalist id="sublocal">
                                                    <?php if (!empty($sublocalitieslist)) : ?>
                                                        <?php foreach ($sublocalitieslist as $key => $slocal) : ?>
                                                            <option value="<?= ucfirst($slocal['sublocality_title']) ?>">
                                                            <?php endforeach; ?>
                                                        <?php endif; ?>
                                                </datalist>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label fw-bold">Located Inside</label>
                                                <select class="form-select py-2 w-100 text-dark input-border" id="located-inside" name="loacated-inside" required>
                                                    <option selected="">Located Inside
                                                    </option>
                                                    <?php if (!empty($locatedinsde)) : ?>
                                                        <?php foreach ($locatedinsde as $key => $value) : ?>
                                                            <option value="<?= $value['id'] ?>"><?= $value['title'] ?></option>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label fw-bold">Zone Type</label>
                                                <select class="form-select py-2 w-100 text-dark input-border" id="zone-type" name="zone-type" required>
                                                    <option selected="" disabled="">Zone Type....
                                                    </option>

                                                    <?php if (!empty($zonetypemodel)) : ?>
                                                        <?php foreach ($zonetypemodel as $key => $value) : ?>
                                                            <option value="<?= $value['id'] ?>"><?= $value['title'] ?></option>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label fw-bold">Address (Otional)</label>
                                                <input type="text" name="_address" id="_address" class="form-control form-control2 w-100 text-dark" placeholder="Enter Address">
                                            </div>
                                        </div>

                                </section>
                                <h3>Property Profile</h3>
                                <section>
                                    <div class="row g3">
                                        <h3 class="fw-bolder red-text ">
                                            Tell us about your property
                                        </h3>
                                        <div class="col-md-12 show-apartment">
                                            <div class="mb-3">
                                                <label class="col-form-label fw-bold">Your apartment is a</label>
                                                <ul class="li-space">
                                                    <li class="mb-3"> <label class="radio"> <input type="radio" name="apartment_is" value="2 BHK"> <span>2 BHK</span> </label> </li>
                                                    <li class="mb-3"> <label class="radio"> <input type="radio" name="apartment_is" value="3 BHK"> <span>3 BHK</span> </label> </li>
                                                    <li class="mb-3"> <label class="radio"> <input type="radio" name="apartment_is" value="4 BHK"> <span>4 BHK</span> </label> </li>
                                                    <li class="mb-3"> <label class="radio"> <input type="radio" name="apartment_is" value="5 BHk"> <span>5 BHk</span> </label> </li>
                                                    <li class="mb-3"> <label class="radio"> <input type="radio" name="apartment_is" value="6 BHK"> <span>6 BHK</span> </label> </li>
                                                    <li class="mb-3"> <label class="radio"> <input type="radio" name="apartment_is" value="Other"> <span>Other</span> </label> </li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="col-md-3 mt-4 show-apartment">
                                            <h6 class="fw-bold">
                                                Add Room Details
                                            </h6>
                                            <div class="mb-3">
                                                <label class="col-form-label">No. of Bedrooms </label>
                                                <div class="row">
                                                    <div class="col-md-2 me-1"> <label class="radio"> <input type="radio" name="no_of_bedrooms" value="1"> <span class="span-padding">1</span> </label> </div>
                                                    <div class="col-md-2 me-1"> <label class="radio"> <input type="radio" name="no_of_bedrooms" value="2"> <span class="span-padding">2</span> </label> </div>
                                                    <div class="col-md-2 me-1"> <label class="radio"> <input type="radio" name="no_of_bedrooms" value="3"> <span class="span-padding">3</span> </label> </div>
                                                    <div class="col-md-2 me-1"> <label class="radio"> <input type="radio" name="no_of_bedrooms" value="4"> <span class="span-padding">4</span> </label> </div>
                                                </div>
                                                <div>
                                                    <p class="fw-bold red-text pt-3 add-other add-other1 cursor">+ Add Other</p>
                                                </div>

                                                <div class="col-md-12 add-other-field d-none mt-3 add-other-field1">
                                                    <div class="row">
                                                        <div class="col-md-5 pe-0">
                                                            <input type="text" name="no_of_bedrooms_other" id="no_of_bedrooms_other" class="form-control form-control2 w-100 text-dark">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <button type="button" class="btn red-bg text-white pb-2 done-btn">Done</button>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-md-3 mt-5">
                                            <div class="mb-3">
                                                <label class="col-form-label">No. of Bathrooms </label>
                                                <div class="row">
                                                    <div class="col-md-2 me-1"> <label class="radio"> <input type="radio" name="no_of_bathrooms" value="1"> <span class="span-padding">1</span> </label> </div>
                                                    <div class="col-md-2 me-1"> <label class="radio"> <input type="radio" name="no_of_bathrooms" value="2"> <span class="span-padding">2</span> </label> </div>
                                                    <div class="col-md-2 me-1"> <label class="radio"> <input type="radio" name="no_of_bathrooms" value="3"> <span class="span-padding">3</span> </label> </div>
                                                    <div class="col-md-2 me-1"> <label class="radio"> <input type="radio" name="no_of_bathrooms" value="4"> <span class="span-padding">4</span> </label> </div>
                                                </div>
                                                <div>
                                                    <p class="fw-bold red-text pt-3 add-other-cls add-other-cls1 cursor">+ Add Other</p>
                                                </div>

                                                <div class="col-md-12 add-other-field-cls d-none mt-3 add-other-field-cls1">
                                                    <div class="row">
                                                        <div class="col-md-5 pe-0">
                                                            <input type="text" name="no_of_bathrooms_other" id="no_of_bathrooms_other" class="form-control form-control2 w-100 text-dark">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <button type="button" class="btn red-bg text-white pb-2 done-btn-cls">Done</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mt-5">
                                            <div class="mb-3">
                                                <label class="col-form-label">Balconies </label>
                                                <div class="row">
                                                    <div class="col-md-1 me-1"> <label class="radio"> <input type="radio" name="no_of_balconies" value="0"> <span class="span-padding">0</span> </label> </div>
                                                    <div class="col-md-1 me-1"> <label class="radio"> <input type="radio" name="no_of_balconies" value="1"> <span class="span-padding">1</span> </label> </div>
                                                    <div class="col-md-1 me-1"> <label class="radio"> <input type="radio" name="no_of_balconies" value="2"> <span class="span-padding">2</span> </label> </div>
                                                    <div class="col-md-1 me-1"> <label class="radio"> <input type="radio" name="no_of_balconies" value="3"> <span class="span-padding">3</span> </label> </div>
                                                    <div class="col-md-6"> <label class="radio"> <input type="radio" name="no_of_balconies" value="More than 2"> <span class="span-padding">More than 3</span> </label> </div>

                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-md-7 mt-4">
                                            <div class="mb-3">
                                                <label class="col-form-label fw-bolder p-0 fs-6 m-0">Add Area Details </label>
                                                <p>Atleast one area type is mandatory </p>

                                                <div class="row mx-auto">
                                                    <div class="col-md-8 p-0">
                                                        <input type="text" name="txt_carpetarea" id="txt_carpetarea" class="form-control form-control2 w-100 text-dark" placeholder="Carpet Area">
                                                    </div>
                                                    <div class="col-md-4 p-0">

                                                        <select class="form-select py-2 w-100 text-dark input-border" id="txt_carpetarea_unit" name="txt_carpetarea_unit">
                                                            <option selected="" disabled="">Sq.ft.
                                                            </option>
                                                            <?php if (!empty($units)) : ?>
                                                                <?php foreach ($units as $key => $value) : ?>
                                                                    <option value="<?= $value['id'] ?>"><?= $value['title'] ?></option>
                                                                <?php endforeach; ?>
                                                            <?php endif; ?>

                                                        </select>

                                                    </div>
                                                </div>

                                                <div class="row mx-auto mt-3 built-up-area-field d-none">
                                                    <div class="col-md-8 p-0">
                                                        <input type="text" name="txt_build_up_area" id="txt_build_up_area" class="form-control form-control2 w-100 text-dark" placeholder="Build-up Area">
                                                    </div>
                                                    <div class="col-md-4 p-0">

                                                        <select class="form-select py-2 w-100 text-dark input-border" id="sel1" name="txt_build_up_area_unit">
                                                            <option selected="" disabled="">Sq.ft.
                                                            </option>
                                                            <?php if (!empty($units)) : ?>
                                                                <?php foreach ($units as $key => $value) : ?>
                                                                    <option value="<?= $value['id'] ?>"><?= $value['title'] ?></option>
                                                                <?php endforeach; ?>
                                                            <?php endif; ?>
                                                        </select>

                                                    </div>
                                                </div>

                                                <div class="row mx-auto mt-3 super-built-up-area-field d-none">
                                                    <div class="col-md-8 p-0">
                                                        <input type="text" name="txt_super_build_up_area" id="txt_super_build_up_area" class="form-control form-control2 w-100 text-dark" placeholder="Super built-up Area">
                                                    </div>
                                                    <div class="col-md-4 p-0">

                                                        <select class="form-select py-2 w-100 text-dark input-border" id="sel1" name="txt_super_build_up_area_unit">
                                                            <option selected="" disabled="">Sq.ft.
                                                            </option>
                                                            <?php if (!empty($units)) : ?>
                                                                <?php foreach ($units as $key => $value) : ?>
                                                                    <option value="<?= $value['id'] ?>"><?= $value['title'] ?></option>
                                                                <?php endforeach; ?>
                                                            <?php endif; ?>
                                                        </select>

                                                    </div>
                                                </div>

                                                <div class="d-flex">
                                                    <p class="fw-bold red-text pt-3 me-3 built-up-area added cursor">+ Add Build-up Area</p>
                                                    <p class="fw-bold red-text pt-3 super-built-up-area added1 cursor">+ Add Super Build-up Area</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-7">
                                            <h6 class="fw-bold m-0">Shop facade size</h6>
                                            <p>shop-front related details</p>
                                            <div class="row mx-auto mb-3">
                                                <div class="col-md-8 p-0">
                                                    <input type="text" name="shop_facade_size" id="shop_facade_size" class="form-control form-control2 w-100 text-dark" placeholder="Carpet Area">
                                                </div>
                                                <div class="col-md-4 p-0">

                                                    <select class="form-select py-2 w-100 text-dark input-border" id="shop_facade_size_unit" name="shop_facade_size_unit">
                                                        <option selected="" disabled="">Sq.ft.
                                                        </option>
                                                        <?php if (!empty($units)) : ?>
                                                            <?php foreach ($units as $key => $value) : ?>
                                                                <option value="<?= $value['id'] ?>"><?= $value['title'] ?></option>
                                                            <?php endforeach; ?>
                                                        <?php endif; ?>
                                                    </select>

                                                </div>
                                            </div>


                                        </div>

                                        <div class="col-md-7 mt-4">
                                            <div>
                                                <label class="col-form-label fw-bold fs-6">Other Rooms </label>
                                                <span class="ps-1">(Optional)</span>
                                                <ul class="custom-checkboxes">
                                                    <li><input type="checkbox" id="checkboxOne" value="Pooja Room" name="oth_room_pooja"><label for="checkboxOne">Pooja Room</label></li>
                                                    <li><input type="checkbox" id="checkboxTwo" value="Study Room" name="oth_room_study"><label for="checkboxTwo">Study Room</label></li>
                                                    <li><input type="checkbox" id="checkboxThree" value="Servant Room" name="oth_room_servent"><label for="checkboxThree">Servant Room</label></li>
                                                    <li><input type="checkbox" id="checkboxFour" value="Store Room" name="oth_room_store"><label for="checkboxFour">Store Room</label></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-7 mt-4">
                                            <label class="col-form-label fw-bold fs-6">Furnishing </label>
                                            <span>(optional)</span>
                                            <ul class="li-space mb-4">
                                                <li> <label class="radio"> <input class="furnishing" type="radio" name="furnishing" value="furnished"> <span>Furnished</span> </label> </li>
                                                <li> <label class="radio"> <input class="furnishing" type="radio" name="furnishing" value="furnished"> <span>Semi-furnished</span> </label> </li>
                                                <li> <label class="radio"> <input class="furnishing" type="radio" name="furnishing" value="unfurnished"> <span>Un-furnished</span> </label> </li>
                                            </ul>
                                        </div>

                                        <div class="row furnishing-div d-none" id="furnished">
                                            <div class="col-md-7">
                                                <div class="mt-2">
                                                    <p>Altleast three furnishing are mandatory for furnished</p>
                                                    <div class="row">
                                                        <div class="col-md-6 mb-3">
                                                            <div class="d-flex">
                                                                <button type="button" class="decrement decrement1" disabled>-</button>
                                                                <input type="number" class="input-field" value="0" name="furnishing_light">
                                                                <button type="button" class="increment">+</button>
                                                                <span class="pt-1 ps-2">Light</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <div class="d-flex ">
                                                                <button type="button" class="decrement decrement1" disabled>-</button>
                                                                <input type="number" class="input-field" value="0" name="furnishing_fan">
                                                                <button type="button" class="increment">+</button>
                                                                <span class="pt-1 ps-2">Fans</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <div class="d-flex ">
                                                                <button type="button" class="decrement decrement1" disabled>-</button>
                                                                <input type="number" class="input-field" value="0" name="furnishing_ac">
                                                                <button type="button" class="increment">+</button>
                                                                <span class="pt-1 ps-2">AC</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <div class="d-flex ">
                                                                <button type="button" class="decrement decrement1" disabled>-</button>
                                                                <input type="number" class="input-field" value="0" name="furnishing_tv">
                                                                <button type="button" class="increment">+</button>
                                                                <span class="pt-1 ps-2">TV</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <div class="d-flex ">
                                                                <button type="button" class="decrement decrement1" disabled>-</button>
                                                                <input type="number" class="input-field" value="0" name="furnishing_bed">
                                                                <button type="button" class="increment">+</button>
                                                                <span class="pt-1 ps-2">Beds</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <div class="d-flex ">
                                                                <button type="button" class="decrement decrement1" disabled>-</button>
                                                                <input type="number" class="input-field" value="0" name="furnishing_wardrobe">
                                                                <button type="button" class="increment">+</button>
                                                                <span class="pt-1 ps-2">Wardrobe</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <div class="d-flex ">
                                                                <button type="button" class="decrement decrement1" disabled>-</button>
                                                                <input type="number" class="input-field" value="0" name="furnishing_geyser">
                                                                <button type="button" class="increment">+</button>
                                                                <span class="pt-1 ps-2">Geyser</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mb-3 ">
                                                            <div class="form-check pt-2 ">
                                                                <input class="form-check-input" type="checkbox" value="sofa" id="sofa" name="furnishing_sofa">
                                                                <label class="form-check-label" for="sofa">
                                                                    Sofa
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mb-3 ">
                                                            <div class="form-check pt-2 ">
                                                                <input class="form-check-input" type="checkbox" value="Washing Machine" id="machine" name="furnishing_w_machine">
                                                                <label class="form-check-label" for="machine">
                                                                    Washing Machine
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mb-3 ">
                                                            <div class="form-check pt-2 ">
                                                                <input class="form-check-input" type="checkbox" value="Stove" id="stove" name="furnishing_stove">
                                                                <label class="form-check-label" for="stove">
                                                                    Stove
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mb-3 ">
                                                            <div class="form-check pt-2 ">
                                                                <input class="form-check-input" type="checkbox" value="Fridge" id="fridge" name="furnishing_fridge">
                                                                <label class="form-check-label" for="fridge">
                                                                    Fridge
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mb-3 ">
                                                            <div class="form-check pt-2 ">
                                                                <input class="form-check-input" type="checkbox" value="Water Purifier" id="purifier" name="furnishing_purifier">
                                                                <label class="form-check-label" for="purifier">
                                                                    Water Purifier
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mb-3 ">
                                                            <div class="form-check pt-2 ">
                                                                <input class="form-check-input" type="checkbox" value="Microwave" id="microwave" name="furnishing_microwave">
                                                                <label class="form-check-label" for="microwave">
                                                                    Microwave
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mb-3 ">
                                                            <div class="form-check pt-2 ">
                                                                <input class="form-check-input" type="checkbox" value="Modular Kitechen" id="kitchen" name="furnishing_kitchen">
                                                                <label class="form-check-label" for="kitchen">
                                                                    Modular Kitechen
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mb-3 ">
                                                            <div class="form-check pt-2 ">
                                                                <input class="form-check-input" type="checkbox" value="Chimney" id="chimney" name="furnishing_chimney">
                                                                <label class="form-check-label" for="chimney">
                                                                    Chimney
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 mb-3 ">
                                                            <div class="form-check pt-2 ">
                                                                <input class="form-check-input" type="checkbox" value="Dinning Table" id="table" name="furnishing_table">
                                                                <label class="form-check-label" for="table">
                                                                    Dinning Table
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mb-3 ">
                                                            <div class="form-check pt-2 ">
                                                                <input class="form-check-input" type="checkbox" value="Curtains" id="curtains" name="furnishing_curtains">
                                                                <label class="form-check-label" for="curtains">
                                                                    Curtains
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 mb-3 ">
                                                            <div class="form-check pt-2 ">
                                                                <input class="form-check-input" type="checkbox" value="Exhaust Fan" id="exhaust_fan" name="furnishing_exh_fan">
                                                                <label class="form-check-label" for="exh_fan">
                                                                    Exhaust Fan
                                                                </label>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-7">
                                            <div>
                                                <label class="col-form-label fw-bold fs-6">Reserved Parking </label>
                                                <span>(optional)</span>
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <div class="d-flex ">
                                                            <span class="pt-1 pe-2">Cover Parking</span>
                                                            <button type="button" class="decrement decrement1" disabled>-</button>
                                                            <input type="number" class="input-field" value="0" name="parking_cover">
                                                            <button type="button" class="increment">+</button>

                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 mb-3">
                                                        <div class="d-flex ">
                                                            <span class="pt-1 pe-2">Open Parking</span>
                                                            <button type="button" class="decrement decrement1" disabled>-</button>
                                                            <input type="number" class="input-field" value="0" name="parking_open">
                                                            <button type="button" class="increment">+</button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-7">
                                            <div class="row mt-3">
                                                <h6 class="fw-bold m-0">Floor Details</h6>
                                                <p>Total no of floors and your floor details</p>
                                                <div class="col-md-7">
                                                    <div class="mb-3">
                                                        <input type="text" name="floor_details_floor_no" id="floors" class="form-control form-control2 w-100 text-dark" placeholder="Total Floors">
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="mb-3">
                                                        <select class="form-select py-2 w-100 text-dark input-border" id="floor_details_floor_no" name="floor_details_floor_no">
                                                            <option selected="" disabled="">Property on floor </option>
                                                            <option value="Lower Ground">Lower Ground</option>
                                                            <option value="Ground">Ground</option>
                                                            <option value="Basement">Basement</option>
                                                            <?php for ($i = 1; $i <= 10; $i++) : ?>
                                                                <option value="<?= $i ?>"><?= $i ?></option>
                                                            <?php endfor; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="col-md-7 mt-4">
                                            <label class="col-form-label fw-bold fs-6">Availability Status </label>
                                            <ul class="li-space">
                                                <li> <label class="radio"> <input type="radio" name="availability_status" value="readytomove" class="status" checked> <span>Ready to move</span> </label> </li>
                                                <li> <label class="radio"> <input type="radio" name="availability_status" value="underConstruction" class="status"> <span>Under construction </span> </label> </li>
                                            </ul>
                                        </div>

                                        <div class="col-md-7 mt-4 age-of-property" id="readytomove">
                                            <label class="col-form-label fw-bold fs-6">Age of Property </label>
                                            <ul class="li-space">
                                                <li> <label class="radio"> <input type="radio" name="year" value="0-1 year"> <span>0-1 year</span> </label> </li>
                                                <li> <label class="radio"> <input type="radio" name="year" value="1-5 years"> <span>1-5 years</span> </label> </li>
                                                <li> <label class="radio"> <input type="radio" name="year" value="5-10 years" checked> <span>5-10 years</span> </label> </li>
                                                <li> <label class="radio"> <input type="radio" name="year" value="10+ years"> <span>10+ years</span> </label> </li>
                                            </ul>
                                        </div>

                                        <div class="col-md-7 age-of-property d-none" id="underConstruction">
                                            <div class="row mt-3">
                                                <div class="col-md-5">
                                                    <div class="mb-3">
                                                        <label class="col-form-label fw-bold">Possession by</label>
                                                        <select class="form-select py-2 w-100 text-dark input-border" id="underConstruction_possession_years" name="underConstruction_possession_years">
                                                            <option value="1" selected>Expected By
                                                            </option>
                                                            <option value="2">WithIn 3 Months
                                                            </option>
                                                            <option value="3">Within 6 Months
                                                            </option>
                                                            <option value="4">By 2022
                                                            </option>
                                                            <option value="5">By 2023
                                                            </option>
                                                            <option value="6">By 2024
                                                            </option>
                                                            <option value="7">By 2025
                                                            </option>
                                                            <option value="8">By 2026
                                                            </option>
                                                            <option value="9">By 2027
                                                            </option>
                                                            <option value="10">By 2028
                                                            </option>
                                                            <option value="11">By 2029
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row ">
                                                <div class="col-md-5">
                                                    <select class="form-select py-2 w-100 text-dark input-border d-none" name="underConstruction_possession_month" id="underConstruction_possession_month">
                                                        <option selected>Month</option>
                                                        <option value="January">January</option>
                                                        <option value="February">February</option>
                                                        <option value="March">March</option>
                                                        <option value="April">April</option>
                                                        <option value="May">May</option>
                                                        <option value="June">June </option>
                                                        <option value="July">July </option>
                                                        <option value="August">August</option>
                                                        <option value="September">September</option>
                                                        <option value="October">October</option>
                                                        <option value="November">November</option>
                                                        <option value="December">December</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <h3>Photos</h3>
                                <section>
                                    <div class="row g3">
                                        <div class="col-md-12 mt-3 ">
                                            <div class="d-flex">
                                                <h3 class="fw-bolder red-text ">
                                                    Add Photos of your Property
                                                </h3>
                                                <span class="mt-2 ms-2">(optional)</span>
                                            </div>

                                            <p>A picture is worth a thousand words. 87% of buyers look at photos before buying</p>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="mb-3">
                                                <label class="col-form-label fw-bold">Upload from desktop</label>
                                                <input type="file" accept="image/*" id="propertyImg" name="propertyImg" class="dropify" data-height="230" multiple />
                                            </div>
                                            <input type="hidden" name="imgPath" id="imgPath">
                                            <button class="btn btn-success propertyImg icon_mobileUpload" type="button">Upload Images</button>
                                        </div>
                                        <div class="col-md-7 my-4">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <span class="iconS_PPFDesk_48 icon_mobileUpload addPhotos_mobileUploadIcon__3zKw7"></span>
                                                </div>
                                                <div class="col-md-10">
                                                    <h6 class="fw-bold">Now you can also upload photos directly from your phone</h6>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-7">
                                            <label for="" class="my-3">with your Registered number +91XXXXXXXX</label>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" type="radio" name="photos_directly" value="photos_directly_whatsapp" id="send-photos" />
                                                <label class="form-check-label" for="send-photos">Send Photos over Whatsapp </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="photos_directly" value="photos_directly_gpulos" id="upload-photos" />
                                                <label class="form-check-label" for="upload-photos">Get Photos upload link over SMS </label>
                                            </div>
                                            <div>
                                                <div class="alert alert-warning alert-dismissible fade show py-2" role="alert">
                                                    <strong>Without photos your ad will be ignored by buyers.</strong>
                                                </div>
                                            </div>

                                        </div>
                                </section>

                                <h3>Pricing & Others</h3>
                                <section>
                                    <div class="row g-3">
                                        <div class="col-10 mt-2">
                                            <div class="alert alert-warning alert-dismissible align-items-center fade show">
                                                <i class="bi-exclamation-triangle-fill"></i>
                                                You might get <strong class="mx-2">Low Responses</strong>, as your listing has no photos. Rank up your listing by adding pictures
                                                <a href="" class="fw-bold">Upload Now</a>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                            </div>
                                            <h3 class="fw-bolder red-text ">
                                                Add Pricing and details
                                            </h3>

                                            <div>
                                                <label class="col-form-label fw-bold fs-6">Ownership </label>
                                                <ul class="li-space">
                                                    <li> <label class="radio"> <input type="radio" name="Ownership" value="Freehold"> <span>Freehold</span> </label> </li>
                                                    <li> <label class="radio"> <input type="radio" name="Ownership" value="Leasehold"> <span>Leasehold</span> </label> </li>
                                                    <li> <label class="radio"> <input type="radio" name="Ownership" value="Co-operative society"> <span>Co-operative society</span> </label> </li>
                                                    <li> <label class="radio"> <input type="radio" name="Ownership" value="Power of Attorney"> <span>Power of Attorney</span> </label> </li>
                                                </ul>
                                            </div>

                                            <div class="col-md-8">
                                                <div class="row mt-5">
                                                    <h5 class="fw-bold">Expected Price</h5>
                                                    <div class="col-md-7">
                                                        <div class="mb-3">
                                                            <label class="col-form-label fw-bold">Please Specify the Price</label>
                                                            <input type="text" name="expectd_price" id="expectd_price" class="form-control form-control2 w-100 text-dark" placeholder="Expected Price">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="mb-3">
                                                            <label class="col-form-label fw-bold">Price per Sq.ft.</label>
                                                            <input type="text" name="price_per_sqft" id="price_per_sqft" class="form-control form-control2 w-100 text-dark" placeholder="Enter price per Sq.ft.">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-7 mt-4">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="All Inclusive Price" name="inclusive_tax_price" id="inclusive-tax-price">
                                                            <label class="form-check-label" for="inclusive-price">
                                                                All Inclusive Price
                                                            </label>
                                                        </div>

                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="Tax the Govt. charges excluded" name="tax_gove_charge_excld" id="tax_gove_charge_excld">
                                                            <label class="form-check-label" for="tax">
                                                                Tax the Govt. charges excluded
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="negotiable_price" value="Price Negotiable" id="negotiable_price">
                                                            <label class="form-check-label" for="price">
                                                                Price Negotiable
                                                            </label>
                                                        </div>

                                                        <div class="row mt-3">
                                                            <div class="mb-3">
                                                                <label class="col-form-label fw-bolder p-0 m-0">Additional Pricing Details</label>
                                                                <span class="ms-2">(Optional)</span>

                                                                <div class="row mx-auto mt-3 pricing-details-field d-none">
                                                                    <div class="col-md-8 p-0">
                                                                        <input type="text" name="additional_price_maintenance" id="additional_price_maintenance" class="form-control form-control2 w-100 " placeholder="Maintenance">
                                                                    </div>
                                                                    <div class="col-md-4 p-0">

                                                                        <select class="form-select py-2 w-100 text-dark input-border" id="maintenance_unit" name="maintenance_unit">
                                                                            <option selected="" value="Monthly">Monthly</option>
                                                                            <option value="Annually">Annually</option>
                                                                            <option value="One Time">One Time</option>
                                                                            <option value="Per Unit/Monthly">Per Unit/Monthly</option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="col-12 p-0 mt-3">
                                                                        <input type="text" name="additional_price_rental" id="additional_price_rental" class="form-control form-control2 w-100 text-dark" placeholder="Expected rental">
                                                                    </div>

                                                                    <div class="col-12 p-0 mt-3">
                                                                        <input type="text" name="additional_price_amount" id="additional_price_amount" class="form-control form-control2 w-100 text-dark " placeholder="Booking Amount">
                                                                    </div>

                                                                    <div class="col-12 p-0 mt-3">
                                                                        <input type="text" name="additional_price_payable" id="additional_price_payable" class="form-control form-control2 w-100 text-dark " placeholder="Annual dues payable">
                                                                    </div>

                                                                    <div class="col-12 p-0 mt-3">
                                                                        <input type="text" name="additional_price_charge" id="additional_price_charge" class="form-control form-control2 w-100 text-dark" placeholder="Membership charge">
                                                                    </div>

                                                                </div>

                                                            </div>
                                                        </div>

                                                        <div>
                                                            <p class="fw-bold red-text pricing-details details-hide cursor">+ Add More Pricing Details</p>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-7 mt-4">
                                                        <label class="col-form-label fw-bold fs-6 p-0 m-0">Is it Pre-leased/ Pre-Rented </label>
                                                        <p>for properties that are already rented out</p>
                                                        <ul class="li-space">
                                                            <li> <label class="radio open-prerented-details"> <input type="radio" name="rented-properties" value="Yes"> <span>Yes</span> </label> </li>
                                                            <li> <label class="radio hide-prerented-details"> <input type="radio" name="rented-properties" value="No"> <span>No</span> </label> </li>
                                                        </ul>
                                                    </div>

                                                    <!-- open field on click yes -->
                                                    <div class="col-md-7 mt-4 pre-leased d-none mt-3">
                                                        <label class="col-form-label fw-bold fs-6 p-0 m-0">Pre-leased/ Pre-Rented Details</label>
                                                        <p>Lease/ Rent details of your property</p>
                                                        <div>
                                                            <input type="text" name="pre_rented_leased_current_rent_pmonth" id="pre_rented_leased_price" class="form-control form-control2 w-100 text-dark" placeholder="Current rent per month">
                                                        </div>
                                                        <div class="mt-2">
                                                            <input type="text" name="pre_rented_leased_lease_tenure_in_years" id="pre_rented_leased_lease_tenure_in_years
                                                                                " class="form-control form-control2 w-100 text-dark" placeholder="Lease tenure in years">
                                                        </div>

                                                        <div class="prerented-details d-none">
                                                            <div class="mt-2">
                                                                <input type="text" name="prerented_details_price_arinp" id="prerented_details_price_arinp
                                                                                    " class="form-control form-control2 w-100 text-dark" placeholder="Annual rent increase in % (Optional)">
                                                            </div>
                                                            <div class="mt-2">
                                                                <input type="text" name="leased_to_business_type" id="leased_to_business_type
                                                                                    " class="form-control form-control2 w-100 text-dark" placeholder="Leased to - Business Type (Optional)">
                                                            </div>
                                                        </div>


                                                        <div>
                                                            <p class="fw-bold red-text annual-rent cursor hide-annual-rent">+ Add Annual Rent Increment & Leased to</p>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-7 mt-3">
                                                        <label class="col-form-label fw-bold fs-6 p-0">Is your office fire NOC certified </label>
                                                        <ul class="li-space">
                                                            <li> <label class="radio "> <input type="radio" name="NOC-certified" value="Yes"> <span>Yes</span> </label> </li>
                                                            <li> <label class="radio"> <input type="radio" name="NOC-certified" value="No"> <span>No</span> </label> </li>
                                                        </ul>
                                                    </div>

                                                    <div class="col-md-7 mt-3">
                                                        <label class="col-form-label fw-bold fs-6 p-0">Occupancy Certificate</label>
                                                        <ul class="li-space">
                                                            <li> <label class="radio "> <input type="radio" name="occupancy-certificate" value="Yes"> <span>Yes</span> </label> </li>
                                                            <li> <label class="radio"> <input type="radio" name="occupancy-certificate" value="No"> <span>No</span> </label> </li>
                                                        </ul>
                                                    </div>

                                                    <div class="col-md-10 mt-3">
                                                        <div class="dropdown office-priviously" data-name='office_previously'>
                                                            <div class="d-flex">
                                                                <p class="fw-bold  fs-6">Your office was previously used for</p>
                                                                <span class="ps-2">(Optional)</span>
                                                            </div>

                                                            <button class="red-bg border-0 text-white p-2 rounded dropdown-toggle open-dropdown" type="button" id="btndropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                            </button>
                                                            <ul class="dropdown-menu hide-dropdown d-none mt-2 py-2 px-4 w-50" aria-labelledby="btndropdown">
                                                                <li>
                                                                    <label class="radio-btn d-flex">
                                                                        <input type="checkbox" class="form-check-input fs-6" value='backend-office' checked>
                                                                        <span class="pt-1 ps-1"> Backend Office</span>
                                                                    </label>
                                                                </li>
                                                                <li>
                                                                    <label class="radio-btn d-flex">
                                                                        <input type="checkbox" class="form-check-input fs-6" value='ca-office' checked>
                                                                        <span class="pt-1 ps-1">CA Office</span>
                                                                    </label>
                                                                </li>
                                                                <li>
                                                                    <label class="radio-btn d-flex">
                                                                        <input type="checkbox" class="form-check-input fs-6" value='frontend-office'>
                                                                        <span class="pt-1 ps-1">Frontend Office</span>
                                                                    </label>
                                                                </li>
                                                                <li>
                                                                    <label class="radio-btn d-flex">
                                                                        <input type="checkbox" class="form-check-input fs-6" value='small-office'>
                                                                        <span class="pt-1 ps-1">Small Office Purpose</span>
                                                                    </label>
                                                                </li>
                                                                <li>
                                                                    <label class="radio-btn d-flex">
                                                                        <input type="checkbox" class="form-check-input fs-6" value='traders-office'>
                                                                        <span class="pt-1 ps-1">Traders Office</span>
                                                                    </label>
                                                                </li>
                                                                <li>
                                                                    <label class="radio-btn d-flex">
                                                                        <input type="checkbox" class="form-check-input fs-6" value='advocate-office'>
                                                                        <span class="pt-1 ps-1">Advocate Office</span>
                                                                    </label>
                                                                </li>
                                                                <li class='text-center'>
                                                                    <button type='button' class='btn text-white red-bg save-button' value='Save'>Save</button>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mt-4">
                                                        <div class="form-group">
                                                            <label class="col-form-label fw-bold fs-6 p-0 m-0">What makes your property Unique </label>
                                                            <p>Adding description will Increse your listing visibility.</p>
                                                            <textarea class="form-control border-secondary text-dark" id="exampleFormControlTextarea3" maxlength="30" name="propdescription" rows="4" placeholder="share some details about your property like spacious rooms, well maintained facilities..."></textarea>
                                                            <span>minimum 30 characters required.</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </section>


                                <!-- -----------Ameneties---------- -->
                                <h3>Ameneties Section</h3>
                                <section>
                                    <div class="row g-3">
                                        <div class="col-12 mt-2   ">
                                            <h3 class="fw-bolder red-text ">
                                                Add ameneties/unique features
                                            </h3>
                                            <p>All fields on this page are optional</p>

                                            <div class="col-md-8">

                                                <label class="col-form-label fw-bold fs-6">Ameneties</label>

                                                <ul class="custom-checkboxes">
                                                    <?php if (!empty($Amenities)) : ?>
                                                        <?php foreach ($Amenities as $key => $value) : ?>
                                                            <li><input type="checkbox" id="<?= $value['ame_for'] ?>" name="ameneties[]" class="amenities" value="<?= $value['ame_for'] ?>"><label for="<?= $value['ame_for'] ?>"><?= $value['ame_title'] ?></label></li>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>

                                                </ul>
                                            </div>

                                            <?php if (!empty($keyMaster)) :
                                                // echo '<pre>';
                                                // print_r($keyMaster);die;
                                            ?>
                                                <?php foreach ($keyMaster as $key => $question) : ?>
                                                    <div class="col-md-8 mt-4">
                                                        <label class="col-form-label fw-bold fs-6"><?= $question['title'] ?></label>
                                                        <?php if (!empty($question['subQuestion'])) :
                                                            $name = str_replace(' ', '', $question['title']);
                                                        ?>
                                                            <ul class="custom-checkboxes">
                                                                <?php foreach ($question['subQuestion'] as $item_key => $item) : ?>
                                                                    <li><input type="checkbox" name="<?= $name . '[]' ?>" id="<?= $item['short_name'] ?>" value="<?= $item['title'] ?>"><label for="<?= $item['short_name'] ?>"><?= $item['title'] ?></label></li>
                                                            <?php endforeach;
                                                            endif; ?>
                                                            </ul>
                                                    </div> <?php endforeach; ?>
                                            <?php endif; ?>

                                            <?php if (!empty($keyMaster2)) : ?>
                                                <?php foreach ($keyMaster2 as $key => $question) : ?>
                                                    <?php if ($question['id'] != 9) : ?>
                                                        <div class="col-md-8 mt-4">
                                                            <label class="col-form-label fw-bold fs-6"><?= $question['title'] ?></label>
                                                            <?php if (!empty($question['subQuestion'])) : ?>
                                                                <ul class="li-space">
                                                                    <?php foreach ($question['subQuestion'] as $item_key => $item) : ?>
                                                                        <li> <label class="radio"> <input type="radio" name="<?= $item['short_name'] ?>" value="<?= $item['title'] ?>"> <span><?= $item['title'] ?></span> </label> </li>
                                                                <?php endforeach;
                                                                endif; ?>
                                                                </ul>
                                                        </div>
                                                    <?php elseif ($question['id'] == 9) : ?>
                                                        <div class="col-md-5">
                                                            <div class="mb-3">
                                                                <label class="col-form-label fw-bold fs-6">Type of Flooring</label>
                                                                <?php if (!empty($question['subQuestion'])) : ?>
                                                                    <select class="form-select py-2 w-100 text-dark input-border" id="type_of_flooring" name="type_of_flooring">
                                                                        <option selected="" disabled="">Select</option>
                                                                        <?php foreach ($question['subQuestion'] as $item_key => $item) : ?>
                                                                            <option value="<?= $item['short_name'] ?>"><?= $item['title'] ?></option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                            <?php
                                                    endif;
                                                endforeach;
                                            endif; ?>


                                            <div class="col-md-6 mt-4">

                                                <div class="mb-3">
                                                    <label class="col-form-label fw-bolder p-0 fs-6 m-0">Width of facing road</label>

                                                    <div class="row mx-auto mt-3">
                                                        <div class="col-md-8 p-0">
                                                            <input type="text" name="Width_of_facing_road" id="Width_of_facing_road" class="form-control form-control2 w-100 text-dark" placeholder="Enter the width">
                                                        </div>
                                                        <div class="col-md-4 p-0">

                                                            <select class="form-select py-2 w-100 text-dark input-border" id="Width_of_facing_road_unit" name="Width_of_facing_road_unit">
                                                                <option disabled="">Select</option>
                                                                <option value="Feet" selected>Feet</option>
                                                                <option value="Meter">Meter</option>

                                                            </select>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <?php if (!empty($locationAdvantage)) : ?>
                                                <div class="col-md-8 mt-4">
                                                    <label class="col-form-label fw-bold fs-6 p-0 m-0"><?= $locationAdvantage[0]['title'] ?></label>
                                                    <p>Heighlight the nearby landmarksz*</p>
                                                    <ul class="custom-checkboxes">
                                                        <?php foreach ($locationAdvantage[0]['subQuestion'] as $key => $item) : ?>
                                                            <li><input type="checkbox" id="<?= $item['short_name'] ?>" name="<?= 'locaction_adv[]' ?>" value="<?= $item['title'] ?>"><label for="<?= $item['short_name'] ?>"><?= $item['title'] ?></label></li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                    <p class="py-3" style="font-size:12px">*Please provide correct information, otherwise your listing might get blocked</p>
                                                </div>
                                            <?php endif; ?>

                                            <div class="col-md-8">
                                                <div class="row mt-3">
                                                    <h6 class="fw-bold m-0">Suggest a Property Feature </h6>
                                                    <p>That you want us to add in the form</p>
                                                    <div class="col-md-7">
                                                        <div class="mb-3">
                                                            <label class="col-form-label fw-bold">Enter your USP's here</label>
                                                            <input type="text" name="usp_price" id="usp_price" class="form-control form-control2 w-100 text-dark" placeholder="Expected Price">
                                                        </div>

                                                    </div>
                                                    <p>Note : Suggested features entered here will be reviewed by our team</p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </section>
                                <!-- Property owner section -->
                                <h3>Property Owner</h3>
                                <section>
                                    <div class="row g-3">
                                        <div class="col-12 mt-2">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="col-form-label fw-bold">Full Name (Optional)</label>
                                                    <input type="text" name="owner-name" id="owner-name" class="form-control form-control2 w-100 text-dark" placeholder="Please Enter Full Name">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="col-form-label fw-bold">Email (Optional)</label>
                                                    <input type="email" name="owner-email" id="owner-email" class="form-control form-control2 w-100 text-dark" placeholder="Please Enter Email">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="col-form-label fw-bold">Phone (Optional)</label>
                                                    <input type="phone" name="owner-phone" id="owner-phone" class="form-control form-control2 w-100 text-dark" placeholder="Please Enter Phone">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="col-form-label fw-bold">Alternate Phone Number (Optional)</label>
                                                    <input type="phone" name="owner-alt-number" id="owner-alt-number" class="form-control form-control2 w-100 text-dark" placeholder="Please Enter Alternate Phone Number">
                                                </div>
                                            </div>
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


<?= view('Property/Scripts/add-property') ?>