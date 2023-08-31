<?php

// Create Custom Post Type "Inseln"
function create_custom_post_type_insel(){
  register_post_type('insel' , array(
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
          'name' => 'Inseln',
          'singular_name' => 'Insel',
          'add_new_item' => 'Neue Insel hinzufügen',
          'name_admin_bar' => 'Insel', 
          'edit_item' => 'Insel bearbeiten',
          'new-item' => 'Neue Insel',
          'view_item' => 'Insel anschauen',
          'all_items' => 'Alle Inseln',
          'search_items' => 'Insel suchen',
          'menu_name' => 'Inseln',
          'archives' => 'Insel Archive',
          'insert_into_item' => 'In Insel einfügen'
      ),
      'menu_icon' => 'dashicons-palmtree',
  ));
}
add_action('init','create_custom_post_type_insel');