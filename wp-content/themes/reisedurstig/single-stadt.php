<?php get_template_part( 'template-parts/header/header-custom-post-stadt' );
?>
<div class="container single-cnt">
    <h2 class="single-post-title"><?php the_title();?></h2>
    <a href="<?php echo site_url( '/stadt' );?>" class="single-post-title">zurück zur Städte-Übersicht</a>
    <div class="alert alert-info meta-info-box" role="alert">
        <p class="meta-infos">
            <?php 
            echo '<div class="meta-info-land-p-wrapper">';
            echo '<div class="meta-info-land-p">';
            echo 'Land: '; echo get_field('land');
            echo '</div>';
            echo '<div class="meta-info-land-p">';
            echo 'Kontinent: '; echo get_field('kontinent');
            echo '</div>';
            echo '<div class="meta-info-land-p">';
            echo 'Einwohnerzahl: '; echo get_field('einwohnerzahl_stadt');
            echo '</div>';
            echo '<div class="meta-info-land-p">';
            echo 'Gründungsjahr: '; echo get_field('gruendungsjahr');
            echo '</div>';
            echo '</div>';
            
            ?>
        </p>
        <p class="meta-infos">
            <?php 
            echo '<div class="meta-info-land-p-wrapper">';
            echo '<div class="meta-info-land-p">';
            echo 'Fläche: '; echo get_field('flachengrose');
            echo '</div>';
            echo '<div class="meta-info-land-p">';
            echo 'Einwohner pro Fläche: '; echo get_field('einwohner_dichte');
            echo '</div>';
            echo '<div class="meta-info-land-p">';
            echo 'Über das Meer: '; echo get_field('meter_ueber_das_meer');
            echo '</div>';
            echo '<div class="meta-info-land-p">';
            echo 'Regentage: '; echo get_field('regentage');
            echo '</div>';
            echo '</div>';
            ?>
        </p>
    </div>

</div>
<!-- Content -->
<!-- Content -->
<div class="container single-cnt">
    <div class="generic-code">
        <div class="single-land-content-cnt">
            <div class="left-single-land-content-cnt">
                <?php the_post_thumbnail();?>
            </div>
            <div class="right-single-land-content-cnt">
                <?php the_excerpt(); ?>
            </div>
        </div>
    </div>
</div>
<br /><br />
<div class="container single-cnt">
    <?php the_content(); ?>
</div>

<br /><br />
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
            // echo '<ul class="related-cities-ul">';
            while ($relatedCities_query->have_posts()) {
                $relatedCities_query->the_post();?>
                <div class="container related-city-cnt">
                    <div class="related-city-cnt">
                        <a href="<?php the_permalink(); ?>" class="related-city-box-link">
                            <div class="img-related-city hover14">
                            <?php the_post_thumbnail('relatedThumbnails'); ?>
                            </div>
                            <div class="further-related-city">
                                <h3 class="related-city-h3">
                                        <?php echo get_the_title() ;?>
                                </h3>
                            </div>  

                        </a>
              
                    </div>
                </div>
            
            <?php   
            }
            // Setze den Postdata zurück
            wp_reset_postdata();
        }
    }
?>
</div>
<?php 
 get_footer(); ?>