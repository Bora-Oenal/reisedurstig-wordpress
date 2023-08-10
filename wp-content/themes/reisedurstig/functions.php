<?php 
/*
* Registriere und Lade die CSS-Dateien */
function rd_load_all_css(){
    wp_enqueue_style('normalize', get_template_directory_uri() . '/assets/css/normalize.css', array(), '1.0', 'all');
    wp_enqueue_style('bootstrap' , get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '1.0' , 'all' );
    wp_enqueue_style('font-awesome' , 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css', array(), '1.0' , 'all' );
    $version = wp_get_theme()->get('Version');
    // wp_enqueue_style('youtube-style', get_template_directory_uri() . '/youtube-section/style-youtube.css');
    // wp_enqueue_style('youtube-style', plugin_dir_url(__FILE__) . 'style-youtube.css');
    wp_enqueue_style('my-style' , get_template_directory_uri() . '/assets/css/my-style.css', array('bootstrap'), $version , 'all' );
    wp_enqueue_style( 'style', get_stylesheet_uri() );
   }
// Now hook this in WordPress System
//when we want run this function
add_action('wp_enqueue_scripts','rd_load_all_css');


/*
* Registriere und Lade die JS-Dateien */
function rd_load_all_js(){
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap' , get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '1.0' , true );
    // wp_enqueue_script('youtube-script', get_template_directory_uri() . '/youtube-section/youtube-script.js', array('jquery'), null, true);
    // wird nicht mehr benötigt, da bereits im pluginordner erledigt
    // wp_enqueue_script('youtube-script', plugin_dir_url(__FILE__) . 'youtube-script.js', array('jquery'), null, true);
    wp_enqueue_script('custom-js' , get_template_directory_uri() . '/assets/js/script.js', array(), '1.0' , true );
}
//when we want run this function
add_action('wp_enqueue_scripts', 'rd_load_all_js');


// Load Title Dynamically in the title-tag, but in the header-section, of each page
// Make them available to edit them at Backend 
function rd_load_page_titles() {
  // For using dynamic menu we must first register nav-menu, give first 
  // a name and what shot be displayed in Admin-Menu-Section bottom
  register_nav_menu('topMenu','Hauptmenu im Header');
  register_nav_menu( 'footerMenu', 'Footer-Menu');
  
  // enable an element / feature for your theme
  add_theme_support('title-tag');

  // enable an thumbnail for your theme -> activate for editing backend
  add_theme_support('post-thumbnails'); //for blog-posts
  add_theme_support('post-thumbnails', array('Stadt')); // for Stadt
  add_theme_support('post-thumbnails', array('Land'));

  // Enable excerpts for pages
  add_post_type_support('page', 'excerpt'); // This line enables excerpts for pages

  // Wir definieren unsere eigene Bildgrößen die geladen werden sollen
  add_image_size( 'relatedThumbnails', 400, 260, true );
  add_image_size( 'cityBoxImagesThumbnails', 500, 300, true );
}
//when we want run this function
add_action('after_setup_theme','rd_load_page_titles');


// Aktiviere den Classic Editor für Beiträge
function enable_classic_editor() {
  add_filter('use_block_editor_for_post', '__return_false', 10);
}
//when we want run this function
add_action('init', 'enable_classic_editor');



// The following function adds a class attribute to all <a> tags in a particular menu location ('topMenu').
// Necessary to give all elements a special classname (for those elements after li -> here a-tag)
function add_specific_menu_location_atts( $atts, $item, $args ) {
    // check if the item is in the primary menu
    if( $args->theme_location == 'topMenu' ) {
      // add the desired attributes:
      $atts['class'] = 'nav-link';
    }
    return $atts;
}
//when we want run this function
add_filter( 'nav_menu_link_attributes', 'add_specific_menu_location_atts', 10, 3 );



// We have learned how to create queries and manipulate what to display
// But for custom-post-types (e.g. stadt, land, events,...) we don't should
// manipulate the original files delievered by WordPress, eg. "events"
// Instead we create functions to manipulate url-based custom-post-pages

function stadt_query_modifications($query){
  if(!is_admin() AND is_post_type_archive('stadt') AND $query->is_main_query()){ // soll nicht für Elemente im Admin-Bereich gelten...und nur für stadt-archiv-seite und wenn default-query and not custom-query
    $today = date('Ymd');
    $query->set('meta_key' , 'reisedatum');
    $query->set('orderby' , 'meta_value_num');
    $query->set('order' , 'ASC');
    $query->set('meta_query' , array (
      array( //don't show old tours
          'key' => 'reisedatum',
          'compare' => '>=',
          'value' => $today,
          'type' => 'numeric'
      )
  ));
  }
  
}
// First we add the actions
//when we want run this function
add_action('pre_get_posts' , 'stadt_query_modifications');

// Funktion zum Rendern der Theme-Einstellungsseite
function mytheme_render_theme_settings_page() {
	?>
	<div class="wrap">
		<h1>Theme Settings</h1>
		<form method="post" action="options.php">
			<?php settings_fields('theme-settings-group'); ?>
			<?php do_settings_sections('theme-settings'); ?>
			<?php submit_button(); ?>
		</form>
	</div>
	<?php
}

// Funktion zum Registrieren der Theme-Einstellungsseite
function mytheme_register_theme_settings_page() {
	add_theme_page(
		'Theme Settings',
		'Theme Settings',
		'manage_options',
		'theme-settings',
		'mytheme_render_theme_settings_page'
	);

	// Füge die einzelnen Felder zur Seite hinzu
	add_settings_section(
		'ct_custom_theme_settings_section',
		'Theme Settings Section',
		'',
		'theme-settings'
	);

	add_settings_field(
		'logo_image',
		'Logo Image',
		'mytheme_render_logo_field',
		'theme-settings',
		'ct_custom_theme_settings_section'
	);

	add_settings_field(
		'phone_number',
		'Phone Number',
		'mytheme_render_phone_number_field',
		'theme-settings',
		'ct_custom_theme_settings_section'
	);

	add_settings_field(
		'address',
		'Address Information',
		'mytheme_render_address_field',
		'theme-settings',
		'ct_custom_theme_settings_section'
	);

	add_settings_field(
		'fax_number',
		'Fax Number',
		'mytheme_render_fax_number_field',
		'theme-settings',
		'ct_custom_theme_settings_section'
	);

	add_settings_field(
		'social_media_links',
		'Social Media Links',
		'mytheme_render_social_media_links_field',
		'theme-settings',
		'ct_custom_theme_settings_section'
	);

	// Registriere die Einstellungen
	register_setting(
		'theme-settings-group',
		'logo_image'
	);

	register_setting(
		'theme-settings-group',
		'phone_number'
	);

	register_setting(
		'theme-settings-group',
		'address'
	);

	register_setting(
		'theme-settings-group',
		'fax_number'
	);

	register_setting(
		'theme-settings-group',
		'social_media_links'
	);
}

// Registriere die Theme-Einstellungsseite
add_action('admin_menu', 'mytheme_register_theme_settings_page');




// Customizer Options
// Start-Page

// Add "Start Page" Edit section to customizer admin appearance screen
function reisedurstig_startpage_edit($wp_customize){
  $wp_customize->add_section('reisedurstig-startpage-section',array(
    //appearance in Admin-area
    'title' => 'Startpage Edit'
  ));
// now want input fields for 'Slogan'
  $wp_customize->add_setting('reisedurstig-hero-slogan', array(
    // placeholder for input-field
    'default'=>'Example Slogan',
  ));
// now want input fields for 'Slogan'
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize,
  'reisedurstig-hero-slogan-control' , array (
    'label'=>'Hero Slogan',
    'section'=> 'reisedurstig-startpage-section',
    'settings'=> 'reisedurstig-hero-slogan'
  )));
