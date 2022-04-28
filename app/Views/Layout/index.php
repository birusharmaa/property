<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?></title>
    <?= view('Layout/cssLinks.php'); ?>
</head>

<body>
<?php  
    $session = session(); 
            // echo $session->get('create_action_type')."<br>";
            // echo $session->get('read_action_type')."<br>";
            // echo $session->get('update_action_type')."<br>";
            // echo $session->get('delete_action_type')."<br>";
            // exit;

    $session->create_action_type=="No"?$create_action="disabled":$create_action="";
    $session->read_action_type=="No"?$read_action="disabled":$read_action="";
    $session->update_action_type=="No"?$update_action="disabled":$update_action="";
    $session->delete_action_type=="No"?$delete_action="disabled":$delete_action="";
?>
<input type="hidden" id="createActionType" value="<?= $create_action=="disabled"?"No":"Yes";?>" />
<input type="hidden" id="readActionType" value="<?= $read_action=="disabled"?"No":"Yes";?>" />
<input type="hidden" id="updateActionType" value="<?= $update_action=="disabled"?"No":"Yes";?>" />
<input type="hidden" id="deleteActionType" value="<?= $delete_action=="disabled"?"No":"Yes";?>" />
<input type="hidden" id="addButtonHide" value="<?php echo $create_action=="disabled"?"No":"Yes"; ?>"/>


    <div id="layout-p" class="theme-navy">
        <?php
        if ($topbar) {
            echo view($topbar);
        }
        if ($left_menu) {
            echo $left_menu;
        }
        $public_page_container = "";
        ?>

        <div class="main">
            <div class="alert slide1 m-0 mt-4 mx-4 py-2 overflow-hidden alert-success alert-dismissible fade show" role="alert">
                <div class="div">
                    <span><strong>Holy guacamole!</strong> You should check in on some of those fields below.</span>
                </div>
                <div class="">
                    <button type="button" class="pb-0 btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>

            <?php
            if (isset($content_view) && $content_view != "") {
                echo view($content_view);
            }
            echo view('Layout/footer');?>
        </div>
    </div>
    <?= view('Layout/jsLinks.php'); ?>

</body>
</html>
<?php exit?>