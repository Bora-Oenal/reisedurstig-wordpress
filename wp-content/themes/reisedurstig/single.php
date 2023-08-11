<?php get_template_part( 'template-parts/header/header-blog-post' );


    ?>

<div class="container">
    <h2 class="single-post-title"><?php the_title();?></h2>
    <a href="<?php echo site_url( '/news' );?>" class="single-post-title">zurück zur Übersicht</a>
    <div class="alert alert-info" role="alert">
        <p class="meta-infos">
            Gepostet am
            <?php the_date(); ?>
            von
            <?php the_author_posts_link(); ?>
            im Themenbereich "<?php echo get_the_category_list(', ');?>"
        </p>
    </div>
    <div class="generic-code">
        <?php the_content(); ?>

    </div>

</div>

<?php 
 get_footer(); ?>