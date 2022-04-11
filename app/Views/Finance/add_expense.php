<div class="body-header border-0 rounded-0 px-xl-4 px-md-2">
    <div class="container-fluid">
        <div class="row pt-2">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center py-2">
                    <ol class="breadcrumb rounded-0 mb-0 ps-0 bg-transparent flex-grow-1">
                        <li class="breadcrumb-item"><a href="<?=base_url();?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add Expenses</li>
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
                    <h1 class=" fw-bolder">Add Expenses</h1>
                </div>
            </div>
            <div class="col-md-12">
                <form action="" class="card">
                    <div class="row p-4">
                        <div class="col-md-3">
                            <div class="">
                                <label class="form-label fw-bold m-0">Amount</label>
                                <input type="text" name="amount" id="amount"
                                    class="form-control form-control1" placeholder="000000.00">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-bold m-0">Expense Type</label>
                            <select id="InputState" class="form-select form-control form-control1">
                                <option selected="" disabled="">Select Type.....
                                </option>
                                <option>Financial Expenses Expense
                                </option>
                                <option>Extraordinary Expenses
                                </option>
                                <option>Non-Operating Expenses
                                </option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <div class="">
                                <label class="form-label fw-bold m-0">Expense Date</label>
                                <input type="date" name="date" id="date" class="form-control form-control1">
                            </div>
                        </div>
                        <div class="col-md-2 p-0">
                            <div class="form-control form-control1 upload1 mt-3">
                                <label for="uploadquestion"
                                    class="btn text-white py-2 px-3 red-bg fw-bolder ">Upload Bill
                                </label>
                                <input type="file" id="uploadquestion"
                                    class="form-control form-control1 text-white custom-file-input opacity btn-hover" />
                            </div>
                        </div>
                        <div class="col-md-2 p-0 mt-3 ">

                            <button class="btn btn-success " style="margin-top: 2px;">Add Expense</button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
            


<?php include __DIR__ . '/../Layout/footer.php'; ?>


</div>
</div>
<?php include __DIR__ . '/../Layout/jsLinks.php'; ?>
<script>
    $(".custom-file-input").change(function() {
        var i = $(this).prev("label").clone();
        var file = $(this)[0].files[0].name;
        $(this).prev("label").text(file);
    });
</script>
</body>
</html>