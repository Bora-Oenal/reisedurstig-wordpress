<!-- Template Name: About-Page Template -->
<?php get_template_part('template-parts/header/header-about');  ?>
<!-- <h1>This is the page.php!</h1> -->
<!-- <h2><?php the_title();?></h2> -->

<!-- HTML-About-Page-Page-Content -->
<!-- Page Container -->
<div class="container page-content-cnt">
    <?php the_content();?>
</div>
<!-- GoogleMAps-Section -->
<div class=" container-md google-maps-cnt">
    <h2 class="page-h2">Aktuell in</h2>
    <div class=" ratio ratio-16x9">
            <!-- <iframe
                src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=medellin%20castilla+(My%20Business%20Name)&amp;t=&amp;z=5&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"
                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
            </iframe> -->
            <iframe
                src="<?php echo esc_url( get_theme_mod('reisedurstig-gmaps-url') ); ?>"
                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
            </iframe>

    </div>
</div>

<?php get_footer(); ?>
