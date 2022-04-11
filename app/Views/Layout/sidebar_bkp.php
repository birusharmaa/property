<?php
$session = session();
$type = "";
if($session->has('login_type')){
    $type = $session->get('login_type');
}

?>
<div class="sidebar px-3 py-1">
    <div class="d-flex flex-column h-100">
         <ul id="sidebar-menu" class="menu-list flex-grow-1 mt-3">
            <?php
            if (!$is_preview) {
                $sidebar_menu = get_active_menu($sidebar_menu);
            }

            foreach ($sidebar_menu as $main_menu) :
                if (isset($main_menu["name"])) :
                    $submenu = get_array_value($main_menu, "submenu");
                    $expend_class = $submenu ? " expand " : "";

                    $hide = "";
                    if( $main_menu["name"]=="dashboard" && count($sidebar_menu)>10){
                        $hide = "d-none";
                    }

                    if( $main_menu["name"] && $main_menu["name"]=="Dashboard"){
                        $active_class = "active";
                    }else{
                        $active_class = "";
                    }

                    if( $main_menu["name"]=="Dashboard"){
                        $active_class = "active";
                    }else{
                        $active_class = "";
                    }

                    //Collapsed abd collapse class 
                    $collapsed = "collapsed";
                    $collapse  = "collapse";
                    if( $main_menu["name"]=="Dashboard" || $main_menu["name"] == 'Meetings' || $main_menu["name"] == 'Front Office' || $main_menu["name"] == 'Software Tutorial' || $main_menu["name"] == 'Feedback'){
                        $collapsed = "";
                        $collapse  = "";
                    }

                    //Submenu collapse  
                    $collapse_target_pro  = "";
                    if( $main_menu["name"]=="Property Inventory"){
                        $collapse_target_pro = "menu-PropertyInventory";
                    }

                    if( $main_menu["name"]=="Lead Management"){
                        $collapse_target_pro = "menu-leadManagement";
                    }

                    if( $main_menu["name"]=="HR Management"){
                        $collapse_target_pro = "menu-hrManagement";
                    }

                    if( $main_menu["name"]=="Finance Management"){
                        $collapse_target_pro = "menu-financeManagement";
                    }

                    if( $main_menu["name"]=="Reports & Statistics"){
                        $collapse_target_pro = "menu-Reports";
                    }

                    if( $main_menu["name"]=="Security"){
                        $collapse_target_pro = "menu-Security";
                    }

                    


                    $submenu_open_class = "";
                    if ($expend_class && $active_class) {
                        $submenu_open_class = " open ";
                    }

                    if( $main_menu["name"]=="Dashboard" || $main_menu["name"] == 'Meetings' || $main_menu["name"] == 'Front Office' || $main_menu["name"] == 'Software Tutorial' || $main_menu["name"] == 'Feedback'){
                        $href = "";
                    }else{
                        //echo isset($main_menu['is_custom_menu_item']) ? $main_menu['url'] : get_uri($main_menu['url']);
                        $href = isset($main_menu['is_custom_menu_item']) ? $main_menu['url'] : get_uri($main_menu['url']);
                    }

                    $badge = get_array_value($main_menu, "badge");
                    $badge_class = get_array_value($main_menu, "badge_class");
                    // $href = ($main_menu['name'] == 'dashboard') ? get_uri($main_menu['url']) : '#sidebar' . $main_menu['name'];
                    if( $main_menu["name"] == 'Meetings' || $main_menu["name"] == 'Front Office' || $main_menu["name"] == 'Software Tutorial' || $main_menu["name"] == 'Feedback'){
                        $href = $main_menu['url'];
                        $collps = "";
                    }else{
                        //echo isset($main_menu['is_custom_menu_item']) ? $main_menu['url'] : get_uri($main_menu['url']);
                        $href = isset($main_menu['is_custom_menu_item']) ? $main_menu['url'] : get_uri($main_menu['url']);
                        $collps = "data-bs-toggle=".$collapse;
                    }


                    $target = (isset($main_menu['is_custom_menu_item']) && isset($main_menu['open_in_new_tab']) && $main_menu['open_in_new_tab']) ? "target='_blank'" : ""; ?>


                    <li class="<?= $hide. " ".$collapsed;?>">
                        <?php if ($main_menu['name'] == 'Dashboard') : ?>
                            <a class="m-link <?= $active_class; ?>" href="<?= get_uri($main_menu['url']) ?>" 
                                data-bs-toggle="<?= $collapse; ?>" >
                                <i class="<?php echo ($main_menu['class']); ?>"></i>
                                <span><?= app_lang($main_menu['name']);?> </span>
                            </a>
                        <?php
                        else :
                            $a = "";

                            if($main_menu['name']=="dashboard"){
                                $a = "Active";
                                $collapse = "";
                                $main_menu['class'] = "fa fa-dashboard";
                            }
                        ?>

                            <a class="m-link <?= $a;?>" data-bs-toggle="<?= $collapse; ?>" 
                                href="<?= $href ?>" 
                                aria-expanded="false" 
                                aria-controls="sidebar<?= $main_menu['name'] ?>" <?php echo $target; ?> 
                                href="<?= $href; ?>"
                                data-bs-target="#<?= $collapse_target_pro; ?>"
                                >
                                <div class="col-2">
                                    <i class="<?php echo ($main_menu['class']); ?>"></i>
                                </div>
                                <div class="col-10">
                                    <span class="menu-text <?php echo isset($main_menu['custom_class']) ? $main_menu['custom_class'] : ""; ?>">
                                        <?php echo isset($main_menu['is_custom_menu_item']) ? $main_menu['name'] : app_lang($main_menu['name']); ?></span>

                                <?= ($main_menu['name'] !== 'dashboard') ? '<span class="menu-arrow"></span>' : '' ?>
                                <?php
                                if ($badge) {
                                    echo "<span class='badge rounded-pill $badge_class'>$badge</span>";
                                }
                                ?>
                                </div>
                            </a>
                            <?php
                            if ($submenu) { ?>
                                    <ul class="collapse sub-menu" id="<?= $collapse_target_pro; ?>">
                                        <?php

                                        foreach ($submenu as $s_menu) {
                                            if (isset($s_menu['name'])) {
                                                $sub_menu_target = (isset($s_menu['is_custom_menu_item']) && isset($s_menu['open_in_new_tab']) && $s_menu['open_in_new_tab']) ? "target='_blank'" : "";
                                            if(empty($s_menu['class'])){
                                                $tr = isset($s_menu['is_custom_menu_item']) ? $s_menu['url'] : get_uri($s_menu['url']);
                                                $str = '';
                                            }else{
                                                $tr = "#";
                                                $str = 'data-bs-toggle="collapse" data-bs-target="#'.$s_menu['class'].'" ';
                                            }
                                            ?>
                                                <li class="collapsed">

                                                    <a class="ms-link" <?php echo $str." ".$sub_menu_target; ?> href="<?= $tr;?>">
                                                        <i data-feather='minus' width='12'></i>
                                                        <span><?php echo isset($s_menu['is_custom_menu_item']) ? $s_menu['name'] : app_lang($s_menu['name']); ?></span>
                                                    </a>
                                                    <?php if(count($s_menu['sub_sub_menu'])>0){
                                                        echo '<ul class="sub-menu-2 collapse" id="'.$s_menu['class'].'">';
                                                         foreach ($s_menu['sub_sub_menu'] as $ss_m_menu) {
                                                            //name."url"
                                                            echo '<li><a class="ms-link" href="'.$ss_m_menu['url'].'">'.$ss_m_menu['name'].'</a></li>';
                                                        
                                                        }
                                                        echo "</ul>";
                                                    }?>
                                                </li>
                                            <?php
                                            }
                                        }
                                        echo "</ul>";
                                    }
                                    ?>

                    </li>
                <?php
                        endif;
                    endif;
                endforeach;
        ?>
        </ul>
        <button type="button" class="btn btn-link text-primary sidebar-mini-btn">
            <span><i class="fa fa-arrow-left"></i></span>
        </button>
    </div>
</div>