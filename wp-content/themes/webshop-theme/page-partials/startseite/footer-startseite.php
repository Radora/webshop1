</div><!-- #main -->

<div id="start-footer" class="container position-relative">
    <div class="content-row row">
        <div class="content-block footer-left col-lg-6 col-md-6 col-sm-12 d-flex flex-wrap text-center">
            <div class="col-text">
                <?php the_field('kontaktinformationen', 'option'); ?>
            </div>
            <div class="imprint-bottom row">

                <div class="footer-block footer-logo col-lg-3 col-md-2 col-sm-1">
                    <a href="/">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-footer.png"
                             class="img-responsive" title="Webshop Logo" alt="Webshop Logo"/>
                    </a>
                </div>
                <div class="footer-block footer-nav col-lg-9 col-md-10 col-sm-11">
                    <?php wp_nav_menu(array('theme_location' => 'footer-menu', 'menu_class' => 'nav-menu')); ?>
                </div>

            </div>
        </div>
        <div class="content-block footer-right col-lg-6 col-md-6 col-sm-12">
            <div id="mapbox-square">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d0!2d0!3d0!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2sWebshop!5e0!3m2!1sen!2sxx!4v0000000000000!5m2!1sen!2sxx" frameborder="0" style="border:0; width: 100%; height: 100%;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
        </div>
    </div>
</div>

</div><!-- #page -->
<?php wp_footer(); ?>

</body>
</html>
