<?php 
function res_register_custom_post_types() {
//register menu CPTs
$labels = array(
    'name'               => _x( 'Menu', 'post type general name' ),
    'singular_name'      => _x( 'Menu', 'post type singular name'),
    'menu_name'          => _x( 'Menu', 'admin menu' ),
    'name_admin_bar'     => _x( 'Menu', 'add new on admin bar' ),
    'add_new'            => _x( 'Add New', 'Menu' ),
    'add_new_item'       => __( 'Add New Menu' ),
    'new_item'           => __( 'New Menu' ),
    'edit_item'          => __( 'Edit Menu' ),
    'view_item'          => __( 'View Menu' ),
    'all_items'          => __( 'All Menu' ),
    'search_items'       => __( 'Search Menu' ),
    'parent_item_colon'  => __( 'Parent Works:' ),
    'not_found'          => __( 'No Menu found.' ),
    'not_found_in_trash' => __( 'No Menu found in Trash.' ),
    'archives'           => __( 'Menu Archives'),
    'insert_into_item'   => __( 'Insert into Menu'),
    'uploaded_to_this_item' => __( 'Uploaded to this Menu'),
    'filter_item_list'   => __( 'Filter Menu list'),
    'items_list_navigation' => __( 'Menu list navigation'),
    'items_list'         => __( 'Menu list'),
    'featured_image'     => __( 'Menu featured image'),
    'set_featured_image' => __( 'Set Menu featured image'),
    'remove_featured_image' => __( 'Remove Menu featured image'),
    'use_featured_image' => __( 'Use as featured image'),
);
$args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'show_in_nav_menus'  => true,
    'show_in_admin_bar'  => true,
    'show_in_rest'       => true,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'menu' ),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => 5,
    'menu_icon'          => 'dashicons-archive',
    'supports'           => array( 'title' ),
);
register_post_type( 'res-menu', $args );

    // Register Careers cpt
    $labels = array(
        'name'               => _x( 'Careers', 'post type general name' ),
        'singular_name'      => _x( 'Careers', 'post type singular name'),
        'menu_name'          => _x( 'Careers', 'admin menu' ),
        'name_admin_bar'     => _x( 'Careers', 'add new on admin bar' ),
        'add_new'            => _x( 'Add New', 'Careers' ),
        'add_new_item'       => __( 'Add New Careers' ),
        'new_item'           => __( 'New Careers' ),
        'edit_item'          => __( 'Edit Careers' ),
        'view_item'          => __( 'View Careers' ),
        'all_items'          => __( 'All Careers' ),
        'search_items'       => __( 'Search Careers' ),
        'parent_item_colon'  => __( 'Parent Works:' ),
        'not_found'          => __( 'No Careers found.' ),
        'not_found_in_trash' => __( 'No Careers found in Trash.' ),
        'archives'           => __( 'Careers Archives'),
        'insert_into_item'   => __( 'Insert into Careers'),
        'uploaded_to_this_item' => __( 'Uploaded to this Careers'),
        'filter_item_list'   => __( 'Filter Careers list'),
        'items_list_navigation' => __( 'Careers list navigation'),
        'items_list'         => __( 'Careers list'),
        'featured_image'     => __( 'Careers featured image'),
        'set_featured_image' => __( 'Set Careers featured image'),
        'remove_featured_image' => __( 'Remove Careers featured image'),
        'use_featured_image' => __( 'Use as featured image'),
    );
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => true,
        'show_in_admin_bar'  => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'careers' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-archive',
        'supports'           => array( 'title' ),
    );
    register_post_type( 'res-careers', $args );

    // Register Locations cpt
    $labels = array(
        'name'               => _x( 'Location', 'post type general name' ),
        'singular_name'      => _x( 'Location', 'post type singular name'),
        'menu_name'          => _x( 'Location', 'admin menu' ),
        'name_admin_bar'     => _x( 'Location', 'add new on admin bar' ),
        'add_new'            => _x( 'Add New', 'Location' ),
        'add_new_item'       => __( 'Add New Location' ),
        'new_item'           => __( 'New Loaction' ),
        'edit_item'          => __( 'Edit Location' ),
        'view_item'          => __( 'View Location' ),
        'all_items'          => __( 'All Location' ),
        'search_items'       => __( 'Search Location' ),
        'parent_item_colon'  => __( 'Parent Works:' ),
        'not_found'          => __( 'No Location found.' ),
        'not_found_in_trash' => __( 'No Location found in Trash.' ),
        'archives'           => __( 'Locations Archives'),
        'insert_into_item'   => __( 'Insert into Location'),
        'uploaded_to_this_item' => __( 'Uploaded to this Location'),
        'filter_item_list'   => __( 'Filter Location list'),
        'items_list_navigation' => __( 'Locations list navigation'),
        'items_list'         => __( 'Locations list'),
    );
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => true,
        'show_in_admin_bar'  => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'loaction' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-archive',
        'supports'           => array( 'title' ),
    );
    register_post_type( 'res-location', $args );

}

function res_register_taxonomies() {
    //Register food taxonomy 
    $labels = array(
        'name'              => _x( 'Food Categories', 'taxonomy general name' ),
        'singular_name'     => _x( 'Food Category', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Food Categories' ),
        'all_items'         => __( 'All Food Category' ),
        'parent_item'       => __( 'Parent Food Category' ),
        'parent_item_colon' => __( 'Parent Food Category:' ),
        'edit_item'         => __( 'Edit Food Category' ),
        'view_item'         => __( 'view Food Category' ),
        'update_item'       => __( 'Update Food Category' ),
        'add_new_item'      => __( 'Add New Food Category' ),
        'new_item_name'     => __( 'New Food Category Name' ),
        'menu_name'         => __( 'Food Category' ),
    );
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_in_menu'      => true,
        'show_in_nav_menu'  => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'food-categories' ),
    );
    register_taxonomy( 'res-food-category', array( 'res-menu' ), $args );

    $labels = array(
        'name'              => _x( 'Career Location Categories', 'taxonomy general name' ),
        'singular_name'     => _x( 'Career Location Category', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Career Location Categories' ),
        'all_items'         => __( 'All Career Location Category' ),
        'parent_item'       => __( 'Parent Career Location Category' ),
        'parent_item_colon' => __( 'Parent Career Location Category:' ),
        'edit_item'         => __( 'Edit Career Location Category' ),
        'view_item'         => __( 'view Career Location Category' ),
        'update_item'       => __( 'Update Career Location Category' ),
        'add_new_item'      => __( 'Add New Career Location Category' ),
        'new_item_name'     => __( 'New Career Location Category Name' ),
        'menu_name'         => __( 'Career Location Category' ),
    );
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_in_menu'      => true,
        'show_in_nav_menu'  => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'res-career-location' ),
    );
    register_taxonomy( 'res-career-location', array( 'res-careers' ), $args );

}
?>