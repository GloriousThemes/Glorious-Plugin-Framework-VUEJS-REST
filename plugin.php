<?php
/**
 * Plugin Name: GloriousFramework
 * Plugin URI: http://www.gloriousmotive.com
 * Description: GloriousFramework by GLoriousMotive.
 * Version: 1.0.0
 * Author: GloriousThemes
 * Author URI: http://www.gloriousThemes.com
 * Requires at least: 5.5
 * Tested up to: 6.0
 * Requires PHP: 7.0 
 * License: GPL2
 * Text Domain: gloriousmotive 
 * Domain Path: /languages/
 * 
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 *
 * @package     Glorious Motive
 * @author      GloriousMotive
 * @copyright   2021 GloriousMotive 
 * @license     GPL-2.0+
 *
 * @wordpress-plugin
 */

if( ! defined( 'ABSPATH' ) ) exit(); // No direct access allowed

/**
 * Require Autoloader
 */
require_once 'vendor/autoload.php';

use GLFRM\Api\Api;
use GLFRM\Includes\Admin;
use GLFRM\Includes\Frontend;

final class Glorious_Frameowrk {

    /**
     * Define Plugin Version
     */
    const VERSION = '1.0.0';

    /**
     * Construct Function
     */
    public function __construct() {
        $this->plugin_constants();
        register_activation_hook( __FILE__, [ $this, 'activate' ] );
        register_deactivation_hook( __FILE__, [ $this, 'deactivate' ] );
        add_action( 'plugins_loaded', [ $this, 'init_plugin' ] );
    }

    /**
     * Plugin Constants
     * @since 1.0.0
     */
    public function plugin_constants() {
        define( 'GLFRM_VERSION', self::VERSION );
        define( 'GLFRM_PLUGIN_PATH', trailingslashit( plugin_dir_path( __FILE__ ) ) );
        define( 'GLFRM_PLUGIN_URL', trailingslashit( plugins_url( '', __FILE__ ) ) );
        define( 'GLFRM_NONCE', 'b?le*;K7.T2jk_*(+3&[G[xAc8O~Fv)2T/Zk9N:GKBkn$piN0.N%N~X91VbCn@.4' );
    }

    /**
     * Singletone Instance
     * @since 1.0.0
     */
    public static function init() {
        static $instance = false;

        if( !$instance ) {
            $instance = new self();
        }

        return $instance;
    }

    /**
     * On Plugin Activation
     * @since 1.0.0
     */
    public function activate() {
        $is_installed = get_option( 'glfrm_is_installed' );

        if( ! $is_installed ) {
            update_option( 'glfrm_is_installed', time() );
        }

        update_option( 'glfrm_is_installed', GLFRM_VERSION );
    }

    /**
     * On Plugin De-actiavtion
     * @since 1.0.0
     */
    public function deactivate() {
        // On plugin deactivation
    }

    /**
     * Init Plugin
     * @since 1.0.0
     */
    public function init_plugin() {
        // init
        new Admin();
        new Frontend();
        new Api();
    }

}

/**
 * Initialize Main Plugin
 * @since 1.0.0
 */
function glorious_framework() {
    return Glorious_Frameowrk::init();
}

// Run the Plugin
glorious_framework();