<?php
// Pull all Customizer values with fallbacks
$logo_text    = get_theme_mod( 'apex_logo_text', 'Apex' );
$logo_dot     = get_theme_mod( 'apex_logo_dot', '.' );
$footer_about = get_theme_mod( 'apex_footer_about_text', 'Strategic financial advisory for businesses and individuals who demand excellence.' );
$copyright    = get_theme_mod( 'apex_footer_copyright', '&copy; ' . date('Y') . ' Apex Financial Consulting. All rights reserved.' );
$email        = get_theme_mod( 'apex_footer_email', 'contact@apexfinancial.com' );
$phone        = get_theme_mod( 'apex_footer_phone', '+1 (212) 555-1234' );
$address      = get_theme_mod( 'apex_footer_address', 'New York, NY' );
$linkedin     = get_theme_mod( 'apex_social_linkedin', '#' );
$twitter      = get_theme_mod( 'apex_social_twitter', '#' );
$instagram    = get_theme_mod( 'apex_social_instagram', '#' );
?>

<footer class="footer">
    <div class="container">
        <div class="footer-grid">

            <!-- About Column -->
            <div class="footer-about">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo">
                    <?php echo esc_html( $logo_text ); ?><span><?php echo esc_html( $logo_dot ); ?></span>
                </a>
                <p><?php echo esc_html( $footer_about ); ?></p>
            </div>

            <!-- Services Menu -->
            <div class="footer-col">
                <h4><?php _e( 'Services', 'my-theme' ); ?></h4>
                <?php wp_nav_menu( [
                    'theme_location' => 'footer_services',
                    'container'      => false,
                    'items_wrap'     => '%3$s',
                    'fallback_cb'    => false,
                ] ); ?>
            </div>

            <!-- Company Menu -->
            <div class="footer-col">
                <h4><?php _e( 'Company', 'my-theme' ); ?></h4>
                <?php wp_nav_menu( [
                    'theme_location' => 'footer_company',
                    'container'      => false,
                    'items_wrap'     => '%3$s',
                    'fallback_cb'    => false,
                ] ); ?>
            </div>

            <!-- Contact Column -->
            <div class="footer-col">
                <h4><?php _e( 'Contact', 'my-theme' ); ?></h4>
                <?php if ( $email ) : ?>
                    <a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a>
                <?php endif; ?>
                <?php if ( $phone ) : ?>
                    <a href="tel:<?php echo esc_attr( preg_replace( '/\D/', '', $phone ) ); ?>"><?php echo esc_html( $phone ); ?></a>
                <?php endif; ?>
                <?php if ( $address ) : ?>
                    <a href="#"><?php echo esc_html( $address ); ?></a>
                <?php endif; ?>
            </div>

        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <p><?php echo wp_kses_post( $copyright ); ?></p>
            <div class="footer-social">
                <?php if ( $linkedin && $linkedin !== '#' ) : ?>
                    <a href="<?php echo esc_url( $linkedin ); ?>" target="_blank" rel="noopener noreferrer">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                <?php endif; ?>
                <?php if ( $twitter && $twitter !== '#' ) : ?>
                    <a href="<?php echo esc_url( $twitter ); ?>" target="_blank" rel="noopener noreferrer">
                        <i class="fab fa-twitter"></i>
                    </a>
                <?php endif; ?>
                <?php if ( $instagram && $instagram !== '#' ) : ?>
                    <a href="<?php echo esc_url( $instagram ); ?>" target="_blank" rel="noopener noreferrer">
                        <i class="fab fa-instagram"></i>
                    </a>
                <?php endif; ?>
            </div>
        </div>

    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>