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

            <!-- Für das Ermöglichen der Auswahl im Customizer -->
            <!-- Dieser Code zeigt das ausgewählte Hero Video für die Stadt-Archivseite an -->
            <?php
           
            // Holen der Hero Video Einstellung für die Stadt-Archivseite
            $hero_video_id = get_theme_mod( 'hero_video_id' );
            
             // Die URL des ausgewählten Hero Videos erhalten   
            $hero_video_url = wp_get_attachment_url( $hero_video_id );
           
             // Wenn eine URL vorhanden ist, das Video anzeigen
            if ( ! empty( $hero_video_url ) ) :
            ?>
                <video
                    class="position-absolute w-100 header-video-bg"
                    autoplay=""
                    preload=""
                    muted=""
                    loop=""
                    playsinline="">
                    <source
                        src="<?php echo esc_url( $hero_video_url ); ?>"
                        type="video/mp4">
                </video>
            <?php endif; ?>


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
            <div class="overlay"></div>
            <div class="header-cnt">
            <div class="rd-header-wrapper startpg-logo">
                <a class="navbar-brand logo-a" href="<?php echo site_url(); ?>">
                    <?php get_template_part( 'template-parts/logo-display' );?>
                </a>
                    <!-- Navbar -->
                    <?php get_template_part('template-parts/navbar'); ?>
                </div>

                <!-- Hero-Container -->
                <div class="container hero-cnt">
                    <!-- Hero-Title -->
                    <div style="z-index:2" class="align-self-center text-center text-light col-md-8 offset-md-2">
                        <div class="lc-block mb-4">
                            <div editable="rich">
                                <h1 class="display-1 hero-hdl"><?php echo get_theme_mod('reisedurstig-hero-slogan') ?></h1>
                                <!-- <p class="hdl-subliner excerpt-p"><?php echo get_the_excerpt(); ?></p> -->
                               <p class="autor-slogan"><?php echo get_theme_mod('reisedurstig-hero-slogan-author');?></p>
                            </div>
                        </div>
                    </div>
                    <!-- CTA Button-->
                    <div class="container hero-btn-cnt">
                                    <!-- Die esc_url-Funktion wird verwendet, um die URL zu bereinigen und sicherzustellen, dass sie ordnungsgemäß formatiert ist. Damit sollte 
                                    die gerenderte URL korrekt sein und nicht mehr die relative URL zeigen, die du genannt hast. -->
                                    <a class="btn btn-startpage" href="<?php echo esc_url( get_theme_mod('reisedurstig-button-link') ); ?>" target  ="_blank" role="button"><?php echo get_theme_mod( 'reisedurstig-button-text' )?></a>      
                                </p>
                    </div>
                    <!-- Down Arrow Icon -->
                    <p class="footer-text-p footer-icons hero-arrow-icon startpage">
                            <i class="fa fa-angle-double-down"></i>
                    </p>
                </div>
            </div>
        </div>
    </div>