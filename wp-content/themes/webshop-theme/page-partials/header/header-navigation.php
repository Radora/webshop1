<div class="col header-navigation align-self-center mt-4">
    <div class="col">

        <div class="header-icons text-end">
	        <?php

		        get_template_part( 'page-partials/header/language-switch' );
		        get_template_part( 'page-partials/header/e-mail' );
		        get_template_part( 'page-partials/header/woocommerce' );
		        get_template_part( 'page-partials/header/mobile-navigation-button' );

	        ?>
        </div>

























































    </div>

    <div class="col mt-md-3">

        <div class="header-menu-links d-flex justify-content-end">

            <nav id="primary-navigation" role="navigation"
                 class="primary-navigation col-12 float-end d-none d-md-block">

				<?php
					$args = array(
						'theme_location'      => 'header-menu',
						'menu_class'          => 'nav-menu',
						'container_class'     => 'primary-navigation__container float-end',
						'add_li_class'        => 'primary-navigation__item',
						'add_a_class'         => 'primary-navigation__link text-uppercase text-decoration-none ps-2 py-1',
						'add_current_a_class' => 'primary-navigation__link--current'
					);
					wp_nav_menu( $args ); ?>

            </nav>

        </div>

    </div>
</div>