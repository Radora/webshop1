<?php

	// check if the repeater field has rows of data
	if ( have_rows( 'weinbewertungen' ) ):

		// loop through the rows of data
		while ( have_rows( 'weinbewertungen' ) ) : the_row(); ?>

			<div class="badge bg-green text-white mb-2 d-block">
				<?php the_sub_field( 'kurztext' ); ?>
			</div>

		<?php endwhile;

	endif;