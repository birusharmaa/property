<?php
$session = session();
helper('url');
$type = "";
if ($session->has('login_type')) {
    $type = $session->get('login_type');
}
helper('general');
$session = session(); 
$session->create_action_type=="No"?$create_action="disabled":$create_action="";

?>

<div class="body-header border-0 rounded-0 px-xl-4 px-md-2">
    <div class="container-fluid">
        <div class="row pt-2">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center py-2">
                    <ol class="breadcrumb rounded-0 mb-0 ps-0 bg-transparent flex-grow-1">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">All Designation</li>
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
                        <h1 class=" fw-bolder">All Designation</h1>
                    </div> -->
                    <div class="card p-4">
                        <table id="designation" class="table display dataTable table-hover" style="width:100%">
                            <div class="align1 pb-2">
                                <button class="btn btn-primary" id="btnAddDesignation" data-bs-toggle="modal" href="#designationmodal2" >Add Designation</button>
                            </div>
                            <thead>
                                <tr class="py-3">
                                    <th>#ID</th>
                                    <th>Designation Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="sorting_1 id-red fw-bold">01</td>
                                    <td>Name 1</td>
                                    <td>
                                        <a href="">
                                            <i class="fa fa-edit edit-details text-white me-1  text-center rounded"></i>
                                        </a>
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
</div>
<style>
    .sub_menus{
        margin-left: 35px;
    }
</style>

