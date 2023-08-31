<!-- Header -->
<?php get_template_part('template-parts/header/header'); ?>

<!-- News-Section -->
<div class=" container-md counter-cnt insta-cnt">
    <!-- Custom-Post-Type-Title -->
    <h2 class="page-h2">Letzten Berichte</h2>
    <!-- <p class="intro-txt">Sorted Random</p> -->
</div>
<!-- News Container -->
<div class="container city-section-cnt">
    <?php 
    $allPosts = new WP_Query(array( 
        'posts_per_page'=> 3, 
        'post_type' => 'post',
        'orderby' => 'rand'
        )); 
    while ($allPosts->have_posts()) {
        $allPosts->the_post(); ?>
    <div class="col-sm-4 city-box">
        <div class="flx-circle-post">
            <a href="<?php the_permalink()?>"></a>
            <div class="col-sm-12 card card-rd">
                <a href="<?php the_permalink();?>" class="thumb-a">
                    <?php $title = get_the_title();
                    the_post_thumbnail('cityBoxImagesThumbnails', array('class' =>
                'card-img-top', 'alt' => $title)); ?>
                </a>
                <div class="card-body">
                    <h5 class="card-title news-section"">
                        <a href="<?php the_permalink(); ?>">
                            <?php echo wp_trim_words(get_the_title(), 7); ?>
                        </a>
                    </h5>
                    <p class="card-text">
                        <?php echo wp_trim_words(get_the_content(), 10 );
                         ?>
                    </p>
                    <a href="<?php the_permalink()?>"
                         class="btn btn-posts btn-startpage">Mehr erfahren
                        &raquo</a>
                </div>
            </div>
        </div>
    </div>
    <?php
        }
        wp_reset_postdata();
    ?>
</div>
<!-- Alle News Button -->
<div class="container">
    <p class="lead cta-flex city-sec">
        <a class="btn btn-posts btn-lg btn-start-city" href="<?php echo get_post_type_archive_link( 'post' )?>"
            role="button">Alle Beiträge &raquo</a>
    </p>
</div>


<!-- Inseln-Section -->
<div class="container rd-city-section">
    <!-- Custom-Post-Type-Title -->
    <?php
    // Hole den benutzerdefinierten Beitragstyp "Insel"
    $insel_post_type = get_post_type_object('insel');
    // Zeige den Namen des benutzerdefinierten Beitragstyps "Insel" an
    echo '<h2 class="page-h2">' . $insel_post_type->labels->name . '</h2>';
    ?>
    <!-- <p class="intro-txt">Sorted Random</p> -->
</div>
<!-- Inseln Container -->
<div class="container city-section-cnt">
    <?php 
    $alleInseln = new WP_Query(array( 
        'posts_per_page'=> 3, 
        'post_type' => 'insel',
        'orderby' => 'rand'
        )); 
    while ($alleInseln->have_posts()) {
        $alleInseln->the_post(); ?>
    <div class="col-sm-4 city-box">
        <div class="flx-circle-post">
            <a href="<?php the_permalink()?>"></a>
            <div class="col-sm-12 card card-rd">
                <a href="<?php the_permalink();?>" class="thumb-a">
                    <?php $title = get_the_title();
                    the_post_thumbnail('cityBoxImagesThumbnails', array('class' =>
                'card-img-top', 'alt' => $title)); ?>
                </a>
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h5>
                    <p class="card-text"><?php echo  get_the_excerpt(); ?></p>
                    <!-- <p class="card-text"><?php echo wp_trim_words(get_the_content(), 10 ); ?></p> -->
                    <a href="<?php the_permalink()?>" class="btn btn-posts btn-startpage">Mehr zu
                        <?php the_title();?>
                        &raquo</a>
                </div>
            </div>
        </div>
    </div>
    <?php
        }
        wp_reset_postdata();
        ?>
</div>
<!-- Alle Inseln Button -->
<div class="container">
    <p class="lead cta-flex city-sec">
        <a class="btn btn-posts btn-lg btn-start-city" href="<?php echo get_post_type_archive_link( 'insel' )?>"
            role="button">Alle Inseln &raquo</a>
    </p>
</div>

