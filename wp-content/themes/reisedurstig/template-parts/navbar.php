<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light rd-header">

<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="" role="button">
        <i class="fa fa-bars" aria-hidden="true" style="color:#e6e6ff"></i>
    </span>
</button>
<div class="collapse navbar-collapse" id="navbarText">

    <!-- Creating dynamic menu -->
    <?php wp_nav_menu(array( 'theme_location' => 'topMenu', 'menu_class' =>
        'navbar-nav mr-auto menu-tablet-in-row' )); ?>

    <!-- <ul class="navbar-nav mr-auto menu-tablet-in-row"> -->
    <!-- Lets put li-Tags more wp-friendly -->
    <!-- <li class="nav-item active">
            <a class="nav-link" href="<?php echo site_url('/about'); ?>">About</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('/staedte'); ?>">Städte</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('/laender'); ?>">Länder</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('/support-me'); ?>">Support</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('/kontakt'); ?>">Kontakt</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('/news'); ?>">News</a>
        </li> -->

    <!-- Social Icons -->
    <div class="containerjustify-content-center m-4 header-social-icon-cnt">
        <!-- FaceBook Icon -->
        <a href="https://www.facebook.com/profile.php?id=100036881873671" class="social-icon-settings">
            <i class="fa fa-facebook" aria-hidden="true"></i>
        </a>
        <!-- Insta Icon -->
        <a href="https://www.instagram.com/reisedurstig.de/" class="social-icon-settings">
            <i class="fa fa-instagram" aria-hidden="true"></i>
        </a>
        <!-- YouTube Icon -->
        <a href="https://www.youtube.com/@reisedurstig4152" class="social-icon-settings">
            <i class="fa fa-youtube-play" aria-hidden="true"></i>
        </a>
        <!-- search-icon -->
        <div id="search-icon">
            <i class="fa fa-search"></i> <!-- Hier verwenden wir das FontAwesome-Suchsymbol -->
        </div>
        <!-- Searchform -->
        <div id="search-form" style="display:none;">
            <?php get_search_form(); ?>
        </div>
    </div>

    <!-- </ul> -->

</div>
</nav>