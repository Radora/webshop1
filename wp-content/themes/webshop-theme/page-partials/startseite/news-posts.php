<div class="content-block container">
    <div class="content-row row">

        <?php $image = get_sub_field('bild');
        $size = 'background-images';
        $imageecho = $image['sizes'][$size];
        ?>

        <div class="col-lg-6 col-md-6 col-sm-12 col-left col-image image-left" data-bg="<?php echo $imageecho; ?>">
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-right col-text textblock-right">

            <?php

            $posts = get_sub_field('news');

            if ($posts):

                foreach ($posts as $post):

                    setup_postdata($post); ?>

                    <div class="news-post">

                        <div class="news-title">
                            <h3><a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a></h3>
                        </div>
                        <div class="news-intro">

                            <?php $lang = ICL_LANGUAGE_CODE;

                            global $more;    // Declare global $more (before the loop).
                            $more = 0;       // Set (inside the loop) to display content above the more tag.

                            if ($lang == 'de') {
                                the_content(__('<div class="read-more">Weiterlesen</div>'));
                            } else {
                                the_content(__('<div class="read-more">Read more</div>'));
                            }
                            wp_link_pages(array(
                                'before' => '<div class="page-links"><span class="page-links-title">',
                                'after' => '</div>',
                                'link_before' => '<span>',
                                'link_after' => '</span>',
                            ));
                            ?>
                        </div>

                    </div>

                <?
                endforeach;

                wp_reset_postdata();

            endif; ?>

        </div>
    </div>
</div>