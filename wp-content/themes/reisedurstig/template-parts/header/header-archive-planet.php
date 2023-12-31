<!DOCTYPE html>
<!-- wp chose the language you have in wp-settings -->
<html <?php language_attributes();?>>
    <head>
        <meta name="viewport" content="width-device-device, initial-scale=1">
        <?php wp_head();?>
    </head>
    <body>
        <!-- ProgressBar -->
        <?php get_template_part( 'template-parts/scrollProgressSection' );?>
        <!-- Hero -->
        <div class="position-relative overflow-hidden">
            <div class="d-flex min-vh-100 video-cnt" lc-helper="video-bg">
                <!-- Video -->
                <!-- Für das Ermöglichen der Auswahl im Customizer -->
               <!-- Dieser Code zeigt das ausgewählte Hero Video für die Planet-Archivseite an -->

                <?php
                // Holen der Hero Video Einstellung für die Planet-Archivseite
                $hero_video_archive_planet_id = get_theme_mod( 'hero_video_archive_planet_id' );

                // Die URL des ausgewählten Hero Videos erhalten
                $hero_video_archive_planet_url = wp_get_attachment_url( $hero_video_archive_planet_id );

                // Wenn eine URL vorhanden ist, das Video anzeigen
                if ( ! empty( $hero_video_archive_planet_url ) ) :
                ?>
                    <video
                        class="position-absolute w-100 header-video-bg"
                        autoplay=""
                        preload=""
                        muted=""
                        loop=""
                        playsinline="">
                        <source
                            src="<?php echo esc_url( $hero_video_archive_planet_url ); ?>"
                            type="video/mp4">
                    </video>
                <?php endif; ?>

                <div class="overlay"></div>
                <div class="header-cnt">
                    <div class="rd-header-wrapper">
                        <a class="navbar-brand logo-a" href="<?php echo site_url(); ?>">
                            <?php get_template_part( 'template-parts/logo-display' );?>
                        </a>
                        <!-- Navbar -->
                        <?php get_template_part('template-parts/navbar'); ?>
                    </div>

                    <!-- Hero-Container -->
                    <div class="container hero-cnt">
                        <!-- Hero-Title -->
                        <div
                            style="z-index:2"
                            class="align-self-center text-center text-light col-md-8 offset-md-2">
                            <div class="lc-block mb-4">
                                <div editable="rich">
                                    <h1 class="display-1 hero-hdl"><?php post_type_archive_title();?></h1>
                                    <p class="hdl-subliner">Die faszinierende Vielfalt unseres Sonnensystems</p>
                                </div>
                            </div>
                        </div>
                         <!-- Down Arrow Icon -->
                        <p class="footer-text-p footer-icons hero-arrow-icon">
                                <i class="fa fa-angle-double-down"></i>
                        </p>
                    </div>
                </div>
            </div>
        </div>