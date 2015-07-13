<?php
class Comments extends WP_Module {
    function run() {
        add_action('_admin_menu', array ($this, 'admin_menu'), 0);
    }

    function admin_menu() {
        global $menu, $submenu;
        $awaiting_mod = wp_count_comments();
        $awaiting_mod = $awaiting_mod->moderated;
        $menu[25] = array( sprintf( __('Comments %s'), "<span class='awaiting-mod count-$awaiting_mod'><span class='pending-count'>" . number_format_i18n($awaiting_mod) . "</span></span>" ), 'edit_posts', 'edit-comments.php', '', 'menu-top menu-icon-comments', 'menu-comments', 'dashicons-admin-comments' );
        unset($awaiting_mod);

        $submenu[ 'edit-comments.php' ][0] = array( __('All Comments'), 'edit_posts', 'edit-comments.php' );
    }
}