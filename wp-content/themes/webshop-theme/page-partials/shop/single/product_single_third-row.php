<?php
	global $product;
	$recipe = get_field( 'text_rezepte' );

	if ( $recipe ) {


		?>

        <div class="product_row--third my-4">
            <div class="row">
                <div class="col-12 col-md-5 py-3 py-lg-5">
                    <div class="product_recipe">
                        <h2 class="h3"><?php echo __( 'Unsere Rezepttips', 'webshop-theme' ); ?></h2>
						<div class="recipe font-size--lg">
							<?php echo $recipe; ?>
                        </div>
                    </div>
                    <div class="product_price">
                        <p class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?> text-dark my-4 my-lg-5"><?php echo $product->get_price_html(); ?></p>
                    </div>
                    <div class="product_add_to_cart">
						<?php woocommerce_template_single_add_to_cart(); ?>
                    </div>
                </div>
                <div class="product_cooking_image col-12 col-md-6 offset-md-1">
					<?php
						$bg_image     = get_field( 'bild_rezepte' );
						$bg_image_url = $bg_image['sizes']['large'];
					?>
                    <div class="image-container-stretch background-size--cover h-100"
                         style="background-image: url('<?php echo $bg_image_url; ?>')">
                    </div>
                </div>
            </div>
        </div>

		<?php

	}