<!-- You Tube Section -->
<div class="page-content-cnt">
    <!-- Big Video Section -->
    <h2 class="page-h2">Meine Videos auf reisedurstig - youtube Channel</h2>

    <!-- Dynamic You Tube Section (for Own Plugin) This Code implement the section on page -->
    <div class="container-md video-cnt mx-width">
        <div class="container-md youtube-video-rows">
            <section id="youtube-section">
                <div id="video-container"></div>
            </section>
        </div>
    </div>


    <!-- <div class=" container-md video-cnt">
        <div class="ratio ratio-16x9">
            <iframe class="" src="https://www.youtube.com/embed/QhSqEKZjagM" title="YouTube video"
                allowfullscreen></iframe>
        </div>
        <div class="container">
            <p class="lead cta-flex">
                <a class="btn btn-posts btn-lg" href="https://www.youtube.com/channel/UCtpKNaYEVALJr_iT1l5xzVw"
                    target="_blank" role="button">Alle Beiträge &raquo</a>
            </p>
        </div>
    </div> -->

    <!-- YouTube-Rows-Section -->

    <!-- <div class=" container-md video-cnt">
        <div class="container-md youtube-video-rows">
            <div class="card video-card col-sm-4">
                <iframe src="https://www.youtube.com/embed/KD1IDLeTkl0" frameborder="0"
                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make
                        up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-posts">Go somewhere</a>
                </div>
            </div>
            <div class="card video-card col-sm-4">
                <iframe src="https://www.youtube.com/embed/07J1wbtCX34" frameborder="0"
                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make
                        up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-posts">Go somewhere</a>
                </div>
            </div>
            <div class="card video-card col-sm-4">
                <iframe src="https://www.youtube.com/embed/vqHQcBzu8II" frameborder="0"
                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make
                        up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-posts">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="youtube-video-rows">
        </div>
    </div> -->
    <!-- YouTube Channel - Button -->
    <div class="container">
        <p class="lead cta-flex city-sec youtube-btn">
            <a class="btn btn-posts btn-lg btn-start-city" href="https://www.youtube.com/@reisedurstig4152"
                target="_blank" role="button">Reisedurstig YouTube Channel &raquo</a>
        </p>
    </div>
</div>

<!-- Länder-Section -->
<div class="container rd-city-section">
    <<?php
        // Hole den benutzerdefinierten Beitragstyp "Land"
        $land_post_type = get_post_type_object('land');
        // Zeige den Namen des benutzerdefinierten Beitragstyps "Land" an
        echo '<h2 class="page-h2">' . $land_post_type->labels->name . '</h2>';
        ?>
    <!-- <p class="intro-txt">Sorted ASC by Random</p> -->
</div>
<!-- Länder Container -->
<div class="container city-section-cnt">
    <?php 
    $newestCountries = new WP_Query(array( 
        'posts_per_page'=> 3, 
        'post_type' => 'land',
        'orderby' => 'rand'
        )); 
    while ($newestCountries->have_posts()) {
        $newestCountries->the_post(); ?>
    <div class="col-sm-4 city-box">
        <div class="flx-circle-post">
            <a href="<?php the_permalink()?>"></a>
            <div class="col-sm-12 card card-rd">
                <a href="<?php the_permalink();?>" class="thumb-a">
                    <?php $title = get_the_title();
                    the_post_thumbnail('cityBoxImagesThumbnails', array('class' =>
                'card-img-top', 'alt' => $title)); ?>
                </a>
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h5>
                    <p class="card-text"><?php echo wp_trim_words(get_the_excerpt(), 10 );
                         ?></p>
                    
                    <!-- <p class="card-text"><?php echo wp_trim_words(get_the_content(), 10 ); ?></p> -->
                    <a href="<?php the_permalink()?>" class="btn btn-posts btn-startpage">Mehr zu
                        <?php the_title();?>
                        &raquo</a>
                </div>
            </div>
        </div>
    </div>
    <?php
        }
        wp_reset_postdata();
        ?>
</div>
<!-- Ende Länder Container -->
<!-- Alle Länder Button -->
<div class="container">
    <p class="lead cta-flex city-sec">
        <a class="btn btn-posts btn-lg btn-start-city" href="<?php echo get_post_type_archive_link( 'land' )?>"
            role="button">Alle Länder &raquo</a>
    </p>
