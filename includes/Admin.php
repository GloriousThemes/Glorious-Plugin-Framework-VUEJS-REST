<?php
namespace GLFRM\Includes;

class Admin {

    /**
     * Construct Function
     */
    public function __construct() {
        add_action( 'admin_menu', [ $this, 'admin_menu' ] );
        add_action( 'admin_enqueue_scripts', [ $this, 'register_scripts_styles' ] );
    }

    public function register_scripts_styles() {
        $this->load_scripts();
        $this->load_styles();
    }

    /**
     * Load Scripts
     *
     * @return void
     */
    public function load_scripts() {
        wp_register_script( 'glfrm-manifest', GLFRM_PLUGIN_URL . 'assets/js/manifest.js', [], rand(), true );
        wp_register_script( 'glfrm-vendor', GLFRM_PLUGIN_URL . 'assets/js/vendor.js', [ 'glfrm-manifest' ], rand(), true );
        wp_register_script( 'glfrm-admin', GLFRM_PLUGIN_URL . 'assets/js/admin.js', [ 'glfrm-vendor' ], rand(), true );

        wp_enqueue_script( 'glfrm-manifest' );
        wp_enqueue_script( 'glfrm-vendor' );
        wp_enqueue_script( 'glfrm-admin' );

        wp_localize_script( 'glfrm-admin', 'glfrmAdminLocalizer', [
            'adminUrl'  => admin_url( '/' ),
            'ajaxUrl'   => admin_url( 'admin-ajax.php' ),
            'apiUrl'    => home_url( '/wp-json' ),
        ] );
    }

    public function load_styles() {
        wp_register_style( 'glfrm-admin', GLFRM_PLUGIN_URL . 'assets/css/admin.css' );

        wp_enqueue_style( 'glfrm-admin' );
    }

    /**
     * Register Menu Page
     * @since 1.0.0
     */
    public function admin_menu() {
        global $submenu;

        $capability = 'manage_options';
        $slug       = 'gloriousframework';

        $hook = add_menu_page(
            __( 'Glorious Framework', 'textdomain' ),
            __( 'Glorious Framework', 'textdomain' ),
            $capability,
            $slug,
            [ $this, 'menu_page_template' ],
            'dashicons-buddicons-replies'
        );

        if( current_user_can( $capability )  ) {
            $submenu[ $slug ][] = [ __( 'Kickstart', 'textdomain' ), $capability, 'admin.php?page=' . $slug . '#/' ];
            $submenu[ $slug ][] = [ __( 'Settings', 'textdomain' ), $capability, 'admin.php?page=' . $slug . '#/settings' ];
        }

        // add_action( 'load-' . $hook, [ $this, 'init_hooks' ] );
    }

    /**
     * Init Hooks for Admin Pages
     * @since 1.0.0
     */
    public function init_hooks() {
        add_action( 'admin_enqueu_scripts', [ $this, 'enqueue_scripts' ] );
    }

    /**
     * Load Necessary Scripts & Styles
     * @since 1.0.0
     */
    public function enqueue_scripts() {
        wp_enqueue_style( 'glfrm-admin' );
        wp_enqueue_script( 'glfrm-admin' );
    }

    /**
     * Render Admin Page
     * @since 1.0.0
     */
    public function menu_page_template() {
        echo '<div class="wrap"><div id="glfrm-admin-app"></div></div>';
    }

}