<!-- First modal dialog -->
<div class="modal fade" id="designationmodal2" aria-hidden="true" aria-labelledby="designationmdl2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content card">
            <form id="designationFormRoles">
                <div class="modal-header red-bg">
                    <h5 class="modal-title text-white" id="designationmdl2">Add Designation</h5>
                    <button type="button" class="btn-close-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <!-- Name input -->
                    <div class="form-outline mb-4">
                        <label class="form-label fw-bold" for="designationname">Designation Name</label>
                        <input type="text" name="designationname" id="designationname" class="form-control form-control1" required />
                    </div>
                    <?php // print_r($roles);?>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="modulescheckbox">
                            <label class="form-check-label" for="modulescheckbox">
                                <strong>Modules</strong>
                            </label>
                        </div> 
                          
                    <ul id="modulemenu" class="menu-list flex-grow-1 mt-3 d-none">
                        <?php
                         
                        if (!$is_preview) {
                            $sidebar_menu = get_active_menu($sidebar_menu);
                        }
                        
                        
                        $mainMenu=1;
                        foreach ($sidebar_menu as $main_menu) :?>    
                            
                            <?php if($main_menu["name"] =="Dashboard" || $main_menu["name"]=="dashboard") :?>
                            <?php else: ?>
                                <div class="form-check custom-menu-class">
                                <input class="form-check-input" name="main_menu[]" type="checkbox" data-name="<?= $main_menu["name"];?>" value="<?php echo getMenuId($main_menu["name"]);?>" onclick="getCheckValue(<?= $mainMenu?>);" id="checkboxMainMenu<?= $mainMenu?>">
                                <label class="form-check-label" for="checkboxMainMenu<?= $mainMenu?>" onclick="getCheckValue(<?= $mainMenu?>);">
                                    <span class="text-primary"><strong><?= $main_menu["name"];?></strong></span>
                                </label>    
                                                            
                                <!-- <input type="hidden" value="<?php // echo getMenuId($main_menu["name"]);?>" name="MainMenu_<?php //echo $main_menu["name"]?>" id="MainMenu_<?php echo $main_menu["name"]?>"> -->
                            </div>  
                            
                            <?php endif; ?>    
                            <?php if (isset($main_menu["name"])) :
                                    $submenu = get_array_value($main_menu, "submenu"); ?> 
                                    <?php $submenus_id=1;   if($submenu): $count=0; foreach ($submenu as $sub) :?>
                                    
                                        <div class="row d-none submenu<?= $mainMenu?>">
                                            <div class="col-md-3">
                                                <div class="form-check sub-menu-class-custom sub_menus">
                                                    <input class="form-check-input" data-submadulenamej="<?= $sub["name"];?>" data-menuid="<?php echo getMenuId($main_menu["name"]);?>" name="sub_menu[]" type="checkbox" value="<?php echo getSubMenuId($sub["name"]);?>" id="sub_menu<?= $mainMenu?><?= $submenus_id?>">
                                                    <label class="form-check-label" for="sub_menu<?= $mainMenu?><?= $submenus_id?>">
                                                        <?= $sub["name"];?>
                                                    </label>                                                                                           
                                                    <!-- <input type="hidden" value="<?php // echo getSubMenuId($sub["name"]);?>" name="SubMainMenu_<?php // echo $main_menu["name"]?>" id="SubMainMenu_<?php // echo $main_menu["name"]?>"> -->
                                                </div>
                                            </div>
                                            <div class="col-md-9">  
                                            <?php $subsubmenu = get_array_value($sub, "sub_sub_menu"); ?> 
                                                    <?php $subsubmenu_id=1;   if($subsubmenu): $count=0; foreach ($subsubmenu as $subsub) :?> 
                                                        <div class="row">
                                                            <div class="col-md-3 sub-sub-menu-class p-0">
                                                                <input class="form-check-input" data-ssmid="<?php echo getSubMenuId($sub["name"]);?>" name="subSubChecked<?= getSubSubMenuId($subsub["name"]);?>" type="checkbox" value="<?= getSubSubMenuId($subsub["name"])?>" >  
                                                                <lable><?= $subsub['name']; ?></lable>
                                                            </div>
                                                            <div class="col-md-9 p-0">
                                                                <div class="row">                                  
                                                                    <?php if($roles): foreach($roles as $roleId): ?>                                                                                         
                                                                        <div class="col-sm-3 p-0">
                                                                            <div class="form-check sub_menus">                                                    
                                                                                <input class="form-check-input" data-name="<?= $main_menu["name"];?>" name="checkedroles<?php echo "_".getSubSubMenuId($subsub["name"]);?>" type="radio" value="<?= $roleId['r_id']; ?>" id="roles<?= $mainMenu?><?= $submenus_id?><?= $roleId['r_id']; ?>">
                                                                                <label class="form-check-label" for="roles<?= $mainMenu?><?= $submenus_id?><?= $roleId['r_id']; ?>">
                                                                                    <?php echo $roleId['name']; ?>
                                                                                </label>                                                       
                                                                            </div>
                                                                        </div>
                                                                    <?php endforeach; endif;?>    
                                                                </div>
                                                            </div>
                                                        </div>

                                                    <?php endforeach; else: ?>
                                                        <div class="row">                                  
                                                            <?php if($roles): foreach($roles as $roleId): ?>                                                                                         
                                                                <div class="col-sm-3">
                                                                    <div class="form-check sub-menu-class-radio sub_menus">                                                    
                                                                        <input class="form-check-input" data-smid="<?= getSubMenuId($sub["name"]);?>" name="checkedroles<?php echo getSubMenuId($sub["name"]);?>" type="radio" value="<?= $roleId['r_id']; ?>" id="roles<?= $mainMenu?><?= $submenus_id?><?= $roleId['r_id']; ?>">
                                                                        <label class="form-check-label" for="roles<?= $mainMenu?><?= $submenus_id?><?= $roleId['r_id']; ?>">
                                                                            <?php echo $roleId['name']; ?>
                                                                        </label>                                                       
                                                                    </div>
                                                                </div>
                                                            <?php endforeach; endif;?>    
                                                        </div>

                                                    <?php endif;?>    
                                                                                                                                        
                                            </div>
                                        </div>   
                                <?php $submenus_id++; $count++; endforeach;  endif; ?>   
                                 <!-- <input type="hidden" value="<?= $count;?>" id="SubMenuCount<?php // echo $mainMenu?>" name="SubMenuCount<?php //  echo $mainMenu?>">   -->
                            <?php
                            endif; $mainMenu++;
                        endforeach;  
                        ?>
                    </ul>
                   
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger danger-bg fw-bold text-white" data-bs-dismiss="modal">Close
                    </button>
                    <button type="submit" id="btnSubmit" class="btn red-bg fw-bold text-white">Add
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= view('HR/Scripts/designation') ?>