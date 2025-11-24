<span class="primary-navigation__language d-none d-md-inline">
                            <?php
	                            $languages = apply_filters( 'wpml_active_languages', null, 'orderby=id&order=desc' );

	                            if ( $languages ) {
		                            foreach ( $languages as $language ) {
			                            if ( $language['active'] === 0 ) {
				                            echo '<a href="' . $language['url'] . '" class="text-decoration-none">'
				                                 . strtoupper( $language['language_code'] ) . '<i class="fal fa-globe ms-2"></i></a>';
			                            }
		                            }
	                            }; ?>
                        </span>