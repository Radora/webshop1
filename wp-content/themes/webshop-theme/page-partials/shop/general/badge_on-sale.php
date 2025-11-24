<?php

	global $product;
	if ( $product->is_on_sale() ) { ?>
        <div class="badge bg-red text-white mb-2 d-block">
			<?php echo __( 'On Sale', 'woocommerce' ); ?>
        </div>
	<?php }