<div class="body-header border-0 rounded-0 px-xl-4 px-md-2">
  <div class="container-fluid">
    <div class="row pt-2">
      <div class="col-12">

        <div class="d-flex justify-content-between align-items-center py-2">
          <ol class="breadcrumb rounded-0 mb-0 ps-0 bg-transparent flex-grow-1">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Property History</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="body mb-2 px-xl-4 px-md-2">
  <div class="container-fluid my-4">
    <!-- <div class="col-md-11 p-0 m-auto">
      <div class="red-bg text-center text-white rounded py-2 mb-3">
        <h1 class=" fw-bolder">Property History</h1>
      </div>
    </div> -->

    <div class="col-md-11 card px-4 m-auto bg-white">
      <div class="row mx-auto border border-bottom border-0 border-2 bg-white py-4 mb-3 rounded ">
        <div class="col-md-3 p-0">

          <input class="form-control text-muted border border-primary shadow" id="search" name="date" placeholder="Enter Property ID" type="text">
        </div>

        <div class="col-md-3 ">
          <input class="form-control text-muted border border-primary shadow" id="date" name="date" placeholder="Start Date" type="date">
        </div>
        <div class="col-md-2 p-0">
          <input class="form-control text-muted border border-primary shadow" id="date" name="date" placeholder="Start Date" type="date">
        </div>
        <div class="col-md-2">
          <input class="form-control text-muted border border-primary shadow" id="time" placeholder="Time" type="time">
        </div>
        <div class="col-md-2 p-0 text-center">
          <input class="btn red-bg border w-100 text-white py-2 fw-bold shadow" type="submit" value="View History">
        </div>
      </div>
      <!-- <div class="col-12"> -->
      <div class="timeline-item ti-danger border-bottom ms-2">
        <div class="d-flex">
          <img class="avatar sm rounded" src="<?= base_url(); ?>/assets/public/img/avatar1.jpg" alt="">
          <div class="flex-fill ms-3">
            <div class="mb-1"> <strong>Gerald Vaughn </strong> changed the status of Property on <strong>Date:- 02/01/2021 - Property No. 12</strong></div>
            <span class="d-flex text-muted mb-3">New address of Property - 9:24PM by <a class="ms-2" href="#" title=""><strong>You</strong></a> </span>

          </div>
        </div>
      </div> <!-- timeline item end  -->
      <div class="timeline-item ti-info border-bottom ms-2">
        <div class="d-flex">
          <img class="avatar sm rounded" src="<?= base_url(); ?>/assets/public/img/avatar2.jpg" alt="">
          <div class="flex-fill ms-3">
            <div class="mb-1"><strong>Gerald Vaughn </strong>changed the status of Property on<strong> Date:- 02/01/2021 - Property No. 12</strong></div>
            <span class="d-flex text-muted mb-3">New address of Property - 9:24PM by <a class="ms-2" href="#" title=""><strong>You</strong></a> </span>

          </div>
        </div>
      </div> <!-- timeline item end  -->
      <div class="timeline-item ti-success border-bottom ms-2">
        <div class="d-flex">
          <img class="avatar sm rounded" src="<?= base_url(); ?>/assets/public/img/avatar1.jpg" alt="">
          <div class="flex-fill ms-3">
            <div class="mb-1"><strong>Gerald Vaughn </strong>changed the status of Property on <strong>Date:- 02/01/2021 - Property No. 12</strong></div>
            <span class="d-flex text-muted mb-3">New address of Property - 9:24PM by <a class="ms-2" href="#" title=""><strong>You</strong></a> </span>

          </div>
        </div>
      </div> <!-- timeline item end  -->
      <div class="timeline-item ti-primary border-bottom ms-2">
        <div class="d-flex">
          <img class="avatar sm rounded" src="<?= base_url(); ?>/assets/public/img/avatar2.jpg" alt="">
          <div class="flex-fill ms-3">
            <div class="mb-1"><strong>Gerald Vaughn </strong>changed the status of Property on <strong>Date:- 02/01/2021 - Property No. 12</strong></div>
            <span class="d-flex text-muted mb-3">New address of Property - 9:24PM by <a class="ms-2" href="#" title=""><strong>Other</strong></a> </span>

          </div>
        </div>
      </div> <!-- timeline item end  -->
      <div class="timeline-item ti-warning border-bottom ms-2">
        <div class="d-flex">
          <img class="avatar sm rounded" src="<?= base_url(); ?>/assets/public/img/avatar1.jpg" alt="">
          <div class="flex-fill ms-3">
            <div class="mb-1">Gerald Vaughn changed the status of Property <strong>on Date:- 02/01/2021 - Property No. 12</strong></div>
            <span class="d-flex text-muted mb-3">New address of Property - 9:24PM by <a class="ms-2" href="#" title=""><strong>You</strong></a> </span>
          </div>
        </div>
      </div> <!-- timeline item end  -->
      <!-- </div> -->





    </div>
  </div>
</div>

<?php include __DIR__ . '/../Layout/footer.php'; ?>
</div>
</div>
<?php include __DIR__ . '/../Layout/jsLinks.php'; ?>
</body>

</html>