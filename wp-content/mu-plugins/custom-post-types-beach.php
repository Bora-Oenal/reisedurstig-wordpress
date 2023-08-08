<?php

// Create Custom Post Type "Strände"
function create_custom_post_type_strand(){
  register_post_type('strand' , array (
      'public' => true,
      'labels' => array(
          'name' => 'Strände',
          'singular_name' => 'Strand',
          'add_new_item' => 'Neuen Strand hinzufügen',
          'name_admin_bar' => 'Strand', 
          'edit_item' => 'Strand bearbeiten',
          'new-item' => 'Neuer Strand',
          'view_item' => 'Strand anschauen',
          'all_items' => 'Alle Strände',
          'search_items' => 'Strand suchen',
          'menu_name' => 'Strände',
          'archives' => 'Strände Archive',
          'insert_into_item' => 'In Strand einfügen'
      ),
      'menu_icon' => 'dashicons-palmtree',
  ));
}
add_action('init','create_custom_post_type_strand');

// Add theme support for beitragsbilder in custom post type island
function add_featured_image_support_to_strand() {
  add_post_type_support( 'strand', 'thumbnail' );
}
add_action('init', 'add_featured_image_support_to_strand');
