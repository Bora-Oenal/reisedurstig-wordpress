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
                <!-- Hero Video -->
                <!-- Für das Ermöglichen der Auswahl im Customizer -->
                <?php
                // Holen der Hero Video Einstellung für die Support-Me-Seite
                $hero_video_support_id = get_theme_mod( 'hero_video_support_id' ); // Hier wird die Kontakt-Seite Einstellung verwendet
                
                // Die URL des ausgewählten Hero Videos erhalten
                $hero_video_support_url = wp_get_attachment_url( $hero_video_support_id );
                
                // Wenn eine URL vorhanden ist, das Video anzeigen
                if ( ! empty( $hero_video_support_url ) ) :
                ?>
                    <video
                        class="position-absolute w-100 header-video-bg"
                        autoplay=""
                        preload=""
                        muted=""
                        loop=""
                        playsinline="">
                        <source
                            src="<?php echo esc_url( $hero_video_support_url ); ?>"
                            type="video/mp4">
                    </video>
                <?php endif; ?>

                <!-- <video
                    class="position-absolute w-100 header-video-bg"
                    autoplay=""
                    preload=""
                    muted=""
                    loop=""
                    playsinline="">
                    <source
                        src="<?php echo get_template_directory_uri(); ?>/assets/videos/waterfall-rd.mp4"
                        type="video/mp4">
                </video> -->
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
                                    <h1 class="display-1 hero-hdl"><?php the_title(); ?></h1>
                                    <p class="hdl-subliner"><?php echo get_the_excerpt(); ?></p>
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