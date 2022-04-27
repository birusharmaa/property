<div class="body-header border-0 rounded-0 px-xl-4 px-md-2">
    <div class="container-fluid">
        <div class="row pt-2">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center py-2">
                    <ol class="breadcrumb rounded-0 mb-0 ps-0 bg-transparent flex-grow-1">
                        <li>
                            <div class="text text-danger">
                                <?php
                                    $session = session();
                                    echo "<pre>";
                                    print_r($session->getFlashdata());
                                ?>
                            </div>
                        
                        </li>
                        <li class="breadcrumb-item">
                            <a href="<?= base_url(); ?>/dashboard">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="body mb-2 px-xl-4 px-md-2">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
                <div class="row g-2">
                    <div class="col-md-6 one1">
                        <div class="card">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card-body">
                                        <h6 class="card-title">Login at: 09:52 am</h6>
                                        <a href="#" class="btn btn-sm btn-primary">Clock Out</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 one2">
                        <div class="card">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card-body">
                                        <h6 class="card-title">First Break</h6>
                                        <a href="#" class="btn btn-sm btn-primary">Start First Break</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 one3">
                        <div class="card">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card-body">
                                        <h6 class="card-title">Lunch Break</h6>
                                        <a href="#" class="btn btn-sm btn-primary">Start Lunch Break</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 one4">
                        <div class="card">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card-body">
                                        <h6 class="card-title">Second Break</h6>
                                        <a href="#" class="btn btn-sm btn-primary">Start Second
                                            Break</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 one5">
                        <div class="card">
                            <div class="row">
                                <div class="col-9">
                                    <div class="card-body">
                                        <h6 class="card-title">TOTAL LEADS</h6>
                                        <h6 class="card-title">22,500</h6>
                                        <p class="card-text">Analytics for last week</p>
                                    </div>
                                </div>
                                <div class="col-3 pt-4">
                                    <div class="avatar avatar1 lg rounded-circle no-thumbnail bg-primary text-light">
                                        <i class="fa-solid fa-chart-line fa-lg"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="row">
                                <div class="col-9">
                                    <div class="card-body">
                                        <h6 class="card-title">TOTAL MEETINGS</h6>
                                        <h6 class="card-title">22,500</h6>
                                        <p class="card-text">Analytics for last week</p>
                                    </div>
                                </div>
                                <div class="col-3 pt-4">
                                    <div class="avatar avatar1 lg rounded-circle no-thumbnail bg-primary text-light">
                                        <i class="fa-solid fa-handshake fa-lg"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="row">
                                <div class="col-9">
                                    <div class="card-body">
                                        <h6 class="card-title">TOTAL SALE</h6>
                                        <h6 class="card-title">22,500</h6>
                                        <p class="card-text">Analytics for last week</p>
                                    </div>
                                </div>
                                <div class="col-3 pt-4">
                                    <div class="avatar avatar1 lg rounded-circle no-thumbnail bg-primary text-light">
                                        <i class="fa-solid fa-bullhorn fa-lg"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="row">
                                <div class="col-9">
                                    <div class="card-body">
                                        <h6 class="card-title">TOTAL PAYMENT</h6>
                                        <h6 class="card-title">22,500</h6>
                                        <p class="card-text">Analytics for last week</p>
                                    </div>
                                </div>
                                <div class="col-3 pt-4">
                                    <div class="avatar avatar1 lg rounded-circle no-thumbnail bg-primary text-light">
                                        <i class="fa-solid fa-hand-holding-dollar fa-lg"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="row">
                                <div class="col-9">
                                    <div class="card-body">
                                        <h6 class="card-title">HOT LEADS</h6>
                                        <h6 class="card-title">22,500</h6>
                                        <p class="card-text">Analytics for last week</p>
                                    </div>
                                </div>
                                <div class="col-3 pt-4">
                                    <div class="avatar avatar1 lg rounded-circle no-thumbnail bg-primary text-light">
                                        <i class="fa-solid fa-chart-line fa-lg"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row pt-3">
                    <div class="col-md-12">
                        <div class="card mb-4 border-0 lift">
                            <div class="card-header py-3 d-flex flex-wrap  justify-content-between align-items-center bg-transparent border-bottom-0">
                                <div>
                                    <h6 class="card-title m-0">Total Leads</h6>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="card-header border">
                                    <div class="d-flex flex-row align-items-center">
                                        <div>
                                            <h6 class="mb-0 fw-bold">$3,056</h6>
                                            <small class="text-muted font-11">Rate</small>
                                        </div>
                                        <div class="ms-lg-5 ms-md-4 ms-3">
                                            <h6 class="mb-0 fw-bold">$1,998</h6>
                                            <small class="text-muted font-11">Value</small>
                                        </div>
                                        <div class="d-none d-sm-block ms-auto">
                                            <div class="btn-group" role="group">
                                                <input type="radio" class="btn-check" name="btnradio" id="btnradio1">
                                                <label class="btn btn-outline-secondary" for="btnradio1">Week</label>

                                                <input type="radio" class="btn-check" name="btnradio" id="btnradio2">
                                                <label class="btn btn-outline-secondary" for="btnradio2">Month</label>

                                                <input type="radio" class="btn-check" name="btnradio" id="btnradio3" checked="">
                                                <label class="btn btn-outline-secondary" for="btnradio3">Year</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="total-leads"></div>
                            </div>
                        </div> <!-- .card end -->
                    </div>

                    <div class="col-md-12">
                        <div class="card mb-4 border-0 lift">
                            <div class="card-header py-3 d-flex flex-wrap  justify-content-between align-items-center bg-transparent border-bottom-0">
                                <div>
                                    <h6 class="card-title m-0">Total Meetings</h6>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="card-header border">
                                    <div class="d-flex flex-row align-items-center">
                                        <div>
                                            <h6 class="mb-0 fw-bold">$3,056</h6>
                                            <small class="text-muted font-11">Rate</small>
                                        </div>
                                        <div class="ms-lg-5 ms-md-4 ms-3">
                                            <h6 class="mb-0 fw-bold">$1,998</h6>
                                            <small class="text-muted font-11">Value</small>
                                        </div>
                                        <div class="d-none d-sm-block ms-auto">
                                            <div class="btn-group" role="group">
                                                <input type="radio" class="btn-check" name="btnradio" id="btnradioleads">
                                                <label class="btn btn-outline-secondary" for="btnradioleads">Week</label>

                                                <input type="radio" class="btn-check" name="btnradio" id="btnradioleads2">
                                                <label class="btn btn-outline-secondary" for="btnradioleads2">Month</label>

                                                <input type="radio" class="btn-check" name="btnradio" id="btnradioleads3" checked="">
                                                <label class="btn btn-outline-secondary" for="btnradioleads3">Year</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="total-meetings"></div>
                            </div>
                        </div> <!-- .card end -->
                    </div>

                    <div class="col-md-12">
                        <div class="card mb-4 border-0 lift">
                            <div class="card-header py-3 d-flex flex-wrap  justify-content-between align-items-center bg-transparent border-bottom-0">
                                <div>
                                    <h6 class="card-title m-0">Total Sale</h6>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="card-header border">
                                    <div class="d-flex flex-row align-items-center">
                                        <div>
                                            <h6 class="mb-0 fw-bold">$3,056</h6>
                                            <small class="text-muted font-11">Rate</small>
                                        </div>
                                        <div class="ms-lg-5 ms-md-4 ms-3">
                                            <h6 class="mb-0 fw-bold">$1,998</h6>
                                            <small class="text-muted font-11">Value</small>
                                        </div>
                                        <div class="d-none d-sm-block ms-auto">
                                            <div class="btn-group" role="group">
                                                <input type="radio" class="btn-check" name="btnradio" id="btnradiosale">
                                                <label class="btn btn-outline-secondary" for="btnradiosale">Week</label>

                                                <input type="radio" class="btn-check" name="btnradio" id="btnradiosale2">
                                                <label class="btn btn-outline-secondary" for="btnradiosale2">Month</label>

                                                <input type="radio" class="btn-check" name="btnradio" id="btnradiosale3" checked="">
                                                <label class="btn btn-outline-secondary" for="btnradiosale3">Year</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="total-sale"></div>
                            </div>
                        </div> <!-- .card end -->
                    </div>

                    <div class="col-md-12">
                        <div class="card mb-4 border-0 lift">
                            <div class="card-header py-3 d-flex flex-wrap  justify-content-between align-items-center bg-transparent border-bottom-0">
                                <div>
                                    <h6 class="card-title m-0">Total Payment</h6>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="card-header border">
                                    <div class="d-flex flex-row align-items-center">
                                        <div>
                                            <h6 class="mb-0 fw-bold">$3,056</h6>
                                            <small class="text-muted font-11">Rate</small>
                                        </div>
                                        <div class="ms-lg-5 ms-md-4 ms-3">
                                            <h6 class="mb-0 fw-bold">$1,998</h6>
                                            <small class="text-muted font-11">Value</small>
                                        </div>
                                        <div class="d-none d-sm-block ms-auto">
                                            <div class="btn-group" role="group">
                                                <input type="radio" class="btn-check" name="btnradio" id="btnradiopayment">
                                                <label class="btn btn-outline-secondary" for="btnradiopayment">Week</label>

                                                <input type="radio" class="btn-check" name="btnradio" id="btnradiopayment2">
                                                <label class="btn btn-outline-secondary" for="btnradiopayment2">Month</label>

                                                <input type="radio" class="btn-check" name="btnradio" id="btnradiopayment3" checked="">
                                                <label class="btn btn-outline-secondary" for="btnradiopayment3">Year</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="total-payment"></div>
                            </div>
                        </div> <!-- .card end -->
                    </div>



                </div>
                <div class="row one7">
                    <div class="col-md-12">
                        <div class="mt-2">
                            <div class="col-md-12 p-0">
                                <div class="red-bg text-center text-white rounded py-2 mb-2">
                                    <h3 class=" fw-bolder">Marketing Cost Evaluator</h3>
                                </div>
                            </div>
                        </div>
                        <section class="form-section card">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form class="row g-3">
                                            <div class="col-md-6">
                                                <label for="validationServer01" class="form-label">Total
                                                    Marketing Cost</label>
                                                <input type="text" class="form-control is-valid" id="validationServer01" value="" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="validationServer01" class="form-label">Number of
                                                    Leads</label>
                                                <input type="text" class="form-control is-valid" id="validationServer01" value="" required>
                                            </div>
                                            <div class="col-md-6">
                                                <table class="table table-hover table-striped">
                                                    <tbody>
                                                        <tr>
                                                            <th>Total Amount</th>
                                                            <th>15,003</th>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </form>
                                    </div>
                        </section>
                    </div>
                </div>
            </div>
            <!-- //slider// -->
            <div class="col-md-3">
                <div class="g-2 sliderinx row">
                    <div class="col-md-12">
                        <div id="owl1" class="owl-carousel one6 owl-theme">
                            <div class="item">
                                <div class="card cardd">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card-body text-center">
                                                <h6 class="card-title red-bg text-white rounded py-2">
                                                    MEETING'S</h6>
                                                <h6 class="card-title">2/22/2020</h6>
                                                <p class="card-text">Analytics for last week</p>
                                                <hr>
                                                <p class="card-text">Analytics for last week Responsive
                                                    option can be used Try changing your browser
                                                    width to see what happens with Items and
                                                    Navigations.</p>
                                                <hr>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="card cardd">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card-body text-center">
                                                <h6 class="card-title red-bg text-white rounded py-2">LEAD'S
                                                </h6>
                                                <h6 class="card-title">2/22/2020</h6>
                                                <p class="card-text">Analytics for last week</p>
                                                <hr>
                                                <p class="card-text">Responsive option can be used for
                                                    setting breakpoints width to see what happens
                                                    with Items and Navigations.</p>
                                                <hr>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="card cardd">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card-body text-center">
                                                <h6 class="card-title red-bg text-white rounded py-2">TOTAL
                                                    MEETING'S</h6>
                                                <h6 class="card-title">2/22/2020</h6>
                                                <p class="card-text">Analytics for last week</p>
                                                <hr>
                                                <p class="card-text">Responsive option can be used for
                                                    browser width to see what happens with Items and
                                                    Navigations.</p>
                                                <hr>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="card cardd">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card-body text-center">
                                                <h6 class="card-title red-bg text-white rounded py-2">BREAK
                                                </h6>
                                                <h6 class="card-title">2/22/2020</h6>
                                                <p class="card-text">Analytics for last week</p>
                                                <hr>
                                                <p class="card-text">Responsive option can be used for
                                                    setting breakpoints and additional with Items and
                                                    Navigations.</p>
                                                <hr>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div id="owl2" class="owl-carousel owl-theme">
                            <div class="item">
                                <div class="card">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card-body text-center">
                                                <h6 class="card-title badge bg-warning text-white">HOLIDAY'S
                                                </h6>
                                                <h6 class="card-title">2/22/2020</h6>
                                                <p class="card-text">Analytics for last week</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="card">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card-body text-center">
                                                <h6 class="card-title badge bg-danger text-white">BREAK'S
                                                </h6>
                                                <h6 class="card-title">2/22/2020</h6>
                                                <p class="card-text">Analytics for last week</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="card">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card-body text-center">
                                                <h6 class="card-title badge bg-success text-white">PAYMENT
                                                </h6>
                                                <h6 class="card-title">2/22/2020</h6>
                                                <p class="card-text">Analytics for last week</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="card">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card-body text-center">
                                                <h6 class="card-title badge bg-danger text-white">MEETING
                                                    SOON</h6>
                                                <h6 class="card-title">2/22/2020</h6>
                                                <p class="card-text">Analytics for last week</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    var leadsOption = {
        chart: {
            height: 300,
            type: 'line',
        },
        colors: ['var(--primary-color)'],
        series: [{
            name: 'Leads',
            type: 'column',
            data: [440, 505, 414, 671, 227, 413, 201, 352, 752, 320, 257, 160]
        }],
        stroke: {
            width: [0, 4]
        },
        labels: ['01 Jan 2001', '02 Jan 2001', '03 Jan 2001', '04 Jan 2001', '05 Jan 2001', '06 Jan 2001',
            '07 Jan 2001', '08 Jan 2001', '09 Jan 2001', '10 Jan 2001', '11 Jan 2001', '12 Jan 2001'
        ],
        xaxis: {
            type: 'datetime'
        },
        yaxis: [{
            title: {
                text: 'No of leads',
            },

        }]
    }
    var chart = new ApexCharts(document.querySelector("#total-leads"), leadsOption);
    chart.render();

    // total-meetings
    var meetingsOption = {
        chart: {
            height: 300,
            type: 'area',
        },
        colors: ['var(--primary-color)'],
        series: [{
            name: 'Meetings',
            data: [440, 505, 414, 671, 227, 413, 201, 352, 752, 320, 257, 160]
        }],
        stroke: {
            width: [0, 4]
        },
        labels: ['01 Jan 2001', '02 Jan 2001', '03 Jan 2001', '04 Jan 2001', '05 Jan 2001', '06 Jan 2001',
            '07 Jan 2001', '08 Jan 2001', '09 Jan 2001', '10 Jan 2001', '11 Jan 2001', '12 Jan 2001'
        ],
        xaxis: {
            type: 'datetime'
        },
        yaxis: [{
            title: {
                text: 'No of Meetings',
            },

        }]
    }
    var chart = new ApexCharts(document.querySelector("#total-meetings"), meetingsOption);
    chart.render();

    // total-sale
    var saleOption = {
        chart: {
            height: 300,
            type: 'line',
            dropShadow: {
                enabled: true,
                color: '#000',
                top: 18,
                left: 7,
                blur: 10,
                opacity: 0.2
            },
        },
        colors: ['var(--primary-color)'],
        series: [{
                name: "Sales",
                data: [28, 29, 33, 36, 32, 32, 33]
            },
            {
                name: "Sales",
                data: [12, 11, 14, 18, 17, 13, 13]
            }
        ],
        colors: ['#77B6EA', '#545454'],
        dataLabels: {
            enabled: true,
        },
        stroke: {
            curve: 'smooth'
        },
        colors: ['var(--primary-color)'],
        markers: {
            size: 1
        },
        xaxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
        },
        yaxis: {
            title: {
                text: 'No of Sales'
            },
            min: 5,
            max: 40
        },
        legend: {
            position: 'top',
            horizontalAlign: 'right',
            floating: true,
            offsetY: -25,
            offsetX: -5
        }
    };
    var chart = new ApexCharts(document.querySelector("#total-sale"), saleOption);
    chart.render();

    // total-payment
    var paymentOption = {
        series: [{
                name: "Pyament",
                data: [45, 52, 38, 24, 33, 26, 21, 20, 6, 8, 15, 10]
            },
            {
                name: "Page Views",
                data: [35, 41, 62, 42, 13, 18, 29, 37, 36, 51, 32, 35]
            },
            {
                name: 'Total Visits',
                data: [87, 57, 74, 99, 75, 38, 62, 47, 82, 56, 45, 47]
            }
        ],
        chart: {
            height: 300,
            type: 'line',
        },
        colors: ['var(--primary-color)'],
        dataLabels: {
            enabled: false
        },
        legend: {
            show: false
        },
        stroke: {
            width: [5, 7, 5],
            curve: 'straight',
            dashArray: [0, 8, 5]
        },
        // markers: {
        //   size: 0,
        //   hover: {
        //     sizeOffset: 6
        //   }
        // },
        xaxis: {
            categories: ['01 Jan', '02 Jan', '03 Jan', '04 Jan', '05 Jan', '06 Jan', '07 Jan', '08 Jan',
                '09 Jan',
                '10 Jan', '11 Jan', '12 Jan'
            ],
        },
        yaxis: [{
            title: {
                text: 'No of Payment',
            },

        }]
    };
    var chart = new ApexCharts(document.querySelector("#total-payment"), paymentOption);
    chart.render();

    $('#owl1,#owl2').owlCarousel({
        loop: true,
        margin: 10,
        nav: false,
        items: 1,
        dots: false,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true
    })



    // $(document).ready(function(){
    //     window.tour = new Tour({
    //         padding: 0,
    //         nextText: 'More',
    //         doneText: 'Done',
    //         prevText: 'Less',
    //         tipClasses: 'tip-class active',
    //         steps: [
    //             {
    //             element: ".one1",
    //             title: "Login Timing",
    //             description: "This box is timing Clock!",
    //             position: "right"
    //             },
    //             {
    //             element: ".one2",
    //             title: "First Break",
    //             description: "This box is First Break timing Clock!",
    //             data: "Custom Data",
    //             position: "bottom"
    //             },
    //             {
    //             element: ".one3",
    //             title: "Lunch Break",
    //             description: "This box is Lunch Break timing Clock!",
    //             position: "bottom"
    //             },
    //             {
    //             element: ".one4",
    //             title: "Second break",
    //             description: "This box is Lunch Break timing Clock!",
    //             position: "left"
    //             },
    //             {
    //             element: ".one5",
    //             title: "Total Leads",
    //             description: "This box is total clients lead!",
    //             position: "top"
    //             },
    //             {
    //             element: ".one6",
    //             title: "Total Meetings",
    //             description: "This box is total clients Meeting!",
    //             position: "left"
    //             },
    //             {
    //             element: ".one7",
    //             title: "Total Sale",
    //             description: "This box is total sale!",
    //             position: "top"
    //             },
    //             {
    //             element: ".one8",
    //             title: "Total Payment",
    //             description: "This box is total clients Payment lead!",
    //             position: "top"
    //             },
    //             {
    //             element: ".one9",
    //             title: "Hot Leads",
    //             description: "This box is Hot lead!",
    //             position: "top"
    //             },
    //         ]
    //     })
    //     tour.start();
    // })
</script>

