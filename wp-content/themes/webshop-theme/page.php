<?php
	/**
	 * The template for displaying all pages
	 *
	 * This is the template that displays all pages by default.
	 * Please note that this is the WordPress construct of pages and that
	 * other 'pages' on your WordPress site will use a different template.
	 *
	 */

	get_header();

	if ( ! ( is_cart() || is_checkout() || is_account_page() || is_shop() || is_woocommerce() ) ) {

		get_template_part( 'page-partials/flexible-content' );

	} else { ?>

        <div class="container">
            <div class="row page-content mb-3 mb-md-5">
                <div class="col-12">

					<?php

						if ( is_cart() || is_checkout() || is_account_page() ) {

						    echo '<h1 class="mt-0 mb-4 fw-bold">'.get_the_title().'</h1>';

							while ( have_posts() ) : the_post();
								the_content();
							endwhile;

						} else {

							woocommerce_content();

						}

					?>

                </div>
            </div>
        </div>

	<?php }

	get_footer();