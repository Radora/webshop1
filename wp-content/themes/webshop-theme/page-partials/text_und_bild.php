<?php

	//image
	$image                 = get_sub_field( 'flexible-bild' );
	$imageecho_background  = $image['sizes']['background-images'];
	$imageecho_medium      = $image['sizes']['medium'];
	$imageecho_large       = $image['sizes']['large'];
	$imageecho_xlarge      = $image['sizes']['xlarge'];
	$imageecho_medium_size = $image['sizes']['medium-width'];
	$imageecho_large_size  = $image['sizes']['large-width'];
	$imageecho_xlarge_size = $image['sizes']['xlarge-width'];

	//text image
	$textcontent = get_sub_field( 'flexible-content' );
	$img_side    = get_sub_field( 'bild_seite' );
	$link        = get_sub_field( 'link' );
	$link_style  = get_sub_field( 'link_style' )

?>

<div class="content-block container my-4">

    <div class="row">

		<?php if ( $img_side === 'links' ): ?>

            <div class="col-12 col-md-6">
                <img class="img-fluid w-100" src="<?php echo $imageecho_large; ?>" alt="<?php
					if ( $image['alt'] ) {
						echo $image['alt'];
					} else {
						the_title();
					}; ?>"
                     srcset="<?php echo $imageecho_medium . " " . $imageecho_medium_size . "w, " . $imageecho_large . " " . $imageecho_large_size . "w, " . $imageecho_xlarge . " " . $imageecho_xlarge_size . "w" ?>">
            </div>

            <div class="col-12 col-md-6">
				<?php echo $textcontent ?>
            </div>

		<?php else: ?>

            <div class="col-12 col-md-6">
				<?php echo $textcontent ?>
            </div>

            <div class="col-12 col-md-6">
                <img class="img-fluid w-100" src="<?php echo $imageecho_large; ?>" alt="<?php
					if ( $image['alt'] ) {
						echo $image['alt'];
					} else {
						the_title();

					}; ?>"
                     srcset="<?php echo $imageecho_medium . " " . $imageecho_medium_size . "w, " . $imageecho_large . " " . $imageecho_large_size . "w, " . $imageecho_xlarge . " " . $imageecho_xlarge_size . "w" ?>">
            </div>

		<?php endif; ?>
    </div>

    <div class="row">
        <div class="col">
            <div class="link-row mt-4">
				<?php if ( $link_style === 'primary' ) { ?>

                    <a class="btn btn-primary" href="<?php echo $link ?>"> <?php echo $link ?> </a>

				<?php } else { ?>

                    <a class="btn btn-outline-primary" href="<?php echo $link ?>"> <?php echo $link ?> </a>

				<?php } ?>
            </div>
        </div>
    </div>
</div>