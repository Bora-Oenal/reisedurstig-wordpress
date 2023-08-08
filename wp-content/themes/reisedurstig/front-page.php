<?php get_template_part('template-parts/header/header'); ?>

<!-- Page Container -->
<div class="page-content-cnt">
    <!-- Big Video Section -->
    <h2 class="page-h2" ">Meine Videos auf reisedurstig - youtube Channel</h2>

    <!-- Dynamic You Tube Section (Own Plugin) -->
    <div class="container-md video-cnt mx-width">
        <div class="container-md youtube-video-rows">
            <section id="youtube-section">
                <div id="video-container"></div>
            </section>
        </div>
    </div>



    <!-- Big You Tube - Video Section -->

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

</div>



<!-- Länder-Section -->
<div class="container rd-city-section">
    <h2 class="page-h2">Länder Section Custom Post types</h2>
    <p class="intro-txt">Sorted ASC by Random</p>
</div>
<!-- Länder Container -->
<div class="container city-section-cnt">
    <?php 
    $newestCountries = new WP_Query(array( 
        'posts_per_page'=> 9, 
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
                    <?php the_post_thumbnail('cityBoxImagesThumbnails', array('class' =>
                'card-img-top', 'alt' => '...')); ?>
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
    <h2 class="page-h2">Städte Section Custom Post types</h2>
    <p class="intro-txt">Sorted ASC by Travel-Date</p>
</div>
<!-- Städte Container -->
<div class="container city-section-cnt">
    <?php 
    $today = date('Ymd'); 
    $newestCities = new WP_Query(array( 
        'posts_per_page'=> 9, 
        'post_type' => 'stadt', 
        'meta_key' => 'reisedatum', 
        'orderby' => 'meta_value_num', 
        'order' => 'ASC', // wir blenden alle vergangenen Termine aus
        'meta_query' => array( array( 
            'key' => 'reisedatum', 
            'compare' => '>=', 
            'value'=> $today, 
            'type' => 'numeric' 
            ) 
        )) 
    ); 
    while ($newestCities->have_posts()) {
        $newestCities->the_post(); ?>
    <div class="col-sm-4 city-box">
        <div class="flx-circle-post">
            <a href="<?php the_permalink()?>"></a>
            <div class="col-sm-12 card card-rd">
                <a href="<?php the_permalink();?>" class="thumb-a">
                    <?php the_post_thumbnail('cityBoxImagesThumbnails', array('class' =>
                'card-img-top', 'alt' => '...')); ?>
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
<!-- Ende Städte Container -->
<!-- Alle Städte Button -->
<div class="container">
    <p class="lead cta-flex city-sec">
        <a class="btn btn-posts btn-lg btn-start-city" href="<?php echo get_post_type_archive_link( 'stadt' )?>"
            role="button">Alle Städte &raquo</a>
    </p>
</div>


<!-- GoogleMAps-Section -->
<div class=" container-md google-maps-cnt">
    <h2 class="page-h2" ">Where I have Been</h2>
    <div class=" ratio ratio-16x9">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d96714.68291250926!2d-74.05953969406828!3d40.75468158321536!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c2588f046ee661%3A0xa0b3281fcecc08c!2sManhattan%2C%20Nowy%20Jork%2C%20Stany%20Zjednoczone!5e0!3m2!1spl!2spl!4v1672242259543!5m2!1spl!2spl"
                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</div>

<!-- Counter-Section -->
<div class=" container-md counter-cnt">
    <h2 class="page-h2" ">Reisedurstig in Zahlen</h2>
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
                    <p class="counter-title">Beer Ordered</p>
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

<!-- Planet Section -->
        <div class="page-content-cnt">
            <h2 class="page-h2">Special Section Planeten (Custom Post Type)</h2>

            <div class="container">
                <p class="lead cta-flex">
                    <!-- Planeten Container -->
                <div class="container news-section-startpage-cnt">
                    <!-- Mit WP_Query kann ich bestimmte Daten abfragen -->
                    <?php $newestPosts = new WP_Query(array( 'posts_per_page' => 3, 'post_type' =>
                'planet' )); while ($newestPosts->have_posts()) { $newestPosts->the_post(); ?>
                    <div class="col-sm-4">
                        <div class="flx-circle-post">
                            <a href="<?php the_permalink()?>">
                                <div class="date-rounded">
                                    <p class="day-p"><?php the_time('d') ?></p>
                                    <p class="month-p"><?php the_time('M') ?></p>
                                </div>
                            </a>

                            <div class="col-sm-9 card card-rd">
                                <?php the_post_thumbnail('cityBoxImagesThumbnails', array('class' =>
                                'card-img-top', 'alt' => '...')); ?>
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_title() ?>
                                        </a>
                                    </h5>
                                    Hier erfolgt eine Abfrage excerpt vs content
                                    <p>
                                        <!-- Abfrage-> wenn excerpt zeige an, sonst zeige the_content -->
                                        <?php if (has_excerpt()) {
                                    echo get_the_excerpt();
                                } else {
                                    wp_trim_words(get_the_content(), 7);
                                } ?>
                                    </p>
                                    <hr>
                                    Loop from Content:
                                    <p class="card-text"><?php echo wp_trim_words(get_the_content(), 10 ); ?></p>
                                    Loop from Excerpt:
                                    <p class="excerpt-p">
                                        <?php the_excerpt( );?>
                                    </p>
                                    <div class="container">
                                        hallo
                                        <a href="<?php the_permalink()?>" class="btn btn-posts">Mehr Erfahren &raquo</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
        }
        wp_reset_postdata();
        ?>
                </div>
                </p>
            </div>
        </div>
        <div class="container container-btn">
            <a class="btn btn-posts btn-lg" href="<?php echo site_url('/planets');?>" role="button">Alle Planeten
                &raquo</a>
        </div>

</div>

<?php get_footer(); ?>