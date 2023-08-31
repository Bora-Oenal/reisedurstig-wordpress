<?php

// Create Custom Post Type "Länder"
function create_custom_post_type_country(){
    register_post_type('land' , array (
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
                'name' => 'Länder',
                'singular_name' => 'Land',
                'add_new_item' => 'Neues Land hinzufügen',
                'name_admin_bar' => 'Land', 
                'edit_item' => 'Land bearbeiten',
                'new-item' => 'Neues Land',
                'view_item' => 'Land anschauen',
                'all_items' => 'Alle Länder',
                'search_items' => 'Land suchen',
                'menu_name' => 'Länder',
                'archives' => 'Land Archive',
                'insert_into_item' => 'In Land einfügen'
  
      ),
      'menu_icon' => 'dashicons-admin-site'
    ));
  }
  add_action('init','create_custom_post_type_country');
  
// Add theme support für beitragsbilder in custom post type city
// WICHTIGT INFO: Nicht benötigt da wir thumbnail oben bei supports integrieren,
// wäre aber auch eine Möglichkeit
// function add_featured_image_support_to_land() {
//   add_post_type_support( 'land', 'thumbnail' );
// }
// add_action('init', 'add_featured_image_support_to_land');