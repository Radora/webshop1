<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="PUpUqbVOu9OxLnsGAnrtllRxX7foVw7bZHqQddt875Q"/>
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon.ico"/>
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,600,700' rel='stylesheet' type='text/css'>

	<?php wp_head(); ?>

    <link href='<?php echo get_template_directory_uri(); ?>/style.css?ver=18042017' rel='stylesheet' type='text/css'>
    <link href='<?php echo get_template_directory_uri(); ?>/assets/scss/theme/theme.css' rel='stylesheet'
          type='text/css'>


</head>

<body <?php body_class(); ?>>

<?php
	wp_body_open();
?>

<!-- Preloader -->
<div id="preloader">
    <div id="status">&nbsp;</div>
</div>

<?php
	get_template_part( 'page-partials/header/mobile-navigation' );
?>

<div id="page" class="page-id-<?php echo get_the_ID(); ?> page">

    <header class="container-fluid header bg-white position-fixed top-0 pb-2 pb-md-0">
        <div class="row">

			<?php
				get_template_part( 'page-partials/header/logo' );
				get_template_part( 'page-partials/header/header-navigation' );
			?>

        </div>
    </header><!-- #masthead -->

	<?php if ( is_page( 2 ) or is_page( 237 ) ) {

		include( locate_template( 'page-partials/headerslider.php' ) );

	} ?>

    <div id="main-wrap" class="flex-grow-1<?php if ( is_page( 2 ) or is_page( 237 ) ) {
		echo ' pt-0';
	} ?>">