<?php
	/**
	 * The main template file
	 *
	 * This is the most generic template file in a WordPress theme
	 * and one of the two required files for a theme (the other being style.css).
	 * It is used to display a page when nothing more specific matches a query.
	 * E.g., it puts together the home page when no home.php file exists.
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package WordPress
	 * @subpackage Twenty_Twenty
	 * @since 1.0.0
	 */

	get_header();

?>

    <main>
        <div class="container pt-3 pb-3 pt-md-6 pb-md-6">
            <div class="row">

                <div class="col-12">
					<?php
						get_template_part( 'template-parts/general/breadcrumbs' );

						if ( have_posts() ) {

							while ( have_posts() ) {

								the_post();
								the_content();

							}
						}
					?>

                </div>
            </div>
        </div>
    </main>

<?php
	get_footer();
