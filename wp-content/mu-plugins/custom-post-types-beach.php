<?php

// Create Custom Post Type "Strände"
function create_custom_post_type_strand(){
  register_post_type('strand' , array(
    // REST-API-Unterstützung aktiviert 
    'show_in_rest' => true,  
    /* Wenn ein neues Custom Post registriert wurde, muss man 'has_archive'
    integrieren, damit WP weis, das dieser custom post type auch einen Archive unterstützt*/
    'has_archive' => true,  
     // Stelle folgende features im Backend im Custom-Post-Type zur Verfügung die default verfügbar sind" , editor und excerpt"
     'supports' => array('title' , 'editor' , 'excerpt' , 'thumbnail'),
    // wenn man in der plural statt "Stadt" Plural möchte, brauche ich nicht, auskommentiert
    // 'rewrite' => array('slug' => 'staedte'),
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
