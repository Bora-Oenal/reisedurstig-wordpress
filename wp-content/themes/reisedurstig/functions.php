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


// THEME-SETTING in "Design", only for Footer for practise
// Funktion zum Rendern und Anpassung der Theme-Einstellungsseite
function mytheme_render_theme_settings_page() {
	?>
	<div class="wrap">
		<h1>Theme Settings - Einstellungsseite für reisedurstig theme</h1>
		<form method="post" action="options.php">
			<?php settings_fields('theme-settings-group'); ?>
			<?php do_settings_sections('theme-settings'); ?>
			<?php submit_button(); ?>
		</form>
	</div>
	<?php
}
// Funktion zum Rendern des Logo-Bildfeldes im Footer
function mytheme_render_logo_field() {
  $logo_image = esc_attr(get_option('logo_image'));
  $logo_image_url = wp_get_attachment_url($logo_image); // Logo-Bild-URL aus der Anhangs-ID abrufen
  ?>
  <input type="hidden" name="logo_image" id="logo_image" value="<?php echo $logo_image; ?>" />
  <img src="<?php echo $logo_image_url; ?>" style="max-width: 200px; height: auto;" id="logo_image_preview" />
  <input type="button" class="button button-secondary" value="Choose Image" id="logo_image_button" />
  <input type="button" class="button button-secondary" value="Remove Image" id="logo_image_remove_button" />
  <script>
      jQuery(document).ready(function($) {
          // Bildauswahl öffnen
          $('#logo_image_button').click(function() {
              var customUploader = wp.media({
                  title: 'Select or Upload Image',
                  button: {
                      text: 'Use this Image'
                  },
                  multiple: false
              });

              customUploader.on('select', function() {
                  var attachment = customUploader.state().get('selection').first().toJSON();
                  $('#logo_image').val(attachment.id);
                  $('#logo_image_preview').attr('src', attachment.url);
              });

              customUploader.open();
          });

          // Bildentfernung
          $('#logo_image_remove_button').click(function() {
              $('#logo_image').val('');
              $('#logo_image_preview').attr('src', '');
          });
      });
  </script>
  <?php
}
// Nötig damit man im backend media-files nutzen kann
function enqueue_media_scripts() {
  if (is_admin()) {
      wp_enqueue_media();
  }
}
add_action('admin_enqueue_scripts', 'enqueue_media_scripts');

// Funktion zum Rendern des Headline Footer-Left
function mytheme_render_headline_footer_left_field() {
	$headline_footer_left = esc_attr(get_option('headline_footer_left'));
  echo '<textarea name="headline_footer_left">' . $headline_footer_left . '</textarea>';
}
// Funktion zum Anzeigen des Headline Footer-Left
function mytheme_display_headline_footer_left() {
    $headline_footer_left = esc_attr(get_option('headline_footer_left'));
    // Zeige den Adresswert als Inhalt eines <p>-Tags an
    echo '<p>' . nl2br($headline_footer_left) . '</p>';
}
// Funktion zum Rendern Textfeld im Footer Left
function mytheme_render_text_footer_left_field() {
  $text_footer_left = esc_attr(get_option('text_footer_left'));
  echo '<textarea name="text_footer_left">' . $text_footer_left . '</textarea>';
}
// Funktion zum Anzeigen Textfeld im Footer Left
function mytheme_display_text_footer_left() {
  $text_footer_left = esc_attr(get_option('text_footer_left'));
  // Zeige den Faxnummernwert als Inhalt eines <p>-Tags an
  echo '<p>' . $text_footer_left . '</p>';
}
// Funktion zum Rendern des aktuellen Standorts Footer Mitte
function mytheme_render_location_field() {
	$current_location = esc_attr(get_option('current_location'));
	echo '<textarea name="current_location">' . $current_location . '</textarea>';
}
// Funktion zum Rendern des aktuellen Standorts Footer Mitte
function mytheme_display_location() {
    $current_location = esc_attr(get_option('current_location'));
    // Zeige den Adresswert als Inhalt eines <p>-Tags an
    echo '<p class="footer-adress-content">' . nl2br($current_location) . '</p>';
}
// Funktion zum Rendern des E-Mail-Adresse Footer Mitte
function mytheme_render_email_field() {
	$email = esc_attr(get_option('email'));
	echo '<textarea name="email">' . $email . '</textarea>';
}
// Funktion zum Rendern der E-Mail-Adresse Footer Mitte
function mytheme_display_email() {
    $email = esc_attr(get_option('email'));
    // Zeige den Adresswert als Inhalt eines <p>-Tags an
    echo '<p class="footer-adress-content">' . nl2br($email) . '</p>';
}
// Funktion zum Rendern der Telefonnummer-Feldes
function mytheme_render_phone_number_field() {
	$phone_number = esc_attr(get_option('phone_number'));
	echo '<textarea name="phone_number">' . $phone_number . '</textarea>';
}
// Funktion zum Anzeigen der Telefonnummer
function mytheme_display_phone_number() {
    $phone_number = esc_attr(get_option('phone_number'));

    // Zeige den Telefonnummernwert als Inhalt eines <p>-Tags an
    echo '<p class="footer-adress-content">' . $phone_number . '</p>';
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
// Feld für Footer Logo
	add_settings_field(
		'logo_image',
		'Logo Image',
		'mytheme_render_logo_field',
		'theme-settings',
		'ct_custom_theme_settings_section'
	);
// Feld für Headline Footer Links
	add_settings_field(
		'headline_footer_left',
		'Headline Footer Left',
		'mytheme_render_headline_footer_left_field',
		'theme-settings',
		'ct_custom_theme_settings_section'
	);
// Feld für TextFeld Footer Links
	add_settings_field(
		'text_footer_left',
		'Text Footer Left',
		'mytheme_render_text_footer_left_field',
		'theme-settings',
		'ct_custom_theme_settings_section'
	);
// Feld für Current Location Footer Mitte
	add_settings_field(
		'current_location',
		'Current Location',
		'mytheme_render_location_field',
		'theme-settings',
		'ct_custom_theme_settings_section'
	);

// Feld für E-Mail field Footer Mitte
	add_settings_field(
		'email',
		'E-Mail',
		'mytheme_render_email_field',
		'theme-settings',
		'ct_custom_theme_settings_section'
	);
// Feld für Telefon Field Footer Mitte
	add_settings_field(
		'phone_number',
		'Telefon Nummer',
		'mytheme_render_phone_number_field',
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
		'headline_footer_left'
	);

	register_setting(
		'theme-settings-group',
		'text_footer_left'
	);

	register_setting(
		'theme-settings-group',
		'current_location'
	);

	register_setting(
		'theme-settings-group',
		'phone_number'
	);
}
// Run it
add_action('admin_menu', 'mytheme_register_theme_settings_page');




