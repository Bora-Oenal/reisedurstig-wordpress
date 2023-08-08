<!DOCTYPE html>
<!-- wp chose the language you have in wp-settings -->
<html <?php language_attributes();?>>

    <head>
        <meta name="viewport" content="width-device-device, initial-scale=1">
        <?php wp_head();?>
    </head>

    <body>
        <!-- Hero -->
        <div class="position-relative overflow-hidden single-cnt">
            <div class="d-flex min-vh-100 video-cnt video-cnt-single" lc-helper="video-bg">
                <!-- Hero Video -->
                <!-- Für das Ermöglichen der Auswahl im Customizer -->
                <?php
                // Holen der Hero Video Einstellung für Blogbeitragseiten (Blogposts)
                $hero_video_blog_post_id = get_theme_mod( 'hero_video_blog_post_id' ); // Hier wird die News-Seite Einstellung verwendet
                
                // Die URL des ausgewählten Hero Videos erhalten
                $hero_video_blog_post_url = wp_get_attachment_url( $hero_video_blog_post_id );
                
                // Wenn eine URL vorhanden ist, das Video anzeigen
                if ( ! empty( $hero_video_blog_post_url ) ) :
                ?>
                    <video
                        class="position-absolute w-100 header-video-bg"
                        autoplay=""
                        preload=""
                        muted=""
                        loop=""
                        playsinline="">
                        <source
                            src="<?php echo esc_url( $hero_video_blog_post_url ); ?>"
                            type="video/mp4">
                    </video>
                <?php endif; ?>
                <div class="overlay-single overlay"></div>
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
                            <?php
                            while(have_posts(  )){
                                 // macht die Daten für posts aufrufbar, ohne the_post daten nicht aufrufbar 
                                         the_post();                          
                            }
                                         ?>
                                <div editable="rich" class="rich-header-cnt">
                               <h1 class="display-1 hero-hdl"><?php the_title();?></h1>
                               <div class="flx-div-row">
                                   <p class="meta-infos-p"><?php the_date();?>&nbsp;*&nbsp;</p>
                                   <p class="meta-infos-p"><?php the_author();?></p>
                               </div>
                               <div class="flx-div-row-cat">
                               <p class="meta-infos-p">Themenbereich:<?php echo get_the_category_list(', ');?></p>
                               </div>
                           </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>