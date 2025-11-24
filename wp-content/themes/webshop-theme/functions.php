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

//======================================================================
// Bootstrap default pages for a fresh install
//======================================================================
function webshop_theme_create_default_pages() {
    if ( get_option( 'webshop_theme_default_pages_created' ) ) {
        return;
    }

    $pages = array(
        array(
            'title'    => 'Home',
            'slug'     => 'home',
            'template' => 'template-home.php',
        ),
        array(
            'title'    => 'Shop',
            'slug'     => 'shop',
            'template' => '',
        ),
        array(
            'title'    => 'News',
            'slug'     => 'news',
            'template' => '',
        ),
        array(
            'title'    => 'About',
            'slug'     => 'about',
            'template' => '',
        ),
        array(
            'title'    => 'Contact',
            'slug'     => 'contact',
            'template' => '',
        ),
        array(
            'title'    => 'Partners',
            'slug'     => 'partners',
            'template' => 'template-vertriebspartner.php',
        ),
        array(
            'title'    => 'Cart',
            'slug'     => 'cart',
            'template' => '',
        ),
        array(
            'title'    => 'Checkout',
            'slug'     => 'checkout',
            'template' => '',
        ),
        array(
            'title'    => 'My Account',
            'slug'     => 'my-account',
            'template' => '',
        ),
    );

    $created_ids = array();

    foreach ( $pages as $page ) {
        $existing = get_page_by_path( $page['slug'] );
        $page_id  = $existing ? $existing->ID : 0;

        if ( ! $page_id ) {
            $page_id = wp_insert_post(
                array(
                    'post_type'    => 'page',
                    'post_title'   => $page['title'],
                    'post_name'    => $page['slug'],
                    'post_status'  => 'publish',
                    'post_content' => '',
                )
            );
        }

        if ( $page_id && ! empty( $page['template'] ) ) {
            update_post_meta( $page_id, '_wp_page_template', $page['template'] );
        }

        if ( $page_id ) {
            $created_ids[ $page['slug'] ] = $page_id;
        }
    }

    if ( ! empty( $created_ids['home'] ) ) {
        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $created_ids['home'] );
    }

    if ( ! empty( $created_ids['news'] ) ) {
        update_option( 'page_for_posts', $created_ids['news'] );
    }

    if ( class_exists( 'WooCommerce' ) ) {
        if ( ! empty( $created_ids['shop'] ) ) {
            update_option( 'woocommerce_shop_page_id', $created_ids['shop'] );
        }
        if ( ! empty( $created_ids['cart'] ) ) {
            update_option( 'woocommerce_cart_page_id', $created_ids['cart'] );
        }
        if ( ! empty( $created_ids['checkout'] ) ) {
            update_option( 'woocommerce_checkout_page_id', $created_ids['checkout'] );
        }
        if ( ! empty( $created_ids['my-account'] ) ) {
            update_option( 'woocommerce_myaccount_page_id', $created_ids['my-account'] );
        }
    }

    update_option( 'webshop_theme_default_pages_created', current_time( 'mysql' ) );
}
add_action( 'after_switch_theme', 'webshop_theme_create_default_pages' );
add_action( 'init', 'webshop_theme_create_default_pages' );

// Hide WP admin toolbar on the front end
add_filter( 'show_admin_bar', '__return_false' );
