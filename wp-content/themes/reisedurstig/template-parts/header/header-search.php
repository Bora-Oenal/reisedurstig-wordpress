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
            <div class="d-flex min-vh-50 video-cnt header-md" lc-helper="video-bg">
                <!-- Video -->
                <!-- Für das Ermöglichen der Auswahl im Customizer -->
               <!-- Dieser Code zeigt das ausgewählte Hero Video für die Stadt-Archivseite an -->

                <?php
                // Holen der Hero Video Einstellung für die Stadt-Archivseite
                $hero_video_search_id = get_theme_mod( 'hero_video_search_id' );

                // Die URL des ausgewählten Hero Videos erhalten
                $hero_video_search_url = wp_get_attachment_url( $hero_video_search_id );

                // Wenn eine URL vorhanden ist, das Video anzeigen
                if ( ! empty( $hero_video_search_url ) ) :
                ?>
                <video
                    class="position-absolute w-100 header-video-bg"
                    autoplay=""
                    preload=""
                    muted=""
                    loop=""
                    playsinline="">
                    <source
                        src="<?php echo esc_url( $hero_video_search_url ); ?>"
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
                                    <h1 class="display-1 hero-hdl">Suchergebnisse</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>