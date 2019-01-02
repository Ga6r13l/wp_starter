<?php

// Register Custom Post Type
function theme_custom_post_types() {

  // the post types to add
  $post_types = array(

    'product' => array(
      'label'                 => __( 'Produkt', 'product' ),
      'description'           => __( 'Strony informacjyjne porduktu.', 'product' ),
      'labels'                => array(
        'name'                  => _x( 'Produkty', 'Post Type General Name', 'product' ),
        'singular_name'         => _x( 'Produkt', 'Post Type Singular Name', 'product' ),
        'menu_name'             => __( 'Produkty', 'product' ),
        'name_admin_bar'        => __( 'Produkt', 'product' ),
        'archives'              => __( 'Archiwum porduktów', 'product' ),
        'parent_item_colon'     => __( 'Rodzic produktu:', 'product' ),
        'all_items'             => __( 'Wszystkie pordukty', 'product' ),
        'add_new_item'          => __( 'Dodaj nowy product', 'product' ),
        'add_new'               => __( 'Nowy produkt', 'product' ),
        'new_item'              => __( 'Nowy produkt', 'product' ),
        'edit_item'             => __( 'Edytuj produkt', 'product' ),
        'update_item'           => __( 'Zaktualizuj produkt', 'product' ),
        'view_item'             => __( 'Pokaż produkt', 'product' ),
        'search_items'          => __( 'Znajdź pordukt', 'product' ),
        'not_found'             => __( 'Nie znaleziono produktu', 'product' ),
        'not_found_in_trash'    => __( 'Nie znaleziono produktu w koszu', 'product' ),
        'featured_image'        => __( 'Obrazek', 'product' ),
        'set_featured_image'    => __( 'Ustaw obrazek', 'product' ),
        'remove_featured_image' => __( 'Usuń obrazek', 'product' ),
        'use_featured_image'    => __( 'Użyj obrazka', 'product' ),
        'insert_into_item'      => __( 'Wstaw do produktu', 'product' ),
        'uploaded_to_this_item' => __( 'Wgraj do porduktu', 'product' ),
        'items_list'            => __( 'Lista produltów', 'product' ),
        'items_list_navigation' => __( 'Lista produktów', 'product' ),
        'filter_items_list'     => __( 'Filtrowana lista', 'product' ),
      ),
      'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields', ),
      'taxonomies'            => array( 'category', 'product_tag' ),
      'hierarchical'          => false,
      'public'                => true,
      'show_ui'               => true,
      'show_in_menu'          => true,
      'menu_position'         => 5,
      'show_in_admin_bar'     => true,
      'show_in_nav_menus'     => true,
      'can_export'            => true,
      'has_archive'           => true,
      'exclude_from_search'   => false,
      'publicly_queryable'    => true,
      'capability_type'       => 'page',
    )

  );

  // register each post type
  foreach ($post_types as $type_name => $type_args) {
    register_post_type( $type_name, $type_args );
  }

}

add_action( 'init', 'theme_custom_post_types', 0 ); // Add theme custom post types (one as example)
