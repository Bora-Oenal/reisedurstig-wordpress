<?php get_template_part('template-parts/header/header-archive-strand'); ?>

<!-- Page Container -->
<div class="container container--narrow page-section city-section-cnt">
    <h2 class="page-h2"><?php post_type_archive_title()?></h2>
    <div class="row">
        <!-- Ab hier loopen wir immer mit while -->
        <!-- hier aber ohne wp_query, somit werden alle posts angezeigts -->
        <?php
        $alleStraende = new WP_Query(array( 
            'posts_per_page'=> -1, 
            'post_type' => 'strand', 
            'orderby' => 'rand'
        ));
        while($alleStraende->have_posts()){ 
            $alleStraende->the_post(); ?>
            <div class="col-sm-4 city-box-archive">
                <div class="city-box-wrapper card">
                    <div class="post-item">
                        <?php $altTag = get_the_title();
                        the_post_thumbnail('cityBoxImagesThumbnails', array('class' =>
                                        'card-img-top', 'alt' => $altTag)); ?>
                        <h2 class="h1 h1-style city-archive">
                            <a class="" href="<?php the_permalink();?>"><?php the_title();?></a>
                        </h2>
                        <a class="land-archive-a" href="<?php echo home_url('/land/' . sanitize_title(get_field('land'))); ?>"><?php echo get_field('land'); ?></a>
                    </div>

                    <div class="generic-code">
                        <!-- Abfrage-> wenn excerpt zeige an, sonst zeige the_content -->
                        <p>
                        <?php
                            if ( !empty(get_the_content()) ) {
                                echo wp_trim_words(get_the_content(), 13);
                            } else {
                                echo wp_trim_words(get_the_excerpt(), 13);
                            }
                        ?> 
                        </p>
                        <p>
                            <a href="<?php the_permalink()?>" class="btn btn-posts btn-startpage btn-city-arcvive">Mehr zu
                                <?php the_title();?>
                                &raquo
                            </a>
                            <br>
                        </p>
                    </div>
                </div>
            </div>
        <?php }?>
    </div>
    // pagination shown if more than 10 posts
    <?php echo paginate_links(  );?>

    <?php get_footer(); ?>