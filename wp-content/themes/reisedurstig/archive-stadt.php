<?php get_template_part('template-parts/header/header-archive-stadt'); ?>

<!-- Page Container -->
<div class="container container--narrow page-section city-section-cnt">
<!-- New Version Google Maps-->
<div class="container">
    <h2 class="page-h2">Where I have Been</h2>
            <h2 class="page-h2"><?php post_type_archive_title();?></h2>
            <div class="row">
                <!-- Ab hier loopen wir immer mit while -->
                <!-- hier aber ohne wp_query, somit werden alle posts angezeigts -->
                <?php $today = date('Ymd'); 
                $neuesteStadt = new WP_Query(array( 
                    'posts_per_page'=> -1, 
                    'post_type' => 'Stadt', 
                    'meta_key' => 'reisedatum', 
                    'orderby' => 'meta_value_num', 
                    'order' => 'ASC', 
                    'meta_query' => array ( array( 
                        'key' => 'reisedatum', 
                        'compare' => '>=', 
                        'value' => $today, 
                        'type' => 'numeric' ) ) ));
                while($neuesteStadt->have_posts()){ $neuesteStadt->the_post(); ?>
                <div class="col-sm-4 city-box-archive">
                    <div class="city-box-wrapper card">
                        <div class="post-item">
                            <?php the_post_thumbnail('cityBoxImagesThumbnails', array('class' =>
                                            'card-img-top', 'alt' => '...')); ?>
                            <h2 class="h1 h1-style city-archive">
                                <a class="" href="<?php the_permalink();?>"><?php the_title();?></a>
                            </h2>
                            <a class="land-archive-a" href="<?php echo home_url('/land/' . sanitize_title(get_field('land'))); ?>"><?php echo get_field('land'); ?></a>
                        </div>
                        

                                <!-- <?php the_author_posts_link(); ?>  -->
                                <!-- im Themenbereich "<?php echo get_the_category_list(', ');?>" -->
                            <!-- </p> -->
                        <!-- </div>  -->
                        <div class="generic-code">
                            <p class="travel-date-p">
                                <?php $reisedatum = get_post_meta(get_the_ID(), 'reisedatum', true); if
                                ($reisedatum) { $travelTime = new DateTime($reisedatum); echo
                                $travelTime->format('M.Y'); } ?>

                            </p>
                            <?php the_excerpt(); ?>

                            <p>
                                <a href="<?php the_permalink()?>" class="btn btn-posts btn-startpage btn-city-arcvive">Mehr zu
                                    <?php the_title();?>
                                    &raquo</a>
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
            <!-- <div class="acf-map"> -->
            <?php 
                while (have_posts()) {
                    the_post(); 
                    $mapLocation = get_field('map_location');    
            ?>

                    <!-- <div id="marker" class="google-maps-cnt" data-latitude="<?php echo $mapLocation['lat']; ?>" data-longitude="<?php echo $mapLocation['lng']; ?>">
                    </div> -->
                    
                <?php 
                } // Ende der while-Schleife
                ?>

            </div>
</div>
    <!-- // pagination shown if more than 10 posts -->
    <!-- <?php echo paginate_links(  );?> -->

    <?php get_footer(); ?>