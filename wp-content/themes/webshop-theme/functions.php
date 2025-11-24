<?php

function seopress_theme_slug_setup() {
    add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'seopress_theme_slug_setup' );

function register_menus() {
    register_nav_menus( array(
            'header-menu'        => __( 'Header Menu' ),
            'mobile-header-menu' => __( 'Mobile Header Menu' ),
            'footer-top'         => __( 'Footer Menu Top' ),
            'footer-menu'        => __( 'Footer Menu Bottom' ),
            'shop-menu'          => __( 'Shop Menu' )
    ) );
}
add_action( 'init', 'register_menus' );

function register_enjoyorbiteStylesAndJS() {
    if ( is_admin() ) return;

    wp_enqueue_style( 'webfont', get_template_directory_uri() . "/assets/css/webfont.css" );
    wp_enqueue_style( 'hamburgers', get_template_directory_uri() . "/assets/css/hamburgers.css" );
    wp_enqueue_style( 'woocommerce-custom', get_template_directory_uri() . "/assets/scss/theme/woocommerce/woocommerce.css" );
    wp_enqueue_style( 'fontawesome', get_template_directory_uri() . "/assets/css/fontawesome.all.min.css" );

    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'bootstrapjs', get_template_directory_uri() . "/assets/js/bootstrap.bundle.min.js", array('jquery'), null, true );
    wp_enqueue_script( 'customjs', get_template_directory_uri() . "/assets/js/mueller-grossmann.js", array('jquery'), null, true );
    wp_enqueue_script( 'mobile-nav-js', get_template_directory_uri() . "/assets/js/mobile-navigation.js", array(), '1.0', true );
    wp_enqueue_script( 'shop-isotope-js', get_template_directory_uri() . "/assets/js/isotope.min.js", array(), '1.0', true );
    wp_enqueue_script( 'mg-shop-js', get_template_directory_uri() . "/assets/js/mg-shop.js", array(), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'register_enjoyorbiteStylesAndJS' ); // ← changed from 'init' to correct hook

if ( function_exists( 'add_image_size' ) ) {
    add_image_size( 'background-images', 900 );
    add_image_size( 'xlarge', 1600 );
}

function remove_menus() {
    remove_menu_page( 'edit-comments.php' );
}
add_action( 'admin_menu', 'remove_menus' );

if ( function_exists( 'acf_add_options_page' ) ) {
    acf_add_options_page( 'Options' );
}

/* Custom Login Logo */
function mg_login_logo() { ?>
    <style type="text/css">
        body.login { background: white; }
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/logo-mueller-grossmann.svg);
            height: 86px; width: 145px; background-size: 145px 86px; background-repeat: no-repeat; padding-bottom: 30px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'mg_login_logo' );

/* Add class to <a> in nav menu */
function add_additional_class_on_a( $atts, $item, $args ) {
    if ( isset( $args->add_a_class ) ) {
        $class = $args->add_a_class;
        if ( in_array( 'current-menu-item', (array) $item->classes ) ) {
            $class .= ' ' . $args->add_current_a_class;
        }
        $atts['class'] = $class;
    }
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_additional_class_on_a', 10, 3 );

/* FIXED Mobile Menu Walker */
class Mobile_Menu_Walker extends Walker_Nav_Menu {
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'position-relative text-uppercase fw-bold';

        $output .= '<li class="' . esc_attr( implode( ' ', $classes ) ) . '">';

        $attributes = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ' class="text-hover-green"';

        if ( $item->url && $item->url !== '#' ) {
            $output .= '<a href="' . esc_attr( $item->url ) . '" ' . $attributes . '>';
        } else {
            $output .= '<span>';
        }

        $output .= apply_filters( 'the_title', $item->title, $item->ID );

        if ( $item->url && $item->url !== '#' ) {
            $output .= '</a>';
        } else {
            $output .= '</span>';
        }

        /* THIS WAS THE BUG – $args->walker->has_children is invalid */
        /* Correct way: use $args->has_children (passed by wp_nav_menu) */
        if ( ! empty( $args->has_children ) && $depth === 0 ) {
            $output .= '<i class="fal fa-plus sub-menu-icon position-absolute end-0 text-hover-green mt-1"></i>';
        }
    }
}

//======================================================================
// Woocommerce
//======================================================================
require_once __DIR__ . '/includes/woocommerce.php';