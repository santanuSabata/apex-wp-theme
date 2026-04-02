<?php
function my_theme_enqueue_assets() {
    // Enqueue your CSS
    wp_enqueue_style(
        'my-theme-style',
        get_template_directory_uri() . '/assets/css/style.css',
        [],
        '1.0.0'
    );

    // Enqueue jQuery (WordPress ships with it)
    wp_enqueue_script( 'jquery' );

    // Enqueue your JS (depends on jQuery, loads in footer)
    wp_enqueue_script(
        'my-theme-script',
        get_template_directory_uri() . '/assets/js/script.js',
        [ 'jquery' ],
        '1.0.0',
        true  // true = load in footer
    );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_assets' );

// Add theme support basics
function my_theme_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'my_theme_setup' );


// ── Register Navigation Menu Location ──────────────────────────────
 
// ── Customizer Settings (logo text + CTA button) ────────────────────
function my_theme_customizer( $wp_customize ) {

    // ── Section ──
    $wp_customize->add_section( 'apex_navbar_section', [
        'title'    => __( 'Navbar Settings', 'my-theme' ),
        'priority' => 30,
    ] );

    // ── Logo Text ──
    $wp_customize->add_setting( 'apex_logo_text', [
        'default'           => 'Apex',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage', // live preview
    ] );
    $wp_customize->add_control( 'apex_logo_text', [
        'label'   => __( 'Logo Text', 'my-theme' ),
        'section' => 'apex_navbar_section',
        'type'    => 'text',
    ] );

    // ── Logo Dot Character ──
    $wp_customize->add_setting( 'apex_logo_dot', [
        'default'           => '.',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ] );
    $wp_customize->add_control( 'apex_logo_dot', [
        'label'   => __( 'Logo Accent Character', 'my-theme' ),
        'section' => 'apex_navbar_section',
        'type'    => 'text',
    ] );

    // ── CTA Button Text ──
    $wp_customize->add_setting( 'apex_nav_cta_text', [
        'default'           => 'Free Consultation',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ] );
    $wp_customize->add_control( 'apex_nav_cta_text', [
        'label'   => __( 'CTA Button Text', 'my-theme' ),
        'section' => 'apex_navbar_section',
        'type'    => 'text',
    ] );

    // ── CTA Button URL ──
    $wp_customize->add_setting( 'apex_nav_cta_url', [
        'default'           => '#contact',
        'sanitize_callback' => 'esc_url_raw',
    ] );
    $wp_customize->add_control( 'apex_nav_cta_url', [
        'label'   => __( 'CTA Button URL', 'my-theme' ),
        'section' => 'apex_navbar_section',
        'type'    => 'url',
    ] );
}
add_action( 'customize_register', 'my_theme_customizer' );

// ── Register Footer Menu Locations ─────────────────────────────────
function my_theme_register_menus() {
    register_nav_menus( [
        'primary'         => __( 'Primary Navigation', 'my-theme' ),
        'footer_services' => __( 'Footer - Services', 'my-theme' ),
        'footer_company'  => __( 'Footer - Company', 'my-theme' ),
    ] );
}
add_action( 'after_setup_theme', 'my_theme_register_menus' );


// ── Footer Customizer Settings ──────────────────────────────────────
function my_theme_footer_customizer( $wp_customize ) {

    $wp_customize->add_section( 'apex_footer_section', [
        'title'    => __( 'Footer Settings', 'my-theme' ),
        'priority' => 40,
    ] );

    $footer_settings = [
        'apex_footer_about_text' => [
            'label'   => 'About Tagline',
            'default' => 'Strategic financial advisory for businesses and individuals who demand excellence.',
            'type'    => 'textarea',
            'sanitize'=> 'sanitize_textarea_field',
        ],
        'apex_footer_copyright' => [
            'label'   => 'Copyright Text',
            'default' => '&copy; ' . date('Y') . ' Apex Financial Consulting. All rights reserved.',
            'type'    => 'text',
            'sanitize'=> 'wp_kses_post',
        ],
        'apex_footer_email' => [
            'label'   => 'Email Address',
            'default' => 'contact@apexfinancial.com',
            'type'    => 'text',
            'sanitize'=> 'sanitize_email',
        ],
        'apex_footer_phone' => [
            'label'   => 'Phone Number',
            'default' => '+1 (212) 555-1234',
            'type'    => 'text',
            'sanitize'=> 'sanitize_text_field',
        ],
        'apex_footer_address' => [
            'label'   => 'Address',
            'default' => 'New York, NY',
            'type'    => 'text',
            'sanitize'=> 'sanitize_text_field',
        ],
        'apex_social_linkedin' => [
            'label'   => 'LinkedIn URL',
            'default' => '#',
            'type'    => 'url',
            'sanitize'=> 'esc_url_raw',
        ],
        'apex_social_twitter' => [
            'label'   => 'Twitter / X URL',
            'default' => '#',
            'type'    => 'url',
            'sanitize'=> 'esc_url_raw',
        ],
        'apex_social_instagram' => [
            'label'   => 'Instagram URL',
            'default' => '#',
            'type'    => 'url',
            'sanitize'=> 'esc_url_raw',
        ],
    ];

    foreach ( $footer_settings as $id => $args ) {
        $wp_customize->add_setting( $id, [
            'default'           => $args['default'],
            'sanitize_callback' => $args['sanitize'],
            'transport'         => 'postMessage',
        ] );
        $wp_customize->add_control( $id, [
            'label'   => __( $args['label'], 'my-theme' ),
            'section' => 'apex_footer_section',
            'type'    => $args['type'],
        ] );
    }
}
add_action( 'customize_register', 'my_theme_footer_customizer' );