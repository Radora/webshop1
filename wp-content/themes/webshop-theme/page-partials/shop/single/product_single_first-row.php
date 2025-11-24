<?php

	global $post;
	global $product;

	$product_cats = get_the_terms( $post->ID, 'product_cat' );

?>

<div class="product_row--first mb-4">
    <div class="row">
        <div class="col-12">
            <div class="product_category_back">
                <a href="<?php echo get_term_link( $product_cats[0]->term_id ); ?>"
                   class="text-dark mb-3 fw-bold text-uppercase text-decoration-none"><i
                            class="fal fa-long-arrow-left me-2"></i><?php echo __( 'Übersicht', 'webshop-theme' ); ?>
                </a>
            </div>
            <div class="product_category text-uppercase mb-5 mb-lg-6 fs-5">
				<?php
					$cat_num = 0;
					foreach ( $product_cats as $product_cat ) {
						if ( $cat_num > 0 ) {
							echo ' | ';
						}
						echo '<a href="' . get_term_link( $product_cat->term_id ) . '" class="text-decoration-none text-dark">' . $product_cat->name . '</a>';

						$cat_num ++;
					} ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="product_information col-12 col-md-5 order-4">

			<?php do_action( 'woocommerce_single_product_summary' ); ?>

        </div>
        <div class="product_image col-10 offset-1 col-md-5 offset-md-2 my-6 my-md-0 order-1 order-md-5">
            <div class="product_image-background bg-light position-relative">

                <div class="position-absolute badge-wrap top-0 end-0 p-3">
					<?php

						get_template_part( 'page-partials/shop/general/badge_on-sale' );
						get_template_part( 'page-partials/shop/general/badge_awards' );

					?>
                </div>

                <div class="product_image-wrap text-center h-100 w-100 position-absolute top-0 start-0">

					<?php

						$image       = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
						$imageWidth  = $image[1];
						$imageHeight = $image[2];
						if ( $imageWidth > $imageHeight ) {
							?>
                            <!--                        // Landscape -->
                            <div class="product-image h-100 background-size--cover"
                                 style="background-image:url('<?php echo $image[0]; ?>');"></div>

						<?php } else { ?>
                            <!--                        // Portrait or Square-->
                            <img src="<?php echo $image[0]; ?>" class="product_image h-125"
                                 title="<?php the_title(); ?>" alt="<?php the_title(); ?>">
						<?php } ?>

                </div>

            </div>
        </div>
    </div>
</div>