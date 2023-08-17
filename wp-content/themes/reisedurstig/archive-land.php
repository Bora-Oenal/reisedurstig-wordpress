<?php get_template_part('template-parts/header/header-archive-land'); ?>
ARCHIVE-LAND.PHP
<!-- Page Container -->
<div class="container container--narrow page-section city-section-cnt">
    <h2 class="page-h2"><?php post_type_archive_title();?></h2>
    <div class="row">
        <!-- Ab hier loopen wir immer mit while -->
        <!-- hier aber ohne wp_query, somit werden alle posts angezeigts -->
        <?php 
            // $today = date('Ymd');
            $neuesteLand = new WP_Query(array(
                'posts_per_page' => -1,
                'post_type' => 'Land'
                // 'meta_key' => 'reisedatum',
                // 'orderby' => 'meta_value_num',
                // 'order' => 'ASC',
                // 'meta_query' => array (
                //     array(
                //         'key' => 'reisedatum',
                //         'compare' => '>=',
                //         'value' => $today,
                //         'type' => 'numeric'
                //     )
                // )
            ));
        while($neuesteLand->have_posts()){
        $neuesteLand->the_post(); ?>
        <div class="col-sm-4 city-box-archive">
            <div class="city-box-wrapper card">
                <div class="post-item">
                    <!-- was auch geht -->
                    <!-- the_post_thumbnail('medium'); large , full -->
                    <?php the_post_thumbnail('cityBoxImagesThumbnails', array('class' =>
                                    'card-img-top', 'alt' => '...')); ?>
                    <h2 class="h1 h1-style city-archive">
                        <a class="" href="<?php the_permalink();?>"><?php the_title();?></a>
                    </h2>
                </div>
                <div class="alert alert-info meta-box-city-archive" role="alert">
                    <p class="meta-infos city-archive">
                        Gepostet am
                        <?php the_date(); ?>
                        von
                        <?php the_author_posts_link(); ?>
                        im Themenbereich "<?php echo get_the_category_list(', ');?>"
                    </p>
                </div>
                <div class="generic-code">
                    <!-- <?php the_excerpt(); ?> -->
                    <p>
                    <?php
                        $reisedatum = get_post_meta(get_the_ID(), 'reisedatum', true);
                        if ($reisedatum) {
                            $travelTime = new DateTime($reisedatum);
                            echo $travelTime->format('M.Y');
                        }
                    ?>

                    </p>
                    <p>
                    <a href="<?php the_permalink()?>" class="btn btn-posts btn-startpage">Mehr zu   <?php the_title();?> &raquo</a>
                        <br>
                        <!-- andere Schreibweise with 'get' -->
                        <!-- <a class="btn-primary" href="<?php echo get_permalink() ?>">Mehr erfahren &raquo</a> -->
                    </p>
                    <!-- <?php the_content(); ?> -->

                </div>

            </div>
        </div>

        <?php }?>
    </div>
    <!-- Google Maps Integration -->
    <!-- Give the div data-attributes -->
    <div class="acf-map">
    <?php 
    $newestCities = new WP_Query(array(
        'post_per_page'=> '-1',
        'post_type' => 'stadt'
    )); 
    while ($newestCities->have_posts()) {
        $newestCities->the_post(); 
        $mapLocation = get_field('map_location');    
        ?>

        <div id="marker" class="google-maps-cnt" data-latitude="<?php echo $mapLocation['lat']; ?>" data-longitude="<?php echo $mapLocation['lng']; ?>">
        </div>
        
    <?php 
                } // Ende der while-Schleife
                wp_reset_postdata(); // Zurücksetzen der Abfrage
                ?>

            </div>
    <!-- // pagination shown if more than 10 posts -->
    <!-- <?php echo paginate_links(  );?> -->

    <?php get_footer(); ?>