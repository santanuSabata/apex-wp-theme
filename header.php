<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<nav class="navbar">
    <div class="container">

        <!-- LOGO: pulls from Customizer or falls back to site title -->
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo">
            <?php
            $logo_text = get_theme_mod( 'apex_logo_text', 'Apex' );
            $logo_dot  = get_theme_mod( 'apex_logo_dot', '.' );
            echo esc_html( $logo_text ) . '<span>' . esc_html( $logo_dot ) . '</span>';
            ?>
        </a>

        <!-- NAV LINKS: WordPress custom menu -->
        <?php
        wp_nav_menu( [
            'theme_location' => 'primary',
            'menu_class'     => 'nav-links',
            'container'      => 'ul',
            'fallback_cb'    => false,
        ] );
        ?>

        <!-- CTA BUTTON: pulls from Customizer -->
        <?php
        $cta_text = get_theme_mod( 'apex_nav_cta_text', 'Free Consultation' );
        $cta_url  = get_theme_mod( 'apex_nav_cta_url', '#contact' );
        ?>
        <a href="<?php echo esc_url( $cta_url ); ?>" class="btn-nav">
            <?php echo esc_html( $cta_text ); ?>
        </a>

        <!-- HAMBURGER -->
        <div class="hamburger">
            <span></span><span></span><span></span>
        </div>

    </div>
</nav>