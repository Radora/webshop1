<div class="filter-wrap d-none d-md-block">
    <div class="dropdown dropdown-wrap d-inline-block mt-2">

        <button class="btn btn-secondary rounded-0 text-start dropdown-toggle dropdown-btn pe-5 fs-5 fw-bold"
                type="button"
                id="dropdownMenuRebsorte"
                data-bs-toggle="dropdown" aria-expanded="false" data-fallback="Rebsorte">
            <?php echo __( 'Rebsorte', 'webshop-theme' ); ?>
        </button>

        <ul class="dropdown-menu" aria-labelledby="dropdownMenuRebsorte">
            <li>
                <button class="dropdown-item" data-name="<?php echo __( 'Rebsorte', 'webshop-theme' ); ?>" data-dropdown="dropdownMenuRebsorte" data-filter="*"><?php echo __( 'Alle', 'webshop-theme' ); ?></button>
            </li>

			<?php
				$product_categories = get_categories( array(
					'taxonomy'     => 'product_cat',
					'orderby'      => 'name',
					'hierarchical' => 1,
					'parent'       => 62, // If product has 'Rebsorten' as parent
					'hide_empty'   => true
				) );

				if ( $product_categories ) {

					foreach ( $product_categories as $product_category ) {

						echo '<li><button class="dropdown-item" data-dropdown="dropdownMenuRebsorte" data-filter=".product_cat-' . $product_category->slug . '">'
						     . $product_category->name . '</button></li>';

					}
				}
			?>

        </ul>
    </div>

    <div class="dropdown dropdown-wrap d-inline-block ms-3 mt-2">
        <button class="btn btn-secondary rounded-0 text-start dropdown-toggle dropdown-btn pe-5 fs-5 fw-bold"
                type="button"
                id="dropdownMenuWineType"
                data-bs-toggle="dropdown" aria-expanded="false" data-fallback="Typ">
            <span class="fs-5 fw-bold"><?php echo __( 'Typ', 'webshop-theme' ); ?></span>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuWineType">
            <li>
                <button class="dropdown-item" data-name="<?php echo __( 'Typ', 'webshop-theme' ); ?>" data-dropdown="dropdownMenuWineType" data-filter="*"><?php echo __( 'Alle', 'webshop-theme' ); ?></button>
            </li>
			<?php
				$product_categories = get_categories( array(
					'taxonomy'     => 'product_cat',
					'orderby'      => 'name',
					'hierarchical' => 1,
					'parent'       => 61,     // If product has 'Weintypen' as parent
					'hide_empty'   => true
				) );

				if ( $product_categories ) {

					foreach ( $product_categories as $product_category ) {

						echo '<li><button class="dropdown-item" data-dropdown="dropdownMenuWineType" data-filter=".product_cat-' . $product_category->slug . '">'
						     . $product_category->name . '</button></li>';
					}
				}
			?>

        </ul>
    </div>
</div>