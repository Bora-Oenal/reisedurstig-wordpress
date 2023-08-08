<?php
// create custom-post-types
// Custom Post Type "Planet"
function create_custom_post_type_planet(){
    register_post_type('planet', array(
        /* aktiviere Archive fpr custom-type "planet" */
        'has_archive' => true,  
         // Stelle folgende features im Backend im Custom-Post-Type zur Verfügung die default verfügbar sind "editor und excerpt"
        'supports' => array('title' , 'editor' , 'excerpt' , 'thumbnail'),
        'public' => true,
        'labels' => array(
            'name' => 'Planeten',
            'singular_name' => 'Planet',
            'add_new_item' => 'Neue Planet hinzufügen',
            'name_admin_bar' => 'Planet', 
            'edit_item' => 'Planet bearbeiten',
            'new-item' => 'Neue Planet',
            'view_item' => 'Planet anschauen',
            'all_items' => 'Alle Planeten',
            'search_items' => 'Planet suchen',
            'menu_name' => 'Planeten',
            'archives' => 'Planet Archive',
            'insert_into_item' => 'In Planet einfügen'
        ),
        'menu_icon' => 'dashicons-admin-site-alt3'
    ));
}
add_action('init' , 'create_custom_post_type_planet');

// Add theme support für beitragsbilder in custom post type city
// WICHTIGT INFO: Nicht benötigt da wir thumbnail oben bei supports integrieren,
// wäre aber auch eine Möglichkeit
// function add_featured_image_support_to_stadt() {
//     add_post_type_support( 'stadt','thumbnail' );
// }
// add_action('init', 'add_featured_image_support_to_stadt');
