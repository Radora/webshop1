<div class="mobile-navigation container">

    <div class="d-flex align-items-start">

        <div class="nav-links position-fixed end-0 w-100 h-100 pt-10">
            <div class="h-100 overflow-auto">

				<?php

                    // Main menu links
					$args = array(
						'theme_location' => 'mobile-header-menu',
						'add_a_class'    => 'text-hover-green',
						'walker'         => new Mobile_Menu_Walker(),
					);
					wp_nav_menu( $args );

					// Mobile menu footer links
					$args = array(
						'theme_location'  => 'footer-menu',
						'menu_class'      => 'd-block d-md-none list-unstyled',
						'container_class' => 'footer-imprint__container pt-5 pb-7',
						'add_a_class'     => 'text-decoration-none fw-bold text-hover-green fs-4',
					);
					wp_nav_menu( $args ); ?>
            </div>

            <div class="footer-links position-absolute d-flex bottom-0 w-100 text-hover-green pb-2">
                <div class="container">
                    <div class="row">
                        <div class="col-6 ps-4">

                            <a href="<?php the_field( 'facebook', 'option' ); ?>"><i
                                        class="fab fa-facebook-square fs-1"></i></a>
                            <a href="<?php the_field( 'instagram', 'option' ); ?>" class="ms-3"><i
                                        class="fab fa-instagram fs-1"></i></a>
                        </div>

                        <div class="col-6 text-end">
                <span class="primary-navigation__language">
		            <?php
			            $languages = apply_filters( 'wpml_active_languages', null, 'orderby=id&order=desc' );

			            if ( $languages ) {
				            foreach ( $languages as $language ) {
					            if ( $language['active'] === 0 ) {
						            echo '<a href="' . $language['url'] . '" class="fw-bold text-decoration-none fs-3">'
						                 . strtoupper( $language['language_code'] ) . '<i class="fal fa-globe ms-2"></i></a>';
					            }
				            }
			            }; ?>
                </span>
							<?php
								if ( get_field( 'email', 'option' ) ) {
									echo '<a href="mailto:' . get_field( 'email', 'option' ) . '"><i class="fas fa-envelope fs-3 ms-3"></i></a>';
								}
							?>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>