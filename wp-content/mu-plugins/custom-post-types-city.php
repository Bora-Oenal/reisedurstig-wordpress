<?php
// create custom-post-types
// Custom Post Type "Städte"
function create_custom_post_type_city(){
    register_post_type('stadt', array(
        // aktivere neues Admin-Theme anstatt Classic-Theme
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
            'name' => 'Städte',
            'singular_name' => 'Stadt',
            'add_new_item' => 'Neue Stadt hinzufügen',
            'name_admin_bar' => 'Stadt', 
            'edit_item' => 'Stadt bearbeiten',
            'new-item' => 'Neue Stadt',
            'view_item' => 'Stadt anschauen',
            'all_items' => 'Alle Städte',
            'search_items' => 'Stadt suchen',
            'menu_name' => 'Städte',
            'archives' => 'Stadt Archive',
            'insert_into_item' => 'In Stadt einfügen'
        ),
        'menu_icon' => 'dashicons-location-alt'
    ));
}
add_action('init' , 'create_custom_post_type_city');

// Add theme support für beitragsbilder in custom post type city
// WICHTIGT INFO: Nicht benötigt da wir thumbnail oben bei supports integrieren,
// wäre aber auch eine Möglichkeit
// function add_featured_image_support_to_stadt() {
//     add_post_type_support( 'stadt','thumbnail' );
// }
// add_action('init', 'add_featured_image_support_to_stadt');
