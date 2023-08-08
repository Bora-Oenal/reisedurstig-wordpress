<?php get_template_part( 'template-parts/header/header-custom-post-stadt' );
?>
<div class="container single-cnt">
    <h2 class="single-post-title"><?php the_title();?></h2>
    <a href="<?php echo site_url( '/land' );?>" class="single-post-title">zurück zur Länder-Übersicht</a>
    <div class="alert alert-info meta-info-box" role="alert">
        <p class="meta-infos">
            <?php 
            echo '<div class="meta-info-land-p-wrapper">';
            echo '<div class="meta-info-land-p">';
            echo 'Land:     '; echo get_field('land');
            echo '</div>';
            echo '<div class="meta-info-land-p">';
            echo 'Hauptstadt: '; echo get_field('hauptstadt');
            echo '</div>';
            echo '<div class="meta-info-land-p">';
            echo 'Sprache: '; echo get_field('landessprache');
            echo '</div>';
            echo '<div class="meta-info-land-p">';
            echo 'Währung: '; echo get_field('wahrung');
            echo '</div>';
            echo '</div>';          
            ?>
        </p>
        <p class="meta-infos">
            <?php 
            echo '<div class="meta-info-land-p-wrapper">';
            echo '<div class="meta-info-land-p">';
            echo 'Einwohnerzahl: <br>'; echo get_field('einwohnerzahl');
            echo '</div>';
            echo '<div class="meta-info-land-p">';
            echo 'Berühmte Persönlichkeiten:<br> '; echo get_field('beruhmte_personlichkeiten');
            echo '</div>';
            echo '<div class="meta-info-land-p">';
            echo 'Bekannte Fussballclubs:<br> '; echo get_field('beruhmte_fussballclubs');
            echo '</div>';
            echo '<div class="meta-info-land-p">';
            echo 'Größe-Weltrangliste:<br> '; echo get_field('grose_weltrangliste');
            echo '</div>';
            echo '</div>';          
            ?>
        </p>
    </div>

</div>
<!-- Content -->
<div class="container single-cnt">
    <div class="generic-code">
        <div class="single-land-content-cnt">
            <div class="col left-single-land-content-cnt">
                <?php the_post_thumbnail();?>
            </div>
            <div class="col-9 right-single-land-content-cnt">
                <?php the_excerpt(); ?>
            </div>
        </div>
    </div>
</div>
<br /><br />
<div class="container single-cnt">
    <?php the_content(); ?>
</div>
<div class="container related-cities-cnt single-cnt">
    <h2 class="related-cities-hdl">
        Weitere Städte aus <a href="<?php echo home_url('/land/' . sanitize_title(get_field('land'))); ?>"><?php echo get_field('land'); ?></a>
    </h2>
</div>
<div class="container related-cities-cnt single-cnt">

<?php 
    $selectedLand = get_field('land');

    // Prüfe, ob das Land ausgewählt wurde
    if ($selectedLand) {
        $relatedCities_query = new WP_Query(array(
            'post_type' => 'stadt', // Hier den Post-Typ für Städte eintragen, falls er anders ist
            'meta_query' => array(
                array(
                    'key' => 'land', // Hier den Meta-Key für das Land-Feld eintragen
                    'value' => $selectedLand,
                    'compare' => '='
                )
            )
        ));
        // Überprüfe, ob Städte gefunden wurden
        if ($relatedCities_query->have_posts()) {
            
            while ($relatedCities_query->have_posts()) {
                $relatedCities_query->the_post();?>
                <div class="col-sm-4 city-box">
        <div class="flx-circle-post">
            <a href="<?php the_permalink()?>"></a>
            <div class="col-sm-12 card card-rd">
                <a href="<?php the_permalink();?>" class="thumb-a">
                    <?php echo get_the_post_thumbnail(get_the_ID(), 'full', array('class' =>
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
    
    <?php
            }
            }
            wp_reset_postdata();
            ?>
    <?php
        }
        ?>
</div>
</div>

<?php 
 get_footer(); ?>