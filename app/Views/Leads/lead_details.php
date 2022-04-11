<?php 
// echo "<pre>";
// print_r($lead_details);
//exit;

?>
<div class="body-header border-0 rounded-0 px-xl-4 px-md-2">
    <div class="container-fluid">
        <div class="row pt-2">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center py-2">
                    <ol class="breadcrumb rounded-0 mb-0 ps-0 bg-transparent flex-grow-1">
                        <li class="breadcrumb-item"><a href="<?=base_url();?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Lead Details</li>
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
                <div class="red-bg text-center text-white rounded py-2 mb-3">
                    <h1 class=" fw-bolder">Lead Details</h1>
                </div>
                <div class="card p-4">
                    <!-- Tabs navs -->
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="nav nav-tabs mb-3" id="lead" role="tablist">
                                <li class="nav-item card" role="presentation">
                                    <a class="nav-link rounded active" id="lead-tab-1"
                                        data-mdb-toggle="tab" href="#lead-tabs-1" role="tab"
                                        aria-controls="lead-tabs-1" aria-selected="true">Lead
                                        Information</a>
                                </li>
                                <li class="nav-item card" role="presentation">
                                    <a class="nav-link rounded" id="lead-tab-2" data-mdb-toggle="tab"
                                        href="#lead-tabs-2" role="tab" aria-controls="lead-tabs-2"
                                        aria-selected="false">Timeline Information</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <div class="text-end">
                                <h3 class="red-text fw-bold">
                                    <i class="bi underline bi-house-fill me-2 "></i><span
                                        class="underline">Lead & Timeline Informations</span>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <!-- Tabs navs -->

                    <!-- Tabs content -->
                    <div class="tab-content" id="lead-content">
                        <div class="tab-pane fade show active" id="lead-tabs-1" role="tabpanel"
                            aria-labelledby="lead-tab-1">
                            <div class="row">
                                <div class="col-md-12 px-3">
                                    <div class="g-3 row">
                                        <div class="col-md-4">
                                            <div class="card py-3 px-0">
                                                <div class="row px-3">
                                                    <div class="col-md-6">
                                                        <label>Name</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <strong><?= $lead_details['first_name']." ".$lead_details['last_name'];?> </strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card py-3 px-0">
                                                <div class="row px-3">
                                                    <div class="col-md-3">
                                                        <label>Email</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <strong><?= $lead_details['email'];?></strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card py-3 px-0">
                                                <div class="row px-3">
                                                    <div class="col-md-6">
                                                        <label>Phone Number</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <strong><?= $lead_details['phone'];?></strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card py-3 px-0">
                                                <div class="row px-3">
                                                    <div class="col-md-6">
                                                        <label>Looking For</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <strong><?= $lead_details['looking_for'];?></strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card py-3 px-0">
                                                <div class="row px-3">
                                                    <div class="col-md-6">
                                                        <label>No. Of Bedrooms</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <strong><?= $lead_details['no_of_beds'];?></strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card py-3 px-0">
                                                <div class="row px-3">
                                                    <div class="col-md-6">
                                                        <label>No. Of Bathrooms</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <strong><?= $lead_details['no_of_bathroom'];?></strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card py-3 px-0">
                                                <div class="row px-3">
                                                    <div class="col-md-6">
                                                        <label>Price Range</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <strong><?= $lead_details['price_range'];?></strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card py-3 px-0">
                                                <div class="row px-3">
                                                    <div class="col-md-6">
                                                        <label>Square Feet</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <strong><?= $lead_details['square_feet'];?></strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="card py-3 px-0">
                                                <div class="row px-3">
                                                    <div class="col-md-6">
                                                        <label>Facing</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <strong><?= $lead_details['facing'];?></strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card py-3 px-0">
                                                <div class="row px-3">
                                                    <div class="col-md-6">
                                                        <label>Floor</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <strong><?= $lead_details['floor'];?></strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="card py-3 px-0">
                                                <div class="row px-3">
                                                    <div class="col-md-6">
                                                        <label>Type Of Property</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <strong><?= $lead_details['property_type'];?></strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="card py-3 px-0">
                                                <div class="row px-3">
                                                    <div class="col-md-6">
                                                        <label>Commercial</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <strong><?= $lead_details['commercial'];?></strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card py-3 px-0">
                                                <div class="row px-3">
                                                    <div class="col-md-6">
                                                        <label>Properties In Localities</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <strong><?= $lead_details['property_in_location'];?></strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="card py-3 px-0">
                                                <div class="row px-3">
                                                    <div class="col-md-6">
                                                        <label>State</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <strong><?= $lead_details['state_name'];?></strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="card py-3 px-0">
                                                <div class="row px-3">
                                                    <div class="col-md-6">
                                                        <label>City</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <strong><?= $lead_details['city_name'];?></strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="card py-3 px-0">
                                                <div class="row px-3">
                                                    <div class="col-md-6">
                                                        <label>Posted By</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <strong><?= $lead_details['posted_by_name'];?></strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane px-2 fade" id="lead-tabs-2" role="tabpanel"
                            aria-labelledby="lead-tab-2">
                            <div class="card px-4 tab-pane"><br>
                                <div class="col-md-12 m-auto">
                                    <div class="timeline-item card ti-danger border-bottom ms-2">
                                        <div class="d-flex">
                                            <img class="avatar sm rounded"
                                                src="<?=base_url();?>/public/assets/img/avatar1.jpg" alt="">
                                            <div class="flex-fill ms-3">
                                                <div class="mb-1"> <strong>Gerald Vaughn </strong>
                                                    changed the
                                                    status of Property on <strong>Date:- 02/01/2021 -
                                                        Property
                                                        No. 12</strong></div>
                                                <span class="d-flex text-muted mb-3">New address of
                                                    Property -
                                                    9:24PM by <a class="ms-2" href="#"
                                                        title=""><strong>You</strong></a> </span>

                                            </div>
                                        </div>
                                    </div> <!-- timeline item end  -->
                                    <div class="timeline-item ti-info border-bottom ms-2">
                                        <div class="d-flex">
                                            <img class="avatar sm rounded"
                                                src="<?=base_url();?>/public/assets/img/avatar2.jpg" alt="">
                                            <div class="flex-fill ms-3">
                                                <div class="mb-1"><strong>Gerald Vaughn </strong>changed
                                                    the
                                                    status of Property on<strong> Date:- 02/01/2021 -
                                                        Property
                                                        No. 12</strong></div>
                                                <span class="d-flex text-muted mb-3">New address of
                                                    Property -
                                                    9:24PM by <a class="ms-2" href="#"
                                                        title=""><strong>You</strong></a> </span>

                                            </div>
                                        </div>
                                    </div> <!-- timeline item end  -->
                                    <div class="timeline-item card ti-danger border-bottom ms-2">
                                        <div class="d-flex">
                                            <img class="avatar sm rounded"
                                                src="<?=base_url();?>/public/assets/img/avatar1.jpg" alt="">
                                            <div class="flex-fill ms-3">
                                                <div class="mb-1"><strong>Gerald Vaughn </strong>changed
                                                    the
                                                    status of Property on <strong>Date:- 02/01/2021 -
                                                        Property
                                                        No. 12</strong></div>
                                                <span class="d-flex text-muted mb-3">New address of
                                                    Property -
                                                    9:24PM by <a class="ms-2" href="#"
                                                        title=""><strong>You</strong></a> </span>

                                            </div>
                                        </div>
                                    </div> <!-- timeline item end  -->
                                    <div class="timeline-item ti-primary border-bottom ms-2">
                                        <div class="d-flex">
                                            <img class="avatar sm rounded"
                                                src="<?=base_url();?>/public/assets/img/avatar2.jpg" alt="">
                                            <div class="flex-fill ms-3">
                                                <div class="mb-1"><strong>Gerald Vaughn </strong>changed
                                                    the
                                                    status of Property on <strong>Date:- 02/01/2021 -
                                                        Property
                                                        No. 12</strong></div>
                                                <span class="d-flex text-muted mb-3">New address of
                                                    Property -
                                                    9:24PM by <a class="ms-2" href="#"
                                                        title=""><strong>Other</strong></a> </span>

                                            </div>
                                        </div>
                                    </div> <!-- timeline item end  -->
                                    <div class="timeline-item card ti-warning border-bottom ms-2">
                                        <div class="d-flex">
                                            <img class="avatar sm rounded"
                                                src="<?=base_url();?>/public/assets/img/avatar1.jpg" alt="">
                                            <div class="flex-fill ms-3">
                                                <div class="mb-1">Gerald Vaughn changed the status of
                                                    Property
                                                    <strong>on Date:- 02/01/2021 - Property No.
                                                        12</strong>
                                                </div>
                                                <span class="d-flex text-muted mb-3">New address of
                                                    Property -
                                                    9:24PM by <a class="ms-2" href="#"
                                                        title=""><strong>You</strong></a> </span>
                                            </div>
                                        </div>
                                    </div> <!-- timeline item end  -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- .card end -->
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