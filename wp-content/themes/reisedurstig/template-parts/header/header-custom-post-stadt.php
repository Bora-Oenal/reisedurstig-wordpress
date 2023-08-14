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
                <!-- Video -->
                <!-- <video
                    class="position-absolute w-100 header-video-bg"
                    autoplay=""
                    preload=""
                    muted=""
                    loop=""
                    playsinline="">
                    <source
                        src="https://reisedurstig.de/wp-content/uploads/2020/07/Sunset-15779.mp4"
                        type="video/mp4">
                </video> -->
<!-- Background image -->

<!-- Background image -->

                
                
                <!-- <div class="header-cnt"> -->
                <div class="header-cnt bg-image-city" style="background-image: url('<?php the_post_thumbnail_url(); ?>'); background-size: cover; background-position: center center;">
    <!-- Hier kommt Ihr Inhalt hin -->

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
                                    <p class="hdl-subliner">Lorem ipsum</p>
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