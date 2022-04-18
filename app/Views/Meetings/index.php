<div class="body-header border-0 rounded-0 px-xl-4 px-md-2">
    <div class="container-fluid">
        <div class="row pt-2">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center py-2">
                    <ol class="breadcrumb rounded-0 mb-0 ps-0 bg-transparent flex-grow-1">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
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
                    <div class="card p-4">
                        <div class="text-end mb-3">
                            <button type="button" class="btn red-bg fw-bold text-white me-2" id="btnAddMeeting" data-bs-toggle="modal" data-bs-target="#meetingsModal">
                                Add Meetings
                            </button>
                        </div>
                        <div class="table-responsive">
                            <table id="allMeetings" class="table display dataTable table-hover" style="width:100%">
                                <thead>
                                    <tr class="py-3">
                                        <th>#ID</th>
                                        <th>Employee</th>
                                        <th>Meeting With</th>
                                        <th>Meeting Purpose</th>
                                        <th>Meeting Date</th>
                                        <th>Meeting Time</th>
                                        <th>Meeting Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Meeting add models -->
<div class="modal fade" id="meetingsModal" tabindex="-1" aria-labelledby="meetingsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <form id="meetingForm">
            <div class="modal-content modal-margin">
                <div class="modal-header red-bg py-2">
                    <h5 class="fw-bold text-white" id="meeting-form-lable">
                        Add Meetings
                    </h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row mx-auto" id="meeting-section">
                                <div class="col-md-6">
                                    <label class="col-form-label fw-bold" for="employee">Orgniser by</label>
                                    <select class="form-select py-1 w-100 text-dark input-border" id="employee" name="employee">
                                        <option selected disabled>Select....
                                        </option>
                                        <?php if (!empty($employees)) : foreach ($employees as $key => $employee) : ?>
                                                <option value="<?= $employee['id'] ?>"><?= $employee['name'] ?>
                                                </option>
                                        <?php endforeach;
                                        endif; ?>
                                    </select>
                                    <small for="employee" id="meeting-employee-error"></small>
                                </div>
                                <div class="col-md-6">
                                    <label class="col-form-label fw-bold">Meeting with</label>
                                    <input type="text" class="form-control py-1" placeholder="Search leads by name..." list="leadsList" name="leadName" id="leadName">
                                    <small for="leadName" id="meeting-leadName-error"></small>
                                    <datalist id="leadsList">
                                        <?php if (!empty($leads)) : foreach ($leads as $key => $lead) : ?>
                                                <option><?= $lead['name'] ?></option>
                                        <?php endforeach;
                                        endif; ?>
                                    </datalist>
                                </div>

                                <div class="col-md-6">
                                    <label class="col-form-label fw-bold" for="meetingDate">Date</label>
                                    <input type="date" class="form-control py-1" name="meetingDate" id="meetingDate">
                                    <small for="meetingDate" id="meeting-meetingDate-error"></small>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label class="col-form-label fw-bold" for="meetingTime">Time</label>
                                    <input type="time" class="form-control py-1" name="meetingTime" id="meetingTime">
                                    <small for="meetingTime" id="meeting-meetingTime-error"></small>
                                </div>

                                <div class="col-md-12">
                                    <label class="col-form-label fw-bold" for="purpose">Meeting Purpose</label>
                                    <textarea class="form-control py-1" name="purpose" id="purpose" rows="5" minlength="30"></textarea>
                                    <small for="purpose" id="meeting-purpose-error"></small>
                                </div>
                                <div class="col-md-6">
                                    <label class="col-form-label fw-bold" for="meeting-status">Meeting Status</label>
                                    <select class="form-select py-1 w-100 text-dark input-border" id="meeting-status" name="meeting-status">
                                        <option selected disabled>Select....
                                        </option>
                                        <?php if (!empty($status)) : foreach ($status as $key => $item) : ?>
                                                <option value="<?= $item['id'] ?>"><?= $item['title'] ?>
                                                </option>
                                        <?php endforeach;
                                        endif; ?>
                                    </select>
                                    <small for="employee" id="meeting-employee-error"></small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <h5>Recommended Locations</h5>
                            <ul class="list-group" style="height:300px; overflow-y: auto;" id="recommended-property">

                            </ul>
                        </div>
                    </div>
                    <div class="row mx-auto d-none" id="meeting-remark-section">
                        <div class="col-md-12">
                            <label class="col-form-label fw-bold" for="remark">Update remark after meeting</label>
                            <textarea class="form-control py-1" name="remark" id="remark" rows="5" minlength="30"></textarea>
                            <small for="purpose" id="meeting-remark-error"></small>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" id="btnSubmit" class="btn btn-primary fw-bold text-white me-3">Save changes
                    </button>
                    <button type="button" class="btn btn-danger fw-bold text-white me-3" data-bs-dismiss="modal">Close
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>


<!-- Property list models -->
<div class="modal fade" id="propertyMeetingLocationModal" tabindex="-1" aria-labelledby="propertyMeetingLocationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">

        <div class="modal-content modal-margin">
            <div class="modal-header red-bg py-2">
                <h5 class="fw-bold text-white" id="propertyMeetingLocation-lable">
                    Meeting locations
                </h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="list-group" style="height:300px; overflow-y: auto;" id="meeting-property-list">

                        </ul>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger fw-bold text-white me-3" data-bs-dismiss="modal">Close
                </button>
            </div>
        </div>

    </div>
</div>

<?php echo view('Meetings/Scripts/meeting'); ?>