<?php

	global $product;

?>

<div class="product_row--second">
    <div class="row align-items-stretch">
        <div class="col-12 col-md-5 col-xl-4 d-none d-md-block">
			<?php
				$bg_image     = get_field( 'bild_eigenschaften' );
				$bg_image_url = $bg_image['sizes']['large'];
			?>
            <div class="image-container-stretch background-size--cover h-100"
                 style="background-image: url('<?php echo $bg_image_url; ?>')">
            </div>

        </div>
        <div class="col-12 col-md-6 col-xl-5 offset-md-1 py-3 py-lg-5">
            <div class="product_details row">
				<?php
					$attributes = $product->get_attributes();

					foreach ( $attributes as $attribute ) :
						if ( empty( $attribute['is_visible'] ) || ( $attribute['is_taxonomy'] && ! taxonomy_exists( $attribute['name'] ) ) ) {
							continue;
						} else {
							$has_row = true;
						}
						?>
                        <div class="col-6 mb-3 mb-lg-4">
                            <div class="attribute_title text-uppercase text-gray-dark fw-bold"><?php echo wc_attribute_label( $attribute['name'] ); ?></div>
                            <div class="attribute_content font-size--lg">
								<?php
									if ( $attribute['is_taxonomy'] ) {

										$values = wc_get_product_terms( get_the_ID(), $attribute['name'], array( 'fields' => 'names' ) );
										echo apply_filters( 'woocommerce_attribute', wpautop( wptexturize( implode( ', ', $values ) ) ), $attribute, $values );

									} else {

										// Convert pipes to commas and display values
										$values = array_map( 'trim', explode( WC_DELIMITER, $attribute['value'] ) );
										echo apply_filters( 'woocommerce_attribute', wpautop( wptexturize( implode( ', ', $values ) ) ), $attribute, $values );

									}
								?></div>
                        </div>
					<?php endforeach; ?>

            </div>
            <div class="product_awards">
				<?php

					// check if the repeater field has rows of data
					if ( have_rows( 'weinbewertungen' ) ):

                        echo '<div class="text-uppercase text-gray-dark fw-bold mb-1">'.__('Auszeichnungen','webshop-theme').'</div>';

						// loop through the rows of data
						while ( have_rows( 'weinbewertungen' ) ) : the_row(); ?>

                            <div class="award">
                                <div class="d-flex justify-content-between">
                                    <div class="award_text font-size--lg"><?php the_sub_field( 'textblock' ); ?></div>
                                    <div class="award-download">
                                        <?php

                                            $download = get_sub_field('download');
                                            if($download){
                                                echo '<a href="'.$download.'" target="_blank" class="ms-4"><i class="fal fa-file-download"></i></a>';
                                            }

                                        ?>
                                    </div>
                                </div>

                            </div>

						<?php endwhile;

					endif; ?>
            </div>
        </div>
    </div>
</div>