// Customizer Options
// Start-Page

// Add "Start Page" Edit section to customizer admin appearance screen
function reisedurstig_startpage_edit($wp_customize){
  $wp_customize->add_section('reisedurstig-startpage-section',array(
    //appearance in Admin-area
    'title' => 'Startpage Edit',
    'priority' => 10
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

// Add "YouTube" Edit section to customizer admin appearance screen
function reisedurstig_youtube_section_integration($wp_customize){
  $wp_customize->add_section('reisedurstig-youtube-section',array(
    //appearance in Admin-area
    'title' => 'YouTube Section',
    'priority' => 12,
  ));
    // now want input fields for 'YouTube API-key'
    $wp_customize->add_setting('reisedurstig-yt-api-key', array(
      // placeholder for input-field
      'default'=>'API-Key here',
    ));
    // now want input fields for 'YouTube API-key'
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize,
    'reisedurstig-yt-api-key-control' , array (
      'label'=>'YouTube API-Key',
      'section'=> 'reisedurstig-youtube-section',
      'settings'=> 'reisedurstig-yt-api-key'
      ),
 ));
    // now want input fields for 'YouTube API-key'
    $wp_customize->add_setting('reisedurstig-yt-channel-id', array(
      // placeholder for input-field
      'default'=>'Channel-IDhere',
    ));
    // now want input fields for 'YouTube API-key'
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize,
    'reisedurstig-yt-channel-id-control' , array (
      'label'=>'YouTtube API-Key',
      'section'=> 'reisedurstig-youtube-section',
      'settings'=> 'reisedurstig-yt-channel-id'
      ),
 ));
}
 //when we want run this function
add_action( 'customize_register' , 'reisedurstig_youtube_section_integration' ); 

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
        'priority' => 11,
    ) );
  
    $pages = array(
      'home' => 'Home Page',
      'about' => 'About Page',
      'archive_stadt' => 'Archive Stadt Page',
      'archive_land' => 'Archive Land Page',
      'archive_insel' => 'Archive Insel Page',
      'archive_strand' => 'Archive Strand Page',
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
            'priority' => 5,
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
  


// Diese Funktion ermöglicht die Parameterübergabe (Youtube-Api) von Customizer an JS-Datei (reisedurstig-youtube-plugin)
function enqueue_custom_script_in_plugin() {
    wp_enqueue_script('custom-plugin-script', plugin_dir_url( __FILE__ ) . '../../plugins/reisedurstig-youtube-plugin/youtube-script.js', array(), null, true);

    $api_key = get_theme_mod('reisedurstig-yt-api-key');
    $channel_id = get_theme_mod('reisedurstig-yt-channel-id');

    $script_data = array(
        'api_key' => $api_key,
        'channel_id' => $channel_id
    );

    wp_localize_script('custom-plugin-script', 'customPluginScriptData', $script_data);
}
add_action('wp_enqueue_scripts', 'enqueue_custom_script_in_plugin');


// Funktion zum Erstellen des Shortcodes
function google_maps_shortcode() {
  ob_start(); // Pufferung starten
  ?>
  <!-- GoogleMAps-Section -->
  <div class="container-md google-maps-cnt">
      <h2 class="page-h2">Aktuell in</h2>
      <div class="ratio ratio-16x9">
          <!-- <iframe
              src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=medellin%20castilla+(My%20Business%20Name)&amp;t=&amp;z=5&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"
              allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
          </iframe> -->
          <iframe
              src="<?php echo esc_url(get_theme_mod('reisedurstig-gmaps-url')); ?>"
              allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
          </iframe>
      </div>
  </div>
  <?php
  return ob_get_clean(); // Pufferung beenden und Inhalt zurückgeben
}
add_shortcode('google_maps', 'google_maps_shortcode'); // Shortcode hinzufügen



// Register widget option in backend and add widget location (example:sidebar)
function rdWidgetsInit() {
	register_sidebar( array(
		'name'          => 'Sidebar (Custom location)',
		'id'            => 'sidebar1'
	) );
}
add_action( 'widgets_init', 'rdWidgetsInit' );