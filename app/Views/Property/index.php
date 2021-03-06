<?php  
    $session = session(); 
    
    $session->read_action_type=="No"?$read_action="disabled":$read_action="";
    $session->update_action_type=="No"?$update_action="disabled":$update_action="";
    $session->delete_action_type=="No"?$delete_action="disabled":$delete_action="";
    
?>
<div class="body-header border-0 rounded-0 px-xl-4 px-md-2">
    <div class="container-fluid">
        <div class="row pt-2">
            <div class="col-12"> 
                <?php
                    $session = session();
                    if($session->getFlashdata('error-name')){
                        echo '<div class="alert alert-danger alert-dismissible fade show fw-bold text-dark p-2" role="alert">';
                        echo '<marquee><span >'.$session->getFlashdata('error-name').'</span></marquee>';
                        echo '<button type="button" class="btn-close p-3" data-bs-dismiss="alert" aria-label="Close"></button>';
                        echo '</div>';
                    }
                ?>
            </div>
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center py-2">
                    <ol class="breadcrumb rounded-0 mb-0 ps-0 bg-transparent flex-grow-1">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">All Properties</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

            <div class="body mb-2 px-xl-4 px-md-2">
                <div class="container-fluid my-4">
                    <div class="row">
                        

                        <!-- <div class="col-md-12"> -->
                        <div class="col-md-12 mx-auto">                          

                            <div class="card p-4 <?php echo $session->delete_action_type;?>">
                                <table id="allProperties" class="table display dataTable table-hover" style="width:100%">
                                    <thead>
                                        <tr class="py-3">
                                            <th>#ID</th>
                                            <th>Property Name</th>
                                            <th>Owner Name</th>
                                            <th>Property for Sell/Buy/Rent</th>
                                            <th>Publish</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($propertyList) :
                                            $i = 1;
                                            foreach ($propertyList as $key => $item) : ?>
                                                <tr>
                                                    <td class="sorting_1 id-red fw-bold"><?= $i ?></td>
                                                    <td class="ps-5"> <?= $item->property_title ?></td>
                                                    <td class="ps-3"> <?= $item->owner_name ?></td>
                                                    <td class="ps-5">
                                                        <span class="badge bg-warning font-size"><?= $item->lookingfor_title ?></span>
                                                    </td>
                                                    <td>
                                                        <?php if (($item->isPublished == 1)) : ?>
                                                            <input <?= $update_action;?> id="chkToggle<?= $item->isPublished ?>" class="is-published" data-prop-id="<?= $item->id ?>" data-status='<?= $item->isPublished ?>' checked type="checkbox" data-toggle="toggle" data-on="On" data-off="Off" data-size="sm">
                                                        <?php else : ?>
                                                            <input <?= $update_action;?> id="chkToggle<?= $item->isPublished ?>" class="is-published" data-prop-id="<?= $item->id ?>" data-status='<?= $item->isPublished ?>' type="checkbox" data-toggle="toggle" data-on="On" data-off="Off" data-size="sm">
                                                        <?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <a href="<?= base_url('property-detail/') . '/' . base64_encode($item->id) ?>" class="<?= $read_action;?>">
                                                            <i class="fa fa-eye view-details text-white me-1 text-center rounded"></i>
                                                        </a>
                                                        <!-- <a href="<?= base_url('edit-property-detail/') .'/'. base64_encode($item->id) ?>" >
                                                            <i class="fa fa-edit edit-details text-white me-1  text-center rounded"></i>
                                                        </a> -->
                                                        <a href="#" class="delete-property <?= $delete_action;?>" data-prop-id="<?= $item->id ?>" >
                                                            <i class="fa fa-trash-o delete-details text-white bg-danger text-center rounded"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                        <?php
                                                $i++;
                                            endforeach;
                                        endif;
                                        ?>
                                    </tbody>
                                </table>
                            </div> <!-- .card end -->
                        </div>
                        <!-- </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= base_url('/assets/js/custom/prop-list.js') ?>"></script>
