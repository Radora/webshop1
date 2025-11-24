<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

    <div id="main-content" class="py-9 px-0">
        <div id="primary" class="content-area">
            <div id="content" class="site-content" role="main">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <header class="page-header">
                                <h1 class="page-title"><?php echo __('Error 404 / Seite nicht gefunden','mg');?></h1>
                            </header>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- #content -->
    </div><!-- #primary -->

<?php
get_footer();
