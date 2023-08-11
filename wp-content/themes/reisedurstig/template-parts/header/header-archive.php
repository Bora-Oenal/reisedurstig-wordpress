<!-- Header für News Page / Blog Archive -->
<!DOCTYPE html>
<!-- wp chose the language you have in wp-settings -->
<html <?php language_attributes();?>>

    <head>
        <meta name="viewport" content="width-device-device, initial-scale=1">
        <?php wp_head();?>
    </head>

    <body>
        <!-- Hero -->
        <div class="position-relative overflow-hidden">
            <div class="d-flex min-vh-100 video-cnt" lc-helper="video-bg">
                <!-- Hero Video -->
                <!-- Für das Ermöglichen der Auswahl im Customizer -->
                <?php
                // Holen der Hero Video Einstellung für die News-Seite
                $hero_video_archive_id = get_theme_mod( 'hero_video_archive_id' ); // Hier wird die News-Seite Einstellung verwendet
                
                // Die URL des ausgewählten Hero Videos erhalten
                $hero_video_archive_url = wp_get_attachment_url( $hero_video_archive_id );
                
                // Wenn eine URL vorhanden ist, das Video anzeigen
                if ( ! empty( $hero_video_archive_url ) ) :
                ?>
                    <video
                        class="position-absolute w-100 header-video-bg"
                        autoplay=""
                        preload=""
                        muted=""
                        loop=""
                        playsinline="">
                        <source
                            src="<?php echo esc_url( $hero_video_archive_url ); ?>"
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
                    <source src="<?php echo get_template_directory_uri(); ?>/assets/videos/autumn.mp4" type="video/mp4">
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
                    <!-- Damit auch als 'titel' Name der Seite und nicht des Blogbeitrags angezeigt wird -->
                    <?php 
                            $isPage = new WP_Query(array( 
                            'post_type' => 'page'
                            ));
                    ?>
                    <!-- Hero-Container -->
                    <div class="container hero-cnt">
                        
                        <!-- Hero-Title -->
                        <div
                            style="z-index:2"
                            class="align-self-center text-center text-light col-md-8 offset-md-2">
                            <div class="lc-block mb-4">
                                <div editable="rich">
                                    <h1 class="display-1 hero-hdl"><?php echo get_the_title( 39 );?></h1>
                                    <p class="hdl-subliner"><?php echo get_the_excerpt(39);?></p>
                                </div>
                            </div>
                        </div>
                        <?php wp_reset_postdata(); ?>
                    </div>
                </div>
            </div>
        </div>



        