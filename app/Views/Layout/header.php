<div class="header fixed-top">
    <div class="container-fluid">
        <nav class="navbar navbar-light px-md-2">
            <a href="<?= base_url(); ?>" class="brand-icon text-primary fw-bold d-flex align-items-center me-2 me-lg-4">
                <h2>Logo</h2>
            </a>
            <div class="h-left d-flex flex-grow-1 me-md-4 me-0">
                <div class="main-search flex-fill d-none d-sm-block">
                    <input class="form-control" type="text" placeholder="Enter your search key word">
                    <div class="card border-0 shadow rounded-3 search-result slidedown">
                        <div class="card-body text-start">
                            <div class="dropdown-divider my-2"></div>
                            <a class="d-flex align-items-center dropdown-item py-2" href="#">
                                <span class="avatar sm no-thumbnail me-2"><i class="fa fa-github"></i></span>
                                <div class="text-truncate">
                                    <span>How to set up Github?</span>
                                </div>
                            </a>
                            <a class="d-flex align-items-center dropdown-item py-2" href="#">
                                <span class="avatar sm no-thumbnail me-2"><i class="fa fa-paint-brush"></i></span>
                                <div class="text-truncate">
                                    <span>How to change theme color?</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="h-right justify-content-end d-flex align-items-center">
                <button class="btn mx-3 btn-primary btn-sm rounded"><a class="play-btn one" href="#"></a><span class="tuto"><a id="bootstrap-tour-btn" ng-click="bsTour.startTour()">Software Tutorial</a></span></button>
                <div class="dropdown notifications me-2 d-none d-sm-block">
                    <a class="nav-link dropdown-toggle pulse p-1" href="#" role="button" data-bs-toggle="dropdown">
                        <i class="fa fa-bell text-primary"></i>
                    </a>
                    <div id="NotificationsDiv" class="dropdown-menu rounded-lg shadow border-0 dropdown-menu-end p-0 m-0">
                        <div class="card border-0 w380">
                            <div class="card-header bg-primary border-0 p-3">
                                <h5 class="mb-0 d-flex justify-content-between">
                                    <span>Notifications Center</span>
                                    <span>14</span>
                                </h5>
                            </div>
                            <div class="card-body custom_scroll">
                                <div class="header-notification">
                                    <ul class="list-unstyled list mb-0">
                                        <li class="py-2 mb-1 border-bottom">
                                            <a href="javascript:void(0);" class="d-flex">
                                                <img class="avatar rounded-circle" src="https://alui.thememakker.com/html/assets/images/xs/avatar1.jpg" alt="">
                                                <div class="flex-fill ms-2">
                                                    <p class="d-flex justify-content-between mb-0 color-700"><span>Chris Morise</span> <small>2MIN</small></p>
                                                    <span class="text-muted">changed an issue from "In Progress" to <span class="badge bg-success">Review</span></span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="py-2 mb-1 border-bottom">
                                            <a href="javascript:void(0);" class="d-flex">
                                                <div class="avatar rounded-circle no-thumbnail">RH</div>
                                                <div class="flex-fill ms-3">
                                                    <p class="d-flex justify-content-between mb-0 color-700"><span>Hammer</span> <small>13MIN</small></p>
                                                    <span class="text-muted">It is a long established fact that a reader will be distracted</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="py-2 mb-1 border-bottom">
                                            <a href="javascript:void(0);" class="d-flex">
                                                <img class="avatar rounded-circle" src="https://alui.thememakker.com/html/assets/images/xs/avatar3.jpg" alt="">
                                                <div class="flex-fill ms-3">
                                                    <p class="d-flex justify-content-between mb-0 color-700"><span>Lentz</span> <small>1HR</small></p>
                                                    <span class="text-muted">There are many variations of passages</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="py-2 mb-1 border-bottom">
                                            <a href="javascript:void(0);" class="d-flex">
                                                <img class="avatar rounded-circle" src="https://alui.thememakker.com/html/assets/images/xs/avatar4.jpg" alt="">
                                                <div class="flex-fill ms-3">
                                                    <p class="d-flex justify-content-between mb-0 color-700"><span>Kelly</span> <small>1DAY</small></p>
                                                    <span class="text-muted">Contrary to popular belief <span class="badge bg-danger">Code</span></span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="py-2 mb-1 border-bottom">
                                            <a href="javascript:void(0);" class="d-flex">
                                                <img class="avatar rounded-circle" src="https://alui.thememakker.com/html/assets/images/xs/avatar5.jpg" alt="">
                                                <div class="flex-fill ms-3">
                                                    <p class="d-flex justify-content-between mb-0 color-700"><span>Hammer</span> <small>13MIN</small></p>
                                                    <span class="text-muted">making it over 2000 years old</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="py-2 mb-1 border-bottom">
                                            <a href="javascript:void(0);" class="d-flex">
                                                <img class="avatar rounded-circle" src="https://alui.thememakker.com/html/assets/images/xs/avatar6.jpg" alt="">
                                                <div class="flex-fill ms-3">
                                                    <p class="d-flex justify-content-between mb-0 color-700"><span>Lentz</span> <small>1HR</small></p>
                                                    <span class="text-muted">There are many variations of passages</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="py-2">
                                            <a href="javascript:void(0);" class="d-flex">
                                                <img class="avatar rounded-circle" src="https://alui.thememakker.com/html/assets/images/xs/avatar7.jpg" alt="">
                                                <div class="flex-fill ms-3">
                                                    <p class="d-flex justify-content-between mb-0 color-700"><span>savera</span> <small>1DAY</small></p>
                                                    <span class="text-muted">The generated Lorem Ipsum</span>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <a class="card-footer text-center border-top-0" href="#">View all notifications</a>
                        </div>
                    </div>
                </div>
                <a class="nav-link text-primary p-1 me-lg-3 me-2" href="#" title="Settings" data-bs-toggle="modal" data-bs-target="#SettingsModal"><i class="fa fa-gear"></i></a>
                <div class="dropdown user-profile ms-2">
                    <a class="nav-link dropdown-toggle pulse p-0" href="#" role="button" data-bs-toggle="dropdown">
                        <img class="avatar rounded-circle p-1" src="https://alui.thememakker.com/html/assets/images/profile_av.png" alt="">
                    </a>
                    <div class="dropdown-menu rounded-lg shadow border-0 dropdown-menu-end">
                        <div class="card border-0 w240">
                            <div class="card-body border-bottom">
                                <div class="d-flex py-1">
                                    <img class="avatar rounded-circle" src="https://alui.thememakker.com/html/assets/images/profile_av.png" alt="">
                                    <div class="flex-fill ms-3">
                                        <p class="mb-0 text-muted"><span class="fw-bold">Chris Morise</span></p>
                                        <small class="text-muted">chris.fox@gamil.com</small>
                                        <div>
                                            <a href="<?php echo base_url('logout'); ?>" class="card-link">Sign out</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group m-2">
                                <a href="<?= base_url(); ?>/my-profile" class="list-group-item list-group-item-action border-0"><i class="w30 fa fa-user"></i>Profile &amp; account</a>
                                <a href="#" class="list-group-item list-group-item-action border-0"><i class="w30 fa fa-gear"></i>Settings</a>
                                <a href="#" class="list-group-item list-group-item-action border-0"><i class="w30 fa fa-tag"></i>Customization</a>
                                <a href="#" class="list-group-item list-group-item-action border-0"><i class="w30 fa fa-users"></i>Manage team</a>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary d-none menu-toggle ms-3" type="button"><i class="fa fa-bars"></i></button>
            </div>

        </nav>
    </div>
