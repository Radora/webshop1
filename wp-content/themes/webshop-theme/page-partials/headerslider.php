<?php
	wp_enqueue_script( 'bootstrapjs' );

	// Slider
	$carouselID      = rand();
	$carouselSlideID = 0;
?>

<section id="headerslider" class="border-bottom border-primary border-10">

    <div id="carousel-<?php echo $carouselID; ?>" class="carousel slide" data-bs-ride="carousel"
         data-bs-interval="10000">
        <div class="carousel-inner">

			<?php
				while ( have_rows( 'headerslider' ) ) : the_row();
					$slideIMG = get_sub_field( 'slider-bild' );
					?>

                    <article class="carousel-item vh-100 carousel-item-<?php echo $carouselSlideID;
						if ( $carouselSlideID == 0 ) {
							echo ' active';
						} ?> background-size--cover" style="background-image:url('<?php echo $slideIMG; ?>');">

                        <div class="header-text py-1 px-2 p-lg-0">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 col-md-10 col-lg-9">
                                        <h1 class="p-0 m-0 text-primary">
                                            <div class="header-row header-row-1">
                                                <span class="header-row-text"><?php the_sub_field( 'slider-text_zeile_1' ); ?></span>
                                            </div>
                                        </h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>

					<?php $carouselSlideID ++; endwhile;
			?>

        </div>

		<?php if ( $carouselSlideID > 1 ) {

			echo '<div  class="carousel-indicators">';

			$indicatorNum = 0;
			// check if the repeater field has rows of data
			if ( have_rows( 'headerslider' ) ):

				// loop through the rows of data
				while ( have_rows( 'headerslider' ) ) : the_row();
					?>
                    <button type="button" data-bs-target="#carousel-<?php echo $carouselID; ?>"
                            data-bs-slide-to="<?php echo $indicatorNum; ?>"
                            class="<?php if ( $indicatorNum === 0 ) { ?>active<?php } ?>"
                            aria-current="true" aria-label="Slide 1"></button>

					<?php $indicatorNum ++;
				endwhile;

			endif;

			echo '</div >';

		} ?>

    </div>
</section>