// now want input fields for 'Slogan Author'
  $wp_customize->add_setting('reisedurstig-hero-slogan-author', array(
    // placeholder for input-field
    'default'=>'Slogan von',
  ));
// now want input fields for 'Slogan Author'
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize,
  'reisedurstig-hero-slogan-author-control' , array (
    'label'=>'Slogan ist von...',
    'section'=> 'reisedurstig-startpage-section',
    'settings'=> 'reisedurstig-hero-slogan-author'
  )));
// now want input fields for 'Button-Link'
  $wp_customize->add_setting('reisedurstig-button-link', array(
    // placeholder for input-field
    'default'=>'URL',
  ));
// now want input fields for 'Button-Link'
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize,
  'reisedurstig-button-link-control' , array (
    'type'=> 'url',
    'label'=>'Button-URL',
    'section'=> 'reisedurstig-startpage-section',
    'settings'=> 'reisedurstig-button-link',
    'input_attrs' => array(
      'placeholder' => __( 'http://www.google.com' ),
    ),
  )));
// now want input fields for 'Button-Label'
  $wp_customize->add_setting('reisedurstig-button-text', array(
    // placeholder for input-field
    'default'=>'CTA-Text',
  ));
// now want input fields for 'Button-Label'
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize,
  'reisedurstig-button-text-control' , array (
    'type'=> 'text',
    'label'=>'Call-to-Action Text',
    'section'=> 'reisedurstig-startpage-section',
    'settings'=> 'reisedurstig-button-text'
  )));
  // now want input fields for 'Google Maps URL'
  $wp_customize->add_setting('reisedurstig-gmaps-url', array(
    // placeholder for input-field
    'default'=>'URL',
  ));
  // now want input fields for 'Google Maps URL'
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize,
  'reisedurstig-gmaps-url-control' , array (
    'type'=> 'url',
    'label'=>'Google Maps URL',
    'section'=> 'reisedurstig-startpage-section',
    'settings'=> 'reisedurstig-gmaps-url',
    'input_attrs' => array(
      'placeholder' => __( 'http://www.google.com' ),
    ),
  )));
}
//when we want run this function
add_action( 'customize_register' , 'reisedurstig_startpage_edit' ); 

