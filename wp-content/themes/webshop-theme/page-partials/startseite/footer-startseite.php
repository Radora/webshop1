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
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-footer-mueller-grossmann.png"
                             class="img-responsive" title="Weingut Mueller Grossmann" alt="Weingut Mueller Grossmann"/>
                    </a>
                </div>
                <div class="footer-block footer-nav col-lg-9 col-md-10 col-sm-11">
                    <?php wp_nav_menu(array('theme_location' => 'footer-menu', 'menu_class' => 'nav-menu')); ?>
                </div>

            </div>
        </div>
        <div class="content-block footer-right col-lg-6 col-md-6 col-sm-12">
            <div id="mapbox-square">
<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d10598.761542558896!2d15.6143028!3d48.3856836!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb068d69711890a36!2sWeingut%20M%C3%BCller-Grossmann!5e0!3m2!1sde!2sat!4v1607327681194!5m2!1sde!2sat" frameborder="0" style="border:0; width: 100%; height: 100%;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
        </div>
    </div>
</div>

</div><!-- #page -->
<?php wp_footer(); ?>

</body>
</html>