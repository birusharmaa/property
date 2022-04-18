<div class="body-header border-0 rounded-0 px-xl-4 px-md-2">
    <div class="container-fluid">
        <div class="row pt-2">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center py-2">
                    <ol class="breadcrumb rounded-0 mb-0 ps-0 bg-transparent flex-grow-1">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">leaves</li>
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
                    <!-- <div class="red-bg text-center text-white rounded py-2 mb-3">
                                <h1 class=" fw-bolder">leaves</h1>
                            </div> -->
                    <div class="card p-4 mb-4">
                        <table id="leavestbl" class="table display dataTable table-hover" style="width:100%">
                            <div class="align1 pb-2">
                                <button class="btn btn-primary" data-bs-toggle="modal" href="#leavesmodal2" type="submit">Add leaves</button>
                            </div>
                            <thead>
                                <tr class="py-3">
                                    <th>#ID</th>
                                    <th>Leave type</th>
                                    <th>Date</th>
                                    <th>Duration</th>
                                    <th>Reason</th>
                                    <th>Status</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="sorting_1 id-red fw-bold">01</td>
                                    <td>Name 1</td>
                                    <td>Name 1</td>
                                    <td>Name 1</td>
                                    <td>Name 1</td>
                                    <td>Name 1</td>
                                    <td>
                                        <a href="">
                                            <i class="fa fa-trash-o delete-details text-white bg-danger text-center rounded"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="sorting_1 id-red fw-bold">02</td>
                                    <td>Name 2</td>
                                    <td>Name 2</td>
                                    <td>Name 2</td>
                                    <td>Name 2</td>
                                    <td>Name 2</td>
                                    <td>
                                        <a href="">
                                            <i class="fa fa-trash-o delete-details text-white text-center rounded bg-danger"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="sorting_1 id-red fw-bold">03</td>
                                    <td>Name 3</td>
                                    <td>Name 2</td>
                                    <td>Name 2</td>
                                    <td>Name 2</td>
                                    <td>Name 2</td>
                                    <td>
                                        <a href="">
                                            <i class="fa fa-trash-o delete-details text-white text-center rounded bg-danger"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="sorting_1 id-red fw-bold">04</td>
                                    <td>Name 4</td>
                                    <td>Name 2</td>
                                    <td>Name 2</td>
                                    <td>Name 2</td>
                                    <td>Name 2</td>
                                    <td>
                                        <a href="">
                                            <i class="fa fa-trash-o delete-details text-white text-center rounded bg-danger"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="sorting_1 id-red fw-bold">05</td>
                                    <td>Name 5</td>
                                    <td>Name 2</td>
                                    <td>Name 2</td>
                                    <td>Name 2</td>
                                    <td>Name 2</td>
                                    <td>
                                        <a href="">
                                            <i class="fa fa-trash-o delete-details text-white text-center rounded bg-danger"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="sorting_1 id-red fw-bold">06</td>
                                    <td>Name 6</td>
                                    <td>Name 2</td>
                                    <td>Name 2</td>
                                    <td>Name 2</td>
                                    <td>Name 2</td>
                                    <td>
                                        <a href="">
                                            <i class="fa fa-trash-o delete-details text-white text-center rounded bg-danger"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="sorting_1 id-red fw-bold">07</td>
                                    <td>Name 7</td>
                                    <td>Name 2</td>
                                    <td>Name 2</td>
                                    <td>Name 2</td>
                                    <td>Name 2</td>
                                    <td>
                                        <a href="">
                                            <i class="fa fa-trash-o delete-details text-white text-center rounded bg-danger"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="sorting_1 id-red fw-bold">08</td>
                                    <td>Name 8</td>
                                    <td>Name 2</td>
                                    <td>Name 2</td>
                                    <td>Name 2</td>
                                    <td>Name 2</td>
                                    <td>
                                        <a href="">
                                            <i class="fa fa-trash-o delete-details text-white text-center rounded bg-danger"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="sorting_1 id-red fw-bold">09</td>
                                    <td>Name 9</td>
                                    <td>Name 2</td>
                                    <td>Name 2</td>
                                    <td>Name 2</td>
                                    <td>Name 2</td>
                                    <td>
                                        <a href="">
                                            <i class="fa fa-trash-o delete-details text-white text-center rounded bg-danger"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="sorting_1 id-red fw-bold">10</td>
                                    <td>Name 10</td>
                                    <td>Name 2</td>
                                    <td>Name 2</td>
                                    <td>Name 2</td>
                                    <td>Name 2</td>
                                    <td>
                                        <a href="">
                                            <i class="fa fa-trash-o delete-details text-white text-center rounded bg-danger"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="sorting_1 id-red fw-bold">11</td>
                                    <td>Name 11</td>
                                    <td>Name 2</td>
                                    <td>Name 2</td>
                                    <td>Name 2</td>
                                    <td>Name 2</td>
                                    <td>
                                        <a href="">
                                            <i class="fa fa-trash-o delete-details text-white text-center rounded bg-danger"></i>
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
<div class="modal fade" id="leavesmodal2" aria-hidden="true" aria-labelledby="leavesmdl2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content card">
            <div class="modal-header red-bg">
                <h5 class="modal-title text-white" id="leavesmdl2">Apply leave</h5>
                <button type="button" class="btn-close-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <!-- Name input -->
                    <div class="form-outline mb-4">
                        <label class="form-label fw-bold">Leave type</label>
                        <select class="form-select form-control1" aria-label="Default select example">
                            <option selected>-</option>
                            <option value="1">earned leave</option>
                            <option value="2">office off</option>
                            <option value="3">half day</option>
                        </select>
                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-label fw-bold">Duration</label>
                        <div class="g-2 form-group">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-4">
                                        <input type="radio" id="tab1" name="tab" checked>
                                        <label for="tab1">Single day</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="radio" id="tab2" name="tab">
                                        <label for="tab2">Multiple days</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="radio" id="tab3" name="tab">
                                        <label for="tab3">Hours</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="article1">
                        <div class="form-outline mb-4">
                            <label class="form-label" for="date1">Date</label>
                            <input type="date" id="date1" class="form-control form-control1" />
                        </div>
                    </div>
                    <div class="article1">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label" for="startdate">Start Date</label>
                                    <input type="date" id="startdate" class="form-control form-control1" />
                                </div>
                                <div class="col-md-6">
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="enddate">End Date</label>
                                        <input type="date" id="enddate" class="form-control form-control1" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="article1">
                        <div class="col-md-12">
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label class="form-label" for="date2">Date</label>
                                    <input type="date" id="date2" class="form-control form-control1" />
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="hours2">Hours</label>
                                    <input type="time" id="hours2" class="form-control form-control1" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-outline article1 mb-4">
                        <label class="form-label fw-bold" for="date3">Date2</label>
                        <input type="date" id="date3" class="form-control form-control1" />
                    </div>
                    <div class="form-outline article1 mb-4">
                        <label class="form-label fw-bold" for="date4">Date3</label>
                        <input type="date" id="date4" class="form-control form-control1" />
                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-label fw-bold" for="reason">Reason</label>
                        <textarea id="reason" class="form-control form-control1"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-primary" data-bs-target="#categroymodl2" data-bs-toggle="modal" data-bs-dismiss="modal">
                    Apply Leave
                </button>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('#leavestbl').DataTable();
    })

    $('[name=tab]').each(function(i, d) {
        var p = $(this).prop('checked');
        //   console.log(p);
        if (p) {
            $('.article1').eq(i)
                .addClass('on');
        }
    });

    $('[name=tab]').on('change', function() {
        var p = $(this).prop('checked');

        // $(type).index(this) == nth-of-type
        var i = $('[name=tab]').index(this);

        $('.article1').removeClass('on');
        $('.article1').eq(i).addClass('on');
    });
</script>