</div>


<div class="modal fade" id="meetingsModal" tabindex="-1" aria-labelledby="meetingsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content modal-margin">
            <div class="modal-header red-bg py-2">
                <h5 class="fw-bold text-white">
                    Add Meetings
                </h5>
            </div>
            <div class="modal-body">

                <form action="">
                    <div class="row mx-auto">
                        <div class="col-md-3">
                            <label class="col-form-label fw-bold">Meeting With</label>
                            <select class="form-select py-1 w-100 text-dark input-border" id="sel1" name="sellist1">
                                <option selected disabled>Select....
                                </option>
                                <option>User 1
                                </option>
                                <option>User 2
                                </option>
                                <option>User 3
                                </option>
                                <option>User 4
                                </option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="col-form-label fw-bold">Date</label>
                            <input type="date" class="form-control py-1">
                        </div>
                        <div class="col-md-3">
                            <label class="col-form-label fw-bold">Time</label>
                            <input type="time" class="form-control py-1">
                        </div>
                        <div class="col-md-3">
                            <label class="col-form-label fw-bold">Meeting Purpose</label>
                            <input type="text" class="form-control py-1" placeholder="Purpose....">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn red-bg fw-bold text-white me-3" data-bs-dismiss="modal">Add Meeting
                </button>
            </div>
        </div>
    </div>
</div>

