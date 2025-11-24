<?php
	if ( get_field( 'email', 'option' ) ) {
		echo '<a class="d-none d-md-inline" href="mailto:' . get_field( 'email', 'option' ) . '"><i class="fas fa-envelope ms-3"></i></a>';
	}