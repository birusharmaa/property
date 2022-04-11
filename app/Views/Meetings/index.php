<div class="body-header border-0 rounded-0 px-xl-4 px-md-2">
    <div class="container-fluid">
        <div class="row pt-2">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center py-2">
                    <ol class="breadcrumb rounded-0 mb-0 ps-0 bg-transparent flex-grow-1">
                        <li class="breadcrumb-item"><a href="<?=base_url();?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Meetings</li>
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
                        <h1 class=" fw-bolder">All Meetings</h1>
                    </div> -->
                    <div class="card p-4">
                        <div class="text-end mb-3">
                            <button type="button" class="btn red-bg fw-bold text-white me-2"
                                data-bs-toggle="modal" data-bs-target="#meetingsModal">
                                Add Meetings
                            </button>
                        </div>
                        <table id="allMeetings" class="table display dataTable table-hover"
                            style="width:100%">
                            <thead>
                                <tr class="py-3">
                                    <th>#ID</th>
                                    <th>Meeting With</th>
                                    <th>Meeting Purpose</th>
                                    <th>Meeting Date</th>
                                    <th>Meeting Time</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php for($i=1; $i<=20; $i++) { ?>
                                <tr>
                                    <td class="sorting_1 id-red fw-bold"><?= $i ?></td>
                                    <td class="ps-5">Name<?= $i ?></td>
                                    <td class="ps-5">Meeting Purpose...</td>
                                    <td class="ps-4">12/09/2021</td>
                                    <td class="ps-5"><?= $i ?>:00</td>

                                    <td class="ps-4">

                                        <a href="#">
                                            <i
                                                class="fa fa-edit edit-details text-white me-1  text-center rounded"></i>
                                        </a>
                                        <a href="">
                                            <i
                                                class="fa fa-trash-o delete-details text-white bg-danger text-center rounded"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
$(document).ready(function() {
    $('#allMeetings').DataTable();
})
</script>