// Customizer Options
// Hero-Image_Video-Section
// Old Version: New Version please see after the commented code below

// function custom_theme_customizer( $wp_customize ) {

// Create 'Hero Videos for All Pages' Section in Customizer
  // $wp_customize->add_section( 'common_hero_videos_section', array(
  //     'title' => 'Hero Videos for All Pages',
  //     'priority' => 30,
  // ) );

//   // Hero Video ID Setting for Home Page (header.php)
  // $wp_customize->add_setting( 'hero_video_id', array(
  //     'default' => '',
  // ) );

//   // Hero Video Control for Home Page
  // $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'hero_video_control', array(
  //     'label' => 'Select Hero Video for Home Page',
  //     'section' => 'common_hero_videos_section',
  //     // Hier wird das Einstellungsobjekt (hero_video_id) angegeben, das mit diesem Steuerelement verknüpft ist. Das bedeutet, dass die Auswahl des Benutzers im Steuerelement auf diese Einstellung gespeichert wird.
  //     'settings' => 'hero_video_id',
  //     'mime_type' => 'video',
  //     'library' => array( 'type' => 'video' ),
  // ) ) );

//   // Hero Video ID Setting for About Page (header-about.php)
  // $wp_customize->add_setting( 'hero_video_about_id', array(
  //     'default' => '',
  // ) );

