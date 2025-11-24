<div class="col-2 logo align-self-top">
	<div class="logo header-logo col-lg-2 col-md-2 col-sm-2">
		<a href="<?php
			// HOME URL CURRENT LANGUAGE
			$my_home_url = apply_filters( 'wpml_home_url', get_option( 'home' ) );
			echo $my_home_url
		?>">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/img/WMG_Logo_komplett_4c.svg"
			     class="img-responsive logo__img pt-1 w-auto" title="Weingut Mueller Grossmann"  alt="Weingut Mueller Grossmann"/>
		</a>
	</div>
</div>