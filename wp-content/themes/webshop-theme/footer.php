</div>

<!-- Footer -->
<footer class="text-center text-lg-start bg-primary">

    <!-- Section: Links  -->
        <div class="container text-white text-link-white text-center text-md-start py-5">
            <!-- Grid row -->
            <div class="row">
                <!-- Grid column -->
                <div class="col-12 text-center col-md-1 text-md-end">
                    <!-- Content -->
                    <img src="/wp-content/themes/webshop-theme/assets/images/logo-footer-small.svg"
                         alt="Site logo" title="Site logo"
                         class="footer-imprint__logo img-responsive hidden-xs"/>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-3 text-decoration-none me-auto">
                    <!-- Content -->
					<?php
						the_field( 'kontaktinformationen', 'option' );
					?>
                    <div class="newsletter-form d-sm-block d-md-none d-lg-block">
						<?php
							echo do_shortcode( '[mc4wp_form id="10568"]' );
						?>
                    </div>

                    <div class="social-icons mb-2">
                        <a href="<?php the_field( 'facebook', 'option' ); ?>" class="text-hover-gray me-3"><i
                                    class="fab fa-facebook-square fs-4"></i></a>
                        <a href="<?php the_field( 'instagram', 'option' ); ?>" class="text-hover-gray"><i
                                    class="fab fa-instagram fs-4"></i></a>
                    </div>


                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="d-none d-md-block col-md-2 mx-auto">

                    <ul class="footer-list list-unstyled ms-0 mb-0">
						<?php

							$product_categories = get_categories( array(
								'taxonomy'     => 'product_cat',
								'orderby'      => 'name',
								'pad_counts'   => false,
								'hierarchical' => 1,
								'parent'       => 62, // If product has 'Rebsorten' as parent
								'hide_empty'   => false
							) );

							if ( $product_categories ) {

								?>
                                <!-- Links -->
                                <h5 class="text-white text-uppercase text-decoration-underline fw-bold mb-1">
									<?php echo __( 'Rebsorten', 'webshop-theme' ); ?>
                                </h5>
								<?php

								foreach ( $product_categories as $product_category ) {

									echo '<li><a class="text-decoration-none text-hover-gray" href="' . esc_url( get_term_link( $product_category, $product_category->taxonomy ) ) . '">'
									     . $product_category->name . '</a></li>';
								}
							}
						?>
                    </ul>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="d-none d-lg-block col-md-3 col-lg-2 mx-auto">
                    <!-- Links -->


                    <ul class="footer-list list-unstyled text-hover-gray ms-0 mb-0">
						<?php

							$product_categories = get_categories( array(
								'taxonomy'     => 'product_cat',
								'orderby'      => 'name',
								'pad_counts'   => false,
								'hierarchical' => 1,
								'parent'       => 61,     // If product has 'Weintypen' as parent
								'hide_empty'   => false
							) );


							if ( $product_categories ) { ?>
                                <h5 class="text-white text-decoration-underline text-uppercase fw-bold mb-1">
									<?php echo __( 'Weine', 'webshop-theme' ); ?>
                                </h5>
								<?php

								foreach ( $product_categories as $product_category ) {

									// If product is not 'Pakete'
									if ( intval( $product_category->term_id ) !== 38 ) {

										echo '<li><a class="text-decoration-none text-hover-gray" href="' . esc_url( get_term_link( $product_category, $product_category->taxonomy ) ) . '">'
										     . $product_category->name . '</a></li>';
									}
								}
							}
						?>
                    </ul>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-3 col-lg-2 text-hover-gray mx-auto">
                    <!-- Links -->
                    <div class="d-none d-md-block fs-5">

						<?php
							$args = array(
								'theme_location'  => 'footer-top',
								'menu_class'      => 'nav-menu list-unstyled ms-0 mb-0',
								'container_class' => 'footer-imprint__container',
								'add_li_class'    => '',
								'add_a_class'     => 'text-decoration-none text-hover-gray',
							);
							wp_nav_menu( $args ); ?>
                    </div>

					<?php
						$args = array(
							'theme_location'  => 'footer-menu',
							'menu_class'      => 'nav-menu list-unstyled ms-0 mb-0',
							'container_class' => 'footer-imprint__container',
							'add_li_class'    => '',
							'add_a_class'     => 'text-decoration-none text-hover-gray',
						);
						wp_nav_menu( $args ); ?>

                </div>
                <!-- Grid column -->
            </div>
            <!-- Grid row -->
            <div class="row">
                <div class="col-6 offset-1">
                    <div class="newsletter-form d-none d-md-block d-lg-none text-link-white mt-3">
						<?php
							echo do_shortcode( '[mc4wp_form id="10568"]' );
						?>
                    </div>
                </div>
            </div>
        </div>
    <!-- Section: Links  -->
</footer>
<!-- Footer -->

<?php wp_footer();
