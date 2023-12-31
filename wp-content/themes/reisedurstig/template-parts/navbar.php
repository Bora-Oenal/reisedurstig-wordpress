<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light rd-header">

    <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarText"
        aria-
        controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
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
            <a
                href="https://www.facebook.com/profile.php?id=100036881873671"
                class="social-icon-settings">
                <i class="fa fa-facebook" aria-hidden="true"></i>
            </a>
            <!-- Insta Icon -->
            <a
                href="https://www.instagram.com/reisedurstig.de/"
                class="social-icon-settings">
                <i class="fa fa-instagram" aria-hidden="true"></i>
            </a>
            <!-- YouTube Icon -->
            <a
                href="https://www.youtube.com/@reisedurstig4152"
                class="social-icon-settings">
                <i class="fa fa-youtube-play" aria-hidden="true"></i>
            </a>
        </div>

        <div
            class="header-search-cnt containerjustify-content-center m-4 header-social-icon-cnt">
            <!-- search-icon -->
            <div id="search-icon" class="social-icon-settings">
                <i class="fa fa-search"></i>
            </div>
            <!-- Searchform -->
            <div id="search-form" style="display:none;">
                <?php get_search_form(); ?>
            </div>
        </div>

    </div>
</nav>