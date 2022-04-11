<div class="body-header border-0 rounded-0 px-xl-4 px-md-2">
    <div class="container-fluid">
        <div class="row pt-2">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center py-2">
                    <ol class="breadcrumb rounded-0 mb-0 ps-0 bg-transparent flex-grow-1">
                        <li class="breadcrumb-item"><a href="<?=base_url();?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">All Profit & Loss</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="body mb-2 d-flex py-lg-4 py-3">
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-11 m-auto">
              <div class="red-bg text-center text-white rounded py-2 mb-3">
                <h1 class=" fw-bolder">All Profit & Loss</h1>
              </div>

                <div class="card p-4 mb-4">
                    <table id="allprofitloss" class="table display dataTable table-hover" style="width:100%">
                        <thead>
                            <tr class="py-3">
                                <th>#ID</th>
                                <th>Amount</th>
                                <th>Profit/Loss</th>
                                <th>Date</th>
                                <th>Source</th>
                                <th>Action</th>
                             
                            </tr>
                        </thead>
                    <tbody>
              
                            <tr>
                                <td class="sorting_1 id-red fw-bold class="ps-4"">1</td>
                                <td class="ps-4">24000.00</td>
                                <td class="ps-4">
                                  <span class="badge bg-success font-size">Profit</span></td>
                                <td class="">12/03/21 - 23/04/2021</td>
                                <td class="ps-4">Income</td>
                                <td class="ps-4">

                                  <a href="">
                                  <i class="fa fa-trash-o delete-details text-white bg-danger text-center rounded"></i>
                                  </a>
                                </td>
                            </tr>

                            <tr>
                                <td class="sorting_1 id-red fw-bold">2</td>
                                <td class="ps-4">24000.00</td>
                                <td class="ps-4">
                                <span class="badge bg-danger font-size">Loss</span>
                                </td>
                                <td class="">12/03/21 - 23/04/2021</td>
                                <td class="ps-4">Expense</td>
                                <td class="ps-4">

                                  <a href="">
                                  <i class="fa fa-trash-o delete-details text-white bg-danger text-center rounded"></i>
                                  </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="sorting_1 id-red fw-bold">3</td>
                                <td class="ps-4">24000.00</td>
                                <td class="ps-4">
                                <span class="badge bg-success font-size">Profit</span>
                                </td>
                                <td class="">12/03/21 - 23/04/2021</td>
                                <td class="ps-4">Income</td>
                                <td class="ps-4">

                                  <a href="">
                                  <i class="fa fa-trash-o delete-details text-white bg-danger text-center rounded"></i>
                                  </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="sorting_1 id-red fw-bold">4</td>
                                <td class="ps-4">24000.00</td>
                                <td class="ps-4">
                                  <span class="badge bg-danger font-size">Loss</span>
                                </td>
                                <td class="">12/03/21 - 23/04/2021</td>
                                <td class="ps-4">Expense</td>
                                <td class="ps-4">

                                  <a href="">
                                  <i class="fa fa-trash-o delete-details text-white bg-danger text-center rounded"></i>
                                  </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="sorting_1 id-red fw-bold">5</td>
                                <td class="ps-4">24000.00</td>
                                <td class="ps-4">
                                <span class="badge bg-success font-size">Profit</span>
                                </td>
                                <td class="">12/03/21 - 23/04/2021</td>
                                <td class="ps-4">Income</td>
                                <td class="ps-4">

                                  <a href="">
                                  <i class="fa fa-trash-o delete-details text-white bg-danger text-center rounded"></i>
                                  </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="sorting_1 id-red fw-bold">6</td>
                                <td class="ps-4">24000.00</td>
                                <td class="ps-4">
                                <span class="badge bg-danger font-size">Loss</span>
                                </td>
                                <td class="">12/03/21 - 23/04/2021</td>
                                <td class="ps-4">Expense</td>
                                <td class="ps-4">

                                  <a href="">
                                  <i class="fa fa-trash-o delete-details text-white bg-danger text-center rounded"></i>
                                  </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="sorting_1 id-red fw-bold">7</td>
                                <td class="ps-4">24000.00</td>
                                <td class="ps-4">
                                <span class="badge bg-success font-size">Sell</span>

                                </td>
                                <td class="">12/03/21 - 23/04/2021</td>
                                <td class="ps-4">Income</td>
                                <td class="ps-4">

                                  <a href="">
                                  <i class="fa fa-trash-o delete-details text-white bg-danger text-center rounded"></i>
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

<?php include __DIR__ . '/../Layout/footer.php'; ?>
</div>
</div>

<?php include __DIR__ . '/../Layout/jsLinks.php'; ?>
    <script>
        $(document).ready(function(){
            $('#allprofitloss').DataTable();
        })
    </script> 
</body>
</html>