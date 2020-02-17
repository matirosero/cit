<?php

class Topbar_Menu_Walker extends Walker_Nav_Menu {

    function start_el(&$output, $item, $depth=0, $args=array(), $id = 0) {

        $object = $item->object;
        $type = $item->type;
        $title = $item->title;
        $description = $item->description;
        $permalink = $item->url;

        $classes = $item->classes;

        $menu_item_id = $item->object_id;
     

        if ( in_array('menu-item-login', $classes) ) {

            $login  = (isset($_GET['login']) ) ? $_GET['login'] : 0;
            if ( $login === "failed" ) {
                $classes[] = 'menu-item-has-alert';
            }

            $output .= '<li id="'.$item->ID.'" class="' . implode(" ", $classes) . ' menu-item-has-children is-dropdown-submenu-parent opens-left" role="menuitem" aria-haspopup="true" aria-label="Login" data-is-click="false">';

            $output .= '<a href="#">';
            $output .= $title;

            

            //Show error message
            if ( $login === "failed" ) {
                $output .= ' <i class="icon icon-attention-circled"></i>';
            }

            $output .= '</a>';


            $output .= '<ul class="menu submenu is-dropdown-submenu first-sub vertical" data-submenu="" role="menubar" style="">';
            $output .= '<li id="2163" class="is-submenu-item is-dropdown-submenu-item menu-item-not-link" role="menuitem">';
            $output .= '<div class="login">'.do_shortcode( '[login_form]' ).'</div>';
            $output .= '</li>';
            $output .= '</ul>';

        } else {

            $output .= '<li id="'.$item->ID.'" class="' . implode(" ", $classes) . '">';



            if ( in_array('menu-item-logout', $classes) ) {

                $output .= '<a href="' . wp_logout_url() . '">';

            } else {
                
                // Check if link should open in new window
                if ( $item->target == "_blank" ) {
                    $output .= '<a href="' . $permalink . '" target="_blank">';
                } else {
                    $output .= '<a href="' . $permalink . '">';
                }                
            }



            $output .= $title;

            $output .= '</a>';

        }



    }


    function start_lvl(&$output, $depth = 0, $args = Array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"menu\">\n";
    }
}


// Big thanks to Brett Mason (https://github.com/brettsmason) for the awesome walker
class Accordion_Menu_Walker extends Walker_Nav_Menu {
    function start_lvl(&$output, $depth = 0, $args = Array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"menu vertical nested\">\n";
    }
}


class Off_Canvas_Menu_Walker extends Walker_Nav_Menu {
    function start_lvl(&$output, $depth = 0, $args = Array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"vertical menu\">\n";
    }
}