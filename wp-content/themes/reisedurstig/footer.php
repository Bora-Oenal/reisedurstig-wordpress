<!-- Footer -->
<footer class="text-center text-lg-start bg-light text-muted">
    <!-- Section: Social media -->
    <section class="container d-flex">
        <!-- Left -->
        <div>
            <span class="footer-span">Get connected with us on social networks:</span>
        </div>
        <!-- Left -->

        <!-- Right -->
        <div>
            <!-- Social Icons -->
            <a
                href="https://www.youtube.com/@reisedurstig4152"
                class="footer-social-icon me-4 text-reset"
                target="_blank">
                <i class="fa fa-youtube-play" aria-hidden="true"></i>
            </a>
            <a
                href="https://www.instagram.com/reisedurstig.de/"
                class="footer-social-icon me-4 text-reset"
                target="_blank">
                <i class="fa fa-instagram" aria-hidden="true"></i>
            </a>
            <a
                href="https://www.facebook.com/profile.php?id=100036881873671"
                class="footer-social-icon me-4 text-reset"
                target="_blank">
                <i class="fa fa-facebook" aria-hidden="true"></i>
            </a>
            <a
                href="https://www.linkedin.com/in/bora-%C3%B6nal-5a596813/"
                class="footer-social-icon me-4 text-reset"
                target="_blank">
                <i class="fa fa-linkedin" aria-hidden="true"></i>
            </a>
            <a
                href="https://www.xing.com/profile/Bora_Oenal"
                class="footer-social-icon me-4 text-reset"
                target="_blank">
                <i class="fa fa-xing" aria-hidden="true"></i>

            </a>
        </div>
        <!-- Right -->
    </section>
    <!-- Section: Social media -->

    <!-- Section: Contact  -->
    <section class="footer-lft">
        <div class="container footer-compl text-center text-md-start mt-5 rd-footer-cnt">
            <!-- Grid row -->
            <div class="footer-row row mt-3">
                <!-- Grid column -->
                <div class="footer-col col-sm col-md-4 col-lg-4 col-xl-5 mx-auto mb-4 ">
                    <!-- Content -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        <!-- Anzeige der Headline -->
                        <?php mytheme_display_headline_footer_left(); ?> 
                    </h6>
                    <?php mytheme_display_text_footer_left(); ?> 
                    <div class="footer-adress-content">
                        
                        
                        
                    </div>
                </div>
                <!-- Grid column -->


                <!-- Grid column LINKS-->
                <div class="footer-col col-sm col-md-4 col-lg-4 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        Links
                    </h6>
                    <!-- Hier eine Variante wenn man hard-codiert vorgeht -->
                    <!-- Creating dynamic menu -->
                    <?php wp_nav_menu(array( 'theme_location' => 'footerMenu', 'menu_class' =>
                            'footer-menu footer-ul-rd' )); ?>

                    <!-- Hier eine Variante wenn man hard-codiert vorgeht -->
                    <!-- Erste Version - manually -->
                    <!-- <ul class="footer-ul-rd">
                        <li <?php if (is_page( 'staedte' )) echo 'class="current-menu-item"'; ?>>
                            <a href="<?php echo site_url('/stadt'); ?>" class="text-reset footer-links-a">Städte</a>
                        </li>
                        <li <?php if (is_page( 'laender' )) echo 'class="current-menu-item"'; ?>>
                            <a href="<?php echo site_url('/land'); ?>" class="text-reset footer-links-a">Länder</a>
                        </li>
                        <li <?php if (is_page( 'news' )) echo 'class="current-menu-item"'; ?>>
                            <a href="<?php echo site_url('/news'); ?>" class="text-reset footer-links-a">News</a>
                        </li>
                        <li <?php if (is_page( 'support-me' )) echo 'class="current-menu-item"'; ?>>
                            <a
                                href="<?php echo site_url('/support-me'); ?>"
                                class="text-reset footer-links-a">Support
                            </a>
                        </li>
                        <li <?php if (is_page( 'about' )) echo 'class="current-menu-item"'; ?>>
                            <a href="<?php echo site_url('/about'); ?>" class="text-reset footer-links-a">About</a>
                        </li>
                        <li <?php if (is_page( 'kontakt' )) echo 'class="current-menu-item"'; ?>>
                            <a href="<?php echo site_url('/kontakt'); ?>" class="text-reset footer-links-a">Kontakt</a>
                        </li>
                        <li <?php if (is_page( 'planet' )) echo 'class="current-menu-item"'; ?>>
                            <a href="<?php echo site_url('/planet'); ?>" class="text-reset footer-links-a">Special: Planeten</a>
                        </li>
                    </ul> -->
                </div>
                <!-- Grid column -->

                <!-- Grid column KONTAKT INFOS --> 
                <div class="footer-col col-sm col-md-4 col-lg-4 col-xl-5 mx-auto mb-md-0 mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">Kontakt</h6>
                    <div class="footer-adress-content">
                        <!-- Anzeige der Location -->
                        <p class="footer-text-p footer-icons">
                            <i class="fa fa-home me-3"></i>
                            <?php mytheme_display_location(); ?> 
                        </p>
                        <!-- Anzeige der E-Mail -->
                        <p class="footer-text-p footer-icons">
                            <i class="fa fa-envelope me-3"></i>
                            <?php mytheme_display_email(); ?>
                        </p>
                        <!-- Anzeige der Tel -->
                        <!-- <p class="footer-text-p footer-icons">
                            <i class="fa fa-phone me-3"></i>
                            <?php mytheme_display_phone_number(); ?> 
                        </p> -->
                        
                        <!-- Logo Footer Theme-Settings auswählbar -->
                        <?php 
                            $logo_image_id = get_option('logo_image');
                            if ($logo_image_id) {
                                $logo_image_url = wp_get_attachment_url($logo_image_id);
                                if ($logo_image_url) {
                                    echo '<img class="logo-footer" src="' . esc_url($logo_image_url) . '" alt="Logo" />';
                                }
                            }
                        ?>
                    </div>
				</div>
                <!-- Grid column -->

            </div>
            <!-- Grid row -->
        </div>
    </section>
    <!-- Section: Contact  -->

    <!-- Copyright -->
    <div class="text-center p-4 footer-cnt" style="background-color: rgba(0, 0, 0, 0.05);">
        <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('/impressum'); ?>">Impressum&nbsp; &nbsp; </a>
        </li>
       <p class="footer-p">
       © 2023 Copyright & Web Design & Web Development by:
       </p> 
        <a class="text-reset fw-bold" href="https://boraoenal.com//">&nbsp; &nbsp; boraoenal.com</a>

    </div>
    <!-- Copyright -->
</footer>

<!-- JavsScript -->
<!-- bootstrap js -->
<?php wp_footer();?>
</body>

</html>