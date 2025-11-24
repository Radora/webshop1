<?php

	//======================================================================
	// Woocommerce
	//======================================================================

//-----------------------------------------------------
// Disable WooCommerce's Default Stylesheets
//-----------------------------------------------------
	function disable_woocommerce_default_css( $styles ) {

		// Disable the stylesheets below via unset():
		unset( $styles['woocommerce-general'] );  // Styling of buttons, dropdowns, etc.
		// unset( $styles['woocommerce-layout'] );        // Layout for columns, positioning.
		// unset( $styles['woocommerce-smallscreen'] );   // Responsive design for mobile devices.

		return $styles;
	}

	add_action( 'woocommerce_enqueue_styles', 'disable_woocommerce_default_css' );


//-----------------------------------------------------
// change currency symbol
//-----------------------------------------------------
	add_filter( 'woocommerce_currency_symbol', 'change_existing_currency_symbol', 10, 2 );

	function change_existing_currency_symbol( $currency_symbol, $currency ) {
		switch ( $currency ) {
			case 'EUR':
				$currency_symbol = 'EUR';
				break;
		}

		return $currency_symbol;
	}

//-----------------------------------------------------
// Add woocommerce support
//-----------------------------------------------------
	function add_woocommerce_support() {
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );
	}

	add_action( 'after_setup_theme', 'add_woocommerce_support' );

//-----------------------------------------------------
// Remove downloads from my account
//-----------------------------------------------------
	add_filter( 'woocommerce_account_menu_items', 'mg_remove_downloads_my_account', 999 );

	function mg_remove_downloads_my_account( $items ) {
		unset( $items['downloads'] );

		return $items;
	}

//-----------------------------------------------------
// Disable woocommerce actions
//-----------------------------------------------------
	function disable_woo_commerce_actions() {
		remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
		remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
		remove_action( 'woocommerce_after_shop_loop', 'woocommerce_result_count', 20 );
		remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
		remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
		remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
	}

	add_action( 'init', 'disable_woo_commerce_actions' );


//-----------------------------------------------------
// Change Woocommerce product on sale flash and thumbnail
//-----------------------------------------------------

	add_action( 'woocommerce_before_shop_loop_item_title', 'mg_loop_product_header', 11 );

	function mg_loop_product_header() {
		global $post, $product, $woocommerce;

		?>

        <div class="product-overlay position-relative w-100">

            <div class="product-content position-absolute w-100 h-100">

                <div class="position-absolute badge-wrap top-0 end-0 p-3">
					<?php

						get_template_part( 'page-partials/shop/general/badge_on-sale' );
						get_template_part( 'page-partials/shop/general/badge_awards' );

					?>
                </div>

				<?php $image     = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
					$imageWidth  = $image[1];
					$imageHeight = $image[2];

					if ( $imageWidth > $imageHeight ) { ?>
                        <!--                        // Landscape -->
                        <div class="product-image h-100 background-size--cover"
                             style="background-image:url('<?php echo $image[0]; ?>');"></div>

					<?php } else { ?>
                        <!--                        // Portrait or Square-->
                        <img class="product-image position-absolute bottom-0 mb-4 ms-4" src="<?php echo $image[0]; ?>"
                             data-id="<?php echo $post->ID; ?>" alt="<?php the_title();?>" title="<?php the_title();?>">
					<?php } ?>

                <div class="product-category-tag text-uppercase text-decoration-none fw-bold position-absolute end-0 bottom-0 pt-1 px-2 pb-0 mt-0 me-2 mb-2 ms-0 bg-white text-black">
					<?php echo $product->get_categories( ', ', _n( '', '', sizeof( get_the_terms( $post->ID, 'product_cat' ) ), 'woocommerce' ) . ' ', ); ?>
                </div>
            </div>

        </div>

	<?php }


	//-----------------------------------------------------
	// Single Product
	//-----------------------------------------------------

	// Add content underneath title
	add_action( 'woocommerce_single_product_summary', 'mg_product_description', 6, 0 );

	function mg_product_description() {
		?>
        <div class="product_description mt-4 font-size--lg">
			<?php the_content(); ?>
        </div>
	<?php }

	// remove product meta
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40, 0 );


	//-----------------------------------------------------
	// Adds tag users for the mailchimp newsletter
	//-----------------------------------------------------
	add_filter( 'mc4wp_integration_woocommerce_subscriber_data', function(MC4WP_MailChimp_Subscriber $subscriber) {
		$subscriber->tags[] = 'website';
		return $subscriber;
	});