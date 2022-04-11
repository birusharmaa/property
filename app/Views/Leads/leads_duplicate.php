<div class="body-header border-0 rounded-0 px-xl-4 px-md-2">
    <div class="container-fluid">
        <div class="row pt-2">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center py-2">
                    <ol class="breadcrumb rounded-0 mb-0 ps-0 bg-transparent flex-grow-1">
                        <li class="breadcrumb-item"><a href="<?=base_url();?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Duplicate</li>
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
                    <!-- <div class="col-md-12 p-0">
                        <div class="red-bg text-center text-white rounded py-2 mb-3">
                            <h1 class=" fw-bolder">Duplicate Leads</h1>
                        </div>
                    </div> -->
                <section class="form-section card">
                    <div class="container">
                    <?php for($j=1; $j<=2; $j++) {?>
                        <div class="row my-3">
                            <?php for($i=1; $i<=6; $i++) {?>
                                <div class="mb-2 col-md-6">
                                        <div class="card">
                                            <div class="selected1 p-3">
                                                <div class="g-2 row">
                                                    <div class="col-md-6">
                                                        <label for="teamname3"
                                                            class="form-label"><strong>Richard
                                                            Kirkendall</strong></label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="teammail3"
                                                            class="form-label">info52@gmail.com</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="teamnumber3"
                                                            class="form-label">9154841254</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="teamarea3"
                                                            class="form-label">2nd Floor, No.21,
                                                            80-feet Road.</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            <?php }?>
                        </div>
                        <?php }?>
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
