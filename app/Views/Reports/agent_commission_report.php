<div class="body-header border-0 rounded-0 px-xl-4 px-md-2">
    <div class="container-fluid">
        <div class="row pt-2">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center py-2">
                    <ol class="breadcrumb rounded-0 mb-0 ps-0 bg-transparent flex-grow-1">
                        <li class="breadcrumb-item"><a href="<?=base_url();?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Agent Commission Report</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="body mb-2 px-xl-4 px-md-2">
    <div class="container-fluid">
        <div class="">
            <div class="col-md-12 p-0 m-auto">
                <!-- <div class="red-bg text-center text-white rounded py-2 mb-3">
                    <h1 class=" fw-bolder">Agent Commission Report</h1>
                </div> -->
            </div>
            <div class="col-md-12 m-auto card py-4 px-4">
                <div class="row border border-bottom border-0 border-2  py-3 mb-3 rounded ">
                    <div class="col-md-3">
                        <label for="date" class="">To :-</label>
                        <input class="form-control text-muted border border-primary shadow" id="date"
                            name="date" placeholder="Start Date" type="date">
                    </div>
                    <div class="col-md-3 ">
                        <label for="date" class="">From :-</label>
                        <input class="form-control text-muted border border-primary shadow" id="date"
                            name="date" placeholder="End Date" type="date">
                    </div>
                    <div class="col-md-3 mt-4  text-center">
                        <button class="btn red-bg text-white w-100 fw-bold">Commission Report</button>
                    </div>
                    <div class="col-md-3 mt-4  text-center">
                        <button class="btn red-bg text-white  w-100 fw-bold"><i
                                class="fa fa-cloud-download me-1"></i>Download Report</button>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card mb-4 border-0 lift">
                        <div
                            class="card-header py-3 d-flex flex-wrap  justify-content-between align-items-center bg-transparent border-bottom-0">
                            <div>
                                <h6 class="card-title m-0">Total Income (12/03/2021 - 23/03/2021)</h6>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="total-agent-report"></div>
                        </div>
                    </div>
                    <!-- .card end -->
                </div>
                <!-- <div class="col-12"> -->
                <div class="timeline-item card ti-danger border-bottom ms-2">
                    <div class="d-flex">
                        <img class="avatar sm rounded" src="<?=base_url();?>/assets/public/img/avatar1.jpg" alt="">
                        <div class="flex-fill ms-3">
                            <div class="mb-1"> <strong>Gerald Vaughn </strong> changed the Income status of
                                Property on <strong>Date:- 02/01/2021 - Property No. 12</strong>
                            </div> <span class="d-flex text-muted mb-3">Now, Income of Property is - 9:24PM
                                by <a class="ms-2" href="#" title=""><strong>You</strong></a> </span>
                        </div>
                    </div>
                </div>
                <!-- timeline item end  -->
                <div class="timeline-item ti-info border-bottom ms-2">
                    <div class="d-flex">
                        <img class="avatar sm rounded" src="<?=base_url();?>/assets/public/img/avatar2.jpg" alt="">
                        <div class="flex-fill ms-3">
                            <div class="mb-1"><strong>Gerald Vaughn </strong>changed the Income status of
                                Property on<strong> Date:- 02/01/2021 - Property No. 12</strong>
                            </div> <span class="d-flex text-muted mb-3">Now, Income of Property is - 9:24PM
                                by <a class="ms-2" href="#" title=""><strong>You</strong></a> </span>
                        </div>
                    </div>
                </div>
                <!-- timeline item end  -->
                <div class="timeline-item card ti-success border-bottom ms-2">
                    <div class="d-flex">
                        <img class="avatar sm rounded" src="<?=base_url();?>/assets/public/img/avatar1.jpg" alt="">
                        <div class="flex-fill ms-3">
                            <div class="mb-1"><strong>Gerald Vaughn </strong>changed the Income status of
                                Property on <strong>Date:- 02/01/2021 - Property No. 12</strong>
                            </div> <span class="d-flex text-muted mb-3">Now, Income of Property is - 9:24PM
                                by <a class="ms-2" href="#" title=""><strong>You</strong></a> </span>
                        </div>
                    </div>
                </div>
                <!-- timeline item end  -->
                <div class="timeline-item ti-primary border-bottom ms-2">
                    <div class="d-flex">
                        <img class="avatar sm rounded" src="<?=base_url();?>/assets/public/img/avatar2.jpg" alt="">
                        <div class="flex-fill ms-3">
                            <div class="mb-1"><strong>Gerald Vaughn </strong>changed the Income status of
                                Property on <strong>Date:- 02/01/2021 - Property No. 12</strong>
                            </div> <span class="d-flex text-muted mb-3">Now, Income of Property is - 9:24PM
                                by <a class="ms-2" href="#" title=""><strong>Other</strong></a> </span>
                        </div>
                    </div>
                </div>
                <!-- timeline item end  -->
                <div class="timeline-item card ti-warning border-bottom ms-2">
                    <div class="d-flex">
                        <img class="avatar sm rounded" src="<?=base_url();?>/assets/public/img/avatar1.jpg" alt="">
                        <div class="flex-fill ms-3">
                            <div class="mb-1">Gerald Vaughn changed the Income status of Property <strong>on
                                    Date:- 02/01/2021 - Property No. 12</strong>
                            </div> <span class="d-flex text-muted mb-3">Now, Income of Property is - 9:24PM
                                by <a class="ms-2" href="#" title=""><strong>You</strong></a> </span>
                        </div>
                    </div>
                </div>
                <!-- timeline item end  -->
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../Layout/footer.php'; ?>
</div>
</div>

<?php include __DIR__ . '/../Layout/jsLinks.php'; ?>
<script>
    var agentreport = {
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
        colors: ['var(--chart-color1)'],
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
    var chart = new ApexCharts(document.querySelector("#total-agent-report"), agentreport);
    chart.render();
</script>

</body>
</html>