//   // Hero Video Control for About Page
  // $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'hero_video_about_control', array(
  //     'label' => 'Select Hero Video for About Page',
  //     'section' => 'common_hero_videos_section',
  //     // Hier wird das Einstellungsobjekt (hero_video_id) angegeben, das mit diesem Steuerelement verknüpft ist. Das bedeutet, dass die Auswahl des Benutzers im Steuerelement auf diese Einstellung gespeichert wird.
  //     'settings' => 'hero_video_about_id',
  //     'mime_type' => 'video',
  //     'library' => array( 'type' => 'video' ),
  // ) ) );

//   // Hero Video ID Setting for Archive Stadt Page
  // $wp_customize->add_setting( 'hero_video_archive_stadt_id', array(
  //     'default' => '',
  // ) );

//   // Hero Video Control for Archive Stadt Page
  // $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'hero_video_archive_stadt_control', array(
  //     'label' => 'Select Hero Video for Archive Stadt Page',
  //     'section' => 'common_hero_videos_section',
  //     // Hier wird das Einstellungsobjekt (hero_video_id) angegeben, das mit diesem Steuerelement verknüpft ist. Das bedeutet, dass die Auswahl des Benutzers im Steuerelement auf diese Einstellung gespeichert wird.
  //     'settings' => 'hero_video_archive_stadt_id',
  //     'mime_type' => 'video',
  //     'library' => array( 'type' => 'video' ),
  // ) ) );

//   // Hero Video ID Setting for Archive Land Page
  // $wp_customize->add_setting( 'hero_video_archive_land_id', array(
  //     'default' => '',
  // ) );

//   // Hero Video Control for Archive Land Page
  // $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'hero_video_archive_land_control', array(
  //     'label' => 'Select Hero Video for Archive Land Page',
  //     'section' => 'common_hero_videos_section',
  //     // Hier wird das Einstellungsobjekt (hero_video_id) angegeben, das mit diesem Steuerelement verknüpft ist. Das bedeutet, dass die Auswahl des Benutzers im Steuerelement auf diese Einstellung gespeichert wird.
  //     'settings' => 'hero_video_archive_land_id',
  //     'mime_type' => 'video',
  //     'library' => array( 'type' => 'video' ),
  // ) ) );

//   // Hero Video ID Setting for Archive Page (News Page / header-archive.php)
  // $wp_customize->add_setting( 'hero_video_archive_id', array(
  //     'default' => '',
  // ) );

//   // Hero Video Control for Archive Page (News Page / header-archive.php)
  // $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'hero_video_archive_control', array(
  //     'label' => 'Select Hero Video for News (Blog) Page',
  //     'section' => 'common_hero_videos_section',
  //     // Hier wird das Einstellungsobjekt (hero_video_id) angegeben, das mit diesem Steuerelement verknüpft ist. Das bedeutet, dass die Auswahl des Benutzers im Steuerelement auf diese Einstellung gespeichert wird.
  //     'settings' => 'hero_video_archive_id',
  //     'mime_type' => 'video',
  //     'library' => array( 'type' => 'video' ),
  // ) ) );

//   // Hero Video ID Setting for Blog Post Pages (Blogbeitragseite / header-blog-post.php)
  // $wp_customize->add_setting( 'hero_video_blog_post_id', array(
  //     'default' => '',
  // ) );

//   // Hero Video Control for Blog Post Pages (Blogbeitragseite / header-blog-post.php)
  // $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'hero_video_blog_post_control', array(
  //     'label' => 'Select Hero Video for Blog Post (News-Beiträge) Pages',
  //     'section' => 'common_hero_videos_section',
  //     // Hier wird das Einstellungsobjekt (hero_video_id) angegeben, das mit diesem Steuerelement verknüpft ist. Das bedeutet, dass die Auswahl des Benutzers im Steuerelement auf diese Einstellung gespeichert wird.
  //     'settings' => 'hero_video_blog_post_id',
  //     'mime_type' => 'video',
  //     'library' => array( 'type' => 'video' ),
  // ) ) );

//   // Hero Video ID Setting for Contact Pages (header-contact.php)
  // $wp_customize->add_setting( 'hero_video_contact_id', array(
  //     'default' => '',
  // ) );

