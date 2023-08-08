<?php
/*
Plugin Name: Reisedurstig YouTube Plugin
Description: Fügt eine benutzerdefinierte YouTube-Sektion hinzu.
Version: 1.0
Author: Bora Önal
*/

function enqueue_youtube_section_scripts() {
    wp_enqueue_style('youtube-style', plugin_dir_url(__FILE__) . 'style-youtube.css');
    wp_enqueue_script('youtube-script', plugin_dir_url(__FILE__) . 'youtube-script.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_youtube_section_scripts');
?>
