<?php
    /**
    * Template Name: Front Page
    */
?>

<!-- <?php get_header(); ?> -->
<?php get_template_part('template-parts/header/header'); ?>


<h2><?php the_title();?></h2>
<!-- Page Container -->
<div class="page-content-cnt">
    <h2 class="page-h2"">Meine Videos auf reisedurstig - youtube Channel</h2>
    <!-- Big Video Section -->
    <div class=" container-md video-cnt">
        <div class="ratio ratio-16x9">
            <iframe class="" src="https://www.youtube.com/embed/vlDzYIIOYmM" title="YouTube video"
                allowfullscreen></iframe>
        </div>
</div>
<p class="lead">
    <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
</p>

<!-- YouTube-Rows-Section -->
<div class="youtube-videos-cnt">
    <div class="youtube-video-rows">Row

    </div>
    <div class="youtube-video-rows">Row

    </div>
    <div class="youtube-video-rows">Row

    </div>
    <div class="youtube-video-rows">Row

    </div>
</div>
<!-- GoogleMAps-Section -->
<div class=" container-md google-maps-cnt">
    <h2 class="page-h2"">Where I have Been</h2>
        <div class=" ratio ratio-16x9">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d96714.68291250926!2d-74.05953969406828!3d40.75468158321536!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c2588f046ee661%3A0xa0b3281fcecc08c!2sManhattan%2C%20Nowy%20Jork%2C%20Stany%20Zjednoczone!5e0!3m2!1spl!2spl!4v1672242259543!5m2!1spl!2spl"
            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
</div>
<!-- Counter-Section -->
<div class=" container-md counter-cnt">
    <h2 class="page-h2"">Reisedurstig in Zahlen</h2>
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
</div>
<?php the_content();
get_footer();




?>