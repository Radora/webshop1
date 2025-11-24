<?php

	//image
	$image                 = get_sub_field( 'bild' );
	$imageecho_background  = $image['sizes']['background-images'];
	$imageecho_medium      = $image['sizes']['medium'];
	$imageecho_large       = $image['sizes']['large'];
	$imageecho_xlarge      = $image['sizes']['xlarge'];
	$imageecho_medium_size = $image['sizes']['medium-width'];
	$imageecho_large_size  = $image['sizes']['large-width'];
	$imageecho_xlarge_size = $image['sizes']['xlarge-width'];

	//text image
	$textbild = get_sub_field( 'textbild' );


?>
<div class="content-block container">
    <div class="row">

        <div class="col-12 d-md-none mt-md-4">
            <img class="img-fluid w-100" src="<?php echo $imageecho_large; ?>" alt="<?php
				if ( $image['alt'] ) {
					echo $image['alt'];
				} else {
					the_title();
				}; ?>"
                 srcset="<?php echo $imageecho_medium . " " . $imageecho_medium_size . "w, " . $imageecho_large . " " . $imageecho_large_size . "w, " . $imageecho_xlarge . " " . $imageecho_xlarge_size . "w" ?>">

        </div>
        <div class="col-md-6 d-md-block background-size--cover <?php if ( $args['image_position'] === 'right' ) {
			echo 'order-3';
		} ?>"
             style="background-image:url('<?php echo $imageecho_background; ?>')">

        </div>

        <div class="col-12 col-md-6 col-text text-center py-6 py-md-10 <?php if ( $args['image_position'] === 'right' ) {
			echo 'order-2';
		} ?>">

			<?php

				if ( $textbild ) {

					echo '<div class="row">
                    <div class="col-8">';
				}

				the_sub_field( 'text' );

				if ( $textbild ) {

					echo '</div>
                           <div class="col-4">
                        <img src="' . $textbild['url'] . '" alt="' . $textbild['alt'] . '"
                             title="' . $textbild['alt'] . '" class="img-fluid"/>
                    </div>';
				}

			?>

        </div>

    </div>
</div>