</div>

<!-- Städte-Section -->
<div class="container rd-city-section">
    <!-- Custom-Post-Type-Title -->
    <?php
    // Hole den benutzerdefinierten Beitragstyp "Stadt"
    $stadt_post_type = get_post_type_object('stadt');
    // Zeige den Namen des benutzerdefinierten Beitragstyps "Stadt" an
    echo '<h2 class="page-h2">' . $stadt_post_type->labels->name . '</h2>';
    ?>
    <!-- <p class="intro-txt">Sorted ASC by Travel-Date</p> -->
</div>
<!-- Städte Container -->
<div class="container city-section-cnt">
    <?php 
    $today = date('Ymd'); 
    $newestCities = new WP_Query(array( 
        'posts_per_page'=> 3, 
        'post_type' => 'stadt', 
        // 'meta_key' => 'reisedatum', 
        'orderby' => 'rand', 
        'order' => 'ASC'
        // wir blenden alle vergangenen Termine aus
        //nicht mehr nötig da alle Termine nun angezeigt werden
        // 'meta_query' => array( array( 
        //     'key' => 'reisedatum', 
        //     'compare' => '>=', 
        //     'value'=> $today, 
        //     'type' => 'numeric' 
        //     ) 
        // )
        ) 
    ); 
    while ($newestCities->have_posts()) {
        $newestCities->the_post(); ?>
    <div class="col-sm-4 city-box">
        <div class="flx-circle-post">
            <a href="<?php the_permalink()?>"></a>
            <div class="col-sm-12 card card-rd">
                <a href="<?php the_permalink();?>" class="thumb-a">
                    <?php $title = get_the_title();
                    the_post_thumbnail('cityBoxImagesThumbnails', array('class' =>
                'card-img-top', 'alt' => $title)); ?>
                </a>
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                        <p class="date-city-box">
                            <?php the_field('reisedatum'); ?>
                        </p>
                    </h5>
                    <p class="card-text"><?php echo wp_trim_words(get_the_excerpt(), 10 );
                         ?></p>
                    <!-- <p class="card-text"><?php echo wp_trim_words(get_the_content(), 10 ); ?></p> -->
                    <a href="<?php the_permalink()?>" class="btn btn-posts btn-startpage">Mehr zu
                        <?php the_title();?>
                        &raquo</a>
                </div>
            </div>
        </div>
    </div>
    <?php
        }
        wp_reset_postdata();
        ?>
</div>
<!-- Ende Städte Container -->
<!-- Alle Städte Button -->
<div class="container">
    <p class="lead cta-flex city-sec">
        <a class="btn btn-posts btn-lg btn-start-city" href="<?php echo get_post_type_archive_link( 'stadt' )?>"
            role="button">Alle Städte &raquo</a>
    </p>
</div>



<!-- GoogleMAps-Section Setting by Customizer -->
<div class="container gmaps-wrapper">
    <h2 class="page-h2">Where I am at moment</h2>
    <div class="gmaps-cnt ratio ratio-16x9">
        <iframe
            src="<?php echo esc_url( get_theme_mod('reisedurstig-gmaps-url') ); ?>"
            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>
</div>

