<?php
/*
Template Name: Vertriebspartner
*/
wp_enqueue_script( 'bootstrapjs' );

get_header(); ?>

    <div id="main-content" class="py-9 px-0">

		<?php while ( have_rows( 'content_blocks' ) ) : the_row();

			if ( get_row_layout() == 'full_width_image' ):

				include( locate_template( 'page-partials/headerbild.php' ) );

			endif;

			if ( get_row_layout() == 'text_volle_breite' ):

				include( locate_template( 'page-partials/full-width-text.php' ) );

			endif;

			if ( get_row_layout() == 'bild_links' ):

				include( locate_template( 'page-partials/startseite/bild-links.php' ) );

			endif;

			if ( get_row_layout() == 'bild_rechts' ):

				include( locate_template( 'page-partials/startseite/bild-rechts.php' ) );

			endif;

		endwhile; ?>

        <div id="vertriebspartner" class="container mt-8">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">

                    <!-- Nav tabs -->
					<?php if ( get_field( 'vertriebspartner_tab' ) ): ?>

                        <ul id="vertriebspartnerTab" class="nav nav-tabs border-bottom border-primary border-1 m-0"
                            role="tablist">

							<?php $tabnum = 0;

							while ( the_repeater_field( 'vertriebspartner_tab' ) ):

								$tab_name = get_sub_field( 'tab_name' );
								//var_dump( $tab_name );

								?>
                                <li class="nav-item" role="presentation">
                                    <button data-bs-target="#<?php echo sanitize_title( $tab_name ); ?>"
                                            id="<?php echo sanitize_title( $tab_name ); ?>-tab"
                                            data-bs-toggle="tab"
                                            type="button"  role="tab"
                                            aria-controls="<?php echo sanitize_title( $tab_name ); ?>"
                                            class="nav-link <?php if ( $tabnum === 0) {
										        echo 'active';
									        } ?>"
                                            aria-selected="<?php if ( $tabnum === 0 ) {
										        echo 'true';
									        } else {
										        echo 'false';
									        } ?>">
										<?php echo $tab_name; ?>
                                    </button>
                                </li>

								<?php $tabnum ++;

							endwhile; ?>

                        </ul>

					<?php endif; ?>

                    <!-- Tab panes -->

					<?php if ( get_field( 'vertriebspartner_tab' ) ): ?>

                        <div id="vertriebspartnerTabContent" class="tab-content pt-5">

							<?php $tabnumcontent = 0;

							while ( the_repeater_field( 'vertriebspartner_tab' ) ):

								$tab_name = get_sub_field( 'tab_name' );

								?>

                                <div id="<?php echo sanitize_title( $tab_name ); ?>"
                                     role="tabpanel"
                                     aria-labelledby="<?php echo sanitize_title( $tab_name ); ?>-tab"
                                     class="tab-pane fade <?php if ( $tabnumcontent === 0 ) {
									     echo 'show active';
								     } ?>">
                                    <div class="row">

                                        <!-- Start Vertriebspartner -->

										<?php if ( get_sub_field( 'vertriebspartner' ) ):

											while ( the_repeater_field( 'vertriebspartner' ) ):?>

                                                <div class="vertriebspartner-eintrag col-lg-2 col-md-3 col-sm-4">

													<?php the_sub_field( 'beschreibung' ); ?>

                                                </div>

											<?php endwhile;
										endif; ?>
                                    </div>
                                    <!-- Ende Vertriebspartner -->

                                </div>

								<?php $tabnumcontent ++;

							endwhile; ?>
                        </div>

					<?php endif; ?>

                </div>
            </div>
        </div>

    </div><!-- #main-content -->

<?php
get_footer();
