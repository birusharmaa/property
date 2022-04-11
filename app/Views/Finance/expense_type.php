<div class="body-header border-0 rounded-0 px-xl-4 px-md-2">
    <div class="container-fluid">
        <div class="row pt-2">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center py-2">
                    <ol class="breadcrumb rounded-0 mb-0 ps-0 bg-transparent flex-grow-1">
                        <li class="breadcrumb-item"><a href="<?=base_url();?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Expense Type</li>
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
                    <div class="red-bg text-center text-white rounded py-2 mb-3">
                        <h1 class=" fw-bolder">Expense Type</h1>
                    </div>
                    <div class="card p-4">
                        <table id="expensetype" class="table table-striped display dataTable table-hover"
                            style="width:100%">
                            <div class="align1 pb-2">
                                <button class="btn btn-primary" data-bs-toggle="modal"
                                    href="#expensemodal2" type="submit">Add Expense Type</button>
                            </div>
                            <thead>
                                <tr class="py-3 table-info">
                                    <th>#ID</th>
                                    <th>Expense Type</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="sorting_1 id-red fw-bold">01</td>
                                    <td>Name 1</td>
                                    <td>
                                        <a href="">
                                            <i
                                                class="fa fa-trash-o delete-details text-white bg-danger text-center rounded"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="sorting_1 id-red fw-bold">02</td>
                                    <td>Name 1</td>
                                    <td>
                                        <a href="">
                                            <i
                                                class="fa fa-trash-o delete-details text-white bg-danger text-center rounded"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="sorting_1 id-red fw-bold">03</td>
                                    <td>Name 1</td>
                                    <td>
                                        <a href="">
                                            <i
                                                class="fa fa-trash-o delete-details text-white bg-danger text-center rounded"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="sorting_1 id-red fw-bold">04</td>
                                    <td>Name 1</td>
                                    <td>
                                        <a href="">
                                            <i
                                                class="fa fa-trash-o delete-details text-white bg-danger text-center rounded"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="sorting_1 id-red fw-bold">05</td>
                                    <td>Name 1</td>
                                    <td>
                                        <a href="">
                                            <i
                                                class="fa fa-trash-o delete-details text-white bg-danger text-center rounded"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="sorting_1 id-red fw-bold">06</td>
                                    <td>Name 1</td>
                                    <td>
                                        <a href="">
                                            <i
                                                class="fa fa-trash-o delete-details text-white bg-danger text-center rounded"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="sorting_1 id-red fw-bold">07</td>
                                    <td>Name 1</td>
                                    <td>
                                        <a href="">
                                            <i
                                                class="fa fa-trash-o delete-details text-white bg-danger text-center rounded"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="sorting_1 id-red fw-bold">08</td>
                                    <td>Name 1</td>
                                    <td>
                                        <a href="">
                                            <i
                                                class="fa fa-trash-o delete-details text-white bg-danger text-center rounded"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="sorting_1 id-red fw-bold">09</td>
                                    <td>Name 1</td>
                                    <td>
                                        <a href="">
                                            <i
                                                class="fa fa-trash-o delete-details text-white bg-danger text-center rounded"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="sorting_1 id-red fw-bold">10</td>
                                    <td>Name 1</td>
                                    <td>
                                        <a href="">
                                            <i
                                                class="fa fa-trash-o delete-details text-white bg-danger text-center rounded"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="sorting_1 id-red fw-bold">11</td>
                                    <td>Name 1</td>
                                    <td>
                                        <a href="">
                                            <i
                                                class="fa fa-trash-o delete-details text-white bg-danger text-center rounded"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div> <!-- .card end -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- First modal dialog -->
<div class="modal fade" id="expensemodal2" aria-hidden="true" aria-labelledby="expensemdl2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content card">
            <div class="modal-header">
                <h5 class="modal-title" id="expensemdl2">Add Expense</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <!-- Name input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="expensename">Expense Type</label>
                        <input type="text" id="expensename" class="form-control form-control1" />
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-bs-target="#categroymodl2" data-bs-toggle="modal"
                    data-bs-dismiss="modal">
                    ADD
                </button>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../Layout/footer.php'; ?>
</div>
</div>

<?php include __DIR__ . '/../Layout/jsLinks.php'; ?>
<script>
$(document).ready(function() {
    $('#expensetype').DataTable();
})
</script>

</body>
</html>