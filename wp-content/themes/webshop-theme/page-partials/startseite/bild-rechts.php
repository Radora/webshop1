<?php $image = get_sub_field('bild');

$size = 'background-images';
$imageecho = $image['sizes'][$size];
$imageecho_medium = $image['sizes']['medium'];
$imageecho_large = $image['sizes']['large'];
$imageecho_xlarge = $image['sizes']['xlarge'];
$imageecho_medium_size = $image['sizes']['medium-width'];
$imageecho_large_size = $image['sizes']['large-width'];
$imageecho_xlarge_size = $image['sizes']['xlarge-width'];
$textbild = get_sub_field('textbild');

?>

<div class="content-block container">
    <div class="content-row row">
        <div class="image-right visible-xs visible-sm">
            <img class="img-responsive w-100" src="<?php echo $imageecho; ?>" alt="<?php
            if ($image['alt']){
                echo $image['alt'];
            } else {
                the_title();
            };?>"

            srcset="<?php echo $imageecho_medium." ".$imageecho_medium_size."w, ".$imageecho_large." ".$imageecho_large_size."w, ".$imageecho_xlarge." ".$imageecho_xlarge_size."w"?>">

        </div>

        <?php if (empty($textbild)) { ?>

            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-left col-text textblock-left">
                <?php the_sub_field('text'); ?>
            </div>

        <?php } else { ?>

            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-left col-text textblock-left">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-8">
                        <?php the_sub_field('text'); ?>
                    </div>
                    <div class="textblock-textbild col-lg-4 col-md-4 col-sm-4">
                        <img src="<?php echo $textbild['url']; ?>" alt="<?php echo $textbild['alt']; ?>"
                             title=""<?php echo $textbild['alt']; ?> class="img-responsive"/>
                    </div>
                </div>
            </div>

        <?php } ?>

        <div class="col-lg-6 col-md-6 col-right col-image image-right hidden-sm hidden-xs"
             data-bg="<?php echo $imageecho; ?>">
        </div>
    </div>
</div>