<div class="page-content-block headerbild border-bottom border-primary border-2">

    <?php $image = get_sub_field('bild');
    $image_medium = $image['sizes']['medium'];
    $image_large = $image['sizes']['large'];
    $image_xlarge = $image['sizes']['xlarge'];

    ?>
    <img class="w-100"
         src="<?php echo $image_large; ?>"
         srcset="
			<?php echo $image_medium; ?> 500w,			
			<?php echo $image_xlarge; ?> 1400w,
			<?php echo $image_xlarge; ?> 1600w"
         sizes="100vw"
         alt="<?php echo get_the_title(); ?>"
         title="<?php echo get_the_title(); ?>"
    />
    </div>
