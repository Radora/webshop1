<?php

	while ( have_rows( 'content_blocks' ) ) : the_row();

		if ( get_row_layout() == 'full_width_image' ):

			include( locate_template( 'page-partials/headerbild.php' ) );

		elseif ( get_row_layout() == 'text_volle_breite' ):

			include( locate_template( 'page-partials/full-width-text.php' ) );

		elseif ( get_row_layout() == 'bild_links' ):

			get_template_part( 'page-partials/startseite/text-bild', null, array( 'image_position' => 'left' ) );

		elseif ( get_row_layout() == 'bild_rechts' ):

			get_template_part( 'page-partials/startseite/text-bild', null, array( 'image_position' => 'right' ) );

		elseif(get_row_layout() == 'text_und_bild'):

			include(locate_template('page-partials/text_und_bild.php'));

		endif;

	endwhile;