<?php
class Apex_Navbar_Widget extends \Elementor\Widget_Base {

    public function get_name()  { return 'apex_navbar'; }
    public function get_title() { return __( 'Apex Navbar', 'my-theme' ); }
    public function get_icon()  { return 'eicon-nav-menu'; }
    public function get_categories() { return [ 'general' ]; }

    protected function register_controls() {

        // ── Logo Section ──────────────────────────────────────────
        $this->start_controls_section( 'section_logo', [
            'label' => __( 'Logo', 'my-theme' ),
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
        $this->end_controls_section();

        // ── CTA Button Section ────────────────────────────────────
        $this->start_controls_section( 'section_cta', [
            'label' => __( 'CTA Button', 'my-theme' ),
        ] );
        $this->add_control( 'cta_text', [
            'label'   => __( 'Button Text', 'my-theme' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => 'Free Consultation',
        ] );
        $this->add_control( 'cta_url', [
            'label'         => __( 'Button URL', 'my-theme' ),
            'type'          => \Elementor\Controls_Manager::URL,
            'placeholder'   => '#contact',
            'default'       => [ 'url' => '#contact' ],
        ] );
        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $cta_url  = $settings['cta_url']['url'] ?? '#contact';
        ?>
        <nav class="navbar">
            <div class="container">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo">
                    <?php echo esc_html( $settings['logo_text'] ); ?>
                    <span><?php echo esc_html( $settings['logo_dot'] ); ?></span>
                </a>
                <?php wp_nav_menu( [
                    'theme_location' => 'primary',
                    'menu_class'     => 'nav-links',
                    'container'      => 'ul',
                    'fallback_cb'    => false,
                ] ); ?>
                <a href="<?php echo esc_url( $cta_url ); ?>" class="btn-nav">
                    <?php echo esc_html( $settings['cta_text'] ); ?>
                </a>
                <div class="hamburger">
                    <span></span><span></span><span></span>
                </div>
            </div>
        </nav>
        <?php
    }
}