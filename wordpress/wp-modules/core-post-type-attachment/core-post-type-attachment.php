<?php
class AttachmentPostType extends WP_Core_PostType_Module
{
    function run()
    {
        add_action('init', array($this, 'create_post_type'), 0);
        add_action('_admin_menu', array($this, 'admin_menu'), 0);
    }
    function admin_menu()
    {
        global $menu, $submenu;
        $i = 15;
        $menu[10] = array( __('Media'), 'upload_files', 'upload.php', '', 'menu-top menu-icon-media', 'menu-media', 'dashicons-admin-media' );
        $submenu['upload.php'][5] = array( __('Library'), 'upload_files', 'upload.php');
        /* translators: add new file */
        $submenu['upload.php'][10] = array( _x('Add New', 'file'), 'upload_files', 'media-new.php');
        foreach ( get_taxonomies_for_attachments( 'objects' ) as $tax ) {
            if ( ! $tax->show_ui || ! $tax->show_in_menu )
                continue;

            $submenu['upload.php'][$i++] = array( esc_attr( $tax->labels->menu_name ), $tax->cap->manage_terms, 'edit-tags.php?taxonomy=' . $tax->name . '&amp;post_type=attachment' );
        }
        unset($tax);
    }
    /**
     * Creates the initial post types when 'init' action is fired.
     *
     * @since 2.9.0
     */
    function create_post_type() {
        register_post_type( 'attachment', array(
            'labels' => array(
                'name' => _x('Media', 'post type general name'),
                'name_admin_bar' => _x( 'Media', 'add new from admin bar' ),
                'add_new' => _x( 'Add New', 'add new media' ),
                'edit_item' => __( 'Edit Media' ),
                'view_item' => __( 'View Attachment Page' ),
            ),
            'public' => true,
            'show_ui' => true,
            '_builtin' => true, /* internal use only. don't use this when registering your own post type. */
            '_edit_link' => 'post.php?post=%d', /* internal use only. don't use this when registering your own post type. */
            'capability_type' => 'post',
            'capabilities' => array(
                'create_posts' => 'upload_files',
            ),
            'map_meta_cap' => true,
            'hierarchical' => false,
            'rewrite' => false,
            'query_var' => false,
            'show_in_nav_menus' => false,
            'delete_with_user' => true,
            'supports' => array( 'title', 'author', 'comments' ),
        ) );
        add_post_type_support( 'attachment:audio', 'thumbnail' );
        add_post_type_support( 'attachment:video', 'thumbnail' );
    }
}