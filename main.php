<?php

/*
* Plugin Name: Elementor BEMAX
* Plugin URI: https://miguras.com/elementor_bemax
* Description: Improves Elementor capabilities with new options and widgets
* Version: 1.5
* Author: Miguras
* Author URI: http://miguras.com
* License: GPLv2 or later
* License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
*
*/

if ( !defined( 'ABSPATH' ) ) {
    exit;
    // Exit if accessed directly.
}


if ( function_exists( 'bemax_fs' ) ) {
    bemax_fs()->set_basename( false, __FILE__ );
    return;
}


if ( !function_exists( 'bemax_fs' ) ) {
    // Create a helper function for easy SDK access.
    function bemax_fs()
    {
        global  $bemax_fs ;

        if ( !isset( $bemax_fs ) ) {
            // Include Freemius SDK.
            require_once dirname( __FILE__ ) . '/freemius/start.php';
            $bemax_fs = fs_dynamic_init( array(
                'id'             => '3335',
                'slug'           => 'bemax-elementor',
                'type'           => 'plugin',
                'public_key'     => 'pk_69ed611b39bb4c602200bf349c1a7',
                'is_premium'     => false,
                'premium_suffix' => 'PRO',
                'has_addons'     => false,
                'has_paid_plans' => true,
                'menu'           => array(
                'first-path' => 'plugins.php',
            ),
                'is_live'        => true,
            ) );
        }

        return $bemax_fs;
    }

    // Init Freemius.
    bemax_fs();
    // Signal that SDK was initiated.
    do_action( 'bemax_fs_loaded' );
}

final class BEMAX_Extension
{
    const  VERSION = '1.3' ;
    const  MINIMUM_ELEMENTOR_VERSION = '2.0.0' ;
    const  MINIMUM_PHP_VERSION = '7.0' ;
    private static  $_instance = null ;
    public static function instance()
    {
        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function __construct()
    {
        add_action( 'init', [ $this, 'i18n' ] );
        add_action( 'plugins_loaded', [ $this, 'init' ] );
    }

    public function i18n()
    {
        load_plugin_textdomain( 'elementor-bemax' );
    }

    public function init()
    {
        // Check if Elementor installed and activated

        if ( !did_action( 'elementor/loaded' ) ) {
            add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
            return;
        }

        // Check for required Elementor version

        if ( !version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
            add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
            return;
        }

        // Check for required PHP version

        if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
            add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
            return;
        }

        // Add Plugin actions
        add_action( 'elementor/init', [ $this, 'init_extensions' ] );
        add_action( 'elementor/widgets/widgets_registered', [ $this, 'init_widgets' ] );
        add_action( 'elementor/controls/controls_registered', [ $this, 'init_controls' ] );
        add_action( 'wp_enqueue_scripts', [ $this, 'bemax_scripts_and_styles_free' ], 999 );
        add_action( 'elementor/elements/categories_registered', [ $this, 'bemax_categories' ] );
    }

    public function bemax_categories( $elements_manager )
    {
        $elements_manager->add_category( 'bemax-category', [
            'title' => __( 'BEMAX Widgets', 'elementor-bemax' ),
            'icon'  => 'fa fa-bomb',
        ] );
    }

    public function bemax_scripts_and_styles_free()
    {
        wp_enqueue_style(
            'bemax-component',
            plugin_dir_url( __FILE__ ) . 'styles/CreativeLinkEffects/css/component.css',
            '',
            rand( 0, 100 )
        );
        wp_enqueue_style(
            'bemax-normalize',
            plugin_dir_url( __FILE__ ) . 'styles/CreativeLinkEffects/css/normalize.css',
            '',
            rand( 0, 100 )
        );
        wp_enqueue_style(
            'bemax-styles',
            plugin_dir_url( __FILE__ ) . 'styles/styles.css',
            '',
            rand( 0, 100 )
        );
        wp_enqueue_script( 'bemax-modernizr', plugin_dir_url( __FILE__ ) . 'scripts/modernizr.custom.js' );
        wp_enqueue_script( 'bemax-mainscripts', plugin_dir_url( __FILE__ ) . 'scripts/main-scripts.js' );
    }

