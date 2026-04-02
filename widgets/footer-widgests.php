<?php
class Apex_Footer_Widget extends \Elementor\Widget_Base {

    public function get_name()  { return 'apex_footer'; }
    public function get_title() { return __( 'Apex Footer', 'my-theme' ); }
    public function get_icon()  { return 'eicon-footer'; }
    public function get_categories() { return [ 'general' ]; }

    protected function register_controls() {

        // ── About Column ──────────────────────────────────────────
        $this->start_controls_section( 'section_about', [
            'label' => __( 'About Column', 'my-theme' ),
        ] );
        $this->add_control( 'logo_text', [
            'label'   => __( 'Logo Text', 'my-theme' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => 'Apex',
        ] );
        $this->add_control( 'logo_dot', [
            'label'   => __( 'Accent Character', 'my-theme' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => '.',
        ] );
        $this->add_control( 'about_text', [
            'label'   => __( 'About Tagline', 'my-theme' ),
            'type'    => \Elementor\Controls_Manager::TEXTAREA,
            'default' => 'Strategic financial advisory for businesses and individuals who demand excellence.',
        ] );
        $this->end_controls_section();

        // ── Contact Column ────────────────────────────────────────
        $this->start_controls_section( 'section_contact', [
            'label' => __( 'Contact Column', 'my-theme' ),
        ] );
        $this->add_control( 'email', [
            'label'   => __( 'Email', 'my-theme' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => 'contact@apexfinancial.com',
        ] );
        $this->add_control( 'phone', [
            'label'   => __( 'Phone', 'my-theme' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => '+1 (212) 555-1234',
        ] );
        $this->add_control( 'address', [
            'label'   => __( 'Address', 'my-theme' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => 'New York, NY',
        ] );
        $this->end_controls_section();

        // ── Social Links ──────────────────────────────────────────
        $this->start_controls_section( 'section_social', [
            'label' => __( 'Social Links', 'my-theme' ),
        ] );
        foreach ( [ 'linkedin' => 'LinkedIn', 'twitter' => 'Twitter / X', 'instagram' => 'Instagram' ] as $key => $label ) {
            $this->add_control( 'social_' . $key, [
                'label'       => __( $label . ' URL', 'my-theme' ),
                'type'        => \Elementor\Controls_Manager::URL,
                'placeholder' => 'https://',
                'default'     => [ 'url' => '' ],
            ] );
        }
        $this->end_controls_section();

        // ── Footer Bottom ─────────────────────────────────────────
        $this->start_controls_section( 'section_bottom', [
            'label' => __( 'Footer Bottom', 'my-theme' ),
        ] );
        $this->add_control( 'copyright', [
            'label'   => __( 'Copyright Text', 'my-theme' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => '© ' . date('Y') . ' Apex Financial Consulting. All rights reserved.',
        ] );
        $this->end_controls_section();
    }

    protected function render() {
        $s = $this->get_settings_for_display();
        $socials = [
            'linkedin'  => 'fab fa-linkedin-in',
            'twitter'   => 'fab fa-twitter',
            'instagram' => 'fab fa-instagram',
        ];
        ?>
        <footer class="footer">
            <div class="container">
                <div class="footer-grid">

                    <div class="footer-about">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo">
                            <?php echo esc_html( $s['logo_text'] ); ?><span><?php echo esc_html( $s['logo_dot'] ); ?></span>
                        </a>
                        <p><?php echo esc_html( $s['about_text'] ); ?></p>
                    </div>

                    <div class="footer-col">
                        <h4><?php _e( 'Services', 'my-theme' ); ?></h4>
                        <?php wp_nav_menu( [ 'theme_location' => 'footer_services', 'container' => false, 'items_wrap' => '%3$s', 'fallback_cb' => false ] ); ?>
                    </div>

                    <div class="footer-col">
                        <h4><?php _e( 'Company', 'my-theme' ); ?></h4>
                        <?php wp_nav_menu( [ 'theme_location' => 'footer_company', 'container' => false, 'items_wrap' => '%3$s', 'fallback_cb' => false ] ); ?>
                    </div>

                    <div class="footer-col">
                        <h4><?php _e( 'Contact', 'my-theme' ); ?></h4>
                        <?php if ( $s['email'] ) : ?>
                            <a href="mailto:<?php echo esc_attr( $s['email'] ); ?>"><?php echo esc_html( $s['email'] ); ?></a>
                        <?php endif; ?>
                        <?php if ( $s['phone'] ) : ?>
                            <a href="tel:<?php echo esc_attr( preg_replace( '/\D/', '', $s['phone'] ) ); ?>"><?php echo esc_html( $s['phone'] ); ?></a>
                        <?php endif; ?>
                        <?php if ( $s['address'] ) : ?>
                            <a href="#"><?php echo esc_html( $s['address'] ); ?></a>
                        <?php endif; ?>
                    </div>

                </div>

                <div class="footer-bottom">
                    <p><?php echo esc_html( $s['copyright'] ); ?></p>
                    <div class="footer-social">
                        <?php foreach ( $socials as $key => $icon ) :
                            $url = $s[ 'social_' . $key ]['url'] ?? '';
                            if ( $url ) : ?>
                                <a href="<?php echo esc_url( $url ); ?>" target="_blank" rel="noopener noreferrer">
                                    <i class="<?php echo esc_attr( $icon ); ?>"></i>
                                </a>
                        <?php endif; endforeach; ?>
                    </div>
                </div>

            </div>
        </footer>
        <?php
    }
}