<!-- Counter-Section -->
<div class="container-md counter-cnt">
    <h2 class="page-h2">Reisedurstig in Zahlen</h2>
    <!-- Counter -->
    <section class=" wow fadeIn animated" style="visibility: visible; animation-name: fadeIn;">
        <div class="container">
            <div class="row counter-row">
                <!-- counter -->
                <div class="col-md-3 col-sm-6 bottom-margin text-center counter-section wow fadeInUp sm-margin-bottom-ten animated counter-box"
                    data-wow-duration="300ms"
                    style="visibility: visible; animation-duration: 300ms; animation-name: fadeInUp;">
                    <span id="anim-number-pizza" class="counter-number"></span>
                    <span class="timer counter alt-font appear" data-to="980" data-speed="7000">5</span>
                    <p class="counter-title">Kontinente</p>
                </div>
                <!-- end counter -->
                <!-- counter -->
                <div class="col-md-3 col-sm-6 bottom-margin-small text-center counter-section wow fadeInUp xs-margin-bottom-ten animated counter-box"
                    data-wow-duration="900ms"
                    style="visibility: visible; animation-duration: 900ms; animation-name: fadeInUp;">
                    <span class="timer counter alt-font appear" data-to="810" data-speed="7000">28</span>
                    <span class="counter-title">Länder besucht</span>
                </div>
                <!-- end counter -->
                <!-- counter -->
                <div class="col-md-3 col-sm-6 text-center counter-section wow fadeInUp animated counter-box"
                    data-wow-duration="1200ms"
                    style="visibility: visible; animation-duration: 1200ms; animation-name: fadeInUp;">
                    <span class="timer counter alt-font appear" data-to="600" data-speed="7000">167</span>
                    <span class="counter-title">Länder noch offen</span>
                </div>
                <!-- end counter -->
            </div>
        </div>
    </section>
</div>

<!-- Strände Section -->
<div class="container-md counter-cnt">
    <div class="page-content-cnt">
        <!-- Custom-Post-Type-Title -->
        <?php
        // Hole den benutzerdefinierten Beitragstyp "Strand"
        $strand_post_type = get_post_type_object('strand');
        // Zeige den Namen des benutzerdefinierten Beitragstyps "Strand" an
        echo '<h2 class="page-h2">' . $strand_post_type->labels->name . ' </h2>';
        ?>
        <div class="container">
            <p class="lead cta-flex">
                <!-- Strände Container -->
            <div class="container news-section-startpage-cnt">
                <!-- Mit WP_Query kann ich bestimmte Daten abfragen -->
                <?php 
                $allBeaches = new WP_Query(array( 
                    'posts_per_page' => 3, 
                    'post_type' => 'strand',
                    'orderby' => 'rand', 
                    'order' => 'ASC' )); 
                while (
                 $allBeaches->have_posts()) { 
                    $allBeaches->the_post(); ?>
                <div class="col-sm-4">
                    <div class="flx-circle-post">
                        <div class="col-m-12 card card-rd">
                            <?php $title = get_the_title();
                            the_post_thumbnail('cityBoxImagesThumbnails', array('class' =>
                            'card-img-top', 'alt' => $title)); ?>
                            <div class="card-body">
                                <h5 class="card-title beach-section">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title() ?>
                                    </a>
                                </h5>
                                <!-- Darunter folgt eine Abfrage excerpt vs content -->
                                <p>
                                <!-- Abfrage-> wenn excerpt zeige an, sonst zeige the_content -->
                                    <?php if (has_excerpt()) {
                                        echo wp_trim_words(get_the_content(), 7);
                                    } else {
                                        wp_trim_words(get_the_excerpt(), 7);
                                    } ?>
                                </p>
                                <!-- <hr> -->
                                <!-- Loop from Content , vorher zum testen genutzt:
                                <p class="card-text">
                                    <?php echo wp_trim_words(get_the_content(), 10 ); ?>
                                </p> -->
                                <!-- Loop from Excerpt:
                                <p class="excerpt-p">
                                    <?php the_excerpt( );?>
                                </p> -->
                                <a href="<?php the_permalink()?>" class="btn btn-posts btn-startpage">Mehr Erfahren &raquo</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }
                wp_reset_postdata();
                ?>
            </div>
            </p>
        </div>
    </div>
    <div class="container container-btn">
        <a class="btn btn-posts btn-lg" href="<?php echo site_url('/strand');?>" role="button">
        <?php
            // Hole den benutzerdefinierten Beitragstyp "Insel"
            $strand_post_type = get_post_type_object('strand');
            // Zeige den Namen des benutzerdefinierten Beitragstyps "Insel" an
            echo 'Alle ' . $strand_post_type->labels->name;
            ?>
        &raquo</a>
    </div>
</div>

<!-- Instagram-Shortcode from plugin -->
<div class=" container-md counter-cnt insta-cnt">
    <h2 class="page-h2">Reisedurstig.de @ Instagram</h2>
    <div class="container">
        <?php the_content(); ?>
    </div>
</div>

<!-- Footer Section -->
<?php get_footer(); ?>