    /**
     * Admin notice
     *
     * Warning when the site doesn't have Elementor installed or activated.
     *
     * @since 1.0.0
     *
     * @access public
     */
    public function admin_notice_missing_main_plugin()
    {
        if ( isset( $_GET['activate'] ) ) {
            unset( $_GET['activate'] );
        }
        $message = sprintf(
            /* translators: 1: Plugin name 2: Elementor */
            esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'elementor-bemax' ),
            '<strong>' . esc_html__( 'Elementor Bemax', 'elementor-bemax' ) . '</strong>',
            '<strong>' . esc_html__( 'Elementor', 'elementor-bemax' ) . '</strong>'
        );
        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
    }

    /**
     * Admin notice
     *
     * Warning when the site doesn't have a minimum required Elementor version.
     *
     * @since 1.0.0
     *
     * @access public
     */
    public function admin_notice_minimum_elementor_version()
    {
        if ( isset( $_GET['activate'] ) ) {
            unset( $_GET['activate'] );
        }
        $message = sprintf(
            /* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
            esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'elementor-bemax' ),
            '<strong>' . esc_html__( 'Elementor Bemax', 'elementor-bemax' ) . '</strong>',
            '<strong>' . esc_html__( 'Elementor', 'elementor-bemax' ) . '</strong>',
            self::MINIMUM_ELEMENTOR_VERSION
        );
        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
    }

    /**
     * Admin notice
     *
     * Warning when the site doesn't have a minimum required PHP version.
     *
     * @since 1.0.0
     *
     * @access public
     */
    public function admin_notice_minimum_php_version()
    {
        if ( isset( $_GET['activate'] ) ) {
            unset( $_GET['activate'] );
        }
        $message = sprintf(
            /* translators: 1: Plugin name 2: PHP 3: Required PHP version */
            esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'elementor-bemax' ),
            '<strong>' . esc_html__( 'Elementor BEMAX', 'elementor-bemax' ) . '</strong>',
            '<strong>' . esc_html__( 'PHP', 'elementor-bemax' ) . '</strong>',
            self::MINIMUM_PHP_VERSION
        );
        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
    }

    /**
     * Init Widgets
     *
     * Include widgets files and register them
     *
     * @since 1.0.0
     *
     * @access public
     */
    public function init_widgets()
    {
        // Include Animated Links
        if ( file_exists( plugin_dir_path( __FILE__ ) . 'elementor-widgets/animated-links.php' ) ) {
            require_once plugin_dir_path( __FILE__ ) . 'elementor-widgets/animated-links.php';
        }
        // Register widget
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BEMAX_Animated_Links() );
        // Include Image Comparison
        if ( file_exists( plugin_dir_path( __FILE__ ) . 'elementor-widgets/image-comparison.php' ) ) {
            require_once plugin_dir_path( __FILE__ ) . 'elementor-widgets/image-comparison.php';
        }
        // Register widget
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BEMAX_Image_Comparison() );
        // Include Member
        if ( file_exists( plugin_dir_path( __FILE__ ) . 'elementor-widgets/team-member.php' ) ) {
            require_once plugin_dir_path( __FILE__ ) . 'elementor-widgets/team-member.php';
        }
        // Register widget
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BEMAX_team_member() );
    }

    public function init_extensions()
    {
        if ( file_exists( plugin_dir_path( __FILE__ ) . 'miguras-ie-class/miguras-ie-class.php' ) ) {
            require_once plugin_dir_path( __FILE__ ) . 'miguras-ie-class/miguras-ie-class.php';
        }
        $migurasclass = new Miguras_IE_Functions( 'bemax' );
        $migurasclass->enqueue_scripts( array( 'image-comparison', 'members' ) );
        if ( file_exists( plugin_dir_path( __FILE__ ) . 'miguras-ie-class/controls.php' ) ) {
            require_once plugin_dir_path( __FILE__ ) . 'miguras-ie-class/controls.php';
        }
        if ( file_exists( plugin_dir_path( __FILE__ ) . 'elementor-functions/elementor-functions.php' ) ) {
            require_once plugin_dir_path( __FILE__ ) . 'elementor-functions/elementor-functions.php';
        }
    }

    public function init_controls()
    {
    }

}
BEMAX_Extension::instance();
