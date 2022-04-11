
        <div class="body-header border-0 rounded-0 px-xl-4 px-md-2">
            <div class="container-fluid">
                <div class="row pt-2">
                    <div class="col-12">
                        <div class="d-flex justify-content-between align-items-center py-2">
                            <ol class="breadcrumb rounded-0 mb-0 ps-0 bg-transparent flex-grow-1">
                                <li class="breadcrumb-item"><a href="<?=base_url();?>">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add Teams</li>
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
                        <div class="mt-4">
                            <!-- <div class="col-md-12 p-0">
                                <div class="red-bg text-center text-white rounded py-2 mb-3">
                                    <h1 class=" fw-bolder">Add Teams</h1>
                                </div>
                            </div> -->
                        </div>
                        <section class="form-section card">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form class="row g-3">
                                            <div class="col-md-6">
                                                <label for="teamname" class="form-label">Team Name</label>
                                                <input type="text" id="teamname"
                                                    class="form-control form-control1" value="" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Team Head</label>
                                                <select class="form-select form-control1"
                                                    aria-label="Default select example">
                                                    <option selected>Select</option>
                                                    <option value="1">...</option>
                                                    <option value="2">...</option>
                                                    <option value="3">Others</option>
                                                </select>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label m-0">Team Members</label>
                                                <div class="selected1">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <label for="radio-card-1" class="radio-card">
                                                                <input type="checkbox" name="radio-card"
                                                                    id="radio-card-1" checked />
                                                                <div class="card-content-wrapper"
                                                                    data-bs-toggle="tooltip"
                                                                    data-bs-placement="top" title="Name Id">
                                                                    <span class="check-icon"></span>
                                                                    <div class="card-content">
                                                                        <img src="<?=base_url();?>/public/assets/img/avatar1.jpg"
                                                                            alt="" class="rounded" />
                                                                    </div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label for="radio-card-2" class="radio-card">
                                                                <input type="checkbox" name="radio-card"
                                                                    id="radio-card-2" />
                                                                <div class="card-content-wrapper"
                                                                    data-bs-toggle="tooltip"
                                                                    data-bs-placement="top" title="Name Id">
                                                                    <span class="check-icon"></span>
                                                                    <div class="card-content">
                                                                        <img src="<?=base_url();?>/public/assets/img/avatar2.jpg"
                                                                            alt="" class="rounded" />
                                                                    </div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label for="radio-card-3" class="radio-card">
                                                                <input type="checkbox" name="radio-card"
                                                                    id="radio-card-3" />
                                                                <div class="card-content-wrapper"
                                                                    data-bs-toggle="tooltip"
                                                                    data-bs-placement="top" title="Name Id">
                                                                    <span class="check-icon"></span>
                                                                    <div class="card-content">
                                                                        <img src="<?=base_url();?>/public/assets/img/avatar1.jpg"
                                                                            alt="" class="rounded" />
                                                                    </div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label for="radio-card-4" class="radio-card">
                                                                <input type="checkbox" name="radio-card"
                                                                    id="radio-card-4" />
                                                                <div class="card-content-wrapper"
                                                                    data-bs-toggle="tooltip"
                                                                    data-bs-placement="top" title="Name Id">
                                                                    <span class="check-icon"></span>
                                                                    <div class="card-content">
                                                                        <img src="<?=base_url();?>/public/assets/img/avatar2.jpg"
                                                                            alt="" class="rounded" />
                                                                    </div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label for="radio-card-5" class="radio-card">
                                                                <input type="checkbox" name="radio-card"
                                                                    id="radio-card-5" />
                                                                <div class="card-content-wrapper"
                                                                    data-bs-toggle="tooltip"
                                                                    data-bs-placement="top" title="Name Id">
                                                                    <span class="check-icon"></span>
                                                                    <div class="card-content">
                                                                        <img src="<?=base_url();?>/public/assets/img/avatar1.jpg"
                                                                            alt="" class="rounded" />
                                                                    </div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label for="radio-card-6" class="radio-card">
                                                                <input type="checkbox" name="radio-card"
                                                                    id="radio-card-6" />
                                                                <div class="card-content-wrapper"
                                                                    data-bs-toggle="tooltip"
                                                                    data-bs-placement="top" title="Name Id">
                                                                    <span class="check-icon"></span>
                                                                    <div class="card-content">
                                                                        <img src="<?=base_url();?>/public/assets/img/avatar2.jpg"
                                                                            alt="" class="rounded" />
                                                                    </div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button class="btn btn-primary" type="submit">Add Team</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>

        <?php include __DIR__ . '/../Layout/footer.php'; ?>
    </div>
</div>
<?php include __DIR__ . '/../Layout/jsLinks.php'; ?>
   