<?php get_template_part('template-parts/header/header-archive'); ?>

<!-- Page Container -->
<div class="container container--narrow page-section">
    <!-- For example, when you click on a category or tag, WordPress will use the archive.php  -->
    Otherwisthe index.phpe for blog arcive WordPress loads 
    <h2 class="page-h2">Archive.php (wird geladen wenn Taxomonien im Ensatz sind </h2>
    <!-- Big Video Section -->
    <div class=" container-md video-cnt mx-width flx">

    <!-- Ab hier loopen wir immer mit while -->
    <?php 
    while(have_posts()){
        the_post(); ?>
    <div class="col-sm-4 city-box video-card">
        <div class="post-item">
            <a href="<?php the_permalink();?>" class="thumb-a">
                    <?php the_post_thumbnail('cityBoxImagesThumbnails', array('class' =>
                'card-img-top', 'alt' => '...')); ?>
            </a>
            <div class="card-body city-box">
                <h2 class="h1 h1-style blog-title">
                    <a class="" href="<?php the_permalink();?>"><?php the_title();?></a>
                </h2>
            </div>
        </div>
        <div class="generic-code">
            <p class="card-text"><?php echo wp_trim_words(get_the_excerpt(), 30 ); ?></p>
            <!-- <?php the_excerpt(); ?> -->
            <p>
                <a class="btn btn-posts btn-startpage" href="<?php the_permalink() ?>">Mehr erfahren &raquo</a>
                <br>
                <!-- andere Schreibweise with 'get' -->
                <!-- <a class="btn-primary" href="<?php echo get_permalink() ?>">Mehr erfahren &raquo</a> -->
            </p>
            <!-- <?php the_content(); ?> -->

        </div>
    </div>
    
    <?php }
    // pagination shown if more than 10 posts 
    ?>
    </div>
<!-- <?php echo paginate_links(  );?> -->
</div>

    <?php get_footer(); ?>