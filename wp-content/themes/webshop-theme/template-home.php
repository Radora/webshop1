<?php
/*
Template Name: Startseite
*/

get_header(); ?>

    <div id="main-content">

        <?php while (have_rows('flexible_content_startseite')) : the_row();

            if (get_row_layout() == 'bild_links'):

	            get_template_part('page-partials/startseite/text-bild', null, array('image_position' => 'left'));


           elseif(get_row_layout() == 'bild_rechts'):

	            get_template_part('page-partials/startseite/text-bild', null, array('image_position' => 'right'));

            elseif(get_row_layout() == 'news_posts'):

                include(locate_template('page-partials/startseite/news-posts.php'));

            endif;

        endwhile; ?>

    </div><!-- #main-content -->

<?php
	get_footer();