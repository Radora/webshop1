<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>

<article class="news-entry col-lg-3 col-md-4 col-sm-6">
    <header class="entry-header">
        <?php $medium_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'background-images'); ?>
        <div class="entry-image" data-bg="<?php echo $medium_image_url[0]; ?>">

        </div>
    </header><!-- .entry-header -->
    <div class="entry-content">
        <div class="entry-title">
            <a href="<?php the_permalink(); ?>">
                <h2><?php the_title(); ?></h2>
            </a>
        </div>
        <div class="entry-content-text">
            <?php the_content(__('<div class="spacer"></div>')); ?>
        </div>
        <div class="read-more">

            <?php $lang = ICL_LANGUAGE_CODE;

            if ($lang == 'de') {
                ?>

                <a href="<?php the_permalink(); ?>">
                    Weiterlesen
                </a>
            <?php } else { ?>
                <a href="<?php the_permalink(); ?>">
                    Read more
                </a>
            <?php } ?>
        </div>
    </div><!-- .entry-content -->

    <?php the_tags('<footer class="entry-meta"><span class="tag-links">', '', '</span></footer>'); ?>
</article><!-- #post-## -->