//   // Hero Video Control for Contact Pages (header-contact.php)
  // $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'hero_video_contact_control', array(
  //     'label' => 'Select Hero Video for Contact Page',
  //     'section' => 'common_hero_videos_section',
  //     // Hier wird das Einstellungsobjekt (hero_video_id) angegeben, das mit diesem Steuerelement verknüpft ist. Das bedeutet, dass die Auswahl des Benutzers im Steuerelement auf diese Einstellung gespeichert wird.
  //     'settings' => 'hero_video_contact_id',
  //     'mime_type' => 'video',
  //     'library' => array( 'type' => 'video' ),
  // ) ) );

//   // Hero Video ID Setting for Support Me Page (header-support.php)
  // $wp_customize->add_setting( 'hero_video_support_id', array(
  //     'default' => '',
  // ) );

//   // Hero Video Control for Contact Pages (header-contact.php)
//   $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'hero_video_contact_control', array(
//       'label' => 'Select Hero Video for Support Me Page',
//       'section' => 'common_hero_videos_section',
//       // Hier wird das Einstellungsobjekt (hero_video_id) angegeben, das mit diesem Steuerelement verknüpft ist. Das bedeutet, dass die Auswahl des Benutzers im Steuerelement auf diese Einstellung gespeichert wird.
//       'settings' => 'hero_video_support_id',
//       'mime_type' => 'video',
//       'library' => array( 'type' => 'video' ),
//   ) ) );
// }
// add_action( 'customize_register', 'custom_theme_customizer' );


// Customizer Options
// Hero-Image_Video-Section
// New and short version
function custom_theme_customizer( $wp_customize ) {
    // Create 'Hero Videos for All Pages' Section in Customizer
    $wp_customize->add_section( 'common_hero_videos_section', array(
        'title' => 'Hero Videos for All Pages',
        'priority' => 30,
    ) );
  
    $pages = array(
      'home' => 'Home Page',
      'about' => 'About Page',
      'archive_stadt' => 'Archive Stadt Page',
      'archive_land' => 'Archive Land Page',
      'archive_insel' => 'Archive Insel Page',
      'archive_planet' => 'Archive Planet Page',
      'archive' => 'News (Blog) Page',
      'blog_post' => 'Blog Post Pages',
      'contact' => 'Contact Page',
      'support' => 'Support Me Page',
    );
  
    foreach ( $pages as $slug => $label ) {
      // Hero Video ID Setting
      $wp_customize->add_setting( "hero_video_{$slug}_id", array(
          'default' => '',
      ) );
  
      // Hero Video Control
      $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, "hero_video_{$slug}_control", array(
          'label' => "Select Hero Video for {$label}",
          'section' => 'common_hero_videos_section',
          'settings' => "hero_video_{$slug}_id",
          'mime_type' => 'video',
          'library' => array( 'type' => 'video' ),
      ) ) );

        // Create 'Website Logo' Section in Customizer
        $wp_customize->add_section( 'common_logo_section', array(
            'title' => 'Website Logo',
            'priority' => 30,
        ) );

        // Logo ID Setting
        $wp_customize->add_setting( 'logo_id', array(
            'default' => '',
        ) );

        // Logo Control for Home Page
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'logo_control', array(
            'label' => 'Select Website Logo',
            'section' => 'common_logo_section',
            // Hier wird das Einstellungsobjekt (logo_id) angegeben, das mit diesem Steuerelement verknüpft ist. Das bedeutet, dass die Auswahl des Benutzers im Steuerelement auf diese Einstellung gespeichert wird.
            'settings' => 'logo_id',
            'mime_type' => 'image', // Hier wird 'image' verwendet, um Bilder auszuwählen
            'library' => array( 'type' => 'image' ),
  ) ) );
    }
  }
  //when we want run this function
  add_action( 'customize_register', 'custom_theme_customizer' );
  

