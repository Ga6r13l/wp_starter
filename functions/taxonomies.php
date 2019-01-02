<?php

// Register Custom Taxonomy
function custom_product_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Product Tags', 'Taxonomy General Name', 'test' ),
		'singular_name'              => _x( 'Product Tag', 'Taxonomy Singular Name', 'test' ),
		'menu_name'                  => __( 'Product Tag', 'test' ),
		'all_items'                  => __( 'All Tags', 'test' ),
		'parent_item'                => __( 'Parent Tag', 'test' ),
		'parent_item_colon'          => __( 'Parent Tag:', 'test' ),
		'new_item_name'              => __( 'New Tag Name', 'test' ),
		'add_new_item'               => __( 'Add New Tag', 'test' ),
		'edit_item'                  => __( 'Edit Tag', 'test' ),
		'update_item'                => __( 'Update Tag', 'test' ),
		'view_item'                  => __( 'View Tag', 'test' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'test' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'test' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'test' ),
		'popular_items'              => __( 'Popular Tags', 'test' ),
		'search_items'               => __( 'Search Tags', 'test' ),
		'not_found'                  => __( 'Not Found', 'test' ),
		'no_terms'                   => __( 'No items', 'test' ),
		'items_list'                 => __( 'Tags list', 'test' ),
		'items_list_navigation'      => __( 'Tags list navigation', 'test' ),
	);

	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);

	register_taxonomy( 'product_tag', array( 'product' ), $args );

}

add_action( 'init', 'custom_product_taxonomy', 0 );
