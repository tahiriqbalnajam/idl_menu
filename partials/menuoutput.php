<?php

if ($menuid) {
    $menu = wp_get_nav_menu_object( $menuid );
    $menu_items = wp_get_nav_menu_items($menuid);

    $menu_list  = '<div class="idl-menu-'.$menu->slug.'-menu-container">' ."\n";
    $menu_list .= '<ul id="idl-menu-'.$menu->slug.'-menu-1" class="idl-menu">' ."\n";

    $count = 0;
    $submenu = false;
     
    foreach( $menu_items as $menu_item ) {
        
         
        $link = $menu_item->url;
        $title = $menu_item->title;
         
        if ( !$menu_item->menu_item_parent ) {
            $parent_id = $menu_item->ID;
            $has_child = ($menu_items[ $count + 1 ]->menu_item_parent == $menu_item->ID ) ? 'menu-item-has-children' : '';

            $menu_list .= '<li class="idl-menu-item  '.$has_child.' menu-item-'.$menu_item->ID.'">' ."\n";
            $fontawesomeright = ($iconfontawsm && ($iconalignment == 'Right')) ? '<i class="'.$iconfontawsm.'"></i>' : '';
            $fontawesomeleft = ($iconfontawsm && ($iconalignment == 'Left')) ? '<i class="'.$iconfontawsm.'"></i>'  : '';
            $menu_list .= '<a href="'.$link.'" class="title">'.$fontawesomeleft.' '.$title.' '.$fontawesomeright.'</a>'."\n";
        }

        if ( $parent_id == $menu_item->menu_item_parent ) {

            if ( !$submenu ) {
                $submenu = true;
                $menu_list .= '<ul class="sub-menu">' ."\n";
            }

            $menu_list .= '<li class="item">' ."\n";
            $menu_list .= '<a href="'.$link.'" class="title">'.$fontawesomeleft.' '.$title.' '.$fontawesomeright.'</a>' ."\n";
            $menu_list .= '</li>' ."\n";
                 

            if ( $menu_items[ $count + 1 ]->menu_item_parent != $parent_id && $submenu ){
                $menu_list .= '</ul>' ."\n";
                $submenu = false;
            }

        }

        if ( $menu_items[ $count + 1 ]->menu_item_parent != $parent_id ) { 
            $menu_list .= '</li>' ."\n";      
            $submenu = false;
        }

        $count++;
    }
     
    $menu_list .= '</ul>' ."\n";
    $menu_list .= '</div>' ."\n";

} else {
    $menu_list = 'Kindly select a menu to show';
}
echo $menu_list;
?>
