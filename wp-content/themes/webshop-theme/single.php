<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header();

$lang = ICL_LANGUAGE_CODE;
global $more;    // Declare global $more (before the loop).
$more = 0;       // Set (inside the loop) to display content above the more tag.

?>

<?php wp_redirect('https://www.mueller-grossmann.at/', 301);
exit; ?>

    <div id="single-post-header" class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="text-center">
                    <a href="/news" class="button-green">
                        <?php if ($lang == 'de') { ?>
                            zur&uuml;ck zu News
                        <?php } else { ?>
                            back to News
                        <?php } ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
<?php
// Start the Loop.
while (have_posts()) : the_post(); ?>
    <div id="single-post" class="content-area">
        <div id="content" class="site-content container" role="main">
            <div class="row">
                <div class="single-post-text col-6 col-md-6 col-sm-6">

                    <?php echo "<h1>";

                    the_title();

                    echo "</h1>";

                    the_content(__('<div class="spacer"></div>'));

                    ?>

                </div>
                <div class="single-post-image text-center col-6 col-md-6 col-sm-6">
                    <?php
                    if (has_post_thumbnail()) {
                        $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large'); ?>

                        <img class="img-responsive d-inline" src="<?php echo $large_image_url[0]; ?>" alt="<?php echo the_title(); ?>"
                             title="<?php echo the_title(); ?>"/>

                    <?php } ?>
                </div>
            </div>
        </div><!-- #content -->
    </div><!-- #single-post -->
<?php endwhile;

get_footer();
